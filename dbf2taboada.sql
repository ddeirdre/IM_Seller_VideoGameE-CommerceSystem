-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 12:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbf2taboada`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblseller`
--

CREATE TABLE `tblseller` (
  `Seller_ID` int(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblseller`
--

INSERT INTO `tblseller` (`Seller_ID`, `FirstName`, `MiddleName`, `LastName`, `Age`) VALUES
(1, ' Joaquin', ' Piamonte', 'Tiu', 22),
(2, 'Mawa', 'Cat', 'Taboada', 2),
(2325, 'Yasha', 'Cat', 'Taboada', 3),
(2326, ' Le ', ' Bronn', ' Samson', 21),
(2327, 'Joe', 'Ed', 'Secoya', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `userid` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`userid`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'Joeyy', '123', 'Jhoeren', 'Yutiampo'),
(2, 'deirdre', '123', 'Charlotte', 'Edited'),
(3, 'chipzroar', 'Stoic123', 'Kenjie', '  <h1>Balona</h1>'),
(29, 'tlrhc', 'Mawacat3', 'Charlotte', 'Taboada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblseller`
--
ALTER TABLE `tblseller`
  ADD PRIMARY KEY (`Seller_ID`),
  ADD KEY `First Name` (`FirstName`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblseller`
--
ALTER TABLE `tblseller`
  MODIFY `Seller_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2328;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
