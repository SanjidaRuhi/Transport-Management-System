<!-- display_buses.php -->

<?php
include 'db_connection.php';

function displayBuses() {
    include 'db_connection.php';
    $query = "SELECT * FROM buses";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>Bus ID</th>
                        <th>Bus Name</th>
                        <th>Registration Number</th>
                        <th>Number of Seats</th>
                        <th>Driver</th>
                        <th>Staff</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['bus_id'] . '</td>
                    <td>' . $row['bus_name'] . '</td>
                    <td>' . $row['registration_no'] . '</td>
                    <td>' . $row['seat_no'] . '</td>
                    <td>' . getDriverName($row['driver_id']) . '</td>
                    <td>' . getStaffName($row['staff_id']) . '</td>
                    <td>
                        <a href="update_bus.php?id=' . $row['bus_id'] . '">Update</a>
                        <a href="remove_bus.php?id=' . $row['bus_id'] . '">Remove</a>
                    </td>
                </tr>';
        }

        echo '</tbody></table>';
    } else {
        echo "Error retrieving data: " . mysqli_error($connection);
    }
}

function getDriverName($driver_id) {
    include 'db_connection.php';
    $query = "SELECT name FROM drivers WHERE driver_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $driver_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['name'];
    } else {
        return "N/A";
    }
}

function getStaffName($staff_id) {
    include 'db_connection.php';
    $query = "SELECT name FROM staffs WHERE staff_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $staff_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row['name'];
    } else {
        return "N/A";
    }
}

mysqli_close($connection);
?>
