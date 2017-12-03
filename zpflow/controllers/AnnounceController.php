<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Announce;
use app\models\Share;

/*
 * 公告信息
 */

class AnnounceController extends BaseController{
	/*公告信息列表*/
	public function actionListInfo(){
		$request = Yii::$app->request;
		
		//招聘年度ID
		$recID = $request->post('recID');
		//公告类别（A=招聘简介，B=公司简介）
		$ancType = $request->post('ancType');
		
		//分页信息
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		//获取公告数据
		$listInfos = Announce::getListInfo($offset,$rows,['recID'=>$recID,'ancType'=>$ancType],"ancStatus desc,ancTime desc");
		
		return $this->jsonReturn($listInfos);
	}
	
	/*发布/取消-公告*/
	public function actionPubAnnounce(){
		$request = Yii::$app->request;
		//招聘年度ID
		$ancID = $request->post('ancID');
		//公告状态
		$ancStatus = intval($request->post('ancStatus'));
		
		$data['ancStatus'] = $ancStatus;
		if($ancStatus){
			//发布公告时间
			$data['ancTime'] = date('Y-m-d H:i:s',time());
			//发布人
			$data['ancPubUid'] = Yii::$app->user->identity->uid;
		}else{
			//取消时候设置为null
			$data['ancTime'] = null;
			$data['ancPubUid'] = null;
		}
		
		//更新返回结果
		return $this->jsonReturn(Announce::updateData($data,['ancID'=>$ancID],$ancStatus));
	}
	
	/*删除公告信息*/
	public function actionDelAnnounce(){
		$ancIDs = Yii::$app->request->post('ancIDs');
		if(Announce::deleteAll(['ancID'=>$ancIDs])){
			$result = ['result'=>1,'msg'=>'删除成功'];
		}else{
			$result = ['result'=>0,'msg'=>'删除失败'];
		}
		return $this->jsonReturn($result);
	}
	
	/*添加修改公告页面*/
	public function actionRepair(){
		$request = Yii::$app->request;
		$flag = $request->get('flag');
		$ancType = $request->get('ancType');
		$ancID = $request->get('ancID','');
		return $this->renderPartial('flow2_repair',['flag'=>$flag,'ancID'=>$ancID,'ancType'=>$ancType]);
	}
	
	/*添加修改公告动作保存*/
	public function	actionRepairDo(){
		$request = Yii::$app->request;
		//公告状态
		$ancStatus = intval($request->post('ancStatus'));
		//公告ID
		$ancID = $request->post('ancID');
		//公告标题
		$ancName = $request->post('ancName');
		//公告信息
		$ancInfo = $request->post('ancInfo');
		//公告类别
		$ancType = $request->post('ancType');
		//招聘ID
		$recID = $request->post('recID');
		
		$data['recID'] = $recID;
		$data['ancName'] = $ancName;
		$data['ancInfo'] = $ancInfo;
		$data['ancStatus'] = $ancStatus;
		$data['ancType'] = $ancType;
		
		//发布公告时候需要
		if($ancStatus){
			$data['ancPubUid'] = Yii::$app->user->identity->uid;
			$data['ancTime'] = date('Y-m-d H:i:s',time());
		}
		
		if($ancID){
			//更新
			$result = Announce::updateData($data,['ancID'=>$ancID],$ancStatus);
		}else{
			//添加
			$result = Announce::insertData($data);
		}

		return $this->jsonReturn($result);
	}
	
	/*获取公告信息*/
	public function actionGetAnnounce(){
		//公告ID
		$ancID = Yii::$app->request->post('ancID');
		$info = Announce::findOne($ancID);
		return $this->jsonReturn($info);
	}
	
	/*查看公告信息页面*/
	public function actionViewAnnounce(){
		$request = Yii::$app->request;
		//公告ID
		$ancID = $request->get('ancID','');
		//公告信息
		$info = Announce::findOne($ancID);
		return $this->renderPartial('flow2_view',['ancID'=>$ancID,'info'=>$info]);
	}
}
