<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Announce;
use app\models\Share;

class AnnounceController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionListInfo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$ancType = $request->post('ancType');
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$listInfos = Announce::getListInfo($offset,$rows,['recID'=>$recID,'ancType'=>$ancType],"ancStatus desc,ancTime desc");
		
		return $listInfos;
	}
	
	
}
