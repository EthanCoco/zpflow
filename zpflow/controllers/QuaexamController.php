<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;
use app\models\Qumextra;

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
		
		$isInfo = (new yii\db\Query())->from($tableName)->where(['AND',['not',['perStatus'=>0]]])->count();
		$isInfos = intval($isInfo) == 0 ? 0 : 1; 
		
		$noPubInfo = (new yii\db\Query())->from($tableName)->where(['perPub'=>0])->count();
		$pubInfo = (new yii\db\Query())->from($tableName)->where(['perPub'=>1])->count();
		
		return [
				'rows'=>$infos,
				'total'=>$count,
				'tabInfo'=>$tabJson,
				'exportInfo'=>['condition'=>$condition],
				'btnOperate'=>['isInfos'=>$isInfos],
				'headerInfo'=>['pub'=>$pubInfo,'nopub'=>$noPubInfo]
			];
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
	
	public function actionPerdetlQuaexam(){
		$request = Yii::$app->request;
		
		$recID = $request->get('recID');
		$perID = $request->get('perID');
		
		$mainInfo = (new \yii\db\Query())->from(Share::MainTableName($recID))->where(['perID'=>$perID])->one();
		$codes = [
					['perGender','XB'],['perJob','XZ'],['perNation','AI'],['perOrigin','AB'],['perPolitica','AG'],['perMarried','CG'],
					['perDegree','BC'],['perMajor','AJ'],['perEducation','XL'],['perForeignLang','MC'],['perComputerLevel','MD'],['perEduPlace','AB'],
				];
		$mainCode = Share::codeValue($codes,$mainInfo);
		$mainJson = array_merge($mainInfo,$mainCode);
		
		$tables_set = Share::SetTableNames($recID);
		$eduSetInfo = (new \yii\db\Query())->from($tables_set[0])->where(['perID'=>$perID])->orderby('eduStart asc')->all();
		$eduJson = [];
		if(!empty($eduSetInfo)){
			foreach($eduSetInfo as $edu){
				$edu_code = [['eduMajor','AJ']] ;
				$edu_code_info = Share::codeValue($edu_code,$edu);
				$eduJson[] = [
					'eduStart'	=>	!empty($edu['eduStart']) ? substr($edu['eduStart'], 0,10) : '',
					'eduEnd'	=>	!empty($edu['eduEnd']) ? substr($edu['eduEnd'], 0,10) : '',
					'eduSchool'	=>	$edu['eduSchool'],
					'eduMajor'	=>	$edu_code_info['eduMajor'],
					'eduPost'	=>	$edu['eduPost'],
					'eduBurseHonorary'	=>	$edu['eduBurseHonorary'],
				];
			}
		}
		
		$famSetInfo = (new \yii\db\Query())->from($tables_set[1])->where(['perID'=>$perID])->all();
		$famJson = [];
		if(!empty($famSetInfo)){
			foreach($famSetInfo as $fam){
				$fam_code = [['famRelation','JTGX']] ;
				$fam_code_info = Share::codeValue($fam_code,$fam);
				$famJson[] = [
					'famRelation'	=>	$fam_code_info['famRelation'],
					'famName'	=>	$fam['famName'],
					'famCom'	=>	$fam['famCom'],
					'famPost'	=>	$fam['famPost'],
				];
			}
		}
		
		$workSetInfo = (new \yii\db\Query())->from($tables_set[2])->where(['perID'=>$perID])->orderby('wkStart asc')->all();
		$workJson = [];
		if(!empty($workSetInfo)){
			foreach($workSetInfo as $work){
				$workJson[] = [
					'wkStart'	=>	!empty($work['wkStart']) ? substr($work['wkStart'], 0,10) : '',
					'wkEnd'		=>	!empty($work['wkEnd']) ? substr($work['wkEnd'], 0,10) : '',
					'wkPost'	=>	$work['wkPost'],
					'wkCom'		=>	$work['wkCom'],
					'wkInfo'	=>	$work['wkInfo'],
				];
			}
		}
		return $this->renderPartial('flow3_perdet',['base'=>$mainJson,'eduset'=>$eduJson,'famset'=>$famJson,'workset'=>$workJson]);
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
	
	public function actionExpclmQuaexam(){
		$type = Yii::$app->request->get('type');
		return $this->renderPartial('flow3_expclm',['type'=>$type]);
	}
	
	public function actionExportQuaexam(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$conditionEN = $request->post('condition');
		$type = $request->post('type');
		$flag = $request->post('flag');
		$recID = $request->post('recID');
		$condition = $this->object_to_array(json_decode($conditionEN));
		$tableName = Share::MainTableName($recID);
		$infos = 	(new yii\db\Query())->from($tableName)
										->where($condition)
										->orderby('perIndex asc')
										->all();
		
		$dataJson = [];
		foreach($infos as $info){
			$codes = [
					['perGender','XB'],['perJob','XZ'],['perNation','AI'],['perOrigin','AB'],['perPolitica','AG'],['perMarried','CG'],
					['perDegree','BC'],['perMajor','AJ'],['perEducation','XL'],['perForeignLang','MC'],['perComputerLevel','MD'],['perEduPlace','AB'],
					['perPub','GS'],['perStatus','SCJG'],['perReResult1','FKJG'],
				];
				
			$mainCode = Share::codeValue($codes,$info);
			$dataJson [] = array_merge($info,$mainCode);
		}
		
		$fileInfo = [];
		switch($flag){
			case '-1' : 
				$fileInfo = ['fileName'=>'资格审查所有人员信息'];
				break;
			case '1' :
				$fileInfo = ['fileName'=>'资格审查待审人员信息'];
				break;
			case '2' :
				$fileInfo = ['fileName'=>'资格审查通过审核人员信息'];
				break;
			case '3' :
				$fileInfo = ['fileName'=>'资格审查审核不通过人员信息'];
				break;
			default :
				$fileInfo = ['fileName'=>''];
				break;
		}
		
		if($type == 0){
			Share::exportCommonExcel(['sheet0'=>['data'=>$dataJson],'key'=>'flow3','fileInfo'=>$fileInfo]);
		}else{
			@ini_set('memory_limit', '2048M');
			set_time_limit(0);
			error_reporting(E_ALL);
			date_default_timezone_set('PRC');
			$fileName = $fileInfo['fileName'].date('Y-m-d',time()).time();
			
			$extracolumns = rtrim( trim($request->post('extracolumns')), '、');
			$ecolumns = $request->post('ecolumns');
			$zcolumns = $request->post('zcolumns');
			$keys = explode(',', $ecolumns);	
			$zkeys = explode(',', $zcolumns);
			if(!empty($extracolumns)){
				$extraInfo = explode('、', $extracolumns);
				$extraLen = count($extraInfo);
				for($i = 0; $i < $extraLen; $i++){
					array_push($zkeys,$extraInfo[$i]);
				}
			}
			$objPHPExcel = new \PHPExcel();
			$header = count($zkeys);
			$temp_header = 0;
			for($n = 0; $n < $header; $n++){
				if($temp_header == $header){
					break;
				}else{
					$pcoordinate = \PHPExcel_Cell::stringFromColumnIndex($n).''.'1';
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($pcoordinate, $zkeys[$temp_header]);
		            $temp_header++;
				}
			}
			
			$objPHPExcel -> getSheet(0) -> setTitle("人员基本信息");
			$num = 2;
			foreach($dataJson as $info){
				$column = count($keys);
				$temp = 0;
				for($n = 0; $n < $column; $n++){
					if($temp == $column){
						break;
					}else{
						$pcoordinate = \PHPExcel_Cell::stringFromColumnIndex($n).''.$num;
						if($keys[$temp] == 'id'){
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue($pcoordinate, ($num-1));
						}else{
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue($pcoordinate, ' ' . $info[$keys[$temp]] . ' ');
						}
			            $temp++;
					}
				}
				$num++;
			}
			
			ob_end_clean();
			$fileName = iconv("utf-8","gb2312",$fileName);
			header ( 'Content-Type: application/vnd.ms-excel' );
			header ( 'Content-Disposition: attachment;filename="'.$fileName.'.xls"'); 
			header ( 'Cache-Control: max-age=0' );
			$objWriter = \PHPExcel_IOFactory::createWriter ($objPHPExcel,'Excel5'); //在内存中准备一个excel2003文件
			$objWriter->save ( 'php://output' );
			exit;
		}
	}

	public function actionExtrapQuaexam(){
		$recID = Yii::$app->request->get('recID');
		$infos = Qumextra::find()->where(['recID'=>$recID])->one();
		return $this->renderPartial('flow3_extrap',['recID'=>$recID,'infos'=>$infos]);
	}
	
	public function actionSaveExtraQuaexam(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$qraPassType = $request->post('qraPassType');
		$qraPassMsg = $request->post('qraPassMsg');
		$qraNoPassType = $request->post('qraNoPassType');
		$qraNoPassMsg = $request->post('qraNoPassMsg');
		
		Qumextra::deleteAll(['recID'=>$recID]);
		$qumextra = new Qumextra();
		$qumextra->recID = $recID;
		$qumextra->qraPassType = $qraPassType;
		$qumextra->qraPassMsg = $qraPassMsg;
		$qumextra->qraNoPassType = $qraNoPassType;
		$qumextra->qraNoPassMsg = $qraNoPassMsg;
		if($qumextra->insert()){
			return ['result'=>1,'msg'=>'设置成功'];
		}else{
			return ['result'=>0,'msg'=>'设置失败'];
		}
	}
	
	public function actionPubckQuaexam(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$tableName = Share::MainTableName($recID);
		$flag = (new yii\db\Query())->from($tableName)->where(['perStatus'=>1])->count();
		return ['result'=>$flag];
	}
	
	public function actionPerpubQuaexam(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$recID = $request->post('recID');
		$type = intval($request->post('type'));
		$tableName = Share::MainTableName($recID);
		$db = Yii::$app->db->createCommand();
		$msg = ['公示全部通过人员','公示全部不通过人员','全部人员公示','公示勾选的人员'];
		
		if($type == 3){
			$perIDs = $request->post('perIDs');
			$flag = $db	->update($tableName,['perPub'=>1,],['perID'=>$perIDs])->execute();
		}elseif($type == 0){
			$flag = $db	->update($tableName,['perPub'=>1,],['perStatus'=>2])->execute();
		}elseif($type == 1){
			$flag = $db	->update($tableName,['perPub'=>1,],['perStatus'=>3])->execute();
		}elseif($type == 2){
			$flag = $db	->update($tableName,['perPub'=>1,],['perStatus'=>[2,3]])->execute();
		}
		
		if($flag !== false){
			return ['result'=>1,'msg'=>$msg[$type].'成功'];
		}else{
			return ['result'=>0,'msg'=>$msg[$type].'失败'];
		}
	}
	
	public function actionPerprintQuaexam(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$type = $request->get('type');
		$recID = $request->get('recID');
		$perIDs = $request->get('perIDs');
		$tableName = Share::MainTableName($recID);
		
		switch($type){
			case '0' : 
				$fileInfo = ['fileName'=>'全部人员','where'=>['AND',['not',['perStatus'=>0]]]];
				break;
			case '1' :
				$fileInfo = ['fileName'=>'全部审核人员','where'=>['perStatus'=>[2,3]]];
				break;
			case '2' :
				$fileInfo = ['fileName'=>'全部公示人员','where'=>['perPub'=>1]];
				break;
			case '3' :
				$fileInfo = ['fileName'=>'全部未审核人员','where'=>['perStatus'=>1]];
				break;
			case '4' :
				$fileInfo = ['fileName'=>'勾选人员','where'=>['perID'=>explode(',', $perIDs)]];
				break;
			default :
				$fileInfo = ['fileName'=>''];
				break;
		}
		
		$infos = 	(new yii\db\Query())->from($tableName)
										->where($fileInfo['where'])
										->orderby('perIndex asc')
										->all();
		
		$dataJson = [];
		foreach($infos as $info){
			$codes = [
					['perGender','XB'],['perJob','XZ'],['perNation','AI'],['perOrigin','AB'],['perPolitica','AG'],['perMarried','CG'],
					['perDegree','BC'],['perMajor','AJ'],['perEducation','XL'],['perForeignLang','MC'],['perComputerLevel','MD'],['perEduPlace','AB'],
					['perPub','GS'],['perStatus','SCJG'],['perReResult1','FKJG'],
				];
				
			$mainCode = Share::codeValue($codes,$info);
			$dataJson [] = array_merge($info,$mainCode);
		}
		
		@ini_set('memory_limit', '2048M');
		set_time_limit(0);
		error_reporting(E_ALL);
		$path = Yii::$app->basePath;
		header('Content-type:text/html;charset=utf-8');
		$dir = '../appExcelZip/'.time();
		$dh = mkdir($dir);
		$keysInfo = Share::getKeyInfo('flow3_print');
		$sheetIndex = $keysInfo['keys']['index'];
		$objReader = \PHPExcel_IOFactory::createReader ('Excel5');
		$objPHPExcel = $objReader->load($keysInfo['tempExcel']);
		$objPHPExcel->setActiveSheetIndex($sheetIndex);
		$temp_index = 8;
		foreach($dataJson as $per){
			$tables_set = Share::SetTableNames($recID);
			$eduSetInfo = (new \yii\db\Query())->from($tables_set[0])->where(['perID'=>$per['perID']])->orderby('eduStart asc')->all();
			$eduJson = [];
			if(!empty($eduSetInfo)){
				foreach($eduSetInfo as $edu){
					$edu_code = [['eduMajor','AJ']] ;
					$edu_code_info = Share::codeValue($edu_code,$edu);
					$eduJson[] = [
						'eduStart'	=>	!empty($edu['eduStart']) ? substr($edu['eduStart'], 0,10) : '',
						'eduEnd'	=>	!empty($edu['eduEnd']) ? substr($edu['eduEnd'], 0,10) : '',
						'eduSchool'	=>	$edu['eduSchool'],
						'eduMajor'	=>	$edu_code_info['eduMajor'],
						'eduPost'	=>	$edu['eduPost'],
						'eduBurseHonorary'	=>	$edu['eduBurseHonorary'],
					];
				}
			}
			
			$famSetInfo = (new \yii\db\Query())->from($tables_set[1])->where(['perID'=>$per['perID']])->all();
			$famJson = [];
			if(!empty($famSetInfo)){
				foreach($famSetInfo as $fam){
					$fam_code = [['famRelation','JTGX']] ;
					$fam_code_info = Share::codeValue($fam_code,$fam);
					$famJson[] = [
						'famRelation'	=>	$fam_code_info['famRelation'],
						'famName'	=>	$fam['famName'],
						'famCom'	=>	$fam['famCom'],
						'famPost'	=>	$fam['famPost'],
					];
				}
			}
			
			$workSetInfo = (new \yii\db\Query())->from($tables_set[2])->where(['perID'=>$per['perID']])->orderby('wkStart asc')->all();
			$workJson = [];
			if(!empty($workSetInfo)){
				foreach($workSetInfo as $work){
					$workJson[] = [
						'wkStart'	=>	!empty($work['wkStart']) ? substr($work['wkStart'], 0,10) : '',
						'wkEnd'		=>	!empty($work['wkEnd']) ? substr($work['wkEnd'], 0,10) : '',
						'wkPost'	=>	$work['wkPost'],
						'wkCom'		=>	$work['wkCom'],
						'wkInfo'	=>	$work['wkInfo'],
					];
				}
			}
						
			$objPHPExcel->getActiveSheet()->getProtection()->setPassword(Yii::$app->params['per_print_zip_secret']); 
			$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true); 
			$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true); 
			
			$objPHPExcel->getSecurity()->setLockWindows(true);
			$objPHPExcel->getSecurity()->setLockStructure(true);
			$objPHPExcel->getSecurity()->setWorkbookPassword(Yii::$app->params['per_print_zip_secret']);
			
			$title = "报名表-".$per['perName'];
			$objPHPExcel->getActiveSheet()->setTitle($title);
			$objPHPExcel->getActiveSheet()->setCellValue('B2',$per['perName']); 
			$objPHPExcel->getActiveSheet()->setCellValue('D2',$per['perGender']);  
			$objPHPExcel->getActiveSheet()->setCellValue('F2',$per['perBirth']); 
			if($per['perPhoto'] != null || $per['perPhoto'] != ''){//图片
				$str = substr($per['perPhoto'], 2);
				if(!file_exists(Yii::$app->basePath.$str)){
					$per['perPhoto'] = '';
				}else{
					$objDrawing = new \PHPExcel_Worksheet_Drawing();
					$objDrawing->setPath($per['perPhoto']);
					/*设置图片高度*/
					$objDrawing->setHeight(151);
					$objDrawing->setWidth(100);
					
					/*设置图片要插入的单元格*/
					$objDrawing->setCoordinates("H3");
					/*设置图片所在单元格的格式*/
					$objDrawing->setOffsetX(8);
					$objDrawing->setOffsetY(-38);
					$objDrawing->setRotation(25);
					$objDrawing->getShadow()->setVisible(true);
					$objDrawing->getShadow()->setDirection(45);
					$objDrawing->setWorksheet($objPHPExcel->getActiveSheet(0));
				}
			}else{
				$objPHPExcel->getActiveSheet()->setCellValue('H3',''); 
			}
			$objPHPExcel->getActiveSheet()->getStyle('H3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER); ; 
			
			$objPHPExcel->getActiveSheet()->setCellValue('B3',$per['perOrigin']); //籍贯 
			$objPHPExcel->getActiveSheet()->setCellValue('D3',$per['perNation']);//民族
			$objPHPExcel->getActiveSheet()->getStyle('D3')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->setCellValue('F3',$per['perPolitica']);//政治面貌
			$objPHPExcel->getActiveSheet()->getStyle('B3')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->getStyle('D3')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->getStyle('F3')->getAlignment()->setWrapText(true); 
			
			$objPHPExcel->getActiveSheet()->setCellValue('B4',$per['perEducation']); //学历 
			$objPHPExcel->getActiveSheet()->setCellValue('D4',$per['perDegree']);//学位
			$objPHPExcel->getActiveSheet()->getStyle('B4')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->getStyle('D4')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->setCellValue('F4',$per['perMarried']);//婚姻状况
			$objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->getStyle('B4')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->getStyle('D4')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->getStyle('F5')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->setCellValue('B5',$per['perForeignLang']); //外语水平 
			$objPHPExcel->getActiveSheet()->setCellValue('D5',$per['perComputerLevel']);//计算机水平
			$objPHPExcel->getActiveSheet()->setCellValue('F5',$per['perEduPlace']);//毕业生生源地
			$objPHPExcel->getActiveSheet()->getStyle('B5')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->getStyle('D5')->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->getStyle('F5')->getAlignment()->setWrapText(true); 
			
			$objPHPExcel->getActiveSheet()->setCellValue('C6',$per['perUniversity'].' '.$per['perMajor']);//毕业院校及专业
			$objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setWrapText(true); 

			$objPHPExcel->getActiveSheet()->setCellValue('F6',$per['perJob']);//应聘岗位性质
			
			$objPHPExcel->getActiveSheet()->setCellValue('B7',$per['perPhone']); //联系电话 
			$objPHPExcel->getActiveSheet()->setCellValue('D7',$per['perEmail']);//电子邮箱
			$objPHPExcel->getActiveSheet()->setCellValue('F7',$per['perPostCode']);//邮政编码
			$objPHPExcel->getActiveSheet()->setCellValue('B8',$per['perAddr']);//通讯地址
			$objPHPExcel->getActiveSheet()->getStyle('B8')->getAlignment()->setWrapText(true); 
			
			/*学习经历情况*/			
			$temp_index++;
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'I'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'学习情况'); 
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true); 
			
			$temp_index++;
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'B'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'B'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'起止时间');
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$temp_index,'在何学校');
			$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$temp_index,'所学专业');
			$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->getStyle('E'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$temp_index,'任职职务');
			$objPHPExcel->getActiveSheet()->getStyle('E'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->mergeCells('F'.$temp_index.':'.'I'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$temp_index,'奖学金及荣誉称号');
			$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index)->getAlignment()->setWrapText(true);
			
			//学习情况
			$temp_index++;
			if(!empty($eduJson)){
				foreach($eduJson as $edu){
					$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'B'.$temp_index);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'B'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,$edu['eduStart'].'-'.$edu['eduEnd']);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('C'.$temp_index,$edu['eduSchool']);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('D'.$temp_index,$edu['eduMajor']);
					$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->getStyle('E'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('E'.$temp_index,$edu['eduPost']);
					$objPHPExcel->getActiveSheet()->getStyle('E'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->mergeCells('F'.$temp_index.':'.'I'.$temp_index);
					$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('F'.$temp_index,$edu['eduBurseHonorary']);
					$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index)->getAlignment()->setWrapText(true);
					$temp_index++;
				}
			}else{
				$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'I'.$temp_index);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
					['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
				);
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'暂无学习情况信息'); 
				$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true); 
				$temp_index++;
			}
			
			/*工作经历*/	
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'I'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'工作经历'); 
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true); 
			
			$temp_index++;
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'B'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'B'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'起止时间');
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$temp_index,'截止时间');
			$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$temp_index,'所在岗位');
			$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->getStyle('E'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$temp_index,'所在单位');
			$objPHPExcel->getActiveSheet()->getStyle('E'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->mergeCells('F'.$temp_index.':'.'I'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$temp_index,'工作简述');
			$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index)->getAlignment()->setWrapText(true);
			
			//工作经历
			$temp_index++;
			if(!empty($workJson)){
				foreach($workJson as $work){
					$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'B'.$temp_index);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'B'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,$work['wkStart']);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('C'.$temp_index,$work['wkEnd']);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('D'.$temp_index,$work['wkPost']);
					$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->getStyle('E'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('E'.$temp_index,$work['wkCom']);
					$objPHPExcel->getActiveSheet()->getStyle('E'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->mergeCells('F'.$temp_index.':'.'I'.$temp_index);
					$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('F'.$temp_index,$work['wkInfo']);
					$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index)->getAlignment()->setWrapText(true);
					$temp_index++;
				}
			}else{
				$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'I'.$temp_index);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
					['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
				);
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'暂无工作经历信息'); 
				$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true);
				$temp_index++; 
			}
			
			/*家庭成员信息*/	
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'I'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'家庭成员'); 
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true); 
			
			$temp_index++;
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'B'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'B'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'成员关系');
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$temp_index,'成员姓名');
			$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->mergeCells('D'.$temp_index.':'.'E'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index.':'.'E'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$temp_index,'所在工作单位');
			$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->mergeCells('F'.$temp_index.':'.'I'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$temp_index,'任职岗位');
			$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index)->getAlignment()->setWrapText(true);
			
			//家庭成员
			$temp_index++;
			if(!empty($famJson)){
				foreach($famJson as $fam){
					$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'B'.$temp_index);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'B'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,$fam['famRelation']);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('C'.$temp_index,$fam['famName']);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->mergeCells('D'.$temp_index.':'.'E'.$temp_index);
					$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index.':'.'E'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					$objPHPExcel->getActiveSheet()->setCellValue('D'.$temp_index,$fam['famCom']);
					$objPHPExcel->getActiveSheet()->getStyle('D'.$temp_index)->getAlignment()->setWrapText(true);
					
					$objPHPExcel->getActiveSheet()->mergeCells('F'.$temp_index.':'.'I'.$temp_index);
					$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
						['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
					);
					
					$objPHPExcel->getActiveSheet()->setCellValue('F'.$temp_index,$fam['famPost']);
					$objPHPExcel->getActiveSheet()->getStyle('F'.$temp_index)->getAlignment()->setWrapText(true);
					
					$temp_index++;
				}
			}else{
				$objPHPExcel->getActiveSheet()->mergeCells('A'.$temp_index.':'.'I'.$temp_index);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
					['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
				);
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'暂无家庭成员信息'); 
				$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true); 
				$temp_index++;
			}
			
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$temp_index,'备注');
			$objPHPExcel->getActiveSheet()->getStyle('A'.$temp_index)->getAlignment()->setWrapText(true);
			
			$objPHPExcel->getActiveSheet()->mergeCells('B'.$temp_index.':'.'I'.$temp_index);
			$objPHPExcel->getActiveSheet()->getStyle('B'.$temp_index.':'.'I'.$temp_index)->applyFromArray(
				['borders'=>['allborders'=>['style'=> \PHPExcel_Style_Border::BORDER_THIN]]]
			);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$temp_index,$per['perMark']); 
			$objPHPExcel->getActiveSheet()->getStyle('B'.$temp_index)->getAlignment()->setWrapText(true); 
			
			$fileName = iconv("utf-8","gb2312",$title);
			$dirName = substr($dir,2);
			$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save($path.$dirName.'/'.$fileName.'.xls'); //文件保存到服务器
		}
		$zip = new \PHPZip(); 
		$zip->ZipAndDownload($dir,'考生报名表');
		exit;
	}

	public function actionSendmsgQuaexam(){
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$type = $request->get('type');
		$perIDs = $request->get('perIDs');
		return $this->renderPartial('flow3_sendmsg',['recID'=>$recID,'type'=>$type,'perIDs'=>$perIDs]);
	}
	
	public function actionSendInfoQuaexam(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$recID = $request->get('recID');
		$type = $request->get('type');
		$perIDs = $request->get('perIDs');
		$tableName = Share::MainTableName($recID);
		//var msgtip = ['通过人员','未通过人员','已审核人员','勾选人员'];
		switch($type){
			case '0' : 
				$condition = ['perStatus'=>2];
				break;
			case '1' :
				$condition = ['perStatus'=>3];
				break;
			case '2' :
				$condition = ['perStatus'=>[2,3]];
				break;
			case '3' :
				$condition = ['perID'=>explode(',', $perIDs)];
				break;
			default :
				$condition = ['where'=>[]];
				break;
		}
		
		$infos = 	(new yii\db\Query())->select(['perName','perIndex','perPhone','perStatus','perPub'])
										->from($tableName)
										->where($condition)
										->orderby('perIndex asc')
										->all();
		return ['rows'=>$infos];
	}
	
	public function actionSendDoQuaexam(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$perPhones = Yii::$app->request->get('perPhones');
		$content = Yii::$app->request->get('content');
		
		$juheKey = Yii::$app->params['juhe_key'];//您申请的APPKEY
		$tpl_id = Yii::$app->params['juhe_tpl_id'];//您申请的短信模板ID，根据实际情况修改
		$tpl_value = '#content#='.$content;//您设置的模板变量，根据实际情况修改
		
		$phones = explode(',', $perPhones);
		$len = count($phones);
		$flag = 0;
		$msg_error = '失败发送：<br/>';
		$msg_success = '发送成功：<br/>';
		$_msg_success_temp = '发送成功：<br/>';
		for($i = 0; $i < $len ; $i++){
			$smsConf = [
			    'key'   => $juheKey, 
			    'mobile'    => $phones[$i], 
			    'tpl_id'    => $tpl_id, 
			    'tpl_value' =>$tpl_value 
			];
			$responseContent = Share::juhecurl($smsConf,1); //请求发送短信
			if($responseContent){
				$result = json_decode($responseContent,true);
    			$error_code = $result['error_code'];
				if($error_code != 0){
					$flag++;
					$msg_error .= "手机号码=".$phones[$i]."；失败原因：". $result['reason']."<br/>";
				}else{
					$msg_success .= "手机号码=".$phones[$i]."<br/>";
				}
			}else{
				$msg_error .= "手机号码=".$phones[$i]."；失败原因：请求失败<br/>";
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
			return ['result'=>0,'msg'=>$msg];
		}else{
			return ['result'=>1,'msg'=>'发送成功'];
		}
	}
}
