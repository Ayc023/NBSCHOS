<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "../config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM personal_health_profile WHERE medical_id = ?"; // Change 'basic_info' to 'personal_health_profile'

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                // Fetch result row as an associative array
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field values
                $date = $row["date"];
                $clinic_file_number = $row["clinic_file_number"];
                $college_course = $row["college_course"];
                $name = $row["name"];
                $age_sex = $row["age_sex"];
                $birthday = $row["birthday"];
                $home_address = $row["home_address"];
                $religion = $row["religion"];
                $municipal_address = $row["municipal_address"];
                $occupation = $row["occupation"];
                $contact_number = $row["contact_number"];
                $civil_status = $row["civil_status"];
                $emergency_contact_name = $row["emergency_contact_name"];
                $emergency_contact_number = $row["emergency_contact_number"];
                $emergency_contact_address = $row["emergency_contact_address"];
                $emergency_contact_relationship = $row["emergency_contact_relationship"];
                $smoking = $row["smoking"];
                $alcohol_drinking = $row["alcohol_drinking"];
                $drug_use = $row["drug_use"];
                $sexually_active = $row["sexually_active"];
                $smoking_details = $row["smoking_details"];
                $alcohol_details = $row["alcohol_details"];
                $alcohol_frequency = $row["alcohol_frequency"];
                $sexual_partners_male = $row["sexual_partners_male"];
                $sexual_partners_female = $row["sexual_partners_female"];
                $sexual_partners_both = $row["sexual_partners_both"];
                $allergies = $row["allergies"];
                $medical_conditions = $row["medical_conditions"];
                $hospital_admissions = $row["hospital_admissions"];
                $diagnosis_1 = $row["diagnosis_1"];
                $when_1 = $row["when_1"];
                $diagnosis_2 = $row["diagnosis_2"];
                $when_2 = $row["when_2"];
                $operation_type_1 = $row["operation_type_1"];
                $when_surgery_1 = $row["when_surgery_1"];
                $operation_type_2 = $row["operation_type_2"];
                $when_surgery_2 = $row["when_surgery_2"];
                $disability_status = $row["disability_status"];
                $disability_description = $row["disability_description"];
                $registration_status = $row["registration_status"];
                $donate_blood = $row["donate_blood"];
                $family_history_mother = $row["family_history_mother"];
                $family_history_father = $row["family_history_father"];
                $newborn_immunizations = $row["newborn_immunizations"];
                $hpv_vaccine = $row["hpv_vaccine"];
                $hpv_doses = $row["hpv_doses"];
                $tetanus_toxoid = $row["tetanus_toxoid"];
                $tetanus_doses = $row["tetanus_doses"];
                $influenza = $row["influenza"];
                $influenza_year = $row["influenza_year"];
                $pneumococcal_vaccine = $row["pneumococcal_vaccine"];
                $pneumococcal_doses = $row["pneumococcal_doses"];
                $covid_vaccine = $row["covid_vaccine"];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/read.css">
</head>
<style>
  /* General Styling */
body {
    background-color: #f0f8ff; /* Light blue background */
    margin: 0;
    padding-top: 70px; /* Ensure content starts below the navbar */
    font-family: 'Arial', sans-serif;
}

    /* Navbar Customization */
