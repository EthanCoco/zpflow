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
			$condition = ['AND',['not',['perStatus'=>0]]];
		}else{
			$condition = ['AND',['perStatus' => $type]];
		}
		
		$perName = $request->post('search')['perName'];
		$perGender = $request->post('search')['perGender'];
		$perBirth = $request->post('search')['perBirth'];
		$perReResult1 = $request->post('search')['perReResult1'];
		
		if($perName != ""){
			$condition[] = ['AND',['like','perName',$perName]];
		}
		
		if($perGender != ""){
			$condition[] = ['AND',['perGender' => $perGender]];
		}
		
		if($perBirth != ""){
			$condition[] = ['AND',['<','perBirth',$perBirth]];
		}
		
		if($perReResult1 != ""){
			$condition[] = ['AND',['perReResult1' => $perReResult1]];
		}		
		
		$tableName = Share::MainTableName($recID);
		$query = new yii\db\Query();
		$infos = $query	->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perStatus','perPub','perReason','perCheckTime','perReResult1','perReGiveup1','perReTime1'])
						->from($tableName)
						->where($condition)
						->orderby($orderInfo)
						->offset($offset)
						->limit($rows)
						//->asArray()
						->all();
						
		$count = $query	->from($tableName)->where($condition)->count();
		
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
		
		return ['rows'=>$infos,'total'=>$count,'tabInfo'=>$tabJson,'exportInfo'=>['condition'=>$condition]];
	}

	public function actionStatusQuaexam(){
		date_default_timezone_set('PRC');
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$db = Yii::$app->db->createCommand();
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$perIDs = $request->post('perIDs');
		$perStatus = intval($request->post('perStatus'));
		
		$msg = "";
		if($perStatus == 0){
			$msg = "报名撤回";
		}elseif($perStatus == 2){
			$msg = "审核通过";
		}elseif($perStatus == 3){
			$msg = "审核不通过";
		}
		
		$tableName = Share::MainTableName($recID);
		
		if($perStatus == 0 || $perStatus == 2){
			$flag = $db	->update($tableName,[
							'perStatus'=>$perStatus,
							'perCheckTime'=>date('Y-m-d H:i:s',time())
							],['perID'=>$perIDs])
						->execute();
		}elseif($perStatus == 3){
			$perReason = $request->post('perReason','');
			$flag = $db	->update($tableName,[
							'perStatus'=>$perStatus,
							'perCheckTime'=>date('Y-m-d H:i:s',time()),
							'perReason'=>$perReason
							],['perID'=>$perIDs])
						->execute();
		}
		
		if($flag !== false){
			return ['result'=>1,'msg'=>$msg.'处理成功'];
		}else{
			return ['result'=>0,'msg'=>$msg.'处理失败'];
		}
	}
	
	function object_to_array($obj){
	    $obj = (array)$obj;
	    foreach ($obj as $k => $v){
	        if (gettype($v) == 'resource'){
	            return;
	        }
	        if (gettype($v) == 'object' || gettype($v) == 'array'){
	            $obj[$k] = (array)self::object_to_array($v);
	        }
	    }
	    return $obj;
	}
	
	public function actionExportQuaexam(){
		@ini_set('memory_limit', '2048M');
		set_time_limit(0);
		error_reporting(E_ALL);
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		date_default_timezone_set('PRC');
		$timeNow = date('Y-m-d H:i:s',time());
		$request = Yii::$app->request;
		$conditionEN = $request->post('condition');
		$type = $request->post('type');
		$recID = $request->post('recID');
		$condition = $this->object_to_array(json_decode($conditionEN));
		
		$tableName = Share::MainTableName($recID);
		$infos = 	(new yii\db\Query())->from($tableName)
										->where($condition)
										->orderby('perIndex asc')
										->all();
		
		$objReader = \PHPExcel_IOFactory::createReader ('Excel5');
		$objPHPExcel = $objReader->load ("../web/templatefile/zigeshencha1.xls" );
		
				
	}
}
