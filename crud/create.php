<?php

require_once "../config.php";
 

$firstname = $middlename = $lastname = $date = $birthday = $sex = $age = $home_address = $college_course = $college_clinic_file_number = $contact_number = $religion = $occupation = $civil_status = $basic_complete_name = $basic_address = $basic_contact = $basic_relationship = $basic_info_smoking = $basic_info_smoking_pack_day = $basic_info_smoking_years = $basic_info_alcohol_drinking = "";
$firstname_err = $middlename_err = $lastname_err = $date_err = $birthday_err = $sex_err = $age_err = $home_address_err = $college_course_err = $college_clinic_file_number_err = $contact_number_err = $religion_err = $occupation_err = $civil_status_err = $basic_complete_name_err = $basic_address_err = $basic_contact_err = $basic_relationship_err = $basic_info_smoking_err = $basic_info_smoking_pack_day_err = $basic_info_smoking_years_err = $basic_info_alcohol_drinking_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    var_dump($_POST);
    $input_firstname = trim($_POST["firstname"]);
    if(empty($input_firstname)){
        $firstname_err = "Please enter a first name.";
    } elseif(!preg_match("/^[a-zA-Z\s]+$/", $input_firstname)){
        $firstname_err = "Please enter a valid first name.";
    } else{
        $firstname = $input_firstname;
    }
    
    
    $input_middlename = trim($_POST["middlename"]);
if(empty($input_middlename)){
    $middlename_err = "Please enter a middle name.";
} elseif(!preg_match("/^[a-zA-Z\s]+$/", $input_middlename)){
    $middlename_err = "Please enter a valid middle name.";
} else{
    $middlename = $input_middlename;
}


$input_lastname = trim($_POST["lastname"]);
if(empty($input_lastname)){
    $lastname_err = "Please enter a last name.";
} elseif(!preg_match("/^[a-zA-Z\s]+$/", $input_lastname)){
    $lastname_err = "Please enter a valid last name.";
} else{
    $lastname = $input_lastname;
}


$input_date = trim($_POST["date"]);
if(empty($input_date)){
    $date_err = "Please enter a date.";     
} else {
    $date_obj = DateTime::createFromFormat('Y-m-d', $input_date);
    if($date_obj && $date_obj->format('Y-m-d') === $input_date){
        $date = $date_obj->format('Y-m-d');
    } else {
        $date_err = "Please enter a valid date in YYYY-MM-DD format.";
    }
}


$input_birthday = trim($_POST["birthday"]);
if(empty($input_birthday)){
    $birthday_err = "Please enter a birthday.";
} else {
    $birthday_obj = DateTime::createFromFormat('Y-m-d', $input_birthday);
    if($birthday_obj && $birthday_obj->format('Y-m-d') === $input_birthday){
        $birthday = $birthday_obj->format('Y-m-d');
    } else {
        $birthday_err = "Please enter a valid birthday in YYYY-MM-DD format.";
    }
}


$input_sex = trim($_POST["sex"]);
if(empty($input_sex)){
    $sex_err = "Please select a sex.";
} else{
    $sex = $input_sex;
}


$input_age = trim($_POST["age"]);
if(empty($input_age)){
    $age_err = "Please enter an age.";
} elseif(!filter_var($input_age, FILTER_VALIDATE_INT)){
    $age_err = "Please enter a valid age.";
} else{
    $age = $input_age;
}


$input_home_address = trim($_POST["home_address"]);
if(empty($input_home_address)){
    $home_address_err = "Please enter a home address.";
} else{
    $home_address = $input_home_address;
}



$input_college_course = trim($_POST["college_course"]);
if(empty($input_college_course)){
    $college_course_err = "Please enter a college course.";
} else{
    $college_course = $input_college_course;
}



$input_college_clinic_file_number = trim($_POST["college_clinic_file_number"]);
if(empty($input_college_clinic_file_number)){
    $college_clinic_file_number_err = "Please enter a college clinic file number.";
} else{
    $college_clinic_file_number = $input_college_clinic_file_number;
}


$input_contact_number = trim($_POST["contact_number"]);
if(empty($input_contact_number)){
    $contact_number_err = "Please enter a contact number.";
} else{
    $contact_number = $input_contact_number;
}


$input_religion = trim($_POST["religion"]);
if(empty($input_religion)){
    $religion_err = "Please enter a religion.";
} else{
    $religion = $input_religion;
}


$input_occupation = trim($_POST["occupation"]);
if(empty($input_occupation)){
    $occupation_err = "Please enter an occupation.";
} else{
    $occupation = $input_occupation;
}


