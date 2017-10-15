<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Share extends Model
{
	public static function comErrors($errors){
		$str = '';
		if(!empty($errors)){
			$str = '错误提示：<br/>';
			foreach($errors as $key=>$val){
				$str .= $val.'<br/>';
			}
		}
		return $str; 
	}	
}