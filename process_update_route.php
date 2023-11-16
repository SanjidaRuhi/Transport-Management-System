<!-- process_update_route.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_route'])) {
    // Get route data from the form
    $route_id = $_POST['route_id'];
    $route_name = $_POST['route_name'];
    $station = $_POST['station'];
    $destination = $_POST['destination'];
    $via_routes = $_POST['via_routes'];
    $time = $_POST['time'];
    $bus_id = $_POST['bus_id'];

    // Update route data in the database
    $query = "UPDATE routes SET route_name = ?, station = ?, destination = ?, via_routes = ?, time = ?, bus_id = ? WHERE route_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssssii', $route_name, $station, $destination, $via_routes, $time, $bus_id, $route_id);  // Change 'sssssi' to 'sssssii'
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Route updated successfully
        header("Location: admin_routes.php");
        exit();
    } else {
        // Route update failed
        // You can handle the failure scenario here
        header("Location: update_route.php?id=$route_id&error=update_route_failed");
        exit();
    }
}

mysqli_close($connection);
?>
