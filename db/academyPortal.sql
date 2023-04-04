# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.41)
# Database: academyportal
# Generation Time: 2023-04-04 15:50:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table applicants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicants`;

CREATE TABLE `applicants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
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
  `gender` varchar(10) DEFAULT NULL,
  `cohortId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;

INSERT INTO `applicants` (`id`, `name`, `email`, `phoneNumber`, `whyDev`, `codeExperience`, `hearAboutId`, `eligible`, `eighteenPlus`, `finance`, `notes`, `stageId`, `stageOptionId`, `dateTimeAdded`, `deleted`, `backgroundInfoId`, `profile_password`, `gender`, `cohortId`)
VALUES
	(11,'Melinde Rentoll','mrentoll0@salon.com','07671138755','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',1,'1','1','1','Loves stilton!',1,NULL,'2021-11-25 16:29:00',0,'1','',NULL,NULL),
	(12,'Trumaine Digger','tdigger1@utexas.edu','07938905902','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',4,'1','0','1','Loves cheddar',1,NULL,'2021-11-25 16:32:00',0,'2','',NULL,NULL),
	(13,'Morgan Graundisson','mgraundisson2@tuttocitta.it','07933387264','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',5,'1','1','0','Brie for me!',1,NULL,'2021-11-25 16:35:33',0,'3','',NULL,NULL),
	(14,'Ignazio Hairesnape','ihairesnape3@themeforest.net','07121444941','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',5,'1','1','1','Cheddar',1,NULL,'2021-11-25 16:36:35',0,'4','',NULL,NULL),
	(15,'Alexandra Chandlar','achandlar4@php.net','07127430101','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',5,'1','1','0','Brie',1,NULL,'2021-11-25 16:37:18',0,'4','',NULL,NULL),
	(16,'Algernon Inns','ainns5@gmpg.org','07240830839','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',5,'1','1','1','Red Leicester',1,NULL,'2021-11-25 16:38:12',0,'2','',NULL,NULL),
	(17,'Dareen Spriggs','dspriggs7@delicious.com','07512910944','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',4,'0','1','0','',1,NULL,'2021-11-25 16:40:05',0,'3','',NULL,NULL),
	(18,'Sorcha Staden','sstaden8@biglobe.ne.jp','07077948068','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',5,'0','0','0','',1,NULL,'2021-11-25 16:43:12',0,'3','',NULL,NULL),
	(19,'Herculie Ashwood','hashwood9@census.gov','07695095821','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',3,'1','1','1','Cheesestring',1,NULL,'2021-11-25 16:44:03',0,'2','',NULL,NULL),
	(20,'Dylan Lucchi','dlucchia@nba.com','07116680439','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',3,'1','1','0','',1,NULL,'2021-11-25 16:44:49',0,'3','',NULL,NULL),
	(21,'Nessy Weekes','nweekesb@bravesites.com','07448564580','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',3,'1','1','1','',1,NULL,'2021-11-25 16:45:29',0,'1','',NULL,NULL),
	(22,'Sibylla Forsyth','sforsythc@statcounter.com','07046179858','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',1,'1','1','0','',1,NULL,'2021-11-25 16:46:04',0,'3','',NULL,NULL),
	(23,'Arluene Moody','amoodyd@gizmodo.com','07343959417','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',1,'0','0','0','',1,NULL,'2021-11-25 16:46:38',0,'4','',NULL,NULL),
	(24,'Creighton Gebbie','cgebbiee@ucla.edu','07866296968','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',4,'0','1','0','',6,NULL,'2021-11-25 16:47:16',0,'3','$2y$10$F/he.CMeTqS4ZJqJIOluXesm84hvbYqQm8JZxKoQYxv.pniuXNQxy',NULL,NULL),
	(25,'Jacinthe Towse','jtowsef@godaddy.com','07528968799','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',2,'1','1','1','',1,NULL,'2021-11-25 16:47:57',0,'3','',NULL,NULL),
	(26,'Audra Snyder','tagywove@mailinator.com','+1 (684) 307-1038','Culpa deserunt labo','Facere modi quasi mo',2,'1','0','0','Maiores voluptatem e',1,NULL,'2022-09-28 10:04:11',0,'4','','2',NULL);

