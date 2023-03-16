-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 04:56 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almai_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni`
--

CREATE TABLE `tbl_alumni` (
  `alumni_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `alumni_fname` varchar(150) NOT NULL DEFAULT '0',
  `alumni_mname` varchar(150) NOT NULL DEFAULT '0',
  `alumni_lname` varchar(150) NOT NULL DEFAULT '0',
  `alumni_contact` varchar(15) NOT NULL DEFAULT '0',
  `alumni_address` varchar(15) NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL DEFAULT '0',
  `work_employer` varchar(255) NOT NULL DEFAULT '0',
  `work_place` varchar(255) NOT NULL DEFAULT '0',
  `work_designation` varchar(255) NOT NULL DEFAULT '0',
  `alumni_graduation` date NOT NULL DEFAULT '0000-00-00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(150) NOT NULL DEFAULT '0',
  `course_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`course_id`, `course_name`, `course_status`, `created_at`, `updated_at`) VALUES
(1, 'BSIS', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
(2, 'BSIT', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employer`
--

CREATE TABLE `tbl_employer` (
  `employer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `employer_name` varchar(255) DEFAULT NULL,
  `employer_foundation` date DEFAULT NULL,
  `employer_address` varchar(255) DEFAULT NULL,
  `employer_contact` varchar(255) DEFAULT NULL,
  `employer_industry` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_category` varchar(1) NOT NULL COMMENT 'A=Admin,E=Employer,S=Student/Alumni',
  `user_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_category`, `user_status`, `created_at`, `update_at`) VALUES
(1, 'Techer 2 asdasd asdasd', 'teacher1@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'S', 1, '2023-03-16 23:55:58', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD PRIMARY KEY (`alumni_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  ADD PRIMARY KEY (`employer_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
