<?php
include 'database.php';
include 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$result = $user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role']);

if ($result === true) {
    header("Location: login.php?message=" . urlencode("Registration successful. Please login."));
    exit();
} else {
    header("Location: register.php?message=" . urlencode($result));
    exit();
}

$db->close();
?>
