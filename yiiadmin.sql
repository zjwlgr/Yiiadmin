/*
Navicat MySQL Data Transfer

Source Server         : zjwlgr
Source Server Version : 50615
Source Host           : 123.57.233.23:3306
Source Database       : yiiadmin

Target Server Type    : MYSQL
Target Server Version : 50615
File Encoding         : 65001

Date: 2016-09-28 14:59:44
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `yi_class`
-- ----------------------------
DROP TABLE IF EXISTS `yi_class`;
CREATE TABLE `yi_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL DEFAULT '0',
  `nexus` varchar(2048) DEFAULT NULL COMMENT '关系ID',
  `depth` int(11) NOT NULL DEFAULT '0' COMMENT '深度',
  `name` varchar(64) DEFAULT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  `ctime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_class
-- ----------------------------
INSERT INTO yi_class VALUES ('132', '126', '106,109,121,126,', '5', '育知路', '0', '1474956456');
INSERT INTO yi_class VALUES ('133', '131', '106,109,121,126,131,', '6', '一区', '0', '1474956462');
INSERT INTO yi_class VALUES ('134', '131', '106,109,121,126,131,', '6', '二区', '0', '1474956466');
INSERT INTO yi_class VALUES ('131', '126', '106,109,121,126,', '5', '流星花园', '0', '1474956448');
INSERT INTO yi_class VALUES ('130', '125', '106,109,121,125,', '5', '地铁', '0', '1474956440');
INSERT INTO yi_class VALUES ('106', '0', '', '1', '一线城市', '0', '1474956287');
INSERT INTO yi_class VALUES ('107', '0', '', '1', '二线城市', '0', '1474956292');
INSERT INTO yi_class VALUES ('135', '0', '', '1', 'Document Type', '0', '1474956620');
INSERT INTO yi_class VALUES ('109', '106', '106,', '2', '北京', '0', '1474956302');
INSERT INTO yi_class VALUES ('110', '106', '106,', '2', '上海', '0', '1474956305');
INSERT INTO yi_class VALUES ('111', '106', '106,', '2', '广州', '0', '1474956307');
INSERT INTO yi_class VALUES ('112', '106', '106,', '2', '深圳', '0', '1474956313');
INSERT INTO yi_class VALUES ('113', '107', '107,', '2', '福州市', '0', '1474956321');
INSERT INTO yi_class VALUES ('114', '107', '107,', '2', '合肥市', '0', '1474956324');
INSERT INTO yi_class VALUES ('115', '107', '107,', '2', '郑州市', '0', '1474956327');
INSERT INTO yi_class VALUES ('116', '107', '107,', '2', '哈尔滨', '0', '1474956331');
INSERT INTO yi_class VALUES ('121', '109', '106,109,', '3', '昌平区', '0', '1474956365');
INSERT INTO yi_class VALUES ('122', '109', '106,109,', '3', '东城区', '0', '1474956370');
INSERT INTO yi_class VALUES ('123', '109', '106,109,', '3', '海淀区', '0', '1474956375');
INSERT INTO yi_class VALUES ('124', '121', '106,109,121,', '4', '南口', '0', '1474956386');
INSERT INTO yi_class VALUES ('125', '121', '106,109,121,', '4', '沙河', '0', '1474956393');
INSERT INTO yi_class VALUES ('126', '121', '106,109,121,', '4', '回龙观', '1', '1474956400');
INSERT INTO yi_class VALUES ('127', '124', '106,109,121,124,', '5', '东街', '0', '1474956410');
INSERT INTO yi_class VALUES ('128', '124', '106,109,121,124,', '5', '市场', '0', '1474956421');
INSERT INTO yi_class VALUES ('129', '125', '106,109,121,125,', '5', '北大桥', '0', '1474956427');

-- ----------------------------
-- Table structure for `yi_function`
-- ----------------------------
DROP TABLE IF EXISTS `yi_function`;
CREATE TABLE `yi_function` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fid` int(10) NOT NULL DEFAULT '0',
  `fname` varchar(64) DEFAULT NULL,
  `furi` varchar(128) DEFAULT NULL,
  `sort` int(5) NOT NULL DEFAULT '0',
  `candel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0可以删除，1不可以删除',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0显示，1不显示',
  `ctime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_function
-- ----------------------------
INSERT INTO yi_function VALUES ('12', '0', '系统常规功能', 'none', '1', '1', '0', '1472277965');
INSERT INTO yi_function VALUES ('13', '12', '系统信息查看', 'index/default', '0', '1', '0', '1472277965');
INSERT INTO yi_function VALUES ('14', '0', '认证系统管理', 'none', '2', '0', '0', '1472278180');
INSERT INTO yi_function VALUES ('15', '14', '测试列管理', 'indexd/sudent', '2', '0', '0', '1472278180');
INSERT INTO yi_function VALUES ('16', '12', '管理员登录日志', 'manager-record/list', '1', '1', '0', '1472279022');
INSERT INTO yi_function VALUES ('17', '12', '管理员管理', 'manager/list', '3', '1', '0', '1472279078');
INSERT INTO yi_function VALUES ('18', '12', '管理员分组管理', 'manager-group/list', '4', '1', '0', '1472279093');
INSERT INTO yi_function VALUES ('19', '12', '系统功能管理', 'function/list', '5', '1', '0', '1472279107');
INSERT INTO yi_function VALUES ('43', '14', 'T试列管理', 'test/test', '0', '0', '0', '1472474271');
INSERT INTO yi_function VALUES ('22', '0', '备课资料管理', 'none', '3', '0', '0', '1472279230');
INSERT INTO yi_function VALUES ('24', '22', '测试列管理', 'test/test', '0', '0', '0', '1472279256');
INSERT INTO yi_function VALUES ('25', '22', '测试列管理', 'test/test', '0', '0', '0', '1472279379');
INSERT INTO yi_function VALUES ('26', '22', '测试列管理', 'sssss/sssss', '0', '0', '0', '1472303738');
INSERT INTO yi_function VALUES ('45', '12', '系统分类管理', 'class/index', '7', '0', '0', '1472483198');

-- ----------------------------
-- Table structure for `yi_manager`
-- ----------------------------
DROP TABLE IF EXISTS `yi_manager`;
CREATE TABLE `yi_manager` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `uname` varchar(32) NOT NULL COMMENT '管理员姓名',
  `group_id` int(5) NOT NULL DEFAULT '0' COMMENT '管理员分组ID',
  `locking` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为正常，1为锁定',
  `number` int(10) DEFAULT '0' COMMENT '登录次数',
  `login_ip` varchar(15) DEFAULT NULL COMMENT '最后一次登录IP',
  `login_time` int(11) DEFAULT '0' COMMENT '最后一次登录时间',
  `ctime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_manager
-- ----------------------------
INSERT INTO yi_manager VALUES ('1', 'zjwlgr', '02bbc9253fb630843b6af6a95a501908', '张健', '1', '0', '93', '127.0.0.1', '1475042701', '1473512951');
INSERT INTO yi_manager VALUES ('2', 'admin', 'ceb4dd6f44bcf052cc23c658846fca6b', '管理员', '2', '0', '12', '119.255.37.225', '1474251622', '1473512951');

-- ----------------------------
-- Table structure for `yi_manager_group`
-- ----------------------------
DROP TABLE IF EXISTS `yi_manager_group`;
CREATE TABLE `yi_manager_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(32) DEFAULT NULL,
  `function` varchar(1024) DEFAULT '',
  `ctime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_manager_group
-- ----------------------------
INSERT INTO yi_manager_group VALUES ('1', '超级管理员', 'CJ', '499965143');
INSERT INTO yi_manager_group VALUES ('2', '运营部', '{\"12\":[\"13\",\"16\"],\"14\":[\"43\",\"15\"],\"22\":[\"24\",\"25\",\"26\"]}', '1474202021');

-- ----------------------------
-- Table structure for `yi_manager_record`
-- ----------------------------
DROP TABLE IF EXISTS `yi_manager_record`;
CREATE TABLE `yi_manager_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `uname` varchar(32) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `browser` varchar(512) DEFAULT NULL COMMENT '浏览器信息',
  `system` varchar(512) DEFAULT NULL COMMENT '系统信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_manager_record
-- ----------------------------
INSERT INTO yi_manager_record VALUES ('92', '1', 'zjwlgr', '张健', '127.0.0.1', '1474188983', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('93', '1', 'zjwlgr', '张健', '127.0.0.1', '1474201209', 'Firefox 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('94', '2', 'admin', '管理员', '127.0.0.1', '1474201996', 'Firefox 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('95', '2', 'admin', '管理员', '127.0.0.1', '1474203754', 'Firefox 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('96', '1', 'zjwlgr', '张健', '127.0.0.1', '1474203769', 'Firefox 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('97', '1', 'zjwlgr', '张健', '127.0.0.1', '1474203838', 'Firefox 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('98', '1', 'zjwlgr', '张健', '127.0.0.1', '1474207295', 'Firefox 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('99', '1', 'zjwlgr', '张健', '127.0.0.1', '1474207444', 'Firefox 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('100', '1', 'zjwlgr', '张健', '127.0.0.1', '1474207571', 'Firefox 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('101', '1', 'zjwlgr', '张健', '127.0.0.1', '1474247670', 'Firefox 48.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('102', '1', 'zjwlgr', '张健', '127.0.0.1', '1474248871', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('103', '1', 'zjwlgr', '张健', '127.0.0.1', '1474249168', 'Firefox 48.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('104', '1', 'zjwlgr', '张健', '119.255.37.225', '1474249963', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('110', '1', 'zjwlgr', '张健', '127.0.0.1', '1475027746', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('106', '1', 'zjwlgr', '张健', '117.100.123.19', '1474465693', 'Chrome 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('107', '1', 'zjwlgr', '张健', '117.100.123.19', '1474465746', 'Chrome 42.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('108', '1', 'zjwlgr', '张健', '127.0.0.1', '1474777815', 'Firefox 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('109', '1', 'zjwlgr', '张健', '127.0.0.1', '1474806696', 'Firefox 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('111', '1', 'zjwlgr', '张健', '119.255.37.225', '1475027804', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('112', '1', 'zjwlgr', '张健', '127.0.0.1', '1475041880', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('113', '1', 'zjwlgr', '张健', '127.0.0.1', '1475041994', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('114', '1', 'zjwlgr', '张健', '127.0.0.1', '1475042453', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('115', '1', 'zjwlgr', '张健', '127.0.0.1', '1475042484', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('116', '1', 'zjwlgr', '张健', '127.0.0.1', '1475042581', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('117', '1', 'zjwlgr', '张健', '127.0.0.1', '1475042701', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('91', '2', 'admin', '管理员', '127.0.0.1', '1474188965', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('90', '1', 'zjwlgr', '张健', '127.0.0.1', '1474188734', 'Firefox 48.0', 'Windows 7');
