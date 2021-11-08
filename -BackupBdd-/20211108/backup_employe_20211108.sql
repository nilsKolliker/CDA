-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: employe
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
-- Current Database: `employe`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `employe` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `employe`;

--
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departements` (
  `nodep` int(11) NOT NULL,
  `nomdep` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nodep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departements`
--

LOCK TABLES `departements` WRITE;
/*!40000 ALTER TABLE `departements` DISABLE KEYS */;
INSERT INTO `departements` VALUES (10,'Formation','Aix'),(20,'Ingénierie','Paris'),(30,'Industrie','Bordeaux'),(40,'Direction générale','Paris');
/*!40000 ALTER TABLE `departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employes`
--

DROP TABLE IF EXISTS `employes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employes` (
  `noemp` int(11) NOT NULL,
  `nomemp` varchar(50) DEFAULT NULL,
  `fonction` varchar(50) DEFAULT NULL,
  `noresp` int(11) DEFAULT NULL,
  `datemb` date DEFAULT NULL,
  `sala` float DEFAULT NULL,
  `comm` float DEFAULT NULL,
  `nodep` int(11) DEFAULT NULL,
  PRIMARY KEY (`noemp`),
  KEY `FK_employes_departements` (`nodep`),
  CONSTRAINT `FK_employes_departements` FOREIGN KEY (`nodep`) REFERENCES `departements` (`nodep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employes`
--

LOCK TABLES `employes` WRITE;
/*!40000 ALTER TABLE `employes` DISABLE KEYS */;
INSERT INTO `employes` VALUES (1,'Costanza','psychologue',8,'1995-01-10',1715,200,30),(2,'Mioche','Directeur',6,'1990-05-25',2200,1000,20),(3,'Durand','Responsable',2,'1996-06-28',3250,0,10),(4,'Xiong','vendeur',5,'1995-02-24',1150,200,30),(5,'Manoukian','vendeur',11,'1993-10-25',2530,500,30),(6,'Bourdais','directeur',15,'2002-09-21',3550,850,40),(7,'Moreno','ouvrier',3,'1999-07-15',1075,50,10),(8,'Perou','directeur',2,'1995-09-14',2450,800,10),(9,'Bibaut','chef de service',8,'1993-08-17',2200,NULL,20),(10,'Manian','assistant',9,'1996-12-28',1000,250,10),(11,'Colin','analyste',2,'1992-09-14',2702,625,30),(12,'Coulon','ouvrier',8,'2002-11-28',858,125,20),(13,'Roméo','assistant',8,'2001-10-26',1025,1150,10),(14,'Solal','secrétaire',3,'1992-04-26',1225,NULL,20),(15,'Bailly','Président',NULL,'1985-03-17',4275,2000,40),(16,'Jazarin','Ouvrier',2,'2001-09-14',875,NULL,10),(17,'Font','Ouvrier',2,'1990-10-14',1200,250,10),(18,'Servel','ouvrier',3,'1999-02-11',1025,55,30);
/*!40000 ALTER TABLE `employes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
/*!50001 DROP VIEW IF EXISTS `entreprises`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `entreprises` AS SELECT 
 1 AS `noemp`,
 1 AS `nomemp`,
 1 AS `fonction`,
 1 AS `noresp`,
 1 AS `datemb`,
 1 AS `sala`,
 1 AS `comm`,
 1 AS `nodep`,
 1 AS `nomdep`,
 1 AS `ville`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `nograde` int(11) NOT NULL,
  `salmin` float DEFAULT NULL,
  `salmax` float DEFAULT NULL,
  PRIMARY KEY (`nograde`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,0,1000),(2,1000.01,2000),(3,2000.01,3000),(4,3000.01,4000),(5,4000.01,5000),(6,5000.01,6000);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histofonctions`
--

DROP TABLE IF EXISTS `histofonctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `histofonctions` (
  `noemp` int(11) DEFAULT NULL,
  `date_nom` date DEFAULT NULL,
  `fonction` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histofonctions`
--

LOCK TABLES `histofonctions` WRITE;
/*!40000 ALTER TABLE `histofonctions` DISABLE KEYS */;
INSERT INTO `histofonctions` VALUES (1,'1994-10-19','vendeur'),(1,'1996-12-18','psychologue'),(2,'1990-03-15','responsable'),(2,'1994-10-18','directeur'),(3,'1996-04-18','vendeur'),(3,'1998-06-18','responsable'),(4,'1994-12-15','vendeur'),(5,'1993-08-15','vendeur'),(6,'2002-07-12','directeur'),(7,'1999-05-05','ouvrier'),(8,'1995-07-05','vendeur'),(8,'1997-04-15','responsable'),(8,'1999-10-18','directeur'),(10,'1996-10-18','assistant'),(11,'1992-07-05','vendeur'),(11,'1995-07-15','responsable'),(11,'1999-05-19','analyste'),(12,'2002-09-18','ouvrier'),(13,'2001-08-16','ouvrier'),(13,'2003-07-17','assistant'),(14,'1992-01-02','secrétaire'),(15,'1985-01-05','directeur'),(15,'1995-10-05','président'),(16,'2001-07-05','ouvrier'),(17,'1990-08-04','ouvrier'),(18,'1998-12-02','ouvrier');
/*!40000 ALTER TABLE `histofonctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `employe`
--

USE `employe`;

--
-- Final view structure for view `entreprises`
--

/*!50001 DROP VIEW IF EXISTS `entreprises`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `entreprises` AS select `employes`.`noemp` AS `noemp`,`employes`.`nomemp` AS `nomemp`,`employes`.`fonction` AS `fonction`,`employes`.`noresp` AS `noresp`,`employes`.`datemb` AS `datemb`,`employes`.`sala` AS `sala`,`employes`.`comm` AS `comm`,`employes`.`nodep` AS `nodep`,`departements`.`nomdep` AS `nomdep`,`departements`.`ville` AS `ville` from (`employes` join `departements` on((`employes`.`nodep` = `departements`.`nodep`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-08 12:26:02
