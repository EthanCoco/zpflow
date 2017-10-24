<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;
use app\models\User;
use app\models\Share;

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
			return ['result'=>0,'msg'=>'验证码错误'];
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
