-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 05:01 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_banners`
--

INSERT INTO `ci_banners` (`id`, `name`, `button_name`, `url`, `image`, `type`, `publish`, `created_date`, `update_date`) VALUES
(1, 'TÔN NHỰA LẤY SÁNG', '', '', '/uploads/banners/83f46fb22237bd7c1994aa6debad6bc2.jpg', '', 1, '2018-03-12 16:37:43', '2018-03-12 10:37:43'),
(2, '', 'Button Name 2', 'google.com', '/uploads/banners/f350222dca4b7a784f4adbde5df82479.jpg', '', 1, '2018-03-12 16:45:01', '2018-03-12 10:45:01'),
(3, 'CÔNG TRÌNH NHÀ KÍNH NÔNG NGHIỆP', 'Đặt hàng Online', '', '/uploads/banners/1e202c9943ba4b5f6dc9deea62c5355e.jpg', '', 1, '2018-03-12 16:38:57', '2018-03-12 10:38:57');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `ci_categories`
--

INSERT INTO `ci_categories` (`id`, `parent_id`, `category_name`, `title`, `description`, `url`, `slug`, `type_level`, `thumb`, `display_order`, `language`, `type`, `created_date`, `update_date`) VALUES
(3, 0, 'Trang chủ', '', '', 'sites/index', '', 1, '', 1, 'vn', 'menu', '2018-03-12 14:47:55', '2018-03-10 17:37:24'),
(4, 0, 'Giới thiệu', '', '', 'sites/index', 'gioi-thieu', 1, '', 2, 'vn', 'menu', '2018-03-12 14:47:57', '2018-03-10 09:19:09'),
(5, 0, 'Sản phẩm', '', '', 'sites/index', 'san-pham', 1, '', 3, 'vn', 'menu', '2018-03-12 14:48:03', '2018-03-10 09:19:21'),
(6, 0, 'Catelogue', '', '', 'sites/index', 'catelogue', 1, '', 4, 'vn', 'menu', '2018-03-12 14:47:57', '2018-03-10 09:19:36'),
(7, 0, 'Chính sách khách hàng', '', '', 'sites/index', 'chinh-sach-khach-hang', 1, '', 5, 'vn', 'menu', '2018-03-12 14:47:58', '2018-03-10 09:19:57'),
(8, 0, 'Tin tức', '', '', 'sites/index', 'tin-tuc', 1, '', 6, 'vn', 'menu', '2018-03-12 14:47:58', '2018-03-10 09:20:05'),
(9, 0, 'Tuyển dụng', '', '', 'sites/index', 'tuyen-dung', 1, '', 7, 'vn', 'menu', '2018-03-12 14:48:01', '2018-03-10 09:20:19'),
(10, 0, 'Liên hệ', '', '', 'sites/index', 'lien-he', 1, '', 8, 'vn', 'menu', '2018-03-12 14:47:59', '2018-03-10 09:20:31'),
(23, 4, 'Quan hệ hợp tác', '', '', 'pages/test-1', 'quan-he-hop-tac', 2, '', 0, 'vn', 'menu', '2018-03-12 14:47:59', '2018-03-10 18:16:41'),
(24, 23, 'test', '', '', 'pages/Test 123456', '', 3, '/uploads/categories/a44e63bdebec0921b5e5a8755d8febd2.jpg', 0, 'vn', 'menu', '2018-03-12 14:48:01', '2018-03-11 08:21:50'),
(25, 31, 'Tấm lợp lấy sáng POLYCARBONATE', 'TẤM LỢP LẤY SÁNG POLYCARBONATE', 'Tấm nhựa Polycarbonate được sử dụng làm tấm lợp lấy sáng cho các công trình xây dựng... Sản xuất từ nhựa nguyên sinh của Bayer (Đức), có lớp phủ chống tia UV', '0', '', 2, '/uploads/categories/6b1c7719a3c81edce3530bf15ce4cf30.png', 0, 'vn', 'category', '2018-03-12 11:02:51', '2018-03-12 11:06:49'),
(26, 31, 'Tôn nhựa lấy sáng', 'TÔN NHỰA LẤY SÁNG', 'Tôn nhựa lấy sáng Polycarbonate Nicelight được định hình thành dạng nhiều dạng sóng khác nhau, tương thích với tất cả các loại tôn kẽm trên thị trường.', '0', '', 2, '/uploads/categories/880cf5f8297a22f0cb455fad0771597c.png', 0, 'vn', 'category', '2018-03-12 11:03:42', '2018-03-12 11:07:04'),
(27, 31, 'Mái che CANOFIX', 'MÁI CHE CANOFIX', 'Mái che lấy sáng Canofix nhập khẩu từ Hàn Quốc, kiểu dáng sang trọng, tinh tế, nhiều màu sắc để lựa chọn. Dễ dàng thi công và lắp đặt cho mọi công trình', '0', '', 2, '/uploads/categories/32e5783fdaa22ff7dbdb2c6ce8ea8d4e.png', 0, 'vn', 'category', '2018-03-12 11:04:33', '2018-03-12 11:09:55'),
(28, 31, 'Phụ kiện', 'PHỤ KIỆN', 'Cung cấp đa dạng phụ kiện khác nhau như nẹp nhựa chữ H, U, khung mái che Canofix trợ giúp cho việc lắp đặt, bảo trì, bảo dưỡng tấm lấy sáng Polycarbonate', '0', 'phU-kiEn', 2, '/uploads/categories/04d4f3aa91d087ad25970520c0a444a5.png', 0, 'vn', 'category', '2018-03-12 11:06:10', '2018-03-12 11:06:10'),
(29, 31, 'Sản phẩm PC định hình', 'SẢN PHẨM PC ĐỊNH HÌNH', 'Đây là dạng tấm nhựa Polycarbonate được định hình thành khối 3D (khối kim tự tháp, khối bán cầu,…), sử dụng phổ biến trong các công trình mái lấy sáng, giếng trời', '0', 'sAn-phAm-pc-DjInh-hInh', 2, '/uploads/categories/a2948e9e03564c55af3f7bdd8c2f8be7.png', 0, 'vn', 'category', '2018-03-12 11:10:31', '2018-03-12 11:10:31'),
(30, 31, 'Dịch vụ tư vấn & lắp đặt', 'DỊCH VỤ TƯ VẤN & LẮP ĐẶT', 'Công ty chúng tôi nhận tư vấn, thi công các công trình lắp đặt mái che lấy sáng sử dụng tấm polycarbonate trong các công trình công nghiệp và dân dụng', '0', '', 2, '/uploads/categories/a3d4ced996c29fb7ab6f648ab799cbe3.png', 0, 'vn', 'category', '2018-03-12 11:13:42', '2018-03-12 11:14:06'),
(31, 0, 'Sản phẩm', 'Sản phẩm', '', '0', 'san-pham', 1, '', 0, 'vn', 'category', '2018-03-12 11:35:36', '2018-03-12 11:35:36'),
(32, 5, 'Tấm lấy sáng Polycarbonate', 'Tấm lấy sáng Polycarbonate', '', '0', 'tam-lay-sang-polycarbonate', 2, '', 0, 'vn', 'menu', '2018-03-12 11:49:24', '2018-03-12 11:49:24'),
(33, 5, 'Mái che lấy sáng', 'Mái che lấy sáng', '', '0', 'mai-che-lay-sang', 2, '', 0, 'vn', 'menu', '2018-03-12 11:49:37', '2018-03-12 11:49:37'),
(34, 5, 'Tôn nhựa lấy sáng Polycarbonate', 'Tôn nhựa lấy sáng Polycarbonate', '', '0', 'ton-nhua-lay-sang-polycarbonate', 2, '', 0, 'vn', 'menu', '2018-03-12 11:49:57', '2018-03-12 11:49:57'),
(35, 5, 'Phụ kiện', 'Phụ kiện', '', '0', 'phu-kien', 2, '', 0, 'vn', 'menu', '2018-03-12 11:50:09', '2018-03-12 11:50:09'),
(36, 5, 'Dịch vụ tư vấn & lắp đặt', 'Dịch vụ tư vấn & lắp đặt', '', '0', 'dich-vu-tu-van-lap-djat', 2, '', 0, 'vn', 'menu', '2018-03-12 11:50:19', '2018-03-12 11:50:19'),
(37, 5, 'Sản phẩm PC định hình', 'Sản phẩm PC định hình', '', '0', 'san-pham-pc-djinh-hinh', 2, '', 0, 'vn', 'menu', '2018-03-12 11:50:27', '2018-03-12 11:50:27'),
(38, 32, 'Tấm lợp lấy sáng Polycarbonate đặc ruột 	', 'Tấm lợp lấy sáng Polycarbonate đặc ruột 	', '', '0', 'tam-lop-lay-sang-polycarbonate-djac-ruot', 3, '', 0, 'vn', 'menu', '2018-03-12 11:50:59', '2018-03-12 11:50:59'),
(39, 32, 'Tấm lấy sáng Polycarbonate rỗng 	', 'Tấm lấy sáng Polycarbonate rỗng 	', '', '0', 'tam-lay-sang-polycarbonate-rong', 3, '', 0, 'vn', 'menu', '2018-03-12 11:51:17', '2018-03-12 11:51:17');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_contact_info_product`
--

