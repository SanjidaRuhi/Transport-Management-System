<!-- add_staff.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Staff</h2>
        <form action="process_add_staff.php" method="post">
            <div class="form-group">
                <label for="name">Staff Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="form-group">
                <label for="nid">NID Number:</label>
                <input type="text" class="form-control" name="nid" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" class="form-control" name="contact" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_staff">Add Staff</button>
        </form>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
