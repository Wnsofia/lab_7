<?php
include 'database.php';
include 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="text-right mb-3">
            <a href="login.php" class="btn btn-primary">Logout</a>
        </div>
        <h2>Users</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Matric</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['matric']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['role']}</td>
                                <td><a href='update_form.php?matric={$row['matric']}' class='btn btn-warning btn-sm'>Update</a></td>
                                <td><a href='delete.php?matric={$row['matric']}' class='btn btn-danger btn-sm'>Delete</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
                $db->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
