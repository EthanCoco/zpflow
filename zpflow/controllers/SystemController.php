<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;
use app\models\Person;
use app\models\User;

class SystemController extends BaseController{
	public function actionIndex(){
		$index = Html::encode(Yii::$app->request->get('index',1));
		return $this->renderPartial('index'.Html::decode($index));
	}
	
	public function actionSysUserDetail(){
		$perID = Yii::$app->request->get('perID');
		$perInfo = Person::find()->where(['perID'=>$perID])->asArray()->one();
		$codes = [
					['perGender','XB'],['perJob','XZ'],['perNation','AI'],['perOrigin','AB'],['perPolitica','AG'],['perMarried','CG'],
					['perDegree','BC'],['perMajor','AJ'],['perEducation','XL'],['perForeignLang','MC'],['perComputerLevel','MD'],['perEduPlace','AB'],
				];
		$mainCode = Share::codeValue($codes,$perInfo);
		$mainCode['perBirth'] = !empty($perInfo['perBirth']) ? substr($perInfo['perBirth'], 0,10) : '';
		$jsonData = array_merge($perInfo,$mainCode);
		
		$eduSetInfo = (new \yii\db\Query())->from('eduset')->where(['perID'=>$perID])->orderby('eduStart asc')->all();
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
		
		$famSetInfo = (new \yii\db\Query())->from('famset')->where(['perID'=>$perID])->all();
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
		
		$workSetInfo = (new \yii\db\Query())->from('workset')->where(['perID'=>$perID])->orderby('wkStart asc')->all();
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
		
		return $this->renderPartial('index1/user-detail',['perInfo'=>$jsonData,'eduInfo'=>$eduJson,'famInfo'=>$famJson,'workInfo'=>$workJson]);
	}
	
	public function actionSysAdminRepair(){
		$uid = Yii::$app->request->get('uid','');
		$userData = [];
		if($uid != ''){
			$userData = User::find()->select(['uid','name','realName','phone'])->where(['uid'=>$uid])->asArray()->one();
		}
		
		return $this->renderPartial('index2/repair',['infos'=>$userData]);
	}
	
}
