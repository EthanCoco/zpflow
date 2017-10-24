<?php

namespace app\modules\mobile\controllers;

use yii\web\Controller;
use Yii;
use app\models\Recruit; 
use app\models\Announce;
use app\models\Share;

class GgzxController extends Controller
{
	public $enableCsrfValidation = false;
	public $layout = 'mobile'; 
	
    public function actionAncList(){
    	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;	
    	$request = Yii::$app->request;
		$anc_type = $request->get('anc_type');
		
		$page = $request->get('page',1);
		$rows = $request->get('rows',5);
		
        $offset = $page*$rows-$rows;
		
		$recInfo = Recruit::find()->where(['recDefault'=>1])->one();
		
		if(empty($recInfo)){
			return ["rows"=>[],"total"=>0,'current_page'=>$page];
		}else{
			$ancInfo = Announce::find()->where(['ancStatus'=>1,'recID'=>$recInfo['recID'],'ancType'=>$anc_type])->offset($offset)->limit($rows)->orderby("ancTime DESC")->asArray()->all();
			$ancTotal = Announce::find()->where(['ancStatus'=>1,'recID'=>$recInfo['recID'],'ancType'=>$anc_type])->count();
			if(!empty($ancInfo)){
				if($ancTotal > 1){
					$jsonData = [];
					foreach($ancInfo as $anc){
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
				return ["rows"=>[],"total"=>0,'current_page'=>$page];
			}
		}
    }

	public function actionAncOne(){
    	$request = Yii::$app->request;
		
		$ancType = $request->get('ancType');
		$ancID = $request->get('ancID');
		
		$info = Announce::findOne($ancID);
		return $this->render('mobile/default/index',['info'=>$info,'ancType'=>$ancType,'index'=>1]);
	}
}
