-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 05:48 AM
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
('selam', 's', '25d55ad283aa400af464c76d713c07ad', '4kilo', 'we win!', '0943124454', 'c57946d49e19367aba0475211f6644be.jpg'),
('mona', 'm', '202cb962ac59075b964b07152d234b70', '4kilo', 'we win!', '0943124454', '4fe0389c85f47660e41900ab01f7bcc3.jpg');

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
