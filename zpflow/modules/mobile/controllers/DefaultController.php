<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;
use app\models\Announce;

/**
 * Default controller for the `mobile` module
 */
class DefaultController extends Controller
{
	public $enableCsrfValidation = false;
	public $layout = 'mobile'; 
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(){
    	$index = \yii\helpers\Html::encode(Yii::$app->request->get('index',''));
		$index = $index == '' ? 1 : $index;
    	//$infos =(new \yii\db\Query())->from('recruit')->all();
		//$infos = Yii::$app->db->createCommand('delete from  recruit where recID=3')->execute();
		//var_dump($infos);
        return $this->render('index'.\yii\helpers\Html::decode($index),['index'=>$index]);
    }
	
}
