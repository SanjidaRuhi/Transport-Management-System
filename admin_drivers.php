<!-- admin_drivers.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Drivers</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Admin Drivers</h2><br><br>
        <a href="add_driver.php" class="btn btn-primary">Add Driver</a>
        <a href="admin_dashboard.php" class="btn btn-primary float-right">Admin DashBoard</a><br><br>

        <!-- Display drivers as a table -->
        <?php
        include 'display_drivers.php'; // Include the script to display drivers
        displayDrivers();
        
        ?>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
