<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$dental_type = $dental_date = $dental_name = $dental_age = $dental_address = $dental_tel_no = $dental_course_taken_year = $dental_date_of_birth = $dental_sex = $dental_civil_status = $dental_allergy_medication_food = "";
$dental_type_err = $dental_date_err = $dental_name_err = $dental_age_err = $dental_address_err = $dental_tel_no_err = $dental_course_taken_year_err = $dental_date_of_birth_err = $dental_sex_err = $dental_civil_status_err = $dental_allergy_medication_food_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate dental_type
    $input_dental_type = trim($_POST["dental_type"]);
    $dental_type = !empty($input_dental_type) ? $input_dental_type : '';
    
    $input_dental_date = isset($_POST["dental_date"]) ? trim($_POST["dental_date"]) : '';
    if (empty($input_dental_date)) {
        $dental_date_err = "Please enter a date.";
    } else {
        $dental_date_obj = DateTime::createFromFormat('Y-m-d', $input_dental_date);
        if ($dental_date_obj && $dental_date_obj->format('Y-m-d') === $input_dental_date) {
            $dental_date = $dental_date_obj->format('Y-m-d');
        } else {
            $dental_date_err = "Please enter a valid date in YYYY-MM-DD format.";
        }
    }

    
    // Validate dental_name
    $input_dental_name = trim($_POST["dental_name"]);
    if(empty($input_dental_name)){
        $dental_name_err = "Please enter a name.";
    } elseif(!filter_var($input_dental_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $dental_name_err = "Please enter a valid name.";
    } else{
        $dental_name = $input_dental_name;
    }
    
    // Validate dental_age
    $input_dental_age = trim($_POST["dental_age"]);
    if(empty($input_dental_age)){
        $dental_age_err = "Please enter the age.";
    } elseif(!ctype_digit($input_dental_age) || $input_dental_age < 0){
        $dental_age_err = "Please enter a valid age.";
    } else{
        $dental_age = $input_dental_age;
    }
    
    // Validate dental_address
    $input_dental_address = trim($_POST["dental_address"]);
    if(empty($input_dental_address)){
        $dental_address_err = "Please enter an address.";     
    } else{
        $dental_address = $input_dental_address;
    }
    
    // Validate dental_tel_no
    $input_dental_tel_no = trim($_POST["dental_tel_no"]);
    if(empty($input_dental_tel_no)){
        $dental_tel_no_err = "Please enter a telephone number.";     
    } elseif(!preg_match("/^\d{11}$/", $input_dental_tel_no)){
        $dental_tel_no_err = "Please enter a valid telephone number (11 digits).";
    } else{
        $dental_tel_no = $input_dental_tel_no;
    }
    
    // Validate dental_course_taken_year
    $input_dental_course_taken_year = trim($_POST["dental_course_taken_year"]);
    if(empty($input_dental_course_taken_year)){
        $dental_course_taken_year_err = "Please enter the course taken and year.";     
    } else{
        $dental_course_taken_year = $input_dental_course_taken_year;
    }

    // Validate dental_date_of_birth
    $input_dental_date_of_birth = trim($_POST["dental_date_of_birth"]);
    if(empty($input_dental_date_of_birth)){
        $dental_date_of_birth_err = "Please enter the date of birth.";
    } else {
        $dental_date_of_birth_obj = DateTime::createFromFormat('Y-m-d', $input_dental_date_of_birth);
        if ($dental_date_of_birth_obj && $dental_date_of_birth_obj->format('Y-m-d') === $input_dental_date_of_birth) {
            $dental_date_of_birth = $dental_date_of_birth_obj->format('Y-m-d');
        } else {
            $dental_date_of_birth_err = "Please enter a valid date of birth in YYYY-MM-DD format.";
        }
    }

    
    // Validate dental_sex
    $input_dental_sex = trim($_POST["dental_sex"]);
    if(empty($input_dental_sex)){
        $dental_sex_err = "Please select a sex.";
    } else{
        $dental_sex = $input_dental_sex;
    }

    // Validate dental_civil_status
    $input_dental_civil_status = trim($_POST["dental_civil_status"]);
    if(empty($input_dental_civil_status)){
        $dental_civil_status_err = "Please select a civil status.";
    } else{
        $dental_civil_status = $input_dental_civil_status;
    }

    // Validate dental_allergy_medication_food
    $input_dental_allergy_medication_food = trim($_POST["dental_allergy_medication_food"]);
    $dental_allergy_medication_food = !empty($input_dental_allergy_medication_food) ? $input_dental_allergy_medication_food : '';

    // Check input errors before inserting in database
    if(empty($dental_type_err) && empty($dental_date_err) && empty($dental_name_err) && empty($dental_age_err) && empty($dental_address_err) && empty($dental_tel_no_err) && empty($dental_course_taken_year_err) && empty($dental_date_of_birth_err) && empty($dental_sex_err) && empty($dental_civil_status_err) && empty($dental_allergy_medication_food_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO dental (dental_type, dental_date, dental_name, dental_age, dental_address, dental_tel_no, dental_course_taken_year, dental_date_of_birth, dental_sex, dental_civil_status, dental_allergy_medication_food) VALUES (:dental_type, :dental_date, :dental_name, :dental_age, :dental_address, :dental_tel_no, :dental_course_taken_year, :dental_date_of_birth, :dental_sex, :dental_civil_status, :dental_allergy_medication_food)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":dental_type", $param_dental_type);
            $stmt->bindParam(":dental_date", $param_dental_date);
            $stmt->bindParam(":dental_name", $param_dental_name);
            $stmt->bindParam(":dental_age", $param_dental_age);
            $stmt->bindParam(":dental_address", $param_dental_address);
            $stmt->bindParam(":dental_tel_no", $param_dental_tel_no);
            $stmt->bindParam(":dental_course_taken_year", $param_dental_course_taken_year);
            $stmt->bindParam(":dental_date_of_birth", $param_dental_date_of_birth);
            $stmt->bindParam(":dental_sex", $param_dental_sex);
            $stmt->bindParam(":dental_civil_status", $param_dental_civil_status);
            $stmt->bindParam(":dental_allergy_medication_food", $param_dental_allergy_medication_food);
            
            // Set parameters
            $param_dental_type = $dental_type;
            $param_dental_date = $dental_date;
            $param_dental_name = $dental_name;
            $param_dental_age = $dental_age;
            $param_dental_address = $dental_address;
            $param_dental_tel_no = $dental_tel_no;
            $param_dental_course_taken_year = $dental_course_taken_year;
            $param_dental_date_of_birth = $dental_date_of_birth;
            $param_dental_sex = $dental_sex;
            $param_dental_civil_status = $dental_civil_status;
            $param_dental_allergy_medication_food = $dental_allergy_medication_food;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Patients Occupations</label>
                            <input type="text" name="dental_type" class="form-control" value="<?php echo $dental_type; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date</label>
                            <input type="text" name="dental_date" class="form-control <?php echo (!empty($dental_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_date; ?>">
                            <span class="invalid-feedback"><?php echo $dental_date_err;?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" name="dental_name" class="form-control <?php echo (!empty($dental_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_name; ?>">
                            <span class="invalid-feedback"><?php echo $dental_name_err;?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Age</label>
                            <input type="text" name="dental_age" class="form-control <?php echo (!empty($dental_age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_age; ?>">
                            <span class="invalid-feedback"><?php echo $dental_age_err;?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Address</label>
                            <textarea name="dental_address" class="form-control <?php echo (!empty($dental_address_err)) ? 'is-invalid' : ''; ?>"><?php echo $dental_address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $dental_address_err;?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact No</label>
                            <input type="text" name="dental_tel_no" class="form-control <?php echo (!empty($dental_tel_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_tel_no; ?>">
                            <span class="invalid-feedback"><?php echo $dental_tel_no_err;?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Course Taken & Year</label>
                            <input type="text" name="dental_course_taken_year" class="form-control <?php echo (!empty($dental_course_taken_year_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_course_taken_year; ?>">
                            <span class="invalid-feedback"><?php echo $dental_course_taken_year_err;?></span>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date of Birth</label>
                            <input type="date" name="dental_date_of_birth" class="form-control <?php echo (!empty($dental_date_of_birth_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($dental_date_of_birth); ?>">
                            <span class="invalid-feedback"><?php echo $dental_date_of_birth_err;?></span>
                        </div>
                    </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Sex</label>
                            <input type="text" name="dental_sex" class="form-control <?php echo (!empty($dental_sex_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_sex; ?>">
                            <span class="invalid-feedback"><?php echo $dental_sex_err;?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Civil Status</label>
                            <input type="text" name="dental_civil_status" class="form-control <?php echo (!empty($dental_civil_status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dental_civil_status; ?>">
                            <span class="invalid-feedback"><?php echo $dental_civil_status_err;?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Allergy to Medication/Food</label>
                            <textarea name="dental_allergy_medication_food" class="form-control <?php echo (!empty($dental_allergy_medication_food_err)) ? 'is-invalid' : ''; ?>"><?php echo $dental_allergy_medication_food; ?></textarea>
                            <span class="invalid-feedback"><?php echo $dental_allergy_medication_food_err;?></span>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="../add_dental_info.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>

                </div>
            </div>        
        </div>
    </div>
</body>
</html>
