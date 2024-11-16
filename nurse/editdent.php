<?php
require_once "../config.php";

// Initialize variables
$patient_id = isset($_GET['id']) ? trim($_GET['id']) : '';
$date = $surname = $given_name = $middle_name = $address = '';
$course_year = $sex = $civil_status = $age = $tel_no = $dob = '';
$allergy = $medical_treatment = $taking_drugs = $special_diet = '';
$shortness_breath = $complication_healing = $general_health = $pregnant = '';
$profuse_bleeding = $major_operation = $sweat_nights = $heart_ailment = '';
$high_blood_pressure = $diabetes = $rheumatic_fever = $lung_disease = '';
$liver_disease = $signature = '';

// Fetch patient data from the database
if ($patient_id) {
    $sql = "SELECT * FROM dental_records WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Assign fetched data to variables
            $date = $row['date'];
            $surname = $row['surname'];
            $given_name = $row['given_name'];
            $middle_name = $row['middle_name'];
            $address = $row['address'];
            $course_year = $row['course_year'];
            $sex = $row['sex'];
            $civil_status = $row['civil_status'];
            $age = $row['age'];
            $tel_no = $row['tel_no'];
            $dob = $row['dob'];
            $allergy = $row['allergy'];
            $medical_treatment = $row['medical_treatment'];
            $taking_drugs = $row['taking_drugs'];
            $special_diet = $row['special_diet'];
            $shortness_breath = $row['shortness_breath'];
            $complication_healing = $row['complication_healing'];
            $general_health = $row['general_health'];
            $pregnant = $row['pregnant'];
            $profuse_bleeding = $row['profuse_bleeding'];
            $major_operation = $row['major_operation'];
            $sweat_nights = $row['sweat_nights'];
            $heart_ailment = $row['heart_ailment'];
            $high_blood_pressure = $row['high_blood_pressure'];
            $diabetes = $row['diabetes'];
            $rheumatic_fever = $row['rheumatic_fever'];
            $lung_disease = $row['lung_disease'];
            $liver_disease = $row['liver_disease'];
            $signature = $row['signature'];
        } else {
            echo "No record found for the given ID.";
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement.";
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form data
    $date = trim($_POST['date']);
    $surname = trim($_POST['surname']);
    $given_name = trim($_POST['given_name']);
    $middle_name = trim($_POST['middle_name']);
    $address = trim($_POST['address']);
    $course_year = trim($_POST['course_year']);
    $sex = trim($_POST['sex']);
    $civil_status = trim($_POST['civil_status']);
    $age = trim($_POST['age']);
    $tel_no = trim($_POST['tel_no']);
    $dob = trim($_POST['dob']);
    $allergy = trim($_POST['allergy']);
    $medical_treatment = trim($_POST['medical_treatment']);
    $taking_drugs = trim($_POST['taking_drugs']);
    $special_diet = trim($_POST['special_diet']);
    $shortness_breath = trim($_POST['shortness_breath']);
    $complication_healing = trim($_POST['complication_healing']);
    $general_health = trim($_POST['general_health']);
    $pregnant = trim($_POST['pregnant']);
    $profuse_bleeding = trim($_POST['profuse_bleeding']);
    $major_operation = trim($_POST['major_operation']);
    $sweat_nights = trim($_POST['sweat_nights']);
    $heart_ailment = trim($_POST['heart _ailment']);
    $high_blood_pressure = trim($_POST['high_blood_pressure']);
    $diabetes = trim($_POST['diabetes']);
    $rheumatic_fever = trim($_POST['rheumatic_fever']);
    $lung_disease = trim($_POST['lung_disease']);
    $liver_disease = trim($_POST['liver_disease']);
    $signature = trim($_POST['signature']);

    // Prepare the SQL update statement
    $sql = "UPDATE dental_records SET 
    date = ?, 
    surname = ?, 
    given_name = ?, 
    middle_name = ?, 
    address = ?, 
    course_year = ?, 
    sex = ?, 
    civil_status = ?, 
    age = ?, 
    tel_no = ?, 
    dob = ?, 
    allergy = ?, 
    medical_treatment = ?, 
    taking_drugs = ?, 
    special_diet = ?, 
    shortness_breath = ?, 
    complication_healing = ?, 
    general_health = ?, 
    pregnant = ?, 
    profuse_bleeding = ?, 
    major_operation = ?, 
    sweat_nights = ?, 
    heart_ailment = ?, 
    high_blood_pressure = ?, 
    diabetes = ?, 
    rheumatic_fever = ?, 
    lung_disease = ?, 
    liver_disease = ?, 
    signature = ? 
    WHERE id = ?";

    
    if ($stmt = mysqli_prepare($link, $sql)) {
       
        $params = [
            $date,
            $surname,
            $given_name,
            $middle_name,
            $address,
            $course_year,
            $sex,
            $civil_status,
            $age,
            $tel_no,
            $dob,
            $allergy,
            $medical_treatment,
            $taking_drugs,
            $special_diet,
            $shortness_breath,
            $complication_healing,
            $general_health,
            $pregnant,
            $profuse_bleeding,
            $major_operation,
            $sweat_nights,
            $heart_ailment,
            $high_blood_pressure,
            $diabetes,
            $rheumatic_fever,
            $lung_disease,
            $liver_disease,
            $signature,
            $patient_id // Make sure to include the ID at the end
        ];

        // Create a dynamic type string based on the parameter types
        $typeString = str_repeat('s', count($params) - 1) . 'i'; // Assuming all are strings except the last one (ID as integer)

        // Bind the parameters
        if (mysqli_stmt_bind_param($stmt, $typeString, ...$params)) {
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo "Patient information updated successfully.";
                // Redirect to a confirmation page or back to the patient list
                header("Location:dental_record.php"); // Change this to your desired redirection
                exit;
            } else {
                echo "Error updating record: " . mysqli_error($link);
            }
        } else {
            echo "Error binding parameters."; 
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing update statement.";
    }
}

