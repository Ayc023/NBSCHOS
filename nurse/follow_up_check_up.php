<?php
// Include your database configuration
require_once '../config.php'; // Ensure this file contains your DB connection setup

// Add follow-up check-up
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_checkup'])) {
    $patient_name = $_POST['patient_name'];  // Changed from patient_id to patient_name
    $follow_up_date = $_POST['follow_up_date'];
    $checkup_details = $_POST['checkup_details'];
    $recommendations = $_POST['recommendations'];

    // Using PDO to insert a new record
    try {
        $sql = "INSERT INTO follow_up_checkup (patient_name, follow_up_date, checkup_details, recommendations) VALUES (?, ?, ?, ?)"; // Use patient_name here
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$patient_name, $follow_up_date, $checkup_details, $recommendations]);
        echo "<div class='alert alert-success'>New check-up record created successfully</div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}

// Fetch follow-up check-up records using mysqli
$sql = "SELECT * FROM follow_up_checkup";
$result = mysqli_query($link, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Follow-Up Check-Up Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/followup.css"> <!-- Link your CSS file here -->
    <style>
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="../src/Nbsc_logo-removebg-preview.png" alt="NBSC HOS" width="50" height="50">
            NBSC HOS
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Panel</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                        <li><a class="dropdown-item" href="welcome2.php">Home</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-4">Follow Up CheckUp Records</h1>
        
        <form method="POST" action="" class="bg-white p-4 rounded shadow">
            <div class="mb-3">
                <label for="patient_name" class="form-label">Patient Name:</label> <!-- Changed to patient_name -->
                <input type="text" class="form-control" name="patient_name" required> <!-- Changed input type -->
            </div>

            <div class="mb-3">
                <label for="follow_up_date" class="form-label">Follow-Up Date:</label>
                <input type="date" class="form-control" name="follow_up_date" required>
            </div>

            <div class="mb-3">
                <label for="checkup_details" class="form-label">Check-Up Details:</label>
                <textarea class="form-control" name="checkup_details" required></textarea>
            </div>

            <div class="mb-3">
                <label for="recommendations" class="form-label">Recommendations:</label>
                <textarea class="form-control" name="recommendations" required></textarea>
            </div>

            <button type="submit" name="add_checkup" class="btn btn-primary">Add Check-Up Record</button>
        </form>

        <h2 class="mt-5">Existing Check-Up Records</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th> <!-- Changed column heading -->
                        <th>Follow-Up Date</th>
                        <th>Check-Up Details</th>
                        <th>Recommendations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['patient_name']); ?></td> <!-- Changed to name -->
                                <td><?php echo htmlspecialchars($row['follow_up_date']); ?></td>
                                <td><?php echo htmlspecialchars($row['checkup_details']); ?></td>
                                <td><?php echo htmlspecialchars($row['recommendations']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No records found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php 
    // Close mysqli connection
    mysqli_close($link); 
    ?>
</body>
</html>
