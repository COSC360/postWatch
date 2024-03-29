<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
} elseif (isset($_SESSION["user_id"])) {

    $mysqli =  require __DIR__ . '/database.php';

    $sql = "SELECT * FROM user WHERE id = " . $_SESSION['user_id'];

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User-Settings</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .navbar-nav .nav-link:hover {
        background-color: #3d464e;
        border-radius: 10%;

    }

    .btn:hover {
        background-color: #f1f1f1;
    }

    .btn i {
        margin-right: 5px;
    }
    </style>


    <link rel="stylesheet" href="path/to/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

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
                    <li>
                        <a href="logout.php">
                            <button type="button" class="btn btn-outline-secondary btn-sm px-4">
                                Sign Out
                            </button></a>
                    </li>
                    <li class="nav-item dropdown"></li>
                </ul>
            </div>
        </div>
    </nav>

</head>

<body>

    <main class="container mt-3">
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-3 col-lg-2 bg-light sidebar bg-dark rounded">
                    <div class="text-center my-4">
                        <?php if ($user['profile_pic'] != null) { ?>
                        <img src="<?php echo $user['profile_pic']; ?>" alt="User Image" class="rounded-circle"
                            width="100" height="100">
                        <?php } else { ?>
                        <img src="./img/userProimg.jpg" alt="User Image" class="rounded-circle" width="100"
                            height="100">
                        <?php } ?>
                        <h4 style="color:rgb(222, 235, 241);font-size:24px;"><?php echo $user['username']; ?> </h4>
                    </div>
                    <ul class="nav flex-column navbar-nav text-center">
                        <li class="nav-item p-4 bg-gradient  rounded">
                            <a class="nav-link" href="postsFeed.php">
                                <h4 style="color:rgb(222, 235, 241);font-size: 20px;">Posts Feed</h4>
                            </a>
                        </li>
                        <li class="nav-item  p-4 bg-gradient rounded">
                            <a class="nav-link " href="addPost.php">
                                <h4 style="color:rgb(222, 235, 241);font-size: 20px;">Create Post</h4>
                            </a>
                        </li>
                        <li class="nav-item  p-4 bg-gradient rounded">
                            <a class="nav-link" href="userHomepage.php">
                                <h4 style="color:rgb(222, 235, 241);font-size:20px;">Home</h4>
                            </a>
                        </li>
                        <li class="nav-item  p-4 bg-gradient rounded">
                            <a class="nav-link" href="userProfileSettings.php">
                                <h4 style="color:rgb(222, 235, 241);font-size:20px;">Profile Settings</h4>
                            </a>
                        </li>
                    </ul>
                </nav>



                <div class="col-9">
                    <h1> Profile Settings </h1>
                    <br>
                    <form action="update-user-profile.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="username" class="form-label">Update Username:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo $user['username']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Update Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo $user['email']; ?>" required>
                        </div>
                        <label for="profile_pic">Update Profile Picture:</label>
                        <input type="file" id="profile_pic" name="profile_pic">
                        <br>
                        <button type="submit" class="btn btn-primary mt-2">Update Profile</button>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </main>


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