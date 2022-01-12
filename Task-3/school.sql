-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2022 at 05:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `usertype`, `password`) VALUES
(1, 'admin', 'admin', 'admin@123'),
(2, 'staff', 'staff', 'staff@123'),
(3, 'teacher', 'teacher', 'teacher@123'),
(4, 'professor', 'professor', 'professor@123');

-- --------------------------------------------------------

--
-- Table structure for table `examslist`
--

CREATE TABLE `examslist` (
  `id` int(11) NOT NULL,
  `examname` varchar(150) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examslist`
--

INSERT INTO `examslist` (`id`, `examname`, `date`, `type`) VALUES
(1, 'semester', '05/01/2022', 'exam'),
(2, 'semester-2', '07/01/2022', 'exam');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(100) NOT NULL,
  `rollnumber` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `language-1` varchar(100) NOT NULL,
  `english` varchar(100) NOT NULL,
  `maths` varchar(100) NOT NULL,
  `science` varchar(100) NOT NULL,
  `socialscience` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `rollnumber`, `name`, `dob`, `language-1`, `english`, `maths`, `science`, `socialscience`, `total`, `status`) VALUES
(1, 'lgm001', 'Ashwin Thakur', '01/01/2001', '95', '95', '95', '93', '85', '463', 'PASS'),
(2, 'lgm192', 'Chris Watts', '03/05/1997', '91', '85', '72', '89', '81', '418', 'PASS'),
(3, 'lgm310', 'Mohammed al Qassimi', '12/17/2002', '80', '85', '79', '90', '92', '426', 'PASS'),
(4, 'lgm443', 'Varun Krishna', '12/25/2000', '68', '62', '59', '64', '71', '324', 'PASS'),
(5, 'lgm199', 'Sundar GP', '10/04/2001', '81', '81', '81', '81', '81', '405', 'PASS'),
(6, 'lgm201', 'Nandhakumar', '01/02/2000', '90', '89', '88', '87', '86', '440', 'PASS');

-- --------------------------------------------------------

--
-- Table structure for table `semester-2`
--

CREATE TABLE `semester-2` (
  `id` int(100) NOT NULL,
  `rollnumber` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `language-1` varchar(100) NOT NULL,
  `english` varchar(100) NOT NULL,
  `maths` varchar(100) NOT NULL,
  `science` varchar(100) NOT NULL,
  `socialscience` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester-2`
--

INSERT INTO `semester-2` (`id`, `rollnumber`, `name`, `dob`, `language-1`, `english`, `maths`, `science`, `socialscience`, `total`, `status`) VALUES
(1, 'lgm201', 'Raja Palaniappan', '12/26/2001', '81', '83', '90', '84', '92', '430', 'PASS'),
(2, 'lgm202', 'Bhuvaneshwaran S', '11/19/2001', '73', '81', '75', '89', '83', '402', 'PASS'),
(3, 'abc004', 'Mr  Nandy', '01/02/2000', '80', '80', '80', '80', '90', '410', 'PASS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examslist`
--
ALTER TABLE `examslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester-2`
--
ALTER TABLE `semester-2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examslist`
--
ALTER TABLE `examslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semester-2`
--
ALTER TABLE `semester-2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
