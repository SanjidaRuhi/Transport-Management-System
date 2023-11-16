<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_notice'])) {
    // Get notice data from the form
    $title = $_POST['title'];
    $body = $_POST['description'];
    $added_time = date('Y-m-d H:i:s'); // Current date and time

    // Insert notice data into the database
    $query = "INSERT INTO notices (title, body, added_time) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt === false) {
        // Handle the error
        die("Error in preparing statement: " . mysqli_error($connection));
    }

    mysqli_stmt_bind_param($stmt, 'sss', $title, $body, $added_time);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Notice added successfully
        header("Location: admin_notices.php");
        exit();
    } else {
        // Notice addition failed
        // You can handle the failure scenario here
        header("Location: add_notice.php?error=add_notice_failed");
        exit();
    }
}

mysqli_close($connection);
?>
