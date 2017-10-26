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
		$entryData = [];
		if($index == 3){
			$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
			$codes = [['recBatch','PC']];
			$mainCode = Share::codeValue($codes,$recInfo);
			$jsonData = array_merge($recInfo,$mainCode);
		}elseif($index == 2){
			$entryData = $this->load_entry_info();
		}
		return $this->renderPartial('index'.\yii\helpers\Html::decode($index),['recInfo'=>$jsonData,'entryData'=>$entryData]);
    }
	
	private function load_entry_info(){
		$idcard = Yii::$app->user->identity->name;	
		$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
		$keys = [['recBatch','PC']];
		$codes = Share::codeValue($keys,$recInfo);
		$recData = array_merge($recInfo,$codes);
		
		$recID = $recInfo['recID'];
		
		$jsonData['recData'] = $recData;
		
		$mainInfo = (new \yii\db\Query())->from(Share::MainTableName($recID))->where(['perIDCard'=>$idcard])->one();
		$codes = [
					['perGender','XB'],['perJob','XZ'],['perNation','AI'],['perOrigin','AB'],['perPolitica','AG'],['perMarried','CG'],
					['perDegree','BC'],['perMajor','AJ'],['perEducation','XL'],['perForeignLang','MC'],['perComputerLevel','MD'],['perEduPlace','AB'],
				];
		$mainCode = Share::codeValue($codes,$mainInfo);
		$mainCode['perBirth'] = !empty($mainInfo['perBirth']) ? substr($mainInfo['perBirth'], 0,10) : '';
		$mainJson = array_merge($mainInfo,$mainCode);
		
		$jsonData['baseData'] = $mainJson;
		
		$perID = $mainJson['perID'];
		
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
		
		$jsonData['eduData'] = $eduJson;
		
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
		
		$jsonData['famData'] = $famJson;
		
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
		
		$jsonData['workData'] = $workJson;
		
		return $jsonData;
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
		$idcard = Yii::$app->user->identity->name;
		$recInfo = Recruit::find()->where(['recDefault'=>1])->asArray()->one();
		$edutable = Share::SetTableName($recInfo['recID'],'edu');
		$baseInfo = (new \yii\db\Query())->from(Share::MainTableName($recInfo['recID']))->where(['perIDCard'=>$idcard])->one();
		$eduInfo = (new \yii\db\Query())->from($edutable)->where(['perID'=>$baseInfo['perID']])->orderBy('eduStart asc')->all();
		$jsonData = [];
		if(empty($eduInfo)){
			$personInfo = (new \yii\db\Query())->from('person')->where(['perIDCard'=>$idcard])->one();
			$eduInfo_base = (new \yii\db\Query())->from('eduset')->where(['perID'=>$personInfo['perID']])->all();
			if(!empty($eduInfo_base)){
				//插入数据
				foreach($eduInfo_base as $binfo){
					Yii::$app->db->createCommand()->insert($edutable,[
						'perID'=>$baseInfo['perID'],
						'eduStart'=>$binfo['eduStart'],
						'eduEnd'=>$binfo['eduEnd'],
						'eduSchool'=>$binfo['eduSchool'],
						'eduMajor'=>$binfo['eduMajor'],
						'eduPost'=>$binfo['eduPost'],
						'eduBurseHonorary'=>$binfo['eduBurseHonorary'],
					])->execute();
				}
				$jsonData = (new \yii\db\Query())->from($edutable)->where(['perID'=>$baseInfo['perID']])->orderBy('eduStart asc')->all();
			}
		}else{
			$jsonData = $eduInfo;
		}
		
		$jsonInfo = [];
		if(!empty($jsonData)){
			foreach($jsonData as $data){
				$edu_code = [['eduMajor','AJ']] ;
				$edu_code_info = Share::codeValue($edu_code,$data);
				$jsonInfo [] = [
					'eduID'=>$data['eduID'],
					'perID'=>$data['perID'],
					'eduStart'=>!empty($data['eduStart']) ? substr($data['eduStart'], 0,10) : '',
					'eduEnd'=>!empty($data['eduEnd']) ? substr($data['eduEnd'], 0,10) : '',
					'eduSchool'=>$data['eduSchool'],
					'eduMajor'=>$edu_code_info['eduMajor'],
					'eduPost'=>$data['eduPost'],
					'eduBurseHonorary'=>$data['eduBurseHonorary'],
				];
			}
		}
		return $this->renderPartial('entry2',['eduInfo'=>$jsonInfo,'recID'=>$recInfo['recID'],'perID'=>$baseInfo['perID']]);
	}
	
	public function actionDelEdu(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recID = Yii::$app->request->post('recID');
		$eduID = Yii::$app->request->post('eduID');
		$flag = Yii::$app->db->createCommand()->delete(Share::SetTableName($recID,'edu'),['eduID'=>$eduID])->execute();
		if($flag){
			return ['result'=>1,'msg'=>'删除成功'];
		}else{
			return ['result'=>0,'msg'=>'删除失败'];
		}
	}
	
	public function actionEntry2Repair(){
		$recID = Yii::$app->request->get('recID');
		$eduID = Yii::$app->request->get('eduID','');
		$perID = Yii::$app->request->get('perID');
		
		if($eduID == ""){
			$info = [];
			$title = "添加学习情况";
		}else{
			$info = (new \yii\db\Query())->from(Share::SetTableName($recID,'edu'))->where(['eduID'=>$eduID])->one();
			$title = "修改学习情况";
		}
        $codeInfo = Code::getCodeSel([['AJ',0]]);
		return $this->renderPartial('entry2_repair',['eduID'=>$eduID,'recID'=>$recID,'title'=>$title,'codes'=>$codeInfo,'eduInfo'=>$info,'perID'=>$perID]);
	}
	
	public function actionEntry2Save(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recID = Yii::$app->request->post('recID');
		$eduID = Yii::$app->request->post('eduID','');
		$perID = Yii::$app->request->post('perID');
		$data = Yii::$app->request->post()['Edu'];
		if($eduID == ''){
			$data['perID'] = $perID;
			$flag = Yii::$app->db->createCommand()->insert(Share::SetTableName($recID,'edu'),$data)->execute();
			if($flag){
				return ['result'=>1,'msg'=>'保存成功'];
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}else{
			$flag = Yii::$app->db->createCommand()->update(Share::SetTableName($recID,'edu'),$data,['eduID'=>$eduID])->execute();
			if($flag !== false){
				return ['result'=>1,'msg'=>'修改成功'];
			}else{
				return ['result'=>0,'msg'=>'修改失败'];
			}
		}
	}
	
	public function actionEntry3(){
		$idcard = Yii::$app->user->identity->name;
		$recID = Yii::$app->request->get('recID');
		$perID = Yii::$app->request->get('perID');
		$worktable = Share::SetTableName($recID,'work');
		
		$workInfo = (new \yii\db\Query())->from($worktable)->where(['perID'=>$perID])->orderBy('wkStart asc')->all();
		
		$jsonData = [];
		if(empty($workInfo)){
			$personInfo = (new \yii\db\Query())->from('person')->where(['perIDCard'=>$idcard])->one();
			$workInfo_base = (new \yii\db\Query())->from('workset')->where(['perID'=>$personInfo['perID']])->all();
			if(!empty($workInfo_base)){
				//插入数据
				foreach($workInfo_base as $binfo){
					Yii::$app->db->createCommand()->insert($worktable,[
						'perID'=>$perID,
						'wkStart'=>$binfo['wkStart'],
						'wkEnd'=>$binfo['wkEnd'],
						'wkPost'=>$binfo['wkPost'],
						'wkCom'=>$binfo['wkCom'],
						'wkInfo'=>$binfo['wkInfo'],
					])->execute();
				}
				$jsonData = (new \yii\db\Query())->from($worktable)->where(['perID'=>$perID])->orderBy('wkStart asc')->all();
			}
		}else{
			$jsonData = $workInfo;
		}
		$jsonInfo = [];
		if(!empty($jsonData)){
			foreach($jsonData as $data){
				$jsonInfo [] = [
					'wkID'=>$data['wkID'],
					'perID'=>$data['perID'],
					'wkStart'=>!empty($data['wkStart']) ? substr($data['wkStart'], 0,10) : '',
					'wkEnd'=>!empty($data['wkEnd']) ? substr($data['wkEnd'], 0,10) : '',
					'wkPost'=>$data['wkPost'],
					'wkCom'=>$data['wkCom'],
					'wkInfo'=>$data['wkInfo'],
				];
			}
		}
		return $this->renderPartial('entry3',['workInfo'=>$jsonInfo,'recID'=>$recID,'perID'=>$perID]);
	}
	
	public function actionEntry3Repair(){
		$recID = Yii::$app->request->get('recID');
		$wkID = Yii::$app->request->get('wkID','');
		$perID = Yii::$app->request->get('perID');
		
		if($wkID == ""){
			$info = [];
			$title = "添加工作经历";
		}else{
			$info = (new \yii\db\Query())->from(Share::SetTableName($recID,'work'))->where(['wkID'=>$wkID])->one();
			$title = "修改工作经历";
		}
		return $this->renderPartial('entry3_repair',['wkID'=>$wkID,'recID'=>$recID,'title'=>$title,'workInfo'=>$info,'perID'=>$perID]);
	}
	
	public function actionEntry3Save(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recID = Yii::$app->request->post('recID');
		$wkID = Yii::$app->request->post('wkID','');
		$perID = Yii::$app->request->post('perID');
		$data = Yii::$app->request->post()['Work'];
		if($wkID == ''){
			$data['perID'] = $perID;
			$flag = Yii::$app->db->createCommand()->insert(Share::SetTableName($recID,'work'),$data)->execute();
			if($flag){
				return ['result'=>1,'msg'=>'保存成功'];
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}else{
			$flag = Yii::$app->db->createCommand()->update(Share::SetTableName($recID,'work'),$data,['wkID'=>$wkID])->execute();
			if($flag !== false){
				return ['result'=>1,'msg'=>'修改成功'];
			}else{
				return ['result'=>0,'msg'=>'修改失败'];
			}
		}
	}
	
	public function actionDelWork(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recID = Yii::$app->request->post('recID');
		$wkID = Yii::$app->request->post('wkID');
		$flag = Yii::$app->db->createCommand()->delete(Share::SetTableName($recID,'work'),['wkID'=>$wkID])->execute();
		if($flag){
			return ['result'=>1,'msg'=>'删除成功'];
		}else{
			return ['result'=>0,'msg'=>'删除失败'];
		}
	}
	
	public function actionEntry4(){
		$idcard = Yii::$app->user->identity->name;
		$recID = Yii::$app->request->get('recID');
		$perID = Yii::$app->request->get('perID');
		$famtable = Share::SetTableName($recID,'fam');
		
		$famInfo = (new \yii\db\Query())->from($famtable)->where(['perID'=>$perID])->orderBy('famRelation asc')->all();
		
		$jsonData = [];
		if(empty($famInfo)){
			$personInfo = (new \yii\db\Query())->from('person')->where(['perIDCard'=>$idcard])->one();
			$famInfo_base = (new \yii\db\Query())->from('famset')->where(['perID'=>$personInfo['perID']])->all();
			if(!empty($famInfo_base)){
				//插入数据
				foreach($famInfo_base as $binfo){
					Yii::$app->db->createCommand()->insert($famtable,[
						'perID'=>$perID,
						'famRelation'=>$binfo['famRelation'],
						'famName'=>$binfo['famName'],
						'famCom'=>$binfo['famCom'],
						'famPost'=>$binfo['famPost'],
					])->execute();
				}
				$jsonData = (new \yii\db\Query())->from($famtable)->where(['perID'=>$perID])->orderBy('famRelation asc')->all();
			}
		}else{
			$jsonData = $famInfo;
		}
		
		$jsonInfo = [];
		if(!empty($jsonData)){
			foreach($jsonData as $data){
				$fam_code = [['famRelation','JTGX']] ;
				$fam_code_info = Share::codeValue($fam_code,$data);
				$jsonInfo [] = [
					'famID'=>$data['famID'],
					'perID'=>$data['perID'],
					'famRelation'=>$fam_code_info['famRelation'],
					'famName'=>$data['famName'],
					'famCom'=>$data['famCom'],
					'famPost'=>$data['famPost'],
				];
			}
		}
		return $this->renderPartial('entry4',['famInfo'=>$jsonInfo,'recID'=>$recID,'perID'=>$perID]);
	}
	
	public function actionDelFam(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recID = Yii::$app->request->post('recID');
		$famID = Yii::$app->request->post('famID');
		$flag = Yii::$app->db->createCommand()->delete(Share::SetTableName($recID,'fam'),['famID'=>$famID])->execute();
		if($flag){
			return ['result'=>1,'msg'=>'删除成功'];
		}else{
			return ['result'=>0,'msg'=>'删除失败'];
		}
	}
	
	public function actionEntry4Repair(){
		$recID = Yii::$app->request->get('recID');
		$famID = Yii::$app->request->get('famID','');
		$perID = Yii::$app->request->get('perID');
		
		if($famID == ""){
			$info = [];
			$title = "添加家庭成员";
		}else{
			$info = (new \yii\db\Query())->from(Share::SetTableName($recID,'fam'))->where(['famID'=>$famID])->one();
			$title = "修改家庭成员";
		}
		$codeInfo = Code::getCodeSel([['JTGX',1]]);
		return $this->renderPartial('entry4_repair',['famID'=>$famID,'recID'=>$recID,'title'=>$title,'codes'=>$codeInfo,'famInfo'=>$info,'perID'=>$perID]);
	}
	
	public function actionEntry4Save(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recID = Yii::$app->request->post('recID');
		$famID = Yii::$app->request->post('famID','');
		$perID = Yii::$app->request->post('perID');
		$data = Yii::$app->request->post()['Fam'];
		if($famID == ''){
			$data['perID'] = $perID;
			$flag = Yii::$app->db->createCommand()->insert(Share::SetTableName($recID,'fam'),$data)->execute();
			if($flag){
				return ['result'=>1,'msg'=>'保存成功'];
			}else{
				return ['result'=>0,'msg'=>'保存失败'];
			}
		}else{
			$flag = Yii::$app->db->createCommand()->update(Share::SetTableName($recID,'fam'),$data,['famID'=>$famID])->execute();
			if($flag !== false){
				return ['result'=>1,'msg'=>'修改成功'];
			}else{
				return ['result'=>0,'msg'=>'修改失败'];
			}
		}
	}
	
	public function actionSubEntry(){
		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$recID = Yii::$app->request->post('recID');
		$perID = Yii::$app->request->post('perID');
		$flag = Yii::$app->db->createCommand()->update(Share::MainTableName($recID),['perStatus'=>1],['perID'=>$perID])->execute();
		if($flag !== false){
			return ['result'=>1,'msg'=>'报名成功'];
		}else{
			return ['result'=>0,'msg'=>'报名失败'];
		}
	}
	
}
