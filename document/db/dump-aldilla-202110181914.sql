-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: aldilla
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

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
-- Table structure for table `tbl_export`
--

DROP TABLE IF EXISTS `tbl_export`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_export` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idInvoices` varchar(30) NOT NULL,
  `dateOfPib` date NOT NULL,
  `docNo` varchar(10) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `noPengajuanDokumen` varchar(10) NOT NULL,
  `blNo` varchar(15) NOT NULL,
  `vesselName` varchar(80) NOT NULL,
  `consignee` varchar(100) NOT NULL,
  `remark` varchar(10) NOT NULL,
  `valuta` varchar(5) NOT NULL,
  `value` float NOT NULL,
  `valueIdr` float NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_export`
--

LOCK TABLES `tbl_export` WRITE;
/*!40000 ALTER TABLE `tbl_export` DISABLE KEYS */;
INSERT INTO `tbl_export` VALUES (1,'inv-00000003','2021-04-13','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','test','trial','EUR',5,1000000,0),(2,'inv-00000006','2021-05-12','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','test','trial','EUR',5,5,0),(3,'inv-00000006','2021-05-12','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','test','trial','EUR',5,5,0),(4,'inv-00000006','2021-05-12','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','test','trial','EUR',5,5,0),(5,'inv-00000009','2021-05-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','test','trial','EUR',5,5,0),(6,'inv-00000018','0000-00-00','108658','PEB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','test','trial','EUR',5,25,5),(7,'inv-00000020','2021-08-03','108658','PEB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','test','trial','EUR',5,25,5),(8,'inv-00000020','2021-08-03','108658','PEB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','test','trial','EUR',5,25,5),(10,'inv-00000021','2021-12-31','12','3123','13','13','131','31','31','13',13,1313,313),(11,'inv-00000021','2021-12-31','12','3123','13','13','131','31','31','13',13,1313,313),(12,'inv-00000021','2021-12-31','12','3123','13','13','131','31','31','13',13,1313,313),(13,'inv-00000022','2021-12-31','123','123','13','131','31','313','13','313',13,13,131),(14,'inv-00000022','2021-12-31','12','312','31','32','131','31','31','231',32,1,312),(16,'inv-00000023','2021-11-29','123','12','313','123','131','321','31','2313',1,231,21),(17,'inv-00000029','2021-12-31','123','123','13','asd','asd','313','31','asd',0,0,0),(18,'inv-00000029','2021-12-31','Dima','Dima','Dima','Dima','Dima','Dima','Dima','USD',2000.25,20000500,9999),(19,'inv-00000029','2021-12-31','Dima','Dima','Dima','Dima','Dima','Dima','Dima','USD',2000.25,20000500,9999),(20,'inv-00000029','2021-12-31','Dima','Dima','Dima','Dima','Dima','Dima','Dima','USD',2000.25,20000500,9999),(21,'inv-00000029','2021-12-31','DIm','DIm','DIm','DIm','DIm','Dima','DIm','DIm',123,15129,123),(24,'inv-00000030','2021-12-31','Selow','Selow','Selow','Selow','Selow','Selow','Selow','USD',82431,1174890000,14253),(25,'inv-00000030','2021-12-31','Selow','Selow','Selow','Selow','Selow','Selow','Selow','USD',82431,1174890000,14253),(26,'inv-00000030','2021-12-31','Selow','Selow','Selow','Selow','Selow','Selow','Selow','USD',82431,1174890000,14253),(27,'inv-00000030','2021-12-31','Selow','Selow','Selow','Selow','Selow','Selow','Selow','USD',82431,1174890000,14253),(28,'inv-00000030','2021-12-31','Selow','Selow','Selow','Selow','Selow','Selow','Selow','USD',82431,1174890000,14253),(31,'inv-00000042','2021-12-31','123','test','13','asd','asd','313','31','asd',2000,28506000,14253),(32,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(33,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(34,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(35,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(36,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(37,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(38,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(39,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(40,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(41,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(42,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(43,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(44,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(45,'inv-00000047','2020-12-31','1','12','123','asd','asd','313','31','asd',0,0,0),(46,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(47,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(48,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(49,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(50,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(51,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(52,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(53,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(54,'inv-00000048','0012-02-01','21','21','21','212','12','12','12','12',12,252,21),(55,'inv-00000053','2021-12-31','DIm','123','13','asd','asd','313','31','asd',0,0,0),(58,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,0,0),(60,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',100,50000,500),(62,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,8270000,500),(63,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,8270000,500),(64,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,8270000,500),(65,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,8270000,500),(66,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,8270000,500),(67,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,8270000,500),(68,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,8270000,500),(69,'inv-00000069','2021-10-31','123','123','13','asd','asd','313','31','asd',16540,8270000,500);
/*!40000 ALTER TABLE `tbl_export` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_exporttemp`
--

