-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th2 26, 2019 lúc 12:18 AM
-- Phiên bản máy phục vụ: 5.7.21
-- Phiên bản PHP: 5.6.35

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
-- Cấu trúc bảng cho bảng `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Bến Tre'),
(2, 'Nha Trang'),
(3, 'Sapa'),
(4, 'Phan Thiết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_booking`
--

DROP TABLE IF EXISTS `flight_booking`;
CREATE TABLE IF NOT EXISTS `flight_booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_from` int(11) DEFAULT NULL,
  `booking_to` int(11) DEFAULT NULL,
  `booing_departure` date DEFAULT NULL,
  `booking_return` date DEFAULT NULL,
  `booking_total_person` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_detail`
--

DROP TABLE IF EXISTS `flight_detail`;
CREATE TABLE IF NOT EXISTS `flight_detail` (
  `flight_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `flight_detail_org_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_detail_transit` int(11) DEFAULT NULL,
  `flight_detail_arrive_time` time DEFAULT NULL,
  `flight_detail_filght_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_detail_filght_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `flight_detail_total_price` float NOT NULL,
  PRIMARY KEY (`flight_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_list`
--

DROP TABLE IF EXISTS `flight_list`;
CREATE TABLE IF NOT EXISTS `flight_list` (
  `flight_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `flight_list_org_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_list_from` int(11) DEFAULT NULL,
  `flight_list_to` int(11) DEFAULT NULL,
  `flight_list_duration` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_list_transit` int(11) DEFAULT NULL,
  PRIMARY KEY (`flight_list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flight_list`
--

INSERT INTO `flight_list` (`flight_list_id`, `flight_list_org_name`, `flight_list_from`, `flight_list_to`, `flight_list_duration`, `flight_list_transit`) VALUES
(1, 'Vietjet', 1, 2, '2h', 0),
(2, 'VietNamEirline', 1, 2, '1h30', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` int(11) DEFAULT NULL,
  `user_date_of_birth` date DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_last_access` time DEFAULT NULL,
  `user_attempt` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
