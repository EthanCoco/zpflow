<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;
use app\models\Code; 
use app\models\Person;
use app\models\Share;
use app\models\Recruit;

class ZpcxController extends Controller
{
	public $enableCsrfValidation = false;
	
    public function actionIndex(){
    	$index = \yii\helpers\Html::encode(Yii::$app->request->get('index',1));
		$jsonData = [];
		if($index == 3){
			$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
			$codes = [['recBatch','PC']];
			$mainCode = Share::codeValue($codes,$recInfo);
			$jsonData = array_merge($recInfo,$mainCode);
		}
		return $this->renderPartial('index'.\yii\helpers\Html::decode($index),['recInfo'=>$jsonData]);
    }
	
	public function actionEntry(){
		$idcard = Yii::$app->user->identity->name;
		$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
		$perID_type = 1;
		$basePerInfo = (new \yii\db\Query())->from(Share::MainTableName($recInfo['recID']))->where(['perIDCard'=>$idcard])->one();
		if(empty($basePerInfo)){
			$perID_type = 2;
			$basePerInfo = Person::find()->where(['perIDCard'=>$idcard])->one();	
		}
		$codes = [['XB',1],['AB',0],['AI',1],['AG',1],['XL',1],['BC',0],['CG',1],['MC',0],['MD',0],['AJ',0],['XZ',1]];
        $codeInfo = Code::getCodeSel($codes);
		return $this->renderPartial('entry',['codes'=>$codeInfo,'basePerInfo'=>$basePerInfo,'perID_type'=>$perID_type]);
	}
	
	public function actionSonCode(){
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$codePiD = Yii::$app->request->get('codePiD');
		$codeTypeID = Yii::$app->request->get('codeTypeID');
        $selectCodeInfo = Code::find()->where(['AND',['codeTypeID'=>$codeTypeID,'codePiD'=>$codePiD,'codeStatus'=>1],['not',['codePiD'=>-1]]])->select(['codeID','codeName'])->asArray()->all();
        return ['selectCodeInfo'=>$selectCodeInfo];
    }
	
	public function actionEntrySave1(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$data = Yii::$app->request->post()['Per'];
		$perID = Yii::$app->request->post('perID','');
		$idcard = Yii::$app->user->identity->name;
		
		$idcard = Yii::$app->user->identity->name;
		if($idcard != $data['perIDCard']){
			return ['result'=>0,'msg'=>'报名身份与登录身份不匹配'];
		}
		$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
		$tableName = Share::MainTableName($recInfo['recID']);
		if($perID == ''){
			$basePerInfo = Person::find()->where(['perIDCard'=>$idcard])->one();
			if(empty($basePerInfo)){
				Yii::$app->db->createCommand()->insert('person',$data)->execute();
			}
			
			
			$flag = Yii::$app->db->createCommand()->insert($tableName,$data)->execute();
			if($flag){
				return ['result'=>1,'msg'=>'保存成功'];
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}else{
			$tableName = Share::MainTableName($recInfo['recID']);
			$flag = Yii::$app->db->createCommand()->update($tableName,$data,['PerID'=>$perID])->execute();
			if($flag !== false){
				return ['result'=>1,'msg'=>'保存成功'];
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}
	}
	
	public function actionEntry2(){
//		$idcard = Yii::$app->user->identity->name;
//		$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
//		$perID_type = 1;
//		$basePerInfo = (new \yii\db\Query())->from(Share::MainTableName($recInfo['recID']))->where(['perIDCard'=>$idcard])->one();
//		if(empty($basePerInfo)){
//			$perID_type = 2;
//			$basePerInfo = Person::find()->where(['perIDCard'=>$idcard])->one();	
//		}
//		$codes = [['XB',1],['AB',0],['AI',1],['AG',1],['XL',1],['BC',0],['CG',1],['MC',0],['MD',0],['AJ',0],['XZ',1]];
//      $codeInfo = Code::getCodeSel($codes);
//		return $this->renderPartial('entry',['codes'=>$codeInfo,'basePerInfo'=>$basePerInfo,'perID_type'=>$perID_type]);
		return $this->renderPartial('entry2');
	}
	
	public function actionEntry3(){
		return $this->renderPartial('entry3');
	}
	
	public function actionEntry4(){
		return $this->renderPartial('entry4');
	}
	
}
