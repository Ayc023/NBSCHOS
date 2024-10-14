<?php
require_once "../config.php";

// Initialize variables for patient data
$patient_id = isset($_GET['form_id']) ? trim($_GET['form_id']) : '';
$date = $clinic_file_number = $college_course = $year_level = $name = $age_sex = $birthday = $home_address = $religion = $municipal_address = $occupation = $contact_number = $civil_status = '';
$emergency_name = $emergency_contact_number = $emergency_address = $emergency_relationship = $smoking = $smoking_pack_day = $smoking_years = $alcohol_drinking = '';
$alcohol_drinking_beer_wine = $alcohol_bottles_session = $alcohol_frequency = $illegal_drug_use = $drug_use_type = $sexually_active = $sexual_partners_current_year = '';
$sexual_partners_male = $sexual_partners_female = $sexual_partners_both = $allergies_food = $allergies_drug = $allergies_epilepsy = $asthma = '';
$congenital_heart_disorder = $thyroid_disease = $skin_disorder = $cancer = $diabetes = $peptic_ulcer = $tuberculosis = $coronary_artery_disease = '';
$pcos = $hepatitis = $hypertension = $psychological_disorder = $diagnosis_1 = $diagnosis_date_1 = $diagnosis_2 = $diagnosis_date_2 = '';
$operation_type_1 = $when_surgery_1 = $operation_type_2 = $when_surgery_2 = $is_person_with_disability = $disability_specify = $is_registered = $is_not_registered = '';
$willing_to_donate_blood = $family_history_mother = $family_history_father = $completed_newborn_immunizations = $hpv_doses = $tetanus_doses = '';
$influenza_year = $pneumococcal_doses = $covid_brand_1st_dose = $covid_brand_2nd_dose = $covid_brand_1st_booster = $covid_brand_2nd_booster = '';

