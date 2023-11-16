<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form action="register_process.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" name="id" required>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <select class="form-control" name="department" required>
                    <option value="None">None</option>
                    <option value="CIS">CIS</option>
                    <option value="CSE">CSE</option>
                    <option value="SWE">SWE</option>
                    <option value="NFE">NFE</option>
                    <option value="BBA">BBA</option>
                    <option value="ENGLISH">ENGLISH</option>
                    <option value="EEE">EEE</option>
                    <option value="CIVIL">CIVIL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <button type="reset" class="btn btn-primary">clear</button>
        </form>
    </div>
</body>
</html>
