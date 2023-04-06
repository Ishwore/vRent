/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.5.5-10.4.24-MariaDB : Database - vrent
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`vrent` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `vrent`;

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `b_id` int(200) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `from_date` varchar(50) NOT NULL,
  `day` int(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `v_name` varchar(100) NOT NULL,
  `imageurl` varchar(400) NOT NULL,
  `v_number` varchar(50) NOT NULL,
  `total_price` int(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `u_id` int(20) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `v_id` int(50) NOT NULL,
  `book_date` varchar(100) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `book` */

insert  into `book`(`b_id`,`email`,`phone`,`from_date`,`day`,`message`,`v_name`,`imageurl`,`v_number`,`total_price`,`address`,`u_id`,`u_name`,`v_id`,`book_date`) values (1,'aryan@gmail.com','9811264300','2022-08-30',2,'I need for it family visiting.','BYD-t3','images/BYD-t3-electric-car-van-price-nepal-exterior.jpg','बा.प.०३-००१ प ३२३९',24000,'Kathar',59,'Aryan',0,''),(2,'aryan@gmail.com','9811264300','2022-08-31',2,'i need for it family visiting','Renegade Altitude','images/Jeep_Renegade_Altitude.jpg','बा.प.०३-००१ प ३२७९',28000,'Kathar',59,'Aryan',0,''),(3,'ram@gmail.com','9811264300','2022-08-24',2,'i need for it family visiting','Audi_S3_Prestige','images/Audi_S3_Prestige.jpg','बा.प.०३-००१ प ३२३१',40000,'Kathar',55,'Ram',0,''),(4,'ishwore@gmail.com','9811264300','2022-08-24',2,'ihrfaisitjais','BYD-M3','images/BYD-m3.jpg','बा.प.०३-००१ प ३२९४',20000,'Kathar',60,'Ishwore Chaudhary',0,''),(5,'ishwore@gmail.com','9811264300','2022-08-23',5,'hhiuh','BYD-t3','images/BYD-t3-electric-car-van-price-nepal-exterior.jpg','बा.प.०३-००१ प ३२३९',60000,'Kathar',60,'Ishwore Chaudhary',0,''),(8,'ishwore@gmail.com','9811264300','2022-08-24',2,'krfgsdjigs','Audi_Q8_Premium_55','images/Audi_Q8_Premium_55_TFSI_Quattro.jpg','बा.प.०३-००१ प ३२९९',50000,'Kathar',60,'Ishwore Chaudhary',0,''),(9,'ishwore@gmail.com','9811264300','2022-08-25',5,'for student tour.','Dlexu','images/bus.jfif','बा.प.०३-००१ प ३२५४',125000,'Kathar',60,'Ishwore Chaudhary',0,''),(10,'ishwore@gmail.com','9811264300','2022-08-22',2,'edglfz','BYD-t3','images/BYD-t3-electric-car-van-price-nepal-exterior.jpg','बा.प.०३-००१ प ३२३९',24000,'Kathar',60,'Ishwore Chaudhary',0,''),(11,'ishwore@gmail.com','9811264300','2022-08-24',2,'dkgskf','Renegade Altitude','images/Jeep_Renegade_Altitude.jpg','बा.प.०३-००१ प ३२७९',28000,'Kathar',60,'Ishwore Chaudhary',0,''),(12,'ishwore@gmail.com','9811264300','2022-08-25',5,'ergksdlg','Audi_S3_Prestige','images/Audi_S3_Prestige.jpg','बा.प.०३-००१ प ३२३१',100000,'Kathar',60,'Ishwore Chaudhary',0,''),(13,'raju12@gmail.com','9811264300','2022-08-26',2,'erngsdkjg','BYD-M3','images/BYD-m3.jpg','बा.प.०३-००१ प ३२९४',20000,'Kathar',61,'Raju',0,''),(14,'raju12@gmail.com','9811264300','2022-08-25',2,'jtgadsjfkjas','Audi_Q8_Premium_55','images/Audi_Q8_Premium_55_TFSI_Quattro.jpg','बा.प.०३-००१ प ३२९९',50000,'Kathar',61,'Raju',0,''),(15,'raju12@gmail.com','9811264300','2022-08-25',2,'dkfgsdjgs','Dlexu','images/bus.jfif','बा.प.०३-००१ प ३२५४',50000,'Kathar',61,'Raju',0,''),(16,'mohan@gmail.com','9811264300','2022-08-26',5,'test','BYD-t3','images/BYD-t3-electric-car-van-price-nepal-exterior.jpg','बा.प.०३-००१ प ३२३९',60000,'Kathar',62,'mohan',24,'2022/08/24');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `cat_desc` varchar(600) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`cat_id`,`category_name`,`cat_desc`) values (1,'Bus','This is very good'),(3,'van','This is very good'),(7,'Car','This is very good'),(11,'Jeep','It is very well for family visiting.');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`user_id`,`uname`,`password`,`user_type`,`email`,`phone`,`address`,`created_date`) values (55,'Ram','781e5e245d69b566979b86e28d23f2c7',0,'ram@gmail.com','9811264300','Kathar','2022-08-17'),(56,'Ishwore','87ca27b0d62caff02480fb5326f75e62',1,'chaudharyishwore@gmail.com','9811264300','Kathar','2022-08-17'),(59,'Aryan','781e5e245d69b566979b86e28d23f2c7',0,'aryan@gmail.com','9811264300','Kathar','2022-08-18'),(60,'Ishwore Chaudhary','781e5e245d69b566979b86e28d23f2c7',0,'ishwore@gmail.com','9811264300','Kathar','2022-08-21'),(61,'Raju','781e5e245d69b566979b86e28d23f2c7',0,'raju12@gmail.com','9811264300','Kathar','2022-08-21'),(62,'mohan','781e5e245d69b566979b86e28d23f2c7',0,'mohan@gmail.com','9811264306','Kathar','2022-08-23');

