-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2021 at 09:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokterpoli`
--

-- CREATE TABLE `dokterpoli` (
--   `dokter_id` int(11) NOT NULL,
--   `poli_id` int(11) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokterpoli`
--

INSERT INTO `dokterpoli` (`dokter_id`, `poli_id`, `created_at`, `updated_at`) VALUES
(12, 4, '2021-09-14 14:39:36', '2021-09-14 14:46:59'),
(13, 1, '2021-09-16 10:26:23', '2021-09-16 10:26:23'),
(14, 2, '2021-09-16 10:27:23', '2021-09-16 10:27:23'),
(15, 4, '2021-09-16 10:29:32', '2021-09-16 10:29:32'),
(16, 1, '2021-09-16 10:30:59', '2021-09-16 10:30:59'),
(17, 2, '2021-09-16 10:32:39', '2021-09-16 10:32:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
