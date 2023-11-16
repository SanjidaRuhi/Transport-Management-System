<!-- process_update_staff.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_staff'])) {
    // Get staff data from the form
    $staff_id = $_POST['staff_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $nid = $_POST['nid'];
    $contact = $_POST['contact'];

    // Update staff data in the database
    $query = "UPDATE staffs SET name = ?, address = ?, nid = ?, contact = ? WHERE staff_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $address, $nid, $contact, $staff_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Staff updated successfully
        header("Location: admin_staff.php");
        exit();
    } else {
        // Staff update failed
        // You can handle the failure scenario here
        header("Location: update_staff.php?id=$staff_id&error=update_staff_failed");
        exit();
    }
}

mysqli_close($connection);
?>
