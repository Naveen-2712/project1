-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 06:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjt1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `initial` varchar(5) DEFAULT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `emergency_contact` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `initial`, `dob`, `email`, `phone`, `gender`, `blood_group`, `address_line1`, `address_line2`, `city`, `postal_code`, `state`, `country`, `emergency_contact`, `password`) VALUES
(8, 'Naveen', 'Prakash', 'M', '2025-01-11', 'naveenprakash2712@gmail.com', '0994023287', 'Male', 'B+', 'N0.6/58', 'Kaladipet, Tiruvottiyur', 'Chennai', '600019', 'Tamil Nadu', 'India', '9445232540', '123'),
(9, 'Naveen', 'Prakash', '', '2000-05-21', 'naveenprakash@gmail.com', '1234567891', 'Male', 'B+', 'N0.6/58,', 'Kaladipet, Tiruvottiyur', 'Chennai', '600019', 'Tamil Nadu', 'India', '1234565412', '$2y$10$uTlH2HYbc6o45KO3LBw.wOlhYEA6NZZQBC7RjWukndyrMEE0haDDG'),
(10, 'Naveen', 'Prakash', '', '2001-12-12', 'naveen@gmail.com', '1234152635', 'Male', 'B+', 'N0.6/58, ', 'T.H.Road, Kaladipet, Tiruvottiyur', 'Chennai', '600019', 'Tamil Nadu', 'India', '1234561452', '$2y$10$1EM0fEG1CoN6pWav84TnGeE9xB5AhWFyXigMc94U2JlBjGH2qgSrS'),
(11, 'kalpana', 'K', '', '2003-01-20', 'kalpana@gmail.com', '1234152632', 'Female', 'O+', 'N0.6/58, T.H.Road,', 'Kaladipet, Tiruvottiyur', 'Chennai', '600019', 'Tamil Nadu', 'India', '3310232540', '$2y$10$0d1gaff2MN/t3b5Qj/zoZu10aV/rD7cPc4klzSwZgBCgPL/hAN0hC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
