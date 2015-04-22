CREATE DATABASE  IF NOT EXISTS `creditsystem` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `creditsystem`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: creditsystem
-- ------------------------------------------------------
-- Server version	5.6.15-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `business` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'个人客户1',1,'房180万 车30万 存款20万','负债3000万','新技术研发中心负责人','蓝翔技校 电气焊专业','已婚','花园路别墅一套','最高保额5000万',NULL,NULL),(2,'个人客户2',1,'车10万','无负债信息','在职员工','清华计算机硕士','单身','职工宿舍','无保',NULL,NULL),(3,'企业1',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013年盈利300万 2014年盈利200万','机床加工'),(4,'企业2',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013年盈利100万 2014年亏损200万','建筑工程');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-22 18:49:26
