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
	
	public static function MainTableName($rec){
        return 'flow_job_'.$rec;
    }
	
	public static function SetTableNames($rec){
		return ['flow_job_set_edu'.$rec,'flow_job_set_fam'.$rec,'flow_job_set_work'.$rec];
	}
	
	public static function SetTableName($rec,$set){
        return 'flow_job_set_'.$set.'_'.$rec;
    }
	
	public static function CreateBusTable($busID){
		$sql = "
				CREATE TABLE `flow_job_".$busID."` (
					  `perID` int(11) NOT NULL AUTO_INCREMENT COMMENT '人员ID',
					  `perName` varchar(255) NOT NULL COMMENT '姓名',
					  `perIDCard` varchar(32) NOT NULL COMMENT '身份证号',
					  `perPhone` varchar(11) NOT NULL COMMENT '手机号码',
					  `perPhoto` varchar(255) NOT NULL COMMENT '照片',
					  `perGender` int(1) DEFAULT NULL COMMENT '性别',
					  `perNation` varchar(64) NOT NULL COMMENT '民族',
					  `perOrigin` varchar(128) NOT NULL COMMENT '籍贯',
					  `perPolitica` varchar(64) NOT NULL COMMENT '政治面貌',
					  `perWorkPlace` varchar(255) NOT NULL COMMENT '现工作单位',
					  `perMarried` varchar(64) NOT NULL COMMENT '婚姻状况',
					  `perBirth` varchar(128) NULL DEFAULT NULL COMMENT '出生年月',
					  `perHeight` decimal(4,2) DEFAULT NULL COMMENT '身高',
					  `perWeight` decimal(4,2) DEFAULT NULL COMMENT '体重',
					  `perUniversity` varchar(255) DEFAULT NULL COMMENT '毕业院校',
					  `perDegree` varchar(128) DEFAULT NULL COMMENT '学位',
					  `perMajor` varchar(128) DEFAULT NULL COMMENT '专业',
					  `perEducation` varchar(64) DEFAULT NULL COMMENT '学历',
					  `perForeignLang` varchar(64) DEFAULT NULL COMMENT '外语水平',
					  `perComputerLevel` varchar(64) DEFAULT NULL COMMENT '计算机水平',
					  `perEduPlace` varchar(128) DEFAULT NULL COMMENT '毕业生生源地',
					  `perEmePhone` varchar(11) DEFAULT NULL COMMENT '紧急人联系电话',
					  `perEmail` varchar(128) DEFAULT NULL COMMENT '电子邮箱',
					  `perPostCode` varchar(32) DEFAULT NULL COMMENT '邮政编码',
					  `perAddr` varchar(255) DEFAULT NULL COMMENT '联系地址',
					  `perMark` varchar(255) DEFAULT NULL COMMENT '备注信息',
					  `perIndex` varchar(255) NOT NULL COMMENT '报名序号',
					  `perJob` varchar(64) NOT NULL COMMENT '应聘岗位性质',
					  `perPub`  int(1) NOT NULL DEFAULT '0' COMMENT '公示结果（0=未公示，1=已公示）',
					  `perStatus` int(1) NOT NULL DEFAULT '0' COMMENT '状态（0=待报，1=待审，2=审核通过，3=审核不通过）',
					  `perCheckTime` timestamp NULL DEFAULT NULL COMMENT '审核时间',
					  `perReason` varchar(255) DEFAULT NULL COMMENT '审核不通过原因',
					  `perReResult1` varchar(64)  NOT NULL DEFAULT '03' COMMENT '资格审查反馈结果',
					  `perReGiveup1` varchar(255) NOT NULL COMMENT '资格审查反馈原因',
					  `perReTime1` timestamp NULL DEFAULT NULL COMMENT '资格审查反馈时间',
					  PRIMARY KEY (`perID`)
					) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
					
					CREATE TABLE `flow_job_set_edu_".$busID."` (
					  `eduID` int(11) NOT NULL AUTO_INCREMENT COMMENT '教育经历ID',
					  `perID` int(11) NOT NULL COMMENT '人员ID',
					  `eduStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
					  `eduEnd` timestamp NULL DEFAULT NULL COMMENT '终止时间',
					  `eduSchool` varchar(255) NOT NULL COMMENT '在何学校',
					  `eduMajor` varchar(128) DEFAULT NULL,
					  `eduPost` varchar(255) DEFAULT NULL COMMENT '任职职务',
					  `eduBurseHonorary` text COMMENT '奖学金及荣誉称号',
					  PRIMARY KEY (`eduID`)
					) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
					
					CREATE TABLE `flow_job_set_fam_".$busID."` (
					  `famID` int(11) NOT NULL AUTO_INCREMENT COMMENT '家庭成员ID',
					  `perID` int(11) NOT NULL COMMENT '人员ID',
					  `famRelation` varchar(64) NOT NULL COMMENT '成员关系',
					  `famName` varchar(64) NOT NULL COMMENT '成员姓名',
					  `famCom` varchar(64) DEFAULT NULL COMMENT '所在工作单位',
					  `famPost` varchar(64) DEFAULT NULL COMMENT '任职岗位',
					  PRIMARY KEY (`famID`)
					) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
					
					CREATE TABLE `flow_job_set_work_".$busID."` (
						  `wkID` int(11) NOT NULL AUTO_INCREMENT COMMENT '工作经历ID',
						  `perID` int(11) NOT NULL COMMENT '人员ID',
						  `wkStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
						  `wkEnd` timestamp NULL DEFAULT NULL COMMENT '截止时间',
						  `wkPost` varchar(255) NOT NULL COMMENT '所在岗位',
						  `wkCom` varchar(255) NOT NULL COMMENT '所在单位',
						  `wkInfo` text NOT NULL COMMENT '工作简述',
						  PRIMARY KEY (`wkID`)
						) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
				";
		return $sql;
	}
}