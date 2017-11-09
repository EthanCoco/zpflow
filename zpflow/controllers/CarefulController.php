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
	
	public function actionImport(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		return $this->renderPartial('import',['recID'=>$recID]);
	}
	
	public function actionImportmb(){
		$recID = Yii::$app->request->get('recID');
		$tableName = Share::MainTableName($recID);
		
		$infos = (new yii\db\Query())	
						->select(['perIndex', 'perName','perIDCard','perGender','perJob','perPhone'])
						->from($tableName)
						->where(['perMedCheck3'=>1,'perPub5'=>1])
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perJob','XZ'],['perGender','XB']];
			foreach($infos as $info){
				$mainCode = Share::codeValue($codes,$info);
				$jsonData[] = array_merge($info,$mainCode);
			}
		}
		
		@ini_set('memory_limit', '2048M');
		set_time_limit(0);
		error_reporting(E_ALL);
		date_default_timezone_set('PRC');
		$fileName = '考生政审结果导入模板信息'.date('Y-m-d',time()).time();
		$excelInfo = Share::getKeyInfo('flow6_mb');
		
		$objPHPExcel = \PHPExcel_IOFactory::createReader("Excel5")->load($excelInfo['tempExcel']);
		$objPHPExcel->setActiveSheetIndex(0);
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
							$objPHPExcel->setActiveSheetIndex($v['index'])->setCellValue($pcoordinate,  ($num-1) );
						}else{
							$objPHPExcel->setActiveSheetIndex($v['index'])->setCellValue($pcoordinate,  $info[$keys[$temp]]);
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
	
	public function actionUpexcelSure(){
		$db = Yii::$app->db->createCommand();
		$filePath = Yii::$app->request->post('filePath');
		$recID = Yii::$app->request->post('recID');
        $reader = \PHPExcel_IOFactory::createReader('Excel5');
        $PHPExcel = $reader->load($filePath); 
        $sheet = $PHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); 
        $highestColumm = $sheet->getHighestColumn();
        $highestColumm= \PHPExcel_Cell::columnIndexFromString($highestColumm);
        if($highestColumm != 10){
            return $this->jsonReturn(['result'=>0,'msg'=>'模版不正确']);
        }
        $keys = ['perIndex', 'perName','perGender','perIDCard','perJob','perPhone','perCarefulStatus','perCarefulReson','perCarefulMark'];
        $datas = [];
        $temp = 0;
        for ($row = 2; $row <= $highestRow; $row++){
            $temp = 0;
            $datatemp =[];
            for ($column = 1; $column < $highestColumm; $column++) {
            	$datatemp[$keys[$temp]] = $sheet->getCellByColumnAndRow($column, $row)->getValue();
				
                if($temp == 11){
                    break;
                }
                $temp++;
            }
            $datas[] = $datatemp;
        }
        //检测数据完整性
        if(empty($datas)){
            return $this->jsonReturn(['result'=>0,'msg'=>'导入数据为空']);
        }
        $index = 2;
        $errorInfo = '';
        $personIDdata = [];
		$postTemp = [];
		$numTemp = [];
		$tableName = Share::MainTableName($recID);
		
		$check = ['通过'=>1,'不通过'=>2,''=>0];
		
        foreach($datas as $per){
        	
			if($per['perIndex'] == ''){
				$errorInfo .= '第'.$index.'行报名序号不能为空！<br/>';
			}
			if($per['perName'] == ''){
				$errorInfo .= '第'.$index.'行姓名不能为空！<br/>';
			}
			if($per['perIDCard'] == ''){
				$errorInfo .= '第'.$index.'行身份证号不能为空！<br/>';
			}
			if(!array_key_exists(trim($per['perCarefulStatus']), $check)){
				$errorInfo .= '第'.$index.'政审结果应填【通过、不通过】！<br/>';
			}
			
			if($per['perIndex'] != "" && $per['perIDCard'] != "" && $per['perName'] != ""){
				$per_count = (new yii\db\Query())	
							->from($tableName)
							->where(['perMedCheck3'=>1,'perPub5'=>1,'perIndex'=>$per['perIndex'],'perIDCard'=>$per['perIDCard'],'perName'=>$per['perName']])
							->count();
					
				if($per_count == 0){
					$errorInfo .= '第'.$index.'行报名序号，身份证和姓名不匹配！<br/>';
				}
					
			}
            $index++;
        }
		
		$update_flag_msg = "";
		if($errorInfo != ''){
			return $this->jsonReturn(['result'=>0,'msg'=>$errorInfo]);
		}else{
			foreach($datas as $per){
				$flag = $db	->	update($tableName,[
									'perCarefulStatus'=>$check[trim($per['perCarefulStatus'])],
									'perCarefulReson'=>$per['perCarefulReson'],
									'perCarefulMark'=>$per['perCarefulMark']
								], [
									'perMedCheck3'=>1,
									'perPub5'=>1,
									'perIndex'=>$per['perIndex'],
									'perIDCard'=>$per['perIDCard'],
								])->execute();
				if($flag !== false){
					
				}else{
					$update_flag_msg .= '姓名：'.$per['perName'].'数据插入失败<br/>';
				}
			}
			if($update_flag_msg == ''){
				return $this->jsonReturn(['result'=>1,'msg'=>'导入成功！']);	
			}else{
				return $this->jsonReturn(['result'=>0,'msg'=>$update_flag_msg]);	
			}
		}
	}
	
	public function actionCheckCareful(){
		$db = Yii::$app->db->createCommand();
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$perCarefulStatus = $request->post('perCarefulStatus');
		$perCarefulReson = $request->post('perCarefulReson');
		$perIDs = $request->post('perIDs');
		$tableName = Share::MainTableName($recID);
		
		$flag = $db	->	update($tableName,[
							'perCarefulStatus'=>$perCarefulStatus,
							'perCarefulReson'=>$perCarefulReson,
							'perCarefulTime'=>date('Y-m-d H:i:s',time())
						], [
							'perID'=>$perIDs
						])->execute();
		
		if($flag !== false){
			$result = ['result'=>1,'msg'=>'审核成功'];
		}else{
			$result = ['result'=>0,'msg'=>'审核失败'];
		}
		
		return $this->jsonReturn($result);
	}
	
	public function actionPubInfo(){
		$db = Yii::$app->db->createCommand();
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$tableName = Share::MainTableName($recID);
		
		$flag = $db	->	update($tableName,[
							'perPub6'=>1,
						], [
							'perMedCheck3'=>1,
							'perPub5'=>1,
						])->execute();
		
		if($flag !== false){
			$result = ['result'=>1,'msg'=>'公示成功'];
		}else{
			$result = ['result'=>0,'msg'=>'公示失败'];
		}
		
		return $this->jsonReturn($result);
	}
	
}
