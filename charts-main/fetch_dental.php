<?php
// Database connection
$host = 'localhost';
$db = 'u593341949_dev_nbsc_hos';
$user = 'u593341949_devHOS2024';
$pass = 'NBSC-Clinic2024';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch the date field and count the number of patients grouped by week, month, and year
    $query = "
        SELECT
            COUNT(id) AS patient_count,
            YEAR(date) AS year,
            MONTH(date) AS month,
            WEEK(date) AS week
        FROM dental_records
        GROUP BY year, month, week
        ORDER BY year, month, week";
        
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Fetching the data
    $weeklyRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Monthly count query
    $query = "
        SELECT
            COUNT(id) AS patient_count,
            YEAR(date) AS year,
            MONTH(date) AS month
        FROM dental_records
        GROUP BY year, month
        ORDER BY year, month";
        
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $monthlyRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Yearly count query
    $query = "
        SELECT
            COUNT(id) AS patient_count,
            YEAR(date) AS year
        FROM dental_records
        GROUP BY year
        ORDER BY year";
        
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $yearlyRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Encoding the data into JSON format to pass to JavaScript
    $data = [
        'weekly' => $weeklyRecords,
        'monthly' => $monthlyRecords,
        'yearly' => $yearlyRecords
    ];

    echo json_encode($data);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
