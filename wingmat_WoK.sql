-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2019 at 04:10 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wingmat_WoK`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `Username` varchar(24) NOT NULL,
  `Name` varchar(24) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `BirthDate` date NOT NULL,
  `Password` varchar(255) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `StreetName` varchar(30) NOT NULL,
  `City` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`Username`, `Name`, `Email`, `BirthDate`, `Password`, `StreetNumber`, `StreetName`, `City`) VALUES
('tonda', 'David Tonda', 'tonda@gmail.com', '2019-05-01', '$2y$10$QbQZLryCRu8T9q3kXd7JweuaehD/whKa1PgSN.VD1sgwmXDu/96ke', 12, 'Walter', 'Milburn'),
('philips', 'Shijil', 'philip@gmail.com', '1990-08-18', '$2y$10$cPzQgTHWRCdQLL2ZuWNTmOc54aUThgexzqOsx7EFYKkRRq.B6R8xi', 45, 'Driver', 'Forest');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `EmpID` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(24) NOT NULL,
  `Hourly_Pay` double NOT NULL,
  `SupervisorID` varchar(255) DEFAULT NULL,
  `UserType` varchar(1) NOT NULL,
  `Street Number` int(11) NOT NULL,
  `Street Name` varchar(30) NOT NULL,
  `City` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeSchedule`
--

CREATE TABLE `EmployeeSchedule` (
  `EmpID` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Date` date NOT NULL,
  `startShift` time NOT NULL,
  `endShift` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmployeeSchedule`
--

INSERT INTO `EmployeeSchedule` (`EmpID`, `Date`, `startShift`, `endShift`) VALUES
('987', '2019-05-15', '07:32:00', '20:00:00'),
('987', '2019-05-16', '07:00:00', '21:00:00'),
('988', '2019-06-21', '07:30:00', '17:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `Receipts`
--

CREATE TABLE `Receipts` (
  `CustomerName` varchar(24) NOT NULL,
  `Street Number` int(11) NOT NULL,
  `Street Name` varchar(30) NOT NULL,
  `City` varchar(25) NOT NULL,
  `TotalPrice` double NOT NULL,
  `SneakerName` varchar(30) NOT NULL,
  `NumberOfSneakersBought` int(11) NOT NULL,
  `DateofPurchase` date NOT NULL,
  `ReceiptID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `image` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Sneaker_Type`
--

CREATE TABLE `Sneaker_Type` (
  `Price` double NOT NULL,
  `Color` varchar(10) NOT NULL,
  `SneakerName` varchar(30) NOT NULL,
  `Size` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userLogin`
--

CREATE TABLE `userLogin` (
  `Username` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userLogin`
--

INSERT INTO `userLogin` (`Username`, `Password`, `UserType`) VALUES
('philips', '$2y$10$cPzQgTHWRCdQLL2ZuWNTmOc54aUThgexzqOsx7EFYKkRRq.B6R8xi', 'A'),
('tonda', '$2y$10$QbQZLryCRu8T9q3kXd7JweuaehD/whKa1PgSN.VD1sgwmXDu/96ke', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD PRIMARY KEY (`EmpID`),
  ADD KEY `SupervisorID` (`SupervisorID`);

--
-- Indexes for table `EmployeeSchedule`
--
ALTER TABLE `EmployeeSchedule`
  ADD KEY `SSN` (`EmpID`);

--
-- Indexes for table `Receipts`
--
ALTER TABLE `Receipts`
  ADD PRIMARY KEY (`ReceiptID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `Sneaker_Type`
--
ALTER TABLE `Sneaker_Type`
  ADD PRIMARY KEY (`Color`,`SneakerName`,`Size`);

--
-- Indexes for table `userLogin`
--
ALTER TABLE `userLogin`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
