CREATE DATABASE  IF NOT EXISTS `db_sivep` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_sivep`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_sivep
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `ID_MENU` int(11) NOT NULL,
  `DESC_MENU` varchar(50) NOT NULL,
  `IMG_MENU` varchar(50) NOT NULL,
  `URL_MENU` varchar(100) NOT NULL,
  `ORD_MENU` int(11) NOT NULL,
  `ESTATUS_MENU` int(11) NOT NULL,
  PRIMARY KEY (`ID_MENU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'','Inicio','/#',1,0),(2,'Usuarios','','#UUSARIOS',2,0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisosmenu`
--

DROP TABLE IF EXISTS `permisosmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisosmenu` (
  `ID_PERMENU` int(11) NOT NULL,
  `COD_USU` varchar(20) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID_PERMENU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisosmenu`
--

LOCK TABLES `permisosmenu` WRITE;
/*!40000 ALTER TABLE `permisosmenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisosmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `COD_USU` varchar(20),
  `PASS_USU` varchar(50) ,
  `NOM_USU` varchar(50) ,
  `APP_USU` varchar(50) ,
  `APM_USU` varchar(50) ,
  `EMAIL_USU` varchar(50) ,
  `CARGO_USU` char(2) NOT NULL,
  `ESTADO_USU` char(1) ,
  PRIMARY KEY (`COD_USU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('Admin','admin','Gisela','Merino','Rivera','gise.gmr777@gmail.com','AD','A'),('Analista','analista','Rocio','Vilchez','Rojas','rocio@gmail.com','AN','A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_sivep'
--

--
-- Dumping routines for database 'db_sivep'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-09 23:15:18
