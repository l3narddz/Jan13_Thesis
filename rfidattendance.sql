-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 05:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfidattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$89uX3LBy4mlU/DcBveQ1l.32nSianDP/E1MfUh.Z.6B4Z0ql3y7PK');

-- --------------------------------------------------------

--
-- Table structure for table `appointedsection`
--

CREATE TABLE `appointedsection` (
  `appointmentId` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointedsection`
--

INSERT INTO `appointedsection` (`appointmentId`, `sectionID`) VALUES
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 2),
(40, 1),
(41, 2),
(42, 5),
(43, 5),
(44, 4),
(45, 4),
(46, 5),
(47, 5),
(48, 5),
(49, 4),
(50, 5),
(51, 4),
(52, 2),
(53, 4),
(54, 4),
(55, 4),
(56, 2),
(57, 5);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_tbl`
--

CREATE TABLE `appointment_tbl` (
  `appointmentID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `reason` text NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_tbl`
--

INSERT INTO `appointment_tbl` (`appointmentID`, `name`, `email`, `date`, `timeStart`, `timeEnd`, `reason`, `isActive`) VALUES
(35, 'wqewqewq', 'sanjose.072777@alabang.sti.edu.ph', '2022-12-10', '838:59:59', '00:00:00', 'qwerty', 1),
(37, 'AVR for BA Proj', 'sanjose.072777@alabang.sti.edu.ph', '2022-12-10', '17:16:00', '00:00:00', 'Thi day ', 0),
(49, 'asdasdas', 'johnlienard.diaz@gmail.com', '2023-01-13', '18:14:00', '18:14:00', '', 1),
(50, 'asdasdasd1da', 'johnlienard.diaz@gmail.com', '2023-01-13', '18:18:00', '18:17:00', 'asdasd', 1),
(51, 'alien', 'johnlienard.diaz@gmail.com', '2023-02-01', '21:15:00', '09:18:00', '', 1),
(52, 'asdasdas', 'johnlienard.diaz@gmail.com', '2023-01-16', '21:19:00', '21:20:00', 'asdasd', 1),
(53, 'asdasdqqwe', 'johnlienard.diaz@gmail.com', '2023-01-27', '18:17:00', '18:15:00', 'asdas', 1),
(54, 'lienardtuleg', 'johnlienardd@gmail.com', '2023-01-20', '23:19:00', '18:20:00', 'class', 1),
(56, 'l3nard11', 'lienarddiax@gmail.com', '2023-01-13', '10:22:00', '22:22:00', 'asdas', 1),
(57, 'lienard diaz', 'johnlienardd@gmail.com', '2023-01-13', '10:51:00', '22:52:00', 'asdas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `device_uid` text NOT NULL,
  `device_date` date NOT NULL,
  `device_mode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_name`, `device_dep`, `device_uid`, `device_date`, `device_mode`) VALUES
(1, 'LAPTOP-ADMIN', 'AVR', '1ee77e62596b1010', '2022-12-02', 0),
(2, 'COMPUTER', '12312312', '93ab51b9cc38ffa8', '2023-01-10', 1),
(3, 'ad', '123', 'aee62d2219588adf', '2023-01-12', 0),
(4, '123', '123', '1032c4692e9a1086', '2023-01-13', 0),
(5, 'hatdog', 'hatsofd', '08149bb13f36eaaa', '2023-01-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_tbl`
--

CREATE TABLE `org_tbl` (
  `orgID` int(11) NOT NULL,
  `orgName` varchar(50) NOT NULL,
  `orgCapacity` int(11) NOT NULL,
  `sectionName` varchar(50) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_tbl`
--

INSERT INTO `org_tbl` (`orgID`, `orgName`, `orgCapacity`, `sectionName`, `isActive`) VALUES
(4, 'asdasd', 23, 'BSIT511', 1),
(5, 'Computer Society', 40, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schoolyr_tbl`
--

CREATE TABLE `schoolyr_tbl` (
  `schoolyear_ID` int(11) NOT NULL,
  `term` varchar(50) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `sectionID` int(11) NOT NULL,
  `schoolyrID` int(11) NOT NULL,
  `sectionName` varchar(50) NOT NULL,
  `numberOfstudents` int(11) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`sectionID`, `schoolyrID`, `sectionName`, `numberOfstudents`, `isActive`) VALUES
(5, 0, 'BSIT211', 35, 0),
(6, 0, 'BSIT811', 0, 0),
(8, 0, 'BSIT212', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT 'None',
  `serialnumber` double NOT NULL DEFAULT 0,
  `sectionName` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'None',
  `email` varchar(50) NOT NULL DEFAULT 'None',
  `card_uid` varchar(30) NOT NULL,
  `card_select` tinyint(1) NOT NULL DEFAULT 0,
  `user_date` date NOT NULL,
  `device_uid` varchar(20) NOT NULL DEFAULT '0',
  `device_dep` varchar(20) NOT NULL DEFAULT '0',
  `add_card` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `serialnumber`, `sectionName`, `gender`, `email`, `card_uid`, `card_select`, `user_date`, `device_uid`, `device_dep`, `add_card`) VALUES
(11, 'abdc', 2132131, '', 'Male', 'lienard@gmail.com', '8214545239', 0, '2023-01-10', '1ee77e62596b1010', 'AVR', 1),
(12, 'hattdog', 21312312, 'None', 'Male', 'lienar@gmail.com', '1838219045', 0, '2023-01-13', '1ee77e62596b1010', 'AVR', 1),
(13, 'None', 0, '', 'None', 'None', '13115513425', 0, '2023-01-13', '08149bb13f36eaaa', 'hatsofd', 0),
(14, 'None', 0, '', 'None', 'None', '155181243118', 1, '2023-01-13', '08149bb13f36eaaa', 'hatsofd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `serialnumber` double NOT NULL,
  `card_uid` varchar(30) NOT NULL,
  `device_uid` varchar(20) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `checkindate` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `card_out` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_logs`
--

INSERT INTO `users_logs` (`id`, `username`, `serialnumber`, `card_uid`, `device_uid`, `device_dep`, `checkindate`, `timein`, `timeout`, `card_out`) VALUES
(1, 'Aris', 199999999, '9110325336', '1ee77e62596b1010', 'AVR', '2022-12-02', '07:09:37', '13:11:07', 1),
(2, 'Aris', 199999999, '9110325336', '1ee77e62596b1010', 'AVR', '2022-12-02', '13:12:54', '13:13:07', 1),
(3, 'Joshuel', 19999231299, '8214545239', '1ee77e62596b1010', 'AVR', '2022-12-02', '13:19:33', '13:20:25', 1),
(4, 'Aris', 199999999, '9110325336', '1ee77e62596b1010', 'AVR', '2022-12-02', '13:19:57', '13:20:15', 1),
(5, 'Joshuel', 19999231299, '8214545239', '1ee77e62596b1010', 'AVR', '2022-12-02', '13:36:26', '13:36:36', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_tbl`
--
ALTER TABLE `org_tbl`
  ADD PRIMARY KEY (`orgID`);

--
-- Indexes for table `schoolyr_tbl`
--
ALTER TABLE `schoolyr_tbl`
  ADD PRIMARY KEY (`schoolyear_ID`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `org_tbl`
--
ALTER TABLE `org_tbl`
  MODIFY `orgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schoolyr_tbl`
--
ALTER TABLE `schoolyr_tbl`
  MODIFY `schoolyear_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `sectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
