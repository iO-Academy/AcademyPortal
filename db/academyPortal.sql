# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.33)
# Database: academyportal
# Generation Time: 2021-05-27 13:55:46 +0000
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
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;

INSERT INTO `applicants` (`id`, `name`, `email`, `phoneNumber`, `cohortId`, `whyDev`, `codeExperience`, `hearAboutId`, `eligible`, `eighteenPlus`, `finance`, `notes`, `stageId`, `stageOptionId`, `dateTimeAdded`, `deleted`, `backgroundInfoId`)
VALUES
(2,'Owen Miller','weqi@mailinator.net','+532-82-1263991',2,'Amet vero minim repudiandae aut ratione voluptas perferendis sequi eu non quaerat quasi ut est nostrud nihil ad corporis ea','Ullamco quia quae excepturi possimus quibusdam elit occaecat commodi dolore facere anim quaerat',3,'1','1','1','Laborum cumque reprehenderit ut qui sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus',6,NULL,'2018-11-24 21:26:00',0,NULL),
(3,'Nero Burgess','famaxykivo@yahoo.com','+124-85-7626938',2,'Perspiciatis fugiat possimus tempor dolores nesciunt consequatur voluptatem','Quibusdam officiis occaecat velit error sunt ratione voluptatem',5,'1','1','1','Sint voluptas ut nihil incididunt officia duis ab eius impedit consequatur Incidunt do aut doloribus proident quos dolores pariatur Sed',6,NULL,'2018-11-28 14:29:58',0,NULL),
(4,'Matthew Jarvis','tucawohuw@mailinator.net','+848-54-4778506',3,'Natus quidem magnam autem corrupti laborum Anim quos quia','Dolor quia dignissimos qui excepturi eos voluptas est',6,'1','0','0','Quod harum esse quia maxime explicabo Voluptatem magna soluta voluptate optio',1,NULL,'2018-11-28 14:33:41',0,NULL),
(5,'Ignacia Watkins','qewopepodi@mailinator.com','+613-35-8385501',2,'Excepturi consequatur Est culpa enim itaque ratione optio minima ullamco voluptates dolor et totam','Earum est iure sed fuga Velit',6,'0','0','0','Impedit aut duis laborum aspernatur amet aliquip tempora harum nulla aut',6,NULL,'2018-11-28 14:42:01',0,NULL),
(6,'Luke Haney','wubeqyko@mailinator.com','+942-61-9779862',3,'Nemo id qui aspernatur possimus dolor adipisicing aut est sed minim','Consequatur quia voluptate delectus impedit similique',6,'0','0','0','Non sed modi ab culpa sed quia tempore debitis dolor',1,NULL,'2018-11-28 14:52:20',0,NULL),
(7,'Curran Patel','pudapaceje@mailinator.net','+628-48-1465496',4,'Non voluptas eligendi assumenda et itaque cupidatat ut tempor','Et aliqua Quia sit soluta enim nesciunt vitae consequatur Aut repellendus Soluta magni',2,'1','0','0','Quos fugiat qui et enim eum tempor est modi',3,7,'2018-11-28 22:53:05',0,NULL),
(8,'Katelyn Parsons','poipoi@qwerty.com','+567-54-9746748',3,'Aut est et est esse mollitia laborum','Fuga Enim omnis anim et error aut et voluptate anim blanditiis dolorem voluptatem facilis',2,'0','0','0','Similique velit qui nisi debitis aliquip lorem dolor commodi assumenda quod quod autem amet eu mollitia quod necessitatibus',1,NULL,'2018-11-28 23:10:12',0,NULL),
(9,'Keith Owens','tovipuz@mailinator.net','+353-29-4533555',3,'Non molestias eos do aperiam quia vitae elit nihil sed autem id quia voluptate in ea ullam officiis','In quas corrupti commodo id non et tempora vitae vel ad',2,'0','1','1','Magni sed sit qui odit',1,NULL,'2018-11-28 23:10:47',0,NULL);

