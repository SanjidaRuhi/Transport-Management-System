<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Profile</h2>
        <?php
            // Initialize a session
            session_start();

            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                // Include the database connection file
                include 'db_connection.php';

                // Get the user's ID from the session
                $user_id = $_SESSION['user_id'];

                // Retrieve the user's data from the database
                $query = "SELECT * FROM users WHERE id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, 'i', $user_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data) {
        ?>
        <form action="update_profile_process.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $user_data['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user_data['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" name="dob" value="<?php echo $user_data['dob']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="<?php echo $user_data['address']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        <a href="profile.php" class="btn btn-primary float-right">Back to Profile</a><br><br>

        </form>
        <?php
                }
            } else {
                echo "You are not logged in. Please log in to access your profile.";
            }
        ?>
    </div>
</body>
</html>
