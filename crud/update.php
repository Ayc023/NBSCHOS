<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$basic_info_firstname = $basic_info_middlename = $basic_info_lastname = $basic_info_birthday = $basic_info_sex = $basic_info_age = $basic_info_home_address = "";
$basic_college_course = $basic_college_clinic_file_number = $basic_contact_number = $basic_religion = $basic_occupation = $basic_civil_status = "";
$basic_complete_name = $basic_address = $basic_contact = $basic_relationship = "";

$basic_info_firstname_err = $basic_info_middlename_err = $basic_info_lastname_err = $basic_info_birthday_err = $basic_info_sex_err = $basic_info_age_err = $basic_info_home_address_err = "";
$basic_college_course_err = $basic_college_clinic_file_number_err = $basic_contact_number_err = $basic_religion_err = $basic_occupation_err = $basic_civil_status_err = "";
$basic_complete_name_err = $basic_address_err = $basic_contact_err = $basic_relationship_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate firstname
    $input_firstname = trim($_POST["basic_info_firstname"]);
    if(empty($input_firstname)){
        $basic_info_firstname_err = "Please enter a first name.";
    } else{
        $basic_info_firstname = $input_firstname;
    }
    
    // Validate middlename
    $input_middlename = trim($_POST["basic_info_middlename"]);
    if(empty($input_middlename)){
        $basic_info_middlename_err = "Please enter a middle name.";     
    } else{
        $basic_info_middlename = $input_middlename;
    }
    
    // Validate lastname
    $input_lastname = trim($_POST["basic_info_lastname"]);
    if(empty($input_lastname)){
        $basic_info_lastname_err = "Please enter a last name.";     
    } else{
        $basic_info_lastname = $input_lastname;
    }
    
    // Validate birthday
    $input_birthday = trim($_POST["basic_info_birthday"]);
    if(empty($input_birthday)){
        $basic_info_birthday_err = "Please enter a birthday.";     
    } else{
        $basic_info_birthday = $input_birthday;
    }
    
    // Validate sex
    $input_sex = trim($_POST["basic_info_sex"]);
    if(empty($input_sex)){
        $basic_info_sex_err = "Please select a gender.";     
    } else{
        $basic_info_sex = $input_sex;
    }

    // Validate age
    $input_age = trim($_POST["basic_info_age"]);
    if(empty($input_age)){
        $basic_info_age_err = "Please enter the age.";     
    } elseif(!ctype_digit($input_age)){
        $basic_info_age_err = "Please enter a valid age.";
    } else{
        $basic_info_age = $input_age;
    }
    
    // Validate home address
    $input_home_address = trim($_POST["basic_info_home_address"]);
    if(empty($input_home_address)){
        $basic_info_home_address_err = "Please enter a home address.";     
    } else{
        $basic_info_home_address = $input_home_address;
    }

    // Validate new fields
    $input_college_course = trim($_POST["basic_college_course"]);
    if(empty($input_college_course)){
        $basic_college_course_err = "Please enter the college course.";     
    } else{
        $basic_college_course = $input_college_course;
    }

    $input_clinic_file_number = trim($_POST["basic_college_clinic_file_number"]);
    if(empty($input_clinic_file_number)){
        $basic_college_clinic_file_number_err = "Please enter the clinic file number.";     
    } else{
        $basic_college_clinic_file_number = $input_clinic_file_number;
    }

    $input_contact_number = trim($_POST["basic_contact_number"]);
    if(empty($input_contact_number)){
        $basic_contact_number_err = "Please enter the contact number.";     
    } else{
        $basic_contact_number = $input_contact_number;
    }

    $input_religion = trim($_POST["basic_religion"]);
    if(empty($input_religion)){
        $basic_religion_err = "Please enter the religion.";     
    } else{
        $basic_religion = $input_religion;
    }

    $input_occupation = trim($_POST["basic_occupation"]);
    if(empty($input_occupation)){
        $basic_occupation_err = "Please enter the occupation.";     
    } else{
        $basic_occupation = $input_occupation;
    }

    // Validate civil status
    $input_civil_status = trim($_POST["basic_civil_status"]);
    if(empty($input_civil_status)){
        $basic_civil_status_err = "Please enter the civil status.";     
    } else{
        $basic_civil_status = $input_civil_status;
    }

    // Validate new fields: complete name, address, contact, relationship
    $input_complete_name = trim($_POST["basic_complete_name"]);
    if(empty($input_complete_name)){
        $basic_complete_name_err = "Please enter the complete name.";     
    } else{
        $basic_complete_name = $input_complete_name;
    }

    $input_address = trim($_POST["basic_address"]);
    if(empty($input_address)){
        $basic_address_err = "Please enter the address.";     
    } else{
        $basic_address = $input_address;
    }

    $input_contact = trim($_POST["basic_contact"]);
    if(empty($input_contact)){
        $basic_contact_err = "Please enter the contact.";     
    } else{
        $basic_contact = $input_contact;
    }

    $input_relationship = trim($_POST["basic_relationship"]);
    if(empty($input_relationship)){
        $basic_relationship_err = "Please enter the relationship.";     
    } else{
        $basic_relationship = $input_relationship;
    }

    // Check input errors before updating in the database
    if(empty($basic_info_firstname_err) && empty($basic_info_middlename_err) && empty($basic_info_lastname_err) && empty($basic_info_birthday_err) && empty($basic_info_sex_err) && empty($basic_info_age_err) && empty($basic_info_home_address_err) && empty($basic_college_course_err) && empty($basic_college_clinic_file_number_err) && empty($basic_contact_number_err) && empty($basic_religion_err) && empty($basic_complete_name_err) && empty($basic_address_err) && empty($basic_contact_err) && empty($basic_relationship_err)){
        // Prepare an update statement
        $sql = "UPDATE basic_info SET basic_info_firstname=:basic_info_firstname, basic_info_middlename=:basic_info_middlename, basic_info_lastname=:basic_info_lastname, basic_info_birthday=:basic_info_birthday, basic_info_sex=:basic_info_sex, basic_info_age=:basic_info_age, basic_info_home_address=:basic_info_home_address, basic_college_course=:basic_college_course, basic_college_clinic_file_number=:basic_college_clinic_file_number, basic_contact_number=:basic_contact_number, basic_religion=:basic_religion, basic_occupation=:basic_occupation, basic_civil_status=:basic_civil_status, basic_complete_name=:basic_complete_name, basic_address=:basic_address, basic_contact=:basic_contact, basic_relationship=:basic_relationship WHERE basic_info_id=:id";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":basic_info_firstname", $param_firstname);
            $stmt->bindParam(":basic_info_middlename", $param_middlename);
            $stmt->bindParam(":basic_info_lastname", $param_lastname);
            $stmt->bindParam(":basic_info_birthday", $param_birthday);
            $stmt->bindParam(":basic_info_sex", $param_sex);
            $stmt->bindParam(":basic_info_age", $param_age);
            $stmt->bindParam(":basic_info_home_address", $param_home_address);
            $stmt->bindParam(":basic_college_course", $param_college_course);
            $stmt->bindParam(":basic_college_clinic_file_number", $param_clinic_file_number);
            $stmt->bindParam(":basic_contact_number", $param_contact_number);
            $stmt->bindParam(":basic_religion", $param_religion);
            $stmt->bindParam(":id", $param_id);
            $stmt->bindParam(":basic_occupation", $param_occupation);
            $stmt->bindParam(":basic_civil_status", $param_civil_status);
            $stmt->bindParam(":basic_complete_name", $param_complete_name);
            $stmt->bindParam(":basic_address", $param_address);
            $stmt->bindParam(":basic_contact", $param_contact);
            $stmt->bindParam(":basic_relationship", $param_relationship);
            
            // Set parameters
            $param_firstname = $basic_info_firstname;
            $param_middlename = $basic_info_middlename;
            $param_lastname = $basic_info_lastname;
            $param_birthday = $basic_info_birthday;
            $param_sex = $basic_info_sex;
            $param_age = $basic_info_age;
            $param_home_address = $basic_info_home_address;
            $param_college_course = $basic_college_course;
            $param_clinic_file_number = $basic_college_clinic_file_number;
            $param_contact_number = $basic_contact_number;
            $param_religion = $basic_religion;
            $param_id = $id;
            $param_occupation = $basic_occupation;
            $param_civil_status = $basic_civil_status;
            $param_complete_name = $basic_complete_name;
            $param_address = $basic_address;
            $param_contact = $basic_contact;
            $param_relationship = $basic_relationship;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: ../add_medical_info.php");
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
        $sql = "SELECT * FROM basic_info WHERE basic_info_id = :id";
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
                    $basic_info_firstname = $row["basic_info_firstname"];
                    $basic_info_middlename = $row["basic_info_middlename"];
                    $basic_info_lastname = $row["basic_info_lastname"];
                    $basic_info_birthday = $row["basic_info_birthday"];
                    $basic_info_sex = $row["basic_info_sex"];
                    $basic_info_age = $row["basic_info_age"];
                    $basic_info_home_address = $row["basic_info_home_address"];
                    $basic_college_course = $row["basic_college_course"];
                    $basic_college_clinic_file_number = $row["basic_college_clinic_file_number"];
                    $basic_contact_number = $row["basic_contact_number"];
                    $basic_religion = $row["basic_religion"];
                    $basic_occupation = $row["basic_occupation"];
                    $basic_civil_status = $row["basic_civil_status"];
                    $basic_complete_name = $row["basic_complete_name"];
                    $basic_address = $row["basic_address"];
                    $basic_contact = $row["basic_contact"];
                    $basic_relationship = $row["basic_relationship"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
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

<!-- HTML form starts here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="basic_info_firstname" class="form-control <?php echo (!empty($basic_info_firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_info_firstname; ?>">
                            <span class="invalid-feedback"><?php echo $basic_info_firstname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="basic_info_middlename" class="form-control <?php echo (!empty($basic_info_middlename_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_info_middlename; ?>">
                            <span class="invalid-feedback"><?php echo $basic_info_middlename_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="basic_info_lastname" class="form-control <?php echo (!empty($basic_info_lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_info_lastname; ?>">
                            <span class="invalid-feedback"><?php echo $basic_info_lastname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Birthday</label>
                            <input type="date" name="basic_info_birthday" class="form-control <?php echo (!empty($basic_info_birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_info_birthday; ?>">
                            <span class="invalid-feedback"><?php echo $basic_info_birthday_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="basic_info_sex" class="form-control <?php echo (!empty($basic_info_sex_err)) ? 'is-invalid' : ''; ?>">
                                <option value="male" <?php echo ($basic_info_sex == 'male') ? 'selected' : ''; ?>>Male</option>
                                <option value="female" <?php echo ($basic_info_sex == 'female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $basic_info_sex_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="basic_info_age" class="form-control <?php echo (!empty($basic_info_age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_info_age; ?>">
                            <span class="invalid-feedback"><?php echo $basic_info_age_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Home Address</label>
                            <input type="text" name="basic_info_home_address" class="form-control <?php echo (!empty($basic_info_home_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_info_home_address; ?>">
                            <span class="invalid-feedback"><?php echo $basic_info_home_address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>College Course</label>
                            <input type="text" name="basic_college_course" class="form-control <?php echo (!empty($basic_college_course_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_college_course; ?>">
                            <span class="invalid-feedback"><?php echo $basic_college_course_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Clinic File Number</label>
                            <input type="text" name="basic_college_clinic_file_number" class="form-control <?php echo (!empty($basic_college_clinic_file_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_college_clinic_file_number; ?>">
                            <span class="invalid-feedback"><?php echo $basic_college_clinic_file_number_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="basic_contact_number" class="form-control <?php echo (!empty($basic_contact_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_contact_number; ?>">
                            <span class="invalid-feedback"><?php echo $basic_contact_number_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Religion</label>
                            <input type="text" name="basic_religion" class="form-control <?php echo (!empty($basic_religion_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_religion; ?>">
                            <span class="invalid-feedback"><?php echo $basic_religion_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Occupation</label>
                            <input type="text" name="basic_occupation" class="form-control <?php echo (!empty($basic_occupation_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_occupation; ?>">
                            <span class="invalid-feedback"><?php echo $basic_occupation_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Civil Status</label>
                            <input type="text" name="basic_civil_status" class="form-control <?php echo (!empty($basic_civil_status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_civil_status; ?>">
                            <span class="invalid-feedback"><?php echo $basic_civil_status_err;?></span>
                        </div>
                        <h4>In Case of Emergency (Please Contact):</h4>
                        <div class="form-group">
                            <label>Complete Name</label>
                            <input type="text" name="basic_complete_name" class="form-control <?php echo (!empty($basic_complete_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_complete_name; ?>">
                            <span class="invalid-feedback"><?php echo $basic_complete_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="basic_address" class="form-control <?php echo (!empty($basic_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_address; ?>">
                            <span class="invalid-feedback"><?php echo $basic_address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="basic_contact" class="form-control <?php echo (!empty($basic_contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_contact; ?>">
                            <span class="invalid-feedback"><?php echo $basic_contact_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Relationship</label>
                            <input type="text" name="basic_relationship" class="form-control <?php echo (!empty($basic_relationship_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_relationship; ?>">
                            <span class="invalid-feedback"><?php echo $basic_relationship_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="../add_medical_info.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
