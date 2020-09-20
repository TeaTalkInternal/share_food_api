-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2016 at 12:54 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `StarveNoMore`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `booker_number` varchar(20) NOT NULL,
  `product_id` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` VALUES('8787087870', 1479002512);
INSERT INTO `Book` VALUES('8787087870', 1479002512);
INSERT INTO `Book` VALUES('8787087870', 1479006183);
INSERT INTO `Book` VALUES('8787087870', 1479020318);
INSERT INTO `Book` VALUES('8787087870', 1479020498);
INSERT INTO `Book` VALUES('9844441018', 1479015661);
INSERT INTO `Book` VALUES('8787087870', 1479020498);
INSERT INTO `Book` VALUES('8787087870', 1479020318);
INSERT INTO `Book` VALUES('9999999999', 1478995328);
INSERT INTO `Book` VALUES('8787087870', 1478998185);

-- --------------------------------------------------------

--
-- Table structure for table `FoodImages`
--

CREATE TABLE `FoodImages` (
  `filename` varchar(45) NOT NULL,
  `filetype` varchar(25) NOT NULL,
  `filesize` double NOT NULL,
  `uniqueid` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FoodImages`
--

INSERT INTO `FoodImages` VALUES('1478995195_file.png', 'image/png', 692.002929688, 1478995195);
INSERT INTO `FoodImages` VALUES('1478995328_file.png', 'image/png', 863.490234375, 1478995328);
INSERT INTO `FoodImages` VALUES('1478998185_file.png', 'image/png', 332.692382812, 1478998185);

-- --------------------------------------------------------

--
-- Table structure for table `FoodItem`
--

CREATE TABLE `FoodItem` (
  `name` varchar(100) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `uniqueid` double NOT NULL,
  `reportedabuse` int(11) NOT NULL,
  `phonenumber` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `istaken` int(11) NOT NULL,
  `uploaddate` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `is_regular` int(11) NOT NULL,
  `mon` int(11) NOT NULL,
  `tue` int(11) NOT NULL,
  `wed` int(11) NOT NULL,
  `thur` int(11) NOT NULL,
  `fri` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `sun` int(11) NOT NULL,
  `is_needy` int(11) NOT NULL,
  `alternate_phonenumber` varchar(20) NOT NULL,
  `pickat_date` double NOT NULL,
  `pickby_date` double NOT NULL,
  `serves_count` int(11) NOT NULL,
  `isbooked` int(11) NOT NULL,
  `ispending` int(11) NOT NULL,
  `bookiePhonenumber` varchar(20) NOT NULL,
  `image_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FoodItem`
--

INSERT INTO `FoodItem` VALUES('xxxxx', 'rabbit', 1478995195, 0, '8787087870', 'xxxxx@yyy.com', 'Goofy forgot', 0, '', 'South Atlantic Ocean', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8787087870', 1479038300.64966, 1479040100.64966, 1, 0, 0, '', '');
INSERT INTO `FoodItem` VALUES('xxxxx', 'n wended', 1478995328, 0, '8787087870', 'xxxxx@yyy.com', 'Jcjcnsjnsjnjscnjsan', 1, '', 'Atlantic Ocean', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '8787087870', 1479038396.56917, 1479040196.56917, 1, 0, 0, '', '1478995328_file.png');
INSERT INTO `FoodItem` VALUES('xxxxx', 'falls', 1478998185, 0, '9999999999', 'xxxxx@yyy.com', 'Djbfjjnsjng', 0, '', 'Atlantic Ocean', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '9999999999', 1479041365.92008, 1479043165.92008, 1, 0, 1, '', '1478998185_file.png');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `username` mediumtext NOT NULL,
  `phonenumber` varchar(25) NOT NULL,
  `email` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` VALUES('', '9987565432', 'xxxxx@yyy.com');
INSERT INTO `Login` VALUES('', '8117002674', 'xxxxx@yyy.com');
INSERT INTO `Login` VALUES('', '8455666774', 'xxxxx@yyy.com');
INSERT INTO `Login` VALUES('', '8787087870', 'xxxxx@yyy.com');
INSERT INTO `Login` VALUES('', '98444401018', 'xxxxx@yyy.com');
INSERT INTO `Login` VALUES('', '8787087870', 'xxxxx@yyy.com');
INSERT INTO `Login` VALUES('', '9999999999', 'xxxxx@yyy.com');
