<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . '/database.php';

    $sql = sprintf("SELECT * FROM admin WHERE username = '%s'", $mysqli->real_escape_string($_POST['username']));

    $result = $mysqli->query($sql);

    $admin = $result->fetch_assoc();

    if ($admin) {
        if (password_verify($_POST['password'], $admin['password_hashed'])) {
            session_start();
            session_regenerate_id();
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: adminHome.php");
            exit;
        } else {
            die("Incorrect password!");
        }
    } else {
        die("Admin does not exist.");
    }

    // var_dump($admin);
    // exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminSignin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

    <script src="./js/signInValid.js"></script>

    <link rel="stylesheet" href="./css/styles.css" />
    <nav class="navbar navbar-expand-lg navbar-light bg-white static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/logo.png" alt="..." height="80" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown"></li>
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>
    <div class="d-flex flex-column align-items-center mt-5">
        <h1 class="text-center">Admin Sign In</h1>
        <form class="w-50" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="usernameHelp"
                    placeholder="Enter username" required name="username" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" required
                    name="password" />
            </div>
            <br />
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary px-5 flex-col align-items-center">
                    Sign In
                </button>
            </div>
            <hr />
            <p class="text-center small">
                Don't have an account? <a href="contactus.php">Contact Us</a> for access.
            </p>
        </form>
    </div>
</body>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2023 PostWatch</p>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item">
                <a href="index.php" class="nav-link px-2 text-muted">Home</a>
            </li>
            <li class="nav-item">
                <a href="FAQ.php" class="nav-link px-2 text-muted">FAQs</a>
            </li>
            <li class="nav-item">
                <a href="About.php" class="nav-link px-2 text-muted">About</a>
            </li>
        </ul>
    </footer>
    <hr class="my-2" />
</div>

</html>