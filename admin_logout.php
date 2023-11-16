<?php
session_start(); // Make sure to start the session

// Check if the user is logged in and the session variable is set
if(isset($_SESSION['admin_id'])) {
    // Unset the session variable
    unset($_SESSION['admin_id']);
}

// Redirect to the login page or any other page after destroying the session variable
header("Location: admin_login.php");
exit();

?>
