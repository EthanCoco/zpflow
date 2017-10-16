<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Share;

class SiteController extends Controller
{
	public $enableCsrfValidation = false;
	/*登录页面*/
    public function actionLogin(){
    	if(!Yii::$app->user->isGuest){
			$this->redirect(['/index/index']);
			Yii::$app->end();
		}
		$this->getView()->title = "招聘登录"; 
		return $this->renderPartial('login',['secret'=>Yii::$app->params['login_secret']]);
	}
	
	/*登录*/
	public function actionLoginDo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		if(!Yii::$app->user->isGuest){
			return ['result'=>1];
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
			if($info['userType'] == '1'){
				return ['result'=>0,'msg'=>'对不起，您没有权限登录后台系统'];
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
	
	public function actionLogout(){
		Yii::$app->user->logout();
		$this->redirect(['/site/login']);
	}
}
