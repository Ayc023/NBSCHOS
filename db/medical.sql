-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 04:39 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE IF NOT EXISTS `basic_info` (
`basic_info_id` int(11) NOT NULL,
  `basic_info_date` date NOT NULL,
  `basic_info_firstname` varchar(255) NOT NULL,
  `basic_info_middlename` varchar(255) NOT NULL,
  `basic_info_lastname` varchar(255) NOT NULL,
  `basic_info_birthday` date DEFAULT NULL,
  `basic_info_sex` varchar(10) DEFAULT NULL,
  `basic_info_age` int(11) DEFAULT NULL,
  `basic_info_home_address` varchar(255) DEFAULT NULL,
  `basic_college_course` varchar(255) DEFAULT NULL,
  `basic_college_clinic_file_number` varchar(100) DEFAULT NULL,
  `basic_contact_number` varchar(15) DEFAULT NULL,
  `basic_religion` varchar(100) DEFAULT NULL,
  `basic_occupation` varchar(100) DEFAULT NULL,
  `basic_civil_status` varchar(50) DEFAULT NULL,
  `basic_complete_name` varchar(255) DEFAULT NULL,
  `basic_address` varchar(255) DEFAULT NULL,
  `basic_contact` varchar(50) DEFAULT NULL,
  `basic_relationship` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`basic_info_id`, `basic_info_date`, `basic_info_firstname`, `basic_info_middlename`, `basic_info_lastname`, `basic_info_birthday`, `basic_info_sex`, `basic_info_age`, `basic_info_home_address`, `basic_college_course`, `basic_college_clinic_file_number`, `basic_contact_number`, `basic_religion`, `basic_occupation`, `basic_civil_status`, `basic_complete_name`, `basic_address`, `basic_contact`, `basic_relationship`) VALUES
(11, '2024-09-03', 'dessy', 'Baingan', 'salvador', '2003-05-13', 'female', 16, 'new states philippines bukidnon', 'bsit', '201', '09750637725', 'catholic', 'student', 'single', 'fafa', 'new states philippines bukidnon', '4123123123', 'fafa'),
(16, '2024-09-06', 'Daniel', 'Catubay', 'Susana', '2003-03-03', 'Male', 21, 'new states philippines bukidnon', 'Bachelor of Science in Information Technology', '123', '09317163312', 'baptist', 'Student', 'single', NULL, NULL, NULL, NULL),
(17, '2024-09-07', 'Jefferson', 'palaca', 'lague', '2002-12-15', 'Male', 22, 'new states philippines bukidnon', 'Bachelor of Science in Information Technology', '2012', '23123123123', 'roman catholic', 'student', 'single', NULL, NULL, NULL, NULL),
(20, '2024-09-06', 'Emmanuel', 'Onahon', 'Ayco', '2002-07-22', 'Male', 22, 'Zone 3 Lingi-on, Manolo Fortich Bukidnon', '0', '201', '09750637725', 'roman catholic', 'Student', 'single', 'fafa', 'new states philippines bukidnon', '4123123123', 'fafa'),
(21, '2024-09-12', 'Emmanuel', 'Onahon', 'Ayco', '2002-07-22', 'Male', 22, 'Zone 3 Lingi-on, Manolo Fortich Bukidnon', '0', '201', '09750637725', 'Catholic', 'Student', 'single', 'fafa', 'new states philippines bukidnon', '4123123123', 'fafa');

-- --------------------------------------------------------

--
-- Table structure for table `dental`
--

CREATE TABLE IF NOT EXISTS `dental` (
`dental_id` int(11) NOT NULL,
  `dental_type` enum('Non-Teaching','Teaching','Student') NOT NULL,
  `dental_date` date NOT NULL,
  `dental_name` varchar(255) NOT NULL,
  `dental_age` int(11) DEFAULT NULL,
  `dental_address` varchar(255) DEFAULT NULL,
  `dental_tel_no` varchar(15) DEFAULT NULL,
  `dental_course_taken_year` varchar(255) DEFAULT NULL,
  `dental_date_of_birth` date DEFAULT NULL,
  `dental_sex` enum('Male','Female','Other') DEFAULT NULL,
  `dental_civil_status` enum('Single','Married','Divorced','Widowed','Other') DEFAULT NULL,
  `dental_allergy_medication_food` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dental`
--

INSERT INTO `dental` (`dental_id`, `dental_type`, `dental_date`, `dental_name`, `dental_age`, `dental_address`, `dental_tel_no`, `dental_course_taken_year`, `dental_date_of_birth`, `dental_sex`, `dental_civil_status`, `dental_allergy_medication_food`) VALUES
(2, 'Student', '2024-09-12', 'Emmanuel Ayco', 22, 'Lingi-on Manolo Fortich Bukidnon', '09750637725', 'Bachelor of Science in Information Technology', '2002-07-22', 'Male', 'Single', 'Adobong Iro'),
(3, '', '2024-09-13', 'tetsir', 28, 'united states of america', '32145612341', 'Bachelor of Science in Information Technology', '1994-12-07', 'Female', 'Single', 'adobong iring');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`, `is_admin`) VALUES
(6, 'admin', '*9A9A8DF73F6431CD3B43F2EE3309A01592D8ADFA', '2024-09-12 08:38:57', 'admin', 0),
(7, 'admin1', '$2y$10$Oa.RSGwdBjmuvCQMajtfre45q.hTHGT0Ifzp6nNRxwWleQQQY/8ba', '2024-09-12 08:42:08', 'admin', 1),
(8, 'Nurse', '$2y$10$eTglfT1r8WzRWNLBKXrX0ODb94I5OGch1TS1WOvYgR0/gBN7FNQBW', '2024-09-13 15:26:44', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
 ADD PRIMARY KEY (`basic_info_id`);

--
-- Indexes for table `dental`
--
ALTER TABLE `dental`
 ADD PRIMARY KEY (`dental_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
MODIFY `basic_info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
MODIFY `dental_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