$input_civil_status = trim($_POST["civil_status"]);
if(empty($input_civil_status)){
    $civil_status_err = "Please enter a civil status.";
} else{
    $civil_status = $input_civil_status;
}

// New fields processing
$input_basic_complete_name = trim($_POST["basic_complete_name"]);
if(empty($input_basic_complete_name)){
    $basic_complete_name_err = "Please enter a complete name.";
} else {
    $basic_complete_name = $input_basic_complete_name;
}

$input_basic_address = trim($_POST["basic_address"]);
if(empty($input_basic_address)){
    $basic_address_err = "Please enter an address.";
} else {
    $basic_address = $input_basic_address;
}

$input_basic_contact = trim($_POST["basic_contact"]);
if(empty($input_basic_contact)){
    $basic_contact_err = "Please enter a contact.";
} else {
    $basic_contact = $input_basic_contact;
}

$input_basic_relationship = trim($_POST["basic_relationship"]);
if(empty($input_basic_relationship)){
    $basic_relationship_err = "Please enter a relationship.";
} else {
    $basic_relationship = $input_basic_relationship;
}

$input_basic_info_smoking = trim($_POST["basic_info_smoking"]);
if(empty($input_basic_info_smoking)){
    $basic_info_smoking_err = "Please select a smoking status.";
} else {
    $basic_info_smoking = $input_basic_info_smoking;
}

$input_basic_info_smoking_pack_day = trim($_POST["basic_info_smoking_pack_day"]);
if(empty($input_basic_info_smoking_pack_day)){
    $basic_info_smoking_pack_day_err = "Please enter the smoking pack per day.";
} elseif(!is_numeric($input_basic_info_smoking_pack_day)){
    $basic_info_smoking_pack_day_err = "Please enter a valid number.";
} else{
    $basic_info_smoking_pack_day = $input_basic_info_smoking_pack_day;
}

$input_basic_info_smoking_years = trim($_POST["basic_info_smoking_years"]);
    if(empty($input_basic_info_smoking_years)){
        $basic_info_smoking_years_err = "Please enter smoking years.";
    } elseif(!is_numeric($input_basic_info_smoking_years)){
        $basic_info_smoking_years_err = "Please enter a valid number.";
    } else {
        $basic_info_smoking_years = $input_basic_info_smoking_years;
    }

    $input_basic_info_alcohol_drinking = trim($_POST["basic_info_alcohol_drinking"]);
    if(empty($input_basic_info_alcohol_drinking)){
        $basic_info_alcohol_drinking_err = "Please select an alcohol drinking status.";
    } else {
        $basic_info_alcohol_drinking = $input_basic_info_alcohol_drinking;
    }




if(empty($firstname_err) && empty($middlename_err) && empty($lastname_err) && empty($date_err) && empty($birthday_err) && empty($sex_err) && empty($age_err) && empty($home_address_err) && empty($college_course_err) && empty($college_clinic_file_number_err) && empty($contact_number_err) && empty($religion_err) && empty($occupation_err) && empty($civil_status_err) && empty($basic_complete_name_err) && empty($basic_address_err) && empty($basic_contact_err) && empty($basic_relationship_err) && empty($basic_info_smoking_err) && empty($basic_info_smoking_pack_day_err)&& empty($basic_info_smoking_years_err) && empty($basic_info_alcohol_drinking_err)){
    
    $sql = "INSERT INTO basic_info (basic_info_firstname, basic_info_middlename, basic_info_lastname, basic_info_date, basic_info_birthday, basic_info_sex, basic_info_age, basic_info_home_address, basic_college_course, basic_college_clinic_file_number, basic_contact_number, basic_religion, basic_occupation, basic_civil_status, basic_complete_name, basic_address, basic_contact, basic_relationship, basic_info_smoking, basic_info_smoking_pack_day, basic_info_smoking_years, basic_info_alcohol_drinking) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssssisissssssssssiii", 
            $param_firstname, 
            $param_middlename, 
            $param_lastname, 
            $param_date, 
            $param_birthday, 
            $param_sex, 
            $param_age, 
            $param_home_address, 
            $param_college_course, 
            $param_college_clinic_file_number, 
            $param_contact_number, 
            $param_religion, 
            $param_occupation, 
            $param_civil_status, 
            $param_complete_name, 
            $param_address, 
            $param_contact, 
            $param_relationship, 
            $param_smoking, 
            $param_smoking_pack_day, 
            $param_smoking_years, 
            $param_alcohol_drinking
        );

        // Set parameters
        $param_firstname = $firstname;
        $param_middlename = $middlename;
        $param_lastname = $lastname;
        $param_date = $date;
        $param_birthday = $birthday;
        $param_sex = $sex;
        $param_age = (int)$age;
        $param_home_address = $home_address;
        $param_college_course = $college_course;
        $param_college_clinic_file_number = $college_clinic_file_number;
        $param_contact_number = $contact_number;
        $param_religion = $religion;
        $param_occupation = $occupation;
        $param_civil_status = $civil_status;
        $param_complete_name = $basic_complete_name;
        $param_address = $basic_address;
        $param_contact = $basic_contact;
        $param_relationship = $basic_relationship;
        $param_smoking = $basic_info_smoking;
        $param_smoking_pack_day = (int)$basic_info_smoking_pack_day;
        $param_smoking_years = (int)$basic_info_smoking_years;
        $param_alcohol_drinking = $basic_info_alcohol_drinking;

        if(mysqli_stmt_execute($stmt)){
            header("location: ../nurse/medical_record.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($link);
    }

    // Close statement
    if (isset($stmt) && $stmt) {
        mysqli_stmt_close($stmt);
    }
}

