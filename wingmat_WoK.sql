-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2019 at 06:14 PM
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
  `Password` varchar(255) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `StreetName` varchar(30) NOT NULL,
  `City` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`Username`, `Name`, `Email`, `Password`, `StreetNumber`, `StreetName`, `City`) VALUES
('testCustomer', 'testCustomer', 'testCustomer@gmail.com', '$2y$10$iBGiQHqzVRXh3Ji282DEYO1JfLgHwzdIK9DhyRZZjibqWWNXh1g0u', 19, 'Grover Road', 'Manville');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `EmpID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(24) NOT NULL,
  `Hourly_Pay` double NOT NULL,
  `SupervisorID` varchar(255) DEFAULT NULL,
  `UserType` varchar(1) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `StreetName` varchar(30) NOT NULL,
  `City` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`EmpID`, `Password`, `Name`, `Hourly_Pay`, `SupervisorID`, `UserType`, `StreetNumber`, `StreetName`, `City`) VALUES
('testEmployee', '$2y$10$i6VG86XWzr87ELAPstVMru1L/FjPie9OSiB72xdbnsRWfnZl0oLi6', 'testEmployee', 20, 'philips', 'E', 19, 'Frederick Lane', 'Edison'),
('testManager', '$2y$10$BjuqHnyBumJRovWuigtjXuLeUeoHmB0RY./aCamXtaQWti.Kpt5nS', 'testManager', 20, '', 'M', 16, 'Vandeveer Lane', 'Bridgewater'),
('testAdmin', '$2y$10$Yk3tKUi8kHSwAdP5PqKr9ek7NMx.lr46TIoE7.BU5hT9RABC5Wf7S', 'testAdmin', 200, '', 'A', 14, 'WestField Street', 'Piscataway');

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
  `image_path` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Sneaker_Type`
--

CREATE TABLE `Sneaker_Type` (
  `ID` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Color` varchar(10) NOT NULL,
  `SneakerName` varchar(30) NOT NULL,
  `Brand` text NOT NULL,
  `Size` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `image_path` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sneaker_Type`
--

INSERT INTO `Sneaker_Type` (`ID`, `Price`, `Color`, `SneakerName`, `Brand`, `Size`, `Quantity`, `image_path`) VALUES
(1, 50, 'Black', 'Vans Berle Pro', 'Vans', 9, 20, 'vans4.png'),
(2, 75, 'Black', 'Converse Chuck Taylor Hi Top', 'Converse', 9.5, 20, 'converse4.jpg'),
(3, 100, 'Black', 'Puma Super Levitate', 'Puma', 9, 20, 'puma1.jpg'),
(4, 150, 'Grey', 'Adidas Swift Run', 'Adidas', 11, 20, 'adidas5.jpg'),
(5, 150, 'Multi', 'Adidas Terrex Two Trail', 'Adidas', 10, 20, 'adidas4.jpg'),
(6, 200, 'Grey', 'Nike Free Run 2018', 'Nike', 11.5, 20, 'nike5.jpg'),
(7, 200, 'White', 'Nike Air Max LTD 3', 'Nike', 11, 20, 'nike4.jpg'),
(8, 200, 'Black', 'Nike Shox NZ', 'Nike', 9.5, 20, 'nike3.jpg'),
(9, 200, 'Grey', 'Nike Air Ring Leader Low', 'Nike', 10, 20, 'nike2.jpg'),
(10, 200, 'Black', 'Nike Air Max Torch 4', 'Nike', 9, 20, 'nike1.jpg'),
(11, 50, 'Checkered', 'Vans Primary Check Era', 'Vans', 9.5, 20, 'vans3.png'),
(12, 50, 'White', 'Vans Authentic', 'Vans', 8, 20, 'vans2.png'),
(13, 50, 'Multi', 'Vans Checkerboard Slip-On', 'Vans', 9, 20, 'vans1.png'),
(14, 75, 'White', 'Converse Chuck Taylor All Star', 'Converse', 10, 20, 'converse5.jpg'),
(15, 75, 'Red Camo', 'Converse Chuck Taylor All Star', 'Converse', 10, 20, 'converse3.jpg'),
(16, 75, 'Camo', 'Converse Chuck Taylor All Star', 'Converse', 8.5, 20, 'converse2.jpg'),
(17, 75, 'Grey', 'Converse Chuck Taylor All Star', 'Converse', 9.5, 20, 'converse1.jpg'),
(18, 100, 'Grey', 'Puma Axelion ', 'Puma', 10.5, 20, 'puma5.jpg'),
(19, 100, 'Red', 'Puma Enzo Lean Training', 'Puma', 9.5, 20, 'puma4.jpg'),
(20, 100, 'Grey', 'Puma Enzo Knit NM', 'Puma', 12, 20, 'puma3.jpg'),
(21, 100, 'White', 'Puma Super Levitate', 'Puma', 9.5, 20, 'puma2.jpg'),
(22, 150, 'Black', 'Adidas Swift Run', 'Adidas', 9, 20, 'adidas3.jpg'),
(23, 150, 'Brown', 'Adidas Swift Run ', 'Adidas', 10.5, 20, 'adidas2.jpg'),
(24, 150, 'Dark Grey', 'Adidas Swift Run', 'Adidas', 10, 20, 'adidas1.jpg'),
(25, 50, 'Black', 'Vans Coral Snake Kyle Walker', 'Vans', 10, 20, 'vans5.png'),
(26, 225, 'Tan', 'Timberland Premium Boots', 'Timberlands', 9, 20, 'timb1.jpg'),
(27, 225, 'Brown', 'Timberland Maddsen Hiking Boot', 'Timberlands', 10, 20, 'timb2.jpg'),
(28, 225, 'Black', 'Timberland Field Boots', 'Timberlands', 10.5, 20, 'timb3.jpg'),
(29, 225, 'Brown', 'Timberland FlyRoam Trail Hiker', 'Timberlands', 10, 20, 'timb4.jpg'),
(30, 225, 'Green', 'Timberland Jacquard Boots', 'Timberlands', 11, 20, 'timb5.jpg');

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
('testManager', '$2y$10$BjuqHnyBumJRovWuigtjXuLeUeoHmB0RY./aCamXtaQWti.Kpt5nS', 'M'),
('testEmployee', '$2y$10$i6VG86XWzr87ELAPstVMru1L/FjPie9OSiB72xdbnsRWfnZl0oLi6', 'E'),
('testCustomer', '$2y$10$iBGiQHqzVRXh3Ji282DEYO1JfLgHwzdIK9DhyRZZjibqWWNXh1g0u', 'C'),
('testAdmin', '$2y$10$Yk3tKUi8kHSwAdP5PqKr9ek7NMx.lr46TIoE7.BU5hT9RABC5Wf7S', 'A');

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
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userLogin`
--
ALTER TABLE `userLogin`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
