# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.41)
# Database: academyPortal
# Generation Time: 2018-11-26 15:33:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table companySizeLink
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companySizeLink`;

CREATE TABLE `companySizeLink` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `companySizeLink` WRITE;
/*!40000 ALTER TABLE `companySizeLink` DISABLE KEYS */;

INSERT INTO `companySizeLink` (`id`, `size`)
VALUES
	(1,'<5'),
	(2,'5-30'),
	(3,'31-60'),
	(4,'61-100'),
	(5,'101-250'),
	(6,'>250');

/*!40000 ALTER TABLE `companySizeLink` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hiringPartners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hiringPartners`;

CREATE TABLE `hiringPartners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) NOT NULL DEFAULT '',
  `size` int(11) unsigned NOT NULL,
  `techStack` text NOT NULL,
  `postcode` varchar(8) NOT NULL DEFAULT '',
  `phoneNo` varchar(20) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hiringPartnerSize` (`size`),
  CONSTRAINT `hiringPartnerSize` FOREIGN KEY (`size`) REFERENCES `companySizeLink` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `deleted`)
VALUES
	(1,'test@test.com','$2y$12$jW0bVIRrUy.rx0QD7mGNWOlfJz1Sd0cZUhc0FfamtiPx1OT9ntPlC',0),
	(30,'emailme@mikeoram.co.u','$2y$10$Z2llevqjbJlt1RBeqM3O6.ogkyxcFRweP/DamUB3DqCthUwd2gVai',0),
	(31,'test@test.co','$2y$10$NqivPwnltwcvF/0m4An60uscASy9Q7rhASxHjmLoo1XtHl4T4WDFa',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
