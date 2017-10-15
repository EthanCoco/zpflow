<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;

class BaseController extends Controller{
	public $enableCsrfValidation = false;
	
	/*判断session是否过期*/
	public function init(){
		if(Yii::$app->user->isGuest){
			$this->redirect(['/site/login']);
			Yii::$app->end();
		}
	}
}
