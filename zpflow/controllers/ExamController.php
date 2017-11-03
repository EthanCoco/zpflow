<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Examiner;
use app\models\Setgroup;
use app\models\Share;

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
		
		return $this->renderPartial('step'.Html::decode($index),['groupInfo'=>$groupInfo]);
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
	
}
