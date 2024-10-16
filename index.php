<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect accordingly
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // Redirect based on admin status
    if($_SESSION["is_admin"] === 1){
        header("location: welcome.php"); // Redirect to admin dashboard if admin
    } else {
        header("location: nurse/welcome2.php"); // Redirect to user dashboard if regular user
    }
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

// ...

// Validate credentials
if(empty($username_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT id, username, password, is_admin, role FROM users WHERE username = :username";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Check if username exists, if yes then verify password
            if($stmt->rowCount() == 1){
                if($row = $stmt->fetch()){
                    $id = $row["id"];
                    $username = $row["username"];
                    $hashed_password = $row["password"];
                    $is_admin = $row["is_admin"];
                    $role = $row["role"]; // Retrieve the role
                    
                    if(password_verify($password, $hashed_password)){
                        // Password is correct, so store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        $_SESSION["is_admin"] = $is_admin;
                        $_SESSION["role"] = $role; // Store the role in session
                        
                        // Redirect based on role
                        if((int)$is_admin === 1){
                            header("location: welcome.php"); // Admin dashboard
                        } elseif($role === 'patient'){
                            header("location: patients/welcome.php"); // Patient dashboard
                        } else {
                            header("location: nurse/welcome2.php"); // User dashboard
                        }
                        
                        exit;
                    } else{
                        // Password is not valid, display a generic error message
                        $login_err = "Invalid username or password.";
                    }
                }
            } else{
                // Username doesn't exist, display a generic error message
                $login_err = "Invalid username or password.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        unset($stmt);
    }
}

// ...
    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/login.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #003366;
        }
        .container {
            width: 400px;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .btn-primary {
            background-color: #1535ee;
            border-color: #1535ee;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0026a3;
            box-shadow: 0 0 15px rgba(0, 38, 163, 0.5);
        }
        .logo {
            width: 80px;
            margin-bottom: 15px;
        }
        .header-text {
            margin-bottom: 25px;
            color: #003366;
            font-weight: bold;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-control {
            padding: 10px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #1535ee;
            box-shadow: 0 0 5px rgba(21, 53, 238, 0.4);
        }
        p {
            margin-top: 20px;
            color: #666;
        }
        a {
            color: #1535ee;
        }
        a:hover {
            color: #0026a3;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="src/Nbsc_logo-removebg-preview.png" alt="Logo" class="logo">
        <h1 class="header-text">NBSC HOS</h1>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary w-100" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>
