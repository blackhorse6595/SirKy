-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 08:43 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoayai`
--

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `id` int(10) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `latitude`, `longitude`, `user`, `name`, `description`) VALUES
(63, 14.1542, 101.365, 'member', 'test', ''),
(64, 14.1542, 101.365, 'member', 'test', ''),
(65, 14.1542, 101.365, 'member', 'test', '1'),
(66, 14.1542, 101.365, 'member', 'test', '1'),
(67, 14.1542, 101.365, 'member', 'test', '1'),
(68, 14.1542, 101.365, 'member', 'test', '1'),
(69, 14.1542, 101.365, 'member', 'test', '1'),
(70, 14.1542, 101.365, 'member', 'test', '1'),
(71, 14.1542, 101.365, 'member', 'test', '1'),
(72, 14.1542, 101.365, 'member', 'test', '1'),
(73, 14.1542, 101.365, 'member', 'test', '1'),
(74, 14.1542, 101.365, 'member', 'test', '1'),
(75, 14.1542, 101.365, 'member', 'test', '1'),
(76, 14.1542, 101.365, 'member', 'test', '1'),
(77, 14.1542, 101.365, 'member', 'test', '1'),
(78, 14.1542, 101.365, 'member', 'test', '1'),
(79, 14.1542, 101.365, 'member', 'test', '1'),
(80, 14.1542, 101.365, 'member', 'test', '1'),
(81, 14.1542, 101.365, 'member', 'test', '1'),
(82, 14.1542, 101.365, 'member', 'test', '1'),
(83, 14.1542, 101.365, 'member', 'test', '1'),
(84, 14.1542, 101.365, 'member', 'test', '1'),
(85, 14.1542, 101.365, 'member', 'test', '1'),
(86, 14.1542, 101.365, 'member', 'test', '1'),
(87, 14.1542, 101.365, 'member', 'test', '1'),
(88, 14.1542, 101.365, 'member', 'test', '1'),
(89, 14.1542, 101.365, 'member', 'test', '1'),
(90, 14.1542, 101.365, 'member', 'test', '1'),
(91, 14.1542, 101.365, 'member', 'test', '1'),
(92, 14.1542, 101.365, 'member', 'test', '1'),
(93, 14.1542, 101.365, 'member', 'test', '1'),
(94, 14.1542, 101.365, 'member', 'test', '1'),
(95, 14.1542, 101.365, 'member', 'test', '1'),
(96, 14.1542, 101.365, 'member', 'test', '1'),
(97, 14.1542, 101.365, 'member', 'test', '1'),
(98, 14.1542, 101.365, 'member', 'test', '1'),
(99, 14.1542, 101.365, 'member', 'test', '1'),
(100, 14.1542, 101.365, 'member', 'test', '1'),
(101, 14.1542, 101.365, 'member', 'test', '1'),
(102, 14.1542, 101.365, 'member', 'test', '1'),
(103, 14.1542, 101.365, 'member', 'test', '1'),
(104, 14.1542, 101.365, 'member', 'test', '1'),
(105, 14.1542, 101.365, 'member', 'test', '1'),
(106, 14.1542, 101.365, 'member', 'test', '1'),
(107, 14.1542, 101.365, 'member', 'test', '1'),
(108, 14.1542, 101.365, 'member', 'test', '1'),
(109, 14.1542, 101.365, 'member', 'test', '1'),
(110, 14.1542, 101.365, 'member', 'test', '1'),
(111, 14.1542, 101.365, 'member', 'test', '1'),
(112, 14.1542, 101.365, 'member', 'test', '1'),
(113, 14.1542, 101.365, 'member', 'test', '1'),
(114, 13.9389, 102.702, 'member', 'test', '1'),
(115, 13.9389, 102.702, 'member', 'test', '1'),
(116, 13.9389, 102.702, 'member', 'test', '1'),
(117, 13.9389, 102.702, 'member', 'test', '1'),
(118, 13.9389, 102.702, 'member', 'test', '1'),
(119, 13.9389, 102.702, 'member', 'test', '1'),
(120, 13.9389, 102.702, 'member', 'test', '1'),
(121, 13.9389, 102.702, 'member', 'test', '1'),
(122, 13.9389, 102.702, 'member', 'test', '1'),
(123, 13.9389, 102.702, 'member', 'test', '1'),
(124, 13.9389, 102.702, 'member', 'test', '1'),
(125, 13.9389, 102.702, 'member', 'test', '1'),
(126, 13.9389, 102.702, 'member', 'test', '1'),
(127, 13.9389, 102.702, 'member', 'test', '1'),
(128, 13.9389, 102.702, 'member', 'test', '1'),
(129, 13.9389, 102.702, 'member', 'test', '1'),
(130, 13.9389, 102.702, 'member', 'test', '1'),
(131, 13.9389, 102.702, 'member', 'test', '1'),
(133, 13.9389, 102.702, 'member', 'test', '1'),
(134, 13.9389, 102.702, 'member', 'test', '1'),
(135, 13.9389, 102.702, 'member', 'test', '1'),
(136, 13.9389, 102.702, 'member', 'test', '1'),
(138, 13.9389, 102.702, 'member', 'test', '1'),
(139, 13.9389, 102.702, 'member', 'test', '1'),
(140, 13.9389, 102.702, 'member', 'test', '1'),
(141, 13.9389, 102.702, 'member', 'test', '1'),
(142, 13.9389, 102.702, 'member', 'test', '1'),
(143, 14.1542, 101.365, 'member', 'test', '1'),
(145, 14.1542, 101.365, 'member', 'test', '1'),
(146, 14.1542, 101.365, 'member', 'test', '1'),
(147, 14.1542, 101.365, 'member', 'test', '1'),
(148, 14.1542, 101.365, 'member', 'test', '1'),
(149, 14.1542, 101.365, 'member', 'test', '1'),
(150, 14.1542, 101.365, 'member', 'test', '1'),
(151, 13.9389, 102.702, 'member', 'test', '1'),
(152, 13.9389, 102.702, 'member', 'test', '1'),
(153, 13.9389, 102.702, 'member', 'test', '1'),
(154, 13.9389, 102.702, 'member', 'test', '1'),
(155, 13.9389, 102.702, 'member', 'test', '1'),
(156, 13.9389, 102.702, 'member', 'test', '1'),
(157, 13.9389, 102.702, 'member', 'test', '1'),
(158, 13.9389, 102.702, 'member', 'test', '1'),
(159, 14.1542, 101.365, 'member', 'test', '1'),
(160, 14.1542, 101.365, 'member', 'test', '1'),
(161, 14.1542, 101.365, 'member', 'test', '1'),
(162, 14.1542, 101.365, 'member', 'test', '1'),
(163, 14.1542, 101.365, 'member', 'test', '1'),
(164, 14.1542, 101.365, 'member', 'test', '1'),
(165, 14.1542, 101.365, 'member', 'test', '1'),
(166, 14.1542, 101.365, 'member', 'test', '1'),
(167, 14.1542, 101.365, 'member', 'test', '1'),
(168, 14.1542, 101.365, 'member', 'test', '1'),
(169, 14.1542, 101.365, 'member', 'test', '1'),
(170, 14.1542, 101.365, 'member', 'test', '1'),
(171, 14.1542, 101.365, 'member', 'test', '1'),
(172, 14.1542, 101.365, 'member', 'test', '1'),
(173, 14.1542, 101.365, 'member', 'test', '1'),
(174, 14.1542, 101.365, 'member', 'test', '1'),
(175, 14.1542, 101.365, 'member', 'test', '1'),
(176, 14.1542, 101.365, 'member', 'test', '1'),
(177, 14.1542, 101.365, 'member', 'test', '1'),
(178, 14.1542, 101.365, 'member', 'test', '1'),
(179, 14.1542, 101.365, 'member', 'test', '1'),
(180, 14.1542, 101.365, 'member', 'test', '1'),
(181, 14.1542, 101.365, 'member', 'test', '1'),
(182, 14.1542, 101.365, 'member', 'test', '1'),
(183, 14.1542, 101.365, 'member', 'test', '1'),
(184, 14.1542, 101.365, 'member', 'test', '1'),
(185, 14.1542, 101.365, 'member', 'test', '1'),
(186, 14.1542, 101.365, 'member', 'test', '1'),
(187, 14.1542, 101.365, 'member', 'test', '1'),
(188, 14.1542, 101.365, 'member', 'test', '1'),
(189, 14.1542, 101.365, 'member', 'test', '1'),
(190, 14.1542, 101.365, 'member', 'test', '1'),
(191, 14.1542, 101.365, 'member', 'test', '1'),
(192, 14.1542, 101.365, 'member', 'test', '1'),
(193, 14.1542, 101.365, 'member', 'test', '1'),
(194, 14.1542, 101.365, 'member', 'test', '1'),
(195, 14.1542, 101.365, 'member', 'test', '1'),
(196, 14.1542, 101.365, 'member', 'test', '1'),
(197, 14.1542, 101.365, 'member', 'test', '1'),
(198, 14.1542, 101.365, 'member', 'test', '1'),
(199, 14.1542, 101.365, 'member', 'test', '1'),
(200, 14.1542, 101.365, 'member', 'test', '1'),
(201, 14.1542, 101.365, 'member', 'test', '1'),
(202, 13.9389, 102.702, 'member', 'test', '1'),
(203, 14.1542, 101.365, 'member', 'test', '1'),
(204, 14.1542, 101.365, 'member', 'test', '1'),
(205, 14.1542, 101.365, 'member', 'test', '1'),
(206, 14.1542, 101.365, 'member', 'test', '1'),
(207, 14.1542, 101.365, 'member', 'test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lat`, `lng`, `description`, `location_status`) VALUES
(32, 14.440787, 101.365913, 'ffdsff', 1),
(33, 14.445301, 101.371536, 'fksksk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

CREATE TABLE `username` (
  `user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`user`, `password`, `name`, `lastname`, `type`) VALUES
('admin', '1111', 'admin', '1234', 'admin'),
('am', '1', 'ambu', 'lance', 'ambulance'),
('employee', '1111', 'testem', 'testem', 'employee'),
('member', '1', 'test', 'test11', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_position`
--

CREATE TABLE `user_position` (
  `user_position_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_latitude` float DEFAULT NULL,
  `user_longitude` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_position`
--

INSERT INTO `user_position` (`user_position_id`, `user_id`, `user_name`, `user_latitude`, `user_longitude`) VALUES
(1, 'am', 'ambu', 13.815, 100.518);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `user_position`
--
ALTER TABLE `user_position`
  ADD PRIMARY KEY (`user_position_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_position`
--
ALTER TABLE `user_position`
  MODIFY `user_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `help`
--
ALTER TABLE `help`
  ADD CONSTRAINT `username` FOREIGN KEY (`user`) REFERENCES `username` (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
