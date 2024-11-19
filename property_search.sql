-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 05:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(3) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `locations` varchar(255) NOT NULL,
  `lot_areas` int(11) NOT NULL,
  `floor_areas` int(11) NOT NULL,
  `price_ranges` decimal(15,2) NOT NULL,
  `property_classes` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `categories`, `locations`, `lot_areas`, `floor_areas`, `price_ranges`, `property_classes`) VALUES
(1, 'Apartment', 'Adya', 300, 120, 1500000.00, '1'),
(2, 'Building', 'Anilao', 500, 250, 3500000.00, '2'),
(3, 'Commercial Space', 'Malagonlong', 1000, 600, 7500000.00, '3'),
(4, 'Condominium', 'Bagong Pook', 400, 180, 2200000.00, '1'),
(5, 'House & Lot', 'Balintawak', 750, 350, 4800000.00, '2'),
(6, 'Lot w/ Unfinished Structure', 'Bolbok', 1200, 0, 2000000.00, '3'),
(7, 'Lot with Structure', 'Bugtong na Pulo', 650, 250, 3600000.00, '1'),
(8, 'Townhouse', 'Bulacnin', 200, 120, 1500000.00, '2'),
(9, 'Vacant Lot', 'Cumba', 1500, 0, 5000000.00, '3'),
(10, 'Warehouse', 'Dagatan', 3000, 0, 9000000.00, '2'),
(11, 'Apartment', 'Duhatan', 250, 100, 1200000.00, '1'),
(12, 'Building', 'Halang', 1800, 800, 12000000.00, '2'),
(13, 'Commercial Space', 'Inosloban', 500, 250, 3500000.00, '3'),
(14, 'Condominium', 'Kayumanggi', 450, 220, 2800000.00, '1'),
(15, 'House & Lot', 'Latag', 1000, 500, 7500000.00, '2'),
(16, 'Lot w/ Unfinished Structure', 'Lodlod', 2000, 0, 3500000.00, '3'),
(17, 'Lot with Structure', 'Lumbang', 850, 300, 4200000.00, '1'),
(18, 'Townhouse', 'Mabini', 400, 200, 2500000.00, '2'),
(19, 'Vacant Lot', 'Malagonlong', 1600, 0, 4500000.00, '3'),
(20, 'Warehouse', 'Malitlit', 2500, 0, 8000000.00, '2'),
(21, 'Apartment', 'Marauoy', 300, 140, 1800000.00, '1'),
(22, 'Building', 'Mataas na Lupa', 2200, 1000, 15000000.00, '2'),
(23, 'Commercial Space', 'Munting Pulo', 600, 300, 5000000.00, '3'),
(24, 'Condominium', 'Pagolingin Bata', 500, 250, 3200000.00, '1'),
(25, 'House & Lot', 'Pagolingin East', 800, 350, 5800000.00, '2'),
(26, 'Lot w/ Unfinished Structure', 'Pagolingin West', 1000, 0, 4000000.00, '3'),
(27, 'Lot with Structure', 'Pangao', 400, 150, 2100000.00, '1'),
(28, 'Townhouse', 'Pinagkawitan', 350, 180, 2300000.00, '2'),
(29, 'Vacant Lot', 'Pinagtongulan', 1200, 0, 6000000.00, '3'),
(30, 'Warehouse', 'Plaridel', 3500, 0, 9500000.00, '2'),
(31, 'Apartment', 'Poblacion Barangay 1', 250, 110, 1600000.00, '1'),
(32, 'Building', 'Poblacion Barangay 2', 1400, 600, 9000000.00, '2'),
(33, 'Commercial Space', 'Poblacion Barangay 3', 700, 350, 3800000.00, '3'),
(34, 'Condominium', 'Poblacion Barangay 4', 350, 150, 2200000.00, '1'),
(35, 'House & Lot', 'Poblacion Barangay 5', 950, 450, 6200000.00, '2'),
(36, 'Lot w/ Unfinished Structure', 'Poblacion Barangay 6', 2000, 0, 3200000.00, '3'),
(37, 'Lot with Structure', 'Poblacion Barangay 7', 1100, 500, 5000000.00, '1'),
(38, 'Townhouse', 'Poblacion Barangay 8', 550, 300, 4000000.00, '2'),
(39, 'Vacant Lot', 'Poblacion Barangay 9', 1800, 0, 5500000.00, '3'),
(40, 'Warehouse', 'Poblacion Barangay 10', 3000, 0, 10000000.00, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
