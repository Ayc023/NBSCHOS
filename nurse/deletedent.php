<?php
require_once "../config.php";

// Initialize patient ID
$patient_id = isset($_GET['id']) ? trim($_GET['id']) : '';

// Check if patient ID is provided
if ($patient_id) {
    // Prepare the DELETE statement
    $sql = "DELETE FROM dental_records WHERE id = ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Deletion successful
            echo "Patient record deleted successfully.";
            // Redirect to the patient list or another page
            header("Location: dental_record.php"); // Change this to your desired redirection
            exit;
        } else {
            // Error executing the statement
            echo "Error deleting record: " . mysqli_error($link);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the statement
        echo "Error preparing delete statement.";
    }
} else {
    // No patient ID provided
    echo "No patient ID specified.";
}

// Close the database connection
mysqli_close($link);
?>