/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table applicants_additional
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicants_additional`;

CREATE TABLE `applicants_additional` (
  `id` int(11) unsigned NOT NULL,
  `apprentice` int(1) DEFAULT NULL,
  `aptitude` int(3) DEFAULT NULL,
  `assessmentDay` int(3) DEFAULT NULL,
  `customAssessmentDay` date DEFAULT NULL,
  `assessmentTime` varchar(5) DEFAULT NULL,
  `assessmentNotes` text,
  `diversitechInterest` int(1) DEFAULT NULL,
  `diversitech` int(5) DEFAULT NULL,
  `edaid` int(5) DEFAULT NULL,
  `upfront` int(5) DEFAULT NULL,
  `kitCollectionDay` date DEFAULT NULL,
  `kitCollectionTime` varchar(5) DEFAULT NULL,
  `kitNum` int(2) DEFAULT NULL,
  `laptop` int(1) DEFAULT NULL,
  `laptopDeposit` int(1) DEFAULT NULL,
  `laptopNum` int(2) DEFAULT NULL,
  `tasterId` int(11) unsigned DEFAULT NULL,
  `tasterAttendance` int(1) DEFAULT NULL,
  `team` int(1) DEFAULT NULL,
  `githubUsername` varchar(255) DEFAULT NULL,
  `portfolioUrl` varchar(255) DEFAULT NULL,
  `pleskHostingUrl` varchar(255) DEFAULT NULL,
  `githubEducationLink` varchar(255) DEFAULT NULL,
  `additionalNotes` text,
  `chosenCourseId` int(11) unsigned DEFAULT NULL,
  `attitude` int(3) DEFAULT NULL,
  `averageScore` int(3) DEFAULT NULL,
  `fee` int(5) DEFAULT NULL,
  `signedTerms` tinyint(1) DEFAULT NULL,
  `signedDiversitech` tinyint(1) DEFAULT NULL,
  `inductionEmailSent` tinyint(1) DEFAULT NULL,
  `signedNDA` tinyint(1) DEFAULT NULL,
  `checkedID` tinyint(1) DEFAULT NULL,
  `dataProtectionName` tinyint(1) DEFAULT NULL,
  `dataProtectionPhoto` tinyint(1) DEFAULT NULL,
  `dataProtectionTestimonial` tinyint(1) DEFAULT NULL,
  `dataProtectionBio` tinyint(1) DEFAULT NULL,
  `dataProtectionVideo` tinyint(1) DEFAULT NULL,
  `contactFormSigned` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `CourseID` (`chosenCourseId`),
  KEY `TasterID` (`tasterId`),
  CONSTRAINT `CourseID` FOREIGN KEY (`chosenCourseId`) REFERENCES `courses` (`id`),
  CONSTRAINT `TasterID` FOREIGN KEY (`tasterId`) REFERENCES `events` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `applicants_additional` WRITE;
/*!40000 ALTER TABLE `applicants_additional` DISABLE KEYS */;

INSERT INTO `applicants_additional` (`id`, `apprentice`, `aptitude`, `assessmentDay`, `customAssessmentDay`, `assessmentTime`, `assessmentNotes`, `diversitechInterest`, `diversitech`, `edaid`, `upfront`, `kitCollectionDay`, `kitCollectionTime`, `kitNum`, `laptop`, `laptopDeposit`, `laptopNum`, `tasterId`, `tasterAttendance`, `team`, `githubUsername`, `portfolioUrl`, `pleskHostingUrl`, `githubEducationLink`, `additionalNotes`, `chosenCourseId`, `attitude`, `averageScore`, `fee`, `signedTerms`, `signedDiversitech`, `inductionEmailSent`, `signedNDA`, `checkedID`, `dataProtectionName`, `dataProtectionPhoto`, `dataProtectionTestimonial`, `dataProtectionBio`, `dataProtectionVideo`, `contactFormSigned`)
VALUES
	(11,1,20,NULL,NULL,'','',0,NULL,NULL,NULL,NULL,'',NULL,0,0,NULL,NULL,0,NULL,NULL,'','','',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0),
	(12,0,99,8,NULL,'','',0,NULL,NULL,NULL,NULL,'',NULL,0,0,NULL,NULL,0,NULL,NULL,'','','',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0),
	(13,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(19,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(23,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `applicants_additional` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table background_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `background_info`;

CREATE TABLE `background_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `backgroundInfo` varchar(40) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `background_info` WRITE;
/*!40000 ALTER TABLE `background_info` DISABLE KEYS */;

