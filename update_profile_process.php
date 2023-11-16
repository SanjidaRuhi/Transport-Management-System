<?php
// Include the database connection file
include 'db_connection.php';

// Initialize a session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the user's ID from the session
    $user_id = $_SESSION['user_id'];

    // Get user input from the update profile form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    // SQL query to update user data in the database
    $query = "UPDATE users SET name = ?, email = ?, dob = ?, address = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $email, $dob, $address, $user_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Data update successful
        header("Location: profile.php");
    } else {
        // Data update failed
        // You can handle the update failure scenario here
        header("Location: update_profile.php?error=update_failed");
    }
} else {
    // User is not logged in
    header("Location: login.php");
}
?>
