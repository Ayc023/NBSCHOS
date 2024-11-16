<?php
// admin_security.php
session_start(); // Start the session

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['is_admin'] !== 1) {
    // Redirect to login page or error page
    header('Location: login.php'); // Change to your login page
    exit(); // Stop further script execution
}
?>