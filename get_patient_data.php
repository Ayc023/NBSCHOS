<?php
// get_patient_info.php

require_once 'config.php';  // Database connection

try {
    // Check if patient ID is provided via POST
    if (isset($_POST['basic_info_id'])) {
        $patient_id = filter_input(INPUT_POST, 'basic_info_id', FILTER_SANITIZE_NUMBER_INT);  // Sanitize patient ID

        // Prepare the query to fetch patient data
        $query = "SELECT basic_info_id, basic_info_firstname, basic_info_middlename, basic_info_lastname, basic_info_birthday, basic_info_sex, basic_info_age, basic_info_home_address, basic_college_course, basic_college_clinic_file_number, basic_contact_number, basic_religion, basic_occupation, basic_civil_status, basic_complete_name, basic_address, basic_contact, basic_relationship, basic_info_smoking, basic_info_smoking_pack_day, basic_info_smoking_years, basic_info_alcohol_drinking FROM basic_info WHERE basic_patient_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$patient_id]);

        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($patient) {
            // Return patient data as JSON
            echo json_encode($patient);
        } else {
            // Return an error if no patient is found
            echo json_encode(['error' => 'No patient found']);
        }
    } else {
        echo json_encode(['error' => 'No patient ID provided']);
    }
} catch (Exception $e) {
    // Handle potential errors
    echo json_encode(['error' => 'An error occurred: ' . $e->getMessage()]);
}
?>
