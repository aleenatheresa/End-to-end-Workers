-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 01:30 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_availability`
--

CREATE TABLE `tbl_availability` (
  `availability_id` int(5) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `is_available` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(5) NOT NULL,
  `emp_rate_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `is_cancelled` bit(1) NOT NULL,
  `booked_on` datetime NOT NULL,
  `servicecompleted` bit(1) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `sc_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(5) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `district_id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `login_id` int(5) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`, `district_id`, `location_id`, `login_id`, `created_on`) VALUES
(1, 'Anu B', 'zchZCHJ', '7592953795', 'anu@gmail.com', 1, 4, 5, '2020-11-16 09:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(5) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `is_delete` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`, `is_delete`) VALUES
(1, 'Kottayam', b'1'),
(2, 'Thiruvananthapuram', b'1'),
(3, 'Kozhikode', b'1'),
(31, 'Kannur', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_id` int(5) NOT NULL,
  `employee_name` varchar(20) NOT NULL,
  `employee_address` varchar(50) NOT NULL,
  `employee_phone` varchar(25) NOT NULL,
  `employee_email` varchar(20) NOT NULL,
  `location_id` int(5) NOT NULL,
  `login_id` int(5) NOT NULL,
  `sp_id` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `sc_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `employee_name`, `employee_address`, `employee_phone`, `employee_email`, `location_id`, `login_id`, `sp_id`, `created_on`, `sc_id`) VALUES
(1, 'Aleena Theresa', 'Vadasseril', '2147483647', 'aleena@gmail.com', 3, 2, 0, '2020-11-16 09:39:34', 1),
(2, 'Gresshma s', 'sd', '2147483647', 'gresshma@gmail.com', 3, 4, 1, '2020-11-16 09:43:37', 1),
(3, 'Anjana m', 'zchZCHJ', '2147483647', 'anjana@gmail.com', 6, 6, 1, '2020-11-16 10:06:53', 1),
(4, 'Ancy George', 'zchZCHJ', '2147483647', 'ansy@gmail.com', 5, 8, 1, '2020-11-16 10:35:22', 1),
(5, 'Ansu joseph', 'Vadasseril', '2147483647', 'ansu@gmail.com', 3, 9, 1, '2020-11-16 10:36:44', 1),
(6, 'Anjali j', 'Vadasseril', '7592953795', 'anjali@gmail.com', 4, 10, 1, '2020-11-16 10:38:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_ratedetails`
--

CREATE TABLE `tbl_emp_ratedetails` (
  `emp_rate_id` int(5) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `employee_charge` varchar(20) NOT NULL,
  `is_delete` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(5) NOT NULL,
  `location` varchar(20) NOT NULL,
  `district_id` int(5) NOT NULL,
  `is_delete` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `location`, `district_id`, `is_delete`) VALUES
(1, 'kply', 1, b'1'),
(2, 'Ponkunnam', 1, b'1'),
(3, 'Neyyattinkara', 2, b'1'),
(4, 'Mannarkadu', 1, b'1'),
(5, 'varkala', 2, b'1'),
(6, 'Chirakadavu', 1, b'1'),
(7, 'asd', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `lid` int(5) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(5) NOT NULL,
  `aproval_status` bit(1) NOT NULL,
  `is_delete` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`lid`, `uname`, `password`, `role_id`, `aproval_status`, `is_delete`) VALUES
(1, 'admin', '0e7517141fb53f21ee439b355b5a1d0a', 1, b'1', b'1'),
(2, 'Aleena', '95b5d776ebb1ca4e073ca1778cdcda88', 3, b'0', b'1'),
(3, 'Sanju', 'b5dfda0b18d06f1b6ad26cddd0e475e4', 4, b'1', b'1'),
(4, 'Greeshma', ' 07a2f1b5a8325cbbe04a484daef615f9', 3, b'0', b'1'),
(5, 'anu', 'e2495e86108fb44afc12c05cd94ec491', 2, b'1', b'1'),
(6, 'Anjana', 'c8e680704ed6be3d0f05027ead694859', 3, b'0', b'1'),
(7, 'calm', '6e8e9f6b6a6f711f5149c9f9e1e41302', 4, b'1', b'1'),
(8, 'Ansy', '5a57cbc8e96e1f99f2c0b926f74dabf3', 3, b'0', b'1'),
(9, 'Ansu', '97a907ebc543793f16d18a50b7094ec3', 3, b'0', b'1'),
(10, 'Anjali', '5d50f0d55c24fe8687df7747e10f7c70', 3, b'0', b'1'),
(11, 'Maanas', '24cfd9a1f1f1eab457f4fcfc56877e32', 4, b'1', b'0'),
(12, 'Amalu', '68d5c9d92055e51f4259e9e8b9efc5f0', 4, b'0', b'0'),
(13, 'Manu', '1a715d422dbc1e399c325e68d667e37a', 4, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(5) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'customer'),
(3, 'employee'),
(4, 'service provider');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serviceproviders`
--

CREATE TABLE `tbl_serviceproviders` (
  `sp_id` int(5) NOT NULL,
  `sp_name` varchar(20) NOT NULL,
  `sp_address` varchar(50) NOT NULL,
  `sp_phone` varchar(25) NOT NULL,
  `sp_email` varchar(20) NOT NULL,
  `lisenceno` varchar(20) NOT NULL,
  `sc_id` int(5) NOT NULL,
  `district_id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `login_id` int(5) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_serviceproviders`
--

INSERT INTO `tbl_serviceproviders` (`sp_id`, `sp_name`, `sp_address`, `sp_phone`, `sp_email`, `lisenceno`, `sc_id`, `district_id`, `location_id`, `login_id`, `created_on`) VALUES
(1, 'Sanju a', 'zchZCHJ', '2147483647', 'sanju@gmail.com', 'ktr56', 1, 2, 2, 3, '2020-11-16 09:41:40'),
(2, 'Cali m', 'zchZCHJ', '2147483647', 'george@gmail.com', 'LK234', 1, 3, 3, 7, '2020-11-16 10:14:02'),
(3, 'Maanas Murali', 'Vadasseril', '7592953795', 'manas@gmail.com', 'KL234', 1, 2, 2, 11, '2020-11-18 07:11:36'),
(4, 'Amalu', 'Vadasseril', '9400804990', 'amalu@gmail.com', 'LK345', 2, 2, 3, 12, '2020-11-18 08:32:21'),
(5, 'Manu Sankar', 'Vadasseril', '9400804990', 'manu@gmail.com', 'LK56', 2, 1, 2, 13, '2020-11-18 16:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `sc_id` int(5) NOT NULL,
  `sc_name` varchar(30) NOT NULL,
  `is_delete` bit(1) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `img` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`sc_id`, `sc_name`, `is_delete`, `amount`, `img`) VALUES
(1, 'painter', b'1', '6000', '9.jpg'),
(2, 'Plumber', b'1', '4000', '8.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_availability`
--
ALTER TABLE `tbl_availability`
  ADD PRIMARY KEY (`availability_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_emp_ratedetails`
--
ALTER TABLE `tbl_emp_ratedetails`
  ADD PRIMARY KEY (`emp_rate_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_serviceproviders`
--
ALTER TABLE `tbl_serviceproviders`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`sc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `lid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_serviceproviders`
--
ALTER TABLE `tbl_serviceproviders`
  MODIFY `sp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `sc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
