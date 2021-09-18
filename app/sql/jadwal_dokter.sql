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
-- Table structure for table `jadwal_dokter`
--

-- CREATE TABLE `jadwal_dokter` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `dokter_id` int(11) NOT NULL,
--   `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `poli` int(11) NOT NULL,
--   `jam_mulai` time NOT NULL,
--   `jam_akhir` time NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `dokter_id`, `hari`, `poli`, `jam_mulai`, `jam_akhir`, `created_at`, `updated_at`) VALUES
(20, 13, 'senin', 1, '08:00:00', '11:00:00', '2021-09-16 10:59:39', '2021-09-16 10:59:39'),
(21, 17, 'senin', 2, '08:00:00', '11:00:00', '2021-09-16 11:00:12', '2021-09-16 11:00:12'),
(22, 14, 'senin', 2, '13:00:00', '16:00:00', '2021-09-16 11:01:17', '2021-09-16 11:01:17'),
(23, 16, 'senin', 1, '13:00:00', '16:00:00', '2021-09-16 11:03:17', '2021-09-16 11:03:17'),
(24, 15, 'senin', 4, '13:00:00', '16:00:00', '2021-09-16 11:04:35', '2021-09-16 11:04:35'),
(25, 12, 'senin', 4, '08:00:00', '11:00:00', '2021-09-16 11:05:15', '2021-09-16 11:05:15'),
(26, 16, 'selasa', 1, '08:00:00', '11:00:00', '2021-09-16 10:59:39', '2021-09-16 18:57:18'),
(27, 14, 'selasa', 2, '08:00:00', '11:00:00', '2021-09-16 11:00:12', '2021-09-16 19:04:03'),
(28, 17, 'selasa', 2, '13:00:00', '16:00:00', '2021-09-16 11:01:17', '2021-09-16 19:05:08'),
(29, 13, 'selasa', 1, '13:00:00', '16:00:00', '2021-09-16 11:03:17', '2021-09-16 18:59:06'),
(30, 12, 'selasa', 4, '13:00:00', '16:00:00', '2021-09-16 11:04:35', '2021-09-16 19:07:49'),
(31, 15, 'selasa', 4, '08:00:00', '11:00:00', '2021-09-16 11:05:15', '2021-09-16 19:08:27'),
(32, 13, 'rabu', 1, '08:00:00', '11:00:00', '2021-09-16 10:59:39', '2021-09-16 10:59:39'),
(33, 17, 'rabu', 2, '08:00:00', '11:00:00', '2021-09-16 11:00:12', '2021-09-16 11:00:12'),
(34, 14, 'rabu', 2, '13:00:00', '16:00:00', '2021-09-16 11:01:17', '2021-09-16 11:01:17'),
(35, 16, 'rabu', 1, '13:00:00', '16:00:00', '2021-09-16 11:03:17', '2021-09-16 11:03:17'),
(36, 15, 'rabu', 4, '13:00:00', '16:00:00', '2021-09-16 11:04:35', '2021-09-16 11:04:35'),
(37, 12, 'rabu', 4, '08:00:00', '11:00:00', '2021-09-16 11:05:15', '2021-09-16 11:05:15'),
(38, 16, 'kamis', 1, '08:00:00', '11:00:00', '2021-09-16 10:59:39', '2021-09-16 18:57:18'),
(39, 14, 'kamis', 2, '08:00:00', '11:00:00', '2021-09-16 11:00:12', '2021-09-16 19:04:03'),
(40, 17, 'kamis', 2, '13:00:00', '16:00:00', '2021-09-16 11:01:17', '2021-09-16 19:05:08'),
(41, 13, 'kamis', 1, '13:00:00', '16:00:00', '2021-09-16 11:03:17', '2021-09-16 18:59:06'),
(42, 12, 'kamis', 4, '13:00:00', '16:00:00', '2021-09-16 11:04:35', '2021-09-16 19:07:49'),
(43, 15, 'kamis', 4, '08:00:00', '11:00:00', '2021-09-16 11:05:15', '2021-09-16 19:08:27'),
(44, 16, 'jumat', 1, '08:00:00', '10:30:00', '2021-09-16 10:59:39', '2021-09-16 20:01:57'),
(45, 17, 'jumat', 2, '08:00:00', '10:30:00', '2021-09-16 11:00:12', '2021-09-16 20:08:21'),
(46, 14, 'jumat', 2, '13:30:00', '16:00:00', '2021-09-16 11:01:17', '2021-09-16 20:09:23'),
(47, 13, 'jumat', 1, '13:30:00', '16:00:00', '2021-09-16 11:03:17', '2021-09-16 20:03:56'),
(48, 15, 'jumat', 4, '13:30:00', '16:00:00', '2021-09-16 11:04:35', '2021-09-16 20:10:35'),
(49, 12, 'jumat', 4, '08:00:00', '10:30:00', '2021-09-16 11:05:15', '2021-09-16 20:11:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_dokter`
--
-- ALTER TABLE `jadwal_dokter`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
-- ALTER TABLE `jadwal_dokter`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
