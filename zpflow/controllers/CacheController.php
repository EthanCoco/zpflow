<?php
/**
 * 缓存示例
 * 配置默认为FileCache（文件缓存）
 */
namespace app\controllers;

use yii\web\Controller;

class CacheController extends Controller
{
	
	/*********************************************************开始	数据缓存		********************************************/
	
	/*缓存的增删改查*/
	public function actionIndex(){
		//使用缓存组件
		$cache = \YII::$app->cache;
		
		//往缓存里面写数据(注意：如果缓存中有相同的key值，后者不会覆盖前者的值)
		// $cache->add('name','lucy');
		// $cache->add('name','lily');
		// $cache->add('sex','man');
		
		//删除缓存
		// $cache->delete('name');
		
		//获取读取缓存
		// echo $cache->get('name');
		
		//清除所有缓存
		// $cache->flush();
		
		//设置修改缓存
		$cache->add('age',24);
		if($cache->exists('age')){
			$cache->set('age',25);
		}
		echo $cache->get('age');
	}	
	
	/*设置缓存时间*/
	public function actionIndex2(){
		$cache = \YII::$app->cache;
		//设置缓存时间为20秒
		// $cache->add('name','lucy',20);
		// echo $cache->get('name');
		
		//set方法也可以设置缓存时间
		// $cache->set('name','lily',20);
		// echo $cache->get('name');
	}
	
	public function actionIndex3(){
		$cache = \YII::$app->cache;
		
		//文件依赖(依赖文件一但修改，则缓存失效)
		// $denpendency = new \yii\caching\FileDependency(['fileName'=>'hw.txt']);
		// $cache->add('file_key','hello world!',3000,$denpendency);
		// var_dump($cache->get('file_key'));
		
		//表达式依赖
		// $denpendency = new \yii\caching\ExpressionDependency([
		// 	'expression' => '\YII::$app->request->get("name")'
		// ]);
		// $cache->add('expression_key','hello world!',3000,$denpendency);
		// var_dump($cache->get('expression_key'));
		
		//DB依赖（数据库依赖）
		$dependency = new \yii\caching\DbDependency([
			'sql' => 'select count(*) from yii.order'
		]);
		$cache->add('sql_key','hello world!',3000,$dependency);
		var_dump($cache->get('sql_key'));
	}
	
	/*********************************************************结束	数据缓存		********************************************/
	
	
	/*********************************************************开始	片段缓存		********************************************/
	/*指向缓存片段测试页面*/
	public function actionPianduan(){
		return $this->renderPartial('pianduan');
	}
	/*********************************************************结束	片段缓存		********************************************/
	
	/*********************************************************开始	页面缓存		********************************************/
	/*测试 behaviors 方法先于其他操作之前执行*/
	//public function behaviors(){
		
		//页面缓存
		//return 	[
		//			[
						//页面缓存类
		//				'class'	=>	'yii\filters\PageCache',
						//缓存时间
		//				'duration'	=>	1000,
						//设置需要缓存的操作
		//				'only'	=>	['pagecache'],
						//缓存依赖
		//				'dependency'	=>	[
		//					'class'	=>	'yii\caching\FileDependency',
		//					'fileName'	=>	'hw.txt'
		//				]
		//			]
		//];
	//}
	
	//public function actionPagecache(){
	//	echo 5;
	//}
	
	//public function actionPagecache2(){
	//	echo 6;
	//}
	
	/*********************************************************结束	页面缓存		********************************************/
	
	
	/*********************************************************开始	http缓存		********************************************/
	public function behaviors(){
		return 	[
					[
						'class'	=>	'yii\filters\HttpCache',
						'lastModified'	=> 	function(){
							return filemtime('hw.txt');
							//return 1432817570;
						},
						'etagSeed'	=>	function(){
							$fp = fopen('hw.txt','r');
							$title = fgets($fp);
							fclose($fp);
							return $title;
							//return 'etagseed4';
						}
					]
		];
	}
	
	public function actionHttppage(){
		$content = file_get_contents('hw.txt');
		return $this->renderPartial('httppage',['news'=>$content]);
	}
	
	/*********************************************************结束	http缓存		********************************************/
	
	
	
}
