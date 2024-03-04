-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 01:47 PM
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
-- Database: `admin1`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_in` varchar(100) DEFAULT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_price` int(10) NOT NULL,
  `remaining_price` int(10) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `max_person` int(112) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `email`, `number`, `add`) VALUES
(102, 'nenis rudani', 'a@gmail.com', '8849870776', 'rajkot'),
(103, 'nenis rudani', 'jgajera441@rku.ac.in', '8849870776', 'rajkot'),
(104, 'jess thapa', 'jenilgajera431@rku.ac.in', '8849870776', 'amreli'),
(105, 'nenis rudani', 'jenilgajera431@rku.ac.in', '8849870776', 'amreli');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `check_in_status` tinyint(1) NOT NULL,
  `check_out_status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`, `deleteStatus`) VALUES
(1, 2, 'A-101', NULL, 0, 0, 1),
(2, 2, 'A-102', NULL, 1, 1, 0),
(3, 3, 'A-103', NULL, 0, 0, 0),
(4, 4, 'A-104', 1, 0, 0, 0),
(5, 1, 'B-101', NULL, 0, 1, 0),
(6, 2, 'B-102', NULL, 0, 0, 1),
(7, 3, 'B-103', NULL, 0, 0, 0),
(8, 4, 'B-104', NULL, 0, 0, 1),
(9, 1, 'C-101', NULL, 0, 0, 0),
(10, 2, 'C-102', NULL, 0, 0, 0),
(11, 3, 'C-103', NULL, 0, 0, 1),
(12, 4, 'C-104', NULL, 0, 0, 0),
(13, 4, 'D-101', NULL, 0, 1, 1),
(14, 5, 'K-699', NULL, 0, 1, 0),
(15, 5, 'K-799', NULL, 0, 0, 0),
(16, 5, 'K-899', NULL, 0, 0, 0),
(17, 6, 'M-333', NULL, 0, 0, 0),
(18, 6, 'M-444', NULL, 0, 0, 0),
(19, 6, 'M-555', NULL, 0, 0, 0),
(20, 9, 'P-696', NULL, 0, 0, 0),
(21, 10, 'M-966', NULL, 0, 0, 0),
(22, 10, 'M-869', NULL, 0, 1, 0),
(23, 8, 'Z-666', NULL, 0, 0, 0),
(24, 7, 'X-969', NULL, 0, 0, 0),
(25, 8, 'Z-111', NULL, 0, 0, 0),
(26, 6, 'M-135', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL,
  `offers` int(50) NOT NULL,
  `description` varchar(120) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `price`, `max_person`, `offers`, `description`, `image`) VALUES
(1, 'Single', 1000, 1, 10, 'dfbdsbnmbkbkh', 'h1.jpg'),
(2, 'Double', 1500, 2, 23, 'jhd ihifhiuf', 'h2.jpg'),
(3, 'Triple', 2000, 3, 25, 'jdajsiah', 'h7.jpg'),
(4, 'Family', 3000, 2, 10, 'bbbhb hbfc', 'img_2.jpg'),
(5, 'King Sized', 5500, 4, 7, 'hjvjsajs', 'h2.jpg'),
(6, 'Master Suite', 6500, 6, 6, 'hdasd]', 'h7.jpg'),
(7, 'Mini-Suite', 3600, 3, 5, 'bbsdjhf ksbkfha', 'img_3.jpg'),
(8, 'Connecting Rooms', 8000, 6, 30, 'jhjaf jha bhbj  b', 'h2.jpg'),
(9, 'Presidential Suite', 21000, 4, 40, 'dbsbjhfbdhfdk ', 'h4.jpg'),
(10, 'Murphy Room', 6900, 3, 20, 'bbfdfdbhjbkh afd', 'h3.jpg'),
(15, 'Standard Room', 1000, 12, 20, 'jess gajerajnajknfnf', 'h2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `a_id` int(12) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_email` varchar(20) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`a_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `a_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
