-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 07:56 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`id`, `email`, `key`, `expDate`) VALUES
(7, 'amalu@gmail.com', '627cb534071479c147415d0bf082a0f5', '2021-04-17 21:15:19'),
(8, 'amalu@gmail.com', '627cb534071479c147415d0bf082a0f5', '2021-04-17 21:15:25'),
(9, 'amalu@gmail.com', '627cb534071479c147415d0bf082a0f5', '2021-04-17 21:15:31'),
(10, 'amalu@gmail.com', '627cb534071479c147415d0bf082a0f5', '2021-04-17 21:15:36'),
(11, 'amalu@gmail.com', '627cb534071479c147415d0bf082a0f5', '2021-04-17 21:15:42');

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
  `customer_id` int(5) NOT NULL,
  `booked_on` date NOT NULL,
  `end` date NOT NULL,
  `servicecompleted` int(10) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `sc_id` int(10) NOT NULL,
  `service_id` int(5) NOT NULL,
  `aproval_status` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `customer_id`, `booked_on`, `end`, `servicecompleted`, `employee_id`, `sc_id`, `service_id`, `aproval_status`, `status`) VALUES
(1, 1, '2021-06-04', '0000-00-00', 0, 4, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancel`
--

CREATE TABLE `tbl_cancel` (
  `cancel_id` int(10) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `Reason` text NOT NULL
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
(1, 'Aleena Theresa', 'Vadasseril (h) Nariyanani P.O', '7592953795', 'aleenatgv@gmail.com', 1, 1, 2, '2021-01-28 19:28:20'),
(2, 'Ancy George', 'Vadasseril', '7592953795', 'ancy@gmail.com', 1, 1, 8, '2021-01-29 05:07:18'),
(3, 'George VL', 'Vadasseril (h) Nariyanani P.O', '7592953795', 'georgetg@gmail.com', 1, 2, 10, '2021-04-23 05:26:45');

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
(2, 'Pathanamthitta', b'1'),
(3, ' Kozhikode', b'1'),
(4, 'Kollam', b'1'),
(5, 'Kannur', b'1'),
(6, 'Alappuzha', b'1'),
(7, 'Kottaya', b'0'),
(8, 'Kottay', b'0'),
(9, 'Thiruvananthapuram', b'1');

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
  `created_on` datetime NOT NULL,
  `sc_id` int(5) NOT NULL,
  `service_id` int(10) NOT NULL,
  `is_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `employee_name`, `employee_address`, `employee_phone`, `employee_email`, `location_id`, `login_id`, `created_on`, `sc_id`, `service_id`, `is_available`) VALUES
