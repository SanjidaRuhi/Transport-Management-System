<!-- add_route.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Route</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Route</h2>
        <form action="process_add_route.php" method="post">
            <div class="form-group">
                <label for="route_name">Route Name:</label>
                <input type="text" class="form-control" name="route_name" required>
            </div>
            <div class="form-group">
                <label for="station">Station:</label>
                <input type="text" class="form-control" name="station" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" class="form-control" name="destination" required>
            </div>
            <div class="form-group">
                <label for="via_routes">Via Routes:</label>
                <input type="text" class="form-control" name="via_routes">
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" class="form-control" name="time" required>
            </div>
            <div class="form-group">
                <label for="bus_id">Bus Name:</label>
                <select class="form-control" name="bus_id" required>
                    <!-- Populate with buses from the database -->
                    <?php
                    include 'db_connection.php';
                    $query = "SELECT bus_id, bus_name FROM buses";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['bus_id'] . '">' . $row['bus_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="add_route">Add Route</button>
        </form>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
