-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.15-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for videogamegreatness
CREATE DATABASE IF NOT EXISTS `videogamegreatness` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `videogamegreatness`;

-- Dumping structure for table videogamegreatness.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table videogamegreatness.admin: ~0 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `created_at`, `updated_at`, `username`, `password`) VALUES
	(1, '2019-06-13 11:52:24', '2019-06-13 11:52:24', 'grant_username', '123456'),
	(2, '2019-06-13 13:20:58', '2019-06-13 13:20:58', 'gh', '$2y$10$Yd9JCBXVVP1/bGZAlfSvvOq.mjeHZ6.4l4NqWivz06llcSEwxBJDy');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table videogamegreatness.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment` blob NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='This will hold any comments for the website';

-- Dumping data for table videogamegreatness.comments: ~0 rows (approximately)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table videogamegreatness.img
CREATE TABLE IF NOT EXISTS `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `img_url` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table videogamegreatness.img: ~4 rows (approximately)
DELETE FROM `img`;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` (`id`, `title`, `img_url`, `created_at`, `updated_at`) VALUES
	(1, '', '', '2019-06-12 15:25:17', '2019-06-12 15:25:17'),
	(2, 'doc', './img1560378335_jpg', '2019-06-12 15:25:35', '2019-06-12 15:25:35'),
	(3, 'fdsghsfhgdf', './img1560378433.jpg', '2019-06-12 15:27:13', '2019-06-12 15:27:13'),
	(4, 'dfgfdagdfgadf', './img1560378471.jpg', '2019-06-12 15:27:51', '2019-06-12 15:27:51'),
	(5, 'fgshdfgdfg', './img/1560378529.jpg', '2019-06-12 15:28:49', '2019-06-12 15:28:49');
/*!40000 ALTER TABLE `img` ENABLE KEYS */;

-- Dumping structure for table videogamegreatness.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='This table will store the user data';

-- Dumping data for table videogamegreatness.users: ~5 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `created_at`, `updated_at`, `password`, `email`, `notes`) VALUES
	(1, '2019-06-11 13:19:24', '2019-06-11 13:19:23', '123456', 'Darth_cheddar77', 'this is my favorite website'),
	(2, '2019-06-11 14:42:18', '2019-06-12 11:53:55', 'bbb', 'ghowellman@gmail.com', ''),
	(4, '2019-06-11 15:19:41', '2019-06-11 15:19:41', 'Yogi1132', 'ghowellman@gmail.com', NULL),
	(5, '2019-06-11 15:19:58', '2019-06-11 15:19:58', 'Yogi1132', 'ghowellman@gmail.com', NULL),
	(6, '2019-06-11 15:20:32', '2019-06-11 15:20:32', '12234666', 'ghowellman@gmail.com', NULL),
	(7, '2019-06-12 15:04:31', '2019-06-12 15:04:31', 'bbb', 'ghowellman@gmail.com', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
