<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;

class SystemController extends BaseController{
	public function actionIndex(){
		$index = Html::encode(Yii::$app->request->get('index',1));
		return $this->renderPartial('index'.Html::decode($index));
	}
}
