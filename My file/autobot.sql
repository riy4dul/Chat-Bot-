-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 09:08 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autobot`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` text,
  `brand_model` varchar(30) DEFAULT NULL,
  `brand_price` varchar(30) DEFAULT NULL,
  `brand_image_link` text,
  `brand_description` text,
  `brand_specifications` text,
  `brand_latest_cars` varchar(15) DEFAULT NULL,
  `brand_top_seller_cars` varchar(15) DEFAULT NULL,
  `brand_gallery_cars` varchar(15) DEFAULT NULL,
  `brand_status` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_model`, `brand_price`, `brand_image_link`, `brand_description`, `brand_specifications`, `brand_latest_cars`, `brand_top_seller_cars`, `brand_gallery_cars`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Audi A3', '9000000', 'http://images.nadaguides.com/Models/640x480/2014-Audi-A4-Premium.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'Yes', 'No', 'No', 'Inactive', '0000-00-00 00:00:00', '2018-07-28 07:38:19'),
(2, '4', 'Nissan Micra', '10000000', 'http://blogmedia.dealerfire.com/wp-content/uploads/sites/713/2016/12/2017-nissan-rogue-medium_o.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'Yes', 'Yes', 'Yes', 'Active', '0000-00-00 00:00:00', '2018-08-06 03:23:10'),
(3, '3', 'BMW X1', '7563333333', 'https://stimg.cardekho.com/images/carexteriorimages/930x620/BMW/BMW-X1/4863/front-left-side-47.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'No', 'Yes', 'Yes', 'Inactive', '0000-00-00 00:00:00', '2018-08-06 03:22:58'),
(4, '2', 'Hyundai Creta', '20000000', 'https://imgd.aeplcdn.com/272x153/cw/ec/22723/Volvo-V40-Right-Front-Three-Quarter-85786.jpg?wm=0&q=85', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'Yes', 'No', 'Yes', 'Inactive', '0000-00-00 00:00:00', '2018-07-28 07:38:30'),
(5, '1', 'A3 Sportback e-tron', '8000000', 'https://imgd.aeplcdn.com/1280x720/cw/ec/26916/Audi-Q3-Right-Front-Three-Quarter-92291.jpg?wm=0&q=100', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'No', 'Yes', 'Yes', 'Active', '0000-00-00 00:00:00', '2018-07-28 07:38:34'),
(6, '4', 'Nissan Terrano', '500000000', 'https://indusmoto.com/news_photo/1044/15049429172018-Nissan-370Z-Coupe-Revealed-With-Subtle-Updates.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'Yes', 'Yes', 'Yes', 'Active', '0000-00-00 00:00:00', '2018-07-28 07:38:37'),
(7, '3', 'BMW 3 Series', '50000000', 'https://stimg.cardekho.com/images/carexteriorimages/930x620/BMW/BMW-3-Series/2034/front-left-side-47.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'Yes', 'Yes', 'Yes', 'Active', '0000-00-00 00:00:00', '2018-07-28 07:38:41'),
(8, '2', 'Hyundai Elite Grand', '30000000', 'https://media.zigcdn.com/media/model/2018/Jan/hyundai-kona-right_600x300.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'No', 'No', 'Yes', 'Active', '0000-00-00 00:00:00', '2018-07-28 07:38:44'),
(9, '2', 'Hyundai Grand', '40000000', 'https://media.zigcdn.com/media/model/2018/Jan/hyundai-kona-right_600x300.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'No', 'No', 'Yes', 'Active', '0000-00-00 00:00:00', '2018-07-28 07:38:47'),
(10, '1', 'Audi A2', '1500000', 'http://images.nadaguides.com/Models/640x480/2014-Audi-A4-Premium.jpg', 'Description', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'Yes', 'Yes', 'Yes', 'Inactive', '2018-07-21 06:51:22', '2018-07-28 07:38:51'),
(11, '1', 'Audi A6', '10555555', 'http://images.nadaguides.com/Models/640x480/2014-Audi-A4-Premium.jpg', 'Description', 'https://www.facebook.com/media/set/?set=a.206254743548919.1073741829.193949308112796&type=1&l=e30a9e9db3', 'Yes', 'Yes', 'Yes', 'Active', '2018-07-23 06:54:11', '2018-07-28 07:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `car_brands_id` int(11) NOT NULL,
  `car_brands_name` text,
  `car_brands_status` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`car_brands_id`, `car_brands_name`, `car_brands_status`, `created_at`, `updated_at`) VALUES
(1, 'Audi', 'Active', '2018-07-23 06:30:52', '2018-07-23 07:00:23'),
(2, 'Hyundai', 'Active', '2018-07-23 06:34:53', '2018-07-23 00:34:53'),
(3, 'BMW', 'Active', '2018-07-23 06:35:03', '2018-07-23 00:37:15'),
(4, 'Nissan', 'Active', '2018-07-23 06:35:12', '2018-07-23 00:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `product_id`, `order_id`, `delivery_by`, `created_at`, `updated_at`, `payment_method`, `delivery_date`, `description`, `delivery_fee`) VALUES
(15, 1, 18, 'babul', '2018-08-07 04:49:10', '2018-08-07 04:49:10', 'cash_on_delivery', '25 August 2018 - 05:11 PM', 'sfsf', 0),
(16, 1, 18, 'abul', '2018-08-07 04:52:10', '2018-08-07 04:52:10', 'cash_on_delivery', '08 August 2018 - 11:11 PM', 'asdadas', 0),
(17, 1, 18, 'abul', '2018-08-07 04:54:03', '2018-08-07 04:54:03', 'cash_on_delivery', '02 August 2018 - 10:11 AM', 'sfdsa', 0),
(18, 1, 18, 'babul', '2018-08-07 04:57:48', '2018-08-07 04:57:48', 'cash_on_delivery', '16 August 2018 - 11:11 PM', 'DADASD', 0),
(19, 1, 18, 'abul', '2018-08-07 05:01:13', '2018-08-07 05:01:13', 'cash_on_delivery', '17 August 2018 - 10:11 PM', 'SDFADFAF', 0),
(20, 1, 18, 'abul', '2018-08-07 05:04:00', '2018-08-07 05:04:00', 'cash_on_delivery', '24 August 2018 - 04:11 PM', 'SFADAF', 0),
(21, 1, 19, 'babul', '2018-08-07 05:05:57', '2018-08-07 05:05:57', 'baksh', '24 August 2018 - 11:11 AM', 'ADASDSAD', 0),
(22, 3, 20, 'babul', '2018-08-07 05:10:06', '2018-08-07 05:10:06', 'cash_on_delivery', '08 August 2018 - 10:11 PM', 'must delivery in time', 0),
(23, 1, 18, 'babul', '2018-08-08 00:58:06', '2018-08-08 00:58:06', 'cash_on_delivery', '09 August 2018 - 04:11 PM', 'sdfafdfa', 40);

-- --------------------------------------------------------

--
-- Table structure for table `loan_info`
--

CREATE TABLE `loan_info` (
  `loan_info_id` int(11) NOT NULL,
  `loan_info_name` text,
  `loan_info_designation` text,
  `loan_info_phone` text,
  `loan_info_status` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_info`
