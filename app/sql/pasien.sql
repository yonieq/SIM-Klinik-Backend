-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2021 at 09:14 AM
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
-- Table structure for table `pasien`
--

-- CREATE TABLE `pasien` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `no_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `kategori` int(11) NOT NULL,
--   `tempat_lahir` int(11) NOT NULL,
--   `tanggal_lahir` date NOT NULL,
--   `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
--   `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `usia` int(11) NOT NULL,
--   `gol_darah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (
    `id`,
    `nama`,
    `nik`,
    `tempat_lahir`,
    `tanggal_lahir`,
    `jenis_kelamin`,
    `alamat`,
    `no_telepon`,
    `usia`,
    `gol_darah`,
    `created_at`, 
    `updated_at`)
VALUES
(1, 'Bambang', '1234567890123456', 28, '1989-04-09', 'laki-laki', 'Tegal Kota, Tegal Barat', '62890000999098', 21, 'belum diketahui', NULL, '2021-09-13 21:51:45', '2021-09-13 23:02:00'),
(2, 'Budi', '1234567890123459',  28, '1989-04-09', 'laki-laki', 'Tegal Kota, Tegal Barat', '6289000667676', 21, 'belum diketahui', NULL, '2021-09-13 23:03:07', '2021-09-13 23:03:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
-- ALTER TABLE `pasien`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `pasien_no_ktp_unique` (`no_ktp`),
--   ADD UNIQUE KEY `pasien_no_hp_unique` (`no_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
-- ALTER TABLE `pasien`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
