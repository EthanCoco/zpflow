<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Mongodb extends Model
{
	protected static $_instance = null;
	
	final protected function __construct(){
		
	}
	
	final protected function __clone(){}
	
	public static function getInstance(){
		if(self::$_instance == null){
			self::$_instance new self();
		}else{
			return self::$_instance;
		}
	}
	
}