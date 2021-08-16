-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 04:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_list`
--

CREATE TABLE `customers_list` (
  `aid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_list`
--

INSERT INTO `customers_list` (`aid`, `name`, `email`, `balance`) VALUES
(1, 'Akshaya', 'akshaya@gmail.com', 100000),
(2, 'Bala', 'bala@gmail.com', 10000),
(3, 'Charles', 'charles@gmail.com', 20000),
(4, 'Durga', 'durga@gmail.com', 30000),
(5, 'Elizabeth', 'elizabeth@gmail.com', 40000),
(6, 'Francis', 'francis@gmail.com', 50000),
(7, 'Gopal', 'gopal@gmail.com', 60000),
(8, 'Hemanth', 'hemanth@gmail.com', 90000),
(9, 'Ishwarya', 'ishwarya@gmail.com', 70000),
(10, 'Joseph', 'joseph@gmail.com', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `transfers_history`
--

CREATE TABLE `transfers_history` (
  `tid` int(11) NOT NULL,
  `frid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `frbal` int(11) NOT NULL,
  `tobal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers_history`
--

INSERT INTO `transfers_history` (`tid`, `frid`, `toid`, `amt`, `frbal`, `tobal`) VALUES
(1, 1, 2, 1000, 99000, 11000),
(2, 2, 1, 1000, 10000, 100000),
(3, 3, 4, 1000, 19000, 31000),
(4, 4, 3, 1000, 30000, 20000),
(5, 5, 6, 1000, 39000, 51000),
(6, 6, 5, 1000, 50000, 40000),
(7, 7, 8, 1000, 59000, 91000),
(8, 8, 7, 1000, 90000, 60000),
(9, 9, 10, 1000, 69000, 81000),
(10, 10, 9, 1000, 80000, 70000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers_list`
--
ALTER TABLE `customers_list`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `transfers_history`
--
ALTER TABLE `transfers_history`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfers_history`
--
ALTER TABLE `transfers_history`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
