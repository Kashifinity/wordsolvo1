-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 05:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `import_excel_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll_no`, `name`, `mobile`, `email`) VALUES
(21, '23', 'Mohit', '8888888888', 'mohit@gmail.com'),
(22, '34', 'Ankit', '9999999999', 'ankit@gmail.com'),
(23, '23', 'Shubham', '6666666666', 'shubham@gmail.com'),
(24, '34', 'Vishal', '7777777777', 'vishal@gmail.com'),
(25, '2', 'Tarun', '3333333333', 'tarun@gmail.com'),
(26, '34', 'Piyush', '1111111111', 'piyush@gmail.com'),
(27, '6', 'Pankaj', '2222222222', 'pankaj@gmail.com'),
(28, '56', 'Abhi', '4444444444', 'abhi@gmail.com'),
(29, '56', 'Sahankar', '9999999909', 'sahankar@gmail.com'),
(30, '45', 'Krishna', '6666666666', 'krishna@gmail.com'),
(31, '23', 'Mohit', '8888888888', 'mohit@gmail.com'),
(32, '34', 'Ankit', '9999999999', 'ankit@gmail.com'),
(33, '23', 'Shubham', '6666666666', 'shubham@gmail.com'),
(34, '34', 'Vishal', '7777777777', 'vishal@gmail.com'),
(35, '2', 'Tarun', '3333333333', 'tarun@gmail.com'),
(36, '34', 'Piyush', '1111111111', 'piyush@gmail.com'),
(37, '6', 'Pankaj', '2222222222', 'pankaj@gmail.com'),
(38, '56', 'Abhi', '4444444444', 'abhi@gmail.com'),
(39, '56', 'Sahankar', '9999999909', 'sahankar@gmail.com'),
(40, '45', 'Krishna', '6666666666', 'krishna@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
