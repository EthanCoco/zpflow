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
	public $enableCsrfValidation = false;
	public $layout = 'mobile'; 
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
    	date_default_timezone_set('PRC');
    	$index = \yii\helpers\Html::encode(Yii::$app->request->get('index',''));
		$index = $index == '' ? 1 : $index;
    	
		if($index == 2 || $index == 4){
			if(!Yii::$app->user->isGuest){
				$userType = Yii::$app->user->identity->userType;
				if($userType != 1){
					return $this->render('index',['index'=>$index]);
				}
			}else{
				return $this->render('login',['index'=>2]);
			}
		}
		
		if($index == 2){
			$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
			if(!empty($recInfo)){
				$idCard = Yii::$app->user->identity->name;
				$nowDate = date('Y-m-d H:i:s',time());
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
		}elseif($index == 4){
			$idcard = Yii::$app->user->identity->name;
			$perInfo = Person::find()->where(['perIDCard'=>$idcard])->one();
			return $this->render('index'.\yii\helpers\Html::decode($index),['index'=>$index,'perInfo'=>$perInfo]);
		}
		
        return $this->render('index'.\yii\helpers\Html::decode($index),['index'=>$index]);
    }
	
	public function actionValcode(){
		$_vc = new \ValidateCode();
		$_vc->doimg();
		\Yii::$app->session->set('authnum_session',$_vc->getCode());
	}
	
	public function actionLoginDo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
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
		$model->setScenario(User::SCENARIO_LOGIN);
		if($model->load($request->post()) && $model->validate()){
		   	$name = $request->post()['User']['name'];
			$password = $request->post()['User']['password'];
		   	$info = User::findSingleByWhere(['name'=>$name,'password'=>$password]);
			if(empty($info)){
				return ['result'=>0,'msg'=>'账号或密码错误'];
			}
			if($info['userType'] != '1'){
				return ['result'=>0,'msg'=>'对不起，您不是应聘者'];
			}
			if($model->login()){
				if(User::afterLoginDo()){
					return ['result'=>1];
				}
				return ['result'=>0,'msg'=>'服务器发生故障'];
			}else{
				return ['result'=>0,'msg'=>'服务器发生故障'];
			}
		}else{
			$errors = $model->getFirstErrors();
			return ['result'=>0,'msg'=>Share::comErrors($errors)];
		}
	}

	public function actionRegister(){
		date_default_timezone_set('PRC');
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$data = $request->post()['User'];
		$model = new User();
		$model->setScenario(User::SCENARIO_REGISTER);
		if($model->load($request->post()) && $model->validate()){
			
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
			$errors = $model->getFirstErrors();
			return ['result'=>0,'msg'=>Share::comErrors($errors)];
		}
	}
}
