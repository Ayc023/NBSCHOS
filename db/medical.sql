-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 01:43 PM
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
  `patient_id` int(11) NOT NULL,
  `drug_use` varchar(20) DEFAULT NULL,
  `drug_kind` varchar(100) DEFAULT NULL,
  `sexually_active` varchar(10) DEFAULT NULL,
  `sexual_partners_male` int(11) DEFAULT NULL,
  `sexual_partners_female` int(11) DEFAULT NULL,
  `sexual_partners_both` int(11) DEFAULT NULL,
  `allergy_food` tinyint(1) DEFAULT NULL,
  `allergy_drug` tinyint(1) DEFAULT NULL,
  `epilepsy` tinyint(1) DEFAULT NULL,
  `asthma` tinyint(1) DEFAULT NULL,
  `heart_disorder` tinyint(1) DEFAULT NULL,
  `thyroid_disease` tinyint(1) DEFAULT NULL,
  `skin_disorder` tinyint(1) DEFAULT NULL,
  `cancer` tinyint(1) DEFAULT NULL,
  `diabetes` tinyint(1) DEFAULT NULL,
  `ulcer` tinyint(1) DEFAULT NULL,
  `tuberculosis` tinyint(1) DEFAULT NULL,
  `coronary_disease` tinyint(1) DEFAULT NULL,
  `pcos` tinyint(1) DEFAULT NULL,
  `hypertension` tinyint(1) DEFAULT NULL,
  `psychological_disorder` tinyint(1) DEFAULT NULL,
  `hepatitis` tinyint(1) DEFAULT NULL,
  `diagnosis_1` varchar(255) DEFAULT NULL,
  `when_1` date DEFAULT NULL,
  `diagnosis_2` varchar(255) DEFAULT NULL,
  `when_2` date DEFAULT NULL,
  `operation_type_1` varchar(255) DEFAULT NULL,
  `when_surgery_1` date DEFAULT NULL,
  `operation_type_2` varchar(255) DEFAULT NULL,
  `when_surgery_2` date DEFAULT NULL,
  `disability_status` varchar(50) DEFAULT NULL,
  `disability_description` varchar(255) DEFAULT NULL,
  `donate_blood` varchar(10) DEFAULT NULL,
  `family_history_mother` text DEFAULT NULL,
  `family_history_father` text DEFAULT NULL,
  `newborn_immunizations` varchar(10) DEFAULT NULL,
  `hpv_doses` int(11) DEFAULT NULL,
  `tetanus_doses` int(11) DEFAULT NULL,
  `influenza_year` varchar(10) DEFAULT NULL,
  `pneumococcal_doses` int(11) DEFAULT NULL,
  `covid_vaccine_brand_1` varchar(100) DEFAULT NULL,
  `covid_vaccine_brand_2` varchar(100) DEFAULT NULL,
  `covid_booster_1` varchar(100) DEFAULT NULL,
  `covid_booster_2` varchar(100) DEFAULT NULL,
  `covid_unvaccinated_reason` text DEFAULT NULL,
  `basic_info_alcohol_frequency` varchar(20) DEFAULT NULL,
  `basic_info_alcohol_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`basic_info_id`, `basic_info_date`, `basic_info_firstname`, `basic_info_middlename`, `basic_info_lastname`, `basic_info_birthday`, `basic_info_sex`, `basic_info_age`, `basic_info_home_address`, `basic_college_course`, `basic_college_clinic_file_number`, `basic_contact_number`, `basic_religion`, `basic_occupation`, `basic_civil_status`, `basic_complete_name`, `basic_address`, `basic_contact`, `basic_relationship`, `basic_patient_id`, `basic_info_smoking`, `basic_info_smoking_pack_day`, `basic_info_smoking_years`, `basic_info_alcohol_drinking`, `basic_info_alcohol_drink_types`, `patient_id`, `drug_use`, `drug_kind`, `sexually_active`, `sexual_partners_male`, `sexual_partners_female`, `sexual_partners_both`, `allergy_food`, `allergy_drug`, `epilepsy`, `asthma`, `heart_disorder`, `thyroid_disease`, `skin_disorder`, `cancer`, `diabetes`, `ulcer`, `tuberculosis`, `coronary_disease`, `pcos`, `hypertension`, `psychological_disorder`, `hepatitis`, `diagnosis_1`, `when_1`, `diagnosis_2`, `when_2`, `operation_type_1`, `when_surgery_1`, `operation_type_2`, `when_surgery_2`, `disability_status`, `disability_description`, `donate_blood`, `family_history_mother`, `family_history_father`, `newborn_immunizations`, `hpv_doses`, `tetanus_doses`, `influenza_year`, `pneumococcal_doses`, `covid_vaccine_brand_1`, `covid_vaccine_brand_2`, `covid_booster_1`, `covid_booster_2`, `covid_unvaccinated_reason`, `basic_info_alcohol_frequency`, `basic_info_alcohol_details`) VALUES
(27, '2024-09-21', 'Emmanuel', 'Onahon', 'Ayco', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', '0', '321', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, NULL, NULL, NULL, NULL, NULL, 20211193, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2024-09-21', 'Emmanuel', 'Onahon', 'Ayco', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', '0', '321', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2024-09-23', 'EJ', 'Onahon', 'Ayco', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', '0', '321', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', 1, 3, '0', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2024-09-23', 'Emmanuel', 'Ayco', 'Onahon', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', 'Bachelor of Science in Information Technology', '321', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', 1, 3, 'Yes', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2024-10-04', 'EJ', 'Ayco', 'Onahon', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', 'Bachelor of Science in Information Technology', '564', '09750633725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', 1, 1, 'Yes', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2025-01-01', 'oscar', 'willy', 'chitoni', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', 'Bachelor of Science in Information Technology', '321', '09750633725', 'catholic', 'Student', 'Single', 'kani w. oscar', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'No', 0, 0, 'Yes', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2024-10-13', 'Emmanuel', 'Onah', 'Ayc', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', 'Bachelor of Science in Information Technology', '111', '09750637725', 'catholic', 'Student', 'Single', 'Emmanuel V. Ayco Sr.', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', 1, 1, 'Yes', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2024-10-04', 'Emmanuel', 'Ayco', 'Onahon', '2002-07-22', 'Male', 22, 'Lingi-on Manolo Fortich Bukidnon', 'Bachelor of Science in Information Technology', '111', '09750637725', 'catholic', 'Student', 'Single', 'kani w. oscar', 'Lingi-on Manolo Fortich Bukidnon', '09262660837', 'Father', NULL, 'Yes', 1, 1, 'Yes', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Table structure for table `medical_form`
--

CREATE TABLE `medical_form` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `college_clinic_file_number` varchar(255) NOT NULL,
  `college_course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age_sex` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `home_address` text NOT NULL,
  `religion` varchar(255) NOT NULL,
  `municipal_address` text NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `emergency_contact_name` varchar(255) NOT NULL,
  `emergency_contact_number` varchar(20) NOT NULL,
  `emergency_contact_address` text NOT NULL,
  `emergency_contact_relationship` varchar(255) NOT NULL,
  `smoking` varchar(255) NOT NULL,
  `alcohol_drinking` varchar(255) NOT NULL,
  `illegal_drug_use` varchar(255) NOT NULL,
  `sexually_active` varchar(255) NOT NULL,
  `allergy` text NOT NULL,
  `food` text NOT NULL,
  `drug` text NOT NULL,
  `epilepsy_seizure_disorder` text NOT NULL,
  `asthma` text NOT NULL,
  `congenital_heart_disorder` text NOT NULL,
  `thyroid_disease` text NOT NULL,
  `skin_disorder` text NOT NULL,
  `cancer` text NOT NULL,
  `diabetes_mellitus` text NOT NULL,
  `peptic_ulcer` text NOT NULL,
  `tuberculosis` text NOT NULL,
  `coronary_artery_disease` text NOT NULL,
  `pcos` text NOT NULL,
  `hepatitis` text NOT NULL,
  `hypertension_elevated_bp` text NOT NULL,
  `psychological_disorder` text NOT NULL,
  `hospital_admissions_diagnosis` text NOT NULL,
  `hospital_admissions_when` text NOT NULL,
  `past_surgical_history_operation_type` text NOT NULL,
  `past_surgical_history_when` text NOT NULL,
  `person_with_disability` text NOT NULL,
  `willing_to_donate_blood` varchar(255) NOT NULL,
  `family_history_mother_side` text NOT NULL,
  `family_history_father_side` text NOT NULL,
  `immunizations_completed_newborn_immunizations` varchar(255) NOT NULL,
  `immunizations_tetanus_toxoid` varchar(255) NOT NULL,
  `immunizations_influenza` varchar(255) NOT NULL,
  `immunizations_pneumococcal_vaccine` varchar(255) NOT NULL,
  `covid_19_brand_name_first_dose` varchar(255) NOT NULL,
  `covid_19_brand_name_second_dose` varchar(255) NOT NULL,
  `covid_19_brand_name_first_booster` varchar(255) NOT NULL,
  `covid_19_brand_name_second_booster` varchar(255) NOT NULL,
  `unvaccinated_with_covid_19_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_form`
--

INSERT INTO `medical_form` (`id`, `date`, `college_clinic_file_number`, `college_course`, `year`, `name`, `age_sex`, `birthday`, `home_address`, `religion`, `municipal_address`, `occupation`, `contact_number`, `civil_status`, `emergency_contact_name`, `emergency_contact_number`, `emergency_contact_address`, `emergency_contact_relationship`, `smoking`, `alcohol_drinking`, `illegal_drug_use`, `sexually_active`, `allergy`, `food`, `drug`, `epilepsy_seizure_disorder`, `asthma`, `congenital_heart_disorder`, `thyroid_disease`, `skin_disorder`, `cancer`, `diabetes_mellitus`, `peptic_ulcer`, `tuberculosis`, `coronary_artery_disease`, `pcos`, `hepatitis`, `hypertension_elevated_bp`, `psychological_disorder`, `hospital_admissions_diagnosis`, `hospital_admissions_when`, `past_surgical_history_operation_type`, `past_surgical_history_when`, `person_with_disability`, `willing_to_donate_blood`, `family_history_mother_side`, `family_history_father_side`, `immunizations_completed_newborn_immunizations`, `immunizations_tetanus_toxoid`, `immunizations_influenza`, `immunizations_pneumococcal_vaccine`, `covid_19_brand_name_first_dose`, `covid_19_brand_name_second_dose`, `covid_19_brand_name_first_booster`, `covid_19_brand_name_second_booster`, `unvaccinated_with_covid_19_reason`) VALUES
(1, '2024-10-04', '111', 'Bachelor of Science in Information Technology', '', 'Emmanuel O. Ayco Jr.', '22/Male', '2002-07-22', 'Zone-3 Lingi-on', 'catholic', 'Manolo Fortich Bukidnon', 'Student', '09750637725', 'Single', 'Emmanuel V. Ayco Sr.', '09262660837', 'Zone-3 Lingion Manolo Fortich Bukidnon', 'Father', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', '', '', 'N/A', 'N/A', '', '0', '0', '0', 'N/A', 'N/A', 'N/A', 'N/A', ''),
(2, '2024-09-21', '325', 'Bachelor of Science in Information Technology', '', 'Emmanuel O. Ayco Jr.', '22/Male', '2002-07-22', 'Zone-3 Lingi-on', 'catholic', 'Manolo Fortich Bukidnon', 'Student', '09750637725', 'Single', 'Emmanuel V. Ayco Sr.', '09262660837', 'Zone-3 Lingion Manolo Fortich Bukidnon', 'Father', '', '', '', '', '', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', '', '', 'N/A', 'N/A', '', '0', '0', '0', 'N/A', 'N/A', 'N/A', 'N/A', ''),
(3, '2024-09-23', '564', 'Bachelor of Science in Information Technology', '', 'Emmanuel O. Ayco Jr.', '22/Male', '2002-07-22', 'Zone-3 Lingi-on', 'catholic', 'Manolo Fortich Bukidnon', 'Student', '09750637725', 'Single', 'Emmanuel V. Ayco Sr.', '09262660837', 'Zone-3 Lingion Manolo Fortich Bukidnon', 'Father', 'Yes', 'Yes', 'No', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', '', '', 'N/A', 'N/A', '', '0', '0', '0', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(4, '2024-09-21', '321', 'Bachelor of Science in Information Technology', 'on', 'don don', '34/Male', '1990-10-13', 'Zone-3 Lingi-on', 'catholic', 'Manolo Fortich Bukidnon', 'Student', '09750637725', 'Single', 'Emmanuel V. Ayco Sr.', '09262660837', 'Zone-3 Lingion Manolo Fortich Bukidnon', 'Father', '', '', '', '', '', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', 'N/A', 'N/A', 'N/A', '', '', 'N/A', 'N/A', '', '0', '0', '0', 'N/A', 'N/A', 'N/A', 'N/A', 'asdasd'),
(5, '2024-10-04', '666', 'Bachelor of Science in Information Technology', '4th Year', 'Emman O. Ayco Jr.', '22/Male', '2002-07-22', 'Zone-3 Lingi-on', 'catholic', 'Manolo Fortich Bukidnon', 'Student', '09750637725', 'Single', 'Emmanuel V. Ayco Sr.', '09262660837', 'Zone-3 Lingion Manolo Fortich Bukidnon', 'Father', 'N/A', 'N/A', 'N/A', 'Yes, 1 (female)', '', 'on', '', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'N/A', 'N/A', 'N/A', 'N/A', 'on', 'on', 'N/A', 'N/A', 'on', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A');

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
(7, 'admin1', '$2y$10$Oa.RSGwdBjmuvCQMajtfre45q.hTHGT0Ifzp6nNRxwWleQQQY/8ba', '2024-09-12 08:42:08', 'admin', 1),
(8, 'Nurse', '$2y$10$eTglfT1r8WzRWNLBKXrX0ODb94I5OGch1TS1WOvYgR0/gBN7FNQBW', '2024-09-13 15:26:44', 'user', 0),
(9, 'Ayco', '$2y$10$vqWeY4yH0tvHcJRPoyPR..yutcojGLTyhPDzreJZnF0rXNdITo9uS', '2024-09-17 11:54:34', 'user', 3),
(10, 'Emman', '$2y$10$D.HEKTd5uNmk3L2Md.vcBunXMvKkHeyhacjj/OZhrNGMpDEJAvtIG', '2024-10-16 19:13:26', 'patient', 0);

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
-- Indexes for table `medical_form`
--
ALTER TABLE `medical_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_record`
--
ALTER TABLE `medicine_record`
  ADD PRIMARY KEY (`medicine_id`);

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
  MODIFY `basic_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
-- AUTO_INCREMENT for table `medical_form`
--
ALTER TABLE `medical_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine_record`
--
ALTER TABLE `medicine_record`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
