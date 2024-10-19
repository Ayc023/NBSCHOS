<?php
require_once "../config.php";

// Initialize variables
$patient_id = isset($_GET['id']) ? trim($_GET['id']) : '';
$name = $age_sex = $birthday = $home_address = $contact_number = '';

// Fetch patient data from the database
if ($patient_id) {
    $sql = "SELECT * FROM medical_form WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Assign fetched data to variables
            $name = $row['name'];
            $age_sex = $row['age_sex'];
            $birthday = $row['birthday'];
            $home_address = $row['home_address'];
            $contact_number = $row['contact_number'];
        } else {
            echo "No record found for the given ID.";
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement.";
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form data
    $name = trim($_POST['name']);
    $age_sex = trim($_POST['age_sex']);
    $birthday = trim($_POST['birthday']);
    $home_address = trim($_POST['home_address']);
    $contact_number = trim($_POST['contact_number']);

    // Update patient data in the database
    $sql = "UPDATE medical_form SET name = ?, age_sex = ?, birthday = ?, home_address = ?, contact_number = ? WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssi", $name, $age_sex, $birthday, $home_address, $contact_number, $patient_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Patient information updated successfully.";
            // Redirect to a confirmation page or back to the patient list
            header("Location: welcome2.php"); // Change this to your desired redirection
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing update statement.";
    }
}

mysqli_close($link); // Close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Edit Patient Information</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>
        <div class="mb-3">
            <label for="age_sex" class="form-label">Age/Sex</label>
            <input type="text" class="form-control" id="age_sex" name="age_sex" value="<?php echo htmlspecialchars($age_sex); ?>" required>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo htmlspecialchars($birthday); ?>" required>
        </div>
        <div class="mb-3">
            <label for="home_address" class="form-label">Home Address</label>
            <input type="text" class="form-control" id="home_address" name="home_address" value="<?php echo htmlspecialchars ($home_address); ?>" required>
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="tel" class="form-control" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Patient</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>