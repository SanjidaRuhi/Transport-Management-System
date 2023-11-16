<!-- update_route.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Route</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Route</h2>
        <?php
            include 'db_connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                $route_id = $_GET['id'];

                $query = "SELECT * FROM routes WHERE route_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, 'i', $route_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="process_update_route.php" method="post">
            <input type="hidden" name="route_id" value="<?php echo $row['route_id']; ?>">
            <div class="form-group">
                <label for="route_name">Route Name:</label>
                <input type="text" class="form-control" name="route_name" value="<?php echo $row['route_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="station">Station:</label>
                <input type="text" class="form-control" name="station" value="<?php echo $row['station']; ?>" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" class="form-control" name="destination" value="<?php echo $row['destination']; ?>" required>
            </div>
            <div class="form-group">
                <label for="via_routes">Via Routes:</label>
                <input type="text" class="form-control" name="via_routes" value="<?php echo $row['via_routes']; ?>" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" class="form-control" name="time" value="<?php echo $row['time']; ?>" required>
            </div>
            <div class="form-group">
                <label for="bus_id">Bus Name:</label>
                <select class="form-control" name="bus_id" required>
                    <!-- Populate with buses from the database -->
                    <?php
                    $query = "SELECT bus_id, bus_name FROM buses";
                    $result = mysqli_query($connection, $query);
                    while ($bus = mysqli_fetch_assoc($result)) {
                        $selected = ($bus['bus_id'] == $row['bus_id']) ? 'selected' : '';
                        echo '<option value="' . $bus['bus_id'] . '" ' . $selected . '>' . $bus['bus_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="update_route">Update Route</button>
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
