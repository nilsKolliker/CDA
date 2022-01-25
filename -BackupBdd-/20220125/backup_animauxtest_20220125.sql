-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: animauxtest
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
-- Current Database: `animauxtest`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `animauxtest` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `animauxtest`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentations`
--

LOCK TABLES `alimentations` WRITE;
/*!40000 ALTER TABLE `alimentations` DISABLE KEYS */;
INSERT INTO `alimentations` VALUES (1,'Viande'),(2,'Vegetal');
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
  `IdGeographie` int(11) NOT NULL,
  PRIMARY KEY (`IdAnimaux`),
  KEY `IdHabitat` (`IdHabitat`),
  KEY `IdAlimentations` (`IdAlimentations`),
  KEY `IdGeographie` (`IdGeographie`),
  CONSTRAINT `animaux_ibfk_1` FOREIGN KEY (`IdHabitat`) REFERENCES `habitat` (`IdHabitat`),
  CONSTRAINT `animaux_ibfk_2` FOREIGN KEY (`IdAlimentations`) REFERENCES `alimentations` (`IdAlimentations`),
  CONSTRAINT `animaux_ibfk_3` FOREIGN KEY (`IdGeographie`) REFERENCES `geographie` (`IdGeographie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animaux`
--

LOCK TABLES `animaux` WRITE;
/*!40000 ALTER TABLE `animaux` DISABLE KEYS */;
INSERT INTO `animaux` VALUES (1,'Lion','Mamifere',1,1,1),(2,'Carpe','Poisson',2,2,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geographie`
--

LOCK TABLES `geographie` WRITE;
/*!40000 ALTER TABLE `geographie` DISABLE KEYS */;
INSERT INTO `geographie` VALUES (1,'Asie'),(2,'Europe');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitat`
--

LOCK TABLES `habitat` WRITE;
/*!40000 ALTER TABLE `habitat` DISABLE KEYS */;
INSERT INTO `habitat` VALUES (1,'Terrestre'),(2,'Aquatique');
/*!40000 ALTER TABLE `habitat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-25 12:26:02
