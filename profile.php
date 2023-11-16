<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add hover effect to the navigation links */
        .navbar-nav .nav-link:hover {
            background-color: #007bff; /* Change the background color when hovered */
            color: #fff; /* Change the text color when hovered */
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">User Profile</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="profile.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update_profile.php">Update Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_card.php">Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="accounts.php">Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_schedule.php">View Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_notices.php">Notice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Welcome to User Page</h2>
        <p>This is your user profile page. You can navigate through the options in the navigation bar above.</p>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
