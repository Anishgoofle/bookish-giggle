-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 02:27 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iconic`
--

-- --------------------------------------------------------

--
-- Table structure for table `cnewticket`
--

CREATE TABLE `cnewticket` (
  `id` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `priority` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `remark` text NOT NULL,
  `uploads` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `date` varchar(200) NOT NULL,
  `updated` varchar(200) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `count` int(11) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`count`) VALUES
(1000);

-- --------------------------------------------------------

--
-- Table structure for table `cruser`
--

CREATE TABLE `cruser` (
  `customer` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `product` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cruser`
--

INSERT INTO `cruser` (`customer`, `company`, `product`, `name`, `mail`, `email`, `type`, `username`, `password`) VALUES
('siemens', 'franchise', 'Engineering', 'abhishek', 'franchise@gmail.com', 'franchise1@gmail.com', 'franchise', 'franchise', 'franchise'),
('siemens', 'iconic', 'Engineering', 'admin', 'admin@gmail.com', 'admin1@gmail.com', 'Admin', 'admin', 'admin'),
('abc', 'Banthiya', 'Engineering', 'Banthiya', 'customer@gmail.com', 'Customer1@gmail.com', 'Customer', 'customer', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `fnewticket`
--

CREATE TABLE `fnewticket` (
  `id` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `priority` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `remark` text NOT NULL,
  `uploads` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `date` varchar(200) NOT NULL,
  `updated` varchar(200) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `number` int(100) NOT NULL,
  `from` varchar(200) NOT NULL,
  `to` varchar(200) NOT NULL,
  `reply` longtext NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  `stat` varchar(200) NOT NULL,
  `from_check` varchar(200) NOT NULL,
  `to_check` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cruser`
--
ALTER TABLE `cruser`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
