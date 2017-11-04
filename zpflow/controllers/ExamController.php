<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Examiner;
use app\models\Setgroup;
use app\models\Share;
use app\models\Comnotice;
use app\models\Noticemb;

class ExamController extends BaseController{
	public function actionStep(){
		$index = Html::encode(Yii::$app->request->get('index',1));
		$recID = Yii::$app->request->get('recID');
		
		$groupInfo = [];
		if(intval($index) == 4){
			$tempInfo = (new yii\db\Query())->select(['gstGroup gcode','gstGroup gname'])->from(Setgroup::tableName())->where(['recID'=>$recID,'gstType'=>2])->all();
			if(!empty($tempInfo)){
				foreach($tempInfo as $info){
					$codeName = Share::codeValue([['gname','ZBMC']],$info);
					$groupInfo [] = array_merge($info,$codeName);
				}
			}
		}
		
		$flow3_to = 0;
		if(intval($index) > 3){
			$flow3_to = (new yii\db\Query())->from(Share::MainTableName($recID))
												  ->where(['AND',['perPub'=>0],['not',['perStatus'=>0]]])
												  ->count();
		}
		return $this->renderPartial('step'.Html::decode($index),['groupInfo'=>$groupInfo,'flow3_to'=>$flow3_to]);
	}
	
	public function actionRepairStep2(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$exmID = $request->get('exmID','');
		
		$examinerInfo = [];
		if($exmID){
			$examinerInfo = Examiner::findOne($exmID);
		}
		return $this->renderPartial('step2/repair',['recID'=>$recID,'exmID'=>$exmID,'examinerInfo'=>$examinerInfo]);
	}
	
	public function actionImportStep2(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		return $this->renderPartial('step2/import',['recID'=>$recID]);
	}
	
	public function actionSendMsgStep3(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		return $this->renderPartial('step3/sendmsg',['recID'=>$recID]);
	}
	
	public function actionAssignExamStep3(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$gstID = $request->get('gstID');
		return $this->renderPartial('step3/assign-examiner',['recID'=>$recID,'gstID'=>$gstID]);
	}
	
	public function actionGroupBatchStep4(){
		$recID = Yii::$app->request->get('recID');
		$tempInfo = (new yii\db\Query())->select(['gstGroup gcode','gstGroup gname'])->from(Setgroup::tableName())->where(['recID'=>$recID,'gstType'=>2])->all();
		$groupInfo = [];
		if(!empty($tempInfo)){
			foreach($tempInfo as $info){
				$codeName = Share::codeValue([['gname','ZBMC']],$info);
				$groupInfo [] = array_merge($info,$codeName);
			}
		}
		return $this->renderPartial('step4/group-batch',['groupInfo'=>$groupInfo,'recID'=>$recID]);
	}
	
	public function actionGroupEditStep4(){
		$recID = Yii::$app->request->get('recID');
		
		$jsonInfo = Noticemb::find()->where(['recID'=>$recID])->one();
		if(empty($jsonInfo)){
			$comnotice_info = Comnotice::find()->where(['cmFlag'=>'flow4_step4'])->one();
			$jsonInfo = [
				'ntsID'=>'',
				'ntsTitle' => $comnotice_info['cmTitle'],
				'ntsContent' => $comnotice_info['cmContent']
			];
		}
		
		return $this->renderPartial('step4/group-edit',['recID'=>$recID,'nstnotice_info'=>$jsonInfo]);
	}
	
	
}
