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
                        <a href="crud/create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Medical Information</a>
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
                    $sql = "SELECT basic_info_id, basic_info_date, basic_info_firstname, basic_info_middlename, basic_info_lastname, basic_info_birthday, basic_info_sex, basic_info_age, basic_info_home_address FROM basic_info";

                    if ($search) {
                        $sql .= " WHERE basic_info_firstname LIKE '%$search%' OR basic_info_lastname LIKE '%$search%' OR basic_info_home_address LIKE '%$search%'";
                    }

                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Firstname</th>";
                                        echo "<th>Middlename</th>";
                                        echo "<th>Lastname</th>";
                                        echo "<th>Birthday</th>";
                                        echo "<th>Sex</th>";
                                        echo "<th>Age</th>";
                                        echo "<th>Home Address</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                        echo "<td>" . $row['basic_info_id'] . "</td>";
                                        echo "<td>" . $row['basic_info_date'] . "</td>";
                                        echo "<td>" . $row['basic_info_firstname'] . "</td>";
                                        echo "<td>" . $row['basic_info_middlename'] . "</td>";
                                        echo "<td>" . $row['basic_info_lastname'] . "</td>";
                                        echo "<td>" . $row['basic_info_birthday'] . "</td>";
                                        echo "<td>" . $row['basic_info_sex'] . "</td>";
                                        echo "<td>" . $row['basic_info_age'] . "</td>";
                                        echo "<td>" . $row['basic_info_home_address'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="crud/read.php?id=' . $row['basic_info_id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="crud/update.php?id=' . $row['basic_info_id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="crud/delete.php?id=' . $row['basic_info_id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
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
