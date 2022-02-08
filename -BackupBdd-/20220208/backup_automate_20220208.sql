-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: automate
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
-- Current Database: `automate`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `automate` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `automate`;

--
-- Table structure for table `afpa_anomalies`
--

DROP TABLE IF EXISTS `afpa_anomalies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_anomalies` (
  `IdAnomalie` int(11) NOT NULL AUTO_INCREMENT,
  `DateAnomalie` datetime DEFAULT NULL,
  `TypeAnomalie` varchar(50) DEFAULT NULL,
  `NbDeclasses` int(11) DEFAULT NULL,
  `IdErreur` int(11) NOT NULL,
  PRIMARY KEY (`IdAnomalie`),
  KEY `Afpa_Anomalies_Afpa_Erreurs` (`IdErreur`),
  CONSTRAINT `Afpa_Anomalies_Afpa_Erreurs` FOREIGN KEY (`IdErreur`) REFERENCES `afpa_erreurs` (`IdErreur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_anomalies`
--

LOCK TABLES `afpa_anomalies` WRITE;
/*!40000 ALTER TABLE `afpa_anomalies` DISABLE KEYS */;
INSERT INTO `afpa_anomalies` VALUES (1,'2022-02-01 14:20:30','Lumière ',10,3),(2,'2022-02-01 14:21:52','Son',10,2);
/*!40000 ALTER TABLE `afpa_anomalies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_cadences`
--

DROP TABLE IF EXISTS `afpa_cadences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_cadences` (
  `IdCadence` int(11) NOT NULL AUTO_INCREMENT,
  `NbProduit` int(11) DEFAULT NULL,
  `DateCadence` datetime DEFAULT NULL,
  PRIMARY KEY (`IdCadence`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_cadences`
--

LOCK TABLES `afpa_cadences` WRITE;
/*!40000 ALTER TABLE `afpa_cadences` DISABLE KEYS */;
INSERT INTO `afpa_cadences` VALUES (1,100,'2022-02-01 14:20:30'),(2,150,'2022-02-01 14:22:30');
/*!40000 ALTER TABLE `afpa_cadences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_couleurs`
--

DROP TABLE IF EXISTS `afpa_couleurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_couleurs` (
  `IdCouleur` int(11) NOT NULL AUTO_INCREMENT,
  `Red` int(11) DEFAULT NULL,
  `Green` int(11) DEFAULT NULL,
  `Blue` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdCouleur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_couleurs`
--

LOCK TABLES `afpa_couleurs` WRITE;
/*!40000 ALTER TABLE `afpa_couleurs` DISABLE KEYS */;
INSERT INTO `afpa_couleurs` VALUES (1,198,8,0),(2,158,253,56),(3,254,27,0);
/*!40000 ALTER TABLE `afpa_couleurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_erreurs`
--

DROP TABLE IF EXISTS `afpa_erreurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_erreurs` (
  `IdErreur` int(11) NOT NULL AUTO_INCREMENT,
  `MessageErreur` text,
  PRIMARY KEY (`IdErreur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_erreurs`
--

LOCK TABLES `afpa_erreurs` WRITE;
/*!40000 ALTER TABLE `afpa_erreurs` DISABLE KEYS */;
INSERT INTO `afpa_erreurs` VALUES (1,'Luminosité trop basse '),(2,'Son trop haut '),(3,'Luminosité trop faible'),(4,'Son trop bas'),(5,'Température trop élevé. '),(6,'Température trop basse. '),(7,'Son ne fonctionne pas '),(8,'Lumière ne fonctionne pas '),(9,'Température ne fonctionne pas '),(10,'Lumière saccadée '),(11,'Son grésillement '),(12,'Température Instable');
/*!40000 ALTER TABLE `afpa_erreurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_lumieres`
--

DROP TABLE IF EXISTS `afpa_lumieres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_lumieres` (
  `IdLumiere` int(11) NOT NULL AUTO_INCREMENT,
  `ValeurLumiere` float DEFAULT NULL,
  `DateLumiere` datetime DEFAULT NULL,
  PRIMARY KEY (`IdLumiere`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_lumieres`
--

LOCK TABLES `afpa_lumieres` WRITE;
/*!40000 ALTER TABLE `afpa_lumieres` DISABLE KEYS */;
INSERT INTO `afpa_lumieres` VALUES (1,350,'2022-02-02 14:08:16'),(2,120,'2022-02-01 14:08:16');
/*!40000 ALTER TABLE `afpa_lumieres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_objectifs`
--

DROP TABLE IF EXISTS `afpa_objectifs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_objectifs` (
  `IdObjectif` int(11) NOT NULL AUTO_INCREMENT,
  `Rendement` int(11) DEFAULT NULL,
  `MaxNombreArretTemperature` int(11) DEFAULT NULL,
  `MaxNombreArretDecibel` int(11) DEFAULT NULL,
  `MaxPourcentDeclasses` int(11) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  PRIMARY KEY (`IdObjectif`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_objectifs`
--

LOCK TABLES `afpa_objectifs` WRITE;
/*!40000 ALTER TABLE `afpa_objectifs` DISABLE KEYS */;
INSERT INTO `afpa_objectifs` VALUES (1,100,4,5,60,NULL),(2,200,5,4,70,NULL);
/*!40000 ALTER TABLE `afpa_objectifs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_seuils`
--

DROP TABLE IF EXISTS `afpa_seuils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_seuils` (
  `IdSeuil` int(11) NOT NULL AUTO_INCREMENT,
  `SeuilBas` float DEFAULT NULL,
  `SeuilHaut` float DEFAULT NULL,
  `DateSeuil` date DEFAULT NULL,
  `Temps` int(11) DEFAULT NULL,
  `Nature` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdSeuil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_seuils`
--

LOCK TABLES `afpa_seuils` WRITE;
/*!40000 ALTER TABLE `afpa_seuils` DISABLE KEYS */;
INSERT INTO `afpa_seuils` VALUES (1,10,30,'2022-02-01',1,3),(2,40,150,'2022-02-02',2,2),(3,100,1000,'2022-02-25',1,1);
/*!40000 ALTER TABLE `afpa_seuils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_sons`
--

DROP TABLE IF EXISTS `afpa_sons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_sons` (
  `IdSon` int(11) NOT NULL AUTO_INCREMENT,
  `ValeurSon` float DEFAULT NULL,
  `DateSon` datetime DEFAULT NULL,
  PRIMARY KEY (`IdSon`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_sons`
--

LOCK TABLES `afpa_sons` WRITE;
/*!40000 ALTER TABLE `afpa_sons` DISABLE KEYS */;
INSERT INTO `afpa_sons` VALUES (1,120,'2022-02-06 10:23:37'),(2,100,'2022-02-08 13:58:44');
/*!40000 ALTER TABLE `afpa_sons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_temperatures`
--

DROP TABLE IF EXISTS `afpa_temperatures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_temperatures` (
  `IdTemperature` int(11) NOT NULL AUTO_INCREMENT,
  `ValeurTemperature` float DEFAULT NULL,
  `DateTemperature` datetime DEFAULT NULL,
  PRIMARY KEY (`IdTemperature`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_temperatures`
--

LOCK TABLES `afpa_temperatures` WRITE;
/*!40000 ALTER TABLE `afpa_temperatures` DISABLE KEYS */;
INSERT INTO `afpa_temperatures` VALUES (1,21,'2022-02-01 13:57:57'),(2,-3,'2022-02-01 14:57:57');
/*!40000 ALTER TABLE `afpa_temperatures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_textes`
--

DROP TABLE IF EXISTS `afpa_textes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_textes` (
  `idTexte` int(11) NOT NULL AUTO_INCREMENT,
  `codeTexte` varchar(50) NOT NULL,
  `fr` longtext NOT NULL,
  `en` longtext NOT NULL,
  PRIMARY KEY (`idTexte`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_textes`
--

LOCK TABLES `afpa_textes` WRITE;
/*!40000 ALTER TABLE `afpa_textes` DISABLE KEYS */;
INSERT INTO `afpa_textes` VALUES (1,'Bonjour','Bonjour','Hello'),(2,'Connexion','Connexion','Log in'),(3,'Deconnexion','Deconnexion','Log out'),(4,'Accueil','Accueil','Home'),(5,'AdresseEmail','Adresse email','Email address'),(6,'Mdp','Mot de passe','Password'),(7,'Inscription','Inscription','Registration'),(8,'Nom','Nom','Surname'),(9,'Prenom','Prenom','Name'),(10,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(11,'UneMajuscule','1 majuscule','1 uppercase'),(12,'UneMinuscule','1 minuscule','1 lowercase'),(13,'UnChiffre','1 chiffre','1 number'),(14,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(15,'MinimumCaractere','8 caractères','8 character'),(16,'Confirmation','Confirmation','Confirmation'),(17,'Reset','Réinitialisation','Reset'),(18,'Envoyer','Envoyer','Send');
/*!40000 ALTER TABLE `afpa_textes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `afpa_utilisateurs`
--

DROP TABLE IF EXISTS `afpa_utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afpa_utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `role` int(11) NOT NULL COMMENT '2 Admin 1 User',
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `adresseMail` (`adresseMail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afpa_utilisateurs`
--

LOCK TABLES `afpa_utilisateurs` WRITE;
/*!40000 ALTER TABLE `afpa_utilisateurs` DISABLE KEYS */;
INSERT INTO `afpa_utilisateurs` VALUES (1,'toto','toto','toto@toto.to','f6c9447c4405e03dc8f53a2aa9e4cead',2);
/*!40000 ALTER TABLE `afpa_utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-08 17:26:05
