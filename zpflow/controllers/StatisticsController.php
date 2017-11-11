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
		
		$data_c1 = $this->getLoadContainerInfo1($tableName);
		$json_data['c1'] = $data_c1;
		
		$data_c2 = $this->getLoadContainerInfo2($tableName);
		$json_data['c2'] = $data_c2;
		
		
		return $this->jsonReturn($json_data);
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
}
