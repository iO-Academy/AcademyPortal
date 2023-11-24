# ************************************************************
# Sequel Ace SQL dump
# Version 20051
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.0.2-MariaDB-1:11.0.2+maria~ubu2204)
# Database: academyPortal


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table applicants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicants`;

CREATE TABLE `applicants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `whyDev` text DEFAULT NULL,
  `codeExperience` text DEFAULT NULL,
  `hearAboutId` int(11) DEFAULT NULL,
  `eligible` enum('1','0') DEFAULT NULL,
  `eighteenPlus` enum('1','0') DEFAULT NULL,
  `finance` enum('1','0') DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `stageId` int(11) NOT NULL DEFAULT 1,
  `stageOptionId` int(11) DEFAULT NULL,
  `dateTimeAdded` timestamp NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0,
  `backgroundInfoId` varchar(1) DEFAULT NULL,
  `profile_password` varchar(68) DEFAULT '',
  `gender` varchar(10) DEFAULT NULL,
  `cohortId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;

INSERT INTO `applicants` (`id`, `name`, `email`, `phoneNumber`, `whyDev`, `codeExperience`, `hearAboutId`, `eligible`, `eighteenPlus`, `finance`, `notes`, `stageId`, `stageOptionId`, `dateTimeAdded`, `deleted`, `backgroundInfoId`, `profile_password`, `gender`, `cohortId`)
VALUES
	(11,'Melinde Rentoll','mrentoll0@salon.com','07671138755','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',1,'1','1','1','Loves stilton!',1,NULL,'2021-11-25 16:29:00',0,'1','',NULL,NULL),
	(12,'Trumaine Digger','tdigger1@utexas.edu','07938905902','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',1,'1','0','1','Loves cheddar',6,NULL,'2021-11-25 16:32:00',0,'1','','1',NULL),
	(13,'Morgan Graundisson','mgraundisson2@tuttocitta.it','07933387264','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',1,'1','1','0','Brie for me!',6,NULL,'2021-11-25 16:35:00',0,'1','','1',NULL),
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
	(25,'Jacinthe Towse','jtowsef@godaddy.com','07528968799','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat ultrices placerat. Donec in lacinia arcu, at ornare odio. Donec id enim in arcu aliquam lacinia. Ut id felis sapien. Quisque gravida consequat risus, at porta quam pellentesque nec. Ut sed enim sit amet dui facilisis aliquam at in arcu. Aenean ut lacus ipsum. Sed cursus sapien sit amet dui elementum, in ultrices nunc facilisis. Fusce massa nisi, egestas ut elementum non, viverra a orci.',1,'1','1','1','',6,NULL,'2021-11-25 16:47:00',0,'1','','1',NULL),
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
  `assessmentNotes` text DEFAULT NULL,
  `diversitechInterest` int(1) DEFAULT NULL,
  `diversitech` int(5) DEFAULT NULL,
  `edaid` int(5) DEFAULT NULL,
  `edaidLocked` int(1) NOT NULL DEFAULT 0,
  `upfront` int(5) DEFAULT NULL,
  `upfrontLocked` int(1) NOT NULL DEFAULT 0,
  `kitCollectionDay` date DEFAULT NULL,
  `kitCollectionTime` varchar(5) DEFAULT NULL,
  `kitNum` int(2) DEFAULT NULL,
  `laptop` int(1) DEFAULT NULL,
  `laptopLocked` int(1) NOT NULL DEFAULT 0,
  `laptopDeposit` int(1) DEFAULT NULL,
  `laptopNum` int(2) DEFAULT NULL,
  `tasterId` int(11) unsigned DEFAULT NULL,
  `tasterAttendance` int(1) DEFAULT NULL,
  `team` int(1) DEFAULT NULL,
  `githubUsername` varchar(255) DEFAULT NULL,
  `githubUsernameLocked` int(1) NOT NULL DEFAULT 0,
  `portfolioUrl` varchar(255) DEFAULT NULL,
  `pleskHostingUrl` varchar(255) DEFAULT NULL,
  `githubEducationLink` varchar(255) DEFAULT NULL,
  `additionalNotes` text DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `applicants_additional` WRITE;
/*!40000 ALTER TABLE `applicants_additional` DISABLE KEYS */;

INSERT INTO `applicants_additional` (`id`, `apprentice`, `aptitude`, `assessmentDay`, `customAssessmentDay`, `assessmentTime`, `assessmentNotes`, `diversitechInterest`, `diversitech`, `edaid`, `edaidLocked`, `upfront`, `upfrontLocked`, `kitCollectionDay`, `kitCollectionTime`, `kitNum`, `laptop`, `laptopLocked`, `laptopDeposit`, `laptopNum`, `tasterId`, `tasterAttendance`, `team`, `githubUsername`, `githubUsernameLocked`, `portfolioUrl`, `pleskHostingUrl`, `githubEducationLink`, `additionalNotes`, `chosenCourseId`, `attitude`, `averageScore`, `fee`, `signedTerms`, `signedDiversitech`, `inductionEmailSent`, `signedNDA`, `checkedID`, `dataProtectionName`, `dataProtectionPhoto`, `dataProtectionTestimonial`, `dataProtectionBio`, `dataProtectionVideo`, `contactFormSigned`)
VALUES
	(11,1,20,NULL,NULL,'','',0,NULL,NULL,1,NULL,1,NULL,'',NULL,0,1,0,NULL,NULL,0,NULL,NULL,0,'','','',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0),
	(12,0,99,NULL,NULL,'','',0,NULL,NULL,1,NULL,1,NULL,'',NULL,0,1,0,NULL,NULL,0,NULL,NULL,1,'','','',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0),
	(13,1,NULL,NULL,NULL,'','',0,NULL,NULL,0,NULL,1,NULL,'',NULL,0,1,0,NULL,NULL,0,NULL,NULL,0,'','','',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0),
	(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(19,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(23,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(25,0,NULL,NULL,NULL,'','',0,NULL,NULL,0,NULL,0,NULL,'',NULL,0,0,0,NULL,NULL,0,NULL,NULL,0,'','','',NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0),
	(26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `applicants_additional` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table background_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `background_info`;

CREATE TABLE `background_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `backgroundInfo` varchar(40) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `deleted` int(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
	(54,3,11),
	(56,5,26),
	(57,8,26),
	(59,4,12),
	(60,5,13),
	(61,6,13),
	(62,7,13),
	(63,1,25),
	(64,2,25),
	(65,5,25);

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
  `deleted` int(1) NOT NULL DEFAULT 0,
  `in_person` int(11) DEFAULT NULL,
  `remote` int(11) DEFAULT NULL,
  `in_person_spaces` int(11) DEFAULT NULL,
  `remote_spaces` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `start_date`, `end_date`, `name`, `notes`, `deleted`, `in_person`, `remote`, `in_person_spaces`, `remote_spaces`)
