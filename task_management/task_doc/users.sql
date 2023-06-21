-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 08:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'Customer',
  `name` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `contact` bigint(11) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `password`, `email`, `address`, `contact`, `verified`, `deleted`) VALUES
(1, 'Administrator', 'Admin', 'admin', '$2y$10$vSCV6JHGpGn7Iwyb/DCZYuMA.6h.3qeL6ku35vjvfgK21cLNiETbO', 'admin@foms.com', '1123, Here St., There City, Anywhere, 2306', 9321546987, 1, 0),
(4, 'Customer', 'Mark Cooper', 'mcooper', '$2y$10$yPP1O4sO2yjrdxdyS5XfuOH04rnNpDMsrVs.eNtlJ5iF2CiOdfjjm', 'mcooper123@mail.com', 'Sample Address', 9123564978, 1, 0),
(5, 'Customer', 'Samantha Lou', 'slou23', '$2y$10$1lgR2XKGBrlVaF5I.ReUgeJsGsKA/1TgS0dfpSn9ttLpM7jKa4D76', NULL, NULL, 93214564987, 0, 0),
(6, 'Customer', 'ali', 'ali', '123', 'ali@gmail.com', 'xyz', 1234567890, 1, 0),
(7, 'Customer', 'kashif', 'kashif', '$2y$10$nvoE0ai7LSW4SpGBciBYcuR0X4.068/Bo52nKuPg8f6GjXqju2R4y', NULL, NULL, 123456789, 1, 0),
(8, 'Customer', 'alikashif', 'alikashif', '$2y$10$T2YBe6NYrXJAyriRlWZQ1u372aH2GVXSVe8u6UxPVUtRqTDrHO62e', NULL, NULL, 123456789, 0, 0),
(9, 'Customer', 'shrik', 'shrikaanth', '$2y$10$X9DukaRF2OCf9dQaaNqCV.vkQiWaGJMnOM7qDJUAADWpJ.n6QszVO', NULL, NULL, 111111111111111, 0, 0),
(10, 'Writer', 'jit', 'jitesh', '12345', 'jit@gmail.com', 'xxxxx', 123456789, 1, 0),
(11, 'Writer', 'savanthggg', 'savanth', '$2y$10$G7JucMjYL3w9uFQ4Bytx5O9FfXRxONvEz0qp0Po8bi7ntIUm/BP8i', NULL, NULL, 111111111111111, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

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
