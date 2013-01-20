CREATE TABLE IF NOT EXISTS `users` (
	`user_id` int(4) NOT NULL AUTO_INCREMENT,
	`user_name` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
        `user_password` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
	`user_role` int(1) NOT NULL,
	`user_email` varchar(255) NOT NULL,
	PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `video` (
	`video_id` int(4) NOT NULL AUTO_INCREMENT,
	`video_name` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
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
	`comment_post_date` int(11) NOT NULL,
	PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `tags` (
	`tag_id` int(4) NOT NULL AUTO_INCREMENT,
	`tag_name` varchar(255) COLLATE utf8_latvian_ci NOT NULL,
	PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci AUTO_INCREMENT=1;
