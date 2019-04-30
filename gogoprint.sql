-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 12:11 PM
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
-- Database: `gogoprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `ConfigurationID` int(11) NOT NULL,
  `ProcessingDays` int(11) NOT NULL,
  `DueDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `ConfigurationID`, `ProcessingDays`, `DueDate`) VALUES
(1, 4, 3, '02/05/2019'),
(2, 15, 3, '02/05/2019'),
(4, 60, 4, '03/05/2019'),
(5, 53, 4, '04/05/2019');

-- --------------------------------------------------------

--
-- Table structure for table `configuration_pricing`
--

CREATE TABLE `configuration_pricing` (
  `id` int(11) NOT NULL,
  `PaperFormat` int(11) NOT NULL,
  `Page` int(11) NOT NULL,
  `PaperType` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration_pricing`
--

INSERT INTO `configuration_pricing` (`id`, `PaperFormat`, `Page`, `PaperType`, `Quantity`, `Price`) VALUES
(1, 1, 3, 5, 100, 124),
(2, 1, 3, 6, 100, 160),
(3, 1, 3, 7, 100, 200),
(4, 1, 4, 5, 100, 220),
(5, 1, 4, 6, 100, 280),
(6, 1, 4, 7, 100, 330),
(7, 2, 3, 5, 100, 90),
(8, 2, 3, 6, 100, 140),
(9, 2, 3, 7, 100, 190),
(10, 2, 4, 5, 100, 180),
(11, 2, 4, 6, 100, 250),
(12, 2, 4, 7, 100, 310),
(13, 1, 3, 5, 200, 300),
(14, 1, 3, 5, 400, 420),
(15, 1, 3, 5, 800, 530),
(16, 1, 3, 5, 1500, 725),
(17, 1, 3, 6, 200, 220),
(18, 1, 3, 6, 400, 357),
(19, 1, 3, 6, 800, 582),
(20, 1, 3, 6, 1500, 712),
(21, 1, 3, 7, 200, 305),
(22, 1, 3, 7, 400, 627),
(23, 1, 3, 7, 800, 920),
(24, 1, 3, 7, 1500, 1024),
(25, 1, 4, 5, 200, 345),
(26, 1, 4, 5, 400, 520),
(27, 1, 4, 5, 800, 830),
(28, 1, 4, 5, 1500, 1120),
(29, 1, 4, 6, 200, 320),
(30, 1, 4, 6, 400, 445),
(31, 1, 4, 6, 800, 670),
(33, 1, 4, 7, 200, 302),
(34, 1, 4, 7, 400, 490),
(35, 1, 4, 7, 800, 870),
(36, 1, 4, 7, 1500, 1250),
(37, 2, 3, 5, 200, 250),
(38, 2, 3, 5, 400, 380),
(39, 2, 3, 5, 800, 620),
(40, 2, 3, 5, 1500, 940),
(41, 2, 3, 6, 200, 260),
(42, 2, 3, 6, 400, 426),
(43, 2, 3, 6, 800, 677),
(44, 2, 3, 6, 1500, 990),
(45, 2, 3, 7, 200, 244),
(46, 2, 3, 7, 800, 421),
(47, 2, 3, 7, 800, 602),
(48, 2, 3, 7, 1500, 870),
(49, 2, 4, 5, 200, 400),
(50, 2, 4, 5, 800, 720),
(51, 2, 4, 5, 800, 1420),
(52, 2, 4, 5, 1500, 1950),
(53, 2, 4, 6, 200, 324),
(54, 2, 4, 6, 400, 580),
(55, 2, 4, 6, 800, 680),
(56, 2, 4, 6, 1500, 890),
(57, 2, 4, 7, 200, 402),
(58, 2, 4, 7, 500, 720),
(59, 2, 4, 7, 800, 1450),
(60, 2, 4, 7, 1500, 2150);

-- --------------------------------------------------------

--
-- Table structure for table `configuration_types`
--

CREATE TABLE `configuration_types` (
  `id` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL,
  `TypeValue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration_types`
--

INSERT INTO `configuration_types` (`id`, `TypeName`, `TypeValue`) VALUES
(1, 'PaperFormat', '9 x 5.5 cm'),
(2, 'PaperFormat', '8.5 x 5 cm'),
(3, 'Pages', 'Print on Front Only'),
(4, 'Pages', 'Print on Front and Back'),
(5, 'PaperType', '80g Art Paper'),
(6, 'PaperType', '150g Art Card'),
(7, 'PaperType', '250g Art Card');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration_pricing`
--
ALTER TABLE `configuration_pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration_types`
--
ALTER TABLE `configuration_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `configuration_pricing`
--
ALTER TABLE `configuration_pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `configuration_types`
--
ALTER TABLE `configuration_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
