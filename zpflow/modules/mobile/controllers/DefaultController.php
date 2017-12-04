<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;
use app\models\User;
use app\models\Share;
use app\models\Recruit;
use app\models\Person;
/**
 * Default controller for the `mobile` module
 */
class DefaultController extends Controller
{
	//去除启用post请求限制
	public $enableCsrfValidation = false;
	//设置布局模板
	public $layout = 'mobile'; 
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
    	//设置时间区
    	date_default_timezone_set('PRC');
		//index标识
    	$index = \yii\helpers\Html::encode(Yii::$app->request->get('index',''));
		$index = $index == '' ? 1 : $index;
    	
		//设置2、招聘查询和4、个人中心需要登录后才能进入
		if($index == 2 || $index == 4){
			//判断是否登录
			if(!Yii::$app->user->isGuest){
				//获取用户类别
				$userType = Yii::$app->user->identity->userType;
				//如果不是应聘者登录
				if($userType != 1){
					return $this->render('index',['index'=>$index]);
				}
			}else{
				//渲染进入登录界面
				return $this->render('login',['index'=>2]);
			}
		}
		
		//招聘查询
		if($index == 2){
			//获取默认招聘信息
			$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
			//如果存在默认招聘
			if(!empty($recInfo)){
				//获取用户名即身份证号
				$idCard = Yii::$app->user->identity->name;
				//当前时间
				$nowDate = date('Y-m-d H:i:s',time());
				//校验是否存在招聘记录
				$num = (new \yii\db\Query())->from(Share::MainTableName($recInfo['recID']))->where(['perIDCard'=>$idCard,'perStatus'=>[1,2,3]])->count();
				//正在报名
				if($nowDate < $recInfo['recEnd']){
					//2 正在报名 已经报名 	3 正在报名 还未开始报名
					$flowtype = $num == 1 ? 2 : 3;
				}else{
					//结束报名了
					if($num == 1 && $recInfo['recBack'] == 0){
						//4 报名结束了，正在等待后续结果 该次招聘还未归档	
						$flowtype = 4;
					}elseif($num == 1 && $recInfo['recBack'] == 1){
						//4 报名结束了，该次招聘已经归档	
						$flowtype = 1;
					}elseif($num == 0){
						//还没有报名无法报名了（等待下次）	
						$flowtype = 1;
					}
				}
			}else{
				//1 报名还未开始（等待下次）
				$flowtype = 1;
			}
			//exit(var_dump($flowtype));
			return $this->render('index'.\yii\helpers\Html::decode($index),['index'=>$index,'flowtype'=>$flowtype,'recInfo'=>$recInfo]);
			//个人中心
		}elseif($index == 4){
			//身份证号
			$idcard = Yii::$app->user->identity->name;
			//人员基本信息
			$perInfo = Person::find()->where(['perIDCard'=>$idcard])->one();
			return $this->render('index'.\yii\helpers\Html::decode($index),['index'=>$index,'perInfo'=>$perInfo]);
		}
        return $this->render('index'.\yii\helpers\Html::decode($index),['index'=>$index]);
    }
	
	/*生成验证码*/
	public function actionValcode(){
		$_vc = new \ValidateCode();
		$_vc->doimg();
		\Yii::$app->session->set('authnum_session',$_vc->getCode());
	}
	
	/*登录动作*/
	public function actionLoginDo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		//判断是否登录
		if(!Yii::$app->user->isGuest){
			return ['result'=>1];
		}
		
		//匹配验证码
		$codenum = $request->post()['User']['vcode'];
		$validCode = \Yii::$app->session->get('authnum_session');
		if(strtolower($codenum) != $validCode){
			return ['result'=>0,'msg'=>'验证码错误','type'=>1];
		}
		
		$model = new User();
		//应用登录场景
		$model->setScenario(User::SCENARIO_LOGIN);
		if($model->load($request->post()) && $model->validate()){
			//账号
		   	$name = $request->post()['User']['name'];
			//密码
			$password = $request->post()['User']['password'];
			//用户信息
		   	$info = User::findSingleByWhere(['name'=>$name,'password'=>$password]);
			//没有用户信息
			if(empty($info)){
				return ['result'=>0,'msg'=>'账号或密码错误'];
			}
			//用户类别不是应聘者
			if($info['userType'] != '1'){
				return ['result'=>0,'msg'=>'对不起，您不是应聘者'];
			}
			//登录
			if($model->login()){
				if(User::afterLoginDo()){
					return ['result'=>1];
				}
				return ['result'=>0,'msg'=>'服务器发生故障'];
			}else{
				return ['result'=>0,'msg'=>'服务器发生故障'];
			}
		}else{
			//错误信息
			$errors = $model->getFirstErrors();
			return ['result'=>0,'msg'=>Share::comErrors($errors)];
		}
	}

	/*用户注册*/
	public function actionRegister(){
		date_default_timezone_set('PRC');
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		//注册数据
		$data = $request->post()['User'];
		$model = new User();
		//应用注册场景
		$model->setScenario(User::SCENARIO_REGISTER);
		//装载数据及验证
		if($model->load($request->post()) && $model->validate()){
			//插入信息
			$flag = Yii::$app->db->createCommand()->insert('user', [
					    'name' => $data['name'],
					    'realName' =>  $data['realName'],
					    'password'=>$data['password'],
					    'userType'=>1,
					    'userRegisterTime'=>date('Y-m-d H:i:s',time()),
					    'phone'=>$data['phone']
					])->execute();
			
			if($flag){
				return ['result'=>1,'msg'=>'注册成功'];
			}else{
				return ['result'=>0,'msg'=>'注册失败'];
			}
		}else{
			//错误信息
			$errors = $model->getFirstErrors();
			return ['result'=>0,'msg'=>Share::comErrors($errors)];
		}
	}
	
	/*退出登录*/
	public function actionLogout(){
		Yii::$app->user->logout();
		return $this->render('login',['index'=>2]);
	}
}