// Fetch patient data from the database
if ($patient_id) {
    $sql = "SELECT * FROM medical_form WHERE form_id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $date = $row['date'];
            $clinic_file_number = $row['clinic_file_number'];
            $college_course = $row['college_course'];
            $year_level = $row['year_level'];
            $name = $row['name'];
            $age_sex = $row['age_sex'];
            $birthday = $row['birthday'];
            $home_address = $row['home_address'];
            $religion = $row['religion'];
            $municipal_address = $row['municipal_address'];
            $occupation = $row['occupation'];
            $contact_number = $row['contact_number'];
            $civil_status = $row['civil_status'];
            $emergency_name = $row['emergency_name'];
            $emergency_contact_number = $row['emergency_contact_number'];
            $emergency_address = $row['emergency_address'];
            $emergency_relationship = $row['emergency_relationship'];
            $smoking = $row['smoking'];
            $smoking_pack_day = $row['smoking_pack_day'];
            $smoking_years = $row['smoking_years'];
            $alcohol_drinking = $row['alcohol_drinking'];
            $alcohol_drinking_beer_wine = $row['alcohol_drinking_beer_wine'];
            $alcohol_bottles_session = $row['alcohol_bottles_session'];
            $alcohol_frequency = $row['alcohol_frequency'];
            $illegal_drug_use = $row['illegal_drug_use'];
            $drug_use_type = $row['drug_use_type'];
            $sexually_active = $row['sexually_active'];
            $sexual_partners_current_year = $row['sexual_partners_current_year'];
            $sexual_partners_male = $row['sexual_partners_male'];
            $sexual_partners_female = $row['sexual_partners_female'];
            $sexual_partners_both = $row['sexual_partners_both'];
            $allergies_food = $row['allergies_food'];
            $allergies_drug = $row['allergies_drug'];
            $allergies_epilepsy = $row['allergies_epilepsy'];
            $asthma = $row['asthma'];
            $congenital_heart_disorder = $row['congenital_heart_disorder'];
            $thyroid_disease = $row['thyroid_disease'];
            $skin_disorder = $row['skin_disorder'];
            $cancer = $row['cancer'];
            $diabetes = $row['diabetes'];
            $peptic_ulcer = $row['peptic_ulcer'];
            $tuberculosis = $row['tuberculosis'];
            $coronary_artery_disease = $row['coronary_artery_disease'];
            $pcos = $row['pcos'];
            $hepatitis = $row['hepatitis'];
            $hypertension = $row['hypertension'];
            $psychological_disorder = $row['psychological_disorder'];
            $diagnosis_1 = $row['diagnosis_1'];
            $diagnosis_date_1 = $row['diagnosis_date_1'];
            $diagnosis_2 = $row['diagnosis_2'];
            $diagnosis_date_2 = $row['diagnosis_date_2'];
            $operation_type_1 = $row['operation_type_1'];
            $when_surgery_1 = $row['when_surgery_1'];
            $operation_type_2 = $row['operation_type_2'];
            $when_surgery_2 = $row['when_surgery_2'];
            $is_person_with_disability = $row['is_person_with_disability'];
            $disability_specify = $row['disability_specify'];
            $is_registered = $row['is_registered'];
            $is_not_registered = $row['is_not_registered'];
            $willing_to_donate_blood = $row['willing_to_donate_blood'];
            $family_history_mother = $row['family_history_mother'];
            $family_history_father = $row['family_history_father'];
            $completed_newborn_immunizations = $row['completed_newborn_immunizations'];
            $hpv_doses = $row['hpv_doses'];
            $tetanus_doses = $row['tetanus_doses'];
            $influenza_year = $row['influenza_year'];
            $pneumococcal_doses = $row['pneumococcal_doses'];
            $covid_brand_1st_dose = $row['covid_brand_1st_dose'];
            $covid_brand_2nd_dose = $row['covid_brand_2nd_dose'];
            $covid_brand_1st_booster = $row['covid_brand_1st_booster'];
            $covid_brand_2nd_booster = $row['covid_brand_2nd_booster'];
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
    $sql = "SELECT form_id, name FROM medical_form WHERE name LIKE ?";
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
    $sql = "SELECT form_id, name FROM medical_form";
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
                    <li><a class="dropdown-item" href="welcome2.php">Home</a></li>
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
            <ul class="list-group">
                <?php foreach ($sidebar_patients as $patient) : ?>
                <li class="list-group-item <?php echo $patient_id == $patient['form_id'] ? 'active' : ''; ?>">
                    <a href="?form_id=<?php echo $patient['form_id']; ?>">
                        <?php echo htmlspecialchars($patient['name'] . ' ' . $patient['name']); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
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
                <h4>Basic Information</h4>
                <div class="row">
                <div class="profile" id="printableProfile">
    <h4>PERSONAL PROFILE</h4>
    <div class="row">
        <div class="col-md-6">
            <div>Name: <span><?php echo htmlspecialchars($name); ?></span></div>
            <div>Age/Sex: <span><?php echo htmlspecialchars($age_sex); ?></span></div>
            <div>Birthday: <span><?php echo htmlspecialchars($birthday); ?></span></div>
            <div>Occupation: <span><?php echo htmlspecialchars($occupation); ?></span></div>
            <div>Illegal Drug Use: <span><?php echo htmlspecialchars($illegal_drug_use); ?></span></div>
            <div>Drug Use Type: <span><?php echo htmlspecialchars($drug_use_type); ?></span></div>
            <div>Sexually Active: <span><?php echo htmlspecialchars($sexually_active); ?></span></div>
            <div>Sexual Partners (Current Year): <span><?php echo htmlspecialchars($sexual_partners_current_year); ?></span></div>
        </div>
        <div class="col-md-6">
            <div>Home Address: <span><?php echo htmlspecialchars($home_address); ?></span></div>
            <div>Municipal Address: <span><?php echo htmlspecialchars($municipal_address); ?></span></div>
            <div>Contact Number: <span><?php echo htmlspecialchars($contact_number); ?></span></div>
            <div>Religion: <span><?php echo htmlspecialchars($religion); ?></span></div>
        </div>
    </div>

    <h4>In Case of Emergency (Please Contact):</h4>
    <div class="row">
        <div class="col-md-6">
            <div>Emergency Contact Name: <span><?php echo htmlspecialchars($emergency_name); ?></span></div>
            <div>Emergency Contact Address: <span><?php echo htmlspecialchars($emergency_address); ?></span></div>
            <div>Emergency Contact Number: <span><?php echo htmlspecialchars($emergency_contact_number); ?></span></div>
        </div>
        <div class="col-md-6">
            <div>Relationship: <span><?php echo htmlspecialchars($emergency_relationship); ?></span></div>
        </div>
    </div>

    <h4>PERSONAL/ SOCIAL HISTORY:</h4>
    <div class="row">
        <div class="col-md-6">
            <div>Allergies (Food): <span><?php echo htmlspecialchars($allergies_food); ?></span></div>
            <div>Allergies (Drug): <span><?php echo htmlspecialchars($allergies_drug); ?></span></div>
            <div>Allergies (Epilepsy): <span><?php echo htmlspecialchars($allergies_epilepsy); ?></span></div>
            <div>Asthma: <span><?php echo htmlspecialchars($asthma); ?></span></div>
            <div>Congenital Heart Disorder: <span><?php echo htmlspecialchars($congenital_heart_disorder); ?></span></div>
            <div>Thyroid Disease: <span><?php echo htmlspecialchars($thyroid_disease); ?></span></div>
        </div>
        <div class="col-md-6">
            <div>Smoking: <span><?php echo htmlspecialchars($smoking); ?></span></div>
            <div>Smoking Pack/Day: <span><?php echo htmlspecialchars($smoking_pack_day); ?></span></div>
            <div>Smoking Years: <span><?php echo htmlspecialchars($smoking_years); ?></span></div>
            <div>Alcohol Drinking: <span><?php echo htmlspecialchars($alcohol_drinking); ?></span></div>
            <div>Alcohol Drink Types: <span><?php echo htmlspecialchars($alcohol_drinking_beer_wine); ?></span></div>
            <div>Bottles/Session: <span><?php echo htmlspecialchars($alcohol_bottles_session); ?></span></div>
            <div>Alcohol Frequency: <span><?php echo htmlspecialchars($alcohol_frequency); ?></span></div>
        </div>
    </div>

    <h4>PAST MEDICAL HISTORY:</h4>
    <div class="row">
        <div class="col-md-6">
            <div>Allergies (Skin Disorder): <span><?php echo htmlspecialchars($skin_disorder); ?></span></div>
            <div>Cancer: <span><?php echo htmlspecialchars($cancer); ?></span></div>
            <div>Diabetes: <span><?php echo htmlspecialchars($diabetes); ?></span></div>
            <div>Peptic Ulcer: <span><?php echo htmlspecialchars($peptic_ulcer); ?></span></div>
            <div>Tuberculosis: <span><?php echo htmlspecialchars($tuberculosis); ?></span></div>
            <div>Coronary Artery Disease: <span><?php echo htmlspecialchars($coronary_artery_disease); ?></span></div>
            <div>PCOS: <span><?php echo htmlspecialchars($pcos); ?></span></div>
        </div>
        <div class="col-md-6">
            <div>Hepatitis: <span><?php echo htmlspecialchars($hepatitis); ?></span></div>
            <div>Hypertension: <span><?php echo htmlspecialchars($hypertension); ?></span></div>
            <div>Psychological Disorder: <span><?php echo htmlspecialchars($psychological_disorder); ?></span></div>
            <div>Diagnosis 1: <span><?php echo htmlspecialchars($diagnosis_1); ?></span></div>
            <div>Diagnosis Date 1: <span><?php echo htmlspecialchars($diagnosis_date_1); ?></span></div>
            <div>Diagnosis 2: <span><?php echo htmlspecialchars($diagnosis_2); ?></span></div>
            <div>Diagnosis Date 2: <span><?php echo htmlspecialchars($diagnosis_date_2); ?></span></div>
        </div>
    </div>

    <h4>PAST SURGICAL HISTORY:</h4>
    <div class="row">
        <div class="col-md-6">
            <div>Operation Type 1: <span><?php echo htmlspecialchars($operation_type_1); ?></span></div>
            <div>When Surgery 1: <span><?php echo htmlspecialchars($when_surgery_1); ?></span></div>
            <div>Operation Type 2: <span><?php echo htmlspecialchars($operation_type_2); ?></span></div>
            <div>When Surgery 2: <span><?php echo htmlspecialchars($when_surgery_2); ?></span></div>
        </div>
        <div class="col-md-6">
            <div>Is Person with Disability: <span><?php echo htmlspecialchars($is_person_with_disability); ?></span></div>
            <div>Disability Specify: <span><?php echo htmlspecialchars($disability_specify); ?></span></div>
            <div>Is Registered: <span><?php echo htmlspecialchars($is_registered); ?></span></div>
            <div>Is Not Registered: <span><?php echo htmlspecialchars($is_not_registered); ?></span></div>
        </div>
    </div>

    <h4>WILLING TO DONATE BLOOD:</h4>
    <div><?php echo htmlspecialchars($willing_to_donate_blood); ?></div>

    <h4>Family History:</h4>
    <div class="row">
        <div class="col-md-6">
            <div>Family History (Mother): <span><?php echo htmlspecialchars($family_history_mother); ?></span></div>
            <div>Family History (Father): <span><?php echo htmlspecialchars($family_history_father); ?></span></div>
        </div>
    </div>

    <h4>Immunizations:</h4>
    <div class="row">
        <div class="col-md-6">
            <div>HPV Doses: <span><?php echo htmlspecialchars($hpv_doses); ?></span></div>
            <div>Tetanus Doses: <span><?php echo htmlspecialchars($tetanus_doses); ?></span></div>
            <div>Influenza Year: <span><?php echo htmlspecialchars($influenza_year); ?></span></div>
            <div>Pneumococcal Doses: <span><?php echo htmlspecialchars($pneumococcal_doses); ?></span></div>
        </div>
        <div class="col-md-6">
            <div>COVID Brand (1st Dose): <span><?php echo htmlspecialchars($covid_brand_1st_dose); ?></span></div>
            <div>COVID Brand (2nd Dose): <span><?php echo htmlspecialchars($covid_brand_2nd_dose); ?></span></div>
            <div>COVID Brand (1st Booster): <span><?php echo htmlspecialchars($covid_brand_1st_booster); ?></span></div>
            <div>COVID Brand (2nd Booster): <span><?php echo htmlspecialchars($covid_brand_2nd_booster); ?></span></div>
        </div>
    </div>

    <h4>College Clinic File Number:</h4>
    <div><?php echo htmlspecialchars($college_clinic_file_number); ?></div>
</div>

            <div class="print-button mt-3">
                <button class="btn btn-success" id="printButton">Print</button>
            </div>
        </main>
    </div>
</div>

<script>
document.getElementById('printButton').addEventListener('click', function() {
    window.print(); // Directly trigger the print dialog
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
