/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.32-MariaDB : Database - myhmsdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admintb` */

DROP TABLE IF EXISTS `admintb`;

CREATE TABLE `admintb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `admintb` */

insert  into `admintb`(`id`,`username`,`password`) values 
(1,'admin','admin123');

/*Table structure for table `appointmenttb` */

DROP TABLE IF EXISTS `appointmenttb`;

CREATE TABLE `appointmenttb` (
  `pid` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `doctor` varchar(30) DEFAULT NULL,
  `docFees` int(5) DEFAULT NULL,
  `appdate` date DEFAULT NULL,
  `apptime` time DEFAULT NULL,
  `userStatus` int(5) DEFAULT NULL,
  `doctorStatus` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `appointmenttb` */

insert  into `appointmenttb`(`pid`,`ID`,`fname`,`lname`,`gender`,`email`,`contact`,`doctor`,`docFees`,`appdate`,`apptime`,`userStatus`,`doctorStatus`) values 
(4,1,'Kishan','Lal','Male','kishansmart0@gmail.com','8838489464','Ganesh',550,'2020-02-14','10:00:00',1,0),
(4,2,'Kishan','Lal','Male','kishansmart0@gmail.com','8838489464','Dinesh',700,'2020-02-28','10:00:00',0,1),
(4,3,'Kishan','Lal','Male','kishansmart0@gmail.com','8838489464','Amit',1000,'2020-02-19','03:00:00',0,1),
(11,4,'Shraddha','Kapoor','Female','shraddha@gmail.com','9768946252','ashok',500,'2020-02-29','20:00:00',1,1),
(4,5,'Kishan','Lal','Male','kishansmart0@gmail.com','8838489464','Dinesh',700,'2020-02-28','12:00:00',1,1),
(4,6,'Kishan','Lal','Male','kishansmart0@gmail.com','8838489464','Ganesh',550,'2020-02-26','15:00:00',0,1),
(2,8,'Alia','Bhatt','Female','alia@gmail.com','8976897689','Ganesh',550,'2020-03-21','10:00:00',1,1),
(5,9,'Gautam','Shankararam','Male','gautam@gmail.com','9070897653','Ganesh',550,'2020-03-19','20:00:00',1,0),
(4,10,'Kishan','Lal','Male','kishansmart0@gmail.com','8838489464','Ganesh',550,'0000-00-00','14:00:00',1,0),
(4,11,'Kishan','Lal','Male','kishansmart0@gmail.com','8838489464','Dinesh',700,'2020-03-27','15:00:00',1,1),
(9,12,'William','Blake','Male','william@gmail.com','8683619153','Kumar',800,'2020-03-26','12:00:00',1,1),
(9,13,'William','Blake','Male','william@gmail.com','8683619153','Tiwary',450,'2020-03-26','14:00:00',1,1),
(1,14,'Ram','Kumar','Male','ram@gmail.com','9876543210','Amit',1000,'2025-03-21','10:00:00',1,1),
(1,15,'Ram','Kumar','Male','ram@gmail.com','9876543210','ashok',500,'2025-03-22','10:00:00',1,1);

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `contact` */

insert  into `contact`(`id`,`name`,`email`,`contact`,`message`) values 
(1,'Anu','anu@gmail.com','7896677554','Hey Admin'),
(2,' Viki','viki@gmail.com','9899778865','Good Job, Pal'),
(3,'Ananya','ananya@gmail.com','9997888879','How can I reach you?'),
(4,'Aakash','aakash@gmail.com','8788979967','Love your site'),
(5,'Mani','mani@gmail.com','8977768978','Want some coffee?'),
(6,'Karthick','karthi@gmail.com','9898989898','Good service'),
(7,'Abbis','abbis@gmail.com','8979776868','Love your service'),
(8,'Asiq','asiq@gmail.com','9087897564','Love your service. Thank you!'),
(9,'Jane','jane@gmail.com','7869869757','I love your service!');

/*Table structure for table `doctb` */

DROP TABLE IF EXISTS `doctb`;

CREATE TABLE `doctb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `spec` varchar(50) DEFAULT NULL,
  `docFees` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `doctb` */

insert  into `doctb`(`id`,`username`,`password`,`email`,`spec`,`docFees`) values 
(1,'ashok','ashok123','ashok@gmail.com','General',500),
(2,'arun','arun123','arun@gmail.com','Cardiologist',600),
(3,'Dinesh','dinesh123','dinesh@gmail.com','General',700),
(4,'Ganesh','ganesh123','ganesh@gmail.com','Pediatrician',550),
(5,'Kumar','kumar123','kumar@gmail.com','Pediatrician',800),
(6,'Amit','amit123','amit@gmail.com','Cardiologist',1000),
(7,'Abbis','abbis123','abbis@gmail.com','Neurologist',1500),
(8,'Tiwary','tiwary123','tiwary@gmail.com','Pediatrician',450);

/*Table structure for table `marital_status` */

DROP TABLE IF EXISTS `marital_status`;

CREATE TABLE `marital_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `marital_status` */

insert  into `marital_status`(`id`,`name`,`created`,`updated`) values 
(1,'Single','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(2,'Married','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(3,'Divorced','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(4,'Widowed','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(5,'Separated','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(6,'Engaged','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(7,'In a Relationship','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(8,'Complicated','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(9,'Common-law Marriage','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(10,'Civil Union','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(11,'Domestic Partnership','2025-03-20 17:19:15','2025-03-20 17:19:15'),
(12,'Prefer not to say','2025-03-20 17:19:15','2025-03-20 17:19:15');

/*Table structure for table `patreg` */

DROP TABLE IF EXISTS `patreg`;

CREATE TABLE `patreg` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `cpassword` varchar(30) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `referred_by` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `patreg` */

insert  into `patreg`(`pid`,`fname`,`lname`,`gender`,`email`,`contact`,`password`,`cpassword`,`marital_status`,`address`,`dob`,`referred_by`) values 
(1,'Ram','Kumar','Male','ram@gmail.com','9876543210','ram123','ram123','1','New Delhi, India','1990-05-15','Amit'),
(2,'Alia','Bhatt','Female','alia@gmail.com','8976897689','alia123','alia123','2','Mumbai, India','1993-03-15','Riya'),
(3,'Shahrukh','Khan','Male','shahrukh@gmail.com','8976898463','shahrukh123','shahrukh123','1','Mumbai, India','1965-11-02','Salman'),
(4,'Kishan','Lal','Male','kishansmart0@gmail.com','8838489464','kishan123','kishan123','3','Jaipur, India','1988-08-25','Vikram'),
(5,'Gautam','Shankararam','Male','gautam@gmail.com','9070897653','gautam123','gautam123','1','Bangalore, India','1995-07-30','Ramesh'),
(6,'Sushant','Singh','Male','sushant@gmail.com','9059986865','sushant123','sushant123','2','Patna, India','1986-01-21','Ankita'),
(7,'Nancy','Deborah','Female','nancy@gmail.com','9128972454','nancy123','nancy123','1','Los Angeles, USA','1998-04-12','John'),
(8,'Kenny','Sebastian','Male','kenny@gmail.com','9809879868','kenny123','kenny123','1','Bangalore, India','1990-12-31','Rohan'),
(9,'William','Blake','Male','william@gmail.com','8683619153','william123','william123','3','London, UK','1982-06-07','David'),
(10,'Peter','Norvig','Male','peter@gmail.com','9609362815','peter123','peter123','2','California, USA','1956-11-25','Andrew'),
(11,'Shraddha','Kapoor','Female','shraddha@gmail.com','9768946252','shraddha123','shraddha123','1','Mumbai, India','1987-03-03','Ayesha');

/*Table structure for table `prestb` */

DROP TABLE IF EXISTS `prestb`;

CREATE TABLE `prestb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(50) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `appdate` date DEFAULT NULL,
  `apptime` time DEFAULT NULL,
  `disease` varchar(250) DEFAULT NULL,
  `allergy` varchar(250) DEFAULT NULL,
  `prescription` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `prestb` */

insert  into `prestb`(`id`,`doctor`,`pid`,`fname`,`lname`,`appdate`,`apptime`,`disease`,`allergy`,`prescription`) values 
(8,'Ganesh',2,'Alia','Bhatt','2020-03-21','10:00:00','Severe Fever','Nothing','Take bed rest'),
(11,'Dinesh',4,'Kishan','Lal','2020-03-27','15:00:00','Cough','Nothing','Just take a teaspoon of Benadryl every night'),
(12,'Kumar',9,'William','Blake','2020-03-26','12:00:00','Sever fever','nothing','Paracetamol -> 1 every morning and night'),
(13,'Tiwary',9,'William','Blake','2020-03-26','14:00:00','Cough','Skin dryness','Intake fruits with more water content');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
