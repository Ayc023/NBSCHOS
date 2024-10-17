<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost"; // Change if your database server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "medical"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $surname = htmlspecialchars($_POST['surname']);
    $given_name = htmlspecialchars($_POST['given_name']);
    $middle_name = htmlspecialchars($_POST['middle_name']);
    $address = htmlspecialchars($_POST['address']);
    $course_year = htmlspecialchars($_POST['course_year']);
    $sex = htmlspecialchars($_POST['sex']);
    $civil_status = htmlspecialchars($_POST['civil_status']);
    $age = htmlspecialchars($_POST['age']);
    $tel_no = htmlspecialchars($_POST['tel_no']);
    $dob = htmlspecialchars($_POST['dob']);
    $date = htmlspecialchars($_POST['date']);
    $allergy = htmlspecialchars($_POST['allergy']);
    $medical_treatment = isset($_POST['medical_treatment']) ? $_POST['medical_treatment'] : '';
    $allergic_food_medicine = isset($_POST['allergic_food_medicine']) ? $_POST['allergic_food_medicine'] : '';
    $taking_drugs = isset($_POST['taking_drugs']) ? $_POST['taking_drugs'] : '';
    $heart_ailment = isset($_POST['heart_ailment']) ? $_POST['heart_ailment'] : '';
    $high_blood_pressure = isset($_POST['high_blood_pressure']) ? $_POST['high_blood_pressure'] : '';
    $diabetes = isset($_POST['diabetes']) ? $_POST['diabetes'] : '';
    $rheumatic_fever = isset($_POST['rheumatic_fever']) ? $_POST['rheumatic_fever'] : '';
    $lung_disease = isset($_POST['lung_disease']) ? $_POST['lung_disease'] : '';
    $liver_disease = isset($_POST['liver_disease']) ? $_POST['liver_disease'] : '';
    $special_diet = isset($_POST['special_diet']) ? $_POST['special_diet'] : '';
    $shortness_breath = isset($_POST['shortness_breath']) ? $_POST['shortness_breath'] : '';
    $complication_healing = isset($_POST['complication_healing']) ? $_POST['complication_healing'] : '';
    $general_health = isset($_POST['general_health']) ? $_POST['general_health'] : '';
    $pregnant = isset($_POST['pregnant']) ? $_POST['pregnant'] : '';
    $profuse_bleeding = isset($_POST['profuse_bleeding']) ? $_POST['profuse_bleeding'] : '';
    $major_operation = isset($_POST['major_operation']) ? $_POST['major_operation'] : '';
    $sweat_nights = isset($_POST['sweat_nights']) ? $_POST['sweat_nights'] : '';
    $signature = htmlspecialchars($_POST['signature']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO dental_records (surname, given_name, middle_name, address, course_year, sex, civil_status, age, tel_no, dob, date, allergy, medical_treatment, allergic_food_medicine, taking_drugs, heart_ailment, high_blood_pressure, diabetes, rheumatic_fever, lung_disease, liver_disease, special_diet, shortness_breath, complication_healing, general_health, pregnant, profuse_bleeding, major_operation, sweat_nights, signature) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param(" ssssssssssssssssssssssssss", $surname, $given_name, $middle_name, $address, $course_year, $sex, $civil_status, $age, $tel_no, $dob, $date, $allergy, $medical_treatment, $allergic_food_medicine, $taking_drugs, $heart_ailment, $high_blood_pressure, $diabetes, $rheumatic_fever, $lung_disease, $liver_disease, $special_diet, $shortness_breath, $complication_healing, $general_health, $pregnant, $profuse_bleeding, $major_operation, $sweat_nights, $signature);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    echo "<h1>Form Submission Successful</h1>";
    echo "<h2>Submitted Data:</h2>";
    echo "<p><strong>Surname:</strong> $surname</p>";
    echo "<p><strong>Given Name:</strong> $given_name</p>";
    echo "<p><strong>Middle Name:</strong> $middle_name</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>Course Taken & Year:</strong> $course_year</p>";
    echo "<p><strong>Sex:</strong> $sex</p>";
    echo "<p><strong>Civil Status:</strong> $civil_status</p>";
    echo "<p><strong>Age:</strong> $age</p>";
    echo "<p><strong>Tel No:</strong> $tel_no</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>Date:</strong> $date</p>";
    echo "<p><strong>Allergy:</strong> $allergy</p>";
    echo "<p><strong>Medical Treatment:</strong> $medical_treatment</p>";
    echo "<p><strong>Allergic to Food/Medicine:</strong> $allergic_food_medicine</p>";
    echo "<p><strong>Taking Drugs:</strong> $taking_drugs</p>";
    echo "<p><strong>Heart Ailment:</strong> $heart_ailment</p>";
    echo "<p><strong>High Blood Pressure:</strong > $high_blood_pressure</p>";
    echo "<p><strong>Diabetes:</strong> $diabetes</p>";
    echo "<p><strong>Rheumatic Fever:</strong> $rheumatic_fever</p>";
    echo "<p><strong>Lung Disease:</strong> $lung_disease</p>";
    echo "<p><strong>Liver Disease:</strong> $liver_disease</p>";
    echo "<p><strong>Special Diet:</strong> $special_diet</p>";
    echo "<p><strong>Shortness of Breath:</strong> $shortness_breath</p>";
    echo "<p><strong>Complication with Healing:</strong> $complication_healing</p>";
    echo "<p><strong>General Health:</strong> $general_health</p>";
    echo "<p><strong>Pregnant:</strong> $pregnant</p>";
    echo "<p><strong>Profuse Bleeding:</strong> $profuse_bleeding</p>";
    echo "<p><strong>Major Operation:</strong> $major_operation</p>";
    echo "<p><strong>Sweat Nights:</strong> $sweat_nights</p>";
    echo "<p><strong>Signature:</strong> $signature</p>";
} else {
    echo "<h1>Error: Form not submitted</h1>";
}
?>