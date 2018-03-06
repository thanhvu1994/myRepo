-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 06:43 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website`
--
CREATE DATABASE IF NOT EXISTS `website` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `website`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_banners`
--

DROP TABLE IF EXISTS `ci_banners`;
CREATE TABLE IF NOT EXISTS `ci_banners` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_banners`
--

INSERT INTO `ci_banners` (`id`, `name`, `button_name`, `url`, `image`, `type`, `publish`, `created_date`, `update_date`) VALUES
(1, 'Banner Title', 'Button Name', 'google.com', '/uploads/banners/login-register.jpg', '', 1, '2018-03-05 15:22:17', '2018-03-05 16:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `ci_categories`
--

DROP TABLE IF EXISTS `ci_categories`;
CREATE TABLE IF NOT EXISTS `ci_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_level` tinyint(4) NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_categories`
--

INSERT INTO `ci_categories` (`id`, `parent_id`, `category_name`, `title`, `description`, `url`, `slug`, `type_level`, `thumb`, `created_date`, `update_date`) VALUES
(1, 0, 'Tên danh mục', 'google.com', 'Mô tả', 'google.com', 'ten-danh-muc', 1, '', '2018-03-05 17:22:06', '2018-03-05 18:22:06'),
(2, 1, 'test', '', '', '', 'test', 2, '', '2018-03-05 17:26:53', '2018-03-05 18:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `ci_city`
--

DROP TABLE IF EXISTS `ci_city`;
CREATE TABLE IF NOT EXISTS `ci_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_coupon`
--

DROP TABLE IF EXISTS `ci_coupon`;
CREATE TABLE IF NOT EXISTS `ci_coupon` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_coupon_history`
--

DROP TABLE IF EXISTS `ci_coupon_history`;
CREATE TABLE IF NOT EXISTS `ci_coupon_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coupon_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_amount` double NOT NULL,
  `discount_amount` double NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_district`
--

DROP TABLE IF EXISTS `ci_district`;
CREATE TABLE IF NOT EXISTS `ci_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_email_templates`
--

DROP TABLE IF EXISTS `ci_email_templates`;
CREATE TABLE IF NOT EXISTS `ci_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8_unicode_ci NOT NULL,
  `parameter_description` text COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_menus`
--

DROP TABLE IF EXISTS `ci_menus`;
CREATE TABLE IF NOT EXISTS `ci_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `display_order` int(11) NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `application_id` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ci_menus`
--

INSERT INTO `ci_menus` (`id`, `parent_id`, `menu_name`, `menu_link`, `show_in_menu`, `display_order`, `icon`, `application_id`, `created_date`, `update_date`) VALUES
(1, 0, 'Menu', '', 1, 1, 'linea-icon linea-basic fa-fw', 1, '2018-03-03 16:34:16', '2018-03-03 17:34:16'),
(8, 1, 'Backmenus', 'admin/backmenus', 1, 2, '', 1, '2018-03-03 16:33:09', '2018-03-03 17:33:09'),
(9, 0, 'Banners', 'admin/banners', 1, 2, 'linea-icon linea-elaborate fa-fw', 1, '2018-03-05 14:15:30', '2018-03-05 15:15:30'),
(10, 0, 'Danh mục sản phẩm', 'admin/category', 1, 3, 'linea-icon linea-basic fa-fw', 1, '2018-03-05 16:28:30', '2018-03-05 17:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `ci_news`
--

DROP TABLE IF EXISTS `ci_news`;
CREATE TABLE IF NOT EXISTS `ci_news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_content` text COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pulish` tinyint(1) NOT NULL,
  `viewer` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_orders`
--

DROP TABLE IF EXISTS `ci_orders`;
CREATE TABLE IF NOT EXISTS `ci_orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `number_invoice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `coupon_id` bigint(20) NOT NULL,
  `type_payment` tinyint(1) NOT NULL,
  `total_payment` double NOT NULL,
  `order_date` datetime NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_order_details`
--

DROP TABLE IF EXISTS `ci_order_details`;
CREATE TABLE IF NOT EXISTS `ci_order_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_option_value_id` bigint(20) NOT NULL,
  `product_sub_option_value_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_pages`
--

DROP TABLE IF EXISTS `ci_pages`;
CREATE TABLE IF NOT EXISTS `ci_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `short_content` text COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumint(9) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_partner`
--

DROP TABLE IF EXISTS `ci_partner`;
CREATE TABLE IF NOT EXISTS `ci_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_producer`
--

DROP TABLE IF EXISTS `ci_producer`;
CREATE TABLE IF NOT EXISTS `ci_producer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_products`
--

DROP TABLE IF EXISTS `ci_products`;
CREATE TABLE IF NOT EXISTS `ci_products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `sale_price` double NOT NULL,
  `status` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_product_categories`
--

DROP TABLE IF EXISTS `ci_product_categories`;
CREATE TABLE IF NOT EXISTS `ci_product_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_product_images`
--

DROP TABLE IF EXISTS `ci_product_images`;
CREATE TABLE IF NOT EXISTS `ci_product_images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_product_option`
--

DROP TABLE IF EXISTS `ci_product_option`;
CREATE TABLE IF NOT EXISTS `ci_product_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Color, Size',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_product_option_value`
--

DROP TABLE IF EXISTS `ci_product_option_value`;
CREATE TABLE IF NOT EXISTS `ci_product_option_value` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_option_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_product_price`
--

DROP TABLE IF EXISTS `ci_product_price`;
CREATE TABLE IF NOT EXISTS `ci_product_price` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `product_option_value_id` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_settings`
--

DROP TABLE IF EXISTS `ci_settings`;
CREATE TABLE IF NOT EXISTS `ci_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

DROP TABLE IF EXISTS `ci_users`;
CREATE TABLE IF NOT EXISTS `ci_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(1) NOT NULL,
  `application_id` tinyint(1) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `verify_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_first_login` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `role_id`, `application_id`, `username`, `email`, `password`, `password_hash`, `first_name`, `last_name`, `full_name`, `phone`, `gender`, `verify_code`, `is_first_login`, `status`, `created_date`, `update_date`) VALUES
(1, 1, 1, 'admin', 'lucjfer0047@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lucjer', 'Devil', 'Lucjer Devil', '114', 'Nam', '', 0, 1, '2018-03-01 15:49:21', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
