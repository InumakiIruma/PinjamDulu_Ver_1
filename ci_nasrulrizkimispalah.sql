-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2026 at 07:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_nasrulrizkimispalah`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `status` enum('Tersedia','Dipinjam','Perbaikan') DEFAULT 'Tersedia',
  `foto` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id`, `nama_alat`, `kategori`, `stok`, `status`, `foto`, `created_at`) VALUES
(1, 'Laptop', 'Elektronik', 1, 'Dipinjam', 'default.jpg', '2026-04-11 13:40:41'),
(2, 'mouse', 'Elektronik', 1, 'Tersedia', 'default.jpg', '2026-04-11 13:43:49'),
(3, 'kamera', 'Kamera', 10, 'Tersedia', 'default.jpg', '2026-04-11 22:33:11'),
(4, 'wer', 'Elektronik', 100, 'Perbaikan', 'default.jpg', '2026-04-12 01:03:52'),
(5, 'Laptop', 'Elektronik', 10, 'Tersedia', 'default.jpg', '2026-04-12 12:43:29'),
(6, 'sekop', 'Pertukangan', 15, 'Tersedia', 'default.jpg', '2026-04-16 09:13:47'),
(7, 'Handphone', 'Elektronik', 50, 'Tersedia', 'default.jpg', '2026-04-16 09:14:31'),
(8, 'knfgojneg', 'Lainnya', 2147483647, 'Tersedia', 'default.jpg', '2026-04-17 14:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `pesan`, `is_read`, `created_at`) VALUES
(1, 1, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-16 05:02:28'),
(2, 3, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-16 05:58:37'),
(3, 2, 'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).', 1, '2026-04-16 05:58:37'),
(4, 5, 'Anda telah mengajukan peminjaman alat: Handphone. Silakan tunggu konfirmasi admin.', 0, '2026-04-17 15:51:07'),
(5, 2, 'Permintaan Baru: Muhamad Faiz ingin meminjam Handphone (50 unit).', 0, '2026-04-17 15:51:07'),
(6, 3, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-17 16:28:10'),
(7, 2, 'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).', 0, '2026-04-17 16:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_alat` int(11) UNSIGNED DEFAULT NULL,
  `nama_peminjam` varchar(100) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pending','dipinjam','selesai') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_alat`, `nama_peminjam`, `tgl_pinjam`, `tgl_kembali`, `jumlah`, `status`) VALUES
(1, 1, 'iruma', '2026-04-15', '2026-04-15', 0, 'selesai'),
(2, 1, 'hehe', '2026-04-15', '2026-04-15', 1, 'selesai'),
(9, 2, 'iruma', '2026-04-15', '2026-04-16', 1, 'selesai'),
(10, 3, 'iruma', '2026-04-15', '2026-04-15', 1, 'selesai'),
(11, 3, 'samsudin', '2026-04-16', '2026-04-16', 2, 'selesai'),
(12, 1, 'iruma', '2026-04-16', '2026-04-17', 1, 'selesai'),
(14, 7, 'Muhamad Faiz', '2026-04-17', '2026-04-17', 50, 'selesai'),
(15, 1, 'ruriha', '2026-04-17', '2026-04-17', 1, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas','anggota') DEFAULT 'anggota',
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nama`, `email`, `username`, `password`, `role`, `foto`, `status`, `created_at`, `id`) VALUES
('kontil', 'inumakiiruma@gmail.com', 'iruma', '$2y$10$W.COFmIYggcfnz1SPIruz.g9HTrthd.fewaHlTz.eDhs3o3H72e9y', 'anggota', 'default.png', 'aktif', '2026-04-11 15:40:46', 1),
('hehe', 'nasrulrizki11@gmail.com', 'hehe', '$2y$10$333tHXSXRJeH7w2JhGD2euQj7oPUFZv7u0sbl7cPHuKdsCT7tH9fm', 'admin', '1776307918_f9b3e24b5ab95b1d5dac.jpg', 'aktif', '2026-04-11 05:05:43', 2),
('ruriha', 'hehe@gmail.com', 'ruriha', '$2y$10$Nzz2K/gJ0bfoT6KgzZ11RuMVphSoVYJdDtq8M5Y6q4A0jOW8Rn/pC', 'anggota', '1776307598_1cb5d3a9f591bf5a4418.jpg', 'aktif', '2026-04-16 02:45:57', 3),
('asep', 'inumakiiruma@gmail.com', 'asep', '$2y$10$2uGRl1zKOMCD7hPvvv5dHOq.iMmlR0KRlXR2EXaz2UL3fRBr.2hGC', 'petugas', '1776440001_2b1a4e81fbefb5c49cba.jpg', 'aktif', '2026-04-17 15:33:21', 4),
('Muhamad Faiz', 'muhamadfaiz2@gmail.com', 'paes', '$2y$10$.CjiJiPgnCJGCgyXNevE/.xl1H9L8FY3aukRFp2.v09HUjnuNiEDi', 'anggota', '1776441035_6940d3c447b54bd9ae1b.jpg', 'aktif', '2026-04-17 15:50:08', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
