-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2016 年 04 月 15 日 02:28
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `news`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `article`
-- 

CREATE TABLE `article` (
  `aId` int(2) NOT NULL auto_increment,
  `aFilePath` varchar(200) NOT NULL,
  `aDate` date NOT NULL,
  `aSource` varchar(200) NOT NULL,
  `aContent` varchar(200) NOT NULL,
  `aTitle` varchar(200) NOT NULL,
  PRIMARY KEY  (`aId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `article`
-- 

INSERT INTO `article` VALUES (1, 'html/news_1.html', '2016-04-15', 'http://www.baidu.com', '新华社快讯：据韩联社15日报道，朝鲜试图发射导弹失败。4月15日为朝鲜传统节日“太阳节”(金日成诞辰)。', '韩媒：朝鲜试图发射导弹失败 今日为金日成诞辰');
INSERT INTO `article` VALUES (2, 'html/news_2.html', '2016-04-16', 'https://www.baidu.com/', '近日，深圳中英街验证大厅，执勤哨兵发现一骑自行车过关口的男子神态有异，金属探测器检查男子时警报响起。男子将自行车往哨兵处推倒后逃跑，被抓住。搜查发现男子马甲内藏涉嫌走私的金砖10块，共计20斤，案值约260余万元。目前案件仍在审查中', '男子马夹藏20斤金砖 深圳闯关被查(图)');
