-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2019 at 03:24 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `paanchajanya`
--

-- --------------------------------------------------------

--
-- Table structure for table `event4`
--

CREATE TABLE IF NOT EXISTS `event4` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `member1` int(50) NOT NULL,
  `member2` int(50) NOT NULL,
  `member3` int(50) NOT NULL,
  `member4` int(50) NOT NULL,
  `member5` int(50) NOT NULL,
  `member6` int(50) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event4`
--

