DROP TABLE IF EXISTS `board_board`;
CREATE TABLE `board_board` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `slug` varchar(15) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '标识',
  `desc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `sort` int(5) DEFAULT '100' COMMENT '排序，越大越靠前',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1-开启',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='分类';

#
# Data for table "board_board"
#

/*!40000 ALTER TABLE `board_board` DISABLE KEYS */;
INSERT INTO `board_board` VALUES (1,'测试','ceshi1','测试',100,1,1655823356,'127.0.0.1'),(2,'测试','ceshi2','测试',100,1,1655823356,'127.0.0.1'),(3,'测试','ceshi11','测试分类描述',106,1,1655823356,'127.0.0.1'),(5,'测试','ceshi33','测试',100,0,1655823356,'127.0.0.1'),(6,'测试','ceshi3','测试',100,1,1655823356,'127.0.0.1'),(8,'测试','ceshi4','测试',100,1,1655823356,'127.0.0.1'),(9,'测试','ceshi5','测试',100,1,1655823356,'127.0.0.1'),(10,'测试','ceshi6','测试',100,1,1655823356,'127.0.0.1'),(11,'测试','ceshi7','测试',100,1,1655823356,'127.0.0.1'),(12,'测试','ceshi8','测试',100,1,1655823356,'127.0.0.1'),(13,'测试','ceshi9','测试',100,1,1655823356,'127.0.0.1'),(15,'安卓123','aaa123','测试安卓123描述',101,1,1659413133,'127.0.0.1');
/*!40000 ALTER TABLE `board_board` ENABLE KEYS */;

#
# Structure for table "board_board_access"
#

DROP TABLE IF EXISTS `board_board_access`;
CREATE TABLE `board_board_access` (
  `board_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '账号ID',
  `access` text COLLATE utf8mb4_unicode_ci COMMENT '权限',
  PRIMARY KEY (`board_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='分类权限关系';

#
# Data for table "board_board_access"
#

/*!40000 ALTER TABLE `board_board_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `board_board_access` ENABLE KEYS */;

#
# Structure for table "board_comment"
#

DROP TABLE IF EXISTS `board_comment`;
CREATE TABLE `board_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属话题',
  `reply_id` int(10) unsigned DEFAULT '0' COMMENT '回复ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '账号ID',
  `content` text CHARACTER SET utf8mb4 NOT NULL COMMENT '内容',
  `is_top` tinyint(1) unsigned DEFAULT '0' COMMENT '置顶,1-置顶',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1-开启',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='回复';

#
# Data for table "board_comment"
#

/*!40000 ALTER TABLE `board_comment` DISABLE KEYS */;
INSERT INTO `board_comment` VALUES (1,1,0,1,'sdfgsd',0,1,1659499732,''),(2,1,0,1,'sdfgsd',0,1,1659499732,''),(4,1,0,1,'sdfgsd',0,1,1659499732,''),(5,1,0,1,'sdfgsd',0,1,1659499732,''),(6,5,0,1,'123222',0,1,1663989857,'127.0.0.1'),(8,5,0,1,'测试回复',0,1,1664119163,'127.0.0.1'),(9,5,0,1,'22',0,1,1664119430,'127.0.0.1'),(11,1,0,1,'22',0,1,1664119774,'127.0.0.1'),(12,20,0,1,'22',0,1,1664166454,'127.0.0.1'),(13,11,0,1,'55',0,1,1664167167,'127.0.0.1'),(14,14,0,1,'rrrrrrrrr',0,1,1664167187,'127.0.0.1'),(15,36,0,1,'<p>sgfshsd</p>',0,1,1664334165,'127.0.0.1'),(16,36,0,1,'<p><strong><em><u>测试一个</u></em></strong><sub>123123</sub></p>',0,1,1664334177,'127.0.0.1'),(17,36,0,1,'<p><span class=\"ql-formula\" data-value=\"e=m2\">﻿<span contenteditable=\"false\"><span class=\"katex\"><span class=\"katex-mathml\"><math><semantics><mrow><mi>e</mi><mo>=</mo><mi>m</mi><mn>2</mn></mrow><annotation encoding=\"application/x-tex\">e=m2</annotation></semantics></math></span><span class=\"katex-html\" aria-hidden=\"true\"><span class=\"strut\" style=\"height: 0.64444em;\"></span><span class=\"strut bottom\" style=\"height: 0.64444em; vertical-align: 0em;\"></span><span class=\"base textstyle uncramped\"><span class=\"mord mathit\">e</span><span class=\"mrel\">=</span><span class=\"mord mathit\">m</span><span class=\"mord mathrm\">2</span></span></span></span></span>﻿</span> </p>',1,1,1664334380,'127.0.0.1'),(18,37,0,1,'<p>测试</p>',0,1,1664508140,'127.0.0.1');
/*!40000 ALTER TABLE `board_comment` ENABLE KEYS */;

#
# Structure for table "board_setting"
#

DROP TABLE IF EXISTS `board_setting`;
CREATE TABLE `board_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '字段',
  `value` text CHARACTER SET utf8mb4 NOT NULL COMMENT '字段值',
  `desc` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '字段说明',
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='设置';

#
# Data for table "board_setting"
#

/*!40000 ALTER TABLE `board_setting` DISABLE KEYS */;
INSERT INTO `board_setting` VALUES (1,'website_name','热门八卦王','网站名称'),(2,'website_keywords','热门八卦王','网站关键字'),(3,'website_description','热门八卦王','网站描述'),(4,'website_copyright','版权1','网站版权'),(5,'website_status','1','网站关闭状态'),(6,'website_beian','ICP备123456号-1','网站备案');
/*!40000 ALTER TABLE `board_setting` ENABLE KEYS */;

#
# Structure for table "board_topic"
#

DROP TABLE IF EXISTS `board_topic`;
CREATE TABLE `board_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '账号ID',
  `title` varchar(150) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '话题标题',
  `content` text CHARACTER SET utf8mb4 NOT NULL COMMENT '内容',
  `views` int(10) unsigned DEFAULT '0' COMMENT '阅读数量',
  `replys` int(10) unsigned DEFAULT '0' COMMENT '回复数量',
  `is_top` tinyint(1) unsigned DEFAULT '0' COMMENT '置顶,1-置顶',
  `is_digest` tinyint(1) unsigned DEFAULT '0' COMMENT '1-精华帖',
  `is_close` tinyint(1) unsigned DEFAULT '0' COMMENT '是否关闭',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1-开启',
  `last_reply` int(10) DEFAULT '0' COMMENT '最后回复时间',
  `last_user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后回复账号ID',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `board_id` (`board_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='话题';

#
# Data for table "board_topic"
#

/*!40000 ALTER TABLE `board_topic` DISABLE KEYS */;
INSERT INTO `board_topic` VALUES (1,1,1,'测试','测试',20,5,0,0,0,1,0,0,1655823356,''),(2,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(5,15,1,'关键字123','关键字123',81,3,0,0,0,1,0,0,1663731291,'127.0.0.1'),(6,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(7,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(8,15,1,'关键字123','关键字123',71,3,0,0,0,1,0,0,1663731291,'127.0.0.1'),(9,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(10,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(11,15,1,'关键字123','关键字123',73,1,0,0,0,1,1664167167,1,1663731291,'127.0.0.1'),(12,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(13,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(14,15,1,'关键字2222222222','关键字1232222222',74,1,0,0,0,1,1664167187,1,1663731291,'127.0.0.1'),(15,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(16,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(17,15,1,'关键字123','关键字123',72,3,0,0,0,1,0,0,1663731291,'127.0.0.1'),(18,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(19,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(20,15,1,'关键字123','关键字123',82,1,0,0,0,1,1664166454,1,1663731291,'127.0.0.1'),(21,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(22,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(23,15,1,'关键字123','关键字123',71,3,0,0,0,1,0,0,1663731291,'127.0.0.1'),(24,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(25,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(26,15,1,'关键字123','关键字123',71,3,0,0,0,1,0,0,1663731291,'127.0.0.1'),(27,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(28,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(29,15,1,'关键字123','关键字123',71,3,0,0,0,1,0,0,1663731291,'127.0.0.1'),(30,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(31,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(32,15,1,'关键字123','关键字123',71,3,0,0,0,1,0,0,1663731291,'127.0.0.1'),(33,1,1,'测试','测试',6,5,0,0,0,1,0,0,1655823356,''),(34,1,1,'测试','测试',4,0,1,0,1,1,0,0,1655823356,''),(35,15,1,'关键字123','关键字123',73,3,0,0,0,1,0,0,1663731291,'127.0.0.1'),(36,3,1,'话题222','<p><strong><em>123132就是一个</em></strong></p><p><br></p><p><strong><u>一个故事</u></strong></p><p><br></p><p><strong><u><span class=\"ql-cursor\">﻿</span><img src=\"http://slim-board.test1000.com/upload/avatar/9d038148228939bd.jpg\"></u></strong></p>',68,3,0,0,0,1,1664334380,1,1664253420,'127.0.0.1'),(37,2,1,'图片测试','<p><span class=\"ql-cursor\">﻿</span><img src=\"http://slim-board.test1000.com/upload/avatar/9d038148228939bd.jpg\"></p>',48,1,0,0,0,1,1664508140,1,1664338874,'127.0.0.1');
/*!40000 ALTER TABLE `board_topic` ENABLE KEYS */;

#
# Structure for table "board_user"
#

DROP TABLE IF EXISTS `board_user`;
CREATE TABLE `board_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '账号，大小写字母数字',
  `password` char(60) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `email` varchar(60) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '邮箱',
  `avatar` char(32) CHARACTER SET utf8mb4 DEFAULT '' COMMENT '头像',
  `sign` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '签名',
  `login_time` int(10) DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '1-启用，0-禁用',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户';

#
# Data for table "board_user"
#

/*!40000 ALTER TABLE `board_user` DISABLE KEYS */;
INSERT INTO `board_user` VALUES (1,'admin','$2y$10$hAkhfM7LCGX4CpivsfJ0BOGqsmgkFsJ6b5h8k85BJHT4n6lU3dyau','管理员','admin@admin.com','9d038148228939bd.jpg','天气很好',1664553482,1,1655823356,''),(3,'test','$2y$10$qxyy5wyiIarkJPUDVhPX6.PRiKsEyyO20nyrgpQcNkbdZkXcSNtUO','测试','','','测试账号',0,1,1659438477,'127.0.0.1'),(6,'admin2','$2y$10$gHoWN0oJrkPPXy2qLpSd7OQjrEvGAiIW4kASjMTGbekzZZj9LW7k6','admin2','admin2@admin.com','',NULL,0,1,1664510812,'127.0.0.1');
/*!40000 ALTER TABLE `board_user` ENABLE KEYS */;
