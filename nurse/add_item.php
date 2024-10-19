<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'medical';

// Connect to database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Prepare and execute the insert statement
if (isset($data['name'], $data['date_manufactured'], $data['date_expiry'], $data['quantity'])) {
    $stmt = $conn->prepare("INSERT INTO items (name, date_manufactured, date_expiry, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $data['name'], $data['date_manufactured'], $data['date_expiry'], $data['quantity']);
    $stmt->execute();
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
}

$conn->close();
?>