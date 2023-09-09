-- MySQL dump 10.13  Distrib 5.6.42-84.2, for Linux (x86_64)
--
-- Host: sql207.byetcluster.com    Database: epiz_26440505_dashboard
-- ------------------------------------------------------
-- Server version	5.6.48-88.0

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'alok','7071994439','income899@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_details`
--

DROP TABLE IF EXISTS `bank_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_details` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `accountno` varchar(100) NOT NULL,
  `ifsc` text NOT NULL,
  `branch` text NOT NULL,
  `bank_name` text NOT NULL,
  `gpay` varchar(50) NOT NULL,
  `upi` varchar(50) NOT NULL,
  `paytm` text NOT NULL,
  `phonepe` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_details`
--

LOCK TABLES `bank_details` WRITE;
/*!40000 ALTER TABLE `bank_details` DISABLE KEYS */;
INSERT INTO `bank_details` VALUES (2,'snmaurya10275@gmail.com','Alok Maurya','0','ALLA0','Hariharganj Fatehpur','Allahabad Bank','','','','','2020-09-12 21:39:13');
/*!40000 ALTER TABLE `bank_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `current_bal` int(21) NOT NULL DEFAULT '0',
  `day_bal` int(20) NOT NULL DEFAULT '0',
  `total_bal` int(20) NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income`
--

LOCK TABLES `income` WRITE;
/*!40000 ALTER TABLE `income` DISABLE KEYS */;
INSERT INTO `income` VALUES (1,'snmaurya10275@gmail.com',0,100,100,'2020-08-31 01:52:45'),(21,'zentex2109@gmail.com',0,0,0,'2020-09-12 11:16:46'),(20,'anujmaurya26062005@gmail.com',0,0,0,'2020-08-31 08:40:52');
/*!40000 ALTER TABLE `income` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income_received`
--

DROP TABLE IF EXISTS `income_received`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income_received` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `amount` int(25) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_received`
--

LOCK TABLES `income_received` WRITE;
/*!40000 ALTER TABLE `income_received` DISABLE KEYS */;
INSERT INTO `income_received` VALUES (1,'snmaurya10275@gmail.com',0,'0000-00-00'),(6,'snmaurya10275@gmail.com',100,'2020-10-23'),(5,'snmaurya10275@gmail.com',200,'2020-08-31');
/*!40000 ALTER TABLE `income_received` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pin_list`
--

DROP TABLE IF EXISTS `pin_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pin_list` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `pin` int(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'open',
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pin_list`
--

LOCK TABLES `pin_list` WRITE;
/*!40000 ALTER TABLE `pin_list` DISABLE KEYS */;
INSERT INTO `pin_list` VALUES (46,'anujmaurya26062005@gmail.com',367173,'open','2020-08-31 12:39:01'),(45,'anujmaurya26062005@gmail.com',929206,'open','2020-08-31 12:39:01'),(44,'anujmaurya26062005@gmail.com',896629,'open','2020-08-31 12:39:01'),(43,'snmaurya10275@gmail.com',576282,'close','2020-08-31 08:39:35'),(42,'snmaurya10275@gmail.com',710076,'open','2020-08-31 08:39:35'),(41,'snmaurya10275@gmail.com',462806,'close','2020-08-31 08:39:35'),(40,'snmaurya10275@gmail.com',534745,'open','2020-08-31 08:39:35'),(39,'snmaurya10275@gmail.com',966598,'open','2020-08-31 08:39:35'),(38,'snmaurya10275@gmail.com',516179,'open','2020-08-31 08:39:35'),(37,'snmaurya10275@gmail.com',413420,'open','2020-08-31 08:39:35'),(36,'snmaurya10275@gmail.com',715694,'open','2020-08-31 08:39:35'),(35,'snmaurya10275@gmail.com',172858,'open','2020-08-31 08:39:35'),(34,'snmaurya10275@gmail.com',764572,'open','2020-08-31 08:39:35'),(47,'anujmaurya26062005@gmail.com',647816,'open','2020-08-31 12:39:01'),(48,'anujmaurya26062005@gmail.com',219775,'open','2020-08-31 12:39:01'),(49,'snmaurya10275@gmail.com',448718,'open','2020-09-04 10:00:34'),(50,'snmaurya10275@gmail.com',762745,'open','2020-09-04 10:00:34'),(51,'snmaurya10275@gmail.com',233682,'open','2020-09-04 10:00:34');
/*!40000 ALTER TABLE `pin_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pin_request`
--

DROP TABLE IF EXISTS `pin_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pin_request` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `amount` int(25) NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open',
  `date` date NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pin_request`
--

LOCK TABLES `pin_request` WRITE;
/*!40000 ALTER TABLE `pin_request` DISABLE KEYS */;
INSERT INTO `pin_request` VALUES (10,'anujmaurya26062005@gmail.com',1500,'close','2020-08-31','2020-08-31 08:42:58'),(11,'snmaurya10275@gmail.com',900,'close','2020-09-01','2020-09-01 10:02:36'),(9,'snmaurya10275@gmail.com',3000,'close','2020-08-31','2020-08-31 08:38:59'),(12,'zentex2109@gmail.com',100,'close','2020-09-27','2020-09-27 01:15:56');
/*!40000 ALTER TABLE `pin_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tree`
--

DROP TABLE IF EXISTS `tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `left` varchar(255) NOT NULL,
  `right` varchar(255) NOT NULL,
  `leftcount` int(25) NOT NULL DEFAULT '0',
  `rightcount` int(25) NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tree`
--

LOCK TABLES `tree` WRITE;
/*!40000 ALTER TABLE `tree` DISABLE KEYS */;
INSERT INTO `tree` VALUES (20,'anujmaurya26062005@gmail.com','','',0,0,'2020-08-31 08:40:52'),(1,'snmaurya10275@gmail.com','anujmaurya26062005@gmail.com','zentex2109@gmail.com',1,1,'2020-08-31 17:30:00'),(21,'zentex2109@gmail.com','','',0,0,'2020-09-12 11:16:46');
/*!40000 ALTER TABLE `tree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(355) NOT NULL,
  `account_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `address` varchar(400) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `account` varchar(100) NOT NULL,
  `under_userid` varchar(255) NOT NULL,
  `side` enum('left','right','','') NOT NULL,
  `plan` enum('499','899') NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'snmaurya10275@gmail.com','alokm@12345','','Active','Jayram Nagar Fatehpur','7071994439','59104087159','','left','499','2020-08-31 04:43:50'),(22,'zentex2109@gmail.com','atulm@123','','Active','Vidhayak Road Jayram Nagar Fatehpur, ','8127157396','8127157396','snmaurya10275@gmail.com','right','499','2020-09-12 15:16:46'),(21,'anujmaurya26062005@gmail.com','anujm@12345','','Active','Fatehpur','7376290547','12345678','snmaurya10275@gmail.com','left','499','2020-08-31 12:40:52');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawal`
--

DROP TABLE IF EXISTS `withdrawal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdrawal` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `amount` int(25) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `current_bal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawal`
--

LOCK TABLES `withdrawal` WRITE;
/*!40000 ALTER TABLE `withdrawal` DISABLE KEYS */;
INSERT INTO `withdrawal` VALUES (1,'snmaurya10275@gmail.com',100,'2020-09-12 21:43:41',100);
/*!40000 ALTER TABLE `withdrawal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-23  6:12:09
