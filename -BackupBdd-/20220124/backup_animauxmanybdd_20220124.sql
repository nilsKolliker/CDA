-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: animauxmanybdd
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Current Database: `animauxmanybdd`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `animauxmanybdd` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `animauxmanybdd`;

--
-- Table structure for table `alimentations`
--

DROP TABLE IF EXISTS `alimentations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alimentations` (
  `IdAlimentations` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleAliment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdAlimentations`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentations`
--

LOCK TABLES `alimentations` WRITE;
/*!40000 ALTER TABLE `alimentations` DISABLE KEYS */;
INSERT INTO `alimentations` VALUES (1,'Viande'),(2,'Vegetaux'),(3,'Omnivore');
/*!40000 ALTER TABLE `alimentations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animaux`
--

DROP TABLE IF EXISTS `animaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animaux` (
  `IdAnimaux` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleAnimal` varchar(50) DEFAULT NULL,
  `TypeAnimal` varchar(50) DEFAULT NULL,
  `IdHabitat` int(11) NOT NULL,
  `IdAlimentations` int(11) NOT NULL,
  PRIMARY KEY (`IdAnimaux`),
  KEY `IdHabitat` (`IdHabitat`),
  KEY `IdAlimentations` (`IdAlimentations`),
  CONSTRAINT `animaux_ibfk_1` FOREIGN KEY (`IdHabitat`) REFERENCES `habitat` (`IdHabitat`),
  CONSTRAINT `animaux_ibfk_2` FOREIGN KEY (`IdAlimentations`) REFERENCES `alimentations` (`IdAlimentations`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animaux`
--

LOCK TABLES `animaux` WRITE;
/*!40000 ALTER TABLE `animaux` DISABLE KEYS */;
INSERT INTO `animaux` VALUES (1,'Lion','Mammifere',1,1),(2,'Lion','Mammifere',2,1),(3,'Singe','Mammifere',1,2);
/*!40000 ALTER TABLE `animaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `geographie`
--

DROP TABLE IF EXISTS `geographie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geographie` (
  `IdGeographie` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleGeographie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdGeographie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geographie`
--

LOCK TABLES `geographie` WRITE;
/*!40000 ALTER TABLE `geographie` DISABLE KEYS */;
INSERT INTO `geographie` VALUES (1,'Asie'),(2,'Europe'),(3,'Papouasi');
/*!40000 ALTER TABLE `geographie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitat`
--

DROP TABLE IF EXISTS `habitat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habitat` (
  `IdHabitat` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleHabitat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdHabitat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitat`
--

LOCK TABLES `habitat` WRITE;
/*!40000 ALTER TABLE `habitat` DISABLE KEYS */;
INSERT INTO `habitat` VALUES (1,'Aquatique'),(2,'Terrestre'),(3,'Spatiale');
/*!40000 ALTER TABLE `habitat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `milieuvie`
--

DROP TABLE IF EXISTS `milieuvie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `milieuvie` (
  `IdMilieuVie` int(11) NOT NULL AUTO_INCREMENT,
  `IdAnimaux` int(11) DEFAULT NULL,
  `IdGeographie` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdMilieuVie`),
  KEY `IdAnimaux` (`IdAnimaux`),
  KEY `IdGeographie` (`IdGeographie`),
  CONSTRAINT `milieuvie_ibfk_1` FOREIGN KEY (`IdAnimaux`) REFERENCES `animaux` (`IdAnimaux`),
  CONSTRAINT `milieuvie_ibfk_2` FOREIGN KEY (`IdGeographie`) REFERENCES `geographie` (`IdGeographie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `milieuvie`
--

LOCK TABLES `milieuvie` WRITE;
/*!40000 ALTER TABLE `milieuvie` DISABLE KEYS */;
INSERT INTO `milieuvie` VALUES (1,2,1),(2,1,2);
/*!40000 ALTER TABLE `milieuvie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-24 17:26:01
