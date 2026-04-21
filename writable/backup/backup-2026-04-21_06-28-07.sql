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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alat`
--

LOCK TABLES `alat` WRITE;
/*!40000 ALTER TABLE `alat` DISABLE KEYS */;
INSERT INTO `alat` VALUES (1,'Laptop',NULL,0,'Tersedia','default.jpg','2026-04-11 13:40:41'),(2,'mouse','Elektronik',1,'Tersedia','default.jpg','2026-04-11 13:43:49'),(3,'kamera','Kamera',10,'Tersedia','default.jpg','2026-04-11 22:33:11'),(4,'wer',NULL,100,'Tersedia','default.jpg','2026-04-12 01:03:52'),(5,'Laptop','Elektronik',10,'Tersedia','default.jpg','2026-04-12 12:43:29'),(6,'sekop','Pertukangan',15,'Tersedia','default.jpg','2026-04-16 09:13:47'),(7,'Handphone','Elektronik',50,'Tersedia','default.jpg','2026-04-16 09:14:31'),(8,'knfgojneg','Lainnya',2147483647,'Tersedia','default.jpg','2026-04-17 14:41:51'),(9,'gfiberg','Kamera',10,'Tersedia','default.jpg','2026-04-20 22:12:00'),(10,'GREFG','Lainnya',1,'Tersedia','default.jpg','2026-04-21 12:55:06');
/*!40000 ALTER TABLE `alat` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,1,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-21 06:18:25'),(2,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-21 06:18:46'),(3,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-21 06:19:07'),(4,1,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-21 06:22:31'),(5,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-21 06:28:01');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifikasi`
--

LOCK TABLES `notifikasi` WRITE;
/*!40000 ALTER TABLE `notifikasi` DISABLE KEYS */;
INSERT INTO `notifikasi` VALUES (1,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-16 05:02:28'),(2,3,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-16 05:58:37'),(3,2,'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).',1,'2026-04-16 05:58:37'),(4,5,'Anda telah mengajukan peminjaman alat: Handphone. Silakan tunggu konfirmasi admin.',0,'2026-04-17 15:51:07'),(5,2,'Permintaan Baru: Muhamad Faiz ingin meminjam Handphone (50 unit).',1,'2026-04-17 15:51:07'),(6,3,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-17 16:28:10'),(7,2,'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).',1,'2026-04-17 16:28:11'),(8,2,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-17 17:44:26'),(9,2,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',1,'2026-04-17 17:44:26'),(10,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',0,'2026-04-18 03:00:52'),(11,2,'Permintaan Baru: ahay ingin meminjam Laptop (1 unit).',1,'2026-04-18 03:00:52'),(12,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',0,'2026-04-21 06:18:34'),(13,2,'Permintaan Baru: ahay ingin meminjam Laptop (1 unit).',0,'2026-04-21 06:18:34');
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
  `nama_peminjam` varchar(100) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pending','dipinjam','selesai') DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (1,1,'iruma','2026-04-15','2026-04-15',0,'selesai'),(2,1,'hehe','2026-04-15','2026-04-15',1,'selesai'),(9,2,'iruma','2026-04-15','2026-04-16',1,'selesai'),(10,3,'iruma','2026-04-15','2026-04-15',1,'selesai'),(11,3,'samsudin','2026-04-16','2026-04-16',2,'selesai'),(12,1,'iruma','2026-04-16','2026-04-17',1,'selesai'),(14,7,'Muhamad Faiz','2026-04-17','2026-04-17',50,'selesai'),(15,1,'ruriha','2026-04-17','2026-04-17',1,'selesai'),(16,1,'hehe','2026-04-17','2026-04-17',1,'selesai'),(17,1,'ahay','2026-04-18','2026-04-18',1,'selesai'),(18,1,'ahay','2026-04-21','2026-04-24',1,'dipinjam');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('ahay','inumakiiruma@gmail.com','iruma','$2y$10$W.COFmIYggcfnz1SPIruz.g9HTrthd.fewaHlTz.eDhs3o3H72e9y','anggota','default.png','aktif','2026-04-11 15:40:46',1),('hehe','nasrulrizki11@gmail.com','hehe','$2y$10$333tHXSXRJeH7w2JhGD2euQj7oPUFZv7u0sbl7cPHuKdsCT7tH9fm','admin','1776307918_f9b3e24b5ab95b1d5dac.jpg','aktif','2026-04-11 05:05:43',2),('ruriha','hehe@gmail.com','ruriha','$2y$10$Nzz2K/gJ0bfoT6KgzZ11RuMVphSoVYJdDtq8M5Y6q4A0jOW8Rn/pC','anggota','1776307598_1cb5d3a9f591bf5a4418.jpg','aktif','2026-04-16 02:45:57',3),('asep','inumakiiruma@gmail.com','asep','$2y$10$2uGRl1zKOMCD7hPvvv5dHOq.iMmlR0KRlXR2EXaz2UL3fRBr.2hGC','petugas','1776440001_2b1a4e81fbefb5c49cba.jpg','aktif','2026-04-17 15:33:21',4),('Muhamad Faiz','muhamadfaiz2@gmail.com','paes','$2y$10$.CjiJiPgnCJGCgyXNevE/.xl1H9L8FY3aukRFp2.v09HUjnuNiEDi','anggota','1776441035_6940d3c447b54bd9ae1b.jpg','aktif','2026-04-17 15:50:08',5);
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

-- Dump completed on 2026-04-21 13:28:08
