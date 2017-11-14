<?php
namespace app\controllers;

use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;

class TestController extends Controller
{
	public function actionIndex(){
		date_default_timezone_set('PRC');
		$tableName = Share::MainTableName(1);	
		$infos1 = (new \yii\db\Query())->where(['perID'=>6])->from($tableName)->one();
		$infos2 = (new \yii\db\Query())->where(['perID'=>77])->from($tableName)->one();
		
		$a1=array("a"=>"red","b"=>"green","c"=>"blue");
		$a2=array("a"=>"fdfd","b"=>"black","c"=>"blue");
		
		$time1 = time();
		$result=array_udiff_assoc($infos2,$infos1,function($a,$b){
			if ($a===$b)
			  {
			  return 0;
			  }
			  return ($a !== $b)?1:-1;
		});
		$time2 = time();
		var_dump($time2-$time1);
		
		
		
	}
		
	
}
