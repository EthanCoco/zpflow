<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Code;
use app\models\Setgroup;
use app\models\Gstexm;

class SetgroupController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionGetGroup(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$groupInfo = Code::find()->select(["codeID id","codeName text","codeTypeID"])->where(['codeTypeID'=>'ZBMC'])->orderby('codeOrder asc')->asArray()->all();
		return $groupInfo;
	}
	
	public function actionListInfo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$gstType = $request->post('gstType');
		$sort = $request->post("sort"); 
        $order = $request->post("order","asc"); 
        
        if($sort == 'gstStartEnd'){
        	$sort = 'gstItvStartTime';
        }
        
        if($sort){
	        $orderInfo = $sort.' '.$order;
        }else{
        	$orderInfo = 'gstItvStartTime asc,gstType ASC';
        }
		
		$result = [];
		
		$gstType1_num = Setgroup::find()->where(['recID'=>$recID,'gstType'=>'1'])->asArray()->count();
		$gstType2_num = Setgroup::find()->where(['recID'=>$recID,'gstType'=>'2'])->asArray()->count();
		$result["headInfo"] = ['gstType1'=>$gstType1_num,'gstType2'=>$gstType2_num];
		
		$dataInfos = Setgroup::find()->where(['recID'=>$recID,'gstType'=>$gstType])->orderby($orderInfo)->asArray()->all();
		
		$result["rows"] = $dataInfos;
		
		$total = $gstType == "1" ? $gstType1_num : $gstType2_num;
		
		$result["total"] = $total;
		
		return $result;
	}
	
	public function actionSaveSetgroup(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$gstType = $request->post('gstType');
		$info = $request->post('paramInfoMod');
		
		if(!empty($info)){
			if($info['gstID'] != "0"){
				$tempA = [
							'gstID'				=>	intval($info['gstID']),
							'recID'				=>	$recID,
							'gstItvStartTime'	=>	$info['gstItvStartTime'],
							'gstItvEndTime'		=>	$info['gstItvEndTime'],
							'gstGroup'			=>	$info['gstGroup'],
							'gstItvPlace'		=>	$info['gstItvPlace'],
							'gstType'			=>	$gstType
						];
				$modFlag = Setgroup::find()->where($tempA)->asArray()->count();
				if($modFlag == 1){
					return ['result'=>0,'msg'=>'数据没有修改过，不需要保存'];
				}
				
				$groupFlag = Setgroup::find()->where(['AND',["recID"=>$recID,"gstGroup"=>$info['gstGroup'],'gstType'=>$gstType],['not',['gstID'=>$info['gstID']]]])->asArray()->count();
				if($groupFlag > 0){
					return ['result'=>0,'msg'=>'组别已经设置过了'];
				}
				$sgp = Setgroup::findOne(['gstID'=>$info['gstID']]);
		        $sgp->recID = $recID;
		        $sgp->gstItvStartTime = $info['gstItvStartTime'];
		        $sgp->gstItvEndTime = $info['gstItvEndTime'];
				$sgp->gstGroup = $info['gstGroup'];
				$sgp->gstItvPlace = $info['gstItvPlace'];
				$sgp->gstType = $gstType;
				$sgp->gstStartEnd = $info['gstItvStartTime'] . ' 至 ' . $info['gstItvEndTime'];
				if($sgp->save()){
					return ['result'=>1,'msg'=>'保存成功'];
				}else{
					return ['result'=>0,'msg'=>'保存失败'];
				}
			}else{
				$groupFlag = Setgroup::find()->where(["recID"=>$recID,"gstGroup"=>$info['gstGroup'],'gstType'=>$gstType])->asArray()->count();//判断是否修改过数据
				if($groupFlag > 0){
					return ['result'=>0,'msg'=>'组别已经设置过了'];
				}
				$sgp = new Setgroup();
		        $sgp->recID = $recID;
		        $sgp->gstItvStartTime = $info['gstItvStartTime'];
		        $sgp->gstItvEndTime = $info['gstItvEndTime'];
				$sgp->gstGroup = $info['gstGroup'];
				$sgp->gstItvPlace = $info['gstItvPlace'];
				$sgp->gstType = $gstType;
				$sgp->gstStartEnd = $info['gstItvStartTime'] . ' 至 ' . $info['gstItvEndTime'];
				if($sgp->save()){
					return ['result'=>1,'msg'=>'保存成功'];
				}else{
					return ['result'=>0,'msg'=>'保存失败'];
				}
			}
		}
	}
	
	public function actionDelSetgroup(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$gstID = $request->post('gstID');
		$recID = $request->post('recID');
		
		$flag = Gstexm::find()->where(['recID'=>$recID,'gstID'=>$gstID])->asArray()->count();
		if($flag > 0){
			return ['result'=>0,'该组别已经在使用中，不能删除'];
		}else{
			if(Setgroup::deleteAll(['gstID'=>$gstID])){
				return ['result'=>1,'msg'=>'删除成功'];
			}else{
				return ['result'=>0,'msg'=>'删除失败'];
			}
		}
	}
}
