<?php
require_once "../config.php";

// Initialize variables
$patient_id = isset($_GET['id']) ? trim($_GET['id']) : '';
$date = $college_clinic_file_number = $college_course = $year = '';
$name = $age_sex = $birthday = $home_address = $religion = $municipal_address = $occupation = $contact_number = $civil_status = '';
$emergency_contact_name = $emergency_contact_number = $emergency_contact_address = $emergency_contact_relationship = '';
$smoking = $alcohol_drinking = $illegal_drug_use = $sexually_active = $allergy = '';
$epilepsy_seizure_disorder = $asthma = $congenital_heart_disorder = $thyroid_disease = $skin_disorder = '';
$cancer = $diabetes_mellitus = $peptic_ulcer = $tuberculosis = $coronary_artery_disease = '';
$pcos = $hepatitis = $hypertension_elevated_bp = $psychological_disorder = '';
$hospital_admissions_diagnosis = $hospital_admissions_when = $past_surgical_history_operation_type = $past_surgical_history_when = '';
$person_with_disability = $willing_to_donate_blood = '';
$family_history_mother_side = $family_history_father_side = '';
$immunizations_completed_newborn_immunizations = $immunizations_tetanus_toxoid = $immunizations_influenza = $immunizations_pneumococcal_vaccine = '';
$covid_19_brand_name_first_dose = $covid_19_brand_name_second_dose = $covid_19_brand_name_first_booster = $covid_19_brand_name_second_booster = '';
$unvaccinated_with_covid_19_reason = '';

