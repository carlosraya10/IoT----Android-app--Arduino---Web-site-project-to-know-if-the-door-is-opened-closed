-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2015 at 04:51 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a5367352_db`
--
CREATE DATABASE a5367352_db;
USE a5367352_db;
-- --------------------------------------------------------

--
-- Table structure for table `MAGNETIC`
--

CREATE TABLE `MAGNETIC` (
  `mac` char(40) COLLATE latin1_general_ci NOT NULL REFERENCES USERS(mac),
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
  `mac` char(40) COLLATE latin1_general_ci NOT NULL REFERENCES USERS(mac),
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
  `mac` char(40) COLLATE latin1_general_ci NOT NULL REFERENCES USERS(mac),
  `proximity` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `PROXIMITY`
--

INSERT INTO `PROXIMITY` VALUES('', 0, '2015-12-16 13:10:09');
INSERT INTO `PROXIMITY` VALUES('123', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `user` char(40) COLLATE latin1_general_ci NOT NULL,
  `pass` char(40) COLLATE latin1_general_ci NOT NULL,
  `mac` char(40) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`mac`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `USERS`
--  //$mac1 = sha1("D8-FC-93-EC-C8-09"); 6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0
--  //$user = sha1("carlosraya10"); for mac1
--  //$pass = sha1("Raya_2009"); for mac1
--  //$mac2 = sha1("A0-CE-39-FC-D2-03"); 35b3e5fa57c6307e3884ceda123d84ad7e1f4784
--

--INSERT INTO `USERS` VALUES('usuario', 'f9222ebe6930240b2cb7f3cfb474dd76ffbd4638', '');
--INSERT INTO `USERS` VALUES('usuario2', 'f9222ebe6930240b2cb7f3cfb474dd76ffbd4638', 'mac1');
--INSERT INTO `USERS` VALUES('usuario22', 'fdd9d78090f4cb1c4898775ee3551fdeb9d13222', 'mac2');
--INSERT INTO `USERS` VALUES('usuario222', 'fdd9d78090f4cb1c4898775ee3551fdeb9d13222', 'mac22');
INSERT INTO `USERS` VALUES('b665e217b51994789b02b1838e730d6b93baa30f', 'fdd9d78090f4cb1c4898775ee3551fdeb9d13222', '35b3e5fa57c6307e3884ceda123d84ad7e1f4784');
INSERT INTO `USERS` VALUES('a99820cc06a8d2d507080d056a289b06f108d8ed', '4e429f2f9d63ecbf0f9f744833d717a3a85134a7', '6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0');

-- --------------------------------------------------------



INSERT INTO `PROXIMITY` VALUES('6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0', '923', '2015-11-15 19:03:18');
INSERT INTO `PROXIMITY` VALUES('6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0', '43', '2015-11-15 19:04:09');
INSERT INTO `PROXIMITY` VALUES('35b3e5fa57c6307e3884ceda123d84ad7e1f4784', '987', '2015-11-15 18:20:03');
INSERT INTO `MAGNETIC` VALUES('6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0', '694', '2015-11-15 19:03:25');
INSERT INTO `MAGNETIC` VALUES('6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0', '401', '2015-11-15 19:04:01');
INSERT INTO `MAGNETIC` VALUES('35b3e5fa57c6307e3884ceda123d84ad7e1f4784', '695', '2015-11-15 18:20:10');
INSERT INTO `MICROPHONE` VALUES('6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0', '727', '2015-11-15 19:03:37');
INSERT INTO `MICROPHONE` VALUES('6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0', '742', '2015-11-15 19:03:46');
INSERT INTO `MICROPHONE` VALUES('35b3e5fa57c6307e3884ceda123d84ad7e1f4784', '621', '2015-11-15 18:20:38');
