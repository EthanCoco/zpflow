<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Examiner;

class ExamController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionStep(){
		$index = Html::encode(Yii::$app->request->get('index',1));
		return $this->renderPartial('step'.Html::decode($index));
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
	
}
