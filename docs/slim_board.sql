
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='分类';

#
# Data for table "board_board"
#

/*!40000 ALTER TABLE `board_board` DISABLE KEYS */;
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
# Structure for table "board_reply"
#

DROP TABLE IF EXISTS `board_reply`;
CREATE TABLE `board_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属话题',
  `reply_id` int(10) unsigned DEFAULT NULL COMMENT '回复ID',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '账号ID',
  `content` text CHARACTER SET utf8mb4 NOT NULL COMMENT '内容',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1-开启',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='回复';

#
# Data for table "board_reply"
#

/*!40000 ALTER TABLE `board_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `board_reply` ENABLE KEYS */;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='设置';

#
# Data for table "board_setting"
#

/*!40000 ALTER TABLE `board_setting` DISABLE KEYS */;
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
  `last_reply` int(10) DEFAULT '0' COMMENT '最后回复时间',
  `is_top` tinyint(1) unsigned DEFAULT '0' COMMENT '置顶,1-置顶',
  `is_digest` tinyint(1) unsigned DEFAULT '0' COMMENT '1-精华帖',
  `is_close` tinyint(1) unsigned DEFAULT '0' COMMENT '是否关闭',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1-开启',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `board_id` (`board_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='话题';

#
# Data for table "board_topic"
#

/*!40000 ALTER TABLE `board_topic` DISABLE KEYS */;
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
  `avatar` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '头像',
  `sign` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '签名',
  `status` tinyint(1) DEFAULT '1' COMMENT '1-启用，0-禁用',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户';

#
# Data for table "board_user"
#

/*!40000 ALTER TABLE `board_user` DISABLE KEYS */;
INSERT INTO `board_user` VALUES (1,'admin','$2y$10$hAkhfM7LCGX4CpivsfJ0BOGqsmgkFsJ6b5h8k85BJHT4n6lU3dyau','管理员',NULL,'天气很好',1,0,'');
/*!40000 ALTER TABLE `board_user` ENABLE KEYS */;
