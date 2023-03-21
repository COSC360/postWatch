<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
if ($password !== $confirmPassword || strlen($password) < 8) {
    header("Location: signup.php?error=password");
    exit;
}
$mysqli = require __DIR__ . '/database.php';
$sql = "SELECT COUNT(*) AS count FROM user WHERE username = ?";
$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error " . $mysqli->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$count = $result->fetch_assoc()['count'];
if ($count > 0) {
    header("Location: signup.php?error=username");
    exit;
}
$sql = "SELECT COUNT(*) AS count FROM user WHERE email = ?";
$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error " . $mysqli->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$count = $result->fetch_assoc()['count'];
if ($count > 0) {
    header("Location: signup.php?error=email");
    exit;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signup.php?error=email_format");
    exit;
}
$password_hashed = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO user (username, email, password_hashed) VALUES (?, ?, ?)";
$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error " . $mysqli->error);
}
$stmt->bind_param("sss", $username, $email, $password_hashed);
if ($stmt->execute()) {
    header("Location: signin.php");
    exit;
} else {
    die("SQL error " . $mysqli->error);
}
