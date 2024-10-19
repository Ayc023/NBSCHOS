<?php
require_once "../config.php";

// Initialize variables for patient data
$patient_id = isset($_GET['id']) ? trim($_GET['id']) : '';
$date = $college_clinic_file_number = $college_course = $year = $name = $age_sex = $birthday = $home_address = $religion = $municipal_address = $occupation = $contact_number = $civil_status = '';
$emergency_contact_name = $emergency_contact_number = $emergency_contact_address = $emergency_contact_relationship = $smoking = $alcohol_drinking = $illegal_drug_use = $sexually_active = $allergy = $food = $drug = '';
$epilepsy_seizure_disorder = $asthma = $congenital_heart_disorder = $thyroid_disease = $skin_disorder = $cancer = $diabetes_mellitus = $peptic_ulcer = $tuberculosis = $coronary_artery_disease = '';
$pcos = $hepatitis = $hypertension_elevated_bp = $psychological_disorder = $hospital_admissions_diagnosis = $hospital_admissions_when = $past_surgical_history_operation_type = $past_surgical_history_when = $person_with_disability = $willing_to_donate_blood = '';
$family_history_mother_side = $family_history_father_side = $immunizations_completed_newborn_immunizations = $immunizations_tetanus_toxoid = $immunizations_influenza = $immunizations_pneumococcal_vaccine = $covid_19_brand_name_first_dose = $covid_19_brand_name_second_dose = $covid_19_brand_name_first_booster = $covid_19_brand_name_second_booster = $unvaccinated_with_covid_19_reason = '';

// Fetch patient data from the database
if ($patient_id) {
    $sql = "SELECT * FROM medical_form WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $date = $row['date'];
            $college_clinic_file_number = $row['college_clinic_file_number'];
            $college_course = $row['college_course'];
            $year_level = $row['year'];
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
            $food = $row['food'];
            $drug = $row['drug'];
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
            $past_surgical_history_when1 = $row['past_surgical_history_when'];
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
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement.";
    }
}

// Fetch all patient names for the sidebar
$sidebar_patients = [];
$search_term = isset($_GET['search_term']) ? trim($_GET['search_term']) : '';

// Fetch all or filtered patient names for the sidebar
if ($search_term) {
    $sql = "SELECT id, name FROM medical_form WHERE name LIKE ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        $search_param = '%' . $search_term . '%';
        mysqli_stmt_bind_param($stmt, 's', $search_param);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $sidebar_patients[] = $row;
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing search statement.";
    }
} else {
    $sql = "SELECT id, name FROM medical_form";
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sidebar_patients[] = $row;
        }
        mysqli_free_result($result);
    } else {
        echo "Error fetching patient names.";
    }
}

