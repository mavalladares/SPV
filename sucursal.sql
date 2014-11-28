CREATE DATABASE  IF NOT EXISTS `sucursal_2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sucursal_2`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: sucursal_2
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `camioneta`
--

DROP TABLE IF EXISTS `camioneta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `camioneta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placas` varchar(12) DEFAULT NULL COMMENT '	',
  `modelo` varchar(45) DEFAULT NULL,
  `ruta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_camioneta_ruta1_idx` (`ruta_id`),
  CONSTRAINT `fk_camioneta_ruta1` FOREIGN KEY (`ruta_id`) REFERENCES `ruta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `camioneta`
--

LOCK TABLES `camioneta` WRITE;
/*!40000 ALTER TABLE `camioneta` DISABLE KEYS */;
INSERT INTO `camioneta` VALUES (1,'2431','2009',1);
/*!40000 ALTER TABLE `camioneta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Cliente33','adasd','1239');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `producto_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_compra_producto1_idx` (`producto_id`),
  CONSTRAINT `fk_compra_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (7,123,7,'2014-11-19 03:08:00'),(8,10,7,'2014-11-19 03:08:21'),(9,4,7,'2014-11-19 03:31:05');
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cpx`
--

DROP TABLE IF EXISTS `cpx`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cpx` (
  `id` int(11) NOT NULL,
  `pago` int(11) DEFAULT NULL,
  `venta_credito_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cpx_venta_credito1_idx` (`venta_credito_id`),
  CONSTRAINT `fk_cpx_venta_credito1` FOREIGN KEY (`venta_credito_id`) REFERENCES `venta_credito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cpx`
--

LOCK TABLES `cpx` WRITE;
/*!40000 ALTER TABLE `cpx` DISABLE KEYS */;
/*!40000 ALTER TABLE `cpx` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'pepe','juan','2131');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entregas`
--

DROP TABLE IF EXISTS `entregas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entregas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado_id` int(11) NOT NULL,
  `camioneta_id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entregas_empleado1_idx` (`empleado_id`),
  KEY `fk_entregas_camioneta1_idx` (`camioneta_id`),
  KEY `fk_entregas_venta1_idx` (`venta_id`),
  CONSTRAINT `fk_entregas_camioneta1` FOREIGN KEY (`camioneta_id`) REFERENCES `camioneta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entregas_empleado1` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entregas_venta1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entregas`
--

LOCK TABLES `entregas` WRITE;
/*!40000 ALTER TABLE `entregas` DISABLE KEYS */;
INSERT INTO `entregas` VALUES (1,1,1,7);
/*!40000 ALTER TABLE `entregas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','administradores');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio_pza_provedor` float DEFAULT NULL,
  `precio_pza_venta` float DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `descripcion` longtext,
  `existencia` int(11) DEFAULT NULL,
  `sucursal_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `utilidad` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_sucursal1_idx` (`sucursal_id`),
  KEY `fk_producto_proveedor1_idx` (`proveedor_id`),
  CONSTRAINT `fk_producto_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_sucursal1` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (7,'asd',20,30,'fasdad','asdasd',20,3,1,NULL),(108,'Acondicionador',25.3,29.6,NULL,NULL,NULL,3,1,0.17),(109,'Ajax',13.3,14.76,NULL,NULL,NULL,3,1,0.11),(110,'Ajonjoli',20,22.8,NULL,NULL,NULL,3,1,0.14),(111,'Almendras',72.6,84.22,NULL,NULL,NULL,3,1,0.16),(112,'Alimento para perros',37.3,45.88,NULL,NULL,NULL,3,1,0.23),(113,'Alpiste',37.3,47.37,NULL,NULL,NULL,3,1,0.27),(114,'Anis',60,72.6,NULL,NULL,NULL,3,1,0.21),(115,'Arroz',10,12.8,NULL,NULL,NULL,3,1,0.28),(116,'Cacahuates japoneces',5.4,6.21,NULL,NULL,NULL,3,1,0.15),(117,'Cacao en grano',45,50.4,NULL,NULL,NULL,3,1,0.12),(118,'Cachuates',52,58.24,NULL,NULL,NULL,3,1,0.12),(119,'Canela',27.7,31.02,NULL,NULL,NULL,3,1,0.12),(120,'Chanclas',33.4,38.41,NULL,NULL,NULL,3,1,0.15),(121,'Chetos',4.7,5.17,NULL,NULL,NULL,3,1,0.1),(122,'Chicharron',13.3,14.9,NULL,NULL,NULL,3,1,0.12),(123,'Chile ancho',30,37.8,NULL,NULL,NULL,3,1,0.26),(124,'Chile de ?bol',33.3,40.96,NULL,NULL,NULL,3,1,0.23),(125,'Chile guajillo',40,51.6,NULL,NULL,NULL,3,1,0.29),(126,'Chile mulato',35,41.65,NULL,NULL,NULL,3,1,0.19),(127,'Chile piqu?',73.3,90.16,NULL,NULL,NULL,3,1,0.23),(128,'Chile seco',36.7,42.21,NULL,NULL,NULL,3,1,0.15),(129,'Chiles en vinagre',38,47.12,NULL,NULL,NULL,3,1,0.24),(130,'Chorizo',73.3,93.09,NULL,NULL,NULL,3,1,0.27),(131,'Churrumais ',4.7,5.22,NULL,NULL,NULL,3,1,0.11),(132,'Cigarros Alas',25.3,31.37,NULL,NULL,NULL,3,1,0.24),(133,'Cigarros Malboro',30,36,NULL,NULL,NULL,3,1,0.2),(134,'Clavo',32,39.36,NULL,NULL,NULL,3,1,0.23),(135,'Coca cola 250ml',6.7,7.64,NULL,NULL,NULL,3,1,0.14),(136,'Coca cola 2L',16,17.92,NULL,NULL,NULL,3,1,0.12),(137,'Coca cola 3L',20,23.8,NULL,NULL,NULL,3,1,0.19),(138,'Codito',4,4.4,NULL,NULL,NULL,3,1,0.1),(139,'Comino',33.3,39.63,NULL,NULL,NULL,3,1,0.19),(140,'Consome de camaron',26.8,32.43,NULL,NULL,NULL,3,1,0.21),(141,'Contenedores',20,23.8,NULL,NULL,NULL,3,1,0.19),(142,'Crujitos',4.8,5.66,NULL,NULL,NULL,3,1,0.18),(143,'Cubiertos',9.2,11.41,NULL,NULL,NULL,3,1,0.24),(144,'Cucharas ',9.2,11.96,NULL,NULL,NULL,3,1,0.3),(145,'Desodorante',22.5,28.35,NULL,NULL,NULL,3,1,0.26),(146,'Doritos',6.5,7.61,NULL,NULL,NULL,3,1,0.17),(147,'Escoba',20,23.8,NULL,NULL,NULL,3,1,0.19),(148,'Espaguetti',8,9.92,NULL,NULL,NULL,3,1,0.24),(149,'Fibra de metal',7.7,9.93,NULL,NULL,NULL,3,1,0.29),(150,'Fibra normal',6.7,7.64,NULL,NULL,NULL,3,1,0.14),(151,'Fideos',4,4.96,NULL,NULL,NULL,3,1,0.24),(152,'Fresca 250ml',6,7.2,NULL,NULL,NULL,3,1,0.2),(153,'Frijol',12.8,15.87,NULL,NULL,NULL,3,1,0.24),(154,'Fritos',4.8,6.24,NULL,NULL,NULL,3,1,0.3),(155,'Fruta seca',25.3,30.87,NULL,NULL,NULL,3,1,0.22),(156,'Gansito',6,6.96,NULL,NULL,NULL,3,1,0.16),(157,'Gel',8.2,9.35,NULL,NULL,NULL,3,1,0.14),(158,'Gomitas',32.3,36.5,NULL,NULL,NULL,3,1,0.13),(159,'Huevo',1.6,1.79,NULL,NULL,NULL,3,1,0.12),(160,'Jabon',10,12,NULL,NULL,NULL,3,1,0.2),(161,'Jamaica',45,52.65,NULL,NULL,NULL,3,1,0.17),(162,'Jamon',44.8,54.66,NULL,NULL,NULL,3,1,0.22),(163,'Leche ',10.2,12.75,NULL,NULL,NULL,3,1,0.25),(164,'Leche en polvo',13.3,15.96,NULL,NULL,NULL,3,1,0.2),(165,'Linaza',25.3,30.36,NULL,NULL,NULL,3,1,0.2),(166,'Longaniza',66.7,78.71,NULL,NULL,NULL,3,1,0.18),(167,'Macarrones',6.6,8.32,NULL,NULL,NULL,3,1,0.26),(168,'Ma?',19.4,21.73,NULL,NULL,NULL,3,1,0.12),(169,'Mantequilla',9.4,11.94,NULL,NULL,NULL,3,1,0.27),(170,'Mayonesa',16.8,20.33,NULL,NULL,NULL,3,1,0.21),(171,'Moles',54,65.34,NULL,NULL,NULL,3,1,0.21),(172,'Monito',4,4.72,NULL,NULL,NULL,3,1,0.18),(173,'Nueces',80,92,NULL,NULL,NULL,3,1,0.15),(174,'Paketaxo',6.6,7.52,NULL,NULL,NULL,3,1,0.14),(175,'Pan integral',16,18.88,NULL,NULL,NULL,3,1,0.18),(176,'Papel higienico',5.3,5.99,NULL,NULL,NULL,3,1,0.13),(177,'Pasas',60,73.8,NULL,NULL,NULL,3,1,0.23),(178,'Pasitas',65.2,76.94,NULL,NULL,NULL,3,1,0.18),(179,'Pepitas',40,44.8,NULL,NULL,NULL,3,1,0.12),(180,'Pimienta',30,37.2,NULL,NULL,NULL,3,1,0.24),(181,'Pinol',12.2,14.64,NULL,NULL,NULL,3,1,0.2),(182,'Pinatas',46.6,52.19,NULL,NULL,NULL,3,1,0.12),(183,'Pinones',153.1,191.38,NULL,NULL,NULL,3,1,0.25),(184,'Pistaches',66,81.84,NULL,NULL,NULL,3,1,0.24),(185,'Plato pastel',10.6,12.61,NULL,NULL,NULL,3,1,0.19),(186,'Plato plano',13.3,16.49,NULL,NULL,NULL,3,1,0.24),(187,'Plato pozolero',12.6,14.36,NULL,NULL,NULL,3,1,0.14),(188,'Polvo de nopal',22,26.84,NULL,NULL,NULL,3,1,0.22),(189,'Pop Corn',4.7,5.64,NULL,NULL,NULL,3,1,0.2),(190,'Queso fresco',37.4,42.64,NULL,NULL,NULL,3,1,0.14),(191,'Rancheritos',4.7,5.17,NULL,NULL,NULL,3,1,0.1),(192,'Recogedor',16.8,18.82,NULL,NULL,NULL,3,1,0.12),(193,'Ruffles',6.7,7.37,NULL,NULL,NULL,3,1,0.1),(194,'Runners',5,6.05,NULL,NULL,NULL,3,1,0.21),(195,'S. De girasol',40,49.2,NULL,NULL,NULL,3,1,0.23),(196,'Sabritas naturales 45gr',6.7,7.44,NULL,NULL,NULL,3,1,0.11),(197,'Sabritones',8,8.8,NULL,NULL,NULL,3,1,0.1),(198,'Salchicha',40,46.8,NULL,NULL,NULL,3,1,0.17),(199,'Shampoo',22.6,28.7,NULL,NULL,NULL,3,1,0.27),(200,'Taquis',5,6.45,NULL,NULL,NULL,3,1,0.29),(201,'Tenedores',9.3,11.72,NULL,NULL,NULL,3,1,0.26),(202,'Trapeador',21.3,27.05,NULL,NULL,NULL,3,1,0.27),(203,'Veladoras',5.3,5.83,NULL,NULL,NULL,3,1,0.1),(204,'Velas',3.3,3.73,NULL,NULL,NULL,3,1,0.13),(205,'Vinagre',4.7,5.92,NULL,NULL,NULL,3,1,0.26),(206,'Yogurt',22.9,26.56,NULL,NULL,NULL,3,1,0.16);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'provedor','eee','3424','correo@correo.com'),(2,'oasdaskd','asdand','12312','correo@correo.com');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_ruta` varchar(45) DEFAULT NULL,
  `direccion` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` VALUES (1,'123','este');
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (3,'asdasd','123','afasdaf');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com',NULL,NULL,NULL,NULL,1268889823,1417109124,1,'Usuario','Administrador','Halcon 1','000'),(15,'127.0.0.1','alejandro maldonado','$2y$08$eomrWWssGciW77r7QNeoT.3pmAwJFUHgjf9E2wkTVuTpjLvMNjzmW',NULL,'usuario@usuario.com',NULL,NULL,NULL,NULL,1410126812,1416366792,1,'Alejandro','Maldonado',NULL,'00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (2,1,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `users_id` int(11) unsigned DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `ventacol` enum('venta','pedido') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venta_users1_idx` (`users_id`),
  KEY `fk_venta_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_venta_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (7,'2014-11-19 03:24:02',1,1,'pedido'),(8,'2014-11-19 03:29:16',1,1,'pedido'),(9,'2014-11-19 03:31:54',15,1,'pedido'),(10,'2014-11-19 03:36:26',15,1,'pedido'),(11,'2014-11-19 03:36:41',15,1,'pedido'),(12,'2014-11-19 04:05:12',15,1,'venta');
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_credito`
--

DROP TABLE IF EXISTS `venta_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venta_credito_venta1_idx` (`venta_id`),
  KEY `fk_venta_credito_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_venta_credito_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_credito_venta1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_credito`
--

LOCK TABLES `venta_credito` WRITE;
/*!40000 ALTER TABLE `venta_credito` DISABLE KEYS */;
INSERT INTO `venta_credito` VALUES (1,8,1);
/*!40000 ALTER TABLE `venta_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_productos`
--

DROP TABLE IF EXISTS `venta_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venta_productos_venta1_idx` (`venta_id`),
  KEY `fk_venta_productos_producto1_idx` (`producto_id`),
  CONSTRAINT `fk_venta_productos_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_venta_productos_venta1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_productos`
--

LOCK TABLES `venta_productos` WRITE;
/*!40000 ALTER TABLE `venta_productos` DISABLE KEYS */;
INSERT INTO `venta_productos` VALUES (9,8,7,1),(10,9,7,10),(11,10,7,8),(12,11,7,13),(13,12,7,10);
/*!40000 ALTER TABLE `venta_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sucursal_2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-27 23:38:00
