<?php
if (isset($_FILES["profile_pic"])) {
    // get the form data and save it as variables
    $profile_pic = $_FILES["profile_pic"]["name"];
    $profile_pic_tmp_name = $_FILES["profile_pic"]["tmp_name"];

    // get the user id from the session who is logged in
    session_start();
    $user_id = $_SESSION["user_id"];

    // connect to the database
    $mysqli = require __DIR__ . '/database.php';

    // upload the image file to the server
    $image_dir = 'uploads/'; // directory to upload images
    $image_path = $image_dir . $profile_pic; // path to store in the database
    move_uploaded_file($profile_pic_tmp_name, $image_path);

    // insert the post into the database
    $sql = "UPDATE user SET profile_pic = ? WHERE id = ?";

    // prepare statement
    $stmt = $mysqli->stmt_init();

    // check if statement is valid
    if (!$stmt->prepare($sql)) {
        die("SQL error " . $mysqli->error);
    }

    // bind parameters to statement
    $stmt->bind_param("si", $image_path, $user_id);

    // execute statement
    if ($stmt->execute()) {
        // redirect to posts page
        header("Location: userHomepage.php");
        exit;
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
} else {
    echo "Fill all the fields";
}