DROP TABLE IF EXISTS `ci_contact_info_product`;
CREATE TABLE IF NOT EXISTS `ci_contact_info_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thickness` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `length` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `contact_id` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ci_menus`
--

INSERT INTO `ci_menus` (`id`, `parent_id`, `menu_name`, `menu_link`, `show_in_menu`, `display_order`, `icon`, `application_id`, `created_date`, `update_date`) VALUES
(1, 0, 'Menu', '', 1, 1, 'linea-icon linea-basic fa-fw', 1, '2018-03-03 16:34:16', '2018-03-03 17:34:16'),
(8, 1, 'Backend Menu', 'admin/backmenus', 1, 2, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 08:08:32', '2018-03-12 09:07:35'),
(9, 11, 'Quản lý Slider', 'admin/banners', 1, 2, 'linea-icon linea-elaborate fa-fw', 1, '2018-03-12 09:51:31', '2018-03-12 10:51:31'),
(10, 0, 'Danh mục sản phẩm', 'admin/category', 1, 3, 'linea-icon linea-basic fa-fw', 1, '2018-03-05 16:28:30', '2018-03-05 17:28:30'),
(11, 0, 'Quản lý trang chủ', '', 1, 3, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 08:08:28', '2018-03-06 15:42:32'),
(12, 11, 'Đối tác', 'admin/partners', 1, 3, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 08:08:29', '2018-03-06 15:43:26'),
(13, 0, 'Chỉnh sửa website', 'admin/system', 1, 5, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 08:08:29', '2018-03-07 14:33:50'),
(14, 0, 'Quản lý sản phầm', '', 1, 1, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 08:08:31', '2018-03-07 17:42:49'),
(16, 14, 'Liên hệ', 'admin/contactOrder', 1, 10, 'linea-icon linea-basic fa-fw', 1, '2018-03-12 08:08:30', '2018-03-08 16:40:43'),
(17, 11, 'Tin tức', 'admin/post', 1, 3, '', 1, '2018-03-12 11:05:21', '2018-03-12 12:05:21'),
(18, 14, 'Sản phẩm', 'admin/product', 1, 1, '', 1, '2018-03-12 11:07:46', '2018-03-12 12:07:46');

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
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ci_partner`
--

