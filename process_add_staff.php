<!-- process_add_staff.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_staff'])) {
    // Get staff data from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $nid = $_POST['nid'];
    $contact = $_POST['contact'];

    // Insert staff data into the database
    $query = "INSERT INTO staffs (name, address, nid, contact) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $address, $nid, $contact);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Staff added successfully
        header("Location: admin_staff.php");
        exit();
    } else {
        // Staff addition failed
        // You can handle the failure scenario here
        header("Location: add_staff.php?error=add_staff_failed");
        exit();
    }
}

mysqli_close($connection);
?>
