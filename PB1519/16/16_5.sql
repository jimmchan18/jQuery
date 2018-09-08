SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 表的结构 `lanmu`
CREATE TABLE IF NOT EXISTS `lanmu` (
  `lanmu_id` int(11) NOT NULL,
  `zhuanji_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 表的结构 `lanmu_info`
CREATE TABLE IF NOT EXISTS `lanmu_info` (
  `lanmu_id` int(11) NOT NULL,
  `lanmu_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `lanmu_id` (`lanmu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 表的结构 `video_info`
CREATE TABLE IF NOT EXISTS `video_info` (
  `video_id` int(11) NOT NULL,
  `video_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
　`video_file` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 表的结构 `zhuanji`
CREATE TABLE IF NOT EXISTS `zhuanji` (
  `zhuanji_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 表的结构 `zhuanji_info`
CREATE TABLE IF NOT EXISTS `zhuanji_info` (
  `zhuanji_id` int(11) NOT NULL,
  `zhuanji_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `zhuanji_id` (`zhuanji_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;