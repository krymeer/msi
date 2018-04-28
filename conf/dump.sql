-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: libsys
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `book_author` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `book_status` int(11) NOT NULL,
  `book_user_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Granica','Nałkowska Zofia',0,2),(2,'Pan Tadeusz','Mickiewicz Adam',0,2),(3,'Krzyżacy','Sienkiewicz Henryk',0,2),(4,'Lalka','Prus Bolesław',2,2),(5,'Nad Niemnem','Orzeszkowa Eliza',0,2),(6,'Balladyna','Słowacki Juliusz',2,-1),(7,'Nie-Boska komedia','Krasiński Zygmunt',2,-1),(8,'Chłopi','Reymont Władysław',1,1),(9,'Dżuma','Camus Albert',2,-1),(10,'Wesele','Wyspiański Stanisław',0,2);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `text` text COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Lipsum','libmaster','lipsum','Lorem ipsum dolor sit amet, consecteur adipiscing elit.','2018-04-28 08:51:11'),(2,'New morning message','libmaster','new-morning-message','Hello world from Wrocław. My name is Krzysztof.','2018-04-28 08:51:11'),(3,'New morning message','libmaster','new-morning-message','Hello world from Wrocław. My name is Krzysztof.','2018-04-28 08:51:11'),(4,'To będzie dłuższa wiadomość','libmaster','longer-message','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam viverra odio eget tortor ornare condimentum vel vulputate leo. Nullam rhoncus sit amet nisi sed blandit. Donec vel metus metus. Mauris dictum scelerisque felis at sodales. In nec vehicula neque. Vestibulum id diam vel nibh accumsan volutpat. Etiam sed facilisis turpis, eget convallis neque. Suspendisse potenti. Pellentesque vel turpis ornare, sagittis tortor a, finibus nisl. Pellentesque sed erat sed dui sagittis interdum. Phasellus sagittis tellus et aliquam eleifend. In tincidunt mauris a aliquam tristique. Aenean velit tortor, malesuada nec dapibus sed, posuere sed nunc. Proin commodo nec lectus eget sodales. Morbi accumsan vel nisi ut commodo. Ut ullamcorper, ligula in volutpat facilisis, eros turpis porta orci, in euismod felis velit eu ante.\r\nInteger aliquet leo dolor, a volutpat sem cursus eu. Integer facilisis facilisis sollicitudin. In at egestas lacus, id consequat odio. Pellentesque semper blandit justo, nec venenatis magna efficitur id. Etiam porttitor mattis tortor, non dignissim purus lacinia vitae. Sed ut mauris velit. Praesent pellentesque hendrerit nisi. Nulla semper, purus vel maximus faucibus, risus libero blandit justo, nec convallis purus odio a nibh. Donec sit amet lacus et tortor fringilla tincidunt. Nulla in finibus augue, et semper turpis. Integer hendrerit arcu in imperdiet congue. Donec vitae neque ac magna finibus commodo sed sit amet risus. Donec auctor rutrum lacus, ut feugiat magna ornare eu. Maecenas quis gravida tellus. Ut vel tortor imperdiet, molestie nibh sit amet, ultrices lectus. Mauris varius arcu nisl, id auctor massa laoreet rhoncus.\r\nMauris sed nisl et orci efficitur interdum. Vestibulum dignissim consectetur nisl sed dictum. Sed blandit sem vel pulvinar aliquam. Duis mollis gravida erat, eget sagittis justo aliquam sed. Etiam commodo magna et porttitor posuere. Ut id facilisis augue, at faucibus turpis. Curabitur ultricies lorem ac nisl ullamcorper, in accumsan ante porta. Proin in tincidunt massa, a viverra neque. Suspendisse quis quam nunc. Sed fermentum porttitor pharetra. Nullam vel enim turpis.\r\nCras sagittis nibh non lectus auctor fermentum. Mauris finibus felis scelerisque bibendum tristique. Suspendisse tempus massa quam, vel rhoncus neque mollis sed. Aenean blandit eros eu efficitur vehicula. Mauris ultrices suscipit pellentesque. Ut id dictum justo, ac pharetra enim. Suspendisse quis semper tellus. Ut congue egestas purus sed dictum. In orci enim, ultricies vitae nunc vitae, aliquet pellentesque odio. Nunc mattis justo dolor, non sodales dolor sagittis et.\r\nFusce non rhoncus erat, sed varius turpis. Sed at finibus orci. Sed nunc arcu, sollicitudin in neque nec, accumsan malesuada velit. Nullam ac enim vel sapien vulputate dignissim sed eu est. Phasellus pulvinar, sapien ut dapibus ultricies, arcu lectus mollis justo, nec laoreet dui ligula ut enim. Morbi aliquet interdum purus scelerisque iaculis. Sed at ex lacinia, interdum tortor ac, vestibulum ligula. Sed luctus quis orci eu interdum','2018-04-28 09:19:23');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `is_librarian` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'krymeer','$2y$10$wbX/GOlbBjYPEyqCLmKMlOK2dDok8gLRvCszn.s7vo2vjqciEm576','\0'),(2,'libmaster','$2y$10$r37Bk75fLLkQ8dy1qA.tyOa1g2Hw77fGHUA76J29I6bUjbMHabFd2','');
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

-- Dump completed on 2018-04-28 10:40:38