INSERT INTO `ci_partner` (`id`, `name`, `description`, `logo`, `url`, `publish`, `created_date`, `update_date`) VALUES
(1, 'đối tác 3', 'mô tả', '/uploads/partners/fff5bdef6b5662ea856b305ee3be3b21.png', '', 1, '2018-03-12 10:39:50', '2018-03-12 11:39:50'),
(2, 'Client 1', '', '/uploads/partners/57298b3a9599c93aa27163668bb9609f.png', '', 1, '2018-03-12 10:44:53', '2018-03-12 11:37:27'),
(3, 'client 2', '', '/uploads/partners/f850726b50782640f34b5856e08eb0b6.png', '', 1, '2018-03-12 10:39:35', '2018-03-12 11:39:35'),
(4, 'Client 4', '', '/uploads/partners/4d4139ecfff209560bfcbe3a62efcf1f.png', '', 1, '2018-03-12 10:40:03', '2018-03-12 11:40:03'),
(5, 'Client 5', '', '/uploads/partners/c99e91cbab3c4446d1ba67192ddc6089.png', '', 1, '2018-03-12 10:40:19', '2018-03-12 11:40:19');

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
(1, 'Test 1', 'Description Test 123', 'Des test 1', '<p>Content Test 1</p>', '/uploads/posts/41.jpg', 'test-1', 'new', 'vn', '2018-03-05 23:57:22'),
(2, 'Test 123456', 'Test 123456', 'Test 123456', 'Test 123456', 'Test 123456', 'Test 123456', 'new', 'vn', '2018-03-06 23:40:18'),
(3, 'Test 123123', 'Test 123123', 'Test 123123', '<p>Test 123123</p>', '/uploads/posts/7.jpg', 'test-7', 'new', 'vn', '2018-03-08 00:39:20');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=477 ;

