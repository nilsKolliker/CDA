-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: gestioncantine
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
-- Current Database: `gestioncantine`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `gestioncantine` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gestioncantine`;

--
-- Table structure for table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eleves` (
  `IdEleve` int(11) NOT NULL AUTO_INCREMENT,
  `NomEleve` varchar(150) DEFAULT NULL,
  `PrenomEleve` varchar(150) DEFAULT NULL,
  `DDNEleve` date DEFAULT NULL,
  `SoldeEleve` double DEFAULT NULL,
  PRIMARY KEY (`IdEleve`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eleves`
--

LOCK TABLES `eleves` WRITE;
/*!40000 ALTER TABLE `eleves` DISABLE KEYS */;
INSERT INTO `eleves` VALUES (1,'Dubois','Julette','1999-11-11',140),(2,'Marnier','Sophie','2001-02-15',50),(3,'Godart','Louis','2000-06-29',20),(4,'Pichon','Mathieu','2000-04-02',110),(5,'Chavain ','Natalie','2002-02-25',120),(6,'Dubois ','Juliette','2003-12-14',0);
/*!40000 ALTER TABLE `eleves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `IdMenu` int(11) NOT NULL AUTO_INCREMENT,
  `DateMenu` date DEFAULT NULL,
  `LibelleMenu` varchar(50) DEFAULT NULL,
  `PrixMenu` double DEFAULT NULL,
  PRIMARY KEY (`IdMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'2017-09-04','Charcutrie/Poulet/Glace',6.5),(2,'2017-09-05','Peche/Pâte/Baba',6.5),(3,'2017-09-06','Œuf/Curry/Compote',6.5),(4,'2017-09-07','Salade/Carbonade/Île',6.5),(5,'2017-09-08','Feuilleté/Steak/Crème',6.5),(6,'2017-09-09','Soupe/Chili/Tarte',6.5);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modesdepaiement`
--

DROP TABLE IF EXISTS `modesdepaiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modesdepaiement` (
  `IdModeDePaiement` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleModeDePaiement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdModeDePaiement`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modesdepaiement`
--

LOCK TABLES `modesdepaiement` WRITE;
/*!40000 ALTER TABLE `modesdepaiement` DISABLE KEYS */;
INSERT INTO `modesdepaiement` VALUES (1,'Virement/CB'),(2,'Chèques'),(3,'Espèces');
/*!40000 ALTER TABLE `modesdepaiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paiements` (
  `IdPaiement` int(11) NOT NULL AUTO_INCREMENT,
  `MontantPaiement` double DEFAULT NULL,
  `DatePaiement` date DEFAULT NULL,
  `IdEleve` int(11) NOT NULL,
  `IdModeDePaiement` int(11) NOT NULL,
  PRIMARY KEY (`IdPaiement`),
  KEY `FK_Paiements_Eleves` (`IdEleve`),
  KEY `FK_Paiements_ModesDePaiement` (`IdModeDePaiement`),
  CONSTRAINT `FK_Paiements_Eleves` FOREIGN KEY (`IdEleve`) REFERENCES `eleves` (`IdEleve`),
  CONSTRAINT `FK_Paiements_ModesDePaiement` FOREIGN KEY (`IdModeDePaiement`) REFERENCES `modesdepaiement` (`IdModeDePaiement`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiements`
--

LOCK TABLES `paiements` WRITE;
/*!40000 ALTER TABLE `paiements` DISABLE KEYS */;
INSERT INTO `paiements` VALUES (1,50,'2017-09-05',4,2),(2,40,'2017-09-10',1,2),(3,20,'2017-09-25',3,1),(5,80,'2017-09-25',5,1);
/*!40000 ALTER TABLE `paiements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `IdReservation` int(11) NOT NULL AUTO_INCREMENT,
  `IdEleve` int(11) DEFAULT NULL,
  `IdMenu` int(11) DEFAULT NULL,
  `DateReservation` date DEFAULT NULL,
  PRIMARY KEY (`IdReservation`),
  KEY `FK_Reservations_Eleves` (`IdEleve`),
  KEY `FK_Reservations_Menus` (`IdMenu`),
  CONSTRAINT `FK_Reservations_Eleves` FOREIGN KEY (`IdEleve`) REFERENCES `eleves` (`IdEleve`),
  CONSTRAINT `FK_Reservations_Menus` FOREIGN KEY (`IdMenu`) REFERENCES `menus` (`IdMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,3,1,'2017-09-04'),(2,2,2,'2017-09-09'),(3,4,3,'2017-09-24'),(4,5,4,'2017-09-13'),(5,1,5,'2017-09-24'),(6,6,6,'2017-09-04');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `IdRole` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleRole` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin'),(2,'Proviseur'),(3,'Secrétaire'),(4,'Chef de Cuisine');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `NomUser` varchar(150) DEFAULT NULL,
  `PrenomUser` varchar(150) DEFAULT NULL,
  `EmailUser` varchar(200) DEFAULT NULL,
  `MDPUser` varchar(50) DEFAULT NULL,
  `IdRole` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`),
  KEY `FK_Users_Roles` (`IdRole`),
  CONSTRAINT `FK_Users_Roles` FOREIGN KEY (`IdRole`) REFERENCES `roles` (`IdRole`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Moriso','Antonin','moriso.antonin@gmail,com','Fleur14',2),(2,'Cadart','Aurelien','cadart.aurelien@gmail.com','AperoLundiOnly',3),(3,'Bultel','Théo','bultel.theo@gmail.com','GotagaFan',4),(4,'Hiesse','Colline','hiesse.colline@gmail.com','PiccassoTao4',1),(5,'Fievet','Florentin','fievet.florentin@gmail.com','Dudule36',3),(6,'Keurink','Dorian','keurink.dorian@gmail.com','SweetMadLion3',3);
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

-- Dump completed on 2021-12-23 12:26:02
