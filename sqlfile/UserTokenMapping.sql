-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2017 at 10:46 PM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opentracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `UserTokenMapping`
--

CREATE TABLE IF NOT EXISTS `UserTokenMapping` (
  `Mappingid` int(11) NOT NULL AUTO_INCREMENT,
  `Userid` varchar(255) NOT NULL,
  `Tokenid` int(11) NOT NULL,
  PRIMARY KEY (`Userid`,`Tokenid`,`Mappingid`),
  UNIQUE KEY `Mappingid` (`Mappingid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `UserTokenMapping`
--

INSERT INTO `UserTokenMapping` (`Mappingid`, `Userid`, `Tokenid`) VALUES
(14, 'cgvenugopal93@gmail.com', 1),
(13, 'cgvenugopal93@gmail.com', 3),
(15, 'cgvenugopal93@gmail.com', 4),
(17, 'gopalcg123@gmail.com', 1),
(16, 'gopalcg123@gmail.com', 3),
(18, 'gopalcg123@gmail.com', 4),
(11, 'venugopal.cg@zohocorp.com', 1),
(9, 'venugopal.cg@zohocorp.com', 2),
(8, 'venugopal.cg@zohocorp.com', 3),
(10, 'venugopal.cg@zohocorp.com', 4),
(12, 'venugopal.cg@zohocorp.com', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
