-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 03 日 10:52
-- 服务器版本: 5.5.40
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pro`
--

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uName` varchar(32) DEFAULT NULL,
  `uPwd` varchar(32) DEFAULT NULL,
  `uSex` tinyint(4) DEFAULT NULL,
  `uTel` varchar(32) DEFAULT NULL,
  `uEmail` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `uName`, `uPwd`, `uSex`, `uTel`, `uEmail`) VALUES
(12, 'zhangsanaaaa', '123456', 1, '13112345678', 'aa@aa.com'),
(13, '小张111bbbb', '1234567111', 2, '13212345678111', 'cc@aa.com111'),
(14, '小刘ccccc', '1234567', 2, '13212345678', 'cc@aa.com'),
(15, '小军dddd', '123', 2, '13312345678', 'dd@dd.com'),
(16, '小明eeee', '1234567', 2, '13212345678', 'cc@aa.com'),
(17, 'demoffff', '123456', 1, '134567890', 'ff@ff.com'),
(18, 'xuexigggg', '2345', 1, '1355555555', 'ee@ee.com'),
(19, 'zhangsanhhh', '123456', 1, '13112345678', 'aa@aa.com'),
(20, '小张111iiiii', '1234567111', 2, '13212345678111', 'cc@aa.com111'),
(21, '小刘jjj', '1234567', 2, '13212345678', 'cc@aa.com'),
(22, '小军kkk', '123', 2, '13312345678', 'dd@dd.com'),
(23, '小明llll', '1234567', 2, '13212345678', 'cc@aa.com'),
(24, 'demommm', '123456', 1, '134567890', 'ff@ff.com'),
(25, 'xuexinnnn', '2345', 1, '1355555555', 'ee@ee.com'),
(26, 'zhangsanqqqqq', '123456', 1, '13112345678', 'aa@aa.com'),
(27, '小张111ooo', '1234567111', 2, '13212345678111', 'cc@aa.com111'),
(28, '小刘pppp', '1234567', 2, '13212345678', 'cc@aa.com'),
(29, '小军wwww', '123', 2, '13312345678', 'dd@dd.com'),
(30, '小明eee', '1234567', 2, '13212345678', 'cc@aa.com'),
(31, 'demorrrr', '123456', 1, '134567890', 'ff@ff.com'),
(32, 'xuexittt', '2345', 1, '1355555555', 'ee@ee.com'),
(33, 'zhangsanyyyy', '123456', 1, '13112345678', 'aa@aa.com'),
(34, '小张111uuuu', '1234567111', 2, '13212345678111', 'cc@aa.com111'),
(35, '小刘zzzzz', '1234567', 2, '13212345678', 'cc@aa.com'),
(36, '小军1111', '123', 2, '13312345678', 'dd@dd.com'),
(37, '小明222', '1234567', 2, '13212345678', 'cc@aa.com'),
(38, 'demo333', '123456', 1, '134567890', 'ff@ff.com'),
(39, 'xuexi4444', '2345', 1, '1355555555', 'ee@ee.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
