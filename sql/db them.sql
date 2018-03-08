-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 05:39 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ci_contact`
--

INSERT INTO `ci_contact` (`id`, `customer_name`, `company_name`, `tax_code`, `address`, `phone`, `cell_phone`, `email`, `type`, `type_payment`, `shipping_address`, `shipping_name`, `shipping_phone`, `business_man`, `file`, `comment`, `created_date`) VALUES
(1, 'customer name', 'company_name', 'TAX001', 'address', 113, 114, 'email@gmai.com', 1, 1, 'shipping address', 'shipping name', 113, '', '', 'comment', '2018-03-08 15:48:58');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
