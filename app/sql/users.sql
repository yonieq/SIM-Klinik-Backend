-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2021 at 09:19 AM
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
--   `tempat_lahir` int(11) NOT NULL,
--   `tanggal_lahir` date NOT NULL,
--   `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
--   `kategori` enum('admin','kepala kasir','kasir','kepala apotek','apotek','medis','pendaftaran','dokter') COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Munawar', 'admin', 12, '1978-08-09', 'laki-laki', 'admin', 'Tegal Kota, Tegal Timur,', '+628778789', 30000000, 'Munawar.png', '$2y$10$ERcohKM0MO0veumXtfZ7t.LdGXBq8ErS2b64mwXOXg/2K5Bxzm2vi', NULL, '2021-09-08 20:26:15', '2021-09-08 20:26:15'),
(3, 'Kasirun', 'kasir', 100, '1992-08-09', 'perempuan', 'kasir', 'Tegal Kota, Tegal Barat,', '+628778778', 4000000, 'Kasirun.png', '$2y$10$2Xq.GS0woYczlMS/dIIMRezmXPUKi.YRIDzxRKZYdXjHbsYzown22', NULL, '2021-09-08 22:05:50', '2021-09-08 22:05:50'),
(4, 'Yanto', 'kepala kasir', 120, '1989-06-19', 'laki-laki', 'kepala kasir', 'Tegal Kota, Tegal Selatan,', '+628778744', 4000000, 'Yanto.png', '$2y$10$1enoEO9ekExVTevsmrftU.sM.RaKJzQhFGTUmc/Mbhjwnj//8A1OW', NULL, '2021-09-08 22:08:33', '2021-09-08 22:08:33'),
(5, 'Rani', 'apotek', 100, '1995-11-12', 'perempuan', 'apotek', 'Tegal Kota, Tegal Sari,', '+628771144', 4000000, 'Rani.png', '$2y$10$lxz/Hhmm8Kt0.Dnv598Vi.yzvYDgLFi48Khx16/wyAhm4ddT./lPu', NULL, '2021-09-08 22:10:24', '2021-09-08 22:10:24'),
(6, 'Putri', 'kepala apotek', 50, '1991-01-22', 'perempuan', 'kepala apotek', 'Tegal Kota, Margadana,', '+628771123', 4000000, 'Putri.png', '$2y$10$nwj44VCT5l3TXoI6jl06vOxUcOTamzBQpk0i1CkAzJJCDsmis1QDi', NULL, '2021-09-08 22:12:51', '2021-09-08 22:12:51'),
(7, 'Abidin', 'medis', 60, '1971-02-18', 'laki-laki', 'medis', 'Tegal Kota, Tegal Timur,', '+628871123', 4000000, 'Abidin.png', '$2y$10$zQK1.dpgzEOsvqvwAvt/gOoRMzSrMN3dwTanujTYYvdeMNu3/8Qpi', NULL, '2021-09-08 22:15:20', '2021-09-08 22:15:20'),
(8, 'Aminah', 'pendaftaran', 70, '1997-09-25', 'perempuan', 'pendaftaran', 'Tegal Kota, Tegal Timur,', '+629871123', 4000000, 'Aminah.png', '$2y$10$CXjWLm6UUYcKe15llrB58uwG7VHpjVX95Wi4q2gYzLlr4Fqv51mrq', NULL, '2021-09-08 22:16:47', '2021-09-08 22:16:47'),
(12, 'Luxy', 'dokter', 17, '1987-09-25', 'perempuan', 'dokter', 'Tegal Kota, Tegal Timur,', '628990908789', 5000000, 'Luxy.png', '$2y$10$rGLl/hvpjIiDU7LkPv.u4.xvjb7ZFBHtnLtzOTkD2WeFyBVmtuX3a', NULL, '2021-09-14 14:39:36', '2021-09-14 14:46:59'),
(13, 'Albert', 'albert', 99, '1987-09-25', 'laki-laki', 'dokter', 'Tegal Kota, Tegal Timur,', '628990908781', 8000000, 'Luxy.png', '$2y$10$e9yfNTCwuAi4.NgJe8tQXeJ2JikucTULvGPq3QnjnT5zjPLuCpag2', NULL, '2021-09-16 10:26:23', '2021-09-16 10:26:23'),
(14, 'Budi', 'budi', 78, '1987-09-25', 'laki-laki', 'dokter', 'Tegal Kota, Tegal Timur,', '628990908711', 8000000, 'Budi.png', '$2y$10$qHeSZy2QwbJrA54rigHyyu2PeQLpFmtGlUV.xKFISXNG9scf1vJlu', NULL, '2021-09-16 10:27:23', '2021-09-16 10:27:23'),
(15, 'Tina', 'tina', 69, '1987-09-25', 'perempuan', 'dokter', 'Tegal Kota, Tegal Timur,', '628990901711', 8000000, 'Tna.png', '$2y$10$SFIrWCbFy2XbDob1JhnboOqKp.qRfPtQUFYKAu/g.19nyGtA94HvS', NULL, '2021-09-16 10:29:32', '2021-09-16 10:29:32'),
(16, 'Fina', 'fina', 50, '1987-09-25', 'perempuan', 'dokter', 'Tegal Kota, Tegal Timur,', '628990101711', 8000000, 'Fina.png', '$2y$10$It7wZte73Q3zhQm1/XkEIOexJzC.eOpkGbfcx7mF3NkwCtfWHRxMa', NULL, '2021-09-16 10:30:59', '2021-09-16 10:30:59'),
(17, 'Malik', 'malik', 49, '1987-09-25', 'laki-laki', 'dokter', 'Tegal Kota, Tegal Timur,', '628910101711', 8000000, 'Malik.png', '$2y$10$bPaY6jM2cU1MStgB/RzpYOy4qi93JiFexNqxvy7E4VrMgCHD2gbzu', NULL, '2021-09-16 10:32:39', '2021-09-16 10:32:39');

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
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
