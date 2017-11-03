<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Examiner;
use app\models\Setgroup;
use app\models\Share;

class ExamineeController extends BaseController{
	public function actionExamineeDealList(){
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$flag = intval($request->post('flag'));
		$perName = $request->post('perName');
		$perGender = $request->post('perGender');
		$perIDCard = $request->post('perIDCard');
		$perGroupSet = $request->post('perGroupSet');
		
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
		
		$condition = ['AND',['perStatus'=>2,'perPub'=>1]];
		
		
		if($flag == 1){
			$condition[] = ['or', ['perGroupSet' =>null], ['perGroupSet' => '']];
			$condition[] = ['or', ['perTicketNo' =>null], ['perTicketNo' => '']];
		}elseif($flag == 2){
			$condition[] = ['and', ['not', ['perGroupSet' => null]], ['not', ['perGroupSet' => '']]];
			$condition[] = ['and', ['not', ['perTicketNo' => null]], ['not', ['perTicketNo' => '']]];
		}elseif($flag == 3){
			$condition[] = ['or', ['perReResult1' =>'02'], ['perReResult2' => '02']];
		}
		
		if($perName != ""){
			$condition[] = ['AND',['like','perName',$perName]];
		}
		
		if($perGender != ""){
			$condition[] = ['AND',['perGender' => $perGender]];
		}
		
		if($perIDCard != ""){
			$condition[] = ['AND',['like','perIDCard',$perIDCard]];
		}
		
		if($perGroupSet != ""){
			$condition[] = ['AND',['perGroupSet' => $perGroupSet]];
		}
		
		$tableName = Share::MainTableName($recID);
		$infos = (new yii\db\Query())	
						->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perTicketNo','perGroupSet','perRead2','perReResult1','perReGiveup1','perReTime1','perReResult2','perReGiveup2','perReTime2'])
						->from($tableName)
						->where($condition)
						->orderby($orderInfo)
						->offset($offset)
						->limit($rows)
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perGroupSet','ZBMC'],['perReResult1','FKJG'],['perReResult2','FKJG']];
			foreach($infos as $info){
				$mainCode = Share::codeValue($codes,$info);
				if($info['perGroupSet'] == ''){
					$mainCode['gstItvPlace'] = '';
					$mainCode['gstStartEnd'] = '';
				}else{
					$tempInfo = Setgroup::find()->where(['gstGroup'=>$info['perGroupSet'],'gstType'=>2,'recID'=>$recID])->one();
					$mainCode['gstItvPlace'] = $tempInfo['gstItvPlace'];
					$mainCode['gstStartEnd'] = $tempInfo['gstStartEnd'];
				}
				$jsonData[] = array_merge($info,$mainCode);
			}
		}
		
		$count = (new yii\db\Query())	->from($tableName)->where($condition)->count();
		
		$result['rows'] = $jsonData;
		$result['total'] = $count;
		return $this->jsonReturn($result);		
	}
}
