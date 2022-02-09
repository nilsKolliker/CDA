-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: cantinemartine
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
-- Current Database: `cantinemartine`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cantinemartine` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cantinemartine`;

--
-- Table structure for table `categoriesplats`
--

DROP TABLE IF EXISTS `categoriesplats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriesplats` (
  `IdCategoriePlat` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleCategoriePlat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCategoriePlat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriesplats`
--

LOCK TABLES `categoriesplats` WRITE;
/*!40000 ALTER TABLE `categoriesplats` DISABLE KEYS */;
INSERT INTO `categoriesplats` VALUES (1,'Entree'),(2,'Plat'),(3,'Dessert');
/*!40000 ALTER TABLE `categoriesplats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriesproduits`
--

DROP TABLE IF EXISTS `categoriesproduits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriesproduits` (
  `IdCategorieProduit` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleCategorieProduit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCategorieProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriesproduits`
--

LOCK TABLES `categoriesproduits` WRITE;
/*!40000 ALTER TABLE `categoriesproduits` DISABLE KEYS */;
INSERT INTO `categoriesproduits` VALUES (1,'Legume'),(2,'Fruit'),(3,'Viande'),(4,'Céréale'),(5,'Epice'),(6,'Sauce'),(7,'Poisson'),(8,'Féculent ');
/*!40000 ALTER TABLE `categoriesproduits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenumenu`
--

DROP TABLE IF EXISTS `contenumenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenumenu` (
  `IdContenuMenu` int(11) NOT NULL AUTO_INCREMENT,
  `IdMenu` int(11) DEFAULT NULL,
  `IdPlat` int(11) DEFAULT NULL,
  `DateJour` date DEFAULT NULL,
  PRIMARY KEY (`IdContenuMenu`),
  KEY `FK_ContenuMenu_Menus` (`IdMenu`),
  KEY `FK_ContenuMenu_Plats` (`IdPlat`),
  CONSTRAINT `FK_ContenuMenu_Menus` FOREIGN KEY (`IdMenu`) REFERENCES `menus` (`IdMenu`),
  CONSTRAINT `FK_ContenuMenu_Plats` FOREIGN KEY (`IdPlat`) REFERENCES `plats` (`IdPlat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenumenu`
--

LOCK TABLES `contenumenu` WRITE;
/*!40000 ALTER TABLE `contenumenu` DISABLE KEYS */;
INSERT INTO `contenumenu` VALUES (1,1,13,'2021-12-08'),(2,1,2,'2021-12-08'),(3,1,9,'2021-12-08'),(4,2,12,'2021-12-09'),(5,2,3,'2021-12-09'),(6,2,8,'2021-12-09'),(7,3,14,'2021-12-10'),(8,3,5,'2021-12-09'),(9,3,10,'2021-12-09');
/*!40000 ALTER TABLE `contenumenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenuplat`
--

DROP TABLE IF EXISTS `contenuplat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenuplat` (
  `IdContenuPlat` int(11) NOT NULL AUTO_INCREMENT,
  `IdProduit` int(11) DEFAULT NULL,
  `IdPlat` int(11) DEFAULT NULL,
  `Quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdContenuPlat`),
  KEY `FK_ContenuPlat_Produits` (`IdProduit`),
  KEY `FK_ContenuPlat_Plats` (`IdPlat`),
  CONSTRAINT `FK_ContenuPlat_Plats` FOREIGN KEY (`IdPlat`) REFERENCES `plats` (`IdPlat`),
  CONSTRAINT `FK_ContenuPlat_Produits` FOREIGN KEY (`IdProduit`) REFERENCES `produits` (`IdProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenuplat`
--

LOCK TABLES `contenuplat` WRITE;
/*!40000 ALTER TABLE `contenuplat` DISABLE KEYS */;
INSERT INTO `contenuplat` VALUES (1,20,5,1),(2,10,5,4),(3,7,10,2),(4,19,12,3);
/*!40000 ALTER TABLE `contenuplat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `IdMenu` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroSemaine` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plats`
--

DROP TABLE IF EXISTS `plats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plats` (
  `IdPlat` int(11) NOT NULL AUTO_INCREMENT,
  `LibellePlat` varchar(50) DEFAULT NULL,
  `IdCategoriePlat` int(11) NOT NULL,
  PRIMARY KEY (`IdPlat`),
  KEY `FK_Plats_CategoriePlat` (`IdCategoriePlat`),
  CONSTRAINT `FK_Plats_CategoriePlat` FOREIGN KEY (`IdCategoriePlat`) REFERENCES `categoriesplats` (`IdCategoriePlat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plats`
--

LOCK TABLES `plats` WRITE;
/*!40000 ALTER TABLE `plats` DISABLE KEYS */;
INSERT INTO `plats` VALUES (1,'Spaghetti bolognaise',2),(2,'Poulet au maroilles',2),(3,'Purée jambon ',2),(4,'Cassoulet',2),(5,'Frites steak haché ',2),(6,'Fondant aux chocolats',3),(7,'Tarte aux pommes',3),(8,'Profiterole ',3),(9,'Tiramisu',3),(10,'Glace pomme croissant ',3),(11,'Salade',1),(12,'Assiette de charcuterie ',1),(13,'Caviar de russie',1),(14,'Fois gras au croissant',1),(15,'Oeuf mimosa',1);
/*!40000 ALTER TABLE `plats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits` (
  `IdProduit` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleProduit` varchar(50) DEFAULT NULL,
  `QuantiteProduit` int(11) DEFAULT NULL,
  `IdCategorieProduit` int(11) NOT NULL,
  PRIMARY KEY (`IdProduit`),
  KEY `FK_Produits_CategorieProduits` (`IdCategorieProduit`),
  CONSTRAINT `FK_Produits_CategorieProduits` FOREIGN KEY (`IdCategorieProduit`) REFERENCES `categoriesproduits` (`IdCategorieProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` VALUES (1,'Blé',10,4),(2,'Riz',20,4),(3,'Mais',30,4),(4,'Poivre',100,5),(5,'Sel',100,5),(6,'Safran',50,5),(7,'Pomme',15,2),(8,'Poire',52,2),(9,'Abricot',12,2),(10,'Pomme de terre ',50,1),(11,'Petit poids ',30,1),(12,'Topinambour',3,1),(13,'Carpe',5,7),(14,'Saumon',3,7),(15,'Truite',45,7),(16,'Poivre',10,6),(17,'Echalotte',6,6),(18,'Béchamel',2,6),(19,'Porc',10,3),(20,'Boeuf',5,3),(21,'Cheval',15,3);
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-09 17:26:05