INSERT INTO `background_info` (`id`, `backgroundInfo`, `deleted`)
VALUES
	(1,'Changing careers',0),
	(2,'Returning to work',0),
	(3,'Recent university graduate',0),
	(4,'School leaver',0);

/*!40000 ALTER TABLE `background_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cohort
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cohort`;

CREATE TABLE `cohort` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `deleted` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cohort` WRITE;
/*!40000 ALTER TABLE `cohort` DISABLE KEYS */;

INSERT INTO `cohort` (`id`, `date`, `deleted`)
VALUES
	(1,'2022-01-10',0),
	(2,'2022-03-17',0),
	(3,'2022-03-07',0),
	(4,'2022-07-04',0);

/*!40000 ALTER TABLE `cohort` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cohorts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cohorts`;

CREATE TABLE `cohorts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cohorts` WRITE;
/*!40000 ALTER TABLE `cohorts` DISABLE KEYS */;

INSERT INTO `cohorts` (`id`, `date`, `deleted`)
VALUES
	(1,'2018-08-01',0),
	(2,'2019-02-01',0),
	(3,'2019-08-01',0),
	(4,'2020-02-01',0);

/*!40000 ALTER TABLE `cohorts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table company_sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company_sizes`;

CREATE TABLE `company_sizes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `size` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `company_sizes` WRITE;
/*!40000 ALTER TABLE `company_sizes` DISABLE KEYS */;

INSERT INTO `company_sizes` (`id`, `size`)
VALUES
	(1,'<5'),
	(2,'5-30'),
	(3,'31-60'),
	(4,'61-100'),
	(5,'101-250'),
	(6,'250+');

/*!40000 ALTER TABLE `company_sizes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course_choice
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course_choice`;

CREATE TABLE `course_choice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `courseId` int(11) DEFAULT NULL,
  `applicantId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `course_choice` WRITE;
/*!40000 ALTER TABLE `course_choice` DISABLE KEYS */;

INSERT INTO `course_choice` (`id`, `courseId`, `applicantId`)
VALUES
	(1,1,1),
	(2,2,3),
	(3,2,4),
	(4,3,2),
	(5,2,5),
	(6,1,6),
	(7,2,7),
	(8,1,8),
	(9,1,9),
	(10,3,10),
	(13,5,13),
	(14,6,13),
	(15,7,13),
	(16,1,14),
	(17,3,14),
	(18,6,14),
	(19,7,14),
	(20,3,15),
	(21,4,15),
	(22,6,15),
	(23,3,16),
	(24,4,16),
	(25,5,16),
	(26,6,16),
	(27,7,16),
	(28,1,17),
	(29,2,17),
	(30,4,17),
	(31,7,17),
	(32,6,18),
	(33,3,19),
	(34,6,19),
	(35,7,19),
	(36,1,20),
	(37,2,20),
	(38,6,20),
	(39,2,21),
	(40,3,21),
	(41,5,21),
	(42,7,21),
	(43,3,22),
	(44,6,22),
	(45,1,23),
	(46,2,23),
	(47,7,23),
	(48,2,24),
	(49,3,24),
	(50,7,24),
	(51,1,25),
	(52,2,25),
	(53,5,25),
	(54,3,11),
	(55,4,12),
	(56,5,26),
	(57,8,26);

