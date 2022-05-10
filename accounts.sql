-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: accounts
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `prixht` float NOT NULL,
  `tva` int(11) NOT NULL,
  `prixttc` float NOT NULL,
  `alt` text NOT NULL,
  `gender` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`) USING HASH,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (0,'','',0,0,0,'',''),(1,'Tee Shirt A Bandes RN 0500 Blanc','<strong>Coupe classique</strong><br>\r\nCe produit taille normalement<br>\r\nPrenez votre taille habituelle<br>Taille du mannequin : 1m81<br>\r\nLe modèle présenté est une taille M \r\n<br>COMPOSITION ET ENTRETIEN\r\n<br>100% Coton \r\n<br>Lavable en Machine à 40000°',35,20,42,'t-shirt-h','homme'),(2,'Short De Bain Medium Drawstring 2048 Blanc','<strong>Coupe ajustée</strong><br>\r\nCe produit taille normalement<br>\r\nPrenez votre taille habituelle<br>\r\nTaille du mannequin : 1m81<br>\r\nLe modèle présenté est une taille M<br>\r\nCOMPOSITION ET ENTRETIEN<br>\r\n100% Polyester Recyclé<br>\r\nLavable en machine à 30°',40,20,48,'short-h','homme'),(3,'Jean Super Skinny Fit Tom Original Bleu Denim','<strong>Coupe super skinny</strong><br>\r\nCe produit taille très près du corps<br>\r\nPour plus de confort, prenez une taille au dessus de votre taille habituelle<br>\r\nTaille du mannequin : 1m81<br>\r\nCOMPOSITION ET ENTRETIEN<br>\r\n70% Coton, 28% Polyester, 2% Elasthanne<br>\r\nLavable en Machine à 30°',36,20,43.2,'jean-h','homme'),(4,'Salopette Jean Femme CK1868 Noir','Coupe slim <br>\r\nCe produit taille normalement\r\nPrenez votre taille habituelle\r\nTaille du mannequin : 1m76\r\nLe modèle présenté est une taille S\r\n\r\nCOMPOSITION ET ENTRETIEN\r\n\r\n98% Coton, 2% Elasthanne\r\nLavable en Machine à 30°',35,20,43.2,'salopette-f','femme'),(7,'Débardeur Enfant 305172 Blanc','Coupe classique <br>\r\nCe produit taille normalement\r\nPrenez votre taille habituelle\r\nLe modèle présenté est une taille 7/8 ans\r\n\r\nCOMPOSITION ET ENTRETIEN\r\n\r\n100% Coton\r\nLavable en Machine à 30°',12,20,14.4,'debardeur-e','enfant'),(8,'Pantalon Jogging Enfant Abita 39569 Bleu Marine Rouge','Coupe classique <br>\r\nCe produit taille normalement\r\nPrenez votre taille habituelle\r\nLe modèle présenté est une taille 8/9 ans\r\n\r\nCOMPOSITION ET ENTRETIEN\r\n\r\n100% Polyester\r\nLavable en machine à 30°',34,20,40.8,'jogging-e','enfant'),(9,'Sweat Capuche Enfant HA4007 Noir','Coupe classique <br>\r\nCe produit taille normalement\r\nPrenez votre taille habituelle\r\nLe modèle présenté est une taille 8/9 ans\r\n\r\nCOMPOSITION ET ENTRETIEN\r\n\r\n70% Coton 30% Polyester recyclé\r\nLavable en machine à 30°',42,20,50.4,'sweat-e','enfant'),(10,'Pantalon Slim Femme Sara Noir','Coupe slim <br>\r\nCe produit taille normalement\r\nPrenez votre taille habituelle\r\nTaille du mannequin : 1m76\r\nLe modèle présenté est une taille S\r\n\r\nCOMPOSITION ET ENTRETIEN\r\n\r\n68% Viscose 28% Polyamide 4% Elasthanne\r\nLavable en machine à 30°',22,20,26.4,'pantalon-f','femme'),(11,'Jogger Pant Femme DJ2080 Blanc','Coupe slim <br>\r\nCe produit taille normalement\r\nPrenez votre taille habituelle\r\nTaille du mannequin : 1m76\r\nLe modèle présenté est une taille S\r\n\r\nCOMPOSITION ET ENTRETIEN\r\n\r\n98% Coton, 2% Elasthanne\r\nLavable en Machine à 30°',25,20,30,'jogger-f','femme');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `email` text NOT NULL,
  `password` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `bureau` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  UNIQUE KEY `email` (`email`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('adminn@admin.fr','14aae742a6cdb72efed30a7a18612063','Jean','Patrick',16,1),('','da8d5fbd71cc9629e20939e9af75659f','','',0,1),('aaa','842dcfe938a653f93af68837f9122682','ABC','Patrick',16,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-10 15:35:07
