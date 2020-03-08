-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2020 at 11:49 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eco`
--

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `materialID` int(11) NOT NULL AUTO_INCREMENT,
  `materialName` varchar(20) NOT NULL,
  `description` varchar(30) NOT NULL,
  `pointsPerKg` int(11) NOT NULL,
  PRIMARY KEY (`materialID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`materialID`, `materialName`, `description`, `pointsPerKg`) VALUES
(10, 'sapi', 'putih', 1233);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `submissionID` int(11) NOT NULL AUTO_INCREMENT,
  `proposedDate` date NOT NULL,
  `actualDate` date NOT NULL,
  `weightInKg` int(11) NOT NULL,
  `pointsAwarded` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `materialID` int(11) NOT NULL,
  `cUserName` varchar(10) NOT NULL,
  `rUserName` varchar(10) NOT NULL,
  PRIMARY KEY (`submissionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `fullName` varchar(20) NOT NULL,
  `totalPoint` int(11) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT 'new',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullName`, `totalPoint`, `type`) VALUES
('admin', 'admin', 'Admin', 0, 'admin'),
('stev', 'steven', 'Steven Tanurdjaja', 0, 'recycler'),
('will', 'will', 'William Tanurdjaja', 0, 'collector');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
