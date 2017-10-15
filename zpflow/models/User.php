<?php

namespace app\models;
use Yii;
use yii\base\Model;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public $name;
    private $_user = false;
	
	const SCENARIO_LOGIN = 'login';
	const SCENARIO_REGISTER = 'register';
	public function scenarios(){
		$scenarios = parent::scenarios();
	    $scenarios[self::SCENARIO_LOGIN] = ['name', 'password'];
	    $scenarios[self::SCENARIO_REGISTER] = ['name', 'password'];
	    return $scenarios;
	}
    
	public function rules(){
		return [
			['name', 'required','message'=>'账号不能为空', 'on' => [self::SCENARIO_LOGIN]],
			['password', 'required','message'=>'密码不能为空', 'on' => [self::SCENARIO_LOGIN]],
		];
	}
	
	public static function findSingleByWhere($where = []){
		$info = self::find()->where($where)->asArray()->one();
		if(count($info) > 1){
			
		}
		return $info;
	}
	
	public static function afterLoginDo(){
		$uid = Yii::$app->user->identity->uid;
		$name = Yii::$app->user->identity->name;
		$realName = Yii::$app->user->identity->realName;
		
		$session = Yii::$app->session;
		$session->set('uid',$uid);
		$session->set('realName',$realName);
		
		$user = self::findOne($uid);
		$user->userLoginCount = ($user->userLoginCount)+1;
		$user->userLastLoginTime = date("Y-m-d H:i:s");
		if($user->save()){
			return true;
		}
		return false;
	}
	
	
	public static function findByUsername($name){
    	$user = self::find()->where(['name' => $name])->one();
        if ($user){
            return new static($user);
        }
        return null;
    }
	
	public function login(){
        return Yii::$app->user->login($this->getUser());
    }
	
	public function getUser(){
        if ($this->_user === false) {
            $this->_user = self::findByUsername($this->name);
        }
        return $this->_user;
    }
	
	/**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->uid;
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
    	$user = self::findById($id);
        if ($user) {
            return new static($user);
        }
        return null;
    }
	
	public static function findById($id) {
        $user = self::find()->where(array('uid' => $id))->asArray()->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }
	
	/**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
