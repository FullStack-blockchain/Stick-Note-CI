CREATE DATABASE  IF NOT EXISTS `sticknotes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sticknotes`;
-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: sticknotes
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (78,'New Test','ssmtp aaron19940503@gmail.com\r\nTo:aaron19940503@gmail.com\r\nFrom:caban19901227@gmail.com\r\nSubject: mail subject\r\nMail content\r\nmail content1\r\n',1535470461,NULL,NULL,'#ffd180',1,1,1,0,0,NULL,0,0,NULL,0,0,0,0,0,NULL,NULL,0,NULL,NULL),(79,'2018-08-28','#\r\n# Config file for sSMTP sendmail\r\n#\r\n# The person who gets all mail for userids < 1000\r\n# Make this empty to disable rewriting.\r\nroot=postmaster\r\n\r\n# The place where the mail goes. The actual machine name is required no \r\n# MX records are consulted. Commonly mailhosts are named mail.domain.com',1535471244,NULL,NULL,'#ccff90',1,2,1,0,0,NULL,0,0,NULL,0,0,0,0,0,NULL,NULL,0,NULL,NULL),(80,'Test send mail color attached file','# sSMTP aliases\r\n# \r\n# Format:	local_account:outgoing_address:mailhub\r\n#\r\n# Example: root:your_login@your.domain:mailhub.your.domain[:port]\r\n# where [:port] is an optional port number that defaults to 25.',1535471374,NULL,NULL,'#cfd8dc',1,3,1,0,0,NULL,0,0,NULL,0,0,0,0,0,NULL,NULL,0,NULL,NULL),(81,'new - aaa','123123\r\n123123\r\n444\r\n444444\r\n',1535473792,NULL,NULL,'#fafafa',1,4,1,0,0,NULL,0,0,NULL,0,0,0,0,0,NULL,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-28  9:40:34
