<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>adminHome</title>
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css" />

    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="./css/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/styles.css" />

    <nav class="navbar navbar-expand-lg navbar-light bg-white static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/logo.png" alt="..." height="80" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Profile Settings</a>
                    </li>
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
    <h2>Users</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1,001</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,002</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,004</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,005</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,006</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,007</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,008</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,009</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,010</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,011</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,012</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,013</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,014</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
                <tr>
                    <td>1,015</td>
                    <td>Joe</td>
                    <td>email@gmail.com</td>
                    <td>12</td>
                    <td>Suspend</td>
                </tr>
            </tbody>
        </table>
    </div>
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