-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_resets`
--

LOCK TABLES `admin_password_resets` WRITE;
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'Napat Osaklang','mosaklang@gmail.com','$2y$10$lEIyirbiNKgPULWjpnXyq.MkJBcQyti2mkLcZGXcWxtMA10ggJ2Ci',NULL,'2018-02-13 08:11:11','2018-02-13 08:11:11');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents` (
  `agent_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agent_firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agent_lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `google_latitute_longtitute` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'T',
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,'อรอุ๋ม','บีเอนเคสี่แปด','กรุงเทพฯ','1234.25 2356.54','2018-02-15 09:17:19','2018-02-15 09:19:55','T'),(2,'เชอปราง','บีเอนเคสี่แปด','กรุงเทพฯ','4568.21 3659.21','2018-02-15 09:18:23','2018-02-15 09:24:51','T');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank` (
  `bank_id` int(20) NOT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank`
--

LOCK TABLES `bank` WRITE;
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'ครีมบำรุงผิว','T','2018-02-15 08:10:47','2018-02-15 08:40:45'),(2,'ครีมกันแดด','T','2018-02-15 08:10:47','2018-02-15 08:10:33'),(3,'แป้งพัฟ','T','2018-02-15 08:10:47',NULL),(4,'สเปรย์','T','2018-02-15 08:10:47',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_address`
--

DROP TABLE IF EXISTS `customer_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_address` (
  `customer_address_id` int(20) NOT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `district_id` int(20) DEFAULT NULL,
  `amphur_id` int(20) DEFAULT NULL,
  `province_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`customer_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_address`
--

LOCK TABLES `customer_address` WRITE;
/*!40000 ALTER TABLE `customer_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export`
--

DROP TABLE IF EXISTS `export`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export` (
  `export_id` int(20) NOT NULL,
  `product_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `export_quantity` int(20) DEFAULT NULL,
  `export_date` timestamp NULL DEFAULT NULL,
  `supplyer_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`export_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export`
--

LOCK TABLES `export` WRITE;
/*!40000 ALTER TABLE `export` DISABLE KEYS */;
/*!40000 ALTER TABLE `export` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_type`
--

DROP TABLE IF EXISTS `export_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_type` (
  `export_type_id` int(10) NOT NULL,
  `export_type_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`export_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_type`
--

LOCK TABLES `export_type` WRITE;
/*!40000 ALTER TABLE `export_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facebook_login`
--

DROP TABLE IF EXISTS `facebook_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facebook_login` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facebook_login`
--

LOCK TABLES `facebook_login` WRITE;
/*!40000 ALTER TABLE `facebook_login` DISABLE KEYS */;
INSERT INTO `facebook_login` VALUES (2,'1829917943685539','facebook','2018-02-12 06:57:15','2018-02-12 06:57:15');
/*!40000 ALTER TABLE `facebook_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import`
--

DROP TABLE IF EXISTS `import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `import` (
  `import_id` int(20) NOT NULL,
  `product_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `import_quantity` int(20) DEFAULT NULL,
  `import_date` timestamp NULL DEFAULT NULL,
  `supplyer_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`import_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import`
--

LOCK TABLES `import` WRITE;
/*!40000 ALTER TABLE `import` DISABLE KEYS */;
/*!40000 ALTER TABLE `import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import_type`
--

DROP TABLE IF EXISTS `import_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `import_type` (
  `import_type_id` int(10) NOT NULL,
  `import_type_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`import_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import_type`
--

LOCK TABLES `import_type` WRITE;
/*!40000 ALTER TABLE `import_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `import_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2014_10_12_000000_create_admin_users_table',1),(6,'2014_10_12_000000_create_users_table',1),(7,'2014_10_12_100000_create_password_resets_table',1),(8,'2018_01_27_183325_create_admin_password_resets_table',1),(9,'2018_02_12_125702_create_social_facebook_accounts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `order_id` int(20) NOT NULL,
  `order_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `payment_id` int(20) NOT NULL,
  `order_id` int(20) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `bank_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_amount` float DEFAULT NULL,
  `pay_time` timestamp NULL DEFAULT NULL,
  `pay_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(20) DEFAULT NULL,
  `product_price` decimal(6,2) DEFAULT NULL,
  `sell_price` decimal(6,2) DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_id` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'VIVA WHITE SERUM VER 2.0',1,1590.00,1590.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:32:50','2018-02-15 09:34:28'),(2,'VIVA Total Sun Screen SPF50+ PA++++',1,690.00,690.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:33:35',NULL),(3,'VIVA WHITE SERUM VER 2.0 +Total Sun Screen SPF 50+ PA++++',1,2280.00,2280.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:34:15','2018-02-14 09:59:19'),(4,'Viva Skin Booster ครีมชุ่มชื้น',1,1090.00,1090.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:34:52','2018-02-14 09:39:08'),(5,'VIVA Skin Balance Essene น้ำตบวิว่า',1,1090.00,1090.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:35:33','2018-02-14 09:43:24'),(6,'เซ็ทรักษา ฝ้า กระ ใช้ครีมแรงๆหรือยาคลินิกมา',1,3370.00,3370.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:36:09',NULL),(7,'แป้งพัฟทาหน้า VIVA Perfect Skin Powder SPF30 PA+++ (เบอร์ 01)',1,790.00,790.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:36:49',NULL),(8,'แป้งพัฟทาหน้า VIVA Perfect Skin Powder SPF30 PA+++ (เบอร์ 02)',1,790.00,790.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:37:34',NULL),(9,'สวยชุดใหญ่ ครบเซ็ต สินค้า 5 รายการ (น้ำตบ เซรั่ม บูส กันแดด แป้งเบอร์01)',1,4790.00,4790.00,'Medica Viva',NULL,'T',1,'2018-02-14 08:38:13',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staticpage`
--

DROP TABLE IF EXISTS `staticpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staticpage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staticpage`
--

LOCK TABLES `staticpage` WRITE;
/*!40000 ALTER TABLE `staticpage` DISABLE KEYS */;
INSERT INTO `staticpage` VALUES (1,'เกี่ยวกับเรา','<p><img class=\"shrinkToFit\" src=\"https://scontent.fbkk1-1.fna.fbcdn.net/v/t39.2365-6/12056999_527586047417155_1427094715_n.jpg?_nc_eui2=v1%3AAeGT0_rBY06nvQpwEDHgUSBI2rhUvLP_wk_EaYU2FXvPUCQLdltjU16CqhqXPMakw4xcw_i9IvmSn_wLBnjr655wpaAPUiQyj4FRSjnypqeiMw&oh=9010e66fd9aff59e4a40e35d9fb8d283&oe=5B0F350F\" alt=\"https://scontent.fbkk1-1.fna.fbcdn.net/v/t39.2365-6/12056999_527586047417155_1427094715_n.jpg?_nc_eui2=v1%3AAeGT0_rBY06nvQpwEDHgUSBI2rhUvLP_wk_EaYU2FXvPUCQLdltjU16CqhqXPMakw4xcw_i9IvmSn_wLBnjr655wpaAPUiQyj4FRSjnypqeiMw&oh=9010e66fd9aff59e4a40e35d9fb8d283&oe=5B0F350F\" width=\"958\" height=\"638\" /></p>','2018-02-20 09:53:37','2018-02-20 10:11:32'),(2,'ติดต่อเรา','<div style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: Calibri,Arial,Helvetica,sans-serif; color: #000000;\"><span style=\"color: #212121; font-size: small;\"><span style=\"font-weight: normal; font-size: 15px;\"><span style=\"color: black; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: small;\"><span style=\"font-size: 16px;\">งานวันนี้</span></span></span></span></div>\r\n<div style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: Calibri,Arial,Helvetica,sans-serif; color: #000000;\"><span style=\"color: #212121; font-size: small;\"><span style=\"font-weight: normal; font-size: 15px;\"><span style=\"color: black; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: small;\"><span style=\"font-size: 16px;\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"color: #000000; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">ระบบโพส+คอมเม้น+รีไพล์</span><span style=\"color: #000000; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">&nbsp;50</span><span style=\"color: #000000; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">%</span></span></span></span></span></div>\r\n<div style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: Calibri,Arial,Helvetica,sans-serif; color: #000000;\"><span style=\"color: #212121; font-size: small;\"><span style=\"font-weight: normal; font-size: 15px;\"><span style=\"color: black; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: medium;\"><span style=\"font-size: 12pt;\">&nbsp;</span></span></span></span></div>\r\n<div style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: Calibri,Arial,Helvetica,sans-serif; color: #000000;\"><span style=\"color: #212121; font-size: small;\"><span style=\"font-weight: normal; font-size: 15px;\"><span style=\"color: black; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: small;\"><span style=\"font-size: 16px;\">งานวันพรุ่งนี้</span></span></span></span></div>\r\n<div style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; font-size: 16px; font-family: Calibri,Arial,Helvetica,sans-serif; color: #000000;\"><span style=\"color: #212121; font-size: small;\"><span style=\"font-weight: normal; font-size: 15px;\"><span style=\"color: black; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: small;\"><span style=\"font-size: 16px;\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"color: #000000; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">ระบบโพส+คอมเม้น+รีไพล์</span><span style=\"color: #000000; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">&nbsp;เริ่ม 20</span><span style=\"color: #000000; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">/02/2561 - 21</span><span style=\"color: #000000; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">/02/2561 50</span><span style=\"color: #000000; font-family: Calibri,Arial,Helvetica,sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\">%</span></span></span></span></span></div>\r\n<div class=\"yj6qo\">&nbsp;</div>','2018-02-20 10:11:43','2018-02-20 10:13:06'),(3,'วิธีการซื้อสินค้า','<p>9875642312</p>','2018-02-20 10:13:31','2018-02-20 10:18:54'),(4,'วิธีการชำระเงิน','<p>123456789</p>','2018-02-20 10:13:40','2018-02-20 10:18:37');
/*!40000 ALTER TABLE `staticpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `stock_id` int(20) NOT NULL,
  `product_id` int(20) DEFAULT NULL,
  `product_quantity` int(20) DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `unit_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (1,'กล่อง','T',NULL,'2018-02-20 09:09:19'),(2,'ชิ้น','T',NULL,'2018-02-20 09:09:22'),(3,'แพ็คเกจ','T','2018-02-15 10:03:13','2018-02-20 09:09:24');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Napat Osaklang','mosaklang@gmail.com','$2y$10$Kc9PlsT6EP80j5SrQglcJOJUK/LfO.Ke.LCtgIOjkU8BlGbiHHBiq','bgPpXcAZ1zYt5IOkQK8DXHWLvO07eSBfMq2phfoqnipDvOAGpXrv0tViZcOu','2018-02-12 06:09:01','2018-02-12 06:09:01'),(2,'Napat M\'ee Osaklang','dragontank_9@hotmail.com','afe434653a898da20044041262b3ac74','Jsjij4c6YU0zfMkxU1AJdmUFIZA8DOIRh4dWZtewq58GxXldayRNuI2WIoG4','2018-02-12 06:57:15','2018-02-12 06:57:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-01 22:01:51
