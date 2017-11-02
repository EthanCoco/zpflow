<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Recruit;
use app\models\Share;
use app\models\Announce;

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
			$codes = [['recBatch','PC']];
			$codeName = Share::codeValue($codes,$info);
			$jsonData [] = array_merge($info,$codeName);
//			$jsonData[] = [
//				'recID'			=>	$info['recID'],
//				'recYear'		=>	$info['recYear'],
//				'recBatch'		=>	$codeName['recBatch'],
//				'recDefault'	=>	$info['recDefault'],
//				'recStart'		=>	$info['recStart'],
//				'recEnd'		=>	$info['recEnd'],
//				'recViewPlace'	=>	$info['recViewPlace'],
//				'recHealthPlace'=>	$info['recHealthPlace'],
//				'recBack'		=>	$info['recBack'],
//			];
		}
		
		return ['rows'=>$jsonData,'total'=>$listInfos['total']];
	}
	
	public function actionRepair(){
		$flag = Yii::$app->request->get('flag');
		$recID = Yii::$app->request->get('recID','');
		$pcInfo = Share::getCodeInfo(['PC']);
		return $this->renderPartial('flow1_repair',['pcSelect'=>$pcInfo,'flag'=>$flag,'recID'=>$recID]);
	}
	
	public function actionRepairDo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$recID = $request->post()['Recruit']['recID'];
		if($recID == ""){
			$model = new Recruit();
			$model->setScenario(Recruit::SCENARIO_ADD);
		}else{
			$model = Recruit::findOne($recID);
			$model->setScenario(Recruit::SCENARIO_MOD);
		}
		if($model->load($request->post()) && $model->validate()){
			$data = $request->post()['Recruit'];
			$model->recYear = $data['recYear'];
			$model->recBatch = $data['recBatch'];
			$model->recStart = $data['recStart'];
			$model->recEnd = $data['recEnd'];
			$model->recViewPlace = $data['recViewPlace'];
			$model->recHealthPlace = $data['recHealthPlace'];
			
			if($model->save()){
				return ['result'=>1,'msg'=>'保存成功'];
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}else{
			$errors = $model->getFirstErrors();
			return ['result'=>0,'msg'=>Share::comErrors($errors)];
		}
	}

	public function actionPubRecruit(){
		date_default_timezone_set('PRC');
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$db = Yii::$app->db;
		$recID = Yii::$app->request->post('recID','');
		if($recID == ""){
			return ['result'=>0,'msg'=>'发布出错'];
		}
		
		$info = Recruit::find()->where(['recDefault'=>'1'])->asArray()->one();
		if(empty($info)){
			$transaction = $db->beginTransaction();	
			try{
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>1],['recID'=>$recID])->execute();
				//TODO	创建后续业务流程相关表
				//$createBusTableSql = Share::CreateBusTable($recID);
				$db->createCommand(Share::CreateBusTable($recID))->execute();
				$transaction->commit();
				return ['result'=>1,'msg'=>'发布成功'];
			}catch(\Exception $e){
			    $transaction->rollBack();
			    return ['result'=>0,'msg'=>'发布失败'];
			}
//			$rec = Recruit::findOne($recID);
//			$rec->recDefault = 1;
//			if($rec->save()){
//				return ['result'=>1,'msg'=>'发布成功'];
//			}else{
//				return ['result'=>0,'msg'=>'发布失败'];
//			}
		}elseif($info['recEnd'] > date('Y-m-d H:i:s',time())){
			return ['result'=>0,'msg'=>'存在招聘年度正在进行中，还未结束，如要发布，请等进行中招聘结束'];
		}elseif($info['recEnd'] < date('Y-m-d H:i:s',time())){
			$transaction = $db->beginTransaction();	
			try{
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>2,'recBack'=>1],['recID'=>$info['recID']])->execute();
				$db->createCommand()->update(Announce::tableName(),['ancStatus'=>2],['recID'=>$info['recID']])->execute();
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>1],['recID'=>$recID])->execute();
				//TODO	创建后续业务流程相关表
				$db->createCommand(Share::CreateBusTable($recID))->execute();
				$transaction->commit();
				return ['result'=>1,'msg'=>'发布成功'];
			}catch(\Exception $e){
				$transaction->rollBack();
				return ['result'=>0,'msg'=>'发布失败'];
			}
//			$rec = Recruit::findOne($info['recID']);
//			$rec->recDefault = 2;
//			$rec->recBack = 1;
//			$rec->save();
//			
//			Announce::updateAll(['ancStatus'=>2],['recID'=>$info['recID']]);
//			
//			$rec1 = Recruit::findOne($recID);
//			$rec1->recDefault = 1;
//			if($rec1->save()){
//				return ['result'=>1,'msg'=>'发布成功'];
//			}else{
//				return ['result'=>0,'msg'=>'发布失败'];
//			}
		}
	}
	
	public function actionDelRecruit(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recIDs = Yii::$app->request->post('recIDs');
		if(Recruit::deleteAll(['recID'=>$recIDs])){
			return ['result'=>'1','msg'=>'删除成功'];
		}else{
			return ['result'=>0,'msg'=>'删除失败'];
		}
	}
	
	public function actionGetRecruit(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recID = Yii::$app->request->post('recID');
		$info = Recruit::findOne($recID);
		return $info;
	}
}
