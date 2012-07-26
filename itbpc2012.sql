-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2012 at 06:10 AM
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
CREATE DATABASE `itbpc2012` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `itbpc2012`;

-- --------------------------------------------------------

--
-- Table structure for table `contestant`
--
-- Creation: Jul 15, 2012 at 10:52 AM
--

DROP TABLE IF EXISTS `contestant`;
CREATE TABLE IF NOT EXISTS `contestant` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_username` varchar(50) COLLATE utf8_bin NOT NULL,
  `contestant_password` varchar(100) COLLATE utf8_bin NOT NULL,
  `contestant_type` int(11) NOT NULL,
  `contestant_code` text COLLATE utf8_bin NOT NULL,
  `contestant_flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`contestant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `contestant_high_school`
--
-- Creation: Jul 20, 2012 at 02:37 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=28 ;

--
-- RELATIONS FOR TABLE `contestant_high_school`:
--   `contestant_id`
--       `contestant` -> `contestant_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestant_image`
--
-- Creation: Jul 25, 2012 at 03:54 AM
--

DROP TABLE IF EXISTS `contestant_image`;
CREATE TABLE IF NOT EXISTS `contestant_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_id` int(11) NOT NULL,
  `contestant_image_url` text COLLATE utf8_bin NOT NULL,
  `contestant_image_type` int(11) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `contestant_id` (`contestant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- RELATIONS FOR TABLE `contestant_image`:
--   `contestant_id`
--       `contestant` -> `contestant_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestant_university`
--
-- Creation: Jul 20, 2012 at 05:40 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
-- Constraints for table `contestant_image`
--
ALTER TABLE `contestant_image`
  ADD CONSTRAINT `contestant_image_ibfk_1` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`contestant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contestant_university`
--
ALTER TABLE `contestant_university`
  ADD CONSTRAINT `contestant_university_ibfk_1` FOREIGN KEY (`contestant_id`) REFERENCES `contestant` (`contestant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
