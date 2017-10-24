<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;
//use app\models\Recruit; 
//use app\models\Announce;
//use app\models\Share;

class ZpcxController extends Controller
{
	public $enableCsrfValidation = false;
	
    public function actionIndex(){
    	$index = \yii\helpers\Html::encode(Yii::$app->request->get('index',1));
		return $this->renderPartial('index'.\yii\helpers\Html::decode($index));
    }
}
