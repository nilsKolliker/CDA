-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: gestionreunions
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
-- Current Database: `gestionreunions`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `gestionreunions` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gestionreunions`;

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `IdAction` int(11) NOT NULL AUTO_INCREMENT,
  `nomAction` text,
  `dateDeRealisation` datetime DEFAULT NULL,
  `descAction` text,
  `etatAction` varchar(50) DEFAULT NULL,
  `IdUser` int(11) NOT NULL,
  `IdReunion` int(11) NOT NULL,
  PRIMARY KEY (`IdAction`),
  KEY `FK_Actions_Users` (`IdUser`),
  KEY `FK_Actions_Reunions` (`IdReunion`),
  CONSTRAINT `FK_Actions_Reunions` FOREIGN KEY (`IdReunion`) REFERENCES `reunions` (`IdReunion`),
  CONSTRAINT `FK_Actions_Users` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affectationsuser`
--

DROP TABLE IF EXISTS `affectationsuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affectationsuser` (
  `IdAffectionUser` int(11) NOT NULL AUTO_INCREMENT,
  `IdUser` int(11) DEFAULT NULL,
  `IdService` int(11) DEFAULT NULL,
  `DateDebut` date DEFAULT NULL,
  `Role` varchar(50) DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  PRIMARY KEY (`IdAffectionUser`),
  KEY `FK_AffectionsUsers_Services` (`IdService`),
  KEY `FK_AffectionsUsers_Users` (`IdUser`),
  CONSTRAINT `FK_AffectionsUsers_Services` FOREIGN KEY (`IdService`) REFERENCES `services` (`IdService`),
  CONSTRAINT `FK_AffectionsUsers_Users` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affectationsuser`
--

LOCK TABLES `affectationsuser` WRITE;
/*!40000 ALTER TABLE `affectationsuser` DISABLE KEYS */;
/*!40000 ALTER TABLE `affectationsuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fichiersreunions`
--

DROP TABLE IF EXISTS `fichiersreunions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fichiersreunions` (
  `IdFichierReunion` int(11) NOT NULL AUTO_INCREMENT,
  `nomFichierReunion` varchar(200) DEFAULT NULL,
  `hyperlienFichierReunion` text,
  `IdReunion` int(11) NOT NULL,
  PRIMARY KEY (`IdFichierReunion`),
  KEY `FK_FichiersReunion_Reunions` (`IdReunion`),
  CONSTRAINT `FK_FichiersReunion_Reunions` FOREIGN KEY (`IdReunion`) REFERENCES `reunions` (`IdReunion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichiersreunions`
--

LOCK TABLES `fichiersreunions` WRITE;
/*!40000 ALTER TABLE `fichiersreunions` DISABLE KEYS */;
/*!40000 ALTER TABLE `fichiersreunions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisations`
--

DROP TABLE IF EXISTS `organisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisations` (
  `IdOrganisation` int(11) NOT NULL AUTO_INCREMENT,
  `nomOrg` varchar(100) DEFAULT NULL,
  `adresseOrg` varchar(200) DEFAULT NULL,
  `villeOrg` varchar(100) DEFAULT NULL,
  `paysOrg` varchar(100) DEFAULT NULL,
  `codePostalOrg` varchar(10) DEFAULT NULL,
  `horaireDebutOrg` varchar(10) DEFAULT NULL,
  `HoraireFinOrg` varchar(10) DEFAULT NULL,
  `numTelOrg` varchar(10) DEFAULT NULL,
  `emailOrg` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdOrganisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisations`
--

LOCK TABLES `organisations` WRITE;
/*!40000 ALTER TABLE `organisations` DISABLE KEYS */;
/*!40000 ALTER TABLE `organisations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participations`
--

DROP TABLE IF EXISTS `participations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participations` (
  `IdParticipation` int(11) NOT NULL AUTO_INCREMENT,
  `IdUser` int(11) DEFAULT NULL,
  `IdReunion` int(11) DEFAULT NULL,
  `IdRoleReunion` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdParticipation`),
  KEY `FK_Participation_Users` (`IdUser`),
  KEY `FK_Participation_Reunions` (`IdReunion`),
  KEY `FK_Participation_RolesReunions` (`IdRoleReunion`),
  CONSTRAINT `FK_Participation_Reunions` FOREIGN KEY (`IdReunion`) REFERENCES `reunions` (`IdReunion`),
  CONSTRAINT `FK_Participation_RolesReunions` FOREIGN KEY (`IdRoleReunion`) REFERENCES `rolesreunions` (`IdRoleReunion`),
  CONSTRAINT `FK_Participation_Users` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participations`
--

LOCK TABLES `participations` WRITE;
/*!40000 ALTER TABLE `participations` DISABLE KEYS */;
/*!40000 ALTER TABLE `participations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pays` (
  `IdPays` int(11) NOT NULL AUTO_INCREMENT,
  `LibellePays` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`IdPays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `IdReservation` int(11) NOT NULL AUTO_INCREMENT,
  `IdReunion` int(11) DEFAULT NULL,
  `IdSalle` int(11) DEFAULT NULL,
  `dateDebutReservation` datetime DEFAULT NULL,
  `dateFinReservation` datetime DEFAULT NULL,
  PRIMARY KEY (`IdReservation`),
  KEY `FK_Reservations_Reunions` (`IdReunion`),
  KEY `FK_Reservations_SallesReunion` (`IdSalle`),
  CONSTRAINT `FK_Reservations_Reunions` FOREIGN KEY (`IdReunion`) REFERENCES `reunions` (`IdReunion`),
  CONSTRAINT `FK_Reservations_SallesReunion` FOREIGN KEY (`IdSalle`) REFERENCES `sallesreunion` (`IdSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reunions`
--

DROP TABLE IF EXISTS `reunions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reunions` (
  `IdReunion` int(11) NOT NULL AUTO_INCREMENT,
  `typeReunion` int(11) DEFAULT NULL,
  `lieuReunion` varchar(255) DEFAULT NULL,
  `titreReunion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdReunion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reunions`
--

LOCK TABLES `reunions` WRITE;
/*!40000 ALTER TABLE `reunions` DISABLE KEYS */;
/*!40000 ALTER TABLE `reunions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolesapp`
--

DROP TABLE IF EXISTS `rolesapp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rolesapp` (
  `IdRoleApp` int(11) NOT NULL AUTO_INCREMENT,
  `libelleRoleApp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdRoleApp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolesapp`
--

LOCK TABLES `rolesapp` WRITE;
/*!40000 ALTER TABLE `rolesapp` DISABLE KEYS */;
/*!40000 ALTER TABLE `rolesapp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolesreunions`
--

DROP TABLE IF EXISTS `rolesreunions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rolesreunions` (
  `IdRoleReunion` int(11) NOT NULL AUTO_INCREMENT,
  `libelleRoleReunion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdRoleReunion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolesreunions`
--

LOCK TABLES `rolesreunions` WRITE;
/*!40000 ALTER TABLE `rolesreunions` DISABLE KEYS */;
/*!40000 ALTER TABLE `rolesreunions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sallesreunion`
--

DROP TABLE IF EXISTS `sallesreunion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sallesreunion` (
  `IdSalle` int(11) NOT NULL AUTO_INCREMENT,
  `NumSalle` int(11) DEFAULT NULL,
  `IdOrganisation` int(11) NOT NULL,
  PRIMARY KEY (`IdSalle`),
  KEY `FK_SallesReunion_Organisations` (`IdOrganisation`),
  CONSTRAINT `FK_SallesReunion_Organisations` FOREIGN KEY (`IdOrganisation`) REFERENCES `organisations` (`IdOrganisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sallesreunion`
--

LOCK TABLES `sallesreunion` WRITE;
/*!40000 ALTER TABLE `sallesreunion` DISABLE KEYS */;
/*!40000 ALTER TABLE `sallesreunion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `IdService` int(11) NOT NULL AUTO_INCREMENT,
  `nomService` varchar(100) DEFAULT NULL,
  `IdOrganisation` int(11) NOT NULL,
  PRIMARY KEY (`IdService`),
  KEY `FK_Services_Organisations` (`IdOrganisation`),
  CONSTRAINT `FK_Services_Organisations` FOREIGN KEY (`IdOrganisation`) REFERENCES `organisations` (`IdOrganisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sondages`
--

DROP TABLE IF EXISTS `sondages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sondages` (
  `IdSondage` int(11) NOT NULL AUTO_INCREMENT,
  `nomSondage` varchar(255) DEFAULT NULL,
  `propositonSondage` text,
  `resultatSondage` text,
  `IdReunion` int(11) NOT NULL,
  PRIMARY KEY (`IdSondage`),
  KEY `FK_Sondage_Reunion` (`IdReunion`),
  CONSTRAINT `FK_Sondage_Reunion` FOREIGN KEY (`IdReunion`) REFERENCES `reunions` (`IdReunion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sondages`
--

LOCK TABLES `sondages` WRITE;
/*!40000 ALTER TABLE `sondages` DISABLE KEYS */;
/*!40000 ALTER TABLE `sondages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sujets`
--

DROP TABLE IF EXISTS `sujets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sujets` (
  `IdSujet` int(11) NOT NULL AUTO_INCREMENT,
  `nomSujet` varchar(200) DEFAULT NULL,
  `dureeSujet` time DEFAULT NULL,
  `IdUser` int(11) NOT NULL,
  `IdReunion` int(11) NOT NULL,
  PRIMARY KEY (`IdSujet`),
  KEY `FK_Sujets_Users` (`IdUser`),
  KEY `FK_Sujets_Reunions` (`IdReunion`),
  CONSTRAINT `FK_Sujets_Reunions` FOREIGN KEY (`IdReunion`) REFERENCES `reunions` (`IdReunion`),
  CONSTRAINT `FK_Sujets_Users` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sujets`
--

LOCK TABLES `sujets` WRITE;
/*!40000 ALTER TABLE `sujets` DISABLE KEYS */;
/*!40000 ALTER TABLE `sujets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `nomUser` varchar(100) DEFAULT NULL,
  `prenomUser` varchar(100) DEFAULT NULL,
  `DDNUser` date DEFAULT NULL,
  `emailUser` varchar(200) DEFAULT NULL,
  `motDePasseUser` varchar(100) DEFAULT NULL,
  `IdRoleApp` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`),
  KEY `FK_Users_RolesApp` (`IdRoleApp`),
  CONSTRAINT `FK_Users_RolesApp` FOREIGN KEY (`IdRoleApp`) REFERENCES `rolesapp` (`IdRoleApp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `villes`
--

DROP TABLE IF EXISTS `villes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `villes` (
  `IdVille` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleVille` varchar(150) DEFAULT NULL,
  `CodePostale` varchar(10) DEFAULT NULL,
  `IdPays` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdVille`),
  KEY `FK_Villes_Pays` (`IdPays`),
  CONSTRAINT `FK_Villes_Pays` FOREIGN KEY (`IdPays`) REFERENCES `pays` (`IdPays`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `villes`
--

LOCK TABLES `villes` WRITE;
/*!40000 ALTER TABLE `villes` DISABLE KEYS */;
INSERT INTO `villes` VALUES (1,'test',NULL,NULL),(2,'test',NULL,NULL),(3,'test',NULL,NULL);
/*!40000 ALTER TABLE `villes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-09 12:26:06
