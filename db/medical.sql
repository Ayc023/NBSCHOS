-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 04:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
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
  `basic_relationship` varchar(100) DEFAULT NULL,
  `basic_patient_id` int(11) DEFAULT NULL,
  `basic_info_smoking` varchar(255) DEFAULT NULL,
  `basic_info_smoking_pack_day` int(11) DEFAULT NULL,
  `basic_info_smoking_years` int(11) DEFAULT NULL,
  `basic_info_alcohol_drinking` varchar(255) DEFAULT NULL,
  `basic_info_alcohol_drink_types` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`basic_info_id`, `basic_info_date`, `basic_info_firstname`, `basic_info_middlename`, `basic_info_lastname`, `basic_info_birthday`, `basic_info_sex`, `basic_info_age`, `basic_info_home_address`, `basic_college_course`, `basic_college_clinic_file_number`, `basic_contact_number`, `basic_religion`, `basic_occupation`, `basic_civil_status`, `basic_complete_name`, `basic_address`, `basic_contact`, `basic_relationship`, `basic_patient_id`, `basic_info_smoking`, `basic_info_smoking_pack_day`, `basic_info_smoking_years`, `basic_info_alcohol_drinking`, `basic_info_alcohol_drink_types`, `patient_id`) VALUES
(27, '2024-09-21', 'Emmanuel', 'Onahon', 'Ayco', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', '0', '321', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, NULL, NULL, NULL, NULL, NULL, 20211193),
(29, '2024-09-21', 'Emmanuel', 'Onahon', 'Ayco', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', '0', '321', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', NULL, NULL, NULL, NULL, 0),
(30, '2024-09-23', 'EJ', 'Onahon', 'Ayco', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', '0', '321', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', 1, 3, '0', NULL, 0),
(31, '2024-09-23', 'Emmanuel', 'Ayco', 'Onahon', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', 'Bachelor of Science in Information Technology', '321', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', 1, 3, 'Yes', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dental`
--

CREATE TABLE `dental` (
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
  `dental_allergy_medication_food` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dental`
--

INSERT INTO `dental` (`dental_id`, `dental_type`, `dental_date`, `dental_name`, `dental_age`, `dental_address`, `dental_tel_no`, `dental_course_taken_year`, `dental_date_of_birth`, `dental_sex`, `dental_civil_status`, `dental_allergy_medication_food`) VALUES
(2, 'Student', '2024-09-12', 'Emmanuel Ayco', 22, 'Lingi-on Manolo Fortich Bukidnon', '09750637725', 'Bachelor of Science in Information Technology', '2002-07-22', 'Male', 'Single', 'Adobong Iro'),
(3, '', '2024-09-13', 'tetsir', 28, 'united states of america', '32145612341', 'Bachelor of Science in Information Technology', '1994-12-07', 'Female', 'Single', 'adobong iring');

-- --------------------------------------------------------

--
-- Table structure for table `follow_up_checkup`
--

CREATE TABLE `follow_up_checkup` (
  `id` int(11) NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `checkup_details` text DEFAULT NULL,
  `recommendations` text DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `patient_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow_up_checkup`
--

INSERT INTO `follow_up_checkup` (`id`, `follow_up_date`, `checkup_details`, `recommendations`, `patient_name`, `patient_address`) VALUES
(5, '2024-09-27', 'asdasd', 'wqeqweasd', 'Emmaneul', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_record`
--

CREATE TABLE `medicine_record` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `dosage` varchar(100) NOT NULL,
  `frequency` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_record`
--

INSERT INTO `medicine_record` (`medicine_id`, `medicine_name`, `dosage`, `frequency`, `start_date`, `end_date`) VALUES
(1, 'Paracetamol', '500mg', '3 times a day', '2024-01-10', '2024-01-20'),
(2, 'Amoxicillin', '250mg', '2 times a day', '2024-02-15', '2024-02-25'),
(3, 'Ibuprofen', '200mg', 'As needed', '2024-03-01', '2024-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

CREATE TABLE `patient_profile` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`, `is_admin`) VALUES
(1, 'adminuser', 'adminpassword', '2024-09-17 11:45:29', 'admin', 1),
(2, 'nurseuser', 'nursepassword', '2024-09-17 11:46:07', 'nurse', 0),
(3, 'patientuser', 'patientpassword', '2024-09-17 11:46:32', 'user', 3),
(6, 'admin', '*9A9A8DF73F6431CD3B43F2EE3309A01592D8ADFA', '2024-09-12 08:38:57', 'admin', 0),
(7, 'admin1', '$2y$10$Oa.RSGwdBjmuvCQMajtfre45q.hTHGT0Ifzp6nNRxwWleQQQY/8ba', '2024-09-12 08:42:08', 'admin', 1),
(8, 'Nurse', '$2y$10$eTglfT1r8WzRWNLBKXrX0ODb94I5OGch1TS1WOvYgR0/gBN7FNQBW', '2024-09-13 15:26:44', 'user', 0),
(9, 'Ayco', '$2y$10$vqWeY4yH0tvHcJRPoyPR..yutcojGLTyhPDzreJZnF0rXNdITo9uS', '2024-09-17 11:54:34', 'user', 3);

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
-- Indexes for table `follow_up_checkup`
--
ALTER TABLE `follow_up_checkup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_record`
--
ALTER TABLE `medicine_record`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patient_profile`
--
ALTER TABLE `patient_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `basic_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dental`
--
ALTER TABLE `dental`
  MODIFY `dental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow_up_checkup`
--
ALTER TABLE `follow_up_checkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine_record`
--
ALTER TABLE `medicine_record`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_profile`
--
ALTER TABLE `patient_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