DROP TABLE IF EXISTS `tbl_exporttemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_exporttemp` (
  `dateOfPib` date NOT NULL,
  `docNo` varchar(10) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `noPengajuanDokumen` varchar(10) NOT NULL,
  `blNo` varchar(15) NOT NULL,
  `vesselName` varchar(80) NOT NULL,
  `consignee` varchar(100) NOT NULL,
  `remark` varchar(10) NOT NULL,
  `valuta` varchar(5) NOT NULL,
  `value` decimal(13,2) NOT NULL,
  `valueIdr` decimal(13,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_exporttemp`
--

LOCK TABLES `tbl_exporttemp` WRITE;
/*!40000 ALTER TABLE `tbl_exporttemp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_exporttemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_import`
--

DROP TABLE IF EXISTS `tbl_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_import` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `idInvoices` varchar(30) NOT NULL,
  `dateOfPib` date NOT NULL,
  `docNo` varchar(10) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `noPengajuanDokumen` varchar(15) NOT NULL,
  `blNo` varchar(15) NOT NULL,
  `vesselName` varchar(50) NOT NULL,
  `shipper` varchar(80) NOT NULL,
  `remark` varchar(10) DEFAULT NULL,
  `valuta` varchar(5) NOT NULL,
  `value` decimal(13,2) NOT NULL,
  `valueIdr` decimal(13,2) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_import`
--

LOCK TABLES `tbl_import` WRITE;
/*!40000 ALTER TABLE `tbl_import` DISABLE KEYS */;
INSERT INTO `tbl_import` VALUES (1,'inv-00000001','2021-03-06','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',13.00,130000.00,0),(2,'inv-00000002','2021-04-06','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,100000.00,0),(3,'inv-00000005','2021-05-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(4,'inv-00000005','2021-05-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(5,'inv-00000005','2021-05-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(6,'inv-00000005','2021-05-10','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(7,'inv-00000005','2021-05-05','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(8,'inv-00000007','2021-05-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(9,'inv-00000008','2021-05-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(10,'inv-00000016','2021-08-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(11,'inv-00000016','2021-08-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,5.00,0),(12,'inv-00000017','2021-08-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,25.00,5),(13,'inv-00000017','2021-08-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','EUR',5.00,25.00,5),(14,'inv-00000019','2021-08-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','5',5.00,25.00,5),(15,'inv-00000019','2021-08-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','5',5.00,25.00,5),(16,'inv-00000019','2021-08-03','108658','PIB','016841','E200702-31','KLM. BINTANG FAJAR-1/5710A','AMERICAN POWER CONVERSION CORPORATION','trial','5',5.00,25.00,5),(30,'inv-00000027','2021-12-31','123','123','13','asd','asd','asd','31','22',22222222.99,488888905.78,22),(31,'inv-00000027','2021-12-31','123','123','13','asd','asd','asd','31','22',22222222.99,488888905.78,22),(32,'inv-00000027','2021-12-31','123','123','13','asd','asd','asd','31','22',22222222.99,488888905.78,22),(33,'inv-00000027','2021-12-31','123','123','13','asd','asd','asd','31','22',22222222.99,488888905.78,22),(34,'inv-00000027','2021-12-31','123','123','13','asd','asd','asd','31','22',22222222.99,488888905.78,22),(35,'inv-00000027','2021-12-31','123','123','13','asd','asd','asd','31','22',22222222.99,488888905.78,22),(36,'inv-00000027','2021-12-31','123','123','13','asd','asd','asd','31','22',22222222.99,488888905.78,22),(37,'inv-00000027','2021-12-31','123','123','13','asd','asd','asd','31','22',22222222.99,488888905.78,22),(45,'inv-00000028','2021-12-31','DIm','DIm','DIm','dim','dim','DIm','DIm','dim',16354.80,233104964.40,14253),(46,'inv-00000028','2021-12-31','DIm','DIm','DIm','dim','dim','DIm','DIm','dim',16354.80,233104964.40,14253),(47,'inv-00000028','2021-12-31','DIm','DIm','DIm','dim','dim','DIm','DIm','dim',16354.80,233104964.40,14253),(48,'inv-00000035','0000-00-00','','','','','','','','',0.00,0.00,0),(49,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(50,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(51,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(52,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(53,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(54,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(55,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(57,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(58,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(59,'inv-00000039','2021-12-31','12','12','2313','321','321','231','231','231',231.00,1223.00,12),(60,'inv-00000041','2021-12-31','123','123','13','asd','asd','1','31','asd',400.00,120000.00,300),(61,'inv-00000044','2021-12-29','123','12','asd','asd','test','asd','31','asd',30000.00,60000.00,2),(62,'inv-00000044','2021-12-29','123','12','asd','asd','test','asd','31','asd',30000.00,60000.00,2),(63,'inv-00000044','2021-12-29','123','12','asd','asd','test','asd','31','asd',30000.00,60000.00,2),(64,'inv-00000045','2021-12-31','123','123','123','123','123','123','12','EUR',0.00,0.00,123),(65,'inv-00000045','2021-12-31','123','123','123','123','123','123','12','EUR',2.00,246.00,123),(69,'inv-00000049','2019-09-04','123','123','13','123','asd','asd','asd','asd',16354.80,2011640.40,123),(70,'inv-00000049','2019-09-04','123','123','13','123','asd','asd','asd','asd',16354.80,2011640.40,123),(71,'inv-00000057','2021-12-31','123','123','123','312','3','123','123','123',123.00,1476.00,12),(74,'inv-00000066','2021-10-04','123','123','13','asd','asd','asd','31','USD',2.00,400000.00,200000),(75,'inv-00000066','2021-10-04','zzzzzzzz','123','13','asd','asd','asd','31','USD',1000.00,2000.00,2),(77,'inv-00000066','2021-10-04','xxxxxxxx','88888','13','asd','asd','asd','31','USD',90000.00,72000000.00,800),(81,'inv-00000067','2021-10-15','123','123','13','asd','sad','asd','31','asd',2.00,4.00,2),(82,'inv-00000067','2021-10-15','123','123','13','asd','sad','asd','31','asd',2.00,44.00,22),(84,'inv-00000068','2021-12-31','dim','12','13','asd','asd','asd','31','asd',0.00,0.00,0);
/*!40000 ALTER TABLE `tbl_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_importtemp`
--

DROP TABLE IF EXISTS `tbl_importtemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_importtemp` (
  `dateOfPib` date NOT NULL,
  `docNo` varchar(10) NOT NULL,
  `docType` varchar(10) NOT NULL,
  `noPengajuanDokumen` varchar(15) NOT NULL,
  `blNo` varchar(15) NOT NULL,
  `vesselName` varchar(50) NOT NULL,
  `shipper` varchar(80) NOT NULL,
  `remark` varchar(10) NOT NULL,
  `valuta` varchar(5) NOT NULL,
  `value` decimal(13,2) NOT NULL,
  `valueIdr` decimal(13,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_importtemp`
--

LOCK TABLES `tbl_importtemp` WRITE;
/*!40000 ALTER TABLE `tbl_importtemp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_importtemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_invoices`
--

DROP TABLE IF EXISTS `tbl_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_invoices` (
  `id` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `fromto` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_invoices`
--

LOCK TABLES `tbl_invoices` WRITE;
/*!40000 ALTER TABLE `tbl_invoices` DISABLE KEYS */;
INSERT INTO `tbl_invoices` VALUES ('inv-00000001','2021-03-13','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000002','2021-04-06','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000003','2021-04-06','Export','PT Schneider Electric Manufacturing Batam'),('inv-00000004','2021-05-02','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000005','2021-05-02','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000006','2021-05-03','Export','PT Schneider Electric Manufacturing Batam'),('inv-00000007','2021-05-03','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000008','2021-05-03','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000009','2021-05-03','Export','PT Schneider Electric Manufacturing Batam'),('inv-00000010','2021-08-03','Import','test'),('inv-00000011','2021-08-03','Import','test'),('inv-00000012','0000-00-00','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000013','0000-00-00','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000014','2021-08-10','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000015','2021-08-10','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000016','2021-08-10','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000017','2021-08-03','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000018','2021-08-03','Export','PT Schneider Electric Manufacturing Batam'),('inv-00000019','2021-08-03','Import','PT Schneider Electric Manufacturing Batam'),('inv-00000020','2021-08-03','Export','PT Schneider Electric Manufacturing Batam'),('inv-00000021','2021-10-03','Export','asdas'),('inv-00000022','2021-10-03','Export','dimas'),('inv-00000023','2021-10-03','Export','dimas'),('inv-00000024','2021-10-03','Import','asds'),('inv-00000025','2021-10-19','Import','dimasssssss'),('inv-00000026','2021-10-03','Import','asd'),('inv-00000027','2021-10-03','Import','123'),('inv-00000028','2021-10-03','Import','dimas'),('inv-00000029','2021-10-03','Export','testtttt'),('inv-00000030','2021-10-03','Export','Drevannn'),('inv-00000031','2021-12-31','Import','test'),('inv-00000032','2021-12-31','Import','test'),('inv-00000033','2021-12-31','Import','test'),('inv-00000034','2021-12-31','Import','123'),('inv-00000035','2021-10-29','Import','dimas'),('inv-00000036','2021-12-31','Import','dimas'),('inv-00000037','2021-12-31','Import','dimas'),('inv-00000038','2021-12-31','Import','dimas'),('inv-00000039','2021-12-31','Import','dimas'),('inv-00000040','2021-12-31','Import','dimas'),('inv-00000041','2021-10-03','Import','testttttttttttttt'),('inv-00000042','2021-10-03','Export','reerer'),('inv-00000043','2021-10-29','Import','test'),('inv-00000044','2021-10-29','Import','test'),('inv-00000045','2021-12-31','Import','dimasssssss'),('inv-00000046','2021-10-31','Import','dimas'),('inv-00000047','0022-12-12','Export','dimas'),('inv-00000048','2021-10-30','Export','asds'),('inv-00000049','2021-10-06','Import','dimas'),('inv-00000050','2021-10-06','Export','dimas'),('inv-00000051','2021-12-31','Import','dimas'),('inv-00000052','2021-12-31','Import','dimas'),('inv-00000053','2021-12-31','Export','dimas'),('inv-00000054','2021-12-31','Export','dimas'),('inv-00000055','2021-12-31','Import','dimas'),('inv-00000056','2021-12-31','Export','sdf'),('inv-00000057','2021-12-31','Import','dimas'),('inv-00000058','2021-12-31','Import','dimaszzzzzzzzzzzz'),('inv-00000059','2021-10-04','Import','dimaszzzzzzzzz'),('inv-00000060','2021-10-04','Import','dimasssssss'),('inv-00000061','2021-10-04','Import','dimas'),('inv-00000062','2021-12-31','Import','dimas'),('inv-00000063','2021-12-31','Import','dimasssssss'),('inv-00000064','2021-10-08','Import','dimas'),('inv-00000065','2021-12-31','Import','dimas'),('inv-00000066','2021-10-04','Import','DIMAS CORP'),('inv-00000067','2021-10-07','Import','asdasd'),('inv-00000068','2021-10-08','Import','sdf'),('inv-00000069','2021-10-04','Export','Dimas Corp');
/*!40000 ALTER TABLE `tbl_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(35) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES ('admin','$2y$10$2cshVJV2D96K.WqgDxPSAuWtYSVDe4QsyX3BbB5vM1Zr88bTXtPoS','admin');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_invoices`
--

DROP TABLE IF EXISTS `view_invoices`;
/*!50001 DROP VIEW IF EXISTS `view_invoices`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_invoices` (
  `id` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `type` tinyint NOT NULL,
  `fromto` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'aldilla'
--

--
-- Final view structure for view `view_invoices`
--

/*!50001 DROP TABLE IF EXISTS `view_invoices`*/;
/*!50001 DROP VIEW IF EXISTS `view_invoices`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_invoices` AS select `a`.`id` AS `id`,`a`.`date` AS `date`,`a`.`type` AS `type`,`a`.`fromto` AS `fromto` from (select `i1`.`id` AS `id`,`i1`.`date` AS `date`,`i1`.`type` AS `type`,`i1`.`fromto` AS `fromto` from (`aldilla`.`tbl_invoices` `i1` join `aldilla`.`tbl_import` `i2`) where `i1`.`id` = `i2`.`idInvoices` union select `j1`.`id` AS `id`,`j1`.`date` AS `date`,`j1`.`type` AS `type`,`j1`.`fromto` AS `fromto` from (`aldilla`.`tbl_invoices` `j1` join `aldilla`.`tbl_export` `j2`) where `j1`.`id` = `j2`.`idInvoices`) `a` order by `a`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-18 19:14:02
