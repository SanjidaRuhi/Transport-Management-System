<!-- process_add_route.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_route'])) {
    // Get route data from the form
    $route_name = $_POST['route_name'];
    $station = $_POST['station'];
    $destination = $_POST['destination'];
    $via_routes = $_POST['via_routes'];
    $time = $_POST['time'];
    $bus_id = $_POST['bus_id'];

    // Insert route data into the database
    $query = "INSERT INTO routes (route_name, station, destination, via_routes, time, bus_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssssi', $route_name, $station, $destination, $via_routes, $time, $bus_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Route added successfully
        header("Location: admin_routes.php");
        exit();
    } else {
        // Route addition failed
        // You can handle the failure scenario here
        header("Location: add_route.php?error=add_route_failed");
        exit();
    }
}

mysqli_close($connection);
?>
