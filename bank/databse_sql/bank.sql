-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 06:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `aadhar` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`aadhar`, `credit`, `debit`, `total`, `date`) VALUES
('910334715015', '1000', '0', '1000', '0000-00-00'),
('910334715015', '1000', '0', '1000', '0000-00-00'),
('910334715015', '0', '500', '500', '0000-00-00'),
('910334715015', '6000', '0', '6500', '0000-00-00'),
('910334715015', '0', '500', '6000', '0000-00-00'),
('910334715015', '400', '0', '6400', '0000-00-00'),
('910334715015', '200', '0', '6600', '0000-00-00'),
('910334715015', '200', '0', '6800', '0000-00-00'),
('910334715015', '300', '0', '7100', '0000-00-00'),
('910334715015', '500', '0', '7600', '2023-04-27'),
('843651035', '0', '0', '0', '2023-04-27'),
('843651035', '600', '0', '600', '2023-04-27'),
('910334715015', '200', '0', '7800', '2023-04-27'),
('910334715015', '500', '0', '8300', '2023-04-27'),
('910334715015', '300', '0', '8600', '2023-04-27'),
('910334715015', '100', '0', '8700', '2023-04-27'),
('910334715015', '100', '0', '8800', '2023-04-27'),
('910334715015', '100', '0', '8900', '2023-04-27'),
('910334715015', '200', '0', '9100', '2023-04-27'),
('910334715015', '600', '0', '9700', '2023-04-27'),
('910334715015', '1000', '0', '10700', '2023-04-27'),
('910334715015', '2000', '0', '12700', '2023-04-27'),
('910334715015', '13000', '0', '25700', '2023-04-27'),
('910334715015', '0', '3600', '22100', '2023-04-27'),
('6943025', '0', '0', '0', '2023-04-27'),
('490165', '0', '0', '0', '2023-04-27'),
('910334715015', '500', '0', '22600', '2023-04-27'),
('910334715015', '0', '600', '22000', '2023-04-27'),
('910334715015', '320000', '0', '342000', '2023-04-27'),
('78925846130', '0', '0', '0', '2023-04-27'),
('58733687964', '0', '0', '0', '2023-04-27'),
('58733687964', '5000', '0', '5000', '2023-04-27'),
('58733687964', '600', '0', '5600', '2023-04-27'),
('58733687964', '8000', '0', '13600', '2023-04-27'),
('58733687964', '200', '0', '13800', '2023-04-27'),
('58733687964', '0', '800', '13000', '2023-04-27'),
('910334715015', '0', '2000', '340000', '2023-04-28'),
('62636564', '0', '0', '0', '2023-04-28'),
('62636564', '5000', '0', '5000', '2023-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `passbook`
--

CREATE TABLE `passbook` (
  `aadhar` varchar(255) NOT NULL,
  `debit` varchar(255) NOT NULL DEFAULT '0',
  `credit` varchar(255) NOT NULL DEFAULT '0',
  `total` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passbook`
--

INSERT INTO `passbook` (`aadhar`, `debit`, `credit`, `total`) VALUES
('910334715015', '2000', '320000', '340000'),
('843651035', '0', '600', '600'),
('6943025', '0', '0', '0'),
('490165', '0', '0', '0'),
('78925846130', '0', '0', '0'),
('58733687964', '800', '200', '13000'),
('62636564', '0', '5000', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `aadhar`, `mobile`, `email`, `address`, `password`) VALUES
(1, ' Avinash ks', '910334715015', ' 947107411  ', 'av@gmail.com', 'Lucknow', ' 123  '),
(7, 'prabhat', '6943025', '643131', 'prabhat@gmail.com', 'Ara', '654231'),
(10, 'Sanjay', '843651035', '9874651', 'sjay@gmail.com', 'dfchj', 'yti78875'),
(11, 'Narendra', '490165', '98764', 'ndr@gmail.com', 'iui', 'd766yrx'),
(15, 'Tariq', '78925846130', '84351655489', 'tq@gmail.com', 'Kanpur', '123456'),
(18, 'vishal pandey', '58733687964', '687651354977', 'vshl@gmail.com', 'Pali', '1234'),
(21, 'Prabhat', '62636564', '65413114', 'pr@gmail.com', 'Ara', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `aadhar` text NOT NULL,
  `mobile` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `name`, `aadhar`, `mobile`, `email`, `address`, `password`) VALUES
(14, 'Shubham', '563751265', '54264', 'sb@gmail.com', 'kolkata', '123456'),
(16, 'Deepali', '5842361032', '5647852', 'dpl@gmail.com', 'kanpur', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
