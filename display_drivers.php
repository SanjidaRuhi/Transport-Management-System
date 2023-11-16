<!-- display_drivers.php -->

<?php
include 'db_connection.php';

function displayDrivers() {
    include 'db_connection.php';
    $query = "SELECT * FROM drivers";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>Driver ID</th>
                        <th>Driver Name</th>
                        <th>Address</th>
                        <th>NID Number</th>
                        <th>License Number</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['driver_id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['address'] . '</td>
                    <td>' . $row['nid'] . '</td>
                    <td>' . $row['license'] . '</td>
                    <td>' . $row['contact'] . '</td>
                    <td>
                        <a href="update_driver.php?id=' . $row['driver_id'] . '">Update</a>
                        <a href="remove_driver.php?id=' . $row['driver_id'] . '">Remove</a>
                    </td>
                </tr>';
        }

        echo '</tbody></table>';
    } else {
        echo "Error retrieving data: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
