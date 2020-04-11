-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2020 at 03:40 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_move`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

DROP TABLE IF EXISTS `tbl_content`;
CREATE TABLE IF NOT EXISTS `tbl_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `page_title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`id`, `page_id`, `page_title`, `description`, `title`) VALUES
(1, 2, 'HIV 101', 'AIDS stands for Acquired Immunodeficiency Syndrome. Having HIV does not mean you have AIDS but when HIV is left untreated and completely breaks down your immune system over several years, it leads to HIV.', 'When left untreated, HIV leads to AIDS'),
(2, 2, 'living with hiv', 'You might worry that you can never have a relationship, or sex, or that you won\'t be loved but it is absolutely possible to have all these things when you have HIV, it is important to remember that there is much more to you than HIV.', 'You can still love and have sex.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_avatar` varchar(20) NOT NULL,
  `user_permissions` int(11) NOT NULL,
  `user_admin` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_avatar`, `user_permissions`, `user_admin`) VALUES
(3, 'Trevor', 'user1', 'password', 'me@you.com', '2020-03-09 15:48:21', '::1', 'olaf', 5, 1),
(5, 'Madelaine', 'user3', 'password', 'me@you.com', '2020-03-09 15:49:39', 'no', 'null', 3, 0),
(6, 'Isabelle', 'user4', 'password', 'me@you.com', '2020-03-09 15:50:13', 'no', 'null', 2, 0),
(7, 'Serena', 'user5', 'password', 'me@you.com', '2020-03-09 15:50:48', '::1', 'null', 2, 0),
(9, 'Ifekitan', 'iffy', '123', 'qsqs@dqdqs.com', '2020-04-10 17:06:48', 'no', 'null', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
