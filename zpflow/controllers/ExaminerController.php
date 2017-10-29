<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use yii\web\NotFoundHttpException;

use app\models\Examiner;
use app\models\Gstexm;
use app\models\Share;
use app\models\Recruit;

class ExaminerController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionListInfo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$exmName = $request->post('exmName');
		$exmType = $request->post('exmType');
		$type = intval($request->post('type'));
		
		if($type == 1){
			$condition = ['AND',['exmAttr'=>1,'recID'=>$recID]];
		}elseif($type == 2){
			$condition = ['AND',['exmAttr'=>2,'recID'=>$recID]];
		}else{
			$condition = ['AND',['recID'=>$recID]];
		}
		
		if($exmName != ""){
			$condition[] = ['AND',['like','exmName',$exmName]];
		}
		if($exmType != ""){
			$condition[] = ['AND',['exmType'=>$exmType]];
		}
		
		$sort = $request->post("sort"); 
        $order = $request->post("order","asc"); 
		
        if($sort){
	        $orderInfo = $sort.' '.$order;
        }else{
        	$orderInfo = 'exmID asc';
        }
		
		$result = [];
		
		$tab1 = Examiner::find()->where(['exmAttr'=>1,'recID'=>$recID])->count();
		$tab2 = Examiner::find()->where(['exmAttr'=>2,'recID'=>$recID])->count();
		$tab3 = Examiner::find()->where(['recID'=>$recID])->count();
		$result["headInfo"] = ['tab1'=>$tab1,'tab2'=>$tab2,'tab3'=>$tab3];
		
		$dataInfos = Examiner::find()->where($condition)->orderby($orderInfo)->asArray()->all();
		
		$result["rows"] = $dataInfos;
		
		$total = Examiner::find()->where($condition)->orderby($orderInfo)->count();;
		
		$result["total"] = $total;
		
		$result['exportInfo'] = ['condition'=>$condition];
		
		return $result;
	}

	public function actionExaminerSave(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$db = Yii::$app->db->createCommand();
		
		$exmID = $request->post('exmID');
		$data = $request->post()['Examiner'];
		
		if($exmID == ""){
			$result = $db	->	insert('examiner',$data)->execute();
			if($result){
				return ['result'=>1,'msg'=>'保存成功'];
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}else{
			$result = $db	->	update('examiner',$data, ['exmID'=>$exmID])->execute();
			if($result !== false){
				if(!$result){
					return ['result'=>0,'msg'=>'数据没有修改，不需要保存'];
				}else{
					return ['result'=>1,'msg'=>'保存成功'];
				}
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}
	}
	
	public function actionExaminerDel(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$exmIDs = $request->post('exmIDs');
		$recID = $request->post('recID');
		
		$flag = Gstexm::find()->where(['recID'=>$recID,'exmID'=>$exmIDs])->asArray()->count();
		if($flag > 0){
			return ['result'=>0,'msg'=>'勾选的考官中存在已被安排的考官，不能删除！'];
		}else{
			if(Examiner::deleteAll(['exmID'=>$exmIDs])){
				return ['result'=>1,'msg'=>'删除成功'];
			}else{
				return ['result'=>0,'msg'=>'删除失败'];
			}
		}
	}
	
	public function actionExaminerExport(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$conditionEN = $request->post('condition');
		$flag = $request->post('flag');
		$recID = $request->post('recID');
		$condition = Share::object_to_array(json_decode($conditionEN));
		
		$infos = Examiner::find()->where($condition)->asArray()->all();
		
		$dataJson = [];
		foreach($infos as $info){
			$codes = [['exmType','KGLB'],['exmAttr','KGSX']];
			$mainCode = Share::codeValue($codes,$info);
			$dataJson [] = array_merge($info,$mainCode);
		}
		
		$fileInfo = [];
		
		switch($flag){
			case '1' :
				$fileInfo = ['fileName'=>'公务员考官信息'];
				break;
			case '2' :
				$fileInfo = ['fileName'=>'其他考官信息'];
				break;
			case '3' :
				$fileInfo = ['fileName'=>'所有考官信息'];
				break;
			default :
				$fileInfo = ['fileName'=>''];
				break;
		}
		Share::exportCommonExcel(['sheet0'=>['data'=>$dataJson],'key'=>'flow4_step2','fileInfo'=>$fileInfo]);
	}
	
	public function actionExaminerImportmb(){
		$reader = \PHPExcel_IOFactory::createReader('Excel5');
		$PHPExcel = $reader->load('../web/mbfile/flow4_step_importmb.xls'); 
		ob_end_clean();
		$filename = iconv("utf-8","gb2312",'考官导入模板');
		header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename='.$filename.'.xls');
		header ( 'Cache-Control: max-age=0' );
		$objWriter = \PHPExcel_IOFactory::createWriter ($PHPExcel,'Excel5' );
		$objWriter->save ( 'php://output' );
		exit;
	}
	
	public function actionExaminerUpexcel(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		date_default_timezone_set('PRC');
		$file = $_FILES['file'];
		$timeNow = date('Y-m-d H:i:s',time());
		
		$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
		$timeNowMonth = $recInfo['recYear'].$recInfo['recBatch'];
		
		$fileName = time().'.xls';
		
		if($_FILES['file']['size'] > 2*1024*1024){
			return ['code'=>'1','msg'=>'文件大小不能大于2M','data'=>['src'=>'']];
		}
		
		$createDir = './uploadfile/upexcel/'.$timeNowMonth;
		
		Share::mkdirs($createDir);
		
		move_uploaded_file($_FILES['file']['tmp_name'], $createDir."/".$fileName);
		
		$resultFile = $createDir."/".$fileName;
		
		return ['code'=>0,'msg'=>'','data'=>['src'=>$createDir."/".$fileName]];
	}
	
	public function actionExaminerUpexcelSure(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$filePath = $request->post('filePath');
		$recID = $request->post('recID');
        $reader = \PHPExcel_IOFactory::createReader('Excel5');
        $PHPExcel = $reader->load($filePath); 
        $sheet = $PHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数
        
        $highestColumm= \PHPExcel_Cell::columnIndexFromString($highestColumm);
		
        if($highestColumm != 9){
            return ['result'=>0,'msg'=>'模版不正确！'];
        }
		
        $keys = ['exmName','exmAttr','exmCom','exmType','exmPost','exmPhone','exmCertNo','exmTime'];
       
        $datas = [];
        $temp = 0;
        
        for ($row = 2; $row <= $highestRow; $row++){
            $temp = 0;
            $datatemp =[];
			$tempStr = "";
            for ($column = 1; $column < $highestColumm; $column++) {
            	$datatemp[$keys[$temp]] = $sheet->getCellByColumnAndRow($column, $row)->getValue();
				$tempStr .=$sheet->getCellByColumnAndRow($column, $row)->getValue();
				
                if($temp == 8){
                    break;
                }
                $temp++;
            }
			
			if($tempStr==""){
				break;
			}
            $datas[] = $datatemp;
        }
        //检测数据完整性
        if(empty($datas)){
            return ['result'=>0,'msg'=>'导入数据为空！'];
        }
		
        $index = 2;
        $errorInfo = '';
        $personIDdata = [];
		$postTemp = [];
		$numTemp = [];
		
        foreach($datas as $per){
        	if($per['exmName'] == ''&&$per['exmAttr'] == ''&&$per['exmCom'] == ''&&$per['exmType'] == ''&&$per['exmPost'] == ''&&$per['exmCertNo'] == ''&&$per['exmPhone'] == ''&&$per['exmTime'] == ''){
        		break;
        	}
			if($per['exmName'] == ''){
				$errorInfo .= '第'.$index.'行考官姓名未填写！<br/>';
			}
			if($per['exmAttr'] == ''){
				$errorInfo .= '第'.$index.'行考官属性未填写！<br/>';
			}
			if($per['exmCom'] == ''){
				$errorInfo .= '第'.$index.'行考官所在单位未填写！<br/>';
			}
			if($per['exmType'] == ''){
				$errorInfo .= '第'.$index.'行考官分类未填写！<br/>';
			}
			if($per['exmPost'] == ''){
				$errorInfo .= '第'.$index.'行考官职务未填写！<br/>';
			}
			if($per['exmCertNo'] == ''){
				$errorInfo .= '第'.$index.'行考官证书编号未填写！<br/>';
			}
			if($per['exmPhone'] == ''){
				$errorInfo .= '第'.$index.'行考官手机号未填写！<br/>';
			}
			if($per['exmPhone'] != ''){
				if(!preg_match("/^[\d]{11}$/", $per['exmPhone'])){
					$errorInfo .= '第'.$index.'行手机号填写不正确！<br/>';
				}
			}
			
			if($per['exmTime'] != ''){
				if(!preg_match("/^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$/", $per['exmTime'])){
					$errorInfo .= '第'.$index.'行到岗时间填写不正确！<br/>';
				}
			}
            $index++;
        }
		
		if($errorInfo != ''){
			return ['result'=>0,'msg'=>$errorInfo];
		}else{
			foreach($datas as $per){
				$examiner = new Examiner();
				$examiner->exmName = $per["exmName"];
				$exmTypeArr = explode('=', $per["exmType"]);
				$examiner->exmType = $exmTypeArr[0];
				$examiner->exmCom = $per["exmCom"];
				$examiner->exmPost = $per["exmPost"];
				$examiner->exmPhone = $per["exmPhone"];
				$examiner->exmCertNo = $per["exmCertNo"];
				
				if($per["exmTime"] != ""){
					$tA = explode("-", $per["exmTime"]);
					$a1 = $tA[0];
					if(strlen($tA[1])==1){
						$a1 .= "-0".$tA[1];
					}else{
						$a1 .="-".$tA[1];
					}
					if(strlen($tA[2])==1){
						$a1 .= "-0".$tA[2];
					}else{
						$a1 .="-".$tA[2];
					}
					$examiner->exmTime = $a1;
				}else{
					$examiner->exmTime = '';
				}
				
				$examiner->recID = $recID;
				$exmAttrArr = explode('=', $per["exmAttr"]);
				$examiner->exmAttr = $exmAttrArr[0];
				if($examiner->save()){
					
				}else{
					throw new NotFoundHttpException();
				}
			}
			return ['result'=>1,'msg'=>'导入成功！'];	
		}
	}
}
