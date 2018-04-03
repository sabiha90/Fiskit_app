CREATE TABLE `sentence_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sentence_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `fisk_id` int(10) unsigned NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `edited` tinyint(1) NOT NULL DEFAULT '0',
  `word_count` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28808 DEFAULT CHARSET=utf8;