// Close connection
mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="../styles/create.css">
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Replace with the actual patient ID you want to fetch
        const patientId = 1;

        // Fetch patient data from the server
        fetch(`get_patient_data.php?patient_id=${patientId}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                // Populate form fields with patient data
                document.getElementById('firstname').value = data.basic_info_firstname || '';
                document.getElementById('middlename').value = data.basic_info_middlename || '';
                document.getElementById('lastname').value = data.basic_info_lastname || '';
                document.getElementById('date').value = data.basic_info_date || '';
                document.getElementById('birthday').value = data.basic_info_birthday || '';
                document.getElementById('sex').value = data.basic_info_sex || '';
                document.getElementById('age').value = data.basic_info_age || '';
                document.getElementById('home_address').value = data.basic_info_home_address || '';
                document.getElementById('college_course').value = data.basic_college_course || '';
                document.getElementById('college_clinic_file_number').value = data.basic_college_clinic_file_number || '';
                document.getElementById('contact_number').value = data.basic_contact_number || '';
                document.getElementById('religion').value = data.basic_religion || '';
                document.getElementById('occupation').value = data.basic_occupation || '';
                document.getElementById('civil_status').value = data.basic_civil_status || '';
                document.getElementById('basic_complete_name').value = data.basic_complete_name || '';
                document.getElementById('basic_address').value = data.basic_address || '';
                document.getElementById('basic_contact').value = data.basic_contact || '';
                document.getElementById('basic_relationship').value = data.basic_relationship || '';
                document.getElementById('basic_info_smoking').value = data.basic_info_smoking || '';
                document.getElementById('basic_info_smoking_pack_day').value = data.basic_info_smoking_pack_day || '';
                document.getElementById('basic_info_smoking_years').value = data.basic_info_smoking_years || '';
                document.getElementById('basic_info_alcohol_drinking').value = data.basic_info_alcohol_drinking|| '';
            })
            .catch(error => console.error('Error fetching patient data:', error));
    });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>First Name</label>
                                <input type="text" id="firstname" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
                                <span class="invalid-feedback"><?php echo $firstname_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Middle Name</label>
                                <input type="text" id="middlename" name="middlename" class="form-control <?php echo (!empty($middlename_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $middlename; ?>">
                                <span class="invalid-feedback"><?php echo $middlename_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Last Name</label>
                                <input type="text" id="lastname" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
                                <span class="invalid-feedback"><?php echo $lastname_err;?></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Date</label>
                                <input type="text" id="date" name="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date; ?>" placeholder="YYYY-MM-DD">
                                <span class="invalid-feedback"><?php echo $date_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Birthday</label>
                                <input type="text" id="birthday" name="birthday" class="form-control <?php echo (!empty($birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthday; ?>" placeholder="YYYY-MM-DD">
                                <span class="invalid-feedback"><?php echo $birthday_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sex</label>
                                <select id="sex" name="sex" class="form-control <?php echo (!empty($sex_err)) ? 'is-invalid' : ''; ?>">
                                    <option value="">Select</option>
                                    <option value="Male" <?php echo ($sex == "Male") ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo ($sex == "Female") ? 'selected' : ''; ?>>Female</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $sex_err;?></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Age</label>
                                <input type="text" id="age" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                                <span class="invalid-feedback"><?php echo $age_err;?></span>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Home Address</label>
                                <input type="text" id="home_address" name="home_address" class="form-control <?php echo (!empty($home_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $home_address; ?>">
                                <span class="invalid-feedback"><?php echo $home_address_err;?></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>College Course</label>
                                <input type="text" id="college_course" name="college_course" class="form-control <?php echo (!empty($college_course_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $college_course; ?>">
                                <span class="invalid-feedback"><?php echo $college_course_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>College Clinic File Number</label>
                                <input type="text" id="college_clinic_file_number" name="college_clinic_file_number" class="form-control <?php echo (!empty($college_clinic_file_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $college_clinic_file_number; ?>">
                                <span class="invalid-feedback"><?php echo $college_clinic_file_number_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Contact Number</label>
                                <input type="text" id="contact_number" name="contact_number" class="form-control <?php echo (!empty($contact_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $contact_number; ?>">
                                <span class="invalid-feedback"><?php echo $contact_number_err;?></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Religion</label>
                                <input type="text" id="religion" name="religion" class="form-control <?php echo (!empty($religion_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $religion; ?>">
                                <span class="invalid-feedback"><?php echo $religion_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Occupation</label>
                                <input type="text" id="occupation" name="occupation" class="form-control <?php echo (!empty($occupation_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $occupation; ?>">
                                <span class="invalid-feedback"><?php echo $occupation_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Civil Status</label>
                                <input type="text" id="civil_status" name="civil_status" class="form-control <?php echo (!empty($civil_status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $civil_status; ?>">
                                <span class="invalid-feedback"><?php echo $civil_status_err;?></span>
                            </div>
                        </div>
                        <h4>Incase of Emergency</h4>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Complete Name</label>
                                <input type="text" id="basic_complete_name" name="basic_complete_name" class="form-control <?php echo (!empty($basic_complete_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_complete_name; ?>">
                                <span class="invalid-feedback"><?php echo $basic_complete_name_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Address</label>
                                <input type="text" id="basic_address" name="basic_address" class="form-control <?php echo (!empty($basic_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_address; ?>">
                                <span class="invalid-feedback"><?php echo $basic_address_err;?></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Contact</label>
                                <input type="text" id="basic_contact" name="basic_contact" class="form-control <?php echo (!empty($basic_contact_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_contact; ?>">
                                <span class="invalid-feedback"><?php echo $basic_contact_err;?></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Relationship</label>
                                <input type="text" id="basic_relationship" name="basic_relationship" class="form-control <?php echo (!empty($basic_relationship_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_relationship; ?>">
                                <span class="invalid-feedback"><?php echo $basic_relationship_err;?></span>
                            </div>
                        </div>
                        <h4>Life Choice</h4>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Smoking Status</label>
                                    <select id="basic_info_smoking" name="basic_info_smoking" class="form-control <?php echo (!empty($basic_info_smoking_err)) ? 'is-invalid' : ''; ?>">
                                        <option value="">Select</option>
                                        <option value="Yes" <?php echo ($basic_info_smoking == "Yes") ? 'selected' : ''; ?>>Yes</option>
                                        <option value="No" <?php echo ($basic_info_smoking == "No") ? 'selected' : ''; ?>>No</option>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $basic_info_smoking_err;?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Smoking Pack/Day</label>
                                    <input type="text" id="basic_info_smoking_pack_day" name="basic_info_smoking_pack_day" class="form-control <?php echo (!empty($basic_info_smoking_pack_day_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_info_smoking_pack_day; ?>">
                                    <span class="invalid-feedback"><?php echo $basic_info_smoking_pack_day_err; ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Smoking Years</label>
                                    <input type="text" id="basic_info_smoking_years" name="basic_info_smoking_years" class="form-control <?php echo (!empty($basic_info_smoking_years_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $basic_info_smoking_years; ?>">
                                    <span class="invalid-feedback"><?php echo $basic_info_smoking_years_err;?></span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Alcohol Drinking</label>
                                    <select id="basic_info_alcohol_drinking" name="basic_info_alcohol_drinking" class="form-control <?php echo (!empty($basic_info_alcohol_drinking_err)) ? 'is-invalid' : ''; ?>">
                                        <option value="">Select</option>
                                        <option value="Yes" <?php echo ($basic_info_alcohol_drinking == "Yes") ? 'selected' : ''; ?>>Yes</option>
                                        <option value="No" <?php echo ($basic_info_alcohol_drinking == "No") ? 'selected' : ''; ?>>No</option>
                                    </select>
                                    <span class="invalid-feedback"><?php echo $basic_info_alcohol_drinking_err;?></span>
                                </div>
                            </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="../welcome.php" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
