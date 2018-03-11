-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 06:07 PM
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
  `created_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_banners`
--

INSERT INTO `ci_banners` (`id`, `name`, `button_name`, `url`, `image`, `type`, `publish`, `created_date`, `update_date`) VALUES
(1, 'Title', 'Button Name', 'google.com', '/uploads/banners/login-register.jpg', '', 1, '2018-03-11 01:05:37', '2018-03-09 17:17:12'),
(2, 'Title 2', 'Button Name 2', 'google.com', '/uploads/banners/350d15c512f63a53b45a83362d3873ca.jpg', '', 1, '2018-03-11 01:32:49', '2018-03-10 19:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `ci_billing_address`
--

DROP TABLE IF EXISTS `ci_billing_address`;
CREATE TABLE IF NOT EXISTS `ci_billing_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `cell_phone` int(11) NOT NULL,
  `identity_card` int(11) NOT NULL,
  `more_info` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

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
  `display_order` int(11) NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `ci_categories`
--

INSERT INTO `ci_categories` (`id`, `parent_id`, `category_name`, `title`, `description`, `url`, `slug`, `type_level`, `thumb`, `display_order`, `language`, `created_date`, `update_date`) VALUES
(3, 0, 'Trang chủ', '', '', 'sites/index', '', 1, '', 1, 'vn', '2018-03-10 23:37:24', '2018-03-10 17:37:24'),
(4, 0, 'Giới thiệu', '', '', 'sites/index', 'gioi-thieu', 1, '', 2, 'vn', '2018-03-10 23:11:56', '2018-03-10 09:19:09'),
(5, 0, 'Sản phẩm', '', '', 'sites/index', 'san-pham', 1, '', 3, 'vn', '2018-03-10 23:11:56', '2018-03-10 09:19:21'),
(6, 0, 'Catelogue', '', '', 'sites/index', 'catelogue', 1, '', 4, 'vn', '2018-03-10 23:11:57', '2018-03-10 09:19:36'),
(7, 0, 'Chính sách khách hàng', '', '', 'sites/index', 'chinh-sach-khach-hang', 1, '', 5, 'vn', '2018-03-10 23:11:58', '2018-03-10 09:19:57'),
(8, 0, 'Tin tức', '', '', 'sites/index', 'tin-tuc', 1, '', 6, 'vn', '2018-03-10 23:11:58', '2018-03-10 09:20:05'),
(9, 0, 'Tuyển dụng', '', '', 'sites/index', 'tuyen-dung', 1, '', 7, 'vn', '2018-03-10 23:11:58', '2018-03-10 09:20:19'),
(10, 0, 'Liên hệ', '', '', 'sites/index', 'lien-he', 1, '', 8, 'vn', '2018-03-10 23:12:00', '2018-03-10 09:20:31'),
(23, 4, 'Quan hệ hợp tác', '', '', 'pages/test-1', 'quan-he-hop-tac', 2, '', 0, 'vn', '2018-03-10 18:16:41', '2018-03-10 18:16:41'),
(24, 23, 'test', '', '', 'pages/Test 123456', '', 3, '/uploads/categories/a44e63bdebec0921b5e5a8755d8febd2.jpg', 0, 'vn', '2018-03-11 14:21:50', '2018-03-11 08:21:50');

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
-- Table structure for table `ci_contact`
--

DROP TABLE IF EXISTS `ci_contact`;
CREATE TABLE IF NOT EXISTS `ci_contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `cell_phone` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1: Đặt hàng, 2: Báo giá',
  `type_payment` tinyint(1) NOT NULL COMMENT '1: tiền mặt, 2: chuyển khoản',
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_phone` int(11) NOT NULL,
  `business_man` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_contact`
--

INSERT INTO `ci_contact` (`id`, `customer_name`, `company_name`, `tax_code`, `address`, `phone`, `cell_phone`, `email`, `type`, `type_payment`, `shipping_address`, `shipping_name`, `shipping_phone`, `business_man`, `file`, `comment`, `created_date`) VALUES
(1, 'customer name', 'company_name', 'TAX001', 'address', 113, 114, 'email@gmai.com', 1, 1, 'shipping address', 'shipping name', 113, '', '', 'comment', '2018-03-08 15:48:58'),
(2, '1', '', '', '1', 1131, 113, 'lucjfer0407@gmail.com', 0, 0, '', '', 0, '', '/uploads/contact/ee8f716f236ee81a7bd21c295ff936f2.jpg', 'ghi chú', '2018-03-10 07:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `ci_contact_info_product`
--

DROP TABLE IF EXISTS `ci_contact_info_product`;
CREATE TABLE IF NOT EXISTS `ci_contact_info_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `color_id` bigint(20) NOT NULL,
  `thin_id` bigint(20) NOT NULL,
  `width_id` bigint(20) NOT NULL,
  `height_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `contact_Id` bigint(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ci_menus`
--

INSERT INTO `ci_menus` (`id`, `parent_id`, `menu_name`, `menu_link`, `show_in_menu`, `display_order`, `icon`, `application_id`, `created_date`, `update_date`) VALUES
(1, 0, 'Menu', '', 1, 1, 'linea-icon linea-basic fa-fw', 1, '2018-03-03 16:34:16', '2018-03-03 17:34:16'),
(8, 1, 'Backmenus', 'admin/backmenus', 1, 2, '', 1, '2018-03-03 16:33:09', '2018-03-03 17:33:09'),
(9, 11, 'Banners', 'admin/banners', 1, 2, 'linea-icon linea-elaborate fa-fw', 1, '2018-03-06 15:36:57', '2018-03-06 16:36:57'),
(10, 0, 'Danh mục sản phẩm', 'admin/category', 1, 3, 'linea-icon linea-basic fa-fw', 1, '2018-03-05 16:28:30', '2018-03-05 17:28:30'),
(11, 0, 'Quản lý trang chủ', '', 1, 3, '', 1, '2018-03-06 14:42:32', '2018-03-06 15:42:32'),
(12, 11, 'Đối tác', 'admin/partners', 1, 3, '', 1, '2018-03-06 14:43:26', '2018-03-06 15:43:26'),
(13, 0, 'Chỉnh sửa website', 'admin/system', 1, 5, '', 1, '2018-03-07 13:33:50', '2018-03-07 14:33:50'),
(14, 0, 'Quản lý sản phầm', '', 1, 1, '', 1, '2018-03-07 16:42:49', '2018-03-07 17:42:49'),
(15, 14, 'Màu sắc', 'admin/color', 1, 1, '', 1, '2018-03-07 16:43:40', '2018-03-07 17:43:40'),
(16, 14, 'Liên hệ', 'admin/contactOrder', 1, 10, '', 1, '2018-03-08 15:40:43', '2018-03-08 16:40:43');

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
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_partner`
--

INSERT INTO `ci_partner` (`id`, `name`, `description`, `name_en`, `description_en`, `logo`, `url`, `publish`, `created_date`, `update_date`) VALUES
(1, 'đối tác 1', 'mô tả', 'client', 'desc', '/uploads/partners/bl31.jpg', 'google.com', 1, '2018-03-09 16:20:42', '2018-03-09 17:20:42'),
(2, 'client 2', '', 'client 2', '', '/uploads/partners/studio4.jpg', 'google.com', 1, '2018-03-10 09:04:17', '2018-03-10 10:04:17'),
(3, 'client 3', '', 'client 3', '', '/uploads/partners/studio11.jpg', 'google.com', 1, '2018-03-10 09:04:34', '2018-03-10 10:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `ci_posts`
--

DROP TABLE IF EXISTS `ci_posts`;
CREATE TABLE IF NOT EXISTS `ci_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_posts`
--

INSERT INTO `ci_posts` (`id`, `title`, `description`, `short_content`, `content`, `featured_image`, `slug`, `type`, `language`, `created_date`) VALUES
(1, 'Test 1', 'Description Test 123', 'Des test 1', '<p>Content Test 1</p>', '/uploads/posts/41.jpg', 'test-1', 'page', 'en', '2018-03-05 23:57:22'),
(2, 'Test 123456', 'Test 123456', 'Test 123456', 'Test 123456', 'Test 123456', 'Test 123456', 'page', 'en', '2018-03-06 23:40:18'),
(3, 'Test 123123', 'Test 123123', 'Test 123123', '<p>Test 123123</p>', '/uploads/posts/7.jpg', 'test-7', 'page', 'en', '2018-03-08 00:39:20');

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
  `short_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `sale_price` double NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ci_products`
--

INSERT INTO `ci_products` (`id`, `product_code`, `product_name`, `title`, `slug`, `feature`, `description`, `meta_description`, `short_content`, `content`, `price`, `sale_price`, `language`, `status`, `update_date`, `created_date`) VALUES
(2, 'P090320180002', 'Product 02', 'Product 02', 'product-0002', 1, 'Product 02', 'Product 02', 'Product 02', '<p>Product 02</p>', 50000, 45000, 'en', 1, '0000-00-00 00:00:00', '2018-03-10 10:59:23'),
(3, 'P100320180003', 'Product 03', 'Product 03', 'product-0003', 0, 'Product 03', 'Product 03', '', '<p>Product 03</p>', 5000, 4000, '', 1, '0000-00-00 00:00:00', '2018-03-10 09:54:28'),
(4, 'P100320180004', 'Product 04', 'Product 04', 'product-0004', 1, 'Product 04', 'Product 04', '', '<p>Product 04</p>', 5000, 4500, '', 0, '0000-00-00 00:00:00', '2018-03-10 09:54:15'),
(5, 'P100320180005', 'Product 05', 'Product 05', 'product-0005', 1, 'Product 05', 'Product 05', '', '<p>Product 05</p>', 50000, 44999, '', 1, '0000-00-00 00:00:00', '2018-03-10 08:07:36'),
(6, 'P100320180006', 'Product 06', 'Product 06', 'product-0006', 1, 'Product 06', 'Product 06', '', '<p>Product 06</p>', 50000, 50000, '', 1, '0000-00-00 00:00:00', '2018-03-10 09:47:09');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `ci_product_images`
--

INSERT INTO `ci_product_images` (`id`, `product_id`, `image`, `created_date`) VALUES
(19, 2, '/uploads/products/3.jpg', '2018-03-10 01:26:04'),
(20, 2, '/uploads/products/4.jpg', '2018-03-10 01:26:04'),
(21, 3, '/uploads/products/6.jpg', '2018-03-10 01:51:38'),
(22, 3, '/uploads/products/7.jpg', '2018-03-10 01:51:38'),
(23, 4, '/uploads/products/8.jpg', '2018-03-10 01:54:05'),
(24, 4, '/uploads/products/9.jpg', '2018-03-10 01:54:05'),
(25, 5, '/uploads/products/2.jpg', '2018-03-10 02:07:36'),
(26, 6, '/uploads/products/12.jpg', '2018-03-10 04:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `ci_product_option`
--

DROP TABLE IF EXISTS `ci_product_option`;
CREATE TABLE IF NOT EXISTS `ci_product_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Color, Size',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `ci_product_option`
--

INSERT INTO `ci_product_option` (`id`, `product_id`, `name`, `created_date`) VALUES
(19, '5', 'Color', '2018-03-10 02:07:36'),
(20, '5', 'Size', '2018-03-10 02:07:36'),
(29, '4', 'Size', '2018-03-10 03:54:14'),
(30, '4', 'Width', '2018-03-10 03:54:15'),
(31, '3', 'Color', '2018-03-10 03:54:27'),
(32, '3', 'Mertirial', '2018-03-10 03:54:27'),
(33, '2', 'Color', '2018-03-10 04:59:22'),
(34, '2', 'Size', '2018-03-10 04:59:22'),
(35, '2', 'Color', '2018-03-10 04:59:23'),
(36, '2', 'Size', '2018-03-10 04:59:23'),
(37, '2', 'Test', '2018-03-10 04:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `ci_product_option_value`
--

DROP TABLE IF EXISTS `ci_product_option_value`;
CREATE TABLE IF NOT EXISTS `ci_product_option_value` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `ci_product_option_value`
--

INSERT INTO `ci_product_option_value` (`id`, `product_id`, `product_option_id`, `name`) VALUES
(5, 0, 5, 'Black;White'),
(6, 0, 6, 'M;L'),
(7, 0, 7, 'Black;White'),
(8, 0, 8, 'M;L'),
(9, 0, 9, ''),
(10, 0, 10, 'Black'),
(11, 0, 11, 'Wood'),
(12, 0, 12, 'M;L'),
(13, 0, 13, ''),
(19, 5, 19, 'Black'),
(20, 5, 20, 'M'),
(29, 4, 29, 'M;L'),
(30, 4, 30, ''),
(31, 3, 31, 'Black'),
(32, 3, 32, 'Wood'),
(33, 2, 33, 'Black;White'),
(34, 2, 34, 'M;L'),
(35, 2, 35, 'Black;White'),
(36, 2, 36, 'M;L'),
(37, 2, 37, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=307 ;

--
-- Dumping data for table `ci_settings`
--

INSERT INTO `ci_settings` (`id`, `key`, `value`, `created_date`) VALUES
(289, 'logoFE', '/uploads/system/landscape6.jpg', '2018-03-10 09:02:08'),
(290, 'favicon', '/uploads/system/chair2.jpg', '2018-03-10 09:02:08'),
(291, 'logoBE', '/uploads/system/bl5.jpg', '2018-03-10 09:02:08'),
(292, 'defaultPageTitle', 'Lucjfer', '2018-03-10 09:02:08'),
(293, 'copyrightOnFooter', 'Copyright 2014 - 2018 www.namvietplastic.com', '2018-03-10 09:02:08'),
(294, 'googleAnalytics', 'googleAnalytics', '2018-03-10 09:02:08'),
(295, 'facebook', 'https://www.facebook.com/', '2018-03-10 09:02:08'),
(296, 'googleplus', 'https://google.com/', '2018-03-10 09:02:08'),
(297, 'twitter', '', '2018-03-10 09:02:09'),
(298, 'youtube', 'https://youtube.com/', '2018-03-10 09:02:09'),
(299, 'instagram', '', '2018-03-10 09:02:09'),
(300, 'pinterest', '', '2018-03-10 09:02:09'),
(301, 'linkedin', '', '2018-03-10 09:02:09'),
(302, 'companyAddress', 'tp hcm', '2018-03-10 09:02:09'),
(303, 'companyAddress_en', '', '2018-03-10 09:02:09'),
(304, 'companyCellPhone', '0162706224', '2018-03-10 09:02:09'),
(305, 'companyPhone', '08.0000000', '2018-03-10 09:02:10'),
(306, 'companyEmail', 'lucjfer0407@gmail.com', '2018-03-10 09:02:10');

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
  `birth_date` date NOT NULL,
  `verify_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_first_login` tinyint(1) NOT NULL,
  `avarta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `role_id`, `application_id`, `username`, `email`, `password`, `password_hash`, `first_name`, `last_name`, `full_name`, `phone`, `gender`, `birth_date`, `verify_code`, `is_first_login`, `avarta`, `background`, `status`, `created_date`, `update_date`) VALUES
(1, 1, 1, 'admin', 'lucjfer0407@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lucjer', 'Devil', 'Lucjer Devil', '115', 'Nam', '0000-00-00', '', 0, '/uploads/admin/studio2.jpg', '/uploads/admin/landscape3.jpg', 1, '2018-03-09 16:03:50', '0000-00-00 00:00:00'),
(2, 0, 2, '', 'lucjfer0407@gmail.com', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 'ho', 'ten', 'ho ten', '', 'Nam', '2018-01-01', '', 0, '', '', 0, '2018-03-11 12:59:10', '2018-03-11 11:10:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
