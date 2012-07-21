-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2012 at 01:59 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itbpc2012`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestant`
--

DROP TABLE IF EXISTS `contestant`;
CREATE TABLE IF NOT EXISTS `contestant` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_username` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_password` varchar(100) COLLATE utf8_bin NOT NULL,
  `contestant_type` int(11) NOT NULL,
  `contestant_code` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`contestant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `contestant_high_school`
--

DROP TABLE IF EXISTS `contestant_high_school`;
CREATE TABLE IF NOT EXISTS `contestant_high_school` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_phone` varchar(30) COLLATE utf8_bin NOT NULL,
  `contestant_address` text COLLATE utf8_bin NOT NULL,
  `contestant_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_class` varchar(30) COLLATE utf8_bin NOT NULL,
  `contestant_school_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_school_address` text COLLATE utf8_bin NOT NULL,
  `contestant_supervisor` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`contestant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- RELATIONS FOR TABLE `contestant_high_school`:
--   `contestant_id`
--       `contestant` -> `contestant_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestant_university`
--

DROP TABLE IF EXISTS `contestant_university`;
CREATE TABLE IF NOT EXISTS `contestant_university` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_team_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_university_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_university_address` text COLLATE utf8_bin NOT NULL,
  `contestant_leader_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_leader_phone` varchar(30) COLLATE utf8_bin NOT NULL,
  `contestant_leader_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_second_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_third_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_supervisor_name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`contestant_id`),
  UNIQUE KEY `contestant_team_name` (`contestant_team_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- RELATIONS FOR TABLE `contestant_university`:
--   `contestant_id`
--       `contestant` -> `contestant_id`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contestant_high_school`
--
ALTER TABLE `contestant_high_school`
  ADD CONSTRAINT `contestant_high_school_ibfk_1` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`contestant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contestant_university`
--
ALTER TABLE `contestant_university`
  ADD CONSTRAINT `contestant_university_ibfk_1` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`contestant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
