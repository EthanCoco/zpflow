<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;
use app\models\Reback;
use app\models\Share;

/**
 * 公告控制器
 */
class GrzxController extends Controller
{
	//去除启用post请求限制
	public $enableCsrfValidation = false;
	//设置布局文件
	//public $layout = 'mobile'; 
	
	/*公告列表*/
    public function actionGrzxReback(){
    	date_default_timezone_set('PRC');
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;	
    	$request = Yii::$app->request;
		$rbContent = $request->post('rb_content');
		$reback = new Reback();
		$reback->uid = Yii::$app->user->identity->uid;	
		$reback->rbContent = $rbContent;
		$reback->rbTime = date('Y-m-d H:i:s',time());
		$reback->rbReadStatus = 0;
		if($reback->save()){
			return ['result'=>1,'msg'=>'提交成功'];
		}else{
			return ['result'=>0,'msg'=>'提交失败'];
		}
    }
	
}
