<?php
require_once "../config.php";

// Initialize variables for patient data
$patient_id = isset($_GET['basic_info_id']) ? trim($_GET['basic_info_id']) : '';
$firstname = $middlename = $lastname = $age = $sex = $birthday = $home_address = $contact_number = $religion = $occupation = $civil_status = $complete_name = $address = $emergency_contact_number = $emergency_contact_relationship = $college_clinic_file_number = '';
$smoking = $smoking_pack_day = $smoking_years = $alcohol_drinking = $alcohol_drink_types = ''; // Initialize new variables

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
            $smoking = $row['basic_info_smoking']; // Fetch smoking data
            $smoking_pack_day = $row['basic_info_smoking_pack_day']; // Fetch smoking pack/day data
            $smoking_years = $row['basic_info_smoking_years']; // Fetch years smoking data
            $alcohol_drinking = $row['basic_info_alcohol_drinking']; // Fetch alcohol drinking data
            $alcohol_drink_types = $row['basic_info_alcohol_drink_types']; 
             $alcohol_drink_types = $row['basic_info_alcohol_drink_types']; // Fetch alcohol drink types data
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
$sql = "SELECT basic_info_id, basic_info_firstname, basic_info_lastname FROM basic_info";
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sidebar_patients[] = $row;
    }
    mysqli_free_result($result);
} else {
    echo "Error fetching patient names.";
}
// Initialize search term
$search_term = isset($_GET['search_term']) ? trim($_GET['search_term']) : '';

// Fetch all or filtered patient names for the sidebar
$sidebar_patients = [];

if ($search_term) {
    // Search based on the first name or last name
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
    // If no search term is provided, fetch all patient names
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
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-DCUO7MBcNPiqP+DdC6sK2jVSXyCegiRvqvwAa9xHvNGXKtyq6vy9WRbTCodQI" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9jEO9G5C0EYyIvJraSgx70fF97uFJRAZsZ91zDFVP2EjT2Vr5A5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-DSB3mYFi3LBGDS0sEkDqGzFz7sU8nYFcSQkXtE8pKIC5sP06Upu9ROd1NNFw1nmbd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-M/V3k3sFulpfWZKR/u2XFuDqhKVGiSbS2CtnRa1vNhQFkxhxRFtHv/OVzfVJQ8cjgwtdzNdTtKQsKhcEUpmjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../styles/medicalrecs.css">
    <style>
  
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="#">
        <img src="../src/Nbsc_logo-removebg-preview.png" alt="NBSC HOS" width="50" height="50">
        NBSC HOS
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
            <div class="profile">
                <h4>Basic Information</h4>
                <div class="row">
                    <div class="col-md-6">
                    <div>Patient ID: <span><?php echo htmlspecialchars($patient_id); ?></span></div>
                        <div>First Name: <span><?php echo htmlspecialchars($firstname); ?></span></div>
                        <div>Middle Name: <span><?php echo htmlspecialchars($middlename); ?></span></div>
                        <div>Last Name: <span><?php echo htmlspecialchars($lastname); ?></span></div>
                        <div>Age: <span><?php echo htmlspecialchars($age); ?></span></div>
                        <div>Sex: <span><?php echo htmlspecialchars($sex); ?></span></div>
                        <div>Birthday: <span><?php echo htmlspecialchars($birthday); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>Home Address: <span><?php echo htmlspecialchars($home_address); ?></span></div>
                        <div>Contact Number: <span><?php echo htmlspecialchars($contact_number); ?></span></div>
                        <div>Religion: <span><?php echo htmlspecialchars($religion); ?></span></div>
                        <div>Occupation: <span><?php echo htmlspecialchars($occupation); ?></span></div>
                        <div>Civil Status: <span><?php echo htmlspecialchars($civil_status); ?></span></div>
                    </div>
                </div>
                <h4>In Case of Emergency</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div>Complete Name: <span><?php echo htmlspecialchars($complete_name); ?></span></div>
                        <div>Address: <span><?php echo htmlspecialchars($address); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>Contact: <span><?php echo htmlspecialchars($contact_number); ?></span></div>
                        <div>Relationship: <span><?php echo htmlspecialchars($emergency_contact_relationship); ?></span></div>
                    </div>
                </div>

                <h4>Additional Information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div>Smoking: <span><?php echo htmlspecialchars($smoking); ?></span></div>
                        <div>Smoking Pack/Day: <span><?php echo htmlspecialchars($smoking_pack_day); ?></span></div>
                        <div>Years Smoking: <span><?php echo htmlspecialchars($smoking_years); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>Alcohol Drinking: <span><?php echo htmlspecialchars($alcohol_drinking); ?></span></div>
                        <div>Alcohol Drink Types: <span><?php echo htmlspecialchars($alcohol_drink_types); ?></span></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9jEO9G5C0EYyIvJraSgx70fF97uFJRAZsZ91zDFVP2EjT2Vr5A5" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-DSB3mYFi3LBGDS0sEkDqGzFz7sU8nYFcSQkXtE8pKIC5sP06Upu9ROd1NNFw1nmbd" crossorigin="anonymous"></script>
</body>
</html>
