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
INSERT INTO `books` VALUES (1,'Granica','Nałkowska Zofia',0,1),(2,'Pan Tadeusz','Mickiewicz Adam',0,1),(3,'Krzyżacy','Sienkiewicz Henryk',0,1),(4,'Lalka','Prus Bolesław',2,1),(5,'Nad Niemnem','Orzeszkowa Eliza',2,1),(6,'Balladyna','Słowacki Juliusz',2,-1),(7,'Nie-Boska komedia','Krasiński Zygmunt',2,-1),(8,'Chłopi','Reymont Władysław',2,2),(9,'Dżuma','Camus Albert',2,-1),(10,'Wesele','Wyspiański Stanisław',0,1);
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

-- Dump completed on 2018-04-28 15:08:54
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
INSERT INTO `books` VALUES (1,'Granica','Nałkowska Zofia',2,-1),(2,'Pan Tadeusz','Mickiewicz Adam',2,-1),(3,'Krzyżacy','Sienkiewicz Henryk',2,-1),(4,'Lalka','Prus Bolesław',1,3),(5,'Nad Niemnem','Orzeszkowa Eliza',2,-1),(6,'Balladyna','Słowacki Juliusz',2,-1),(7,'Nie-Boska komedia','Krasiński Zygmunt',1,3),(8,'Chłopi','Reymont Władysław',1,3),(9,'Dżuma','Camus Albert',2,-1),(10,'Wesele','Wyspiański Stanisław',2,-1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'krymeer','$2y$10$wbX/GOlbBjYPEyqCLmKMlOK2dDok8gLRvCszn.s7vo2vjqciEm576','\0'),(2,'libmaster','$2y$10$r37Bk75fLLkQ8dy1qA.tyOa1g2Hw77fGHUA76J29I6bUjbMHabFd2',''),(3,'johndoe','$2y$10$fyVTfhYQVtbEVidyK9Broej.0x053X5rZIsL7rv9SySFA6wLWkMyG','\0');
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

