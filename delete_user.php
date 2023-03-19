<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
} elseif (isset($_POST['userid'])) { // change 'user_id' to 'userid'
    $mysqli = require __DIR__ . '/database.php';
    $userId = $mysqli->real_escape_string($_POST['userid']); // change 'user_id' to 'userid'
    $sql = "DELETE FROM user WHERE id = '$userId'";
    if ($mysqli->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'Failed to delete user: ' . $mysqli->error;
    }
    $mysqli->close();
}
