<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include the necessary database connection
include 'db_connection.php';

// Get user data from the users table
$user_id = $_SESSION['user_id'];

// Fetch user data from the users table
$query_user = "SELECT * FROM users WHERE id = ?";
$stmt_user = mysqli_prepare($connection, $query_user);
mysqli_stmt_bind_param($stmt_user, 'i', $user_id);
mysqli_stmt_execute($stmt_user);
$result_user = mysqli_stmt_get_result($stmt_user);

if ($row_user = mysqli_fetch_assoc($result_user)) {
    // Check if there is a pending request or an approved card for the user
    $query_check = "SELECT * FROM cards WHERE user_id = ? AND (approve_status = 'no' OR approve_status = 'yes')";
    $stmt_check = mysqli_prepare($connection, $query_check);
    mysqli_stmt_bind_param($stmt_check, 'i', $user_id);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if ($row_check = mysqli_fetch_assoc($result_check)) {
        // Check if the request is pending
        if ($row_check['approve_status'] == 'no') {
            echo "Your request is pending.";
        } else {
            echo "You already have a card.";
        }
    } else {
        // Insert user data into the cards table with approve status set to 'no'
        $query_insert = "INSERT INTO cards (user_id, name, department, email, dob, address, approve_status) VALUES (?, ?, ?, ?, ?, ?, 'no')";
        $stmt_insert = mysqli_prepare($connection, $query_insert);
        mysqli_stmt_bind_param($stmt_insert, 'isssss', $user_id, $row_user['name'], $row_user['department'], $row_user['email'], $row_user['dob'], $row_user['address']);
        mysqli_stmt_execute($stmt_insert);

        header("Location: user_card.php");
        exit();
    }
} else {
    // Handle the case where user data is not found
    echo "User data not found.";
}

mysqli_close($connection);
?>
