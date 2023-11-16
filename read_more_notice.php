<!-- read_more_notice.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read More Notice</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Notice Details</h2>

        <?php
        include 'db_connection.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $notice_id = $_GET['id'];

            // Retrieve notice details from the database
            $query = "SELECT * FROM notices WHERE notice_id = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, 'i', $notice_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                echo "<h3>{$row['title']}</h3>";
                echo "<p>{$row['body']}</p>";
                echo "<p>Added Time: {$row['added_time']}</p>";
            } else {
                echo "Notice not found.";
            }
        } else {
            echo "Invalid request.";
        }

        mysqli_close($connection);
        ?>

        <a href="admin_notices.php" class="btn btn-primary">Back to Notices</a>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
