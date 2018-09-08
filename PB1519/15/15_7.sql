--
-- 数据库: `music`
--

-- --------------------------------------------------------

--
-- 表的结构 `music_info`
--

CREATE TABLE IF NOT EXISTS `music_info` (
  `music_id` int(10) unsigned NOT NULL,
  `music_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `music_doc` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `music_id` (`music_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `music_info`
--

INSERT INTO `music_info` (`music_id`, `music_name`, `music_doc`) VALUES
(1, 'never say never', 'no0'),
(1, 'some body to love', 'no1'),
(3, 'pray', 'no2'),
(4, 'my world', 'no3'),
(5, 'boyfriend', 'no4'),
(6, 'to love', 'no5');

-- --------------------------------------------------------

--
-- 表的结构 `singer`
--

CREATE TABLE IF NOT EXISTS `singer` (
  `singer_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `singer_info`
--

CREATE TABLE IF NOT EXISTS `singer_info` (
  `singer_id` int(10) unsigned NOT NULL,
  `singer_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `singer_pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `singer_id` (`singer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `theme_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- 表的结构 `theme_info`
--

CREATE TABLE IF NOT EXISTS `theme_info` (
  `theme_id` int(10) unsigned NOT NULL,
  `theme_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `theme_pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `theme_jieshao` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `zhuanji`
--

CREATE TABLE IF NOT EXISTS `zhuanji` (
  `zhuanji_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `zhuanji_info`
--

CREATE TABLE IF NOT EXISTS `zhuanji_info` (
  `zhuanji_id` int(10) unsigned NOT NULL,
  `zhuanji_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zhuanji_pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zhuanji_singer` int(10) unsigned NOT NULL,
  KEY `zhuanji_id` (`zhuanji_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;