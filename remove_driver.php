<!-- remove_driver.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $driver_id = $_GET['id'];

    // Remove driver from the database
    $query = "DELETE FROM drivers WHERE driver_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $driver_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Driver removed successfully
        header("Location: admin_drivers.php");
        exit();
    } else {
        // Driver removal failed
        // You can handle the failure scenario here
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
