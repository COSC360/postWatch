<?php
// get all posts from database

$mysqli = require __DIR__ . '/database.php';

$sql = "SELECT * FROM post ORDER BY date DESC";
$result = $mysqli->query($sql);
$posts = array();

while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>posts</title>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminSignIn.php">Admin</a>
                    </li>
                    <li>
                        <a href="signin.php">
                            <button type="button" class="btn btn-outline-secondary btn-sm px-4"> Sign In </button>
                        </a>
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
            <div class="col-md-6  mx-auto text-center">
                <h1 class="display-4 fst-italic"> Join For Free Today </h1>
                <p class="lead mb-0">
                </p>
            </div>
        </div>
        <div class="row mb-2 align-items-stretch">
            <?php foreach ($posts as $post) : ?>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static postUser">
                            <h3 class="mb-0"><?php echo $post["title"]; ?></h3>
                            <?php echo substr($post['content'], 0, 100) . '...'; ?>
                            <a href="/404page.php" class="stretched-link">Continue reading</a>
                            <div class="mt-3 d-flex align-items-center">
                                <span class="me-4"><i class="bi bi-heart text-danger hover-text-danger"></i></span>
                                <span class="ms-4"><i class="bi bi-chat-dots text-primary hover-text-primary"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 d-flex align-items-center p-2">
                            <img src="<?php echo $post["image"]; ?>" alt="User Image" class="img-fluid" />
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
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