<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . '/database.php';

    $email = $mysqli->real_escape_string($_POST['email']);

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        $token = bin2hex(random_bytes(50));

        $sql = "INSERT INTO password_reset_request (user_id, token) VALUES ('$user_id', '$token')";
        $mysqli->query($sql);

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'postwatch3@gmail.com';
            $mail->Password = 'qunlmckikqregfuv';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('postwatch3@gmail.com', 'PostWatch');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = "Please click the following link to reset your password: <a href='http://127.0.0.1/postWatch/resetPassword.php?token=$token'>http://127.0.0.1/postWatch/resetPassword.php?token=$token</a>";

            $mail->send();
            header("Location: password_reset_result.php?message=" . urlencode("Reset password link has been sent to your email. Please check your email."));
        } catch (Exception $e) {
            header("Location: password_reset_result.php?message=" . urlencode("Message could not be sent. Mailer Error: {$mail->ErrorInfo}"));
        }
    } else {
        header("Location: password_reset_result.php?message=" . urlencode("This email address is not registered."));
    }
}
