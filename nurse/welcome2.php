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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #003366;
            color: #fff;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }

        .sidebar .logo {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .logo img {
            width: 50px;
            height: 50px;
        }

        .sidebar .nav-link {
            padding: 15px;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link:hover {
            background-color: #004080;
            text-decoration: none;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }

        .navbar-custom {
            background-color: #003366;
            color: #fff;
        }

        .navbar-custom .navbar-brand {
            color: #fff;
        }

        .navbar-custom .navbar-brand:hover {
            color: #ddd;
        }

        .navbar-custom .nav-link {
            color: #fff;
        }

        .navbar-custom .nav-link:hover {
            color: #ddd;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .card-text {
            font-size: 14px;
            color: #666;
        }

        .card .btn-primary {
            background-color: #003366;
            border-color: #003366;
        }

        .card .btn-primary:hover {
            background-color: #004080;
            border-color: #004080;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="../src/Nbsc_logo-removebg-preview.png" alt="NBSC HOS">
            <h4>NBSC HOS</h4>
        </div>
        <a href="medical_record.php" class="nav-link">
            <i class="fas fa-medkit"></i>
            Health Profile
        </a>
        <a href="medicine_record.php" class="nav-link">
            <i class="fas fa-capsules"></i>
            Pharmacy
        </a>
        <a href="../charts-main/chartdisplay.html" class="nav-link">
            <i class="fas fa-chart-bar"></i>
            Statistical Dashboard
        </a>
        <a href="inventory.php" class="nav-link">
            <i class="fas fa-boxes"></i>
            Inventory
        </a>
        <a href="../logout.php" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <a class="navbar-brand ps-2" href="#">
                NBSC Health Office System
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
                            <li><a class="dropdown-item" href="../diagnosis/diagnostic.html">Diagnosis</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <h1 class="mt-3">Dashboard</h1>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Medical Records</h5>
                        <p class="card-text">Manage and access all medical records with ease.</p>
                        <a href="medical_record.php" class="btn btn-primary">View Records</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dental Records</h5>
                        <p class="card-text">View and maintain all dental health data.</p>
                        <a href="dental_record.php" class="btn btn-primary">View Records</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inventory</h5>
                        <p class="card-text">Track and manage medicine and other resources.</p>
                        <a href="inventory.php" class="btn btn-primary">View Inventory</a>
                    </div>
                </div>
            </div>
            <div class="mt-5">
    <h3>Recent Records</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Record Type</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example rows, dynamically populate these using PHP or JavaScript -->
                <tr>
                    <td>1</td>
                    <td>Medical</td>
                    <td>2024-11-15</td>
                    <td>John Doe</td>
                    <td>Checkup completed</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Dental</td>
                    <td>2024-11-14</td>
                    <td>Jane Smith</td>
                    <td>Cleaning done</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
