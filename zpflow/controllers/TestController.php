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
		$infos2 = (new \yii\db\Query())->where(['perID'=>13])->from($tableName)->one();
		$time1 = $this->getMillisecond();
		for($i=0;$i<=100;$i++){
			$result = array_udiff_assoc($infos2,$infos1,function($a,$b){
				if ($a === $b){
				  	return 0;
				}
				return ($a !== $b) ? 1 : -1;
			});
			unset($result['perID']);
		}
		$time2 = $this->getMillisecond();
		var_dump($time2-$time1);
	}
	
	private function getMillisecond() {
		list($t1, $t2) = explode(' ', microtime());
		return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
	}
	
	/*测试mongodb的使用*/
	public function actionMongodb(){
		$m = new \MongoClient(); // 连接默认主机和端口为：mongodb://localhost:27017
		$db = $m->yii2;
		$colletion = $db->createCollection("test_yii2");
		
		$collection = $db->test_yii2;
		$document = [
			'name'=>	'lily3',
			'gender'=>	'women',
			'age'=> 24,
			'likes'=>100
		];
		$collection->insert($document);
	}
	
}
