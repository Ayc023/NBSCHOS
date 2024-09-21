<?php
// Database connection
include '../config.php'; // Ensures your existing config.php is included correctly

// Initialize variables
$medicineRecords = [];

if ($link) {
    // Fetch medicine records from the database
    $query = "SELECT * FROM medicine_record";
    $result = $link->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $medicineRecords[] = $row;
        }
    } else {
        echo "No records found or query failed!";
    }

    // Close the connection
    $link->close();
} else {
    echo "Database connection failed!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/medicine.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-2">
    <a class="navbar-brand ps-2" href="#">
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
                    <li><a class="dropdown-item" href="welcome2.php">home</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>


    <div class="container">
        <h2>Medicine Record</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Dosage</th>
                    <th>Frequency</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicineRecords as $record): ?>
                <tr>
                    <td><?php echo htmlspecialchars($record['medicine_id']); ?></td>
                    <td><?php echo htmlspecialchars($record['medicine_name']); ?></td>
                    <td><?php echo htmlspecialchars($record['dosage']); ?></td>
                    <td><?php echo htmlspecialchars($record['frequency']); ?></td>
                    <td><?php echo htmlspecialchars($record['start_date']); ?></td>
                    <td><?php echo htmlspecialchars($record['end_date']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
