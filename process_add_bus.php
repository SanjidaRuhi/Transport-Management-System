<!-- process_add_bus.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_bus'])) {
    // Get bus data from the form
    $bus_name = $_POST['bus_name'];
    $registration_no = $_POST['registration_no'];
    $seat_no = $_POST['seat_no'];
    $driver_id = $_POST['driver_id'];
    $staff_id = $_POST['staff_id'];

    // Insert bus data into the database
    $query = "INSERT INTO buses (bus_name, registration_no, seat_no, driver_id, staff_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssiii', $bus_name, $registration_no, $seat_no, $driver_id, $staff_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Bus added successfully
        header("Location: admin_buses.php");
        exit();
    } else {
        // Bus addition failed
        // You can handle the failure scenario here
        header("Location: add_bus.php?error=add_bus_failed");
        exit();
    }
}

mysqli_close($connection);
?>
