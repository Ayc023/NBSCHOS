<?php
session_start();

// Configuration
$db_host = 'localhost';
$db_username = 'u593341949_devHOS2024';
$db_password = 'NBSC-Clinic2024';
$db_name = ' u593341949_dev_nbsc_hosl';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $inputData = array_map('trim', $_POST);

    // Prepare SQL statement
    $sql = "INSERT INTO dental_records (
        date,
        surname,
        given_name,
        middle_name,
        address,
        course_year,
        sex,
        civil_status,
        age,
        tel_no,
        dob,
        allergy,
        medical_treatment,
        taking_drugs,
        special_diet,
        shortness_breath,
        complication_healing,
        general_health,
        pregnant,
        profuse_bleeding,
        major_operation,
        sweat_nights,
        heart_ailment,
        high_blood_pressure,
        diabetes,
        rheumatic_fever,
        lung_disease,
        liver_disease,
        signature
    ) VALUES (
        :date,
        :surname,
        :given_name,
        :middle_name,
        :address,
        :course_year,
        :sex,
        :civil_status,
        :age,
        :tel_no,
        :dob,
        :allergy,
        :medical_treatment,
        :taking_drugs,
        :special_diet,
        :shortness_breath,
        :complication_healing,
        :general_health,
        :pregnant,
        :profuse_bleeding,
        :major_operation,
        :sweat_nights,
        :heart_ailment,
        :high_blood_pressure,
        :diabetes,
        :rheumatic_fever,
        :lung_disease,
        :liver_disease,
        :signature
    )";

    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindValue(':date', date('Y-m-d')); // Current date
    $stmt->bindValue(':surname', $inputData['surname'] ?? '');
    $stmt->bindValue(':given_name', $inputData['given_name'] ?? '');
    $stmt->bindValue(':middle_name', $inputData['middle_name'] ?? '');
    $stmt->bindValue(':address', $inputData['address'] ?? '');
    $stmt->bindValue(':course_year', $inputData['course_year'] ?? '');
    $stmt->bindValue(':sex', $inputData['sex'] ?? '');
    $stmt->bindValue(':civil_status', $inputData['civil_status'] ?? '');
    $stmt->bindValue(':age', $inputData['age'] ?? '');
    $stmt->bindValue(':tel_no', $inputData['tel_no'] ?? '');
    $stmt->bindValue(':dob', value: $inputData['dob'] ?? '');
    $stmt->bindValue(':allergy', $inputData['allergy'] ?? '');
    $stmt->bindValue(':medical_treatment', $inputData['medical_treatment'] ?? '');
    $stmt->bindValue(':taking_drugs', $inputData['taking_drugs'] ?? '');
    $stmt->bindValue(':special_diet', $inputData['special_diet'] ?? '');
    $stmt->bindValue(':shortness_breath', $inputData['shortness_breath'] ?? '');
    $stmt->bindValue(':complication_healing', $inputData['complication_healing'] ?? '');
    $stmt->bindValue(':general_health', $inputData['general_health'] ?? '');
    $stmt->bindValue(':pregnant', $inputData['pregnant'] ?? '');
    $stmt->bindValue(':profuse_bleeding', $inputData['profuse_bleeding'] ?? '');
    $stmt->bindValue(':major_operation', $inputData['major_operation'] ?? '');
    $stmt ->bindValue(':sweat_nights', $inputData['sweat_nights'] ?? '');
    $stmt->bindValue(':heart_ailment', $inputData['heart_ailment'] ?? '');
    $stmt->bindValue(':high_blood_pressure', $inputData['high_blood_pressure'] ?? '');
    $stmt->bindValue(':diabetes', $inputData['diabetes'] ?? '');
    $stmt->bindValue(':rheumatic_fever', $inputData['rheumatic_fever'] ?? '');
    $stmt->bindValue(':lung_disease', $inputData['lung_disease'] ?? '');
    $stmt->bindValue(':liver_disease', $inputData['liver_disease'] ?? '');
    $stmt->bindValue(':signature', $inputData['signature'] ?? '');

    $stmt->execute();

    // Redirect back to the form
    header('Location:../add_dental_info.php');
    exit;
}
?>