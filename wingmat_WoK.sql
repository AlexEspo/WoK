-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2019 at 04:47 PM
-- Server version: 5.7.25
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
  `Address` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`Username`, `Name`, `Email`, `Address`, `BirthDate`, `Password`) VALUES
('winger', 'Matthew Wing', 'wingm1@montclair.edu', '45 Awesome Avenue', '2019-04-16', '123'),
('asd', 'dsa', 'dsadsa@gmail.com', 'fdsfds', '2019-04-03', 'asd'),
('robo', 'robert', 'robo@gmail.com', 'fda', '2019-04-01', '123'),
('bob', 'bob', 'bob@gmail.com', 'asdf', '2019-04-09', '123'),
('fdsa', 'fdsa', 'fds@gmail.com', 'gfdsgdsh', '2019-04-02', 'fdsa'),
('buddy', 'Lisa Chueh', 'lisa@gmail.com', '30 Ryerson Road', '2000-04-19', 'willy'),
('qwe', 'qwe', 'qwe@gmail.com', 'qwe', '2019-04-03', 'qwe'),
('tonda', 'David', 'tonda@gmail.com', 'tonda street', '1998-07-28', '123');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `EmpID` int(4) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(24) NOT NULL,
  `Hourly_Pay` double NOT NULL,
  `SSN` varchar(9) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `StartDate` date NOT NULL,
  `SupervisorID` varchar(9) DEFAULT NULL,
  `UserType` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`EmpID`, `Password`, `Name`, `Hourly_Pay`, `SSN`, `Address`, `BirthDate`, `StartDate`, `SupervisorID`, `UserType`) VALUES
(987, '123', 'Matthew Wing', 12.5, '123456789', '48 Awesome Avenue', '2019-04-01', '2019-04-02', '987654321', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeSchedule`
--

CREATE TABLE `EmployeeSchedule` (
  `SSN` char(9) NOT NULL,
  `dateOfBeginnningWeek` date NOT NULL,
  `numDaysWork` char(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Receipts`
--

CREATE TABLE `Receipts` (
  `CustomerName` varchar(24) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `TotalPrice` double NOT NULL,
  `SneakerName` varchar(30) NOT NULL,
  `NumberOfSneakersBought` int(11) NOT NULL,
  `DateofPurchase` date NOT NULL,
  `ReceiptID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Receipts`
--

INSERT INTO `Receipts` (`CustomerName`, `Address`, `TotalPrice`, `SneakerName`, `NumberOfSneakersBought`, `DateofPurchase`, `ReceiptID`, `Username`) VALUES
('Alex ', 'alex house', 150, 'Adidas Wave', 1, '2019-04-01', 1, 'espoAlex');

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
  `Username` varchar(24) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userLogin`
--

INSERT INTO `userLogin` (`Username`, `Password`, `UserType`) VALUES
('buddy', 'willy', 'C'),
('robo', '123', 'C'),
('bob', '123', 'C'),
('fdsa', 'fdsa', 'C'),
('qwe', 'qwe', 'C'),
('asd', 'asd', 'C'),
('tonda', '123', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `viewCustomerReceipts`
--

CREATE TABLE `viewCustomerReceipts` (
  `SneakerName` varchar(50) NOT NULL,
  `Username` varchar(24) NOT NULL,
  `CustomerName` varchar(24) NOT NULL,
  `TotalPrice` double NOT NULL,
  `NumberOfSneakersBought` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `ReceiptID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viewCustomerReceipts`
--

INSERT INTO `viewCustomerReceipts` (`SneakerName`, `Username`, `CustomerName`, `TotalPrice`, `NumberOfSneakersBought`, `Address`, `Date`, `ReceiptID`) VALUES
('Adidas Wave', 'espo', 'Alex', 150, 1, 'alex house', '2019-04-01', 1);

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
  ADD PRIMARY KEY (`SSN`),
  ADD KEY `SupervisorID` (`SupervisorID`);

--
-- Indexes for table `EmployeeSchedule`
--
ALTER TABLE `EmployeeSchedule`
  ADD KEY `SSN` (`SSN`);

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

--
-- Indexes for table `viewCustomerReceipts`
--
ALTER TABLE `viewCustomerReceipts`
  ADD KEY `ReceiptID` (`ReceiptID`),
  ADD KEY `Username` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
