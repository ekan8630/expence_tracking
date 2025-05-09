-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 07:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expenses` (
  `userid` varchar(50) NOT NULL,
  `expensedate` date NOT NULL,
  `expenseitem` varchar(80) NOT NULL,
  `expensecost` bigint(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`userid`, `expensedate`, `expenseitem`, `expensecost`, `id`) VALUES
('ekanshnarang321@gmail.com', '2023-12-15', 'Chips', 15, 2),
('ekanshnarang321@gmail.com', '2023-12-14', 'Sugar', 100, 12),
('ekanshnarang321@gmail.com', '2023-11-16', 'Cake', 702, 13),
('ekanshnarang321@gmail.com', '2022-01-22', 'Ball', 205, 14),
('ekanshnarang321@gmail.com', '2022-12-16', 'Pastry', 507, 15),
('ekanshnarang321@gmail.com', '2023-11-15', 'Toys', 50, 16),
('ekanshnarang321@gmail.com', '2023-12-09', 'Jug', 150, 17),
('ekanshnarang321@gmail.com', '2023-13-11', 'Perfume', 89, 18),
('ekanshnarang321@gmail.com', '2023-12-10', 'Books', 390, 19),


-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `profile_pic` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`name`, `email`, `mobile_no`, `password`, `profile_pic`) VALUES
('Ekansh Narang', 'ekanshnarang321@gmail.com', 8630145656, '202cb962ac59075b964b07152d234b70', 'images/eka.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
