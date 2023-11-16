<!-- update_bus.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Bus</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Bus</h2>
        <?php
            include 'db_connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                $bus_id = $_GET['id'];

                $query = "SELECT * FROM buses WHERE bus_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, 'i', $bus_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="process_update_bus.php" method="post">
            <input type="hidden" name="bus_id" value="<?php echo $row['bus_id']; ?>">
            <div class="form-group">
                <label for="bus_name">Bus Name:</label>
                <input type="text" class="form-control" name="bus_name" value="<?php echo $row['bus_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="registration_no">Registration Number:</label>
                <input type="text" class="form-control" name="registration_no" value="<?php echo $row['registration_no']; ?>" required>
            </div>
            <div class="form-group">
                <label for="seat_no">Number of Seats:</label>
                <input type="number" class="form-control" name="seat_no" value="<?php echo $row['seat_no']; ?>" required>
            </div>
            <div class="form-group">
                <label for="driver_id">Driver Name:</label>
                <select class="form-control" name="driver_id" required>
                    <!-- Populate with drivers from the database -->
                    <?php
                    $query = "SELECT driver_id, name FROM drivers";
                    $result = mysqli_query($connection, $query);
                    while ($driver = mysqli_fetch_assoc($result)) {
                        $selected = ($driver['driver_id'] == $row['driver_id']) ? 'selected' : '';
                        echo '<option value="' . $driver['driver_id'] . '" ' . $selected . '>' . $driver['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="staff_id">Staff Name:</label>
                <select class="form-control" name="staff_id" required>
                    <!-- Populate with staffs from the database -->
                    <?php
                    $query = "SELECT staff_id, name FROM staffs";
                    $result = mysqli_query($connection, $query);
                    while ($staff = mysqli_fetch_assoc($result)) {
                        $selected = ($staff['staff_id'] == $row['staff_id']) ? 'selected' : '';
                        echo '<option value="' . $staff['staff_id'] . '" ' . $selected . '>' . $staff['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="update_bus">Update Bus</button>
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