/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table applicants_additional
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicants_additional`;

CREATE TABLE `applicants_additional` (
                                         `id` int(11) unsigned NOT NULL,
                                         `apprentice` int(1) DEFAULT NULL,
                                         `aptitude` int(3) DEFAULT NULL,
                                         `assessmentDay` date DEFAULT NULL,
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

INSERT INTO `applicants_additional` (`id`, `apprentice`, `aptitude`, `assessmentDay`, `assessmentTime`, `assessmentNotes`, `diversitechInterest`, `diversitech`, `edaid`, `upfront`, `kitCollectionDay`, `kitCollectionTime`, `kitNum`, `laptop`, `laptopDeposit`, `laptopNum`, `tasterId`, `tasterAttendance`, `team`, `githubUsername`, `portfolioUrl`, `pleskHostingUrl`, `githubEducationLink`, `additionalNotes`, `chosenCourseId`, `attitude`, `averageScore`, `fee`, `signedTerms`, `signedDiversitech`, `inductionEmailSent`, `signedNDA`, `checkedID`, `dataProtectionName`, `dataProtectionPhoto`, `dataProtectionTestimonial`, `dataProtectionBio`, `dataProtectionVideo`, `contactFormSigned`)
VALUES
(2,1,73,'2020-06-20','13:00','Laborum cumque reprehenderit ut qui sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus',0,1000,8000,1000,'2020-08-05','10:30',3,1,0,3,NULL,0,1,NULL,'','','',NULL,NULL,NULL,36,NULL,0,0,0,0,0,0,0,0,0,0,1),
(3,0,73,'2020-06-20','13:00','Laborum cumque reprehenderit ut qui sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus',NULL,1000,8000,1000,'2020-08-05','10:30',3,1,NULL,3,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(5,0,73,'2020-06-20','13:00','Laborum cumque reprehenderit ut qui sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus',NULL,1000,8000,1000,'2020-08-05','10:30',3,1,NULL,3,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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


# Dump of table courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
                           `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                           `start_date` date DEFAULT NULL,
                           `end_date` date DEFAULT NULL,
                           `name` varchar(255) DEFAULT NULL,
                           `trainer` varchar(255) DEFAULT NULL,
                           `notes` varchar(500) DEFAULT NULL,
                           `deleted` int(1) NOT NULL DEFAULT '0',
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `start_date`, `end_date`, `name`, `trainer`, `notes`, `deleted`)
VALUES
(1,'2021-01-01','2021-03-30','Defence against the dark Json','Harry Potter',NULL,0),
(2,'2020-12-10','2021-02-02','Care of Magical Methods','Hagrid',NULL,0);

/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
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
(4,'Other');

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
(1,'test',2,'bath','2020-02-08','09:01:00','11:00:00','sf',0),
(2,'bath',1,'bath','2020-12-12','19:00:00','20:00:00','sd',0),
(3,'bath',3,'bath','2020-12-12','19:00:00','20:00:00','ats',0),
(4,'Hi',2,'hui','2022-12-12','11:11:00','22:22:00','',1),
(5,'Hi',1,'hui','2222-02-20','10:10:00','12:12:00','',0),
(6,'bath',3,'bath','2021-07-01','19:30:00','20:00:00','Hello!',0);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


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
(5,'North Korea',0),
(6,'Yoda',0);

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
(1,'HP1',5,'node.js','ba2 6ah',NULL,NULL),
(2,'HP2',100,'php',NULL,'0117 432 1111',NULL);

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
                                           `hiring_partner_company_id` int(11) unsigned NOT NULL,
                                           `phone` varchar(255) DEFAULT NULL,
                                           PRIMARY KEY (`id`),
                                           KEY `link_contacts_to_hiring_partner` (`hiring_partner_company_id`),
                                           CONSTRAINT `link_contacts_to_hiring_partner` FOREIGN KEY (`hiring_partner_company_id`) REFERENCES `hiring_partner_companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `hiring_partner_contacts` WRITE;
/*!40000 ALTER TABLE `hiring_partner_contacts` DISABLE KEYS */;

INSERT INTO `hiring_partner_contacts` (`id`, `name`, `email`, `is_primary_contact`, `job_title`, `hiring_partner_company_id`, `phone`)
VALUES
(1,'Greg S Roll','greg.roll@hp1.com',0,NULL,1,NULL),
(2,'Little Chef','little.chef@hp1.com',1,'Chief Food Officer',1,'01299 872145');

/*!40000 ALTER TABLE `hiring_partner_contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
                           `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                           `option` varchar(255) NOT NULL,
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
                          PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `stages` WRITE;
/*!40000 ALTER TABLE `stages` DISABLE KEYS */;

INSERT INTO `stages` (`id`, `title`, `order`, `deleted`, `student`)
VALUES
(1,'New application',1,0,0),
(2,'Response sent',2,0,0),
(3,'Booked into assessment day',3,0,0),
(4,'Assessment Response',4,0,0),
(5,'Attendance Response',5,0,0),
(6,'Onboarding',6,0,1),
(7,'Attending',7,0,1),
(8,'Course complete',8,0,1),
(9,'In employment',9,0,1);

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
(2,'Ash');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
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
