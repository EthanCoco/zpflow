
SET FOREIGN_KEY_CHECKS=0;

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
  `recDefault` int(1) NOT NULL DEFAULT '0' COMMENT '是否默认招聘',
  `recStart` timestamp NULL DEFAULT NULL COMMENT '招聘起始时间',
  `recEnd` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '招聘终止时间',
  `recViewPlace` varchar(255) NOT NULL COMMENT '面试地点',
  `recHealthPlace` varchar(255) NOT NULL COMMENT '体检地点',
  PRIMARY KEY (`recID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recruit
-- ----------------------------
INSERT INTO `recruit` VALUES ('11', '2017', '02', '1', '2017-10-16 00:00:00', '2017-10-17 00:00:00', '111', '222');
INSERT INTO `recruit` VALUES ('12', '2017', '01', '0', '2017-10-17 00:00:00', '2017-10-20 00:00:00', '666', '666');
INSERT INTO `recruit` VALUES ('13', '2017', '04', '0', '2017-10-17 00:00:00', '2017-10-19 00:00:00', 'qqq', 'aaaa');
INSERT INTO `recruit` VALUES ('14', '2017', '05', '0', '2017-10-19 00:00:00', '2017-10-28 00:00:00', '', '');
