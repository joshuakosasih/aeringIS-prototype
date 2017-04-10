-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: aering
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `communications`
--

DROP TABLE IF EXISTS `communications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `communications` (
  `id_comm` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `id_emp` int(11) DEFAULT NULL,
  `attn` varchar(45) DEFAULT NULL,
  `via` varchar(20) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comm`),
  KEY `id_project` (`id_project`),
  KEY `id_emp` (`id_emp`),
  CONSTRAINT `communications_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`),
  CONSTRAINT `communications_ibfk_3` FOREIGN KEY (`id_emp`) REFERENCES `employees` (`id_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `communications`
--

LOCK TABLES `communications` WRITE;
/*!40000 ALTER TABLE `communications` DISABLE KEYS */;
/*!40000 ALTER TABLE `communications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id_cust` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  PRIMARY KEY (`id_cust`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id_emp` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `division` varchar(45) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Tes','GA','tes123','tes123');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id_inv` int(11) NOT NULL AUTO_INCREMENT,
  `no_inv` varchar(45) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `via` varchar(10) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inv`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_job`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `duedate` date DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_payment`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` date DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `id_customer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_project`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_cust`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotations`
--

DROP TABLE IF EXISTS `quotations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotations` (
  `id_quotation` int(11) NOT NULL AUTO_INCREMENT,
  `no_quot` varchar(45) DEFAULT NULL,
  `publish` date DEFAULT NULL,
  `tat` int(11) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_quotation`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `quotations_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotations`
--

LOCK TABLES `quotations` WRITE;
/*!40000 ALTER TABLE `quotations` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_po_wo`
--

DROP TABLE IF EXISTS `ref_po_wo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_po_wo` (
  `id_ref` int(11) NOT NULL,
  `no_ref` varchar(45) DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `approv_date` date DEFAULT NULL,
  `unit_receive_date` date DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ref`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `ref_po_wo_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_po_wo`
--

LOCK TABLES `ref_po_wo` WRITE;
/*!40000 ALTER TABLE `ref_po_wo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_po_wo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_invoices`
--

DROP TABLE IF EXISTS `tax_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tax_invoices` (
  `id_tax` int(11) NOT NULL AUTO_INCREMENT,
  `no_tax_inv` varchar(45) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `via` varchar(10) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tax`),
  KEY `id_project` (`id_project`),
  CONSTRAINT `tax_invoices_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_invoices`
--

LOCK TABLES `tax_invoices` WRITE;
/*!40000 ALTER TABLE `tax_invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_invoices` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-07  9:55:50
