-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 02, 2019 lúc 03:45 PM
-- Phiên bản máy phục vụ: 5.7.21
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cdw_flights`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `airport`
--

DROP TABLE IF EXISTS `airport`;
CREATE TABLE IF NOT EXISTS `airport` (
  `airport_id` int(11) NOT NULL AUTO_INCREMENT,
  `airport_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`airport_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `airport`
--

INSERT INTO `airport` (`airport_id`, `airport_name`, `nation_id`, `city_id`) VALUES
(1, 'Sân bay Bến Tre', 1, 1),
(2, 'Sân Bay Nha Trang', 1, 2),
(3, 'Sân bay Sapa', 1, 3),
(4, 'Sân bay Phan Thiết', 1, 4),
(5, 'Sân Bay HongKong', 2, 5),
(6, 'Sân Bay MaCao', 2, 6),
(8, 'Sân Bây New Yord', 4, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `user_id`, `total`) VALUES
(1, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chairs`
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
-- Đang đổ dữ liệu cho bảng `chairs`
--

INSERT INTO `chairs` (`id`, `flight_detail_id`, `seat_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-03-20 19:00:00', '2019-03-19 18:00:00'),
(2, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `nation_id`) VALUES
(1, 'Bến Tre', 1),
(2, 'Nha Trang', 1),
(3, 'Sapa', 1),
(4, 'Phan Thiết', 1),
(5, 'HongKong', 2),
(6, 'Ma cao', 2),
(7, 'NewYord', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_details`
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
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flight_type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transit` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `Km` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `flight_details_code_unique` (`code`),
  KEY `flight_details_org_id_foreign` (`org_id`),
  KEY `flight_details_from_foreign` (`from`),
  KEY `flight_details_to_foreign` (`to`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flight_details`
--

INSERT INTO `flight_details` (`id`, `org_id`, `code`, `from`, `to`, `time_start`, `time_end`, `time_return`, `price`, `created_at`, `updated_at`, `flight_type`, `transit`, `total`, `Km`) VALUES
(1, 1, 'CB1', 1, 2, '2019-02-28 21:53:57', '2019-02-28 23:00:00', '2019-02-28 22:53:57', 1500000, '2019-02-28 21:53:57', '2019-02-28 21:53:57', 'one-way', 0, NULL, 100),
(2, 2, 'CB2', 1, 2, '2019-02-28 21:53:57', '2019-03-01 00:00:00', '2019-03-01 22:53:57', 2000000, '2019-02-28 21:53:57', '2019-02-28 21:53:57', 'return', 0, NULL, 50),
(3, 1, 'CB3', 1, 2, '2019-03-01 17:00:00', '2019-03-01 21:00:00', '2019-03-02 17:00:00', 1200000, NULL, NULL, 'return', 0, NULL, 20),
(4, 2, 'CB4', 2, 4, '2019-03-02 18:00:00', '2019-03-04 17:00:00', '2019-03-08 17:00:00', 10000000, NULL, NULL, 'return', NULL, NULL, 200),
(6, 1, 'xc', 1, 3, '2019-02-28 17:00:00', '2019-03-01 17:00:00', '2019-03-02 17:00:00', 12, NULL, NULL, 'return', NULL, 12, 240),
(7, 1, 'aaa', 2, 5, '2019-02-28 17:00:00', '2019-03-01 17:00:00', '2019-03-02 17:00:00', 1200, NULL, NULL, 'return', NULL, 100, 20),
(8, 2, 'Abb', 4, 6, '2019-04-23 17:00:00', '2019-04-18 17:00:00', '2019-04-10 17:00:00', 1200, NULL, NULL, 'return', NULL, 12, 340),
(9, 1, 'ABC', 1, 2, '2019-04-18 17:00:00', '2019-04-19 17:00:00', '2019-04-20 17:00:00', 1200, NULL, NULL, 'return', NULL, 12, 3000),
(11, 2, 'iyuyu', 4, 6, '2019-04-01 17:00:00', '2019-04-02 17:00:00', '2019-04-03 17:00:00', 1200, NULL, NULL, 'return', NULL, 12, 300),
(13, 1, 'ABCsa', 2, 4, '2019-04-04 17:00:00', '2019-04-05 17:00:00', '2019-04-05 17:00:00', 1200, NULL, NULL, 'return', NULL, 12, 490);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2019_02_28_064244_create_orgs_table', 1),
(39, '2019_02_28_085029_create_flight_details_table', 1),
(40, '2019_02_28_091635_create_seat_types_table', 1),
(41, '2019_02_28_093145_create_chairs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nation`
--

DROP TABLE IF EXISTS `nation`;
CREATE TABLE IF NOT EXISTS `nation` (
  `nation_id` int(11) NOT NULL AUTO_INCREMENT,
  `nation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation_code` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nation`
--

INSERT INTO `nation` (`nation_id`, `nation_name`, `nation_code`, `country_id`) VALUES
(1, 'Việt Nam', 'VN', '2,3'),
(2, 'Trung Quốc', 'TQ', '1,3,4'),
(3, 'Nhật Bản', 'JP', '1,4'),
(4, 'American', 'USA', '2,4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orgs`
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
-- Đang đổ dữ liệu cho bảng `orgs`
--

INSERT INTO `orgs` (`id`, `code`, `name`, `created_at`, `updated_at`, `nation_id`) VALUES
(1, 'VIETJ', 'VietJet', '2019-02-28 21:53:57', '2019-02-28 21:53:57', 1),
(2, 'AIRL', 'AirLine', '2019-02-28 21:53:57', '2019-02-28 21:53:57', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seat_types`
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
-- Đang đổ dữ liệu cho bảng `seat_types`
--

INSERT INTO `seat_types` (`id`, `name`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Business', 20, '2019-02-28 21:53:57', '2019-02-28 21:53:57'),
(2, 'Economy', 50, '2019-02-28 21:53:57', '2019-02-28 21:53:57'),
(3, 'Premium Economy', 50, '2019-02-28 21:53:57', '2019-02-28 21:53:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_title`, `user_phone`, `user_date_of_birth`, `user_address`, `user_last_access`, `user_attempt`, `user_create_time`, `user_update_time`, `updated_at`, `user_active`) VALUES
(5, 'hoainam0654', 'my016@gmail.com', '$2y$10$rAPIp7RxG6yLkmPcD0ZbJ.6xfQPdVshpBPcx1/Ah8meT6aaZ/litm', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-02-26 06:57:47', NULL, NULL, NULL),
(4, 'dieumii', 'my01@gmail.com', '$2y$10$Qf7R2OEqt8kBnvbv4SYaRepKR9TJ18zHLggSVRXasmU3rHHJ5b1Uy', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-02-26 06:50:51', NULL, NULL, NULL),
(3, 'Hoainam', 'my0@gmail.com', '$2y$10$TGn6W3zKtXV6qYrIpCAXAOWAaeTeJPi1kWYS2I8imvKeIm64L2yf6', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-02-26 06:50:10', NULL, NULL, NULL),
(6, 'dieumii', 'mymy@email.com', '$2y$10$GCZk7XNK8wGsr1xlOSesFuXw5M9IdeBhJaK/ligYt.myAsH793B4y', NULL, '0918798221', NULL, NULL, '17:47:14', 0, '2019-02-26 08:48:09', NULL, '2019-04-01 10:47:14', 1),
(7, 'dieumii', 'mymy@gmail.com', '$2y$10$x66VTY9N3RfZdbiG1bahGOYIIWR0PFnvJdTGRBc01y0ylKUXn8Mke', NULL, '1234567890', NULL, NULL, '15:48:05', 4, '2019-02-26 09:15:26', NULL, NULL, 0),
(12, 'alibaba', 'test1@gmail.com', '$2y$10$KnyEur87stAXOBhikvlbPe6qxSa5HmR7jO0UO6tCwpcnUV1eALZlW', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-03-05 06:02:17', NULL, NULL, NULL),
(9, 'dieumii', 'aaa@email.com', '$2y$10$dS4eQGC9hAKrYJKHUf.5FO9gNFuvGf6NkpdhDMlQjVwBACnwS4MCW', NULL, '1234567890', NULL, NULL, '15:44:10', 0, '2019-02-27 15:43:20', NULL, NULL, 1),
(10, 'dieumii', 'aaaa@gmail.com', '$2y$10$xxT8U6O7XVtCD8SupWtvwOrjrTn.W/Zq7qJwC3GozVPhZTXEgU0B.', NULL, '1234567890', NULL, NULL, '06:57:34', 1, '2019-02-27 15:44:30', NULL, '2019-04-01 23:57:34', 1),
(11, 'diệu my', 'test@gmail.com', '$2y$10$SoP5KfPJAJMgmu481nT/C.5fqzFOuMA24JcwPfs7TV.ukFZHIGUpS', NULL, '123456', NULL, NULL, '02:41:13', 0, '2019-02-27 15:48:54', NULL, '2019-03-11 19:41:13', 1),
(13, 'uuuuuuu', 'test2@kgmail.com', '$2y$10$t.Ry4qLdVGlcn6wg0FMyfuxaEY.TuBxYJI3yXDz8vHEdZ85wX/eaG', NULL, '1234567890', NULL, NULL, NULL, NULL, '2019-03-05 06:07:27', NULL, NULL, NULL),
(14, 'hoainamnam6767', 'namnam@gmail.com', '$2y$10$ODnqobQ5rGXGmUMOtHbjOeZLTNourCH1OvNxcBM/ya4ljO0JLtlbC', NULL, '1234567890', NULL, NULL, '06:53:40', 1, '2019-04-01 17:31:40', NULL, '2019-04-01 23:53:40', 1),
(15, 'dieumii', 'aaa@gmail.com', '$2y$10$B.nAu/yUj0zM9pBaitYRKOx5xKQbRFLRw8.DNdEU2KpKkjF8KE/22', NULL, '0918798221', NULL, NULL, '06:57:46', 0, '2019-04-02 06:57:05', NULL, '2019-04-01 23:57:46', 1),
(16, 'chan', 'chan@gmail.com', '$2y$10$vAwtE0REjkAOq08RDu/aIePiNVEBtBmmb3GDrrnjqWwp5vJ8drxDS', NULL, '1234567890', NULL, NULL, '07:10:42', 4, '2019-04-02 06:58:32', NULL, '2019-04-02 00:10:42', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
