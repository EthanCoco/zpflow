<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Recruit;
use app\models\Share;

class AnnounceController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionListInfo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$listInfos = Recruit::getListInfo($offset,$rows,"recDefault desc,recYear desc,recBatch desc");
		
		$infos = $listInfos['rows'];
		$jsonData = [];
		foreach($infos as $info){
			$codes = [['recBatch','PC']];
			$codeName = Share::codeValue($codes,$info);
			$jsonData[] = [
				'recID'			=>	$info['recID'],
				'recYear'		=>	$info['recYear'],
				'recBatch'		=>	$codeName['recBatch'],
				'recDefault'	=>	$info['recDefault'],
				'recStart'		=>	$info['recStart'],
				'recEnd'		=>	$info['recEnd'],
				'recViewPlace'	=>	$info['recViewPlace'],
				'recHealthPlace'=>	$info['recHealthPlace'],
				'recBack'		=>	$info['recBack'],
			];
		}
		
		return ['rows'=>$jsonData,'total'=>$listInfos['total']];
	}
	
	
}
