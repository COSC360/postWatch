<?php
// var_dump($_POST);
// var_dump($_FILES);

if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_FILES["image"])) {
    echo "Nice";
    // get the form data and save it as variables
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image_name = $_FILES["image"]["name"];
    $image_tmp_name = $_FILES["image"]["tmp_name"];

    // get the user id from the session who is logged in
    session_start();
    $user_id = $_SESSION["user_id"];

    // connect to the database
    $mysqli = require __DIR__ . '/database.php';

    // upload the image file to the server
    $image_dir = 'uploads/'; // directory to upload images
    $image_path = $image_dir . $image_name; // path to store in the database
    move_uploaded_file($image_tmp_name, $image_path);

    // insert the post into the database
    $sql = "INSERT INTO post ( user_id ,title, content, image) VALUES (?, ?, ?, ?)";

    // prepare statement
    $stmt = $mysqli->stmt_init();

    // check if statement is valid
    if (!$stmt->prepare($sql)) {
        die("SQL error " . $mysqli->error);
    }

    // bind parameters to statement
    $stmt->bind_param("isss", $user_id, $title, $content, $image_path);

    // execute statement
    if ($stmt->execute()) {
        // alert user that post has been created
        echo "Post created successfully!";
        // redirect to posts page
        header("Location: userHomepage.php");
        exit;
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
} else {
    echo "Fill all the fields";
}