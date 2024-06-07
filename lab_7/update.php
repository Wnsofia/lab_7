<?php
include 'database.php';
include 'user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->updateUser($matric, $name, $role);

    $db->close();

    // Redirect back to read.php
    header("Location: read.php");
    exit(); // Make sure to exit after redirection
}
?>
