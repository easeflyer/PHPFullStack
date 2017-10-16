-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 10 月 10 日 15:43
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(1) NOT NULL,
  `module` varchar(45) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_access_role1_idx` (`role_id`),
  KEY `fk_access_node1_idx` (`node_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=551 ;

--
-- 转存表中的数据 `access`
--

INSERT INTO `access` (`id`, `level`, `module`, `role_id`, `node_id`) VALUES
(24, 3, NULL, 5, 8),
(25, 2, NULL, 5, 5),
(26, 1, NULL, 5, 1),
(27, 3, NULL, 5, 19),
(28, 2, NULL, 5, 16),
(472, 2, NULL, 2, 5),
(473, 1, NULL, 2, 1),
(474, 3, NULL, 2, 6),
(475, 3, NULL, 2, 8),
(476, 3, NULL, 2, 9),
(477, 3, NULL, 2, 10),
(478, 3, NULL, 2, 11),
(479, 3, NULL, 2, 12),
(480, 3, NULL, 2, 13),
(481, 3, NULL, 2, 14),
(482, 3, NULL, 2, 15),
(483, 2, NULL, 2, 16),
(484, 3, NULL, 2, 17),
(485, 3, NULL, 2, 18),
(486, 3, NULL, 2, 19),
(487, 3, NULL, 2, 20),
(488, 3, NULL, 2, 62),
(489, 2, NULL, 2, 21),
(490, 3, NULL, 2, 22),
(491, 3, NULL, 2, 23),
(492, 3, NULL, 2, 24),
(493, 3, NULL, 2, 25),
(494, 2, NULL, 2, 26),
(495, 3, NULL, 2, 27),
(496, 3, NULL, 2, 28),
(497, 3, NULL, 2, 29),
(498, 3, NULL, 2, 30),
(499, 2, NULL, 2, 31),
(500, 3, NULL, 2, 32),
(501, 3, NULL, 2, 33),
(502, 3, NULL, 2, 34),
(503, 3, NULL, 2, 35),
(504, 2, NULL, 2, 36),
(505, 3, NULL, 2, 37),
(506, 3, NULL, 2, 38),
(507, 3, NULL, 2, 39),
(508, 3, NULL, 2, 40),
(509, 3, NULL, 2, 41),
(510, 2, NULL, 2, 42),
(511, 3, NULL, 2, 43),
(512, 3, NULL, 2, 44),
(513, 3, NULL, 2, 45),
(514, 3, NULL, 2, 46),
(515, 2, NULL, 2, 63),
(516, 3, NULL, 2, 64),
(517, 3, NULL, 2, 65),
(518, 3, NULL, 2, 66),
(519, 3, NULL, 2, 67),
(520, 2, NULL, 2, 68),
(521, 3, NULL, 2, 69),
(522, 3, NULL, 2, 70),
(523, 3, NULL, 2, 71),
(524, 3, NULL, 2, 72),
(525, 2, NULL, 2, 73),
(526, 3, NULL, 2, 74),
(527, 3, NULL, 2, 75),
(528, 3, NULL, 2, 76),
(529, 3, NULL, 2, 77),
(530, 2, NULL, 2, 78),
(531, 3, NULL, 2, 79),
(532, 3, NULL, 2, 80),
(533, 3, NULL, 2, 81),
(534, 3, NULL, 2, 82),
(535, 3, NULL, 2, 83),
(536, 3, NULL, 2, 84),
(537, 3, NULL, 2, 85),
(538, 3, NULL, 2, 86),
(539, 3, NULL, 2, 87),
(540, 3, NULL, 2, 88),
(541, 2, NULL, 2, 89),
(542, 3, NULL, 2, 90),
(543, 3, NULL, 2, 91),
(544, 3, NULL, 2, 92),
(545, 3, NULL, 2, 93),
(546, 3, NULL, 6, 8),
(547, 2, NULL, 6, 5),
(548, 1, NULL, 6, 1),
(549, 3, NULL, 6, 18),
(550, 2, NULL, 6, 16);

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `signbuild` varchar(45) DEFAULT NULL,
  `besttime` varchar(45) DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_address_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`id`, `contact`, `address`, `tel`, `phone`, `signbuild`, `besttime`, `users_id`) VALUES
(2, '张三', '石家庄市中山新路长兴街12号', '0311-86969609', '12219821111', '肯德基', '工作日', 5),
(3, '李四', '石家庄市中山新路长兴街12号', '0311-86969609', '12219821111', '肯德基', '工作日', 5),
(4, '收货人demo', '详细地址 demo', '11111111', '11111111111', '标志建筑1', '无', 6);

-- --------------------------------------------------------

--
-- 表的结构 `adminuser`
--

CREATE TABLE IF NOT EXISTS `adminuser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `lastlogin` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `pwd`, `lastlogin`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1476065991'),
(9, 'adminuser2', 'f5bb0c8de146c67b44babbf4e6584cc0', '1459951871'),
(10, 'adminuser3', 'f5bb0c8de146c67b44babbf4e6584cc0', '1460040840'),
(11, 'adminuser4', 'f5bb0c8de146c67b44babbf4e6584cc0', '1460040859'),
(12, 'adminuser5', 'f5bb0c8de146c67b44babbf4e6584cc0', '1460908763'),
(13, 'testadmin', '39f2ee81b09dd5f45f197dacf9d5b30b', '1474617028');

-- --------------------------------------------------------

--
-- 表的结构 `attrlist`
--

CREATE TABLE IF NOT EXISTS `attrlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT '属性名称',
  `inputtype` binary(1) NOT NULL COMMENT '录入框类型\n1、输入框\n2、单选按钮\n3、多选',
  `optionlist` text COMMENT '如果INPUTtype是可选值，此处存储选项列表',
  `goodattr_id` int(10) unsigned NOT NULL,
  `inputname` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attrlist_goodattr1_idx` (`goodattr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `attrlist`
--

INSERT INTO `attrlist` (`id`, `name`, `inputtype`, `optionlist`, `goodattr_id`, `inputname`) VALUES
(1, '出版社', '1', NULL, 1, 'publish'),
(2, '颜色', '2', NULL, 2, 'color'),
(3, '分辨率', '1', NULL, 3, 'dpi'),
(4, '电视类型', '2', '智能电视\r\n非智能', 3, 'type');

-- --------------------------------------------------------

--
-- 表的结构 `attval`
--

