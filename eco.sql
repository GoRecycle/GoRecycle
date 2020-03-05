-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2020 at 08:49 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `material`
--


-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE SUBMISSION(
  submissionID VARCHAR(10), 
  proposedDate DATE NOT NULL, 
  actualDate DATE, 
  weightInKg INTEGER NOT NULL,
  pointsAwarded INTEGER,
  status VARCHAR(10),
  materialID VARCHAR(10),
  CollectorUname VARCHAR(10), 
  RecyclerUname VARCHAR(10),
  PRIMARY KEY (submissionID),
  FOREIGN KEY (CollectorUname) REFERENCES COLLECTOR(username),
  FOREIGN KEY (RecyclerUname) REFERENCES RECYCLER(username),
  FOREIGN KEY (materialID) REFERENCES MATERIAL(materialID)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('admin', 'admin', 'Admin', 0, 'new');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
