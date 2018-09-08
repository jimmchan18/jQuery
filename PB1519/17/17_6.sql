SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
-- 表的结构 `message`
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(10) unsigned NOT NULL,
  `message_neirong` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `message_demo` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 表的结构 `replay`
CREATE TABLE IF NOT EXISTS `replay` (
  `replay_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `replay_neirong` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `replay_id` (`replay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 表的结构 `replay_info`
CREATE TABLE IF NOT EXISTS `replay_info` (
  `message_id` int(11) NOT NULL,
  `replay_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 表的结构 `user`
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_nicheng` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 表的结构 `user_message`
CREATE TABLE IF NOT EXISTS `user_message` (
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;