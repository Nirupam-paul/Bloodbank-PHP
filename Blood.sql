-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 05:39 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `password`) VALUES
(1, 'Nirupam', '11111', '1235');

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `A+` int(5) NOT NULL,
  `A-` int(5) NOT NULL,
  `B+` int(5) NOT NULL,
  `B-` int(5) NOT NULL,
  `AB+` int(5) NOT NULL,
  `AB-` int(5) NOT NULL,
  `O+` int(5) NOT NULL,
  `O-` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`A+`, `A-`, `B+`, `B-`, `AB+`, `AB-`, `O+`, `O-`) VALUES
(0, 0, 1, 1, 0, 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `camps`
--

CREATE TABLE `camps` (
  `camp_id` int(4) NOT NULL,
  `camp_title` varchar(50) NOT NULL,
  `organized_by` varchar(100) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `details` varchar(150) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`camp_id`, `camp_title`, `organized_by`, `state`, `city`, `image`, `details`, `from_date`, `to_date`) VALUES
(1, 'GIMT', 'GIMT groups', 'Assam', 'Guwahati', '', 'abc', '2021-02-01', '2021-03-01'),
(2, 'Saving Lives', 'GIMT groups', 'Assam', 'Guwahati', '', '', '2020-12-30', '2021-01-02'),
(3, 'Donate blood', 'ASTU', 'Assam', 'Guwahati', '', '', '2020-12-27', '2020-12-30'),
(4, 'Awareness Program', 'GIPS', 'Assam', 'Guwahati', '', '', '2021-01-14', '2021-01-15'),
(5, 'Life Saver', 'GCC ', 'Assam', 'Guwahati', '', '', '2021-01-14', '2021-01-16'),
(6, 'Tridip', 'Kalita', 'Assam', 'Guwahati', 'Espresso(coffee).jpg', 'Hello', '2021-02-06', '2021-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `phone`, `subject`, `description`, `email`, `status`) VALUES
(4, 'Tridip Kalita', '8486122605', 'Hello', 'Help', 'tridipkalita100@gmai', 'Contact Successful');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donar_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bloodgroup` varchar(3) NOT NULL,
  `camp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donar_id`, `name`, `phone`, `email`, `bloodgroup`, `camp`) VALUES
(4, 'Zahid', '7002595243', 'nirupam17paul@gmail.com', 'O+', 'GIMT'),
(5, 'Tridip', '8011102472', 'tridip@gmail.com', 'B+', 'Donate blood'),
(6, 'Rahul', '7002595243', 'nirupam17paul@gmail.com', 'O+', 'Donate blood'),
(7, 'Nirupam ', '7002595243', 'nirupam17paul@gmail.com', 'O+', 'GIMT'),
(8, 'Rahul', '7002595243', 'nirupam17paul@gmail.com', 'O-', 'Life Saver');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bg` varchar(5) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `j_date` date NOT NULL,
  `designation` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `age`, `gender`, `bg`, `phone`, `email`, `j_date`, `designation`, `salary`, `password`) VALUES
(5, 'Nirupam', 20, 'Male', 'O+', '8011102472', 'nirupam17paul@gmail.com', '2020-12-18', 'Request Management', 10000, '5555'),
(6, 'Tridip', 20, 'Male', 'A+', '9954962052', 'tridip@gmail.com', '2020-12-20', 'Donar Management', 45000, '3333'),
(7, 'Zahid Mansur ', 21, 'Male', 'AB+', '9954632578', 'zahid@gmail.com', '2020-12-24', 'Contact Management', 40000, '4444'),
(8, 'Zahid Mansur ', 21, 'Male', 'AB+', '9954632578', 'zahid@gmail.com', '2020-12-24', 'Contact Management', 40000, '4444');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(4) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `profile_pic` varchar(40) NOT NULL DEFAULT 'default_pic.jpg',
  `email` varchar(50) NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `Name`, `Age`, `Gender`, `Phone`, `profile_pic`, `email`, `blood_group`, `password`) VALUES
(12, 'Tridip Kalita', 25, 'M', '8486122605', 'default_pic.jpg', 'tridipkalita100@gmail.com', 'A+', '12345'),
(18, 'Bubul Kalita', 26, 'M', '9085602126', 'default_pic.jpg', 'bubulfakekalita100@gmail.com', 'B+', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` text NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bloodgroup` text NOT NULL,
  `requireddate` date NOT NULL,
  `details` varchar(150) NOT NULL,
  `Status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `name`, `age`, `gender`, `mobile`, `email`, `bloodgroup`, `requireddate`, `details`, `Status`) VALUES
(6, 'Nirupam', 20, 'M', '7002595243', 'nirupam17paul@gmail.com', 'O+', '2020-11-03', 'fuftyyf', 'Processing'),
(7, 'Nirupam', 20, 'M', '7002595243', 'nirupam17paul@gmail.com', 'O+', '2020-12-03', 'zdsgdhga', 'Accepted'),
(9, 'Nirupam', 20, 'M', '7002595243', 'nirupam17paul@gmail.com', 'A+', '2020-12-23', 'Hello', 'Accepted'),
(10, 'Nirupam', 20, 'M', '7002595243', 'nirupam17paul@gmail.com', 'AB+', '2020-12-31', 'I urgently need bool for surgery', 'Accepted'),
(11, 'paul', 23, 'M', '8011102472', 'paul@gmail.com', 'O+', '2021-01-01', 'abc', 'Accepted'),
(12, 'Nirupam', 20, 'M', '7002595243', 'nirupam17paul@gmail.com', 'A-', '2020-12-31', 'baskfajsflia', 'Accepted'),
(13, 'Zahid Mansur ', 21, 'M', '9435545402', 'zahid@gmail.com', 'O-', '2021-01-17', 'fxgxfgx', 'Accepted'),
(15, 'Nirupam', 20, 'M', '7002595243', 'nirupam17paul@gmail.com', 'AB+', '2021-01-13', 'dshashduiahfiuauaihui', 'Processing'),
(17, 'Tridip Kalita', 25, 'M', '8486122605', 'tridipkalita100@gmail.com', 'A-', '2021-02-07', 'Need It', 'Accepted'),
(18, 'Tridip Kalita', 25, 'M', '8486122605', 'tridipkalita100@gmail.com', 'AB+', '2021-02-07', 'Urgent', 'Processing'),
(19, 'Tridip Kalita', 25, 'M', '8486122605', 'tridipkalita100@gmail.com', 'AB-', '2021-02-07', 'Need it', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camps`
--
ALTER TABLE `camps`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donar_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `camp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donar_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
