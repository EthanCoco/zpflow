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
		
		$listInfos = Recruit::getListInfo($offset,$rows,"recDefault desc,recYear desc,recBatch desc");
		
		$infos = $listInfos['rows'];
		$jsonData = [];
		foreach($infos as $info){
			$codes = [['recBatch','PC'],['recDefault','YN']];
			$codeName = Share::codeValue($codes,$info);
			$jsonData[] = [
				'recID'			=>	$info['recID'],
				'recYear'		=>	$info['recYear'],
				'recBatch'		=>	$codeName['recBatch'],
				'recDefault'	=>	$codeName['recDefault'],
				'recStart'		=>	$info['recStart'],
				'recEnd'		=>	$info['recEnd'],
				'recViewPlace'	=>	$info['recViewPlace'],
				'recHealthPlace'=>	$info['recHealthPlace']
			];
		}
		
		return ['rows'=>$jsonData,'total'=>$listInfos['total']];
	}
	
	public function actionRepair(){
		$pcInfo = Share::getCodeInfo(['PC']);
		return $this->renderPartial('flow1_repair',['pcSelect'=>$pcInfo]);
	}
	
	public function actionRepairDo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$model = new Recruit();
		$model->setScenario(Recruit::SCENARIO_ADD);
		if($model->load($request->post()) && $model->validate()){
			$recDefault = isset($request->post()['Recruit']['recDefault']) ? ($request->post()['Recruit']['recDefault'] == 'on' ? 1 : 0) : 0;
		   	if($recDefault){
		   		$model->updateAll(['recDefault'=>0],['recYear'=>$request->post()['Recruit']['recYear']]); 
		   	}
			
			$data = $request->post()['Recruit'];
			$model->recYear = $data['recYear'];
			$model->recBatch = $data['recBatch'];
			$model->recDefault = $recDefault;
			$model->recStart = $data['recStart'];
			$model->recEnd = $data['recEnd'];
			$model->recViewPlace = $data['recViewPlace'];
			$model->recHealthPlace = $data['recHealthPlace'];
			
			if($model->save()){
				return ['result'=>1];
			}else{
				return ['result'=>0,'msg'=>'服务器发生故障'];
			}
		}else{
			$errors = $model->getFirstErrors();
			return ['result'=>0,'msg'=>Share::comErrors($errors)];
		}
	}
}
