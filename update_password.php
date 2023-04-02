<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . '/database.php';

    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Passwords do not match");
    }

    $sql = "SELECT * FROM password_reset_request WHERE token = '$token'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $reset_request = $result->fetch_assoc();
        $user_id = $reset_request['user_id'];
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE user SET password_hashed = '$password_hashed' WHERE id = $user_id";
        $mysqli->query($sql);

        $sql = "DELETE FROM password_reset_request WHERE token = '$token'";
        $mysqli->query($sql);

        echo 'Password updated successfully. <a href="signin.php">Sign In</a>';
    } else {
        die("Invalid token");
    }
}
