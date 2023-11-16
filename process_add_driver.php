<!-- process_add_driver.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_driver'])) {
    // Get driver data from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $nid = $_POST['nid'];
    $license = $_POST['license'];
    $contact = $_POST['contact'];

    // Insert driver data into the database
    $query = "INSERT INTO drivers (name, address, nid, license, contact) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sssss', $name, $address, $nid, $license, $contact);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Driver added successfully
        header("Location: admin_drivers.php");
        exit();
    } else {
        // Driver addition failed
        // You can handle the failure scenario here
        header("Location: add_driver.php?error=add_driver_failed");
        exit();
    }
}
?>
