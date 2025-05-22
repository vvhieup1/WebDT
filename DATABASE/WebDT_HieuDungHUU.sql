-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: webdt
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id_UNIQUE` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Iphone','1'),(2,'SamSung','2'),(3,'Huawei','3');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_lists`
--

DROP TABLE IF EXISTS `item_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item_lists` (
  `item_list_id` int NOT NULL AUTO_INCREMENT,
  `amount` varchar(45) NOT NULL,
  `orders_order_id` int NOT NULL,
  `items_item_id` int NOT NULL,
  PRIMARY KEY (`item_list_id`,`items_item_id`),
  UNIQUE KEY `item_list_id_UNIQUE` (`item_list_id`),
  KEY `fk_item_lists_orders_idx` (`orders_order_id`),
  KEY `fk_item_lists_items1_idx` (`items_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_lists`
--

LOCK TABLES `item_lists` WRITE;
/*!40000 ALTER TABLE `item_lists` DISABLE KEYS */;
INSERT INTO `item_lists` VALUES (8,'2',14,17),(9,'1',14,18),(10,'1',15,18),(11,'1',15,17),(12,'1',15,22),(13,'1',16,20),(14,'1',16,21),(15,'1',17,20),(16,'1',17,21),(17,'1',18,20),(18,'1',18,21),(19,'2',19,17),(20,'1',20,17);
/*!40000 ALTER TABLE `item_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` int NOT NULL,
  `available` char(1) NOT NULL,
  `category_category_id` int NOT NULL,
  `picture` varchar(300) DEFAULT NULL,
  `users_user_id` int NOT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_id_UNIQUE` (`item_id`),
  KEY `item_category_fk` (`category_category_id`),
  KEY `fk_items_users1_idx` (`users_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (17,'iphone 16 512g','chip xử lý (cpu):apple a18 6 nhân',29990000,'Y',1,'App/anh/anhip1.png',3),(18,'iphone 16 plus 512g','chip xử lý (cpu):apple a18 6 nhân',27790000,'Y',1,'App/anh/anhip2.png',3),(19,'iphone 16 pro 512g','chip xử lý (cpu):apple a18 6 nhân',31590000,'N',1,'App/anh/anhip3.png',3),(20,'huawei mate 70 ro plus ','hệ điều hành:harmonyos 4.3',29759000,'Y',3,'App/anh/anhH1.jpg',3),(21,' samsung galaxy z fold6 5g','chip đồ họa (gpu):adreno 750',39490000,'Y',2,'App/anh/anhSS1.jpg',3),(22,' samsung galaxy a16 ','chip đồ họa (gpu):mali-G57',5690000,'Y',2,'App/anh/anhSS2.jpg',3),(26,'iphone16','ưer',12,'Y',1,'App/anh/anhip1.png',1),(27,'ip','dfdaf',545435345,'Y',1,'App/anh/67754568e7d71_anhip1.png',1),(28,'ip213','a',45000000,'Y',1,'App/anh/67754568e7d71_anhip1.png',1),(29,'ip123','a',45000000,'Y',1,'App/anh/67754568e7d71_anhip1.png',1);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `date_creation` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_cost` varchar(45) DEFAULT NULL,
  `users_user_id` int NOT NULL,
  PRIMARY KEY (`order_id`,`users_user_id`),
  UNIQUE KEY `order_id_UNIQUE` (`order_id`),
  KEY `fk_orders_users1_idx` (`users_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (14,'2024-12-23','Processing','2010',4),(15,'2024-12-23','Processing','2510',9),(16,'2024-12-23','Processing','30',4),(17,'2024-12-23','Processing','30',4),(18,'2024-12-23','Processing','30',4),(19,'2025-05-15','Processing','59980000',12),(20,'2025-05-21','Processing','29990000',12);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` int NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@gmail.com','123','Admin',2,1,NULL,NULL,'2024-12-25'),(12,'12345@gmail.com','123456789','hai',1,1,'34','','2025-01-01');
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

-- Dump completed on 2025-05-22 12:04:39
