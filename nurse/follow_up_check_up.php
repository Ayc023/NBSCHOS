<?php
// Include database connection
include('../config.php');

// Check if patient_id is passed in the URL
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;
if ($patient_id === null) {
    die("Patient ID is not provided.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $patient_id = $_POST['patient_id']; // Use hidden input field for patient_id
    $follow_up_date = $_POST['follow_up_date'];
    $checkup_details = $_POST['checkup_details'];
    $recommendations = $_POST['recommendations'];

    // Insert new follow-up checkup record
    $stmt = $link->prepare("INSERT INTO follow_up_checkup (patient_id, follow_up_date, checkup_details, recommendations) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('isss', $patient_id, $follow_up_date, $checkup_details, $recommendations);
    $stmt->execute();

    echo "Follow-up checkup added successfully!";
}

// Fetch existing follow-up checkup records
$stmt = $link->prepare("SELECT follow_up_date, checkup_details, recommendations FROM follow_up_checkup WHERE patient_id = ?");
$stmt->bind_param('i', $patient_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Follow-Up Checkup</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Follow-Up Checkup</h2>

<!-- Follow-Up Checkup Form -->
<form method="POST" action="follow_up_check_up.php?patient_id=<?php echo $patient_id; ?>">
    <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>"> <!-- Hidden field to pass patient_id -->

    <label for="follow_up_date">Follow-Up Date:</label>
    <input type="date" id="follow_up_date" name="follow_up_date" required><br>

    <label for="checkup_details">Checkup Details:</label>
    <textarea id="checkup_details" name="checkup_details" rows="4" required></textarea><br>

    <label for="recommendations">Recommendations:</label>
    <textarea id="recommendations" name="recommendations" rows="4" required></textarea><br>

    <button type="submit">Add Follow-Up Checkup</button>
</form>

<!-- Display Previous Follow-Ups -->
<h3>Previous Follow-Up Checkups</h3>
<table>
    <tr>
        <th>Date</th>
        <th>Checkup Details</th>
        <th>Recommendations</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['follow_up_date']; ?></td>
        <td><?php echo $row['checkup_details']; ?></td>
        <td><?php echo $row['recommendations']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
