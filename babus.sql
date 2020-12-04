-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 11:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babus`
--
CREATE DATABASE IF NOT EXISTS `babus` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `babus`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminname` varchar(256) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `accountnumber` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminname`, `password`, `phonenumber`, `firstname`, `lastname`, `email`, `accountnumber`) VALUES
('a', '25d55ad283aa400af464c76d713c07ad', '1234', 'e', 'en', 'a@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `plateNumber` varchar(30) NOT NULL,
  `numberOfSeats` int(11) NOT NULL,
  `registrationDate` int(30) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `companyname`, `status`, `plateNumber`, `numberOfSeats`, `registrationDate`, `picture`) VALUES
(1, 'selam', 'active', '12904', 40, 1600993663, '68d186eae25fadacaaff6fdd6b084529.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `busseat`
--

DROP TABLE IF EXISTS `busseat`;
CREATE TABLE `busseat` (
  `ticketid` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `maxnumofseats` int(11) NOT NULL,
  `busid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `busseat`
--

INSERT INTO `busseat` (`ticketid`, `round`, `maxnumofseats`, `busid`) VALUES
(1, 1, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `busvendor`
--

DROP TABLE IF EXISTS `busvendor`;
CREATE TABLE `busvendor` (
  `companyname` varchar(256) NOT NULL,
  `companyusername` varchar(255) NOT NULL,
  `companypassword` varchar(255) NOT NULL,
  `companyaddress` varchar(255) NOT NULL,
  `companymoto` varchar(50) NOT NULL,
  `companylocation` varchar(120) NOT NULL,
  `companylogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `busvendor`
--

INSERT INTO `busvendor` (`companyname`, `companyusername`, `companypassword`, `companyaddress`, `companymoto`, `companylocation`, `companylogo`) VALUES
('selam', 's', '25d55ad283aa400af464c76d713c07ad', '4kilo', 'we win!', '0943124454', 'f712749aafa87afdb0a0b03d94fd2eb3.jpg'),
('mona', 'm', '202cb962ac59075b964b07152d234b70', '4kilo', 'we win!', '0943124454', '1f9ee0435edbf9619fc46efec08376b3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `name` varchar(256) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `picture` varchar(2048) NOT NULL,
  `description` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`name`, `latitude`, `longitude`, `picture`, `description`) VALUES
('Addis Abeba', '8.9806', '38.7578', '361443c3c2d5f061f845346e30b91bf0.jpg', 'Addis Abeba City is the capital city of Ethiopia!');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `route` varchar(2048) NOT NULL,
  `providername` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `transportType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `route`, `providername`, `status`, `transportType`) VALUES
(1, 'Addis Abeba,Bishoftu,Mojo,Adama', 'selam', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticketavailable`
--

DROP TABLE IF EXISTS `ticketavailable`;
CREATE TABLE `ticketavailable` (
  `ticketid` int(11) NOT NULL,
  `finalsaledate` date NOT NULL,
  `finalbookingday` date NOT NULL,
  `paymentamount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `busids` varchar(255) NOT NULL,
  `transportType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticketuser`
--

DROP TABLE IF EXISTS `ticketuser`;
CREATE TABLE `ticketuser` (
  `ticketAvailableId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ticketdate` date NOT NULL,
  `status` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `round` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trainvendor`
--

DROP TABLE IF EXISTS `trainvendor`;
CREATE TABLE `trainvendor` (
  `companyname` varchar(256) NOT NULL,
  `companyusername` varchar(255) NOT NULL,
  `companypassword` varchar(255) NOT NULL,
  `companyaddress` varchar(255) NOT NULL,
  `companymoto` varchar(50) NOT NULL,
  `companylocation` varchar(120) NOT NULL,
  `companylogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainvendor`
--

INSERT INTO `trainvendor` (`companyname`, `companyusername`, `companypassword`, `companyaddress`, `companymoto`, `companylocation`, `companylogo`) VALUES
('Ethiopian Railway Corporation', 'erc', '25d55ad283aa400af464c76d713c07ad', '4kilo', 'Connecting Ethiopia', 'Kaliti A.A', 'c57946d49e19367aba0475211f6644be.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(256) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `accountnumber` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `phonenumber`, `firstname`, `lastname`, `email`, `accountnumber`) VALUES
('a', '25d55ad283aa400af464c76d713c07ad', '1234', 'e', 'en', 'a@gmail.com', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
