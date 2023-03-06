-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: covid-19
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrator` (
  `id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `country` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_fk1` (`country`),
  CONSTRAINT `admin_fk1` FOREIGN KEY (`country`) REFERENCES `government` (`country`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES ('korea_adm','1','대한민국'),('us_adm','2','United States');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `government`
--

DROP TABLE IF EXISTS `government`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `government` (
  `country` varchar(15) NOT NULL,
  `distance_working` char(1) NOT NULL,
  `amount_Pfizer` int NOT NULL,
  `amount_Moderna` int NOT NULL,
  `order_Pfizer` int NOT NULL,
  `order_Moderna` int NOT NULL,
  PRIMARY KEY (`country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `government`
--

LOCK TABLES `government` WRITE;
/*!40000 ALTER TABLE `government` DISABLE KEYS */;
INSERT INTO `government` VALUES ('United States','0',123,78,1000,1200),('대한민국','2',116,69,1000,2413);
/*!40000 ALTER TABLE `government` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospital` (
  `name` varchar(30) NOT NULL,
  `business_number` varchar(30) NOT NULL,
  `residual_Pfizer` int NOT NULL,
  `residual_Moderna` int NOT NULL,
  `amount_sickbed` int NOT NULL,
  `country` varchar(15) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `business number_UNIQUE` (`business_number`),
  KEY `hosp_fk1` (`country`),
  CONSTRAINT `hosp_fk1` FOREIGN KEY (`country`) REFERENCES `government` (`country`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES ('Johns Hopkins Hospital','142-89-90213',66,78,88,'United States','1800 Orleans St, Baltimore, MD 21287','410-955-5000'),('Mayo Clinic','528-15-39002',78,65,64,'United States','200 First Street SW Rochester, MN 55905','507-284-2511'),('New York University hospital','194-25-99150',55,91,59,'United States','550 1st Ave, New York, NY 10016','646-929-7800'),('경북대병원','501-82-06653',90,68,94,'대한민국','대구광역시 중구 동덕로 130','1666-5114'),('대구병원','610-94-20480',120,74,81,'대한민국','대구광역시 북구 칠곡중앙대로 194','053-311-2001'),('영남대병원','514-82-02221',93,105,76,'대한민국','대구광역시 남구 현충로 170','1522-3114');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `people` (
  `ssn` varchar(16) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` char(2) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `country` varchar(15) NOT NULL,
  `location` varchar(20) DEFAULT NULL,
  `positive` varchar(10) DEFAULT NULL,
  `pcr_date` date DEFAULT NULL,
  `vaccination_hospital` varchar(30) DEFAULT NULL,
  `vaccine` varchar(20) DEFAULT NULL,
  `2st_vaccination_date` date DEFAULT NULL,
  `1st_vaccination_date` date DEFAULT NULL,
  `side_effect` varchar(20) DEFAULT NULL,
  `hospitalization_hospital` varchar(30) DEFAULT NULL,
  `hospitalization_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `deathday` datetime DEFAULT NULL,
  PRIMARY KEY (`ssn`),
  KEY `people_fk1` (`country`),
  KEY `people_fk3` (`hospitalization_hospital`),
  KEY `people_fk2` (`vaccination_hospital`),
  KEY `people_fk4` (`vaccine`),
  CONSTRAINT `people_fk1` FOREIGN KEY (`country`) REFERENCES `government` (`country`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `people_fk2` FOREIGN KEY (`vaccination_hospital`) REFERENCES `hospital` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `people_fk3` FOREIGN KEY (`hospitalization_hospital`) REFERENCES `hospital` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `people_fk4` FOREIGN KEY (`vaccine`) REFERENCES `pharmacist` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES ('000101-4589239','강나현','여','010-9856-6523','대한민국','인천광역시',NULL,'2021-11-30','대구병원','Moderna','2021-11-27','2021-11-02',NULL,'대구병원','2021-09-27',NULL,NULL),('000211-3028001','장영국','남','010-4482-9993','대한민국','서울특별시','알파','2021-05-10','영남대병원','Pfizer','2021-04-30','2021-03-27',NULL,'영남대병원','2021-10-18','2021-10-20','0000-00-00 00:00:00'),('000404-4513287','윤슬','여','010-4216-1548','대한민국','대구광역시','알파','2021-11-30','영남대병원','Pfizer','2021-05-02','2021-04-18','발열, 알레르기','영남대병원','2021-05-08','2021-06-06','2021-06-19 00:00:00'),('001031-4939133','최보라','여','010-4214-0082','대한민국','서울특별시','알파','2021-12-02','경북대병원','Moderna',NULL,'2021-02-14','알레르기','경북대병원','2021-02-17',NULL,NULL),('001104-4235578','이루비','여','010-1251-8754','대한민국','서울특별시','','2021-11-30','대구병원','Moderna','2021-01-23','2021-01-01','발열','영남대병원','2021-09-30','2021-10-15',NULL),('001203-4900293','문가경','여','010-2590-0986','대한민국','경상북도',NULL,'2021-12-01','대구병원','Moderna',NULL,'2021-09-06','근육통','경북대병원','2021-09-11',NULL,NULL),('001215-2156991','정다빈','여','010-4478-5569','대한민국','서울특별시','','2021-11-30','영남대병원','Moderna','0000-00-00','2021-11-30',NULL,'경북대병원','2021-11-03',NULL,NULL),('001219-2695488','김새론','여','010-9833-6659','대한민국','경상북도',NULL,'2021-11-30','영남대병원','Moderna','0000-00-00','2021-11-30',NULL,'영남대병원','2021-10-19','2021-10-21','0000-00-00 00:00:00'),('010102-4248323','배수현','여','010-3236-7874','대한민국','강원도','','2021-11-30','영남대병원','Pfizer','2021-11-30','2021-10-06','','대구병원','2021-07-06','2021-08-06',NULL),('010519-4815966','김가연','여','010-1856-8921','대한민국','강원도',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'영남대병원','2021-10-06','2021-10-10','0000-00-00 00:00:00'),('011123-2622145','임서현','여','010-3364-1579','대한민국','전라북도','알파','2021-10-23','영남대병원','Moderna','0000-00-00','2021-11-30',NULL,'영남대병원','2021-08-24',NULL,'2021-08-25 00:00:00'),('060524-4269874','이서연','여','010-6697-7290','대한민국','대전광역시','알파','2021-10-03',NULL,NULL,NULL,NULL,NULL,'영남대병원','2021-10-03',NULL,'2021-10-05 00:00:00'),('103-19-4108','Logan Saint','M','(787)-9099-9097','United States','Rhode Island',NULL,'2021-02-08','Johns Hopkins Hospital','Pfizer','2021-11-29','2021-10-30','headache',NULL,NULL,NULL,NULL),('117-55-6104','Haylie Duff','F','(210)-337-8541','United States','New York',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('123-46-7989','Emma Watson','F','(213)-156-6481','United States','San Francisco',NULL,'2021-08-25','Johns Hopkins Hospital','Pfizer',NULL,'2021-05-23','muscle pain',NULL,NULL,NULL,NULL),('124-52-9650','Julia Garner','F','(158)-280-6041','United States','Orlando','Delta','2021-06-18','Mayo Clinic','Moderna',NULL,'2021-07-22','cold','New York University Hospital','2021-08-22','2021-09-15',NULL),('130-54-7895','Hilary Duff','F','(450)-642-7502','United States','San Francisco','','2021-12-01','Mayo Clinic','Moderna',NULL,'2021-10-11','cold','Johns Hopkins Hospital','2021-11-15','2021-12-11','2021-12-15 00:00:00'),('140-56-8784','Addison Peren','F','(252)-0489-0488','United States','North Dakota','Delta','2021-01-19','Mayo Clinic','Pfizer','2021-11-06','2021-10-14','Allergie','New York University hospital','2021-01-21',NULL,'2021-01-29 05:15:16'),('148-06-5166','Henry Rubel','M','(401)-0845-9519','United States','Oregon',NULL,NULL,'New York University hospital','Moderna','2021-11-27','2021-11-01',NULL,NULL,NULL,NULL,NULL),('149-49-4563','Jack Astanel','M','(458)-1909-9807','United States','Oregon','Alpha','2021-12-07','Johns Hopkins Hospital','Pfizer','2021-11-30','2021-11-07','cold','Mayo Clinic','2021-12-08','2021-12-31',NULL),('150-57-5210','Josh Groban','M','(410)-504-6327','United States','Orlando','Alpha','2021-09-28','Johns Hopkins Hospital','Moderna',NULL,'2021-09-25','headache','Johns Hopkins Hospital','2021-09-29','2021-10-20','2021-10-21 00:00:00'),('150-70-9600','Seth Green','M','(550)-709-2234','United States','Atlanta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('156-44-4891','Zoe Asfian','F','(670)-1089-1904','United States','Ohio','Alpha','2021-06-30',NULL,NULL,NULL,NULL,'cold','New York University hospital','2021-07-01',NULL,'2021-07-19 22:19:56'),('159-45-4890','Emma Aima','F','(201)-1231-4945','United States','New Mexico','Alpha','2021-04-09','Johns Hopkins Hospital','Pfizer','2021-06-29','2021-05-19','muscle pain','Johns Hopkins Hospital','2021-04-10','2021-04-30',NULL),('175-69-3265','Eric Close','M','(137)-805-7045','United States','Seattle',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('198-12-0899','Benjamin Rest','M','(605)-4890-0323','United States','Tennessee','Delta','2021-11-17',NULL,NULL,NULL,NULL,NULL,'New York University hospital','2021-11-19','2021-12-14',NULL),('201-11-2010','Carl Wilson','M','(147)-872-7624','United States','San Diego','Alpha','2021-11-25','Johns Hopkins Hospital','Pfizer',NULL,'2021-11-16','cold','Johns Hopkins Hospital','2021-11-28','2021-12-25',NULL),('202-51-6512','Matt Damon','M','(980)-798-9802','United States','Chicago',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('203-56-4597','Aiden Medel','M','(215)-0047-5616','United States','Puerto Rico',NULL,NULL,'Mayo Clinic','Moderna','2021-11-04','2021-10-09','muscle pain',NULL,NULL,NULL,NULL),('230-55-4201','Anne Hathaway','F','(135)-452-1245','United States','Chicago','Delta','2021-10-28','Mayo Clinic','Moderna','2021-10-05','2021-07-25','cold','Mayo Clinic','2021-10-29','2021-11-09',NULL),('258-63-4563','Jon Cryer','M','(359)-224-9674','United States','Seattle',NULL,NULL,'Mayo Clinic','Pfizer','2021-11-25','2021-10-28',NULL,NULL,NULL,NULL,NULL),('263-78-1560','Stella Kelba','F','(701)-7018-5949','United States','Ohio',NULL,NULL,'Mayo Clinic','Moderna','2021-11-01','2021-10-09','cold',NULL,NULL,NULL,NULL),('312-54-0125','Mackenzie Christine Foy','F','(102)-410-6301','United States','Orlando','Alpha','2021-07-18','Mayo Clinic','Moderna',NULL,'2021-06-10','cold','Mayo Clinic','2021-07-19',NULL,'2021-08-25 04:36:00'),('325-41-6201','Adel','F','(548)-435-4271','United States','Boston',NULL,'2021-11-20','Johns Hopkins Hospital','Pfizer','2021-11-17','2021-10-07','headache',NULL,NULL,NULL,NULL),('332-75-7985','Vin Diesel','M','(357)-719-0104','United States','San Diego','Delta','2021-10-11','Mayo Clinic','Moderna',NULL,'2021-08-19','cold','Johns Hopkins Hospital','2021-10-13','2021-11-03',NULL),('335-82-2479','Josh Cooke','M','(057)-405-3201','United States','Chicago','Alpha','2021-09-25','Johns Hopkins Hospital','Pfizer','2021-09-16','2021-08-22','headache','Johns Hopkins Hospital','2021-10-01',NULL,NULL),('352-77-7105','Daniel Ross','M','(778)-496-2237','United States','Atlanta','Delta','2021-11-25','New York University hospital','Pfizer',NULL,'2021-11-12','headache','New York University hospital','2021-11-25','2021-12-15',NULL),('356-99-7475','Paul Walker','M','(647)-852-1479','United States','New York','Delta','2021-09-12','New York University hospital','Pfizer','2021-08-29','2021-08-01','headache','New York University hospital','2021-09-15','2021-10-25',NULL),('357-04-5789','Devon Graye','M','(135)-710-6327','United States','Boston',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('357-81-1340','Nicky Lee','M','(808)-605-2114','United States','San Diego','Delta','2021-07-13','Johns Hopkins Hospital','Pfizer',NULL,'2021-06-14','muscle pain','Mayo Clinic','2021-07-13','2021-08-18',NULL),('358-98-5123','Matt Ross','M','(770)-967-2201','United States','Boston',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('359-54-9633','Anna Gunn','F','(654)-750-1320','United States','Orlando',NULL,'2021-10-19','New York University hospital','Moderna',NULL,'2021-10-13',NULL,NULL,NULL,NULL,NULL),('363-22-9102','Deon Cole','M','(985)-321-3570','United States','Boston','Alpha','2021-11-11','Mayo Clinic','Moderna','2021-10-18','2021-09-22','muscle pain','Mayo Clinic','2021-11-13','2021-12-13','2021-12-15 00:00:00'),('369-21-0304','Joe Gray','M','(059)-407-3047','United States','Boston','Alpha','2021-10-18','Mayo Clinic','Moderna','2021-10-11','2021-09-01','muscle pain','Mayo Clinic','2021-10-23','2021-11-20','2021-12-01 00:00:00'),('386-69-5210','Neal Jones','M','(053)-247-1475','United States','San Francisco',NULL,NULL,'New York University hospital','Pfizer',NULL,'2021-11-26',NULL,NULL,NULL,NULL,NULL),('401-33-5160','Janina Gavankar','F','(166)-370-9107','United States','San Francisco','Delta','2021-08-01','Mayo Clinic','Moderna','2021-07-29','2021-07-13','muscle pain','Mayo Clinic','2021-08-02','2021-09-01','2021-09-02 00:00:00'),('407-04-2708','Jon Gries','M','(704)-602-4015','United States','New York',NULL,NULL,'Mayo Clinic','Pfizer','2021-06-27','2021-06-12',NULL,NULL,NULL,NULL,NULL),('416-78-9105','Wyatt Railin','M','(803)-5610-1099','United States','South Dakota','Alpha','2021-09-08',NULL,NULL,NULL,NULL,NULL,'Mayo Clinic','2021-09-10','2021-09-30',NULL),('458-49-7819','Sophia Ponte','F','(212)-1498-1988','United States','North Carolina',NULL,NULL,'New York University hospital','Pfizer','2021-10-25','2021-09-17','muscle pain',NULL,NULL,NULL,NULL),('465-13-7954','Justin Bieber','M','(132)-645-3278','United States','New York',NULL,NULL,'Mayo Clinic','Moderna',NULL,'2021-06-25','muscle pain',NULL,NULL,NULL,NULL),('468-99-3210','Shailene Woodley','F','(302)-014-1103','United States','Washington D.C.',NULL,NULL,'Johns Hopkins Hospital',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('481-45-0153','Mateo Ellesty','M','(405)-3021-9098','United States','Oregon','Delta','2021-11-16','Johns Hopkins Hospital','Pfizer','2021-12-31','2021-12-09',NULL,'Mayo Clinic','2021-11-19','2021-12-09','2021-12-01 00:00:00'),('492-89-1234','Olivia Candra','F','(603)-7892-1566','United States','New Jersey','Delta','2021-09-14','New York University hospital','Moderna','2021-05-02','2021-04-14','cold','Johns Hopkins Hospital','2021-09-17','2021-10-02',NULL),('510-47-3548','Aimee Garcia','F','(024)-478-6210','United States','Seattle','Alpha','2021-12-04','Johns Hopkins Hospital','Pfizer','2021-12-03','2021-11-20','headache','Mayo Clinic','2021-12-04','2021-12-25',NULL),('521-33-6250','Kevin Nealon','M','(022)-743-9510','United States','Boston',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('550326-1255709','이도현','남','010-2251-4778','대한민국','대구광역시',NULL,NULL,'대구병원','Moderna',NULL,'2021-06-23',NULL,'영남대병원','2021-12-01','0000-00-00','0000-00-00 00:00:00'),('561-57-9920','Rex Lease','M','(010)-901-2014','United States','Atlanta','Alpha','2021-09-25','Johns Hopkins Hospital','Pfizer','2021-08-23','2021-07-11','headache','Mayo Clinic','2021-09-28','2021-10-22',NULL),('563-89-4564','Charlo Elga','F','(505)-1594-1565','United States','New York',NULL,NULL,'New York University hospital','Pfizer','2021-04-30','2021-04-06','headache',NULL,NULL,NULL,NULL),('573-45-8965','Harry poter','M','(456)-5654-1231','United States','Oregon',NULL,'2021-08-08','Johns Hopkins Hospital','Moderna','2021-10-17','2021-09-15','muscle pain',NULL,'2021-08-10','2021-09-01',NULL),('580806-1698541','박서준','남','010-9230-2550','대한민국','강원도','알파','2021-07-11','대구병원','Pfizer',NULL,'2021-07-15',NULL,'대구병원','2021-07-11',NULL,NULL),('590628-2956877','신효양','여','010-9256-9595','대한민국','전라남도','알파','2021-05-24','영남대병원','Moderna','0000-00-00','2021-11-30',NULL,'경북대병원','2021-06-16',NULL,NULL),('620-22-7504','Nick Gomez','M','(760)-041-0470','United States','Chicago','Alpha','2021-06-22','Mayo Clinic','Pfizer','2021-05-30','2021-05-13','cold','Johns Hopkins Hospital','2021-06-22',NULL,'2021-07-19 00:00:00'),('620625-1189457','이은찬','남','010-3331-4445','대한민국','서울특별시','델타','2021-10-08','경북대병원',NULL,NULL,NULL,'근육통,알레르기','대구병원','2021-10-08',NULL,NULL),('650-52-0574','Doja Cat','F','(136)-432-4535','United States','San Diego','Alpha','2021-10-12','New York University Hospital',NULL,NULL,NULL,NULL,'New York University Hospital','2021-10-13',NULL,'2021-11-01 02:01:00'),('650-75-2980','Al Leong','M','(717)-332-5632','United States','Seattle','Alpha','2021-11-01','Mayo Clinic','Moderna',NULL,'2021-10-23','cold','Mayo Clinic','2021-11-05','2021-12-01',NULL),('650216-1794665','김승빈','남','010-3226-2698','대한민국','강원도',NULL,NULL,'경북대병원','Moderna',NULL,'2021-07-03',NULL,NULL,NULL,NULL,NULL),('651027-2698774','김현선','여','010-9506-1779','대한민국','경상북도','알파','2021-07-26',NULL,NULL,NULL,NULL,NULL,'대구병원','2021-07-26',NULL,'2021-07-30 00:00:00'),('651126-2790411','한지민','여','010-2687-5510','대한민국','경상북도','델타','2021-10-13','대구병원','Moderna',NULL,'2021-10-21',NULL,'영남대병원','2021-10-16','2021-11-19',NULL),('654-30-8524','Michael Caine','M','(174)-520-6240','United States','Atlanta',NULL,NULL,'New York University hospital',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('670415-2849201','윤혜진','여','010-2749-9865','대한민국','경상북도',NULL,NULL,'영남대병원','Moderna','2021-09-19','2021-08-10',NULL,NULL,NULL,NULL,NULL),('674-52-8510','Greg Lauren','M','(578)-652-9630','United States','Seattle','Delta','2021-11-13','New York University hospital','Pfizer','2021-11-12','2021-10-25','cold','New York University hospital','2021-11-14','2021-12-09',NULL),('698-22-1452','Theo James','M','(402)-6640-5420','United States','Houston','Alpha','2021-10-29','New York University Hospital','Moderna','2021-11-02','2021-09-01','headache','New York University hospital','2021-11-01',NULL,'2021-11-08 13:11:00'),('698-25-1477','Lucas Rosette','M','(216)-1958-1597','United States','Oklahoma',NULL,NULL,'New York University hospital','Pfizer','2021-12-19','2021-11-18','Allergie',NULL,NULL,NULL,NULL),('698-89-8852','Dwayne Johnson','M','(011)-774-7850','United States','New York','Delta','2021-07-30','Johns Hopkins Hospital','Pfizer',NULL,'2021-07-22','cold','Mayo Clinic','2021-08-03','2021-09-27',NULL),('700308-2984568','오들희','여','010-0698-1597','대한민국','경기도','알파','2021-12-31','경북대병원','Pfizer','2021-11-26','2021-10-31','발열','영남대병원','2021-12-10',NULL,'2021-12-11 21:01:45'),('700901-1695259','황정민','남','010-3559-9110','대한민국','대구광역시',NULL,NULL,'경북대병원','Moderna','2021-07-23','2021-06-28','근육통,두통',NULL,NULL,NULL,NULL),('701-90-5704','Eva LaRue','F','(247)-102-3012','United States','Chicago',NULL,NULL,'New York University hospital','Moderna','2021-07-22','2021-06-28',NULL,NULL,NULL,NULL,NULL),('710-73-2012','Charlie Day','M','(300)-574-3547','United States','Seattle',NULL,NULL,'New York University hospital','Pfizer','2021-11-11','2021-10-20',NULL,NULL,NULL,NULL,NULL),('730315-1790566','이정재','남','010-2594-4990','대한민국','경상북도','알파','2021-11-02',NULL,NULL,NULL,NULL,NULL,'대구병원','2021-11-02',NULL,NULL),('741-62-0156','Grace Gummer','F','(420)-327-1023','United States','New York',NULL,'2021-09-22','New York University hospital','Moderna',NULL,'2021-09-11',NULL,NULL,NULL,NULL,NULL),('750916-1564121','이도현','남','010-2331-5694','대한민국','대구광역시','델타','2021-09-03','대구병원','Moderna','2021-10-21','2021-09-24','발열','영남대병원','2021-09-03','0000-00-00','2021-09-15 00:00:00'),('755-77-5217','Michael Jordan','M','(407)-651-7952','United States','Atlanta',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('756-66-9520','Theo Rossi','M','(668)-521-5520','United States','Atlanta','Delta','2021-09-28','Johns Hopkins Hospital','Moderna','2021-08-21','2021-07-11','muscle pain','Johns Hopkins Hospital','2021-10-01','2021-11-03',NULL),('758-96-8479','Alex Nicol','M','(152)-133-7551','United States','New York',NULL,'2021-10-09','New York University hospital','Moderna','2021-08-13','2021-07-16',NULL,NULL,NULL,NULL,NULL),('760121-1940291','지성현','남','010-9876-2890','대한민국','강원도','델타','2021-12-10',NULL,NULL,NULL,NULL,'발열','경북대병원','2021-12-12',NULL,'2021-12-25 00:00:00'),('760321-2790452','고민시','여','010-8365-5959','대한민국','대구광역시','알파','2021-05-29','경북대병원','Pfizer','2021-06-30','2021-06-03',NULL,'대구병원','2021-06-01','2021-07-15',NULL),('761229-1365944','서장훈','남','010-5987-6620','대한민국','서울특별시',NULL,'2021-11-30','경북대병원','Moderna','2021-09-26','2021-09-01','발열',NULL,NULL,NULL,NULL),('770621-2959411','장윤주','여','010-2995-5597','대한민국','서울특별시',NULL,NULL,'대구병원',NULL,NULL,'2021-11-18',NULL,NULL,NULL,NULL,NULL),('770819-2284920','표미선','여','010-2849-7699','대한민국','제주특별시',NULL,'2021-03-28','영남대병원','Moderna','2021-12-01','2021-12-01',NULL,NULL,NULL,NULL,NULL),('780203-1556766','이진욱','남','010-8894-9920','대한민국','서울특별시',NULL,NULL,'영남대병원','Pfizer','2021-08-10','2021-07-18','근육통',NULL,NULL,NULL,NULL),('780312-1902933','김민국','남','010-9578-2899','대한민국','울산광역시','알파','2021-05-12','대구병원','Moderna','2021-06-28','2021-05-10','근육통','경북대병원','2021-05-12','2021-05-30',NULL),('780616-1562455','남궁민','남','010-9556-7556','대한민국','부산광역시','델타','2021-10-14',NULL,NULL,NULL,NULL,NULL,'대구병원','2021-10-15','2021-11-15',NULL),('780930-1459386','김유민','남','010-2925-2255','대한민국','제주특별시','알파','2021-09-18','영남대병원','Pfizer',NULL,'2021-09-04','두통','대구병원','2021-09-18',NULL,'2021-11-01 00:00:00'),('781-94-2834','Peter Brown','M','(357)-642-1379','United States','Chicago','Delta','2021-10-02','Johns Hopkins Hospital','Moderna',NULL,'2021-09-25','muscle pain','Johns Hopkins Hospital','2021-10-06','2021-11-02',NULL),('785-52-9612','Jami Gertz','F','(322)-021-7510','United States','Atlanta','Alpha','2021-09-22','Johns Hopkins Hospital',NULL,'2021-07-09','2021-06-22','headache','New York University Hospital','2021-09-23','2021-10-15',NULL),('789-65-3210','Laz Alonso','M','(355)-962-7589','United States','Chicago',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('790-55-3920','Simon Rex','M','(600)-041-8523','United States','San Francisco',NULL,NULL,'Johns Hopkins Hospital','Pfizer','2021-11-17','2021-10-07',NULL,NULL,NULL,NULL,NULL),('800705-1123548','박범구','남','010-2154-0604','대한민국','전라남도','델타','2021-01-15','대구병원',NULL,NULL,NULL,NULL,'영남대병원','2021-01-16','2021-01-30',NULL),('801215-2312341','손지유','여','010-5518-3618','대한민국','경상북도','델타','2021-10-15','영남대병원','Pfizer',NULL,'2021-09-04','알레르기','대구병원','2021-10-16',NULL,'2021-11-01 00:00:00'),('811126-1790466','김동현','남','010-2660-9904','대한민국','부산광역시',NULL,'2021-06-08','경북대병원','Moderna',NULL,'2021-06-15','근육통',NULL,NULL,NULL,NULL),('820512-1948174','홍성은','남','010-7929-2932','대한민국','충청북도','알파','2021-10-02',NULL,NULL,NULL,NULL,NULL,'대구병원','2021-10-02',NULL,NULL),('821126-1317899','최다니엘','남','010-7985-7756','대한민국','대구광역시','알파','2021-09-03','영남대병원','Pfizer','2021-09-26','2021-08-29','발열','영남대병원','2021-09-03',NULL,'2021-09-05 00:00:00'),('830122-1453187','조상우','남','010-9801-6051','대한민국','전라북도',NULL,NULL,'영남대병원','Moderna','2021-08-29','2021-08-05','근육통',NULL,NULL,NULL,NULL),('830219-1465255','변요환','남','010-2366-8952','대한민국','서울특별시','알파','2021-05-25','경북대병원','Pfizer','2021-06-20','2021-05-29','근육통, 발열, 두통','경북대병원','2021-05-25',NULL,NULL),('840421-1609211','박형식','남','010-6495-7280','대한민국','경상남도',NULL,NULL,'영남대병원','Pfizer',NULL,'2021-11-07','근육통, 발열','경북대병원',NULL,NULL,NULL),('840619-1795004','손호준','남','010-6689-2597','대한민국','부산광역시',NULL,'2021-09-11','대구병원','Moderna',NULL,'2021-11-25','근육통',NULL,NULL,NULL,NULL),('850609-1569877','이동휘','남','010-5663-5110','대한민국','대전광역시','알파','2021-09-08','대구병원','Moderna','2021-10-07','2021-09-11','두통, 발열','대구병원','2021-09-08',NULL,NULL),('850919-1625911','이민기','남','010-6994-2610','대한민국','서울특별시','델타','2021-06-19','영남대병원','Pfizer','2021-07-15','2021-06-23','발열','영남대병원','2021-06-20',NULL,'2021-06-23 00:00:00'),('851125-1125481','송중기','남','010-5987-6447','대한민국','대구광역시','델타','2021-10-06',NULL,NULL,NULL,NULL,NULL,'대구병원','2021-10-06',NULL,NULL),('860809-1795844','이석훈','남','010-6659-7290','대한민국','부산광역시',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('860811-1356977','이현진','남','010-9877-2336','대한민국','전라남도','델타','2021-06-21',NULL,NULL,NULL,NULL,NULL,'대구병원','2021-06-21',NULL,NULL),('860926-1795448','박창환','남','010-9775-6516','대한민국','경상북도',NULL,NULL,'영남대병원','Pfizer','2021-06-15','2021-05-24','근육통',NULL,NULL,NULL,NULL),('861130-1548612','성기훈','남','010-0254-6405','대한민국','전라북도',NULL,NULL,'영남대병원','Moderna','2021-06-30','2021-06-04','발열',NULL,NULL,NULL,NULL),('870819-2901844','김경향','여','010-1144-2299','대한민국','경상북도','알파','2021-01-04','영남대병원','Pfizer',NULL,'2021-01-01','발열','경북대병원','2021-01-06','2021-01-31',NULL),('871021-1795411','석호연','남','010-1502-6695','대한민국','서울특별시',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'영남대병원','2021-11-08','0000-00-00','0000-00-00 00:00:00'),('880326-1795644','장현민','남','010-5988-1733','대한민국','전라북도',NULL,'2021-04-21',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('880623-1795001','윤종훈','남','010-6955-4778','대한민국','부산광역시','알파','2021-08-26',NULL,NULL,NULL,NULL,NULL,'영남대병원','2021-08-27','0000-00-00','2021-08-30 00:00:00'),('880901-1103920','김도하','남','010-9866-2681','대한민국','경상남도','델타','2021-03-20','대구병원','Pfizer','2021-04-23','2021-03-22','두통','경북대병원','2021-03-23','2021-03-29',NULL),('890409-1312455','강 윤','남','010-1166-7799','대한민국','경상북도','알파','2021-10-12','대구병원','Moderna','2021-07-07','2021-06-07','발열','대구병원','2021-10-13',NULL,NULL),('890425-1894414','이시언','남','010-9877-7260','대한민국','부산광역시',NULL,NULL,'경북대병원','Moderna',NULL,'2021-07-29',NULL,NULL,NULL,NULL,NULL),('890645-1864526','김주원','남','010-0843-0051','대한민국','경상북도','알파','2021-02-21','경북대병원','Pfizer',NULL,'2021-03-23',NULL,'영남대병원','2021-02-22','2021-03-05',NULL),('891015-1324879','차무혁','남','010-0264-4898','대한민국','경상북도',NULL,NULL,'경북대병원','Pfizer',NULL,'2021-07-25','알레르기','영남대병원','2021-07-30',NULL,'2021-08-27 18:22:36'),('891107-2609556','김고은','여','010-2663-9206','대한민국','서울특별시',NULL,NULL,'영남대병원','Moderna',NULL,'2021-09-29','근육통',NULL,NULL,NULL,NULL),('891125-1465755','강창석','남','010-1225-2663','대한민국','대전광역시','델타','2021-01-26',NULL,NULL,NULL,NULL,NULL,'경북대병원','2021-01-27',NULL,'2021-03-12 19:20:00'),('896-14-0547','Pink Sweat','M','(789)-243-4153','United States','Seattle','Delta','2021-10-29','Mayo Clinic',NULL,NULL,NULL,NULL,'Johns Hopkins Hospital','2021-11-01','2021-11-17',NULL),('900728-2609455','신세경','여','010-7551-8941','대한민국','대구광역시',NULL,'2021-08-21','대구병원','Pfizer','2021-09-19','2021-08-23','발열,두통',NULL,NULL,NULL,NULL),('900810-2696155','이성경','여','010-7660-9550','대한민국','서울특별시','알파','2021-10-26','경북대병원','Moderna','2021-11-03','2021-10-15','발열','대구병원','2021-10-26',NULL,NULL),('901-50-1023','Jenna Dewan','F','(671)-142-6507','United States','San Diego','Alpha','2021-10-22','Johns Hopkins Hospital','Pfizer',NULL,'2021-10-01','muscle pain','Johns Hopkins Hospital','2021-10-22','2021-11-10',NULL),('901103-2790412','이하이','여','010-4569-7260','대한민국','서울특별시 ',NULL,'2021-08-07','영남대병원','Moderna',NULL,'2021-08-23',NULL,'경북대병원',NULL,NULL,NULL),('901104-2112751','송은채','여','010-1023-6812','대한민국','경상남도','알파','2021-01-18','경북대병원','Pfizer',NULL,'2021-09-06','근육통','영남대병원','2021-01-19','0000-00-00','2021-01-20 00:00:00'),('910508-1765489','김우빈','남','010-6559-2172','대한민국','대구광역시',NULL,NULL,'대구병원','Pfizer','2021-08-19','2021-07-24','두통,발열,근육통',NULL,NULL,NULL,NULL),('911026-2694115','김희연','여','010-2669-5512','대한민국','강원도',NULL,'2021-08-29','경북대병원','Moderna',NULL,'2021-09-02','근육통',NULL,NULL,NULL,NULL),('911111-1191121','김상은','남','010-8212-4082','대한민국','경기도','알파','2021-11-02',NULL,NULL,NULL,NULL,NULL,'대구병원','2021-11-04',NULL,NULL),('920321-1812654','구웅','남','010-2685-4852','대한민국','경상북도','알파','2021-10-29','경북대병원','Moderna',NULL,'2021-01-10',NULL,'영남대병원','2021-10-30','2021-11-13',NULL),('920327-2521873','김유미','여','010-3633-2533','대한민국','서울특별시',NULL,NULL,'영남대병원','Pfizer',NULL,'2021-08-20','발열',NULL,NULL,NULL,NULL),('921022-1506911','이승환','남','010-7889-6551','대한민국','대구광역시',NULL,NULL,'영남대병원','Pfizer','2021-05-14','2021-04-21',NULL,NULL,NULL,NULL,NULL),('921208-2476236','길라임','여','010-5031-0878','대한민국','경상북도',NULL,'2021-04-19','경북대병원','Moderna',NULL,'2021-11-23','두통, 근육통',NULL,NULL,NULL,NULL),('930203-1790411','송강','남','010-5694-2110','대한민국','전라북도','알파','2021-04-12','영남대병원','Moderna','2021-05-26','2021-04-29','두통, 발열','경북대병원','2021-04-13','2021-06-07',NULL),('940307-1784126','한호열','남','010-7415-4561','대한민국','강원도','델타','2021-11-15','대구병원','Pfizer',NULL,'2021-11-12','근육통, 두통','영남대병원','2021-11-16','0000-00-00','2021-11-18 00:00:00'),('940507-2765422','신민아','여','010-4489-2556','대한민국','서울특별시',NULL,NULL,'영남대병원','Moderna',NULL,'2021-10-11','근육통',NULL,NULL,NULL,NULL),('940526-1795423','남주혁','남','010-7254-3311','대한민국','부산광역시','알파','2021-08-05','경북대병원','Pfizer',NULL,'2021-08-16',NULL,'영남대병원','2021-08-06','0000-00-00','2021-08-10 00:00:00'),('940817-2695447','도희','여','010-8977-2669','대한민국','경상북도','알파','2021-07-16',NULL,NULL,NULL,NULL,NULL,'영남대병원','2021-07-16','0000-00-00','2021-07-30 00:00:00'),('950123-2609114','강한나','여','010-5569-1775','대한민국','서울특별시',NULL,'2021-04-23','대구병원','Pfizer','2021-05-21','2021-04-30',NULL,NULL,NULL,NULL,NULL),('950227-2978115','문가영','여','010-9987-2364','대한민국','대전광역시','델타','2021-07-25','대구병원','Moderna','2021-08-03','2021-07-15','두통','경북대병원','2021-07-25',NULL,NULL),('950608-2695488','김다미','여','010-9438-2110','대한민국','대구광역시',NULL,NULL,'영남대병원','Pfizer',NULL,'2021-09-24',NULL,NULL,NULL,NULL,NULL),('950921-2617659','이도연','여','010-2994-8952','대한민국','전라북도','델타','2021-05-19',NULL,NULL,NULL,NULL,NULL,'경북대병원','2021-05-19',NULL,'2021-06-03 11:38:00'),('950929-21720991','서은수','여','010-6995-7310','대한민국','대전광역시',NULL,'2021-05-20','경북대병원','Moderna','2021-07-09','2021-06-12','근육통','대구병원',NULL,NULL,NULL),('960306-2696114','이승혜','여','010-9569-7556','대한민국','경상북도','알파','2021-06-25',NULL,NULL,NULL,NULL,NULL,'영남대병원','2021-06-25','2021-08-03',NULL),('960709-2490411','최은비','여','010-7985-7290','대한민국','부산광역시',NULL,'2021-09-05','대구병원','Moderna','2021-09-15','2021-08-23','발열,근육통',NULL,NULL,NULL,NULL),('961026-2694223','김세정','여','010-2264-3550','대한민국','대구광역시','알파','2021-10-11','경북대병원','Pfizer','2021-10-18','2021-09-24','근육통','영남대병원','2021-10-11','0000-00-00','2021-10-19 00:00:00'),('961108-4532188','박소희','여','010-1596-7378','대한민국','울산광역시','델타','2021-10-29','대구병원','Pfizer','2021-10-25',NULL,NULL,'대구병원',NULL,'2021-11-03',NULL),('961125-1495486','최우식','남','010-9589-2669','대한민국','서울특별시','알파','2021-10-25','경북대병원',NULL,NULL,NULL,NULL,'경북대병원','2021-10-26',NULL,NULL),('970205-2006679','홍소미','여','010-6492-6678','대한민국','서울특별시','델타','2021-08-02','대구병원','Pfizer','2021-07-02','2021-06-02',NULL,'대구병원',NULL,NULL,'2021-09-21 00:00:00'),('970211-2603155','문현원','여','010-9557-5567','대한민국','경상북도',NULL,'2021-09-11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('970425-1654788','송우기','남','010-5468-4876','대한민국','경상남도','알파','2021-05-08','대구병원','Moderna','2021-08-08','2021-07-11','근육통','영남대병원','2021-05-09','2021-05-23',NULL),('970426-2695788','정채연','여','010-2547-9118','대한민국','대전광역시',NULL,'2021-05-25','경북대병원','Moderna','2021-06-27','2021-05-30','발열, 두통',NULL,NULL,NULL,NULL),('980703-1548716','안준호','남','010-0210-9826','대한민국','강원도','델타','2021-06-13','영남대병원',NULL,NULL,NULL,NULL,'영남대병원','2021-06-19','2021-07-01',NULL),('980805-2229221','박서희','여','010-8829-0809','대한민국','서울특별시','델타','2021-03-23','영남대병원','Pfizer','2021-08-20','2021-07-20',NULL,'대구병원',NULL,'2021-04-01',NULL),('980819-2795411','박은빈','여','010-2994-4120','대한민국','경상북도',NULL,NULL,'경북대병원','Pfizer','2021-07-17','2021-06-20','두통, 발열','대구병원','2021-06-24','2021-07-30',NULL),('981224-2615759','신효주','여','010-6554-2669','대한민국','경상북도','델타','2021-03-21',NULL,NULL,NULL,NULL,NULL,'대구병원','2021-03-21',NULL,'2021-05-03 15:30:00'),('990206-2189221','김소혜','여','010-8921-2690','대한민국','전라북도','알파','2021-07-19',NULL,NULL,NULL,NULL,NULL,'경북대병원','2021-07-20',NULL,NULL),('990830-1215755','박원용','남','010-7174-5254','대한민국','경상남도','델타','2021-11-20','대구병원','Moderna','2021-10-03','2021-09-03','두통, 알레르기','대구병원',NULL,NULL,NULL),('991026-2896544','김유정','여','010-4487-2669','대한민국','서울특별시',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacist`
--

DROP TABLE IF EXISTS `pharmacist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pharmacist` (
  `name` varchar(10) NOT NULL,
  `today_production` int NOT NULL,
  `cumulative_production` int NOT NULL,
  `monthly_production_plan` int NOT NULL,
  `holding_vaccine` int NOT NULL,
  `1st_preventive_rate` int NOT NULL,
  `2st_preventive_rate` int NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacist`
--

LOCK TABLES `pharmacist` WRITE;
/*!40000 ALTER TABLE `pharmacist` DISABLE KEYS */;
INSERT INTO `pharmacist` VALUES ('Moderna',700,700000,9600,20000,83,94),('Pfizer',890,500000,8500,15000,88,95);
/*!40000 ALTER TABLE `pharmacist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 21:26:42
