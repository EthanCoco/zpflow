<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Recruit;
use app\models\Share;
use app\models\Announce;

class RecruitController extends BaseController{
	
	public function actionListInfo(){
		$request = Yii::$app->request;
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$listInfos = Recruit::getListInfo($offset,$rows,"recDefault desc,recYear desc,recBatch desc");
		
		$infos = $listInfos['rows'];
		$jsonData = [];
		foreach($infos as $info){
			$codeName = Share::codeValue([['recBatch','PC']],$info);
			$jsonData [] = array_merge($info,$codeName);
		}
		
		return $this->jsonReturn(['rows'=>$jsonData,'total'=>$listInfos['total']]);
	}
	
	public function actionRepair(){
		$flag = Yii::$app->request->get('flag');
		$recID = Yii::$app->request->get('recID','');
		$pcInfo = Share::getCodeInfo(['PC']);
		return $this->renderPartial('flow1_repair',['pcSelect'=>$pcInfo,'flag'=>$flag,'recID'=>$recID]);
	}
	
	public function actionRepairDo(){
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
			if($recID == ""){
				return $this->jsonReturn(Recruit::insertData($data));
			}else{
				return $this->jsonReturn(Recruit::updateData($data,['recID'=>$recID]));
			}
		}else{
			$errors = $model->getFirstErrors();
			return $this->jsonReturn(['result'=>0,'msg'=>Share::comErrors($errors)]);
		}
	}

	public function actionPubRecruit(){
		$db = Yii::$app->db;
		$recID = Yii::$app->request->post('recID','');
		
		if($recID == ""){
			return $this->jsonReturn(['result'=>0,'msg'=>'发布出错']);
		}
		
		$transaction = $db->beginTransaction();	
		try{
			$info = Recruit::find()->where(['recDefault'=>'1'])->asArray()->one();
			if(empty($info)){
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>1],['recID'=>$recID])->execute();
				$db->createCommand(Share::CreateBusTable($recID))->execute();
			}elseif($info['recEnd'] > date('Y-m-d H:i:s',time())){
				return $this->jsonReturn(['result'=>0,'msg'=>'存在招聘年度正在进行中，还未结束，如要发布，请等进行中招聘结束']);
			}elseif($info['recEnd'] < date('Y-m-d H:i:s',time())){
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>2,'recBack'=>1],['recID'=>$info['recID']])->execute();
				$db->createCommand()->update(Announce::tableName(),['ancStatus'=>2],['recID'=>$info['recID']])->execute();
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>1],['recID'=>$recID])->execute();
				//TODO	创建后续业务流程相关表
				$db->createCommand(Share::CreateBusTable($recID))->execute();
			}
			$transaction->commit();
			return $this->jsonReturn(['result'=>1,'msg'=>'发布成功']);
		}catch(\Exception $e){
		    $transaction->rollBack();
		    return $this->jsonReturn(['result'=>0,'msg'=>'发布失败']);
		}
	}
	
	public function actionDelRecruit(){
		$recIDs = Yii::$app->request->post('recIDs');
		if(Recruit::deleteAll(['recID'=>$recIDs])){
			$result = ['result'=>'1','msg'=>'删除成功'];
		}else{
			$result = ['result'=>0,'msg'=>'删除失败'];
		}
		
		return $this->jsonReturn($result);
	}
	
	public function actionGetRecruit(){
		$recID = Yii::$app->request->post('recID');
		$info = Recruit::findOne($recID);
		return $this->jsonReturn($info);
	}
}
