-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2026 at 09:54 AM
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
(1, 'Laptop', NULL, 1, 'Tersedia', 'default.jpg', '2026-04-11 13:40:41'),
(2, 'mouse', 'Elektronik', 1, 'Tersedia', 'default.jpg', '2026-04-11 13:43:49'),
(3, 'kamera', 'Kamera', 10, 'Tersedia', 'default.jpg', '2026-04-11 22:33:11'),
(4, 'wer', NULL, 100, 'Tersedia', 'default.jpg', '2026-04-12 01:03:52'),
(5, 'Laptop', 'Elektronik', 10, 'Tersedia', 'default.jpg', '2026-04-12 12:43:29'),
(6, 'sekop', 'Pertukangan', 15, 'Tersedia', 'default.jpg', '2026-04-16 09:13:47'),
(7, 'Handphone', 'Elektronik', 50, 'Tersedia', 'default.jpg', '2026-04-16 09:14:31'),
(8, 'knfgojneg', 'Lainnya', 2147483647, 'Tersedia', 'default.jpg', '2026-04-17 14:41:51'),
(9, 'gfiberg', 'Kamera', 10, 'Tersedia', 'default.jpg', '2026-04-20 22:12:00'),
(10, 'GREFG', 'Lainnya', 1, 'Tersedia', 'default.jpg', '2026-04-21 12:55:06'),
(11, 'Laptop', NULL, 1, 'Tersedia', 'default.jpg', '2026-04-23 23:09:29'),
(12, 'Laptop', 'Elektronik', 1, 'Tersedia', 'default.jpg', '2026-04-23 23:19:30'),
(13, 'wefwf', 'Kamera', 1, 'Tersedia', 'default.jpg', '2026-04-23 23:39:10'),
(14, 'qwer', 'Elektronik', 1, 'Tersedia', 'default.jpg', '2026-04-23 23:44:40'),
(16, 'HEHEHAH', 'Lainnya', 1, 'Tersedia', '1776963746_a7303eca846503d9d7e8.jpg', '2026-04-24 00:02:26');

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
(1, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:18:25'),
(2, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:18:46'),
(3, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:19:07'),
(4, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:22:31'),
(5, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:28:01'),
(6, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:40:25'),
(7, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:40:46'),
(8, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:45:17'),
(9, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:47:14'),
(10, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:49:24'),
(11, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:50:32'),
(12, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:53:58'),
(13, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:56:32'),
(14, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 06:57:13'),
(15, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 07:02:18'),
(16, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 07:02:49'),
(17, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 15:16:01'),
(18, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 15:29:33'),
(19, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 15:29:36'),
(20, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 15:39:06'),
(21, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 15:53:36'),
(22, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 15:53:53'),
(23, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 15:59:50'),
(24, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 16:01:20'),
(25, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 16:01:40'),
(26, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 16:01:45'),
(27, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 16:11:02'),
(28, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 16:17:35'),
(29, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 16:18:06'),
(30, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 17:13:27'),
(31, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 17:13:28'),
(32, 6, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 17:31:57'),
(33, 6, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-21 17:32:10'),
(34, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 02:38:49'),
(35, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 02:40:29'),
(36, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 03:22:16'),
(37, 7, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 03:23:49'),
(38, 7, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 03:40:15'),
(39, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 03:41:11'),
(40, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 03:41:18'),
(41, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 03:41:36'),
(42, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 03:41:49'),
(43, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 03:43:16'),
(44, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 04:27:11'),
(45, 7, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 04:27:59'),
(46, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 04:29:01'),
(47, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 04:34:20'),
(48, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 05:02:12'),
(49, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 05:50:47'),
(50, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 06:38:03'),
(51, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 07:06:53'),
(52, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 16:57:29'),
(53, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 17:01:59'),
(54, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 17:02:27'),
(55, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-22 17:41:18'),
(56, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 15:24:14'),
(57, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 15:27:05'),
(58, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 15:27:17'),
(59, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 15:27:28'),
(60, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 15:56:05'),
(61, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:09:44'),
(62, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:11:00'),
(63, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:19:08'),
(64, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:19:10'),
(65, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:36:55'),
(66, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:36:57'),
(67, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:44:26'),
(68, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:44:27'),
(69, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:50:49'),
(70, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:50:50'),
(71, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:52:11'),
(72, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:52:11'),
(73, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:52:52'),
(74, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:52:52'),
(75, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:52:53'),
(76, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:52:54'),
(77, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:53:01'),
(78, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 16:53:01'),
(79, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:01:27'),
(80, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:01:28'),
(81, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:01:52'),
(82, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:01:52'),
(83, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:02:11'),
(84, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:02:12'),
(85, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:02:27'),
(86, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:02:27'),
(87, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:15:19'),
(88, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:15:20'),
(89, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:15:58'),
(90, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:15:58'),
(91, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:16:09'),
(92, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:16:09'),
(93, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:17:34'),
(94, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-23 17:17:34'),
(95, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 14:49:17'),
(96, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 14:49:17'),
(97, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:04:02'),
(98, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:04:04'),
(99, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:40:16'),
(100, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:40:29'),
(101, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:40:33'),
(102, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:44:33'),
(103, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:44:37'),
(104, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:45:24'),
(105, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:45:26'),
(106, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:47:09'),
(107, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:47:11'),
(108, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:47:47'),
(109, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 15:47:49'),
(110, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:22:47'),
(111, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:23:06'),
(112, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:23:11'),
(113, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:26:16'),
(114, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:26:21'),
(115, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:29:02'),
(116, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:29:16'),
(117, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:29:30'),
(118, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:30:50'),
(119, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:30:54'),
(120, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:34:40'),
(121, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 16:53:07'),
(122, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:11:57'),
(123, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:13:36'),
(124, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:13:38'),
(125, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:21:35'),
(126, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:21:50'),
(127, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:25:13'),
(128, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:27:21'),
(129, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:27:23'),
(130, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:31:29'),
(131, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:31:29'),
(132, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:31:49'),
(133, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 17:31:50'),
(134, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:25:07'),
(135, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:25:07'),
(136, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:39:12'),
(137, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:39:13'),
(138, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:40:04'),
(139, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:40:04'),
(140, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:40:30'),
(141, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:40:31'),
(142, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:40:42'),
(143, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:40:43'),
(144, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:40:57'),
(145, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:40:57'),
(146, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:51:30'),
(147, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:51:31'),
(148, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:51:37'),
(149, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 18:51:37'),
(150, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 19:09:23'),
(151, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-24 19:09:24'),
(152, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 04:01:28'),
(153, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 04:01:30'),
(154, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 06:28:00'),
(155, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 06:28:01'),
(156, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 06:28:16'),
(157, 1, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 06:28:17'),
(158, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 06:36:52'),
(159, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 06:36:53'),
(160, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 06:59:06'),
(161, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 06:59:08'),
(162, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 07:12:48'),
(163, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 07:12:49'),
(164, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 07:12:50'),
(165, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 07:12:52'),
(166, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 07:12:53'),
(167, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 07:53:45'),
(168, 2, 'AKSES DASHBOARD', 'User membuka halaman Dashboard utama', '::1', '2026-04-26 07:53:52');

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
(65, 6, 'Permintaan Baru: hehe ingin meminjam HEHEHAH', 0, '2026-04-25 23:57:05');

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
  `tanggal_dikembalikan` datetime DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pending','dipinjam','selesai') DEFAULT 'pending',
  `denda` int(11) DEFAULT 0,
  `status_denda` varchar(20) DEFAULT 'lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_alat`, `nama_peminjam`, `tgl_pinjam`, `tgl_kembali`, `tanggal_dikembalikan`, `jumlah`, `status`, `denda`, `status_denda`) VALUES
(1, 1, 'iruma', '2026-04-15', '2026-04-15', NULL, 0, 'selesai', 0, 'lunas'),
(2, 1, 'hehe', '2026-04-15', '2026-04-15', NULL, 1, 'selesai', 0, 'lunas'),
(9, 2, 'iruma', '2026-04-15', '2026-04-16', NULL, 1, 'selesai', 0, 'lunas'),
(10, 3, 'iruma', '2026-04-15', '2026-04-15', NULL, 1, 'selesai', 0, 'lunas'),
(11, 3, 'samsudin', '2026-04-16', '2026-04-16', NULL, 2, 'selesai', 0, 'lunas'),
(12, 1, 'iruma', '2026-04-16', '2026-04-17', NULL, 1, 'selesai', 0, 'lunas'),
(14, 7, 'Muhamad Faiz', '2026-04-17', '2026-04-17', NULL, 50, 'selesai', 0, 'lunas'),
(15, 1, 'ruriha', '2026-04-17', '2026-04-17', NULL, 1, 'selesai', 0, 'lunas'),
(16, 1, 'hehe', '2026-04-17', '2026-04-17', NULL, 1, 'selesai', 0, 'lunas'),
(17, 1, 'ahay', '2026-04-18', '2026-04-18', NULL, 1, 'selesai', 0, 'lunas'),
(18, 1, 'ahay', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 0, 'lunas'),
(19, 10, 'ahay', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 0, 'lunas'),
(20, 2, 'ahay', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 0, 'lunas'),
(21, 10, 'hehe', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 0, 'lunas'),
(22, 2, 'hehe', '2026-04-21', '2026-04-21', NULL, 1, 'selesai', 0, 'lunas'),
(23, 1, 'apalah', '2026-04-22', '2026-04-22', NULL, 1, 'selesai', 0, 'lunas'),
(24, 1, 'hehe', '2026-04-22', '2026-04-22', NULL, 1, 'selesai', 0, 'lunas'),
(25, 1, 'apalah', '2026-04-22', '2026-04-22', NULL, 1, 'selesai', 0, 'lunas'),
(26, 1, 'hehe', '2026-04-22', '2026-04-23', NULL, 1, 'selesai', 0, 'lunas'),
(27, 3, 'hehe', '2026-04-23', '2026-04-23', NULL, 10, 'selesai', 0, 'lunas'),
(28, 16, 'hehe', '2026-04-23', '2026-04-23', NULL, 1, 'selesai', 0, 'lunas'),
(30, 16, 'hehe', '2026-04-24', '2026-04-24', NULL, 1, 'selesai', 0, 'lunas'),
(31, 16, 'hehe', '2026-04-24', '2026-04-24', NULL, 1, 'selesai', 0, 'lunas'),
(32, 1, 'eheheheheheheheheheheh', '2026-04-24', '2026-04-23', NULL, 1, 'selesai', 0, 'lunas'),
(33, 1, 'hehe', '2026-04-24', '2026-04-27', NULL, 1, 'selesai', 0, 'lunas'),
(34, 16, 'hehe', '2026-04-24', '2026-04-23', NULL, 1, 'selesai', 0, 'lunas'),
(36, 1, 'hehe', '2026-04-24', '2026-04-23', NULL, 1, 'selesai', 0, 'lunas'),
(37, 1, 'hehe', '2026-04-24', '2026-04-23', NULL, 1, 'selesai', 0, 'lunas'),
(38, 1, 'hehe', '2026-04-24', '2026-04-22', NULL, 1, 'selesai', 0, 'lunas'),
(39, 5, 'ahay', '2026-04-26', '2026-04-29', '2026-04-26 06:38:25', 1, 'selesai', 0, 'lunas'),
(41, 16, 'hehe', '2026-04-26', '2026-04-26', '2026-04-26 06:57:28', 1, 'selesai', 0, 'lunas');

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
('ahay', 'inumakiiruma@gmail.com', 'iruma', '$2y$10$cUqzGvnbbjy5SyVzhgbbP.yX7mmRZxmPUV0kmZ.rmGkNbyChhPFMq', 'anggota', '1776754890_98b119f7683e6f16b00a.jpg', 'aktif', '2026-04-11 15:40:46', 1, NULL, 0),
('hehe', 'nasrulrizki11@gmail.com', 'hehe', '$2y$10$333tHXSXRJeH7w2JhGD2euQj7oPUFZv7u0sbl7cPHuKdsCT7tH9fm', 'admin', '1776307918_f9b3e24b5ab95b1d5dac.jpg', 'aktif', '2026-04-11 05:05:43', 2, NULL, 0),
('ruriha', 'hehe@gmail.com', 'ruriha', '$2y$10$Nzz2K/gJ0bfoT6KgzZ11RuMVphSoVYJdDtq8M5Y6q4A0jOW8Rn/pC', 'anggota', '1776307598_1cb5d3a9f591bf5a4418.jpg', 'aktif', '2026-04-16 02:45:57', 3, NULL, 0),
('asep', 'inumakiiruma@gmail.com', 'asep', '$2y$10$2uGRl1zKOMCD7hPvvv5dHOq.iMmlR0KRlXR2EXaz2UL3fRBr.2hGC', 'petugas', '1776440001_2b1a4e81fbefb5c49cba.jpg', 'aktif', '2026-04-17 15:33:21', 4, NULL, 0),
('Muhamad Faiz', 'muhamadfaiz2@gmail.com', 'paes', '$2y$10$.CjiJiPgnCJGCgyXNevE/.xl1H9L8FY3aukRFp2.v09HUjnuNiEDi', 'anggota', '1776441035_6940d3c447b54bd9ae1b.jpg', 'aktif', '2026-04-17 15:50:08', 5, NULL, 0),
('uhuyyy', 'inumakiiruma@gmail.com', 'uhuyyy', '$2y$10$ADkmHnMYJGLg6V4h8gjVgefXUhZloPqqgvVVX2cEEDXoG5fPZSkdq', 'admin', 'default.png', 'aktif', '2026-04-21 17:30:24', 6, NULL, 0),
('apalah', 'inumakiiruma@gmail.com', 'apalah', '$2y$10$eF2/Gx4x4HWf.OvjO3IHIerwv7RtOZrThvOtR7bJ70fsDlqIr0wr.', 'anggota', 'default.png', 'aktif', '2026-04-22 03:23:21', 7, NULL, 0);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
