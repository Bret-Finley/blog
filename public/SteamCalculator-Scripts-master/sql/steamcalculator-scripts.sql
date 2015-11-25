
CREATE TABLE IF NOT EXISTS `sc_steamgames` (
  `appid` int(10) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` mediumint(6) unsigned NOT NULL,
  PRIMARY KEY (`appid`),
  KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