VALUES
	(1,'2022-01-10','2022-05-29','Full-Stack Track',NULL,0,1,0,8,0),
	(2,'2022-01-10','2022-05-29','Full-Stack Track',NULL,0,0,1,8,0),
	(3,'2022-03-17','2022-03-25','Machine Data',NULL,0,1,1,0,12),
	(4,'2022-03-07','2022-06-24','Full-Stack Track','Great people',0,1,0,8,0),
	(5,'2022-03-07','2022-06-24','Full-Stack Track',NULL,0,0,0,8,0),
	(6,'2022-07-04','2022-10-21','Full-Stack Track','Might be robots',0,0,1,8,0),
	(7,'2022-07-04','2022-10-21','Full-Stack Track',NULL,0,1,0,8,0),
	(9,'2023-09-23','2023-12-25','SDE','there are only 151 pokemon',0,0,1,0,12),
	(10,'2024-01-11','2024-03-11','SDE','MAGNETS',0,0,1,0,12),
	(11,'2024-07-11','2024-07-14','Python Intro','GHOULS',0,1,1,0,12),
	(12,'2025-01-11','2025-04-11','Full-Stack Track','H for Hornets',0,1,1,8,0),
	(13,'2025-07-15','2025-10-11','Data Science','cowabunga',0,1,0,0,12),
	(14,'2026-06-06','2026-10-11','SDE','migration',0,1,1,0,12),
	(15,'2026-07-11','2026-11-11','SDE','chaos potato',0,1,1,0,12),
	(16,'2027-04-22','2027-10-15','SDE','pigeons',0,1,1,0,12),
	(17,'2027-07-11','2027-10-30','SDE','migration',0,0,1,0,12),
	(18,'2028-06-19','2028-09-12','SDE','Virtual',0,1,0,0,12),
	(19,'2028-10-19','2028-12-12','Full-Stack Track','Wolf Cola',0,1,0,8,0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `availableToHP` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`category`) REFERENCES `event_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `name`, `category`, `location`, `date`, `start_time`, `end_time`, `notes`, `availableToHP`)
VALUES
  (1, 'Assessment Day', 4, 'Nankun', '2023-04-24', '0:15:25', '7:32:13', 'matrix', 0),
  (2, 'Sprint Review', 1, 'Chuguyevka', '2024-02-25', '18:56:47', '6:03:52', 'Realigned', 0),
  (3, 'Hiring Event', 1, 'Temyasovo', '2024-06-08', '10:05:37', '3:51:37', 'Realigned', 0),
  (4, 'Graduation', 6, 'Semënovskoye', '2023-05-14', '19:47:22', '6:16:43', 'client-server', 0),
  (5, 'Taster Session', 1, 'Lühua', '2024-01-20', '10:10:31', '10:11:35', 'mission-critical', 0),
  (6, 'Graduation', 2, 'Sovetskiy', '2024-12-14', '5:33:04', '1:26:02', 'systemic', 0),
  (7, 'Assessment Day', 2, 'München', '2023-01-16', '17:41:05', '6:41:02', 'intermediate', 0),
  (8, 'Sprint Review', 2, 'Frederiksberg', '2024-10-06', '3:49:51', '4:25:36', 'Progressive', 0),
  (9, 'Hiring Event', 5, 'Tsuen Wan', '2023-11-14', '0:30:34', '8:38:35', 'zero defect', 0),
  (10, 'Graduation', 4, 'Vyazma', '2025-02-24', '4:06:00', '16:34:15', 'Right-sized', 0),
  (11, 'Taster Session', 2, 'Wubao', '2023-01-29', '5:20:48', '9:26:13', 'global', 0),
  (12, 'Graduation', 4, 'Zhenjiang', '2024-11-11', '17:01:53', '3:20:44', 'Grass-roots', 0),
  (13, 'Assessment Day', 3, 'Al Qurayn', '2025-08-20', '14:22:00', '22:06:28', 'asymmetric', 0),
  (14, 'Sprint Review', 1, 'Goshogawara', '2023-03-26', '10:14:25', '0:04:51', '6th generation', 0),
  (15, 'Hiring Event', 3, 'Egbe', '2024-12-26', '16:29:16', '14:30:50', 'Automated', 0),
  (16, 'Graduation', 6, 'Gaspar Hernández', '2024-09-07', '9:57:45', '14:54:10', 'high-level', 0),
  (17, 'Taster Session', 2, 'Alhambra', '2023-08-06', '19:03:27', '8:44:09', 'initiative', 0),
  (18, 'Graduation', 3, 'Sodankylä', '2022-12-12', '8:17:29', '14:34:35', 'product', 0),
  (19, 'Assessment Day', 2, 'Nangkasari', '2025-07-17', '3:46:22', '19:55:24', 'Profit-focused', 0),
  (20, 'Sprint Review', 5, 'Porto Alto', '2025-11-17', '10:11:04', '2:03:46', 'bandwidth-monitored', 0),
  (21, 'Hiring Event', 4, 'København', '2023-11-04', '5:46:02', '2:40:09', 'Graphical User Interface', 0),
  (22, 'Graduation', 2, 'Si Narong', '2022-12-11', '0:09:26', '20:48:25', 'Switchable', 0),
  (23, 'Taster Session', 1, 'Limoges', '2023-02-14', '17:17:37', '14:17:29', 'scalable', 0),
  (24, 'Graduation', 4, 'Velká Bystřice', '2023-01-08', '20:04:18', '18:17:45', 'interface', 0),
  (25, 'Assessment Day', 6, 'Elbrus', '2024-01-05', '5:45:04', '4:07:38', 'secondary', 0),
  (26, 'Sprint Review', 2, 'Reina Mercedes', '2024-11-14', '8:19:42', '9:08:27', 'radical', 0),
  (27, 'Hiring Event', 6, 'San Antonio Ilotenango', '2025-08-22', '10:35:40', '6:33:29', 'architecture', 0),
  (28, 'Graduation', 3, 'Sarrebourg', '2024-06-01', '15:59:30', '16:38:40', 'throughput', 0),
  (29, 'Taster Session', 5, 'Kasimov', '2023-01-04', '2:43:48', '10:09:21', 'Optimized', 0),
  (30, 'Graduation', 4, 'Sipe Sipe', '2025-01-03', '8:25:41', '21:59:35', 'monitoring', 0),
  (31, 'Assessment Day', 1, 'Bahe', '2025-11-12', '16:57:08', '11:34:01', 'Down-sized', 0),
  (32, 'Sprint Review', 6, 'Suyo', '2024-11-06', '12:24:25', '4:24:44', 'policy', 0),
  (33, 'Hiring Event', 4, 'Jixiang', '2024-07-19', '15:58:40', '0:43:42', 'analyzing', 0),
  (34, 'Graduation', 2, 'Pak Phanang', '2023-01-02', '13:24:22', '11:53:25', 'hybrid', 0),
  (35, 'Taster Session', 6, 'Koshigaya', '2024-11-05', '12:17:15', '5:42:41', 'Compatible', 0),
  (36, 'Graduation', 6, 'La Soledad', '2023-06-08', '3:02:07', '12:51:46', 'background', 0),
  (37, 'Assessment Day', 1, 'San Luis', '2023-02-25', '10:16:41', '6:38:17', 'mobile', 0),
  (38, 'Sprint Review', 4, 'Billa', '2024-11-20', '9:46:13', '4:11:39', 'Multi-tiered', 0),
  (39, 'Hiring Event', 3, 'Yanwukou', '2025-07-24', '11:24:52', '14:31:51', '24/7', 0),
  (40, 'Graduation', 1, 'Udi', '2025-03-01', '18:02:11', '20:37:01', 'Ergonomic', 0),
  (41, 'Taster Session', 3, 'Markaz-e Ḩukūmat-e Darwēshān', '2024-03-10', '18:07:19', '1:43:17', 'database', 0),
  (42, 'Graduation', 5, 'Kodinsk', '2023-07-29', '9:15:40', '11:32:15', 'holistic', 0),
  (43, 'Assessment Day', 3, 'Jintao', '2024-09-13', '11:02:16', '1:11:33', 'bifurcated', 0),
  (44, 'Sprint Review', 3, 'Lingkou', '2025-03-10', '20:59:54', '4:09:41', 'Right-sized', 0),
  (45, 'Hiring Event', 3, 'Rumilly', '2025-10-22', '10:56:16', '6:28:50', 'analyzing', 0),
  (46, 'Graduation', 1, 'Lanxi', '2025-10-17', '3:53:26', '18:43:48', 'Front-line', 0),
  (47, 'Taster Session', 6, 'Eilabun', '2025-11-09', '5:59:52', '7:48:16', 'cohesive', 0),
  (48, 'Graduation', 3, 'Quibdó', '2023-03-10', '19:05:02', '10:21:30', 'foreground', 0),
  (49, 'Assessment Day', 6, 'Santiago De Compostela', '2024-05-16', '12:27:50', '2:35:36', 'projection', 0),
  (50, 'Sprint Review', 5, 'Bayshint', '2023-08-05', '12:54:07', '9:58:10', 'Extended', 0),
  (51, 'Hiring Event', 2, 'Nicoya', '2023-08-14', '2:15:28', '13:15:09', 'Managed', 0),
  (52, 'Graduation', 6, 'Maunatlala', '2024-06-09', '0:59:25', '20:05:40', 'intermediate', 0),
  (53, 'Taster Session', 5, 'Seltjarnarnes', '2024-11-20', '15:51:36', '1:05:47', 'help-desk', 0),
  (54, 'Graduation', 3, 'Sebulu', '2025-06-04', '7:51:44', '7:16:25', 'attitude-oriented', 0),
  (55, 'Assessment Day', 5, 'Chernoyerkovskaya', '2024-08-03', '19:06:42', '11:39:21', 'Persistent', 0),
  (56, 'Sprint Review', 6, 'Rybache', '2023-06-17', '17:03:43', '6:40:54', 'toolset', 0),
  (57, 'Hiring Event', 5, 'Kaparéllion', '2025-02-15', '1:59:24', '4:41:33', 'fault-tolerant', 0),
  (58, 'Graduation', 6, 'Dadiya', '2024-10-18', '17:15:09', '14:55:31', 'tangible', 0),
  (59, 'Taster Session', 6, 'Sadská', '2023-11-16', '13:36:51', '11:19:16', 'intermediate', 0),
  (60, 'Graduation', 4, 'Baohe', '2024-01-23', '17:53:23', '6:22:32', 'Diverse', 0),
  (61, 'Assessment Day', 4, 'Zhangfeng', '2024-08-23', '20:48:13', '11:17:25', 'hybrid', 0),
  (62, 'Sprint Review', 4, 'Město', '2025-09-22', '0:17:17', '21:22:20', 'real-time', 0),
  (63, 'Hiring Event', 1, 'Kremenets', '2023-07-20', '9:29:19', '13:33:54', 'hardware', 0),
  (64, 'Graduation', 4, 'Balekersukamaju', '2024-10-12', '22:56:11', '2:53:40', 'info-mediaries', 0),
  (65, 'Taster Session', 1, 'El Bauga', '2023-10-02', '1:03:11', '18:18:51', 'neutral', 0),
  (66, 'Graduation', 3, 'Guanshui', '2025-01-25', '7:26:02', '9:14:24', 'optimizing', 0),
  (67, 'Assessment Day', 3, 'Qabaqçöl', '2023-09-19', '16:38:03', '8:31:45', 'dedicated', 0),
  (68, 'Sprint Review', 4, 'Dniprodzerzhynsk', '2025-01-10', '22:32:59', '7:18:11', 'scalable', 0),
  (69, 'Hiring Event', 4, 'Guadalupe Victoria', '2025-10-04', '16:51:24', '12:27:22', 'time-frame', 0),
  (70, 'Graduation', 3, 'Qiaotou', '2025-06-13', '19:56:35', '2:21:06', 'optimizing', 0),
  (71, 'Taster Session', 3, 'Zarszyn', '2023-12-15', '5:29:20', '6:49:14', 'Progressive', 0),
  (72, 'Graduation', 5, 'Paris 10', '2023-04-05', '8:28:00', '8:20:34', 'application', 0),
  (73, 'Assessment Day', 2, 'Masaki-chō', '2023-03-29', '19:37:09', '21:25:51', 'Enhanced', 0),
  (74, 'Sprint Review', 6, 'Požarevac', '2025-11-22', '21:26:05', '16:34:14', 'bandwidth-monitored', 0),
  (75, 'Hiring Event', 1, 'Taung', '2023-08-16', '9:08:20', '1:30:40', 'tangible', 0),
  (76, 'Graduation', 1, 'Baugo', '2025-08-12', '0:47:42', '4:32:55', 'Automated', 0),
  (77, 'Taster Session', 6, 'Laiguangying', '2023-03-03', '3:16:28', '12:21:18', 'parallelism', 0),
  (78, 'Graduation', 5, 'Maubasa', '2024-03-02', '11:11:00', '20:09:59', 'service-desk', 0),
  (79, 'Assessment Day', 5, 'Ożarów', '2023-05-13', '16:32:10', '11:57:25', 'mission-critical', 0),
  (80, 'Sprint Review', 6, 'Dolany', '2025-02-10', '13:47:59', '6:16:27', 'matrix', 0),
  (81, 'Hiring Event', 2, 'Lela', '2024-11-22', '12:41:10', '18:39:05', 'Up-sized', 0),
  (82, 'Graduation', 1, 'Novo Hamburgo', '2023-01-04', '13:40:12', '4:05:04', '24 hour', 0),
  (83, 'Taster Session', 3, 'Hoorn', '2023-11-13', '0:42:32', '19:40:56', 'intangible', 0),
  (84, 'Graduation', 5, 'Rangpur', '2024-07-22', '4:49:25', '20:34:13', 'Advanced', 0),
  (85, 'Assessment Day', 2, 'Babagan', '2024-10-02', '17:35:21', '11:27:44', 'bottom-line', 0),
  (86, 'Sprint Review', 2, 'Psary', '2023-11-19', NULL, NULL, 'Sharable', 0),
  (87, 'Hiring Event', 2, 'Stockholm', '2024-08-24', '21:44:00', '21:56:41', 'middleware', 0),
  (88, 'Graduation', 2, 'Heshui', '2024-06-16', '1:06:27', '0:33:13', 'utilisation', 0),
  (89, 'Taster Session', 1, 'Maragogipe', '2023-08-04', '14:30:15', '7:16:02', 'local', 0),
  (90, 'Graduation', 6, 'Xindian', '2023-06-25', '0:36:15', '0:38:45', 'Face to face', 0),
  (91, 'Assessment Day', 5, 'Ebaye', '2024-02-05', '5:25:51', '17:26:30', 'policy', 0),
  (92, 'Sprint Review', 6, 'Erechim', '2025-10-23', '1:33:52', '7:24:49', 'maximized', 0),
  (93, 'Hiring Event', 5, 'Offenbach', '2024-01-19', '8:20:55', '10:53:54', 'holistic', 0),
  (94, 'Graduation', 3, 'Ängelholm', '2024-06-17', '21:54:12', '20:12:59', 'bi-directional', 0),
  (95, 'Taster Session', 6, 'R S', '2024-04-07', '17:51:38', '1:38:21', 'Right-sized', 0),
  (96, 'Graduation', 5, 'Calvinia', '2023-08-21', '5:23:37', '19:52:27', 'system engine', 0),
  (97, 'Assessment Day', 1, 'Edson', '2024-02-02', '5:44:11', '5:35:57', 'Expanded', 0),
  (98, 'Sprint Review', 4, 'Jianshe', '2024-07-31', '19:31:15', '3:03:33', 'frame', 0),
  (99, 'Hiring Event', 5, 'Lianghe', '2023-02-23', '2:43:26', '3:48:47', 'Pre-emptive', 0),
  (100, 'Graduation', 2, 'Casais Brancos', '2023-05-10', '7:46:36', '18:52:26', 'Reactive', 0),
  (101, 'Taster Session', 5, 'Cidadap', '2025-06-12', '14:20:23', '12:28:23', 'challenge', 0),
  (102, 'Graduation', 3, 'Dashi', '2025-07-24', '13:58:02', '7:03:19', 'multi-tasking', 0),
  (103, 'Assessment Day', 3, 'Tabalosos', '2023-08-03', '8:32:16', '8:07:13', 'leading edge', 0),
  (104, 'Sprint Review', 3, 'Annaka', '2024-07-18', '3:14:18', '15:19:15', 'local area network', 0),
  (105, 'Hiring Event', 6, 'Shichuan', '2025-06-23', '9:25:08', '3:24:52', 'Reverse-engineered', 0),
  (106, 'Graduation', 3, 'Den Chai', '2023-12-21', '16:26:49', '0:12:48', 'Mandatory', 0),
  (107, 'Taster Session', 2, 'San Fernando Apure', '2025-05-19', '0:39:13', '7:15:22', 'policy', 0),
  (108, 'Graduation', 3, 'Atlanta', '2023-04-25', '22:58:04', '10:07:53', 'Implemented', 0),
  (109, 'Assessment Day', 2, 'Limoges', '2023-05-25', '1:34:18', '7:57:19', 'analyzing', 0),
  (110, 'Sprint Review', 1, 'Bowen Island', '2023-10-18', '16:42:19', '4:24:57', 'Organized', 0),
  (111, 'Hiring Event', 2, 'Hujia', '2025-10-26', '5:12:44', '14:52:38', 'policy', 0),
  (112, 'Graduation', 1, 'Pato Branco', '2025-08-13', '17:33:43', '5:48:09', 'non-volatile', 0),
  (113, 'Taster Session', 2, 'Michałowice', '2022-12-26', '11:48:20', '22:37:09', 'task-force', 0),
  (114, 'Graduation', 1, 'Hesi', '2025-05-29', '5:46:03', '18:33:51', 'firmware', 0),
  (115, 'Assessment Day', 1, 'Hang Dong', '2025-10-04', '8:04:10', '14:54:51', 'disintermediate', 0),
  (116, 'Sprint Review', 3, 'Loangmaka', '2025-06-15', '0:11:30', '20:31:00', 'forecast', 0),
  (117, 'Hiring Event', 2, 'Pictou', '2025-01-10', '11:25:38', '12:38:39', 'executive', 0),
  (118, 'Graduation', 1, 'Kåge', '2023-11-10', NULL, NULL, 'scalable', 0),
  (119, 'Taster Session', 6, 'Roma', '2025-04-08', '3:37:02', '14:07:06', 'algorithm', 0),
  (120, 'Graduation', 2, 'Três Corações', '2025-10-25', '12:03:05', '18:12:42', 'local area network', 0),
  (121, 'Assessment Day', 1, 'Reinaldes', '2023-05-14', '15:07:37', '18:09:31', 'Compatible', 0),
  (122, 'Sprint Review', 5, 'Sipocot', '2024-02-04', '6:00:50', '3:40:37', 'workforce', 0),
  (123, 'Hiring Event', 3, 'Xinan', '2024-09-04', '6:30:36', '0:37:15', 'protocol', 0),
  (124, 'Graduation', 5, 'Dieppe', '2023-06-26', '14:23:13', '13:36:43', 'leading edge', 0),
  (125, 'Taster Session', 6, 'Wantian', '2023-06-21', '9:01:41', '17:12:27', 'reciprocal', 0),
  (126, 'Graduation', 4, 'Sutysky', '2025-10-02', '9:42:44', '20:54:24', 'logistical', 0),
  (127, 'Assessment Day', 5, 'Kusak', '2025-09-19', '3:01:39', '10:29:57', 'human-resource', 0),
  (128, 'Sprint Review', 6, 'Bangued', '2024-10-11', '10:22:13', '16:24:39', 'scalable', 0),
  (129, 'Hiring Event', 6, 'San Andres', '2024-09-28', '16:11:07', '22:38:52', 'support', 0),
  (130, 'Graduation', 5, 'Purwosari', '2023-02-25', '22:43:53', '10:01:31', 'definition', 0),
  (131, 'Taster Session', 6, 'Tonglin', '2025-09-22', '8:59:48', '0:28:43', 'Customer-focused', 0),
  (132, 'Graduation', 4, 'Panaitólion', '2025-02-02', '15:33:39', '15:58:25', 'Future-proofed', 0),
  (133, 'Assessment Day', 1, 'Ilandža', '2025-02-06', '12:50:56', '13:08:25', 'algorithm', 0),
  (134, 'Sprint Review', 5, 'Stockholm', '2023-04-12', '20:10:36', '2:26:56', 'superstructure', 0),
  (135, 'Hiring Event', 4, 'Sete Lagoas', '2024-11-03', '9:04:28', '7:03:30', 'De-engineered', 0),
  (136, 'Graduation', 2, 'Changshan', '2023-04-11', '3:33:48', '9:52:10', 'Self-enabling', 0),
  (137, 'Taster Session', 2, 'Xinshi', '2023-03-20', '21:35:33', '9:34:43', 'circuit', 0),
  (138, 'Graduation', 5, 'Niepos', '2025-06-09', '6:20:09', '6:36:15', 'tertiary', 0),
  (139, 'Assessment Day', 3, 'Jingxin', '2025-11-20', '9:58:28', '12:30:15', 'contextually-based', 0),
  (140, 'Sprint Review', 6, 'Choco', '2025-06-26', '3:01:28', '15:49:12', 'model', 0),
  (141, 'Hiring Event', 3, 'Didian', '2023-10-12', '19:02:51', '4:03:01', 'strategy', 0),
  (142, 'Graduation', 2, 'Kanbe', '2024-03-28', '17:37:55', '1:57:37', 'human-resource', 0),
  (143, 'Taster Session', 6, 'Nandu', '2024-11-05', '10:11:11', '1:01:47', 'Innovative', 0),
  (144, 'Graduation', 2, 'Zheleznogorsk', '2025-09-16', '22:12:06', '7:11:06', 'solution', 0),
  (145, 'Assessment Day', 4, 'Atlanta', '2025-11-01', '5:09:32', '22:16:29', 'Synchronised', 0),
  (146, 'Sprint Review', 2, 'Qaşr al Farāfirah', '2024-07-27', '13:04:41', '22:24:03', 'Object-based', 0),
  (147, 'Hiring Event', 1, 'Mont-Royal', '2023-06-05', '6:23:15', '10:14:12', 'contingency', 0),
  (148, 'Graduation', 6, 'Ash Shuqayrah', '2024-04-26', '11:37:39', '9:47:43', 'emulation', 0),
  (149, 'Taster Session', 6, 'Comal', '2023-05-23', '7:38:40', '16:38:08', 'Compatible', 0),
  (150, 'Graduation', 1, 'Lafayette', '2025-05-28', '21:59:36', '20:03:19', 'content-based', 0),
  (151, 'Assessment Day', 6, 'Pohonsirih', '2024-12-18', '16:32:12', '7:28:57', 'upward-trending', 0),
  (152, 'Sprint Review', 4, 'Orurillo', '2023-09-26', '3:53:57', '2:16:38', 'focus group', 0),
  (153, 'Hiring Event', 2, 'Shabelskoye', '2024-05-13', '21:38:40', '11:13:37', 'benchmark', 0),
  (154, 'Graduation', 2, 'Motala', '2024-01-08', '1:54:03', '5:40:01', 'optimal', 0),
  (155, 'Taster Session', 5, 'Onomichi', '2024-03-04', '0:00:00', '2:36:01', 'utilisation', 0),
  (156, 'Graduation', 1, 'Hinlayagan Ilaud', '2023-10-12', '3:11:36', '15:45:35', 'Decentralized', 0),
  (157, 'Assessment Day', 3, 'Zaandam', '2023-04-22', '3:24:17', '4:42:18', 'policy', 0),
  (158, 'Sprint Review', 1, 'Yasenevo', '2023-06-27', '1:34:48', '16:36:19', 'intermediate', 0),
  (159, 'Hiring Event', 1, 'Drawno', '2022-12-04', '2:38:25', '4:52:49', 'motivating', 0),
  (160, 'Graduation', 4, 'Ventersdorp', '2023-09-21', '5:44:15', '15:30:08', 'frame', 0),
  (161, 'Taster Session', 2, 'Seteluk Tengah', '2025-09-26', '22:33:08', '12:23:10', 'Realigned', 0),
  (162, 'Graduation', 2, 'Nggelok', '2025-08-25', '9:05:34', '2:39:20', 'fault-tolerant', 0),
  (163, 'Assessment Day', 4, 'Tlučná', '2023-03-20', '3:38:52', '9:41:55', 'Team-oriented', 0),
  (164, 'Sprint Review', 1, 'Braga', '2023-06-07', '8:21:42', '14:20:48', 'Pre-emptive', 0),
  (165, 'Hiring Event', 4, 'Cimonyong', '2023-06-19', '12:23:44', '19:25:22', 'analyzing', 0),
  (166, 'Graduation', 1, 'Kipini', '2025-07-29', '6:21:48', '20:58:29', 'data-warehouse', 0),
  (167, 'Taster Session', 5, 'Norrköping', '2025-09-16', '5:01:45', '0:59:39', 'pricing structure', 0),
  (168, 'Graduation', 2, 'Bento Gonçalves', '2024-11-15', '11:50:19', '19:04:55', 'Synergized', 0),
  (169, 'Assessment Day', 2, 'Hamburg', '2024-04-17', '2:34:14', '14:06:30', 'interface', 0),
  (170, 'Sprint Review', 4, 'Kuhmo', '2023-07-20', '1:41:47', '1:18:46', 'matrices', 0),
  (171, 'Hiring Event', 3, 'Tiabaya', '2023-10-20', '6:15:57', '4:19:25', 'Multi-channelled', 0),
  (172, 'Graduation', 1, 'Jati', '2023-12-28', '19:40:37', '22:54:41', 'solution-oriented', 0),
  (173, 'Taster Session', 6, 'Foz do Iguaçu', '2023-08-05', '1:15:19', '19:15:32', 'Fully-configurable', 0),
  (174, 'Graduation', 5, 'Amper', '2023-08-30', '15:01:51', '3:08:56', 'flexibility', 0),
  (175, 'Assessment Day', 1, 'Garoua', '2024-01-16', '1:35:46', '0:46:41', 'matrices', 0),
  (176, 'Sprint Review', 5, 'Hongqiao', '2023-01-09', '18:45:52', '4:18:12', 'asymmetric', 0),
  (177, 'Hiring Event', 6, 'Santo António das Areias', '2025-05-18', '6:14:17', '17:04:51', 'archive', 0),
  (178, 'Graduation', 2, 'Arroio do Meio', '2025-03-27', '8:45:34', '11:46:27', 'reciprocal', 0),
  (179, 'Taster Session', 3, 'Donja Brela', '2024-03-27', '11:07:02', '13:02:05', 'grid-enabled', 0),
  (180, 'Graduation', 6, 'Dongtou', '2024-11-21', '9:11:13', '5:41:18', 'systematic', 0),
  (181, 'Assessment Day', 2, 'Gēdo', '2024-01-10', '14:45:38', '6:39:18', 'Horizontal', 0),
  (182, 'Sprint Review', 5, 'Mercier', '2024-09-21', '17:35:02', '9:31:56', 'Face to face', 0),
  (183, 'Hiring Event', 6, 'Haitou', '2025-05-20', '18:21:12', '0:32:57', 'capacity', 0),
  (184, 'Graduation', 4, 'Az Zarbah', '2023-11-24', '3:28:43', '12:21:51', 'bottom-line', 0),
  (185, 'Taster Session', 1, 'Shchëkino', '2024-08-01', '12:37:03', '3:49:33', 'mobile', 0),
  (186, 'Graduation', 5, 'Uppsala', '2024-04-24', '12:11:28', '0:35:45', 'empowering', 0),
  (187, 'Assessment Day', 2, 'Weixin', '2023-07-14', '19:11:29', '1:45:19', 'bi-directional', 0),
  (188, 'Sprint Review', 2, 'Mellila', '2023-08-14', '22:26:00', '21:22:33', '4th generation', 0),
  (189, 'Hiring Event', 5, 'Wolmaransstad', '2025-11-23', '6:23:11', '5:27:12', 'Phased', 0),
  (190, 'Graduation', 4, 'Valença do Douro', '2024-12-27', '8:04:34', '5:55:46', 'Programmable', 0),
  (191, 'Taster Session', 6, 'Doroslovo', '2025-07-07', '22:23:16', '6:50:50', 'multi-state', 0),
  (192, 'Graduation', 4, 'Niños Heroes', '2024-05-06', '14:20:15', '20:44:28', 'capacity', 0),
  (193, 'Assessment Day', 6, 'Niederwaldkirchen', '2025-08-12', '5:16:30', '16:33:09', 'artificial intelligence', 0),
  (194, 'Sprint Review', 1, 'Chaoyang', '2024-07-23', '0:06:15', '17:09:37', 'encoding', 0),
  (195, 'Hiring Event', 2, 'Nassarawa', '2025-10-05', '17:19:34', '13:02:28', 'composite', 0),
  (196, 'Graduation', 3, 'Zhangbei', '2024-05-21', '22:19:07', '13:47:20', 'maximized', 0),
  (197, 'Taster Session', 6, 'Haarlem', '2025-09-01', '19:07:36', '9:11:00', 'Graphical User Interface', 0),
  (198, 'Graduation', 4, 'Lom Kao', '2023-10-30', '0:47:14', '1:40:17', 'Switchable', 0),
  (199, 'Assessment Day', 6, 'La Goulette', '2023-01-10', '0:00:11', '22:33:13', 'Exclusive', 0),
  (200, 'Sprint Review', 5, 'Manas', '2024-04-04', '21:30:20', '0:15:28', 'Vision-oriented', 0),
  (201, 'Hiring Event', 5, 'Lhari', '2024-09-12', '2:48:05', '12:33:43', 'flexibility', 0),
  (202, 'Graduation', 6, 'Widorokandang', '2024-01-09', '10:34:17', '0:33:06', 'disintermediate', 0),
  (203, 'Taster Session', 4, 'Berlin', '2025-08-31', '4:52:07', '17:53:02', 'solution-oriented', 0),
  (204, 'Graduation', 3, 'Xiawa', '2025-07-15', '5:57:46', '0:17:43', 'Proactive', 0),
  (205, 'Assessment Day', 2, 'London', '2025-01-22', '14:57:48', '17:41:38', 'support', 0),
  (206, 'Sprint Review', 2, 'Beihe', '2024-11-08', '10:38:12', '20:08:28', 'coherent', 0),
  (207, 'Hiring Event', 6, 'Calaba', '2025-03-09', '22:42:59', '16:08:03', 'human-resource', 0),
  (208, 'Graduation', 2, 'Daluo', '2023-02-17', '13:00:31', '19:08:12', 'capability', 0),
  (209, 'Taster Session', 1, 'Bastia', '2024-11-24', '2:35:50', '5:29:41', 'installation', 0),
  (210, 'Graduation', 5, 'Mamonit', '2024-03-24', '17:53:20', '4:21:45', 'Business-focused', 0),
  (211, 'Assessment Day', 4, 'Castilla', '2023-09-04', '7:48:14', '6:35:22', 'benchmark', 0),
  (212, 'Sprint Review', 5, 'Straszydle', '2023-03-21', '0:53:15', '16:35:05', 'coherent', 0),
  (213, 'Hiring Event', 6, 'Tianjiazhai', '2025-02-20', '19:28:25', '6:09:25', 'product', 0),
  (214, 'Graduation', 6, 'Nanzhao', '2025-09-24', '12:36:00', '4:05:21', 'uniform', 0),
  (215, 'Taster Session', 5, 'Chornukhy', '2023-09-01', '19:51:03', '13:21:54', 'coherent', 0),
  (216, 'Graduation', 6, 'Balabagan', '2023-08-04', '20:33:01', '18:44:48', 'empowering', 0),
  (217, 'Assessment Day', 4, 'Tamanan', '2025-04-28', '1:25:44', '2:31:49', 'bifurcated', 0),
  (218, 'Sprint Review', 5, 'Sohbatpur', '2025-07-28', '10:45:30', '6:00:42', 'artificial intelligence', 0),
  (219, 'Hiring Event', 3, 'Zastron', '2023-01-31', '1:07:21', '9:04:27', 'Secured', 0),
  (220, 'Graduation', 1, 'Haixing', '2025-02-25', '15:26:31', '5:43:39', 'heuristic', 0),
  (221, 'Taster Session', 4, 'Noyelles-sous-Lens', '2025-09-20', '0:50:57', '7:59:10', 'holistic', 0),
  (222, 'Graduation', 4, 'Yermolino', '2023-05-22', '13:59:18', '19:45:40', 'functionalities', 0),
  (223, 'Assessment Day', 3, 'Keboncau', '2023-01-02', '3:11:48', '13:24:37', 'support', 0),
  (224, 'Sprint Review', 4, 'Vřesina', '2024-12-30', '14:23:39', '10:49:12', 'mission-critical', 0),
  (225, 'Hiring Event', 3, 'Bethanie', '2025-04-14', '8:32:56', '18:43:46', 'Open-architected', 0),
  (226, 'Graduation', 1, 'Reforma', '2023-09-15', '13:09:45', '10:26:46', 'directional', 0),
  (227, 'Taster Session', 5, 'Tatuí', '2025-01-20', '22:23:55', '14:22:01', 'circuit', 0),
  (228, 'Graduation', 4, 'Tata', '2025-11-08', '22:05:54', '16:56:03', 'multi-state', 0),
  (229, 'Assessment Day', 1, 'Pridonskoy', '2023-09-23', '14:44:21', '16:20:35', 'demand-driven', 0),
  (230, 'Sprint Review', 6, 'Diepsloot', '2023-04-02', '15:45:40', '9:52:03', 'Graphical User Interface', 0),
  (231, 'Hiring Event', 2, 'Cigoong', '2023-07-30', '11:32:37', '0:25:48', 'systemic', 0),
  (232, 'Graduation', 1, 'Lianan', '2025-02-10', '14:02:41', '17:12:47', 'Progressive', 0),
  (233, 'Taster Session', 2, 'Mlanggeng', '2024-08-05', '4:19:18', '0:04:15', 'optimizing', 0),
  (234, 'Graduation', 3, 'Pimenta Bueno', '2023-11-07', '6:55:35', '12:17:24', 'Pre-emptive', 0),
  (235, 'Assessment Day', 5, 'Tianfen', '2024-06-02', '10:38:07', '17:22:05', 'local area network', 0),
  (236, 'Sprint Review', 4, 'Paris 12', '2025-04-22', '4:28:13', '18:46:45', 'eco-centric', 0),
  (237, 'Hiring Event', 1, 'Ar Rumaythah', '2024-07-07', '10:38:21', '11:58:52', 'structure', 0),
  (238, 'Graduation', 3, 'Fengyang', '2023-04-28', '12:04:03', '6:58:24', 'Stand-alone', 0),
  (239, 'Taster Session', 4, 'Liushan', '2024-02-11', '21:57:04', '17:07:31', 'Business-focused', 0),
  (240, 'Graduation', 4, 'Suishan', '2023-11-05', '18:18:05', '18:37:36', 'Grass-roots', 0),
  (241, 'Assessment Day', 3, 'Pregonero', '2024-09-03', '8:04:06', '13:55:22', 'Phased', 0),
  (242, 'Sprint Review', 1, 'Ballina', '2025-06-24', '1:39:06', '8:52:20', 'Visionary', 0),
  (243, 'Hiring Event', 6, 'Oral', '2024-12-14', '19:44:20', '11:10:25', 'secured line', 0),
  (244, 'Graduation', 5, 'Bobowo', '2023-03-14', '16:47:13', '14:56:46', 'instruction set', 0),
  (245, 'Taster Session', 4, 'Chillán', '2025-07-28', '12:24:30', '11:32:13', 'Proactive', 0),
  (246, 'Graduation', 1, 'Vila Flor', '2023-02-27', '17:48:37', '11:58:07', 'policy', 0),
  (247, 'Assessment Day', 5, 'Longvic', '2023-10-28', '7:19:57', '10:10:53', 'interactive', 0),
  (248, 'Sprint Review', 4, 'La Hacienda', '2025-06-29', '2:14:28', '16:54:54', 'strategy', 0),
  (249, 'Hiring Event', 1, 'Araucária', '2023-08-08', '2:38:46', '9:20:42', 'client-server', 0),
  (250, 'Graduation', 3, 'Yongfeng', '2023-08-05', '1:20:39', '19:01:26', 'product', 0),
  (251, 'Taster Session', 6, 'Cabangan', '2025-01-30', '22:50:33', '16:33:53', 'access', 0),
  (252, 'Graduation', 2, 'Triwil', '2024-01-17', '10:23:35', '20:51:39', 'Total', 0),
  (253, 'Assessment Day', 3, 'Vydreno', '2025-07-18', '16:33:10', '15:42:16', 'disintermediate', 0),
  (254, 'Sprint Review', 3, 'Kasba Tadla', '2025-07-08', '0:54:51', '15:17:10', 'moratorium', 0),
  (255, 'Hiring Event', 5, 'San Antonio', '2024-09-01', '15:32:03', '6:37:10', 'incremental', 0),
  (256, 'Graduation', 4, 'Brumado', '2025-09-02', '19:47:02', '20:17:56', 'Synergistic', 0),
  (257, 'Taster Session', 6, 'Challans', '2025-03-18', '5:11:33', '4:30:02', 'Distributed', 0),
  (258, 'Graduation', 2, 'Kulpin', '2023-04-22', '21:28:19', '14:44:11', 'infrastructure', 0),
  (259, 'Assessment Day', 5, 'Parizh', '2025-02-12', '4:40:01', '7:32:53', 'Exclusive', 0),
  (260, 'Sprint Review', 3, 'San Carlos', '2023-01-31', '9:16:45', '10:46:42', 'Inverse', 0),
  (261, 'Hiring Event', 5, 'General Viamonte', '2024-03-02', '12:06:09', '1:08:48', 'tertiary', 0),
  (262, 'Graduation', 5, 'Ryazan', '2024-08-12', '16:08:08', '14:34:23', 'algorithm', 0),
  (263, 'Taster Session', 2, 'Sarrebourg', '2024-05-11', '7:43:14', '6:43:51', 'approach', 0),
  (264, 'Graduation', 5, 'Pomar', '2023-02-10', '2:28:48', '3:02:51', 'Down-sized', 0),
  (265, 'Assessment Day', 6, 'Tall Tamr', '2024-09-22', '4:21:22', '4:45:03', 'Total', 0),
  (266, 'Sprint Review', 4, 'Néos Skopós', '2024-04-09', '9:16:05', '3:54:29', 'empowering', 0),
  (267, 'Hiring Event', 6, 'Lišov', '2023-06-23', '20:50:00', '8:16:18', '3rd generation', 0),
  (268, 'Graduation', 3, 'Emmen', '2025-10-25', '18:09:38', '22:26:32', 'multi-tasking', 0),
  (269, 'Taster Session', 3, 'Carquefou', '2023-09-05', '1:57:06', '17:11:37', 'framework', 0),
  (270, 'Graduation', 2, 'Davyd-Haradok', '2023-06-04', '16:07:50', '1:50:03', 'Object-based', 0),
  (271, 'Assessment Day', 5, 'Krajan Caluk', '2025-08-14', '3:22:18', '1:31:18', 'portal', 0),
  (272, 'Sprint Review', 2, 'Kasreman Wetan', '2023-10-14', '22:25:45', '12:16:34', 'Distributed', 0),
  (273, 'Hiring Event', 5, 'Mazamet', '2024-12-17', '3:54:27', '18:21:32', 'data-warehouse', 0),
  (274, 'Graduation', 3, 'Val-d''Or', '2024-05-14', '11:41:37', '7:10:16', 'Total', 0),
  (275, 'Taster Session', 5, 'Port-de-Bouc', '2024-01-01', '14:32:00', '11:25:40', 'array', 0),
  (276, 'Graduation', 5, 'Pisarzowice', '2023-12-10', '3:38:54', '10:59:03', 'Future-proofed', 0),
  (277, 'Assessment Day', 3, 'Paço', '2025-10-27', '1:41:49', '8:08:05', 'motivating', 0),
  (278, 'Sprint Review', 4, 'Ural', '2023-09-10', '15:02:49', '0:20:34', 'real-time', 0),
  (279, 'Hiring Event', 3, 'Plérin', '2025-03-24', '14:01:14', '0:18:15', 'workforce', 0),
  (280, 'Graduation', 3, 'Jardinópolis', '2025-02-16', '3:49:19', '17:34:54', 'background', 0),
  (281, 'Taster Session', 2, 'Pivka', '2024-10-02', '8:03:43', '8:44:45', 'Grass-roots', 0),
  (282, 'Graduation', 2, 'Junyang', '2024-06-24', '6:58:16', '7:59:22', 'Versatile', 0),
  (283, 'Assessment Day', 3, 'Calatrava', '2025-11-11', '12:31:17', '17:56:46', 'Upgradable', 0),
  (284, 'Sprint Review', 5, 'Broumov', '2024-07-12', '19:25:34', '2:55:23', 'infrastructure', 0),
  (285, 'Hiring Event', 4, 'Yongfa', '2025-03-22', '7:39:50', '17:07:35', 'application', 0),
  (286, 'Graduation', 1, 'Ciechanowiec', '2023-04-29', '11:41:47', '1:04:49', 'Programmable', 0),
  (287, 'Taster Session', 4, 'Pidsandawan', '2025-02-12', '3:48:52', '22:15:41', 'national', 0),
  (288, 'Graduation', 3, 'Brovary', '2025-10-26', '9:48:59', '8:44:23', 'client-driven', 0),
  (289, 'Assessment Day', 5, 'Bintuni', '2023-09-16', '1:02:39', '3:28:20', 'next generation', 0),
  (290, 'Sprint Review', 1, 'Gora', '2024-07-16', '18:14:44', '4:07:00', 'Cross-platform', 0),
  (291, 'Hiring Event', 5, 'Örnsköldsvik', '2024-04-21', '20:32:35', '2:39:52', 'discrete', 0),
  (292, 'Graduation', 5, 'Sang-e Chārak', '2023-07-18', '13:21:36', '18:04:25', 'high-level', 0),
  (293, 'Taster Session', 2, 'Flora', '2025-05-27', '12:37:26', '10:13:00', 'Seamless', 0),
  (294, 'Graduation', 3, 'Blainville', '2022-12-11', '11:41:42', '18:06:22', 'standardization', 0),
  (295, 'Assessment Day', 6, 'San Luis', '2025-06-28', '18:57:06', '18:33:34', 'fresh-thinking', 0),
  (296, 'Sprint Review', 6, 'Krynki', '2023-03-15', '16:25:45', '21:44:52', 'Cross-group', 0),
  (297, 'Hiring Event', 3, 'Strum', '2025-07-12', '5:20:29', '12:12:41', 'Vision-oriented', 0),
  (298, 'Graduation', 3, 'Kfar NaOranim', '2023-12-10', '1:43:20', '21:16:43', 'collaboration', 0),
  (299, 'Taster Session', 4, 'Thị Trấn Phước Bửu', '2025-09-13', '0:36:06', '12:51:34', 'leading edge', 0),
  (300, 'Graduation', 2, 'Shangyang', '2023-09-16', '12:01:03', '9:15:02', 'reciprocal', 0),
  (301, 'Assessment Day', 2, 'Hidalgo', '2025-08-06', '6:06:28', '12:39:30', 'asymmetric', 0),
  (302, 'Sprint Review', 1, 'Itabira', '2024-04-16', '22:06:26', '8:49:29', 'Centralized', 0),
  (303, 'Hiring Event', 1, 'Lampari', '2024-10-08', '4:33:51', '1:31:49', 'Decentralized', 0),
  (304, 'Graduation', 5, 'Jingkou', '2024-12-25', '9:03:18', '19:36:57', 'matrix', 0),
  (305, 'Taster Session', 3, 'Banī Zayd', '2023-05-16', '1:44:28', '15:47:53', 'zero defect', 0),
  (306, 'Graduation', 1, 'Parikkala', '2024-02-13', '10:21:02', '1:26:04', 'model', 0),
  (307, 'Assessment Day', 5, 'Mongaguá', '2023-06-14', '5:00:05', '15:53:34', 'zero tolerance', 0),
  (308, 'Sprint Review', 5, 'Xianhe', '2024-06-04', '13:38:01', '20:20:31', 'utilisation', 0),
  (309, 'Hiring Event', 3, 'Besançon', '2025-11-13', '8:36:53', '20:55:09', 'Front-line', 0),
  (310, 'Graduation', 5, 'Brampton', '2025-05-10', '3:08:50', '9:59:01', 'maximized', 0),
  (311, 'Taster Session', 4, 'Novominskaya', '2023-10-20', '0:55:46', '4:11:01', 'Sharable', 0),
  (312, 'Graduation', 5, 'Pedamaran', '2023-01-26', '0:14:21', '17:47:04', 'asynchronous', 0),
  (313, 'Assessment Day', 4, 'Thayetmyo', '2025-03-01', '9:28:34', '13:01:50', 'tertiary', 0),
  (314, 'Sprint Review', 3, 'Salsk', '2024-04-18', '6:11:34', '19:00:12', 'optimal', 0),
  (315, 'Hiring Event', 3, 'Ferraz de Vasconcelos', '2025-05-01', '0:13:52', '16:39:16', 'radical', 0),
  (316, 'Graduation', 2, 'Jinqiao', '2024-11-07', '20:52:32', '17:43:05', 'fresh-thinking', 0),
  (317, 'Taster Session', 2, 'Heshi', '2023-02-26', '21:08:41', '16:05:46', 'multimedia', 0),
  (318, 'Graduation', 2, 'Falun', '2023-08-29', '3:36:11', '3:55:20', 'support', 0),
  (319, 'Assessment Day', 1, 'Cayenne', '2024-10-31', '17:38:39', '22:50:40', 'bi-directional', 0),
  (320, 'Sprint Review', 6, 'Albuquerque', '2025-11-02', '18:53:14', '10:28:48', 'Integrated', 0),
  (321, 'Hiring Event', 5, 'Holboo', '2023-07-24', '18:45:22', '22:24:13', 'asymmetric', 0),
  (322, 'Graduation', 1, 'Khursā', '2025-09-11', '9:00:09', '19:56:24', '24 hour', 0),
  (323, 'Taster Session', 3, 'Cabugao', '2023-04-30', '0:00:25', '16:13:31', 'architecture', 0),
  (324, 'Graduation', 1, 'Aershan', '2023-05-29', '7:06:26', '0:34:20', 'Universal', 0),
  (325, 'Assessment Day', 3, 'Yuanquan', '2025-09-02', '8:34:12', '16:08:21', 'bottom-line', 0),
  (326, 'Sprint Review', 6, 'Bang Sai', '2023-12-12', '1:39:35', '19:24:41', 'hardware', 0),
  (327, 'Hiring Event', 3, 'Charopó', '2023-07-31', '21:16:30', '0:54:25', 'leverage', 0),
  (328, 'Graduation', 1, 'Uspenka', '2024-09-16', '6:28:33', '20:38:34', 'Extended', 0),
  (329, 'Taster Session', 5, 'Jauja', '2025-08-10', '9:36:50', '8:47:25', 'responsive', 0),
  (330, 'Graduation', 4, 'Babica', '2024-10-04', '8:38:02', '1:37:31', 'orchestration', 0),
  (331, 'Assessment Day', 4, 'Podporozhye', '2023-01-24', '1:40:26', '15:32:55', 'context-sensitive', 0),
  (332, 'Sprint Review', 2, 'Zakliczyn', '2023-07-30', '9:58:56', '20:56:11', 'interactive', 0),
  (333, 'Hiring Event', 1, 'Karanganyar', '2023-08-30', '19:12:18', '1:25:56', 'empowering', 0),
  (334, 'Graduation', 5, 'Sarnia', '2025-03-22', '1:34:41', '16:00:37', 'website', 0),
  (335, 'Taster Session', 2, 'Karangmulya', '2024-12-15', '4:00:27', '8:53:23', 'Multi-tiered', 0),
  (336, 'Graduation', 6, 'Biggar', '2023-05-05', '9:02:12', '6:04:47', 'Synchronised', 0),
  (337, 'Assessment Day', 2, 'Kyonju', '2024-10-19', '3:25:08', '22:12:14', 'fault-tolerant', 0),
  (338, 'Sprint Review', 5, 'Vacha', '2024-09-18', '10:59:36', '8:08:25', 'Virtual', 0),
  (339, 'Hiring Event', 3, 'Lyubashivka', '2023-10-29', '18:22:13', '15:15:22', 'toolset', 0),
  (340, 'Graduation', 5, 'Pundong', '2023-12-11', '20:17:57', '21:13:34', 'Reactive', 0),
  (341, 'Taster Session', 1, 'Illéla', '2025-10-22', '2:46:53', '15:58:49', 'Sharable', 0),
  (342, 'Graduation', 6, 'Itapemirim', '2024-06-07', '11:48:19', '19:58:18', 'infrastructure', 0),
  (343, 'Assessment Day', 4, 'Líbano', '2024-03-16', '5:50:00', '20:55:32', 'Enterprise-wide', 0),
  (344, 'Sprint Review', 1, 'Tha Mai', '2023-05-04', '9:21:36', '20:56:33', 'superstructure', 0),
  (345, 'Hiring Event', 6, 'Mulifanua', '2022-12-11', '7:51:09', '22:06:14', 'Devolved', 0),
  (346, 'Graduation', 3, 'Dadus', '2024-10-06', '17:48:48', '12:02:43', 'moratorium', 0),
  (347, 'Taster Session', 5, 'San Carlos', '2023-11-07', '14:18:46', '17:47:50', 'challenge', 0),
  (348, 'Graduation', 4, 'Roubaix', '2025-03-27', '5:48:32', '7:04:22', 'contingency', 0),
  (349, 'Assessment Day', 6, 'Eišiškės', '2024-10-11', '5:42:23', '20:53:57', 'Decentralized', 0),
  (350, 'Sprint Review', 1, 'Yongfeng', '2023-12-03', '4:26:59', '4:15:38', 'coherent', 0),
  (351, 'Hiring Event', 5, 'Osiek', '2023-01-07', '10:07:10', '4:27:58', 'composite', 0),
  (352, 'Graduation', 4, 'Stradbally', '2025-03-12', '22:12:05', '15:39:20', '6th generation', 0),
  (353, 'Taster Session', 5, 'Kazo', '2024-12-07', '8:18:13', '19:57:49', 'forecast', 0),
  (354, 'Graduation', 5, 'Valtimo', '2023-11-07', '2:43:04', '21:13:29', 'Exclusive', 0),
  (355, 'Assessment Day', 5, 'Tirtopuro', '2024-06-13', '15:20:51', '12:27:16', 'Organized', 0),
  (356, 'Sprint Review', 5, 'Yantak', '2023-03-28', '4:43:47', '6:41:59', 'Cross-group', 0),
  (357, 'Hiring Event', 1, 'Pasirpanjang', '2024-11-04', '14:47:19', '12:58:44', 'bandwidth-monitored', 0),
  (358, 'Graduation', 6, 'Senadan', '2025-08-19', '9:20:02', '19:12:18', 'bifurcated', 0),
  (359, 'Taster Session', 6, 'Bistrica ob Sotli', '2023-09-27', '4:03:27', '16:49:16', 'leverage', 0),
  (360, 'Graduation', 5, 'San Antonio', '2022-11-27', '8:35:36', '20:55:22', 'non-volatile', 0),
  (361, 'Assessment Day', 2, 'Concepcion', '2025-06-06', '6:36:22', '15:42:46', 'leading edge', 0),
  (362, 'Sprint Review', 2, 'Täby', '2025-06-12', '18:40:44', '21:19:18', 'Compatible', 0),
  (363, 'Hiring Event', 2, 'Pombal', '2023-09-30', '14:18:35', '6:33:58', 'hierarchy', 0),
  (364, 'Graduation', 1, 'Jiangkou', '2025-02-03', '3:00:26', '0:59:07', 'mobile', 0),
  (365, 'Taster Session', 6, 'Cotton Ground', '2025-04-08', '5:34:02', '17:25:24', 'product', 0),
  (366, 'Graduation', 6, 'Dushan', '2025-01-31', '10:54:40', '11:29:39', 'analyzer', 0),
  (367, 'Assessment Day', 2, 'Kopayhorod', '2025-09-18', '5:57:47', '10:19:26', 'Visionary', 0),
  (368, 'Sprint Review', 4, 'Liugong', '2025-02-23', '10:08:35', '12:31:11', 'instruction set', 0),
  (369, 'Hiring Event', 5, 'Bila Krynytsya', '2025-06-11', '15:50:49', '13:43:04', 'Graphical User Interface', 0),
  (370, 'Graduation', 5, 'Zwolle', '2024-10-01', '1:39:11', '21:23:38', 'model', 0),
  (371, 'Taster Session', 1, 'Myaydo', '2023-04-11', '0:21:52', '0:36:56', 'internet solution', 0),
  (372, 'Graduation', 5, 'Wangying', '2024-09-14', '0:16:57', '14:02:54', 'database', 0),
  (373, 'Assessment Day', 5, 'Rawaglagah', '2025-10-06', '3:23:28', '20:17:12', '6th generation', 0),
  (374, 'Sprint Review', 1, 'Linköping', '2023-04-02', '6:48:59', '10:17:05', 'reciprocal', 0),
  (375, 'Hiring Event', 3, 'Himaya', '2024-10-31', '10:31:05', '2:23:57', 'disintermediate', 0),
  (376, 'Graduation', 3, 'Lynchburg', '2023-04-10', '12:41:08', '9:27:12', 'mission-critical', 0),
  (377, 'Taster Session', 1, 'El Paso', '2025-04-14', '20:47:21', '16:44:07', 'synergy', 0),
  (378, 'Graduation', 1, 'Rogóźno', '2022-12-02', '8:36:52', '10:28:01', 'knowledge user', 0),
  (379, 'Assessment Day', 6, 'Faīẕābād', '2025-02-12', '14:15:23', '3:52:14', 'object-oriented', 0),
  (380, 'Sprint Review', 3, 'Laiponda', '2025-05-22', '16:23:42', '12:14:07', 'Self-enabling', 0),
  (381, 'Hiring Event', 6, 'Taganskiy', '2023-02-16', '9:31:35', '20:26:28', 'portal', 0),
  (382, 'Graduation', 2, 'Wangliao', '2024-02-18', '21:11:51', '13:12:12', 'definition', 0),
  (383, 'Taster Session', 6, 'Huichang', '2023-03-16', '5:58:24', '9:17:30', 'Organized', 0),
  (384, 'Graduation', 5, 'Farīmān', '2025-11-14', '19:27:39', '20:09:54', 'Open-source', 0),
  (385, 'Assessment Day', 5, 'Tshikapa', '2025-06-05', '16:11:40', '4:00:08', '6th generation', 0),
  (386, 'Sprint Review', 6, 'La Caleta Culebras', '2023-06-19', '8:21:13', '21:56:56', 'info-mediaries', 0),
  (387, 'Hiring Event', 5, 'Piteå', '2024-04-20', '19:38:21', '21:07:57', 'Object-based', 0),
  (388, 'Graduation', 2, 'Quartier Morin', '2024-02-05', '12:52:39', '18:56:17', 'even-keeled', 0),
  (389, 'Taster Session', 3, 'Čeladná', '2025-08-21', '4:07:55', '2:43:01', '4th generation', 0),
  (390, 'Graduation', 3, 'Liozon', '2023-07-13', '7:12:14', '3:21:45', 'solution-oriented', 0),
  (391, 'Assessment Day', 4, 'Cilolongokan', '2024-11-03', '16:59:47', '16:25:56', 'clear-thinking', 0),
  (392, 'Sprint Review', 4, 'Novoanninskiy', '2025-09-13', '3:16:27', '1:56:25', 'Visionary', 0),
  (393, 'Hiring Event', 6, 'Hinthada', '2024-03-01', '10:51:17', '1:54:49', 'encoding', 0),
  (394, 'Graduation', 4, 'Francisco Villa', '2025-08-31', '21:30:49', '6:15:55', 'Distributed', 0),
  (395, 'Taster Session', 6, 'Bloemfontein', '2025-07-14', '10:35:24', '13:53:52', 'Balanced', 0),
  (396, 'Graduation', 4, 'Xuxiake', '2023-10-17', '17:23:09', '10:45:07', 'help-desk', 0),
  (397, 'Assessment Day', 6, 'Fovissste', '2023-06-21', '17:44:21', '4:46:40', 'incremental', 0),
  (398, 'Sprint Review', 4, 'Xinxu', '2025-05-24', '12:04:42', '3:00:51', 'Profound', 0),
  (399, 'Hiring Event', 1, 'Sabang', '2025-02-02', '21:34:48', '16:26:14', 'Compatible', 0),
  (400, 'Graduation', 3, 'Hägersten', '2024-10-18', '3:11:38', '4:58:16', 'explicit', 0),
  (401, 'Taster Session', 6, 'Shawnee Mission', '2023-12-15', '4:52:20', '11:56:00', 'Re-engineered', 0),
  (402, 'Graduation', 1, 'Mañazo', '2023-03-26', '6:03:25', '18:11:45', 'Synchronised', 0),
  (403, 'Assessment Day', 1, 'Paris 20', '2024-02-22', '2:40:54', '0:39:31', 'Versatile', 0),
  (404, 'Sprint Review', 1, 'Cercal', '2024-10-02', '7:51:49', '17:34:05', 'hub', 0),
  (405, 'Hiring Event', 1, 'Lameiras', '2024-08-08', '0:02:53', '22:18:27', 'motivating', 0),
  (406, 'Graduation', 2, 'Datong', '2023-01-21', '20:34:27', '3:28:36', 'methodology', 0),
  (407, 'Taster Session', 2, 'Yuelai', '2025-07-14', '8:12:23', '3:51:03', 'tertiary', 0),
  (408, 'Graduation', 2, 'Sawoi', '2025-09-10', '8:22:18', '8:32:08', 'heuristic', 0),
  (409, 'Assessment Day', 6, 'Romanovskaya', '2022-12-01', '3:39:07', '0:13:34', 'optimizing', 0),
  (410, 'Sprint Review', 3, 'Lysychovo', '2024-08-01', '11:33:19', '11:03:13', 'customer loyalty', 0),
  (411, 'Hiring Event', 5, 'Yukuhashi', '2023-11-02', '5:47:37', '8:35:58', 'Re-contextualized', 0),
  (412, 'Graduation', 6, 'Vyshniy Volochëk', '2024-08-05', '17:38:59', '17:58:59', 'website', 0),
  (413, 'Taster Session', 3, 'Ust-Abakan', '2025-01-22', '5:05:37', '2:08:13', 'Inverse', 0),
  (414, 'Graduation', 4, 'Kuliyapitiya', '2023-12-26', '16:25:40', '7:22:38', 'bi-directional', 0),
  (415, 'Assessment Day', 6, 'Karanganyar', '2025-10-23', '11:26:59', '19:17:27', 'Devolved', 0),
  (416, 'Sprint Review', 6, 'Buriwutung', '2024-11-18', '20:45:57', '22:10:57', 'systemic', 0),
  (417, 'Hiring Event', 2, 'Wangdain', '2024-05-04', '1:30:20', '13:39:51', 'maximized', 0),
  (418, 'Graduation', 1, 'Kiruru', '2023-07-16', '7:41:59', '17:30:40', 'mobile', 0),
  (419, 'Taster Session', 1, 'Moorreesburg', '2024-10-13', '0:24:42', '21:39:21', 'Quality-focused', 0),
  (420, 'Graduation', 6, 'Panggungwinong', '2025-11-04', '22:17:50', '20:43:19', 'functionalities', 0),
  (421, 'Assessment Day', 1, 'Poljčane', '2025-04-24', '13:02:36', '5:33:53', 'client-server', 0),
  (422, 'Sprint Review', 3, 'Pierzchnica', '2024-11-01', '15:48:02', '0:35:36', 'Advanced', 0),
  (423, 'Hiring Event', 1, 'Andalan', '2023-06-15', '1:08:08', '21:50:01', 'maximized', 0),
  (424, 'Graduation', 1, 'Pameungpeuk', '2023-10-26', '4:12:23', '18:15:23', 'regional', 0),
  (425, 'Taster Session', 3, 'Sagaing', '2025-11-08', '17:28:21', '20:43:14', 'Reverse-engineered', 0),
  (426, 'Graduation', 5, 'Ha', '2025-08-06', '9:32:18', '12:51:37', 'support', 0),
  (427, 'Assessment Day', 4, 'Yangzi Jianglu', '2024-09-12', '2:04:36', '12:19:01', 'reciprocal', 0),
  (428, 'Sprint Review', 1, 'Mawu', '2025-03-15', '19:19:21', '10:02:02', 'core', 0),
  (429, 'Hiring Event', 2, 'Kanuma', '2024-08-29', '4:56:35', '17:17:44', 'Profit-focused', 0),
  (430, 'Graduation', 2, 'Veisiejai', '2024-04-30', '10:45:57', '6:31:49', 'Progressive', 0),
  (431, 'Taster Session', 2, 'Nîmes', '2024-01-03', '5:19:46', '0:33:38', 'Multi-layered', 0),
  (432, 'Graduation', 2, 'Vrakháti', '2025-07-28', '6:26:55', '22:13:21', 'hub', 0),
  (433, 'Assessment Day', 4, 'Sumanding', '2024-01-07', '20:03:05', '16:59:18', 'Self-enabling', 0),
  (434, 'Sprint Review', 1, 'Jiasi', '2025-09-28', '8:59:57', '11:34:14', 'Synchronised', 0),
  (435, 'Hiring Event', 4, 'Xiadingjia', '2023-11-13', '14:41:10', '20:45:27', 'Configurable', 0),
  (436, 'Graduation', 4, 'Baião', '2024-06-12', '3:27:22', '22:03:13', '6th generation', 0),
  (437, 'Taster Session', 3, 'Cerquilho', '2024-06-03', '16:09:29', '22:31:59', 'Monitored', 0),
  (438, 'Graduation', 6, 'Malaya Dubna', '2024-04-08', '19:47:38', '4:43:29', 'portal', 0),
  (439, 'Assessment Day', 1, 'Nacaome', '2023-03-31', '13:54:25', '16:54:09', 'Managed', 0),
  (440, 'Sprint Review', 4, 'Oslo', '2023-11-27', '7:24:53', '17:38:53', 'zero defect', 0),
  (441, 'Hiring Event', 3, 'Latacunga', '2025-09-26', '21:51:15', '3:39:15', 'didactic', 0),
  (442, 'Graduation', 5, 'Ingenio La Esperanza', '2025-04-03', '3:03:08', '17:10:56', 'parallelism', 0),
  (443, 'Taster Session', 1, 'Mukhen', '2024-03-26', '11:41:36', '13:23:42', 'multi-state', 0),
  (444, 'Graduation', 1, 'Cartago', '2024-01-13', '11:51:27', '11:51:32', 'system-worthy', 0),
  (445, 'Assessment Day', 3, 'Pasadena', '2024-07-25', '2:17:16', '4:59:55', 'Team-oriented', 0),
  (446, 'Sprint Review', 5, 'Guangfu', '2023-07-04', '16:04:17', '11:16:16', 'Ergonomic', 0),
  (447, 'Hiring Event', 5, 'Bima', '2023-10-13', '8:04:40', '10:42:52', 'framework', 0),
  (448, 'Graduation', 6, 'Křižanov', '2025-07-04', '11:44:55', '18:49:16', 'interactive', 0),
  (449, 'Taster Session', 4, 'Marićka', '2024-10-29', '18:35:32', '20:58:56', 'executive', 0),
  (450, 'Graduation', 2, 'Balakliya', '2023-11-09', '10:04:49', '6:01:39', 'client-server', 0),
  (451, 'Assessment Day', 2, 'Bokoro', '2024-04-29', '14:54:52', '20:39:24', 'Right-sized', 0),
  (452, 'Sprint Review', 1, 'Sruni', '2025-01-20', '12:46:53', '13:41:34', 'frame', 0),
  (453, 'Hiring Event', 6, 'Krajan Sidodadi', '2025-08-10', '21:44:26', '18:40:01', 'focus group', 0),
  (454, 'Graduation', 4, 'Pantenan', '2024-06-26', '19:34:17', '5:47:47', 'Universal', 0),
  (455, 'Taster Session', 5, 'Muraloka', '2025-01-06', '21:50:32', '11:10:51', 'Centralized', 0),
  (456, 'Graduation', 5, 'Frederiksberg', '2025-02-11', '11:29:32', '9:52:10', 'emulation', 0),
  (457, 'Assessment Day', 1, 'Sarvābād', '2023-08-28', '0:54:29', '3:08:52', 'instruction set', 0),
  (458, 'Sprint Review', 2, 'Ninger', '2024-08-24', '6:35:26', '11:43:03', 'website', 0),
  (459, 'Hiring Event', 6, 'Jeponkrajan', '2025-01-21', '6:09:13', '7:19:31', 'Up-sized', 0),
  (460, 'Graduation', 1, 'Penelas', '2025-07-15', '6:15:26', '14:47:20', 'non-volatile', 0),
  (461, 'Taster Session', 5, 'Ramenki', '2025-06-21', '3:29:08', '14:59:26', '4th generation', 0),
  (462, 'Graduation', 2, 'Kasreman', '2023-06-23', '7:18:27', '22:06:24', 'Operative', 0),
  (463, 'Assessment Day', 5, 'Lusambo', '2025-05-29', '21:12:36', '2:04:08', 'conglomeration', 0),
  (464, 'Sprint Review', 4, 'Caldas da Felgueira', '2023-06-20', '10:43:05', '5:33:55', '24 hour', 0),
  (465, 'Hiring Event', 1, 'Verkhnyaya Khava', '2024-03-04', '21:45:55', '1:09:29', 'functionalities', 0),
  (466, 'Graduation', 2, 'Maukaro', '2025-08-31', '12:24:30', '10:24:47', 'support', 0),
  (467, 'Taster Session', 4, 'Lille', '2024-04-23', '0:26:43', '15:27:44', 'framework', 0),
  (468, 'Graduation', 4, 'Krajan Selatan', '2025-08-06', '3:49:04', '14:32:11', 'actuating', 0),
  (469, 'Assessment Day', 6, 'Ditsaan', '2024-06-21', '10:52:47', '2:39:14', 'Down-sized', 0),
  (470, 'Sprint Review', 4, 'Aginskoye', '2024-12-14', '13:43:40', '4:13:47', 'Upgradable', 0),
  (471, 'Hiring Event', 2, 'Palaiochóri', '2023-12-31', '21:20:21', '12:44:47', 'access', 0),
  (472, 'Graduation', 3, 'Malšice', '2024-09-19', '21:34:24', '2:18:37', 'explicit', 0),
  (473, 'Taster Session', 4, 'Belogorsk', '2024-07-24', '17:32:23', '2:38:28', 'radical', 0),
  (474, 'Graduation', 5, 'Tramandaí', '2023-09-13', '21:34:08', '12:54:21', 'human-resource', 0),
  (475, 'Assessment Day', 5, 'Sundsvall', '2024-03-12', '10:15:10', '4:11:38', 'contingency', 0),
  (476, 'Sprint Review', 3, 'Tando Jām', '2023-07-02', '9:33:14', '9:16:51', 'zero administration', 0),
  (477, 'Hiring Event', 6, 'Anastácio', '2024-07-16', '10:58:55', '11:42:06', 'encryption', 0),
  (478, 'Graduation', 6, 'Stepnogorsk', '2024-03-07', '11:12:25', '13:45:03', 'middleware', 0),
  (479, 'Taster Session', 5, 'Janes', '2022-12-08', '5:53:09', '6:46:18', 'monitoring', 0),
  (480, 'Graduation', 3, 'Grande Prairie', '2024-02-11', '11:47:05', '3:39:41', 'transitional', 0),
  (481, 'Assessment Day', 5, 'Cimo de Vila', '2025-01-25', '2:01:00', '6:34:24', 'heuristic', 0),
  (482, 'Sprint Review', 3, 'Bograd', '2024-08-25', '7:41:46', '16:21:45', 'Open-architected', 0),
  (483, 'Hiring Event', 5, 'Novo', '2025-05-10', '14:07:30', '0:53:24', 'non-volatile', 0),
  (484, 'Graduation', 2, 'Kamālia', '2023-07-17', '15:25:23', '15:30:53', 'utilisation', 0),
  (485, 'Taster Session', 6, 'Czerwionka-Leszczyny', '2025-05-16', '22:17:10', '18:38:33', 'upward-trending', 0),
  (486, 'Graduation', 5, 'Magtangol', '2023-01-10', '15:24:57', '4:34:45', 'dynamic', 0),
  (487, 'Assessment Day', 5, 'Kangle', '2024-12-29', '4:59:29', '18:17:22', 'access', 0),
  (488, 'Sprint Review', 6, 'Jaboatão dos Guararapes', '2022-12-12', '4:13:20', '21:57:13', 'methodology', 0),
  (489, 'Hiring Event', 6, 'Tiarei', '2023-11-27', '0:07:45', '7:30:31', 'matrix', 0),
  (490, 'Graduation', 5, 'Yaojiaji', '2024-07-09', '19:44:07', '3:22:39', 'methodical', 0),
  (491, 'Taster Session', 3, 'Niutian', '2025-09-10', '0:03:27', '17:14:18', 'Synergized', 0),
  (492, 'Graduation', 1, 'Al Mughayyir', '2023-02-25', '22:14:50', '17:08:28', 'Inverse', 0),
  (493, 'Assessment Day', 5, 'Biny Selo', '2023-11-19', '12:35:12', '15:44:00', 'complexity', 0),
  (494, 'Sprint Review', 6, 'Zavrč', '2023-07-23', '0:57:43', '11:47:11', 'Triple-buffered', 0),
  (495, 'Hiring Event', 5, 'Sidamulya Satu', '2024-01-08', '10:08:39', '11:41:32', 'content-based', 0),
  (496, 'Graduation', 6, 'Boxholm', '2025-01-24', '7:59:06', '3:46:31', 'secondary', 0),
  (497, 'Taster Session', 1, 'Heihe', '2023-07-26', '17:22:23', '9:43:51', 'function', 0),
  (498, 'Graduation', 5, 'Belozërsk', '2025-01-14', '20:37:08', '15:01:13', 'Intuitive', 0),
  (499, 'Assessment Day', 6, 'Saint-Félicien', '2023-08-28', '14:19:47', '10:33:15', 'homogeneous', 0),
  (500, 'Sprint Review', 6, 'Pogranichnyy', '2023-12-02', '4:08:53', '2:08:12', 'Organic', 0);
	

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
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



# Dump of table events_hiring_partners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events_hiring_partners`;

CREATE TABLE `events_hiring_partners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) unsigned NOT NULL,
  `hiring_partner_id` int(11) unsigned NOT NULL,
  `people_attending` int(11) unsigned DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `deleted` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `size` tinyint(2) DEFAULT 0,
  `tech_stack` varchar(600) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `url_website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `is_primary_contact` tinyint(1) NOT NULL DEFAULT 1,
  `job_title` varchar(255) DEFAULT NULL,
  `hiring_partner_company_id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_contacts_to_hiring_partner` (`hiring_partner_company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `student` int(1) NOT NULL DEFAULT 0,
  `withdrawn` int(1) NOT NULL DEFAULT 0,
  `rejected` int(1) NOT NULL DEFAULT 0,
  `notAssigned` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
