<?php
require_once "../config.php";

// Initialize variables for patient data
$patient_id = isset($_GET['id']) ? trim($_GET['id']) : '';
$date = $surname = $given_name = $middle_name = $address = $course_year = $sex = $civil_status = $age = $tel_no = $dob = $allergy = $medical_treatment = $taking_drugs = $special_diet = $shortness_breath = $complication_healing = $general_health = $pregnant = $profuse_bleeding = $major_operation = $sweat_nights = $heart_ailment = $high_blood_pressure = $diabetes = $rheumatic_fever = $lung_disease = $liver_disease = $signature = '';

// Fetch patient data from the database
if ($patient_id) {
    $sql = "SELECT * FROM dental_records WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
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
    $sql = "SELECT id, given_name, surname FROM dental_records WHERE given_name LIKE ? OR surname LIKE ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        $search_param = '%' . $search_term . '%';
        mysqli_stmt_bind_param($stmt, 'ss', $search_param, $search_param);
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
    $sql = "SELECT id, given_name, surname FROM dental_records";
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
                <li class="list-group-item <?php echo $patient_id == $patient['id'] ? 'active' : ''; ?>">
                    <a href="?id=<?php echo $patient['id']; ?>">
                        <?php echo htmlspecialchars($patient['given_name'] . ' ' . $patient['surname']); ?>
                    </a>
                    <!-- Edit Icon -->
                    <a href="edit.php?id=<?php echo $patient['id']; ?>" class="text-success ms-2" title="Edit Patient">
                        <i class="fas fa-edit"></i>
                    </a>
                    <!-- Delete Icon -->
                    <a href="delete.php?id=<?php echo $patient['id']; ?>" class="text-danger ms-2" title="Delete Patient" onclick="return confirm('Are you sure you want to delete this patient?');">
                        <i class="fas fa-trash-alt"></i>
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
                <h4>PERSONAL PROFILE</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div>Date: <span><?php echo htmlspecialchars($date); ?></span></div>
                        <div>Surname: <span><?php echo htmlspecialchars($surname); ?></span></div>
                        <div>Given Name: <span><?php echo htmlspecialchars($given_name); ?></span></div>
                        <div>Middle Name: <span><?php echo htmlspecialchars($middle_name); ?></span></div>
                        <div>Address: <span><?php echo htmlspecialchars($address); ?></span></div>
                        <div>Course/Year: <span><?php echo htmlspecialchars($course_year); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>Sex: <span><?php echo htmlspecialchars($sex); ?></span></div>
                        <div>Civil Status: <span><?php echo htmlspecialchars($civil_status); ?></span></div>
                        <div>Age: <span><?php echo htmlspecialchars($age); ?></span></div>
                        <div>Contact Number: <span><?php echo htmlspecialchars($tel_no); ?></span></div>
                        <div>Date of Birth: <span><?php echo htmlspecialchars($dob); ?></span></div>
                    </div>
                </div>

                <h4>HEALTH PROFILE</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div>Allergy: <span><?php echo htmlspecialchars($allergy); ?></span></div>
                        <div>Medical Treatment: <span><?php echo htmlspecialchars($medical_treatment); ?></span></div>
                        <div>Taking Drugs: <span><?php echo htmlspecialchars($taking_drugs); ?></span></div>
                        <div>Special Diet: <span><?php echo htmlspecialchars($special_diet); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>Shortness of Breath: <span><?php echo htmlspecialchars($shortness_breath); ?></span></div>
                        <div>Complication Healing: <span><?php echo htmlspecialchars($complication_healing); ?></span></div>
                        <div>General Health: <span><?php echo htmlspecialchars($general_health); ?></span></div>
                        <div>Pregnant: <span><?php echo htmlspecialchars($pregnant); ?></span></div>
                    </div>
                </div>

                <h4>ADDITIONAL HEALTH INFORMATION</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div>Profuse Bleeding: <span><?php echo htmlspecialchars($profuse_bleeding); ?></span></div>
                        <div>Major Operation: <span><?php echo htmlspecialchars($major_operation); ?></span></div>
                        <div>Sweat Nights: <span><?php echo htmlspecialchars($sweat_nights); ?></span></div>
                        <div>Heart Ailment: <span><?php echo htmlspecialchars($heart_ailment); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>High Blood Pressure: <span><?php echo htmlspecialchars($high_blood_pressure); ?></span></div>
                        <div>Diabetes: <span><?php echo htmlspecialchars($diabetes); ?></span></div>
                        <div>Rheumatic Fever: <span><?php echo htmlspecialchars($rheumatic_fever); ?></span></div>
                        <div>Lung Disease: <span><?php echo htmlspecialchars($lung_disease); ?></span></div>
                    </div>
                </div>

                <h4>SIGNATURE</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div>Signature: <span><?php echo htmlspecialchars($signature); ?></span></div>
                    </div>
                </div>

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