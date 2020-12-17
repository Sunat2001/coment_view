--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL default '',
  `url` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `body` text collate utf8_unicode_ci NOT NULL,
  `dt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;