<?php
session_start(); // Start the session

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Include the necessary database connection
include 'db_connection.php';

// Check if the card ID is provided in the URL
if (isset($_GET['id'])) {
    $card_id = $_GET['id'];

    // Update the approve status to 'yes'
    $query = "UPDATE cards SET approve_status = 'yes' WHERE card_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $card_id);
    mysqli_stmt_execute($stmt);

    header("Location: admin_cards.php");
    exit();
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
