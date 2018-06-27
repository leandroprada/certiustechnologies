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
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','bysonte'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'locale',''),(11,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(12,1,'wp_user_level','10'),(13,1,'dismissed_wp_pointers','vc_pointers_backend_editor'),(14,1,'show_welcome_panel','0'),(15,1,'session_tokens','a:3:{s:64:\"fd8b4eb39f14a6b0f3e368e97d16f2c8e9d6d9080b27b84802d1988581c93e60\";a:4:{s:10:\"expiration\";i:1510076736;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.62 Safari/537.36\";s:5:\"login\";i:1508867136;}s:64:\"6412ce5b6eeaf137f59659125ed8a08209c86153908c90a5fd6051d8e094f2db\";a:4:{s:10:\"expiration\";i:1509198856;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.62 Safari/537.36\";s:5:\"login\";i:1509026056;}s:64:\"16d9c784c3dbf1b1d3517e8f35b6cc451dd9be760d7f62f0b9ac74845436a1a2\";a:4:{s:10:\"expiration\";i:1509198924;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:132:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36 OPR/48.0.2685.50\";s:5:\"login\";i:1509026124;}}'),(16,1,'wp_dashboard_quick_press_last_post_id','14171'),(17,1,'wp_user-settings','mfold=o&libraryContent=browse&editor=tinymce&edit_element_vcUIPanelWidth=650&edit_element_vcUIPanelLeft=674px&edit_element_vcUIPanelTop=74px'),(18,1,'wp_user-settings-time','1504645606'),(19,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(20,1,'metaboxhidden_nav-menus','a:2:{i:0;s:12:\"add-post_tag\";i:1;s:15:\"add-post_format\";}'),(21,1,'tgmpa_dismissed_notice_tgmpa','1'),(22,1,'closedpostboxes_dashboard','a:2:{i:0;s:21:\"dashboard_quick_press\";i:1;s:17:\"dashboard_primary\";}'),(23,1,'metaboxhidden_dashboard','a:2:{i:0;s:21:\"dashboard_quick_press\";i:1;s:17:\"dashboard_primary\";}'),(24,1,'meta-box-order_dashboard','a:4:{s:6:\"normal\";s:18:\"dashboard_activity\";s:4:\"side\";s:59:\"dashboard_quick_press,dashboard_primary,dashboard_right_now\";s:7:\"column3\";s:0:\"\";s:7:\"column4\";s:0:\"\";}'),(25,1,'nav_menu_recently_edited','20'),(26,1,'closedpostboxes_page','a:5:{i:0;s:13:\"pageparentdiv\";i:1;s:11:\"main_layout\";i:2;s:14:\"custom_sidebar\";i:3;s:11:\"select_menu\";i:4;s:12:\"postimagediv\";}'),(27,1,'metaboxhidden_page','a:6:{i:0;s:12:\"revisionsdiv\";i:1;s:10:\"postcustom\";i:2;s:16:\"commentstatusdiv\";i:3;s:11:\"commentsdiv\";i:4;s:7:\"slugdiv\";i:5;s:9:\"authordiv\";}'),(28,1,'wp_media_library_mode','list'),(29,1,'closedpostboxes_mapplic_map','a:0:{}'),(30,1,'metaboxhidden_mapplic_map','a:1:{i:0;s:7:\"slugdiv\";}'),(31,1,'wpmm_dismissed_notices','promo-strictthemes'),(32,2,'nickname','leoprada'),(33,2,'first_name','Leandro'),(34,2,'last_name','Prada'),(35,2,'description',''),(36,2,'rich_editing','true'),(37,2,'comment_shortcuts','false'),(38,2,'admin_color','fresh'),(39,2,'use_ssl','0'),(40,2,'show_admin_bar_front','true'),(41,2,'locale',''),(42,2,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(43,2,'wp_user_level','10'),(44,2,'dismissed_wp_pointers','vc_pointers_frontend_editor'),(45,2,'session_tokens','a:7:{s:64:\"0365172641ab99a6303956fe2035f23f0019fd57b2cb218d48c8a81de799798e\";a:4:{s:10:\"expiration\";i:1510080123;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36\";s:5:\"login\";i:1508870523;}s:64:\"b7f107b59b6daaf140e5615a6f45d434dfe288cbb4031c6c9a0a1136972ae223\";a:4:{s:10:\"expiration\";i:1510081268;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36\";s:5:\"login\";i:1508871668;}s:64:\"18ad17a5de3d0094ac0dbae08c589b33cd05170c4672344c38f9e4cafe3c8591\";a:4:{s:10:\"expiration\";i:1510158909;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36\";s:5:\"login\";i:1508949309;}s:64:\"806949741d4b90f663194a21628716de9a57a2b38d7eb3f5ebb59716051401d3\";a:4:{s:10:\"expiration\";i:1510162884;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36\";s:5:\"login\";i:1508953284;}s:64:\"75db0a07046eb78a0702972023c6ee8329952ffdb3fe3c1aa8bc64ab503f601c\";a:4:{s:10:\"expiration\";i:1510163615;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36\";s:5:\"login\";i:1508954015;}s:64:\"1100372c32ac6350e24ad233c0925a1dee29011b2e650730d52acf2b73514c22\";a:4:{s:10:\"expiration\";i:1510163775;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36\";s:5:\"login\";i:1508954175;}s:64:\"be511b3520a81915cb3460d7d3494e9703fc73945e42f1dbd482e1e13fb044e0\";a:4:{s:10:\"expiration\";i:1510230852;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:73:\"Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0\";s:5:\"login\";i:1509021252;}}'),(46,2,'wp_user-settings','editor=tinymce&edit_element_vcUIPanelWidth=650&edit_element_vcUIPanelLeft=674px&edit_element_vcUIPanelTop=74px&libraryContent=browse&mfold=o&post_dfw=off'),(47,2,'wp_user-settings-time','1508955061'),(48,2,'tgmpa_dismissed_notice_tgmpa','1'),(49,2,'wp_dashboard_quick_press_last_post_id','14179'),(50,2,'closedpostboxes_page','a:0:{}'),(51,2,'metaboxhidden_page','a:7:{i:0;s:19:\"wpb_visual_composer\";i:1;s:12:\"revisionsdiv\";i:2;s:10:\"postcustom\";i:3;s:16:\"commentstatusdiv\";i:4;s:11:\"commentsdiv\";i:5;s:7:\"slugdiv\";i:6;s:9:\"authordiv\";}'),(52,2,'nav_menu_recently_edited','20'),(53,2,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(54,2,'metaboxhidden_nav-menus','a:5:{i:0;s:22:\"add-post-type-octapost\";i:1;s:12:\"add-post_tag\";i:2;s:15:\"add-post_format\";i:3;s:11:\"add-oc-tags\";i:4;s:17:\"add-oc-categories\";}'),(55,3,'nickname','Abonin'),(56,3,'first_name','Arturo'),(57,3,'last_name','Bonin'),(58,3,'description',''),(59,3,'rich_editing','true'),(60,3,'comment_shortcuts','false'),(61,3,'admin_color','fresh'),(62,3,'use_ssl','0'),(63,3,'show_admin_bar_front','true'),(64,3,'locale',''),(65,3,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(66,3,'wp_user_level','10'),(67,3,'dismissed_wp_pointers',''),(68,3,'session_tokens','a:2:{s:64:\"b3971d44e954de9a9a7c3917b97ec9f1b92294514119d50dd4f2c88735f1a393\";a:4:{s:10:\"expiration\";i:1509128460;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36\";s:5:\"login\";i:1508955660;}s:64:\"31471ca73b485caa05f77152d68934e9f6285107b6028912f963264d1fe5af8c\";a:4:{s:10:\"expiration\";i:1509136134;s:2:\"ip\";s:15:\"181.167.134.183\";s:2:\"ua\";s:129:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063\";s:5:\"login\";i:1508963334;}}'),(69,3,'wp_dashboard_quick_press_last_post_id','14193');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 11:22:31
