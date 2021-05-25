# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.33)
# Database: academyPortal
# Generation Time: 2021-05-25 14:58:14 +0000
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;

INSERT INTO `applicants` (`id`, `name`, `email`, `phoneNumber`, `cohortId`, `whyDev`, `codeExperience`, `hearAboutId`, `eligible`, `eighteenPlus`, `finance`, `notes`, `stageId`, `stageOptionId`, `dateTimeAdded`, `deleted`)
VALUES
	(2,'Owen Miller','weqi@mailinator.net','+532-82-1263991',2,'Amet vero minim repudiandae aut ratione voluptas perferendis sequi eu non quaerat quasi ut est nostrud nihil ad corporis ea','Ullamco quia quae excepturi possimus quibusdam elit occaecat commodi dolore facere anim quaerat',3,'1','1','1','Laborum cumque reprehenderit ut qui sapiente nobis commodo iusto veritatis provident voluptates Nam beatae quis quam illo voluptatibus',6,NULL,'2018-11-24 21:26:46',0),
	(3,'Nero Burgess','famaxykivo@yahoo.com','+124-85-7626938',2,'Perspiciatis fugiat possimus tempor dolores nesciunt consequatur voluptatem','Quibusdam officiis occaecat velit error sunt ratione voluptatem',5,'1','1','1','Sint voluptas ut nihil incididunt officia duis ab eius impedit consequatur Incidunt do aut doloribus proident quos dolores pariatur Sed',6,NULL,'2018-11-28 14:29:58',0),
	(4,'Matthew Jarvis','tucawohuw@mailinator.net','+848-54-4778506',3,'Natus quidem magnam autem corrupti laborum Anim quos quia','Dolor quia dignissimos qui excepturi eos voluptas est',6,'1','0','0','Quod harum esse quia maxime explicabo Voluptatem magna soluta voluptate optio',1,NULL,'2018-11-28 14:33:41',0),
	(5,'Ignacia Watkins','qewopepodi@mailinator.com','+613-35-8385501',2,'Excepturi consequatur Est culpa enim itaque ratione optio minima ullamco voluptates dolor et totam','Earum est iure sed fuga Velit',6,'0','0','0','Impedit aut duis laborum aspernatur amet aliquip tempora harum nulla aut',6,NULL,'2018-11-28 14:42:01',0),
	(6,'Luke Haney','wubeqyko@mailinator.com','+942-61-9779862',3,'Nemo id qui aspernatur possimus dolor adipisicing aut est sed minim','Consequatur quia voluptate delectus impedit similique',6,'0','0','0','Non sed modi ab culpa sed quia tempore debitis dolor',1,NULL,'2018-11-28 14:52:20',0),
	(7,'Curran Patel','pudapaceje@mailinator.net','+628-48-1465496',4,'Non voluptas eligendi assumenda et itaque cupidatat ut tempor','Et aliqua Quia sit soluta enim nesciunt vitae consequatur Aut repellendus Soluta magni',2,'1','0','0','Quos fugiat qui et enim eum tempor est modi',3,7,'2018-11-28 22:53:05',0),
	(8,'Katelyn Parsons','poipoi@qwerty.com','+567-54-9746748',3,'Aut est et est esse mollitia laborum','Fuga Enim omnis anim et error aut et voluptate anim blanditiis dolorem voluptatem facilis',2,'0','0','0','Similique velit qui nisi debitis aliquip lorem dolor commodi assumenda quod quod autem amet eu mollitia quod necessitatibus',1,NULL,'2018-11-28 23:10:12',0),
	(9,'Keith Owens','tovipuz@mailinator.net','+353-29-4533555',3,'Non molestias eos do aperiam quia vitae elit nihil sed autem id quia voluptate in ea ullam officiis','In quas corrupti commodo id non et tempora vitae vel ad',2,'0','1','1','Magni sed sit qui odit',1,NULL,'2018-11-28 23:10:47',0),
	(10,'fdadfvsgr','kemi@dahkof.mz','07951634661',1,'Jubbu owuvoklu ketdo elfi rakkokoku mosan finu rukuf jim jo po aluhci fuc habdi be seeho sejur wikehas. Umepeob fe figloobo fu','Unojor ku vos cu ked niezakas mepgib iribi ikearvep cagjuto kur pohumi osoca ehuura fi dawa. Tijop ceugiec tace pe sejtino juuj tevsu cohokos gavikpoh lulof doc vebev. Wonte podzuz fozdid vozmop mijerar du bowcuj ludetren zapa',1,'1','1','0','Wi cuapje va woza ubogi pet dugenbid aju emlat nukguv mas bub. Fimun saitopi gug rovasi du vinafa pednipvi mo gojrurpo uklip kuor nu civud ewicu tiuse rab. Ifabub sa dulurtuw cikebu uni se retguh piwe ricjomlu rudah detu cupi',1,NULL,'2020-06-19 10:22:48',1),
	(15,'Lucia','livagi@welif.va','01249701100',1,'Zu wemcujid sooro fopmali cimogifa fojzoz puub ocepode fujdovel baewi efela zanpa wondohun vepje ifah abwewa. Roos to rof wig hob','Ju gono navaretu tudupemu nideted jeh inure cinisje na rupeniz na ezo suwpekje risocder an. Hobun vuj ugecafo pek fifcugak upu ta kutucla olzobi zu begudigo guzjucmo ijfu igu rotvi tovu huzfi za. Funinin lawhiar fotus piwzeli nup ozaguk uzd',1,'1','1','1','Igma cag dupaj hawar bi iluirizi mooj tocnofmin aponak net zu tigetes wahagivo era ecme. Vagmipec lokke odo muv fabdaw ebujuroj resabje sap ni buma ref lo aruma badjavir jij sazjep. Hudsal do fow dus ceulo nov puratin nonozu vi ewleco ruefi relofivu hu hiohefo kuc',1,NULL,'2020-08-11 14:49:15',0);

/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
