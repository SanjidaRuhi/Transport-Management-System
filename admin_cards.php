<?php
session_start(); // Start the session

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Include the necessary database connection
include 'db_connection.php';

// Fetch all card requests from the cards table
$query = "SELECT * FROM cards";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Cards</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <h2>Admin Cards</h2><br><br>
          <a href="admin_dashboard.php" class="btn btn-primary float-right">Admin Dashboard</a><br><br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Approve Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['card_id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['approve_status']; ?></td>
                        <td>
                            <?php
                            if ($row['approve_status'] == 'no') {
                                echo '<a href="admin_approve_card.php?id=' . $row['card_id'] . '" class="btn btn-success">Approve</a>';
                            }
                            echo '<a href="admin_remove_card.php?id=' . $row['card_id'] . '" class="btn btn-danger">Remove</a>';
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
