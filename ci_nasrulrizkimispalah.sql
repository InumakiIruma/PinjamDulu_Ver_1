-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2026 at 01:06 PM
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
(18, 'Microsoft Surface Laptop 7. Edition 13.8', 'Elektronik', 0, 'Tersedia', '1777343203_2126d2871062537ab253.avif', '2026-04-28 09:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_peminjaman` int(11) UNSIGNED NOT NULL,
  `jumlah_denda` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status_pembayaran` enum('Belum Bayar','Lunas') DEFAULT 'Belum Bayar',
  `tanggal_dibuat` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id`, `id_peminjaman`, `jumlah_denda`, `keterangan`, `status_pembayaran`, `tanggal_dibuat`) VALUES
(1, 57, 75000, 'Denda: Telat Rp25,000 (Rusak). Catatan: -', 'Lunas', '2026-04-28 05:13:08'),
(2, 61, 100000, 'Kondisi Hilang (Rp 100,000). Catatan: UIEWRF U83CGRFVUIE', 'Lunas', '2026-04-28 09:04:29');

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

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `kode_kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'elektronik', 'KMR', 'rgjweuf', '2026-04-20 15:12:29', '2026-04-20 15:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `aksi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `aksi`, `keterangan`, `ip_address`, `created_at`) VALUES
(1, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-27 02:22:06'),
(2, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-27 02:22:07'),
(3, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-27 02:22:13'),
(4, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-27 02:22:13'),
(5, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-27 02:39:52'),
(6, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-27 02:39:59'),
(7, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 01:02:46'),
(8, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 01:02:48'),
(9, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:00:55'),
(10, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:01:11'),
(11, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:01:12'),
(12, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:01:30'),
(13, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:02:10'),
(14, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:04:49'),
(15, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:04:49'),
(16, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:05:07'),
(17, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:05:08'),
(18, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:26:02'),
(19, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:26:03'),
(20, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:26:43'),
(21, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:26:44'),
(22, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:29:52'),
(23, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 02:29:53'),
(24, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 03:27:01'),
(25, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 03:27:01'),
(26, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 03:51:25'),
(27, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 03:51:26'),
(28, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 03:53:19'),
(29, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 03:53:22'),
(30, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 04:15:03'),
(31, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 04:15:03'),
(32, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 04:15:17'),
(33, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 04:15:18'),
(34, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 04:15:29'),
(35, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 04:15:31'),
(36, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '127.0.0.1', '2026-04-28 07:01:26'),
(37, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '127.0.0.1', '2026-04-28 07:01:27'),
(38, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 07:03:19'),
(39, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 07:03:24'),
(40, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 08:33:07'),
(41, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 08:33:12'),
(42, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 09:55:34'),
(43, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 09:55:38'),
(44, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:03:41'),
(45, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:03:42'),
(46, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:11:20'),
(47, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:11:22'),
(48, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:17:17'),
(49, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:17:30'),
(50, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:21:37'),
(51, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:21:38'),
(52, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:21:43'),
(53, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:21:47'),
(54, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:22:38'),
(55, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:23:05'),
(56, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:40:47'),
(57, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:40:49'),
(58, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:42:47'),
(59, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:43:58'),
(60, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:44:20'),
(61, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:44:20'),
(62, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:45:12'),
(63, 10, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-28 10:45:37');

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
(5, 2, 'Permintaan Baru: Muhamad Faiz ingin meminjam Handphone (50 unit).', 1, '2026-04-17 15:51:07'),
(6, 3, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-17 16:28:10'),
(7, 2, 'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).', 1, '2026-04-17 16:28:11'),
(8, 2, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-17 17:44:26'),
(9, 2, 'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).', 1, '2026-04-17 17:44:26'),
(10, 1, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-18 03:00:52'),
(11, 2, 'Permintaan Baru: ahay ingin meminjam Laptop (1 unit).', 1, '2026-04-18 03:00:52'),
(12, 1, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-21 06:18:34'),
(13, 2, 'Permintaan Baru: ahay ingin meminjam Laptop (1 unit).', 1, '2026-04-21 06:18:34'),
(14, 1, 'Anda telah mengajukan peminjaman alat: GREFG. Silakan tunggu konfirmasi admin.', 1, '2026-04-21 16:00:03'),
(15, 2, 'Permintaan Baru: ahay ingin meminjam GREFG (1 unit).', 1, '2026-04-21 16:00:03'),
(16, 1, 'Anda telah mengajukan peminjaman alat: mouse. Silakan tunggu konfirmasi admin.', 1, '2026-04-21 16:17:50'),
(17, 2, 'Permintaan Baru: ahay ingin meminjam mouse (1 unit).', 1, '2026-04-21 16:17:50'),
(18, 2, 'Anda telah mengajukan peminjaman alat: GREFG. Silakan tunggu konfirmasi admin.', 1, '2026-04-21 16:28:56'),
(19, 2, 'Permintaan Baru: hehe ingin meminjam GREFG (1 unit).', 1, '2026-04-21 16:28:56'),
(20, 2, 'Anda telah mengajukan peminjaman alat: mouse. Silakan tunggu konfirmasi admin.', 1, '2026-04-21 16:58:07'),
(21, 2, 'Permintaan Baru: hehe ingin meminjam mouse (1 unit).', 1, '2026-04-21 16:58:07'),
(22, 7, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 0, '2026-04-22 03:40:56'),
(23, 2, 'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).', 1, '2026-04-22 03:40:56'),
(24, 6, 'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).', 0, '2026-04-22 03:40:56'),
(25, 2, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-22 04:27:22'),
(26, 2, 'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).', 1, '2026-04-22 04:27:22'),
(27, 6, 'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).', 0, '2026-04-22 04:27:22'),
(28, 7, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 0, '2026-04-22 04:28:07'),
(29, 2, 'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).', 1, '2026-04-22 04:28:07'),
(30, 6, 'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).', 0, '2026-04-22 04:28:07'),
(31, 2, 'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.', 1, '2026-04-22 17:02:10'),
(32, 2, 'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).', 1, '2026-04-22 17:02:10'),
(33, 6, 'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).', 0, '2026-04-22 17:02:10'),
(34, 2, 'Anda telah mengajukan peminjaman alat: kamera. Silakan tunggu konfirmasi admin.', 1, '2026-04-23 15:27:15'),
(35, 2, 'Permintaan Baru: hehe ingin meminjam kamera (10 unit).', 1, '2026-04-23 15:27:15'),
(36, 6, 'Permintaan Baru: hehe ingin meminjam kamera (10 unit).', 0, '2026-04-23 15:27:15'),
(37, 2, 'Anda telah mengajukan peminjaman alat: HEHEHAH. Silakan tunggu konfirmasi admin.', 1, '2026-04-23 17:15:52'),
(38, 2, 'Permintaan Baru: hehe ingin meminjam HEHEHAH (1 unit).', 1, '2026-04-23 17:15:52'),
(39, 6, 'Permintaan Baru: hehe ingin meminjam HEHEHAH (1 unit).', 0, '2026-04-23 17:15:52'),
(40, 2, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 1, '2026-04-24 10:30:46'),
(41, 6, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 0, '2026-04-24 10:30:46'),
(42, 2, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 1, '2026-04-24 10:31:17'),
(43, 6, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 0, '2026-04-24 10:31:17'),
(44, 2, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 1, '2026-04-24 11:25:00'),
(45, 6, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 0, '2026-04-24 11:25:00'),
(46, 2, 'Permintaan Baru: eheheheheheheheheheheh ingin meminjam Laptop', 1, '2026-04-24 11:40:02'),
(47, 6, 'Permintaan Baru: eheheheheheheheheheheh ingin meminjam Laptop', 0, '2026-04-24 11:40:02'),
(48, 2, 'Permintaan Baru: hehe ingin meminjam Laptop', 1, '2026-04-24 11:51:11'),
(49, 6, 'Permintaan Baru: hehe ingin meminjam Laptop', 0, '2026-04-24 11:51:11'),
(50, 2, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 1, '2026-04-24 11:51:51'),
(51, 6, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 0, '2026-04-24 11:51:51'),
(52, 2, 'Permintaan Baru: hehe ingin meminjam Laptop', 1, '2026-04-24 12:01:09'),
(53, 6, 'Permintaan Baru: hehe ingin meminjam Laptop', 0, '2026-04-24 12:01:09'),
(54, 2, 'Permintaan Baru: hehe ingin meminjam Laptop', 1, '2026-04-24 12:01:31'),
(55, 6, 'Permintaan Baru: hehe ingin meminjam Laptop', 0, '2026-04-24 12:01:31'),
(56, 2, 'Permintaan Baru: hehe ingin meminjam Laptop', 1, '2026-04-24 12:07:32'),
(57, 6, 'Permintaan Baru: hehe ingin meminjam Laptop', 0, '2026-04-24 12:07:32'),
(58, 2, 'Permintaan Baru: hehe ingin meminjam Laptop', 1, '2026-04-24 12:09:33'),
(59, 6, 'Permintaan Baru: hehe ingin meminjam Laptop', 0, '2026-04-24 12:09:33'),
(60, 2, 'Permintaan Baru: ahay ingin meminjam Laptop', 1, '2026-04-25 23:36:15'),
(61, 6, 'Permintaan Baru: ahay ingin meminjam Laptop', 0, '2026-04-25 23:36:15'),
(62, 2, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 1, '2026-04-25 23:56:37'),
(63, 6, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 0, '2026-04-25 23:56:37'),
(64, 2, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 1, '2026-04-25 23:57:05'),
(65, 6, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 0, '2026-04-25 23:57:05'),
(66, 2, 'Permintaan Baru: hehe ingin meminjam wer', 1, '2026-04-26 03:06:41'),
(67, 6, 'Permintaan Baru: hehe ingin meminjam wer', 0, '2026-04-26 03:06:41'),
(68, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-26 19:22:25'),
(69, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 18:55:41'),
(70, 2, 'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 19:01:41'),
(71, 2, 'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 19:03:56'),
(72, 2, 'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 19:15:55'),
(73, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 19:34:17'),
(74, 2, 'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 19:43:29'),
(75, 2, 'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 20:20:31'),
(76, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 20:26:49'),
(77, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 20:40:40'),
(78, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 20:58:05'),
(79, 2, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-27 20:58:13'),
(80, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 21:01:21'),
(81, 2, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-27 21:01:29'),
(82, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 22:07:35'),
(83, 2, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-27 22:07:47'),
(84, 2, 'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 22:08:56'),
(85, 10, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-27 22:09:06'),
(86, 2, 'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-27 22:11:34'),
(87, 10, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-27 22:12:51'),
(88, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-28 00:01:34'),
(89, 2, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-28 00:01:49'),
(90, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-28 02:00:23'),
(91, 2, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-28 02:00:32'),
(92, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-28 02:02:49'),
(93, 2, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-28 02:03:27'),
(94, 2, 'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 1, '2026-04-28 02:04:05'),
(95, 2, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 1, '2026-04-28 02:04:13'),
(96, 2, 'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8', 0, '2026-04-28 03:44:06'),
(97, 10, 'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.', 0, '2026-04-28 03:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_alat` int(11) UNSIGNED DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_peminjam` varchar(100) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tanggal_dikembalikan` datetime DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pending','dipinjam','selesai') DEFAULT 'pending',
  `kondisi_kembali` enum('Baik','Rusak','Hilang') DEFAULT 'Baik',
  `catatan_checking` text DEFAULT NULL,
  `admin_konfirmasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_alat`, `id_user`, `nama_peminjam`, `tgl_pinjam`, `tgl_kembali`, `tanggal_dikembalikan`, `jumlah`, `status`, `kondisi_kembali`, `catatan_checking`, `admin_konfirmasi`) VALUES
(1, 1, NULL, 'iruma', '2026-04-15', '2026-04-15', NULL, 0, 'selesai', 'Baik', NULL, NULL),
(2, 1, NULL, 'hehe', '2026-04-15', '2026-04-15', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(9, 2, NULL, 'iruma', '2026-04-15', '2026-04-16', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(10, 3, NULL, 'iruma', '2026-04-15', '2026-04-15', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(11, 3, NULL, 'samsudin', '2026-04-16', '2026-04-16', NULL, 2, 'selesai', 'Baik', NULL, NULL),
(12, 1, NULL, 'iruma', '2026-04-16', '2026-04-17', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(14, 7, NULL, 'Muhamad Faiz', '2026-04-17', '2026-04-17', NULL, 50, 'selesai', 'Baik', NULL, NULL),
(15, 1, NULL, 'ruriha', '2026-04-17', '2026-04-17', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(16, 1, NULL, 'hehe', '2026-04-17', '2026-04-17', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(17, 1, NULL, 'ahay', '2026-04-18', '2026-04-18', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(18, 1, NULL, 'ahay', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(19, 10, NULL, 'ahay', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(20, 2, NULL, 'ahay', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(21, 10, NULL, 'hehe', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(22, 2, NULL, 'hehe', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(23, 1, NULL, 'apalah', '2026-04-22', '2026-04-22', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(24, 1, NULL, 'hehe', '2026-04-22', '2026-04-22', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(25, 1, NULL, 'apalah', '2026-04-22', '2026-04-22', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(26, 1, NULL, 'hehe', '2026-04-22', '2026-04-23', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(27, 3, NULL, 'hehe', '2026-04-23', '2026-04-23', NULL, 10, 'selesai', 'Baik', NULL, NULL),
(28, 16, NULL, 'hehe', '2026-04-23', '2026-04-23', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(30, 16, NULL, 'hehe', '2026-04-24', '2026-04-24', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(31, 16, NULL, 'hehe', '2026-04-24', '2026-04-24', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(32, 1, NULL, 'eheheheheheheheheheheh', '2026-04-24', '2026-04-23', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(33, 1, NULL, 'hehe', '2026-04-24', '2026-04-27', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(34, 16, NULL, 'hehe', '2026-04-24', '2026-04-23', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(36, 1, NULL, 'hehe', '2026-04-24', '2026-04-23', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(37, 1, NULL, 'hehe', '2026-04-24', '2026-04-23', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(38, 1, NULL, 'hehe', '2026-04-24', '2026-04-22', NULL, 1, 'selesai', 'Baik', NULL, NULL),
(39, 5, NULL, 'ahay', '2026-04-26', '2026-04-29', '2026-04-26 06:38:25', 1, 'selesai', 'Baik', NULL, NULL),
(41, 16, NULL, 'hehe', '2026-04-26', '2026-04-26', '2026-04-26 06:57:28', 1, 'selesai', 'Baik', NULL, NULL),
(42, 4, NULL, 'hehe', '2026-04-26', '2026-04-29', '2026-04-26 10:06:54', 1, 'selesai', 'Baik', NULL, NULL),
(43, 17, NULL, 'hehe', '2026-04-27', '2026-04-30', '2026-04-27 02:22:55', 1, 'selesai', 'Baik', NULL, NULL),
(44, 17, NULL, 'hehe', '2026-04-28', '2026-05-01', '2026-04-28 01:55:58', 1, 'selesai', 'Baik', NULL, NULL),
(45, 17, NULL, 'ruriha', '2026-04-28', '2026-05-01', '2026-04-28 02:02:18', 1, 'selesai', 'Baik', NULL, NULL),
(46, 17, NULL, 'ruriha', '2026-04-28', '2026-05-01', '2026-04-28 02:07:07', 1, 'selesai', 'Baik', NULL, NULL),
(47, 17, NULL, 'ruriha', '2026-04-28', '2026-05-01', '2026-04-28 02:17:01', 1, 'selesai', 'Baik', NULL, NULL),
(48, 18, NULL, 'hehe', '2026-04-28', '2026-05-01', '2026-04-28 02:43:08', 1, 'selesai', 'Baik', NULL, NULL),
(49, 18, NULL, 'ruriha', '2026-04-28', '2026-04-27', '2026-04-28 02:44:00', 1, 'selesai', 'Baik', NULL, NULL),
(50, 18, NULL, 'ruriha', '2026-04-28', '2026-05-01', '2026-04-28 03:21:51', 1, 'selesai', 'Baik', NULL, NULL),
(51, 18, NULL, 'hehe', '2026-04-28', '2026-05-22', '2026-04-28 03:47:29', 1, 'selesai', 'Baik', NULL, NULL),
(52, 18, NULL, 'hehe', '2026-04-28', '2026-04-23', '2026-04-28 03:47:59', 1, 'selesai', 'Baik', NULL, NULL),
(53, 18, 2, 'hehe', '2026-04-28', '2026-04-24', '2026-04-28 03:58:33', 1, 'selesai', 'Baik', NULL, NULL),
(54, 18, 2, 'hehe', '2026-04-28', '2026-04-24', '2026-04-28 04:01:52', 1, 'selesai', 'Baik', NULL, NULL),
(55, 18, 2, 'hehe', '2026-04-28', '2026-04-23', '2026-04-28 05:07:58', 1, 'selesai', 'Baik', NULL, NULL),
(56, 18, 10, 'ruriha', '2026-04-28', '2026-05-01', '2026-04-28 05:09:19', 1, 'selesai', 'Baik', NULL, NULL),
(57, 18, 10, 'ruriha', '2026-04-28', '2026-04-23', '2026-04-28 05:13:08', 1, 'selesai', 'Baik', NULL, NULL),
(58, 18, 2, 'hehe', '2026-04-28', '2026-05-01', '2026-04-28 07:03:59', 1, 'selesai', 'Baik', NULL, NULL),
(59, 18, 2, 'hehe', '2026-04-28', '2026-04-24', '2026-04-28 09:00:44', 1, 'selesai', 'Baik', NULL, NULL),
(60, 18, 2, 'hehe', '2026-04-28', '2026-04-28', '2026-04-28 09:03:40', 1, 'selesai', 'Baik', NULL, NULL),
(61, 18, 2, 'hehe', '2026-04-28', '2026-05-01', '2026-04-28 09:04:29', 1, 'selesai', 'Hilang', 'UIEWRF U83CGRFVUIE', NULL),
(62, 18, 10, 'ruriha', '2026-04-28', '2026-05-01', NULL, 1, 'dipinjam', 'Baik', NULL, NULL);

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
  `id` int(11) NOT NULL,
  `verification_code` varchar(10) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nama`, `email`, `username`, `password`, `role`, `foto`, `status`, `created_at`, `id`, `verification_code`, `is_verified`) VALUES
('hehe', 'nasrulrizki11@gmail.com', 'hehe', '$2y$10$awqxp0B60F3nKd3CtYr3vO1YTJPHz58dSnBSq4g7/H1YzYZVGZZJm', 'admin', '1777256498_1048be41cdb1ec46357f.jpg', 'aktif', '2026-04-11 05:05:43', 2, NULL, 0),
('iruma', 'inumakiiruma@gmail.com', 'hehehe', '$2y$10$uFen1WgnDs29v0Yn7t.SZeAwqB562TJHJw7Dq8yqqvT5egBuPXS..', 'petugas', 'default.png', 'aktif', '2026-04-26 10:11:50', 9, NULL, 0),
('ruriha', 'inumakiiruma@gmail.com', 'ruriha', '$2y$10$4VlxNcH8RB0.XRQc2sPIdO4zfTqtzj5qJfyV7v8hJiHtKOolhTXfu', 'anggota', 'default.png', 'aktif', '2026-04-28 02:00:49', 10, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
