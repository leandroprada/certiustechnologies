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
-- Table structure for table `wp_octa_portfolio_setting`
--

DROP TABLE IF EXISTS `wp_octa_portfolio_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_octa_portfolio_setting` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `alias` text COLLATE utf8mb4_unicode_ci,
  `shortcode` text COLLATE utf8mb4_unicode_ci,
  `extra_class` text COLLATE utf8mb4_unicode_ci,
  `post_type` text COLLATE utf8mb4_unicode_ci,
  `select_taxonomy` text COLLATE utf8mb4_unicode_ci,
  `maximum_entries` int(11) DEFAULT NULL,
  `order_by` text COLLATE utf8mb4_unicode_ci,
  `order_type` text COLLATE utf8mb4_unicode_ci,
  `image_source` text COLLATE utf8mb4_unicode_ci,
  `enable_pagination` text COLLATE utf8mb4_unicode_ci,
  `items_per_page` int(11) DEFAULT NULL,
  `pagination_type` text COLLATE utf8mb4_unicode_ci,
  `pagination_alignment` text COLLATE utf8mb4_unicode_ci,
  `load_more_button_text` text COLLATE utf8mb4_unicode_ci,
  `grid_layout` text COLLATE utf8mb4_unicode_ci,
  `img_ratio` text COLLATE utf8mb4_unicode_ci,
  `rtl` text COLLATE utf8mb4_unicode_ci,
  `slider_type` text COLLATE utf8mb4_unicode_ci,
  `slide_to_show` int(11) DEFAULT NULL,
  `slide_to_scroll` int(11) DEFAULT NULL,
  `slide_speed` int(11) DEFAULT NULL,
  `fade` text COLLATE utf8mb4_unicode_ci,
  `auto_play` text COLLATE utf8mb4_unicode_ci,
  `show_arrows` text COLLATE utf8mb4_unicode_ci,
  `show_bullets` text COLLATE utf8mb4_unicode_ci,
  `infinite` text COLLATE utf8mb4_unicode_ci,
  `preloader` text COLLATE utf8mb4_unicode_ci,
  `number_of_columns` text COLLATE utf8mb4_unicode_ci,
  `item_spacing` int(11) DEFAULT NULL,
  `choose_skin` text COLLATE utf8mb4_unicode_ci,
  `show_title` text COLLATE utf8mb4_unicode_ci,
  `show_categories` text COLLATE utf8mb4_unicode_ci,
  `show_link_to_post` text COLLATE utf8mb4_unicode_ci,
  `show_zoom_image` text COLLATE utf8mb4_unicode_ci,
  `show_excerpt` text COLLATE utf8mb4_unicode_ci,
  `nav_filter` text COLLATE utf8mb4_unicode_ci,
  `show_all` text COLLATE utf8mb4_unicode_ci,
  `all_text` text COLLATE utf8mb4_unicode_ci,
  `nav_layout` text COLLATE utf8mb4_unicode_ci,
  `els_num` text COLLATE utf8mb4_unicode_ci,
  `num_style` text COLLATE utf8mb4_unicode_ci,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_octa_portfolio_setting`
--

LOCK TABLES `wp_octa_portfolio_setting` WRITE;
/*!40000 ALTER TABLE `wp_octa_portfolio_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_octa_portfolio_setting` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 11:22:28