--

INSERT INTO `loan_info` (`loan_info_id`, `loan_info_name`, `loan_info_designation`, `loan_info_phone`, `loan_info_status`, `created_at`, `updated_at`) VALUES
(1, 'Uzzal kar', 'Manager', '01754493563', 'Inactive', '2018-06-27 09:26:28', '2018-07-22 02:35:40'),
(2, 'Amirul Islam Mahadi', 'CEO', '01521434310', 'Inactive', '2018-06-27 09:17:41', '2018-07-28 00:11:57'),
(3, 'Sowat Amin-2', 'Programmer-2', '66666666', 'Active', '2018-07-22 08:29:53', '2018-07-28 00:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_31_075324_create_spareparts_orders_table', 1),
(4, '2018_08_06_104512_create_delivery_table', 1),
(5, '2018_08_06_121241_add_delivery_man_payment_method_delivery_date_description_to_deliveries_table', 2),
(6, '2018_08_07_095609_remove_delivery_man_from_deliveries_table', 3),
(7, '2018_08_08_064747_add_amount_to_deliveries_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_description` text,
  `promotion_status` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `promotion_description`, `promotion_status`, `created_at`, `updated_at`) VALUES
(1, 'Amazon: Up To 75% Off | Amazon Promo Codes & Coupons June 2018\r\nShop these Amazon deals of the day to save as much as 75% on electronics and more, clipping coupons and codes as you shop.', 'Active', '0000-00-00 00:00:00', '2018-06-27 10:58:10'),
(2, 'Amazon: Get Up To $15 Amazon Credit Instantly\r\nWant a reward for spending money with Amazon? This coupon is your answer! Click here and eligible customers will get a $10 credit when you purchase a $50 Amazon Gift Card for the first time! Some other eligible accounts may also get a $15 credit with the purchase of a $50 Amazon gift card by using the second promo code at online checkout.', 'Inactive', '0000-00-00 00:00:00', '2018-07-22 07:33:35'),
(3, 'Amazon: Up To 75% Off | Amazon Promo Codes & Coupons June 2018\r\nShop these Amazon deals of the day to save as much as 75% on electronics and more, clipping coupons and codes as you shop.', 'Inactive', '2018-07-22 07:18:57', '2018-07-22 01:31:53'),
(4, 'Amazon: Get Up To $15 Amazon Credit Instantly\r\nWant a reward for spending money with Amazon? This coupon is your answer! Click here and eligible customers will get a $10 credit when you purchase a $50 Amazon Gift Card for the first time! Some other eligible accounts may also get a $15 credit with the purchase of a $50 Amazon gift card by using the second promo code at online checkout.', 'Active', '2018-07-22 07:19:09', '2018-07-22 01:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `sales_center`
--

CREATE TABLE `sales_center` (
  `sales_center_id` int(11) NOT NULL,
  `sales_center_address` text,
  `sales_center_city` text,
  `sales_center_phone` text,
  `sales_center_working_hours` text,
  `sales_center_working_days` text,
  `sales_center_status` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_center`
--

INSERT INTO `sales_center` (`sales_center_id`, `sales_center_address`, `sales_center_city`, `sales_center_phone`, `sales_center_working_hours`, `sales_center_working_days`, `sales_center_status`, `created_at`, `updated_at`) VALUES
(1, '92/3, Shukrabad, Dhaka - 1207', 'Dhaka', '01754493563', '09 AM - 05 PM', 'Saturday - Thursday\r\nFriday Closed\r\n', 'Active', '0000-00-00 00:00:00', '2018-07-22 10:32:57'),
(3, '56, Uzzal Bir Uttom  Asfaqus Samad Sarak', 'Uttara', '01521434310', '09 AM - 05 PM', 'Saturday - Thursday, Friday Closed', 'Active', '0000-00-00 00:00:00', '2018-07-22 04:42:08'),
(4, '56, Uzzal Bir Uttom  Asfaqus Samad Sarak', 'Uttara', '01521434311', '12:00 AM - 11:59 PM', 'Saturday - Thursday,Friday Closed', 'Active', '0000-00-00 00:00:00', '2018-07-22 04:37:31'),
(5, 'Chandina, Comilla, bangladesh', 'Uttara', '01521434311', '09 AM - 05 PM', 'Saturday - Thursday, Friday Closed', 'Inactive', '0000-00-00 00:00:00', '2018-07-22 04:40:16'),
(6, '92/3, Shukrabad, Dhaka - 1207', 'Dhanmondi', '01754493563', '10:00 AM - 5:00 PM', 'Weekly 6 Days, Friday Close', 'Active', '2018-07-22 10:24:49', '2018-07-22 04:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `spare_parts_id` int(11) NOT NULL,
  `spare_parts_brand` text,
  `spare_parts_model` text,
  `spare_parts_name` text,
  `spare_parts_stock` varchar(20) DEFAULT NULL,
  `no_of_stock` int(11) NOT NULL,
  `spare_parts_price` text,
  `spare_parts_image` text,
  `spare_parts_status` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`spare_parts_id`, `spare_parts_brand`, `spare_parts_model`, `spare_parts_name`, `spare_parts_stock`, `no_of_stock`, `spare_parts_price`, `spare_parts_image`, `spare_parts_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Audi A3', 'AUDI A3 Hatchback', 'Yes', 5, '7000000', 'https://cdn.autoteileprofi.de/uploads/custom-catalog/prf/categories/346x346/10106.jpg', 'Inactive', '0000-00-00 00:00:00', '2018-08-06 10:41:19'),
(2, '3', 'BMW X1', 'BMW 318Ci E46', 'Yes', 5, '9020000', 'http://ills.bmwfans.info/thumbs/fvdy.png', 'Active', '0000-00-00 00:00:00', '2018-08-06 10:41:29'),
(3, '2', 'Accent 2', 'V-Ribbed Belts RIDEX', 'Yes', 5, '12000', 'https://cdn.autoteiledirekt.de/thumb?m=1&id=8098898&lng=en', 'Active', '2018-07-22 11:30:14', '2018-08-06 10:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts_orders`
--

CREATE TABLE `spare_parts_orders` (
  `spare_parts_orders_id` int(10) UNSIGNED NOT NULL,
  `spare_parts_id` int(11) DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'not confirmed',
  `delivery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'not delivered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spare_parts_orders`
--

INSERT INTO `spare_parts_orders` (`spare_parts_orders_id`, `spare_parts_id`, `fb_id`, `name`, `address`, `phone`, `confirmation`, `delivery`, `created_at`, `updated_at`) VALUES
(18, 1, NULL, 'kajfljdk', 'lajdkjaf', '12313', 'rejected', 'not delivered', '2018-08-06 03:18:59', '2018-08-06 22:46:15'),
(19, 1, NULL, 'swat amin', 'mirpur', '24234234', 'confirmed', 'not delivered', '2018-08-06 04:18:34', '2018-08-07 05:05:31'),
(20, 3, NULL, 'uzzal kar', 'Dhanmondi 32', '3424423423', 'not confirmed', 'not delivered', '2018-08-07 05:09:07', '2018-08-07 05:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `image`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bot Man', 'nomadtechbd@gmail.com', '01521434310', '$2y$10$LrJFRZ7j5eeLuJUSUGFO1uNQUCOJZGSwSQ8DHqcVyv97P0tC1h3QS', '20180723051424OL9.png', 'Admin', 'Active', 'SrLS7Xk2khRhuStf0U7vwmSdMW3jerYOAVZtsKQykRuRaHzEt2PH3kCjy2g2', '0000-00-00 00:00:00', '2018-07-23 09:15:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`car_brands_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_info`
--
ALTER TABLE `loan_info`
  ADD PRIMARY KEY (`loan_info_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `sales_center`
--
ALTER TABLE `sales_center`
  ADD PRIMARY KEY (`sales_center_id`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`spare_parts_id`);

--
-- Indexes for table `spare_parts_orders`
--
ALTER TABLE `spare_parts_orders`
  ADD PRIMARY KEY (`spare_parts_orders_id`),
  ADD KEY `spare_parts_id` (`spare_parts_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `car_brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `loan_info`
--
ALTER TABLE `loan_info`
  MODIFY `loan_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_center`
--
ALTER TABLE `sales_center`
  MODIFY `sales_center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `spare_parts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spare_parts_orders`
--
ALTER TABLE `spare_parts_orders`
  MODIFY `spare_parts_orders_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
