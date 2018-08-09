/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:3306
 Source Schema         : fl_medicaviva

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 29/06/2018 08:59:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
BEGIN;
INSERT INTO `admin_users` VALUES (1, 'Napat Osaklang', 'mosaklang@gmail.com', '$2y$10$lEIyirbiNKgPULWjpnXyq.MkJBcQyti2mkLcZGXcWxtMA10ggJ2Ci', NULL, '2018-02-13 15:11:11', '2018-02-13 15:11:11');
INSERT INTO `admin_users` VALUES (2, 'web master', 'webmaster@webmaster.com', '$2y$10$BdoeHcHMpsOuFwfR3ij71eQzTFA1QSwFxm.FT3KKlIqV6eWt2aTx.', NULL, '2018-03-04 14:40:30', '2018-03-04 14:40:30');
INSERT INTO `admin_users` VALUES (3, 'web master', 'webmaster', '$2y$10$BdoeHcHMpsOuFwfR3ij71eQzTFA1QSwFxm.FT3KKlIqV6eWt2aTx.', NULL, '2018-03-04 14:40:30', '2018-03-04 14:40:30');
INSERT INTO `admin_users` VALUES (4, 'kat', 'webmaster@webmaster.webmaster', '$2y$10$Xx.A24ofI7z8Xb7YFtlL5eTGusCcpO/t5iJuUofeS1sde1ux5N8P.', 'ZiXGZ72bqmcwmWWWF3KS242eoYkzKEHOoDSYO4fc5THX9ItMD7DfskizzC7A', '2018-03-06 12:40:01', '2018-03-06 12:40:01');
COMMIT;

