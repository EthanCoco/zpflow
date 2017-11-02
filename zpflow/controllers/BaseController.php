<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;

class BaseController extends Controller{
	public $enableCsrfValidation = false;
	
	/*判断session是否过期*/
	public function init(){
		date_default_timezone_set('PRC');
		if(Yii::$app->user->isGuest){
			$this->redirect(['/site/login']);
			Yii::$app->end();
		}
		$this->getView()->title = "招聘流程"; 
	}
	
	public function jsonReturn($data){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		return $data;
	}
	
}
