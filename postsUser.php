<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        .navbar-nav .nav-link:hover {
            background-color: #3d464e;
        }

        .btn:hover {
            background-color: #f1f1f1;
        }

        .btn i {
            margin-right: 5px;
        }
    </style>

    <title>userposts</title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li>
                        <a href="signin.php">
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
                <nav class="col-3 bg-light sidebar bg-dark">
                    <div class="text-center my-4">
                        <img src="./img/userProimg.jpg" alt="User Image" class="rounded-circle" width="100" height="100">
                        <h4 style="color:rgb(222, 235, 241);font-size:26px;">Username </h4>
                    </div>
                    <ul class="nav flex-column navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="addPost.php">
                                <h4 style="color:rgb(222, 235, 241);font-size: 20px;">Create Post</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <h4 style="color:rgb(222, 235, 241);font-size:20px;">Home</h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <h4 style="color:rgb(222, 235, 241);font-size:20px;">Profile Settings</h4>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="col-9">




                    <div class="row mb-2 align-items-stretch">
                        <div class="col-md-6">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static postUser">
                                    <strong class="d-inline-block mb-2 text-primary">User</strong>
                                    <h3 class="mb-0">Featured post</h3>
                                    <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">
                                        Sample content text
                                    </p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                    <div class="mt-3 d-flex align-items-center">
                                        <span class="me-4">
                                            <i class="bi bi-heart text-danger hover-text-danger"></i>
                                        </span>
                                        <span class="ms-4">
                                            <i class="bi bi-chat-dots text-primary hover-text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="./img/up13.jpg" alt="User Image" width="150" height="200" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static postUser">
                                    <strong class="d-inline-block mb-2 text-primary">User</strong>
                                    <h3 class="mb-0">Featured post</h3>
                                    <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">
                                        Sample content text
                                    </p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                    <div class="mt-3 d-flex align-items-center">
                                        <span class="me-4">
                                            <i class="bi bi-heart text-danger hover-text-danger"></i>
                                        </span>
                                        <span class="ms-4">
                                            <i class="bi bi-chat-dots text-primary hover-text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="./img/up14.jpg" alt="User Image" width="150" height="200" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 align-items-stretch">
                        <div class="col-md-6">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static postUser">
                                    <strong class="d-inline-block mb-2 text-primary">User</strong>
                                    <h3 class="mb-0">Featured post</h3>
                                    <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">
                                        Sample content text
                                    </p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                    <div class="mt-3 d-flex align-items-center">
                                        <span class="me-4">
                                            <i class="bi bi-heart text-danger hover-text-danger"></i>
                                        </span>
                                        <span class="ms-4">
                                            <i class="bi bi-chat-dots text-primary hover-text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="./img/up15.jpg" alt="User Image" width="150" height="200" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static postUser">
                                    <strong class="d-inline-block mb-2 text-primary">User</strong>
                                    <h3 class="mb-0">Featured post</h3>
                                    <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">
                                        Sample content text
                                    </p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                    <div class="mt-3 d-flex align-items-center">
                                        <span class="me-4">
                                            <i class="bi bi-heart text-danger hover-text-danger"></i>
                                        </span>
                                        <span class="ms-4">
                                            <i class="bi bi-chat-dots text-primary hover-text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="./img/up16.jpg" alt="User Image" width="150" height="200" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 align-items-stretch">
                        <div class="col-md-6">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static postUser">
                                    <strong class="d-inline-block mb-2 text-primary">User</strong>
                                    <h3 class="mb-0">Featured post</h3>
                                    <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">
                                        Sample content text
                                    </p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                    <div class="mt-3 d-flex align-items-center">
                                        <span class="me-4">
                                            <i class="bi bi-heart text-danger hover-text-danger"></i>
                                        </span>
                                        <span class="ms-4">
                                            <i class="bi bi-chat-dots text-primary hover-text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="./img/up17.jpg" alt="User Image" width="150" height="200" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static postUser">
                                    <strong class="d-inline-block mb-2 text-primary">User</strong>
                                    <h3 class="mb-0">Featured post</h3>
                                    <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">
                                        Sample content text
                                    </p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                    <div class="mt-3 d-flex align-items-center">
                                        <span class="me-4">
                                            <i class="bi bi-heart text-danger hover-text-danger"></i>
                                        </span>
                                        <span class="ms-4">
                                            <i class="bi bi-chat-dots text-primary hover-text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="./img/up18.jpg" alt="User Image" width="150" height="200" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 align-items-stretch">
                        <div class="col-md-6">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static postUser">
                                    <strong class="d-inline-block mb-2 text-primary">User</strong>
                                    <h3 class="mb-0">Featured post</h3>
                                    <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">
                                        Sample content text
                                    </p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                    <div class="mt-3 d-flex align-items-center">
                                        <span class="me-4">
                                            <i class="bi bi-heart text-danger hover-text-danger"></i>
                                        </span>
                                        <span class="ms-4">
                                            <i class="bi bi-chat-dots text-primary hover-text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="./img/up2.jpg" alt="User Image" width="150" height="200" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static postUser">
                                    <strong class="d-inline-block mb-2 text-primary">User</strong>
                                    <h3 class="mb-0">Featured post</h3>
                                    <div class="mb-1 text-muted">Nov 12</div>
                                    <p class="card-text mb-auto">
                                        Sample content text
                                    </p>
                                    <a href="#" class="stretched-link">Continue reading</a>
                                    <div class="mt-3 d-flex align-items-center">
                                        <span class="me-4">
                                            <i class="bi bi-heart text-danger hover-text-danger"></i>
                                        </span>
                                        <span class="ms-4">
                                            <i class="bi bi-chat-dots text-primary hover-text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <img src="./img/up3.jpg" alt="User Image" width="150" height="200" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </main>
    <div class="row ">
        <div class="col">
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
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