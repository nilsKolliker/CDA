-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: livre
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
-- Current Database: `livre`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `livre` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `livre`;

--
-- Table structure for table `abonnes`
--

DROP TABLE IF EXISTS `abonnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonnes` (
  `Id_abonnes` int(11) NOT NULL,
  `numero_matricule` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `date_d_adhesion` date DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `categ_professionnel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_abonnes`)
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
-- Table structure for table `acheter`
--

DROP TABLE IF EXISTS `acheter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acheter` (
  `Id_indentifications_biblio` int(11) NOT NULL,
  `Id_livres` int(11) NOT NULL,
  PRIMARY KEY (`Id_indentifications_biblio`,`Id_livres`),
  KEY `FK_acheter_livres` (`Id_livres`),
  CONSTRAINT `FK_acheter_indentifications_biblio` FOREIGN KEY (`Id_indentifications_biblio`) REFERENCES `indentifications_biblio` (`Id_indentifications_biblio`),
  CONSTRAINT `FK_acheter_livres` FOREIGN KEY (`Id_livres`) REFERENCES `livres` (`Id_livres`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acheter`
--

LOCK TABLES `acheter` WRITE;
/*!40000 ALTER TABLE `acheter` DISABLE KEYS */;
/*!40000 ALTER TABLE `acheter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `choisi`
--

DROP TABLE IF EXISTS `choisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `choisi` (
  `Id_abonnes` int(11) NOT NULL,
  `Id_livres` int(11) NOT NULL,
  PRIMARY KEY (`Id_abonnes`,`Id_livres`),
  KEY `FK_choisi_livres` (`Id_livres`),
  CONSTRAINT `FK_choisi_abonnes` FOREIGN KEY (`Id_abonnes`) REFERENCES `abonnes` (`Id_abonnes`),
  CONSTRAINT `FK_choisi_livres` FOREIGN KEY (`Id_livres`) REFERENCES `livres` (`Id_livres`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choisi`
--

LOCK TABLES `choisi` WRITE;
/*!40000 ALTER TABLE `choisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `choisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detenu`
--

DROP TABLE IF EXISTS `detenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detenu` (
  `Id_abonnes` int(11) NOT NULL,
  `Id_gestions_prets` int(11) NOT NULL,
  PRIMARY KEY (`Id_abonnes`,`Id_gestions_prets`),
  KEY `FK_detenu_gestions_prets` (`Id_gestions_prets`),
  CONSTRAINT `FK_detenu_abonnes` FOREIGN KEY (`Id_abonnes`) REFERENCES `abonnes` (`Id_abonnes`),
  CONSTRAINT `FK_detenu_gestions_prets` FOREIGN KEY (`Id_gestions_prets`) REFERENCES `gestions_prets` (`Id_gestions_prets`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detenu`
--

LOCK TABLES `detenu` WRITE;
/*!40000 ALTER TABLE `detenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `detenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestions_prets`
--

DROP TABLE IF EXISTS `gestions_prets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestions_prets` (
  `Id_gestions_prets` int(11) NOT NULL,
  `ajout_titre_abonnes` varchar(50) DEFAULT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `demande_non_satisfaite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_gestions_prets`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestions_prets`
--

LOCK TABLES `gestions_prets` WRITE;
/*!40000 ALTER TABLE `gestions_prets` DISABLE KEYS */;
/*!40000 ALTER TABLE `gestions_prets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indentifications_biblio`
--

DROP TABLE IF EXISTS `indentifications_biblio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indentifications_biblio` (
  `Id_indentifications_biblio` int(11) NOT NULL,
  `code_catalogue_achat` varchar(50) DEFAULT NULL,
  `date_acquisition` varchar(50) DEFAULT NULL,
  `code_rayon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_indentifications_biblio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indentifications_biblio`
--

LOCK TABLES `indentifications_biblio` WRITE;
/*!40000 ALTER TABLE `indentifications_biblio` DISABLE KEYS */;
/*!40000 ALTER TABLE `indentifications_biblio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informer`
--

DROP TABLE IF EXISTS `informer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informer` (
  `Id_gestions_prets` int(11) NOT NULL,
  `Id_stocks` int(11) NOT NULL,
  PRIMARY KEY (`Id_gestions_prets`,`Id_stocks`),
  KEY `FK_informer_stocks` (`Id_stocks`),
  CONSTRAINT `FK_informer_gestions_prets` FOREIGN KEY (`Id_gestions_prets`) REFERENCES `gestions_prets` (`Id_gestions_prets`),
  CONSTRAINT `FK_informer_stocks` FOREIGN KEY (`Id_stocks`) REFERENCES `stocks` (`Id_stocks`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informer`
--

LOCK TABLES `informer` WRITE;
/*!40000 ALTER TABLE `informer` DISABLE KEYS */;
/*!40000 ALTER TABLE `informer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livres`
--

DROP TABLE IF EXISTS `livres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livres` (
  `Id_livres` int(11) NOT NULL,
  `titre_du_livre` varchar(100) DEFAULT NULL,
  `auteur` varchar(50) DEFAULT NULL,
  `editeur` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `mots_cle` varchar(50) DEFAULT NULL,
  `themes` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_livres`)
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
-- Table structure for table `preter`
--

DROP TABLE IF EXISTS `preter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preter` (
  `Id_livres` int(11) NOT NULL,
  `Id_gestions_prets` int(11) NOT NULL,
  `date_15_jours` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_livres`,`Id_gestions_prets`),
  KEY `FK_preter_gestions_prets` (`Id_gestions_prets`),
  CONSTRAINT `FK_preter_gestions_prets` FOREIGN KEY (`Id_gestions_prets`) REFERENCES `gestions_prets` (`Id_gestions_prets`),
  CONSTRAINT `FK_preter_livres` FOREIGN KEY (`Id_livres`) REFERENCES `livres` (`Id_livres`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preter`
--

LOCK TABLES `preter` WRITE;
/*!40000 ALTER TABLE `preter` DISABLE KEYS */;
/*!40000 ALTER TABLE `preter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserver` (
  `Id_livres` int(11) NOT NULL,
  `Id_stocks` int(11) NOT NULL,
  `prio_1_semaines` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_livres`,`Id_stocks`),
  KEY `FK_reserver_stocks` (`Id_stocks`),
  CONSTRAINT `FK_reserver_livres` FOREIGN KEY (`Id_livres`) REFERENCES `livres` (`Id_livres`),
  CONSTRAINT `FK_reserver_stocks` FOREIGN KEY (`Id_stocks`) REFERENCES `stocks` (`Id_stocks`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserver`
--

LOCK TABLES `reserver` WRITE;
/*!40000 ALTER TABLE `reserver` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocks` (
  `Id_stocks` int(11) NOT NULL,
  `code_etat_usure` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_stocks`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-29 17:26:02
