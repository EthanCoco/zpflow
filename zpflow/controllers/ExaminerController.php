<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Examiner;

class ExaminerController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionListInfo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$exmName = $request->post('exmName');
		$exmType = $request->post('exmType');
		$type = intval($request->post('type'));
		
		if($type == 1){
			$condition = ['AND',['exmAttr'=>1,'recID'=>$recID]];
		}elseif($type == 2){
			$condition = ['AND',['exmAttr'=>2,'recID'=>$recID]];
		}else{
			$condition = ['AND',['recID'=>$recID]];
		}
		
		if($exmName != ""){
			$condition[] = ['AND',['like','exmName',$exmName]];
		}
		if($exmType != ""){
			$condition[] = ['AND',['exmType'=>$exmType]];
		}
		
		$sort = $request->post("sort"); 
        $order = $request->post("order","asc"); 
		
        if($sort){
	        $orderInfo = $sort.' '.$order;
        }else{
        	$orderInfo = 'exmID asc';
        }
		
		$result = [];
		
		$tab1 = Examiner::find()->where(['exmAttr'=>1,'recID'=>$recID])->count();
		$tab2 = Examiner::find()->where(['exmAttr'=>2,'recID'=>$recID])->count();
		$tab3 = Examiner::find()->where(['recID'=>$recID])->count();
		$result["headInfo"] = ['tab1'=>$tab1,'tab2'=>$tab2,'tab3'=>$tab3];
		
		$dataInfos = Examiner::find()->where($condition)->orderby($orderInfo)->asArray()->all();
		
		$result["rows"] = $dataInfos;
		
		$total = Examiner::find()->where($condition)->orderby($orderInfo)->count();;
		
		$result["total"] = $total;
		
		return $result;
	}
}
