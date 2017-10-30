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
-- Table structure for table `EmailToken`
--

CREATE TABLE IF NOT EXISTS `EmailToken` (
  `Tokenid` int(11) NOT NULL AUTO_INCREMENT,
  `EmailTemplate` varchar(255) NOT NULL,
  PRIMARY KEY (`Tokenid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `EmailToken`
--

INSERT INTO `EmailToken` (`Tokenid`, `EmailTemplate`) VALUES
(1, 'Email Template1'),
(2, 'Email Template2'),
(3, 'Email Template3'),
(4, 'Email Template4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
