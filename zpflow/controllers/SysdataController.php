<?php
namespace app\controllers;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

use app\models\Share;
use app\models\User;
use app\models\Person;

class SysdataController extends BaseController{
	public function actionSysUserList(){
		$request = Yii::$app->request;
		$name = $request->post('name','');
		$realName = $request->post('realName','');
		$phone = $request->post('phone','');
		
		$page = $request->post('page');
		$rows = $request->post('rows');
		$offset =($page-1)*$rows;
		
		$sort = $request->post("sort"); 
        $order = $request->post("order","asc");
        
		
        if($sort){
	        $orderInfo = $sort.' '.$order;
        }else{
        	$orderInfo = 'uid asc';
        }
		
		$condition = ['and',['userType'=>1]];
		if($name != ''){
			$condition[] = ['and',['like','name',$name]];
		}
		if($realName != ''){
			$condition[] = ['and',['like','realName',$realName]];
		}
		if($phone != ''){
			$condition[] = ['and',['like','phone',$phone]];
		}
		
		$dataInfo = User::find()->select(['uid','name','realName','phone','userLoginCount','userRegisterTime','userLastLoginTime','perID'])
								->leftJoin(Person::tableName(), 'perIDCard = name')
								->where($condition)
								->orderby($orderInfo)
								->offset($offset)
								->limit($rows)
								->asArray()
								->all();
		$total = User::find()->where($condition)->count();
		
		$result = ['rows'=>$dataInfo,'total'=>$total];
		return $this->jsonReturn($result);		
	}
	
	public function actionSysUserResetpwd(){
		$request = Yii::$app->request;
		$uid = $request->post('uid');
		$u = User::findOne($uid);
		
		$u->password = md5(Yii::$app->params['resetpwd_user']);
		
		if($u->save()){
			$result = ['result' => 1,'msg'=>'重置密码成功'];
		}else{
			$result = ['result' => 0,'msg'=>'重置密码失败'];
		}
		
		return $this->jsonReturn($result);
	}
	
	
	
	
}
