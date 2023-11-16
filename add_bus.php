<!-- add_bus.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bus</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Bus</h2>
        <form action="process_add_bus.php" method="post">
            <div class="form-group">
                <label for="bus_name">Bus Name:</label>
                <input type="text" class="form-control" name="bus_name" required>
            </div>
            <div class="form-group">
                <label for="registration_no">Registration Number:</label>
                <input type="text" class="form-control" name="registration_no" required>
            </div>
            <div class="form-group">
                <label for="seat_no">Number of Seats:</label>
                <input type="number" class="form-control" name="seat_no" required>
            </div>
            <div class="form-group">
                <label for="driver_id">Driver Name:</label>
                <select class="form-control" name="driver_id" required>
                    <!-- Populate with drivers not assigned to any bus -->
                    <?php
                    include 'db_connection.php';
                    $query = "SELECT driver_id, name FROM drivers WHERE driver_id NOT IN (SELECT DISTINCT driver_id FROM buses)";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['driver_id'] . '">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="staff_id">Staff Name:</label>
                <select class="form-control" name="staff_id" required>
                    <!-- Populate with staffs not assigned to any bus -->
                    <?php
                    $query = "SELECT staff_id, name FROM staffs WHERE staff_id NOT IN (SELECT DISTINCT staff_id FROM buses)";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['staff_id'] . '">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="add_bus">Add Bus</button>
        </form>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
