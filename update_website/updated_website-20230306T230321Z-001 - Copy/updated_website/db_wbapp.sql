-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_wbapp
CREATE DATABASE IF NOT EXISTS `db_wbapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_wbapp`;

-- Dumping structure for table db_wbapp.tbl_finish
CREATE TABLE IF NOT EXISTS `tbl_finish` (
  `finish_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `trans_id` int(3) NOT NULL DEFAULT 0,
  `user_id` int(3) NOT NULL DEFAULT 0,
  `finish_payment` int(9) NOT NULL DEFAULT 0,
  `finish_date_updated` date NOT NULL,
  `finish_time_updated` time NOT NULL,
  `finish_status` int(1) NOT NULL,
  PRIMARY KEY (`finish_id`),
  KEY `trans_id` (`trans_id`,`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=577 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_finish: 4 rows
/*!40000 ALTER TABLE `tbl_finish` DISABLE KEYS */;
INSERT INTO `tbl_finish` (`finish_id`, `trans_id`, `user_id`, `finish_payment`, `finish_date_updated`, `finish_time_updated`, `finish_status`) VALUES
	(565, 3795, 0, 8000, '2023-03-05', '21:36:32', 1),
	(566, 3795, 10000001, 6000, '2023-03-05', '22:34:33', 1),
	(567, 3795, 10000001, 8000, '2023-03-05', '22:34:57', 1),
	(568, 3795, 10000001, 8000, '2023-03-05', '22:35:48', 1),
	(569, 3796, 10000001, 8000, '2023-03-05', '23:05:52', 1),
	(570, 3796, 10000002, 3000, '2023-03-06', '14:46:41', 1),
	(571, 3796, 10000002, 3131231, '2023-03-06', '14:47:02', 1),
	(572, 3795, 10000001, 8000, '2023-03-06', '15:36:52', 1),
	(573, 3795, 10000001, 13112, '2023-03-06', '15:44:53', 1),
	(574, 3795, 10000002, 8000, '2023-03-06', '15:47:02', 1),
	(575, 3796, 10000001, 133, '2023-03-06', '15:48:08', 1),
	(576, 3795, 10000002, 8000, '2023-03-06', '15:49:41', 1);
/*!40000 ALTER TABLE `tbl_finish` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_job_order
CREATE TABLE IF NOT EXISTS `tbl_job_order` (
  `trans_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(180) NOT NULL DEFAULT '',
  `customer_number` varchar(180) NOT NULL DEFAULT '',
  `job_date_added` date NOT NULL,
  `job_time_added` time NOT NULL,
  `job_date_updated` date NOT NULL,
  `job_time_updated` time NOT NULL,
  `prod_status` int(1) NOT NULL DEFAULT 0,
  `type_id` int(3) NOT NULL DEFAULT 0,
  `job_price` int(9) NOT NULL DEFAULT 0,
  PRIMARY KEY (`trans_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3797 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_job_order: 2 rows
/*!40000 ALTER TABLE `tbl_job_order` DISABLE KEYS */;
INSERT INTO `tbl_job_order` (`trans_id`, `customer_name`, `customer_number`, `job_date_added`, `job_time_added`, `job_date_updated`, `job_time_updated`, `prod_status`, `type_id`, `job_price`) VALUES
	(3795, 'Kerteezy', '+63', '2023-03-03', '23:24:40', '0000-00-00', '00:00:00', 1, 301, 5000),
	(3796, 'K', '+141', '2023-03-03', '23:55:22', '0000-00-00', '00:00:00', 1, 302, 2111);
/*!40000 ALTER TABLE `tbl_job_order` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `prod_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(180) NOT NULL DEFAULT '',
  `prod_description` varchar(180) NOT NULL DEFAULT '',
  `prod_date_added` date NOT NULL,
  `prod_time_added` time NOT NULL,
  `prod_date_updated` date NOT NULL,
  `prod_time_updated` time NOT NULL,
  `prod_status` int(1) NOT NULL DEFAULT 0,
  `type_id` int(3) NOT NULL DEFAULT 0,
  `prod_price` int(9) NOT NULL DEFAULT 0,
  PRIMARY KEY (`prod_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_product: 1 rows
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_description`, `prod_date_added`, `prod_time_added`, `prod_date_updated`, `prod_time_updated`, `prod_status`, `type_id`, `prod_price`) VALUES
	(10000001, 'Kurt', 'Ass', '2023-03-04', '13:06:11', '0000-00-00', '00:00:00', 1, 301, 2111);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_product_inv
CREATE TABLE IF NOT EXISTS `tbl_product_inv` (
  `rec_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `prod_qty` int(8) NOT NULL DEFAULT 0,
  KEY `prod_id` (`prod_id`),
  KEY `rec_id` (`rec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_product_inv: 0 rows
/*!40000 ALTER TABLE `tbl_product_inv` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_inv` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_product_pricing
CREATE TABLE IF NOT EXISTS `tbl_product_pricing` (
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `prod_retail_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_product_pricing: 0 rows
/*!40000 ALTER TABLE `tbl_product_pricing` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_pricing` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_product_qty
CREATE TABLE IF NOT EXISTS `tbl_product_qty` (
  `prodqty_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `prodqty_date_added` date NOT NULL,
  `prodqty_time_added` time NOT NULL,
  `prodqty_date_updated` date NOT NULL,
  `prodqty_time_updated` time NOT NULL,
  `prodqty_quantity` int(10) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  PRIMARY KEY (`prodqty_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_product_qty: 0 rows
/*!40000 ALTER TABLE `tbl_product_qty` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_qty` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_receive
CREATE TABLE IF NOT EXISTS `tbl_receive` (
  `rec_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `rec_supplier` varchar(180) NOT NULL DEFAULT '',
  `rec_description` varchar(180) NOT NULL DEFAULT '',
  `rec_amount` int(10) NOT NULL DEFAULT 0,
  `rec_date_added` date NOT NULL,
  `rec_time_added` time NOT NULL,
  `rec_saved` int(1) NOT NULL DEFAULT 0,
  `rec_status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_receive: 2 rows
/*!40000 ALTER TABLE `tbl_receive` DISABLE KEYS */;
INSERT INTO `tbl_receive` (`rec_id`, `rec_supplier`, `rec_description`, `rec_amount`, `rec_date_added`, `rec_time_added`, `rec_saved`, `rec_status`) VALUES
	(10000001, 'K', 'Di', 3000, '2023-03-05', '15:35:44', 0, 1),
	(10000002, 'Kurt', 'Ass', 5000, '2023-03-05', '15:39:37', 0, 1);
/*!40000 ALTER TABLE `tbl_receive` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_receive_items
CREATE TABLE IF NOT EXISTS `tbl_receive_items` (
  `rec_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `rec_qty` int(8) NOT NULL DEFAULT 0,
  KEY `rec_id` (`rec_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_receive_items: 0 rows
/*!40000 ALTER TABLE `tbl_receive_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_receive_items` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_release
CREATE TABLE IF NOT EXISTS `tbl_release` (
  `rel_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `rel_customer` varchar(180) NOT NULL DEFAULT '',
  `rel_description` varchar(180) NOT NULL DEFAULT '',
  `rel_amount` int(10) NOT NULL DEFAULT 0,
  `rel_date_added` date NOT NULL,
  `rel_time_added` time NOT NULL,
  `rel_saved` int(1) NOT NULL DEFAULT 0,
  `rel_status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`rel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_release: 1 rows
/*!40000 ALTER TABLE `tbl_release` DISABLE KEYS */;
INSERT INTO `tbl_release` (`rel_id`, `rel_customer`, `rel_description`, `rel_amount`, `rel_date_added`, `rel_time_added`, `rel_saved`, `rel_status`) VALUES
	(10000001, 'K', 'Ambot', 8000, '2023-03-04', '16:26:13', 0, 1);
/*!40000 ALTER TABLE `tbl_release` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_release_inv
CREATE TABLE IF NOT EXISTS `tbl_release_inv` (
  `rel_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `prod_qty` int(8) NOT NULL DEFAULT 0,
  KEY `prod_id` (`prod_id`),
  KEY `rel_id` (`rel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_release_inv: 0 rows
/*!40000 ALTER TABLE `tbl_release_inv` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_release_inv` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_release_items
CREATE TABLE IF NOT EXISTS `tbl_release_items` (
  `rel_id` int(8) NOT NULL DEFAULT 0,
  `prod_id` int(8) NOT NULL DEFAULT 0,
  `rel_qty` int(8) NOT NULL DEFAULT 0,
  KEY `rel_id` (`rel_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_release_items: 0 rows
/*!40000 ALTER TABLE `tbl_release_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_release_items` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_type
CREATE TABLE IF NOT EXISTS `tbl_type` (
  `type_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `prod_image` varchar(180) NOT NULL DEFAULT '',
  `type_name` varchar(180) NOT NULL DEFAULT '',
  `type_date_added` date NOT NULL,
  `type_time_added` time NOT NULL,
  `type_date_updated` date NOT NULL,
  `type_time_updated` time NOT NULL,
  `type_status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=308 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_type: 7 rows
/*!40000 ALTER TABLE `tbl_type` DISABLE KEYS */;
INSERT INTO `tbl_type` (`type_id`, `prod_image`, `type_name`, `type_date_added`, `type_time_added`, `type_date_updated`, `type_time_updated`, `type_status`) VALUES
	(301, '', 'Fix', '2023-03-03', '23:18:46', '0000-00-00', '00:00:00', 1),
	(302, '', 'IDK', '2023-03-03', '23:19:03', '0000-00-00', '00:00:00', 1),
	(303, '', 'Battery', '2023-03-03', '23:20:27', '0000-00-00', '00:00:00', 1),
	(304, '', 'Charger', '2023-03-03', '23:21:25', '0000-00-00', '00:00:00', 1),
	(305, '', 'Ayambot', '2023-03-03', '23:22:13', '0000-00-00', '00:00:00', 1),
	(306, '', 'Kkk', '2023-03-03', '23:23:51', '0000-00-00', '00:00:00', 1),
	(307, '', 'Afasfs', '2023-03-04', '16:26:43', '0000-00-00', '00:00:00', 1);
/*!40000 ALTER TABLE `tbl_type` ENABLE KEYS */;

-- Dumping structure for table db_wbapp.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_date_added` date NOT NULL,
  `user_time_added` time NOT NULL,
  `user_date_updated` date NOT NULL,
  `user_time_updated` time NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_token` varchar(255) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT '',
  `prod_image` varchar(180) DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_wbapp.tbl_users: 2 rows
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_email`, `user_password`, `user_date_added`, `user_time_added`, `user_date_updated`, `user_time_updated`, `user_status`, `user_token`, `user_access`, `prod_image`) VALUES
	(10000001, 'Blasurca', 'Kurt', 'kurt@gmail.com', '123', '2023-03-04', '13:49:58', '0000-00-00', '00:00:00', 1, '', 'Sagay', ''),
	(10000002, 'Mendoza', 'Vincent', 'vince@gmail.com', '123', '2023-03-06', '14:41:25', '0000-00-00', '00:00:00', 1, '', 'Eroreco', '');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
