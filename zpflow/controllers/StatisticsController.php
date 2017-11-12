<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;
use app\models\Examiner;

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
		
		$data_c1 = $this->getLoadContainerInfo1($tableName);
		$json_data['c1'] = $data_c1;
		
		$data_c2 = $this->getLoadContainerInfo2($tableName);
		$json_data['c2'] = $data_c2;
		
		$data_c3 = $this->getLoadContainerInfo3($recID);
		$json_data['c3'] = $data_c3;
		
		
		return $this->jsonReturn($json_data);
	}
	
	private function getLoadContainerInfo3($recID){
		$num1 = Examiner::find()->where(['recID'=>$recID,'exmType'=>1])->count();
		$num2 = Examiner::find()->where(['recID'=>$recID,'exmType'=>2])->count();
		$num3 = Examiner::find()->where(['recID'=>$recID,'exmType'=>3])->count();
				
		$jsonData = [['主考官',intval($num1)],['固定考官',intval($num2)],['监督员',intval($num3)]];
		return $jsonData;
	}
	
	private function getLoadContainerInfo2($tableName){
		$where_array = [
			[
				['and',['not',['perStatus'=>0]]],
				['and',['perStatus'=>2,'perPub'=>1]],
			],
			[
				['and',['perReResult2'=>'01']],
				['and',['perReResult2'=>'01','perExamResult'=>1,'perPub3'=>1]],
			],
			[
				['and',['perExamResult'=>1,'perPub3'=>1,'perPub4'=>1]],
				['and',['perExamResult'=>1,'perPub3'=>1,'perPub4'=>1,'perMedCheck3'=>1,'perPub5'=>1]],
			],
			[
				['and',['perMedCheck3'=>1,'perPub5'=>1]],
				['and',['perMedCheck3'=>1,'perPub5'=>1,'perCarefulStatus'=>1]],
			]
		];
		
		$where_len = count($where_array);
		
		$data = [];
		for($i = 0 ; $i < $where_len; $i++){
			$num_count = (new yii\db\Query())->from($tableName)->where($where_array[$i][0])->count();
			$num_pass_count = (new yii\db\Query())->from($tableName)->where($where_array[$i][1])->count();
			array_push($data,floatval(bcmul( bcdiv($num_pass_count,$num_count == 0 ? 1 : $num_count , 2),'100',2)));
		}
		$jsonData [] = ['name'=>'占比数据','data'=>$data];
		
		return $jsonData;
	}
	
	private function getLoadContainerInfo1($tableName){
		$where_array_gender1 = [
			['and',['perGender'=>1],['not',['perStatus'=>0]]],
			['and',['perReResult2'=>'01','perGender'=>1]],
			['and',['perExamResult'=>1,'perPub3'=>1,'perPub4'=>1,'perGender'=>1]],
			['and',['perMedCheck3'=>1,'perPub5'=>1,'perGender'=>1]],
		];
		$where_array_gender2 = [
			['and',['perGender'=>2],['not',['perStatus'=>0]]],
			['and',['perReResult2'=>'01','perGender'=>2]],
			['and',['perExamResult'=>1,'perPub3'=>1,'perPub4'=>1,'perGender'=>2]],
			['and',['perMedCheck3'=>1,'perPub5'=>1,'perGender'=>2]]
		];
		
		$where_gender1_len = count($where_array_gender1);
		$where_gender2_len = count($where_array_gender2);
		
		$data_gender1 = [];
		for($i = 0 ; $i < $where_gender1_len; $i++){
			$num = (new yii\db\Query())->from($tableName)->where($where_array_gender1[$i])->count();
			array_push($data_gender1,intval($num));
		}
		$jsonData [] = ['name'=>'男','data'=>$data_gender1];
		
		$data_gender2 = [];
		for($i = 0 ; $i < $where_gender2_len; $i++){
			$num = (new yii\db\Query())->from($tableName)->where($where_array_gender2[$i])->count();
			array_push($data_gender2,intval($num));
		}
		
		$jsonData [] = ['name'=>'女','data'=>$data_gender2];
		return $jsonData;
	}

	public function actionGetConDetail(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$type = $request->get('type');
		$nodeType = $request->get('nodeType');
		$typeOneWhere = $request->get('typeOneWhere','');
		$typeTwoWhere = $request->get('typeTwoWhere','');
		
		return $this->renderPartial('index1/perdetail',['recID'=>$recID,'type'=>$type,'nodeType'=>$nodeType,'typeOneWhere'=>$typeOneWhere,'typeTwoWhere'=>$typeTwoWhere]);
	}
	
	public function actionGetConDetailList(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$type = intval($request->get('type'));
		$nodeType = intval($request->get('nodeType'));
		$typeOneWhere = $request->get('typeOneWhere','');
		$typeTwoWhere = $request->get('typeTwoWhere','');
		$page = $request->get('page');
		$rows = $request->get('rows');
		$offset =($page-1)*$rows;
		
		$sort = $request->get("sort"); 
        $order = $request->get("order","asc");
        
		$tableName = Share::MainTableName($recID);
		
        if($sort){
	        $orderInfo = $sort.' '.$order;
        }else{
        	$orderInfo = 'perIndex asc';
        }
		
		
		
		if($type == 1){
			$where_array_info = [
				['and',['perGender'=>$typeOneWhere],['not',['perStatus'=>0]]],
				['and',['perReResult2'=>'01','perGender'=>$typeOneWhere]],
				['and',['perExamResult'=>1,'perPub3'=>1,'perPub4'=>1,'perGender'=>$typeOneWhere]],
				['and',['perMedCheck3'=>1,'perPub5'=>1,'perGender'=>$typeOneWhere]],
			];
		}else{
			
		}
		
		$infos = (new yii\db\Query())	
						->from($tableName)
						->where($where_array_info[$nodeType])
						->orderby($orderInfo)
						->offset($offset)
						->limit($rows)
						->all();
		$jsonData = [];
		
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perReResult3','FKJG'],['perReResult4','FKJG'],['perRead4','YDZK']];
			foreach($infos as $info){
				$mainCode = Share::codeValue($codes,$info);
				$jsonData[] = array_merge($info,$mainCode);
			}
		}
		
		$count = (new yii\db\Query())	->from($tableName)->where($where_array_info[$nodeType])->count();
		
		$result['rows'] = $jsonData;
		$result['total'] = $count;
		
		return $this->jsonReturn($result);	
	}
}