/*Table structure for table `vehicle_item` */

DROP TABLE IF EXISTS `vehicle_item`;

CREATE TABLE `vehicle_item` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(50) NOT NULL,
  `v_desc` varchar(600) NOT NULL,
  `price` int(25) NOT NULL,
  `imgurl` varchar(10000) NOT NULL,
  `v_number` varchar(20) NOT NULL,
  `cat_id` int(50) NOT NULL,
  PRIMARY KEY (`v_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `vehicle_item_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `vehicle_item` */

insert  into `vehicle_item`(`v_id`,`v_name`,`v_desc`,`price`,`imgurl`,`v_number`,`cat_id`) values (1,'Dlexu','The bus has 35 seats with gurus seats.',30000,'images/bus1.jfif','बा.प.०३-००१ प ३२३४',1),(2,'Krishna Safari','The bus has 45 seats with gurus seats.',30000,'images/bus2.jfif','बा.प.०३-००१ प ३२५४',1),(3,'BYD-M3','The van has comfortable carrying goods.',25000,'images/BYD-m3.jpg','बा.प.०३-००१ प ३२४४',3),(4,'BYD-T3','The van has comfortable carrying goods.',20000,'images/BYD-t3-electric-car-van-price-nepal-exterior.jpg','बा.प.०३-००१ प ३२९९',3),(5,'Audi_S3_Prestige','The car has very well for family visiting.',35000,'images/Audi_S3_Prestige.jpg','बा.प.०३-००१ प ३२३९',7),(6,'Audi_Q8_Premium_55','The car has very well for family visiting.',40000,'images/Audi_Q8_Premium_55_TFSI_Quattro.jpg','बा.प.०३-००१ प ३२३८',7),(7,'Wrangler','The jeep has very well for family visiting.',30000,'images/Jeep_Wrangler_Unlimited_Sahara.jpg','बा.प.०३-००१ प ३२३५',11),(8,'Grand Wagoneer','The jeep has very well for family visiting.',30000,'images/Jeep_Grand_Wagoneer.jpg','बा.प.०३-००१ प ३२५५',11),(9,'Renegade','The jeep has very well for family visiting.',30000,'images/Jeep_Renegade_Altitude.jpg','बा.प.०३-००१ प ३२५७',11);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
