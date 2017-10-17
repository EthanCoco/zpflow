<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Announce;
use app\models\Share;

class AnnounceController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionListInfo(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$ancType = $request->post('ancType');
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$listInfos = Announce::getListInfo($offset,$rows,['recID'=>$recID,'ancType'=>$ancType],"ancStatus desc,ancTime desc");
		
		return $listInfos;
	}
	
	public function actionPubAnnounce(){
		date_default_timezone_set('PRC');
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$ancID = Yii::$app->request->post('ancID');
		$ancStatus = intval(Yii::$app->request->post('ancStatus'));
		if($ancStatus){
			$anc = Announce::findOne($ancID);
			$anc->ancStatus = $ancStatus;
			$anc->ancTime = date('Y-m-d H:i:s',time());
			if($anc->save()){
				return ['result'=>1,'msg'=>'发布成功'];
			}else{
				return ['result'=>0,'msg'=>'发布失败'];
			}
		}else{
			$anc = Announce::findOne($ancID);
			$anc->ancStatus = $ancStatus;
			$anc->ancTime = null;
			if($anc->save()){
				return ['result'=>1,'msg'=>'取消发布成功'];
			}else{
				return ['result'=>0,'msg'=>'取消发布失败'];
			}
		}
	}
	
	public function actionDelAnnounce(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$ancIDs = Yii::$app->request->post('ancIDs');
		if(Announce::deleteAll(['ancID'=>$ancIDs])){
			return ['result'=>'1','msg'=>'删除成功'];
		}else{
			return ['result'=>0,'msg'=>'删除失败'];
		}
	}
	
	public function actionRepair(){
		$request = Yii::$app->request;
		$flag = $request->get('flag');
		$ancType = $request->get('ancType');
		$ancID = $request->get('ancID','');
		return $this->renderPartial('flow2_repair',['flag'=>$flag,'ancID'=>$ancID,'ancType'=>$ancType]);
	}
}
