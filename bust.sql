-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql109.epizy.com
-- Generation Time: Nov 04, 2020 at 12:16 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27101040_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bust`
--

CREATE TABLE `bust` (
  `sid` int(5) NOT NULL,
  `busname` text NOT NULL,
  `busclass` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bust`
--

INSERT INTO `bust` (`sid`, `busname`, `busclass`, `datetime`) VALUES
(1, 'F-21', 'AC', '2020-11-04 02:02:53'),
(2, 'F-21', 'SLEEPER', '2020-11-04 02:04:58'),
(3, 'Eco-s', 'General', '2020-11-04 02:08:05'),
(4, 'eCitaro-G', 'General', '2020-11-04 02:08:05'),
(5, 'F-21', 'AC', '2020-11-04 02:08:05'),
(6, 'Eco-s', 'AC', '2020-11-04 02:08:05'),
(7, 'Electra-2', 'General', '2020-11-04 02:08:05'),
(8, 'Electra-2', 'AC', '2020-11-04 02:08:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bust`
--
ALTER TABLE `bust`
  ADD PRIMARY KEY (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
