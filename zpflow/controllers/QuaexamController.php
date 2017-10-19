<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;

class QuaexamController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionListInfo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$type = intval($request->post('type'));
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$sort = $request->post("sort"); 
        $order = $request->post("order","asc");
        
        if($sort){
	        $orderInfo = $sort.' '.$order;
        }else{
        	$orderInfo = 'perIndex asc';
        }
		if($type == -1){
			$condtion = ['AND',['not',['perStatus'=>0]]];
		}else{
			$condtion = ['AND',['perStatus' => $type]];
		}
		
		$perName = $request->post('search')['perName'];
		$perGender = $request->post('search')['perGender'];
		$perBirth = $request->post('search')['perBirth'];
		$perReResult1 = $request->post('search')['perReResult1'];
		
		if($perName != ""){
			$condtion[] = ['AND',['like','perName',$perName]];
		}
		
		if($perGender != ""){
			$condtion[] = ['AND',['perGender' => $perGender]];
		}
		
		if($perBirth != ""){
			$condtion[] = ['AND',['<','perBirth',$perBirth]];
		}
		
		if($perReResult1 != ""){
			$condtion[] = ['AND',['perReResult1' => $perReResult1]];
		}		
		
		$tableName = Share::MainTableName($recID);
		$query = new yii\db\Query();
		$infos = $query	->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perStatus','perPub','perReason','perCheckTime','perReResult1','perReGiveup1','perReTime1'])
						->from($tableName)
						->where($condtion)
						->orderby($orderInfo)
						->offset($offset)
						->limit($rows)
						//->asArray()
						->all();
						
		$count = $query	->from($tableName)->where($condtion)->count();
		
		$tab1 = (new yii\db\Query())->from($tableName)->where(['perStatus'=>1])->count();
		$tab2 = (new yii\db\Query())->from($tableName)->where(['perStatus'=>2])->count();
		$tab3 = (new yii\db\Query())->from($tableName)->where(['perStatus'=>3])->count();
		$tab4 = intval($tab1) + intval($tab2) + intval($tab3);
		$tabJson = [
			'tab1'	=> intval($tab1),
			'tab2'	=> intval($tab2),
			'tab3'	=> intval($tab3),
			'tab4'	=> $tab4,
		];
		
		return ['rows'=>$infos,'total'=>$count,'tabInfo'=>$tabJson,'exportInfo'=>['condition'=>$condtion,'orders'=>$orderInfo]];
	}
}
