<?php

$host = "localhost";
$dbname = "postwatch_db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Failed to connect: " . $mysqli->connect_error);
}

return $mysqli;
