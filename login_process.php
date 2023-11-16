<?php
// Include the database connection file
include 'db_connection.php';

// Get user input from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to retrieve user data by email
$query = "SELECT * FROM users WHERE email = ?";

// Prepare and execute the query using prepared statements
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    // Check if a user with the given email exists
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        $hashedPassword = $row['password'];

        // Verify the password against the hashed password in the database
        if (password_verify($password, $hashedPassword)) {
            // Password is correct
            // Set up a session for the authenticated user
            session_start();
            $_SESSION['user_id'] = $row['id']; // You can store more user data in the session if needed

            // Redirect the user to their profile or a welcome page
            header("Location: profile.php");
        } else {
            // Password is incorrect
            // You can handle the incorrect password scenario here
            header("Location: login.php?error=incorrect_password");
        }
    } else {
        // User with the given email does not exist
        // You can handle the non-existent user scenario here
        header("Location: login.php?error=user_not_found");
    }
} else {
    // Database error handling
    // You can handle the database error scenario here
    header("Location: login.php?error=database_error");
}

// Close the database connection
mysqli_close($connection);
?>
