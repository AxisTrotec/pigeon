-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 08:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--
CREATE DATABASE IF NOT EXISTS `covid19` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `covid19`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getInfections`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getInfections` ()  NO SQL
SELECT * FROM infections$$

DROP PROCEDURE IF EXISTS `getRestaurant`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getRestaurant` ()  NO SQL
SELECT * FROM restaurants$$

DROP PROCEDURE IF EXISTS `getRestaurantNameAndID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getRestaurantNameAndID` ()  NO SQL
SELECT ID, restaurant_name FROM restaurants$$

DROP PROCEDURE IF EXISTS `getVisits`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getVisits` (IN `ID` INT)  NO SQL
SELECT phone, firstname, lastname, timein, timeout FROM visits
WHERE ID = ID$$

DROP PROCEDURE IF EXISTS `insertInfections`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertInfections` (IN `_phone_number` VARCHAR(255), IN `_first_name` VARCHAR(255), IN `_last_name` VARCHAR(255), IN `_test_center` VARCHAR(255), IN `_test_date` DATE, IN `_start_date` DATE, IN `_end_date` DATE)  NO SQL
INSERT INTO infections (phone_number, first_name, last_name, test_center, test_date, start_date, end_date) 
VALUES (_phone_number, _first_name, _last_name, _test_center, _test_date, _start_date, _end_date)$$

DROP PROCEDURE IF EXISTS `insertRestaurant`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertRestaurant` (IN `_restaurant_name` VARCHAR(255), IN `_phone` VARCHAR(255), IN `_email` VARCHAR(255), IN `_street_address` VARCHAR(255), IN `_city` VARCHAR(255), IN `_province` VARCHAR(255))  NO SQL
INSERT INTO restaurants (restaurant_name, phone, email, street_adress, city, province)
VALUES (_restaurant_name, _phone, _email, _street_address, _city, _province)$$

DROP PROCEDURE IF EXISTS `insertVisits`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertVisits` (IN `_restaurant` INT, IN `_phone` VARCHAR(255), IN `_timein` DATETIME, IN `_timeout` DATETIME)  NO SQL
INSERT INTO visits (restaurant, phone, timein, timeout)
VALUES (_restaurant, _phone, _timein , -timeout)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `infections`
--

DROP TABLE IF EXISTS `infections`;
CREATE TABLE `infections` (
  `ID` int(11) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `test_center` varchar(255) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `ID` int(11) NOT NULL,
  `restaurant_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

DROP TABLE IF EXISTS `visits`;
CREATE TABLE `visits` (
  `restaurant` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `timein` datetime DEFAULT NULL,
  `timeout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infections`
--
ALTER TABLE `infections`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `restaurant` (`restaurant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infections`
--
ALTER TABLE `infections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`restaurant`) REFERENCES `restaurants` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
