<!-- process_update_bus.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_bus'])) {
    // Get bus data from the form
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $registration_no = $_POST['registration_no'];
    $seat_no = $_POST['seat_no'];
    $driver_id = $_POST['driver_id'];
    $staff_id = $_POST['staff_id'];

    // Update bus data in the database
    $query = "UPDATE buses SET bus_name = ?, registration_no = ?, seat_no = ?, driver_id = ?, staff_id = ? WHERE bus_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssiiii', $bus_name, $registration_no, $seat_no, $driver_id, $staff_id, $bus_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Bus updated successfully
        header("Location: admin_buses.php");
        exit();
    } else {
        // Bus update failed
        // You can handle the failure scenario here
        header("Location: update_bus.php?id=$bus_id&error=update_bus_failed");
        exit();
    }
}

mysqli_close($connection);
?>
