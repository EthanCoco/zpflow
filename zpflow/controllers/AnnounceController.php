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
			$anc->ancPubUid = Yii::$app->user->identity->uid;
			if($anc->save()){
				return ['result'=>1,'msg'=>'发布成功'];
			}else{
				return ['result'=>0,'msg'=>'发布失败'];
			}
		}else{
			$anc = Announce::findOne($ancID);
			$anc->ancStatus = $ancStatus;
			$anc->ancTime = null;
			$anc->ancPubUid = null;
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
			return ['result'=>1,'msg'=>'删除成功'];
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
	
	public function	actionRepairDo(){
		date_default_timezone_set('PRC');
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$request = Yii::$app->request;
		$ancStatus = intval($request->post('ancStatus'));
		$ancID = $request->post('ancID');
		$ancName = $request->post('ancName');
		$ancInfo = $request->post('ancInfo');
		$ancType = $request->post('ancType');
		
		if($ancID == ""){
			$anc = new Announce();
		}else{
			$anc = Announce::findOne($ancID);
		}
		$anc->recID = $request->post('recID');
		$anc->ancName = $ancName;
		$anc->ancInfo = $ancInfo;
		$anc->ancStatus = $ancStatus;
		$anc->ancType = $ancType;
		if($ancStatus){
			$anc->ancPubUid = Yii::$app->user->identity->uid;
			$anc->ancTime = date('Y-m-d H:i:s',time());
			if($anc->save()){
				return ['result'=>1,'msg'=>'发布成功'];
			}else{
				return ['result'=>0,'msg'=>'发布失败'];
			}
		}else{
			if($anc->save()){
				return ['result'=>1,'msg'=>'保存成功'];
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}
	}
	
	public function actionGetAnnounce(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$ancID = Yii::$app->request->post('ancID');
		$info = Announce::findOne($ancID);
		return $info;
	}
	
	public function actionViewAnnounce(){
		$request = Yii::$app->request;
		$ancID = $request->get('ancID','');
		$info = Announce::findOne($ancID);
		return $this->renderPartial('flow2_view',['ancID'=>$ancID,'info'=>$info]);
	}
}
