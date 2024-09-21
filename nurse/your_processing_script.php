<?php
// your_processing_script.php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and sanitize input data
    $basic_info_smoking = isset($_POST['basic_info_smoking']) ? htmlspecialchars($_POST['basic_info_smoking']) : '';
    $basic_info_smoking_pack_day = isset($_POST['basic_info_smoking_pack_day']) ? htmlspecialchars($_POST['basic_info_smoking_pack_day']) : '';
    $basic_info_smoking_years = isset($_POST['basic_info_smoking_years']) ? htmlspecialchars($_POST['basic_info_smoking_years']) : '';
    $basic_info_alcohol_drinking = isset($_POST['basic_info_alcohol_drinking']) ? htmlspecialchars($_POST['basic_info_alcohol_drinking']) : '';
    $basic_info_alcohol_drink_types = isset($_POST['basic_info_alcohol_drink_types']) ? htmlspecialchars($_POST['basic_info_alcohol_drink_types']) : '';

    // Example of how to save to the database using a prepared statement with PDO
    try {
        // Database connection
        $pdo = new PDO("mysql:host=localhost;dbname=medical", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL insert statement
        $sql = "INSERT INTO basic_info (basic_info_smoking, basic_info_smoking_pack_day, basic_info_smoking_years, basic_info_alcohol_drinking, basic_info_alcohol_drink_types)
                VALUES (:basic_info_smoking, :basic_info_smoking_pack_day, :basic_info_smoking_years, :basic_info_alcohol_drinking, :basic_info_alcohol_drink_types)";

        // Prepare and bind parameters
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':basic_info_smoking', $basic_info_smoking);
        $stmt->bindParam(':basic_info_smoking_pack_day', $basic_info_smoking_pack_day);
        $stmt->bindParam(':basic_info_smoking_years', $basic_info_smoking_years);
        $stmt->bindParam(':basic_info_alcohol_drinking', $basic_info_alcohol_drinking);
        $stmt->bindParam(':basic_info_alcohol_drink_types', $basic_info_alcohol_drink_types);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Data saved successfully!";
        } else {
            echo "Failed to save data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $pdo = null;
}
?>
