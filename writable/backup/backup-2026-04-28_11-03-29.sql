-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ci_nasrulrizkimispalah
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alat`
--

DROP TABLE IF EXISTS `alat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(255) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `status` enum('Tersedia','Dipinjam','Perbaikan') DEFAULT 'Tersedia',
  `foto` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alat`
--

LOCK TABLES `alat` WRITE;
/*!40000 ALTER TABLE `alat` DISABLE KEYS */;
INSERT INTO `alat` VALUES (18,'Microsoft Surface Laptop 7. Edition 13.8','Elektronik',0,'Tersedia','1777343203_2126d2871062537ab253.avif','2026-04-28 09:26:43');
/*!40000 ALTER TABLE `alat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denda`
--

DROP TABLE IF EXISTS `denda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denda` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) unsigned NOT NULL,
  `jumlah_denda` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status_pembayaran` enum('Belum Bayar','Lunas') DEFAULT 'Belum Bayar',
  `tanggal_dibuat` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denda`
--

LOCK TABLES `denda` WRITE;
/*!40000 ALTER TABLE `denda` DISABLE KEYS */;
INSERT INTO `denda` VALUES (1,57,75000,'Denda: Telat Rp25,000 (Rusak). Catatan: -','Lunas','2026-04-28 05:13:08'),(2,61,100000,'Kondisi Hilang (Rp 100,000). Catatan: UIEWRF U83CGRFVUIE','Lunas','2026-04-28 09:04:29');
/*!40000 ALTER TABLE `denda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (2,'elektronik','KMR','rgjweuf','2026-04-20 15:12:29','2026-04-20 15:12:29');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `aksi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:22:06'),(2,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:22:07'),(3,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:22:13'),(4,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:22:13'),(5,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:39:52'),(6,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:39:59'),(7,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 01:02:46'),(8,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 01:02:48'),(9,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:00:55'),(10,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:01:11'),(11,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:01:12'),(12,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:01:30'),(13,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:02:10'),(14,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:04:49'),(15,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:04:49'),(16,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:05:07'),(17,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:05:08'),(18,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:26:02'),(19,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:26:03'),(20,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:26:43'),(21,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:26:44'),(22,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:29:52'),(23,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 02:29:53'),(24,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 03:27:01'),(25,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 03:27:01'),(26,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 03:51:25'),(27,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 03:51:26'),(28,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 03:53:19'),(29,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 03:53:22'),(30,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 04:15:03'),(31,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 04:15:03'),(32,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 04:15:17'),(33,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 04:15:18'),(34,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 04:15:29'),(35,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 04:15:31'),(36,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','127.0.0.1','2026-04-28 07:01:26'),(37,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','127.0.0.1','2026-04-28 07:01:27'),(38,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 07:03:19'),(39,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 07:03:24'),(40,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 08:33:07'),(41,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 08:33:12'),(42,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 09:55:34'),(43,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 09:55:38'),(44,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:03:41'),(45,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:03:42'),(46,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:11:20'),(47,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:11:22'),(48,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:17:17'),(49,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:17:30'),(50,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:21:37'),(51,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:21:38'),(52,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:21:43'),(53,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:21:47'),(54,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:22:38'),(55,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:23:05'),(56,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:40:47'),(57,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:40:49'),(58,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:42:47'),(59,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:43:58'),(60,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:44:20'),(61,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:44:20'),(62,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:45:12'),(63,10,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-28 10:45:37');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifikasi`
--

