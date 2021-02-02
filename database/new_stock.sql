-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: stock
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `is_barang`
--

DROP TABLE IF EXISTS `is_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_barang` (
  `id_barang` varchar(7) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto_barang` varchar(450) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_satuan` (`id_satuan`),
  KEY `created_user` (`created_user`),
  KEY `updated_user` (`updated_user`),
  CONSTRAINT `is_barang_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_barang_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_barang_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `is_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_barang_ibfk_4` FOREIGN KEY (`id_jenis`) REFERENCES `is_jenis_barang` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_barang`
--

LOCK TABLES `is_barang` WRITE;
/*!40000 ALTER TABLE `is_barang` DISABLE KEYS */;
INSERT INTO `is_barang` VALUES ('B000001','Abc',16,16,0,1,'2021-02-02 11:41:23',1,'2021-02-02 11:41:23','918794262_FB_IMG_1612002381396.jpg');
/*!40000 ALTER TABLE `is_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_barang_keluar`
--

DROP TABLE IF EXISTS `is_barang_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_barang_keluar` (
  `id_barang_keluar` varchar(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `status` enum('Proses','Approve','Reject') NOT NULL DEFAULT 'Proses',
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_barang_keluar`),
  KEY `id_barang` (`id_barang`),
  KEY `created_user` (`created_user`),
  CONSTRAINT `is_barang_keluar_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_barang_keluar_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `is_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_barang_keluar`
--

LOCK TABLES `is_barang_keluar` WRITE;
/*!40000 ALTER TABLE `is_barang_keluar` DISABLE KEYS */;
/*!40000 ALTER TABLE `is_barang_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_barang_masuk`
--

DROP TABLE IF EXISTS `is_barang_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_barang_masuk` (
  `id_barang_masuk` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_barang_masuk`),
  KEY `id_barang` (`id_barang`),
  KEY `created_user` (`created_user`),
  CONSTRAINT `is_barang_masuk_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_barang_masuk_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `is_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_barang_masuk`
--

LOCK TABLES `is_barang_masuk` WRITE;
/*!40000 ALTER TABLE `is_barang_masuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `is_barang_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_jenis_barang`
--

DROP TABLE IF EXISTS `is_jenis_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_jenis_barang` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jenis`),
  KEY `created_user` (`created_user`),
  KEY `updated_user` (`updated_user`),
  CONSTRAINT `is_jenis_barang_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_jenis_barang_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_jenis_barang`
--

LOCK TABLES `is_jenis_barang` WRITE;
/*!40000 ALTER TABLE `is_jenis_barang` DISABLE KEYS */;
INSERT INTO `is_jenis_barang` VALUES (16,'Buku',1,'2021-02-02 08:19:30',1,'2021-02-02 08:19:30');
/*!40000 ALTER TABLE `is_jenis_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_satuan`
--

DROP TABLE IF EXISTS `is_satuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(30) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_satuan`),
  KEY `created_user` (`created_user`),
  KEY `updated_user` (`updated_user`),
  CONSTRAINT `is_satuan_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `is_satuan_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_satuan`
--

LOCK TABLES `is_satuan` WRITE;
/*!40000 ALTER TABLE `is_satuan` DISABLE KEYS */;
INSERT INTO `is_satuan` VALUES (16,'pcs',1,'2021-02-02 08:19:46',1,'2021-02-02 08:19:46');
/*!40000 ALTER TABLE `is_satuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_users`
--

DROP TABLE IF EXISTS `is_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_users` (
  `id_user` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_users`
--

LOCK TABLES `is_users` WRITE;
/*!40000 ALTER TABLE `is_users` DISABLE KEYS */;
INSERT INTO `is_users` VALUES (1,'admin','ADMIN','21232f297a57a5a743894a0e4a801fc3','','','user-default.png','Super Admin','aktif','2019-11-13 03:42:53','2019-11-14 11:45:23'),(2,'manajer','MANAJER','69b731ea8f289cf16a192ce78a37b4f0','','','user-default.png','Manajer','aktif','2019-11-13 03:42:53','2019-11-14 11:46:44'),(3,'user','USER','ee11cbb19052e40b07aac0ca060c23ee','','','user-default.png','Gudang','aktif','2019-11-13 03:41:46','2019-11-14 11:47:30');
/*!40000 ALTER TABLE `is_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-02  4:27:25