// Fetch patient data from the database
if ($patient_id) {
    $sql = "SELECT * FROM medical_form WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Assign fetched data to variables
            $date = $row['date'];
            $college_clinic_file_number = $row['college_clinic_file_number'];
            $college_course = $row['college_course'];
            $year = $row['year'];
            $name = $row['name'];
            $age_sex = $row['age_sex'];
            $birthday = $row['birthday'];
            $home_address = $row['home_address'];
            $religion = $row['religion'];
            $municipal_address = $row['municipal_address'];
            $occupation = $row['occupation'];
            $contact_number = $row['contact_number'];
            $civil_status = $row['civil_status'];
            $emergency_contact_name = $row['emergency_contact_name'];
            $emergency_contact_number = $row['emergency_contact_number'];
            $emergency_contact_address = $row['emergency_contact_address'];
            $emergency_contact_relationship = $row['emergency_contact_relationship'];
            $smoking = $row['smoking'];
            $alcohol_drinking = $row['alcohol_drinking'];
            $illegal_drug_use = $row['illegal_drug_use'];
            $sexually_active = $row['sexually_active'];
            $allergy = $row['allergy'];
            $epilepsy_seizure_disorder = $row['epilepsy_seizure_disorder'];
            $asthma = $row['asthma'];
            $congenital_heart_disorder = $row['congenital_heart_disorder'];
            $thyroid_disease = $row['thyroid_disease'];
            $skin_disorder = $row['skin_disorder'];
            $cancer = $row['cancer'];
            $diabetes_mellitus = $row['diabetes_mellitus'];
            $peptic_ulcer = $row['peptic_ulcer'];
            $tuberculosis = $row['tuberculosis'];
            $coronary_artery_disease = $row['coronary_artery_disease'];
            $pcos = $row['pcos'];
            $hepatitis = $row['hepatitis'];
            $hypertension_elevated_bp = $row['hypertension_elevated_bp'];
            $psychological_disorder = $row['psychological_disorder'];
            $hospital_admissions_diagnosis = $row['hospital_admissions_diagnosis'];
            $hospital_admissions_when = $row['hospital_admissions_when'];
            $past_surgical_history_operation_type = $row['past_surgical_history_operation_type'];
            $past_surgical_history_when = $row['past_surgical_history_when'];
            $person_with_disability = $row['person_with_disability'];
            $willing_to_donate_blood = $row['willing_to_donate_blood'];
            $family_history_mother_side = $row['family_history_mother_side'];
            $family_history_father_side = $row['family_history_father_side'];
            $immunizations_completed_newborn_immunizations = $row['immunizations_completed_newborn_immunizations'];
            $immunizations_tetanus_toxoid = $row['immunizations_tetanus_toxoid'];
            $immunizations_influenza = $row['immunizations_influenza'];
            $immunizations_pneumococcal_vaccine = $row['immunizations_pneumococcal_vaccine'];
            $covid_19_brand_name_first_dose = $row['covid_19_brand_name_first_dose'];
            $covid_19_brand_name_second_dose = $row['covid_19_brand_name_second_dose'];
            $covid_19_brand_name_first_booster = $row['covid_19_brand_name_first_booster'];
            $covid_19_brand_name_second_booster = $row['covid_19_brand_name_second_booster'];
            $unvaccinated_with_covid_19_reason = $row['unvaccinated_with_covid_19_reason'];
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
    $college_clinic_file_number = trim($_POST['college_clinic_file_number']);
    $college_course = trim($_POST['college_course']);
    $year = trim($_POST['year']);
    $name = trim($_POST['name']);
    $age_sex = trim($_POST['age_sex']);
    $birthday = trim($_POST['birthday']);
    $home_address = trim($_POST['home_address']);
    $religion = trim($_POST['religion']);
    $municipal_address = trim($_POST['municipal_address']);
    $occupation = trim($_POST['occupation']);
    $contact_number = trim($_POST['contact_number']);
    $civil_status = trim($_POST['civil_status']);
    $emergency_contact_name = trim($_POST['emergency_contact_name']);
    $emergency_contact_number = trim($_POST['emergency_contact_number']);
    $emergency_contact_address = trim($_POST['emergency_contact_address']);
    $emergency_contact_relationship = trim($_POST['emergency_contact_relationship']);
    $smoking = trim($_POST['smoking']);
    $alcohol_drinking = trim($_POST['alcohol_drinking']);
    $illegal_drug_use = trim($_POST['illegal_drug_use']);
    $sexually_active = trim($_POST['sexually_active']);
    $allergy = trim($_POST['allergy']);
    $epilepsy_seizure_disorder = trim($_POST['epilepsy_seizure_disorder']);
    $asthma = trim($_POST['asthma']);
    $congenital_heart_disorder = trim($_POST['congenital_heart_disorder']);
    $thyroid_disease = trim($_POST['thyroid_disease']);
    $skin_disorder = trim($_POST['skin_disorder']);
    $cancer = trim($_POST['cancer']);
    $diabetes_mellitus = trim($_POST['diabetes_mellitus']);
    $peptic_ulcer = trim($_POST['peptic_ulcer']);
    $tuberculosis = trim($_POST['tuberculosis']);
    $coronary_artery_disease = trim($_POST['coronary_artery_disease']);
    $pcos = trim($_POST['pcos']);
    $hepatitis = trim($_POST['hepatitis']);
    $hypertension_elevated_bp = trim($_POST['hypertension_elevated_bp']);
    $psychological_disorder = trim($_POST['psychological_disorder']);
    $hospital_admissions_diagnosis = trim($_POST['hospital_admissions_diagnosis']);
    $hospital_admissions_when = trim($_POST['hospital_admissions_when']);
    $past_surgical_history_operation_type = trim($_POST['past _surgical_history_operation_type']);
    $past_surgical_history_when = trim($_POST['past_surgical_history_when']);
    $person_with_disability = trim($_POST['person_with_disability']);
    $willing_to_donate_blood = trim($_POST['willing_to_donate_blood']);
    $family_history_mother_side = trim($_POST['family_history_mother_side']);
    $family_history_father_side = trim($_POST['family_history_father_side']);
    $immunizations_completed_newborn_immunizations = trim($_POST['immunizations_completed_newborn_immunizations']);
    $immunizations_tetanus_toxoid = trim($_POST['immunizations_tetanus_toxoid']);
    $immunizations_influenza = trim($_POST['immunizations_influenza']);
    $immunizations_pneumococcal_vaccine = trim($_POST['immunizations_pneumococcal_vaccine']);
    $covid_19_brand_name_first_dose = trim($_POST['covid_19_brand_name_first_dose']);
    $covid_19_brand_name_second_dose = trim($_POST['covid_19_brand_name_second_dose']);
    $covid_19_brand_name_first_booster = trim($_POST['covid_19_brand_name_first_booster']);
    $covid_19_brand_name_second_booster = trim($_POST['covid_19_brand_name_second_booster']);
    $unvaccinated_with_covid_19_reason = trim($_POST['unvaccinated_with_covid_19_reason']);

   // Prepare the SQL update statement
$sql = "UPDATE medical_form SET 
date = ?, 
college_clinic_file_number = ?, 
college_course = ?, 
year = ?, 
name = ?, 
age_sex = ?, 
birthday = ?, 
home_address = ?, 
religion = ?, 
municipal_address = ?, 
occupation = ?, 
contact_number = ?, 
civil_status = ?, 
emergency_contact_name = ?, 
emergency_contact_number = ?, 
emergency_contact_address = ?, 
emergency_contact_relationship = ?, 
smoking = ?, 
alcohol_drinking = ?, 
illegal_drug_use = ?, 
sexually_active = ?, 
allergy = ?, 
epilepsy_seizure_disorder = ?, 
asthma = ?, 
congenital_heart_disorder = ?, 
thyroid_disease = ?, 
skin_disorder = ?, 
cancer = ?, 
diabetes_mellitus = ?, 
peptic_ulcer = ?, 
tuberculosis = ?, 
coronary_artery_disease = ?, 
pcos = ?, 
hepatitis = ?, 
hypertension_elevated_bp = ?, 
psychological_disorder = ?, 
hospital_admissions_diagnosis = ?, 
hospital_admissions_when = ?, 
past_surgical_history_operation_type = ?, 
past_surgical_history_when = ?, 
person_with_disability = ?, 
willing_to_donate_blood = ?, 
family_history_mother_side = ?, 
family_history_father_side = ?, 
immunizations_completed_newborn_immunizations = ?, 
immunizations_tetanus_toxoid = ?, 
immunizations_influenza = ?, 
immunizations_pneumococcal_vaccine = ?, 
covid_19_brand_name_first_dose = ?, 
covid_19_brand_name_second_dose = ?, 
covid_19_brand_name_first_booster = ?, 
covid_19_brand_name_second_booster = ?, 
unvaccinated_with_covid_19_reason = ? 
WHERE id = ?";

// Prepare the statement
if ($stmt = mysqli_prepare($link, $sql)) {
// Define your parameters in an array
$params = [
    $date,
    $college_clinic_file_number,
    $college_course,
    $year,
    $name,
    $age_sex,
    $birthday,
    $home_address,
    $religion,
    $municipal_address,
    $occupation,
    $contact_number,
    $civil_status,
    $emergency_contact_name,
    $emergency_contact_number,
    $emergency_contact_address,
    $emergency_contact_relationship,
    $smoking,
    $alcohol_drinking,
    $illegal_drug_use,
    $sexually_active,
    $allergy,
    $epilepsy_seizure_disorder,
    $asthma,
    $congenital_heart_disorder,
    $thyroid_disease,
    $skin_disorder,
    $cancer,
    $diabetes_mellitus,
    $peptic_ulcer,
    $tuberculosis,
    $coronary_artery_disease,
    $pcos,
    $hepatitis,
    $hypertension_elevated_bp,
    $psychological_disorder,
    $hospital_admissions_diagnosis,
    $hospital_admissions_when,
    $past_surgical_history_operation_type,
    $past_surgical_history_when,
    $person_with_disability,
    $willing_to_donate_blood,
    $family_history_mother_side,
    $family_history_father_side,
    $immunizations_completed_newborn_immunizations,
    $immunizations_tetanus_toxoid,
    $immunizations_influenza,
    $immunizations_pneumococcal_vaccine,
    $covid_19_brand_name_first_dose,
    $covid_19_brand_name_second_dose,
    $covid_19_brand_name_first_booster,
    $covid_19_brand_name_second_booster,
    $unvaccinated_with_covid_19_reason,
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
        header("Location:medical_record.php"); // Change this to your desired redirection
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
    <title>Edit Patient Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Patient Information</h2>
        <form id="multiStepForm">
            <!-- Step 1: Basic Information -->
            <div class="step active" id="step-1">
                <h3 class="text-lg font-bold mb-2">Step 1: Basic Information</h3>
                <div class="flex flex-wrap justify-between mb-4">
                    <div class="w-full md:w-1/3 mb-4">
                        <label class="block text-gray-700">Date:</label>
                        <input type="date" class="border border-gray-300 p-2 w-full rounded" id="date" name="date" required>
                    </div>
                    <div class="w-full md:w-1/3 mb-4">
                        <label class="block text-gray-700">College Clinic File Number:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="college_clinic_file_number" name="college_clinic_file_number" required>
                    </div>
                    <div class="w-full md:w-1/3 mb-4">
                        <label class="block text-gray-700">College Course:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="college_course" name="college_course" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Year:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" placeholder="Year level" id="year" name="year" required>
                </div>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 2: Personal Profile -->
            <div class="step" id="step-2">
                <h3 class="text-lg font-bold mb-2">Step 2: Personal Profile</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Name:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="name" name="name" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Age/Sex:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="age_sex" name="age_sex" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Birthday:</label>
                        <input type="date" class="border border-gray-300 p-2 w-full rounded" id="birthday" name="birthday" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Home Address:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="home_address" name="home_address" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Religion:</label>
                        < input type="text" class="border border-gray-300 p-2 w-full rounded" id="religion" name="religion" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Municipal Address:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="municipal_address" name="municipal_address" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Occupation:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="occupation" name="occupation" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Contact Number(s):</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="contact_number" name="contact_number" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Civil Status:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="civil_status" name="civil_status" required>
                    </div>
                </div>
                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="prevStep()">Previous</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="nextStep()">Next</button>
            </div>

            <!-- Step 3: Emergency Contact -->
            <div class="step" id="step-3">
                <h3 class="text-lg font-bold mb-2">Step 3: Emergency Contact</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Complete Name:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="emergency_contact_name" name="emergency_contact_name" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Contact Number:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="emergency_contact_number" name="emergency_contact_number" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Address:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="emergency_contact_address" name="emergency_contact_address" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Relationship:</label>
                        <input type="text" class="border border-gray-300 p-2 w-full rounded" id="emergency_contact_relationship" name="emergency_contact_relationship" required>
                    </div>
                </div>
                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="prevStep()">Previous</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>

    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll('.step');

        function showStep(step) {
            steps.forEach((s, index) => {
                s.classList.toggle('active', index === step);
            });
        }

        function nextStep() {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        }

        showStep(currentStep);
    </script>
</body>
</html>