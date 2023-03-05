<?php

// hashed password to be stored in database
$password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

// connect to database
$mysqli = require __DIR__ . '/database.php';

// insert user into database
$sql = "INSERT INTO user (username, email, password_hashed) VALUES (?, ?, ?)";

// prepare statement
$stmt = $mysqli->stmt_init();

// check if statement is valid
if (!$stmt->prepare($sql)) {
    die("SQL error " . $mysqli->error);
}

// bind parameters to statement 
$stmt->bind_param("sss", $_POST['username'], $_POST['email'], $password_hashed);

// execute statement
if ($stmt->execute()) {
    // alert user that account has been created
    echo "Account created successfully!";
    // redirect to login page
    // header("Location: signin.php");
    // exit;
} else {
    // check if username already exists
    if ($mysqli->errno == 1062) {
        die("Username already exists!");
    }
    die($mysqli->error . " " . $mysqli->errno);
}