mysqli_close($link); // Close the connection at the end
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../styles/medicalrecs.css">
    <style>
        /* Add custom styles if needed */

        /* Print Styles */
        @media print {
            body * {
                visibility: hidden; /* Hide everything */
            }

            #printableProfile, #printableProfile * {
                visibility: visible; /* Show only the profile */
            }

            #printableProfile {
                position: absolute; /* Position profile for print */
                left: 0;
                top: 0;
                background: #fff; /* White background for print */
                padding: 20px; /* Add padding for better layout */
                margin: 0; /* Ensure there's no margin */
                box-shadow: none; /* Remove any box shadow */
            }

            .print-button {
                display: none; /* Hide print button during printing */
            }
        }

        /* Additional styles for profile formatting */
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile h4 {
            margin-top: 20px;
        }

        .profile div {
            margin-bottom: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                display: none; /* Hide sidebar on small screens */
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="#">
        <img src="../src/Nbsc_logo-removebg-preview.png" alt="NBSC HOS" width="50" height="50"> NBSC HOS
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Panel</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    <li><a class="dropdown-item" href="../add_medical_info.php">Home</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 sidebar">
            <h5>Patient List</h5>
            <div class="input-group mb-3">
                <form method="GET" action="" class="d-flex align-items-center">
                    <input type="text" class="form-control custom-search-bar" placeholder="Search patient" aria-label="Search patient" value="<?php echo isset($_GET['search_term']) ? htmlspecialchars($_GET['search_term']) : ''; ?>">
                    <button class="btn btn-primary custom-search-btn" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <main class="col-md-9 content">
            <div class="profile-header">
                <img src="../src/Nbsc_logo-removebg-preview.png" alt="Profile Logo">
                <h5>
                    Republic of the Philippines
                    <br/>
                    Province of Bukidnon
                    <br/>
                    NORTHERN BUKIDNON STATE COLLEGE
                    <br/>
                    Municipality of Manolo Fortich
                    <br/>
                    HEALTH PROFILE
                </h5>
            </div>
                <div class="profile" id="printableProfile">
                <h4>PERSONAL PROFILE</h4>
<div class="row">
    <div class="col-md-6">
        <div>Date: <span><?php echo htmlspecialchars($date); ?></span></div>
        <div>Name: <span><?php echo htmlspecialchars($name); ?></span></div>
        <div>College Clinic File Number: <span><?php echo htmlspecialchars($college_clinic_file_number); ?></span></div>
        <div>College Course: <span><?php echo htmlspecialchars($college_course); ?></span></div>
        <div>Year: <span><?php echo htmlspecialchars($year); ?></span></div>
        <div>Age/Sex: <span><?php echo htmlspecialchars($age_sex); ?></span></div>
        <div>Birthday: <span><?php echo htmlspecialchars($birthday); ?></span></div>
    </div>
    <div class="col-md-6">
        <div>Municipal Address: <span><?php echo htmlspecialchars($municipal_address); ?></span></div>
        <div>Occupation: <span><?php echo htmlspecialchars($occupation); ?></span></div>
        <div>Contact Number: <span><?php echo htmlspecialchars($contact_number); ?></span></div>
        <div>Civil Status: <span><?php echo htmlspecialchars($civil_status); ?></span></div>
        <div>Home Address: <span><?php echo htmlspecialchars($home_address); ?></span></div>
        <div>Religion: <span><?php echo htmlspecialchars($religion); ?></span></div>
    </div>
</div>

<h4>In Case of Emergency (Please Contact):</h4>
<div class="row">
    <div class="col-md-6">
        <div>Emergency Contact Name: <span><?php echo htmlspecialchars($emergency_contact_name); ?></span></div>
        <div>Emergency Contact Number: <span><?php echo htmlspecialchars($emergency_contact_number); ?></span></div>
        <div>Emergency Contact Address: <span><?php echo htmlspecialchars($emergency_contact_address); ?></span></div>
    </div>
    <div class="col-md-6">
        <div>Emergency Contact Relationship: <span><?php echo htmlspecialchars($emergency_contact_relationship); ?></span></div>
    </div>
</div>

<h4>PERSONAL/ SOCIAL HISTORY:</h4>
<div class="row">
    <div class="col-md-6">
        <div>Smoking: <span><?php echo htmlspecialchars($smoking); ?></span></div>
        <div>Alcohol Drinking: <span><?php echo htmlspecialchars($alcohol_drinking); ?></span></div>
        <div>Illegal Drug Use: <span><?php echo htmlspecialchars($illegal_drug_use); ?></span></div>
        <div>Sexually Active: <span><?php echo htmlspecialchars($sexually_active); ?></span></div>
<h4>Allergy</h4>
<div class="row">
        <div>Food: <span><?php echo htmlspecialchars($food); ?></span></div>
        <div>Drug: <span><?php echo htmlspecialchars($drug); ?></span></div>
    </div>
</div>
</div>

<h4>PAST MEDICAL HISTORY:</h4>
<div class="row">
<div class="col-md-6">
        <div>Epilepsy Seizure Disorder: <span><?php echo htmlspecialchars($epilepsy_seizure_disorder); ?></span></div>
        <div>Asthma: <span><?php echo htmlspecialchars($asthma); ?></span></div>
        <div>Congenital Heart Disorder: <span><?php echo htmlspecialchars($congenital_heart_disorder); ?></span></div>
        <div>Thyroid Disease: <span><?php echo htmlspecialchars($thyroid_disease); ?></span></div>
    </div>
    <div class="col-md-6">
        <div>Skin Disorder: <span><?php echo htmlspecialchars($skin_disorder); ?></span></div>
        <div>Cancer: <span><?php echo htmlspecialchars($cancer); ?></span></div>
        <div>Diabetes Mellitus: <span><?php echo htmlspecialchars($diabetes_mellitus); ?></span></div>
        <div>Peptic Ulcer: <span><?php echo htmlspecialchars($peptic_ulcer); ?></span></div>
        <div>Tuberculosis: <span><?php echo htmlspecialchars($tuberculosis); ?></span></div>
        <div>Coronary Artery Disease: <span><?php echo htmlspecialchars($coronary_artery_disease); ?></span></div>
    </div>
    <div class="col-md-6">
        <div>PCOS: <span><?php echo htmlspecialchars($pcos); ?></span></div>
        <div>Hepatitis: <span><?php echo htmlspecialchars($hepatitis); ?></span></div>
        <div>Hypertension Elevated BP: <span><?php echo htmlspecialchars($hypertension_elevated_bp); ?></span></div>
        <div>Psychological Disorder: <span><?php echo htmlspecialchars($psychological_disorder); ?></span></div>
        <div>Hospital Admissions Diagnosis: <span><?php echo htmlspecialchars($hospital_admissions_diagnosis); ?></span></div>
        <div>Hospital Admissions When: <span><?php echo htmlspecialchars($hospital_admissions_when); ?></span></div>
    </div>
</div>

<h4>PAST SURGICAL HISTORY:</h4>
<div class="row">
    <div class="col-md-6">
        <div>Past Surgical History Operation Type: <span><?php echo htmlspecialchars($past_surgical_history_operation_type); ?></span></div>
        <div>Past Surgical History When: <span><?php echo htmlspecialchars($past_surgical_history_when); ?></span></div>
    </div>
    <div class="col-md-6">
        <div>Person with Disability: <span><?php echo htmlspecialchars($person_with_disability); ?></span></div>
    </div>
</div>

<h4>WILLING TO DONATE BLOOD:</h4>
<div>Willing to Donate Blood: <?php echo htmlspecialchars($willing_to_donate_blood); ?></div>

<h4>Family History:</h4>
<div class="row">
    <div class="col-md-6">
        <div>Family History Mother Side: <span><?php echo htmlspecialchars($family_history_mother_side); ?></span></div>
        <div>Family History Father Side: <span><?php echo htmlspecialchars($family_history_father_side); ?></span></div>
    </div>
</div>

<h4>Immunizations:</h4>
<div class="row">
    <div class="col-md-6">
        <div>Immunizations Completed Newborn Immunizations: <span><?php echo htmlspecialchars($immunizations_completed_newborn_immunizations); ?></span></div>
        <div>Immunizations Tetanus Toxoid: <span><?php echo htmlspecialchars($immunizations_tetanus_toxoid); ?></span></div>
        <div>Immunizations Influenza: <span><?php echo htmlspecialchars($immunizations_influenza); ?></span></div>
        <div>Immunizations Pneumococcal Vaccine: <span><?php echo htmlspecialchars($immunizations_pneumococcal_vaccine); ?></span></div>
    </div>
    <div class="col-md-6">
        <div>COVID-19 Brand Name First Dose: <span><?php echo htmlspecialchars($covid_19_brand_name_first_dose); ?></span></div>
        <div>COVID-19 Brand Name Second Dose: <span><?php echo htmlspecialchars($covid_19_brand_name_second_dose); ?></span></div>
        <div>COVID-19 Brand Name First Booster: <span><?php echo htmlspecialchars($covid_19_brand_name_first_booster); ?></span></div>
        <div>COVID-19 Brand Name Second Booster: <span><?php echo htmlspecialchars($covid_19_brand_name_second_booster); ?></span></div>
    </div>
</div>

<h4>Unvaccinated with COVID-19 Reason:</h4>
<div><?php echo htmlspecialchars($unvaccinated_with_covid_19_reason); ?></div>

<div class="print-button mt-3">
    <button class="btn btn-success" id="printButton">Print</button>
</div>
<script>
document.getElementById('printButton').addEventListener('click', function() {
    window.print(); // Directly trigger the print dialog
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