-- Dump completed on 2018-04-28 17:06:43
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
INSERT INTO `books` VALUES (1,'Granica','Nałkowska Zofia',2,-1),(2,'Pan Tadeusz','Mickiewicz Adam',2,-1),(3,'Krzyżacy','Sienkiewicz Henryk',2,-1),(4,'Lalka','Prus Bolesław',1,3),(5,'Nad Niemnem','Orzeszkowa Eliza',2,-1),(6,'Balladyna','Słowacki Juliusz',2,-1),(7,'Nie-Boska komedia','Krasiński Zygmunt',1,3),(8,'Chłopi','Reymont Władysław',1,3),(9,'Dżuma','Camus Albert',2,-1),(10,'Wesele','Wyspiański Stanisław',2,-1);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `news_author` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `news_slug` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `news_text` text COLLATE utf8_polish_ci NOT NULL,
  `news_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`news_id`),
  KEY `slug` (`news_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Lipsum','libmaster','lipsum','Lorem ipsum dolor sit amet, consecteur adipiscing elit.','2018-04-28 08:51:11'),(2,'New morning message','libmaster','new-morning-message','Hello world from Wrocław. My name is Krzysztof.','2018-04-28 08:51:11'),(3,'New morning message','libmaster','new-morning-message','Hello world from Wrocław. My name is Krzysztof.','2018-04-28 08:51:11'),(4,'To będzie dłuższa wiadomość','libmaster','longer-message','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam viverra odio eget tortor ornare condimentum vel vulputate leo. Nullam rhoncus sit amet nisi sed blandit. Donec vel metus metus. Mauris dictum scelerisque felis at sodales. In nec vehicula neque. Vestibulum id diam vel nibh accumsan volutpat. Etiam sed facilisis turpis, eget convallis neque. Suspendisse potenti. Pellentesque vel turpis ornare, sagittis tortor a, finibus nisl. Pellentesque sed erat sed dui sagittis interdum. Phasellus sagittis tellus et aliquam eleifend. In tincidunt mauris a aliquam tristique. Aenean velit tortor, malesuada nec dapibus sed, posuere sed nunc. Proin commodo nec lectus eget sodales. Morbi accumsan vel nisi ut commodo. Ut ullamcorper, ligula in volutpat facilisis, eros turpis porta orci, in euismod felis velit eu ante.\r\nInteger aliquet leo dolor, a volutpat sem cursus eu. Integer facilisis facilisis sollicitudin. In at egestas lacus, id consequat odio. Pellentesque semper blandit justo, nec venenatis magna efficitur id. Etiam porttitor mattis tortor, non dignissim purus lacinia vitae. Sed ut mauris velit. Praesent pellentesque hendrerit nisi. Nulla semper, purus vel maximus faucibus, risus libero blandit justo, nec convallis purus odio a nibh. Donec sit amet lacus et tortor fringilla tincidunt. Nulla in finibus augue, et semper turpis. Integer hendrerit arcu in imperdiet congue. Donec vitae neque ac magna finibus commodo sed sit amet risus. Donec auctor rutrum lacus, ut feugiat magna ornare eu. Maecenas quis gravida tellus. Ut vel tortor imperdiet, molestie nibh sit amet, ultrices lectus. Mauris varius arcu nisl, id auctor massa laoreet rhoncus.\r\nMauris sed nisl et orci efficitur interdum. Vestibulum dignissim consectetur nisl sed dictum. Sed blandit sem vel pulvinar aliquam. Duis mollis gravida erat, eget sagittis justo aliquam sed. Etiam commodo magna et porttitor posuere. Ut id facilisis augue, at faucibus turpis. Curabitur ultricies lorem ac nisl ullamcorper, in accumsan ante porta. Proin in tincidunt massa, a viverra neque. Suspendisse quis quam nunc. Sed fermentum porttitor pharetra. Nullam vel enim turpis.\r\nCras sagittis nibh non lectus auctor fermentum. Mauris finibus felis scelerisque bibendum tristique. Suspendisse tempus massa quam, vel rhoncus neque mollis sed. Aenean blandit eros eu efficitur vehicula. Mauris ultrices suscipit pellentesque. Ut id dictum justo, ac pharetra enim. Suspendisse quis semper tellus. Ut congue egestas purus sed dictum. In orci enim, ultricies vitae nunc vitae, aliquet pellentesque odio. Nunc mattis justo dolor, non sodales dolor sagittis et.\r\nFusce non rhoncus erat, sed varius turpis. Sed at finibus orci. Sed nunc arcu, sollicitudin in neque nec, accumsan malesuada velit. Nullam ac enim vel sapien vulputate dignissim sed eu est. Phasellus pulvinar, sapien ut dapibus ultricies, arcu lectus mollis justo, nec laoreet dui ligula ut enim. Morbi aliquet interdum purus scelerisque iaculis. Sed at ex lacinia, interdum tortor ac, vestibulum ligula. Sed luctus quis orci eu interdum','2018-04-28 09:19:23'),(12,'Lipsum','libmaster','lipsum','Lorem ipsum dolor sit amet','2018-04-29 13:11:37'),(14,'Hello world again!','libmaster','alerthello-world','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut urna sem. Vivamus neque sem, mattis nec tellus a, feugiat tincidunt lacus. Proin vel tellus et risus laoreet eleifend. Donec eget purus a magna viverra vehicula. Morbi elementum justo vel est convallis, quis vehicula mi luctus. Praesent vulputate risus urna, et molestie lacus feugiat eu. Sed lorem est, cursus eget purus at, dapibus commodo justo. Aenean facilisis consectetur tortor ac varius. Vivamus mollis enim a tortor pellentesque pulvinar. Proin mollis sodales nunc, dictum pharetra erat pharetra vel.\r\n\r\nAenean porta nunc placerat justo dapibus laoreet. Suspendisse feugiat augue sit amet ipsum bibendum, vel malesuada nisi ornare. Sed fringilla ligula ut elit pulvinar fringilla. Integer viverra ex vel iaculis commodo. Cras posuere maximus erat et auctor. Vestibulum semper erat in velit pharetra consequat. Etiam hendrerit ante id libero gravida pharetra. Maecenas sed risus scelerisque, pellentesque orci sed, mattis mauris. Curabitur nec pulvinar ligula. Mauris non eros tincidunt, tincidunt ante in, aliquam nisi. Suspendisse accumsan mollis ante et efficitur.\r\n\r\nMauris rhoncus porttitor urna, sed finibus odio egestas nec. Donec eget odio semper, porttitor lacus id, fermentum nunc. Cras sem massa, efficitur nec tellus non, imperdiet cursus mi. Integer porta commodo lorem. Vestibulum ac volutpat lorem. Sed facilisis, sapien et imperdiet aliquet, diam felis sodales metus, malesuada euismod lacus purus sed magna. Cras eu lacus fermentum, cursus ligula at, condimentum nisi. Nullam vitae nibh in metus mollis bibendum. Pellentesque et accumsan dolor, in rhoncus nibh. Donec ac sapien sed orci accumsan euismod. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris imperdiet, sapien a tincidunt maximus, sapien nunc elementum purus, ac elementum metus erat tempor mi. Phasellus rutrum metus a mauris rutrum malesuada. Phasellus convallis egestas ornare. Suspendisse tristique neque at urna tempor mollis. In quis consectetur sapien.\r\n\r\nDonec semper tortor vitae rhoncus ullamcorper. Cras efficitur pharetra est vel auctor. Etiam consectetur interdum arcu, laoreet hendrerit dui scelerisque eu. Nullam suscipit congue volutpat. Duis pretium orci in nisl ultricies, et posuere neque cursus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi scelerisque purus in lacus semper venenatis. Integer ipsum tellus, interdum nec nisi eu, suscipit condimentum purus. Fusce sagittis, dui sit amet interdum pulvinar, arcu quam congue lacus, sit amet convallis turpis magna in purus. Cras pretium nisi ut purus aliquet imperdiet. Curabitur eu tellus vulputate, venenatis nibh a, vestibulum libero. Aliquam a ullamcorper nisi. Duis viverra auctor dolor in efficitur.','2018-04-29 13:54:49'),(15,'&lt;b&gt;To jest kolejny test&lt;/b&gt;','libmaster','bto-jest-kolejny-testb','&lt;div style=&quot;color: red&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut urna sem. Vivamus neque sem, mattis nec tellus a, feugiat tincidunt lacus. Proin vel tellus et risus laoreet eleifend. Donec eget purus a magna viverra vehicula. Morbi elementum justo vel est convallis, quis vehicula mi luctus. Praesent vulputate risus urna, et molestie lacus feugiat eu. Sed lorem est, cursus eget purus at, dapibus commodo justo. Aenean facilisis consectetur tortor ac varius. Vivamus mollis enim a tortor pellentesque pulvinar. Proin mollis sodales nunc, dictum pharetra erat pharetra vel.\r\n\r\nAenean porta nunc placerat justo dapibus laoreet. Suspendisse feugiat augue sit amet ipsum bibendum, vel malesuada nisi ornare. Sed fringilla ligula ut elit pulvinar fringilla. Integer viverra ex vel iaculis commodo. Cras posuere maximus erat et auctor. Vestibulum semper erat in velit pharetra consequat. Etiam hendrerit ante id libero gravida pharetra. Maecenas sed risus scelerisque, pellentesque orci sed, mattis mauris. Curabitur nec pulvinar ligula. Mauris non eros tincidunt, tincidunt ante in, aliquam nisi. Suspendisse accumsan mollis ante et efficitur.\r\n\r\nMauris rhoncus porttitor urna, sed finibus odio egestas nec. Donec eget odio semper, porttitor lacus id, fermentum nunc. Cras sem massa, efficitur nec tellus non, imperdiet cursus mi. Integer porta commodo lorem. Vestibulum ac volutpat lorem. Sed facilisis, sapien et imperdiet aliquet, diam felis sodales metus, malesuada euismod lacus purus sed magna. Cras eu lacus fermentum, cursus ligula at, condimentum nisi. Nullam vitae nibh in metus mollis bibendum. Pellentesque et accumsan dolor, in rhoncus nibh. Donec ac sapien sed orci accumsan euismod. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris imperdiet, sapien a tincidunt maximus, sapien nunc elementum purus, ac elementum metus erat tempor mi. Phasellus rutrum metus a mauris rutrum malesuada. Phasellus convallis egestas ornare. Suspendisse tristique neque at urna tempor mollis. In quis consectetur sapien.\r\n\r\nDonec semper tortor vitae rhoncus ullamcorper. Cras efficitur pharetra est vel auctor. Etiam consectetur interdum arcu, laoreet hendrerit dui scelerisque eu. Nullam suscipit congue volutpat. Duis pretium orci in nisl ultricies, et posuere neque cursus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi scelerisque purus in lacus semper venenatis. Integer ipsum tellus, interdum nec nisi eu, suscipit condimentum purus. Fusce sagittis, dui sit amet interdum pulvinar, arcu quam congue lacus, sit amet convallis turpis magna in purus. Cras pretium nisi ut purus aliquet imperdiet. Curabitur eu tellus vulputate, venenatis nibh a, vestibulum libero. Aliquam a ullamcorper nisi. Duis viverra auctor dolor in efficitur.&lt;/div&gt;','2018-04-29 14:03:09'),(18,'Lorem ipsum LIPSUM','libmaster','lorem-ipsum-lipsum','Lorem ipsum dolor sit amet, consecteur adipiscing elit.','2018-04-29 14:22:04'),(20,'Lorem ipsum DOLOR sit amet','libmaster','lorem-ipsum-dolor-sit-amet','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id tortor sed ipsum laoreet laoreet eget vitae turpis. Maecenas euismod felis vel augue tincidunt, quis dapibus diam eleifend. Nunc pretium imperdiet nisl. In venenatis, arcu ut porttitor finibus, tellus tortor mollis ligula, vel gravida augue ipsum et nisl. Etiam volutpat erat a quam efficitur laoreet. Ut interdum, lorem et ultrices suscipit, nulla sem varius mauris, a dictum erat mi et mi. Curabitur commodo dui purus, ac congue velit scelerisque eu. Pellentesque in massa nunc. Maecenas quis ex vitae libero vestibulum accumsan. Nam mattis in mi ac elementum. Phasellus vulputate ante sapien, sit amet vulputate nulla viverra at. Nullam quam mauris, suscipit ornare fermentum eget, finibus et orci. Nullam nulla orci, eleifend vestibulum gravida non, varius vitae mi. Phasellus rhoncus consectetur diam sed facilisis. Fusce condimentum lectus est, sit amet volutpat tortor ornare sed.<br />\r\n<br />\r\nMauris sollicitudin elit tristique dui dignissim iaculis. Mauris eu tincidunt sem. Praesent eu diam felis. Donec pellentesque rutrum tortor, quis varius nunc varius vitae. Aenean in auctor ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent imperdiet sed nunc egestas commodo. Nulla dictum scelerisque ante quis finibus. Vivamus at velit sed odio luctus vulputate.<br />\r\n<br />\r\nPellentesque sollicitudin, metus vel scelerisque lacinia, sapien augue malesuada sapien, et suscipit leo nisi ut leo. Phasellus laoreet lobortis nulla, a condimentum augue consectetur ut. Maecenas id lorem vel orci vulputate elementum ut id justo. In feugiat ultrices molestie. Sed porttitor mi quis justo finibus lacinia. Suspendisse vel suscipit lectus, quis porta quam. Curabitur at magna congue, finibus erat at, cursus mauris. Maecenas lacinia eget nibh non consequat. Sed dignissim non ipsum suscipit tristique. Donec elit arcu, rhoncus vestibulum efficitur eget, luctus eget odio. Phasellus commodo erat eget lectus tristique, sed placerat odio condimentum. Vestibulum dignissim pulvinar consectetur. Duis nec vehicula ex. Cras mauris neque, vestibulum sit amet commodo in, rhoncus sollicitudin elit. Curabitur eget mi sed metus lobortis dictum nec vel arcu.<br />\r\n<br />\r\nPellentesque finibus eget arcu ut sollicitudin. Ut erat ligula, molestie ac tempus in, lacinia ut ligula. Phasellus feugiat elementum odio at ullamcorper. Aenean pellentesque fringilla ex vitae dictum. Duis scelerisque sollicitudin arcu, dictum elementum justo varius sed. Praesent vitae varius leo. Vestibulum in volutpat metus, id pellentesque nunc. Curabitur euismod dictum leo. Sed dictum nisl massa, id ultricies nisl sagittis eget. Cras elementum neque aliquet vehicula rutrum. Phasellus eget metus nibh. Donec tincidunt magna sed sagittis rhoncus. Suspendisse aliquet maximus auctor. Etiam ante lacus, rhoncus eget lorem ut, aliquam mattis mauris. Mauris mattis massa lectus, vitae interdum felis accumsan placerat.<br />\r\n<br />\r\nVestibulum a aliquam magna. Pellentesque egestas nisi in arcu aliquet facilisis. Nam in faucibus enim, ac placerat lacus. Suspendisse volutpat consequat quam, id sodales orci congue in. Nulla pharetra tincidunt ultricies. Morbi scelerisque purus eget diam tempus tempus. Mauris quis imperdiet felis. Etiam sodales tempus pulvinar. Sed eget eros tempor, mollis ante eget, fringilla quam. Donec sed dui ut quam feugiat eleifend. Aliquam erat volutpat. Quisque vel luctus purus, eget ornare nibh. Sed pharetra urna turpis, sit amet aliquam ex tempus id. Duis in augue ut justo dictum pellentesque. Sed a aliquam mauris, a luctus odio. Fusce nibh ante, mollis non neque accumsan, fringilla lacinia nisi.<br />\r\n<br />\r\nAliquam id lacus et augue porta volutpat. Sed metus risus, pretium ac laoreet vehicula, placerat vitae odio. Sed vehicula metus tincidunt, auctor orci viverra, placerat elit. Curabitur a mi ex. Donec nisi leo, posuere nec malesuada vel, lacinia in lectus. Pellentesque dictum vestibulum tellus quis condimentum. Quisque at neque in risus vestibulum laoreet. Vestibulum dignissim consequat velit eget elementum. Maecenas interdum euismod dui, nec elementum lectus ultricies sit amet. Integer tincidunt elit tortor, at consequat lacus convallis ac. Sed in pellentesque massa, a vehicula est. Pellentesque sed massa nunc. Aenean libero enim, bibendum nec consequat in, dapibus in est. Aliquam vel lacus lectus. Suspendisse potenti. Curabitur dictum, turpis quis accumsan iaculis, nulla velit rutrum massa, non mattis enim mauris vitae sapien.<br />\r\n<br />\r\nPellentesque sodales risus sit amet molestie ullamcorper. Nullam pharetra purus eget lorem aliquam condimentum. Aenean commodo urna vitae tempor mattis. Praesent a libero ac mauris feugiat dapibus. Integer eu felis placerat, pretium mauris a, egestas mi. Mauris sed nulla ipsum. Nullam maximus bibendum sapien, eu auctor massa condimentum id. Proin tempus turpis eget ornare cursus. Pellentesque dapibus maximus lacus, in auctor lacus scelerisque ut.','2018-04-29 15:21:11'),(21,'Ala ma kota ha ha ha','libmaster','ala-ma-kota-ha-ha-ha-21','Bla bla blaa','2018-04-29 15:50:37'),(22,'New morning message','libmaster','new-morning-message-22','Hello there. My first name is Krzysztof, my middle name is Radosław and my last name is Osada. I come from Wrocław, Poland. I used to live in Kluczbork but moved to Wrocław a few years ago.','2018-04-29 15:54:10'),(23,'News, news everywhere','libmaster','news-news-everywhere-23','Klasa News zdaje się wreszcie dobrze działać.<br />\r\n<br />\r\n***<br />\r\nA na dworze jest 27&deg;C.','2018-04-29 16:22:28');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'krymeer','$2y$10$wbX/GOlbBjYPEyqCLmKMlOK2dDok8gLRvCszn.s7vo2vjqciEm576','\0'),(2,'libmaster','$2y$10$r37Bk75fLLkQ8dy1qA.tyOa1g2Hw77fGHUA76J29I6bUjbMHabFd2',''),(3,'johndoe','$2y$10$fyVTfhYQVtbEVidyK9Broej.0x053X5rZIsL7rv9SySFA6wLWkMyG','\0');
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

-- Dump completed on 2018-05-01 12:46:47
