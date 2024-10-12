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
        mysqli_stmt_bind_param($stmt, "ssssssissssssssssssiis", 
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../styles/create.css">
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const patientId = 1;

        fetch(`get_patient_data.php?patient_id=${patientId}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

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
                document.getElementById('basic_info_alcohol_drinking').value = data.basic_info_alcohol_drinking || '';
            })
            .catch(error => console.error('Error fetching patient data:', error));
    });
    </script>
</head>
<body class="bg-gray-100">
<h10 class="text-lg font-bold mb-10">Create Record</h10>
<p class="text-gray-600 mb-4">Please fill this form.</p>
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="col-span-1 md:col-span-3">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block font-semibold">First Name</label>
                            <input type="text" id="firstname" name="firstname" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($firstname_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $firstname; ?>">
                            <span class="text-red-500 text-sm"><?php echo $firstname_err;?></span>
                        </div>
                        <div>
                            <label class="block font-semibold">Middle Name</label>
                            <input type="text" id="middlename" name="middlename" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($middlename_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $middlename; ?>">
                            <span class="text-red-500 text-sm"><?php echo $middlename_err;?></span>
                        </div>
                        <div>
                            <label class="block font-semibold">Last Name</label>
                            <input type="text" id="lastname" name="lastname" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($lastname_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $lastname; ?>">
                            <span class="text-red-500 text-sm"><?php echo $lastname_err;?></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block font-semibold">Date</label>
                            <input type="text" id="date" name="date" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($date_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $date; ?>" placeholder="YYYY-MM-DD">
                            <span class="text-red-500 text-sm"><?php echo $date_err;?></span>
                        </div>
                        <div>
                            <label class="block font-semibold">Birthday</label>
                            <input type="text" id="birthday" name="birthday" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($birthday_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $birthday; ?>" placeholder="YYYY-MM-DD">
                            <span class="text-red-500 text-sm"><?php echo $birthday_err;?></span>
                        </div>
                        <div>
                            <label class="block font-semibold">Sex</label>
                            <select id="sex" name="sex" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($sex_err)) ? 'border-red-500' : ''; ?>">
                                <option value="">Select</option>
                                <option value="Male" <?php echo ($sex == "Male") ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ($sex == "Female") ? 'selected' : ''; ?>>Female</option>
                            </select>
                            <span class="text-red-500 text-sm"><?php echo $sex_err;?></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block font-semibold">Age</label>
                            <input type="text" id="age" name="age" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($age_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $age; ?>">
                            <span class="text-red-500 text-sm"><?php echo $age_err;?></span>
                        </div>
                        <div class="col-span-2">
                            <label class="block font-semibold">Home Address</label>
                            <input type="text" id="home_address" name="home_address" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($home_address_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $home_address; ?>">
                            <span class="text-red-500 text-sm"><?php echo $home_address_err;?></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block font-semibold">College Course</label>
                            <input type="text" id="college_course" name="college_course" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($college_course_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $college_course; ?>">
                            <span class="text-red-500 text-sm"><?php echo $college_course_err;?></span>
                        </div>
                        <div>
                            <label class="block font-semibold">Clinic File Number</label>
                            <input type="text" id="college_clinic_file_number" name="college_clinic_file_number" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($college_clinic_file_number_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $college_clinic_file_number; ?>">
                            <span class="text-red-500 text-sm"><?php echo $college_clinic_file_number_err;?></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block font-semibold">Contact Number</label>
                            <input type="text" id="contact_number" name="contact_number" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($contact_number_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $contact_number; ?>">
                            <span class="text-red-500 text-sm"><?php echo $contact_number_err;?></span>
                        </div>
                        <div>
                            <label class="block font-semibold">Religion</label>
                            <input type="text" id="religion" name="religion" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($religion_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $religion; ?>">
                            <span class="text-red-500 text-sm"><?php echo $religion_err;?></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block font-semibold">Occupation</label>
                            <input type="text" id="occupation" name="occupation" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($occupation_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $occupation; ?>">
                            <span class="text-red-500 text-sm"><?php echo $occupation_err;?></span>
                        </div>
                        <div>
                            <label class="block font-semibold">Civil Status</label>
                            <select id="civil_status" name="civil_status" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($civil_status_err)) ? 'border-red-500' : ''; ?>">
                                <option value="">Select</option>
                                <option value="Single" <?php echo ($civil_status == "Single") ? 'selected' : ''; ?>>Single</option>
                                <option value="Married" <?php echo ($civil_status == "Married") ? 'selected' : ''; ?>>Married</option>
                                <option value="Divorced" <?php echo ($civil_status == "Divorced") ? 'selected' : ''; ?>>Divorced</option>
                                <option value="Widowed" <?php echo ($civil_status == "Widowed") ? 'selected' : ''; ?>>Widowed</option>
                            </select>
                            <span class="text-red-500 text-sm"><?php echo $civil_status_err;?></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block font-semibold">Emergency Contact Name</label>
                                <input type="text" id="basic_complete_name" name="basic_complete_name" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($basic_complete_name_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $basic_complete_name; ?>">
                                <span class="text-red-500 text-sm"><?php echo $basic_complete_name_err;?></span>
                            </div>
                            <div>
                                <label class="block font-semibold">Emergency Contact Number</label>
                                <input type="text" id="basic_contact" name="basic_contact" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($basic_contact_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $basic_contact; ?>">
                                <span class="text-red-500 text-sm"><?php echo $basic_contact_err;?></span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block font-semibold">Emergency Contact Address</label>
                                <input type="text" id="basic_address" name="basic_address" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($basic_address_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $basic_address; ?>">
                                <span class="text-red-500 text-sm"><?php echo $basic_address_err;?></span>
                            </div>
                            <div>
                                <label class="block font-semibold">Emergency Contact Relationship</label>
                                <input type="text" id="basic_relationship" name="basic_relationship" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($basic_relationship_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $basic_relationship; ?>">
                                <span class="text-red-500 text-sm"><?php echo $basic_relationship_err;?></span>
                            </div>
                        </div>

                        <!-- Add more fields as needed -->

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block font-semibold">Smoking</label>
                            <select id="basic_info_smoking" name="basic_info_smoking" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($basic_info_smoking_err)) ? 'border-red-500' : ''; ?>">
                                <option value="">Select</option>
                                <option value="Yes" <?php echo ($basic_info_smoking == "Yes") ? 'selected' : ''; ?>>Yes</option>
                                <option value="No" <?php echo ($basic_info_smoking == "No") ? 'selected' : ''; ?>>No</option>
                            </select>
                            <span class="text-red-500 text-sm"><?php echo $basic_info_smoking_err;?></span>
                        </div>

                        <!-- Smoking Details: Pack per Day and Smoking Years -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-semibold">Smoking Pack per Day</label>
                                <input type="number" id="basic_info_smoking_pack_day" name="basic_info_smoking_pack_day" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($basic_info_smoking_pack_day_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $basic_info_smoking_pack_day; ?>" min="0" step="1">
                                <span class="text-red-500 text-sm"><?php echo $basic_info_smoking_pack_day_err;?></span>
                            </div>
                            <div>
                                <label class="block font-semibold">Smoking Years</label>
                                <input type="number" id="basic_info_smoking_years" name="basic_info_smoking_years" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($basic_info_smoking_years_err)) ? 'border-red-500' : ''; ?>" value="<?php echo $basic_info_smoking_years; ?>" min="0" step="1">
                                <span class="text-red-500 text-sm"><?php echo $basic_info_smoking_years_err;?></span>
                            </div>
                        </div>

                        <!-- Alcohol Drinking Field -->
                        <div>
                            <label class="block font-semibold">Alcohol Drinking</label>
                            <select id="basic_info_alcohol_drinking" name="basic_info_alcohol_drinking" class="block w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 <?php echo (!empty($basic_info_alcohol_drinking_err)) ? 'border-red-500' : ''; ?>">
                                <option value="">Select</option>
                                <option value="Yes" <?php echo ($basic_info_alcohol_drinking == "Yes") ? 'selected' : ''; ?>>Yes</option>
                                <option value="No" <?php echo ($basic_info_alcohol_drinking == "No") ? 'selected' : ''; ?>>No</option>
                            </select>
                            <span class="text-red-500 text-sm"><?php echo $basic_info_alcohol_drinking_err;?></span>
                        </div>
                    </div>




                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                        <button type="submit" class="w-full bg-blue-500 text-white rounded-lg py-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
