-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-30 01:24:56
-- 服务器版本： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `creditsystem`
--
-- --------------------------------------------------------

DROP DATABASE IF EXISTS `creditsystem`;
CREATE DATABASE IF NOT EXISTS `creditsystem` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `creditsystem`;

--
-- 表的结构 `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`client_id` int(11) NOT NULL,
  `client_name` varchar(45) DEFAULT NULL,
  `client_type` int(11) DEFAULT NULL,
  `assets` varchar(255) DEFAULT NULL,
  `liabilities` varchar(255) DEFAULT NULL,
  `professions` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `spouse` varchar(255) DEFAULT NULL,
  `live` varchar(255) DEFAULT NULL,
  `insurance` varchar(255) DEFAULT NULL,
  `finance` varchar(255) DEFAULT NULL,
  `business` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_type`, `assets`, `liabilities`, `professions`, `education`, `spouse`, `live`, `insurance`, `finance`, `business`, `level`) VALUES
(1, '个人客户1', 1, '房180万 车30万 存款20万', '负债3000万', '新技术研发中心负责人', '蓝翔技校 电气焊专业', '已婚', '花园路别墅一套', '最高保额5000万', NULL, NULL, 3),
(3, '企业1', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013年盈利300万 2014年盈利200万', '机床加工', 2),
(5, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 5),
(6, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1),
(8, '企业3', 2, '', '', '', '', '', '', '', '空', '无业务', 3),
(10, '个人客户2', 1, '', '', '', '', '', '', '', '', '', 3);

-- --------------------------------------------------------

--
-- 表的结构 `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
`contract_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `contract`
--

INSERT INTO `contract` (`contract_id`, `client_id`, `amount`, `duration`, `date`) VALUES
(2, 1, 2000, 3, '2015-04-28');

-- --------------------------------------------------------

--
-- 表的结构 `distribution`
--

CREATE TABLE IF NOT EXISTS `distribution` (
`distribution_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `distribution`
--

INSERT INTO `distribution` (`distribution_id`, `client_id`, `amount`, `duration`, `date`) VALUES
(3, 1, 2000, 3, '2015-04-28');

-- --------------------------------------------------------

--
-- 表的结构 `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
`id` int(11) NOT NULL,
  `value` decimal(6,3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `interest`
--

INSERT INTO `interest` (`id`, `value`) VALUES
(1, '0.050');

-- --------------------------------------------------------

--
-- 表的结构 `interests`
--

CREATE TABLE IF NOT EXISTS `interests` (
`interest_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL,
  `interest` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `interests`
--

INSERT INTO `interests` (`interest_id`, `client_id`, `amount`, `duration`, `date`, `interest`) VALUES
(1, 1, 2000, 3, '2015-04-29', 0),
(2, 1, 2000, 3, '2015-04-29', 205);

-- --------------------------------------------------------

--
-- 表的结构 `request`
--

CREATE TABLE IF NOT EXISTS `request` (
`request_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `request`
--

INSERT INTO `request` (`request_id`, `client_id`, `amount`, `duration`) VALUES
(1, 1, 2000, 3),
(3, 1, 2000, 3),
(4, 1, 2000, 3),
(5, 1, 123, 2),
(6, 5, 333, 2),
(7, 3, 1111, 1);

-- --------------------------------------------------------

--
-- 表的结构 `response`
--

CREATE TABLE IF NOT EXISTS `response` (
`response_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `accepted` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `response`
--

INSERT INTO `response` (`response_id`, `client_id`, `amount`, `duration`, `accepted`, `date`) VALUES
(1, 1, 2000, 3, 1, '2015-04-28'),
(3, 1, 2000, 3, 1, '2015-04-28'),
(7, 1, 2000, 3, 1, '2015-04-28'),
(8, 10, 1538, 10, 2, '2015-04-28');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'user', 'user'),
(2, 'root', 'root'),
(3, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
 ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
 ADD PRIMARY KEY (`distribution_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
 ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
 ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
 ADD PRIMARY KEY (`response_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
MODIFY `distribution_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
