
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `yi_article`
-- ----------------------------
DROP TABLE IF EXISTS `yi_article`;
CREATE TABLE `yi_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_one` varchar(64) DEFAULT NULL,
  `class_one_id` int(11) DEFAULT NULL COMMENT '分类一级',
  `class_two` varchar(64) DEFAULT NULL,
  `class_two_id` int(11) DEFAULT NULL COMMENT '分类二级',
  `title` varchar(256) DEFAULT NULL COMMENT '标题',
  `image` varchar(256) DEFAULT NULL COMMENT '封面图片',
  `is_home` tinyint(1) DEFAULT '0' COMMENT '1首页幻灯',
  `is_release` tinyint(1) DEFAULT '0' COMMENT '1为发布，0为不发布',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `content` text COMMENT '内容',
  `click_num` int(11) DEFAULT '0',
  `manager_id` int(11) DEFAULT '0' COMMENT '发表文件的管理员',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `class_one` (`class_one_id`),
  KEY `class_two` (`class_two_id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_article
-- ----------------------------

INSERT INTO yi_article VALUES ('146', 'Swift', '160', 'Swift+IOS', '163', 'MKNetworkKit更换域名时错误解决方法', '', '0', '1', '0', '<p>如果出现以下问题</p><pre class=\"brush:php;toolbar:false\">NSURLSession/NSURLConnection&nbsp;HTTP&nbsp;load&nbsp;failed&nbsp;(kCFStreamErrorDomainSSL,&nbsp;-9801)\r\nnw_coretls_read_one_record&nbsp;tls_handshake_process:&nbsp;[-9801]</pre><p><br/></p><p>需要在plist文件里作如下配置</p><pre class=\"brush:php;toolbar:false\">&lt;key&gt;NSAppTransportSecurity&lt;/key&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;dict&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;key&gt;NSAllowsArbitraryLoads&lt;/key&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;false/&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;key&gt;NSExceptionDomains&lt;/key&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;dict&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;key&gt;Your&nbsp;domain&nbsp;url&lt;/key&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;dict&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;key&gt;NSIncludesSubdomains&lt;/key&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;string&gt;YES&lt;/string&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;key&gt;NSExceptionMinimumTLSVersion&lt;/key&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;string&gt;TLSv1.0&lt;/string&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/dict&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/dict&gt;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&lt;/dict&gt;</pre><p><br/></p><p>这里需要注意的是，“ Your domain url ” 这个URL可能是服务器端重定向的URL，也就是说你APP端发送一个请求，经过服务器端的重定向，返回的是另一个URL， 这个URL就是我们需要做配置排除ATS的。</p>', '3', '1', '1491308239');

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
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_class
-- ----------------------------
INSERT INTO yi_class VALUES ('140', '135', '135,', '2', 'Style', '2', '1477207782');
INSERT INTO yi_class VALUES ('141', '135', '135,', '2', 'Javascript', '3', '1477207788');
INSERT INTO yi_class VALUES ('163', '160', '135,160,', '3', 'Swift+IOS', '0', '1490780588');
INSERT INTO yi_class VALUES ('144', '136', '135,136,', '3', 'Nginx', '0', '1477232511');
INSERT INTO yi_class VALUES ('145', '136', '135,136,', '3', 'Apache', '0', '1477232517');
INSERT INTO yi_class VALUES ('135', '0', '', '1', '技术文章分类', '0', '1474956620');
INSERT INTO yi_class VALUES ('162', '136', '135,136,', '3', 'Sphinx', '0', '1488785302');
INSERT INTO yi_class VALUES ('161', '160', '135,160,', '3', 'CourseRecord', '0', '1484991428');
INSERT INTO yi_class VALUES ('160', '135', '135,', '2', 'Swift', '0', '1484991375');
INSERT INTO yi_class VALUES ('155', '137', '135,137,', '3', 'Mongodb', '0', '1477359228');
INSERT INTO yi_class VALUES ('156', '141', '135,141,', '3', 'JS', '0', '1477359320');
INSERT INTO yi_class VALUES ('157', '136', '135,136,', '3', 'Command', '0', '1477362925');
INSERT INTO yi_class VALUES ('158', '139', '135,139,', '3', 'PHPcode', '0', '1477363504');
INSERT INTO yi_class VALUES ('159', '136', '135,136,', '3', 'Memcached', '0', '1477367537');
INSERT INTO yi_class VALUES ('139', '135', '135,', '2', 'PHP', '4', '1477207777');
INSERT INTO yi_class VALUES ('137', '135', '135,', '2', 'Database', '5', '1477207764');
INSERT INTO yi_class VALUES ('136', '135', '135,', '2', 'Linux', '6', '1477207757');
INSERT INTO yi_class VALUES ('154', '137', '135,137,', '3', 'Redis', '0', '1477359201');
INSERT INTO yi_class VALUES ('153', '136', '135,136,', '3', 'GIT', '0', '1477359189');
INSERT INTO yi_class VALUES ('152', '136', '135,136,', '3', 'SVN', '0', '1477359177');
INSERT INTO yi_class VALUES ('151', '140', '135,140,', '3', 'Html5', '0', '1477232607');
INSERT INTO yi_class VALUES ('150', '140', '135,140,', '3', 'Bootstrap', '0', '1477232586');
INSERT INTO yi_class VALUES ('149', '140', '135,140,', '3', 'Css', '0', '1477232569');
INSERT INTO yi_class VALUES ('148', '141', '135,141,', '3', 'Jquery', '0', '1477232562');
INSERT INTO yi_class VALUES ('147', '139', '135,139,', '3', 'Thinkphp', '2', '1477232554');
INSERT INTO yi_class VALUES ('146', '139', '135,139,', '3', 'Yii2', '1', '1477232547');
INSERT INTO yi_class VALUES ('143', '137', '135,137,', '3', 'Mysql', '0', '1477232495');

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
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_function
-- ----------------------------
INSERT INTO yi_function VALUES ('12', '0', '系统常规功能', 'none', '1', '1', '0', '1472277965');
INSERT INTO yi_function VALUES ('13', '12', '系统信息查看', 'index/default', '0', '1', '0', '1472277965');
INSERT INTO yi_function VALUES ('14', '0', '信息系统管理', 'none', '2', '0', '0', '1472278180');
INSERT INTO yi_function VALUES ('16', '12', '管理员登录日志', 'manager-record/list', '1', '1', '0', '1472279022');
INSERT INTO yi_function VALUES ('17', '12', '管理员管理', 'manager/list', '3', '1', '0', '1472279078');
INSERT INTO yi_function VALUES ('18', '12', '管理员分组管理', 'manager-group/list', '4', '1', '0', '1472279093');
INSERT INTO yi_function VALUES ('19', '12', '系统功能管理', 'function/list', '5', '1', '0', '1472279107');
INSERT INTO yi_function VALUES ('43', '14', '技术文章管理', 'article/list', '0', '0', '0', '1472474271');
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yi_manager
-- ----------------------------
INSERT INTO yi_manager VALUES ('1', 'zjwlgr', '02bbc9253fb630843b6af6a95a501908', '张健', '1', '0', '186', '119.255.37.225', '1491472436', '1473512951');
INSERT INTO yi_manager VALUES ('2', 'houjiandong', '8a1148a74ba479fcaca5e34f5de73d45', '候建东', '1', '0', '18', '123.118.208.210', '1486346668', '1473512951');
INSERT INTO yi_manager VALUES ('19', 'admin', '00ba7ceab606427071d5d755ea99e976', 'admin', '1', '0', '2', '127.0.0.1', '1484722944', '1484722815');
INSERT INTO yi_manager VALUES ('20', 'lwqbj', 'e10adc3949ba59abbe56e057f20f883e', '阿苏', '1', '0', '2', '221.217.223.35', '1487059732', '1487059684');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=utf8;

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
INSERT INTO yi_manager_record VALUES ('118', '1', 'zjwlgr', '张健', '127.0.0.1', '1475046504', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('119', '1', 'zjwlgr', '张健', '127.0.0.1', '1475898323', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('120', '1', 'zjwlgr', '张健', '127.0.0.1', '1477058863', 'Firefox 49.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('121', '1', 'zjwlgr', '张健', '127.0.0.1', '1477132860', 'Chrome 54.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('163', '1', 'zjwlgr', '张健', '127.0.0.1', '1483948451', 'Firefox 50.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('123', '1', 'zjwlgr', '张健', '127.0.0.1', '1477225912', 'Firefox 49.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('124', '1', 'zjwlgr', '张健', '127.0.0.1', '1477295959', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('125', '1', 'zjwlgr', '张健', '127.0.0.1', '1477310608', 'Firefox 49.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('126', '1', 'zjwlgr', '张健', '127.0.0.1', '1477367513', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('91', '2', 'admin', '管理员', '127.0.0.1', '1474188965', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('90', '1', 'zjwlgr', '张健', '127.0.0.1', '1474188734', 'Firefox 48.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('127', '1', 'zjwlgr', '张健', '127.0.0.1', '1477471509', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('128', '1', 'zjwlgr', '张健', '127.0.0.1', '1477617314', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('129', '1', 'zjwlgr', '张健', '127.0.0.1', '1477644801', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('130', '1', 'zjwlgr', '张健', '127.0.0.1', '1477659250', 'Firefox 49.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('131', '1', 'zjwlgr', '张健', '119.255.37.225', '1477983759', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('132', '1', 'zjwlgr', '张健', '119.255.37.225', '1477984007', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('133', '2', 'admin', '管理员', '222.129.47.49', '1477984238', 'Internet Explorer 7.0', 'Windows NT');
INSERT INTO yi_manager_record VALUES ('134', '2', 'admin', '管理员', '119.255.37.225', '1477984252', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('135', '1', 'zjwlgr', '张健', '119.255.37.225', '1477984270', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('136', '2', 'admin', '管理员', '222.129.47.49', '1477984317', 'Internet Explorer 7.0', 'Windows NT');
INSERT INTO yi_manager_record VALUES ('137', '1', 'zjwlgr', '张健', '127.0.0.1', '1477986951', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('138', '1', 'zjwlgr', '张健', '119.255.37.225', '1478050049', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('139', '1', 'zjwlgr', '张健', '127.0.0.1', '1478745714', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('140', '1', 'zjwlgr', '张健', '127.0.0.1', '1478850496', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('141', '1', 'zjwlgr', '张健', '106.37.111.33', '1478914343', 'Firefox 49.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('142', '1', 'zjwlgr', '张健', '127.0.0.1', '1479187071', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('143', '1', 'zjwlgr', '张健', '127.0.0.1', '1479377864', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('144', '1', 'zjwlgr', '张健', '119.255.37.225', '1479444274', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('145', '1', 'zjwlgr', '张健', '119.255.37.225', '1480037958', 'Firefox 49.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('146', '1', 'zjwlgr', '张健', '119.255.37.225', '1482315268', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('147', '1', 'zjwlgr', '张健', '119.255.37.225', '1482472811', 'Firefox 49.0', 'Linux');
INSERT INTO yi_manager_record VALUES ('148', '1', 'zjwlgr', '张健', '49.4.158.2', '1482579147', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('149', '1', 'zjwlgr', '张健', '127.0.0.1', '1482715483', 'Chrome 53.0', 'Linux');
INSERT INTO yi_manager_record VALUES ('150', '1', 'zjwlgr', '张健', '119.255.37.225', '1482722552', 'Chrome 53.0', 'Linux');
INSERT INTO yi_manager_record VALUES ('151', '1', 'zjwlgr', '张健', '127.0.0.1', '1482758021', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('152', '1', 'zjwlgr', '张健', '119.255.37.225', '1482900558', 'Firefox 50.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('153', '1', 'zjwlgr', '张健', '119.255.37.225', '1482900622', 'Safari ', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('154', '1', 'zjwlgr', '张健', '49.4.158.2', '1482930604', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('155', '1', 'zjwlgr', '张健', '119.255.37.225', '1483494082', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('156', '1', 'zjwlgr', '张健', '49.4.158.1', '1483630562', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('157', '1', 'zjwlgr', '张健', '119.255.37.225', '1483699961', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('158', '1', 'zjwlgr', '张健', '49.4.158.0', '1483771394', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('159', '1', 'zjwlgr', '张健', '127.0.0.1', '1483772691', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('160', '1', 'zjwlgr', '张健', '127.0.0.1', '1483783882', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('161', '1', 'zjwlgr', '张健', '127.0.0.1', '1483784938', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('162', '1', 'zjwlgr', '张健', '49.4.158.0', '1483784972', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('164', '1', 'zjwlgr', '张健', '119.255.37.225', '1483948515', 'Chrome 51.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('165', '1', 'zjwlgr', '张健', '119.255.37.225', '1484550184', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('166', '1', 'zjwlgr', '张健', '119.255.37.225', '1484720827', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('167', '1', 'zjwlgr', '张健', '127.0.0.1', '1484721652', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('168', '2', 'houjiandong', '候建东', '119.255.37.225', '1484721744', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('169', '2', 'houjiandong', '候建东', '114.249.253.99', '1484721812', 'Internet Explorer 7.0', 'Windows NT');
INSERT INTO yi_manager_record VALUES ('170', '1', 'zjwlgr', '张健', '127.0.0.1', '1484722753', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('171', '19', 'admin', 'admin', '127.0.0.1', '1484722842', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('172', '19', 'admin', 'admin', '127.0.0.1', '1484722944', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('173', '1', 'zjwlgr', '张健', '119.255.37.225', '1484724265', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('174', '1', 'zjwlgr', '张健', '119.255.37.225', '1484991367', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('175', '1', 'zjwlgr', '张健', '119.255.37.225', '1486204073', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('176', '1', 'zjwlgr', '张健', '39.155.186.202', '1486215301', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('177', '1', 'zjwlgr', '张健', '39.155.186.202', '1486309165', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('178', '2', 'houjiandong', '候建东', '123.118.208.210', '1486346668', 'Internet Explorer 7.0', 'Windows NT');
INSERT INTO yi_manager_record VALUES ('179', '1', 'zjwlgr', '张健', '39.155.186.200', '1486478244', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('180', '1', 'zjwlgr', '张健', '119.255.37.225', '1486976520', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('181', '1', 'zjwlgr', '张健', '127.0.0.1', '1486992788', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('182', '1', 'zjwlgr', '张健', '119.255.37.225', '1487059641', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('183', '20', 'lwqbj', '阿苏', '119.255.37.225', '1487059708', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('184', '20', 'lwqbj', '阿苏', '221.217.223.35', '1487059732', 'Chrome 57.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('185', '1', 'zjwlgr', '张健', '119.255.37.225', '1487059737', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('186', '1', 'zjwlgr', '张健', '119.255.37.225', '1487310369', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('187', '1', 'zjwlgr', '张健', '39.155.186.234', '1487434589', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('188', '1', 'zjwlgr', '张健', '119.255.37.225', '1487578850', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('189', '1', 'zjwlgr', '张健', '39.155.186.230', '1487853139', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('190', '1', 'zjwlgr', '张健', '127.0.0.1', '1487857180', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('191', '1', 'zjwlgr', '张健', '39.155.186.234', '1488119790', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('192', '1', 'zjwlgr', '张健', '119.255.37.225', '1488172344', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('193', '1', 'zjwlgr', '张健', '119.255.37.225', '1488256968', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('194', '1', 'zjwlgr', '张健', '119.255.37.225', '1488433833', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('195', '1', 'zjwlgr', '张健', '119.255.37.225', '1488451075', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('196', '1', 'zjwlgr', '张健', '119.255.37.225', '1488451093', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('197', '1', 'zjwlgr', '张健', '119.255.37.225', '1488451113', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('198', '1', 'zjwlgr', '张健', '119.255.37.225', '1488451252', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('199', '1', 'zjwlgr', '张健', '119.255.37.225', '1488779423', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('200', '1', 'zjwlgr', '张健', '119.255.37.225', '1488785260', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('201', '1', 'zjwlgr', '张健', '119.255.37.225', '1488864339', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('202', '1', 'zjwlgr', '张健', '119.255.37.225', '1488882033', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('203', '1', 'zjwlgr', '张健', '39.155.186.229', '1488980191', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('204', '1', 'zjwlgr', '张健', '119.255.37.225', '1490058979', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('205', '1', 'zjwlgr', '张健', '39.155.186.236', '1490443948', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('206', '1', 'zjwlgr', '张健', '119.255.37.225', '1490581987', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('207', '1', 'zjwlgr', '张健', '119.255.37.225', '1490688292', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('208', '1', 'zjwlgr', '张健', '119.255.37.225', '1490773463', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('209', '1', 'zjwlgr', '张健', '127.0.0.1', '1490952917', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('210', '1', 'zjwlgr', '张健', '127.0.0.1', '1490966903', 'Firefox 51.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('211', '1', 'zjwlgr', '张健', '127.0.0.1', '1490973492', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('212', '1', 'zjwlgr', '张健', '127.0.0.1', '1491038768', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('213', '1', 'zjwlgr', '张健', '127.0.0.1', '1491038796', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('214', '1', 'zjwlgr', '张健', '39.155.186.235', '1491051624', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('215', '1', 'zjwlgr', '张健', '127.0.0.1', '1491129182', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('216', '1', 'zjwlgr', '张健', '218.108.128.59', '1491140666', 'Chrome 44.0', 'Mac OS');
INSERT INTO yi_manager_record VALUES ('217', '1', 'zjwlgr', '张健', '127.0.0.1', '1491357806', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('218', '1', 'zjwlgr', '张健', '119.255.37.225', '1491363568', 'Chrome 55.0', 'Windows 7');
INSERT INTO yi_manager_record VALUES ('219', '1', 'zjwlgr', '张健', '119.255.37.225', '1491472436', 'Chrome 55.0', 'Windows 7');
