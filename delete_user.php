<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST['userid'])) {
    $user_id = $_POST['userid'];
    $mysqli = require __DIR__ . '/database.php';
    $delete_posts_sql = "DELETE FROM post WHERE user_id = $user_id";
    if (!$mysqli->query($delete_posts_sql)) {
        die("Error deleting posts: " . $mysqli->error);
    }
    $delete_user_sql = "DELETE FROM user WHERE id = $user_id";
    if (!$mysqli->query($delete_user_sql)) {
        die("Error deleting user: " . $mysqli->error);
    }
    $mysqli->close();
    header("Location: adminHome.php");
    exit;
} else {
    header("Location: adminHome.php");
    exit;
}