(1, 'Amalu Elizabeth', 'Vadasseril', '7585452532', 'aleenatgv@gmail.com', 1, 4, '2021-01-28 19:31:15', 2, 2, 1),
(2, 'Sanju s', 'Vadasseril (h) Nariyanani P.O', '9400804990', 'anila@gmail.com', 4, 9, '2021-04-17 18:15:00', 1, 1, 0),
(3, 'Anju A', 'Vadasseril (h) Nariyanani P.O', '7592953795', 'aleenatm@gmail.com', 2, 12, '2021-06-03 10:35:45', 2, 2, 1),
(4, 'Chippy c', 'Vadasseril (h) Nariyanani P.O', '7592953795', 'chippy@gmail.com', 4, 13, '2021-06-03 10:36:43', 1, 1, 0);

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
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `leave_id` int(5) NOT NULL,
  `leave_start_date` date NOT NULL,
  `employee_id` int(5) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `leave_end_date` date NOT NULL
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
(1, 'Ponkunnam', 1, b'1'),
(2, 'mannarakayam', 1, b'1'),
(3, 'kanjirappally', 1, b'0'),
(4, 'ranni', 2, b'1'),
(5, 'kunnamangalam', 3, b'1'),
(6, ' kunnnamangalam', 3, b'1'),
(7, 'kodenchery', 3, b'1'),
(8, 'Alappad', 4, b'1'),
(9, 'ponkunn', 1, b'0'),
(10, 'kannjirappally', 1, b'1'),
(11, 'Mundakauam', 1, b'1'),
(12, 'Neendakara', 4, b'1'),
(13, 'Payyannur', 5, b'1'),
(14, 'Thathampally', 6, b'1'),
(15, 'Palayam', 9, b'1');

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
(2, 'Aleena', '95b5d776ebb1ca4e073ca1778cdcda88', 2, b'1', b'1'),
(3, 'Sanal', 'b41236438084a9818da500b05e91eb7c', 4, b'1', b'1'),
(4, 'Amalu', '68d5c9d92055e51f4259e9e8b9efc5f0', 3, b'1', b'1'),
(5, 'Sanju', 'b5dfda0b18d06f1b6ad26cddd0e475e4', 4, b'0', b'1'),
(6, 'manu', '1a715d422dbc1e399c325e68d667e37a', 4, b'1', b'1'),
(7, 'Manas', 'a9efb0d334d8c4240d094bf2460b10ff', 4, b'1', b'1'),
(8, 'Ancy', '223434a15b188c269aece094f04c7d69', 2, b'1', b'1'),
(9, 'Sanjus', 'b5dfda0b18d06f1b6ad26cddd0e475e4', 3, b'1', b'1'),
(10, 'George', '10992b699c898d4d59f5e782323116f6', 2, b'1', b'1'),
(11, 'George V', '10992b699c898d4d59f5e782323116f6', 4, b'1', b'1'),
(12, 'Anju', '401e223e64ea13ffd35f44eda988b521', 3, b'0', b'1'),
(13, 'chippy', '297435c2691c3e419052939866c6729d', 3, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `booking_id` int(5) NOT NULL,
  `employee_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `stars`, `customer_id`, `booking_id`, `employee_id`) VALUES
(1, 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `report_id` int(5) NOT NULL,
  `report` longtext NOT NULL,
  `sp_id` int(5) NOT NULL,
  `wdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`report_id`, `report`, `sp_id`, `wdate`) VALUES
(1, 'hghasg jahs agshgaf', 4, '2021-06-02'),
(2, '', 3, '2021-06-03'),
(3, '', 3, '2021-06-03');

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
(1, 'Sanal Mathew', 'Manimala', '9400804990', 'sanal@gmail.com', 'Lk245', 2, 1, 1, 3, '2021-01-28 19:29:50'),
(2, 'Sanju m', 'Manimala', '7856234586', 'sanju@gmail.com', 'Lcft45', 2, 1, 1, 5, '2021-01-28 19:33:42'),
(3, 'Manu Sankar', 'Manimala', '7585452532', 'manu@gmail.com', 'LK234', 1, 1, 2, 6, '2021-01-28 19:37:00'),
(4, 'Manas Sankar', 'Manimala', '7856234586', 'aleenatgv@gmail.com', 'EC456', 2, 1, 1, 7, '2021-01-28 19:38:13'),
(5, 'George VM', 'Vadasseril (h) Nariyanani P.O', '7592953795', 'george@gmail.com', 'LK235', 1, 3, 6, 11, '2021-04-23 05:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `service_id` int(5) NOT NULL,
  `service_name` varchar(20) NOT NULL,
  `service_amt` int(10) NOT NULL,
  `service_img` varchar(15) NOT NULL,
  `sc_id` int(10) NOT NULL,
  `is_delete` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `service_name`, `service_amt`, `service_img`, `sc_id`, `is_delete`) VALUES
(1, 'painter', 800, '9.jpg', 1, 1),
(2, 'Tapping Farmer', 500, '5.jpg', 2, 1),
(3, 'cleaner', 200, '3.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_category`
--

CREATE TABLE `tbl_service_category` (
  `sc_id` int(5) NOT NULL,
  `sc_name` varchar(30) NOT NULL,
  `is_delete` bit(1) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `img` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_category`
--

INSERT INTO `tbl_service_category` (`sc_id`, `sc_name`, `is_delete`, `amount`, `img`) VALUES
(1, 'Construction', b'1', '4000', 'pexels-photo-1236701.jpeg'),
(2, 'Farming', b'1', '8000', '2.jpg'),
(3, 'Home', b'1', '6000', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_slot`
--

CREATE TABLE `tbl_time_slot` (
  `time_period_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `booking_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  ADD PRIMARY KEY (`cancel_id`);

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
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`leave_id`);

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
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`report_id`);

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
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
  ADD PRIMARY KEY (`time_period_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  MODIFY `cancel_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `leave_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `lid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `report_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  MODIFY `sc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
  MODIFY `time_period_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