mysqli_close($link); // Close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Patient Information</h2>
    <form method="POST" action="">
        <div class="flex flex-wrap justify-between mb-4">
            <div class="w-full md:w-1/3 mb-4">
                <label class="block text-gray-700">Date:</label>
                <input type="text" class="border border-gray-300 p-2 w-full rounded" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
            </div>
            <div class="w-full md:w-1/3 mb-4">
                <label class="block text-gray-700">Surname:</label>
                <input type="text" class="border border-gray-300 p-2 w-full rounded" id="surname" name="surname" value="<?php echo htmlspecialchars($surname); ?>">
            </div>
            <div class="w-full md:w-1/3 mb-4">
                <label class="block text-gray-700">Given Name:</label>
                <input type="text" class="border border-gray-300 p-2 w-full rounded" id="given_name" name="given_name" value="<?php echo htmlspecialchars($given_name); ?>">
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Middle Name:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="middle_name" name="middle_name" value="<?php echo htmlspecialchars($middle_name); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Address:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Course/Year:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="course_year" name="course_year" value="<?php echo htmlspecialchars($course_year); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Sex:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="sex" name="sex" value="<?php echo htmlspecialchars($sex); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Civil Status:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="civil_status" name="civil_status" value="<?php echo htmlspecialchars($civil_status); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Age:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Telephone Number:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="tel_no" name="tel_no" value="<?php echo htmlspecialchars($tel_no); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Date of Birth:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Allergy:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="allergy" name="allergy" value="<?php echo htmlspecialchars($allergy); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Medical Treatment:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="medical_treatment" name="medical_treatment" value="<?php echo htmlspecialchars($medical_treatment); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Taking Drugs:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="taking_drugs" name="taking_drugs" value="<?php echo htmlspecialchars($taking_drugs); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Special Diet:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="special_diet" name="special_diet" value="<?php echo htmlspecialchars($special_diet); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Shortness of Breath:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="shortness_breath" name="shortness_breath" value="<?php echo htmlspecialchars($shortness_breath); ?>">
        </div>
        <div class=" mb-4">
            <label class="block text-gray-700">Complication Healing:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="complication_healing" name="complication_healing" value="<?php echo htmlspecialchars($complication_healing); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">General Health:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="general_health" name="general_health" value="<?php echo htmlspecialchars($general_health); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Pregnant:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="pregnant" name="pregnant" value="<?php echo htmlspecialchars($pregnant); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Profuse Bleeding:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="profuse_bleeding" name="profuse_bleeding" value="<?php echo htmlspecialchars($profuse_bleeding); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Major Operation:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="major_operation" name="major_operation" value="<?php echo htmlspecialchars($major_operation); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Sweat Nights:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="sweat_nights" name="sweat_nights" value="<?php echo htmlspecialchars($sweat_nights); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Heart Ailment:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="heart_ailment" name="heart_ailment" value="<?php echo htmlspecialchars($heart_ailment); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">High Blood Pressure:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="high_blood_pressure" name="high_blood_pressure" value="<?php echo htmlspecialchars($high_blood_pressure); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Diabetes:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="diabetes" name="diabetes" value="<?php echo htmlspecialchars($diabetes); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Rheumatic Fever:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="rheumatic_fever" name="rheumatic_fever" value="<?php echo htmlspecialchars($rheumatic_fever); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Lung Disease:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="lung_disease" name="lung_disease" value="<?php echo htmlspecialchars($lung_disease); ?>">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Liver Disease:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded" id="liver_disease" name="liver_disease" value="<?php echo htmlspecialchars($liver_disease); ?>">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Patient</button>
    </form>
</div>
</body>
</html>