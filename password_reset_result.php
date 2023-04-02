<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Password-Reset-Result</title>
</head>

<body>
    <div class="container">
        <?php if (isset($_GET['message'])) : ?>
            <p><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>
        <p><a href="forgotPassword.php">Go back to the forgot password page.</a></p>
    </div>
</body>

</html>