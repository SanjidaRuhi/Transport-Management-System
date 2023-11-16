<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Static admin password
    $adminPassword = "1";

    // Get the entered password from the form
    $enteredPassword = $_POST["password"];

    // Check if the entered password matches the static admin password
    if ($enteredPassword == $adminPassword) {
        // Redirect to the admin dashboard
        session_start();
            $_SESSION['admin_id'] = 'loged';
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Incorrect password, redirect back to the login page with an error message
        header("Location: admin_login.php?error=incorrect_password");
        exit();
    }
}
?>