/*!40000 ALTER TABLE `course_choice` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `in_person` int(11) DEFAULT NULL,
  `remote` int(11) DEFAULT NULL,
  `in_person_spaces` int(11) DEFAULT NULL,
  `remote_spaces` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `start_date`, `end_date`, `name`, `notes`, `deleted`, `in_person`, `remote`, `in_person_spaces`, `remote_spaces`)
VALUES
	(1,'2022-01-10','2022-05-29','Full-Stack Track',NULL,0,1,0,NULL,NULL),
	(2,'2022-01-10','2022-05-29','Full-Stack Track',NULL,0,0,1,NULL,NULL),
	(3,'2022-03-17','2022-03-25','Machine Data',NULL,0,1,1,NULL,NULL),
	(4,'2022-03-07','2022-06-24','Full-Stack Track','Great people',0,1,0,NULL,NULL),
	(5,'2022-03-07','2022-06-24','Full-Stack Track',NULL,0,0,0,NULL,NULL),
	(6,'2022-07-04','2022-10-21','Full-Stack Track','Might be robots',0,0,1,NULL,NULL),
	(7,'2022-07-04','2022-10-21','Full-Stack Track',NULL,0,1,0,NULL,NULL);

/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table courses_trainers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses_trainers`;

CREATE TABLE `courses_trainers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `courses_trainers` WRITE;
/*!40000 ALTER TABLE `courses_trainers` DISABLE KEYS */;

INSERT INTO `courses_trainers` (`id`, `course_id`, `trainer_id`)
VALUES
	(1,1,2),
	(2,2,1),
	(3,3,6),
	(4,4,5),
	(5,5,3),
	(6,6,2),
	(7,7,1),
	(10,2,5),
	(11,8,1),
	(12,8,1),
	(13,9,1),
	(14,10,1),
	(15,14,1),
	(16,20,1),
	(17,20,2),
	(18,21,1),
	(19,21,2),
	(20,21,1),
	(21,21,2),
	(22,22,1),
	(23,22,2),
	(24,22,1),
	(25,22,2),
	(26,22,1),
	(27,22,2),
	(28,8,1),
	(29,8,1),
	(30,8,1),
	(31,8,1),
	(32,8,1),
	(33,8,1),
	(34,8,1);

/*!40000 ALTER TABLE `courses_trainers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table event_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event_categories`;

CREATE TABLE `event_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `event_categories` WRITE;
/*!40000 ALTER TABLE `event_categories` DISABLE KEYS */;

INSERT INTO `event_categories` (`id`, `name`)
VALUES
	(1,'Hiring Event'),
	(2,'Sprint Review'),
	(3,'Taster Session'),
	(4,'Assessment'),
	(5,'Graduation'),
	(6,'Other');

/*!40000 ALTER TABLE `event_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `category` int(11) unsigned NOT NULL,
  `location` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `notes` text,
  `availableToHP` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`category`) REFERENCES `event_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `name`, `category`, `location`, `date`, `start_time`, `end_time`, `notes`, `availableToHP`)
VALUES
	(1,'Taster Session',3,'Remote','2021-01-12','18:00:00','19:00:00','',0),
	(2,'Taster Session',3,'Remote','2022-03-09','18:00:00','19:00:00','',0),
	(3,'Taster Session',3,'Remote','2022-05-04','18:00:00','19:00:00','No Sophie',0),
	(4,'Taster Session',3,'Remote','2022-07-06','18:00:00','19:00:00','',0),
	(5,'Taster Session',3,'Remote','2022-09-07','18:00:00','19:00:00','',0),
	(6,'Taster Session',3,'Remote','2022-11-09','18:00:00','19:00:00','',0),
	(7,'Assessment Day',4,'Remote','2022-01-15','12:00:00','13:00:00',NULL,0),
	(8,'Assessment Day',4,'Remote','2022-03-19','12:00:00','13:00:00',NULL,0),
	(9,'Assessment Day',4,'Remote','2022-05-14','12:00:00','13:00:00',NULL,0),
	(10,'Assessment Day',4,'Remote','2022-07-16','12:00:00','13:00:00',NULL,0),
	(11,'Assessment Day',4,'Remote','2022-09-17','12:00:00','13:00:00',NULL,0),
	(12,'Assessment Day',4,'Remote','2022-11-19','12:00:00','13:00:00',NULL,0),
	(13,'Graduation',5,'Bath','2022-05-06','17:00:00','19:00:00',NULL,0),
	(14,'Graduation',5,'Sheffield','2022-05-06','17:00:00','19:00:00',NULL,0),
	(15,'Graduation',5,'Bath','2022-06-24','17:00:00','19:00:00',NULL,0),
	(16,'Graduation',5,'Sheffield','2022-06-24','17:00:00','19:00:00',NULL,0);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events_hiring_partner_link_table
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events_hiring_partner_link_table`;

CREATE TABLE `events_hiring_partner_link_table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) unsigned NOT NULL,
  `hiring_partner_id` int(11) unsigned NOT NULL,
  `people_attending` int(11) unsigned DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table events_hiring_partners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events_hiring_partners`;

CREATE TABLE `events_hiring_partners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) unsigned NOT NULL,
  `hiring_partner_id` int(11) unsigned NOT NULL,
  `people_attending` int(11) unsigned DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `events_hiring_partners` WRITE;
/*!40000 ALTER TABLE `events_hiring_partners` DISABLE KEYS */;

