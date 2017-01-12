-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--  
-- 主机: localhost
-- 生成日期: 2017 年 01 月 06 日 13:37
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

-- 这个数据库 包含很多 演示代码所需要的数据。
-- 比如 php mysql 函数库，以及用户增删改案例

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--
CREATE DATABASE `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- 表的结构 `books`
--
-- 创建时间: 2016 年 12 月 28 日 02:44
--

CREATE TABLE IF NOT EXISTS `books` (
  `bId` int(8) NOT NULL AUTO_INCREMENT,
  `bName` varchar(255) DEFAULT NULL,
  `bTypeId` int(3) NOT NULL,
  `bPublishing` varchar(80) DEFAULT NULL,
  `bAuthor` varchar(60) DEFAULT NULL,
  `bDate` date DEFAULT NULL,
  `bStatus` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`bId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`bId`, `bName`, `bTypeId`, `bPublishing`, `bAuthor`, `bDate`, `bStatus`) VALUES
(93, '网站直通车2', 2, '电脑爱好者杂志社', '苗壮', NULL, NULL),
(94, '黑客与网络安全', 6, '航空工业出版社', '白立超', NULL, NULL),
(95, '网络程序与设计－asp', 2, '北方交通大学出版社', '王玥', NULL, NULL),
(96, 'pagemaker 7.0短期培训教程', 9, '中国电力出版社', '孙利英', NULL, NULL),
(97, '黑客攻击防范秘笈', 8, '北京腾图电子出版社', '赵雷雨', NULL, NULL),
(98, 'Dreamweaver 4入门与提高', 2, '清华大学出版社', '岳玉博', NULL, NULL),
(99, '网页样式设计－CSS', 2, '人民邮电出版社', '张晓阳', NULL, NULL),
(100, 'Internet操作技术', 7, '清华大学出版社', '肖铭', NULL, NULL),
(101, 'Dreamweaver 4网页制作', 2, '清华大学出版社', '黄宇', NULL, NULL),
(102, '3D MAX 3.0 创作效果百例', 3, '北京万水电子信息出版社', '耿影', NULL, NULL),
(103, 'Auto CAD职业技能培训教程', 3, '北京希望电子出版社', '张晓阳', NULL, NULL),
(104, 'Fireworks 4网页图形制作', 2, '清华大学出版社', '白立超', NULL, NULL),
(105, '自己动手建立企业局域网', 7, '清华大学出版社', '郭刚', NULL, NULL),
(106, '页面特效精彩实例制作', 2, '人民邮电出版社', '白宇', NULL, NULL),
(107, '平面设计制作整合案例详解－页面设计卷', 9, '人民邮电出版社', '陈继云', NULL, NULL),
(108, 'Illustrator 10完全手册', 9, '科学出版社', '周玉勇', NULL, NULL),
(109, 'FreeHand 10基础教程', 9, '北京希望电子出版', '耿影', NULL, NULL),
(110, '网站设计全程教程', 2, '科学出版社', '吴守辉', NULL, NULL),
(111, '动态页面技术－HTML 4.0使用详解', 2, '人民邮电出版社', '卢立超', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `btype`
--
-- 创建时间: 2016 年 12 月 28 日 06:18
-- 最后更新: 2016 年 12 月 28 日 06:18
--

CREATE TABLE IF NOT EXISTS `btype` (
  `bTypeId` int(10) NOT NULL AUTO_INCREMENT,
  `bTypeName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`bTypeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `btype`
--

INSERT INTO `btype` (`bTypeId`, `bTypeName`) VALUES
(1, 'windows应用'),
(2, '网站'),
(3, '3D动画'),
(4, 'linux学习'),
(5, 'Delphi学习'),
(6, '黑客'),
(7, '网络技术'),
(8, '安全'),
(9, '平面'),
(10, 'AutoCAD技术');

-- --------------------------------------------------------

--
-- 表的结构 `class`
--
-- 创建时间: 2016 年 12 月 13 日 06:07
-- 最后更新: 2016 年 12 月 13 日 06:08
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `pid` mediumint(6) NOT NULL DEFAULT '0',
  `bb` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `title`, `pid`, `bb`) VALUES
(1, '精品男装', 0, '99:00:00'),
(2, '精品女装', 0, '00:00:00'),
(3, '精品童装', 0, '00:00:00'),
(4, '精品视频', 0, NULL),
(5, '夹克', 1, NULL),
(6, '风衣', 1, NULL),
(7, '连衣裙', 2, NULL),
(8, '内衣', 2, NULL),
(9, '1-3岁', 3, NULL),
(10, '4-6岁', 3, NULL),
(11, '上衣', 4, NULL),
(12, '下衣', 4, NULL),
(13, '柒牌', 5, NULL),
(14, '劲霸', 5, NULL),
(15, '红风衣', 6, NULL),
(16, '绿风衣', 6, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `demo`
--
-- 创建时间: 2016 年 12 月 28 日 01:17
-- 最后更新: 2016 年 12 月 28 日 01:18
--

CREATE TABLE IF NOT EXISTS `demo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f1` varchar(32) NOT NULL,
  `f2` varchar(32) NOT NULL,
  `f3` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `demo`
--

INSERT INTO `demo` (`id`, `f1`, `f2`, `f3`) VALUES
(1, '333', '333', 1234),
(2, '2323', '2323', 123456789);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--
-- 创建时间: 2016 年 12 月 29 日 08:57
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(6) NOT NULL AUTO_INCREMENT,
  `u_id` int(6) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `money` int(6) DEFAULT NULL,
  `datatime` date DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `ud` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`order_id`, `u_id`, `username`, `money`, `datatime`) VALUES
(3, NULL, 'lisi', 700, '2012-02-04'),
(4, NULL, 'lisi', 900, '2012-02-04'),
(5, 3, 'wangwu', 100, '2012-02-04'),
(6, 3, 'wangwu', 200, '2012-02-04'),
(8, 3, 'wangwu', 200, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `stu`
--
-- 创建时间: 2016 年 12 月 13 日 06:44
-- 最后更新: 2016 年 12 月 28 日 02:40
--

CREATE TABLE IF NOT EXISTS `stu` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `stuNum` varchar(6) DEFAULT NULL,
  `stuName` varchar(20) DEFAULT NULL,
  `stuAge` tinyint(2) DEFAULT NULL,
  `stuSex` enum('1','2') DEFAULT NULL,
  `stuTel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `stu`
--

INSERT INTO `stu` (`id`, `stuNum`, `stuName`, `stuAge`, `stuSex`, `stuTel`) VALUES
(1, '0001', 'zhangsan', 18, '1', '11111111'),
(2, '0002', 'lisi', 16, '2', '12345668'),
(3, '0003', '赵六', 20, '2', '12345668'),
(4, '0001', 'zhangsan', 18, '1', '11111111'),
(5, '0002', 'lisi', 16, '2', '12345668'),
(6, '0003', '王五', 19, '2', '12345668'),
(7, '0001', 'zhangsan', 18, '1', '11111111'),
(8, '0002', 'lisi', 16, '2', '12345668'),
(9, '0003', '王五', 19, '2', '12345668'),
(10, '0001', 'zhangsan', 18, '1', '11111111'),
(11, '0002', 'lisi', 16, '2', '12345668'),
(12, '0003', '王五', 19, '2', '12345668');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--
-- 创建时间: 2016 年 12 月 13 日 07:49
-- 最后更新: 2016 年 12 月 13 日 07:49
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `stuNum` varchar(6) DEFAULT NULL,
  `stuName` varchar(20) DEFAULT NULL,
  `stuAge` tinyint(2) DEFAULT NULL,
  `stuSex` enum('1','2') DEFAULT NULL,
  `stuTel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `stuNum`, `stuName`, `stuAge`, `stuSex`, `stuTel`) VALUES
(1, '0001', 'zhangsan', 18, '1', '1311111111'),
(2, '0002', 'lisi', 16, '2', '1322222222'),
(3, '0003', '王五', 19, '2', '133333333'),
(4, '0001', 'zhangsan', 18, '1', '1311111111'),
(5, '0002', 'lisi', 16, '2', '1322222222'),
(6, '0003', '王五', 19, '2', '133333333');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--
-- 创建时间: 2016 年 12 月 29 日 08:57
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `sex`) VALUES
(3, 'wangwu', 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--
-- 创建时间: 2017 年 01 月 06 日 01:16
-- 最后更新: 2017 年 01 月 06 日 03:31
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uName` varchar(32) CHARACTER SET utf8 NOT NULL,
  `uPwd` varchar(32) CHARACTER SET utf8 NOT NULL,
  `uSex` tinyint(4) NOT NULL,
  `uTel` varchar(32) CHARACTER SET utf8 NOT NULL,
  `uEmail` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `uName`, `uPwd`, `uSex`, `uTel`, `uEmail`) VALUES
(1, 'zhangsan', '111111', 0, '11111', ''),
(2, 'lisi', '222222', 0, '2222', ''),
(3, 'wangwu', '333333', 0, '33333', ''),
(4, 'zhaoliu', '444444', 0, '44444', ''),
(5, '小王', '1234567', 2, '13212345678', 'cc@aa.com'),
(6, '小刘', '1234567', 2, '13212345678', 'cc@aa.com'),
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
(39, 'xuexi', '2345', 1, '1355555555', 'ee@ee.com');

-- --------------------------------------------------------

--
-- 表的结构 `users1`
--
-- 创建时间: 2016 年 12 月 29 日 08:07
-- 最后更新: 2016 年 12 月 29 日 08:07
--

CREATE TABLE IF NOT EXISTS `users1` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dp` (`pwd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `orders_ibfk_8` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_9` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
