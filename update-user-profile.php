<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION["user_id"];
$mysqli = require __DIR__ . '/database.php';

// If the profile picture is set, update the profile picture
if (isset($_FILES["profile_pic"])) {
    $profile_pic = $_FILES["profile_pic"]["name"];
    $profile_pic_tmp_name = $_FILES["profile_pic"]["tmp_name"];

    $image_dir = 'uploads/';
    $image_path = $image_dir . $profile_pic;
    move_uploaded_file($profile_pic_tmp_name, $image_path);

    $sql = "UPDATE user SET profile_pic = ? WHERE id = ?";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error " . $mysqli->error);
    }

    $stmt->bind_param("si", $image_path, $user_id);

    if (!$stmt->execute()) {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

// If the username and email are set, update the username and email
if (isset($_POST["username"]) && isset($_POST["email"])) {
    $newUsername = $_POST["username"];
    $newEmail = $_POST["email"];

    $update_sql = "UPDATE user SET username = ?, email = ? WHERE id = ?";
    $update_stmt = $mysqli->prepare($update_sql);
    $update_stmt->bind_param("ssi", $newUsername, $newEmail, $user_id);

    if (!$update_stmt->execute()) {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

// Redirect to the user homepage
header("Location: userHomepage.php");
exit;
