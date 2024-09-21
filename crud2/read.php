<?php
// Check existence of dental_id parameter before processing further
if(isset($_GET["dental_id"]) && !empty(trim($_GET["dental_id"]))){
    // Include config file
    require_once "../config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM dental WHERE dental_id = :dental_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":dental_id", $param_dental_id);
        
        // Set parameters
        $param_dental_id = trim($_GET["dental_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                // Fetch result row as an associative array
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field values
                $dental_type = $row["dental_type"];
                $dental_date = $row["dental_date"];
                $dental_name = $row["dental_name"];
                $dental_age = $row["dental_age"];
                $dental_address = $row["dental_address"];
                $dental_tel_no = $row["dental_tel_no"];
                $dental_course_taken_year = $row["dental_course_taken_year"];
                $dental_date_of_birth = $row["dental_date_of_birth"];
                $dental_sex = $row["dental_sex"];
                $dental_civil_status = $row["dental_civil_status"];
                $dental_allergy_medication_food = $row["dental_allergy_medication_food"];
            } else{
                // URL doesn't contain valid dental_id parameter. Redirect to error page
                header("location: ../add_dental_info.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain dental_id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Dental Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
         /* General Styling */
     body {
            background-color: #f0f8ff; /* Light blue background */
            margin: 0;
            padding-top: 70px; /* Ensure content starts below the navbar */
            font-family: 'Arial', sans-serif;
            line-height: 1.6; /* Improve readability */
        }

        /* Navbar Customization */
        .navbar {
            background-color: #003366; /* Dark blue background for navbar */
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 0.3in;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: #fff;
        }

        .wrapper {
    padding: 20px;
}

h1 {
    color: #1535ee;
    text-align: center;
    font-size: 2rem;
    margin-bottom: 30px;
}

/* Table styling */
.table-container {
    margin-top: 20px;
}

.table {
    width: 100%;
    max-width: 900px;
    margin: auto;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    padding: 12px 20px;
    border: 1px solid #ddd;
    text-align: left;
}

.table th {
    background-color: #003366;
    color: white;
    font-weight: bold;
}

.table td {
    color: #555;
    font-size: 1rem;
}

/* Button styling */
.btn-primary {
    background-color: #1535ee;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    text-transform: uppercase;
    cursor: pointer;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
}

.btn-primary:hover {
    background-color: #004080;
    color: white;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    h1 {
        font-size: 1.8rem;
    }
    
    .table th, .table td {
        font-size: 0.9rem;
        padding: 10px;
    }
    
    .btn-primary {
        width: 100%;
        text-align: center;
    }
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-2">
        <a class="navbar-brand ps-2" href="#">
            <img src="../src/Nbsc_logo-removebg-preview.png" style="height: 0.3in;">
            NBSC HOS
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="true">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <div class="navbar-collapse flex-grow-1 text-right" id="sampleid" style="padding-left: 20px">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 flex-nowrap">
                    <li class="nav-item dropdown w-100" style="padding-top: 0px;">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Panel</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="add_medical_info.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <li><a class="dropdown-item" href="../welcome.php">Home</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-5 mb-3">View Dental Record</h1>
                <div class="table-container">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Type</th>
                                <td><?php echo htmlspecialchars($row["dental_type"]); ?></td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><?php echo htmlspecialchars($row["dental_date"]); ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo htmlspecialchars($row["dental_name"]); ?></td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td><?php echo htmlspecialchars($row["dental_age"]); ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo htmlspecialchars($row["dental_address"]); ?></td>
                            </tr>
                            <tr>
                                <th>Telephone No.</th>
                                <td><?php echo htmlspecialchars($row["dental_tel_no"]); ?></td>
                            </tr>
                            <tr>
                                <th>Course Taken Year</th>
                                <td><?php echo htmlspecialchars($row["dental_course_taken_year"]); ?></td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td><?php echo htmlspecialchars($row["dental_date_of_birth"]); ?></td>
                            </tr>
                            <tr>
                                <th>Sex</th>
                                <td><?php echo htmlspecialchars($row["dental_sex"]); ?></td>
                            </tr>
                            <tr>
                                <th>Civil Status</th>
                                <td><?php echo htmlspecialchars($row["dental_civil_status"]); ?></td>
                            </tr>
                            <tr>
                                <th>Allergies (Medication/Food)</th>
                                <td><?php echo htmlspecialchars($row["dental_allergy_medication_food"]); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <p><a href="../add_dental_info.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>        
    </div>
</div>

</body>
</html>
