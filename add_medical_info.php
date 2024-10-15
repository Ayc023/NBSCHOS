<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="crud2/dental.css">
    <script src="../js/formHandler.js" defer></script>
    <style>
        /* General Body Styling */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f8f9fa;
    color: #333;
    margin: 0;
    padding: 0;
}
/* Navbar Customization */
.navbar-custom {
    background-color: #003366;
}

.navbar-custom .navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
    color: #ffffff;
}

.navbar-custom .nav-link {
    color: #ffffff;
    font-weight: 500;
}

.navbar-custom .nav-link:hover {
    color: #00bfff;
}

.navbar-custom .dropdown-menu {
    background-color: #004080;
    border: none;
}

.navbar-custom .dropdown-menu .dropdown-item {
    color: #ffffff;
}

.navbar-custom .dropdown-menu .dropdown-item:hover {
    background-color: #1535ee;
    color: #ffffff;
}

/* Button Styling */
.btn-primary {
    background-color: #1535ee;
    border-color: #1535ee;
}

.btn-primary:hover {
    background-color: #003366;
    border-color: #003366;
}

.btn-success {
    background-color: #003366;
    border-color: #003366;
}

.btn-success:hover {
    background-color: #003366;
    border-color: #003366;
}

/* Table Styling */
table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
}

table th,
table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #004080;
    color: #ffffff;
    font-weight: bold;
}

table td {
    background-color: #f2f2f2;
    color: #333;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

table .fa {
    font-size: 1.2rem;
    color: #003366;
}

table .fa:hover {
    color: #007bff;
}

/* Search Form Styling */
form label {
    font-weight: 500;
}

form .form-control {
    border-radius: 0.25rem;
    border: 1px solid #ccc;
}

form button[type="submit"] {
    background-color: DodgerBlue;
    color: white;
    border: none;
}

form button[type="submit"]:hover {
    background-color: #003366;
}

/* Media Query for Mobile Responsiveness */
@media (max-width: 768px) {
    .navbar-custom .navbar-brand {
        font-size: 1.2rem;
    }
    
    table th, table td {
        font-size: 0.9rem;
    }

    .btn {
        font-size: 0.8rem;
    }
}

    </style>
</head>
<body>
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-1">
        <a class="navbar-brand ps-2" href="#">
            <img src="src/Nbsc_logo-removebg-preview.png" style="height: 0.3in;">
            NBSC HOS
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav ms-auto mb-1 mb-lg-0 flex-nowrap">
            <li class="nav-item">
                <a class="nav-link" href="add_medical_info.php">Medical</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="add_dental_info.php">Dental</a>
            </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Panel</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        <li><a class="dropdown-item" href="welcome.php">Home</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Add Medical Information</h2>
                        <a href="../crud/personalhistory.html" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Information</a>
                    </div>
                    
                    <!-- Search Form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" class="mb-4">
                        <div class="form-group">
                            <label for="search">Search:</label>
                            <input type="text" id="search" name="search" class="form-control" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Search</button>
                    </form>

                    <?php
                    // Include config file
                    require_once "config.php";

                    // Get search query
                    $search = isset($_GET['search']) ? mysqli_real_escape_string($link, $_GET['search']) : '';

                    // Attempt select query execution
                    $sql = "SELECT id, date, name, birthday, age_sex, home_address FROM medical_form";

                    if ($search) {
                        $sql .= " WHERE name LIKE '%$search%' OR id LIKE '%$search%' OR home_address LIKE '%$search%'";
                    }

                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>name</th>";
                                        echo "<th>Birthday</th>";
                                        echo "<th>Age/Sex</th>";
                                        echo "<th>Home Address</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['birthday'] . "</td>";
                                        echo "<td>" . $row['age_sex'] . "</td>";
                                        echo "<td>" . $row['home_address'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="crud/read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="crud/update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="crud/delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