--
-- Dumping data for table `ci_settings`
--

INSERT INTO `ci_settings` (`id`, `key`, `value`, `created_date`) VALUES
(458, 'logoFE', '/uploads/system/5a66c966cba05e93a5d827ce2ba132a9.jpg', '2018-03-12 09:53:57'),
(459, 'favicon', '/uploads/system/chair2.jpg', '2018-03-12 09:53:57'),
(460, 'logoBE', '', '2018-03-12 09:55:24'),
(461, 'defaultPageTitle', 'Lucjfer', '2018-03-12 09:53:57'),
(462, 'introduce', '<p>C&ocirc;ng ty TNHH TM - DV - SX Nhựa Nam Việt l&agrave; nh&agrave; sản xuất v&agrave; ph&acirc;n phối c&aacute;c sản phẩm từ nhựa Polycarbonate như: T&ocirc;n nhựa lấy s&aacute;ng Polycarbonate - Tấm lợp lấy s&aacute;ng Polycarbonate - Tấm lợp định h&igrave;nh... ti&ecirc;u chuẩn quốc tế h&agrave;ng đầu Việt Nam. Được th&agrave;nh lập năm 2011 với tư c&aacute;ch ph&aacute;p nh&acirc;n l&agrave; C&ocirc;ng ty TNHH TM - DV - SX Nhựa Nam Việt, c&oacute; trụ sở l&agrave;m việc tại 362 Điện Bi&ecirc;n Phủ, phường 17, quận B&igrave;nh Thạnh, TP. Hồ Ch&iacute; Minh.</p>\r\n', '2018-03-12 09:53:57'),
(463, 'copyrightOnFooter', 'Copyright 2014 - 2018 www.namvietplastic.com', '2018-03-12 09:53:57'),
(464, 'googleAnalytics', 'googleAnalytics', '2018-03-12 09:53:57'),
(465, 'facebook', 'https://www.facebook.com/', '2018-03-12 09:53:57'),
(466, 'googleplus', 'https://google.com/', '2018-03-12 09:53:57'),
(467, 'twitter', '', '2018-03-12 09:53:57'),
(468, 'youtube', 'https://youtube.com/', '2018-03-12 09:53:58'),
(469, 'instagram', '', '2018-03-12 09:53:58'),
(470, 'pinterest', '', '2018-03-12 09:53:58'),
(471, 'linkedin', '', '2018-03-12 09:53:58'),
(472, 'companyAddress', 'tp hcm', '2018-03-12 09:53:58'),
(473, 'companyAddress_en', '', '2018-03-12 09:53:58'),
(474, 'companyCellPhone', '0162706224', '2018-03-12 09:53:58'),
(475, 'companyPhone', '08.0000000', '2018-03-12 09:53:58'),
(476, 'companyEmail', 'lucjfer0407@gmail.com', '2018-03-12 09:53:58');

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
(1, 1, 1, 'admin', 'lucjfer0407@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lucjer', 'Devil', 'Lucjer Devil', '115', 'Nam', '0000-00-00', '', 0, '/uploads/admin/257fae197f0739d58db77577b679f25b.png', '/uploads/admin/landscape3.jpg', 1, '2018-03-12 08:04:03', '0000-00-00 00:00:00'),
(2, 0, 2, '', 'lucjfer0407@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ho', 'ten Ten', 'ten Ten ho', '', 'Nam', '2018-01-01', '', 0, '', '', 0, '2018-03-12 06:33:49', '2018-03-12 07:33:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
