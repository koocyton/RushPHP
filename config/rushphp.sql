-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2012 年 11 月 30 日 21:59
-- 服务器版本: 5.5.28
-- PHP 版本: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `rushphp`
--

-- --------------------------------------------------------

--
-- 表的结构 `info_app`
--

CREATE TABLE IF NOT EXISTS `info_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `src` varchar(254) NOT NULL,
  `author` int(11) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6258 ;

--
-- 转存表中的数据 `info_app`
--

INSERT INTO `info_app` (`id`, `name`, `src`, `author`, `create_time`) VALUES
(6151, 'Luanch name 6151 Luanch name 6151 Luanch name 6151 Luanch name 6151 Luanch name 6151 Luanch name 615', 'http://www.baidu.com', 61511202, 1352896640),
(6152, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6153, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6154, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6155, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6156, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6157, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6158, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6159, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6160, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6161, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6162, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6163, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6164, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6165, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6166, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6167, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6168, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6169, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6170, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6171, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6172, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6173, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6174, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6175, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6176, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6177, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6178, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6179, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6180, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6181, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6182, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6183, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6184, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6185, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6186, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6187, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6188, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6189, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6190, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6191, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6192, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6193, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6194, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6195, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6196, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6197, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6198, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6199, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6200, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6201, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6202, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6203, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6204, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6205, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6206, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6207, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6208, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6209, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6210, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6211, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6212, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6213, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6214, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6215, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6216, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6217, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6218, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6219, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6220, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6221, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6222, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6223, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6224, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6225, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6226, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6227, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6228, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6229, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6230, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6231, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6232, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6233, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6234, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6235, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6236, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6237, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6238, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6239, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6240, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6241, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6242, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6243, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6244, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6245, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6246, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6247, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6248, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6249, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6250, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6251, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6252, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6253, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6254, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6255, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6256, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640),
(6257, 'Luanch name', 'http://www.baidu.com', 61511202, 1352896640);

-- --------------------------------------------------------

--
-- 表的结构 `info_user`
--

CREATE TABLE IF NOT EXISTS `info_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(254) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(254) NOT NULL,
  `nick` varchar(254) NOT NULL,
  `installed_apps` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61511203 ;

--
-- 转存表中的数据 `info_user`
--

INSERT INTO `info_user` (`id`, `account`, `password`, `email`, `nick`, `installed_apps`) VALUES
(61511202, 'liuyi', 'debea419839e2a5fd7ede5d897f76ab2', 'liuyi@doopp.com', 'Henry', '6151,6152,6153,6154,6155,6156,6157,6159,6159,6160,6161,6162,616,6164,6165,6166,6167,6168,6169,6170');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
