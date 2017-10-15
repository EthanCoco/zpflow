<?php
namespace app\controllers;
use yii\web\Controller;
use Yii;

class IndexController extends BaseController{
	public $enableCsrfValidation = false;
	/*首页*/
	public function actionIndex(){
		return $this->render('index');
	}
	
	public function actionNotice(){
		return $this->render('notice');
	}
	
	public function actionStatistics(){
		return $this->render('statistics');
	}
	
	public function actionSystem(){
		return $this->render('system');
	}
}
