<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Recruit;
use app\models\Share;

class RecruitController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionListInfo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$listInfos = Recruit::getListInfo($offset,$rows,"recYear desc,recBatch desc");
		
		return $listInfos;
	}
	
	public function actionRepair(){
		return $this->renderPartial('flow1_repair');
	}
	
}
