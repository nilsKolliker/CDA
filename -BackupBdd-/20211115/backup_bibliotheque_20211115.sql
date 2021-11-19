-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: bibliotheque
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
-- Current Database: `bibliotheque`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bibliotheque` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bibliotheque`;

--
-- Table structure for table `abonnes`
--

DROP TABLE IF EXISTS `abonnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonnes` (
  `IdAbonne` int(11) NOT NULL AUTO_INCREMENT,
  `MatriculeAbonne` varchar(50) DEFAULT NULL,
  `NomAbonne` varchar(50) DEFAULT NULL,
  `AdresseAbonne` varchar(50) DEFAULT NULL,
  `TelephoneAbonne` varchar(50) DEFAULT NULL,
  `DateAdhesion` date DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `IdCategorieProfessionnelle` int(11) NOT NULL,
  PRIMARY KEY (`IdAbonne`),
  KEY `FK_Abonnes_CategorieProfessionnelle` (`IdCategorieProfessionnelle`),
  CONSTRAINT `FK_Abonnes_CategorieProfessionnelle` FOREIGN KEY (`IdCategorieProfessionnelle`) REFERENCES `categoriesprofessionnelles` (`IdCategorieProfessionnelle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonnes`
--

LOCK TABLES `abonnes` WRITE;
/*!40000 ALTER TABLE `abonnes` DISABLE KEYS */;
/*!40000 ALTER TABLE `abonnes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auteurs` (
  `IdAuteur` int(11) NOT NULL AUTO_INCREMENT,
  `NomAutheur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdAuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auteurs`
--

LOCK TABLES `auteurs` WRITE;
/*!40000 ALTER TABLE `auteurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `auteurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriesprofessionnelles`
--

DROP TABLE IF EXISTS `categoriesprofessionnelles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriesprofessionnelles` (
  `IdCategorieProfessionnelle` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleCategPro` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCategorieProfessionnelle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriesprofessionnelles`
--

LOCK TABLES `categoriesprofessionnelles` WRITE;
/*!40000 ALTER TABLE `categoriesprofessionnelles` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoriesprofessionnelles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compositions`
--

DROP TABLE IF EXISTS `compositions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compositions` (
  `IdAuteur` int(11) NOT NULL,
  `IdLivre` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdAuteur`),
  KEY `FK_Compositions_Livre` (`IdLivre`),
  CONSTRAINT `FK_Compositions_Auteur` FOREIGN KEY (`IdAuteur`) REFERENCES `auteurs` (`IdAuteur`),
  CONSTRAINT `FK_Compositions_Livre` FOREIGN KEY (`IdLivre`) REFERENCES `livres` (`IdLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compositions`
--

LOCK TABLES `compositions` WRITE;
/*!40000 ALTER TABLE `compositions` DISABLE KEYS */;
/*!40000 ALTER TABLE `compositions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `definitions`
--

DROP TABLE IF EXISTS `definitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `definitions` (
  `IdGenre` int(11) NOT NULL,
  `IdLivre` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdGenre`),
  KEY `FK_Definitions_Livre` (`IdLivre`),
  CONSTRAINT `FK_Definitions_Genre` FOREIGN KEY (`IdGenre`) REFERENCES `genres` (`IdGenre`),
  CONSTRAINT `FK_Definitions_Livre` FOREIGN KEY (`IdLivre`) REFERENCES `livres` (`IdLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `definitions`
--

LOCK TABLES `definitions` WRITE;
/*!40000 ALTER TABLE `definitions` DISABLE KEYS */;
/*!40000 ALTER TABLE `definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editeurs`
--

DROP TABLE IF EXISTS `editeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editeurs` (
  `IdEditeur` int(11) NOT NULL AUTO_INCREMENT,
  `NomEditeur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdEditeur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editeurs`
--

LOCK TABLES `editeurs` WRITE;
/*!40000 ALTER TABLE `editeurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `editeurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empruntexemplaires`
--

DROP TABLE IF EXISTS `empruntexemplaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empruntexemplaires` (
  `IdExemplaire` int(11) NOT NULL,
  `IdAbonne` int(11) DEFAULT NULL,
  `DateEmprunt` datetime DEFAULT NULL,
  `DateRetourEffective` datetime DEFAULT NULL,
  PRIMARY KEY (`IdExemplaire`),
  KEY `FK_EmpruntExemplaires_Abonne` (`IdAbonne`),
  CONSTRAINT `FK_EmpruntExemplaires_Abonne` FOREIGN KEY (`IdAbonne`) REFERENCES `abonnes` (`IdAbonne`),
  CONSTRAINT `FK_EmpruntExemplaires_Exemplaire` FOREIGN KEY (`IdExemplaire`) REFERENCES `exemplaires` (`IdExemplaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empruntexemplaires`
--

LOCK TABLES `empruntexemplaires` WRITE;
/*!40000 ALTER TABLE `empruntexemplaires` DISABLE KEYS */;
/*!40000 ALTER TABLE `empruntexemplaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etatsreserves`
--

DROP TABLE IF EXISTS `etatsreserves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etatsreserves` (
  `IdEtatReserve` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleEtatReserve` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdEtatReserve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etatsreserves`
--

LOCK TABLES `etatsreserves` WRITE;
/*!40000 ALTER TABLE `etatsreserves` DISABLE KEYS */;
/*!40000 ALTER TABLE `etatsreserves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exemplaires`
--

DROP TABLE IF EXISTS `exemplaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exemplaires` (
  `IdExemplaire` int(11) NOT NULL AUTO_INCREMENT,
  `DateAcquisition` date DEFAULT NULL,
  `Disponibilite` tinyint(1) DEFAULT NULL,
  `CodeRayon` varchar(50) DEFAULT NULL,
  `IdUsure` int(11) NOT NULL,
  `IdLivre` int(11) NOT NULL,
  PRIMARY KEY (`IdExemplaire`),
  KEY `FK_exemplaires_Usure` (`IdUsure`),
  KEY `FK_exemplaires_Livre` (`IdLivre`),
  CONSTRAINT `FK_exemplaires_Livre` FOREIGN KEY (`IdLivre`) REFERENCES `livres` (`IdLivre`),
  CONSTRAINT `FK_exemplaires_Usure` FOREIGN KEY (`IdUsure`) REFERENCES `usures` (`IdUsure`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exemplaires`
--

LOCK TABLES `exemplaires` WRITE;
/*!40000 ALTER TABLE `exemplaires` DISABLE KEYS */;
/*!40000 ALTER TABLE `exemplaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `IdGenre` int(11) NOT NULL AUTO_INCREMENT,
  `NomGenre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identifications`
--

DROP TABLE IF EXISTS `identifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `identifications` (
  `IdLivre` int(11) NOT NULL,
  `IdMotCle` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdLivre`),
  KEY `FK_Identifications_MotCle` (`IdMotCle`),
  CONSTRAINT `FK_Identifications_Livre` FOREIGN KEY (`IdLivre`) REFERENCES `livres` (`IdLivre`),
  CONSTRAINT `FK_Identifications_MotCle` FOREIGN KEY (`IdMotCle`) REFERENCES `motscles` (`IdMotCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identifications`
--

LOCK TABLES `identifications` WRITE;
/*!40000 ALTER TABLE `identifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `identifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livres` (
  `IdLivre` int(11) NOT NULL AUTO_INCREMENT,
  `TitreLivre` varchar(50) DEFAULT NULL,
  `CodeCatalogue` varchar(50) DEFAULT NULL,
  `IdEditeur` int(11) NOT NULL,
  `IdTheme` int(11) NOT NULL,
  PRIMARY KEY (`IdLivre`),
  KEY `FK_livres_Editeur` (`IdEditeur`),
  KEY `FK_livres_Theme` (`IdTheme`),
  CONSTRAINT `FK_livres_Editeur` FOREIGN KEY (`IdEditeur`) REFERENCES `editeurs` (`IdEditeur`),
  CONSTRAINT `FK_livres_Theme` FOREIGN KEY (`IdTheme`) REFERENCES `themes` (`IdTheme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livres`
--

LOCK TABLES `livres` WRITE;
/*!40000 ALTER TABLE `livres` DISABLE KEYS */;
/*!40000 ALTER TABLE `livres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motscles`
--

DROP TABLE IF EXISTS `motscles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motscles` (
  `IdMotCle` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleMotCle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdMotCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motscles`
--

LOCK TABLES `motscles` WRITE;
/*!40000 ALTER TABLE `motscles` DISABLE KEYS */;
/*!40000 ALTER TABLE `motscles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `IdEtatReserve` int(11) NOT NULL,
  `IdLivre` int(11) DEFAULT NULL,
  `IdAbonne` int(11) DEFAULT NULL,
  `DateDebutReservation` datetime DEFAULT NULL,
  `DateDemandeReservation` date DEFAULT NULL,
  PRIMARY KEY (`IdEtatReserve`),
  KEY `FK_Reservations_Livre` (`IdLivre`),
  KEY `FK_Reservations_Abonne` (`IdAbonne`),
  CONSTRAINT `FK_Reservations_Abonne` FOREIGN KEY (`IdAbonne`) REFERENCES `abonnes` (`IdAbonne`),
  CONSTRAINT `FK_Reservations_EtatReserve` FOREIGN KEY (`IdEtatReserve`) REFERENCES `etatsreserves` (`IdEtatReserve`),
  CONSTRAINT `FK_Reservations_Livre` FOREIGN KEY (`IdLivre`) REFERENCES `livres` (`IdLivre`)
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
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `IdTheme` int(11) NOT NULL AUTO_INCREMENT,
  `NomTheme` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdTheme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usures`
--

DROP TABLE IF EXISTS `usures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usures` (
  `IdUsure` int(11) NOT NULL AUTO_INCREMENT,
  `CodeUsure` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdUsure`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usures`
--

LOCK TABLES `usures` WRITE;
/*!40000 ALTER TABLE `usures` DISABLE KEYS */;
/*!40000 ALTER TABLE `usures` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-15 17:26:02
