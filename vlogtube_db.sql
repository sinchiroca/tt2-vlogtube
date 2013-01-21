CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_latvian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `last_login` varchar(25) COLLATE utf8_latvian_ci NOT NULL,
  `login_hash` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
  `profile_fields` text COLLATE utf8_latvian_ci NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `video` (
	`video_id` int(4) NOT NULL AUTO_INCREMENT,
	`video_name` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
        `video_url` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
	`video_descr` varchar(255) COLLATE utf8_latvian_ci NULL,
        `video_user_id` int(4) NOT NULL,
	`video_post_date` int(11) NOT NULL,
	`video_report` int(1) NOT NULL,
	PRIMARY KEY (`video_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `comments` (
	`comment_id` int(4) NOT NULL AUTO_INCREMENT,
	`comment_descr` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
        `comment_user_id` int(4) NOT NULL,
        `comment_video_id` int(4) NOT NULL,
        `comment_status` int(1) NOT NULL,
	`comment_post_date` int(11) NOT NULL,
	PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `tags` (
	`tag_id` int(4) NOT NULL AUTO_INCREMENT,
	`tag_name` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
	PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=1;
