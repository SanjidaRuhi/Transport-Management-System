<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php';

$user_id = $_SESSION['user_id'];

// Check if the account is already enabled
$query_check = "SELECT * FROM accounts WHERE user_id = ?";
$stmt_check = mysqli_prepare($connection, $query_check);
mysqli_stmt_bind_param($stmt_check, 'i', $user_id);
mysqli_stmt_execute($stmt_check);
$result_check = mysqli_stmt_get_result($stmt_check);

if ($row_check = mysqli_fetch_assoc($result_check)) {
    // Check if the account is already enabled
    if ($row_check['enabled'] == 1) {
        echo "Your account is already enabled.";
    } else {
        // Enable the account
        $query_enable = "UPDATE accounts SET enabled = 1 WHERE user_id = ?";
        $stmt_enable = mysqli_prepare($connection, $query_enable);
        mysqli_stmt_bind_param($stmt_enable, 'i', $user_id);
        mysqli_stmt_execute($stmt_enable);

        echo "Your account has been enabled.";
    }
} else {
    // Insert data into the accounts table
    $query_insert = "INSERT INTO accounts (user_id, balance, total_travel, enabled) VALUES (?, 0, 0, 1)";
    $stmt_insert = mysqli_prepare($connection, $query_insert);
    mysqli_stmt_bind_param($stmt_insert, 'i', $user_id);
    mysqli_stmt_execute($stmt_insert);

    echo "Your account has been enabled.";
}

// Fetch and display all data from the accounts table
$query_display = "SELECT * FROM accounts WHERE user_id = ?";
$stmt_display = mysqli_prepare($connection, $query_display);
mysqli_stmt_bind_param($stmt_display, 'i', $user_id);
mysqli_stmt_execute($stmt_display);
$result_display = mysqli_stmt_get_result($stmt_display);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Account Page</h2>
        <form action="" method="post">
            <button type="submit" class="btn btn-primary" name="enable_account">Enable Account</button>
        </form>
        <?php
        // Display user account data
        while ($row_display = mysqli_fetch_assoc($result_display)) {
            echo "<p>User ID: " . $row_display['user_id'] . "</p>";
            echo "<p>Balance: $" . $row_display['balance'] . "</p>";
            echo "<p>Total Travel: " . $row_display['total_travel'] . "</p>";
            echo "<p>Enabled: " . ($row_display['enabled'] == 1 ? 'Yes' : 'No') . "</p>";
        }
        ?>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
