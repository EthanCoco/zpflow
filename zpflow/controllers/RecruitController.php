<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;
use yii\base\Event;

use app\models\Recruit;
use app\models\Share;
use app\models\Announce;
use app\events\Busevent;
use app\events\Busdeal;

/*
 * 人才招聘-招聘设置模块 
 */

class RecruitController extends BaseController{
	/*招聘列表*/
	public function actionListInfo(){
		$request = Yii::$app->request;
		
		//分页信息
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		//获取数据信息
		$listInfos = Recruit::getListInfo($offset,$rows,"recDefault desc,recYear desc,recBatch desc");
		
		$infos = $listInfos['rows'];
		$jsonData = [];
		//代码转换合并
		foreach($infos as $info){
			$codeName = Share::codeValue([['recBatch','PC']],$info);
			$jsonData [] = array_merge($info,$codeName);
		}
		
		return $this->jsonReturn(['rows'=>$jsonData,'total'=>$listInfos['total']]);
	}
	
	/*添加修改页面*/
	public function actionRepair(){
		$flag = Yii::$app->request->get('flag');
		$recID = Yii::$app->request->get('recID','');
		//获取批次代码信息
		$pcInfo = Share::getCodeInfo(['PC']);
		return $this->renderPartial('flow1_repair',['pcSelect'=>$pcInfo,'flag'=>$flag,'recID'=>$recID]);
	}
	
	/*添加修改动作保存*/
	public function actionRepairDo(){
		$request = Yii::$app->request;
		$recID = $request->post()['Recruit']['recID'];
		if($recID == ""){//添加
			$model = new Recruit();
			//应用添加场景
			$model->setScenario(Recruit::SCENARIO_ADD);
		}else{//修改
			$model = Recruit::findOne($recID);
			//应用修改场景
			$model->setScenario(Recruit::SCENARIO_MOD);
		}
		//数据加载及验证
		if($model->load($request->post()) && $model->validate()){
			$data = $request->post()['Recruit'];
			if($recID == ""){
				//保存添加数据
				return $this->jsonReturn(Recruit::insertData($data));
			}else{
				//保存修改数据
				return $this->jsonReturn(Recruit::updateData($data,['recID'=>$recID]));
			}
		}else{
			//错误信息获取
			$errors = $model->getFirstErrors();
			//返回错误信息
			return $this->jsonReturn(['result'=>0,'msg'=>Share::comErrors($errors)]);
		}
	}
	
	/*招聘信息发布*/
	public function actionPubRecruit(){
		$db = Yii::$app->db;
		$recID = Yii::$app->request->post('recID','');
		
		//校验批次ID是否存在
		if($recID == ""){
			return $this->jsonReturn(['result'=>0,'msg'=>'发布出错']);
		}
		
		//开启事务处理
		$transaction = $db->beginTransaction();	
		try{
			//获取默认招聘信息
			$info = Recruit::find()->where(['recDefault'=>'1'])->asArray()->one();
			//开启绑定事件处理方法
			Event::on(Busevent::className() ,Busevent::CREATE_BUS_TABLE, [(new Busdeal()), 'create_bus_table_deal'],$recID);
			if(empty($info)){
				//如果没有默认招聘，设置当前发布的为默认招聘
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>1],['recID'=>$recID])->execute();
				//执行后续事件
				(new Busevent())->create_bus_table();
			}elseif($info['recEnd'] > date('Y-m-d H:i:s',time())){
				//时间限制判断
				return $this->jsonReturn(['result'=>0,'msg'=>'存在招聘年度正在进行中，还未结束，如要发布，请等进行中招聘结束']);
			}elseif($info['recEnd'] < date('Y-m-d H:i:s',time())){
				//如果存在默认发布，将默认发布存档备份，状态改为结束
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>2,'recBack'=>1],['recID'=>$info['recID']])->execute();
				//公告信息封闭存档
				$db->createCommand()->update(Announce::tableName(),['ancStatus'=>2],['recID'=>$info['recID']])->execute();
				//开始新的默认招聘批次
				$db->createCommand()->update(Recruit::tableName(),['recDefault'=>1],['recID'=>$recID])->execute();
				//执行后续事件
				(new Busevent())->create_bus_table();
			}
			//事务提交
			$transaction->commit();
			return $this->jsonReturn(['result'=>1,'msg'=>'发布成功']);
		}catch(\Exception $e){
			//回滚事务
		    $transaction->rollBack();
		    return $this->jsonReturn(['result'=>0,'msg'=>'发布失败']);
		}
	}
	
	/*删除招聘信息*/
	public function actionDelRecruit(){
		$recIDs = Yii::$app->request->post('recIDs');
		if(Recruit::deleteAll(['recID'=>$recIDs])){
			$result = ['result'=>'1','msg'=>'删除成功'];
		}else{
			$result = ['result'=>0,'msg'=>'删除失败'];
		}
		
		return $this->jsonReturn($result);
	}
	
	/*获取招聘信息*/
	public function actionGetRecruit(){
		$recID = Yii::$app->request->post('recID');
		$info = Recruit::findOne($recID);
		return $this->jsonReturn($info);
	}
}
