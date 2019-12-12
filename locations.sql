-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2019 at 10:22 PM
-- Server version: 10.3.20-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirkysco_khaoyai`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `location_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lat`, `lng`, `description`, `location_status`) VALUES
(62, 14.341423, 101.345634, 'โป่งอาจารย์แมว', 1),
(63, 14.341875, 101.349037, 'โค้งอันตราย', 1),
(64, 14.337913, 101.355080, 'โค้งอันตราย', 1),
(65, 14.333646, 101.359474, 'โค้งอันตราย', 1),
(66, 14.266386, 101.387619, 'โค้งอันตราย', 1),
(67, 14.279803, 101.392433, 'โค้งอันตราย', 1),
(68, 14.472023, 101.393440, 'โค้งอันตราย', 1),
(69, 14.480073, 101.385300, 'โค้งอันตราย', 1),
(70, 14.484731, 101.386711, 'โค้งอันตราย', 1),
(71, 14.481690, 101.383385, 'โค้งอันตราย', 1),
(72, 14.487773, 101.388512, 'โค้งอันตราย', 1),
(73, 14.489711, 101.386856, 'โค้งอันตราย', 1),
(74, 14.425681, 101.391273, 'โค้งอันตราย', 1),
(75, 14.425468, 101.393478, 'โค้งอันตราย', 1),
(76, 14.430225, 101.398727, 'โค้งอันตราย', 1),
(77, 14.434117, 101.400108, 'โค้งอันตราย', 1),
(78, 14.434989, 101.402565, 'โค้งอันตราย', 1),
(79, 14.437709, 101.406586, 'โค้งอันตราย', 1),
(80, 14.432988, 101.414291, 'โค้งอันตราย', 1),
(81, 14.430735, 101.381180, 'โค้งอันตราย', 1),
(82, 14.472490, 101.392441, 'โป่ง', 1),
(83, 14.474470, 101.388031, 'โป่ง กม.30', 1),
(84, 14.452800, 101.369705, 'โป่งชมรมเพื่อน', 1),
(85, 14.446921, 101.367180, 'วังจำปี', 1),
(86, 14.443535, 101.369102, 'โป่งต้นไทร', 1),
(87, 14.420747, 101.371033, 'ทุ่งกวาง', 1),
(88, 14.365461, 101.349113, 'โป่งผาตะแบก', 1),
(89, 14.362061, 101.345634, 'โป่งผาตะแบก', 1),
(90, 14.313212, 101.377708, 'ดงยาง', 1),
(92, 14.384454, 101.384430, 'ทุ่งหญ้าเขาเขียว', 1),
(93, 14.380730, 101.391922, 'โค้งอันตราย', 1),
(94, 14.373959, 101.407707, 'โค้งอันตราย', 1),
(95, 14.375573, 101.408386, 'โค้งอันตราย', 1),
(96, 14.375757, 101.409790, 'โค้งอันตราย', 1),
(97, 14.367304, 101.406647, 'โค้งอันตราย', 1),
(98, 14.368991, 101.405258, 'โค้งอันตราย', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
