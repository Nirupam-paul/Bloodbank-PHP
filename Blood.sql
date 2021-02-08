-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 04:07 PM
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
(1, 'Admin', '11111', '12345');

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
(0, 0, 1, 1, 1, 4, 4, 2);

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
(8, 'DROPS OF HOPE', 'LIFE SAVER', 'Assam', 'Guwahati', 'camp-2.jpg', 'Every blood donor is a life saver', '2021-02-08', '2021-02-28'),
(9, 'GIVE LIFE', 'NSS', 'Assam', 'Jorhat', 'camp-1.jpg', 'Don’t let fools or mosquitoes suck your blood, put it to good use. Donate blood and save a life.', '2021-02-01', '2021-04-25'),
(10, 'GIVE AND LET LIVE', 'AZARA HOSPITAL', 'Assam', 'Guwahati', 'camp-3.jpg', 'Donate your blood for a reason, let the reason to be life', '2020-12-01', '2021-04-01'),
(11, 'DONATE BECAUSE YOU CAN', 'VIJAI LAKSHMI HOSPITAL', 'Assam', 'Morigaon', 'camp-4.jpg', 'Sometimes money cannot save life but donated blood can!', '2021-10-11', '2022-01-01');

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
(5, 'Contact1', '1234567890', 'Need Blood', 'Urgent', 'contact1@gmail.com', 'Pending'),
(6, 'Contact2', '1234567891', 'Blood Needed', 'Emergency', 'contact2@gmail.com', 'Contact Successful');

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
(9, 'Donor1', '1234567890', 'donor1@gmail.com', 'A+', 'DROPS OF HOPE'),
(10, 'Donor2', '1234567891', 'donor2@gmail.com', 'A-', 'DROPS OF HOPE'),
(11, 'Donor3', '1234567892', 'donor3@gmail.com', 'B+', 'GIVE LIFE'),
(12, 'Donor4', '1234567894', 'donor4@gmail.com', 'B-', 'GIVE LIFE'),
(13, 'Donor5', '1234567894', 'donor5@gmail.com', 'AB+', 'GIVE AND LET LIVE'),
(14, 'Donor6', '1234567895', 'donor6@gmail.com', 'AB-', 'GIVE AND LET LIVE'),
(15, 'Donor7', '1234567896', 'donor7@gmail.com', 'O+', 'DONATE BECAUSE YOU CAN'),
(16, 'Donor8', '1234567897', 'donor8@gmail.com', 'O-', 'DONATE BECAUSE YOU CAN');

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
(5, 'Nirupam Paul', 20, 'Male', 'O+', '8011102472', 'nirupam17paul@gmail.com', '2020-12-18', 'Request Management', 10000, '5555'),
(6, 'Tridip Kalita', 20, 'Male', 'A+', '9954962052', 'tridip@gmail.com', '2020-12-20', 'Donar Management', 45000, '3333'),
(7, 'Zahid Mansur ', 21, 'Male', 'AB+', '9954632578', 'zahid@gmail.com', '2020-12-24', 'Contact Management', 40000, '4444');

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
  `profile_pic` varchar(100) NOT NULL DEFAULT 'default_pic.jpg',
  `email` varchar(50) NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `Name`, `Age`, `Gender`, `Phone`, `profile_pic`, `email`, `blood_group`, `password`) VALUES
(22, 'Register1', 20, 'M', '1234567890', '1234567890_reg1.jpg', 'register1@gmail.com', 'A+', '12345'),
(24, 'Register2', 22, 'F', '1234567891', '1234567891_reg2.jpg', 'register2@gmail.com', 'B+', '12345'),
(25, 'Register3', 24, 'M', '1234567892', '1234567892_reg3.jpg', 'register3@gmail.com', 'AB+', '12345');

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
(21, 'Register1', 20, 'M', '1234567890', 'register1@gmail.com', 'A+', '2021-02-08', 'Urgent', 'Processing'),
(22, 'Register1', 20, 'M', '1234567890', 'register1@gmail.com', 'B+', '2021-02-05', 'Emergency', 'Accepted'),
(23, 'Register1', 20, 'M', '1234567890', 'register1@gmail.com', 'AB+', '2021-02-09', 'Urgent need', 'Pending'),
(24, 'Register2', 22, 'F', '1234567891', 'register2@gmail.com', 'A-', '2021-02-04', 'Medical Emergency', 'Processing'),
(25, 'Register3', 24, 'M', '1234567892', 'register3@gmail.com', 'O+', '2021-02-08', 'Emergency', 'Pending');

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
  MODIFY `camp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donar_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
