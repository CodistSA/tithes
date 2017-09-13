-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2017 at 03:29 PM
-- Server version: 10.0.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codistco_tithes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tithespayment`
--

CREATE TABLE `tithespayment` (
  `id` int(11) NOT NULL,
  `CongregantID` int(11) NOT NULL,
  `dtpaid` date DEFAULT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tithespayment`
--

INSERT INTO `tithespayment` (`id`, `CongregantID`, `dtpaid`, `dtcreated`) VALUES
(44, 2, '2017-08-24', '2017-08-13 13:09:08'),
(45, 2, '2017-08-01', '2017-08-13 13:10:04'),
(46, 42, '2017-08-13', '2017-08-13 13:11:55'),
(47, 169, '2017-08-13', '2017-08-13 13:11:55'),
(48, 427, '2017-08-13', '2017-08-13 13:11:55'),
(49, 818, '2017-08-14', '2017-08-13 13:24:07'),
(50, 255, '2017-08-14', '2017-08-13 13:24:07'),
(51, 881, '2017-08-14', '2017-08-13 13:24:07'),
(52, 153, '2017-08-14', '2017-08-13 13:24:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tithespayment`
--
ALTER TABLE `tithespayment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tithespayment`
--
ALTER TABLE `tithespayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
