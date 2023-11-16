<!-- view_schedule.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Schedule</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>View Schedule</h2><br><br>
        <a href="profile.php" class="btn btn-primary float-right">Back to Profile</a><br><br>

        <!-- Display routes in a table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Route Name</th>
                    <th>Station</th>
                    <th>Destination</th>
                    <th>Via Routes</th>
                    <th>Time</th>
                    <th>Bus Name</th>
    
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';
                $query = "SELECT * FROM routes";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['route_name'] . '</td>';
                    echo '<td>' . $row['station'] . '</td>';
                    echo '<td>' . $row['destination'] . '</td>';
                    echo '<td>' . $row['via_routes'] . '</td>';
                    echo '<td>' . $row['time'] . '</td>';
                    echo '<td>' . getBusName($connection, $row['bus_id']) . '</td>';
                    echo '</tr>';
                }

                function getBusName($connection, $bus_id) {
                    $query = "SELECT bus_name FROM buses WHERE bus_id = ?";
                    $stmt = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($stmt, 'i', $bus_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    return $row['bus_name'];
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
