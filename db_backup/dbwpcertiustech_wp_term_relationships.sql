-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: dbaasmysql.fibercorp.com.ar    Database: dbwpcertiustech
-- ------------------------------------------------------
-- Server version	5.5.37

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
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_relationships`
--

LOCK TABLES `wp_term_relationships` WRITE;
/*!40000 ALTER TABLE `wp_term_relationships` DISABLE KEYS */;
INSERT INTO `wp_term_relationships` VALUES (1,1,0),(358,1,0),(358,4,0),(358,11,0),(555,1,0),(555,2,0),(555,8,0),(555,11,0),(555,12,0),(555,37,0),(562,1,0),(562,5,0),(562,11,0),(562,30,0),(565,1,0),(565,11,0),(565,31,0),(1005,1,0),(1005,2,0),(1005,7,0),(1005,10,0),(1005,11,0),(1005,12,0),(1005,14,0),(1005,32,0),(1016,1,0),(1016,3,0),(1016,9,0),(1016,13,0),(1031,1,0),(1031,2,0),(1031,8,0),(1031,10,0),(1031,11,0),(1031,12,0),(1031,37,0),(1148,1,0),(1148,4,0),(1148,13,0),(1161,1,0),(1161,2,0),(1161,11,0),(1161,33,0),(1163,1,0),(1163,2,0),(1163,9,0),(1163,11,0),(1163,12,0),(1163,38,0),(1168,1,0),(1168,4,0),(1168,13,0),(1171,1,0),(1171,3,0),(1171,6,0),(1171,13,0),(1178,1,0),(1178,4,0),(1178,6,0),(1179,1,0),(1179,6,0),(1179,7,0),(1241,1,0),(1241,3,0),(1241,13,0),(2416,1,0),(2416,11,0),(2416,34,0),(2417,1,0),(2417,2,0),(2417,7,0),(2417,11,0),(2417,14,0),(2417,33,0),(5910,1,0),(5910,5,0),(5910,11,0),(5910,35,0),(5914,1,0),(5914,5,0),(5914,11,0),(5914,36,0),(9677,1,0),(9677,4,0),(9679,1,0),(9679,3,0),(9681,1,0),(9681,4,0),(9684,1,0),(9684,3,0),(9686,1,0),(9686,3,0),(10499,16,0),(10500,17,0),(10501,15,0),(10502,17,0),(10503,16,0),(10504,15,0),(10505,15,0),(10506,17,0),(14068,20,0),(14073,20,0),(14081,20,0),(14082,20,0);
/*!40000 ALTER TABLE `wp_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 11:22:34
