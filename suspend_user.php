<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    die("Access denied.");
}

include "config.php";

if ($conn !== null && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE users SET is_suspended = 1 WHERE id = $id";
    if ($conn->query($sql) === true) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
