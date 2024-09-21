<?php
require_once "../config.php";

header('Content-Type: application/json');

if (isset($_GET['patient_id'])) {
    $patient_id = trim($_GET['patient_id']);

    // Prepare a SQL query to fetch patient data
    $sql = "SELECT * FROM basic_info WHERE patient_id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $patient_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            echo json_encode($row);
        } else {
            echo json_encode(["error" => "Patient not found"]);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(["error" => "Error preparing statement"]);
    }
    
    mysqli_close($link);
} else {
    echo json_encode(["error" => "No patient ID provided"]);
}
?>
