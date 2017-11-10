<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;

class StatisticsController extends BaseController{
	public function actionNodev(){
		return $this->renderPartial('nopage/nodev');
	}
	
	public function actionRecbatch(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		
		return $this->renderPartial('index1/recbatch',['recID'=>$recID]);
	}
	
	public function actionGetRecbatchInfo(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$tableName = Share::MainTableName($recID);
		
		$where_array = [
			['and',['perGender'=>1],['not',['perStatus'=>0]]],
			['and',['perGender'=>2],['not',['perStatus'=>0]]],
		];
		
		var_dump(count($where_array));exit;
		
		$node1 = (new yii\db\Query())->from($tableName)->where(['and',['perGender'=>1],['not',['perStatus'=>0]]])->count();
		
		
		
		
		var_dump($node1);exit;
		
		
		
		
//		return $this->jsonReturn(['recID'=>$recID]);
	}
	
	
}
