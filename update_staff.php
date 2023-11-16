<!-- update_staff.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Staff</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Staff</h2>
        <?php
            include 'db_connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                $staff_id = $_GET['id'];

                $query = "SELECT * FROM staffs WHERE staff_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, 'i', $staff_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="process_update_staff.php" method="post">
            <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
            <div class="form-group">
                <label for="name">Staff Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nid">NID Number:</label>
                <input type="text" class="form-control" name="nid" value="<?php echo $row['nid']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" class="form-control" name="contact" value="<?php echo $row['contact']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update_staff">Update Staff</button>
        </form>
        <?php
                }
            } else {
                echo "Invalid request.";
            }

            mysqli_close($connection);
        ?>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
