<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;

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
    	
		if($index == 2 || $index == 4){
			if(!Yii::$app->user->isGuest){
				$userType = Yii::$app->user->identity->userType;
				if($userType != 1){
					return $this->render('index',['index'=>$index]);
				}
			}else{
				return $this->render('login',['index'=>2]);
			}
		}
        return $this->render('index'.\yii\helpers\Html::decode($index),['index'=>$index]);
    }
	
	public function actionValcode(){
		$_vc = new \ValidateCode();
		$_vc->doimg();
		\Yii::$app->session->set('authnum_session',$_vc->getCode());
	}
	
}
