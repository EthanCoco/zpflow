<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Share;
class SiteController extends BaseController
{
	public function init(){
		date_default_timezone_set('PRC');
	}
	
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
		$request = Yii::$app->request;
		if(!Yii::$app->user->isGuest){
			return $this->jsonReturn(['result'=>1]);
		}
		$model = new User();
		$model->setScenario(User::SCENARIO_LOGIN);
		if($model->load($request->post()) && $model->validate()){
		   	$name = $request->post()['User']['name'];
			$password = $request->post()['User']['password'];
		   	$info = User::findSingleByWhere(['name'=>$name,'password'=>$password]);
			if(empty($info)){
				$result = ['result'=>0,'msg'=>'账号或密码错误'];
			}elseif($info['userType'] == '1'){
				$result = ['result'=>0,'msg'=>'对不起，您没有权限登录后台系统'];
			}elseif($model->login()){
				if(User::afterLoginDo()){
					$result = ['result'=>1];
				}else{
					$result = ['result'=>0,'msg'=>'服务器发生故障'];
				}
			}else{
				$result = ['result'=>0,'msg'=>'服务器发生故障'];
			}
		}else{
			$errors = $model->getFirstErrors();
			$result = ['result'=>0,'msg'=>Share::comErrors($errors)];
		}
		return $this->jsonReturn($result);
	}
	
	public function actionLogout(){
		Yii::$app->user->logout();
		$this->redirect(['/site/login']);
	}
	
	public function actionPdf(){
		$pdf = Yii::$app->pdf;
		//$pdf->format = 'A4-L';
		$pdf->cssFile = '../web/css/pdf/common_table.css';
		$pdf->content = $this->renderPartial('pdf');
		return $pdf->render();

//			return  $this->renderPartial('pdf');
	}
}
