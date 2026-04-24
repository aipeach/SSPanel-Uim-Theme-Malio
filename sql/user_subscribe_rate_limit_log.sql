--
-- 低流量用户订阅限速日志
--
CREATE TABLE IF NOT EXISTS `user_subscribe_rate_limit_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL COMMENT '用户 ID',
  `link_id` bigint(20) DEFAULT NULL COMMENT 'link 表 ID',
  `subscribe_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '订阅类型',
  `node_group` int(11) NOT NULL DEFAULT 0 COMMENT '订阅分组',
  `request_ip` varchar(182) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求 IP',
  `request_ua` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '请求 UA',
  `request_ua_hash` char(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '请求 UA 哈希',
  `request_time` datetime NOT NULL COMMENT '请求时间',
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否命中限速，0-否，1-是',
  `blocked_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '触发限速原因',
  PRIMARY KEY (`id`),
  KEY `idx_user_group_ip_ua_time` (`user_id`,`node_group`,`request_ip`,`request_ua_hash`,`request_time`),
  KEY `idx_request_time` (`request_time`),
  KEY `idx_blocked` (`is_blocked`),
  CONSTRAINT `user_subscribe_rate_limit_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='低流量用户订阅限速日志';

