<?php
include 'database.php';
include 'user.php';

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $database = new Database();
    $db = $database->getConnection();

    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        if ($userDetails && password_verify($password, $userDetails['password'])) {
            header("Location: read.php?message=" . urlencode("Login successful."));
            exit();
        } else {
            header("Location: login.php?message=" . urlencode("Login failed. Please check your matric number and password."));
            exit();
        }
    } else {
        header("Location: login.php?message=" . urlencode("Please fill in all required fields."));
        exit();
    }

    $db->close();
} else {
    header("Location: login.php");
    exit();
}
?>
