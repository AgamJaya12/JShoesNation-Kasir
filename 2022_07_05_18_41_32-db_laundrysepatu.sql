-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: db_laundrysepatu1
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ROLE` int(11) DEFAULT NULL,
  `NAMA_USER` varchar(50) DEFAULT NULL,
  `EMAIL_USER` varchar(100) DEFAULT NULL,
  `USERNAME_USER` varchar(50) DEFAULT NULL,
  `PASSWORD_USER` varchar(20) DEFAULT NULL,
  `NOMOR_USER` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'admin','admin@gmail.com','admin','123','081'),(2,2,'karyawan','karyawan@gmail.com','karyawan','123','081'),(3,2,'tes','tes2','tes1','123','089'),(4,2,'abc','pagi@gmail.com','pagi','123','081234567890');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treatment` (
  `ID_TREATMENT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_TREATMENT` varchar(25) DEFAULT NULL,
  `WAKTU_TREATMENT` varchar(20) NOT NULL,
  `BIAYA_TREATMENT` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID_TREATMENT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treatment`
--

LOCK TABLES `treatment` WRITE;
/*!40000 ALTER TABLE `treatment` DISABLE KEYS */;
INSERT INTO `treatment` VALUES (1,'treatment1','5 hari',250000);
/*!40000 ALTER TABLE `treatment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `ID_ORDER` varchar(50) NOT NULL,
  `ID_TREATMENT` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `NAMA_CUST` varchar(50) DEFAULT NULL,
  `NOMOR_CUST` varchar(13) DEFAULT NULL,
  `ALAMAT_CUST` text DEFAULT NULL,
  `JMLH_TREATMENT` int(11) DEFAULT NULL,
  `HRG_TREATMENT` bigint(20) DEFAULT NULL,
  `TGL_MASUK` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TGL_KELUAR` timestamp NULL DEFAULT NULL,
  `TOTAL_HRG` bigint(20) DEFAULT NULL,
  `NOMINAL_BYR` bigint(20) DEFAULT NULL,
  `KEMBALIAN` bigint(20) DEFAULT NULL,
  `DESKRIPSI` varchar(200) DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_ORDER`),
  KEY `FK_TRANSAKS_RELATIONS_USER` (`ID_USER`),
  KEY `FK_TRANSAKS_RELATIONS_TREATMEN` (`ID_TREATMENT`),
  CONSTRAINT `FK_TRANSAKS_RELATIONS_TREATMEN` FOREIGN KEY (`ID_TREATMENT`) REFERENCES `treatment` (`ID_TREATMENT`),
  CONSTRAINT `FK_TRANSAKS_RELATIONS_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES ('treatment-62A6FFF',1,2,'aa','089','sby',6,50000,'2022-06-13 23:20:44','2022-06-16 17:00:00',300000,500000,200000,NULL,1),('treatment-62A703C',1,2,'GG','081','mjk',2,50000,'2022-06-13 11:09:07','2022-06-14 17:00:00',100000,100000,0,NULL,1),('treatment-62A93CA',1,4,'jaka','089123456789','klampis',4,250000,'2022-06-15 01:58:40','2022-06-17 17:00:00',1000000,1000000,0,NULL,1),('treatment-62A93E7',1,2,'abi','08123456','semolo waru',2,250000,'2022-06-15 02:06:22','2022-06-17 17:00:00',500000,500000,0,NULL,1),('treatment-62B1D30',1,2,'angga','089','sby',2,250000,'2022-06-21 14:40:51','2022-06-22 17:00:00',500000,500000,0,'converse black egret & vans slip on checkerboard',1);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-05 18:41:32