.navbar {
    background-color: #003366; /* Dark blue background for navbar */
    padding: 15px 20px; /* Increased padding for a more prominent navbar */
    position: fixed; /* Fix the navbar to the top */
    width: 100%;
    top: 0;
    z-index: 1000; /* Ensure the navbar stays above other elements */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

.navbar-brand {
    color: white; /* White text for brand */
    font-weight: bold;
    display: flex;
    align-items: center;
}

.navbar-brand img {
    margin-right: 10px; /* Spacing between logo and text */
}

.navbar-nav .nav-link {
    color: white; /* White text for nav links */
}

.navbar-nav .nav-link:hover {
    color: #f0f8ff; /* Light blue on hover */
}

.navbar-toggler {
    border-color: #f0f8ff; /* Light blue border for toggler */
}

.navbar-toggler-icon {
    background-image: url("src/Nbsc_logo-removebg-preview.png"); /* Light blue icon */
}

/* Dropdown Menu */
.dropdown-menu {
    background-color: #f0f8ff; /* Light blue background for dropdown */
    border: 1px solid #d0d0d0; /* Subtle border for dropdown */
}

.dropdown-item {
    color: #003366; /* DodgerBlue text for dropdown items */
    padding: 10px 20px; /* Increased padding for dropdown items */
}


.dropdown-item:hover {
    background-color: #003366; /* Slightly darker blue on hover */
    color: white; /* White text on hover */
}


    /* Wrapper Styling */
    .wrapper {
    width: 90%; /* Increased width for the wrapper */
    max-width: 1200px; /* Limit the maximum width */
    margin: 0 auto;
    padding: 40px; /* Adjusted padding */
    background-color: #ffffff; /* White background for the container */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
}

/* Table Container */
.table-container {
    margin-top: 30px;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
}

    /* Horizontal Table Styling */
    .horizontal-table {
        display: flex;
        flex-wrap: wrap;
        gap: 15px; /* Adding space between rows */
    }

    .horizontal-table .row {
        display: flex;
        width: 100%;
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .horizontal-table .row:last-child {
        border-bottom: none;
    }

    .horizontal-table .row .column {
        flex: 1 1 250px;
        padding: 0 15px;
    }

    .horizontal-table .label {
        font-weight: bold;
        background-color: #003366;
        color: white;
        padding: 10px;
        border-radius: 4px;
        display: inline-block;
        width: 100%;
        margin-bottom: 5px;
        text-align: center; /* Center-align label text */
    }

    .horizontal-table .value {
        padding: 10px;
        background-color: #f7f7f7;
        border-radius: 4px;
        font-size: 1rem; /* Uniform font size */
    }

    /* Button Styling */
    .btn-primary {
        background-color: #003366;
        border-color: #003366;
        color: white;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #00509e; /* Lighter blue for hover */
        transform: scale(1.05); /* Slightly enlarge button */
    }
</style>

<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-1">
        <a class="navbar-brand ps-2" href="#">
            <img src="../src/Nbsc_logo-removebg-preview.png" style="height: 0.3in;">
            NBSC HOS
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav ms-auto mb-1 mb-lg-0 flex-nowrap">
            <li class="nav-item">
                <a class="nav-link" href="add_medical_info.php">Medical</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="add_dental_info.php">Dental</a>
            </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Panel</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        <li><a class="dropdown-item" href="welcome.php">Home</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <h2 class="text-center">Personal Health Profile</h2>
        <div class="table-container">
            <div class="horizontal-table">
                <div class="row">
                    <div class="column">
                        <div class="label">Date</div>
                        <div class="value"><?php echo htmlspecialchars($date); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Clinic File Number</div>
                        <div class="value"><?php echo htmlspecialchars($clinic_file_number); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">College Course</div>
                        <div class="value"><?php echo htmlspecialchars($college_course); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Name</div>
                        <div class="value"><?php echo htmlspecialchars($name); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Age & Sex</div>
                        <div class="value"><?php echo htmlspecialchars($age_sex); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Birthday</div>
                        <div class="value"><?php echo htmlspecialchars($birthday); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="label">Home Address</div>
                        <div class="value"><?php echo htmlspecialchars($home_address); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Religion</div>
                        <div class="value"><?php echo htmlspecialchars($religion); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Municipal Address</div>
                        <div class="value"><?php echo htmlspecialchars($municipal_address); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Occupation</div>
                        <div class="value"><?php echo htmlspecialchars($occupation); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Contact Number</div>
                        <div class="value"><?php echo htmlspecialchars($contact_number); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Civil Status</div>
                        <div class="value"><?php echo htmlspecialchars($civil_status); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="label">Emergency Contact Name</div>
                        <div class="value"><?php echo htmlspecialchars($emergency_contact_name); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Emergency Contact Number</div>
                        <div class="value"><?php echo htmlspecialchars($emergency_contact_number); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Emergency Contact Address</div>
                        <div class="value"><?php echo htmlspecialchars($emergency_contact_address); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Emergency Contact Relationship</div>
                        <div class="value"><?php echo htmlspecialchars($emergency_contact_relationship); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Smoking</div>
                        <div class="value"><?php echo htmlspecialchars($smoking); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Alcohol Drinking</div>
                        <div class="value"><?php echo htmlspecialchars($alcohol_drinking); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="label">Drug Use</div>
                        <div class="value"><?php echo htmlspecialchars($drug_use); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Sexually Active</div>
                        <div class="value"><?php echo htmlspecialchars($sexually_active); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Smoking Details</div>
                        <div class="value"><?php echo htmlspecialchars($smoking_details); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Alcohol Details</div>
                        <div class="value"><?php echo htmlspecialchars($alcohol_details); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Alcohol Frequency</div>
                        <div class="value"><?php echo htmlspecialchars($alcohol_frequency); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Sexual Partners (Male)</div>
                        <div class="value"><?php echo htmlspecialchars($sexual_partners_male); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="label">Sexual Partners (Female)</div>
                        <div class="value"><?php echo htmlspecialchars($sexual_partners_female); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Sexual Partners (Both)</div>
                        <div class="value"><?php echo htmlspecialchars($sexual_partners_both); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Allergies</div>
                        <div class="value"><?php echo htmlspecialchars($allergies); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Medical Conditions</div>
                        <div class="value"><?php echo htmlspecialchars($medical_conditions); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Hospital Admissions</div>
                        <div class="value"><?php echo htmlspecialchars($hospital_admissions); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Diagnosis 1</div>
                        <div class="value"><?php echo htmlspecialchars($diagnosis_1); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="label">When 1</div>
                        <div class="value"><?php echo htmlspecialchars($when_1); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Diagnosis 2</div>
                        <div class="value"><?php echo htmlspecialchars($diagnosis_2); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">When 2</div>
                        <div class="value"><?php echo htmlspecialchars($when_2); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Operation Type 1</div>
                        <div class="value"><?php echo htmlspecialchars($operation_type_1); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">When Surgery 1</div>
                        <div class="value"><?php echo htmlspecialchars($when_surgery_1); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Operation Type 2</div>
                        <div class="value"><?php echo htmlspecialchars($operation_type_2); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="label">When Surgery 2</div>
                        <div class="value"><?php echo htmlspecialchars($when_surgery_2); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Disability Status</div>
                        <div class="value"><?php echo htmlspecialchars($disability_status); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Disability Description</div>
                        <div class="value"><?php echo htmlspecialchars($disability_description); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Registration Status</div>
                        <div class="value"><?php echo htmlspecialchars($registration_status); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Donate Blood</div>
                        <div class="value"><?php echo htmlspecialchars($donate_blood); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Family History (Mother)</div>
                        <div class="value"><?php echo htmlspecialchars($family_history_mother); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="label">Family History (Father)</div>
                        <div class="value"><?php echo htmlspecialchars($family_history_father); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Newborn Immunizations</div>
                        <div class="value"><?php echo htmlspecialchars($newborn_immunizations); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">HPV Vaccine</div>
                        <div class="value"><?php echo htmlspecialchars($hpv_vaccine); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">HPV Doses</div>
                        <div class="value"><?php echo htmlspecialchars($hpv_doses); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Tetanus Toxoid</div>
                        <div class="value"><?php echo htmlspecialchars($tetanus_toxoid); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Tetanus Doses</div>
                        <div class="value"><?php echo htmlspecialchars($tetanus_doses); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="label">Influenza</div>
                        <div class="value"><?php echo htmlspecialchars($influenza); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Influenza Year</div>
                        <div class="value"><?php echo htmlspecialchars($influenza_year); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Pneumococcal Vaccine</div>
                        <div class="value"><?php echo htmlspecialchars($pneumococcal_vaccine); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">Pneumococcal Doses</div>
                        <div class="value"><?php echo htmlspecialchars($pneumococcal_doses); ?></div>
                    </div>
                    <div class="column">
                        <div class="label">COVID Vaccine</div>
                        <div class="value"><?php echo htmlspecialchars($covid_vaccine); ?></div>
                    </div>
                    <div class="text-center mt-4">
            <button class="btn btn-primary" onclick="history.back()">Go Back</button>
        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
