-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 06:54 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_email` varchar(20) NOT NULL,
  `p_phone` int(11) NOT NULL,
  `symptoms` text NOT NULL,
  `other_issues` text NOT NULL,
  `living_area` varchar(20) NOT NULL,
  `app_doc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`p_id`, `p_name`, `p_email`, `p_phone`, `symptoms`, `other_issues`, `living_area`, `app_doc_id`) VALUES
(3, 'Habib', 'monon@gmail.com', 1234, 'Feeling weak,Headache,', 'Vomiting\r\n\r\n', 'Uttara', 3),
(7, 'musa', 'q@gmail.com', 147, 'Cold,Difficult to Breath,Headache,', 'Bad stomach', 'Dhanmondi', 4),
(10, 'musa', 'zxzx@gmail.com', 123, 'Cold,Difficult to Breath,Feeling weak,', '\r\nTiredness\r\n', 'Mirpur', 1),
(11, 'Atiya Riya', 'atiya@gmail.com', 125552221, 'Cold,Fever,Difficult to Breath,Feeling weak,', '\r\n\r\nvomiting, headache', 'Uttara', 1),
(12, 'musaddik', 'musa@gmail.com', 122555752, 'Difficult to Breath,Feeling weak,', '\r\nheadache\r\n', 'Dhanmondi', 8);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`) VALUES
(1, 'Mirpur'),
(2, 'Dhanmondi'),
(3, 'Mothijheel'),
(4, 'Uttara');

-- --------------------------------------------------------

--
-- Table structure for table `doctable`
--

CREATE TABLE `doctable` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(20) NOT NULL,
  `doc_email` varchar(20) NOT NULL,
  `doc_password` text NOT NULL,
  `chamber_name` text NOT NULL,
  `hospital_location` text NOT NULL,
  `available` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctable`
--

INSERT INTO `doctable` (`doc_id`, `doc_name`, `doc_email`, `doc_password`, `chamber_name`, `hospital_location`, `available`) VALUES
(1, 'Dr. musaddik', 'm@gmail.com', '$2y$10$sGJ93J3c3f0eM1LZC1xkEOEMZ.S34SFuB5IUe0jSwRq2bQuuRvZru', 'labaid', 'mirpur', '02:00 To 04:30'),
(2, 'Dr. musaddik habib', 'qw@gmail.com', '$2y$10$X870Xq.MFJaSXB5zCPN8m.Vm5jjdrBe3wzekvmb1WmLsHgSsn4vP6', 'delta', 'dhanmondi', '03:00 To 04:30'),
(4, 'Dr. Jahangir', 'jahangir@gmail.com', '$2y$10$M9Z7S7YSHdZqCz6PFq2qoOQCdCF.UsywLlpmK3Lm97Xy3CnngQtee', 'Labaid Hospital Limited', 'Dhanmondi', '1:00 To 02:30'),
(6, 'Dr. Habib', 'habib@gmail.com', '$2y$10$wOlnkPrjvfPIan7eB3Hh1u370L6Wxh7kenped.oBgnYB6Z9mnPlMu', 'labaid', 'Dhanmondi', '12:00 To 12:30'),
(8, 'Dr. Zaheen', 'zaheen@gmail.com', '$2y$10$iHzSQLPGdDlg5dJABAZIs.kKf9MmEHi0BsL23FPCh9nusnib/mOAe', 'Delta Hospital Ltd.', 'Uttara', '15:30 To 17:00');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_email` varchar(20) NOT NULL,
  `p_phone` int(11) NOT NULL,
  `symptoms` text NOT NULL,
  `other_issues` text NOT NULL,
  `living_area` varchar(20) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`p_id`, `p_name`, `p_email`, `p_phone`, `symptoms`, `other_issues`, `living_area`, `area_id`) VALUES
(1, 'musa', 'q@gmail.com', 147, 'Difficult to Breath,Headache,', '\r\n bad stomach\r\n ', 'Mirpur', 1),
(2, 'Abrar', 'q@gmail.com', 123, 'Feeling weak,', 'nothing\r\n \r\n ', 'Motojheel', 3),
(3, 'Zaheen', 'q@gmail.com', 123, 'Fever,Feeling weak,', '\r\n senseless', 'Dhanmondi', 2),
(4, 'Habib', 'monon@gmail.com', 1234, 'Cold,Feeling weak,Headache,', '\r\n \r\n nothing ', 'Mirpur', 1),
(10, 'atiya ', 'at@gmail.com', 12341234, 'Fever,Difficult to Breath,Headache,', '\r\n vomiting\r\n ', 'Uttara', 4),
(16, 'musaddik', 'musa@gmail.com', 2147483647, 'Cold,Fever,Difficult to Breath,', '\r\n no issue\r\n ', 'Uttara', 4),
(18, 'Atiya Riya', 'atiya@gmail.com', 1236652255, 'Cold,Fever,Headache,', '\r\n \r\n vomiting, tiredness', 'Uttara', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `doctable`
--
ALTER TABLE `doctable`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctable`
--
ALTER TABLE `doctable`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