INSERT INTO `events_hiring_partners` (`id`, `event_id`, `hiring_partner_id`, `people_attending`, `deleted`)
VALUES
	(1,3,3,10,0),
	(2,4,4,12,0);

/*!40000 ALTER TABLE `events_hiring_partners` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gender
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gender`;

CREATE TABLE `gender` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gender` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;

INSERT INTO `gender` (`id`, `gender`)
VALUES
	(1,'Male'),
	(2,'Female'),
	(3,'Non-binary'),
	(4,'Prefer not to say');

/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hear_about
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hear_about`;

CREATE TABLE `hear_about` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hearAbout` varchar(150) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `hear_about` WRITE;
/*!40000 ALTER TABLE `hear_about` DISABLE KEYS */;

INSERT INTO `hear_about` (`id`, `hearAbout`, `deleted`)
VALUES
	(1,'Google',0),
	(2,'Newspaper',0),
	(3,'Back of the toilet door',0),
	(4,'Telepathy',0),
	(5,'Carrier Pigeon',0),
	(6,'Fax',0);

/*!40000 ALTER TABLE `hear_about` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hiring_partner_companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hiring_partner_companies`;

CREATE TABLE `hiring_partner_companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `size` tinyint(2) DEFAULT '0',
  `tech_stack` varchar(600) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `url_website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `hiring_partner_companies` WRITE;
/*!40000 ALTER TABLE `hiring_partner_companies` DISABLE KEYS */;

INSERT INTO `hiring_partner_companies` (`id`, `name`, `size`, `tech_stack`, `postcode`, `phone_number`, `url_website`)
VALUES
	(1,'Blockbuster',1,'Pascal','BA1 1AB','01921123123','https://en.wikipedia.org/wiki/Blockbuster_LLC'),
	(2,'Tune Squad',15,'Talent','SS6 8QW','12345123123','https://en.wikipedia.org/wiki/Space_Jam'),
	(3,'Nintendo',127,'Java, PHP','BN17 6LR','09809876678','https://www.nintendo.co.uk/');

/*!40000 ALTER TABLE `hiring_partner_companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hiring_partner_contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hiring_partner_contacts`;

CREATE TABLE `hiring_partner_contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `is_primary_contact` tinyint(1) NOT NULL DEFAULT '1',
  `job_title` varchar(255) DEFAULT NULL,
  `hiring_partner_company_id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_contacts_to_hiring_partner` (`hiring_partner_company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `hiring_partner_contacts` WRITE;
/*!40000 ALTER TABLE `hiring_partner_contacts` DISABLE KEYS */;

INSERT INTO `hiring_partner_contacts` (`id`, `name`, `email`, `is_primary_contact`, `job_title`, `hiring_partner_company_id`, `phone`)
VALUES
	(1,'Quentin Tarantino','kill@bill.com',1,'Director',1,'01231123123'),
	(2,'Edgar Wright','no_luck_catching@swans.com',0,'Director',1,'12345123123'),
	(3,'Bugs Bunny','bugs@looney.tunes',1,'Rabbit',2,'09876098098'),
	(4,'Daffy Duck','daffy@looney.tunes',0,'Duck',2,'45678765567'),
	(5,'Mario Mario','ILovePeach@nintendo.com',1,'Plumber',3,'09756546654'),
	(6,'Donkey Kong','DK@nintendo.com',0,'Monke',3,'06854839811');

