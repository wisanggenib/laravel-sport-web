-- MySQL dump 10.13  Distrib 8.0.30, for macos12.5 (arm64)
--
-- Host: localhost    Database: db_berita
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','$2y$10$n7DTDPaNdH04/76x5yaeGuVSRM30FWnP5MAaXRk201dLZrAuKOMTS');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artikel`
--

DROP TABLE IF EXISTS `artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `kategori` int NOT NULL COMMENT '1:Action, \r\n2:SciFi',
  `id_kategori` int DEFAULT NULL,
  PRIMARY KEY (`id_artikel`),
  KEY `id_user` (`id_user`),
  KEY `artikel_FK` (`id_kategori`),
  CONSTRAINT `artikel_FK` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_permainan` (`id_kategori`),
  CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikel`
--

LOCK TABLES `artikel` WRITE;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
INSERT INTO `artikel` VALUES (8,5,'2022-04-17 22:24:41','f44a75b5-555c-4a3c-b99b-cd5add73fa79.jpg','tes','<p>testest</p>',1,4);
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kalender`
--

DROP TABLE IF EXISTS `kalender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kalender` (
  `id_kalender` int NOT NULL AUTO_INCREMENT,
  `tgl_kalender` date NOT NULL,
  `isi_kalender` text NOT NULL,
  PRIMARY KEY (`id_kalender`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kalender`
--

LOCK TABLES `kalender` WRITE;
/*!40000 ALTER TABLE `kalender` DISABLE KEYS */;
INSERT INTO `kalender` VALUES (2,'2022-05-31','<p>Penghargaan&nbsp;<a href=\"http://google.com\" target=\"_blank\">InAward</a></p>'),(4,'2022-06-01','<p>Pemenang satu satunya di ajang&nbsp;<a href=\"http://google.com\" target=\"_blank\">ESportSurya</a></p>'),(5,'2022-06-01','<p>Penyelengaraan Lomba Esport dari&nbsp;<a href=\"http://google.com\" target=\"_blank\">JustTeam</a></p>');
/*!40000 ALTER TABLE `kalender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_permainan`
--

DROP TABLE IF EXISTS `kategori_permainan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_permainan` (
  `nama_kategori` text,
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_permainan`
--

LOCK TABLES `kategori_permainan` WRITE;
/*!40000 ALTER TABLE `kategori_permainan` DISABLE KEYS */;
INSERT INTO `kategori_permainan` VALUES ('Dota',4),('Mobile Legend',8);
/*!40000 ALTER TABLE `kategori_permainan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL AUTO_INCREMENT,
  `id_artikel` int NOT NULL,
  `id_user` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `konten` text NOT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE,
  CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar`
--

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (4,'qwe','qwe','$2y$10$E5TMKDET//2DmCY9HrDS5.Y2H5iC48Ziq3tK/nF30xWUif66Nxdou','qwe@qwe.qwe'),(5,'user','user','$2y$10$n7DTDPaNdH04/76x5yaeGuVSRM30FWnP5MAaXRk201dLZrAuKOMTS','user@gmail.com'),(7,'tester','tester','$2y$10$Zw8rljFXqWzWSj7pXMGgv.hlCtHVk76E8sTO/d4CwisfL6QYrMsry','tester@gmail.com'),(22,'bagus wisanggeni','bagus wisanggeni','0','wisanggenibee@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validasi`
--

DROP TABLE IF EXISTS `validasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `validasi` (
  `id_validasi` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_validasi`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `validasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validasi`
--

LOCK TABLES `validasi` WRITE;
/*!40000 ALTER TABLE `validasi` DISABLE KEYS */;
INSERT INTO `validasi` VALUES (1,4,1,'2022-04-01 22:54:53'),(2,5,0,'2022-04-06 21:42:53'),(3,7,0,'2022-10-06 11:09:37'),(6,22,1,'2022-11-13 12:45:38');
/*!40000 ALTER TABLE `validasi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-13 16:57:07
