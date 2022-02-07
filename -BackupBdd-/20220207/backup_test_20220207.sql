-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: test
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
-- Current Database: `test`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test`;

--
-- Table structure for table `chaise`
--

DROP TABLE IF EXISTS `chaise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chaise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date1` date DEFAULT NULL,
  `date2` date NOT NULL,
  `time1` time DEFAULT NULL,
  `time2` time NOT NULL,
  `inte` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chaise`
--

LOCK TABLES `chaise` WRITE;
/*!40000 ALTER TABLE `chaise` DISABLE KEYS */;
INSERT INTO `chaise` VALUES (1,'2102-01-12','2022-01-11','18:27:18','20:27:18',NULL),(2,NULL,'2001-12-21',NULL,'03:02:01',NULL),(3,'2022-01-05','2022-01-12','08:46:00','08:46:00',NULL),(4,NULL,'2022-01-19',NULL,'08:46:36',NULL);
/*!40000 ALTER TABLE `chaise` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `textes`
--

LOCK TABLES `textes` WRITE;
/*!40000 ALTER TABLE `textes` DISABLE KEYS */;
INSERT INTO `textes` VALUES (1,'Bonjour','Bonjour','Hello'),(2,'Connexion','Connexion','Log in'),(3,'Deconnexion','Deconnexion','Log out'),(4,'Accueil','Accueil','Home'),(5,'AdresseEmail','Adresse email','Email address'),(6,'Mdp','Mot de passe','Password'),(7,'Inscription','Inscription','Registration'),(8,'Nom','Nom','Surname'),(9,'Prenom','Prenom','Name'),(10,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(11,'UneMajuscule','1 majuscule','1 uppercase'),(12,'UneMinuscule','1 minuscule','1 lowercase'),(13,'UnChiffre','1 chiffre','1 number'),(14,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(15,'MinimumCaractere','8 caractères','8 character'),(16,'Confirmation','Confirmation','Confirmation'),(17,'Reset','Réinitialisation','Reset'),(18,'Envoyer','Envoyer','Send'),(19,'Bonjour','Bonjour','Hello'),(20,'Connexion','Connexion','Log in'),(21,'Deconnexion','Deconnexion','Log out'),(22,'Accueil','Accueil','Home'),(23,'AdresseEmail','Adresse email','Email address'),(24,'Mdp','Mot de passe','Password'),(25,'Inscription','Inscription','Registration'),(26,'Nom','Nom','Surname'),(27,'Prenom','Prenom','Name'),(28,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(29,'UneMajuscule','1 majuscule','1 uppercase'),(30,'UneMinuscule','1 minuscule','1 lowercase'),(31,'UnChiffre','1 chiffre','1 number'),(32,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(33,'MinimumCaractere','8 caractères','8 character'),(34,'Confirmation','Confirmation','Confirmation'),(35,'Reset','Réinitialisation','Reset'),(36,'Envoyer','Envoyer','Send'),(37,'Bonjour','Bonjour','Hello'),(38,'Connexion','Connexion','Log in'),(39,'Deconnexion','Deconnexion','Log out'),(40,'Accueil','Accueil','Home'),(41,'AdresseEmail','Adresse email','Email address'),(42,'Mdp','Mot de passe','Password'),(43,'Inscription','Inscription','Registration'),(44,'Nom','Nom','Surname'),(45,'Prenom','Prenom','Name'),(46,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(47,'UneMajuscule','1 majuscule','1 uppercase'),(48,'UneMinuscule','1 minuscule','1 lowercase'),(49,'UnChiffre','1 chiffre','1 number'),(50,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(51,'MinimumCaractere','8 caractères','8 character'),(52,'Confirmation','Confirmation','Confirmation'),(53,'Reset','Réinitialisation','Reset'),(54,'Envoyer','Envoyer','Send'),(55,'Bonjour','Bonjour','Hello'),(56,'Connexion','Connexion','Log in'),(57,'Deconnexion','Deconnexion','Log out'),(58,'Accueil','Accueil','Home'),(59,'AdresseEmail','Adresse email','Email address'),(60,'Mdp','Mot de passe','Password'),(61,'Inscription','Inscription','Registration'),(62,'Nom','Nom','Surname'),(63,'Prenom','Prenom','Name'),(64,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(65,'UneMajuscule','1 majuscule','1 uppercase'),(66,'UneMinuscule','1 minuscule','1 lowercase'),(67,'UnChiffre','1 chiffre','1 number'),(68,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(69,'MinimumCaractere','8 caractères','8 character'),(70,'Confirmation','Confirmation','Confirmation'),(71,'Reset','Réinitialisation','Reset'),(72,'Envoyer','Envoyer','Send'),(73,'Bonjour','Bonjour','Hello'),(74,'Connexion','Connexion','Log in'),(75,'Deconnexion','Deconnexion','Log out'),(76,'Accueil','Accueil','Home'),(77,'AdresseEmail','Adresse email','Email address'),(78,'Mdp','Mot de passe','Password'),(79,'Inscription','Inscription','Registration'),(80,'Nom','Nom','Surname'),(81,'Prenom','Prenom','Name'),(82,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(83,'UneMajuscule','1 majuscule','1 uppercase'),(84,'UneMinuscule','1 minuscule','1 lowercase'),(85,'UnChiffre','1 chiffre','1 number'),(86,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(87,'MinimumCaractere','8 caractères','8 character'),(88,'Confirmation','Confirmation','Confirmation'),(89,'Reset','Réinitialisation','Reset'),(90,'Envoyer','Envoyer','Send'),(91,'Bonjour','Bonjour','Hello'),(92,'Connexion','Connexion','Log in'),(93,'Deconnexion','Deconnexion','Log out'),(94,'Accueil','Accueil','Home'),(95,'AdresseEmail','Adresse email','Email address'),(96,'Mdp','Mot de passe','Password'),(97,'Inscription','Inscription','Registration'),(98,'Nom','Nom','Surname'),(99,'Prenom','Prenom','Name'),(100,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(101,'UneMajuscule','1 majuscule','1 uppercase'),(102,'UneMinuscule','1 minuscule','1 lowercase'),(103,'UnChiffre','1 chiffre','1 number'),(104,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(105,'MinimumCaractere','8 caractères','8 character'),(106,'Confirmation','Confirmation','Confirmation'),(107,'Reset','Réinitialisation','Reset'),(108,'Envoyer','Envoyer','Send'),(109,'Bonjour','Bonjour','Hello'),(110,'Connexion','Connexion','Log in'),(111,'Deconnexion','Deconnexion','Log out'),(112,'Accueil','Accueil','Home'),(113,'AdresseEmail','Adresse email','Email address'),(114,'Mdp','Mot de passe','Password'),(115,'Inscription','Inscription','Registration'),(116,'Nom','Nom','Surname'),(117,'Prenom','Prenom','Name'),(118,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(119,'UneMajuscule','1 majuscule','1 uppercase'),(120,'UneMinuscule','1 minuscule','1 lowercase'),(121,'UnChiffre','1 chiffre','1 number'),(122,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(123,'MinimumCaractere','8 caractères','8 character'),(124,'Confirmation','Confirmation','Confirmation'),(125,'Reset','Réinitialisation','Reset'),(126,'Envoyer','Envoyer','Send'),(127,'Bonjour','Bonjour','Hello'),(128,'Connexion','Connexion','Log in'),(129,'Deconnexion','Deconnexion','Log out'),(130,'Accueil','Accueil','Home'),(131,'AdresseEmail','Adresse email','Email address'),(132,'Mdp','Mot de passe','Password'),(133,'Inscription','Inscription','Registration'),(134,'Nom','Nom','Surname'),(135,'Prenom','Prenom','Name'),(136,'InfoMdpLegend','Veuillez saisir au moins','Please enter at least'),(137,'UneMajuscule','1 majuscule','1 uppercase'),(138,'UneMinuscule','1 minuscule','1 lowercase'),(139,'UnChiffre','1 chiffre','1 number'),(140,'UnCaractereSpecial','1 caractère spécial ( ! @ & # * ^ $ % +)','1 special character ( ! @ & # * ^ $ % +)'),(141,'MinimumCaractere','8 caractères','8 character'),(142,'Confirmation','Confirmation','Confirmation'),(143,'Reset','Réinitialisation','Reset'),(144,'Envoyer','Envoyer','Send');
/*!40000 ALTER TABLE `textes` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
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

-- Dump completed on 2022-02-07 12:26:06
