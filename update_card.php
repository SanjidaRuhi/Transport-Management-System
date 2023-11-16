<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include the necessary database connection
include 'db_connection.php';

$user_id = $_SESSION['user_id'];

// Check if the user has a card in the cards table
$query = "SELECT * FROM cards WHERE user_id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    // Update user data in the cards table
    $query = "UPDATE cards SET name = ?, department = ?, email = ?, dob = ?, address = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssssi', $_POST['name'], $_POST['department'], $_POST['email'], $_POST['dob'], $_POST['address'], $user_id);
    mysqli_stmt_execute($stmt);

    header("Location: user_card.php");
    exit();
} else {
    // Show a message that the user hasn't added a card yet
    echo "You haven't added a card yet.";
}

mysqli_close($connection);
?>
