CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cinema`
--

DROP TABLE IF EXISTS `cinema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cinema` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cinema_name_uindex` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinema`
--

LOCK TABLES `cinema` WRITE;
/*!40000 ALTER TABLE `cinema` DISABLE KEYS */;
INSERT INTO `cinema` VALUES (1,'Dublin','ODEAN Blanchardstown'),(2,'Dublin','ODEAN Coolock'),(3,'Dublin','ODEAN Stillorgan'),(4,'Dublin','ODEAN Charlestown'),(5,'Dublin','ODEAN Point Square'),(6,'Dublin','Cineworld Dublin'),(7,'Dublin','Vue Liffey Valley'),(8,'Dublin','Lighthouse Cinema'),(9,'Dublin','Movies at Dundrum'),(10,'Dublin','Movies at Swords');
/*!40000 ALTER TABLE `cinema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `movie` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `genre` varchar(45) NOT NULL,
  `classification` varchar(45) NOT NULL,
  `rating` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `movie_title_uindex` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (1,'Alien','Sci-Fi','18',4),(2,'Alien2','Sci-Fi','18',5),(3,'Jaws','Thriller','15',4),(4,'Jaws2','Thriller','15',4),(5,'Shrek','Animation','PG',4),(6,'Shrek2','Animation','PG',4),(7,'Toy Story','Animation','PG',5),(8,'Heat','Thriller','18',5),(9,'Once Upon a time in the West','Western','15',5),(10,'Saw','Horror','18',3);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `review` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `helpfulness` int(2) NOT NULL,
  `reviewTitle` varchar(25) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `userId` int(6) NOT NULL,
  `movieId` int(6) NOT NULL,
  `ratingCount` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_review_user1_idx` (`userId`),
  KEY `fk_review_movie1_idx` (`movieId`),
  CONSTRAINT `fk_review_movie1` FOREIGN KEY (`movieId`) REFERENCES `movie` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_review_user1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (14,2,'title','Amusing',15,7,4),(17,0,'Another Horror','Same old crap',15,10,23),(19,5,'Hot','One of the all time greats',17,8,1);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `showtime`
--

DROP TABLE IF EXISTS `showtime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `showtime` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `cinemaId` int(6) NOT NULL,
  `movieId` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_showtime_cinema1_idx` (`cinemaId`),
  KEY `fk_showtime_movie1_idx` (`movieId`),
  CONSTRAINT `fk_showtime_cinema1` FOREIGN KEY (`cinemaId`) REFERENCES `cinema` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_showtime_movie1` FOREIGN KEY (`movieId`) REFERENCES `movie` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `showtime`
--

LOCK TABLES `showtime` WRITE;
/*!40000 ALTER TABLE `showtime` DISABLE KEYS */;
INSERT INTO `showtime` VALUES (1,'2019-03-25','13:10:11',1,1),(2,'2019-03-25','14:10:11',2,2),(3,'2019-03-25','15:10:11',3,3),(4,'2019-03-25','16:10:11',4,4),(5,'2019-03-25','17:10:11',5,5),(6,'2019-03-25','18:10:11',6,6),(7,'2019-03-25','19:10:11',7,7),(8,'2019-03-25','20:10:11',8,8),(9,'2019-03-25','21:10:11',9,9),(10,'2019-03-25','22:10:11',10,10),(13,'2019-04-28','20:30:00',7,7);
/*!40000 ALTER TABLE `showtime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username_uindex` (`username`),
  UNIQUE KEY `user_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (15,'admin','$2y$10$B/m5RZZuWaFW74zd/7530erPT2oTR1ntB9rKXh1zD9aa1fXnbU6Oy','member','admin@email.com'),(17,'Bob','$2y$10$.7CkjAGn2Y0t1EuIDlw3/OUUaK957KB1CzIPV94ngGXq1/l..CfXa','member','bob@email.com'),(18,'Bobby','$2y$10$YDCV7zaqiYKyx0/WPGODHu8KhMo0KlP/Fojwy0jTLe3eDEH9XZtp.','member','bobby@email.com'),(19,'Rob','$2y$10$89Lm/T2wDNVV2YY00nCe6.kOy4JjA0Cc0Xn8TIGUcZVroZTnV.wmi','member','rob@email.com'),(20,'Robby','$2y$10$Zl6fYI/IhmJWRVMpSD/NiuQhXj6guMbKEXQMREOuxvf2n//TJuwKy','member','robby@email.com'),(21,'Blob','$2y$10$b7Zsd8aUJq8I1N4MryiF5uOFVC2m/sE/nyU0qvOjm1EKSvaAvTvZ2','member','blobby@email.com'),(22,'Ted','$2y$10$pwJO9pAH1gnyLjkhTm3nXeysZIFUWZnkohBOXkrInLfaRmP35nnk6','member','ted@email.com'),(23,'teddy','$2y$10$w/emcQ5Z6/gNzqxKIIG7sOMZEp3MFipcTwiCT1olCOJStaYfjqrJu','member','teddy@email.com'),(29,'test2','$2y$10$Bgoye7cg8VpUdAQzHRxkEe0xbG0ZWufcYCcOMUyDQPu3tvNO3qhpq','member','test2@email.com'),(30,'testUser','$2y$10$UIaD58HYXOak41uKvoBi8eToeIbcfaKrz77aBTGZkpxJHR5H234lu','member','testUser@email.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-20 23:35:22
