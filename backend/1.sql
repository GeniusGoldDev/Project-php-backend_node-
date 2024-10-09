/*
SQLyog Community v12.4.2 (64 bit)
MySQL - 10.4.22-MariaDB : Database - testnodeapi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`testnodeapi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `testnodeapi`;

/*Table structure for table `account_planes` */

DROP TABLE IF EXISTS `account_planes`;

CREATE TABLE `account_planes` (
  `id` int(11) DEFAULT NULL,
  `account_plan_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `account_planes` */

insert  into `account_planes`(`id`,`account_plan_name`) values 
(1,'Company account'),
(2,'Developer account'),
(3,'Testing account');

/*Table structure for table `business_types` */

DROP TABLE IF EXISTS `business_types`;

CREATE TABLE `business_types` (
  `id` int(11) DEFAULT NULL,
  `business_type_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `business_types` */

insert  into `business_types`(`id`,`business_type_name`) values 
(1,'S Corporation'),
(2,'C Corporation'),
(3,'Sole Proprietorship'),
(4,'Non-profit'),
(5,'Limited Liability'),
(6,'General Partnership');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`permission_name`,`created_at`,`updated_at`) values 
(1,'create_users','2024-10-02 10:43:10','2024-10-02 10:43:10'),
(2,'update_users','2024-10-02 10:43:10','2024-10-02 10:43:10'),
(3,'delete_users','2024-10-02 10:43:10','2024-10-02 10:43:10'),
(4,'view_users','2024-10-02 10:43:10','2024-10-02 10:43:10');

/*Table structure for table `role_permissions` */

DROP TABLE IF EXISTS `role_permissions`;

CREATE TABLE `role_permissions` (
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  KEY `role_id` (`role_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `role_permissions` */

insert  into `role_permissions`(`role_id`,`permission_id`,`menu_name`) values 
(1,1,'users'),
(1,2,'users'),
(1,3,'users'),
(2,1,'users'),
(1,4,'users');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role_name`) values 
(1,'Admin'),
(2,'User');

/*Table structure for table `user_profiles` */

DROP TABLE IF EXISTS `user_profiles`;

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `company_site` varchar(255) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `language` varchar(50) NOT NULL,
  `time_zone` varchar(50) NOT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `communication` varchar(255) DEFAULT NULL,
  `allow_marketing` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_profiles` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `account_team_size` varchar(100) DEFAULT NULL,
  `account_plan_id` int(11) DEFAULT NULL,
  `business_name` varchar(100) DEFAULT NULL,
  `business_descriptor` varchar(100) DEFAULT NULL,
  `business_description` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `card_name` varchar(100) DEFAULT NULL,
  `card_number` varchar(100) DEFAULT NULL,
  `card_cvv` int(11) DEFAULT NULL,
  `card_expiry_year` int(11) DEFAULT NULL,
  `card_expiry_month` int(11) DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`role_id`,`account_team_size`,`account_plan_id`,`business_name`,`business_descriptor`,`business_description`,`email`,`card_name`,`card_number`,`card_cvv`,`card_expiry_year`,`card_expiry_month`,`business_type_id`,`avatar`,`created_at`,`updated_at`) values 
(70,'John','$2a$10$rMPVqVlfRPvmboLmBZSAz.x3ql978pn/O/m6dOGyKM3uLgdrq1MLm',2,NULL,NULL,NULL,NULL,NULL,'John@kpmg.com',NULL,NULL,NULL,NULL,NULL,NULL,'C:\\fakepath\\download (3).jpg','2024-10-01 13:26:03','2024-10-02 04:59:23'),
(73,'zxc','$2a$10$pWBCoiL5fCmZNcBpe5H1EeYbgBtJoiHOZ9Xn0logvSwnqyGJluvRW',1,'2-10',3,'Keenthemes Inc.','KEENTHEMES','zxc','corp@support.com','Max Doe','4111 1111 1111 1111',444,2024,1,1,NULL,'2024-10-01 14:34:07','2024-10-01 14:34:07'),
(80,'Elis','$2a$10$rXK/akWZGRX/09lMsIhhtexkqpGE.hSV5MCSY3kij.NmOATmnJue2',2,'50+',3,'Keenthemes Inc.','KEENTHEMES','qweqweqwe','Elis@support.com','Max Doe','4111 1111 1111 1111',222,2025,2,1,NULL,'2024-10-02 04:02:59','2024-10-02 04:59:07'),
(93,'tytyty','$2a$10$N28di.6258uOyybgTkQzP.T37EShoYFO9/GssggRPaw1S2WdwvFN2',1,NULL,NULL,NULL,NULL,NULL,'tt@kpmg.com',NULL,NULL,NULL,NULL,NULL,NULL,'','2024-10-02 06:41:11','2024-10-02 10:35:37');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
