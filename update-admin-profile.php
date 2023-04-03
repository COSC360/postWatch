<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION["admin_id"];
$mysqli = require __DIR__ . '/database.php';


// If the username and email are set, update the username and email
if (isset($_POST["username"]) && isset($_POST["email"])) {
    $newUsername = $_POST["username"];
    $newEmail = $_POST["email"];

    $update_sql = "UPDATE admin SET username = ?, email = ? WHERE id = ?";
    $update_stmt = $mysqli->prepare($update_sql);
    $update_stmt->bind_param("ssi", $newUsername, $newEmail, $user_id);

    if (!$update_stmt->execute()) {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

// Redirect to the admin homepage
header("Location: adminHome.php");
exit;
?>
