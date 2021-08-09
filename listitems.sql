-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 03:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17130947_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `listitems`
--

CREATE TABLE `listitems` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `task_status` enum('no','yes') NOT NULL,
  `orderID` int(11) DEFAULT 1,
  `color` varchar(50) NOT NULL DEFAULT '#73B8BF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listitems`
--

INSERT INTO `listitems` (`id`, `name`, `task_status`, `orderID`, `color`) VALUES
(72, 'Saad Ali', 'no', 1, '#947f7f'),
(84, 'Uzair ', 'no', 1, '#73B8BF'),
(89, 'Talha Saleem', 'no', 1, '#73B8BF'),
(90, 'Mujtaba', 'no', 1, '#73B8BF'),
(91, 'Uzair Yaseen', 'no', 1, '#73B8BF'),
(92, 'Talha ', 'no', 1, '#73B8BF'),
(93, 'Uzair Yaseen', 'no', 1, '#73B8BF'),
(94, 'Mujtaba', 'no', 1, '#73B8BF'),
(95, 'Talha Saleem', 'no', 1, '#73B8BF'),
(96, 'Mujtaba', 'no', 1, '#73B8BF'),
(97, 'Ali', 'no', 1, '#73B8BF'),
(98, '23', 'no', 1, '#73B8BF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listitems`
--
ALTER TABLE `listitems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listitems`
--
ALTER TABLE `listitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
