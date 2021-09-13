-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2021 at 10:46 AM
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
-- Table structure for table `users`
--

-- CREATE TABLE `users` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `tanggal_lahir` date NOT NULL,
--   `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
--   `kategori` enum('admin','kepala kasir','kasir','kepala apotek','apotek','medis','pendaftaran') COLLATE utf8mb4_unicode_ci NOT NULL,
--   `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `gaji` int(11) NOT NULL,
--   `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kategori`, `alamat`, `no_hp`, `gaji`, `foto`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Munawar', 'admin', 'Tegal', '1978-08-09', 'laki-laki', 'admin', 'Tegal Kota, Tegal Timur,', '+628778789', 30000000, 'Munawar.png', '$2y$10$ERcohKM0MO0veumXtfZ7t.LdGXBq8ErS2b64mwXOXg/2K5Bxzm2vi', NULL, '2021-09-09 10:26:15', '2021-09-09 10:26:15'),
(3, 'Kasirun', 'kasir', 'Semarang', '1992-08-09', 'perempuan', 'kasir', 'Tegal Kota, Tegal Barat,', '+628778778', 4000000, 'Kasirun.png', '$2y$10$2Xq.GS0woYczlMS/dIIMRezmXPUKi.YRIDzxRKZYdXjHbsYzown22', NULL, '2021-09-09 12:05:50', '2021-09-09 12:05:50'),
(4, 'Yanto', 'kepala kasir', 'Jogja', '1989-06-19', 'laki-laki', 'kepala kasir', 'Tegal Kota, Tegal Selatan,', '+628778744', 4000000, 'Yanto.png', '$2y$10$1enoEO9ekExVTevsmrftU.sM.RaKJzQhFGTUmc/Mbhjwnj//8A1OW', NULL, '2021-09-09 12:08:33', '2021-09-09 12:08:33'),
(5, 'Rani', 'apotek', 'Pekalongan', '1995-11-12', 'perempuan', 'apotek', 'Tegal Kota, Tegal Sari,', '+628771144', 4000000, 'Rani.png', '$2y$10$lxz/Hhmm8Kt0.Dnv598Vi.yzvYDgLFi48Khx16/wyAhm4ddT./lPu', NULL, '2021-09-09 12:10:24', '2021-09-09 12:10:24'),
(6, 'Putri', 'kepala apotek', 'Surabaya', '1991-01-22', 'perempuan', 'kepala apotek', 'Tegal Kota, Margadana,', '+628771123', 4000000, 'Putri.png', '$2y$10$nwj44VCT5l3TXoI6jl06vOxUcOTamzBQpk0i1CkAzJJCDsmis1QDi', NULL, '2021-09-09 12:12:51', '2021-09-09 12:12:51'),
(7, 'Abidin', 'medis', 'Surakarta', '1971-02-18', 'laki-laki', 'medis', 'Tegal Kota, Tegal Timur,', '+628871123', 4000000, 'Abidin.png', '$2y$10$zQK1.dpgzEOsvqvwAvt/gOoRMzSrMN3dwTanujTYYvdeMNu3/8Qpi', NULL, '2021-09-09 12:15:20', '2021-09-09 12:15:20'),
(8, 'Aminah', 'pendaftaran', 'Surakarta', '1997-09-25', 'perempuan', 'pendaftaran', 'Tegal Kota, Tegal Timur,', '+629871123', 4000000, 'Aminah.png', '$2y$10$CXjWLm6UUYcKe15llrB58uwG7VHpjVX95Wi4q2gYzLlr4Fqv51mrq', NULL, '2021-09-09 12:16:47', '2021-09-09 12:16:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `users_username_unique` (`username`),
--   ADD UNIQUE KEY `users_no_hp_unique` (`no_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
-- ALTER TABLE `users`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
