
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2015 at 02:56 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
CREATE Database `a5367352_db`;
--

-- --------------------------------------------------------

--
-- Table structure for table `MAGNETIC`
--

CREATE TABLE `MAGNETIC` (
  `mac` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `magnetic` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `MAGNETIC`
--


-- --------------------------------------------------------

--
-- Table structure for table `MICROPHONE`
--

CREATE TABLE `MICROPHONE` (
  `mac` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `microphone` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `MICROPHONE`
--


-- --------------------------------------------------------

--
-- Table structure for table `PROXIMITY`
--

CREATE TABLE `PROXIMITY` (
  `mac` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `proximity` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `PROXIMITY`
--


-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `user` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `mac` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`mac`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `USERS`
--


-- --------------------------------------------------------

--
-- Table structure for table `valTab`
--

CREATE TABLE `valTab` (
  `time` timestamp NULL DEFAULT NULL,
  `proximity` int(11) DEFAULT NULL,
  `magnetic` int(11) DEFAULT NULL,
  `microphone` int(11) DEFAULT NULL,
  `text` varchar(100) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `valTab`
--

INSERT INTO `valTab` VALUES('2015-11-20 03:01:38', 10, 20, NULL, NULL);
INSERT INTO `valTab` VALUES('2015-11-20 03:02:09', 10, 20, NULL, NULL);
INSERT INTO `valTab` VALUES('2015-11-20 03:02:39', 10, 20, NULL, NULL);
INSERT INTO `valTab` VALUES('2015-11-20 03:03:16', 10, 20, NULL, NULL);
INSERT INTO `valTab` VALUES('2015-11-20 03:03:46', 10, 20, NULL, NULL);
INSERT INTO `valTab` VALUES('2015-11-20 03:04:16', 10, 20, NULL, NULL);
INSERT INTO `valTab` VALUES('2015-11-20 03:04:47', 10, 20, NULL, NULL);
INSERT INTO `valTab` VALUES('2015-11-20 00:00:00', 1, 0, NULL, NULL);
INSERT INTO `valTab` VALUES('2015-11-20 00:00:00', 5, 5, NULL, NULL);
