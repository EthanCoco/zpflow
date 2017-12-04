<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;
use app\models\Recruit; 
use app\models\Announce;
use app\models\Share;

/**
 * 公告控制器
 */
class GgzxController extends Controller
{
	//去除启用post请求限制
	public $enableCsrfValidation = false;
	//设置布局文件
	public $layout = 'mobile'; 
	
	/*公告列表*/
    public function actionAncList(){
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;	
    	$request = Yii::$app->request;
		//文章类别 A招聘公告 B单位简介
		$anc_type = $request->get('anc_type');
		
		//分页信息
		$page = $request->get('page',1);
		$rows = $request->get('rows',5);
        $offset = $page*$rows-$rows;
		
		//默认招聘信息
		$recInfo = Recruit::find()->where(['recDefault'=>1])->one();
		
		//如果没有招聘信息
		if(empty($recInfo)){
			//返回空数据
			return ["rows"=>[],"total"=>0,'current_page'=>$page];
		}else{
			//获取公告文章信息
			$ancInfo = Announce::find()->where(['ancStatus'=>1,'recID'=>$recInfo['recID'],'ancType'=>$anc_type])->offset($offset)->limit($rows)->orderby("ancTime DESC")->asArray()->all();
			//文章总数
			$ancTotal = Announce::find()->where(['ancStatus'=>1,'recID'=>$recInfo['recID'],'ancType'=>$anc_type])->count();
			//文章不为空
			if(!empty($ancInfo)){
				if($ancTotal > 1){
					//遍历处理数据
					$jsonData = [];
					foreach($ancInfo as $anc){
						//文章内容截取
						$temp_str = '';
						$temp_str = $anc['ancInfo'];
						$temp_str = Share::deleteHtml($temp_str);
						$len = strlen($temp_str);
						if($len > 90){
							$temp_str = mb_substr($temp_str,0,90,'utf-8')."...";
						}
						
						$jsonData[] = [
							'ancID'		=>	$anc['ancID'],
							'recID'		=>	$anc['ancID'],
							'ancName'	=>	$anc['ancName'],
							'ancPubUid'	=>	$anc['ancPubUid'],
							'ancTime'	=>	$anc['ancTime'],
							'ancType'	=>	$anc['ancType'],
							'ancInfo'	=>	$temp_str,
						];
					}
					return ["total"=>$ancTotal,"rows"=>$jsonData,'current_page'=>$page];
				}else{
					return ["total"=>$ancTotal,"rows"=>$ancInfo,'current_page'=>$page];
				}
			}else{
				//没有文章 返回空数据
				return ["rows"=>[],"total"=>0,'current_page'=>$page];
			}
		}
    }
	
	/*获取一个文章信息*/
	public function actionAncOne(){
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$request = Yii::$app->request;
		
		//文章类别
		$ancType = $request->get('ancType');
		//文章ID
		$ancID = $request->get('ancID');
		//文章信息
		$info = Announce::findOne($ancID);
		//返回信息
		return ['info'=>$info,'ancType'=>$ancType,'index'=>1];
//		return $this->render('index',['info'=>$info,'ancType'=>$ancType,'index'=>1]);
	}
	
}
