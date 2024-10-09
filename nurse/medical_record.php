<?php
require_once "../config.php";

// Initialize variables for patient data
$patient_id = isset($_GET['basic_info_id']) ? trim($_GET['basic_info_id']) : '';
$firstname = $middlename = $lastname = $age = $sex = $birthday = $home_address = $contact_number = $religion = $occupation = $civil_status = $complete_name = $address = $emergency_contact_number = $emergency_contact_relationship = $college_clinic_file_number = '';
$smoking = $smoking_pack_day = $smoking_years = $alcohol_drinking = $alcohol_drink_types = '';

// Fetch patient data from the database
if ($patient_id) {
    $sql = "SELECT * FROM basic_info WHERE basic_info_id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $firstname = $row['basic_info_firstname'];
            $middlename = $row['basic_info_middlename'];
            $lastname = $row['basic_info_lastname'];
            $age = $row['basic_info_age'];
            $sex = $row['basic_info_sex'];
            $birthday = $row['basic_info_birthday'];
            $home_address = $row['basic_info_home_address'];
            $contact_number = $row['basic_contact_number'];
            $religion = $row['basic_religion'];
            $occupation = $row['basic_occupation'];
            $civil_status = $row['basic_civil_status'];
            $complete_name = $row['basic_complete_name'];
            $address = $row['basic_address'];
            $emergency_contact_number = $row['basic_contact'];
            $emergency_contact_relationship = $row['basic_relationship'];
            $college_clinic_file_number = $row['basic_college_clinic_file_number'];
            $smoking = $row['basic_info_smoking'];
            $smoking_pack_day = $row['basic_info_smoking_pack_day'];
            $smoking_years = $row['basic_info_smoking_years'];
            $alcohol_drinking = $row['basic_info_alcohol_drinking'];
            $alcohol_drink_types = $row['basic_info_alcohol_drink_types'];
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
    $sql = "SELECT basic_info_id, basic_info_firstname, basic_info_lastname FROM basic_info WHERE basic_info_firstname LIKE ? OR basic_info_lastname LIKE ?";
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
    $sql = "SELECT basic_info_id, basic_info_firstname, basic_info_lastname FROM basic_info";
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
                <li class="list-group-item <?php echo $patient_id == $patient['basic_info_id'] ? 'active' : ''; ?>">
                    <a href="?basic_info_id=<?php echo $patient['basic_info_id']; ?>">
                        <?php echo htmlspecialchars($patient['basic_info_firstname'] . ' ' . $patient['basic_info_lastname']); ?>
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
                    <div class="col-md-6">
                        <div>First Name: <span><?php echo htmlspecialchars($firstname); ?></span></div>
                        <div>Middle Name: <span><?php echo htmlspecialchars($middlename); ?></span></div>
                        <div>Last Name: <span><?php echo htmlspecialchars($lastname); ?></span></div>
                        <div>Occupation: <span><?php echo htmlspecialchars($occupation); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>Age: <span><?php echo htmlspecialchars($age); ?></span></div>
                        <div>Sex: <span><?php echo htmlspecialchars($sex); ?></span></div>
                        <div>Birthday: <span><?php echo htmlspecialchars($birthday); ?></span></div>
                        <div>Home Address: <span><?php echo htmlspecialchars($home_address); ?></span></div>
                    </div>
                </div>
                <h4>Contact Information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div>Contact Number: <span><?php echo htmlspecialchars($contact_number); ?></span></div>
                        <div>Religion: <span><?php echo htmlspecialchars($religion); ?></span></div>
                        <div>Civil Status: <span><?php echo htmlspecialchars($civil_status); ?></span></div>
                    </div>
                </div>
                <h4>Emergency Contact</h4>
                <div class="row">
                    <div class="col-md-6">
                    <div>Complete Name: <span><?php echo htmlspecialchars($complete_name); ?></span></div>
                    <div>Address: <span><?php echo htmlspecialchars($address); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>Contact Number: <span><?php echo htmlspecialchars($emergency_contact_number); ?></span></div>
                        <div>Relationship: <span><?php echo htmlspecialchars($emergency_contact_relationship); ?></span></div>
                    </div>
                </div>
                <h4>College Clinic File Number</h4>
                <div><?php echo htmlspecialchars($college_clinic_file_number); ?></div>
                <h4>Health Habits</h4>
                <div>Smoking: <span><?php echo htmlspecialchars($smoking); ?></span></div>
                <div>Smoking Pack/Day: <span><?php echo htmlspecialchars($smoking_pack_day); ?></span></div>
                <div>Smoking Years: <span><?php echo htmlspecialchars($smoking_years); ?></span></div>
                <div>Alcohol Drinking: <span><?php echo htmlspecialchars($alcohol_drinking); ?></span></div>
                <div>Alcohol Drink Types: <span><?php echo htmlspecialchars($alcohol_drink_types); ?></span></div>
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
