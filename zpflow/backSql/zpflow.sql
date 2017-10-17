/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.10
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : zpflow

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-10-18 00:12:24
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
  `ancPubUid` int(11) NOT NULL COMMENT '发布人ID',
  `ancTime` timestamp NULL DEFAULT NULL COMMENT '发布时间',
  `ancType` char(1) DEFAULT NULL COMMENT '公告类别（A=招聘简介，B=公司简介）',
  `ancStatus` int(1) NOT NULL DEFAULT '0' COMMENT '发布状态（0=未发布，1=已发布）',
  PRIMARY KEY (`ancID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of announce
-- ----------------------------
INSERT INTO `announce` VALUES ('1', '24', '公告测试', '434234324324', '1', null, 'A', '2');
INSERT INTO `announce` VALUES ('2', '24', '2414343', '4324324324', '1', null, 'A', '2');
INSERT INTO `announce` VALUES ('8', '26', 'fdsfdsfsd', 'fdsfds', '1', '0000-00-00 00:00:00', 'A', '0');
INSERT INTO `announce` VALUES ('7', '26', 'fdfsfd', 'fdfd', '1', '0000-00-00 00:00:00', 'B', '0');
INSERT INTO `announce` VALUES ('3', '26', 'ewewewe', 'wewewew', '1', '0000-00-00 00:00:00', 'A', '0');
INSERT INTO `announce` VALUES ('6', '26', 'dfsgfgf', 'gfgfgf', '1', '0000-00-00 00:00:00', 'B', '0');
INSERT INTO `announce` VALUES ('5', '26', 'fdsfdsfsd', 'fdsfsdfds', '1', '0000-00-00 00:00:00', 'B', '0');
INSERT INTO `announce` VALUES ('4', '26', 'ewqeqweqwe', 'qweqweqw', '1', '0000-00-00 00:00:00', 'A', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='代码';

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recruit
-- ----------------------------
INSERT INTO `recruit` VALUES ('24', '2017', '02', '2', '2017-10-17 00:00:00', '2017-10-17 04:00:00', '', '', '1');
INSERT INTO `recruit` VALUES ('27', '2017', '04', '0', '2017-10-17 00:00:00', '2017-10-18 00:00:00', 'wqeqwe', 'ewqeqwe', '0');
INSERT INTO `recruit` VALUES ('26', '2017', '03', '1', '2017-10-17 00:00:00', '2017-10-28 00:00:00', '7878', '7878', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=2220 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2219', 'admin', 'guanliyuan', 'fcea920f7412b5da7be0cf42b8c93759', '3', '5', '2017-10-16 09:41:05', '2017-10-17 21:08:45', '1022', '13285716129');
