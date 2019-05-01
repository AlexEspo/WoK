-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2019 at 02:39 PM
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
  `Address` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`Username`, `Name`, `Email`, `Address`, `BirthDate`, `Password`) VALUES
('chuck', 'Chuck Norris', 'norris@gmail.com', '123 Triangle Street', '2019-04-02', 'norris'),
('jei', 'Jeremiah ', 'jei@gmail.com', '65 Montclair Street', '2019-04-10', '123'),
('aglasswala', 'Aadil', 'aglasswala@gmail.com', '43 Dell Street', '2019-04-02', '123');

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
('Alex ', 'alex house', 150, 'Adidas Wave', 1, '2019-04-01', 1, 'espoAlex'),
('Alex', 'alex house', 150, 'Adidas Wrest Adidas Wave', 2, '2019-04-02', 2, 'espoAlex'),
('Shijil', '24 Freight Lane', 100, 'Puma CRT\'s', 1, '2019-03-04', 3, 'espoAlex'),
('Alex', '23 Whatever Lane', 10, 'Awesome Shoes', 2, '2019-04-02', 4, 'espoAlex');

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
('jei', '$2y$10$uVKG1jgjVre409kKEsBR7OIMVpCihhGvXIHEVjx6nDmfTLXNT95Pm', 'C'),
('aglasswala', '$2y$10$CrMO.NXL5MO8/HisIALYg.jIyAX.8cUR/RLl35L0YwAp2ADZ1Ahwe', 'C'),
('chuck', '$2y$10$q0CIqbQMk1wtp6L8qQ.5hO7kV9/RGsP3A2ogk/X5QGXPHT8VD4tpO', 'C');

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
