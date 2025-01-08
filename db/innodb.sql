-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2025 at 08:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bom_data`
--

CREATE TABLE `bom_data` (
  `id` int(11) NOT NULL,
  `cbs_code` varchar(255) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `planned_qty` int(11) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `approved_pdn_qty` int(11) NOT NULL,
  `current_qty` int(11) NOT NULL,
  `total_po_qty_to_date` varchar(255) NOT NULL,
  `total_icto_qty_to_date` varchar(255) NOT NULL,
  `remaining_qty_tobe_requested_to_date` varchar(255) NOT NULL,
  `total_qty_received_to_date` varchar(255) NOT NULL,
  `remaining_qty_tobe_received_to_date` varchar(255) NOT NULL,
  `total_qty_issued_to_date` varchar(255) NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `central_warehouse`
--

CREATE TABLE `central_warehouse` (
  `id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `trading` varchar(255) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `soh` int(11) NOT NULL,
  `qty_received` int(11) NOT NULL,
  `qty_issued` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `central_warehouse`
--

INSERT INTO `central_warehouse` (`id`, `item_code`, `item_description`, `trading`, `uom`, `soh`, `qty_received`, `qty_issued`, `created_at`, `status`) VALUES
(33927, '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', '2-Structural', 'lengths', 1, 0, 0, '2025-01-17', 1),
(33928, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2025-01-17', 1),
(33929, '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', '2-Structural', 'lengths', 34, 0, 16, '2025-01-17', 1),
(33930, '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', '2-Structural', 'lengths', 1, 0, 0, '2025-01-17', 1),
(33931, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2025-01-17', 1),
(33932, '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', '2-Structural', 'lengths', 34, 0, 16, '2025-01-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_data`
--

CREATE TABLE `inventory_data` (
  `id` int(11) NOT NULL,
  `date_inventory` varchar(255) NOT NULL,
  `cbs_code` varchar(255) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `purchase_uom` varchar(255) NOT NULL,
  `item_classification` varchar(255) NOT NULL,
  `trade_classification` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `on_hand_qty` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_data`
--

INSERT INTO `inventory_data` (`id`, `date_inventory`, `cbs_code`, `item_code`, `item_description`, `purchase_uom`, `item_classification`, `trade_classification`, `location`, `on_hand_qty`, `created_at`, `status`) VALUES
(496, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', 'lengths', '', '2-Structural', '', 79, '2025-01-17', 1),
(497, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', '2-Structural', '', 37, '2025-01-17', 1),
(498, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', 'lengths', '', '2-Structural', '', 140, '2025-01-17', 1),
(499, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', '2-Structural', '', 37, '2025-01-17', 1),
(500, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', 'lengths', '', '2-Structural', '', 79, '2025-01-17', 1),
(501, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', '2-Structural', '', 37, '2025-01-17', 1),
(502, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', 'lengths', '', '2-Structural', '', 140, '2025-01-17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bom_data`
--
ALTER TABLE `bom_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `central_warehouse`
--
ALTER TABLE `central_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_data`
--
ALTER TABLE `inventory_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bom_data`
--
ALTER TABLE `bom_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `central_warehouse`
--
ALTER TABLE `central_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33933;

--
-- AUTO_INCREMENT for table `inventory_data`
--
ALTER TABLE `inventory_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
