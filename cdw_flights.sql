-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2019 at 04:52 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdw_flights`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

DROP TABLE IF EXISTS `airport`;
CREATE TABLE IF NOT EXISTS `airport` (
  `airport_id` int(11) NOT NULL AUTO_INCREMENT,
  `airport_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation_id` int(11) NOT NULL,
  PRIMARY KEY (`airport_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airport_id`, `airport_name`, `nation_id`) VALUES
(1, 'Sân bay Bến Tre', 1),
(2, 'Sân Bay Nha Trang', 1),
(3, 'Sân bay Sapa', 1),
(4, 'Sân bay Phan Thiết', 1),
(5, 'Sân Bay HongKong', 2),
(6, 'Sân Bay MaCao', 2);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `user_id`, `total`) VALUES
(1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_detail`
--

DROP TABLE IF EXISTS `book_detail`;
CREATE TABLE IF NOT EXISTS `book_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flight_id` int(11) DEFAULT NULL,
  `seat_type` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chairs`
--

DROP TABLE IF EXISTS `chairs`;
CREATE TABLE IF NOT EXISTS `chairs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `flight_detail_id` int(10) UNSIGNED NOT NULL,
  `seat_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chairs_flight_detail_id_foreign` (`flight_detail_id`),
  KEY `chairs_seat_type_id_foreign` (`seat_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chairs`
--

INSERT INTO `chairs` (`id`, `flight_detail_id`, `seat_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-03-20 19:00:00', '2019-03-19 18:00:00'),
(2, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airport_id` int(11) DEFAULT NULL,
  `nation_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `airport_id`, `nation_id`) VALUES
(1, 'Bến Tre', 1, 1),
(2, 'Nha Trang', 2, 1),
(3, 'Sapa', NULL, 1),
(4, 'Phan Thiết', 4, 1),
(5, 'HongKong', 5, 2),
(6, 'Ma cao', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cutomer_firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cutomer_lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

DROP TABLE IF EXISTS `flight_details`;
CREATE TABLE IF NOT EXISTS `flight_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `org_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `time_start` timestamp NOT NULL,
  `time_end` timestamp NULL DEFAULT NULL,
  `time_return` timestamp NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flight_type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transit` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `flight_details_code_unique` (`code`),
  KEY `flight_details_org_id_foreign` (`org_id`),
  KEY `flight_details_from_foreign` (`from`),
  KEY `flight_details_to_foreign` (`to`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_details`
--

INSERT INTO `flight_details` (`id`, `org_id`, `code`, `from`, `to`, `time_start`, `time_end`, `time_return`, `price`, `created_at`, `updated_at`, `flight_type`, `transit`, `total`) VALUES
(1, 1, 'CB1', 1, 2, '2019-02-28 21:53:57', '2019-02-28 23:00:00', '2019-02-28 22:53:57', 1500000, '2019-02-28 21:53:57', '2019-02-28 21:53:57', 'one-way', 0, NULL),
(2, 2, 'CB2', 1, 2, '2019-02-28 21:53:57', NULL, '2019-03-01 22:53:57', 2000000, '2019-02-28 21:53:57', '2019-02-28 21:53:57', 'return', 0, NULL),
(3, 1, 'CB3', 1, 2, '2019-03-01 17:00:00', NULL, '2019-03-02 17:00:00', 1200000, NULL, NULL, 'return', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2019_02_28_064244_create_orgs_table', 1),
(39, '2019_02_28_085029_create_flight_details_table', 1),
(40, '2019_02_28_091635_create_seat_types_table', 1),
(41, '2019_02_28_093145_create_chairs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

DROP TABLE IF EXISTS `nation`;
CREATE TABLE IF NOT EXISTS `nation` (
  `nation_id` int(11) NOT NULL AUTO_INCREMENT,
  `nation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation_code` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`nation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nation`
--

INSERT INTO `nation` (`nation_id`, `nation_name`, `nation_code`) VALUES
(1, 'Việt Nam', 'VN'),
(2, 'Trung Quốc', 'TQ'),
(3, 'Nhật Bản', 'JP'),
(4, 'American', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

DROP TABLE IF EXISTS `orgs`;
CREATE TABLE IF NOT EXISTS `orgs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orgs_code_unique` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`id`, `code`, `name`, `created_at`, `updated_at`, `nation_id`) VALUES
(1, 'VIETJ', 'VietJet', '2019-02-28 21:53:57', '2019-02-28 21:53:57', 1),
(2, 'AIRL', 'AirLine', '2019-02-28 21:53:57', '2019-02-28 21:53:57', 2);

-- --------------------------------------------------------

--
-- Table structure for table `seat_types`
--

DROP TABLE IF EXISTS `seat_types`;
CREATE TABLE IF NOT EXISTS `seat_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `seat_types_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_types`
--

INSERT INTO `seat_types` (`id`, `name`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Business', 20, '2019-02-28 21:53:57', '2019-02-28 21:53:57'),
(2, 'Economy', 50, '2019-02-28 21:53:57', '2019-02-28 21:53:57'),
(3, 'Premium Economy', 50, '2019-02-28 21:53:57', '2019-02-28 21:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_date_of_birth` date DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_last_access` time DEFAULT NULL,
  `user_attempt` int(11) DEFAULT NULL,
  `user_create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_update_time` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_title`, `user_phone`, `user_date_of_birth`, `user_address`, `user_last_access`, `user_attempt`, `user_create_time`, `user_update_time`, `updated_at`, `user_active`) VALUES
(5, 'hoainam0654', 'my016@gmail.com', '$2y$10$rAPIp7RxG6yLkmPcD0ZbJ.6xfQPdVshpBPcx1/Ah8meT6aaZ/litm', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-02-26 06:57:47', NULL, NULL, NULL),
(4, 'dieumii', 'my01@gmail.com', '$2y$10$Qf7R2OEqt8kBnvbv4SYaRepKR9TJ18zHLggSVRXasmU3rHHJ5b1Uy', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-02-26 06:50:51', NULL, NULL, NULL),
(3, 'Hoainam', 'my0@gmail.com', '$2y$10$TGn6W3zKtXV6qYrIpCAXAOWAaeTeJPi1kWYS2I8imvKeIm64L2yf6', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-02-26 06:50:10', NULL, NULL, NULL),
(6, 'dieumii', 'mymy@email.com', '$2y$10$GCZk7XNK8wGsr1xlOSesFuXw5M9IdeBhJaK/ligYt.myAsH793B4y', NULL, '0918798221', NULL, NULL, '06:01:04', 0, '2019-02-26 08:48:09', NULL, '2019-02-27 01:31:54', 1),
(7, 'dieumii', 'mymy@gmail.com', '$2y$10$x66VTY9N3RfZdbiG1bahGOYIIWR0PFnvJdTGRBc01y0ylKUXn8Mke', NULL, '1234567890', NULL, NULL, '15:48:05', 4, '2019-02-26 09:15:26', NULL, NULL, 0),
(12, 'alibaba', 'test1@gmail.com', '$2y$10$KnyEur87stAXOBhikvlbPe6qxSa5HmR7jO0UO6tCwpcnUV1eALZlW', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-03-05 06:02:17', NULL, NULL, NULL),
(9, 'dieumii', 'aaa@email.com', '$2y$10$dS4eQGC9hAKrYJKHUf.5FO9gNFuvGf6NkpdhDMlQjVwBACnwS4MCW', NULL, '1234567890', NULL, NULL, '15:44:10', 0, '2019-02-27 15:43:20', NULL, NULL, 1),
(10, 'dieumii', 'aaaa@gmail.com', '$2y$10$xxT8U6O7XVtCD8SupWtvwOrjrTn.W/Zq7qJwC3GozVPhZTXEgU0B.', NULL, '1234567890', NULL, NULL, '15:44:39', 0, '2019-02-27 15:44:30', NULL, NULL, 1),
(11, 'diệu my', 'test@gmail.com', '$2y$10$SoP5KfPJAJMgmu481nT/C.5fqzFOuMA24JcwPfs7TV.ukFZHIGUpS', NULL, '123456', NULL, NULL, '15:50:44', 0, '2019-02-27 15:48:54', NULL, '2019-02-27 08:50:08', 1),
(13, 'uuuuuuu', 'test2@kgmail.com', '$2y$10$t.Ry4qLdVGlcn6wg0FMyfuxaEY.TuBxYJI3yXDz8vHEdZ85wX/eaG', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-03-05 06:07:27', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
