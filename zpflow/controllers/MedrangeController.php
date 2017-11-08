<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Medical;
use app\models\Share;
use app\models\Recruit;
use app\models\Noticemb;
use app\models\Comnotice;

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
		$medical_info = Medical::find()->where(['recID'=>$recID])->asArray()->one();
		$result['medical_flag'] = !empty($medical_info)? 1 : 0;
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perReResult3','FKJG'],['perReResult4','FKJG'],['perRead4','YDZK']];
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
	
	public function actionSendMsgFs1(){
		$recID = Yii::$app->request->get('recID');
		return $this->renderPartial('step1/sendmsg',['recID'=>$recID]);
	}
	
	public function actionSendmsgFs1List(){
		$recID = Yii::$app->request->get('recID');
		$tableName = Share::MainTableName($recID);
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perName','perJob','perPhone'])
						->from($tableName)
						->where(['AND',['perExamResult'=>1,'perPub3'=>1]])
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perJob','XZ']];
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
		
		$count = (new yii\db\Query())	->from($tableName)->where(['AND',['perExamResult'=>1,'perPub3'=>1]])->count();
		
		$result['rows'] = $jsonData;
		$result['total'] = $count;
		return $this->jsonReturn($result);
	}

	public function actionSendmsgFs1Do(){
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
	
	public function actionPrintSignFs1(){
		$recID = Yii::$app->request->get('recID');
		
		$recInfo = Recruit::find()->where(['recID'=>$recID])->asArray()->one();
		$codeInfo = Share::codeValue([['recBatch','PC']],$recInfo);
		
		$fileTitle = $recInfo['recYear']."年".$codeInfo['recBatch']."XXXXXX人才招聘体检签到表";
		
		$tableName = Share::MainTableName($recID);
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perName','perIDCard','perGender','perPhone'])
						->from($tableName)
						->where(['AND',['perExamResult'=>1,'perPub3'=>1]])
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perGender','XB']];
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
		
		@ini_set('memory_limit', '2048M');
		set_time_limit(0);
		error_reporting(E_ALL);
		date_default_timezone_set('PRC');
		$fileName = $fileTitle.date('Y-m-d',time()).time();
		$excelInfo = Share::getKeyInfo('flow5_step1_mb');
		
		$objPHPExcel = \PHPExcel_IOFactory::createReader("Excel5")->load($excelInfo['tempExcel']);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle($excelInfo['keys'][0]['sheetName']);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $fileTitle);
		
		$index = 0;
		foreach($excelInfo['keys'] as $v){
			$objPHPExcel -> getSheet($v['index']) -> setTitle($v['sheetName']);
			$dataInfos = $jsonData;
			$num = $v['num'];
			$keys = $v['key'];
			foreach($dataInfos as $info){
				$column = count($keys);
				$temp = 0;
				for($n = 0; $n < $column; $n++){
					if($temp == $column){
						break;
					}else{
						$pcoordinate = \PHPExcel_Cell::stringFromColumnIndex($n).''.$num;
						if($keys[$temp] == 'id'){
							$objPHPExcel->setActiveSheetIndex($v['index'])->setCellValue($pcoordinate,  ($num-2) );
						}else{
							$objPHPExcel->setActiveSheetIndex($v['index'])->setCellValue($pcoordinate, ' ' . $info[$keys[$temp]] . ' ');
						}
			            $temp++;
					}
				}
				$num++;
			}
			$index++;
		}

		ob_end_clean();
		$fileName = iconv("utf-8","gb2312",$fileName);
		header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="'.$fileName.'.xls"'); 
		header ( 'Cache-Control: max-age=0' );
		$objWriter = \PHPExcel_IOFactory::createWriter ($objPHPExcel,'Excel5'); 
		$objWriter->save ( 'php://output' );
		exit;
	}
	
	public function actionExportInfoFs1(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$conditionEN = $request->get('condition');
		$condition = Share::object_to_array(json_decode($conditionEN));
		$tableName = Share::MainTableName($recID);
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perRead4','perReResult3','perReGiveup3','perReTime3','perReResult4','perReGiveup4','perReTime4'])
						->from($tableName)
						->where($condition)
						->all();
		$jsonData = [];
		$medical_info = Medical::find()->where(['recID'=>$recID])->asArray()->one();
		$result['medical_flag'] = !empty($medical_info)? 1 : 0;
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perReResult3','FKJG'],['perReResult4','FKJG'],['perRead4','YDZK']];
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
		Share::exportCommonExcel(['sheet0'=>['data'=>$jsonData],'key'=>'flow5_step1_export','fileInfo'=>['fileName'=>'考生体检安排信息']]);
	}
	
	public function actionMedrangeEditFs1(){
		$recID = Yii::$app->request->get('recID');
		
		$jsonInfo = Noticemb::find()->where(['recID'=>$recID,'ntsType'=>2])->one();
		if(empty($jsonInfo)){
			$comnotice_info = Comnotice::find()->where(['cmFlag'=>'flow5_step1'])->one();
			$jsonInfo = [
				'ntsID'=>'',
				'ntsTitle' => $comnotice_info['cmTitle'],
				'ntsContent' => $comnotice_info['cmContent']
			];
		}
		
		return $this->renderPartial('step1/medrange-edit',['recID'=>$recID,'nstnotice_info'=>$jsonInfo]);
	}
	
	public function actionMedrangeNoticembSave(){
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$ntsID = $request->post('ntsID');
		$ntsTitle = $request->post('ntsTitle');
		$ntsContent = $request->post('ntsContent');
		
		if($ntsID == ""){
			$noticemb = new Noticemb();
			$noticemb->recID = $recID;
			$noticemb->ntsTitle = $ntsTitle;
			$noticemb->ntsType = 2;
			$noticemb->ntsContent = $ntsContent;
			if($noticemb->save()){
				$result = ['result'=>1,'msg'=>'保存成功'];
			}else{
				$result = ['result'=>0,'msg'=>'保存失败'];
			}
		}else{
			$noticemb = Noticemb::findOne($ntsID);
			$noticemb->ntsTitle = $ntsTitle;
			$noticemb->ntsContent = $ntsContent;
			$flag = $noticemb->save();
			if($flag !== false){
				if(!$flag){
					$result = ['result'=>0,'msg'=>'数据没有改动，不需要保存'];
				}else{
					$result = ['result'=>1,'msg'=>'保存成功'];
				}
			}else{
				$result = ['result'=>0,'msg'=>'保存失败'];
			}
			
		}
		return $this->jsonReturn($result);
	}

}
