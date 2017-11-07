<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Medical;
use app\models\Share;

class MedrangeController extends BaseController{
	public function actionStep(){
		$index = Html::encode(Yii::$app->request->get('index',1));
		$recID = Yii::$app->request->get('recID');
		
		$flow3_to = (new yii\db\Query())->from(Share::MainTableName($recID))
											  ->where(['AND',['perPub'=>0],['not',['perStatus'=>0]]])
											  ->count();
		$flow4_to = (new yii\db\Query())->from(Share::MainTableName($recID))
											  ->where(['AND',['perPub3'=>0,'perReResult2'=>'01'],['not',['perStatus'=>0]]])
											  ->count();
		
		
		return $this->renderPartial('step'.Html::decode($index),['flow3_to'=>$flow3_to,'flow4_to'=>$flow4_to]);
	}
	
	public function actionListInfoStep1(){
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$flag = intval($request->post('flag'));
		$perName = $request->post('perName');
		$perGender = $request->post('perGender');
		$perIDCard = $request->post('perIDCard');
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$sort = $request->post("sort"); 
        $order = $request->post("order","asc");
        
		$tableName = Share::MainTableName($recID);
		
        if($sort){
	        $orderInfo = $sort.' '.$order;
        }else{
        	$orderInfo = 'perIndex asc';
        }
		
		$condition = ['AND',['perExamResult'=>1,'perPub3'=>1]];
		
		if($flag == 2){
			$condition = ['AND',['perExamResult'=>1,'perPub3'=>1],['or', ['perReResult3' =>'02'], ['perReResult4' => '02']] ];
		}
		
		$count_tab1 = (new yii\db\Query())->from($tableName)->where(['AND',['perExamResult'=>1,'perPub3'=>1]])->count();
		$count_tab2 = (new yii\db\Query())->from($tableName)->where(['AND',['perExamResult'=>1,'perPub3'=>1],['or', ['perReResult3' =>'02'], ['perReResult4' => '02']] ])->count();
		
		$count_pub = (new yii\db\Query())->from($tableName)->where(['AND',['perExamResult'=>1,'perPub3'=>1,'perPub4'=>0]])->count();
		
		if($count_tab1 !=0 && $count_pub > 0){
			$pub_flag = 0;//wei
		}elseif($count_tab1 == 0){
			$pub_flag = 1;//wu
		}elseif($count_tab1 !=0 && $count_pub == 0){
			$pub_flag = 2;//yi
		}
		
		$result['pub_flag'] = $pub_flag;
		
		$result['headInfo'] = ['tab1'=>$count_tab1,'tab2'=>$count_tab2];
		
		if($perName != ""){
			$condition[] = ['AND',['like','perName',$perName]];
		}
		
		if($perGender != ""){
			$condition[] = ['AND',['perGender' => $perGender]];
		}
		
		if($perIDCard != ""){
			$condition[] = ['AND',['like','perIDCard',$perIDCard]];
		}
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perRead4','perReResult3','perReGiveup3','perReTime3','perReResult4','perReGiveup4','perReTime4'])
						->from($tableName)
						->where($condition)
						->orderby($orderInfo)
						->offset($offset)
						->limit($rows)
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perReResult3','FKJG'],['perReResult4','FKJG'],['perRead4','YDZK']];
			$medical_info = Medical::find()->where(['recID'=>$recID])->asArray()->one();
			if(!empty($medical_info)){
				$medPlace = $medical_info['medPlace'];
				$medStartEnd = $medical_info['medStartEnd']; 
			}else{
				$medPlace = '';
				$medStartEnd = '';
			}
			foreach($infos as $info){
				$mainCode = Share::codeValue($codes,$info);
				$mainCode['medPlace'] = $medPlace;
				$mainCode['medStartEnd'] = $medStartEnd;
				$jsonData[] = array_merge($info,$mainCode);
			}
		}
		
		$count = (new yii\db\Query())	->from($tableName)->where($condition)->count();
		
		$result['rows'] = $jsonData;
		$result['total'] = $count;
		
		$result['exportInfo'] = ['condition'=>$condition];
		
		return $this->jsonReturn($result);		
	}
	
	
	
}
