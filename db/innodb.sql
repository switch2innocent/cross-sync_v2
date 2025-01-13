-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 08:04 AM
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
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `central_warehouse`
--

INSERT INTO `central_warehouse` (`id`, `item_code`, `item_description`, `trading`, `uom`, `soh`, `qty_received`, `qty_issued`, `created_at`) VALUES
(25840, '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-08'),
(25841, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2025-01-08'),
(25842, '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', '2-Structural', 'lengths', 34, 0, 16, '2025-01-08'),
(25843, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-08'),
(25844, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 207, 0, 60, '2025-01-08'),
(25845, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 15, 0, 2, '2025-01-08'),
(25846, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 14, 0, 0, '2025-01-08'),
(25847, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-08'),
(25848, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 51, 0, 0, '2025-01-08'),
(25849, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 6, 0, 0, '2025-01-08'),
(25850, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2025-01-08'),
(25851, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-08'),
(25852, '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-10'),
(25853, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2025-01-10'),
(25854, '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', '2-Structural', 'lengths', 34, 0, 16, '2025-01-10'),
(25855, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-10'),
(25856, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 207, 0, 60, '2025-01-10'),
(25857, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 15, 0, 2, '2025-01-10'),
(25858, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 14, 0, 0, '2025-01-10'),
(25859, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-10'),
(25860, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 51, 0, 0, '2025-01-10'),
(25861, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 6, 0, 0, '2025-01-10'),
(25862, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2025-01-10'),
(25863, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-10'),
(25864, '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-13'),
(25865, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2025-01-13'),
(25866, '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', '2-Structural', 'lengths', 34, 0, 16, '2025-01-13'),
(25867, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-13'),
(25868, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 207, 0, 60, '2025-01-13'),
(25869, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 15, 0, 2, '2025-01-13'),
(25870, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 14, 0, 0, '2025-01-13'),
(25871, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-13'),
(25872, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 51, 0, 0, '2025-01-13'),
(25873, '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', '2-Structural', 'lengths', 6, 0, 0, '2025-01-13'),
(25874, '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', '2-Structural', 'lengths', 12, 0, 0, '2025-01-13'),
(25875, '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', '2-Structural', 'lengths', 0, 0, 0, '2025-01-13');

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
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_data`
--

INSERT INTO `inventory_data` (`id`, `date_inventory`, `cbs_code`, `item_code`, `item_description`, `purchase_uom`, `item_classification`, `trade_classification`, `location`, `on_hand_qty`, `created_at`) VALUES
(269, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 79, '2025-01-08'),
(270, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-08'),
(271, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 140, '2025-01-08'),
(272, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-08'),
(273, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-08'),
(274, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-08'),
(275, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-08'),
(276, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-08'),
(277, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-08'),
(278, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-08'),
(279, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-08'),
(280, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 0, '2025-01-08'),
(281, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 79, '2025-01-10'),
(282, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-10'),
(283, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 140, '2025-01-10'),
(284, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-10'),
(285, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-10'),
(286, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-10'),
(287, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-10'),
(288, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-10'),
(289, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-10'),
(290, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-10'),
(291, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-10'),
(292, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 0, '2025-01-10'),
(293, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1035', '36 mm dia. x 12 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 79, '2025-01-13'),
(294, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-13'),
(295, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1033', '36 mm dia. x 9 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 140, '2025-01-13'),
(296, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-13'),
(297, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-13'),
(298, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-13'),
(299, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-13'),
(300, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-13'),
(301, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-13'),
(302, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1031', '36 mm dia. x 6 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 13, '2025-01-13'),
(303, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-10352', '36 mm dia. x 10.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 37, '2025-01-13'),
(304, '12/16/2024', 'PM2.ST.03.21.MAT', '2B-01-1032', '36 mm dia. x 7.5 meters, Grade 60', 'lengths', '', 'Structural/Civil', '', 0, '2025-01-13');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25876;

--
-- AUTO_INCREMENT for table `inventory_data`
--
ALTER TABLE `inventory_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
