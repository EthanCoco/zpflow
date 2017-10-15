/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.10
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : zpflow

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-10-15 22:12:27
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=MyISAM AUTO_INCREMENT=2219 DEFAULT CHARSET=utf8 COMMENT='用户表';
