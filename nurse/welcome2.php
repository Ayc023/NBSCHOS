<?php
// Initialize the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Regenerate the session ID to prevent session fixation attacks
session_regenerate_id(true);

// Check if the user is logged in, if not then redirect them to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBSC Health Office System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../styles/welcome2.css">
    <style>
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-2">
    <a class="navbar-brand ps-2" href="#">
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
                </ul>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="medical_record.php" class="card-link">
                <div class="card">
                    <div class="card-header">
                        Medical Records
                    </div>
                    <div class="card-body">
                        <i class="fas fa-medkit"></i>
                        <span class="text">Medical Records</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="dental_record.php" class="card-link">
                <div class="card">
                    <div class="card-header">
                        Dental Records
                    </div>
                    <div class="card-body">
                        <i class="fas fa-tooth"></i>
                        <span class="text">Dental Records</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="medicine_record.php" class="card-link">
                <div class="card">
                    <div class="card-header">
                        Medicine Records
                    </div>
                    <div class="card-body">
                        <i class="fas fa-capsules"></i>
                        <span class="text">Medicine Records</span>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <a href="followup_checkup_page.html" class="card-link">
                <div class="card">
                    <div class="card-header">
                        Follow-up Checkup
                    </div>
                    <div class="card-body">
                        <i class="fas fa-stethoscope"></i>
                        <span class="text">Follow-up Checkup</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="statistical_dashboard_page.html" class="card-link">
                <div class="card">
                    <div class="card-header">
                        Statistical Dashboard
                    </div>
                    <div class="card-body">
                        <i class="fas fa-chart-bar"></i>
                        <span class="text">Statistical Dashboard</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="inventory_page.html" class="card-link">
                <div class="card">
                    <div class="card-header">
                        Inventory
                    </div>
                    <div class="card-body">
                        <i class="fas fa-boxes"></i>
                        <span class="text">Inventory</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
</body>
</html>
