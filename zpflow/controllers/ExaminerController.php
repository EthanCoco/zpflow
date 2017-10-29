<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Examiner;
use app\models\Gstexm;
use app\models\Share;

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
	
	
}
