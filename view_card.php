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
    if ($row['approve_status'] === 'yes') {
        // Show the card details
        echo "Card Details: ";
        echo "<br>User ID: " . $row['user_id'];
        echo "<br>Name: " . $row['name'];
        echo "<br>Department: " . $row['department'];
        echo "<br>Email: " . $row['email'];
        echo "<br>Date of Birth: " . $row['dob'];
        echo "<br>Address: " . $row['address'];
    } elseif ($row['approve_status'] === 'no') {
        // Show a message that the request is pending
        echo "Your card request is pending.";
    }
} else {
    // Show a message that the user hasn't applied yet
    echo "You haven't applied for a card yet.";
}

mysqli_close($connection);
?>
