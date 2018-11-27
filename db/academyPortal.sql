# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.41)
# Database: academyPortal
# Generation Time: 2018-11-27 10:56:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventName` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL DEFAULT '',
  `type` int(11) unsigned NOT NULL,
  `startTime` varchar(5) NOT NULL DEFAULT '',
  `endTime` varchar(5) NOT NULL DEFAULT '',
  `notes` text,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  CONSTRAINT `Event Rel` FOREIGN KEY (`type`) REFERENCES `eventTypes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `eventName`, `date`, `location`, `type`, `startTime`, `endTime`, `notes`)
VALUES
	(1,'Lollipop day','2018-12-25','Mayden',2,'22:00','05:00','Lollipops provided please leave on time!'),
	(2,'Ice Cream Eating Contest Hosted by Lipton Ice Tea','2019-01-01','At the bottom of the hill down from the bakery near the dog shelter on the left of the pub.',1,'18:00','20:00','The ice cream unfortunately is not free please bring all of your money as there will be a casino round the back for all you gamblers out there! '),
	(3,'Water Fight','2019-06-23','Mayden Rooftop',3,'12:00','20:00','If youre ready for the night of your life DJ abdi is coming for his evening soak of dubstep.'),
	(4,'Watching Paint Dry','2019-04-02','Mayden kitchen',4,'08:00','20:00',NULL);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table eventTypes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `eventTypes`;

CREATE TABLE `eventTypes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `eventTypes` WRITE;
/*!40000 ALTER TABLE `eventTypes` DISABLE KEYS */;

INSERT INTO `eventTypes` (`id`, `type`)
VALUES
	(1,'Hiring Partner'),
	(4,'Other'),
	(3,'Sprint Review'),
	(2,'Taster Session');

/*!40000 ALTER TABLE `eventTypes` ENABLE KEYS */;
UNLOCK TABLES;


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
