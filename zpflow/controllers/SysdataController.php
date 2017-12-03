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
		$type = intval($request->post('type',1));
		
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
		
		$condition = ['and',['userType'=>$type]];
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
	
	public function actionSysUserDel(){
		$uid = Yii::$app->request->post('uid');
		$user = User::findOne($uid);
		if($user->delete()){
			$result = ['result'=>1,'msg'=>'删除成功'];
		}else{
			$result = ['result'=>0,'msg'=>'删除失败'];
		}
		
		return $this->jsonReturn($result);
	}
	
	public function actionSysAdminSave(){
		$request = Yii::$app->request;
		$uid = $request->post('uid','');
		$name = $request->post('name');
		$realName = $request->post('realName');
		$phone = $request->post('phone');
		
		$result = ['result'=>0,'msg'=>'保存失败'];
		
		if($uid){
			$flag = Yii::$app->db->createCommand()->update('user', [
					'name' => $name,
				    'realName' =>  $realName,
				    'phone'=>$phone
				], ['uid'=>$uid])->execute();
		}else{
			$flag = Yii::$app->db->createCommand()->insert('user', [
				    'name' => $name,
				    'realName' =>  $realName,
				    'password'=>md5(Yii::$app->params['resetpwd_user']),
				    'userType'=>2,
				    'userRegisterTime'=>date('Y-m-d H:i:s',time()),
				    'userLoginCount'=>0,
				    'phone'=>$phone
				])->execute();
		}
		
		if($flag){
			$result = ['result'=>1,'msg'=>'保存成功'];
		}
		
		return $this->jsonReturn($result);
	}
}
