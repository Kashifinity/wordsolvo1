-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 12:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attedence_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `attedence_tbl`
--

CREATE TABLE `attedence_tbl` (
  `id` int(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `attedence` varchar(100) NOT NULL,
  `date1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attedence_tbl`
--

INSERT INTO `attedence_tbl` (`id`, `emp_id`, `attedence`, `date1`) VALUES
(178, 1, 'P', '05-05-2022'),
(179, 2, 'P', '05-05-2022'),
(180, 3, 'P', '05-05-2022'),
(181, 4, 'P', '05-05-2022'),
(182, 5, 'P', '05-05-2022'),
(183, 6, 'P', '05-05-2022'),
(184, 7, 'P', '05-05-2022'),
(185, 1, 'P', '07-05-2022'),
(186, 2, 'P', '07-05-2022'),
(187, 11, 'P', '07-05-2022'),
(188, 1, 'P', '10-05-2022'),
(189, 2, 'P', '10-05-2022'),
(190, 11, 'P', '10-05-2022'),
(191, 12, 'P', '10-05-2022'),
(192, 13, 'P', '10-05-2022'),
(193, 14, 'P', '10-05-2022'),
(221, 1, 'P', '12-05-2022'),
(222, 15, 'P', '12-05-2022'),
(223, 16, 'P', '12-05-2022'),
(224, 17, 'P', '12-05-2022'),
(225, 18, 'P', '12-05-2022'),
(226, 20, 'P', '12-05-2022'),
(227, 29, 'P', '12-05-2022'),
(235, 1, 'P', '13-05-2022'),
(236, 15, 'P', '13-05-2022'),
(237, 16, 'P', '13-05-2022'),
(238, 17, 'P', '13-05-2022'),
(239, 18, 'P', '13-05-2022'),
(240, 20, 'P', '13-05-2022'),
(241, 29, 'P', '13-05-2022'),
(249, 1, 'P', '27-05-2022'),
(250, 15, 'P', '27-05-2022'),
(251, 16, 'P', '27-05-2022'),
(252, 17, 'P', '27-05-2022'),
(253, 18, 'P', '27-05-2022'),
(254, 20, 'P', '27-05-2022'),
(255, 29, 'P', '27-05-2022');

-- --------------------------------------------------------

--
-- Table structure for table `emp_tbl`
--

CREATE TABLE `emp_tbl` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_tbl`
--

INSERT INTO `emp_tbl` (`id`, `name`, `email`, `mobile`) VALUES
(1, 'dipesh', '', 0),
(15, 'aman', '', 0),
(16, 'gourav', '', 0),
(17, 'rishi', '', 0),
(18, 'raz', '', 0),
(20, 'kunal', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attedence_tbl`
--
ALTER TABLE `attedence_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_tbl`
--
ALTER TABLE `emp_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attedence_tbl`
--
ALTER TABLE `attedence_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `emp_tbl`
--
ALTER TABLE `emp_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
