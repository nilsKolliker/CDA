-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: bibliojeux
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
-- Current Database: `bibliojeux`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bibliojeux` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bibliojeux`;

--
-- Table structure for table `accessoire`
--

DROP TABLE IF EXISTS `accessoire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accessoire` (
  `idAccessoire` int(11) NOT NULL AUTO_INCREMENT,
  `libelleAccessoire` varchar(50) DEFAULT NULL,
  `idMarque` int(11) NOT NULL,
  PRIMARY KEY (`idAccessoire`),
  KEY `FK_Accessoire_Marque` (`idMarque`),
  CONSTRAINT `FK_Accessoire_Marque` FOREIGN KEY (`idMarque`) REFERENCES `marque` (`idMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessoire`
--

LOCK TABLES `accessoire` WRITE;
/*!40000 ALTER TABLE `accessoire` DISABLE KEYS */;
INSERT INTO `accessoire` VALUES (6,'manette',1),(7,'carte memoire',1);
/*!40000 ALTER TABLE `accessoire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `console`
--

DROP TABLE IF EXISTS `console`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `console` (
  `idConsole` int(11) NOT NULL AUTO_INCREMENT,
  `libelleConsole` varchar(50) DEFAULT NULL,
  `idMarque` int(11) NOT NULL,
  PRIMARY KEY (`idConsole`),
  KEY `FK_Console_Marque` (`idMarque`),
  CONSTRAINT `FK_Console_Marque` FOREIGN KEY (`idMarque`) REFERENCES `marque` (`idMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `console`
--

LOCK TABLES `console` WRITE;
/*!40000 ALTER TABLE `console` DISABLE KEYS */;
INSERT INTO `console` VALUES (1,'megadrive',4),(2,'playstation',1),(3,'Nintendo',3),(4,'Xbox',2);
/*!40000 ALTER TABLE `console` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consoleaccessoire`
--

DROP TABLE IF EXISTS `consoleaccessoire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consoleaccessoire` (
  `idConsoleAccessoire` int(11) NOT NULL AUTO_INCREMENT,
  `idAccessoire` int(11) DEFAULT NULL,
  `idConsole` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConsoleAccessoire`),
  KEY `FK_ConsoleAccessoire_Accessoire` (`idAccessoire`),
  KEY `FK_ConsoleAccessoire_Console` (`idConsole`),
  CONSTRAINT `FK_ConsoleAccessoire_Accessoire` FOREIGN KEY (`idAccessoire`) REFERENCES `accessoire` (`idAccessoire`),
  CONSTRAINT `FK_ConsoleAccessoire_Console` FOREIGN KEY (`idConsole`) REFERENCES `console` (`idConsole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consoleaccessoire`
--

LOCK TABLES `consoleaccessoire` WRITE;
/*!40000 ALTER TABLE `consoleaccessoire` DISABLE KEYS */;
INSERT INTO `consoleaccessoire` VALUES (1,7,2),(2,6,2);
/*!40000 ALTER TABLE `consoleaccessoire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consolejeu`
--

DROP TABLE IF EXISTS `consolejeu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consolejeu` (
  `idConsoleJeu` int(11) NOT NULL AUTO_INCREMENT,
  `idJeu` int(11) DEFAULT NULL,
  `idConsole` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConsoleJeu`),
  KEY `FK_ConsoleJeu_Jeu` (`idJeu`),
  KEY `FK_ConsoleJeu_Console` (`idConsole`),
  CONSTRAINT `FK_ConsoleJeu_Console` FOREIGN KEY (`idConsole`) REFERENCES `console` (`idConsole`),
  CONSTRAINT `FK_ConsoleJeu_Jeu` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consolejeu`
--

LOCK TABLES `consolejeu` WRITE;
/*!40000 ALTER TABLE `consolejeu` DISABLE KEYS */;
INSERT INTO `consolejeu` VALUES (1,1,3),(2,2,1);
/*!40000 ALTER TABLE `consolejeu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jeu`
--

DROP TABLE IF EXISTS `jeu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jeu` (
  `idJeu` int(11) NOT NULL AUTO_INCREMENT,
  `libelleJeu` varchar(50) DEFAULT NULL,
  `idMarque` int(11) NOT NULL,
  PRIMARY KEY (`idJeu`),
  KEY `FK_Jeu_Marque` (`idMarque`),
  CONSTRAINT `FK_Jeu_Marque` FOREIGN KEY (`idMarque`) REFERENCES `marque` (`idMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jeu`
--

LOCK TABLES `jeu` WRITE;
/*!40000 ALTER TABLE `jeu` DISABLE KEYS */;
INSERT INTO `jeu` VALUES (1,'mario',3),(2,'sonic',4);
/*!40000 ALTER TABLE `jeu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marque` (
  `idMarque` int(11) NOT NULL AUTO_INCREMENT,
  `libelleMarque` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` VALUES (1,'Sony'),(2,'Microsoft'),(3,'Nintendo'),(4,'Sega');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `idProfile` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) DEFAULT NULL,
  `idJeu` int(11) DEFAULT NULL,
  `idAccessoire` int(11) DEFAULT NULL,
  `idConsole` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProfile`),
  KEY `FK_Profile_Utilisateur` (`idUtilisateur`),
  KEY `FK_Profile_Jeu` (`idJeu`),
  KEY `FK_Profile_Accessoire` (`idAccessoire`),
  KEY `FK_Profile_Console` (`idConsole`),
  CONSTRAINT `FK_Profile_Accessoire` FOREIGN KEY (`idAccessoire`) REFERENCES `accessoire` (`idAccessoire`),
  CONSTRAINT `FK_Profile_Console` FOREIGN KEY (`idConsole`) REFERENCES `console` (`idConsole`),
  CONSTRAINT `FK_Profile_Jeu` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`),
  CONSTRAINT `FK_Profile_Utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,1,1,6,3),(2,2,2,NULL,1),(3,1,2,NULL,1);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudoUtilisateur` varchar(50) DEFAULT NULL,
  `motDePasseUtilisateur` varchar(50) DEFAULT NULL,
  `emailUtilisateur` varchar(50) DEFAULT NULL,
  `statue` varchar(50) DEFAULT NULL,
  `photoCollection` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'Alan','test','alan@mail','membre','aaaa'),(2,'CharlesDegaulle','test','Degaulle@mail','membre','aaaa');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-07 17:26:05
