-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 12:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelsribatik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMINID` int(15) NOT NULL,
  `FULLNAME` varchar(55) NOT NULL,
  `ADMINNAME` varchar(55) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(55) NOT NULL,
  `STATUS` varchar(55) NOT NULL DEFAULT 'OFFLINE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMINID`, `FULLNAME`, `ADMINNAME`, `PASSWORD`, `EMAIL`, `STATUS`) VALUES
(5, 'Mohamad Usamah Thani Bin Che Arif', 'Sam', '$2y$10$CmogdXoCDmGRRj4PuCEvEO287.zPq3wkTG4YnQQYEFmm3K2L5EmNi', 'usamahsamah@gmail.com', 'ONLINE'),
(7, 'Ziyad Bin Azhari', 'Yad', '$2y$10$XEb8PorClGiLsdAQNRKm7uogjH4meuDXRKpqPEWUOucXDI68oB2qK', 'something@something.com', 'OFFLINE'),
(8, 'Muhamad Haziq Bin Azhari', 'Jikyun', '$2y$10$E4M7l4jKK0wGaOWDwbCCPecqYrXr51Br.pmjfLAvxvbr6Rec3H67S', 'jikyun@yahoo.com', 'OFFLINE');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUSTID` varchar(15) NOT NULL,
  `CUSTNAME` varchar(55) NOT NULL,
  `CUSTPHONENUM` varchar(55) NOT NULL,
  `CUSTADDRESS` varchar(100) NOT NULL,
  `CUSTEMAIL` varchar(55) NOT NULL,
  `CUSTDATE` date NOT NULL,
  `CUSTPERIOD` int(11) NOT NULL,
  `CUSTGENDER` varchar(5) NOT NULL,
  `CUSTROOMNUM` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUSTID`, `CUSTNAME`, `CUSTPHONENUM`, `CUSTADDRESS`, `CUSTEMAIL`, `CUSTDATE`, `CUSTPERIOD`, `CUSTGENDER`, `CUSTROOMNUM`) VALUES
('3t3zbzfq', 'Ziyad Bin Azhari', '01112192950', 'Test', 'james@gmail.com', '2023-06-23', 5, 'MALE', '305');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYID` int(15) NOT NULL,
  `PAYCUSTNAME` varchar(55) NOT NULL,
  `PAYROOM` int(15) NOT NULL,
  `PAYPERIOD` int(11) NOT NULL,
  `PAYDATE` date NOT NULL,
  `PAYTIME` time NOT NULL,
  `PAYTOTAL` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAYID`, `PAYCUSTNAME`, `PAYROOM`, `PAYPERIOD`, `PAYDATE`, `PAYTIME`, `PAYTOTAL`) VALUES
(1, 'James Bond', 101, 2, '2023-06-22', '18:55:07', '200.00'),
(2, 'Fadhil Rais', 102, 3, '2023-06-22', '20:44:49', '300.00'),
(3, 'Usamah', 103, 2, '2023-07-01', '00:40:14', '200.00'),
(4, 'Arif', 304, 5, '2023-08-23', '01:07:22', '1500.00'),
(5, 'James Bond', 101, 3, '2023-06-26', '12:01:32', '300.00'),
(6, 'Ahmad Zakir', 204, 3, '2023-06-26', '12:01:55', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ROOMNUMBER` int(11) NOT NULL,
  `ROOMTYPE` varchar(45) DEFAULT NULL,
  `ROOMPRICE` decimal(15,2) DEFAULT NULL,
  `ISAVAILABLE` tinyint(1) DEFAULT 1 COMMENT '0 means room is not available\r\n1 is available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ROOMNUMBER`, `ROOMTYPE`, `ROOMPRICE`, `ISAVAILABLE`) VALUES
(101, 'Single', '100.00', 1),
(102, 'Single', '100.00', 1),
(103, 'Twin', '150.00', 1),
(104, 'Twin', '150.00', 1),
(105, 'Twin', '150.00', 1),
(201, 'Twin', '150.00', 1),
(202, 'Twin', '150.00', 1),
(203, 'Twin', '150.00', 1),
(204, 'Queen', '200.00', 1),
(205, 'Queen', '200.00', 1),
(301, 'Queen', '200.00', 1),
(302, 'Queen', '200.00', 1),
(303, 'Queen', '200.00', 1),
(304, 'Suite', '300.00', 1),
(305, 'Suite', '300.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `STAFFID` int(15) NOT NULL,
  `FULLNAME` varchar(55) NOT NULL,
  `STAFFNAME` varchar(55) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(55) NOT NULL,
  `STATUS` varchar(55) NOT NULL DEFAULT 'OFFLINE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`STAFFID`, `FULLNAME`, `STAFFNAME`, `PASSWORD`, `EMAIL`, `STATUS`) VALUES
(1, 'MOHAMAD USAMAH THANI BIN CHE ARIF', 'sam', '$2y$10$OCAKWXG5q2ejEBhmPk7UYeonDiOCtaC4GNHfJGoGH6ACntUxHeVVi', 'usamahsamah@gmail.com', 'OFFLINE'),
(5, 'Muhamad Haziq Bin Azhari', 'Jikyun', '$2y$10$97fif4zgKNqahcvNgM1zi.OBZajggbfw.bp/e70q5qXyz/GUkToQu', 'jikyun@yahoo.com', 'OFFLINE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMINID`),
  ADD UNIQUE KEY `ADMINNAME` (`ADMINNAME`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUSTID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ROOMNUMBER`),
  ADD UNIQUE KEY `roomNumber_UNIQUE` (`ROOMNUMBER`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`STAFFID`),
  ADD UNIQUE KEY `STAFFNAME` (`STAFFNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMINID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAYID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `STAFFID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
