-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2014 年 08 月 27 日 07:02
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `cms`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `admin`
-- 

CREATE TABLE `admin` (
  `aId` int(3) NOT NULL auto_increment,
  `aName` varchar(20) NOT NULL,
  `aPwd` varchar(20) NOT NULL,
  PRIMARY KEY  (`aId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `admin`
-- 

INSERT INTO `admin` VALUES (1, 'admin', '123456');
INSERT INTO `admin` VALUES (2, 'zhangsan', '111111');

-- --------------------------------------------------------

-- 
-- 表的结构 `category`
-- 

CREATE TABLE `category` (
  `cgId` int(4) NOT NULL auto_increment,
  `cgPid` int(4) NOT NULL,
  `cgName` varchar(200) NOT NULL,
  PRIMARY KEY  (`cgId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `category`
-- 

INSERT INTO `category` VALUES (1, 0, '吉林林情');
INSERT INTO `category` VALUES (2, 0, '林业机构');
INSERT INTO `category` VALUES (3, 0, '政务公开');
INSERT INTO `category` VALUES (6, 1, '林业综述');
INSERT INTO `category` VALUES (7, 1, '林业规划');
INSERT INTO `category` VALUES (8, 2, '林业厅简介');
INSERT INTO `category` VALUES (9, 2, '直属事业单位');
INSERT INTO `category` VALUES (10, 1, '林业年报');
INSERT INTO `category` VALUES (11, 3, '林业要闻');
INSERT INTO `category` VALUES (12, 3, '领导活动');

-- --------------------------------------------------------

-- 
-- 表的结构 `news`
-- 

CREATE TABLE `news` (
  `nId` int(4) NOT NULL auto_increment,
  `nTitle` varchar(200) NOT NULL,
  `nSource` varchar(200) NOT NULL,
  `nSourceName` varchar(100) NOT NULL,
  `nDate` date NOT NULL,
  `nContent` text NOT NULL,
  `cFid` int(4) NOT NULL,
  `cSid` int(4) NOT NULL,
  PRIMARY KEY  (`nId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `news`
-- 

INSERT INTO `news` VALUES (1, '林业规划 的很好', 'http://www.sohu.com', '搜狐', '2014-08-27', '林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好林业规划 的很好v', 1, 7);
INSERT INTO `news` VALUES (2, '林业厅 停止办公333333', 'http://ww.baidu.com', '百度', '2014-08-27', '  林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公林业厅 停止办公', 2, 8);
INSERT INTO `news` VALUES (3, '今年的工作不错', 'http://www.aa.com', '不存在', '2014-08-27', '今年的工作不错', 1, 10);
INSERT INTO `news` VALUES (4, '这是林业综述的文章', 'http://ww.baidu.com', '百度', '2014-08-27', '这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章这是林业综述的文章v', 1, 6);
INSERT INTO `news` VALUES (5, '林业综述2', 'http://www.aa.com', '测试网站', '2014-08-27', '林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2林业综述2', 1, 6);
