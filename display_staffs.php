<!-- display_staffs.php -->

<?php
include 'db_connection.php';

function displayStaffs() {
    include 'db_connection.php';
    $query = "SELECT * FROM staffs";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Staff Name</th>
                        <th>Address</th>
                        <th>NID Number</th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['staff_id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['address'] . '</td>
                    <td>' . $row['nid'] . '</td>
                    <td>' . $row['contact'] . '</td>
                    <td>
                        <a href="update_staff.php?id=' . $row['staff_id'] . '">Update</a>
                        <a href="remove_staff.php?id=' . $row['staff_id'] . '">Remove</a>
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