CREATE TABLE IF NOT EXISTS `attval` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `val` varchar(100) DEFAULT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `attrlist_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attval_goods1_idx` (`goods_id`),
  KEY `fk_attval_attrlist1_idx` (`attrlist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `attval`
--

INSERT INTO `attval` (`id`, `val`, `goods_id`, `attrlist_id`) VALUES
(1, '全高清', 1, 3),
(2, '智能电视', 1, 4),
(3, '全高清', 2, 3),
(4, '智能电视', 2, 4),
(5, '全高清', 3, 3),
(6, '智能电视', 3, 4),
(7, '全高清', 4, 3),
(8, '智能电视', 4, 4),
(9, '全高清', 5, 3),
(10, '智能电视', 5, 4),
(11, '全高清', 6, 3),
(12, '智能电视', 6, 4),
(13, '全高清', 7, 3),
(14, '智能电视', 7, 4),
(15, '全高清', 8, 3),
(16, '智能电视', 8, 4),
(17, '全高清', 9, 3),
(18, '智能电视', 9, 4),
(19, '全高清', 10, 3),
(20, '智能电视', 10, 4),
(21, '全高清', 11, 3),
(22, '智能电视', 11, 4),
(23, '', 12, 3),
(24, '智能电视', 12, 4);

-- --------------------------------------------------------

--
-- 表的结构 `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brandname` varchar(45) NOT NULL COMMENT '商标名称',
  `image` varchar(100) DEFAULT NULL COMMENT '商标图片',
  `url` varchar(100) DEFAULT NULL,
  `info` longtext,
  `is_show` binary(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `brand`
--

INSERT INTO `brand` (`id`, `brandname`, `image`, `url`, `info`, `is_show`) VALUES
(1, '美的', '2016/01/24/56a49b011579a.jpg', '', '', '1'),
(2, 'TCL', '2016/01/24/56a49b0ee7248.jpg', '', '', '1'),
(3, 'TCL', '2016/01/24/56a49b1b1f7ed.jpg', '', '', '1'),
(4, '夏普', '2016/01/24/56a49b2697c27.jpg', '', '', '1'),
(5, '奥克斯', '2016/01/24/56a49b314398f.jpg', '', '', '1'),
(6, '海信', '2016/01/24/56a49b403cfc7.jpg', '', '', '1'),
(7, '长虹', '2016/01/24/56a49b57c1da2.jpg', '', '', '1'),
(8, '西门子', '2016/01/24/56a49b6c26f15.jpg', '', '', '1'),
(9, '老板', '2016/01/24/56a49b88f2dcd.jpg', '', '', '1');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(45) NOT NULL,
  `pid` int(10) unsigned DEFAULT NULL,
  `dw` varchar(20) DEFAULT NULL COMMENT '商品单位',
  `is_show` binary(1) DEFAULT '1',
  `order` int(11) DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `catname`, `pid`, `dw`, `is_show`, `order`) VALUES
(1, '家用电器', 0, '台', '1', 50),
(2, '手机、数码', 0, '台', '1', 50),
(3, '电脑、办公', 0, '台', '1', 50),
(4, '家居、家具、家装、厨具', 0, '套', '1', 50),
(5, '男装、女装', 0, '件', '1', 50),
(6, '个护化妆、清洁用品', 0, '套', '0', 50),
(7, '鞋靴、箱包、钟表、奢侈品', 0, '个', '0', 50),
(8, '大家电', 1, '台', '1', 50),
(9, '生活电器', 1, '台', '1', 50),
(10, '厨房电器', 1, '台', '1', 50),
(11, '个护健康', 1, '个', '1', 50),
(12, '五金家装', 1, '台', '1', 50),
(13, '平板电视', 8, '台', '1', 50),
(15, '空调', 8, '台', '1', 50);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_users1_idx` (`users_id`),
  KEY `fk_comment_goods1_idx` (`goods_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `content`, `users_id`, `goods_id`) VALUES
(1, '测试评论', 6, 1);

-- --------------------------------------------------------

--
-- 表的结构 `favor`
--

CREATE TABLE IF NOT EXISTS `favor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_favor_users1_idx` (`users_id`),
  KEY `fk_favor_goods1_idx` (`goods_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `favor`
--

INSERT INTO `favor` (`id`, `users_id`, `goods_id`) VALUES
(1, 5, 11),
(2, 5, 10);

-- --------------------------------------------------------

--
-- 表的结构 `goodattr`
--

CREATE TABLE IF NOT EXISTS `goodattr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attrname` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `goodattr`
--

INSERT INTO `goodattr` (`id`, `attrname`) VALUES
(1, '图书'),
(2, '女装'),
(3, '平板电视'),
(4, '手机');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsname` varchar(45) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `mprice` decimal(6,2) NOT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `goodsinfo` blob,
  `is_show` binary(1) DEFAULT '1',
  `goodattr_id` int(10) unsigned NOT NULL,
  `listorder` int(3) DEFAULT '50' COMMENT '排序',
  `goodtype_id` int(10) unsigned DEFAULT NULL,
  `storenum` int(10) unsigned NOT NULL DEFAULT '0',
  `goodpra` blob,
  PRIMARY KEY (`id`),
  KEY `fk_goods_category_idx` (`category_id`),
  KEY `fk_goods_brand1_idx` (`brand_id`),
  KEY `fk_goods_goodattr1_idx` (`goodattr_id`),
  KEY `fk_goods_goodtype1_idx` (`goodtype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `goodsname`, `price`, `mprice`, `thumb`, `category_id`, `brand_id`, `goodsinfo`, `is_show`, `goodattr_id`, `listorder`, `goodtype_id`, `storenum`, `goodpra`) VALUES
(1, '乐视超级电', '800.00', '1000.00', '2016/01/24/56a4a00aba05e.jpg', 13, 1, 0x3c68323e0d0a09e59586e59381e59bbee69687e4bfa1e681af0d0a3c2f68323e0d0a3c703e0d0a09e58f82e695b031efbc9ae58f82e695b00d0a3c2f703e0d0a3c703e0d0a093c696d67207372633d222f777973632f736b696e732f706c7567696e2f656469746f722f7068702f2e2e2f61747461636865642f696d6167652f32303136303932382f32303136303932383131353034315f33323733332e706e672220616c743d2222202f3e0d0a3c2f703e0d0a3c703e0d0a09e58f82e695b032efbc9ae58f82e695b00d0a3c2f703e, '1', 3, 50, 1, 12, 0x3c68323e0d0a09e59586e59381e58f82e695b00d0a3c2f68323e0d0a3c703e0d0a09e58f82e695b031efbc9ae58f82e695b00d0a3c2f703e0d0a3c703e0d0a09e58f82e695b032efbc9ae58f82e695b00d0a3c2f703e),
(2, '品牌电视', '3990.00', '4100.00', '2016/01/24/56a4a045b831d.jpg', 8, 2, '', '1', 3, 50, 1, 20, ''),
(3, '品牌电视', '3000.00', '3200.00', '2016/01/24/56a4a075ace28.jpg', 13, 5, '', '1', 3, 33, 1, 20, ''),
(4, '品牌电视', '1000.00', '1800.00', '2016/01/24/56a4a2fae0d82.jpg', 13, 5, '', '1', 3, 48, 1, 20, ''),
(5, '乐视超级电视', '1000.00', '1800.00', '2016/01/24/56a4a1126df64.jpg', 13, 7, '', '1', 3, 49, 1, 20, ''),
(6, '品牌电视', '40.00', '50.00', '2016/01/24/56a4a1604f0f1.jpg', 13, 1, '', '1', 3, 50, 1, 10, ''),
(7, '品牌电视1', '3990.00', '4100.00', '2016/01/24/56a4a18a75ff4.jpg', 13, 5, '', '1', 3, 30, 2, 20, ''),
(8, '品牌电视', '1000.00', '1200.00', '2016/01/24/56a4a1c835ba8.jpg', 13, 6, '', '1', 3, 50, 2, 20, ''),
(9, '品牌电视', '4001.00', '4100.00', '2016/01/24/56a4a1e8650cd.jpg', 13, 7, '', '1', 3, 50, 2, 20, ''),
(10, '品牌电视', '1000.00', '1600.00', '2016/01/24/56a4a21325e32.jpg', 13, 1, '', '1', 3, 50, 2, 3, ''),
(11, '品牌电视', '0.01', '4100.00', '2016/04/19/57162eff4746a.jpg', 13, 5, '', '1', 3, 47, 2, 10, ''),
(12, '品牌电视21', '333.00', '333.00', '2016/09/28/57eb638378286.jpg', 13, 2, '', '1', 3, 50, 1, 33, '');

-- --------------------------------------------------------

--
-- 表的结构 `goodspic`
--

CREATE TABLE IF NOT EXISTS `goodspic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picurl` varchar(100) DEFAULT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_goodspic_goods1_idx` (`goods_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `goodspic`
--

INSERT INTO `goodspic` (`id`, `picurl`, `goods_id`) VALUES
(1, '2016/01/24/56a49fc9daa5a.jpg', 1),
(2, '2016/01/24/56a49fc9dd9d0.jpg', 1),
(3, '2016/01/24/56a49fc9e02f3.jpg', 1),
(4, '2016/01/24/56a49fc9e2df0.jpg', 1),
(5, '2016/01/24/56a49fc9e5b3d.jpg', 1),
(6, '2016/04/17/5713a0522025a.jpg', 11),
(7, '2016/04/17/5713a07b687bb.jpg', 11),
(8, '2016/04/17/5713a07b6b8df.jpg', 11),
(9, '2016/04/17/5713a07b6e178.jpg', 11),
(10, '2016/04/17/5713a07b7193e.jpg', 11),
(11, '2016/09/28/57eb638382e68.jpg', 12),
(12, '2016/09/28/57eb638385d49.jpg', 12),
(13, '2016/09/28/57eb638387c89.jpg', 12),
(14, '2016/09/28/57eb6ebabf9af.jpg', 7),
(15, '2016/09/28/57eb6ebac3060.jpg', 7);

-- --------------------------------------------------------

--
-- 表的结构 `goodtype`
--

CREATE TABLE IF NOT EXISTS `goodtype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `goodtype`
--

INSERT INTO `goodtype` (`id`, `typename`) VALUES
(1, '热销商品'),
(2, '最新产品'),
(3, '新品推荐');

-- --------------------------------------------------------

--
-- 表的结构 `moneydetail`
--

CREATE TABLE IF NOT EXISTS `moneydetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oldmoney` decimal(10,2) NOT NULL,
  `newmoney` decimal(10,2) NOT NULL,
  `info` text NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_moneydetail_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `moneydetail`
--

INSERT INTO `moneydetail` (`id`, `oldmoney`, `newmoney`, `info`, `users_id`) VALUES
(1, '9999.00', '4266.90', '订单【16】消费5732.1元', 5),
(2, '4266.00', '316.80', '订单【20】消费3950.1元', 5),
(4, '316.80', '99999.00', '用户冲值', 5),
(5, '99999.00', '96048.90', '订单【21】消费3950.1元', 5),
(6, '96048.00', '92098.80', '订单【22】消费3950.1元', 5),
(7, '10000.00', '8406.00', '订单【31】消费1594元', 6);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `thumb` varchar(45) DEFAULT NULL,
  `content` longtext,
  `newscate_id` int(10) unsigned NOT NULL,
  `jumpurl` varchar(255) DEFAULT NULL,
  `addtime` varchar(45) NOT NULL,
  `isjump` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_news_newscate1_idx` (`newscate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `thumb`, `content`, `newscate_id`, `jumpurl`, `addtime`, `isjump`) VALUES
(11, '京东白酒', '2016/03/17/56eaa93ea29fb.jpg', '<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	去年主流品牌发展相对较好,规模以上白酒总产量同比增长5.07%\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	在白酒行业深度调整之下,2015年净利润逆市大幅增长的白酒一线品牌泸州老窖已经着手启动新的追赶计划。日前,泸州老窖2016国窖1573封藏大典在泸州启幕。而南都记者从此次大典上获悉,泸州老窖“经营规模和盈利水平均实现大幅提升,综合实力稳居行业前列,企业下一个目标是销售收入重回中国白酒行业‘前三’”。与此同时,多个高端白酒品牌开始进行大规模的并购。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	<strong>白酒<a href="http://auto.ifeng.com/news/marketing/" target="_blank">营销</a>大打文化牌</strong>\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	自2008年泸州老窖在行业中首创封藏大典以来,国窖1573封藏大典已是第9次举办。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	本届以“共创新百年”为主题的泸州老窖国窖1573封藏大典,特邀主持人孟非、《西游记》孙悟空扮演者六小龄童、金马影帝张涵予、奥运拳击冠军邹市明等各界名流到场见证祭拜祖师、国窖1573原酒品鉴封藏、春酿亮相三大仪式。大典上,9坛春酿原酒经9位封藏祭酒大师分别品鉴后,被系上封绳、贴上封条,由公证人员现场加盖印章,在泸州老窖国窖1573专属酿酒大师团队的带领下,进入泸州老窖藏酒洞———　龙泉洞。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据泸州老窖股份公司董事长刘淼介绍,封藏大典是中国酒文化的一种传承。自秦汉以来,每年二月初二“龙抬头”之日,泸州各酒坊作坊主,无论官家私家,亦不分规模大小,都会在这一天举行春酿封藏仪式。泸州民间一直流传的一句歌谣“二月二、龙抬头、烧头香、喝春酒”即是由此而来。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	<strong>白酒业整合迎来关键期</strong>\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	在白酒业整体不景气的大背景下,主流品牌的发展则相对较好。近日,中国酒业协会秘书长宋书玉在贵州仁怀召开的中国酒业协会顾问座谈会上通报的2015年酿酒行业发展情况数据显示,2015年1-12月,全国规模以上白酒企业完成酿酒总产量1312.80万千升,同比增长5.07%。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	而泸州老窖此前发布的2015年业绩预告显示,泸州老窖2015年实现净利润预计在13.37亿至14.96亿元,较2014年增长52%-70%。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据介绍,为了让销售收入重回中国白酒行业“前三”,泸州老窖已推出了五大单品战略,集中力量打造国窖1573、百年泸州老窖窖龄酒、泸州老窖特曲、头曲、二曲等五大战略级单品。同时,为实现品牌瘦身,泸州老窖清理开发品牌和产品条码,2015年全年共梳理条码3326个、物料号9472个,冻结条码1818个,删除物料号5516个。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	事实上,在加速整合以求“逆生长”的不止泸州老窖一家。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	近日,就在劲牌携资本拟作价1.7亿元并购茅台镇台轩酒业95%股份一事曝光后,又有消息称,　五粮液、洋河等几家知名酒厂都会有并购较大规模酒厂的动作。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	分析人士指出,未来并购的主力军除了像茅台、五粮液这样的大品牌外,成功转型的优质酒企以及在品类细分市场能深入挖掘的酒企也将有所行动。而这还不包括业外资本的布局。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据了解,早在2009年,以IT起家的联想控股,就已经将白酒产业作为其重要的投资培育方向。短短6年多时间,联想控股迅速并购了诸多上游白酒品牌。2011年6月斥资1　.3亿元收购湖南武陵39%的股权。同一年,又斥资10亿元,全资收购河北乾隆醉酒业。此后,2012年3月,联想控股旗下风险投资君联资本入股迎驾贡酒,获得6%股权。2012年9月16日,联想控股与孔府家酒业正式签署合约,以4亿元全资收购孔府家。而就在今年1月,联想又斥资4亿元入股酒便利,获取了30%的股份\r\n</p>', 2, NULL, '1458219326', 0),
(12, '金秋风暴', '2016/03/17/56eaa95ee94a5.jpg', '<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	去年主流品牌发展相对较好,规模以上白酒总产量同比增长5.07%\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	在白酒行业深度调整之下,2015年净利润逆市大幅增长的白酒一线品牌泸州老窖已经着手启动新的追赶计划。日前,泸州老窖2016国窖1573封藏大典在泸州启幕。而南都记者从此次大典上获悉,泸州老窖“经营规模和盈利水平均实现大幅提升,综合实力稳居行业前列,企业下一个目标是销售收入重回中国白酒行业‘前三’”。与此同时,多个高端白酒品牌开始进行大规模的并购。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	<strong>白酒<a href="http://auto.ifeng.com/news/marketing/" target="_blank">营销</a>大打文化牌</strong>\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	自2008年泸州老窖在行业中首创封藏大典以来,国窖1573封藏大典已是第9次举办。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	本届以“共创新百年”为主题的泸州老窖国窖1573封藏大典,特邀主持人孟非、《西游记》孙悟空扮演者六小龄童、金马影帝张涵予、奥运拳击冠军邹市明等各界名流到场见证祭拜祖师、国窖1573原酒品鉴封藏、春酿亮相三大仪式。大典上,9坛春酿原酒经9位封藏祭酒大师分别品鉴后,被系上封绳、贴上封条,由公证人员现场加盖印章,在泸州老窖国窖1573专属酿酒大师团队的带领下,进入泸州老窖藏酒洞———　龙泉洞。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据泸州老窖股份公司董事长刘淼介绍,封藏大典是中国酒文化的一种传承。自秦汉以来,每年二月初二“龙抬头”之日,泸州各酒坊作坊主,无论官家私家,亦不分规模大小,都会在这一天举行春酿封藏仪式。泸州民间一直流传的一句歌谣“二月二、龙抬头、烧头香、喝春酒”即是由此而来。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	<strong>白酒业整合迎来关键期</strong>\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	在白酒业整体不景气的大背景下,主流品牌的发展则相对较好。近日,中国酒业协会秘书长宋书玉在贵州仁怀召开的中国酒业协会顾问座谈会上通报的2015年酿酒行业发展情况数据显示,2015年1-12月,全国规模以上白酒企业完成酿酒总产量1312.80万千升,同比增长5.07%。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	而泸州老窖此前发布的2015年业绩预告显示,泸州老窖2015年实现净利润预计在13.37亿至14.96亿元,较2014年增长52%-70%。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据介绍,为了让销售收入重回中国白酒行业“前三”,泸州老窖已推出了五大单品战略,集中力量打造国窖1573、百年泸州老窖窖龄酒、泸州老窖特曲、头曲、二曲等五大战略级单品。同时,为实现品牌瘦身,泸州老窖清理开发品牌和产品条码,2015年全年共梳理条码3326个、物料号9472个,冻结条码1818个,删除物料号5516个。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	事实上,在加速整合以求“逆生长”的不止泸州老窖一家。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	近日,就在劲牌携资本拟作价1.7亿元并购茅台镇台轩酒业95%股份一事曝光后,又有消息称,　五粮液、洋河等几家知名酒厂都会有并购较大规模酒厂的动作。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	分析人士指出,未来并购的主力军除了像茅台、五粮液这样的大品牌外,成功转型的优质酒企以及在品类细分市场能深入挖掘的酒企也将有所行动。而这还不包括业外资本的布局。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据了解,早在2009年,以IT起家的联想控股,就已经将白酒产业作为其重要的投资培育方向。短短6年多时间,联想控股迅速并购了诸多上游白酒品牌。2011年6月斥资1　.3亿元收购湖南武陵39%的股权。同一年,又斥资10亿元,全资收购河北乾隆醉酒业。此后,2012年3月,联想控股旗下风险投资君联资本入股迎驾贡酒,获得6%股权。2012年9月16日,联想控股与孔府家酒业正式签署合约,以4亿元全资收购孔府家。而就在今年1月,联想又斥资4亿元入股酒便利,获取了30%的股份\r\n</p>', 2, NULL, '1458219358', 0),
(13, '新学期', '2016/03/17/56eaa978cf3f3.jpg', '<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	去年主流品牌发展相对较好,规模以上白酒总产量同比增长5.07%\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	在白酒行业深度调整之下,2015年净利润逆市大幅增长的白酒一线品牌泸州老窖已经着手启动新的追赶计划。日前,泸州老窖2016国窖1573封藏大典在泸州启幕。而南都记者从此次大典上获悉,泸州老窖“经营规模和盈利水平均实现大幅提升,综合实力稳居行业前列,企业下一个目标是销售收入重回中国白酒行业‘前三’”。与此同时,多个高端白酒品牌开始进行大规模的并购。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	<strong>白酒<a href="http://auto.ifeng.com/news/marketing/" target="_blank">营销</a>大打文化牌</strong>\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	自2008年泸州老窖在行业中首创封藏大典以来,国窖1573封藏大典已是第9次举办。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	本届以“共创新百年”为主题的泸州老窖国窖1573封藏大典,特邀主持人孟非、《西游记》孙悟空扮演者六小龄童、金马影帝张涵予、奥运拳击冠军邹市明等各界名流到场见证祭拜祖师、国窖1573原酒品鉴封藏、春酿亮相三大仪式。大典上,9坛春酿原酒经9位封藏祭酒大师分别品鉴后,被系上封绳、贴上封条,由公证人员现场加盖印章,在泸州老窖国窖1573专属酿酒大师团队的带领下,进入泸州老窖藏酒洞———　龙泉洞。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据泸州老窖股份公司董事长刘淼介绍,封藏大典是中国酒文化的一种传承。自秦汉以来,每年二月初二“龙抬头”之日,泸州各酒坊作坊主,无论官家私家,亦不分规模大小,都会在这一天举行春酿封藏仪式。泸州民间一直流传的一句歌谣“二月二、龙抬头、烧头香、喝春酒”即是由此而来。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	<strong>白酒业整合迎来关键期</strong>\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	在白酒业整体不景气的大背景下,主流品牌的发展则相对较好。近日,中国酒业协会秘书长宋书玉在贵州仁怀召开的中国酒业协会顾问座谈会上通报的2015年酿酒行业发展情况数据显示,2015年1-12月,全国规模以上白酒企业完成酿酒总产量1312.80万千升,同比增长5.07%。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	而泸州老窖此前发布的2015年业绩预告显示,泸州老窖2015年实现净利润预计在13.37亿至14.96亿元,较2014年增长52%-70%。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据介绍,为了让销售收入重回中国白酒行业“前三”,泸州老窖已推出了五大单品战略,集中力量打造国窖1573、百年泸州老窖窖龄酒、泸州老窖特曲、头曲、二曲等五大战略级单品。同时,为实现品牌瘦身,泸州老窖清理开发品牌和产品条码,2015年全年共梳理条码3326个、物料号9472个,冻结条码1818个,删除物料号5516个。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	事实上,在加速整合以求“逆生长”的不止泸州老窖一家。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	近日,就在劲牌携资本拟作价1.7亿元并购茅台镇台轩酒业95%股份一事曝光后,又有消息称,　五粮液、洋河等几家知名酒厂都会有并购较大规模酒厂的动作。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	分析人士指出,未来并购的主力军除了像茅台、五粮液这样的大品牌外,成功转型的优质酒企以及在品类细分市场能深入挖掘的酒企也将有所行动。而这还不包括业外资本的布局。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据了解,早在2009年,以IT起家的联想控股,就已经将白酒产业作为其重要的投资培育方向。短短6年多时间,联想控股迅速并购了诸多上游白酒品牌。2011年6月斥资1　.3亿元收购湖南武陵39%的股权。同一年,又斥资10亿元,全资收购河北乾隆醉酒业。此后,2012年3月,联想控股旗下风险投资君联资本入股迎驾贡酒,获得6%股权。2012年9月16日,联想控股与孔府家酒业正式签署合约,以4亿元全资收购孔府家。而就在今年1月,联想又斥资4亿元入股酒便利,获取了30%的股份\r\n</p>', 2, NULL, '1458219384', 0),
(14, '白条分期', '2016/03/17/56eaa9917e3ba.jpg', '<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	去年主流品牌发展相对较好,规模以上白酒总产量同比增长5.07%\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	在白酒行业深度调整之下,2015年净利润逆市大幅增长的白酒一线品牌泸州老窖已经着手启动新的追赶计划。日前,泸州老窖2016国窖1573封藏大典在泸州启幕。而南都记者从此次大典上获悉,泸州老窖“经营规模和盈利水平均实现大幅提升,综合实力稳居行业前列,企业下一个目标是销售收入重回中国白酒行业‘前三’”。与此同时,多个高端白酒品牌开始进行大规模的并购。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	<strong>白酒<a href="http://auto.ifeng.com/news/marketing/" target="_blank">营销</a>大打文化牌</strong>\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	自2008年泸州老窖在行业中首创封藏大典以来,国窖1573封藏大典已是第9次举办。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	本届以“共创新百年”为主题的泸州老窖国窖1573封藏大典,特邀主持人孟非、《西游记》孙悟空扮演者六小龄童、金马影帝张涵予、奥运拳击冠军邹市明等各界名流到场见证祭拜祖师、国窖1573原酒品鉴封藏、春酿亮相三大仪式。大典上,9坛春酿原酒经9位封藏祭酒大师分别品鉴后,被系上封绳、贴上封条,由公证人员现场加盖印章,在泸州老窖国窖1573专属酿酒大师团队的带领下,进入泸州老窖藏酒洞———　龙泉洞。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据泸州老窖股份公司董事长刘淼介绍,封藏大典是中国酒文化的一种传承。自秦汉以来,每年二月初二“龙抬头”之日,泸州各酒坊作坊主,无论官家私家,亦不分规模大小,都会在这一天举行春酿封藏仪式。泸州民间一直流传的一句歌谣“二月二、龙抬头、烧头香、喝春酒”即是由此而来。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	<strong>白酒业整合迎来关键期</strong>\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	在白酒业整体不景气的大背景下,主流品牌的发展则相对较好。近日,中国酒业协会秘书长宋书玉在贵州仁怀召开的中国酒业协会顾问座谈会上通报的2015年酿酒行业发展情况数据显示,2015年1-12月,全国规模以上白酒企业完成酿酒总产量1312.80万千升,同比增长5.07%。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	而泸州老窖此前发布的2015年业绩预告显示,泸州老窖2015年实现净利润预计在13.37亿至14.96亿元,较2014年增长52%-70%。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据介绍,为了让销售收入重回中国白酒行业“前三”,泸州老窖已推出了五大单品战略,集中力量打造国窖1573、百年泸州老窖窖龄酒、泸州老窖特曲、头曲、二曲等五大战略级单品。同时,为实现品牌瘦身,泸州老窖清理开发品牌和产品条码,2015年全年共梳理条码3326个、物料号9472个,冻结条码1818个,删除物料号5516个。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	事实上,在加速整合以求“逆生长”的不止泸州老窖一家。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	近日,就在劲牌携资本拟作价1.7亿元并购茅台镇台轩酒业95%股份一事曝光后,又有消息称,　五粮液、洋河等几家知名酒厂都会有并购较大规模酒厂的动作。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	分析人士指出,未来并购的主力军除了像茅台、五粮液这样的大品牌外,成功转型的优质酒企以及在品类细分市场能深入挖掘的酒企也将有所行动。而这还不包括业外资本的布局。\r\n</p>\r\n<p style="text-indent:28px;font-size:14px;color:#2B2B2B;font-family:simsun, arial, helvetica, clean, sans-serif;background-color:#FFFFFF;">\r\n	据了解,早在2009年,以IT起家的联想控股,就已经将白酒产业作为其重要的投资培育方向。短短6年多时间,联想控股迅速并购了诸多上游白酒品牌。2011年6月斥资1　.3亿元收购湖南武陵39%的股权。同一年,又斥资10亿元,全资收购河北乾隆醉酒业。此后,2012年3月,联想控股旗下风险投资君联资本入股迎驾贡酒,获得6%股权。2012年9月16日,联想控股与孔府家酒业正式签署合约,以4亿元全资收购孔府家。而就在今年1月,联想又斥资4亿元入股酒便利,获取了30%的股份\r\n</p>', 2, NULL, '1458219409', 0),
(15, '魅族手机节', '2016/03/17/56eab1c10d17a.jpg', '', 12, 'http://www.jd.com', '1458221505', 1),
(16, '母婴全球购', '2016/03/17/56eab39dc532c.jpg', '', 12, 'http://www.taobao.com', '1458221981', 1),
(17, '华一件钱买两件传', '2016/03/17/56eab42532a26.jpg', '', 12, 'http://www.baidu.com', '1458222117', 1),
(18, '天猫箱包馆', '2016/03/17/56eab49625317.jpg', '', 12, 'http://www.tmall.com', '1458222230', 1);

-- --------------------------------------------------------

--
-- 表的结构 `newscate`
--

CREATE TABLE IF NOT EXISTS `newscate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(45) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `newscate`
--

INSERT INTO `newscate` (`id`, `catname`, `pid`) VALUES
(2, '图片轮换', 0),
(3, '购物指南', 0),
(4, '免费注册', 3),
(5, '注册支付宝', 3),
(6, '天猫保证', 0),
(7, '发票保障', 6),
(8, '购物规则', 6),
(9, '支付方式', 0),
(10, '支付宝支付', 9),
(11, '余额支付', 9),
(12, '广告', 0);

-- --------------------------------------------------------

--
-- 表的结构 `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  `sort` varchar(45) DEFAULT '0',
  `pid` varchar(45) NOT NULL DEFAULT '0',
  `level` tinyint(1) NOT NULL,
  `iconCls` varchar(100) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- 转存表中的数据 `node`
--

INSERT INTO `node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `iconCls`, `is_show`) VALUES
(1, 'adminmenu', '后台菜单', 1, '后台的顶级菜单', '0', '0', 1, NULL, 1),
(2, 'homemenu', '前端菜单', 1, '前台顶级菜单', '0', '0', 1, NULL, 1),
(5, 'Goods', '商品管理', 1, '商品管理模块', '0', '1', 2, NULL, 1),
(6, 'manage', '商品管理', 1, '商品列表', '0', '5', 3, 'icon-application_view_gallery', 1),
(8, 'add', '添加商品', 1, '商品管理中添加商品功能', '0', '5', 3, 'icon-application_add', 1),
(9, 'edit', '编辑', 1, '编辑商品', '0', '5', 3, 'icon-application_form_edit', 0),
(10, 'del', '删除', 0, '删除商品', '0', '5', 3, 'icon-application_form_delete', 0),
(11, 'addthumb', '添加缩略图', 1, '添加缩略图', '0', '5', 3, 'icon-picture_add', 0),
(12, 'delthumb', '删除缩略图', 1, '删除缩略图', '0', '5', 3, '', 0),
(13, 'move', '批量移动', 1, '将分类移动到某一栏目', '0', '5', 3, '', 0),
(14, 'dels', '批量删除', 1, '批量删除商品', '0', '5', 3, '', 0),
(15, 'listorder', '排序', 1, '对现有商品进行排序', '0', '5', 3, '', 0),
(16, 'Category', '商品分类', 1, '', '0', '1', 2, '', 1),
(17, 'managecat', '分类管理', 1, '', '0', '16', 3, 'icon-book_open', 1),
(18, 'addcat', '添加分类', 1, '', '0', '16', 3, 'icon-calendar_add', 1),
(19, 'editcat', '编辑分类', 1, '', '0', '16', 3, '', 0),
(20, 'delcat', '删除分类', 1, '', '0', '16', 3, '', 0),
(21, 'Brand', '商标管理', 1, '', '0', '1', 2, '', 1),
(22, 'managebrand', '管理商品', 1, '', '0', '21', 3, 'icon-image', 1),
(23, 'addbrand', '添加商标', 1, '', '0', '21', 3, 'icon-image_add', 1),
(24, 'editbrand', '编辑商标', 1, '', '0', '21', 3, '', 0),
(25, 'delbrand', '删除商标', 1, '', '0', '21', 3, '', 0),
(26, 'Goodattr', '商品模型', 1, '', '0', '1', 2, '', 1),
(27, 'managegoodattr', '管理模型', 1, '', '0', '26', 3, 'icon-cup', 1),
(28, 'addgoodattr', '添加模型', 1, '', '0', '26', 3, 'icon-cup_add', 1),
(29, 'editattr', '编辑模型', 1, '', '0', '26', 3, '', 0),
(30, 'del', '删除模型', 1, '', '0', '26', 3, '', 0),
(31, 'Goodtype', '商品类型', 1, '', '0', '1', 2, '', 1),
(32, 'manage', '管理类型', 1, '', '0', '31', 3, 'icon-page_copy', 1),
(33, 'add', '添加类型', 1, '', '0', '31', 3, 'icon-report_add', 1),
(34, 'edit', '编辑类型', 1, '', '0', '31', 3, '', 0),
(35, 'del', '删除类型', 1, '', '0', '31', 3, '', 0),
(36, 'Users', '会员管理', 1, '', '0', '1', 2, '', 1),
(37, 'manage', '管理会员', 1, '', '0', '36', 3, 'icon-user_suit', 1),
(38, 'add', '添加会员', 1, '', '0', '36', 3, 'icon-user_add', 1),
(39, 'edit', '编辑', 1, '', '0', '36', 3, '', 0),
(40, 'del', '删除', 1, '', '0', '36', 3, '', 0),
(41, 'moneydetail', '资金明细', 1, '', '0', '36', 3, '', 0),
(42, 'Userrank', '用户级别', 1, '', '0', '1', 2, '', 1),
(43, 'manage', '管理级别', 1, '', '0', '42', 3, 'icon-drive_user', 1),
(44, 'add', '添加级别', 1, '', '0', '42', 3, 'icon-building_add', 1),
(45, 'edit', '编辑', 1, '', '0', '42', 3, '', 0),
(46, 'del', '删除', 1, '', '0', '42', 3, '', 0),
(47, 'Rbac', '权限管理', 1, '', '0', '1', 2, '', 1),
(48, 'manageadmin', '管理员管理', 1, '', '0', '47', 3, 'icon-user_suit', 1),
(49, 'adminadd', '添加管理员', 1, '', '0', '47', 3, '', 0),
(50, 'adminedit', '编辑管理员', 1, '', '0', '47', 3, '', 0),
(51, 'admindel', '删除', 1, '', '0', '47', 3, '', 0),
(52, 'managerole', '角色管理', 1, '', '0', '47', 3, 'icon-group', 1),
(53, 'roleadd', '添加权限', 1, '', '0', '47', 3, '', 0),
(54, 'roleedit', '编辑', 1, '', '0', '47', 3, '', 0),
(55, 'roledel', '删除', 1, '', '0', '47', 3, '', 0),
(56, 'manageroleuser', '管理组成员', 1, '', '0', '47', 3, '', 0),
(57, 'editroleuser', '编辑组成员', 1, '', '0', '47', 3, '', 0),
(58, 'managenode', '节点管理', 1, '', '0', '47', 3, 'icon-note_edit', 1),
(59, 'nodeadd', '添加节点', 1, '', '0', '47', 3, '', 0),
(60, 'editnode', '编辑节点', 1, '', '0', '47', 3, '', 0),
(61, 'delnode', '删除节点', 1, '', '0', '47', 3, '', 0),
(62, 'treegridjson', '获取分类树json', 1, '', '0', '16', 3, '', 0),
(63, 'Address', '用户地址管理', 1, '', '0', '1', 2, '', 0),
(64, 'add', '添加地址', 1, '', '0', '63', 3, '', 0),
(65, 'editjson', '编辑地址', 1, '', '0', '63', 3, '', 0),
(66, 'del', '删除地址', 1, '', '0', '63', 3, '', 0),
(67, 'manage', '地址管理', 1, '', '0', '63', 3, '', 0),
(68, 'Orders', '订单管理', 1, '', '0', '1', 2, '', 1),
(69, 'manage', '管理订单', 1, '', '0', '68', 3, 'icon-page_green', 1),
(70, 'detail', '订单详情', 1, '', '0', '68', 3, '', 0),
(71, 'editorderstate', '编辑订单状态', 1, '', '0', '68', 3, '', 0),
(72, 'statechangedetail', '修改状态明细', 1, '', '0', '68', 3, '', 0),
(73, 'Orderstate', '订单状态管理', 1, '', '0', '1', 2, '', 1),
(74, 'manage', '订单状态管理', 1, '', '0', '73', 3, 'icon-bell', 1),
(75, 'add', '添加订单状态', 1, '', '0', '73', 3, '', 0),
(76, 'edit', '编辑订单状态', 1, '', '0', '73', 3, '', 0),
(77, 'del', '删除订单状态', 1, '', '0', '73', 3, '', 0),
(78, 'News', '新闻管理', 1, '', '0', '1', 2, 'icon-page_code', 1),
(79, 'newscatemanage', '栏目管理', 1, '', '0', '78', 3, 'icon-html', 1),
(80, 'newscateadd', '添加栏目', 1, '', '0', '78', 3, '', 0),
(81, 'combotreejson', '获得树形数据（json）', 1, '', '0', '78', 3, '', 0),
(82, 'treegridjson', '获取树形列表', 1, '', '0', '78', 3, '', 0),
(83, 'newscateedit', '编辑栏目', 1, '', '0', '78', 3, '', 0),
(84, 'delcat', '删除栏目', 1, '', '0', '78', 3, '', 0),
(85, 'newsmanage', '新闻管理', 1, '', '0', '78', 3, 'icon-css', 1),
(86, 'newsadd', '添加新闻', 1, '', '0', '78', 3, '', 0),
(87, 'newsedit', '编辑新闻', 1, '', '0', '78', 3, '', 0),
(88, 'newsdel', '删除新闻', 1, '', '0', '78', 3, '', 0),
(89, 'Shippingtype', '配送方式管理', 1, '', '0', '1', 2, '', 1),
(90, 'manage', '管理配送方式', 1, '', '0', '89', 3, 'icon-lorry', 1),
(91, 'add', '添加配送方式', 1, '', '0', '89', 3, '', 0),
(92, 'edit', '编辑配送方式', 1, '', '0', '89', 3, '', 0),
(93, 'del', '删除', 1, '', '0', '89', 3, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `orderchangedetail`
--

CREATE TABLE IF NOT EXISTS `orderchangedetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `info` text,
  `fromstate` varchar(45) DEFAULT NULL,
  `tostate` varchar(45) DEFAULT NULL,
  `orders_id` int(10) unsigned NOT NULL,
  `changetime` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orderchangedetail_orders1_idx` (`orders_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `orderchangedetail`
--

INSERT INTO `orderchangedetail` (`id`, `info`, `fromstate`, `tostate`, `orders_id`, `changetime`) VALUES
(1, '为什么是已确认呢？ 订单确认后，应该就是交易完毕了把？', '4', '1', 32, '1476000337'),
(2, '改成未确认', '4', '1', 32, '1476080223'),
(3, '', '1', '4', 32, '1476080272');

-- --------------------------------------------------------

--
-- 表的结构 `ordergoods`
--

CREATE TABLE IF NOT EXISTS `ordergoods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned DEFAULT NULL,
  `goods_name` varchar(45) NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `goods_mprice` decimal(10,2) unsigned NOT NULL,
  `goods_price` decimal(10,2) NOT NULL,
  `goods_thumb` varchar(45) DEFAULT NULL,
  `discount` int(3) DEFAULT NULL,
  `totalprice` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ordergoods_orders1_idx` (`orders_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ordergoods`
--

INSERT INTO `ordergoods` (`id`, `orders_id`, `goods_id`, `goods_name`, `num`, `goods_mprice`, `goods_price`, `goods_thumb`, `discount`, `totalprice`) VALUES
(1, 30, 11, '品牌电视', 1, '4100.00', '0.01', '2016/04/19/57162eff4746a.jpg', 99, '0.01'),
(2, 31, 1, '乐视超级电', 2, '1000.00', '800.00', '2016/01/24/56a4a00aba05e.jpg', 99, '1584.00'),
(3, 32, 11, '品牌电视', 1, '4100.00', '0.01', '2016/04/19/57162eff4746a.jpg', 99, '0.01');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `totalprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ordertime` varchar(45) NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned DEFAULT NULL,
  `orderstate_id` int(10) unsigned NOT NULL DEFAULT '1',
  `payment` enum('0','1') NOT NULL DEFAULT '0',
  `nextstep` varchar(45) NOT NULL,
  `shippingtype_id` int(11) DEFAULT NULL,
  `shipmoney` decimal(10,2) DEFAULT '0.00',
  `ordersn` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_users1_idx` (`users_id`),
  KEY `fk_orders_address1_idx` (`address_id`),
  KEY `fk_orders_orderstate1_idx` (`orderstate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `totalprice`, `ordertime`, `users_id`, `address_id`, `orderstate_id`, `payment`, `nextstep`, `shippingtype_id`, `shipmoney`, `ordersn`) VALUES
(30, '0.01', '1461161324', 5, 2, 2, '0', 'payonline', 1, '0.00', 'wysc_14611613249555'),
(31, '1584.00', '1475899996', 6, 4, 2, '0', 'payment', 2, '10.00', 'wysc_14758999969474'),
(32, '0.01', '1475915995', 6, 4, 4, '0', 'payment', 1, '0.00', 'wysc_14759159959265');

-- --------------------------------------------------------

--
-- 表的结构 `orderstate`
--

CREATE TABLE IF NOT EXISTS `orderstate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(45) NOT NULL,
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `orderstate`
--

INSERT INTO `orderstate` (`id`, `state`, `info`) VALUES
(1, '未确认', ''),
(2, '已付款', ''),
(3, '已发货', ''),
(4, '已确认', ''),
(5, '撤销订单', '');

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `pid` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, '超级管理员', NULL, 1, '该角色拥有本站的所有权限'),
(2, '管理员', NULL, 1, '该角色具有商品管理功能'),
(3, '站长', NULL, 1, '该用户具有某一特定功能'),
(5, '普通管理员', NULL, 1, '所有新建管理员默认角色'),
(6, ' 测试角色', NULL, 1, '测试橘色');

-- --------------------------------------------------------

--
-- 表的结构 `roleuser`
--

CREATE TABLE IF NOT EXISTS `roleuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_roleuser_adminuser1_idx` (`user_id`),
  KEY `fk_roleuser_role1_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `roleuser`
--

INSERT INTO `roleuser` (`id`, `user_id`, `role_id`) VALUES
(29, 11, 2),
(31, 9, 2),
(33, 10, 1),
(34, 11, 1),
(35, 3, 1),
(36, 12, 2),
(40, 9, 3),
(41, 10, 3),
(43, 13, 5);

-- --------------------------------------------------------

--
-- 表的结构 `shippingtype`
--

CREATE TABLE IF NOT EXISTS `shippingtype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipname` varchar(45) NOT NULL,
  `shipdesc` text NOT NULL,
  `extramoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `shippingtype`
--

INSERT INTO `shippingtype` (`id`, `shipname`, `shipdesc`, `extramoney`) VALUES
(1, '邮局快递', '到货时间较长，但不收取额外费用', '0.00'),
(2, '顺风快递', '顺丰速运于1993年3月26日在广东顺德成立，是一家主要经营国际、国内快递业务的港资快递企业。初期的业务为顺德与香港之间的即日速递业务，随着客户需求的增加，顺丰的服务网络延伸至中山、番禺、江门和佛山等地。顺丰速运是目前中国速递行业中投递速度最快的快递公司之一。', '10.00'),
(3, '圆通快递1', '顺丰速运于1993年3月26日在广东顺德成立，是一家主要经营国际、国内快递业务的港资快递企业。初期的业务为顺德与香港之间的即日速递业务，随着客户需求的增加，顺丰的服务网络延伸至中山、番禺、江门和佛山等地。顺丰速运是目前中国速递行业中投递速度最快的快递公司之一。', '20.00');

-- --------------------------------------------------------

--
-- 表的结构 `shopcar`
--

CREATE TABLE IF NOT EXISTS `shopcar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shopcar_users1_idx` (`users_id`),
  KEY `fk_shopcar_goods1_idx` (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `userrank`
--

CREATE TABLE IF NOT EXISTS `userrank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rankname` varchar(45) NOT NULL,
  `minpoint` int(11) NOT NULL,
  `maxpoint` int(11) NOT NULL,
  `discount` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `userrank`
--

INSERT INTO `userrank` (`id`, `rankname`, `minpoint`, `maxpoint`, `discount`) VALUES
(1, '注册会员', 0, 100, 99),
(2, '认证会员', 101, 1000, 85),
(3, '黄金会员', 1001, 2000, 80),
(4, '超级vip', 2001, 5000, 75);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `sex` enum('0','1','2') NOT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  `usermoney` decimal(10,2) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `regtime` varchar(45) DEFAULT NULL,
  `lastlogin` varchar(45) DEFAULT NULL,
  `salt` varchar(45) NOT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `islock` enum('0','1') DEFAULT NULL,
  `userrank_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_users_userrank1_idx` (`userrank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `question`, `answer`, `sex`, `birthday`, `usermoney`, `points`, `regtime`, `lastlogin`, `salt`, `qq`, `phone`, `islock`, `userrank_id`) VALUES
(5, 'shopuser2', '618a839ac2fa611fb314810b83bb6aa2', '123523684@qq.com', '你好', '你也好', '1', '2016-01-04', '92098.80', 3485, '1453630893', NULL, '1453630893', '12345678', '17788217906', '0', 1),
(6, 'demo', '4c3b0613d85874b2aa519df1445b8ab6', 'demo@demo.com', '', '', '1', '2016-09-07', '8406.00', 1324283, '1474852908', NULL, '1474852908', '12341324', '12341341324', '0', 1);

--
-- 限制导出的表
--

--
-- 限制表 `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `fk_access_node1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_access_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `attrlist`
--
ALTER TABLE `attrlist`
  ADD CONSTRAINT `fk_attrlist_goodattr1` FOREIGN KEY (`goodattr_id`) REFERENCES `goodattr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `attval`
--
ALTER TABLE `attval`
  ADD CONSTRAINT `fk_attval_attrlist1` FOREIGN KEY (`attrlist_id`) REFERENCES `attrlist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_attval_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `favor`
--
ALTER TABLE `favor`
  ADD CONSTRAINT `fk_favor_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favor_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `fk_goods_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_goods_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_goods_goodattr1` FOREIGN KEY (`goodattr_id`) REFERENCES `goodattr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_goods_goodtype1` FOREIGN KEY (`goodtype_id`) REFERENCES `goodtype` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- 限制表 `goodspic`
--
ALTER TABLE `goodspic`
  ADD CONSTRAINT `fk_goodspic_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `moneydetail`
--
ALTER TABLE `moneydetail`
  ADD CONSTRAINT `fk_moneydetail_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_newscate1` FOREIGN KEY (`newscate_id`) REFERENCES `newscate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `orderchangedetail`
--
ALTER TABLE `orderchangedetail`
  ADD CONSTRAINT `fk_orderchangedetail_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `ordergoods`
--
ALTER TABLE `ordergoods`
  ADD CONSTRAINT `fk_ordergoods_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_orderstate1` FOREIGN KEY (`orderstate_id`) REFERENCES `orderstate` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `roleuser`
--
ALTER TABLE `roleuser`
  ADD CONSTRAINT `fk_roleuser_adminuser1` FOREIGN KEY (`user_id`) REFERENCES `adminuser` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roleuser_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `shopcar`
--
ALTER TABLE `shopcar`
  ADD CONSTRAINT `fk_shopcar_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shopcar_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_userrank1` FOREIGN KEY (`userrank_id`) REFERENCES `userrank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
