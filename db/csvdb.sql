-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 07:10 AM
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
-- Database: `csvdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `category`, `description`, `qty`, `created_at`) VALUES
(109, 'office', 'hammer', 5, '2024-12-14 03:39:56'),
(110, 'office', 'jackhammer', 18, '2024-12-14 03:39:56'),
(111, 'office', 'nail', 20, '2024-12-14 03:39:56'),
(112, 'office', 'shotgun', 100, '2024-12-14 03:39:56'),
(113, 'office', 'hammer', 5, '2024-12-14 04:33:54'),
(114, 'office', 'jackhammer', 18, '2024-12-14 04:33:54'),
(115, 'office', 'nail', 20, '2024-12-14 04:33:54'),
(116, 'office', 'shotgun', 100, '2024-12-14 04:33:54'),
(117, 'office', 'hammer', 5, '2024-12-14 04:34:32'),
(118, 'office', 'jackhammer', 18, '2024-12-14 04:34:32'),
(119, 'office', 'nail', 20, '2024-12-14 04:34:32'),
(120, 'office', 'shotgun', 100, '2024-12-14 04:34:32'),
(121, 'office', 'hammer', 50, '2024-12-14 04:35:24'),
(122, 'office', 'jackhammer', 18, '2024-12-14 04:35:24'),
(123, 'office', 'nail', 20, '2024-12-14 04:35:24'),
(124, 'office', 'shotgun', 100, '2024-12-14 04:35:24'),
(125, 'office', 'hammer', 50, '2024-12-14 05:01:54'),
(126, 'office', 'jackhammer', 18, '2024-12-14 05:01:54'),
(127, 'office', 'nail', 20, '2024-12-14 05:01:54'),
(128, 'office', 'shotgun', 100, '2024-12-14 05:01:54'),
(129, 'office', 'hammer', 50, '2024-12-14 05:02:11'),
(130, 'office', 'jackhammer', 18, '2024-12-14 05:02:11'),
(131, 'office', 'nail', 20, '2024-12-14 05:02:11'),
(132, 'office', 'shotgun', 100, '2024-12-14 05:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `onsite`
--

CREATE TABLE `onsite` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `office_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onsite`
--

INSERT INTO `onsite` (`id`, `category`, `description`, `qty`, `office_id`, `created_at`) VALUES
(104, 'onsite', 'hammer', 8, NULL, '2024-12-14 03:39:56'),
(105, 'onsite', 'jackhammer', 20, NULL, '2024-12-14 03:39:56'),
(106, 'onsite', 'nail', 18, NULL, '2024-12-14 03:39:56'),
(107, 'onsite', 'shotgun', 100, NULL, '2024-12-14 03:39:56'),
(108, 'onsite', 'hammer', 8, NULL, '2024-12-14 04:33:54'),
(109, 'onsite', 'jackhammer', 20, NULL, '2024-12-14 04:33:54'),
(110, 'onsite', 'nail', 18, NULL, '2024-12-14 04:33:54'),
(111, 'onsite', 'shotgun', 100, NULL, '2024-12-14 04:33:54'),
(112, 'onsite', 'hammer', 8, NULL, '2024-12-14 04:34:32'),
(113, 'onsite', 'jackhammer', 20, NULL, '2024-12-14 04:34:32'),
(114, 'onsite', 'nail', 18, NULL, '2024-12-14 04:34:32'),
(115, 'onsite', 'shotgun', 100, NULL, '2024-12-14 04:34:32'),
(116, 'onsite', 'hammer', 8, NULL, '2024-12-14 04:35:24'),
(117, 'onsite', 'jackhammer', 20, NULL, '2024-12-14 04:35:24'),
(118, 'onsite', 'nail', 18, NULL, '2024-12-14 04:35:24'),
(119, 'onsite', 'shotgun', 100, NULL, '2024-12-14 04:35:24'),
(120, 'onsite', 'hammer', 8, NULL, '2024-12-14 05:01:54'),
(121, 'onsite', 'jackhammer', 20, NULL, '2024-12-14 05:01:54'),
(122, 'onsite', 'nail', 18, NULL, '2024-12-14 05:01:54'),
(123, 'onsite', 'shotgun', 100, NULL, '2024-12-14 05:01:54'),
(124, 'onsite', 'hammer', 8, NULL, '2024-12-14 05:02:11'),
(125, 'onsite', 'jackhammer', 20, NULL, '2024-12-14 05:02:11'),
(126, 'onsite', 'nail', 18, NULL, '2024-12-14 05:02:11'),
(127, 'onsite', 'shotgun', 100, NULL, '2024-12-14 05:02:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onsite`
--
ALTER TABLE `onsite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_id` (`office_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `onsite`
--
ALTER TABLE `onsite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `onsite`
--
ALTER TABLE `onsite`
  ADD CONSTRAINT `onsite_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
