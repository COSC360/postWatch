<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("Location: index.php");
  exit;
} elseif (isset($_POST['user_id'])) {
  $mysqli = require __DIR__ . '/database.php';
  $userId = $mysqli->real_escape_string($_POST['user_id']);
  $sql = "DELETE FROM user WHERE id = $userId";
  if ($mysqli->query($sql)) {
    echo 'success';
  } else {
    echo 'error';
  }
  $mysqli->close();
}
?>