<!-- remove_route.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $route_id = $_GET['id'];

    // Remove route from the database
    $query = "DELETE FROM routes WHERE route_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $route_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Route removed successfully
        header("Location: admin_routes.php");
        exit();
    } else {
        // Route removal failed
        // You can handle the failure scenario here
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
