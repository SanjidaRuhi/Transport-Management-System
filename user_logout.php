<?php
session_start(); // Make sure to start the session

// Check if the user is logged in and the session variable is set
if(isset($_SESSION['user_id'])) {
    // Unset the session variable
    unset($_SESSION['user_id']);
}

// Redirect to the login page or any other page after destroying the session variable
header("Location: login.php");
exit();

?>
