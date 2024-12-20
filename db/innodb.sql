-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 06:57 AM
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
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `central_warehouse`
--

INSERT INTO `central_warehouse` (`id`, `item_code`, `item_description`, `trading`, `uom`, `soh`, `qty_received`, `qty_issued`, `created_at`) VALUES
(25781, '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2024-12-20'),
(25782, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2024-12-20'),
(25783, '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', '2-Structural', 'lengths', 34, 0, 16, '2024-12-20'),
(25784, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2024-12-20'),
(25785, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 207, 0, 60, '2024-12-20'),
(25786, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 15, 0, 2, '2024-12-20'),
(25787, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 14, 0, 0, '2024-12-20'),
(25788, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2024-12-20'),
(25789, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 51, 0, 0, '2024-12-20'),
(25790, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 6, 0, 0, '2024-12-20'),
(25791, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2024-12-20'),
(25792, '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2024-12-20'),
(25793, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2024-12-20'),
(25794, '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', '2-Structural', 'lengths', 34, 0, 16, '2024-12-20'),
(25795, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2024-12-20'),
(25796, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 207, 0, 60, '2024-12-20'),
(25797, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 15, 0, 2, '2024-12-20'),
(25798, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 14, 0, 0, '2024-12-20'),
(25799, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2024-12-20'),
(25800, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 51, 0, 0, '2024-12-20'),
(25801, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 6, 0, 0, '2024-12-20'),
(25802, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2024-12-20'),
(25803, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2024-12-20');

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
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_data`
--

INSERT INTO `inventory_data` (`id`, `date_inventory`, `cbs_code`, `item_code`, `item_description`, `purchase_uom`, `item_classification`, `trade_classification`, `location`, `on_hand_qty`, `created_at`) VALUES
(222, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 79, '2024-12-20'),
(223, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2024-12-20'),
(224, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 140, '2024-12-20'),
(225, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2024-12-20'),
(226, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(227, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(228, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(229, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(230, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(231, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(232, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2024-12-20'),
(233, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 79, '2024-12-20'),
(234, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2024-12-20'),
(235, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 140, '2024-12-20'),
(236, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2024-12-20'),
(237, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(238, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(239, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(240, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(241, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(242, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2024-12-20'),
(243, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2024-12-20'),
(244, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 0, '2024-12-20');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25804;

--
-- AUTO_INCREMENT for table `inventory_data`
--
ALTER TABLE `inventory_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
