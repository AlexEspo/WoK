-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 06:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wok`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Username` varchar(24) NOT NULL,
  `Name` varchar(24) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `StreetName` varchar(30) NOT NULL,
  `City` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Username`, `Name`, `Email`, `Password`, `StreetNumber`, `StreetName`, `City`) VALUES
('tonda', 'David Tonda', 'tonda@gmail.com', '$2y$10$QbQZLryCRu8T9q3kXd7JweuaehD/whKa1PgSN.VD1sgwmXDu/96ke', 12, 'Walter', 'Milburn'),
('philips', 'Shijil', 'philip@gmail.com', '$2y$10$cPzQgTHWRCdQLL2ZuWNTmOc54aUThgexzqOsx7EFYKkRRq.B6R8xi', 45, 'Driver', 'Forest');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
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
-- Table structure for table `employeeschedule`
--

CREATE TABLE `employeeschedule` (
  `EmpID` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Date` date NOT NULL,
  `startShift` time NOT NULL,
  `endShift` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeschedule`
--

INSERT INTO `employeeschedule` (`EmpID`, `Date`, `startShift`, `endShift`) VALUES
('987', '2019-05-15', '07:32:00', '20:00:00'),
('987', '2019-05-16', '07:00:00', '21:00:00'),
('988', '2019-06-21', '07:30:00', '17:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
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
-- Table structure for table `sneaker_type`
--

CREATE TABLE `sneaker_type` (
  `Price` double NOT NULL,
  `Color` varchar(10) NOT NULL,
  `SneakerName` varchar(30) NOT NULL,
  `Size` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `image_path` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sneaker_type`
--

INSERT INTO `sneaker_type` (`Price`, `Color`, `SneakerName`, `Size`, `Quantity`, `image_path`) VALUES
(200, 'Black', 'Nike Air Max Torch 4', 9, 20, 'nike1.jpg'),
(200, 'White', 'Nike Air Max LTD 3', 11, 20, 'nike4.jpg'),
(200, 'Grey', 'Nike Free Run 2018', 11.5, 20, 'nike5.jpg'),
(150, 'Dark Grey', 'Adidas Swift Run', 10, 20, 'adidas1.jpg'),
(150, 'Brown', 'Adidas Swift Run ', 10.5, 20, 'adidas2.jpg'),
(150, 'Black', 'Adidas Swift Run', 9, 20, 'adidas3.jpg'),
(150, 'Multi', 'Adidas Terrex Two Trail', 10, 20, 'adidas4.jpg'),
(150, 'Grey', 'Adidas Swift Run', 11, 20, 'adidas5.jpg'),
(100, 'Black', 'Puma Super Levitate', 9, 20, 'puma1.jpg'),
(100, 'White', 'Puma Super Levitate', 9.5, 20, 'puma2.jpg'),
(100, 'Grey', 'Puma Enzo Knit NM', 12, 20, 'puma3.jpg'),
(100, 'Red', 'Puma Enzo Lean Training', 9.5, 20, 'puma4.jpg'),
(100, 'Grey', 'Puma Axelion ', 10.5, 20, 'puma5.jpg'),
(75, 'Grey', 'Converse Chuck Taylor All Star', 9.5, 20, 'converse1.jpg'),
(75, 'Camo', 'Converse Chuck Taylor All Star', 8.5, 20, 'converse2.jpg'),
(75, 'Red Camo', 'Converse Chuck Taylor All Star', 10, 20, 'converse3.jpg'),
(75, 'White', 'Converse Chuck Taylor All Star', 10, 20, 'converse5.jpg'),
(75, 'Black', 'Converse Chuck Taylor Hi Top', 9.5, 20, 'converse4.jpg'),
(50, 'Multi', 'Vans Checkerboard Slip-On', 9, 20, 'vans1.png'),
(50, 'White', 'Vans Authentic', 8, 20, 'vans2.png'),
(50, 'Checkered', 'Vans Primary Check Era', 9.5, 20, 'vans3.png'),
(50, 'Black', 'Vans Berle Pro', 9, 20, 'vans4.png'),
(50, 'Black', 'Vans Coral Snake Kyle Walker', 10, 20, 'vans5.png'),
(225, 'Tan', 'Timberland Premium Boots', 9, 20, 'timb1.jpg'),
(225, 'Brown', 'Timberland Maddsen Hiking Boot', 10, 20, 'timb2.jpg'),
(225, 'Black', 'Timberland Field Boots', 10.5, 20, 'timb3.jpg'),
(225, 'Brown', 'Timberland FlyRoam Trail Hiker', 10, 20, 'timb4.jpg'),
(225, 'Green', 'Timberland Jacquard Boots', 11, 20, 'timb5.jpg'),
(200, 'Grey', 'Nike Air Ring Leader Low', 10, 20, 'nike2.jpg'),
(200, 'Black', 'Nike Shox NZ', 9.5, 20, 'nike3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `Username` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`Username`, `Password`, `UserType`) VALUES
('philips', '$2y$10$cPzQgTHWRCdQLL2ZuWNTmOc54aUThgexzqOsx7EFYKkRRq.B6R8xi', 'A'),
('tonda', '$2y$10$QbQZLryCRu8T9q3kXd7JweuaehD/whKa1PgSN.VD1sgwmXDu/96ke', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`),
  ADD KEY `SupervisorID` (`SupervisorID`);

--
-- Indexes for table `employeeschedule`
--
ALTER TABLE `employeeschedule`
  ADD KEY `SSN` (`EmpID`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`ReceiptID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `sneaker_type`
--
ALTER TABLE `sneaker_type`
  ADD PRIMARY KEY (`Color`,`SneakerName`,`Size`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