-- ----------------------------
-- Table structure for agents
-- ----------------------------
DROP TABLE IF EXISTS `agents`;
CREATE TABLE `agents` (
  `agent_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agent_firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agent_lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `google_latitute_longtitute` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'T',
  `agent_line_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of agents
-- ----------------------------
BEGIN;
INSERT INTO `agents` VALUES (1, 'อมรรัตน์', 'สอนวงษา', 'จ.เพชรบูรณ์ อ.หล่มสัก', '1234.25 2356.54', '2018-02-15 16:17:19', '2018-06-21 14:47:43', 'T', 'laserps');
INSERT INTO `agents` VALUES (2, 'เชอปราง', 'บีเอนเคสี่แปด', 'กรุงเทพฯ', '4568.21 3659.21', '2018-02-15 16:18:23', '2018-06-01 17:27:18', 'T', NULL);
COMMIT;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `bank_id` int(20) NOT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO `category` VALUES (1, 'ครีมบำรุงผิว', 'T', '2018-02-15 15:10:47', '2018-02-15 15:40:45');
INSERT INTO `category` VALUES (2, 'ครีมกันแดด', 'T', '2018-02-15 15:10:47', '2018-02-15 15:10:33');
INSERT INTO `category` VALUES (3, 'แป้งพัฟ', 'T', '2018-02-15 15:10:47', NULL);
INSERT INTO `category` VALUES (4, 'สเปรย์', 'T', '2018-02-15 15:10:47', NULL);
COMMIT;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
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

-- ----------------------------
-- Table structure for customer_address
-- ----------------------------
DROP TABLE IF EXISTS `customer_address`;
CREATE TABLE `customer_address` (
  `customer_address_id` int(20) NOT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `district_id` int(20) DEFAULT NULL,
  `amphur_id` int(20) DEFAULT NULL,
  `province_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`customer_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for export
-- ----------------------------
DROP TABLE IF EXISTS `export`;
CREATE TABLE `export` (
  `export_id` int(20) NOT NULL,
  `product_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `export_quantity` int(20) DEFAULT NULL,
  `export_date` timestamp NULL DEFAULT NULL,
  `supplyer_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`export_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for export_type
-- ----------------------------
DROP TABLE IF EXISTS `export_type`;
CREATE TABLE `export_type` (
  `export_type_id` int(10) NOT NULL,
  `export_type_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`export_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for facebook_login
-- ----------------------------
DROP TABLE IF EXISTS `facebook_login`;
CREATE TABLE `facebook_login` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of facebook_login
-- ----------------------------
BEGIN;
INSERT INTO `facebook_login` VALUES (2, '1829917943685539', 'facebook', '2018-02-12 13:57:15', '2018-02-12 13:57:15');
COMMIT;

-- ----------------------------
-- Table structure for import
-- ----------------------------
DROP TABLE IF EXISTS `import`;
CREATE TABLE `import` (
  `import_id` int(20) NOT NULL,
  `product_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `import_quantity` int(20) DEFAULT NULL,
  `import_date` timestamp NULL DEFAULT NULL,
  `supplyer_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`import_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for import_type
-- ----------------------------
DROP TABLE IF EXISTS `import_type`;
CREATE TABLE `import_type` (
  `import_type_id` int(10) NOT NULL,
  `import_type_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`import_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (5, '2014_10_12_000000_create_admin_users_table', 1);
INSERT INTO `migrations` VALUES (6, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (7, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (8, '2018_01_27_183325_create_admin_password_resets_table', 1);
INSERT INTO `migrations` VALUES (9, '2018_02_12_125702_create_social_facebook_accounts_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(20) NOT NULL,
  `order_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
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

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1, 'VIVA WHITE SERUM VER 2.0', 1, 1590.00, 1590.00, 'Medica Viva', '1529596811_viva_perfect_skin_powder_spf30_pa+++.jpg', 'T', 1, '2018-02-14 15:32:50', '2018-06-21 16:00:13');
INSERT INTO `products` VALUES (2, 'VIVA Total Sun Screen SPF50+ PA++++', 1, 690.00, 690.00, 'Medica Viva', '1529596832_viva_skin_booster.jpg', 'T', 1, '2018-02-14 15:33:35', '2018-06-21 16:00:34');
INSERT INTO `products` VALUES (3, 'VIVA WHITE SERUM VER 2.0 +Total Sun Screen SPF 50+ PA++++', 1, 2280.00, 2280.00, 'Medica Viva', '1529596847_viva_total_sunscreen_spf50+_pa++++.jpg', 'T', 2, '2018-02-14 15:34:15', '2018-06-21 16:00:48');
INSERT INTO `products` VALUES (4, 'Viva Skin Booster ครีมชุ่มชื้น', 2, 1090.00, 1090.00, 'Medica Viva', '1520173684_3p.jpg', 'T', 2, '2018-02-14 15:34:52', '2018-03-04 14:44:37');
INSERT INTO `products` VALUES (5, 'VIVA Skin Balance Essene น้ำตบวิว่า', 1, 1090.00, 1090.00, 'Medica Viva', NULL, 'T', 1, '2018-02-14 15:35:33', '2018-02-14 16:43:24');
INSERT INTO `products` VALUES (6, 'เซ็ทรักษา ฝ้า กระ ใช้ครีมแรงๆหรือยาคลินิกมา', 1, 3370.00, 3370.00, 'Medica Viva', NULL, 'T', 1, '2018-02-14 15:36:09', NULL);
INSERT INTO `products` VALUES (7, 'แป้งพัฟทาหน้า VIVA Perfect Skin Powder SPF30 PA+++ (เบอร์ 01)', 1, 790.00, 790.00, 'Medica Viva', NULL, 'T', 1, '2018-02-14 15:36:49', NULL);
INSERT INTO `products` VALUES (8, 'แป้งพัฟทาหน้า VIVA Perfect Skin Powder SPF30 PA+++ (เบอร์ 02)', 1, 790.00, 790.00, 'Medica Viva', NULL, 'T', 1, '2018-02-14 15:37:34', NULL);
INSERT INTO `products` VALUES (9, 'สวยชุดใหญ่ ครบเซ็ต สินค้า 5 รายการ (น้ำตบ เซรั่ม บูส กันแดด แป้งเบอร์01)', 1, 4790.00, 4790.00, 'Medica Viva', NULL, 'T', 1, '2018-02-14 15:38:13', NULL);
INSERT INTO `products` VALUES (11, 'Medica VIVA UV Powder SPF15', 1, 790.00, 790.00, 'Medica Viva', NULL, 'T', 2, '2018-03-08 12:52:05', NULL);
COMMIT;

-- ----------------------------
-- Table structure for staticpage
-- ----------------------------
DROP TABLE IF EXISTS `staticpage`;
CREATE TABLE `staticpage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of staticpage
-- ----------------------------
BEGIN;
INSERT INTO `staticpage` VALUES (1, 'เกี่ยวกับเรา', '<p>เกี่ยวกับเรา</p>', '2018-02-20 16:53:37', '2018-03-04 14:24:22');
INSERT INTO `staticpage` VALUES (2, 'ติดต่อเรา', '<p>ติดต่อเรา</p>', '2018-02-20 17:11:43', '2018-03-04 14:24:32');
INSERT INTO `staticpage` VALUES (3, 'วิธีการซื้อสินค้า', '<p>วิธีการซื้อสินค้า</p>', '2018-02-20 17:13:31', '2018-03-04 14:24:10');
INSERT INTO `staticpage` VALUES (4, 'วิธีการชำระเงิน', '<p>วิธีการชำระเงิน</p>', '2018-02-20 17:13:40', '2018-03-04 14:24:44');
COMMIT;

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stock_id` int(20) NOT NULL,
  `product_id` int(20) DEFAULT NULL,
  `product_quantity` int(20) DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `unit_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of unit
-- ----------------------------
BEGIN;
INSERT INTO `unit` VALUES (1, 'กล่อง', 'T', NULL, '2018-03-04 14:43:03');
INSERT INTO `unit` VALUES (2, 'ชิ้น', 'T', NULL, '2018-02-20 16:09:22');
INSERT INTO `unit` VALUES (3, 'แพ็คเกจ', 'T', '2018-02-15 17:03:13', '2018-02-20 16:09:24');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `sex` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Napat Osaklang', 'mosaklang@gmail.com', '$2y$10$Kc9PlsT6EP80j5SrQglcJOJUK/LfO.Ke.LCtgIOjkU8BlGbiHHBiq', NULL, '137 ม.9\r\nต.มะเริง\r\nอ.เมือง\r\nจ.นครราชสีมา\r\nปณ.30000', 'M', 28, '0917161124', 'bgPpXcAZ1zYt5IOkQK8DXHWLvO07eSBfMq2phfoqnipDvOAGpXrv0tViZcOu', 'T', '2018-02-12 13:09:01', '2018-03-06 16:43:31');
INSERT INTO `users` VALUES (2, 'Napat M\'ee Osaklang', 'dragontank_9@hotmail.com', 'afe434653a898da20044041262b3ac74', NULL, '137 ม.9\r\nต.มะเริง\r\nอ.เมือง\r\nจ.นครราชสีมา\r\nปณ.30000', 'M', 28, '0917161124', 'Jsjij4c6YU0zfMkxU1AJdmUFIZA8DOIRh4dWZtewq58GxXldayRNuI2WIoG4', 'T', '2018-02-12 13:57:15', '2018-03-06 16:43:48');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
