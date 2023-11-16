<!-- user_notices.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Notices</h2><br><br>
        <a href="profile.php" class="btn btn-primary float-right">Back to Profile</a><br><br>


        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Added Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';

                // Retrieve notices from the database
                $query = "SELECT notice_id, title, added_time FROM notices";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['added_time']}</td>";
                    echo "<td><a href='read_more_notice.php?id={$row['notice_id']}' class='btn btn-info'>Read More</a></td>";
                    echo "</tr>";
                }

                mysqli_close($connection);
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

