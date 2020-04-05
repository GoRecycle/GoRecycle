-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2020 at 02:05 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecov3`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`materialID`, `materialName`, `description`, `pointsPerKg`) VALUES
(1, 'plastic', 'big', 10);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `submissionID` int(11) NOT NULL AUTO_INCREMENT,
  `proposedDate` varchar(20) NOT NULL,
  `actualDate` datetime NOT NULL,
  `weightInKg` int(11) NOT NULL,
  `pointsAwarded` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `materialName` varchar(20) NOT NULL,
  `cUserName` varchar(10) NOT NULL,
  `rUserName` varchar(10) NOT NULL,
  PRIMARY KEY (`submissionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submissionID`, `proposedDate`, `actualDate`, `weightInKg`, `pointsAwarded`, `status`, `materialName`, `cUserName`, `rUserName`) VALUES
(1, 'Sunday', '2020-04-05 01:57:34', 22, 0, 'submitted', '1', 'William Ta', ''),
(2, 'Sunday', '0000-00-00 00:00:00', 25, 0, 'submitted', 'plastic', 'William Ta', 'Steven Tan');

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
  `materialTyp` varchar(20) DEFAULT NULL,
  `day` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullName`, `totalPoint`, `type`, `materialTyp`, `day`) VALUES
('admin', 'admin', 'Admin', 0, 'admin', NULL, NULL),
('stev', 'steven', 'Steven Tanurdjaja', 0, 'recycler', NULL, NULL),
('will', 'will', 'William Tanurdjaja', 0, 'collector', 'plastic', 'Sunday');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
