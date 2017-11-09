<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;

class CarefulController extends BaseController{
	public function actionListInfo(){
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
		
		$flow3_to = (new yii\db\Query())->from(Share::MainTableName($recID))
											  ->where(['AND',['perPub'=>0],['not',['perStatus'=>0]]])
											  ->count();
		$flow4_to = (new yii\db\Query())->from(Share::MainTableName($recID))
											  ->where(['AND',['perPub3'=>0,'perReResult2'=>'01'],['not',['perStatus'=>0]]])
											  ->count();
		$flow5_to = (new yii\db\Query())->from(Share::MainTableName($recID))
											  ->where(['AND',['perExamResult'=>1,'perPub3'=>1,'perPub4'=>1,'perPub5'=>0]])
											  ->count();
		
		$result['flow_to'] = ['flow3_to'=>$flow3_to,'flow4_to'=>$flow4_to,'flow5_to'=>$flow5_to];
		
		$condition = ['AND',['perMedCheck3'=>1,'perPub5'=>1]];
		
		if($flag == 1){
			$condition[] = ['AND',['perCarefulStatus'=>0]];
		}elseif($flag == 2){
			$condition[] = ['AND',['perCarefulStatus'=>1]];
		}elseif($flag == 3){
			$condition[] = ['AND',['perCarefulStatus'=>2]];
		}elseif($flag == 4){
			$condition[] = ['AND',['perReResult5'=>'02']];
		}
		
		$count_tab1 = (new yii\db\Query())->from($tableName)->where(['perMedCheck3'=>1,'perPub5'=>1,'perCarefulStatus'=>0])->count();
		$count_tab2 = (new yii\db\Query())->from($tableName)->where(['perMedCheck3'=>1,'perPub5'=>1,'perCarefulStatus'=>1])->count();
		$count_tab3 = (new yii\db\Query())->from($tableName)->where(['perMedCheck3'=>1,'perPub5'=>1,'perCarefulStatus'=>2])->count();
		$count_tab4 = (new yii\db\Query())->from($tableName)->where(['perMedCheck3'=>1,'perPub5'=>1,'perReResult5'=>'02'])->count();
		$count_tab5 = (new yii\db\Query())->from($tableName)->where(['perMedCheck3'=>1,'perPub5'=>1])->count();
		
		$count_pub = (new yii\db\Query())->from($tableName)->where(['perMedCheck3'=>1,'perPub5'=>1,'perPub6'=>0])->count();
		$count_pub1 = (new yii\db\Query())->from($tableName)->where(['perMedCheck3'=>1,'perPub5'=>1,'perPub6'=>1])->count();
		
		
		if($count_tab5 !=0 && $count_pub > 0){
			$pub_flag = 0;//wei
		}elseif($count_tab5 == 0){
			$pub_flag = 1;//wu
		}elseif($count_tab5 !=0 && $count_pub == 0){
			$pub_flag = 2;//yi
		}
		
		$result['pub_flag'] = $pub_flag;
		$result['pub_info'] = ['ygs'=>$count_pub1,'wgs'=>$count_pub];
		
		$result['headInfo'] = ['tab1'=>$count_tab1,'tab2'=>$count_tab2,'tab3'=>$count_tab3,'tab4'=>$count_tab4,'tab5'=>$count_tab5];
		
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
						->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perCarefulStatus','perCarefulReson','perPub6','perRead6','perReResult5','perReGiveup5','perReTime5','perCarefulMark'])
						->from($tableName)
						->where($condition)
						->orderby($orderInfo)
						->offset($offset)
						->limit($rows)
						->all();
		$jsonData = [];
		
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perCarefulStatus','KSJG1'],['perReResult5','FKJG'],['perRead6','YDZK'],['perPub6','GS']];
			foreach($infos as $info){
				$mainCode = Share::codeValue($codes,$info);
				$jsonData[] = array_merge($info,$mainCode);
			}
		}
		
