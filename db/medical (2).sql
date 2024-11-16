-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 10:34 AM
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
-- Table structure for table `dental_records`
--

CREATE TABLE `dental_records` (
  `date` date NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `given_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `course_year` varchar(100) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `tel_no` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `allergy` varchar(255) DEFAULT NULL,
  `medical_treatment` varchar(255) DEFAULT NULL,
  `taking_drugs` varchar(255) DEFAULT NULL,
  `special_diet` varchar(255) DEFAULT NULL,
  `shortness_breath` varchar(255) DEFAULT NULL,
  `complication_healing` varchar(255) DEFAULT NULL,
  `general_health` varchar(255) DEFAULT NULL,
  `pregnant` varchar(255) DEFAULT NULL,
  `profuse_bleeding` varchar(255) DEFAULT NULL,
  `major_operation` varchar(255) DEFAULT NULL,
  `sweat_nights` varchar(255) DEFAULT NULL,
  `heart_ailment` varchar(255) DEFAULT NULL,
  `high_blood_pressure` varchar(255) DEFAULT NULL,
  `diabetes` varchar(255) DEFAULT NULL,
  `rheumatic_fever` varchar(255) DEFAULT NULL,
  `lung_disease` varchar(255) DEFAULT NULL,
  `liver_disease` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dental_records`
--

INSERT INTO `dental_records` (`date`, `surname`, `given_name`, `middle_name`, `address`, `course_year`, `sex`, `civil_status`, `age`, `tel_no`, `dob`, `allergy`, `medical_treatment`, `taking_drugs`, `special_diet`, `shortness_breath`, `complication_healing`, `general_health`, `pregnant`, `profuse_bleeding`, `major_operation`, `sweat_nights`, `heart_ailment`, `high_blood_pressure`, `diabetes`, `rheumatic_fever`, `lung_disease`, `liver_disease`, `signature`, `id`) VALUES
('2024-10-17', 'asdasd', 'asdasd', 'asdasd', 'asdasdasd', 'asdasd', 'Male', 'Single', 22, '092423423324', '0000-00-00', 'asdasd', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '', 1),
('2024-10-17', 'Ayco', 'Eman', 'Onahon', 'Lingion', 'BSIT - 4th year', 'Males', 'Single', 22, '09123421312', '2002-07-22', 'asdasd', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '', 2);

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_manufactured` date DEFAULT NULL,
  `date_expiry` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `date_manufactured`, `date_expiry`, `quantity`) VALUES
(1, 'stethoscopes', '2024-10-19', '2025-04-30', 100);

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
(6, '2024-10-04', '564', 'Bachelor of Science in Information Technology', '4th Year', 'Emmanuel O. Ayco Jr.', '22/Male', '2002-07-22', 'Lingi-on Manolo Fortich Bukidnon', 'catholic', 'Manolo Fortich Bukidnon', 'Student', '09750637725', 'Single', 'Emmanuel V. Ayco Sr.', '09262660837', 'Zone-3 Lingion Manolo Fortich Bukidnon', 'Father', 'N/A', 'N/A', 'N/A', '1 (female)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', 'N/A', '', 'N/A', 'on', '', 'N/A', 'N/A', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(7, '2025-09-21', '564', 'Bachelor of Science in Information Technology', '4th Year', 'don dons', '34/Male', '1990-10-13', 'Zone-3 Lingi-on', 'catholic', 'Manolo Fortich Bukidnon', 'Student', '09750637725', 'Single', 'Emmanuel V. Ayco Sr.', '09262660837', 'Zone-3 Lingion Manolo Fortich Bukidnon', 'fafa', 'Yes', 'yes', 'No', 'Yes, 1 (female)', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', 'N/A', '', 'N/A', 'on', '', 'N/A', 'N/A', '', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A');

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
(8, 'Nurse', '$2y$10$eTglfT1r8WzRWNLBKXrX0ODb94I5OGch1TS1WOvYgR0/gBN7FNQBW', '2024-09-13 15:26:44', 'user', 2),
(9, 'Ayco', '$2y$10$vqWeY4yH0tvHcJRPoyPR..yutcojGLTyhPDzreJZnF0rXNdITo9uS', '2024-09-17 11:54:34', 'user', 3),
(10, 'Emman', '$2y$10$D.HEKTd5uNmk3L2Md.vcBunXMvKkHeyhacjj/OZhrNGMpDEJAvtIG', '2024-10-16 19:13:26', 'patient', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dental_records`
--
ALTER TABLE `dental_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_up_checkup`
--
ALTER TABLE `follow_up_checkup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT for table `dental_records`
--
ALTER TABLE `dental_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow_up_checkup`
--
ALTER TABLE `follow_up_checkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_form`
--
ALTER TABLE `medical_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
