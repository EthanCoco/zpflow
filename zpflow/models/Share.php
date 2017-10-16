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
	
	public static function codeValue($codeArr = [],$data = ''){
        $codeNameArr = [];//代码名称数组
        foreach($codeArr as $code){
            $codeVal = $data[$code[0]];
            $codeFind = Code::find()->where(['codeID'=>$codeVal,'codeTypeID'=>$code[1],'codeStatus'=>1])->one();
            if(!empty($codeFind)){
                $codeNameArr[$code[0]] = $codeFind->codeName;
            }else{
                $codeNameArr[$code[0]] = '';
            }
        }
        return $codeNameArr;
    }
	
	public static function getCodeInfo($codeType = []){
		$len = count($codeType);
		if($len == 1){
			$cond = ['codeTypeID'=>$codeType[0]];
		}else{
			$cond = ['in', 'codeTypeID', $codeType];
		}
		
		$infos = Code::find()->select(['codeID','codeName'])
							 ->where(['codeStatus'=>1])
							 ->andWhere($cond)
							 ->orderby('codeTypeID asc,codeOrder asc')->asArray()->all();
		
		return $infos;
	}
}