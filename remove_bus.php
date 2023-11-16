<!-- remove_bus.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $bus_id = $_GET['id'];

    // Remove bus from the database
    $query = "DELETE FROM buses WHERE bus_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $bus_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Bus removed successfully
        header("Location: admin_buses.php");
        exit();
    } else {
        // Bus removal failed
        // You can handle the failure scenario here
        header("Location: admin_buses.php?error=remove_bus_failed");
        exit();
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
