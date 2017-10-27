<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Recruit;

class ExamController extends BaseController{
	public $enableCsrfValidation = false;
	
	public function actionStep(){
		$index = Html::encode(Yii::$app->request->get('index',1));
		return $this->renderPartial('step'.Html::decode($index));
	}
}
