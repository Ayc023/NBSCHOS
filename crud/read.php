<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "../config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM basic_info WHERE basic_info_id = ?";

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
                $firstname = $row["basic_info_firstname"];
                $middlename = $row["basic_info_middlename"];
                $lastname = $row["basic_info_lastname"];
                $date = $row["basic_info_date"];
                $birthday = $row["basic_info_birthday"];
                $sex = $row["basic_info_sex"];
                $age = $row["basic_info_age"];
                $home_address = $row["basic_info_home_address"];
                $college_course = $row["basic_college_course"];
                $clinic_file_number = $row["basic_college_clinic_file_number"];
                $contact_number = $row["basic_contact_number"];
                $religion = $row["basic_religion"];
                $occupation = $row["basic_occupation"];
                $civil_status = $row["basic_civil_status"];
                
                // New fields
                $complete_name = $row["basic_complete_name"];
                $address = $row["basic_address"];
                $contact = $row["basic_contact"];
                $relationship = $row["basic_relationship"];
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

        /* Wrapper Styling */
        .wrapper {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Table Container */
        .table-container {
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #004080;
            border-color: #004080;
        }

        /* Responsive Breakpoints */
        @media (max-width: 768px) {
            .horizontal-table .column {
                flex: 1 1 100%; /* Make columns stack vertically on smaller screens */
            }
        }
</style>

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
                            <li><a class="dropdown-item" href="welcome.php">Home</a></li>
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
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="table-container">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>First Name</th>
                                    <td><?php echo htmlspecialchars($firstname); ?></td>
                                </tr>
                                <tr>
                                    <th>Middle Name</th>
                                    <td><?php echo htmlspecialchars($middlename); ?></td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td><?php echo htmlspecialchars($lastname); ?></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td><?php echo htmlspecialchars($date); ?></td>
                                </tr>
                                <tr>
                                    <th>Birthday</th>
                                    <td><?php echo htmlspecialchars($birthday); ?></td>
                                </tr>
                                <tr>
                                    <th>Sex</th>
                                    <td><?php echo htmlspecialchars($sex); ?></td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td><?php echo htmlspecialchars($age); ?></td>
                                </tr>
                                <tr>
                                    <th>Home Address</th>
                                    <td><?php echo htmlspecialchars($home_address); ?></td>
                                </tr>
                                <tr>
                                    <th>College Course</th>
                                    <td><?php echo htmlspecialchars($college_course); ?></td>
                                </tr>
                                <tr>
                                    <th>Clinic File Number</th>
                                    <td><?php echo htmlspecialchars($clinic_file_number); ?></td>
                                </tr>
                                <tr>
                                    <th>Contact Number</th>
                                    <td><?php echo htmlspecialchars($contact_number); ?></td>
                                </tr>
                                <tr>
                                    <th>Religion</th>
                                    <td><?php echo htmlspecialchars($religion); ?></td>
                                </tr>
                                <tr>
                                    <th>Occupation</th>
                                    <td><?php echo htmlspecialchars($occupation); ?></td>
                                </tr>
                                <tr>
                                    <th>Civil Status</th>
                                    <td><?php echo htmlspecialchars($civil_status); ?></td>
                                </tr>
                                
                                <!-- New fields added here -->
                                <tr>
                                    <th>Complete Name</th>
                                    <td><?php echo htmlspecialchars($complete_name); ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?php echo htmlspecialchars($address); ?></td>
                                </tr>
                                <tr>
                                    <th>Contact</th>
                                    <td><?php echo htmlspecialchars($contact); ?></td>
                                </tr>
                                <tr>
                                    <th>Relationship</th>
                                    <td><?php echo htmlspecialchars($relationship); ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <p><a href="../add_medical_info.php" class="btn btn-primary">Back</a></p>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>

</html>
