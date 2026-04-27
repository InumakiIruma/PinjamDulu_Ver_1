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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alat`
--

LOCK TABLES `alat` WRITE;
/*!40000 ALTER TABLE `alat` DISABLE KEYS */;
INSERT INTO `alat` VALUES (17,'Microsoft Surface Laptop 7. Edition 13.8',NULL,1,'Tersedia','1777198867_639147c50402bef648ba.avif','2026-04-26 17:21:08');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:22:06'),(2,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:22:07'),(3,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:22:13'),(4,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:22:13'),(5,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:39:52'),(6,2,'AKSES DASHBOARD','User membuka halaman Dashboard utama','::1','2026-04-27 02:39:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifikasi`
--

LOCK TABLES `notifikasi` WRITE;
/*!40000 ALTER TABLE `notifikasi` DISABLE KEYS */;
INSERT INTO `notifikasi` VALUES (1,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-16 05:02:28'),(2,3,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-16 05:58:37'),(3,2,'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).',1,'2026-04-16 05:58:37'),(4,5,'Anda telah mengajukan peminjaman alat: Handphone. Silakan tunggu konfirmasi admin.',0,'2026-04-17 15:51:07'),(5,2,'Permintaan Baru: Muhamad Faiz ingin meminjam Handphone (50 unit).',1,'2026-04-17 15:51:07'),(6,3,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-17 16:28:10'),(7,2,'Permintaan Baru: ruriha ingin meminjam Laptop (1 unit).',1,'2026-04-17 16:28:11'),(8,2,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-17 17:44:26'),(9,2,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',1,'2026-04-17 17:44:26'),(10,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-18 03:00:52'),(11,2,'Permintaan Baru: ahay ingin meminjam Laptop (1 unit).',1,'2026-04-18 03:00:52'),(12,1,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-21 06:18:34'),(13,2,'Permintaan Baru: ahay ingin meminjam Laptop (1 unit).',1,'2026-04-21 06:18:34'),(14,1,'Anda telah mengajukan peminjaman alat: GREFG. Silakan tunggu konfirmasi admin.',1,'2026-04-21 16:00:03'),(15,2,'Permintaan Baru: ahay ingin meminjam GREFG (1 unit).',1,'2026-04-21 16:00:03'),(16,1,'Anda telah mengajukan peminjaman alat: mouse. Silakan tunggu konfirmasi admin.',1,'2026-04-21 16:17:50'),(17,2,'Permintaan Baru: ahay ingin meminjam mouse (1 unit).',1,'2026-04-21 16:17:50'),(18,2,'Anda telah mengajukan peminjaman alat: GREFG. Silakan tunggu konfirmasi admin.',1,'2026-04-21 16:28:56'),(19,2,'Permintaan Baru: hehe ingin meminjam GREFG (1 unit).',1,'2026-04-21 16:28:56'),(20,2,'Anda telah mengajukan peminjaman alat: mouse. Silakan tunggu konfirmasi admin.',1,'2026-04-21 16:58:07'),(21,2,'Permintaan Baru: hehe ingin meminjam mouse (1 unit).',1,'2026-04-21 16:58:07'),(22,7,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',0,'2026-04-22 03:40:56'),(23,2,'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).',1,'2026-04-22 03:40:56'),(24,6,'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).',0,'2026-04-22 03:40:56'),(25,2,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-22 04:27:22'),(26,2,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',1,'2026-04-22 04:27:22'),(27,6,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',0,'2026-04-22 04:27:22'),(28,7,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',0,'2026-04-22 04:28:07'),(29,2,'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).',1,'2026-04-22 04:28:07'),(30,6,'Permintaan Baru: apalah ingin meminjam Laptop (1 unit).',0,'2026-04-22 04:28:07'),(31,2,'Anda telah mengajukan peminjaman alat: Laptop. Silakan tunggu konfirmasi admin.',1,'2026-04-22 17:02:10'),(32,2,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',1,'2026-04-22 17:02:10'),(33,6,'Permintaan Baru: hehe ingin meminjam Laptop (1 unit).',0,'2026-04-22 17:02:10'),(34,2,'Anda telah mengajukan peminjaman alat: kamera. Silakan tunggu konfirmasi admin.',1,'2026-04-23 15:27:15'),(35,2,'Permintaan Baru: hehe ingin meminjam kamera (10 unit).',1,'2026-04-23 15:27:15'),(36,6,'Permintaan Baru: hehe ingin meminjam kamera (10 unit).',0,'2026-04-23 15:27:15'),(37,2,'Anda telah mengajukan peminjaman alat: HEHEHAH. Silakan tunggu konfirmasi admin.',1,'2026-04-23 17:15:52'),(38,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH (1 unit).',1,'2026-04-23 17:15:52'),(39,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH (1 unit).',0,'2026-04-23 17:15:52'),(40,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-24 10:30:46'),(41,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-24 10:30:46'),(42,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-24 10:31:17'),(43,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-24 10:31:17'),(44,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-24 11:25:00'),(45,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-24 11:25:00'),(46,2,'Permintaan Baru: eheheheheheheheheheheh ingin meminjam Laptop',1,'2026-04-24 11:40:02'),(47,6,'Permintaan Baru: eheheheheheheheheheheh ingin meminjam Laptop',0,'2026-04-24 11:40:02'),(48,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 11:51:11'),(49,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 11:51:11'),(50,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-24 11:51:51'),(51,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-24 11:51:51'),(52,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 12:01:09'),(53,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 12:01:09'),(54,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 12:01:31'),(55,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 12:01:31'),(56,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 12:07:32'),(57,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 12:07:32'),(58,2,'Permintaan Baru: hehe ingin meminjam Laptop',1,'2026-04-24 12:09:33'),(59,6,'Permintaan Baru: hehe ingin meminjam Laptop',0,'2026-04-24 12:09:33'),(60,2,'Permintaan Baru: ahay ingin meminjam Laptop',1,'2026-04-25 23:36:15'),(61,6,'Permintaan Baru: ahay ingin meminjam Laptop',0,'2026-04-25 23:36:15'),(62,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-25 23:56:37'),(63,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-25 23:56:37'),(64,2,'Permintaan Baru: hehe ingin meminjam HEHEHAH',1,'2026-04-25 23:57:05'),(65,6,'Permintaan Baru: hehe ingin meminjam HEHEHAH',0,'2026-04-25 23:57:05'),(66,2,'Permintaan Baru: hehe ingin meminjam wer',0,'2026-04-26 03:06:41'),(67,6,'Permintaan Baru: hehe ingin meminjam wer',0,'2026-04-26 03:06:41'),(68,2,'Permintaan Baru: hehe ingin meminjam Microsoft Surface Laptop 7. Edition 13.8',0,'2026-04-26 19:22:25');
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
  `tanggal_dikembalikan` datetime DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('pending','dipinjam','selesai') DEFAULT 'pending',
  `denda` int(11) DEFAULT 0,
  `status_denda` varchar(20) DEFAULT 'lunas',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (1,1,'iruma','2026-04-15','2026-04-15',NULL,0,'selesai',0,'lunas'),(2,1,'hehe','2026-04-15','2026-04-15',NULL,1,'selesai',0,'lunas'),(9,2,'iruma','2026-04-15','2026-04-16',NULL,1,'selesai',0,'lunas'),(10,3,'iruma','2026-04-15','2026-04-15',NULL,1,'selesai',0,'lunas'),(11,3,'samsudin','2026-04-16','2026-04-16',NULL,2,'selesai',0,'lunas'),(12,1,'iruma','2026-04-16','2026-04-17',NULL,1,'selesai',0,'lunas'),(14,7,'Muhamad Faiz','2026-04-17','2026-04-17',NULL,50,'selesai',0,'lunas'),(15,1,'ruriha','2026-04-17','2026-04-17',NULL,1,'selesai',0,'lunas'),(16,1,'hehe','2026-04-17','2026-04-17',NULL,1,'selesai',0,'lunas'),(17,1,'ahay','2026-04-18','2026-04-18',NULL,1,'selesai',0,'lunas'),(18,1,'ahay','2026-04-21','2026-04-21',NULL,1,'selesai',0,'lunas'),(19,10,'ahay','2026-04-21','2026-04-21',NULL,1,'selesai',0,'lunas'),(20,2,'ahay','2026-04-21','2026-04-21',NULL,1,'selesai',0,'lunas'),(21,10,'hehe','2026-04-21','2026-04-21',NULL,1,'selesai',0,'lunas'),(22,2,'hehe','2026-04-21','2026-04-21',NULL,1,'selesai',0,'lunas'),(23,1,'apalah','2026-04-22','2026-04-22',NULL,1,'selesai',0,'lunas'),(24,1,'hehe','2026-04-22','2026-04-22',NULL,1,'selesai',0,'lunas'),(25,1,'apalah','2026-04-22','2026-04-22',NULL,1,'selesai',0,'lunas'),(26,1,'hehe','2026-04-22','2026-04-23',NULL,1,'selesai',0,'lunas'),(27,3,'hehe','2026-04-23','2026-04-23',NULL,10,'selesai',0,'lunas'),(28,16,'hehe','2026-04-23','2026-04-23',NULL,1,'selesai',0,'lunas'),(30,16,'hehe','2026-04-24','2026-04-24',NULL,1,'selesai',0,'lunas'),(31,16,'hehe','2026-04-24','2026-04-24',NULL,1,'selesai',0,'lunas'),(32,1,'eheheheheheheheheheheh','2026-04-24','2026-04-23',NULL,1,'selesai',0,'lunas'),(33,1,'hehe','2026-04-24','2026-04-27',NULL,1,'selesai',0,'lunas'),(34,16,'hehe','2026-04-24','2026-04-23',NULL,1,'selesai',0,'lunas'),(36,1,'hehe','2026-04-24','2026-04-23',NULL,1,'selesai',0,'lunas'),(37,1,'hehe','2026-04-24','2026-04-23',NULL,1,'selesai',0,'lunas'),(38,1,'hehe','2026-04-24','2026-04-22',NULL,1,'selesai',0,'lunas'),(39,5,'ahay','2026-04-26','2026-04-29','2026-04-26 06:38:25',1,'selesai',0,'lunas'),(41,16,'hehe','2026-04-26','2026-04-26','2026-04-26 06:57:28',1,'selesai',0,'lunas'),(42,4,'hehe','2026-04-26','2026-04-29','2026-04-26 10:06:54',1,'selesai',0,'lunas'),(43,17,'hehe','2026-04-27','2026-04-30','2026-04-27 02:22:55',1,'selesai',0,'lunas');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('hehe','nasrulrizki11@gmail.com','hehe','$2y$10$awqxp0B60F3nKd3CtYr3vO1YTJPHz58dSnBSq4g7/H1YzYZVGZZJm','admin','1777256498_1048be41cdb1ec46357f.jpg','aktif','2026-04-11 05:05:43',2,NULL,0),('user','inumakiiruma@gmail.com','user','$2y$10$LtXqJVZf/XD04xi8UfNiT.QUYXjRJXVVIGfZuvlkgjDk87r5OCvFq','','1777198220_05c90012f32613f0b013.jpg','aktif','2026-04-26 10:10:21',8,NULL,0),('iruma','inumakiiruma@gmail.com','hehehe','$2y$10$uFen1WgnDs29v0Yn7t.SZeAwqB562TJHJw7Dq8yqqvT5egBuPXS..','petugas','default.png','aktif','2026-04-26 10:11:50',9,NULL,0);
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

-- Dump completed on 2026-04-27  9:40:05
