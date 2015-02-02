-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Mak
-- ------------------------------------------------------
-- Server version	5.5.40-0+wheezy1

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
-- Table structure for table `Bestelling`
--

DROP TABLE IF EXISTS `Bestelling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bestelling` (
  `Bestelling_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Klant_ID` int(11) unsigned NOT NULL,
  `Totaalprijs` decimal(10,2) unsigned NOT NULL,
  `Verzendmethode` varchar(50) NOT NULL,
  `Bestelling_Datum` datetime NOT NULL,
  PRIMARY KEY (`Bestelling_ID`),
  KEY `Klant_ID` (`Klant_ID`),
  CONSTRAINT `Bestelling_ibfk_1` FOREIGN KEY (`Klant_ID`) REFERENCES `Klant` (`Klant_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bestelling`
--

LOCK TABLES `Bestelling` WRITE;
/*!40000 ALTER TABLE `Bestelling` DISABLE KEYS */;
INSERT INTO `Bestelling` VALUES (1,41,180.00,'Rembours','0000-00-00 00:00:00'),(2,41,9.00,'Standaard','0000-00-00 00:00:00'),(213,41,234.00,'Standaard','0000-00-00 00:00:00'),(241,45,0.00,'','2015-01-28 13:25:56'),(242,45,0.00,'','2015-01-28 13:27:32'),(243,45,33.00,'ophalen','2015-01-28 13:28:59'),(244,45,33.00,'ophalen','2015-01-28 13:32:07'),(245,45,32.95,'ophalen','2015-01-28 13:53:24'),(246,45,39.90,'verzenden','2015-01-28 14:10:13'),(247,45,39.90,'verzenden','2015-01-28 14:10:56'),(248,45,102.35,'verzenden','2015-01-28 14:12:01'),(249,45,0.00,'','2015-01-28 18:57:58'),(250,45,0.00,'','2015-01-28 19:01:02'),(251,45,44.90,'verzenden','2015-01-28 19:02:53'),(252,45,39.90,'verzenden','2015-01-28 19:14:13'),(253,45,51.90,'verzenden','2015-01-28 19:15:52'),(254,45,41.90,'verzenden','2015-01-28 19:21:54'),(255,45,49.90,'verzenden','2015-01-28 19:29:34'),(256,45,0.00,'','2015-01-28 19:44:28'),(257,45,41.90,'verzenden','2015-01-28 19:48:10'),(258,45,48.90,'verzenden','2015-01-28 19:52:40'),(259,45,48.90,'verzenden','2015-01-28 19:57:44'),(260,45,48.90,'verzenden','2015-01-28 20:01:39'),(261,45,19.90,'verzenden','2015-01-28 20:06:26'),(262,45,27.45,'verzenden','2015-01-28 20:13:02'),(263,45,29.90,'verzenden','2015-01-28 20:35:10'),(264,45,26.90,'verzenden','2015-01-28 20:36:49'),(265,45,44.90,'verzenden','2015-01-28 20:41:27'),(266,45,27.45,'verzenden','2015-01-28 20:43:09'),(267,45,41.90,'verzenden','2015-01-28 20:44:55'),(268,45,10.45,'verzenden','2015-01-28 20:52:41'),(269,45,46.90,'verzenden','2015-01-28 20:56:57'),(270,45,19.90,'verzenden','2015-01-28 21:09:54'),(271,45,19.90,'verzenden','2015-01-28 21:15:04'),(272,45,19.90,'verzenden','2015-01-28 21:16:26'),(273,45,19.90,'verzenden','2015-01-28 21:18:06'),(274,45,27.45,'verzenden','2015-01-28 21:24:04'),(275,45,16.95,'verzenden','2015-01-28 22:22:44'),(276,45,51.90,'verzenden','2015-01-28 22:24:43'),(277,45,41.90,'verzenden','2015-01-28 22:32:55'),(278,45,54.90,'verzenden','2015-01-28 22:38:03'),(279,45,54.90,'verzenden','2015-01-28 22:42:53'),(280,45,54.90,'verzenden','2015-01-28 22:47:17'),(281,45,129.85,'ophalen','2015-01-28 22:48:02'),(282,45,49.90,'verzenden','2015-01-28 22:54:31'),(283,45,0.00,'','2015-01-28 22:58:53'),(284,45,19.90,'verzenden','2015-01-28 23:01:20'),(285,45,63.90,'verzenden','2015-01-28 23:03:02'),(286,45,46.90,'verzenden','2015-01-28 23:07:09'),(287,45,54.90,'verzenden','2015-01-28 23:08:24'),(288,45,63.90,'verzenden','2015-01-28 23:11:20'),(289,45,49.90,'verzenden','2015-01-28 23:14:34'),(290,45,56.95,'ophalen','2015-01-28 23:36:07'),(291,45,44.95,'','2015-01-28 23:45:06'),(292,42,65.45,'ophalen','2015-01-29 01:17:25'),(293,42,76.90,'ophalen','2015-01-29 01:48:51'),(294,42,47.95,'verzenden','2015-01-29 11:39:11'),(295,42,34.95,'ophalen','2015-01-29 11:40:10'),(296,45,20.50,'ophalen','2015-01-29 12:07:29'),(297,45,3.50,'ophalen','2015-01-29 12:08:27'),(298,46,41.90,'verzenden','2015-01-29 14:07:17'),(299,46,48.90,'verzenden','2015-01-29 14:11:31'),(300,45,39.90,'verzenden','2015-01-29 17:58:18'),(301,53,71.90,'ophalen','2015-01-29 20:56:51'),(302,53,76.90,'ophalen','2015-01-29 21:09:03'),(303,53,96.90,'ophalen','2015-01-29 21:39:03'),(304,53,47.90,'ophalen','2015-01-29 21:42:40'),(305,53,64.95,'ophalen','2015-01-29 21:44:29'),(306,45,96.45,'ophalen','2015-01-30 03:07:19'),(307,42,44.95,'ophalen','2015-01-30 03:08:52'),(308,45,51.90,'verzenden','2015-01-30 03:13:02'),(309,45,3.50,'ophalen','2015-01-30 03:14:11'),(310,45,447.30,'ophalen','2015-01-30 03:22:51'),(311,46,44.95,'ophalen','2015-01-30 09:57:39'),(312,53,32.95,'ophalen','2015-01-30 13:22:00'),(313,46,129.50,'ophalen','2015-01-30 13:22:55'),(314,53,44.95,'ophalen','2015-01-30 13:23:15'),(315,53,227.70,'ophalen','2015-01-30 13:23:35'),(316,54,27.45,'verzenden','2015-01-30 13:25:35'),(317,54,276.65,'verzenden','2015-01-30 13:26:55'),(318,46,250.20,'ophalen','2015-01-30 13:28:32'),(319,46,503.40,'ophalen','2015-01-30 13:29:47'),(320,53,569.30,'ophalen','2015-01-30 13:30:24'),(321,46,1.00,'verzenden','2015-01-30 13:30:35'),(322,54,58.45,'ophalen','2015-01-30 13:57:38'),(323,46,628.95,'ophalen','2015-01-30 14:24:20'),(324,46,116.90,'verzenden','2015-01-30 14:29:19'),(325,49,245.65,'ophalen','2015-01-30 14:31:56'),(326,46,61.50,'ophalen','2015-01-30 14:36:57'),(327,46,41.90,'verzenden','2015-01-30 14:39:48'),(328,49,98.00,'ophalen','2015-01-30 14:40:39'),(329,49,132.90,'ophalen','2015-01-30 14:47:00'),(330,46,292.90,'ophalen','2015-01-30 14:52:35'),(331,49,211.95,'verzenden','2015-01-30 14:54:49'),(332,46,189.15,'verzenden','2015-01-30 15:01:22'),(333,46,265.25,'verzenden','2015-01-30 15:11:36'),(334,53,41.90,'verzenden','2015-01-30 15:13:46'),(335,46,27.45,'verzenden','2015-01-30 15:19:42'),(336,46,44.95,'ophalen','2015-01-30 15:22:24'),(337,46,216.65,'verzenden','2015-01-30 15:33:07'),(338,46,41.90,'verzenden','2015-01-30 15:38:45'),(339,53,41.95,'ophalen','2015-01-30 15:42:02'),(340,46,20.00,'ophalen','2015-01-30 15:43:37'),(341,57,63.95,'verzenden','2015-01-30 15:44:40'),(342,57,7.95,'verzenden','2015-01-30 15:45:23'),(343,46,126.80,'verzenden','2015-01-30 16:06:20'),(344,46,225.80,'verzenden','2015-01-30 16:11:42'),(345,46,41.90,'verzenden','2015-01-30 16:33:33'),(346,46,10.00,'ophalen','2015-01-30 16:36:07'),(347,46,10.95,'verzenden','2015-01-30 16:37:34'),(348,53,37.95,'ophalen','2015-01-30 16:51:33'),(349,53,1.00,'ophalen','2015-01-30 23:46:28'),(350,54,47.95,'ophalen','2015-01-31 18:08:10'),(351,54,31.55,'verzenden','2015-02-01 14:51:50'),(352,54,69.70,'ophalen','2015-02-01 15:59:59'),(353,54,12.00,'ophalen','2015-02-01 16:06:04'),(354,53,1.42,'ophalen','2015-02-01 17:51:14'),(355,53,1.43,'ophalen','2015-02-01 17:55:33'),(356,53,889.65,'ophalen','2015-02-01 18:01:42'),(357,53,1.00,'ophalen','2015-02-01 18:02:23'),(358,53,0.00,'ophalen','2015-02-01 18:05:38'),(359,53,1062.60,'ophalen','2015-02-01 18:07:52'),(360,42,32.95,'ophalen','2015-02-01 22:56:45');
/*!40000 ALTER TABLE `Bestelling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Factuur`
--

DROP TABLE IF EXISTS `Factuur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Factuur` (
  `Factuur_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Klant_ID` int(11) unsigned NOT NULL,
  `Totaalprijs` decimal(10,2) NOT NULL,
  `Verzendmethode` varchar(50) NOT NULL,
  `Factuur_Datum` datetime NOT NULL,
  `Verzendstatus` text NOT NULL,
  `Betaalstatus` text NOT NULL,
  PRIMARY KEY (`Factuur_ID`),
  KEY `Klant_ID` (`Klant_ID`),
  KEY `Totaalprijs` (`Totaalprijs`),
  CONSTRAINT `Factuur_ibfk_1` FOREIGN KEY (`Klant_ID`) REFERENCES `Klant` (`Klant_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Factuur`
--

LOCK TABLES `Factuur` WRITE;
/*!40000 ALTER TABLE `Factuur` DISABLE KEYS */;
INSERT INTO `Factuur` VALUES (52,46,41.90,'verzenden','2015-01-29 14:07:17','Verzonden','Betaald'),(53,46,48.90,'verzenden','2015-01-29 14:11:31','Verzonden','Betaald'),(54,45,39.90,'verzenden','2015-01-29 17:58:18','Verzonden','Betaald'),(55,53,41.95,'ophalen','2015-01-29 20:56:51','Verzonden','Betaald'),(56,53,71.90,'ophalen','2015-01-29 20:56:51','Verzonden','Betaald'),(57,53,0.00,'ophalen','2015-01-29 21:09:03','Verzonden','Betaald'),(58,53,0.00,'ophalen','2015-01-29 21:39:03','Verzonden','Betaald'),(59,53,47.90,'ophalen','2015-01-29 21:42:40','Verzonden','Betaald'),(60,53,64.95,'ophalen','2015-01-29 21:44:29','Verzonden','Betaald'),(61,45,96.45,'ophalen','2015-01-30 03:07:19','Verzonden','Betaald'),(62,42,44.95,'ophalen','2015-01-30 03:08:52','Verzonden','Betaald'),(63,45,51.90,'verzenden','2015-01-30 03:13:02','Verzonden','Betaald'),(64,45,3.50,'ophalen','2015-01-30 03:14:11','Verzonden','Betaald'),(65,45,447.30,'ophalen','2015-01-30 03:22:51','Verzonden','Betaald'),(66,46,44.95,'ophalen','2015-01-30 09:57:39','Verzonden','Betaald'),(67,53,32.95,'ophalen','2015-01-30 13:22:00','Verzonden','Betaald'),(68,46,129.50,'ophalen','2015-01-30 13:22:55','Verzonden','Betaald'),(69,53,44.95,'ophalen','2015-01-30 13:23:15','Verzonden','Betaald'),(70,53,227.70,'ophalen','2015-01-30 13:23:35','Verzonden','Betaald'),(71,54,27.45,'verzenden','2015-01-30 13:25:35','Verzonden','Betaald'),(72,54,276.65,'verzenden','2015-01-30 13:26:55','Verzonden','Betaald'),(73,46,250.20,'ophalen','2015-01-30 13:28:32','Verzonden','Betaald'),(74,46,503.40,'ophalen','2015-01-30 13:29:47','Verzonden','Betaald'),(75,53,569.30,'ophalen','2015-01-30 13:30:24','Verzonden','Betaald'),(76,46,1.00,'verzenden','2015-01-30 13:30:35','Verzonden','Betaald'),(77,54,58.45,'ophalen','2015-01-30 13:57:38','Verzonden','Betaald'),(78,46,628.95,'ophalen','2015-01-30 14:24:20','Verzonden','Betaald'),(79,46,116.90,'verzenden','2015-01-30 14:29:19','Verzonden','Betaald'),(80,49,245.65,'ophalen','2015-01-30 14:31:56','Verzonden','Betaald'),(81,46,61.50,'ophalen','2015-01-30 14:36:57','Verzonden','Betaald'),(82,46,41.90,'verzenden','2015-01-30 14:39:48','Verzonden','Betaald'),(83,49,98.00,'ophalen','2015-01-30 14:40:39','Verzonden','Betaald'),(84,49,132.90,'ophalen','2015-01-30 14:47:00','Verzonden','Betaald'),(85,46,292.90,'ophalen','2015-01-30 14:52:35','Verzonden','Betaald'),(86,49,211.95,'verzenden','2015-01-30 14:54:49','Verzonden','Betaald'),(87,46,189.15,'verzenden','2015-01-30 15:01:22','Verzonden','Betaald'),(88,46,265.25,'verzenden','2015-01-30 15:11:36','Verzonden','Betaald'),(89,53,41.90,'verzenden','2015-01-30 15:13:46','Verzonden','Betaald'),(90,46,27.45,'verzenden','2015-01-30 15:19:42','Verzonden','Betaald'),(91,46,44.95,'ophalen','2015-01-30 15:22:24','Verzonden','Betaald'),(92,46,216.65,'verzenden','2015-01-30 15:33:07','Verzonden','Betaald'),(93,46,41.90,'verzenden','2015-01-30 15:38:45','Verzonden','Betaald'),(94,53,41.95,'ophalen','2015-01-30 15:42:02','Verzonden','Betaald'),(95,46,20.00,'ophalen','2015-01-30 15:43:37','Verzonden','Betaald'),(96,57,63.95,'verzenden','2015-01-30 15:44:40','Verzonden','Betaald'),(97,57,7.95,'verzenden','2015-01-30 15:45:23','Verzonden','Betaald'),(98,46,126.80,'verzenden','2015-01-30 16:06:20','Verzonden','Betaald'),(99,46,225.80,'verzenden','2015-01-30 16:11:42','Verzonden','Betaald'),(100,46,41.90,'verzenden','2015-01-30 16:33:33','Verzonden','Betaald'),(101,46,10.00,'ophalen','2015-01-30 16:36:07','Verzonden','Betaald'),(102,46,10.95,'verzenden','2015-01-30 16:37:34','Verzonden','Betaald'),(103,53,37.95,'ophalen','2015-01-30 16:51:33','Verzonden','Betaald'),(104,53,1.00,'ophalen','2015-01-30 23:46:28','Verzonden','Betaald'),(105,54,47.95,'ophalen','2015-01-31 18:08:10','Verzonden','Betaald'),(106,54,31.55,'verzenden','2015-02-01 14:51:50','Verzonden','Betaald'),(107,54,69.70,'ophalen','2015-02-01 15:59:59','Verzonden','Betaald'),(108,54,12.00,'ophalen','2015-02-01 16:06:04','Verzonden','Betaald'),(109,53,1.42,'ophalen','2015-02-01 17:51:14','Verzonden','Betaald'),(110,53,1.43,'ophalen','2015-02-01 17:55:33','Verzonden','Betaald'),(111,53,889.65,'ophalen','2015-02-01 18:01:42','Verzonden','Betaald'),(112,53,1.00,'ophalen','2015-02-01 18:02:23','Verzonden','Betaald'),(113,53,0.00,'ophalen','2015-02-01 18:05:38','Niet verzonden','Niet betaald'),(114,53,1062.60,'ophalen','2015-02-01 18:07:52','Verzonden','Betaald'),(115,42,32.95,'ophalen','2015-02-01 22:56:45','Niet verzonden','Betaald');
/*!40000 ALTER TABLE `Factuur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Factuur_Product`
--

DROP TABLE IF EXISTS `Factuur_Product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Factuur_Product` (
  `Factuur_Product_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Productnaam` varchar(100) NOT NULL,
  `Categorie` varchar(100) NOT NULL,
  `Prijs` decimal(10,2) unsigned zerofill NOT NULL DEFAULT '00000000.00' COMMENT 'Query bijv. zoals: SELECT TRIM(LEADING ''0'' FROM Prijs) FROM Product WHERE Product_ID = 1',
  `img_filepath` varchar(100) NOT NULL,
  `Toevoegingsdatum` datetime NOT NULL,
  PRIMARY KEY (`Factuur_Product_ID`),
  KEY `Toevoegingsdatum` (`Toevoegingsdatum`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Factuur_Product`
--

LOCK TABLES `Factuur_Product` WRITE;
/*!40000 ALTER TABLE `Factuur_Product` DISABLE KEYS */;
INSERT INTO `Factuur_Product` VALUES (23,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-29 14:07:17'),(24,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-01-29 14:11:31'),(25,'Aardbeien Cupcake','Cupcakes',00000032.95,'catalogus/Cupcakes/Cupcakes2_aardbei.jpg','2015-01-29 17:58:18'),(26,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-01-29 20:56:51'),(27,'Chocolate Cupcake','Cupcakes',00000029.95,'catalogus/Cupcakes/Cupcakes6_choc.jpg','2015-01-29 20:56:51'),(28,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-01-29 21:09:03'),(29,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-29 21:09:03'),(30,'Chocolate Chip Cookies','Koekjes',00000056.95,'catalogus/Koeken/Koekjes6_chocchip.jpg','2015-01-29 21:39:03'),(31,'fsfs','Taarten',00000039.95,'catalogus/Taarten/Taart2_kersentaart.jpg','2015-01-29 21:39:03'),(32,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-29 21:42:40'),(33,'Hamburger Cupcake','Cupcakes',00000012.95,'catalogus/Cupcakes/Cupcakes4_burger.jpg','2015-01-29 21:42:40'),(34,'Drie-soorten-chocoladetaart','Taarten',00000010.00,'catalogus/Taarten/Taart4_3soortenChocalade.jpg','2015-01-29 21:44:29'),(35,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-29 21:44:29'),(36,'Appeltaart','Taarten',00000020.50,'catalogus/Taarten/Taart9_appeltaart.jpg','2015-01-30 03:07:19'),(37,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-30 03:07:19'),(38,'Aardbeienkwarktaart','Taarten',00000044.95,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 03:08:52'),(39,'Aardbeienkwarktaart','Taarten',00000044.95,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 03:13:02'),(40,'Chocolade slagroomtaart','Taarten',00000003.50,'catalogus/Taarten/Taart3_chocolade.jpg','2015-01-30 03:14:11'),(41,'Boterkoek','Koekjes',00000031.95,'catalogus/Koeken/Koekjes4_boterkoek.jpg','2015-01-30 03:22:51'),(42,'Aardbeienkwarktaart','Taarten',00000044.95,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 09:57:39'),(43,'Aardbeien Cupcake','Cupcakes',00000032.95,'catalogus/Cupcakes/Cupcakes2_aardbei.jpg','2015-01-30 13:22:00'),(44,'Boterkoek','Koekjes',00000012.95,'catalogus/Koeken/Koekjes4_boterkoek.jpg','2015-01-30 13:22:55'),(45,'Aardbeienkwarktaart','Taarten',00000044.95,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 13:23:15'),(46,'Chocokoekjes','Koekjes',00000037.95,'catalogus/Koeken/Koekjes10_chockoekjes.jpg','2015-01-30 13:23:35'),(47,'Appeltaart','Taarten',00000020.50,'catalogus/Taarten/Taart9_appeltaart.jpg','2015-01-30 13:25:35'),(48,'Aardbeienkwarktaart','Taarten',00000044.95,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 13:26:55'),(49,'Boterkoek','Koekjes',00000012.95,'catalogus/Koeken/Koekjes4_boterkoek.jpg','2015-01-30 13:28:32'),(50,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-01-30 13:28:32'),(51,'Aardbeien Cupcake','Cupcakes',00000032.95,'catalogus/Cupcakes/Cupcakes2_aardbei.jpg','2015-01-30 13:28:32'),(52,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-01-30 13:29:47'),(53,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-30 13:30:24'),(54,'Aardbeienkwarktaart','Taarten',00000044.95,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 13:30:24'),(55,'Boterkoek','Koekjes',00000012.95,'catalogus/Koeken/Koekjes4_boterkoek.jpg','2015-01-30 13:30:35'),(56,'Chocokoekjes','Koekjes',00000037.95,'catalogus/Koeken/Koekjes10_chockoekjes.jpg','2015-01-30 13:30:35'),(57,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-01-30 13:30:35'),(58,'Chocokoekjes','Koekjes',00000037.95,'catalogus/Koeken/Koekjes10_chockoekjes.jpg','2015-01-30 13:57:38'),(59,'Appeltaart','Taarten',00000020.50,'catalogus/Taarten/Taart9_appeltaart.jpg','2015-01-30 13:57:38'),(60,'Speculaas','Koekjes',00000029.95,'catalogus/Koeken/Koekjes2_speculaas.jpg','2015-01-30 14:24:20'),(61,'Geert Mak-Cupcake','Cupcakes',00000089.95,'catalogus/Cupcakes/Cupcakes3_GeertMak.jpg','2015-01-30 14:29:19'),(62,'Drie soorten chocoladetaart','Taarten',00000010.00,'catalogus/Taarten/Taart4_3soortenChocalade.jpg','2015-01-30 14:29:19'),(63,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-30 14:31:56'),(64,'Chocolate Cupcake','Cupcakes',00000037.95,'catalogus/Cupcakes/Cupcakes6_choc.jpg','2015-01-30 14:31:56'),(65,'Aardbeien Cupcake','Cupcakes',00000032.95,'catalogus/Cupcakes/Cupcakes2_aardbei.jpg','2015-01-30 14:31:56'),(66,'Geert Mak Taart','Taarten',00000012.30,'catalogus/Taarten/Taart1_maktaart.jpg','2015-01-30 14:36:57'),(67,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-30 14:39:48'),(68,'Geert Mak-Cupcake','Cupcakes',00000089.95,'catalogus/Cupcakes/Cupcakes3_GeertMak.jpg','2015-01-30 14:40:39'),(69,'Geert Mak-Cupcake','Cupcakes',00000089.95,'catalogus/Cupcakes/Cupcakes3_GeertMak.jpg','2015-01-30 14:47:00'),(70,'Gevulde Koeken','Koekjes',00000042.95,'catalogus/Koeken/Koekjes3_gevuld.jpg','2015-01-30 14:47:00'),(71,'Geert Mak Taart','Taarten',00000012.30,'catalogus/Taarten/Taart1_maktaart.jpg','2015-01-30 14:52:35'),(72,'Geert Mak Cupcake ','Cupcakes',00000089.95,'catalogus/Cupcakes/Cupcakes3_GeertMak.jpg','2015-01-30 14:52:35'),(73,'Geert Mak koekjes','Koekjes',00000079.95,'catalogus/Koeken/Koekjes1_makkoekjes','2015-01-30 14:52:35'),(74,'Appeltaart','Taarten',00000020.50,'catalogus/Taarten/Taart9_appeltaart.jpg','2015-01-30 14:54:49'),(75,'Geert Mak Taart','Taarten',00000012.30,'catalogus/Taarten/Taart1_maktaart.jpg','2015-01-30 15:01:22'),(76,'Geert Mak Cupcake ','Cupcakes',00000089.95,'catalogus/Cupcakes/Cupcakes3_GeertMak.jpg','2015-01-30 15:01:22'),(77,'Geert Mak koekjes','Koekjes',00000079.95,'catalogus/Koeken/Koekjes1_makkoekjes','2015-01-30 15:01:22'),(78,'Geert Mak Taart','Taarten',00000012.30,'catalogus/Taarten/Taart1_maktaart.jpg','2015-01-30 15:11:36'),(79,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-30 15:13:46'),(80,'Appeltaart','Taarten',00000020.50,'catalogus/Taarten/Taart9_appeltaart.jpg','2015-01-30 15:19:42'),(81,'Aardbeienkwarktaart','Taarten',00000044.95,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 15:22:24'),(82,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-30 15:33:07'),(83,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-30 15:38:45'),(84,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-01-30 15:42:02'),(85,'Vlaai','Taarten',00000010.00,'vlaai','2015-01-30 15:43:37'),(86,'Chocolate Cupcake','Cupcakes',00000037.95,'catalogus/Cupcakes/Cupcakes6_choc.jpg','2015-01-30 15:44:40'),(87,'Aardbeienkwarktaart','Taarten',00000045.00,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 15:44:40'),(88,'Fruitkoekjes','Koekjes',00000059.95,'catalogus/Koeken/Koekjes7_fruitkoekjes.jpg','2015-01-30 15:45:23'),(89,'Liefdes Taart','Taarten',00000039.95,'catalogus/Taarten/Taart2_kersentaart.jpg','2015-01-30 16:06:20'),(90,'Geert Mak Cupcake ','Cupcakes',00000089.95,'catalogus/Cupcakes/Cupcakes3_GeertMak.jpg','2015-01-30 16:11:42'),(91,'Winter Cupcake','Cupcakes',00000038.95,'catalogus/Cupcakes/Cupcakes10_winter.jpg','2015-01-30 16:11:42'),(92,'Cookie Monster Cupcake','Cupcakes',00000034.95,'catalogus/Cupcakes/Cupcakes9_monster.jpg','2015-01-30 16:33:33'),(93,'Vlaai','Taarten',00000010.00,'vlaai','2015-01-30 16:36:07'),(94,'Aardbeienkwarktaart','Taarten',00000045.00,'catalogus/Taarten/Taart5_aardbei.jpg','2015-01-30 16:37:34'),(95,'Chocokoekjes','Koekjes',00000037.95,'catalogus/Koeken/Koekjes10_chockoekjes.jpg','2015-01-30 16:51:33'),(96,'Geert Mak Taart','Taarten',00000012.30,'catalogus/Taarten/Taart1_maktaart.jpg','2015-01-30 23:46:28'),(97,'Bosvruchtentaart','Taarten',00000047.95,'catalogus/Taarten/Taart8_bosvruchten.jpg','2015-01-31 18:08:10'),(98,'Geert Mak Taart','Taarten',00000012.30,'catalogus/Taarten/Taart1_maktaart.jpg','2015-02-01 14:51:50'),(99,'Geert Mak Taart','Taarten',00000012.30,'catalogus/Taarten/Taart1_maktaart.jpg','2015-02-01 15:59:59'),(100,'Appeltaart','Taarten',00000020.50,'catalogus/Taarten/Taart9_appeltaart.jpg','2015-02-01 15:59:59'),(101,'Kaneeltaart','Taarten',00000012.00,'catalogus/Taarten/Taart6_kaneel.jpg','2015-02-01 16:06:04'),(102,'Aardbeienkwarktaart','Taarten',00000045.00,'catalogus/Taarten/Taart5_aardbei.jpg','2015-02-01 17:51:14'),(103,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-02-01 17:51:14'),(104,'Bitterkoekjes','Koekjes',00000041.95,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg','2015-02-01 17:55:33'),(105,'Aardbeien Cupcake','Cupcakes',00000032.95,'catalogus/Cupcakes/Cupcakes2_aardbei.jpg','2015-02-01 18:01:42'),(106,'Chocolate Cupcake','Cupcakes',00000037.95,'catalogus/Cupcakes/Cupcakes6_choc.jpg','2015-02-01 18:02:23'),(107,'Noten Cupcakes','Cupcakes',00000044.95,'catalogus/Cupcakes/Cupcakes7_noot.jpg','2015-02-01 18:05:38'),(108,'Chocolate Cupcake','Cupcakes',00000037.95,'catalogus/Cupcakes/Cupcakes6_choc.jpg','2015-02-01 18:07:52'),(109,'Aardbeien Cupcake','Cupcakes',00000032.95,'catalogus/Cupcakes/Cupcakes2_aardbei.jpg','2015-02-01 22:56:45');
/*!40000 ALTER TABLE `Factuur_Product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ingredients`
--

DROP TABLE IF EXISTS `Ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ingredients` (
  `Categorie` varchar(255) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Foto` varchar(600) NOT NULL,
  `Prijs` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ingredients`
--

LOCK TABLES `Ingredients` WRITE;
/*!40000 ALTER TABLE `Ingredients` DISABLE KEYS */;
INSERT INTO `Ingredients` VALUES ('topping','Kaars',1,'projectBarry/topping1.png',''),('topping','Hagelslag',2,'projectBarry/topping2.png',''),('vulling','Aardappelen',3,'projectBarry/vulling4.png',''),('vulling','Geert Mak',4,'projectBarry/vulling3.png',''),('bodem','Klei',5,'projectBarry/bodem3.png',''),('bodem','Rogge',6,'projectBarry/bodem2.png',''),('vulling','Cake',7,'projectBarry/vulling1.png',''),('bodem','Standaard',8,'projectBarry/bodem1.png',''),('topping','Pannenkoeken',9,'projectBarry/topping3.png',''),('glazuur','Tandpasta',10,'projectBarry/glazuur2.png',''),('vulling','Chocola',11,'projectBarry/vulling2.png',''),('glazuur','Chocola',12,'projectBarry/glazuur1.png',''),('','Roze Spul',13,'',''),('','Kwark',14,'','');
/*!40000 ALTER TABLE `Ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Klant`
--

DROP TABLE IF EXISTS `Klant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Klant` (
  `Klant_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Achternaam` varchar(590) NOT NULL,
  `Tussenvoegsel` varchar(50) NOT NULL,
  `Voornaam` varchar(100) NOT NULL,
  `Geslacht` int(2) NOT NULL DEFAULT '3' COMMENT 'ISO/IEC 5218: 0 = not known, 1 = man, 2 = female, 9 = not applicable',
  `Straat` varchar(500) NOT NULL,
  `Huisnummer` int(5) unsigned NOT NULL,
  `Postcode` varchar(50) NOT NULL,
  `Woonplaats` varchar(100) NOT NULL,
  `Telefoonnummer` varchar(20) DEFAULT NULL,
  `Emailadres` varchar(200) NOT NULL,
  `Wachtwoord` varchar(120) NOT NULL,
  `Administrator` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Klant_ID`),
  UNIQUE KEY `Emailadres` (`Emailadres`),
  KEY `Achternaam` (`Achternaam`(255)),
  KEY `Postcode` (`Postcode`),
  KEY `Wachtwoord` (`Wachtwoord`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Klant`
--

LOCK TABLES `Klant` WRITE;
/*!40000 ALTER TABLE `Klant` DISABLE KEYS */;
INSERT INTO `Klant` VALUES (41,'Account','','Test',0,'fj',2,'1234fj','fj','','1@2.nl','80be29ff9b452201551e1006a8cd5e100f8fb7e5',0),(42,'Laan','','Bart',1,'Edmund Nicklaan',8,'3451SN','Vleuten','0641631222','bartlaan96@gmail.com','be8d0d9cc9f622984be43011e5f070fd7e8f8ad8',1),(43,'Anomynous','','Anomynous',0,'Empty',69,'666XX','Onbekend','','anon@anonmail.com','9b31430c7103a4b9ef2e72855577ee30c345b70a',0),(44,'Tump','','Claraaaaaaaaaa',0,'Haha',33,'1091HH','Clarastad','0633109389','info@bierbrommer.nl','ea4f0adc2e0e2255fbfb68de5632c79a8df23e0a',0),(45,'Account','','Test',0,'Straatnaam',1,'1234AB','Plaatsnaam','1234567890','test@account.nl','d1a279ad3b80ca933309223135c30fa4089de4ca',0),(46,'Verboom','','Simon',1,'Van Ostadestraat',45985347,'1073TZ','Amsterdam','0647218292','Barry@bakker.nl','165c464970f3017700fd1bef2d11f344ab3201b0',1),(47,'Verboom','','Simon',1,'Van Ostadestraat',350,'1073TZ','Amsterdam','0647218292','barry@heelbarrybakt.nl','0f9d13c9ed95c4ccd91f0db89f989f62914fd811',1),(48,'Servaas','','Barry',0,'Rhijnvis Feithlaan',4,'1850SX','Alkmaar','','barry1996@hotmail.com','759c63880d78dcc0c1ed076c36780ad7d22617f5',0),(49,'Wever','','Rijndeer',1,'Houtzaagmolen',141,'1622HL','Hoorn','058483','rien334@gmail.com','4c9e56414c5cb026ed6f8162693a287416297ebb',1),(50,'calve','','pindakaas',0,'peanutbutterjellystreet',2,'pnt','peanutland','','pinda@kaas.nl','ab3000cc25c5caec152c789254d3c1a564d6da6a',0),(51,'Marx','','Karl',2,'Hoofdstraat',222,'1515aa','Amsterdam','','marrloes@live.nl','0b7ee64b8feb493f6966985125400716283eeb70',0),(52,'gerb','','jonathan',1,'non of ur busnus',13,'666','Amsterdam','0666613','jonathan@jonathan.jon','b0f8959fa43966e357d1dae20f89174ad535a096',0),(53,'Staartje ','','Aapje',2,'Hok',29,'weetikniet','Dierentuin','','Aapje@Staartje.nl','7c514bc97e77f0c0d110fbd8f4d8280f095e569e',1),(54,'Servaas','','Barry',1,'RE',1337,'1813KS','Alkamar Zity','112','barry@heelbarrybakt.barry','53a9ff77c42661369d17f416de185ea9d162be0c',1),(55,'Boer','de','Jelle',1,'kjdhakasjdh',23,'1000MS','Amsterdam','','jrj.deboer@me.com','17d8246a0e24e811adba734b6dc3d002eb483747',0),(56,'Boer','de','Laura',2,'Hoofdstraat',32,'1011AD','Amsterdam','061234567','lauradeboer@gmail.com','4870445f9d2ba407268774d6e485cb698a8e6640',0),(57,'pls','','frans',1,'aoghsiod',0,'olololol','from * delete *','0611111111','fransbauer@gmail.com','31ebbc4c0920b33c2118097b3f9b8917ef3b061f',0),(58,'ur','','pit',0,'paodpaosdpodreef',1,'3564CP','utka','','poootree@gmail.com','bab8f5667aa259c1082494bd0f0ccf3337937e98',0),(59,'Bloep','van','Bliep',2,'Straat',80085,'1234BA','Utreg','','bloep@bliep.nl','61c5d5810f5258c21db78ff9dc4afeb033ebd6aa',1),(60,'Mak','','Geert',0,'Geertstraat',42,'4242GM','Makstad','','geert@mak.nl','ad32f2649c87fcbe1379af21b4d38ab11c481a54',0);
/*!40000 ALTER TABLE `Klant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product` (
  `Product_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Productnaam` varchar(100) NOT NULL,
  `Categorie` varchar(100) NOT NULL,
  `Prijs` decimal(10,2) unsigned zerofill NOT NULL DEFAULT '00000000.00' COMMENT 'Query bijv. zoals: SELECT TRIM(LEADING ''0'' FROM Prijs) FROM Product WHERE Product_ID = 1',
  `Voorraad` int(11) unsigned NOT NULL,
  `Beschrijving` varchar(500) DEFAULT NULL,
  `Gewicht` int(11) NOT NULL COMMENT 'Gewicht (g)',
  `img_filepath` varchar(100) NOT NULL,
  `Aanbieding` decimal(10,2) unsigned zerofill NOT NULL DEFAULT '00000000.00' COMMENT 'Query bijv. zoals: SELECT TRIM(LEADING ''0'' FROM Prijs) FROM Product WHERE Klant_ID = 1',
  `SecundaireInfo` varchar(22) NOT NULL,
  `Toevoegingsdatum` datetime NOT NULL,
  `customIngredientenID` int(255) NOT NULL,
  PRIMARY KEY (`Product_ID`),
  KEY `Productnaam` (`Productnaam`),
  KEY `Prijs` (`Prijs`),
  KEY `Categorie` (`Categorie`),
  KEY `customIngredientenID` (`customIngredientenID`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product`
--

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
INSERT INTO `Product` VALUES (1,'Geert Mak Taart','Taarten',00000059.95,57,'Met deze taart voel je je echt op je geMAK!',600,'catalogus/Taarten/Taart1_maktaart.jpg',00000012.30,'Ook in andere smaken','2015-01-20 12:02:59',0),(2,'Liefdes Taart','Taarten',00000039.95,321,'Taart met biologische kersen uit de kersenboomgaarden van Barry\'s boerderij!',500,'catalogus/Taarten/Taart2_kersentaart.jpg',00000000.00,'','2015-01-20 12:03:00',0),(3,'Chocolade slagroomtaart','Taarten',00000044.95,233,'Met deze chocoladetaart word je de held van ieder feestje!',520,'catalogus/Taarten/Taart3_chocolade.jpg',00000003.50,'2 voor de prijs van 1','2015-01-20 12:03:01',0),(4,'Drie soorten chocoladetaart','Taarten',00000039.95,121,'Kan je niet kiezen tussen wit, melk en puur? Deze taart is de enige uitweg!',340,'catalogus/Taarten/Taart4_3soortenChocalade.jpg',00000010.00,'Zonder kleurstoffen','2015-01-20 12:03:02',0),(5,'Aardbeienkwarktaart','Taarten',00000045.00,0,'Deze klassieke zomertaart is geschikt voor jong en oud!',470,'catalogus/Taarten/Taart5_aardbei.jpg',00000000.00,'','2015-01-20 12:03:04',0),(6,'Kaneeltaart','Taarten',00000012.00,0,'Bent u ook zo\'n fan van Geert Mak? Dit is zijn lievelingstaart!',380,'catalogus/Taarten/Taart6_kaneel.jpg',00000000.00,'','2015-01-20 12:03:05',0),(7,'worteltaart','Taarten',00000047.95,167,'Het geheim van dit oeroude Australische recept is de combinatie van wortel, chocolade en mascarpone.',460,'catalogus/Taarten/Taart7_worteltaart.jpg',00000000.00,'','2015-01-20 12:03:06',0),(8,'Bosvruchtentaart','Taarten',00000047.95,233,'Frambozen, aardbeien, bosbessen, noem het maar op. Het zit er allemaal in!',430,'catalogus/Taarten/Taart8_bosvruchten.jpg',00000000.00,'','2015-01-20 12:03:07',0),(9,'Appeltaart','Taarten',00000038.95,310,'Met deze taart is het allemaal begonnen. Het is barry\'s eerste meesterwerk!',360,'catalogus/Taarten/Taart9_appeltaart.jpg',00000020.50,'Meerdere toppings','2015-01-20 12:03:09',0),(10,'Notentaart','Taarten',00000055.95,107,'Hazelnoot, walnoot, maaedamia, pistache. Are you NUTS? Het zit er allemaal in!',381,'catalogus/Taarten/Taart10_notentaart.jpg',00000000.00,'Gratis verzending!','2015-01-20 12:03:10',0),(11,'Geert Mak koekjes','Koekjes',00000079.95,131,'Koekjes MAKen de man! Koop daarom snel deze limited edition Mak-koekjes',35,'catalogus/Koeken/Koekjes1_makkoekjes',00000000.00,'24 stuks','2015-01-20 12:03:11',0),(12,'Speculaas','Koekjes',00000029.95,33,'Koop deze snel, voordat Barry ze allemaal zelf opeet!',67,'catalogus/Koeken/Koekjes2_speculaas.jpg',00000000.00,'67 stuks!','2015-01-20 12:03:12',0),(13,'Gevulde Koeken','Koekjes',00000042.95,77,'Een picknick is niet compleet zonder deze \'classics\'!',58,'catalogus/Koeken/Koekjes3_gevuld.jpg',00000000.00,'8 stuks','2015-01-20 12:03:13',0),(14,'Boterkoek','Koekjes',00000012.95,31,'Boterkoek met biologische boter van Barry\'s boerderij!',35,'catalogus/Koeken/Koekjes4_boterkoek.jpg',00000000.00,'24 stuks','2015-01-20 12:03:14',0),(15,'Kerstkoekjes','Koekjes',00000012.95,67,'Wat is er kerstiger dan kerstkoekjes? Barry\'s kerstkoekjes!',35,'catalogus/Koeken/Koekjes5_kerst.jpg',00000000.00,'24 stuks','2015-01-20 12:03:15',0),(16,'Chocolate Chip Cookies','Koekjes',00000056.95,435,'Ben je op dieet? Deze koekjes bevatten precies het aantal calorieën dat je nodig hebt!',79,'catalogus/Koeken/Koekjes6_chocchip.jpg',00000000.00,'32 stuks','2015-01-20 12:03:16',0),(17,'Fruitkoekjes','Koekjes',00000059.95,405,'Fris en Fruitig! Deze koekjes hebben een van deze eigenschappen. Kom er zelf achter welke!',78,'catalogus/Koeken/Koekjes7_fruitkoekjes.jpg',00000000.00,'30 stuks','2015-01-20 12:03:17',0),(18,'Notenkoekjes','Koekjes',00000040.95,87,'Wees de redder in NOOT en koop deze lekkernijen voor al je vrienden!',124,'catalogus/Koeken/Koekjes8_notenkoek.jpg',00000000.00,'30 stuks','2015-01-20 12:03:18',0),(19,'Bitterkoekjes','Koekjes',00000041.95,0,'Het is bitter. Het is lekker.',124,'catalogus/Koeken/Koekjes9_bitterkoekjes.jpg',00000000.00,'42 stuks','2015-01-20 12:03:19',0),(20,'Chocokoekjes','Koekjes',00000037.95,1,'Deze klassiekers zijn het lekkerst om 16:23.',99,'catalogus/Koeken/Koekjes10_chockoekjes.jpg',00000000.00,'28 stuks','2015-01-20 12:03:20',0),(21,'Framboos Cupcake','Cupcakes',00000019.95,67,'Framboos cupcakes met verse frambozen uit Barry\'s frambozenstruiken naast Barry\'s boerderij.Framboos cupcakes met verse frambozen uit Barry\'s frambozenstruiken naast Barry\'s boerderij.',108,'catalogus/Cupcakes/Cupcakes1_framboos.jpg',00000000.00,'9 stuks','2015-01-20 12:03:21',0),(22,'Aardbeien Cupcake','Cupcakes',00000032.95,120,'Voor de aardbeien betaal je nu nog maar 23.95 per cupcake extra!',108,'catalogus/Cupcakes/Cupcakes2_aardbei.jpg',00000000.00,'9 stuks','2015-01-20 12:03:22',0),(23,'Geert Mak Cupcake ','Cupcakes',00000089.95,219,'Voor deze lekkernijen bestaat geen MAKsimum!',97,'catalogus/Cupcakes/Cupcakes3_GeertMak.jpg',00000000.00,'9 stuks','2015-01-20 12:03:23',0),(24,'Hamburger Cupcake','Cupcakes',00000012.95,0,'Heb je zin in een hamburger, maar is de McDonalds te ver weg? Koop deze cupcakes maar!',97,'catalogus/Cupcakes/Cupcakes4_burger.jpg',00000000.00,'9 stuks','2015-01-20 12:03:24',0),(25,'Muis Cupcake','Cupcakes',00000028.95,82,'Als deze cupcakes niet bevallen, u er geen kaas van gegeten! ',97,'catalogus/Cupcakes/Cupcakes5_muis.jpg',00000000.00,'9 stuks','2012-01-20 12:03:45',0),(26,'Chocolate Cupcake','Cupcakes',00000037.95,0,'Dit cupcakeje won ooit een tweede prijs voor beste Barry\'s Bakery chocolate cupcake van de maand!',118,'catalogus/Cupcakes/Cupcakes6_choc.jpg',00000000.00,'9 stuks','2015-01-20 12:04:00',0),(27,'Noten Cupcakes','Cupcakes',00000044.95,0,'Barry\'s favoriet!',120,'catalogus/Cupcakes/Cupcakes7_noot.jpg',00000000.00,'9 stuks','2015-01-20 12:03:27',0),(28,'Spikkel Cupcake','Cupcakes',00000012.95,21,'Barry wilde deze cupcakes eigenlijk niet meer verkopen, maar ze zijn zo populair dat ze toch nog verkocht worden.',120,'catalogus/Cupcakes/Cupcakes8_spikkels.jpg',00000000.00,'9 stuks','2015-01-20 12:03:28',0),(29,'Cookie Monster Cupcake','Cupcakes',00000034.95,191,'Als je hier niet vrolijk van wordt, kan je beter naar huis gaan.',120,'catalogus/Cupcakes/Cupcakes9_monster.jpg',00000000.00,'9 stuks','2015-01-20 12:03:29',0),(30,'Winter Cupcake','Cupcakes',00000038.95,341,'Aangenaam, aanlokkelijk, aanminnig, aanvallig, appetijtelijk en attractief!',103,'catalogus/Cupcakes/Cupcakes10_winter.jpg',00000000.00,'9 stuks','2015-01-20 12:03:39',0),(88,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',11),(98,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',21),(99,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',22),(101,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',23),(102,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',24),(103,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',25),(104,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',26),(105,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',27),(106,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',28),(107,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',29),(108,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',30),(109,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',31),(110,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',32),(111,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',33),(113,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',34),(114,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',35),(115,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',36),(116,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',37),(117,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',38),(118,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',39),(119,'Custom taart','Aangepast',00000059.99,1,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',40),(121,'Custom taart','Aangepast',00000059.99,0,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',41),(122,'Custom taart','Aangepast',00000059.99,0,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',42),(123,'Custom taart','Aangepast',00000059.99,0,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',43),(124,'Custom taart','Aangepast',00000059.99,0,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',44),(125,'Custom taart','Aangepast',00000059.99,0,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',45),(126,'Custom taart','Aangepast',00000059.99,0,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',46),(127,'Custom taart','Aangepast',00000059.99,0,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',47),(128,'Custom taart','Aangepast',00000059.99,0,NULL,0,'images/AMERICA.jpg',00000000.00,'','0000-00-00 00:00:00',48);
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Bestelling_Doorverwijzing`
--

DROP TABLE IF EXISTS `Product_Bestelling_Doorverwijzing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Bestelling_Doorverwijzing` (
  `Product_ID` int(11) unsigned NOT NULL,
  `Bestelling_ID` int(11) unsigned NOT NULL,
  `Aantal` int(11) unsigned NOT NULL DEFAULT '1',
  KEY `Product_ID` (`Product_ID`),
  KEY `Bestelling_ID` (`Bestelling_ID`),
  KEY `Aantal` (`Aantal`),
  CONSTRAINT `Product_Bestelling_Doorverwijzing_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `Product` (`Product_ID`),
  CONSTRAINT `Product_Bestelling_Doorverwijzing_ibfk_2` FOREIGN KEY (`Bestelling_ID`) REFERENCES `Bestelling` (`Bestelling_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Bestelling_Doorverwijzing`
--

LOCK TABLES `Product_Bestelling_Doorverwijzing` WRITE;
/*!40000 ALTER TABLE `Product_Bestelling_Doorverwijzing` DISABLE KEYS */;
INSERT INTO `Product_Bestelling_Doorverwijzing` VALUES (22,247,1),(3,248,1),(16,248,1),(20,250,1),(20,251,1),(22,252,1),(5,253,1),(13,255,1),(19,258,1),(19,259,1),(19,260,1),(24,261,1),(9,262,1),(25,263,1),(21,264,1),(20,265,1),(9,266,1),(3,268,1),(17,269,1),(15,270,1),(15,271,1),(15,272,1),(15,273,1),(9,274,1),(4,275,1),(5,276,1),(7,278,1),(7,279,1),(7,280,1),(6,281,2),(18,281,1),(13,282,1),(24,284,1),(16,285,1),(8,287,1),(16,288,1),(13,289,1),(16,290,1),(5,291,1),(9,292,1),(5,292,1),(5,293,1),(14,293,1),(9,294,2),(29,295,1),(9,296,1),(3,297,1),(29,298,1),(19,299,1),(22,300,1),(19,301,1),(26,301,1),(19,302,1),(29,302,1),(16,303,1),(2,303,1),(29,304,1),(24,304,1),(4,305,3),(29,305,1),(9,306,3),(29,306,1),(5,307,1),(5,308,1),(3,309,1),(14,310,14),(5,311,1),(22,312,1),(14,313,10),(5,314,1),(20,315,6),(9,316,1),(5,317,6),(14,318,15),(19,318,568),(22,318,1),(19,319,12),(29,320,6),(5,320,8),(14,321,12),(20,321,26),(19,321,1),(20,322,1),(9,322,1),(12,323,21),(23,324,1),(4,324,2),(29,325,5),(26,325,1),(22,325,1),(1,326,5),(29,327,1),(23,328,1100),(23,329,1),(13,329,1),(1,330,10),(23,330,1),(11,330,1),(9,331,10),(1,332,1),(23,332,1),(11,332,1),(1,333,21),(29,334,1),(9,335,1),(5,336,1),(29,337,6),(29,338,1),(19,339,1),(26,341,322),(5,341,4294967295),(17,342,30),(2,343,3),(23,344,2),(30,344,1),(29,345,1),(5,347,100),(20,348,1),(1,349,100),(8,350,1),(1,351,2),(1,352,4),(9,352,1),(6,353,1),(5,354,26),(19,354,6),(19,355,34),(22,356,27),(26,357,50),(27,358,25),(26,359,28),(22,360,1);
/*!40000 ALTER TABLE `Product_Bestelling_Doorverwijzing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_Factuur_Doorverwijzing`
--

DROP TABLE IF EXISTS `Product_Factuur_Doorverwijzing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Product_Factuur_Doorverwijzing` (
  `Factuur_Product_ID` int(11) unsigned NOT NULL,
  `Factuur_ID` int(11) unsigned NOT NULL,
  `Aantal` int(11) unsigned NOT NULL DEFAULT '1',
  KEY `Factuur_ID` (`Factuur_ID`),
  KEY `Factuur_Product_ID` (`Factuur_Product_ID`),
  KEY `Aantal` (`Aantal`),
  CONSTRAINT `Product_Factuur_Doorverwijzing_ibfk_3` FOREIGN KEY (`Factuur_Product_ID`) REFERENCES `Factuur_Product` (`Factuur_Product_ID`),
  CONSTRAINT `Product_Factuur_Doorverwijzing_ibfk_2` FOREIGN KEY (`Factuur_ID`) REFERENCES `Factuur` (`Factuur_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_Factuur_Doorverwijzing`
--

LOCK TABLES `Product_Factuur_Doorverwijzing` WRITE;
/*!40000 ALTER TABLE `Product_Factuur_Doorverwijzing` DISABLE KEYS */;
INSERT INTO `Product_Factuur_Doorverwijzing` VALUES (23,52,1),(24,53,1),(25,54,1),(26,55,1),(27,56,1),(28,57,1),(30,58,1),(31,58,1),(32,59,1),(33,59,1),(34,60,3),(35,60,1),(36,61,3),(37,61,1),(38,62,1),(39,63,1),(40,64,1),(41,65,14),(42,66,1),(43,67,1),(44,68,10),(45,69,1),(46,70,6),(47,71,1),(48,72,6),(49,73,15),(50,73,568),(51,73,1),(52,74,12),(53,75,6),(54,75,8),(55,76,12),(56,76,26),(57,76,1),(58,77,1),(59,77,1),(60,78,21),(61,79,1),(62,79,2),(63,80,5),(64,80,1),(65,80,1),(66,81,5),(67,82,1),(68,83,1100),(69,84,1),(70,84,1),(71,85,10),(72,85,1),(73,85,1),(74,86,10),(75,87,1),(76,87,1),(77,87,1),(78,88,21),(79,89,1),(80,90,1),(81,91,1),(82,92,6),(83,93,1),(84,94,1),(85,95,2),(86,96,322),(87,96,4294967295),(88,97,30),(89,98,3),(90,99,2),(91,99,1),(92,100,1),(93,101,1),(94,102,100),(95,103,1),(96,104,100),(97,105,1),(98,106,2),(99,107,4),(100,107,1),(101,108,1),(102,109,26),(103,109,6),(104,110,34),(105,111,27),(106,112,50),(107,113,25),(108,114,28),(109,115,1);
/*!40000 ALTER TABLE `Product_Factuur_Doorverwijzing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recensies`
--

DROP TABLE IF EXISTS `Recensies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Recensies` (
  `Recensie_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Product_ID` int(10) unsigned NOT NULL,
  `Klant_ID` int(10) unsigned NOT NULL,
  `Naam` varchar(404) NOT NULL,
  `Recensie` text NOT NULL,
  `Recensie_Datum` date NOT NULL,
  `Aantal_Sterren` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '0-5',
  PRIMARY KEY (`Recensie_ID`),
  KEY `Product_ID` (`Product_ID`,`Klant_ID`,`Recensie_Datum`),
  KEY `Naam` (`Naam`(255)),
  KEY `Klant_ID` (`Klant_ID`),
  CONSTRAINT `Recensies_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `Product` (`Product_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recensies`
--

LOCK TABLES `Recensies` WRITE;
/*!40000 ALTER TABLE `Recensies` DISABLE KEYS */;
INSERT INTO `Recensies` VALUES (1,1,4,'DaBarryBoy','Als een fervent Geert Mak fan, kocht ik deze taart op mijn 23ste verjaardag. Die ochtend kwam de taart aan met de post, wat een belediging was voor Geert Mak, want duidelijk had hij in een speciale Geert Mak container gemoeten. In ieder geval, vervolgens begon mijn verjaardag, en toen we de taart aan gingen snijden, bleek Geert Mak zelf ook in de taart te zitten, naar mijn grote verbazing. Op dit moment begon Hij met een lezing over de nieuwe literatuurstijl van de 21ste eeuw, waar hij ons ongesproken mythen vertelde. Hij sprak woorden zo helder als bronwater, als de diamanten van de Medicis. Hij sprak woorden tegen ons, mooier dan de muziek der hemelen, maar angstaanjagender dan de dood zelf. Nooit heb ik zo goed Zijn aard begrepen, de hopeloze verdoemenis van een ziel die woorden spreekt die de grootste genieën en de ergste idioten doen fascineren. Hij vertelde ons over de Koning en het bleke masker, en over Hastur en Cassilda. Nu ben ik stervende, maar Hij heeft mij machtiger dan een koning gemaakt, voor ik begrijp het mysterie van de Hyades, en mijn geest heeft de dieptes van Hali doorbroken! Nu zal ik in de dieptes zinken, voor het is te laat voor mij, ik ben in de handen van een levende God gekomen, en ben gevallen.','2015-01-19',6),(2,29,45,'Koekiemonster','NOmnOmnOm','2015-01-24',5),(3,29,47,'Geert Mak','Op mijn MAKbook bestelde ik deze cupcakes. Ze werden netjes bezorg door Mak Airlines (een Kazachstaanse luchtvaartmaatschappij), helaas wel een dag te laat. Ik vond ze lekker.','2015-01-26',4),(4,29,47,'Henk','ik vond ze ondergemiddeld.','2015-01-26',3),(6,29,47,'Caitlin','Ze zien er lekker uit, maar ik vind ze te duur :(','2015-01-26',5),(10,9,42,'bliep','Toppie!','2015-01-28',5),(12,22,45,'Aardbei-fan','Hmmmmm lekker','2015-01-29',4),(15,19,46,'Casper','Ik vond ze te bitter','2015-01-29',3),(18,25,45,'Mickey Mouse','Ik houd niet van kaas ','2015-01-29',1),(19,2,45,'Kersen','De naam staat me niet aan','2015-01-29',2),(20,29,54,'Smaakvolle biscuits','COOOOOOOOOKIEEEEEEEEEES!!!!!','2015-01-30',4),(21,29,54,'SWAGGERPANTALONES','SWAGGERPANTALONES','2015-01-30',5),(22,11,46,'Danyllo','Beter dan Obama koekjes. 8/8 no h8 m8.','2015-01-30',0),(23,1,46,'geertmaklover505','zo lekker, taarten in europa! reizen zonder taarten! ','2015-01-30',5),(24,24,46,'asdf','Ze zijn kut.','2015-01-30',3),(25,29,53,'koek','lekker man\r\n','2015-01-30',3),(26,12,53,'Sinterklaas','Zeer nuttig rond de feestdagen','2015-01-30',5),(27,12,46,'Rijnder','Ik hou niet zo van speculaas','2015-01-30',1),(28,19,46,'Matsoe Matsoe','Ik vond ze te kut','2015-01-30',5),(29,26,54,'piet','gemiddeld','2015-01-31',4);
/*!40000 ALTER TABLE `Recensies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customingredienten`
--

DROP TABLE IF EXISTS `customingredienten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customingredienten` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `bodem` varchar(590) NOT NULL,
  `vulling` varchar(590) NOT NULL,
  `glazuur` varchar(590) NOT NULL,
  `topping1` int(255) NOT NULL,
  `topping2` int(255) NOT NULL,
  `topping3` int(255) NOT NULL,
  `topping4` int(255) NOT NULL,
  `topping5` int(255) NOT NULL,
  `topping6` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customingredienten`
--

LOCK TABLES `customingredienten` WRITE;
/*!40000 ALTER TABLE `customingredienten` DISABLE KEYS */;
INSERT INTO `customingredienten` VALUES (11,'Klei','Test','',0,0,0,0,0,0),(12,'Rogge','Aardappelen','Tandpasta',1,1,1,0,0,0),(13,'Klei','Aardappelen','Tandpasta',0,0,0,0,0,0),(14,'Klei','Aardappelen','Tandpasta',1,0,0,0,0,0),(15,'Klei','Aardappelen','Tandpasta',1,1,0,0,0,0),(16,'Rogge','Aardappelen','',0,0,0,0,0,0),(17,'Klei','Aardappelen','',0,0,0,0,0,0),(18,'Klei','Geert Mak','',0,0,0,0,0,0),(19,'Klei','Geert Mak','Tandpasta',0,0,0,0,0,0),(20,'Klei','Geert Mak','Tandpasta',1,0,0,0,0,0),(21,'Rogge','Geert Mak','',0,0,0,0,0,0),(22,'Rogge','Geert Mak','Tandpasta',0,0,0,0,0,0),(23,'Klei','Aardappelen','Tandpasta',0,0,1,0,0,0),(24,'Klei','Chocola','',0,0,0,0,0,0),(25,'Klei','Chocola','Chocola',0,0,0,0,0,0),(26,'Klei','Chocola','Chocola',0,1,0,0,0,0),(27,'Standaard','Chocola','',0,0,1,0,0,0),(28,'Standaard','Chocola','Chocola',0,0,1,0,0,0),(29,'Standaard','Chocola','Chocola',0,1,1,0,0,0),(30,'Standaard','Chocola','Chocola',1,1,1,0,0,0),(31,'Standaard','Geert Mak','Chocola',1,1,1,0,0,0),(32,'Standaard','Geert Mak','Tandpasta',1,1,1,0,0,0),(33,'Rogge','Geert Mak','Tandpasta',1,1,1,0,0,0),(34,'Standaard','Aardappelen','',1,0,0,0,0,0),(35,'Standaard','Aardappelen','Chocola',1,0,0,0,0,0),(36,'Standaard','Aardappelen','Tandpasta',1,0,0,0,0,0),(37,'Klei','Geert Mak','Chocola',0,0,0,0,0,0),(38,'Klei','Geert Mak','Chocola',0,1,0,0,0,0),(39,'Klei','Aardappelen','Tandpasta',0,1,1,0,0,0),(40,'Klei','Geert Mak','',0,0,1,0,0,0),(41,'Klei','Geert Mak','Tandpasta',1,0,1,0,0,0),(42,'Klei','Geert Mak','Tandpasta',1,1,1,0,0,0),(43,'Klei','Geert Mak','Tandpasta',1,1,0,0,0,0),(44,'Standaard','Aardappelen','Chocola',0,0,0,0,0,0),(45,'Standaard','Aardappelen','Chocola',0,0,1,0,0,0),(46,'Standaard','Aardappelen','Chocola',1,0,1,0,0,0),(47,'Klei','Chocola','Tandpasta',0,0,1,0,0,0),(48,'Klei','Aardappelen','Tandpasta',0,1,0,0,0,0);
/*!40000 ALTER TABLE `customingredienten` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-02  4:20:22
