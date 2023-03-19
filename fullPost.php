<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    <title>Full-Post</title>
    <link rel="stylesheet" href="path/to/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/heroWatch.css" />
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css" />

    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="./css/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
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
        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="display-4 fst-italic">Full Post</h1>
                <p class="lead my-3">Read entire content here, like and comment</p>
                <button class="btn btn-primary" onclick="location.href='userHomepage.php'"><i
                        class="bi bi-arrow-left"></i> Go
                    Back Home</button>

            </div>
        </div>
    </main>
</body>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2023 PostWatch</p>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">FAQs</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">About</a>
            </li>
        </ul>

    </footer>
    <hr class="my-2" />
</div>

</html>