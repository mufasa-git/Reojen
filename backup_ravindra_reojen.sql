-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: ravindra_reojen
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `app_payment_transactions`
--

DROP TABLE IF EXISTS `app_payment_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_payment_transactions` (
  `id` double NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_id` text NOT NULL,
  `payer_id` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `payment_method` text NOT NULL,
  `currency` varchar(300) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completed_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_payment_transactions`
--

LOCK TABLES `app_payment_transactions` WRITE;
/*!40000 ALTER TABLE `app_payment_transactions` DISABLE KEYS */;
INSERT INTO `app_payment_transactions` VALUES (2,78,'PAY-14V12583132366823LIEMA3Q','','created',100,'paypal','USD','2017-11-12 21:43:11','0000-00-00 00:00:00'),(3,78,'PAY-4EX32008J5134830ELIEMZJA','','created',100,'paypal','USD','2017-11-12 22:35:16','0000-00-00 00:00:00'),(4,78,'PAY-7B902772CP391771NLIENDEY','','approved',100,'paypal','USD','2017-11-12 22:56:19','2017-11-13 11:26:43'),(5,11,'PAY-3PN43818ST738742TLIEV3BY','','approved',5,'paypal','USD','2017-11-13 08:53:27','2017-11-13 21:26:12'),(6,79,'PAY-2TD42435468643145LIEWOQI','','created',50,'paypal','USD','2017-11-13 09:34:57','0000-00-00 00:00:00'),(7,12,'PAY-00D56047H8963592HLIEWRMA','','created',500,'paypal','USD','2017-11-13 09:41:04','0000-00-00 00:00:00'),(9,78,'PAY-9XY16098EK6568720LIFM2SQ','','created',200,'paypal','USD','2017-11-14 11:02:34','0000-00-00 00:00:00'),(11,78,'PAY-0E1960408D146433GLIFNF6I','','approved',200,'paypal','USD','2017-11-14 11:26:50','2017-11-14 23:57:56'),(14,80,'PAY-1XY57730TX083801NLIFN3EA','','created',50,'paypal','USD','2017-11-14 12:12:00','0000-00-00 00:00:00'),(16,78,'PAY-1TP04003F4551972HLIFOAWY','','created',200,'paypal','USD','2017-11-14 12:23:55','0000-00-00 00:00:00'),(17,78,'PAY-2L797525Y4456192MLIFOAYQ','','created',200,'paypal','USD','2017-11-14 12:24:03','0000-00-00 00:00:00'),(18,78,'PAY-7P685442RC7575725LIFOAZQ','','created',200,'paypal','USD','2017-11-14 12:24:06','0000-00-00 00:00:00'),(19,78,'PAY-42W95841JH2323931LIFOA3Q','','created',200,'paypal','USD','2017-11-14 12:24:14','0000-00-00 00:00:00'),(20,81,'PAY-8WF71918XG847744ALIFOA7Q','','created',700,'paypal','USD','2017-11-14 12:24:30','0000-00-00 00:00:00'),(21,81,'PAY-3SU528819R7681237LIFOBMA','','approved',800,'paypal','USD','2017-11-14 12:25:20','2017-11-15 01:01:25'),(22,78,'PAY-35451301EP285792JLIFOEOQ','','created',500,'paypal','USD','2017-11-14 12:31:55','0000-00-00 00:00:00'),(23,81,'PAY-3DH94772SC473643BLIFOFHY','','created',1000000,'paypal','USD','2017-11-14 12:33:36','0000-00-00 00:00:00'),(24,81,'PAY-78Y87987VP7708310LIFOJHY','','approved',2000,'paypal','USD','2017-11-14 12:42:07','2017-11-15 01:15:54'),(25,78,'PAY-5RU151598F281663CLIFON4I','','created',200,'paypal','USD','2017-11-14 12:52:01','0000-00-00 00:00:00'),(26,78,'PAY-2WJ22143807854822LIFOOMQ','','created',200,'paypal','USD','2017-11-14 12:53:06','0000-00-00 00:00:00'),(27,78,'PAY-91A14378DA999725TLIFOQQA','','created',200,'paypal','USD','2017-11-14 12:57:36','0000-00-00 00:00:00'),(28,78,'PAY-8FK28392BA272464FLIFOUUI','','created',200,'paypal','USD','2017-11-14 13:06:25','0000-00-00 00:00:00'),(29,78,'PAY-94449245FC547402TLIFOVSI','','created',200,'paypal','USD','2017-11-14 13:08:25','0000-00-00 00:00:00'),(30,78,'PAY-3C384548WV4300618LIFOXPY','','created',200,'paypal','USD','2017-11-14 13:12:31','0000-00-00 00:00:00'),(31,78,'PAY-7BN17963VT759220CLIFOZWA','','created',500,'paypal','USD','2017-11-14 13:17:12','0000-00-00 00:00:00'),(32,78,'PAY-6EW35105YG7017430LIFO2FQ','','created',333,'paypal','USD','2017-11-14 13:18:14','0000-00-00 00:00:00'),(33,81,'PAY-4GV81604C05425332LIFPAHQ','','created',5000,'paypal','USD','2017-11-14 13:31:11','0000-00-00 00:00:00'),(34,78,'PAY-31T856742K974280MLIFPCLI','','approved',500,'paypal','USD','2017-11-14 13:35:42','0000-00-00 00:00:00'),(35,81,'PAY-71K34239SA961222LLIFPEUQ','','created',456,'paypal','USD','2017-11-14 13:40:34','0000-00-00 00:00:00'),(36,78,'PAY-7U961497P8820701RLIFVAGA','','created',9999999,'paypal','USD','2017-11-14 20:20:41','0000-00-00 00:00:00'),(37,78,'PAY-89H48919SE9265045LIFVBTI','','approved',120,'paypal','USD','2017-11-14 20:23:41','2017-11-15 08:54:42'),(38,82,'PAY-1YM82787L9246034HLJMZ2IY','','created',0.01,'paypal','USD','2018-01-13 05:46:12','0000-00-00 00:00:00'),(39,82,'PAY-0TK66051DV119152YLJMZ3IY','','created',0.01,'paypal','USD','2018-01-13 05:48:19','0000-00-00 00:00:00'),(40,83,'PAY-06M56108Y1521323ULJM3AZY','','created',0.01,'paypal','USD','2018-01-13 07:08:23','0000-00-00 00:00:00'),(41,12,'PAY-7S3692150E5014923LJM3CLA','','created',100,'paypal','USD','2018-01-13 07:11:40','0000-00-00 00:00:00'),(42,12,'PAY-6F2019377V3052056LJM5VPQ','','created',100,'paypal','USD','2018-01-13 10:09:02','0000-00-00 00:00:00'),(43,83,'PAY-3M707536562559540LJOIC5Q','','created',10,'paypal','USD','2018-01-15 10:24:55','0000-00-00 00:00:00'),(44,83,'PAY-3NA8043399426872JLJOIDLA','','created',10,'paypal','USD','2018-01-15 10:25:48','0000-00-00 00:00:00'),(45,83,'PAY-0EC60872Y5906504HLJOIJSI','','created',0.01,'paypal','USD','2018-01-15 10:39:05','0000-00-00 00:00:00'),(46,83,'PAY-2YK17362A2347010BLJOI7HY','','created',0.02,'paypal','USD','2018-01-15 11:25:19','0000-00-00 00:00:00'),(47,83,'PAY-6DS40918EF505640ELJOJCHQ','','created',0.02,'paypal','USD','2018-01-15 11:31:42','0000-00-00 00:00:00'),(48,83,'PAY-58U392810B670191JLJOJE2I','','created',0.01,'paypal','USD','2018-01-15 11:37:13','0000-00-00 00:00:00'),(49,12,'PAY-35N80744NH3769428LJOJRTI','','created',50,'paypal','USD','2018-01-15 12:04:29','0000-00-00 00:00:00'),(50,12,'PAY-2JB7099783338361HLJONWCA','','created',100,'paypal','USD','2018-01-15 16:47:04','0000-00-00 00:00:00'),(51,12,'PAY-3RM28654AS2586811LJONXHY','','created',0.01,'paypal','USD','2018-01-15 16:49:35','0000-00-00 00:00:00'),(52,12,'PAY-4DC065651T867453CLJONXVA','','created',0.01,'paypal','USD','2018-01-15 16:50:28','0000-00-00 00:00:00'),(53,12,'PAY-0D506995CF8587813LJONYWY','','created',0.01,'paypal','USD','2018-01-15 16:52:43','0000-00-00 00:00:00'),(54,83,'PAY-49896302G3268704NLJO34UY','','created',0.01,'paypal','USD','2018-01-16 08:56:51','0000-00-00 00:00:00'),(55,83,'PAY-7PP631296S912400JLJO36QQ','','created',0.01,'paypal','USD','2018-01-16 09:00:50','0000-00-00 00:00:00'),(56,83,'PAY-6VM190128X3558114LJO4AKY','','created',0.01,'paypal','USD','2018-01-16 09:04:44','0000-00-00 00:00:00'),(57,83,'PAY-93018220KW620790DLJO4BOQ','','created',0.01,'paypal','USD','2018-01-16 09:07:06','0000-00-00 00:00:00'),(58,83,'PAY-0X93985313274182LLJO4CDA','','created',0.01,'paypal','USD','2018-01-16 09:08:28','0000-00-00 00:00:00'),(59,83,'PAY-1H0615219C383152XLJO4GDQ','','created',0.01,'paypal','USD','2018-01-16 09:17:02','0000-00-00 00:00:00'),(60,83,'PAY-84G82787VG6735310LJO4IMQ','','created',0.01,'paypal','USD','2018-01-16 09:21:54','2018-01-16 06:59:52'),(63,83,'PAY-0UX46000K0143152WLJO4UNQ','','created',0.01,'paypal','USD','2018-01-16 09:47:34','0000-00-00 00:00:00'),(64,82,'PAY-74B50323SJ061692PLJO5HGI','','created',0.01,'paypal','USD','2018-01-16 10:27:37','0000-00-00 00:00:00'),(65,82,'PAY-6FK88148FA481280NLJO5HWI','','created',0.01,'paypal','USD','2018-01-16 10:28:42','0000-00-00 00:00:00'),(66,83,'PAY-60G46080MY247590XLJO5JQY','','created',10,'paypal','USD','2018-01-16 10:32:35','0000-00-00 00:00:00'),(67,83,'PAY-1B649168G35641614LJO5OCI','','created',12,'paypal','USD','2018-01-16 10:42:17','0000-00-00 00:00:00'),(68,1,'PAY-2G756618DC4271408LJO5XAY','','created',50,'paypal','USD','2018-01-16 11:01:24','0000-00-00 00:00:00'),(70,1,'PAY-7GJ47232020437304LJO53KI','','created',2,'paypal','USD','2018-01-16 11:10:33','0000-00-00 00:00:00'),(71,3,'PAY-1DW9846924218335TLJO553Y','','created',2,'paypal','USD','2018-01-16 11:15:59','0000-00-00 00:00:00'),(72,83,'PAY-125306413Y764952KLJO6CDA','','created',200,'paypal','USD','2018-01-16 11:25:00','2018-01-16 08:55:58'),(73,83,'PAY-0GW31744N56036632LJO6DTI','','created',0.01,'paypal','USD','2018-01-16 11:28:13','0000-00-00 00:00:00'),(74,83,'PAY-7U5834997M608903ALJO6ONA','','created',50,'paypal','USD','2018-01-16 11:51:16','0000-00-00 00:00:00'),(75,1,'PAY-8CU59703RD261242HLJO6PAI','','created',2,'paypal','USD','2018-01-16 11:52:33','0000-00-00 00:00:00'),(76,82,'PAY-03K451278U728574ELJO6VYY','','created',0.01,'paypal','USD','2018-01-16 12:06:59','0000-00-00 00:00:00'),(77,83,'PAY-05L817132U318253ULJO6W3Q','','created',100,'paypal','USD','2018-01-16 12:09:18','0000-00-00 00:00:00'),(78,84,'PAY-3F067976J1875711ELJSMYQA','','created',25,'paypal','USD','2018-01-21 17:22:08','0000-00-00 00:00:00'),(79,84,'PAY-4CV1239315753053NLJSM2DA','','created',25,'paypal','USD','2018-01-21 17:25:32','0000-00-00 00:00:00'),(80,87,'PAY-18940608670917925LJS2JAA','','created',0.01,'paypal','USD','2018-01-22 08:44:48','0000-00-00 00:00:00'),(81,84,'PAY-9SV69955T7397171ULJS22PA','','created',100,'paypal','USD','2018-01-22 09:22:05','0000-00-00 00:00:00'),(82,12,'PAY-8LB64781M1186200JLJS3XOQ','','created',65,'paypal','USD','2018-01-22 10:23:54','0000-00-00 00:00:00'),(83,12,'PAY-4W443932EX3192601LJS34FY','','created',65,'paypal','USD','2018-01-22 10:33:59','0000-00-00 00:00:00'),(84,12,'PAY-96S66366X9022481PLJS37UQ','','created',300,'paypal','USD','2018-01-22 10:41:23','0000-00-00 00:00:00'),(85,12,'PAY-70288871T0501702ELJS4BHI','','created',877,'paypal','USD','2018-01-22 10:44:45','0000-00-00 00:00:00'),(86,12,'PAY-0FB71370XD765991WLJS4B2Y','','created',437,'paypal','USD','2018-01-22 10:46:04','0000-00-00 00:00:00'),(87,83,'PAY-87T69336LW6388325LJS4S7Q','','created',0.01,'paypal','USD','2018-01-22 11:22:38','0000-00-00 00:00:00'),(88,83,'PAY-30466321WT311973YLJS4T7I','','created',0.01,'paypal','USD','2018-01-22 11:24:46','0000-00-00 00:00:00'),(89,83,'PAY-94F63738YP098832NLJS5JIY','','created',0.01,'paypal','USD','2018-01-22 12:10:11','0000-00-00 00:00:00'),(90,82,'PAY-50W43652JF6292742LJS6DMA','','created',0.01,'paypal','USD','2018-01-22 13:05:52','0000-00-00 00:00:00'),(91,83,'PAY-5X792275UY106160WLJS6HBY','','created',645,'paypal','USD','2018-01-22 13:13:43','0000-00-00 00:00:00'),(92,84,'PAY-034779559D058871VLJUM2IQ','','created',115,'paypal','USD','2018-01-24 18:14:59','0000-00-00 00:00:00'),(93,84,'PAY-9TN337259X6961348LJUM55I','','created',110,'paypal','USD','2018-01-24 18:22:45','0000-00-00 00:00:00'),(94,84,'PAY-8VF90925LM528804RLJUOK5Y','','created',110,'paypal','USD','2018-01-24 19:58:47','0000-00-00 00:00:00'),(95,88,'PAY-4KF58959P8156880MLJU2YTQ','','created',100,'paypal','USD','2018-01-25 10:07:10','0000-00-00 00:00:00'),(96,88,'PAY-9N2439397U402750YLJU22JI','','created',100,'paypal','USD','2018-01-25 10:10:45','0000-00-00 00:00:00'),(97,88,'PAY-56X78158H0314890XLJU26XA','','created',0.17,'paypal','USD','2018-01-25 10:20:12','0000-00-00 00:00:00'),(98,88,'PAY-93H24815WM9707205LJU3CFQ','','created',0.05,'paypal','USD','2018-01-25 10:27:34','0000-00-00 00:00:00'),(99,88,'PAY-8CS488274T6600519LJU3JPI','','created',100,'paypal','USD','2018-01-25 10:43:10','0000-00-00 00:00:00'),(100,88,'PAY-7AC30551TB2200254LJU3TLQ','','created',30,'paypal','USD','2018-01-25 11:04:14','0000-00-00 00:00:00'),(101,88,'PAY-4VB38995GS838124ALJU4WOY','','created',100,'paypal','USD','2018-01-25 12:19:07','0000-00-00 00:00:00'),(102,94,'PAY-35402969MR1596634LJVDCYI','','created',0.01,'paypal','USD','2018-01-25 19:34:57','0000-00-00 00:00:00'),(103,94,'PAY-00R183464P319374WLJVDL3A','','created',0.01,'paypal','USD','2018-01-25 19:54:21','0000-00-00 00:00:00'),(104,95,'PAY-3E057082J8813843HLJVNNAI','','created',0.01,'paypal','USD','2018-01-26 07:19:29','0000-00-00 00:00:00'),(105,96,'PAY-3534516366178342ALJVOBDY','','created',0.01,'paypal','USD','2018-01-26 08:02:23','0000-00-00 00:00:00'),(106,88,'PAY-20Y88710E7151831MLJVPZ7A','','approved',100,'paypal','USD','2018-01-26 10:03:40','2018-01-26 07:34:31'),(107,88,'PAY-9V9663329B715373WLJVP5KA','','created',35,'paypal','USD','2018-01-26 10:10:48','0000-00-00 00:00:00'),(108,99,'PAY-96U0531316721372JLJVRT7I','','created',0.01,'paypal','USD','2018-01-26 12:07:25','0000-00-00 00:00:00'),(109,99,'PAY-6YC80005H9586341ALJVRXTY','','approved',0.01,'paypal','USD','2018-01-26 12:15:11','2018-01-26 09:46:27'),(110,101,'PAY-6J160343HE855074GLJVST4A','','created',0.01,'paypal','USD','2018-01-26 13:15:28','0000-00-00 00:00:00'),(111,12,'PAY-99M82414PU744743GLJVSWSQ','','created',100,'paypal','USD','2018-01-26 13:21:14','0000-00-00 00:00:00'),(112,12,'PAY-33V174776C978211PLJVSXMA','','created',0.01,'paypal','USD','2018-01-26 13:22:56','0000-00-00 00:00:00'),(113,83,'PAY-81C04526HC520544RLJWAXMY','','created',10,'paypal','USD','2018-01-27 05:18:43','0000-00-00 00:00:00'),(114,83,'PAY-2UK20540US6009441LJWAYAI','','created',10,'paypal','USD','2018-01-27 05:20:01','0000-00-00 00:00:00'),(115,12,'PAY-44K10188CB3535210LJWFIRQ','','created',2,'paypal','USD','2018-01-27 10:28:23','0000-00-00 00:00:00'),(116,104,'PAY-8WN615417S088751WLJWH6UA','','created',1,'paypal','USD','2018-01-27 13:32:00','0000-00-00 00:00:00'),(117,84,'PAY-2KX19915YS376662XLJXBFBI','','approved',100,'paypal','USD','2018-01-28 18:12:21','2018-01-28 15:51:10'),(118,84,'PAY-24D29325JW967583TLJXBLZQ','','created',100,'paypal','USD','2018-01-28 18:26:46','0000-00-00 00:00:00'),(119,12,'PAY-7VR352200R9364501LJYJI7Y','','created',560,'paypal','USD','2018-01-30 15:51:27','0000-00-00 00:00:00'),(120,84,'PAY-8GM138737U167035HLJYKSNA','','created',100,'paypal','USD','2018-01-30 17:19:48','0000-00-00 00:00:00'),(121,84,'PAY-4M059048RC316553JLJYKYAQ','','approved',100,'paypal','USD','2018-01-30 17:31:46','2018-01-30 15:04:34'),(124,113,'PAY-2WJ22143807854822LIFOOMA','','approved',101,'paypal','USD','2018-02-23 00:00:00','2018-02-23 10:00:00');
/*!40000 ALTER TABLE `app_payment_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_settings`
--

DROP TABLE IF EXISTS `app_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` text NOT NULL,
  `setting_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_settings`
--

LOCK TABLES `app_settings` WRITE;
/*!40000 ALTER TABLE `app_settings` DISABLE KEYS */;
INSERT INTO `app_settings` VALUES (34,'paypal_client_id','ASW2g6qKQ6CD5fruE1Kjo-tLriyq7iyAs7JO5fNuWnzsueiGjqr-xXCtbkH9CVvD0kk9XUz0cmLRHc9Y'),(33,'smtp_security',''),(32,'smtp_password','jtr956KGvRkOtjrgK'),(31,'smtp_user','support@reojen.com'),(30,'smtp_port','25'),(29,'smtp_host','smtp.1and1.com'),(28,'mail_from_name','Reojen'),(27,'mail_from','no-reply@reojen.com'),(35,'paypal_secret_key','EPLbo9SPhkymom4mQRS1AuDYYFJx7UUd4SsMj580u8Qx-IYw455nARZn8XpsLlPJtxcgRH8QPeWZLQ6w'),(36,'support_message_status','0');
/*!40000 ALTER TABLE `app_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `support_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankdetails`
--

DROP TABLE IF EXISTS `bankdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bankdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `acname` varchar(50) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `branchadd` varchar(50) NOT NULL,
  `branchcity` varchar(50) NOT NULL,
  `swift` varchar(50) NOT NULL,
  `acno` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankdetails`
--

LOCK TABLES `bankdetails` WRITE;
/*!40000 ALTER TABLE `bankdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `bankdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countrycode`
--

DROP TABLE IF EXISTS `countrycode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countrycode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `iso3` varchar(255) NOT NULL,
  `Code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countrycode`
--

LOCK TABLES `countrycode` WRITE;
/*!40000 ALTER TABLE `countrycode` DISABLE KEYS */;
INSERT INTO `countrycode` VALUES (1,'AF','Afghanistan','Afghanistan','AFG','93'),(2,'AL','Albania','Albania','ALB','355'),(3,'DZ','Algeria','Algeria','DZA','213'),(4,'AS','American Samoa','American Samoa','ASM','1684'),(5,'AD','Andorra','Andorra','AND','376'),(6,'AO','Angola','Angola','AGO','244'),(7,'AI','Anguilla','Anguilla','AIA','1264'),(8,'AQ','Antarctica','Antarctica','ATA','672'),(9,'AG','Antigua and Barbuda','Antigua and Barbuda','ATG','1268'),(10,'AR','Argentina','Argentina','ARG','54'),(11,'AM','Armenia','Armenia','ARM','374'),(12,'AW','Aruba','Aruba','ABW','297'),(13,'AU','Australia','Australia','AUS','61'),(14,'AT','Austria','Austria','AUT','43'),(15,'AZ','Azerbaijan','Azerbaijan','AZE','994'),(16,'BS','Bahamas','Bahamas','BHS','1242'),(17,'BH','Bahrain','Bahrain','BHR','973'),(18,'BD','Bangladesh','Bangladesh','BGD','880'),(19,'BB','Barbados','Barbados','BRB','1246'),(20,'BY','Belarus','Belarus','BLR','375'),(21,'BE','Belgium','Belgium','BEL','32'),(22,'BZ','Belize','Belize','BLZ','501'),(23,'BJ','Benin','Benin','BEN','229'),(24,'BM','Bermuda','Bermuda','BMU','1441'),(25,'BT','Bhutan','Bhutan','BTN','975'),(26,'BO','Bolivia','Bolivia','BOL','591'),(27,'BA','Bosnia and Herzegovina','Bosnia and Herzegovina','BIH','387'),(28,'BW','Botswana','Botswana','BWA','267'),(29,'BR','Brazil','Brazil','BRA','55'),(30,'IO','British Indian Ocean Territory','British Indian Ocean Territory','IOT','246'),(31,'VG','British Virgin Islands','British Virgin Islands','VGB','1284'),(32,'BN','Brunei','Brunei','BRN','673'),(33,'BG','Bulgaria','Bulgaria','BGR','359'),(34,'BF','Burkina Faso','Burkina Faso','BFA','226'),(35,'BI','Burundi','Burundi','BDI','257'),(36,'KH','Cambodia','Cambodia','KHM','855'),(37,'CM','Cameroon','Cameroon','CMR','237'),(38,'CA','Canada','Canada','CAN','1'),(39,'CV','Cape Verde','Cape Verde','CPV','238'),(40,'KY','Cayman Islands','Cayman Islands','CYM','1345'),(41,'CF','Central African Republic','Central African Republic','CAF','236'),(42,'TD','Chad','Chad','TCD','235'),(43,'CL','Chile','Chile','CHL','56'),(44,'CN','China','China','CHN','86'),(45,'CX','Christmas Island','Christmas Island','CXR','61'),(46,'CC','Cocos Islands','Cocos Islands','CCK','61'),(47,'CO','Colombia','Colombia','COL','57'),(48,'KM','Comoros','Comoros','COM','269'),(49,'CK','Cook Islands','Cook Islands','COK','682'),(50,'CR','Costa Rica','Costa Rica','CRI','506'),(51,'HR','Croatia','Croatia','HRV','385'),(52,'CU','Cuba','Cuba','CUB','53'),(53,'CW','Curacao','Curacao','CUW','599'),(54,'CY','Cyprus','Cyprus','CYP','357'),(55,'CZ','Czech Republic','Czech Republic','CZE','420'),(56,'CD','Democratic Republic of the Congo','Democratic Republic of the Congo','COD','243'),(57,'DK','Denmark','Denmark','DNK','45'),(58,'DJ','Djibouti','Djibouti','DJI','253'),(59,'DM','Dominica','Dominica','DMA','1767'),(60,'DO','Dominican Republic','Dominican Republic','DOM','1809'),(61,'TL','East Timor','East Timor','TLS','670'),(62,'EC','Ecuador','Ecuador','ECU','593'),(63,'EG','Egypt','Egypt','EGY','20'),(64,'SV','El Salvador','El Salvador','SLV','503'),(65,'GQ','Equatorial Guinea','Equatorial Guinea','GNQ','240'),(66,'ER','Eritrea','Eritrea','ERI','291'),(67,'EE','Estonia','Estonia','EST','372'),(68,'ET','Ethiopia','Ethiopia','ETH','251'),(69,'FK','Falkland Islands','Falkland Islands','FLK','500'),(70,'FO','Faroe Islands','Faroe Islands','FRO','298'),(71,'FJ','Fiji','Fiji','FJI','679'),(72,'FI','Finland','Finland','FIN','358'),(73,'FR','France','France','FRA','33'),(74,'PF','French Polynesia','French Polynesia','PYF','689'),(75,'GA','Gabon','Gabon','GAB','241'),(76,'GM','Gambia','Gambia','GMB','220'),(77,'GE','Georgia','Georgia','GEO','995'),(78,'DE','Germany','Germany','DEU','49'),(79,'GH','Ghana','Ghana','GHA','233'),(80,'GI','Gibraltar','Gibraltar','GIB','350'),(81,'GR','Greece','Greece','GRC','30'),(82,'GL','Greenland','Greenland','GRL','299'),(83,'GD','Grenada','Grenada','GRD','1473'),(84,'GU','Guam','Guam','GUM','1671'),(85,'GT','Guatemala','Guatemala','GTM','502'),(86,'GG','Guernsey','Guernsey','GGY','441481'),(87,'GN','Guinea','Guinea','GIN','224'),(88,'GW','Guinea-Bissau','Guinea-Bissau','GNB','245'),(89,'GY','Guyana','Guyana','GUY','592'),(90,'HT','Haiti','Haiti','HTI','509'),(91,'HN','Honduras','Honduras','HND','504'),(92,'HK','Hong Kong','Hong Kong','HKG','852'),(93,'HU','Hungary','Hungary','HUN','36'),(94,'IS','Iceland','Iceland','ISL','354'),(95,'IN','India','India','IND','91'),(96,'ID','Indonesia','Indonesia','IDN','62'),(97,'IR','Iran','Iran','IRN','98'),(98,'IQ','Iraq','Iraq','IRQ','964'),(99,'IE','Ireland','Ireland','IRL','353'),(100,'IM','Isle of Man','Isle of Man','IMN','441624'),(101,'IL','Israel','Israel','ISR','972'),(102,'IT','Italy','Italy','ITA','39'),(103,'CI','Ivory Coast','Ivory Coast','CIV','225'),(104,'JM','Jamaica','Jamaica','JAM','1876'),(105,'JP','Japan','Japan','JPN','81'),(106,'JE','Jersey','Jersey','JEY','441534'),(107,'JO','Jordan','Jordan','JOR','962'),(108,'KZ','Kazakhstan','Kazakhstan','KAZ','7'),(109,'KE','Kenya','Kenya','KEN','254'),(110,'KI','Kiribati','Kiribati','KIR','686'),(111,'XK','Kosovo','Kosovo','XKX','383'),(112,'KW','Kuwait','Kuwait','KWT','965'),(113,'KG','Kyrgyzstan','Kyrgyzstan','KGZ','996'),(114,'LA','Laos','Laos','LAO','856'),(115,'LV','Latvia','Latvia','LVA','371'),(116,'LB','Lebanon','Lebanon','LBN','961'),(117,'LS','Lesotho','Lesotho','LSO','266'),(118,'LR','Liberia','Liberia','LBR','231'),(119,'LY','Libya','Libya','LBY','218'),(120,'LI','Liechtenstein','Liechtenstein','LIE','423'),(121,'LT','Lithuania','Lithuania','LTU','370'),(122,'LU','Luxembourg','Luxembourg','LUX','352'),(123,'MO','Macau','Macau','MAC','853'),(124,'MK','Macedonia','Macedonia','MKD','389'),(125,'MG','Madagascar','Madagascar','MDG','261'),(126,'MW','Malawi','Malawi','MWI','265'),(127,'MY','Malaysia','Malaysia','MYS','60'),(128,'MV','Maldives','Maldives','MDV','960'),(129,'ML','Mali','Mali','MLI','223'),(130,'MT','Malta','Malta','MLT','356'),(131,'MH','Marshall Islands','Marshall Islands','MHL','692'),(132,'MR','Mauritania','Mauritania','MRT','222'),(133,'MU','Mauritius','Mauritius','MUS','230'),(134,'YT','Mayotte','Mayotte','MYT','262'),(135,'MX','Mexico','Mexico','MEX','52'),(136,'FM','Micronesia','Micronesia','FSM','691'),(137,'MD','Moldova','Moldova','MDA','373'),(138,'MC','Monaco','Monaco','MCO','377'),(139,'MN','Mongolia','Mongolia','MNG','976'),(140,'ME','Montenegro','Montenegro','MNE','382'),(141,'MS','Montserrat','Montserrat','MSR','1664'),(142,'MA','Morocco','Morocco','MAR','212'),(143,'MZ','Mozambique','Mozambique','MOZ','258'),(144,'MM','Myanmar','Myanmar','MMR','95'),(145,'NA','Namibia','Namibia','NAM','264'),(146,'NR','Nauru','Nauru','NRU','674'),(147,'NP','Nepal','Nepal','NPL','977'),(148,'NL','Netherlands','Netherlands','NLD','31'),(149,'AN','Netherlands Antilles','Netherlands Antilles','ANT','599'),(150,'NC','New Caledonia','New Caledonia','NCL','687'),(151,'NZ','New Zealand','New Zealand','NZL','64'),(152,'NI','Nicaragua','Nicaragua','NIC','505'),(153,'NE','Niger','Niger','NER','227'),(154,'NG','Nigeria','Nigeria','NGA','234'),(155,'NU','Niue','Niue','NIU','683'),(156,'KP','North Korea','North Korea','PRK','850'),(157,'MP','Northern Mariana Islands','Northern Mariana Islands','MNP','1670'),(158,'NO','Norway','Norway','NOR','47'),(159,'OM','Oman','Oman','OMN','968'),(160,'PK','Pakistan','Pakistan','PAK','92'),(161,'PW','Palau','Palau','PLW','680'),(162,'PS','Palestine','Palestine','PSE','970'),(163,'PA','Panama','Panama','PAN','507'),(164,'PG','Papua New Guinea','Papua New Guinea','PNG','675'),(165,'PY','Paraguay','Paraguay','PRY','595'),(166,'PE','Peru','Peru','PER','51'),(167,'PH','Philippines','Philippines','PHL','63'),(168,'PN','Pitcairn','Pitcairn','PCN','64'),(169,'PL','Poland','Poland','POL','48'),(170,'PT','Portugal','Portugal','PRT','351'),(171,'PR','Puerto Rico','Puerto Rico','PRI','1787'),(172,'QA','Qatar','Qatar','QAT','974'),(173,'CG','Republic of the Congo','Republic of the Congo','COG','242'),(174,'RE','Reunion','Reunion','REU','262'),(175,'RO','Romania','Romania','ROU','40'),(176,'RU','Russia','Russia','RUS','7'),(177,'RW','Rwanda','Rwanda','RWA','250'),(178,'BL','Saint Barthelemy','Saint Barthelemy','BLM','590'),(179,'SH','Saint Helena','Saint Helena','SHN','290'),(180,'KN','Saint Kitts and Nevis','Saint Kitts and Nevis','KNA','1869'),(181,'LC','Saint Lucia','Saint Lucia','LCA','1758'),(182,'MF','Saint Martin','Saint Martin','MAF','590'),(183,'PM','Saint Pierre and Miquelon','Saint Pierre and Miquelon','SPM','508'),(184,'VC','Saint Vincent and the Grenadines','Saint Vincent and the Grenadines','VCT','1784'),(185,'WS','Samoa','Samoa','WSM','685'),(186,'SM','San Marino','San Marino','SMR','378'),(187,'ST','Sao Tome and Principe','Sao Tome and Principe','STP','239'),(188,'SA','Saudi Arabia','Saudi Arabia','SAU','966'),(189,'SN','Senegal','Senegal','SEN','221'),(190,'RS','Serbia','Serbia','SRB','381'),(191,'SC','Seychelles','Seychelles','SYC','248'),(192,'SL','Sierra Leone','Sierra Leone','SLE','232'),(193,'SG','Singapore','Singapore','SGP','65'),(194,'SX','Sint Maarten','Sint Maarten','SXM','1721'),(195,'SK','Slovakia','Slovakia','SVK','421'),(196,'SI','Slovenia','Slovenia','SVN','386'),(197,'SB','Solomon Islands','Solomon Islands','SLB','677'),(198,'SO','Somalia','Somalia','SOM','252'),(199,'ZA','South Africa','South Africa','ZAF','27'),(200,'KR','South Korea','South Korea','KOR','82'),(201,'SS','South Sudan','South Sudan','SSD','211'),(202,'ES','Spain','Spain','ESP','34'),(203,'SD','Sudan','Sudan','SDN','249'),(204,'LK','Sri Lanka','Sri Lanka','LKA','94'),(205,'SR','Suriname','Suriname','SUR','597'),(206,'SJ','Svalbard and Jan Mayen','Svalbard and Jan Mayen','SJM','47'),(207,'CH','Switzerland','Switzerland','CHE','41'),(208,'SZ','Swaziland','Swaziland','SWZ','268'),(209,'SY','Syria','Syria','SYR','963'),(210,'SE','Sweden','Sweden','SWE','46'),(211,'TW','Taiwan','Taiwan','TWN','886'),(212,'TJ','Tajikistan','Tajikistan','TJK','992'),(213,'TZ','Tanzania','Tanzania','TZA','255'),(214,'TH','Thailand','Thailand','THA','66'),(215,'TG','Togo','Togo','TGO','228'),(216,'TK','Tokelau','Tokelau','TKL','690'),(217,'TO','Tonga','Tonga','TON','676'),(218,'TT','Trinidad and Tobago','Trinidad and Tobago','TTO','1868'),(219,'TN','Tunisia','Tunisia','TUN','216'),(220,'TR','Turkey','Turkey','TUR','90'),(221,'TM','Turkmenistan','Turkmenistan','TKM','993'),(222,'TC','Turks and Caicos Islands','Turks and Caicos Islands','TCA','1649'),(223,'TV','Tuvalu','Tuvalu','TUV','688'),(224,'VI','U.S. Virgin Islands','U.S. Virgin Islands','VIR','1340'),(225,'UG','Uganda','Uganda','UGA','256'),(226,'UA','Ukraine','Ukraine','UKR','380'),(227,'AE','United Arab Emirates','United Arab Emirates','ARE','971'),(228,'GB','United Kingdom','United Kingdom','GBR','44'),(229,'US','United States','United States','USA','1'),(230,'UY','Uruguay','Uruguay','URY','598'),(231,'UZ','Uzbekistan','Uzbekistan','UZB','998'),(232,'VU','Vanuatu','Vanuatu','VUT','678'),(233,'VA','Vatican','Vatican','VAT','379'),(234,'VE','Venezuela','Venezuela','VEN','58'),(235,'VN','Vietnam','Vietnam','VNM','84'),(236,'WF','Wallis and Futuna','Wallis and Futuna','WLF','681'),(237,'EH','Western Sahara','Western Sahara','ESH','212'),(238,'YE','Yemen','Yemen','YEM','967'),(239,'ZM','Zambia','Zambia','ZMB','260'),(240,'ZW','Zimbabwe','Zimbabwe','ZWE','263');
/*!40000 ALTER TABLE `countrycode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard`
--

DROP TABLE IF EXISTS `dashboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboard` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(155) NOT NULL,
  `image` varchar(155) NOT NULL,
  `contents` varchar(60000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard`
--

LOCK TABLES `dashboard` WRITE;
/*!40000 ALTER TABLE `dashboard` DISABLE KEYS */;
INSERT INTO `dashboard` VALUES (1,'PURCHASE A PRODUCT','4ae5f8800001e945cb08361fc463330e.jpg','                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h2>My products </h2><br><p>You haven\'t purchased any product yet. </p>									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        '),(2,'Reojen Marketing Automation Softwares ','1.png','    <h5 align=\"center\">About the software</h5>	  <p> Reojen Marketing Automation Software enables	  businesses to create a sales and marketing strategy and map out each	 step; centralize customer interactions and daily activities; capture    new leads and automate follow-up based on preferences and needs; follow-up, contact management all from one place.You can purchase the license for 3 months to 5 years. You can renew license anytime after it expires. Log in to your Reojen Marketing Automation Software with your Reojen login credentials and start using this service.	  </p>									\r\n   <h4 align=\"center\">Features</h4>     <ol>1. Analytics / ROI Tracking</ol> <ol>2. Campaign Segmentation</ol>     <ol>3. Contact Management</ol>	   <ol>4. Content / Blogging Platform</ol>	  <ol>5. Direct Mail Management</ol>	     <ol>6. Email Drip Campaigns</ol>   <ol>7. Landing Pages / Web Forms</ol>   <ol>8. Lead Management</ol>	  <ol>9. Lead Nurturing</ol>     <ol>10. Lead Scoring</ol>      <ol>11. Multi Channel Management</ol>	 <ol>12. Multivariate Testing</ol>   <ol>13. Referrals / Affiliates</ol>	            <ol>14. Search Marketing</ol>       <ol>15. Social Marketing</ol>	 <ol>16. Web Visitor Tracking</ol>			\r\n                                        									\r\n                                        									\r\n                                        									\r\n                                        '),(3,'Reojen Geographic Location Based Targeted Email Lists ','1.png','                                                                                                                                                                                                                                                                                                                                                <h5 align=\"center\">										\n                                    About Reojen Geographic Location Based Targeted Email Lists</h5>									\n                                <p>Get a list of 1000000 targeted email addresses for only  <i class=\"fa fa-gbp\"></i><?= $products[1][\'price\'] ?>. We have many different geographic location based targeted email lists. You can choose and purchase the email list of the geographic location you like. We use hundreds of different sources to aggregate our consumer email database. We gather raw data										\n                                    from our own marketing and publication offers, third party offers,										\n                                    online surveys, data acquisition, behavioral data and other accurate										\n                                    sources before we integrate proprietary enrichment sources.										\n                                    All email leads are 100% permission based, Can Spam compliant and										\n                                    updated weekly. We provide online marketers the ability to reach US										\n                                    local targeted audiences using quality direct email and postal										\n                                    marketing data.<br><br>										\n                                  	  Every data order passes through our email hygiene process to ensure										\n                                    that emails have a 95%+ delivery rate.<br><br>										\n                                    DON\'T GET BLOCKED!<br>										\n                                   	 GET SUPERIOR EMAIL DELIVERY and have successful email campaigns.								\n                                </p>											\n                                        									\n                                        									\n                                        									\n                                        									\n                                        									\n                                        									\n                                        '),(4,'Reojen Newsletter Sending And Email Marketing Software','1.png','<h5 align=\"center\">About the plan</h5>									\r\n                                <p>You can purchase the license for 3 months to 5 years. You can renew the license anytime after it expires										\r\n                                    Comes packaged with Reojen Email Marketing and Newsletter Software.										\r\n                                    Supports up to 1000000 subscribers of your newsletters.										\r\n                                    Log in to your Reojen Email Marketing and Newsletter Software										\r\n                                    with your Reojen login credential and start using this service.										\r\n                                </p>																		\r\n                                <h4 align=\"center\">Features</h4>									\r\n                                <ol>1. Intuitive template editor</ol>										\r\n                                <ol>2. Stunning and effective email templates</ol>									\r\n                                <ol>3. Clever autoresponders</ol>									\r\n                                <ol>4. Real-time email tracking</ol>									\r\n                                <ol>5. Achieve more from your email marketing</ol>									\r\n                                <ol>6. Free Inbox Inspector</ol>									\r\n                                <ol>7. Free Spam Test</ol>									\r\n                                <ol>8. Send Time optimization</ol>									\r\n                                <ol>9. Automatic A/B testing</ol>									\r\n                                <ol>10. Targeting</ol>									\r\n                                <ol>11. Personalisation and dynamic content</ol>									\r\n                                <ol>12. Multiple awards</ol>									\r\n                                <ol>13. Hundreds of happy clients</ol>			');
/*!40000 ALTER TABLE `dashboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_gateway`
--

DROP TABLE IF EXISTS `payment_gateway`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_gateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(20) NOT NULL,
  `gateway` varchar(100) NOT NULL,
  `status` enum('0','1','3') NOT NULL COMMENT '0=inactive, 1=active, 3=delete',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='All the payment gateway lies here';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_gateway`
--

LOCK TABLES `payment_gateway` WRITE;
/*!40000 ALTER TABLE `payment_gateway` DISABLE KEYS */;
INSERT INTO `payment_gateway` VALUES (1,'BACS','TransferWise','1'),(2,'WU','Western Union transfer','0'),(3,'WT','Wire Transfer','0'),(4,'OP','Okpay Money','0'),(5,'SEPA','Sepa Country','0');
/*!40000 ALTER TABLE `payment_gateway` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending`
--

DROP TABLE IF EXISTS `pending`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `sender_email` varchar(50) DEFAULT NULL,
  `originating_country` int(11) DEFAULT NULL,
  `money_sent_type` varchar(100) DEFAULT NULL,
  `recipient_currency` varchar(40) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `mtcn` varchar(50) DEFAULT NULL,
  `wureceipt` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `payment_request_id` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending`
--

LOCK TABLES `pending` WRITE;
/*!40000 ALTER TABLE `pending` DISABLE KEYS */;
INSERT INTO `pending` VALUES (70,'Amal','','Khamaru','amal@gmail.com',91,'2','',10,'1234','14896736638470logo.png',51,0,'MEA8 CQKN RI70','2017-03-17 16:52:21','0000-00-00 00:00:00','2017-03-16','07:44 PM GMT+05:30',0),(71,'hu','','hh','vj@hy.net',54,'1','',675,'6548903215','14896761052692Rain on tree.JPG',12,0,'KTVE BWX4 7L71','2017-03-17 16:52:21','0000-00-00 00:00:00','2017-03-16','08:55 PM GMT+06:00',0),(72,'Arpita','','Basak','Abc@gmail',354,'1','',13,'12345','14897509366475Screenshot_6.png',51,0,'GO0W ODZR JU72','2017-03-17 18:42:16','0000-00-00 00:00:00','2017-03-17','05:12 PM GMT+05:30',0),(73,'Indrajit','V','Kaplatiya','ik@vpninfotech.com',91,'1','',100,'123-456-7890','15051346475235pdf.pdf',11,0,'URMD BY5U WJ73','2017-09-11 12:57:27',NULL,'2017-09-11','06:27 PM GMT+05:30',0),(74,'IK','','VPN','ik@vpninfotech.com',91,'1','',200,'123-456-7890','15051936523701IMG_20072017_211201_0.png',11,0,'JU56 FVRW JR74','2017-09-12 05:20:52',NULL,'2017-09-12','10:50 AM GMT+05:30',0),(75,'Bishal','','Pal','bishal.pal@infoway.us',91,'1','',1,'123-456-7890','15088538461238Desert.jpg',76,0,'9M0N 3H5J 1175','2017-10-24 14:04:06',NULL,'2017-10-24','07:34 PM GMT+05:30',0);
/*!40000 ALTER TABLE `pending` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'test product',25.00,'3months'),(2,'test product 2',35.00,'list'),(3,'new product 3',40.00,'3 months');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'2017-11-13 09:06:23','payment_type','PAYPAL'),(2,'2018-03-04 09:17:51','password_check','1');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_address`
--

DROP TABLE IF EXISTS `site_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `country` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Site address';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_address`
--

LOCK TABLES `site_address` WRITE;
/*!40000 ALTER TABLE `site_address` DISABLE KEYS */;
INSERT INTO `site_address` VALUES (1,'Reojen Co.','88 New Dover Rd','','Wakefield','England','WF1 9NR',228);
/*!40000 ALTER TABLE `site_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (23,'Reojen','5ddf2cb4182ba20aa268d41b29f44e7e.png','1d73f717559f9a78d3171f2817f52983.PNG');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supports`
--

DROP TABLE IF EXISTS `supports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supports`
--

LOCK TABLES `supports` WRITE;
/*!40000 ALTER TABLE `supports` DISABLE KEYS */;
/*!40000 ALTER TABLE `supports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_history`
--

DROP TABLE IF EXISTS `transaction_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_history` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `transaction_date` datetime NOT NULL,
  `transfers` varchar(255) NOT NULL,
  `name_email` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `fee` decimal(15,2) NOT NULL,
  `netamount` decimal(15,2) NOT NULL,
  `balance` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_history`
--

LOCK TABLES `transaction_history` WRITE;
/*!40000 ALTER TABLE `transaction_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_types`
--

DROP TABLE IF EXISTS `transfer_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_types`
--

LOCK TABLES `transfer_types` WRITE;
/*!40000 ALTER TABLE `transfer_types` DISABLE KEYS */;
INSERT INTO `transfer_types` VALUES (2,'Western Union Transfer');
/*!40000 ALTER TABLE `transfer_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) DEFAULT '******',
  `city` varchar(50) NOT NULL,
  `statep` varchar(50) DEFAULT '******',
  `country` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `com_code` varchar(300) DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT '0.00',
  `priv` varchar(100) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`email`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(150) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `c_password` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Profile_pic` varchar(500) DEFAULT 'img/ProfilePic/default-profile1.jpg',
  `SecurituyQuestion1` varchar(500) DEFAULT NULL,
  `custom_question1` tinyint(2) NOT NULL DEFAULT '0',
  `Answer1` varchar(500) DEFAULT NULL,
  `SecurityQuestion2` varchar(500) DEFAULT NULL,
  `custom_question2` tinyint(2) NOT NULL DEFAULT '0',
  `Answer2` varchar(500) DEFAULT NULL,
  `Country` varchar(100) NOT NULL,
  `country_res` varchar(200) NOT NULL,
  `user_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `date_of_creation` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1 COMMENT='Stores user information of Blueprint Auctionners Online System';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bJI8RFTvjCjH','a','b','infiny','c','+910000011','4537196ae10f6c51c24b24e52ac0bcf6','4537196ae10f6c51c24b24e52ac0bcf6','','','img/ProfilePic/default-profile1.jpg','',0,'a','',0,'b','India','India','user',0),(2,'','NEW','Tcr','','Net','+88017100','ef749ff9a048bad0dd80807fc49e1c0d','ef749ff9a048bad0dd80807fc49e1c0d','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'A 1','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'A 2','Bangladesh','Bangladesh','user',0),(3,'t3Gvcu898ZCk','Hernando','','','Agudelo','+85264658825','f7e53beddf20126d487c4fc6ec2c637c','f7e53beddf20126d487c4fc6ec2c637c','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'lasalle','In what town or city did your mother and father meet?',0,'cartagena','Hong Kong','Hong Kong','user',0),(4,'','Marianna','','','Chernykh','+380953384373','b274c7f9f2f4c152c90bc087627b0e8c','b274c7f9f2f4c152c90bc087627b0e8c','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'21','In what town or city did your mother and father meet?',0,'Luhansk','Ukraine','Ukraine','user',0),(5,'','','','','','+91','d41d8cd98f00b204e9800998ecf8427e','d41d8cd98f00b204e9800998ecf8427e','','','img/ProfilePic/default-profile1.jpg','',0,'','',0,'','Canada','Egypt','user',0),(6,'','Tatevik','','','Sahakyan','+37494675878','f21578b6179eefdc6f09e253b9d4feb5','f21578b6179eefdc6f09e253b9d4feb5','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'5','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'lena','Armenia','Armenia','user',0),(7,'','Daria','','','Pozharko','+380930181172','f5733e12ea8dcfbe651e4e2430a1997c','f5733e12ea8dcfbe651e4e2430a1997c','','','img/ProfilePic/default-profile1.jpg','In In what town or city did you meet your spouse/partner?',0,'Kiev','What is your spouse or partner\'s mother\'s maiden name?',0,'Revenko','Ukraine','Ukraine','user',0),(8,'','Sebastian','','','Najduch','+48784073730','0e46da039170e0034681456d35620c47','0e46da039170e0034681456d35620c47','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'397','In what town or city did your mother and father meet?',0,'Wadowice','Poland','Poland','user',0),(9,'','Narmina','','','Aliyeva','+994557864010','7b0b6d5652ad5421106f1302f81fe6f6','7b0b6d5652ad5421106f1302f81fe6f6','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'Azadliq Avenue 88','In what town or city did your mother and father meet?',0,'Baku','Azerbaijan','Azerbaijan','user',0),(10,'','Gillian','Ruth','','Bulbeck','+5491132165579','200e8868b664bd9eeb3ca113d04f7570','200e8868b664bd9eeb3ca113d04f7570','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'113 Browning Avenue','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'lottie','Argentina','Argentina','user',0),(11,'6GI74P4dmnvY','a','d','demo','as','+915555555555','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'as','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'as','India','India','user',0),(12,'bucxR8diCT6O','nil','b','abcd','l','+880172016','ad365de2b2e355ddbe12247aa19e06ea','ad365de2b2e355ddbe12247aa19e06ea','hfdghghhhghfttfdffd@reojen.com','','img/ProfilePic/default-profile1.jpg','What is the last name of the teacher who gave you your first failing grade?',0,'abcd1234','What is your spouse or partner\'s mother\'s maiden name?',0,'abcd1234','Bangladesh','Bangladesh','admin',0),(13,'','Ahmed','Algelany','','Abdulmageed','+201277294647','7a833fe8696b36075097c0516e80660f','7a833fe8696b36075097c0516e80660f','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Giza','In what town or city did your mother and father meet?',0,'Giza','Egypt','Egypt','user',0),(14,'','Jelmer Alexander','','','de Kok Bernat','+34657391434','fe7b4f35a1d96f15d98497d484f9ff9c','fe7b4f35a1d96f15d98497d484f9ff9c','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'hdll','In what town or city did your mother and father meet?',0,'madrid','Spain','Spain','user',0),(15,'','Francesco','','','Osimanti','+393930297529','c8661883e632b97ff217881a419a5e67','c8661883e632b97ff217881a419a5e67','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'Lucca','In what town or city did your mother and father meet?',0,'Lucca','Holy See (Vatican City State)','Holy See (Vatican City State)','user',0),(16,'','Kate','','','Shashkova','+375291106794','78a00d474f6d59253f5874f69a5e5928','78a00d474f6d59253f5874f69a5e5928','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'Nagornaya 23','In what town or city did your mother and father meet?',0,'Klimovichi','Belarus','Belarus','user',0),(17,'','JASENKA','','','JASKIC','+33628333482','a405bff7095c8aa723efe1c2d3f110d9','a405bff7095c8aa723efe1c2d3f110d9','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'LYON','In what town or city did your mother and father meet?',0,'BANJALUKA','France','France','user',0),(18,'','Elsa','Samagaio','','Silva','+351915308676','2b65c0139a3f72a90a60bc04820d3384','2b65c0139a3f72a90a60bc04820d3384','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'Aveiro','In what town or city did your mother and father meet?',0,'Aveiro','Portugal','Portugal','user',0),(19,'','Anna','','','Andre','+393392857628','75bac2fc706657a2da56ecfa62b485a1','75bac2fc706657a2da56ecfa62b485a1','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'15','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'Florio','Holy See (Vatican City State)','Holy See (Vatican City State)','user',0),(20,'','Ekaterina','','','Varivoda','+375293429294','225318a741b85d6ea324650df56974a4','225318a741b85d6ea324650df56974a4','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'Voronianskogo 7','In what town or city did your mother and father meet?',0,'Minsk','Belarus','Belarus','user',0),(21,'','Alberto','','','Masini','+393407064095','878c38cde5a7f31ffa0ffae1e4d4e3e2','878c38cde5a7f31ffa0ffae1e4d4e3e2','','','img/ProfilePic/default-profile1.jpg','What were the last four digits of your childhood telephone number?',0,'2867','In what town or city did your mother and father meet?',0,'Riccione','Holy See (Vatican City State)','Holy See (Vatican City State)','user',0),(22,'','Maxime','','','LISOIR','+66969209105','cb7ac08155d84f34c4b42253763de9b3','cb7ac08155d84f34c4b42253763de9b3','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'Lyon','In what town or city did your mother and father meet?',0,'Nantes','Thailand','Thailand','user',0),(23,'','MÃ³nica','','','Espinosa','+34670669163','737a4cf48fe70995884e5c0a5c080eb7','737a4cf48fe70995884e5c0a5c080eb7','','','img/ProfilePic/default-profile1.jpg','In In what town or city did you meet your spouse/partner?',0,'Salamanca','In what town or city did your mother and father meet?',0,'Burgos','Spain','Spain','user',0),(24,'','Rebeca','','','GarcÃ­a','+34658721281','738fbf8619f7430dfabf544d5d2ba6bd','738fbf8619f7430dfabf544d5d2ba6bd','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Instituto Andes de Caracas','In what town or city did your mother and father meet?',0,'Caracas','Spain','Spain','user',0),(25,'','Edgar','Ashot','','Khachatryan','+37498554596','e10adc3949ba59abbe56e057f20f883e','e10adc3949ba59abbe56e057f20f883e','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'Savoyan','In what town or city did your mother and father meet?',0,'Gyumri','Armenia','Armenia','user',0),(26,'','Adrian','E','','Stefarta','+40747765060','f3809e88a8b49a7d672740e2b663fbb1','f3809e88a8b49a7d672740e2b663fbb1','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'29','In what town or city did your mother and father meet?',0,'chisinau','Romania','Moldova, Republic of','user',0),(27,'','Piotr','Tadeusz','','Lugowski','+34699133798','2c5e61c74b657e524b0a744e681ef82d','2c5e61c74b657e524b0a744e681ef82d','','','img/ProfilePic/default-profile1.jpg','In In what town or city did you meet your spouse/partner?',0,'Riga','In what town or city did your mother and father meet?',0,'Warszawa','Spain','Spain','user',0),(28,'','Martina','','','Pompeo','+393490084729','451886bda9a2281871a1322803943239','451886bda9a2281871a1322803943239','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'yangzhou','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'pradal','Holy See (Vatican City State)','Holy See (Vatican City State)','user',0),(29,'','Ivan','','','Cadars','+33635791989','25d84a8cfc0d85a958a1d223bd62df5b','25d84a8cfc0d85a958a1d223bd62df5b','','','img/ProfilePic/default-profile1.jpg','In In what town or city did you meet your spouse/partner?',0,'Epinal','What are the last five digits of your driver\'s licence number?',0,'00032','France','France','user',0),(30,'','Patricia','Carvalho','','Vasconcellos','+4407534311612','b5bed943402d247353be9db12deb385e','b5bed943402d247353be9db12deb385e','','','img/ProfilePic/default-profile1.jpg','What were the last four digits of your childhood telephone number?',0,'7768','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'InÃªs','United Kingdom','United Kingdom','user',0),(31,'','Uladzimir','','','Bialou','+359878637882','04ce9ab33c615dc28cb3839ff54b059a','04ce9ab33c615dc28cb3839ff54b059a','','','img/ProfilePic/default-profile1.jpg','In In what town or city did you meet your spouse/partner?',0,'Minsk','What are the last five digits of your driver\'s licence number?',0,'02403','Bulgaria','Bulgaria','user',0),(32,'','Maria','Fatima','','Ribeiro','+351917915533','84e5f1616620c89e35cdbd9a459fc9cd','84e5f1616620c89e35cdbd9a459fc9cd','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Leiros','In what town or city did your mother and father meet?',0,'espinho','Portugal','Portugal','user',0),(33,'','Maria','','','Vayman','+99556843494','1f72dff4b442404d921f67528b7b074e','1f72dff4b442404d921f67528b7b074e','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'144','In what town or city did your mother and father meet?',0,'Ekaterinburg','Georgia','Georgia','user',0),(34,'','Tony','','Tony Bobo','Bobo','+541136743377','e58fcf88c45345893e63e6112ca3c537','e58fcf88c45345893e63e6112ca3c537','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'joliot curie','In what town or city did your mother and father meet?',0,'vitry','Argentina','Argentina','user',0),(35,'','Maria','','','Vayman','+995568434994','1f72dff4b442404d921f67528b7b074e','1f72dff4b442404d921f67528b7b074e','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'144','In what town or city did your mother and father meet?',0,'Ekaterinburg','Georgia','Georgia','user',0),(36,'','Martina','','','Triaca','+393397906376','946ed1eefb5c32c3a48654ce2cbade52','946ed1eefb5c32c3a48654ce2cbade52','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'via savona 7','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'Salemi','Holy See (Vatican City State)','Holy See (Vatican City State)','user',0),(37,'','Chiara','','','Petrucci','+393487766526','1e23d6dd0dc9a715b5478d556869e804','1e23d6dd0dc9a715b5478d556869e804','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'Via Machiavelli 114','In what town or city did your mother and father meet?',0,'Livorno','Holy See (Vatican City State)','Spain','user',0),(38,'','Ilaria','','','Castelli','+447804324941','e37ece473d42220f791e2c881e56ed74','e37ece473d42220f791e2c881e56ed74','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'sacro cuore','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'rinaldi','United Kingdom','United Kingdom','user',0),(39,'','Fabio','','Fabio Salsi Traduzioni','Salsi','+51985078272','d1c0f384b6adef8b7dc0242cff5d9def','d1c0f384b6adef8b7dc0242cff5d9def','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'pascoli','What is the middle name of your oldest child?',0,'ignacio','Peru','Peru','user',0),(40,'','Laura','','','DÃ­az','+34646593919','5b39a09894460b99d7ed23b002258571','5b39a09894460b99d7ed23b002258571','','','img/ProfilePic/default-profile1.jpg','What were the last four digits of your childhood telephone number?',0,'5197','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'Carmen','Spain','Spain','user',0),(41,'','Chiara','Petrucci','','Petrucci','+34611015941','067ca503fb4b197619d9d7c54b3fe3d8','067ca503fb4b197619d9d7c54b3fe3d8','','','img/ProfilePic/default-profile1.jpg','',0,'via Machiavelli 114','',0,'Livorno','Spain','Spain','user',0),(42,'','Roberto','','','Popolizio','+393247935263','8bb822db0162ce055b9e1fc3acdc252b','8bb822db0162ce055b9e1fc3acdc252b','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'Pisa','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'Maria','Holy See (Vatican City State)','Holy See (Vatican City State)','user',0),(43,'','Marta','','','Casals JovÃ©','+420777576188','39323d0240bf2fa1cf1302dea17b966f','39323d0240bf2fa1cf1302dea17b966f','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'Pallars, 2','In what town or city did your mother and father meet?',0,'Solsona','Czech Republic','Czech Republic','user',0),(44,'','Manuel','','','GarcÃ­a','+34661861007','45b1373226b07e27812a06c32bd1e02a','45b1373226b07e27812a06c32bd1e02a','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'Lluis Companys 13','In what town or city did your mother and father meet?',0,'Charches','Spain','Spain','user',0),(45,'','Test','','','Test','+44100025','ef749ff9a048bad0dd80807fc49e1c0d','ef749ff9a048bad0dd80807fc49e1c0d','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Ans 1','What is your spouse or partner\'s mother\'s maiden name?',0,'Ans 2','United Kingdom','United Kingdom','user',0),(46,'','Mialisoatiana','','','Razanabololona','+261326068727','3aff099f3cadfbc9b04fcc86b7544ad5','3aff099f3cadfbc9b04fcc86b7544ad5','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'belair','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'justine','Madagascar','Madagascar','user',0),(47,'','a','b','','c','+910000000034','202cb962ac59075b964b07152d234b70','202cb962ac59075b964b07152d234b70','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'1','In what town or city did your mother and father meet?',0,'Ludhiana','India','India','user',0),(48,'','Nikola','','','Atanasov','+38971992392','5966121f73914343c904a6f39c05038a','5966121f73914343c904a6f39c05038a','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'Bibione','In what town or city did your mother and father meet?',0,'Skopje','Macedonia','Macedonia','user',0),(49,'','Daria','','','Gorelik','+79851123821','5d41402abc4b2a76b9719d911017c592','5d41402abc4b2a76b9719d911017c592','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Integral','In what town or city did your mother and father meet?',0,'Moscow','Kazakhstan','Kazakhstan','user',0),(50,'','ghyjug','khjhuhjh','jhjjghjghbh','hjhjhgyjgy','+2301000','e8dc4081b13434b45189a720b77b6818','e8dc4081b13434b45189a720b77b6818','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'abcdefgh','What is your spouse or partner\'s mother\'s maiden name?',0,'abcdefgh','Mauritius','Mauritius','user',0),(51,'','a','b','','c','+9100000000075','65c59f65f3a0549cebf711743e6c64b3','65c59f65f3a0549cebf711743e6c64b3','','','img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'kolkata','What are the last five digits of your driver\'s licence number?',0,'howrah','India','India','user',0),(52,'','lijghtrv','','','hgtthggh','+99467675645456','e19d5cd5af0378da05f63f891c7467af','e19d5cd5af0378da05f63f891c7467af','','','img/ProfilePic/default-profile1.jpg','In In what town or city did you meet your spouse/partner?',0,'ghghvb','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'hghfgfdc','Azerbaijan','Azerbaijan','user',0),(53,'','gh','','','g','+1246867564465655','e19d5cd5af0378da05f63f891c7467af','e19d5cd5af0378da05f63f891c7467af','','','img/ProfilePic/default-profile1.jpg','In In what town or city did you meet your spouse/partner?',0,'j','What are the last five digits of your driver\'s licence number?',0,'k','Barbados','Barbados','user',0),(54,'','po','','','rg','+1268789456321','e19d5cd5af0378da05f63f891c7467af','e19d5cd5af0378da05f63f891c7467af','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'sd','What is your spouse or partner\'s mother\'s maiden name?',0,'hyui','Antigua and Barbuda','Antigua and Barbuda','user',0),(55,'','Hiplired','','','Kiolsew','+3739834','35e5ff80657b6744d43021c23043346d','35e5ff80657b6744d43021c23043346d','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'abcd','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'efgh','Moldova','Moldova','user',0),(60,'','a','b','Karmick','c','+91000000000049','da24cad87f290cc2b48d1ed20f493c9c','da24cad87f290cc2b48d1ed20f493c9c','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'A/188','What is your favorite color?',0,'white','India','India','user',0),(62,'','a','b','','c','+91000000000067','0e9bed91d56a8cdc904dc2d79354938b','0e9bed91d56a8cdc904dc2d79354938b','','','img/ProfilePic/default-profile1.jpg','In what town or city did you meet your spouse/partner?',0,'kol','What are the last five digits of your driver\'s licence number?',0,'58','India','India','user',0),(63,'','h','','h','u','+947659065','de88e3e4ab202d87754078cbb2df6063','de88e3e4ab202d87754078cbb2df6063','','','img/ProfilePic/default-profile1.jpg','What is the last name of the teacher who gave you your first failing grade?',0,'ans','What was the make and model of your first car?',0,'ans','Sri Lanka','Sri Lanka','user',0),(64,'','h','','','j','+12688765454768','e8dc4081b13434b45189a720b77b6818','e8dc4081b13434b45189a720b77b6818','','','img/ProfilePic/default-profile1.jpg','In what year was your father born?',0,'f','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'f','Antigua and Barbuda','Antigua and Barbuda','user',0),(65,'','g','','','h','+1268774545767','fb25b7c940b884834a1d9353cb21106f','fb25b7c940b884834a1d9353cb21106f','','','img/ProfilePic/default-profile1.jpg','What was your favorite food as a child?',0,'Ans','What was the name of the hospital where you were born?',0,'Ans','Antigua and Barbuda','Antigua and Barbuda','user',0),(66,'','a','b','','c','+9100000063005','b7bc4e367b4230772d97cab2581034bf','b7bc4e367b4230772d97cab2581034bf','','','img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'Ahmedabad','When is your anniversary?',0,'12/12/2015','India','India','user',0),(67,'','pp','','','sam','+12345678901','1a64a010767f0725fb52111b0a9e9f84','1a64a010767f0725fb52111b0a9e9f84','','','img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'123','What are the last five digits of your driver\'s licence number?',0,'12345','Canada','Canada','user',0),(74,'','Falgun','S','rigel','Shah','+912222333344','0192023a7bbd73250516f069df18b500','0192023a7bbd73250516f069df18b500',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What is the last name of the teacher who gave you your first failing grade?',0,'sfsdfs','What is your spouse or partner\'s mother\'s maiden name?',0,'sdfdsf','India','India','admin',1493277416),(75,'','Bimal','P','DDS','Patel','+9122334455','0fdf6d8829854bedeaed992a6f3ad83a','0fdf6d8829854bedeaed992a6f3ad83a',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'sadsa','What is your spouse or partner\'s mother\'s maiden name?',0,'asdad','India','India','user',1493277475),(76,'WBuVJs72cHtL','Bishal','','infoway','Pal','+919632587412','afdd0b4ad2ec172c586e2150770fbf9e','afdd0b4ad2ec172c586e2150770fbf9e',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'123','What is the middle name of your oldest child?',0,'123','India','India','user',1508743413),(77,'','rtgrert','ertewrtewtr','etwet','ewtwetwet','+91789652263221','0f765bd08bc9323c33c7dae8fb0da266','0f765bd08bc9323c33c7dae8fb0da266',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'fhagshdf','What was the make and model of your first car?',0,'hAGSDHgasdgJ','India','India','user',1508997711),(78,'1k63mHETgN1s','Manoj','','Codebeginer','Thakur','+918559058406','34c2c90771a790bf3f10bfbb5ac8d2a9','82e610870570834c80dea32bc7e4e745',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'64','What is the middle name of your oldest child?',0,'sonu','India','India','user',1510503101),(79,'pE2sAtRCHbwt','Test','','','13','+6729468721094','42f749ade7f9e195bf475f37a44cafcb','42f749ade7f9e195bf475f37a44cafcb',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What is the name of your favorite childhood friend?',0,'Password123','What is your favorite color?',0,'Password123','Antarctica','Antarctica','user',1510551582),(80,'UbrGZemu6KDp','Test 14','','','14','+12689264980357','42f749ade7f9e195bf475f37a44cafcb','42f749ade7f9e195bf475f37a44cafcb',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was your favorite sport in high school?',0,'Password123','What was the make and model of your first car?',0,'Password123','Antigua and Barbuda','Antigua and Barbuda','user',1510648571),(81,'avFHj7E3vpDB','Nataliia','','','Buhai','+380636201873','42f749ade7f9e195bf475f37a44cafcb','42f749ade7f9e195bf475f37a44cafcb','ht@de.net',NULL,'img/ProfilePic/default-profile1.jpg','What is your favorite team?',0,'Password123','Who is your childhood sports hero?',0,'Password123','Austria','Austria','user',1510649644),(82,'nfaFPKSj73cu','dev','','ecomsolver','ecomsolver','+911234567890','4b3c01ebf6135478e42ec156bb05a1bc','4b3c01ebf6135478e42ec156bb05a1bc',NULL,NULL,'img/ProfilePic/default-profile1.jpg','hello',1,'hello','hello',1,'hello','India','India','user',1515808080),(83,'SXVcQ4lRSKaJ','test','test','ecomsolver','test','+91234567890','4b3c01ebf6135478e42ec156bb05a1bc','4b3c01ebf6135478e42ec156bb05a1bc','h@gt.net',NULL,'img/ProfilePic/default-profile1.jpg','What was your favorite sport in high school?',0,'badminton','Who is your childhood sports hero?',0,'salman','India','India','admin',1515810298),(84,'EupRifGkjTRe','Tolga Han','','','Duyuler','+905067674399','c36b387445c9974ae20bdef60d05e98d','c36b387445c9974ae20bdef60d05e98d','peccavi01@hotmail.com',NULL,'img/ProfilePic/default-profile1.jpg','In what year was your father born?',0,'faydali','What is your grandmother\'s (on your mother\'s side) maiden name?',0,'ozdemir','Turkey','Turkey','user',1516118025),(87,'2VHkfuXnU6CS','test','dev','ecom','account','+91987654321','861f194e9d6118f3d942a72be3e51749','861f194e9d6118f3d942a72be3e51749',NULL,NULL,'img/ProfilePic/default-profile1.jpg','hello',1,'hello','hello',1,'hello','India','India','user',1516598067),(88,'M6N5OxBPfKOw','toufik','','','elmouatamid','+212672730508','21c2f3036a3210601a8efd4764c80181','21c2f3036a3210601a8efd4764c80181',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'193','What is your favorite color?',0,'red','Morocco','Morocco','user',1516603363),(89,'A1CfHz1NCIII','yigit','','','culum','+905382149169','06b7c15fcdeea1f1d490285841c07234','06b7c15fcdeea1f1d490285841c07234',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What is your favorite team?',0,'mancity','What is the middle name of your oldest child?',0,'william','Turkey','Turkey','user',1516605753),(90,'','Test','','','Test','+374858097','f1163142fc285b6a00e998c9509d8cb3','f1163142fc285b6a00e998c9509d8cb3',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'kuyhdplM','In what town or city did your mother and father meet?',0,'kuyhdplM','Armenia','Armenia','user',1516610787),(91,'zEVGTChESR2j','ç§¦','ä»•','','é¹','+8615640229768','39140cc90b381cda60c784f8d8f772e1','39140cc90b381cda60c784f8d8f772e1',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'å·¥è”å­å¼Ÿå°å­¦','What is the middle name of your oldest child?',0,'jingjing','China','China','user',1516616104),(92,'','Paolo','','','Guadin','+393470393250','1745e27f59a29b43c00ae7bb2cb46638','1745e27f59a29b43c00ae7bb2cb46638',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'torricelli 10','What is your spouse or partner\'s mother\'s maiden name?',0,'Nardon','Italy','Italy','user',1516634213),(93,'UffEUxClFglY','Nana','','','Khalifa','+201228088966','1163323415ad0408ccd797d1b4e33224','1163323415ad0408ccd797d1b4e33224',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what year was your father born?',0,'1949','Saddest day of my life',1,'20170521','Egypt','Egypt','user',1516688824),(94,'4glidb5AWlhj','Etugbo','o','Steven Testing Ltd','Steven','+2348130033008','4d903d6f7ae06eb0e9798024438320d0','4d903d6f7ae06eb0e9798024438320d0',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What is your favorite team?',0,'dogs','What is your favorite color?',0,'green','Nigeria','Nigeria','user',1516895682),(95,'GZi8gEIkq1Ul','wqw','qwqw','qwqw','qwqw','+919090909090','ef2aab9466bb31eb4f00b44e89060998','ef2aab9466bb31eb4f00b44e89060998',NULL,NULL,'img/ProfilePic/default-profile1.jpg','12122',1,'12121212','1212',1,'1212121','India','India','user',1516938392),(96,'pAjU8si6XJID','Test','','','Developer','+917508609112','8d7b90897d921d9480e45e7cdb4e723b','8d7b90897d921d9480e45e7cdb4e723b',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was your favorite sport in high school?',0,'Cricket','What is your favorite color?',0,'Black','India','India','user',1516940913),(97,'EVG9BwtPh4d3','Mohan','','','Thiruvengadam','+919500080065','54ad2241e3ac3af3b74530858ea32c5f','54ad2241e3ac3af3b74530858ea32c5f',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was your favorite sport in high school?',0,'cricket','What is your favorite color?',0,'Blue','India','India','user',1516946379),(98,'T2Ka44Ywkekt','Vipin','','YTS','Bairagi','+919993671878','abeb3fee30a3404c48457aed078b388a','abeb3fee30a3404c48457aed078b388a',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what city or town does your nearest sibling live?',0,'indore','What was the name of the hospital where you were born?',0,'indore','India','India','user',1516949741),(99,'OAFsEhUJxCLq','Sean','','URCS','Serugo','+256701721905','3d42431e87af5fe6d243b99935da8c91','3d42431e87af5fe6d243b99935da8c91',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what town or city did you meet your spouse/partner?',0,'Kampala','What was the name of the hospital where you were born?',0,'Rubaga','Uganda','Uganda','user',1516955742),(100,'wfmQuxglStuf','keshav','k','keshav infotech','infotech','+919974367672','7013f9ca80185296117440d1d216b292','7013f9ca80185296117440d1d216b292',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'7','What is the middle name of your oldest child?',0,'amit','India','India','user',1516957537),(101,'ULdw2RygDjNp','Amit','','iSkylar Technologies','Sharma','+918800578853','396bc0927e610797f860596a603a6e21','396bc0927e610797f860596a603a6e21',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what year was your father born?',0,'1950','What is your favorite color?',0,'White','India','India','user',1516959455),(102,'GftMMHNZBVgq','Sarang','R','','Awaze','+918087365436','8f17fcbdd61e5214c5d6d40ee5c3fdea','8f17fcbdd61e5214c5d6d40ee5c3fdea',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'Pp','What is the middle name of your oldest child?',0,'H','India','India','user',1517036653),(103,'Dm2JBV8fmNPH','Test','','xyz','kumar','+91123456789','2337efcd0f2140924ef38e42447aeb2c','2337efcd0f2140924ef38e42447aeb2c',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What is your favorite team?',0,'india','Who is your childhood sports hero?',0,'sachin','India','India','user',1517044976),(104,'Qrs2vlshNA1f','asdasd','asdfasd','asdfasd','asdfasd','+912323232323','6a204bd89f3c8348afd5c77c717a097a','6a204bd89f3c8348afd5c77c717a097a',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What were the last four digits of your childhood telephone number?',0,'asdf','What is the middle name of your oldest child?',0,'asdasdf','India','India','user',1517047297),(109,'MWdWphlQ7CPG','Saurav','','sbsgroupsdf','Jain','+917869118811','5806325fbf4c1e879891a4f48237b9b9','5806325fbf4c1e879891a4f48237b9b9','pradeep@mailinator.com',NULL,'img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'Indore','What is your favorite color?',0,'red','India','India','user',1519022584),(110,'qSxgGaYUDXEq','sgf','sfg','sfdg','sdfg','+917896541230','e8e423c7d068ff39e3dc61af28dd6058','e8e423c7d068ff39e3dc61af28dd6058',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'aaa','What is your favorite color?',0,'red','India','India','user',1519023326),(111,'u9H7uXaDyedV','wer','wer','wer','wer','+917869455440','c252273e9a9087357e2ffee46e12492b','c252273e9a9087357e2ffee46e12492b',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'sdf','In what town or city did your mother and father meet?',0,'sdf','India','India','user',1519023618),(112,'j3OM5e5ecMt8','pradeep','kumar','sbsgroup','sahu','+917869118810','5806325fbf4c1e879891a4f48237b9b9','5806325fbf4c1e879891a4f48237b9b9',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Govt.high school.','In what town or city did your mother and father meet?',0,'Indore','India','India','user',1519036613),(113,'EInUwg2zd9hU','Deevy','','Forebear Productions','Rick','+919630984248','4a3aa415a7d4aa47f841aef326a45f3d','4a3aa415a7d4aa47f841aef326a45f3d','sourabh@mailinator.com',NULL,'img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Indore','What is your favorite color?',0,'Blue','India','India','user',1519294793),(114,'l3550gdvTXK7','Test Acc','','','Two','+672843870964','e19d5cd5af0378da05f63f891c7467af','e19d5cd5af0378da05f63f891c7467af',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what city or town does your nearest sibling live?',0,'abcd1234','What is your favorite color?',0,'abcd1234','Antarctica','Antarctica','user',1519299335),(115,'kwd9euF9Xhtw','Devy','','','Rick','+9196309842480','4a3aa415a7d4aa47f841aef326a45f3d','4a3aa415a7d4aa47f841aef326a45f3d','sourabh@mailinator.com',NULL,'img/ProfilePic/default-profile1.jpg','What was the house number and street name you lived in as a child?',0,'123','What is your favorite color?',0,'Blue','India','India','user',1519375608),(116,'oq9VqXBuY8bj','Ravinder','','aarvikinfotech','singh','+918557062045','be05977add575832dc52655d4ad5c42e','be05977add575832dc52655d4ad5c42e','ravinder.singh@aarvikinfotech.com',NULL,'img/ProfilePic/default-profile1.jpg','i am',1,'ravinder singh','not i am',1,'ravinder','India','India','user',1519728216),(117,'BnfQOtjNUJ4D','sudarshan','','aarvikinfotech','singh','+918872385117','43ba77deaa297867f18bcb8417f3e2ad','43ba77deaa297867f18bcb8417f3e2ad','sudarshan.singh@aarvikinfotech.com',NULL,'img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Aarvik','What is the middle name of your oldest child?',0,'Aarvik','India','India','user',1519777925),(118,'kD6ydLRBgKAO','Navjit','','','Kaur','+919999999999','f0109faa5c621b66bb362db7337af9b2','f0109faa5c621b66bb362db7337af9b2',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Stepping Stones','In what town or city did your mother and father meet?',0,'Chandigarh','India','India','user',1519795349),(119,'dYDyxZ4UJgSR','Oladapo','Timothy','Reojen.co','Olagoke','+2348027625842','0af85468686d625111a0f8ef99217dfb','0af85468686d625111a0f8ef99217dfb',NULL,NULL,'img/ProfilePic/default-profile1.jpg','What primary school did you attend?',0,'Y and Y','What is the middle name of your oldest child?',0,'Inioluwa','Nigeria','Nigeria','user',1519820768),(120,'KffBC7mPp483','j','','','i','+6195678','e19d5cd5af0378da05f63f891c7467af','e19d5cd5af0378da05f63f891c7467af','h@be.net',NULL,'img/ProfilePic/default-profile1.jpg','What was your favorite food as a child?',0,'abcd1234','What was the name of the company where you had your first job?',0,'abcd1234','Australia','Australia','user',1519833035),(121,'h1wQH2VwKBJ8','ju','','','hg','+12689365809425','325a2cc052914ceeb8c19016c091d2ac','325a2cc052914ceeb8c19016c091d2ac','jtfghhhgfd@gmail.com',NULL,'img/ProfilePic/default-profile1.jpg','In what year was your father born?',0,'Abcd1234','What is your favorite color?',0,'Abcd1234','Antigua and Barbuda','Antigua and Barbuda','user',1519902419),(122,'UdjEbYtWD0vc','Fir','','','Last','+537034861053','325a2cc052914ceeb8c19016c091d2ac','325a2cc052914ceeb8c19016c091d2ac',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what city or town does your nearest sibling live?',0,'Abcd1234','Who is your childhood sports hero?',0,'Abcd1234','Cuba','Cuba','user',1519981702),(123,'8WKcjq4n7UWx','f','','','l','+994765980324','e19d5cd5af0378da05f63f891c7467af','e19d5cd5af0378da05f63f891c7467af',NULL,NULL,'img/ProfilePic/default-profile1.jpg','In what town or city was your first full time job?',0,'abcd1234','What is your favorite color?',0,'abcd1234','Azerbaijan','Azerbaijan','user',1520072555);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `western_union_status`
--

DROP TABLE IF EXISTS `western_union_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `western_union_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transfer_type_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `western_union_status`
--

LOCK TABLES `western_union_status` WRITE;
/*!40000 ALTER TABLE `western_union_status` DISABLE KEYS */;
INSERT INTO `western_union_status` VALUES (4,2,1);
/*!40000 ALTER TABLE `western_union_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wire_transfer`
--

DROP TABLE IF EXISTS `wire_transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wire_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `money_request_id` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `re_currency` varchar(10) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wire_transfer`
--

LOCK TABLES `wire_transfer` WRITE;
/*!40000 ALTER TABLE `wire_transfer` DISABLE KEYS */;
INSERT INTO `wire_transfer` VALUES (1,'Pradip','Mondal','pm3980@gmail.com',125,'IBR3 RDMP C691','2017-03-17','','USD',91,'2017-03-17 12:59:01','0000-00-00 00:00:00'),(2,'Sayantan','Sharma','sayantan@gmail.com',50,'LYJG XH61 3SA2','2017-03-17','','USD',91,'2017-03-17 13:29:00','0000-00-00 00:00:00'),(3,'amal','test','dd@f.com',2,'U52Q VFCI 14K3','2017-03-17','','USD',91,'2017-03-17 13:53:59','0000-00-00 00:00:00'),(4,'Pradip','Mondal','sayantan@gmail.com',125,'R6U2 QT70 90H4','2017-03-17','','USD',91,'2017-03-17 14:09:31','0000-00-00 00:00:00'),(5,'Pradip','Mondal','sayantan@gmail.com',125,'R1F7 8L29 SYT5','2017-03-17','','USD',91,'2017-03-17 14:19:49','0000-00-00 00:00:00'),(6,'f','l','fl@a.com',450,'X6XO 5TUE GLO6','2017-03-19','','USD',244,'2017-03-19 08:30:35','0000-00-00 00:00:00'),(7,'','','',0,'WRG4 MAJN XER0','0000-00-00','','',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'j','b','jb@me.me',5564,'04LB MP7J 3RU8','2017-04-12','','eur',54,'2017-04-12 21:03:55','0000-00-00 00:00:00'),(9,'VR','VPN','vr@vpninfotech.com',3000,'YLBS 5JMR 12D9','2017-09-12',NULL,'USD',91,'2017-09-12 10:41:05',NULL),(10,'IK','VPN`','ik@vpninfotech.com',300,'LKU0 PFS6 3K10','2017-09-12',NULL,'USD',91,'2017-09-12 10:55:37',NULL);
/*!40000 ALTER TABLE `wire_transfer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-05  7:21:38
