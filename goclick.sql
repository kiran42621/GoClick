-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 01:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goclick`
--

-- --------------------------------------------------------

--
-- Table structure for table `photographers`
--

CREATE TABLE `photographers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photographers`
--

INSERT INTO `photographers` (`ID`, `Name`, `Phone`, `Email`, `Password`, `Company`, `Skills`, `Picture`) VALUES
(6, 'Tharun', '9635789520', 'Tharun@email.com', '1234', 'nothing', 'na', 'ABC1 XYZ1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photographer_hiring`
--

CREATE TABLE `photographer_hiring` (
  `id` int(11) NOT NULL,
  `PhotographerId` int(11) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `ClientName` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Pphone` varchar(255) NOT NULL,
  `Cphone` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photographer_hiring`
--

INSERT INTO `photographer_hiring` (`id`, `PhotographerId`, `ClientId`, `ClientName`, `Date`, `Pphone`, `Cphone`, `Status`) VALUES
(1, 6, 0, '', '2021-08-12', '', '', 'Confirmed'),
(2, 6, 1, '', '2021-08-13', '', '', 'Cancelled'),
(3, 6, 1, 'Rohith', '2021-08-13', '', '', 'Confirmed'),
(4, 6, 1, 'Rohith', '2021-08-14', '', '', 'Confirmed'),
(5, 6, 1, 'Rohith', '2021-08-26', '', '', 'Confirmed'),
(6, 6, 1, 'Rohith', '2021-08-18', '', '', 'Confirmed'),
(7, 6, 1, 'Rohith', '2021-08-18', '', '', 'Cancelled'),
(8, 6, 1, 'Rohith', '2021-08-23', '', '', 'Confirmed'),
(9, 6, 1, 'Rohith', '2021-08-24', '', '', 'Cancelled'),
(10, 6, 1, 'Rohith', '2021-08-23', '', '', 'Confirmed'),
(11, 6, 1, 'Rohith', '2021-08-23', '', '', 'Cancelled'),
(12, 6, 1, 'Rohith', '2021-08-17', '', '', 'Confirmed'),
(13, 6, 1, 'Rohith', '2021-08-24', '', '', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name`, `image`, `type`, `description`, `price`, `contact`, `status`) VALUES
(7, 'nikon D5600', 'nikon D5600.jpg', 'camera', 'good camera', 1000, '9876543210', 'Available'),
(9, 'lens 70-200mm', '5c9846bdb6e64bef9279042a12069990_RF70-200mm+f4L+IS+USM+Slant.png', 'lens', 'good lens, Focal length 70 - 200mm.', 200, '9955113355', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `productid` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `returndate` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `userid`, `productid`, `date`, `returndate`, `price`, `status`) VALUES
(7, '1', 7, '2021-08-17', '2021-08-17', 0, 'Completed'),
(8, 'Rohith@gmail.com', 7, '2021-08-17', '2021-08-17', 0, 'Completed'),
(9, 'Rohith@gmail.com', 7, '2021-08-17', '2021-08-17', 0, 'Completed'),
(10, 'Rohith@gmail.com', 7, '2021-08-29', '2021-08-29', 0, 'Completed'),
(11, 'Rohith@gmail.com', 7, '2021-08-29', '2021-08-29', 1000, 'Completed'),
(12, 'Rohith@gmail.com', 7, '2021-08-23', '2021-08-23', 0, 'Completed'),
(13, 'Rohith@gmail.com', 7, '2021-08-23', '2021-08-23', 0, 'Completed'),
(14, 'Rohith@gmail.com', 7, '2018-12-11', '', 0, 'Booked'),
(15, 'Rohith@gmail.com', 7, '2018-12-11', '', 0, 'Booked'),
(16, 'Rohith@gmail.com', 7, '2018-12-17', '', 0, 'Booked'),
(17, 'Rohith@gmail.com', 7, '2018-12-17', '', 0, 'Booked'),
(18, 'Rohith@gmail.com', 7, '2018-12-04', '', 0, 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `samplephotos`
--

CREATE TABLE `samplephotos` (
  `Id` int(11) NOT NULL,
  `Photographer_Id` int(11) NOT NULL,
  `Picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `samplephotos`
--

INSERT INTO `samplephotos` (`Id`, `Photographer_Id`, `Picture`) VALUES
(1, 0, '0'),
(2, 0, '0'),
(3, 0, '0'),
(4, 0, '0'),
(5, 0, ''),
(6, 0, 'nikon D5600.jpg'),
(7, 6, 'nikon D5600.jpg'),
(8, 6, 'My Logo.png'),
(9, 6, 'SURANA COLLEGE.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Mobile`, `Password`) VALUES
(1, 'Rohith', 'Rohith@gmail.com', '9876543210', '11223344'),
(2, 'Sujan', 'Vade@gmail.com', '9999999999', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photographers`
--
ALTER TABLE `photographers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `photographer_hiring`
--
ALTER TABLE `photographer_hiring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samplephotos`
--
ALTER TABLE `samplephotos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photographers`
--
ALTER TABLE `photographers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photographer_hiring`
--
ALTER TABLE `photographer_hiring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `samplephotos`
--
ALTER TABLE `samplephotos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
