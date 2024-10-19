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
        header("Location:../add_medical_info.php"); // Change this to your desired redirection
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
                <label class="block text-gray-700">College Clinic File Number:</label>
                <input type="text" class="border border-gray-300 p-2 w-full rounded" id="college_clinic_file_number" name="college_clinic_file_number" value="<?php echo htmlspecialchars($college_clinic_file_number); ?>">
            </div>
            <div class="w-full md:w-1/3 mb-4">
                <label class="block text-gray-700">College Course:</label>
                <input type="text" class="border border-gray-300 p-2 w-full rounded" id="college_course" name="college_course" value="<?php echo htmlspecialchars($college_course); ?>">
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Year:</label>
            <input type="text" class="border border-gray-300 p-2 w-full rounded mt-2" placeholder="Year level" id="year" name="year" value="<?php echo htmlspecialchars($year); ?>">
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">PERSONAL PROFILE:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Name:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Age/Sex:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="age_sex" name="age_sex" value="<?php echo htmlspecialchars($age_sex); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Birthday:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="birthday" name="birthday" value="<?php echo htmlspecialchars($birthday); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Home Address:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="home_address" name="home_address" value="<?php echo htmlspecialchars($home_address); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Religion:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="religion" name="religion" value="<?php echo htmlspecialchars($religion); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Municipal Address:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="municipal_address" name="municipal_address" value="<?php echo htmlspecialchars($municipal_address); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Occupation:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="occupation" name="occupation" value="<?php echo htmlspecialchars($occupation); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Contact Number(s):</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Civil Status:</label>
                    <input type="text" class="border border-gray-300 p-2 w-full rounded" id="civil_status" name="civil_status" value="<?php echo htmlspecialchars($civil_status); ?>">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">In Case of Emergency (Please Contact):</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Complete Name:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="emergency_contact_name" name="emergency_contact_name" value="<?php echo htmlspecialchars($emergency_contact_name); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Contact Number:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="emergency_contact_number" name="emergency_contact_number" value="<?php echo htmlspecialchars($emergency_contact_number); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Address:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="emergency_contact_address" name="emergency_contact_address" value="<?php echo htmlspecialchars($emergency_contact_address); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Relationship:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="emergency_contact_relationship" name="emergency_contact_relationship" value="<?php echo htmlspecialchars($emergency_contact_relationship); ?>">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">PERSONAL/ SOCIAL HISTORY:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Smoking</label>
                    <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="If yes how many packs/sticks a day? how many years you've been smoking?" id="smoking" name="smoking" value="<?php echo htmlspecialchars($smoking); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Alcohol Drinking</label>
                    <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="If yes how many bottles? (occasionally/monthly)" id="alcohol_drinking" name="alcohol_drinking" value="<?php echo htmlspecialchars($alcohol_drinking); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Illegal Drug Use</label>
                    <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="If yes what kind? (YES) (NO) (QUITTED) " id="illegal_drug_use" name="illegal_drug_use" value="<?php echo htmlspecialchars($illegal_drug_use); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Sexually Active</label>
                    <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="How many sexual partners within this year? (male) (female) (both)" id="sexually_active" name="sexually_active" value="<?php echo htmlspecialchars($sexually_active); ?>">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">PAST MEDICAL HISTORY:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="flex space-x-4">
                        <label><input type="checkbox" id="food" name="food" class="mr-2">Food</label>
                        <label><input type="checkbox" id="drug" name="drug" class="mr-2">Drug</label>
                    </div>
                    <input type="text" class="border border-gray-300 p-1 w-full mt-2" placeholder="what is your allergy?" id="allergy" name="allergy" value="<?php echo htmlspecialchars($allergy); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Epilepsy/Seizure Disorder:</label>
                    <input type="checkbox" name="epilepsy_seizure_disorder" class="mr-2" <?php if ($epilepsy_seizure_disorder == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Asthma:</label>
                    <input type="checkbox" name="asthma" class="mr-2" <?php if ($asthma == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Congenital Heart Disorder:</label>
                    <input type="checkbox" name="congenital_heart_disorder" class="mr-2" <?php if ($congenital_heart_disorder == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Thyroid Disease:</label>
                    <input type="checkbox" name="thyroid_disease" class="mr-2" <?php if ($thyroid_disease == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Skin Disorder:</label>
                    <input type="checkbox" name="skin_disorder" class="mr-2" <?php if ($skin_disorder == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Cancer:</label>
                    <input type="checkbox" name="cancer" class="mr-2" <?php if ($cancer == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Diabetes Mellitus:</label>
                    <input type="checkbox" name="diabetes_mellitus" class="mr-2" <?php if ($diabetes_mellitus == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Peptic Ulcer:</label>
                    <input type="checkbox" name="peptic_ulcer" class="mr-2" <?php if ($peptic_ulcer == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Tuberculosis:</label>
                    <input type="checkbox" name="tuberculosis" class="mr-2" <?php if ($tuberculosis == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Coronary Artery Disease:</label>
                    <input type="checkbox" name="coronary_artery_disease" class="mr-2" <?php if ($coronary_artery_disease == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">PCOS:</label>
                    <input type="checkbox" name="pcos" class="mr-2" <?php if ($pcos == 'on') echo 'checked'; ?>>
                </div >
                <div>
                    <label class="block text-gray-700">Hepatitis:</label>
                    <input type="checkbox" name="hepatitis" class="mr-2" <?php if ($hepatitis == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Hypertension/ Elevated BP:</label>
                    <input type="checkbox" name="hypertension_elevated_bp" class="mr-2" <?php if ($hypertension_elevated_bp == 'on') echo 'checked'; ?>>
                </div>
                <div>
                    <label class="block text-gray-700">Psychological Disorder:</label>
                    <input type="checkbox" name="psychological_disorder" class="mr-2" <?php if ($psychological_disorder == 'on') echo 'checked'; ?>>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">Hospital admissions:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Diagnosis:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="hospital_admissions_diagnosis" name="hospital_admissions_diagnosis" value="<?php echo htmlspecialchars($hospital_admissions_diagnosis); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">When?</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="hospital_admissions_when" name="hospital_admissions_when" value="<?php echo htmlspecialchars($hospital_admissions_when); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Diagnosis:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="hospital_admissions_diagnosis" name="hospital_admissions_diagnosis" value="<?php echo htmlspecialchars($hospital_admissions_diagnosis); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">When?</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="hospital_admissions_when" name="hospital_admissions_when" value="<?php echo htmlspecialchars($hospital_admissions_when); ?>">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">PAST SURGICAL HISTORY:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Operation type:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="past_surgical_history_operation_type" name="past_surgical_history_operation_type" value="<?php echo htmlspecialchars($past_surgical_history_operation_type); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">When?</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="past_surgical_history_when" name="past_surgical_history_when" value="<?php echo htmlspecialchars($past_surgical_history_when); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Operation type:</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="past_surgical_history_operation_type" name="past_surgical_history_operation_type" value="<?php echo htmlspecialchars($past_surgical_history_operation_type); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">When?</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="past_surgical_history_when" name="past_surgical_history_when" value="<?php echo htmlspecialchars($past_surgical_history_when); ?>">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Person with Disability: Specify</label>
            <input type="text" class="border border-gray-300 p-1 w-full" id="person_with_disability" name="person_with_disability" value="<?php echo htmlspecialchars($person_with_disability); ?>">
            <div class="flex space-x-4 mt-2">
                <label><input type="radio" name="person_with_disability" class="mr-2" <?php if ($person_with_disability == 'Registered') echo 'checked'; ?>>Registered</label>
                <label><input type="radio" name ="person_with_disability" class="mr-2" <?php if ($person_with_disability == 'Not Registered') echo 'checked'; ?>>Not Registered</label>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">WILLING TO DONATE BLOOD:</h2>
            <div class="flex space-x-4">
                <label><input type="radio" name="willing_to_donate_blood" class="mr-2" <?php if ($willing_to_donate_blood == 'YES') echo 'checked'; ?>>YES</label>
                <label><input type="radio" name="willing_to_donate_blood" class="mr-2" <?php if ($willing_to_donate_blood == 'NO') echo 'checked'; ?>>NO</label>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">Family History:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Mother side (Please enumerate)</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="family_history_mother_side" name="family_history_mother_side" value="<?php echo htmlspecialchars($family_history_mother_side); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Father side (Please enumerate)</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="family_history_father_side" name="family_history_father_side" value="<?php echo htmlspecialchars($family_history_father_side); ?>">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">Immunizations:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Completed Newborn Immunizations during childhood</label>
                    <div class="flex space-x-4">
                        <label><input type="radio" id="immunizations_completed_newborn_immunizations" name="immunizations_completed_newborn_immunizations" class="mr-2" <?php if ($immunizations_completed_newborn_immunizations == 'Yes') echo 'checked'; ?>>Yes</label>
                        <label><input type="radio" id="immunizations_completed_newborn_immunizations" name="immunizations_completed_newborn_immunizations" class="mr-2" <?php if ($immunizations_completed_newborn_immunizations == 'No') echo 'checked'; ?>>No</label>
                        <label><input type="radio" id="immunizations_completed_newborn_immunizations" name="immunizations_completed_newborn_immunizations" class="mr-2" <?php if ($immunizations_completed_newborn_immunizations == 'Unknown') echo 'checked'; ?>>Unknown</label>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Tetanus toxoid How many doses?</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="immunizations_tetanus_toxoid" name="immunizations_tetanus_toxoid" value="<?php echo htmlspecialchars($immunizations_tetanus_toxoid); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Influenza/Flu (year)</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="immunizations_influenza" name="immunizations_influenza" value="<?php echo htmlspecialchars($immunizations_influenza); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">Pneumococcal Vaccine How many doses?</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="immunizations_pneumococcal_vaccine" name="immunizations_pneumococcal_vaccine" value="<?php echo htmlspecialchars($immunizations_pneumococcal_vaccine); ?>">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-bold">COVID-19 Brand Name:</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">1<sup>st</sup> Dose</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="covid_19_brand_name_first_dose" name="covid_19_brand_name_first_dose" value="<?php echo htmlspecialchars($covid_19_brand_name_first_dose); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">2<sup>nd</sup> Dose</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="covid_19_brand_name_second_dose" name="covid_19_brand_name_second_dose" value="<?php echo htmlspecialchars($covid_19_brand_name_second_dose); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">1<sup>st</sup> Booster</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="covid_19_brand_name_first_booster" name="covid_19_brand_name_first_booster" value="<?php echo htmlspecialchars($covid_19_brand_name_first_booster); ?>">
                </div>
                <div>
                    <label class="block text-gray-700">2<sup>nd</sup> Booster</label>
                    <input type="text" class="border border-gray-300 p-1 w-full" id="covid_19_brand_name_second_booster" name="covid_19_brand_name_second_booster" value="<?php echo htmlspecialchars($covid_19_brand_name_second_booster); ?>">
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Unvaccinated w/ Covid-19: Reason</label>
            <input type="text" class="border border-gray-300 p-1 w-full" id="unvaccinated_with_covid_19_reason" name="unvaccinated_with_covid_19_reason" value="<?php echo htmlspecialchars($unvaccinated_with_covid_19_reason); ?>">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Patient</button>
    </form>
</div>
</body>
</html>