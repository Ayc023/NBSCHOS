<?php
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$dental_type = $dental_date = $dental_name = $dental_address = $dental_allergy_medication_food = "";
$dental_age = $dental_tel_no = $dental_course_taken_year = $dental_date_of_birth = $dental_sex = $dental_civil_status = "";

$dental_type_err = $dental_date_err = $dental_name_err = $dental_address_err = $dental_allergy_medication_food_err = "";
$dental_age_err = $dental_tel_no_err = $dental_course_taken_year_err = $dental_date_of_birth_err = $dental_sex_err = $dental_civil_status_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate dental type
    $input_dental_type = trim($_POST["dental_type"]);
    if(empty($input_dental_type)){
        $dental_type_err = "Please enter the dental type.";
    } else{
        $dental_type = $input_dental_type;
    }
    
    // Validate dental date
    $input_dental_date = trim($_POST["dental_date"]);
    if(empty($input_dental_date)){
        $dental_date_err = "Please enter the dental date.";     
    } else{
        $dental_date = $input_dental_date;
    }

    // Validate dental name
    $input_dental_name = trim($_POST["dental_name"]);
    if(empty($input_dental_name)){
        $dental_name_err = "Please enter the dental name.";     
    } else{
        $dental_name = $input_dental_name;
    }
    
    // Validate dental address
    $input_dental_address = trim($_POST["dental_address"]);
    if(empty($input_dental_address)){
        $dental_address_err = "Please enter the dental address.";     
    } else{
        $dental_address = $input_dental_address;
    }
    
    // Validate allergy medication food
    $input_allergy_medication_food = trim($_POST["dental_allergy_medication_food"]);
    if(empty($input_allergy_medication_food)){
        $dental_allergy_medication_food_err = "Please enter the allergy information.";     
    } else{
        $dental_allergy_medication_food = $input_allergy_medication_food;
    }

    // Validate age
    $input_age = trim($_POST["dental_age"]);
    if(empty($input_age)){
        $dental_age_err = "Please enter the age.";     
    } elseif(!ctype_digit($input_age)){
        $dental_age_err = "Please enter a valid age.";
    } else{
        $dental_age = $input_age;
    }
    
    // Validate telephone number
    $input_tel_no = trim($_POST["dental_tel_no"]);
    if(empty($input_tel_no)){
        $dental_tel_no_err = "Please enter the telephone number.";     
    } else{
        $dental_tel_no = $input_tel_no;
    }

    // Validate course taken year
    $input_course_taken_year = trim($_POST["dental_course_taken_year"]);
    if(empty($input_course_taken_year)){
        $dental_course_taken_year_err = "Please enter the course taken year.";     
    } else{
        $dental_course_taken_year = $input_course_taken_year;
    }

    // Validate date of birth
    $input_date_of_birth = trim($_POST["dental_date_of_birth"]);
    if(empty($input_date_of_birth)){
        $dental_date_of_birth_err = "Please enter the date of birth.";     
    } else{
        $dental_date_of_birth = $input_date_of_birth;
    }

    // Validate sex
    $input_sex = trim($_POST["dental_sex"]);
    if(empty($input_sex)){
        $dental_sex_err = "Please select a gender.";     
    } else{
        $dental_sex = $input_sex;
    }

    // Validate civil status
    $input_civil_status = trim($_POST["dental_civil_status"]);
    if(empty($input_civil_status)){
        $dental_civil_status_err = "Please enter the civil status.";     
    } else{
        $dental_civil_status = $input_civil_status;
    }

    // Check input errors before updating in the database
    if(empty($dental_type_err) && empty($dental_date_err) && empty($dental_name_err) && empty($dental_address_err) && empty($dental_allergy_medication_food_err) && empty($dental_age_err) && empty($dental_tel_no_err) && empty($dental_course_taken_year_err) && empty($dental_date_of_birth_err) && empty($dental_sex_err) && empty($dental_civil_status_err)){
        // Prepare an update statement
        $sql = "UPDATE dental SET dental_type=:dental_type, dental_date=:dental_date, dental_name=:dental_name, dental_address=:dental_address, dental_allergy_medication_food=:dental_allergy_medication_food, dental_age=:dental_age, dental_tel_no=:dental_tel_no, dental_course_taken_year=:dental_course_taken_year, dental_date_of_birth=:dental_date_of_birth, dental_sex=:dental_sex, dental_civil_status=:dental_civil_status WHERE dental_id=:id";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":dental_type", $param_dental_type);
            $stmt->bindParam(":dental_date", $param_dental_date);
            $stmt->bindParam(":dental_name", $param_dental_name);
            $stmt->bindParam(":dental_address", $param_dental_address);
            $stmt->bindParam(":dental_allergy_medication_food", $param_allergy_medication_food);
            $stmt->bindParam(":dental_age", $param_age);
            $stmt->bindParam(":dental_tel_no", $param_tel_no);
            $stmt->bindParam(":dental_course_taken_year", $param_course_taken_year);
            $stmt->bindParam(":dental_date_of_birth", $param_date_of_birth);
            $stmt->bindParam(":dental_sex", $param_sex);
            $stmt->bindParam(":dental_civil_status", $param_civil_status);
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_dental_type = $dental_type;
            $param_dental_date = $dental_date;
            $param_dental_name = $dental_name;
            $param_dental_address = $dental_address;
            $param_allergy_medication_food = $dental_allergy_medication_food;
            $param_age = $dental_age;
            $param_tel_no = $dental_tel_no;
            $param_course_taken_year = $dental_course_taken_year;
            $param_date_of_birth = $dental_date_of_birth;
            $param_sex = $dental_sex;
            $param_civil_status = $dental_civil_status;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: ../add_dental_info.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM dental WHERE dental_id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    // Retrieve individual field values
                    $dental_type = $row["dental_type"];
                    $dental_date = $row["dental_date"];
                    $dental_name = $row["dental_name"];
                    $dental_address = $row["dental_address"];
                    $dental_allergy_medication_food = $row["dental_allergy_medication_food"];
                    $dental_age = $row["dental_age"];
                    $dental_tel_no = $row["dental_tel_no"];
                    $dental_course_taken_year = $row["dental_course_taken_year"];
                    $dental_date_of_birth = $row["dental_date_of_birth"];
                    $dental_sex = $row["dental_sex"];
                    $dental_civil_status = $row["dental_civil_status"];
                } else{
                    // URL doesn't contain valid id parameter. Redirect to error page
                    header("location: error.php");
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>occupations</label>
                            <input type="text" name="dental_type" class="form-control <?php echo (!empty($dental_type_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_type; ?>">
                            <span class="invalid-feedback"><?php echo $dental_type_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="dental_date" class="form-control <?php echo (!empty($dental_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_date; ?>">
                            <span class="invalid-feedback"><?php echo $dental_date_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="dental_name" class="form-control <?php echo (!empty($dental_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_name; ?>">
                            <span class="invalid-feedback"><?php echo $dental_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="dental_address" class="form-control <?php echo (!empty($dental_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_address; ?>">
                            <span class="invalid-feedback"><?php echo $dental_address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Allergy/Medication/Food</label>
                            <input type="text" name="dental_allergy_medication_food" class="form-control <?php echo (!empty($dental_allergy_medication_food_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_allergy_medication_food; ?>">
                            <span class="invalid-feedback"><?php echo $dental_allergy_medication_food_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="dental_age" class="form-control <?php echo (!empty($dental_age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_age; ?>">
                            <span class="invalid-feedback"><?php echo $dental_age_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Telephone Number</label>
                            <input type="text" name="dental_tel_no" class="form-control <?php echo (!empty($dental_tel_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_tel_no; ?>">
                            <span class="invalid-feedback"><?php echo $dental_tel_no_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Course Taken/Year</label>
                            <input type="text" name="dental_course_taken_year" class="form-control <?php echo (!empty($dental_course_taken_year_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_course_taken_year; ?>">
                            <span class="invalid-feedback"><?php echo $dental_course_taken_year_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dental_date_of_birth" class="form-control <?php echo (!empty($dental_date_of_birth_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_date_of_birth; ?>">
                            <span class="invalid-feedback"><?php echo $dental_date_of_birth_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Sex</label>
                            <select name="dental_sex" class="form-control <?php echo (!empty($dental_sex_err)) ? 'is-invalid' : ''; ?>">
                                <option value="male" <?php echo ($dental_sex == 'male') ? 'selected' : ''; ?>>Male</option>
                                <option value="female" <?php echo ($dental_sex == 'female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $dental_sex_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Civil Status</label>
                            <input type="text" name="dental_civil_status" class="form-control <?php echo (!empty($dental_civil_status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_civil_status; ?>">
                            <span class="invalid-feedback"><?php echo $dental_civil_status_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="../add_dental_info.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>