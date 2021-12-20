-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: cda
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
-- Current Database: `cda`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cda` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cda`;

--
-- Table structure for table `achemine`
--

DROP TABLE IF EXISTS `achemine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achemine` (
  `idBureau` int(11) NOT NULL,
  `idTransport` int(11) NOT NULL,
  `idCentresDeTri` int(11) NOT NULL,
  PRIMARY KEY (`idBureau`,`idTransport`,`idCentresDeTri`),
  KEY `FK_achemine_transport` (`idTransport`),
  KEY `FK_achemine_centre_de_tri` (`idCentresDeTri`),
  CONSTRAINT `FK_achemine_bureau` FOREIGN KEY (`idBureau`) REFERENCES `bureaux` (`idBureau`),
  CONSTRAINT `FK_achemine_centre_de_tri` FOREIGN KEY (`idCentresDeTri`) REFERENCES `centres_de_tri` (`idCentresDeTri`),
  CONSTRAINT `FK_achemine_transport` FOREIGN KEY (`idTransport`) REFERENCES `transports` (`idTransport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achemine`
--

LOCK TABLES `achemine` WRITE;
/*!40000 ALTER TABLE `achemine` DISABLE KEYS */;
/*!40000 ALTER TABLE `achemine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bureaux`
--

DROP TABLE IF EXISTS `bureaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bureaux` (
  `idBureau` int(11) NOT NULL AUTO_INCREMENT,
  `codePostal` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`idBureau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bureaux`
--

LOCK TABLES `bureaux` WRITE;
/*!40000 ALTER TABLE `bureaux` DISABLE KEYS */;
/*!40000 ALTER TABLE `bureaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centres_de_tri`
--

DROP TABLE IF EXISTS `centres_de_tri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centres_de_tri` (
  `idCentresDeTri` int(11) NOT NULL AUTO_INCREMENT,
  `nomCentreDeTri` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCentresDeTri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centres_de_tri`
--

LOCK TABLES `centres_de_tri` WRITE;
/*!40000 ALTER TABLE `centres_de_tri` DISABLE KEYS */;
/*!40000 ALTER TABLE `centres_de_tri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courriers`
--

DROP TABLE IF EXISTS `courriers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courriers` (
  `idCourrier` int(11) NOT NULL AUTO_INCREMENT,
  `rueDestinataire` varchar(150) NOT NULL,
  `numDestintaire` varchar(5) NOT NULL,
  `rueEmetteur` varchar(150) DEFAULT NULL,
  `numEmetteur` varchar(50) DEFAULT NULL,
  `idType` int(11) NOT NULL,
  PRIMARY KEY (`idCourrier`),
  KEY `FK_courrier_types` (`idType`),
  CONSTRAINT `FK_courrier_types` FOREIGN KEY (`idType`) REFERENCES `types` (`idType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courriers`
--

LOCK TABLES `courriers` WRITE;
/*!40000 ALTER TABLE `courriers` DISABLE KEYS */;
/*!40000 ALTER TABLE `courriers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gere`
--

DROP TABLE IF EXISTS `gere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gere` (
  `idBureau` int(11) NOT NULL,
  `idCourrier` int(11) NOT NULL,
  `dateEnvoi` date DEFAULT NULL,
  `dateReception` date DEFAULT NULL,
  PRIMARY KEY (`idBureau`,`idCourrier`),
  KEY `FK_Gere_courrier` (`idCourrier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gere`
--

LOCK TABLES `gere` WRITE;
/*!40000 ALTER TABLE `gere` DISABLE KEYS */;
/*!40000 ALTER TABLE `gere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transports`
--

DROP TABLE IF EXISTS `transports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transports` (
  `idTransport` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTransport` varchar(50) DEFAULT NULL,
  `taxeCarbonne` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTransport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transports`
--

LOCK TABLES `transports` WRITE;
/*!40000 ALTER TABLE `transports` DISABLE KEYS */;
/*!40000 ALTER TABLE `transports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `libelleType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-08 17:26:02
