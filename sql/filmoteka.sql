-- MySQL dump 10.10
--
-- Host: 127.0.0.1    Database: 
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.14-MariaDB

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
-- Current Database: `filmoteka`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `filmoteka` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `filmoteka`;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned auto_increment,
  `email` varchar(50),
  `password` varchar(32),
  `login` varchar(50),
  UNIQUE `id` (`id`),
  UNIQUE `login` (`login`),
  UNIQUE `email` (`email`)
) engine=MyISAM ;

--
-- Dumping data for table `users`
--


/*!40000 ALTER TABLE `users` DISABLE KEYS */;
LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'qwe@qwe.com','7eefcd70400c2ab9d4fb75ac312354ee','qwe'),(3,'asd@asd.com','a97c06483dc14e2728ce808f03f1ae92','asd'),(4,'zxc@zxc.com','8c25f101a99fc35d0a07ca12edf1392e','zxc'),(15,'sfsdfsed@dfsfsre','e85fb38e7fb7fd1549355efe7e11e1c0','fsdefasr'),(16,'dsfsdf@dfsf','e85fb38e7fb7fd1549355efe7e11e1c0','sfsdg'),(17,'rfv@rfv','347501d2b178b34c0f6ce49b3700feeb','rfv'),(18,'qe@qe','7c4ec8a03503963d7163e881e38ca14e','qe'),(14,'fsgfg@fdgdgrd','e85fb38e7fb7fd1549355efe7e11e1c0','ggsrsg'),(19,'qaz@qaz','919bd4103603345f397c44ce062b1911','qaz'),(20,'okgogle@yaebaletotvuz.ru','c4613b90c20ae9da816256555cba350c','okgogle');
UNLOCK TABLES;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Current Database: `fimes`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `fimes` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `fimes`;

--
-- Table structure for table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `id` int(10) unsigned auto_increment,
  `name` varchar(50),
  `rating` int(11),
  `rating_count` int(11),
  UNIQUE `id` (`id`)
) engine=MyISAM ;

--
-- Dumping data for table `film`
--


/*!40000 ALTER TABLE `film` DISABLE KEYS */;
LOCK TABLES `film` WRITE;
INSERT INTO `film` VALUES (1,'Матрица',14,3),(2,'Поезд в Пусан 2: Полуостров',12,3),(3,'Академия Амбрелла',0,0),(4,'Аватар',2,1),(5,'Игра в имитацию',5,1),(6,'Матрица: Революция',0,0),(7,'Грань будущего',0,0),(8,'Начало',0,0),(9,'Очень странные дела',0,0),(10,'Звёздные войны. Эпизод III: Месть ситхов',0,0),(13,'Звёздный путь: Дискавери',0,0),(12,'Телохранитель киллера',4,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

--
-- Current Database: `hit_rating`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `hit_rating` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `hit_rating`;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `id_film` int(11),
  `id_user` int(11),
  `rate` int(11)
) engine=MyISAM ;

--
-- Dumping data for table `rating`
--


/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
LOCK TABLES `rating` WRITE;
INSERT INTO `rating` VALUES (1,1,5),(1,3,4),(2,3,3),(2,1,4),(2,20,5),(5,20,5),(4,20,2),(1,20,5),(12,20,4);
UNLOCK TABLES;
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
