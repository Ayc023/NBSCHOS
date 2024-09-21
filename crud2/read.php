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
                    <h1 class="mt-5 mb-3">View Dental Record</h1>
                    <div class="form-group">
                        <label>Type</label>
                        <p><b><?php echo $row["dental_type"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <p><b><?php echo $row["dental_date"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["dental_name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <p><b><?php echo $row["dental_age"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p><b><?php echo $row["dental_address"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Telephone No.</label>
                        <p><b><?php echo $row["dental_tel_no"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Course Taken Year</label>
                        <p><b><?php echo $row["dental_course_taken_year"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <p><b><?php echo $row["dental_date_of_birth"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Sex</label>
                        <p><b><?php echo $row["dental_sex"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Civil Status</label>
                        <p><b><?php echo $row["dental_civil_status"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Allergies (Medication/Food)</label>
                        <p><b><?php echo $row["dental_allergy_medication_food"]; ?></b></p>
                    </div>
                    <p><a href="../add_dental_info.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
