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
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (1,'Uncategorized','uncategorized',0),(2,'Media','media',0),(3,'Political News','political-news',0),(4,'World News','world-news',0),(5,'chat','chat',0),(6,'content','content-2',0),(7,'embeds','embeds-2',0),(8,'gallery','gallery-2',0),(9,'image','image',0),(10,'jetpack','jetpack-2',0),(11,'Post Formats','post-formats',0),(12,'shortcode','shortcode',0),(13,'template','template',0),(14,'video','video',0),(15,'Computers','computers',0),(16,'Design','design',0),(17,'Development','development',0),(18,'Fashion Menu','fashion-menu',0),(19,'Footer Links','foot-links',0),(20,'Main Menu','main-menu',0),(21,'Medical Menu','medical-menu',0),(22,'Mega Menu','mega-menu',0),(23,'404 Not Found Menu','404-not-found-menu',0),(24,'One Page Menu','one-page',0),(25,'Our Friends','our-friends',0),(26,'Restaurant Menu','restaurant-menu',0),(27,'Top Bar Menu','top-bar-menu',0),(28,'Useful Links','useful-links',0),(29,'Wedding Menu','wedding-menu',0),(30,'Chat','post-format-chat',0),(31,'Link','post-format-link',0),(32,'Audio','post-format-audio',0),(33,'Video','post-format-video',0),(34,'Quote','post-format-quote',0),(35,'Aside','post-format-aside',0),(36,'Status','post-format-status',0),(37,'Gallery','post-format-gallery',0),(38,'Image','post-format-image',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 11:22:36
