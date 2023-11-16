<!-- process_update_driver.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_driver'])) {
    // Get driver data from the form
    $driver_id = $_POST['driver_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $nid = $_POST['nid'];
    $license = $_POST['license'];
    $contact = $_POST['contact'];

    // Update driver data in the database
    $query = "UPDATE drivers SET name = ?, address = ?, nid = ?, license = ?, contact = ? WHERE driver_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssssi', $name, $address, $nid, $license, $contact, $driver_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Driver updated successfully
        header("Location: admin_drivers.php");
        exit();
    } else {
        // Driver update failed
        // You can handle the failure scenario here
        header("Location: update_driver.php?id=$driver_id&error=update_driver_failed");
        exit();
    }
}

mysqli_close($connection);
?>
