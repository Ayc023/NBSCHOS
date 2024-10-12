<?php
// Include database connection
require '../config.php'; // Make sure this points to your database configuration file

// Check if medical_id is set in the URL
if (isset($_GET['medical_id'])) {
    $medical_id = intval($_GET['medical_id']);

    // Fetch the patient's current information
    $stmt = $pdo->prepare("SELECT * FROM personal_health_profile WHERE medical_id = :medical_id");
    $stmt->execute(['medical_id' => $medical_id]);
    $patient = $stmt->fetch();

    // Check if the patient exists
    if (!$patient) {
        echo "Patient not found!";
        exit;
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and assign form data
        $date = htmlspecialchars($_POST['date']);
        $clinic_file_number = htmlspecialchars($_POST['clinic_file_number']);
        $college_course = htmlspecialchars($_POST['college_course']);
        $name = htmlspecialchars($_POST['name']);
        $age_sex = htmlspecialchars($_POST['age_sex']);
        $birthday = htmlspecialchars($_POST['birthday']);
        $home_address = htmlspecialchars($_POST['home_address']);
        $municipal_address = htmlspecialchars($_POST['municipal_address']);
        $occupation = htmlspecialchars($_POST['occupation']);
        $contact_number = htmlspecialchars($_POST['contact_number']);
        $religion = htmlspecialchars($_POST['religion']);
        $civil_status = htmlspecialchars($_POST['civil_status']);
        $emergency_contact_name = htmlspecialchars($_POST['emergency_contact_name']);
        $emergency_contact_number = htmlspecialchars($_POST['emergency_contact_number']);
        $emergency_contact_address = htmlspecialchars($_POST['emergency_contact_address']);
        $emergency_contact_relationship = htmlspecialchars($_POST['emergency_contact_relationship']);
        $smoking = htmlspecialchars($_POST['smoking']);
        $alcohol_drinking = htmlspecialchars($_POST['alcohol_drinking']);
        $drug_use = htmlspecialchars($_POST['drug_use']);
        $sexually_active = htmlspecialchars($_POST['sexually_active']);
        $smoking_details = htmlspecialchars($_POST['smoking_details']);
        $alcohol_details = htmlspecialchars($_POST['alcohol_details']);
        $alcohol_frequency = htmlspecialchars($_POST['alcohol_frequency']);
        $sexual_partners_male = htmlspecialchars($_POST['sexual_partners_male']);
        $sexual_partners_female = htmlspecialchars($_POST['sexual_partners_female']);
        $sexual_partners_both = htmlspecialchars($_POST['sexual_partners_both']);
        $allergies = htmlspecialchars($_POST['allergies']);
        $medical_conditions = htmlspecialchars($_POST['medical_conditions']);
        $hospital_admissions = htmlspecialchars($_POST['hospital_admissions']);
        $diagnosis_1 = htmlspecialchars($_POST['diagnosis_1']);
        $when_1 = htmlspecialchars($_POST['when_1']);
        $diagnosis_2 = htmlspecialchars($_POST['diagnosis_2']);
        $when_2 = htmlspecialchars($_POST['when_2']);
        $operation_type_1 = htmlspecialchars($_POST['operation_type_1']);
        $when_surgery_1 = htmlspecialchars($_POST['when_surgery_1']);
        $operation_type_2 = htmlspecialchars($_POST['operation_type_2']);
        $when_surgery_2 = htmlspecialchars($_POST['when_surgery_2']);
        $disability_status = htmlspecialchars($_POST['disability_status']);
        $disability_description = htmlspecialchars($_POST['disability_description']);
        $registration_status = htmlspecialchars($_POST['registration_status']);
        $donate_blood = htmlspecialchars($_POST['donate_blood']);
        $family_history_mother = htmlspecialchars($_POST['family_history_mother']);
        $family_history_father = htmlspecialchars($_POST['family_history_father']);
        $newborn_immunizations = htmlspecialchars($_POST['newborn_immunizations']);
        $hpv_vaccine = htmlspecialchars($_POST['hpv_vaccine']);
        $hpv_doses = htmlspecialchars($_POST['hpv_doses']);
        $tetanus_toxoid = htmlspecialchars($_POST['tetanus_toxoid']);
        $tetanus_doses = htmlspecialchars($_POST['tetanus_doses']);
        $influenza = htmlspecialchars($_POST['influenza']);
        $influenza_year = htmlspecialchars($_POST['influenza_year']);
        $pneumococcal_vaccine = htmlspecialchars($_POST['pneumococcal_vaccine']);
        $pneumococcal_doses = htmlspecialchars($_POST['pneumococcal_doses']);
        $covid_vaccine = htmlspecialchars($_POST['covid_vaccine']);

        // Insert the patient's information into the database
        $insertStmt = $pdo->prepare("INSERT INTO personal_health_profile (
            date,
            clinic_file_number,
            college_course,
            name,
            age_sex,
            birthday,
            home_address,
            religion,
            municipal_address,
            occupation,
            contact_number,
            civil_status,
            emergency_contact_name,
            emergency_contact_number,
            emergency_contact_address,
            emergency_contact_relationship,
            smoking,
            alcohol_drinking,
            drug_use,
            sexually_active,
            smoking_details,
            alcohol_details,
            alcohol_frequency,
            sexual_partners_male,
            sexual_partners_female,
            sexual_partners_both,
            allergies,
            medical_conditions,
            hospital_admissions,
            diagnosis_1,
            when_1,
            diagnosis_2,
            when_2,
            operation_type_1,
            when_surgery_1,
            operation_type_2,
            when_surgery_2,
            disability_status,
            disability_description,
            registration_status,
            donate_blood,
            family_history_mother,
            family_history_father,
            newborn_immunizations,
            hpv_vaccine,
            hpv_doses,
            tetanus_toxoid,
            tetanus_doses,
            influenza,
            influenza_year,
            pneumococcal_vaccine,
            pneumococcal_doses,
            covid_vaccine
        ) VALUES (
            :date,
            :clinic_file_number,
            :college_course,
            :name,
            :age_sex,
            :birthday,
            :home_address,
            :religion,
            :municipal_address,
            :occupation,
            :contact_number,
            :civil_status,
            :emergency_contact_name,
            :emergency_contact_number,
            :emergency_contact_address,
            :emergency_contact_relationship,
            :smoking,
            :alcohol_drinking,
            :drug_use,
            :sexually_active,
            :smoking_details,
            :alcohol_details,
            :alcohol_frequency,
            :sexual_partners_male,
            :sexual_partners_female,
            :sexual_partners_both,
            :allergies,
            :medical_conditions,
            :hospital_admissions,
            :diagnosis_1,
            :when_1,
            :diagnosis_2,
            :when_2,
            :operation_type_1,
            :when_surgery_1,
            :operation_type_2,
            :when_surgery_2,
            :disability_status,
            :disability_description,
            :registration_status,
            :donate_blood,
            :family_history_mother,
            :family_history_father,
            :newborn_immunizations,
            :hpv_vaccine,
            :hpv_doses,
            :tetanus_toxoid,
            :tetanus_doses,
            :influenza,
            :influenza_year,
            :pneumococcal_vaccine,
            :pneumococcal_doses,
            :covid_vaccine
        )");

        $insertStmt->execute([
            'date' => $date,
            'clinic_file_number' => $clinic_file_number,
            'college_course' => $college_course,
            'name' => $name,
            'age_sex' => $age_sex,
            'birthday' => $birthday,
            'home_address' => $home_address,
            'religion' => $religion,
            'municipal_address' => $municipal_address,
            'occupation' => $occupation,
            'contact_number' => $contact_number,
            'civil_status' => $civil_status,
            'emergency_contact_name' => $emergency_contact_name,
            'emergency_contact_number' => $emergency_contact_number,
            'emergency_contact_address' => $emergency_contact_address,
            'emergency_contact_relationship' => $emergency_contact_relationship,
            'smoking' => $smoking,
            'alcohol_drinking' => $alcohol_drinking,
            'drug_use' => $drug_use,
            'sexually_active' => $sexually_active,
            'smoking_details' => $smoking_details,
            'alcohol_details' => $alcohol_details,
            'alcohol_frequency' => $alcohol_frequency,
            'sexual_partners_male' => $sexual_partners_male,
            'sexual_partners_female' => $sexual_partners_female,
            'sexual_partners_both' => $sexual_partners_both,
            'allergies' => $allergies,
            'medical_conditions' => $medical_conditions,
            'hospital_admissions' => $hospital_admissions,
            'diagnosis_1' => $diagnosis_1,
            'when_1' => $when_1,
            'diagnosis_2' => $diagnosis_2,
            'when_2' => $when_2,
            'operation_type_1' => $operation_type_1,
            'when_surgery_1' => $when_surgery_1,
            'operation_type_2' => $operation_type_2,
            'when_surgery_2' => $when_surgery_2,
            'disability_status' => $disability_status,
            'disability_description' => $disability_description,
            'registration_status' => $registration_status,
            'donate_blood' => $donate_blood,
            'family_history_mother' => $family_history_mother,
            'family_history_father' => $family_history_father,
            'newborn_immunizations' => $newborn_immunizations,
            'hpv_vaccine' => $hpv_vaccine,
            'hpv_doses' => $hpv_doses,
            'tetanus_toxoid' => $tetanus_toxoid,
            'tetanus_doses' => $tetanus_doses,
            'influenza' => $influenza,
            'influenza_year' => $influenza_year,
            'pneumococcal_vaccine' => $pneumococcal_vaccine,
            'pneumococcal_doses' => $pneumococcal_doses,
            'covid_vaccine' => $covid_vaccine
        ]);

        echo "Patient's health profile has been successfully updated.";
        // Redirect or take appropriate action after insertion
        header('Location: success.php');
        exit;
    }
} else {
    echo "No medical ID provided!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Edit Patient Information</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($patient['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="age_sex" class="form-label">Age/Sex</label>
            <input type="text" class="form-control" id="age_sex" name="age_sex" value="<?php echo htmlspecialchars($patient['age_sex']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo htmlspecialchars($patient['birthday']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="home_address" class="form-label">Home Address</label>
            <input type="text" class="form-control" id="home_address" name="home_address" value="<?php echo htmlspecialchars($patient['home_address']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo htmlspecialchars($patient['basic_college_course']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($patient['basic_contact_number']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="religion" class="form-label">Religion</label>
            <input type="text" class="form-control" id="religion" name="religion" value="<?php echo htmlspecialchars($patient['basic_religion']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="civil_status" class="form-label">Civil Status</label>
            <input type="text" class="form-control" id="civil_status" name="civil_status" value="<?php echo htmlspecialchars($patient['basic_civil_status']); ?>" required>
        </div>

        <!-- Add additional fields here -->
        <div class="mb-3">
            <label for="municipal_address" class="form-label">Municipal Address</label>
            <input type="text" class="form-control" id="municipal_address" name="municipal_address" value="<?php echo htmlspecialchars($patient['municipal_address']); ?>">
        </div>
        <div class="mb-3">
            <label for="emergency_contact_name" class="form-label">Emergency Contact Name</label>
            <input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name" value="<?php echo htmlspecialchars($patient['emergency_contact_name']); ?>">
        </div>
        <div class="mb-3">
            <label for="emergency_contact_number" class="form-label">Emergency Contact Number</label>
            <input type="text" class="form-control" id="emergency_contact_number" name="emergency_contact_number" value="<?php echo htmlspecialchars($patient['emergency_contact_number']); ?>">
        </div>
        <div class="mb-3">
            <label for="emergency_contact_address" class="form-label">Emergency Contact Address</label>
            <input type="text" class="form-control" id="emergency_contact_address" name="emergency_contact_address" value="<?php echo htmlspecialchars($patient['emergency_contact_address']); ?>">
        </div>
        <div class="mb-3">
            <label for="emergency_contact_relationship" class="form-label">Emergency Contact Relationship</label>
            <input type="text" class="form-control" id="emergency_contact_relationship" name="emergency_contact_relationship" value="<?php echo htmlspecialchars($patient['emergency_contact_relationship']); ?>">
        </div>
        <div class="mb-3">
            <label for="smoking" class="form-label">Smoking</label>
            <input type="text" class="form-control" id="smoking" name="smoking" value="<?php echo htmlspecialchars($patient['smoking']); ?>">
        </div>
        <div class="mb-3">
            <label for="alcohol_drinking" class="form-label">Alcohol Drinking</label>
            <input type="text" class="form-control" id="alcohol_drinking" name="alcohol_drinking" value="<?php echo htmlspecialchars($patient['alcohol_drinking']); ?>">
        </div>
        <div class="mb-3">
            <label for="drug_use" class="form-label">Drug Use</label>
            <input type="text" class="form-control" id="drug_use" name="drug_use" value="<?php echo htmlspecialchars($patient['drug_use']); ?>">
        </div>
        <div class="mb-3">
            <label for="sexually_active" class="form-label">Sexually Active</label>
            <input type="text" class="form-control" id="sexually_active" name="sexually_active" value="<?php echo htmlspecialchars($patient['sexually_active']); ?>">
        </div>
        <div class="mb-3">
            <label for="smoking_details" class="form-label">Smoking Details</label>
            <input type="text" class="form-control" id="smoking_details" name="smoking_details" value="<?php echo htmlspecialchars($patient['smoking_details']); ?>">
        </div>
        <div class="mb-3">
            <label for="alcohol_details" class="form-label">Alcohol Details</label>
            <input type="text" class="form-control" id="alcohol_details" name="alcohol_details" value="<?php echo htmlspecialchars($patient['alcohol_details']); ?>">
        </div>
        <div class="mb-3">
            <label for="alcohol_frequency" class="form-label">Alcohol Frequency</label>
            <input type="text" class="form-control" id="alcohol_frequency" name="alcohol_frequency" value="<?php echo htmlspecialchars($patient['alcohol_frequency']); ?>">
        </div>
        <div class="mb-3">
            <label for="sexual_partners_male" class="form-label">Sexual Partners (Male)</label>
            <input type="number" class="form-control" id="sexual_partners_male" name="sexual_partners_male" value="<?php echo htmlspecialchars($patient['sexual_partners_male']); ?>">
        </div>
        <div class="mb-3">
            <label for="sexual_partners_female" class="form-label">Sexual Partners (Female)</label>
            <input type="number" class="form-control" id="sexual_partners_female" name="sexual_partners_female" value="<?php echo htmlspecialchars($patient['sexual_partners_female']); ?>">
        </div>
        <div class="mb-3">
            <label for="sexual_partners_both" class="form-label">Sexual Partners (Both)</label>
            <input type="number" class="form-control" id="sexual_partners_both" name="sexual_partners_both" value="<?php echo htmlspecialchars($patient['sexual_partners_both']); ?>">
        </div>
        <div class="mb-3">
            <label for="allergies" class="form-label">Allergies</label>
            <input type="text" class="form-control" id="allergies" name="allergies" value="<?php echo htmlspecialchars($patient['allergies']); ?>">
        </div>
        <div class="mb-3">
            <label for="medical_conditions" class="form-label">Medical Conditions</label>
            <input type="text" class="form-control" id="medical_conditions" name="medical_conditions" value="<?php echo htmlspecialchars($patient['medical_conditions']); ?>">
        </div>
        <div class="mb-3">
            <label for="hospital_admissions" class="form-label">Hospital Admissions</label>
            <input type="text" class="form-control" id="hospital_admissions" name="hospital_admissions" value="<?php echo htmlspecialchars($patient['hospital_admissions']); ?>">
        </div>
        <div class="mb-3">
            <label for="diagnosis_1" class="form-label">Diagnosis 1</label>
            <input type="text" class="form-control" id="diagnosis_1" name="diagnosis_1" value="<?php echo htmlspecialchars($patient['diagnosis_1']); ?>">
        </div>
        <div class="mb-3">
            <label for="when_1" class="form-label">When Diagnosis 1</label>
            <input type="date" class="form-control" id="when_1" name="when_1" value="<?php echo htmlspecialchars($patient['when_1']); ?>">
        </div>
        <div class="mb-3">
            <label for="diagnosis_2" class="form-label">Diagnosis 2</label>
            <input type="text" class="form-control" id="diagnosis_2" name="diagnosis_2" value="<?php echo htmlspecialchars($patient['diagnosis_2']); ?>">
        </div>
        <div class="mb-3">
            <label for="when_2" class="form-label">When Diagnosis 2</label>
            <input type="date" class="form-control" id="when_2" name="when_2" value="<?php echo htmlspecialchars($patient['when_2']); ?>">
        </div>
        <div class="mb-3">
            <label for="operation_type_1" class="form-label">Operation Type 1</label>
            <input type="text" class="form-control" id="operation_type_1" name="operation_type_1" value="<?php echo htmlspecialchars($patient['operation_type_1']); ?>">
        </div>
        <div class="mb-3">
            <label for="when_surgery_1" class="form-label">When Surgery 1</label>
            <input type="date" class="form-control" id="when_surgery_1" name="when_surgery_1" value="<?php echo htmlspecialchars($patient['when_surgery_1']); ?>">
        </div>
        <div class="mb-3">
            <label for="operation_type_2" class="form-label">Operation Type 2</label>
            <input type="text" class="form-control" id="operation_type_2" name="operation_type_2" value="<?php echo htmlspecialchars($patient['operation_type_2']); ?>">
        </div>
        <div class="mb-3">
            <label for="when_surgery_2" class="form-label">When Surgery 2</label>
            <input type="date" class="form-control" id="when_surgery_2" name="when_surgery_2" value="<?php echo htmlspecialchars($patient['when_surgery_2']); ?>">
        </div>
        <div class="mb-3">
            <label for="disability_status" class="form-label">Disability Status</label>
            <input type="text" class="form-control" id="disability_status" name="disability_status" value="<?php echo htmlspecialchars($patient['disability_status']); ?>">
        </div>
        <div class="mb-3">
            <label for="disability_description" class="form-label">Disability Description</label>
            <input type="text" class="form-control" id="disability_description" name="disability_description" value="<?php echo htmlspecialchars($patient['disability_description']); ?>">
        </div>
        <div class="mb-3">
            <label for="registration_status" class="form-label">Registration Status</label>
            <input type="text" class="form-control" id="registration_status" name="registration_status" value="<?php echo htmlspecialchars($patient['registration_status']); ?>">
        </div>
        <div class="mb-3">
            <label for="donate_blood" class="form-label">Donate Blood</label>
            <input type="text" class="form-control" id="donate_blood" name="donate_blood" value="<?php echo htmlspecialchars($patient['donate_blood']); ?>">
        </div>
        <div class="mb-3">
            <label for="family_history_mother" class="form-label">Family History (Mother)</label>
            <input type="text" class="form-control" id="family_history_mother" name="family_history_mother" value="<?php echo htmlspecialchars($patient['family_history_mother']); ?>">
        </div>
        <div class="mb-3">
            <label for="family_history_father" class="form-label">Family History (Father)</label>
            <input type="text" class="form-control" id="family_history_father" name="family_history_father" value="<?php echo htmlspecialchars($patient['family_history_father']); ?>">
        </div>
        <div class="mb-3">
            <label for="newborn_immunizations" class="form-label">Newborn Immunizations</label>
            <input type="text" class="form-control" id="newborn_immunizations" name="newborn_immunizations" value="<?php echo htmlspecialchars($patient['newborn_immunizations']); ?>">
        </div>
        <div class="mb-3">
            <label for="hpv_vaccine" class="form-label">HPV Vaccine</label>
            <input type="text" class="form-control" id="hpv_vaccine" name="hpv_vaccine" value="<?php echo htmlspecialchars($patient['hpv_vaccine']); ?>">
        </div>
        <div class="mb-3">
            <label for="hpv_doses" class="form-label">HPV Doses</label>
            <input type="number" class="form-control" id="hpv_doses" name="hpv_doses" value="<?php echo htmlspecialchars($patient['hpv_doses']); ?>">
        </div>
        <div class="mb-3">
            <label for="tetanus_toxoid" class="form-label">Tetanus Toxoid</label>
            <input type="text" class="form-control" id="tetanus_toxoid" name="tetanus_toxoid" value="<?php echo htmlspecialchars($patient['tetanus_toxoid']); ?>">
        </div>
        <div class="mb-3">
            <label for="tetanus_doses" class="form-label">Tetanus Doses</label>
            <input type="number" class="form-control" id="tetanus_doses" name="tetanus_doses" value="<?php echo htmlspecialchars($patient['tetanus_doses']); ?>">
        </div>
        <div class="mb-3">
            <label for="influenza" class="form-label">Influenza</label>
            <input type="text" class="form-control" id="influenza" name="influenza" value="<?php echo htmlspecialchars($patient['influenza']); ?>">
        </div>
        <div class="mb-3">
            <label for="influenza_year" class="form-label">Influenza Year</label>
            <input type="text" class="form-control" id="influenza_year" name="influenza_year" value="<?php echo htmlspecialchars($patient['influenza_year']); ?>">
        </div>
        <div class="mb-3">
            <label for="pneumococcal_vaccine" class="form-label">Pneumococcal Vaccine</label>
            <input type="text" class="form-control" id="pneumococcal_vaccine" name="pneumococcal_vaccine" value="<?php echo htmlspecialchars($patient['pneumococcal_vaccine']); ?>">
        </div>
        <div class="mb-3">
            <label for="pneumococcal_doses" class="form-label">Pneumococcal Doses</label>
            <input type="number" class="form-control" id="pneumococcal_doses" name="pneumococcal_doses" value="<?php echo htmlspecialchars($patient['pneumococcal_doses']); ?>">
        </div>
        <div class="mb-3">
            <label for="covid_vaccine" class="form-label">COVID Vaccine</label>
            <input type="text" class="form-control" id="covid_vaccine" name="covid_vaccine" value="<?php echo htmlspecialchars($patient['covid_vaccine']); ?>">
        </div>
        <div class="mb-3">
            <label for="OB_GYNE" class="form-label">OB/GYNE</label>
            <input type="text" class="form-control" id="OB_GYNE" name="OB_GYNE" value="<?php echo htmlspecialchars($patient['OB_GYNE']); ?>">
        </div>
        <div class="mb-3">
            <label for="Pregnancy_History" class="form-label">Pregnancy History</label>
            <input type="text" class="form-control" id="Pregnancy_History" name="Pregnancy_History" value="<?php echo htmlspecialchars($patient['Pregnancy_History']); ?>">
        </div>
        <div class="mb-3">
            <label for="Head_to_Toe_Assessment" class="form-label">Head to Toe Assessment</label>
            <input type="text" class="form-control" id="Head_to_Toe_Assessment" name="Head_to_Toe_Assessment" value="<?php echo htmlspecialchars($patient['Head_to_Toe_Assessment']); ?>">
        </div>
        <div class="mb-3">
            <label for="Neurological_Assessment" class="form-label">Neurological Assessment</label>
            <input type="text" class="form-control" id="Neurological_Assessment" name="Neurological_Assessment" value="<?php echo htmlspecialchars($patient['Neurological_Assessment']); ?>">
        </div>
        <div class="mb-3">
            <label for="HEENT" class="form-label">HEENT</label>
            <input type="text" class="form-control" id="HEENT" name="HEENT" value="<?php echo htmlspecialchars($patient['HEENT']); ?>">
        </div>
        <div class="mb-3">
            <label for="Respiratory_Assessment" class="form-label">Respiratory Assessment</label>
            <input type="text" class="form-control" id="Respiratory_Assessment" name="Respiratory_Assessment" value="<?php echo htmlspecialchars($patient['Respiratory_Assessment']); ?>">
        </div>
        <div class="mb-3">
            <label for="Cardiovascular_Assessment" class="form-label">Cardiovascular Assessment</label>
            <input type="text" class="form-control" id="Cardiovascular_Assessment" name="Cardiovascular_Assessment" value="<?php echo htmlspecialchars($patient['Cardiovascular_Assessment']); ?>">
        </div>
        <div class="mb-3">
            <label for="Gastrointestinal_Assessment" class="form-label">Gastrointestinal Assessment</label>
            <input type="text" class="form-control" id="Gastrointestinal_Assessment" name="Gastrointestinal_Assessment" value="<?php echo htmlspecialchars($patient['Gastrointestinal_Assessment']); ?>">
        </div>
        <div class="mb-3">
            <label for="Urinary_Assessment" class="form-label">Urinary Assessment</label>
            <input type="text" class="form-control" id="Urinary_Assessment" name="Urinary_Assessment" value="<?php echo htmlspecialchars($patient['Urinary_Assessment']); ?>">
        </div>
        <div class="mb-3">
            <label for="Integumentary_Assessment" class="form-label">Integumentary Assessment</label>
            <input type="text" class="form-control" id="Integumentary_Assessment" name="Integumentary_Assessment" value="<?php echo htmlspecialchars($patient['Integumentary_Assessment']); ?>">
        </div>
        <div class="mb-3">
            <label for="Musculoskeletal_Assessment" class="form-label">Musculoskeletal Assessment</label>
            <input type="text" class="form-control" id="Musculoskeletal_Assessment" name="Musculoskeletal_Assessment" value="<?php echo htmlspecialchars($patient['Musculoskeletal_Assessment']); ?>">
        </div>
        <div class="mb-3">
            <label for="Other_Pertinent_Findings" class="form-label">Other Pertinent Findings</label>
            <input type="text" class="form-control" id="Other_Pertinent_Findings" name="Other_Pertinent_Findings" value="<?php echo htmlspecialchars($patient['Other_Pertinent_Findings']); ?>">
        </div>
        <div class="mb-3">
            <label for="Certification" class="form-label">Certification</label>
            <input type="text" class="form-control" id="Certification" name="Certification" value="<?php echo htmlspecialchars($patient['Certification']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
