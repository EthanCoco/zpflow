<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Announce;
use app\models\Share;

class AnnounceController extends BaseController{
	public function actionListInfo(){
		$request = Yii::$app->request;
		
		$recID = $request->post('recID');
		$ancType = $request->post('ancType');
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$listInfos = Announce::getListInfo($offset,$rows,['recID'=>$recID,'ancType'=>$ancType],"ancStatus desc,ancTime desc");
		
		return $this->jsonReturn($listInfos);
	}
	
	public function actionPubAnnounce(){
		$request = Yii::$app->request;
		$ancID = $request->post('ancID');
		$ancStatus = intval($request->post('ancStatus'));
		
		$data['ancStatus'] = $ancStatus;
		if($ancStatus){
			$data['ancTime'] = date('Y-m-d H:i:s',time());
			$data['ancPubUid'] = Yii::$app->user->identity->uid;
		}else{
			$data['ancTime'] = null;
			$data['ancPubUid'] = null;
		}
		
		return $this->jsonReturn(Announce::updateData($data,['ancID'=>$ancID],$ancStatus));
	}
	
	public function actionDelAnnounce(){
		$ancIDs = Yii::$app->request->post('ancIDs');
		if(Announce::deleteAll(['ancID'=>$ancIDs])){
			$result = ['result'=>1,'msg'=>'删除成功'];
		}else{
			$result = ['result'=>0,'msg'=>'删除失败'];
		}
		return $this->jsonReturn($result);
	}
	
	public function actionRepair(){
		$request = Yii::$app->request;
		$flag = $request->get('flag');
		$ancType = $request->get('ancType');
		$ancID = $request->get('ancID','');
		return $this->renderPartial('flow2_repair',['flag'=>$flag,'ancID'=>$ancID,'ancType'=>$ancType]);
	}
	
	public function	actionRepairDo(){
		$request = Yii::$app->request;
		$ancStatus = intval($request->post('ancStatus'));
		$ancID = $request->post('ancID');
		$ancName = $request->post('ancName');
		$ancInfo = $request->post('ancInfo');
		$ancType = $request->post('ancType');
		$recID = $request->post('recID');
		
		$data['recID'] = $recID;
		$data['ancName'] = $ancName;
		$data['ancInfo'] = $ancInfo;
		$data['ancStatus'] = $ancStatus;
		$data['ancType'] = $ancType;
		
		if($ancStatus){
			$data['ancPubUid'] = Yii::$app->user->identity->uid;
			$data['ancTime'] = date('Y-m-d H:i:s',time());
		}
		
		if($ancID){
			$result = Announce::updateData($data,['ancID'=>$ancID],$ancStatus);
		}else{
			$result = Announce::insertData($data);
		}

		return $this->jsonReturn($result);
	}
	
	public function actionGetAnnounce(){
		$ancID = Yii::$app->request->post('ancID');
		$info = Announce::findOne($ancID);
		return $this->jsonReturn($info);
	}
	
	public function actionViewAnnounce(){
		$request = Yii::$app->request;
		$ancID = $request->get('ancID','');
		$info = Announce::findOne($ancID);
		return $this->renderPartial('flow2_view',['ancID'=>$ancID,'info'=>$info]);
	}
}
