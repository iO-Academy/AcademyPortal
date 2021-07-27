# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.34)
# Database: academyPortal
# Generation Time: 2021-07-27 13:13:24 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table applicants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicants`;

CREATE TABLE `applicants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `cohortId` int(11) DEFAULT NULL,
  `whyDev` text,
  `codeExperience` text,
  `hearAboutId` int(11) DEFAULT NULL,
  `eligible` enum('1','0') DEFAULT NULL,
  `eighteenPlus` enum('1','0') DEFAULT NULL,
  `finance` enum('1','0') DEFAULT NULL,
  `notes` text,
  `stageId` int(11) NOT NULL DEFAULT '1',
  `stageOptionId` int(11) DEFAULT NULL,
  `dateTimeAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(4) DEFAULT '0',
  `backgroundInfoId` varchar(1) DEFAULT NULL,
  `profile_password` varchar(68) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;

INSERT INTO `applicants` (`id`, `name`, `email`, `phoneNumber`, `cohortId`, `whyDev`, `codeExperience`, `hearAboutId`, `eligible`, `eighteenPlus`, `finance`, `notes`, `stageId`, `stageOptionId`, `dateTimeAdded`, `deleted`, `backgroundInfoId`, `profile_password`)
VALUES
	(2,'Owen Miller','weqi@mailinator.net','+532-82-1263991',2,'Amet vero minim repudiandae aut ratione voluptas perferendis sequi eu non quaerat quasi ut est nostrud nihil ad corporis ea','Ullamco quia quae excepturi possimus quibusdam elit occaecat commodi dolore facere anim quaerat',3,'1','1','1','Laborum cumque reprehenderit ut qui sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus',6,NULL,'2018-11-24 21:26:00',0,NULL,'$2y$10$KTBFzI.xO7ZlOggLjNrZ3uVRgHq7lL1HhKZpbvSLg7kHPl1MM/Mqi'),
	(3,'Nero Burgess','famaxykivo@yahoo.com','+124-85-7626938',2,'Perspiciatis fugiat possimus tempor dolores nesciunt consequatur voluptatem','Quibusdam officiis occaecat velit error sunt ratione voluptatem',5,'1','1','1','Sint voluptas ut nihil incididunt officia duis ab eius impedit consequatur Incidunt do aut doloribus proident quos dolores pariatur Sed',5,NULL,'2018-11-28 14:29:58',0,NULL,'$2y$10$Gw9DGz4RXjqeidGMWksws.h/YE7wCkobV4U.oaVvVGXCFwKn98s9u'),
	(4,'Matthew Jarvis','tucawohuw@mailinator.net','+848-54-4778506',3,'Natus quidem magnam autem corrupti laborum Anim quos quia','Dolor quia dignissimos qui excepturi eos voluptas est',6,'1','0','0','Quod harum esse quia maxime explicabo Voluptatem magna soluta voluptate optio',5,NULL,'2018-11-28 14:33:41',0,NULL,'$2y$10$5z1ST0YkcGBP464HHVtEW./qlxfdJW.RA9/UEg9L.oXw0GuOORRdu'),
	(5,'Ignacia Watkins','qewopepodi@mailinator.com','+613-35-8385501',2,'Excepturi consequatur Est culpa enim itaque ratione optio minima ullamco voluptates dolor et totam','Earum est iure sed fuga Velit',6,'0','0','0','Impedit aut duis laborum aspernatur amet aliquip tempora harum nulla aut',5,NULL,'2018-11-28 14:42:01',0,NULL,'$2y$10$Jmyr1j9oi1p53C1vjV7NMuKSWBhzcS7l8j5q0Om5EI9M8zrZ5hG3W'),
	(6,'Luke Haney','wubeqyko@mailinator.com','+942-61-9779862',3,'Nemo id qui aspernatur possimus dolor adipisicing aut est sed minim','Consequatur quia voluptate delectus impedit similique',6,'0','0','0','Non sed modi ab culpa sed quia tempore debitis dolor',6,NULL,'2018-11-28 14:52:20',0,NULL,'$2y$10$K6KsvR9nqXrBqIyeYOwTwuw/CO5mo2RviTJzpoSdWkf6WFqIEsSre'),
	(7,'Curran Patel','pudapaceje@mailinator.net','+628-48-1465496',4,'Non voluptas eligendi assumenda et itaque cupidatat ut tempor','Et aliqua Quia sit soluta enim nesciunt vitae consequatur Aut repellendus Soluta magni',2,'1','0','0','Quos fugiat qui et enim eum tempor est modi',6,NULL,'2018-11-28 22:53:05',0,NULL,'$2y$10$B5z6Ao7i6gVo9yoHv3AeLuFV5imWiqh.QTS4AkfIbL6rBWq4ABg22'),
	(8,'Katelyn Parsons','poipoi@qwerty.com','+567-54-9746748',3,'Aut est et est esse mollitia laborum','Fuga Enim omnis anim et error aut et voluptate anim blanditiis dolorem voluptatem facilis',2,'0','0','0','Similique velit qui nisi debitis aliquip lorem dolor commodi assumenda quod quod autem amet eu mollitia quod necessitatibus',5,NULL,'2018-11-28 23:10:12',0,NULL,'$2y$10$8u6RYRsl7YLY4gn/wiYwzOwjNCBQ5XLhpwiRylBGNevTb8VqPct2u'),
	(9,'Keith Owens','tovipuz@mailinator.net','+353-29-4533555',3,'Non molestias eos do aperiam quia vitae elit nihil sed autem id quia voluptate in ea ullam officiis','In quas corrupti commodo id non et tempora vitae vel ad',2,'0','1','1','Magni sed sit qui odit',6,NULL,'2018-11-28 23:10:47',0,NULL,'$2y$10$5tP7I7IwxR49darnnmwSzOvo/.W/OOW5jR.XCoOCc7Sa2PAoldBOa'),
	(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2021-07-27 10:21:37',0,NULL,''),
	(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2021-07-27 10:33:13',0,NULL,''),
	(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2021-07-27 12:51:15',0,NULL,'');

/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