		$count = (new yii\db\Query())	->from($tableName)->where($condition)->count();
		
		$result['rows'] = $jsonData;
		$result['total'] = $count;
		
		$result['exportInfo'] = ['condition'=>$condition];
		
		return $this->jsonReturn($result);	
	}
	
	public function actionExportInfo(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$conditionEN = $request->get('condition');
		$condition = Share::object_to_array(json_decode($conditionEN));
		$tableName = Share::MainTableName($recID);
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perCarefulStatus','perCarefulReson','perPub6','perRead6','perReResult5','perReGiveup5','perReTime5','perCarefulMark'])
						->from($tableName)
						->where($condition)
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perCarefulStatus','KSJG1'],['perReResult5','FKJG'],['perRead6','YDZK'],['perPub6','GS']];
			foreach($infos as $info){
				$mainCode = Share::codeValue($codes,$info);
				$jsonData[] = array_merge($info,$mainCode);
			}
		}
		Share::exportCommonExcel(['sheet0'=>['data'=>$jsonData],'key'=>'flow6_export','fileInfo'=>['fileName'=>'考生政审信息']]);
	}
	
	public function actionSendMsg(){
		$recID = Yii::$app->request->get('recID');
		return $this->renderPartial('sendmsg',['recID'=>$recID]);
	}
	
	public function actionSendmsgList(){
		$recID = Yii::$app->request->get('recID');
		$tableName = Share::MainTableName($recID);
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perName','perJob','perPhone','perCarefulStatus','perPub6'])
						->from($tableName)
						->where(['perMedCheck3'=>1,'perPub5'=>1])
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perJob','XZ'],['perCarefulStatus','KSJG1'],['perPub6','GS']];
			foreach($infos as $info){
				$mainCode = Share::codeValue($codes,$info);
				$jsonData[] = array_merge($info,$mainCode);
			}
		}
		
		$count = (new yii\db\Query())	->from($tableName)->where(['perMedCheck3'=>1,'perPub5'=>1])->count();
		
		$result['rows'] = $jsonData;
		$result['total'] = $count;
		return $this->jsonReturn($result);
	}
	
	public function actionSendmsgDo(){
		$perPhones = Yii::$app->request->post('perPhones');
		$content = Yii::$app->request->post('content');
		$juheKey = Yii::$app->params['juhe_key'];
		$tpl_id = Yii::$app->params['juhe_tpl_id'];
		$tpl_value = '#content#='.$content;
		
		$len = count($perPhones);
		$flag = 0;
		$msg_error = '失败发送：<br/>';
		$msg_success = '发送成功：<br/>';
		$_msg_success_temp = '发送成功：<br/>';
		for($i = 0; $i < $len ; $i++){
			$smsConf = [
			    'key'   => $juheKey, 
			    'mobile'    => $perPhones[$i], 
			    'tpl_id'    => $tpl_id, 
			    'tpl_value' =>$tpl_value 
			];
			$responseContent = Share::juhecurl($smsConf,1); 
			if($responseContent){
				$result = json_decode($responseContent,true);
    			$error_code = $result['error_code'];
				if($error_code != 0){
					$flag++;
					$msg_error .= "手机号码=".$perPhones[$i]."；失败原因：". $result['reason']."<br/>";
				}else{
					$msg_success .= "手机号码=".$perPhones[$i]."<br/>";
				}
			}else{
				$msg_error .= "手机号码=".$perPhones[$i]."；失败原因：请求失败<br/>";
				$flag++;
			}
		}
		if($flag){
			$msg = "";
			if($_msg_success_temp == $msg_success){
				$msg = $msg_error;
			}else{
				$msg = $msg_error.'<br/>'.$msg_success;
			}
			$result = ['result'=>0,'msg'=>$msg];
		}else{
			$result = ['result'=>1,'msg'=>'发送成功'];
		}
		return $this->jsonReturn($result);
	}
	
}
