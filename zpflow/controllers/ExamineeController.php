<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Examiner;
use app\models\Setgroup;
use app\models\Share;
use app\models\Recruit;
use app\models\Noticemb;
use app\models\Standartline;

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
        
		$tableName = Share::MainTableName($recID);
		
        if($sort){
	        $orderInfo = $sort.' '.$order;
        }else{
        	$orderInfo = 'perIndex asc';
        }
		
		$condition = ['AND',['perStatus'=>2,'perPub'=>1]];
		
		if($flag == 1){
			$condition[] = ['or', ['perGroupSet' =>null], ['perGroupSet' => ''],['perTicketNo' =>null], ['perTicketNo' => '']];
		}elseif($flag == 2){
			$condition[] = ['and', ['not', ['perGroupSet' => null]], ['not', ['perGroupSet' => '']]];
			$condition[] = ['and', ['not', ['perTicketNo' => null]], ['not', ['perTicketNo' => '']]];
		}elseif($flag == 3){
			$condition[] = ['or', ['perReResult1' =>'02'], ['perReResult2' => '02']];
		}
		
		$count_tab1 = (new yii\db\Query())->from($tableName)->where(['AND',['perStatus'=>2,'perPub'=>1],['or', ['perGroupSet' =>null], ['perGroupSet' => ''],['perTicketNo' =>null], ['perTicketNo' => '']]])->count();
		$count_tab2 = (new yii\db\Query())->from($tableName)->where(['AND',['perStatus'=>2,'perPub'=>1],['and', ['not', ['perGroupSet' => null]], ['not', ['perGroupSet' => '']]],['and', ['not', ['perTicketNo' => null]], ['not', ['perTicketNo' => '']]]])->count();
		$count_tab3 = (new yii\db\Query())->from($tableName)->where(['AND',['perStatus'=>2,'perPub'=>1],['or', ['perReResult1' =>'02'], ['perReResult2' => '02']]])->count();
		$count_tab4 = (new yii\db\Query())->from($tableName)->where(['AND',['perStatus'=>2,'perPub'=>1]])->count();
		
		$count_pub = (new yii\db\Query())->from($tableName)->where(['AND',['perStatus'=>2,'perPub'=>1,'perPub2'=>0]])->count();
		
		if($count_tab4 !=0 && $count_pub > 0){
			$pub_flag = 0;//wei
		}elseif($count_tab4 == 0){
			$pub_flag = 1;//wu
		}elseif($count_tab4 !=0 && $count_pub == 0){
			$pub_flag = 2;//yi
		}
		
		$result['pub_flag'] = $pub_flag;
		
		$result['headInfo'] = ['tab1'=>$count_tab1,'tab2'=>$count_tab2,'tab3'=>$count_tab3,'tab4'=>$count_tab4];
		
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
			$codes = [['perGender','XB'],['perJob','XZ'],['perGroupSet','ZBMC'],['perReResult1','FKJG'],['perReResult2','FKJG'],['perRead2','YDZK']];
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
		
		$result['exportInfo'] = ['condition'=>$condition];
		
		return $this->jsonReturn($result);		
	}

	public function actionExamineeGroupAuto(){
		$recID = Yii::$app->request->post('recID');
		$tableName = Share::MainTableName($recID);
		$gst_info = Setgroup::find()->where(['recID'=>$recID,'gstType'=>2])->orderBy('gstGroup asc')->asArray()->all();
		
		if(!empty($gst_info)){
			$per_infos = (new yii\db\Query())->select(['perID'])->from($tableName)->where(['AND',['perStatus'=>2,'perPub'=>1]])->all();	
			if(empty($per_infos)){
				$result = ['result'=>0,'msg'=>'暂时没有需要分组的人员'];
			}else{
				$per_len = count($per_infos);
				$gst_len = count($gst_info);
				$percent_gst_per = ceil($per_len/$gst_len);
				$index = 0;
				$check = 0;
				for($i = 0 ; $i < $gst_len ; $i++){
					for($k = 0 ; $k < $percent_gst_per ; $k++){
						if(!isset($per_infos[$index])){
							$check = 1;
							break;
						}
						Yii::$app->db->createCommand()->update($tableName,
											['perGroupSet'=>$gst_info[$i]['gstGroup']],
											['perID'=>$per_infos[$index]['perID']]
										)->execute();
						$index++;
					}
					if($check == 1){
						break;
					}
				}
				$result = ['result'=>1,'msg'=>'分组成功'];
			}
		}else{
			$result = ['result'=>0,'msg'=>'请先在“组别设置”中设置考生组别'];
		}
		
		return $this->jsonReturn($result);
	}

	public function actionExamineeGroupValidate(){
		$recID = Yii::$app->request->post('recID');
		$gst_count = Setgroup::find()->where(['recID'=>$recID,'gstType'=>2])->count();
		if($gst_count){
			$result = ['result'=>1,'msg'=>'请先在“组别设置”中设置考生组别'];
		}else{
			$result = ['result'=>0];
		}
		return $this->jsonReturn($result);
	}
	
	public function actionExamineeGroupBatch(){
		$request = Yii::$app->request;
		$perGroupSet = $request->post('perGroupSet');
		$perIDs = $request->post('perIDs');
		$recID = $request->post('recID');
		Yii::$app->db->createCommand()->update(Share::MainTableName($recID), ['perGroupSet' => $perGroupSet], ['perID'=>$perIDs])->execute();
		
		return $this->jsonReturn(['result'=>1,'批量分组成功']);
	}
	
	public function actionExamineeAutoTicket(){
		$recID = Yii::$app->request->post('recID');
		
		$tableName = Share::MainTableName($recID);		
		$per_infos = (new yii\db\Query())->select(['perID','perIndex','perJob'])->from($tableName)->where(['AND',['perStatus'=>2,'perPub'=>1]])->all();
		
		if(empty($per_infos)){
			$result = ['result'=>0,'msg'=>'当前暂时没有数据，不需要生成准考证号'];
		}else{
			$recInfo = Recruit::findOne($recID);
			$rec_year = $recInfo['recYear'];
			$rec_batch = $recInfo['recBatch'];
			
			foreach($per_infos as $per){
				Yii::$app->db->createCommand()->update(Share::MainTableName($recID), 
							['perTicketNo' =>$rec_year.$rec_batch.$per['perJob'].$per['perIndex']], ['perID'=>$per['perID']]
						)->execute();
			}
			
			$result = ['result'=>1,'msg'=>'生成准考证号成功'];
		}
		
		return $this->jsonReturn($result);
	}
	
	public function actionExamineeDownload(){
		$recID = Yii::$app->request->get('recID');
		
		$recInfo = Recruit::find()->where(['recID'=>$recID])->asArray()->one();
		$codeInfo = Share::codeValue([['recBatch','PC']],$recInfo);
		
		$fileTitle = $recInfo['recYear']."年".$codeInfo['recBatch']."XXXXXX人才招聘签到表（考生）";
		
		$infos = (new yii\db\Query())	
						->select([ 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perTicketNo','perGroupSet'])
						->from(Share::MainTableName($recID))
						->where(['perStatus'=>2,'perPub'=>1])
						->orderby('perGroupSet asc')
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perGroupSet','ZBMC']];
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
		
		@ini_set('memory_limit', '2048M');
		set_time_limit(0);
		error_reporting(E_ALL);
		date_default_timezone_set('PRC');
		$fileName = $fileTitle.date('Y-m-d',time()).time();
		$excelInfo = Share::getKeyInfo('flow4_step4_mb');
		
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
					//$objPHPExcel->getActiveSheet(0)->getStyle($pcoordinate)->applyFromArray(Share::ExcelStyleArrayInfoSet(3));
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
	
	public function actionExamineeExportStep4(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$conditionEN = $request->get('condition');
		$condition = Share::object_to_array(json_decode($conditionEN));
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perTicketNo','perGroupSet','perRead2','perReResult1','perReGiveup1','perReTime1','perReResult2','perReGiveup2','perReTime2'])
						->from(Share::MainTableName($recID))
						->where($condition)
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perGroupSet','ZBMC'],['perReResult1','FKJG'],['perReResult2','FKJG'],['perRead2','YDZK']];
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
		Share::exportCommonExcel(['sheet0'=>['data'=>$jsonData],'key'=>'flow4_step4_export','fileInfo'=>['fileName'=>'考生分组信息']]);
	}
	
	public function actionExamineeNoticembSave(){
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$ntsID = $request->post('ntsID');
		$ntsTitle = $request->post('ntsTitle');
		$ntsContent = $request->post('ntsContent');
		
		if($ntsID == ""){
			$noticemb = new Noticemb();
			$noticemb->recID = $recID;
			$noticemb->ntsTitle = $ntsTitle;
			$noticemb->ntsType = 1;
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
	
	public function actionExamineeNoticePub(){
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$flag_noticemb = Noticemb::find()->where(['recID'=>$recID,'ntsType'=>1])->count();
		if(intval($flag_noticemb) > 0){
			$flag = Yii::$app->db->createCommand()->update(Share::MainTableName($recID),[
							'perPub2'=>1,
							],['perStatus'=>2,'perPub'=>1])
						->execute();
			if($flag !== false){
				if(!$flag){
					$result = ['result'=>0,'msg'=>'已经全部发布过了'];
				}else{
					$result = ['result'=>1,'msg'=>'发布成功'];
				}
			}else{
				$result = ['result'=>0,'msg'=>'发布失败'];
			}
		}else{
			$result = ['result'=>0,'msg'=>'您还未编辑考试安排通知，请先编辑考试安排'];
		}
		return $this->jsonReturn($result);
	}
	
	public function actionExamResultList(){
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$flag =  intval($request->post('flag'));
		$perName = $request->post('perName');
		$perIDCard = $request->post('perIDCard');
		$perTicketNo = $request->post('perTicketNo');
		$perExamResult =$request->post('perExamResult');
		
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
		
		$condition = ['AND',['perReResult2'=>'01']];
		
		if($flag == 1){
			$condition[] = ['and', ['perExamResult' =>0]];
		}elseif($flag == 2){
			$condition[] = ['and', ['perExamResult' =>1]];
		}elseif($flag == 3){
			$condition[] = ['and', ['perExamResult' =>[2,3]]];
		}
		
		$count_tab1 = (new yii\db\Query())->from($tableName)->where(['AND',['perReResult2'=>'01'],['perExamResult' =>0]])->count();
		$count_tab2 = (new yii\db\Query())->from($tableName)->where(['AND',['perReResult2'=>'01'],['perExamResult' =>1]])->count();
		$count_tab3 = (new yii\db\Query())->from($tableName)->where(['AND',['perReResult2'=>'01'],['perExamResult' =>[2,3]]])->count();
		$count_tab4 = (new yii\db\Query())->from($tableName)->where(['AND',['perReResult2'=>'01']])->count();
		
		$count_pub = (new yii\db\Query())->from($tableName)->where(['AND',['perReResult2'=>'01','perPub3'=>0]])->count();
		
		if($count_tab4 !=0 && $count_pub > 0){
			$pub_flag = 0;//wei
		}elseif($count_tab4 == 0){
			$pub_flag = 1;//wu
		}elseif($count_tab4 !=0 && $count_pub == 0){
			$pub_flag = 2;//yi
		}
		
		$result['pub_flag'] = $pub_flag;
		
		$result['headInfo'] = ['tab1'=>$count_tab1,'tab2'=>$count_tab2,'tab3'=>$count_tab3,'tab4'=>$count_tab4];
		
		if($perName != ""){
			$condition[] = ['AND',['like','perName',$perName]];
		}
		
		if($perTicketNo != ""){
			$condition[] = ['AND',['like','perTicketNo',$perTicketNo]];
		}
		
		if($perIDCard != ""){
			$condition[] = ['AND',['like','perIDCard',$perIDCard]];
		}
		
		if($perExamResult != ""){
			$condition[] = ['AND',['perExamResult' => $perExamResult]];
		}
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perTicketNo','perGroupSet','perViewScore','perPenScore','perGradePub','perExamResult','perRead3','perReResult3','perReGiveup3','perReTime3'])
						->from($tableName)
						->where($condition)
						->orderby($orderInfo)
						->offset($offset)
						->limit($rows)
						->all();
		$jsonData = [];
		$stt_info = Standartline::find()->where(['recID'=>$recID])->asArray()->one();
		$result['stt_info'] = $stt_info;
		
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perGroupSet','ZBMC'],['perReResult3','FKJG'],['perRead3','YDZK'],['perGradePub','GS']];
			if(!empty($stt_info)){
				$stt_view = bcdiv($stt_info['sttView'],'100',2);
				$stt_pen = bcdiv($stt_info['sttPen'],'100',2);
				foreach($infos as $info){
					$mainCode = Share::codeValue($codes,$info);
					if($info['perViewScore'] != '' || $info['perPenScore'] != ''){
						$view_score = $info['perViewScore'] == '' ? 0 : intval($info['perViewScore']);
						$pen_score = $info['perPenScore'] == '' ? 0 : intval($info['perPenScore']);
						$mainCode['perViewPenScore'] = bcadd(bcmul($stt_view,$view_score,2),bcmul($stt_pen,$pen_score,2),2);
					}
					$jsonData[] = array_merge($info,$mainCode);
				}
			}else{
				foreach($infos as $info){
					$mainCode = Share::codeValue($codes,$info);
					$jsonData[] = array_merge($info,$mainCode);
				}
			}
		}
		
		$count = (new yii\db\Query())	->from($tableName)->where($condition)->count();
		
		$result['rows'] = $jsonData;
		$result['total'] = $count;
		
		$result['exportInfo'] = ['condition'=>$condition];
		
		return $this->jsonReturn($result);
	}
	
	public function actionExamResultImportmb(){
		$recID = Yii::$app->request->get('recID');
		
		$infos = (new yii\db\Query())	
						->select(['perIndex', 'perName','perGender','perIDCard','perJob','perPhone','perTicketNo','perGroupSet','perViewScore','perPenScore'])
						->from(Share::MainTableName($recID))
						->where(['perReResult2'=>'01'])
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perGroupSet','ZBMC']];
			foreach($infos as $info){
				$mainCode = Share::codeValue($codes,$info);
				$jsonData[] = array_merge($info,$mainCode);
			}
		}
		
		@ini_set('memory_limit', '2048M');
		set_time_limit(0);
		error_reporting(E_ALL);
		date_default_timezone_set('PRC');
		$fileName = '考生考试导入模板信息'.date('Y-m-d',time()).time();
		$excelInfo = Share::getKeyInfo('flow4_step5_mb');
		
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
	
	public function actionExamResultUpexcelSure(){
		$db = Yii::$app->db->createCommand();
		$filePath = Yii::$app->request->post('filePath');
		$recID = Yii::$app->request->post('recID');
        $reader = \PHPExcel_IOFactory::createReader('Excel5');
        $PHPExcel = $reader->load($filePath); 
        $sheet = $PHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); 
        $highestColumm = $sheet->getHighestColumn();
        $highestColumm= \PHPExcel_Cell::columnIndexFromString($highestColumm);
        if($highestColumm != 11){
            return $this->jsonReturn(['result'=>0,'msg'=>'模版不正确']);
        }
        $keys = ['perIndex', 'perName','perGender','perIDCard','perJob','perPhone','perTicketNo','perGroupSet','perViewScore','perPenScore'];
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
		
        foreach($datas as $per){
        	
			if($per['perIndex'] == ''){
				$errorInfo .= '第'.$index.'行报名序号不能为空！<br/>';
			}
			if($per['perIDCard'] == ''){
				$errorInfo .= '第'.$index.'行身份证号不能为空！<br/>';
			}
			if($per['perTicketNo'] == ''){
				$errorInfo .= '第'.$index.'行准考证号不能为空！<br/>';
			}
			
			if($per['perViewScore'] != '' &&  !is_numeric(trim($per['perViewScore']))){
				$errorInfo .= '第'.$index.'行面试成绩格式错误！<br/>';
			}
			if($per['perViewScore'] != '' && is_numeric(trim($per['perViewScore'])) ){
				if(intval($per['perViewScore']) > 200){
					$errorInfo .= '第'.$index.'行面试成绩不允许大于200！<br/>';
				}
			}
			if($per['perPenScore'] != '' &&  !is_numeric(trim($per['perPenScore']))){
				$errorInfo .= '第'.$index.'行笔试成绩格式错误！<br/>';
			}
			if($per['perPenScore'] != '' && is_numeric(trim($per['perPenScore'])) ){
				if(intval($per['perPenScore']) > 200){
					$errorInfo .= '第'.$index.'行笔试成绩不允许大于200！<br/>';
				}
			}
			if($per['perIndex'] != "" && $per['perIDCard'] != "" && $per['perTicketNo'] != ""){
				$per_count = (new yii\db\Query())	
							->from($tableName)
							->where(['perReResult2'=>'01','perIndex'=>$per['perIndex'],'perIDCard'=>$per['perIDCard'],'perTicketNo'=>$per['perTicketNo']])
							->count();
					
				if($per_count == 0){
					$errorInfo .= '第'.$index.'行报名序号，身份证和准考证号不匹配！<br/>';
				}
					
			}
            $index++;
        }
		
		$update_flag_msg = "";
		if($errorInfo != ''){
			return $this->jsonReturn(['result'=>0,'msg'=>$errorInfo]);
		}else{
			$stt_info = Standartline::find()->where(['recID'=>$recID])->asArray()->one();
			if(!empty($stt_info)){
				$stt_view = bcdiv($stt_info['sttView'],'100',2);
				$stt_pen = bcdiv($stt_info['sttPen'],'100',2);
				$stt_final_score = $stt_info['sttFinalScore'];
				
				foreach($datas as $per){
					if($per['perViewScore'] != '' || $per['perPenScore'] != ''){
						$view_score = $per['perViewScore'] == '' ? 0 : intval($per['perViewScore']);
						$pen_score = $per['perPenScore'] == '' ? 0 : intval($per['perPenScore']);
						$perExamResult = bcadd(bcmul($stt_view,$view_score,2),bcmul($stt_pen,$pen_score,2),2) < $stt_final_score ? 2 : 1;
					}else if($per['perViewScore'] == '' && $per['perPenScore'] == ''){
						$perExamResult = 3;
					}
					
					$flag = $db	->	update($tableName,[
										'perViewScore'=>$per['perViewScore'],
										'perPenScore'=>$per['perPenScore'],
										'perExamResult'=>$perExamResult
									], [
										'perReResult2'=>'01',
										'perIndex'=>$per['perIndex'],
										'perIDCard'=>$per['perIDCard'],
										'perTicketNo'=>$per['perTicketNo']
									])->execute();
					if($flag !== false){
						
					}else{
						$update_flag_msg .= '姓名：'.$per['perName'].'数据插入失败<br/>';
					}
				}
			}else{
				foreach($datas as $per){
					$flag = $db	->	update($tableName,[
										'perViewScore'=>$per['perViewScore'],
										'perPenScore'=>$per['perPenScore']
									], [
										'perReResult2'=>'01',
										'perIndex'=>$per['perIndex'],
										'perIDCard'=>$per['perIDCard'],
										'perTicketNo'=>$per['perTicketNo']
									])->execute();
					if($flag !== false){
						
					}else{
						$update_flag_msg .= '姓名：'.$per['perName'].'数据插入失败<br/>';
					}
				}
			}
			if($update_flag_msg == ''){
				return $this->jsonReturn(['result'=>1,'msg'=>'导入成功！']);	
			}else{
				return $this->jsonReturn(['result'=>0,'msg'=>$update_flag_msg]);	
			}
		}
	}
	
	public function actionExamResultExport(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$conditionEN = $request->get('condition');
		$condition = Share::object_to_array(json_decode($conditionEN));
		
		$infos = (new yii\db\Query())	
						->select(['perIndex','perID', 'perName','perIDCard','perGender','perBirth','perJob','perPhone','perTicketNo','perGroupSet','perViewScore','perPenScore','perGradePub','perExamResult','perRead3','perReResult3','perReGiveup3','perReTime3'])
						->from(Share::MainTableName($recID))
						->where($condition)
						->all();
		$jsonData = [];
		if(!empty($infos)){
			$codes = [['perGender','XB'],['perJob','XZ'],['perGroupSet','ZBMC'],['perReResult3','FKJG'],['perRead3','YDZK'],['perGradePub','GS'],['perExamResult','KSJG']];
			$stt_info = Standartline::find()->where(['recID'=>$recID])->asArray()->one();
			if(!empty($stt_info)){
				$stt_view = bcdiv($stt_info['sttView'],'100',2);
				$stt_pen = bcdiv($stt_info['sttPen'],'100',2);
				foreach($infos as $info){
					$mainCode = Share::codeValue($codes,$info);
					if($info['perViewScore'] != '' || $info['perPenScore'] != ''){
						$view_score = $info['perViewScore'] == '' ? 0 : intval($info['perViewScore']);
						$pen_score = $info['perPenScore'] == '' ? 0 : intval($info['perPenScore']);
						$mainCode['perViewPenScore'] = bcadd(bcmul($stt_view,$view_score,2),bcmul($stt_pen,$pen_score,2),2);
					}else{
						$mainCode['perViewPenScore'] = null;
					}
					$jsonData[] = array_merge($info,$mainCode);
				}
			}else{
				foreach($infos as $info){
					$mainCode = Share::codeValue($codes,$info);
					$mainCode['perViewPenScore'] = null;
					$jsonData[] = array_merge($info,$mainCode);
				}
			}
		}
		Share::exportCommonExcel(['sheet0'=>['data'=>$jsonData],'key'=>'flow4_step5_export','fileInfo'=>['fileName'=>'考试结果信息']]);
	}



}
