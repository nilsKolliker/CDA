-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: ecf_php
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
-- Current Database: `ecf_php`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ecf_php` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ecf_php`;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `IdArticle` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleArticle` varchar(20) DEFAULT NULL,
  `DescriptionArticle` varchar(200) DEFAULT NULL,
  `PrixArticle` double DEFAULT NULL,
  `Photos` varchar(100) DEFAULT NULL,
  `IdTypeArticle` int(11) NOT NULL,
  PRIMARY KEY (`IdArticle`),
  KEY `IdTypeArticle` (`IdTypeArticle`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`IdTypeArticle`) REFERENCES `typesarticles` (`IdTypeArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'gomme','gomme',3,'jpg_61f26b02c735c.jpg',2),(2,'eau','bouteille eau 1l',2,'jpg_61f01bbb44d73.jpg',1),(3,'coca','Coca 50cl',2,'jpg_61f01bc85f949.jpg',1),(4,'papier','rame de papier imprimante',2,'jpg_61f01bb34ef8b.jpg',2);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lignespaniers`
--

DROP TABLE IF EXISTS `lignespaniers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lignespaniers` (
  `IdLignePanier` int(11) NOT NULL AUTO_INCREMENT,
  `IdArticle` int(11) DEFAULT NULL,
  `IdPanier` int(11) DEFAULT NULL,
  `Quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdLignePanier`),
  KEY `IdArticle` (`IdArticle`),
  KEY `IdPanier` (`IdPanier`),
  CONSTRAINT `lignespaniers_ibfk_1` FOREIGN KEY (`IdArticle`) REFERENCES `articles` (`IdArticle`),
  CONSTRAINT `lignespaniers_ibfk_2` FOREIGN KEY (`IdPanier`) REFERENCES `paniers` (`IdPanier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lignespaniers`
--

LOCK TABLES `lignespaniers` WRITE;
/*!40000 ALTER TABLE `lignespaniers` DISABLE KEYS */;
INSERT INTO `lignespaniers` VALUES (1,2,1,1),(3,3,1,1);
/*!40000 ALTER TABLE `lignespaniers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paniers`
--

DROP TABLE IF EXISTS `paniers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paniers` (
  `IdPanier` int(11) NOT NULL AUTO_INCREMENT,
  `IdClient` int(11) DEFAULT NULL,
  `DatePanier` date DEFAULT NULL,
  `AdresseLivraison` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdPanier`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paniers`
--

LOCK TABLES `paniers` WRITE;
/*!40000 ALTER TABLE `paniers` DISABLE KEYS */;
INSERT INTO `paniers` VALUES (1,5,'2022-01-31','ici');
/*!40000 ALTER TABLE `paniers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `textes`
--

DROP TABLE IF EXISTS `textes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `textes` (
  `idTexte` int(11) NOT NULL AUTO_INCREMENT,
  `codeTexte` varchar(50) NOT NULL,
  `fr` longtext NOT NULL,
  `en` longtext NOT NULL,
  PRIMARY KEY (`idTexte`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `textes`
--

LOCK TABLES `textes` WRITE;
/*!40000 ALTER TABLE `textes` DISABLE KEYS */;
INSERT INTO `textes` VALUES (1,'Bonjour','Bonjour','Hello'),(2,'Connexion','Connexion','Log in'),(3,'Deconnexion','Deconnexion','Log out'),(4,'Accueil','Accueil','Home'),(5,'AdresseEmail','Adresse email','Email address'),(6,'Mdp','Mot de passe','Password'),(7,'Inscription','Inscription','Registration'),(8,'Nom','Nom','Surname'),(9,'Prenom','Prenom','Name'),(10,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(11,'UneMajuscule','1 majuscule','1 uppercase'),(12,'UneMinuscule','1 minuscule','1 lowercase'),(13,'UnChiffre','1 chiffre','1 number'),(14,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(15,'MinimumCaractere','8 caractères','8 character'),(16,'Confirmation','Confirmation','Confirmation'),(17,'Reset','Réinitialisation','Reset'),(18,'Envoyer','Envoyer','Send');
/*!40000 ALTER TABLE `textes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typesarticles`
--

DROP TABLE IF EXISTS `typesarticles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typesarticles` (
  `IdTypeArticle` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleTypeArticle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdTypeArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typesarticles`
--

LOCK TABLES `typesarticles` WRITE;
/*!40000 ALTER TABLE `typesarticles` DISABLE KEYS */;
INSERT INTO `typesarticles` VALUES (1,'Alimentaire'),(2,'Bureautique'),(3,'aaaaa');
/*!40000 ALTER TABLE `typesarticles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `role` int(11) NOT NULL COMMENT '2 Admin 1 User',
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `adresseMail` (`adresseMail`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'admin','admin','admin1@gmail.com','c91e2fb9a6b5c4544966351789a17129',2),(2,'client1','client1','client1@gmail.com','7ae62dab0a99e070fb2af11a0387339a',1),(3,'client2','Client2','client2@gmail.com','d7cb3e747bd9684419b92bade7c34759',1),(4,'toto','toto','toto@toto.com','f6c9447c4405e03dc8f53a2aa9e4cead',2),(5,'tata','tata','tata@tata.com','f6c9447c4405e03dc8f53a2aa9e4cead',1),(6,'titi','titi','titi@titi.com','d3ebbcf972c7990ccc57a62435842d59',1);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-02 12:26:06