LOCK TABLES `notifikasi` WRITE;
/*!40000 ALTER TABLE `notifikasi` DISABLE KEYS */;
INSERT INTO `notifikasi` VALUES (1,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-16 05:02:28'),(2,3,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-16 05:58:37'),(3,2,'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).',1,'2026-04-16 05:58:37'),(4,5,'Anda telah mengajukan peminjaman alat: Handphone. Silakan tunggu konfirmasi admin.',0,'2026-04-17 15:51:07'),(5,2,'Permintaan Baru: Muhamad Faiz ingin meminjam Handphone (50 unit).',1,'2026-04-17 15:51:07'),(6,3,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-17 16:28:10'),(7,2,'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).',1,'2026-04-17 16:28:11'),(8,2,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-17 17:44:26'),(9,2,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',1,'2026-04-17 17:44:26'),(10,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-18 03:00:52'),(11,2,'Permintaan Baru: ahay ingin meminjam Laptop (1 unit).',1,'2026-04-18 03:00:52'),(12,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-21 06:18:34'),(13,2,'Permintaan Baru: ahay ingin meminjam Laptop (1 unit).',1,'2026-04-21 06:18:34'),(14,1,'Anda telah mengajukan peminjaman alat: GREFG. Silakan tunggu konfirmasi admin.',1,'2026-04-21 16:00:03'),(15,2,'Permintaan Baru: ahay ingin meminjam GREFG (1 unit).',1,'2026-04-21 16:00:03'),(16,1,'Anda telah mengajukan peminjaman alat: mouse. Silakan tunggu konfirmasi admin.',1,'2026-04-21 16:17:50'),(17,2,'Permintaan Baru: ahay ingin meminjam mouse (1 unit).',1,'2026-04-21 16:17:50'),(18,2,'Anda telah mengajukan peminjaman alat: GREFG. Silakan tunggu konfirmasi admin.',1,'2026-04-21 16:28:56'),(19,2,'Permintaan Baru: hehe ingin meminjam GREFG (1 unit).',1,'2026-04-21 16:28:56'),(20,2,'Anda telah mengajukan peminjaman alat: mouse. Silakan tunggu konfirmasi admin.',1,'2026-04-21 16:58:07'),(21,2,'Permintaan Baru: hehe ingin meminjam mouse (1 unit).',1,'2026-04-21 16:58:07'),(22,7,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',0,'2026-04-22 03:40:56'),(23,2,'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).',1,'2026-04-22 03:40:56'),(24,6,'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).',0,'2026-04-22 03:40:56'),(25,2,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-22 04:27:22'),(26,2,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',1,'2026-04-22 04:27:22'),(27,6,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',0,'2026-04-22 04:27:22'),(28,7,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',0,'2026-04-22 04:28:07'),(29,2,'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).',1,'2026-04-22 04:28:07'),(30,6,'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).',0,'2026-04-22 04:28:07'),(31,2,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-22 17:02:10'),(32,2,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',1,'2026-04-22 17:02:10'),(33,6,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',0,'2026-04-22 17:02:10'),(34,2,'Anda telah mengajukan peminjaman alat: kamera. Silakan tunggu konfirmasi admin.',1,'2026-04-23 15:27:15'),(35,2,'Permintaan Baru: hehe ingin meminjam kamera (10 unit).',1,'2026-04-23 15:27:15'),(36,6,'Permintaan Baru: hehe ingin meminjam kamera (10 unit).',0,'2026-04-23 15:27:15'),(37,2,'Anda telah mengajukan peminjaman alat: HEHEHAH. Silakan tunggu konfirmasi admin.',1,'2026-04-23 17:15:52'),(38,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH (1 unit).',1,'2026-04-23 17:15:52'),(39,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH (1 unit).',0,'2026-04-23 17:15:52'),(40,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-24 10:30:46'),(41,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-24 10:30:46'),(42,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-24 10:31:17'),(43,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-24 10:31:17'),(44,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-24 11:25:00'),(45,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-24 11:25:00'),(46,2,'Permintaan Baru: eheheheheheheheheheheh ingin meminjam Laptop',1,'2026-04-24 11:40:02'),(47,6,'Permintaan Baru: eheheheheheheheheheheh ingin meminjam Laptop',0,'2026-04-24 11:40:02'),(48,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 11:51:11'),(49,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 11:51:11'),(50,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-24 11:51:51'),(51,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-24 11:51:51'),(52,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 12:01:09'),(53,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 12:01:09'),(54,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 12:01:31'),(55,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 12:01:31'),(56,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 12:07:32'),(57,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 12:07:32'),(58,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 12:09:33'),(59,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 12:09:33'),(60,2,'Permintaan Baru: ahay ingin meminjam Laptop',1,'2026-04-25 23:36:15'),(61,6,'Permintaan Baru: ahay ingin meminjam Laptop',0,'2026-04-25 23:36:15'),(62,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-25 23:56:37'),(63,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-25 23:56:37'),(64,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-25 23:57:05'),(65,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-25 23:57:05'),(66,2,'Permintaan Baru: hehe ingin meminjam wer',1,'2026-04-26 03:06:41'),(67,6,'Permintaan Baru: hehe ingin meminjam wer',0,'2026-04-26 03:06:41'),(68,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-26 19:22:25'),(69,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 18:55:41'),(70,2,'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 19:01:41'),(71,2,'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 19:03:56'),(72,2,'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 19:15:55'),(73,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 19:34:17'),(74,2,'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 19:43:29'),(75,2,'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 20:20:31'),(76,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 20:26:49'),(77,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 20:40:40'),(78,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 20:58:05'),(79,2,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-27 20:58:13'),(80,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 21:01:21'),(81,2,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-27 21:01:29'),(82,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 22:07:35'),(83,2,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-27 22:07:47'),(84,2,'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 22:08:56'),(85,10,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-27 22:09:06'),(86,2,'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-27 22:11:34'),(87,10,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-27 22:12:51'),(88,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-28 00:01:34'),(89,2,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-28 00:01:49'),(90,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-28 02:00:23'),(91,2,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-28 02:00:32'),(92,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-28 02:02:49'),(93,2,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-28 02:03:27'),(94,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',1,'2026-04-28 02:04:05'),(95,2,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',1,'2026-04-28 02:04:13'),(96,2,'Permintaan Baru: ruriha ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',0,'2026-04-28 03:44:06'),(97,10,'Peminjaman Microsoft Surface Laptop 7. Edition 13.8 DISETUJUI.',0,'2026-04-28 03:44:28');
/*!40000 ALTER TABLE `notifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peminjaman` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_alat` int(11) unsigned DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_peminjam` varchar(100) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tanggal_dikembalikan` datetime DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pending','dipinjam','selesai') DEFAULT 'pending',
  `kondisi_kembali` enum('Baik','Rusak','Hilang') DEFAULT 'Baik',
  `catatan_checking` text DEFAULT NULL,
  `admin_konfirmasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (1,1,NULL,'iruma','2026-04-15','2026-04-15',NULL,0,'selesai','Baik',NULL,NULL),(2,1,NULL,'hehe','2026-04-15','2026-04-15',NULL,1,'selesai','Baik',NULL,NULL),(9,2,NULL,'iruma','2026-04-15','2026-04-16',NULL,1,'selesai','Baik',NULL,NULL),(10,3,NULL,'iruma','2026-04-15','2026-04-15',NULL,1,'selesai','Baik',NULL,NULL),(11,3,NULL,'samsudin','2026-04-16','2026-04-16',NULL,2,'selesai','Baik',NULL,NULL),(12,1,NULL,'iruma','2026-04-16','2026-04-17',NULL,1,'selesai','Baik',NULL,NULL),(14,7,NULL,'Muhamad Faiz','2026-04-17','2026-04-17',NULL,50,'selesai','Baik',NULL,NULL),(15,1,NULL,'ruriha','2026-04-17','2026-04-17',NULL,1,'selesai','Baik',NULL,NULL),(16,1,NULL,'hehe','2026-04-17','2026-04-17',NULL,1,'selesai','Baik',NULL,NULL),(17,1,NULL,'ahay','2026-04-18','2026-04-18',NULL,1,'selesai','Baik',NULL,NULL),(18,1,NULL,'ahay','2026-04-21','2026-04-21',NULL,1,'selesai','Baik',NULL,NULL),(19,10,NULL,'ahay','2026-04-21','2026-04-21',NULL,1,'selesai','Baik',NULL,NULL),(20,2,NULL,'ahay','2026-04-21','2026-04-21',NULL,1,'selesai','Baik',NULL,NULL),(21,10,NULL,'hehe','2026-04-21','2026-04-21',NULL,1,'selesai','Baik',NULL,NULL),(22,2,NULL,'hehe','2026-04-21','2026-04-21',NULL,1,'selesai','Baik',NULL,NULL),(23,1,NULL,'apalah','2026-04-22','2026-04-22',NULL,1,'selesai','Baik',NULL,NULL),(24,1,NULL,'hehe','2026-04-22','2026-04-22',NULL,1,'selesai','Baik',NULL,NULL),(25,1,NULL,'apalah','2026-04-22','2026-04-22',NULL,1,'selesai','Baik',NULL,NULL),(26,1,NULL,'hehe','2026-04-22','2026-04-23',NULL,1,'selesai','Baik',NULL,NULL),(27,3,NULL,'hehe','2026-04-23','2026-04-23',NULL,10,'selesai','Baik',NULL,NULL),(28,16,NULL,'hehe','2026-04-23','2026-04-23',NULL,1,'selesai','Baik',NULL,NULL),(30,16,NULL,'hehe','2026-04-24','2026-04-24',NULL,1,'selesai','Baik',NULL,NULL),(31,16,NULL,'hehe','2026-04-24','2026-04-24',NULL,1,'selesai','Baik',NULL,NULL),(32,1,NULL,'eheheheheheheheheheheh','2026-04-24','2026-04-23',NULL,1,'selesai','Baik',NULL,NULL),(33,1,NULL,'hehe','2026-04-24','2026-04-27',NULL,1,'selesai','Baik',NULL,NULL),(34,16,NULL,'hehe','2026-04-24','2026-04-23',NULL,1,'selesai','Baik',NULL,NULL),(36,1,NULL,'hehe','2026-04-24','2026-04-23',NULL,1,'selesai','Baik',NULL,NULL),(37,1,NULL,'hehe','2026-04-24','2026-04-23',NULL,1,'selesai','Baik',NULL,NULL),(38,1,NULL,'hehe','2026-04-24','2026-04-22',NULL,1,'selesai','Baik',NULL,NULL),(39,5,NULL,'ahay','2026-04-26','2026-04-29','2026-04-26 06:38:25',1,'selesai','Baik',NULL,NULL),(41,16,NULL,'hehe','2026-04-26','2026-04-26','2026-04-26 06:57:28',1,'selesai','Baik',NULL,NULL),(42,4,NULL,'hehe','2026-04-26','2026-04-29','2026-04-26 10:06:54',1,'selesai','Baik',NULL,NULL),(43,17,NULL,'hehe','2026-04-27','2026-04-30','2026-04-27 02:22:55',1,'selesai','Baik',NULL,NULL),(44,17,NULL,'hehe','2026-04-28','2026-05-01','2026-04-28 01:55:58',1,'selesai','Baik',NULL,NULL),(45,17,NULL,'ruriha','2026-04-28','2026-05-01','2026-04-28 02:02:18',1,'selesai','Baik',NULL,NULL),(46,17,NULL,'ruriha','2026-04-28','2026-05-01','2026-04-28 02:07:07',1,'selesai','Baik',NULL,NULL),(47,17,NULL,'ruriha','2026-04-28','2026-05-01','2026-04-28 02:17:01',1,'selesai','Baik',NULL,NULL),(48,18,NULL,'hehe','2026-04-28','2026-05-01','2026-04-28 02:43:08',1,'selesai','Baik',NULL,NULL),(49,18,NULL,'ruriha','2026-04-28','2026-04-27','2026-04-28 02:44:00',1,'selesai','Baik',NULL,NULL),(50,18,NULL,'ruriha','2026-04-28','2026-05-01','2026-04-28 03:21:51',1,'selesai','Baik',NULL,NULL),(51,18,NULL,'hehe','2026-04-28','2026-05-22','2026-04-28 03:47:29',1,'selesai','Baik',NULL,NULL),(52,18,NULL,'hehe','2026-04-28','2026-04-23','2026-04-28 03:47:59',1,'selesai','Baik',NULL,NULL),(53,18,2,'hehe','2026-04-28','2026-04-24','2026-04-28 03:58:33',1,'selesai','Baik',NULL,NULL),(54,18,2,'hehe','2026-04-28','2026-04-24','2026-04-28 04:01:52',1,'selesai','Baik',NULL,NULL),(55,18,2,'hehe','2026-04-28','2026-04-23','2026-04-28 05:07:58',1,'selesai','Baik',NULL,NULL),(56,18,10,'ruriha','2026-04-28','2026-05-01','2026-04-28 05:09:19',1,'selesai','Baik',NULL,NULL),(57,18,10,'ruriha','2026-04-28','2026-04-23','2026-04-28 05:13:08',1,'selesai','Baik',NULL,NULL),(58,18,2,'hehe','2026-04-28','2026-05-01','2026-04-28 07:03:59',1,'selesai','Baik',NULL,NULL),(59,18,2,'hehe','2026-04-28','2026-04-24','2026-04-28 09:00:44',1,'selesai','Baik',NULL,NULL),(60,18,2,'hehe','2026-04-28','2026-04-28','2026-04-28 09:03:40',1,'selesai','Baik',NULL,NULL),(61,18,2,'hehe','2026-04-28','2026-05-01','2026-04-28 09:04:29',1,'selesai','Hilang','UIEWRF U83CGRFVUIE',NULL),(62,18,10,'ruriha','2026-04-28','2026-05-01',NULL,1,'dipinjam','Baik',NULL,NULL);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas','anggota') DEFAULT 'anggota',
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verification_code` varchar(10) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('hehe','nasrulrizki11@gmail.com','hehe','$2y$10$awqxp0B60F3nKd3CtYr3vO1YTJPHz58dSnBSq4g7/H1YzYZVGZZJm','admin','1777256498_1048be41cdb1ec46357f.jpg','aktif','2026-04-11 05:05:43',2,NULL,0),('iruma','inumakiiruma@gmail.com','hehehe','$2y$10$uFen1WgnDs29v0Yn7t.SZeAwqB562TJHJw7Dq8yqqvT5egBuPXS..','petugas','default.png','aktif','2026-04-26 10:11:50',9,NULL,0),('ruriha','inumakiiruma@gmail.com','ruriha','$2y$10$4VlxNcH8RB0.XRQc2sPIdO4zfTqtzj5qJfyV7v8hJiHtKOolhTXfu','anggota','default.png','aktif','2026-04-28 02:00:49',10,NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-28 18:03:30