/*!40000 ALTER TABLE `hiring_partner_contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option` varchar(255) NOT NULL DEFAULT '',
  `stageId` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;

INSERT INTO `options` (`id`, `option`, `stageId`, `deleted`)
VALUES
	(7,'Accepted place',3,0),
	(8,'Rejected place',3,0),
	(9,'Confirmation sent',2,0),
	(10,'Rejection sent',2,0),
	(11,'Booked into assessment day',7,0),
	(12,'Application withdrawn',7,0),
	(13,'Accept email sent',8,0),
	(14,'Reject email sent',8,0),
	(15,'Deferred place',3,0),
	(16,'Graduated',11,0),
	(17,'Withdrew during course',11,0),
	(18,'Not allowed to graduate',11,0);

/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stages`;

CREATE TABLE `stages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `student` int(1) NOT NULL DEFAULT '0',
  `withdrawn` int(1) NOT NULL DEFAULT '0',
  `rejected` int(1) NOT NULL DEFAULT '0',
  `notAssigned` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `stages` WRITE;
/*!40000 ALTER TABLE `stages` DISABLE KEYS */;

INSERT INTO `stages` (`id`, `title`, `order`, `deleted`, `student`, `withdrawn`, `rejected`, `notAssigned`)
VALUES
	(1,'New application',1,0,0,0,0,0),
	(2,'Response sent',2,0,0,0,0,0),
	(3,'Booked into assessment day',3,0,0,0,0,0),
	(4,'Assessment Response',4,0,0,0,0,0),
	(5,'Attendance Response',5,0,0,0,0,0),
	(6,'Onboarding',6,0,1,0,0,0),
	(7,'Attending',7,0,1,0,0,0),
	(8,'Course complete',8,0,1,0,0,0),
	(9,'In employment',9,0,1,0,0,0);

/*!40000 ALTER TABLE `stages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trainer` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `trainer`)
VALUES
	(1,'Mike'),
	(2,'Ash'),
	(3,'Charlie'),
	(4,'Rayna'),
	(5,'Neal'),
	(6,'Richard');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trainers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trainers`;

CREATE TABLE `trainers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `notes` varchar(5000) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `trainers` WRITE;
/*!40000 ALTER TABLE `trainers` DISABLE KEYS */;

INSERT INTO `trainers` (`id`, `name`, `email`, `notes`, `deleted`)
VALUES
	(1,'Charlie Coggans','charlie.coggans@io-academy.uk','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',0),
	(2,'Rayna Bozhkova','rayna.bozhkova@io-academy.uk','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur',0),
	(3,'Ashley Coles','ashley.coles@io-academy.uk','At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.',0),
	(4,'Mike Oram','mike.oram@io-academy.uk','Pellentesque consectetur, lacus viverra euismod semper, ligula massa posuere ex, at scelerisque dolor leo et massa. Nam eu sapien felis. Morbi hendrerit scelerisque orci id fringilla. Quisque consequat sollicitudin felis id accumsan. Etiam eget elit efficitur, imperdiet ipsum sodales, tempor lorem. Nulla facilisi. Etiam malesuada vel mi ac pulvinar. Mauris sit amet justo nec justo tristique aliquet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. ',0),
	(5,'Neal Hughson','neal.hughson@io-academy.uk','Nulla facilisi. Curabitur egestas maximus finibus. Proin a vestibulum tortor, at malesuada sapien. Fusce imperdiet eros consequat lorem mattis consectetur. Mauris volutpat vitae sem in consequat. Mauris aliquet tincidunt quam, in ullamcorper diam hendrerit consequat. Praesent tellus est, luctus vitae molestie vitae, maximus sit amet dolor. Integer imperdiet accumsan odio. Donec lacinia libero et dolor interdum feugiat. Curabitur quis erat id elit tri',0),
	(6,'Richard Ball','richard.ball@io-academy.uk','Maecenas sed blandit nulla, in vehicula quam. Vestibulum purus lacus, faucibus quis vulputate at, tempor eget orci. Donec at dictum nisl, a facilisis sem. Curabitur consectetur, dui ut maximus convallis, arcu arcu vulputate erat, consequat facilisis velit ipsum eu sem. Praesent sit amet venenatis urna. Pellentesque volutpat vestibulum eleifend. ',0);

/*!40000 ALTER TABLE `trainers` ENABLE KEYS */;
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
	(1,'test@test.com','$2y$12$jW0bVIRrUy.rx0QD7mGNWOlfJz1Sd0cZUhc0FfamtiPx1OT9ntPlC',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
