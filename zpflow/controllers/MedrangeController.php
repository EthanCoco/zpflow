<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Examiner;
use app\models\Setgroup;
use app\models\Share;
use app\models\Comnotice;
use app\models\Noticemb;
use app\models\Standartline;

class MedrangeController extends BaseController{
	public function actionStep(){
		$index = Html::encode(Yii::$app->request->get('index',1));
		$recID = Yii::$app->request->get('recID');
		
		$flow3_to = (new yii\db\Query())->from(Share::MainTableName($recID))
											  ->where(['AND',['perPub'=>0],['not',['perStatus'=>0]]])
											  ->count();
		$flow4_to = (new yii\db\Query())->from(Share::MainTableName($recID))
											  ->where(['AND',['perPub3'=>0,'perReResult2'=>'01'],['not',['perStatus'=>0]]])
											  ->count();
		
		
		return $this->renderPartial('step'.Html::decode($index),['flow3_to'=>$flow3_to,'flow4_to'=>$flow4_to]);
	}
	
}
