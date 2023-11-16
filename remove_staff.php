<!-- remove_staff.php -->

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $staff_id = $_GET['id'];

    // Remove staff from the database
    $query = "DELETE FROM staffs WHERE staff_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $staff_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Staff removed successfully
        header("Location: admin_staff.php");
        exit();
    } else {
        // Staff removal failed
        // You can handle the failure scenario here
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connection);
?>
