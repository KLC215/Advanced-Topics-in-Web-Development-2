-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2017 at 03:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newvehicledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Japan'),
(2, 'Great Britain'),
(3, 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `mfr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `mfr`, `country`) VALUES
(1, 'Toyota', 1),
(2, 'Lotus', 2),
(3, 'Mountain Goat', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `manufacturer` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `launchYear` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topSpeed` double DEFAULT NULL,
  `economy` double DEFAULT NULL,
  `fuelCapacity` double DEFAULT NULL,
  `power` int(11) DEFAULT NULL,
  `torque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `class`, `type`, `manufacturer`, `model`, `launchYear`, `image`, `price`, `engine`, `fuel`, `topSpeed`, `economy`, `fuelCapacity`, `power`, `torque`) VALUES
(1, 'Motorized', 1, 1, 'LPG Coaster', '2007', 'Minibus.JPG', 'HK$501,000', 'Toyata L4 OHV', 'gas', 110, 2, 113, 6, 226),
(2, 'Motorized', 2, 2, 'Evora S', '2010', 'lotus-evora-s.jpg', '£48550 to £57550', 'Toyata V6', 'petrol', 172, 27.1, 12, 350, 295),
(3, 'NonMotorized', 3, 3, 'Route 29', '2009', 'Route29.jpg', '$700', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicleType`
--

CREATE TABLE `vehicleType` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicleType`
--

INSERT INTO `vehicleType` (`id`, `name`) VALUES
(1, 'bus'),
(2, 'car'),
(3, 'bicycle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country` (`country`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `manufacturer` (`manufacturer`);

--
-- Indexes for table `vehicleType`
--
ALTER TABLE `vehicleType`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicleType`
--
ALTER TABLE `vehicleType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD CONSTRAINT `manufacturer_ibfk_1` FOREIGN KEY (`country`) REFERENCES `country` (`id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`type`) REFERENCES `vehicleType` (`id`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`manufacturer`) REFERENCES `manufacturer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
