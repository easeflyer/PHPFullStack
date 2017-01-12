-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 01 月 04 日 17:30
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cms`
--

DELIMITER $$
--
-- 存储过程
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `prOut`(OUT `pa` VARCHAR(200))
    NO SQL
begin
            select cgName into pa from category where cgId=3;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selCg`(IN `id` INT)
begin
  select * from category where cgId=id;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aId` int(3) NOT NULL AUTO_INCREMENT,
  `aName` varchar(20) NOT NULL,
  `aPwd` varchar(20) NOT NULL,
  PRIMARY KEY (`aId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`aId`, `aName`, `aPwd`) VALUES
(1, 'admin', '123456'),
(2, 'zhangsan', '111111');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cgId` int(4) NOT NULL AUTO_INCREMENT,
  `cgPid` int(4) NOT NULL,
  `cgName` varchar(200) NOT NULL,
  PRIMARY KEY (`cgId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cgId`, `cgPid`, `cgName`) VALUES
(1, 0, '吉林林情'),
(2, 0, '林业机构'),
(3, 0, '政务公开'),
(6, 1, '林业综述'),
(7, 1, '林业规划'),
(8, 2, '林业厅简介'),
(9, 2, '直属事业单位'),
(10, 1, '林业年报'),
(11, 3, '林业要闻'),
(12, 3, '领导活动'),
(14, 0, 'aaaa'),
(15, 0, 'aaaa'),
(16, 0, 'aaaa'),
(17, 0, 'aaaa'),
(18, 0, 'aaaa'),
(19, 0, 'aaaa'),
(20, 0, 'aaaa');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `nc`
--
CREATE TABLE IF NOT EXISTS `nc` (
`nId` int(4)
,`nTitle` varchar(200)
,`nDate` date
,`cgName` varchar(200)
);
-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `nId` int(4) NOT NULL AUTO_INCREMENT,
  `nTitle` varchar(200) NOT NULL,
  `nSource` varchar(200) NOT NULL,
  `nSourceName` varchar(100) NOT NULL,
  `nDate` date NOT NULL,
  `nContent` text NOT NULL,
  `cFid` int(4) NOT NULL,
  `cSid` int(4) NOT NULL,
  PRIMARY KEY (`nId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`nId`, `nTitle`, `nSource`, `nSourceName`, `nDate`, `nContent`, `cFid`, `cSid`) VALUES
(1, '林业规划 的很好', 'http://www.sohu.com', '搜狐', '2014-08-27', '林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好v', 1, 7),
(2, '林业厅 停止办公333333', 'http://ww.baidu.com', '百度', '2014-08-27', '  林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公', 2, 8),
(3, '今年的工作不错', 'http://www.aa.com', '不存在', '2014-08-27', '今年的工作不错', 1, 10),
(4, '这是林业综述的文章', 'http://ww.baidu.com', '百度', '2014-08-27', '这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章v', 1, 6),
(5, '林业综述2', 'http://www.aa.com', '测试网站', '2014-08-27', '林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2', 1, 6);

-- --------------------------------------------------------

--
-- 视图结构 `nc`
--
DROP TABLE IF EXISTS `nc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nc` AS select `n`.`nId` AS `nId`,`n`.`nTitle` AS `nTitle`,`n`.`nDate` AS `nDate`,`cg`.`cgName` AS `cgName` from (`news` `n` left join `category` `cg` on((`n`.`cFid` = `cg`.`cgId`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
