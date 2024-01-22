-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: taburetes
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Taburete de mármol con acomodaciones',10.00,'El modelo más cómodo en cuanto a pasar mucho tiempo sentado en él.','https://www.miliboo.es/taburetes-de-cocina-nordicos-con-giro-360%25C2%25B0-de-madera-clara-67-cm-gao-53585-63189f30125ca_1200_675_.jpg'),(2,'Taburete Zhang giratorio',20.00,'Útil en todo tipo de mesas que tengas, su buena movilidad salta a la vista.','https://cdn.manomano.com/images/images_products/31141926/P/100834389_1.jpg'),(3,'Taburete minimalista de mármol',120.00,'Un taburete diseñado para camuflarse en tu casa minimalista, convirtiéndose en parte de ella.','https://www.sillasymesasdemadera.es/5352-large_default/taburete-nordico-einar.jpg'),(4,'Taburete plano',320.00,'Nuestro taburete más simple, pero más demandado.','https://storage.googleapis.com/catalog-pictures-carrefour-es/catalog/pictures/hd_510x_/8435677821252_1.jpg'),(5,'Taburete Zhang infantil',520.00,'Los niños también tienen derecho a sentarse cómodamente cuando juegan a ras del suelo.','https://media.adeo.com/marketplace/LMES/85188942/3157991.jpeg?width=650&height=650&format=jpg&quality=80&fit=bounds');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_taburetes`
--

DROP TABLE IF EXISTS `usuarios_taburetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_taburetes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_taburetes`
--

LOCK TABLES `usuarios_taburetes` WRITE;
/*!40000 ALTER TABLE `usuarios_taburetes` DISABLE KEYS */;
INSERT INTO `usuarios_taburetes` VALUES (9,'eloy','paro');
/*!40000 ALTER TABLE `usuarios_taburetes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-22 18:59:58
