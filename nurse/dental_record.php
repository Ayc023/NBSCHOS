<?php
require_once "../config.php";

// Initialize variables for dental data
$dental_id = isset($_GET['dental_id']) ? trim($_GET['dental_id']) : '';
$dental_name = $dental_age = $dental_address = $dental_tel_no = $dental_course_taken_year = '';
$dental_date = $dental_date_of_birth = $dental_sex = $dental_civil_status = $dental_allergy_medication_food = $dental_type = '';

// Fetch patient data from the database
if ($dental_id) {
    $sql = "SELECT * FROM dental WHERE dental_id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $dental_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $dental_date = $row['dental_date']; 
            $dental_type = $row['dental_type']; 
            $dental_name = $row['dental_name']; // Combine firstname and lastname for dental name
            $dental_age = $row['dental_age'];
            $dental_sex = $row['dental_sex'];
            $dental_date_of_birth = $row['dental_date_of_birth'];
            $dental_address = $row['dental_address'];
            $dental_tel_no = $row['dental_tel_no'];
            $dental_course_taken_year = $row['dental_course_taken_year'];
            $dental_civil_status = $row['dental_civil_status'];
            $dental_allergy_medication_food = $row['dental_allergy_medication_food'];
            // Additional fields for smoking, alcohol, etc. could be added here if needed.
        } else {
            echo "No record found for the given ID.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement.";
    }
}

// Example: Insert data into dental table
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the dental-specific fields
    $dental_type = isset($_POST['dental_type']) ? trim($_POST['dental_type']) : '';
    $dental_date = isset($_POST['dental_date']) ? trim($_POST['dental_date']) : '';
    $dental_course_taken_year = isset($_POST['dental_course_taken_year']) ? trim($_POST['dental_course_taken_year']) : '';
    $dental_allergy_medication_food = isset($_POST['dental_allergy_medication_food']) ? trim($_POST['dental_allergy_medication_food']) : '';

    $sql_insert = "INSERT INTO dental (dental_type, dental_date, dental_name, dental_age, dental_address, dental_tel_no, dental_course_taken_year, dental_date_of_birth, dental_sex, dental_civil_status, dental_allergy_medication_food) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt_insert = mysqli_prepare($link, $sql_insert)) {
        mysqli_stmt_bind_param($stmt_insert, "sssssssssss", $dental_type, $dental_date, $dental_name, $dental_age, $dental_address, $dental_tel_no, $dental_course_taken_year, $dental_date_of_birth, $dental_sex, $dental_civil_status, $dental_allergy_medication_food);
        if (mysqli_stmt_execute($stmt_insert)) {
            echo "Dental record inserted successfully.";
        } else {
            echo "Error inserting dental record.";
        }
        mysqli_stmt_close($stmt_insert);
    } else {
        echo "Error preparing insert statement.";
    }
}

// Fetch all patient names for the sidebar
$sidebar_dental_records = [];
$sql = "SELECT dental_id, dental_name FROM dental";
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sidebar_dental_records[] = $row;
    }
    mysqli_free_result($result);
} else {
    echo "Error fetching dental records: " . mysqli_error($link);
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/medicalrecs.css">
    <style>
        /* Add any custom styles here */
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
                <input type="text" class="form-control" placeholder="Search patient" aria-label="Search patient">
                <button class="btn btn-outline-secondary" type="button">Search</button>
            </div>
            <ul class="list-group">
                <?php foreach ($sidebar_dental_records as $dental_record) : ?>
                <li class="list-group-item <?php echo $dental_id == $dental_record['dental_id'] ? 'active' : ''; ?>">
                    <a href="?dental_id=<?php echo $dental_record['dental_id']; ?>">
                        <?php echo htmlspecialchars($dental_record['dental_name']); ?>
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
                    DENTAL PROFILE
                </h5>
            </div>
            <div class="profile">
                <h4>Dental Information</h4>
                <div class="row">
                    <div class="col-md-6">
                    <div>Name: <span><?php echo htmlspecialchars($dental_name); ?></span></div>
                        <div>Type: <span><?php echo htmlspecialchars($dental_type); ?></span></div>
                        <div>Date: <span><?php echo htmlspecialchars($dental_date); ?></span></div>
                        <div>Address: <span><?php echo htmlspecialchars($dental_address); ?></span></div>
                        <div>Telephone No: <span><?php echo htmlspecialchars($dental_tel_no); ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div>Course Taken Year: <span><?php echo htmlspecialchars($dental_course_taken_year); ?></span></div>
                        <div>Date of Birth: <span><?php echo htmlspecialchars($dental_date_of_birth); ?></span></div>
                        <div>Civil Status: <span><?php echo htmlspecialchars($dental_civil_status); ?></span></div>
                        <div>Allergies: <span><?php echo htmlspecialchars($dental_allergy_medication_food); ?></span></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
