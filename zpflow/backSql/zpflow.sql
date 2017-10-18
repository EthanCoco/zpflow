/*
Navicat MySQL Data Transfer

Source Server         : localhostphpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : zpflow

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-18 16:21:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for announce
-- ----------------------------
DROP TABLE IF EXISTS `announce`;
CREATE TABLE `announce` (
  `ancID` int(11) NOT NULL AUTO_INCREMENT COMMENT '公告ID',
  `recID` int(11) NOT NULL COMMENT '招聘年度ID',
  `ancName` varchar(125) NOT NULL COMMENT '公告名称',
  `ancInfo` text NOT NULL COMMENT '公告内容',
  `ancPubUid` int(11) DEFAULT NULL COMMENT '发布人ID',
  `ancTime` timestamp NULL DEFAULT NULL COMMENT '发布时间',
  `ancType` char(1) DEFAULT NULL COMMENT '公告类别（A=招聘简介，B=公司简介）',
  `ancStatus` int(1) NOT NULL DEFAULT '0' COMMENT '发布状态（0=未发布，1=已发布）',
  PRIMARY KEY (`ancID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of announce
-- ----------------------------

-- ----------------------------
-- Table structure for code
-- ----------------------------
DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeID` varchar(64) NOT NULL COMMENT '代码ID',
  `codeTypeID` varchar(64) DEFAULT NULL COMMENT '代码分类ID',
  `codeName` varchar(64) DEFAULT NULL COMMENT '代码名称',
  `codeOrder` int(11) DEFAULT NULL COMMENT '排序',
  `codeStatus` int(1) DEFAULT '1' COMMENT '状态（1：有效，2：无效）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='代码';

-- ----------------------------
-- Records of code
-- ----------------------------
INSERT INTO `code` VALUES ('1', '01', 'PC', '第一批', '1', '1');
INSERT INTO `code` VALUES ('2', '02', 'PC', '第二批', '2', '1');
INSERT INTO `code` VALUES ('3', '03', 'PC', '第三批', '3', '1');
INSERT INTO `code` VALUES ('4', '04', 'PC', '第四批', '4', '1');
INSERT INTO `code` VALUES ('5', '05', 'PC', '第五批', '5', '1');
INSERT INTO `code` VALUES ('6', '06', 'PC', '第六批', '6', '1');
INSERT INTO `code` VALUES ('7', '07', 'PC', '第七批', '7', '1');
INSERT INTO `code` VALUES ('8', '08', 'PC', '第八批', '8', '1');
INSERT INTO `code` VALUES ('9', '09', 'PC', '第九批', '9', '1');
INSERT INTO `code` VALUES ('10', '10', 'PC', '第十批', '10', '1');
INSERT INTO `code` VALUES ('11', '0', 'YN', '否', '1', '1');
INSERT INTO `code` VALUES ('12', '1', 'YN', '是', '2', '1');

-- ----------------------------
-- Table structure for eduset
-- ----------------------------
DROP TABLE IF EXISTS `eduset`;
CREATE TABLE `eduset` (
  `eduID` int(11) NOT NULL AUTO_INCREMENT COMMENT '教育经历ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `eduStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
  `eduEnd` timestamp NULL DEFAULT NULL COMMENT '终止时间',
  `eduSchool` varchar(255) NOT NULL COMMENT '在何学校',
  `eduMajor` varchar(128) DEFAULT NULL,
  `eduPost` varchar(255) DEFAULT NULL COMMENT '任职职务',
  `eduBurseHonorary` text COMMENT '奖学金及荣誉称号',
  PRIMARY KEY (`eduID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eduset
-- ----------------------------

-- ----------------------------
-- Table structure for famset
-- ----------------------------
DROP TABLE IF EXISTS `famset`;
CREATE TABLE `famset` (
  `famID` int(11) NOT NULL AUTO_INCREMENT COMMENT '家庭成员ID',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  `famRelation` varchar(64) NOT NULL COMMENT '成员关系',
  `famName` varchar(64) NOT NULL COMMENT '成员姓名',
  `famCom` varchar(64) DEFAULT NULL COMMENT '所在工作单位',
  `famPost` varchar(64) DEFAULT NULL COMMENT '任职岗位',
  PRIMARY KEY (`famID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of famset
-- ----------------------------

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
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
  `perBirth` timestamp NULL DEFAULT NULL COMMENT '出生年月',
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
  PRIMARY KEY (`perID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------

-- ----------------------------
-- Table structure for recruit
-- ----------------------------
DROP TABLE IF EXISTS `recruit`;
CREATE TABLE `recruit` (
  `recID` int(11) NOT NULL AUTO_INCREMENT COMMENT '招聘ID',
  `recYear` varchar(50) NOT NULL COMMENT '招聘年度',
  `recBatch` varchar(50) NOT NULL COMMENT '招聘批次',
  `recDefault` int(1) NOT NULL DEFAULT '0' COMMENT '是否进行中',
  `recStart` timestamp NULL DEFAULT NULL COMMENT '招聘起始时间',
  `recEnd` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '招聘终止时间',
  `recViewPlace` varchar(255) NOT NULL COMMENT '面试地点',
  `recHealthPlace` varchar(255) NOT NULL COMMENT '体检地点',
  `recBack` int(1) DEFAULT '0' COMMENT '是否归档',
  PRIMARY KEY (`recID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recruit
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `name` varchar(128) DEFAULT NULL COMMENT '用户名（身份证号）',
  `realName` varchar(128) DEFAULT NULL COMMENT '真实姓名',
  `password` varchar(128) DEFAULT NULL COMMENT '登录密码',
  `userType` int(1) DEFAULT NULL COMMENT '用户类别（0：管理员，1：应聘者，2：用人单位，3：区人才办）',
  `userLoginCount` int(11) DEFAULT NULL COMMENT '登录次数',
  `userRegisterTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userLastLoginTime` timestamp NULL DEFAULT NULL COMMENT '最后登录时间',
  `companyID` int(11) DEFAULT NULL COMMENT '单位id',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号码',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2220 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2219', 'admin', 'guanliyuan', 'fcea920f7412b5da7be0cf42b8c93759', '3', '6', '2017-10-16 09:41:05', '2017-10-18 14:31:42', '1022', '13285716129');

-- ----------------------------
-- Table structure for workset
-- ----------------------------
DROP TABLE IF EXISTS `workset`;
CREATE TABLE `workset` (
  `wkID` int(11) NOT NULL AUTO_INCREMENT COMMENT '工作经历ID',
  `wkStart` timestamp NULL DEFAULT NULL COMMENT '起始时间',
  `wkEnd` timestamp NULL DEFAULT NULL COMMENT '截止时间',
  `wkPost` varchar(255) NOT NULL COMMENT '所在岗位',
  `wkCom` varchar(255) NOT NULL COMMENT '所在单位',
  `wkInfo` text NOT NULL COMMENT '工作简述',
  `perID` int(11) NOT NULL COMMENT '人员ID',
  PRIMARY KEY (`wkID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of workset
-- ----------------------------
