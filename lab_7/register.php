<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Register</h2>
        <?php
        if (isset($_GET['message'])) {
            echo '<div class="alert alert-warning">' . htmlspecialchars($_GET['message']) . '</div>';
        }
        ?>
        <form action="insert.php" method="post">
            <div class="form-group">
                <label for="matric">Matric:</label>
                <input type="text" class="form-control" name="matric" id="matric" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="">Please select</option>
                    <option value="lecturer">Lecturer</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="login.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
