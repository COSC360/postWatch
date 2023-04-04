<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
} else {

    require_once __DIR__ . '/database.php';

    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the total number of likes on all posts by the user
    $sql_likes = "SELECT COUNT(*) as total_likes FROM likes WHERE post_id IN (SELECT id FROM post WHERE user_id = ?)";
    $stmt_likes = $mysqli->prepare($sql_likes);
    $stmt_likes->bind_param('i', $_SESSION['user_id']);
    $stmt_likes->execute();
    $result_likes = $stmt_likes->get_result();
    $row_likes = $result_likes->fetch_assoc();
    $total_likes = $row_likes['total_likes'];

    // Fetch the total number of comments on all posts by the user
    $sql_comments = "SELECT COUNT(*) as total_comments FROM comments WHERE post_id IN (SELECT id FROM post WHERE user_id = ?)";
    $stmt_comments = $mysqli->prepare($sql_comments);
    $stmt_comments->bind_param('i', $_SESSION['user_id']);
    $stmt_comments->execute();
    $result_comments = $stmt_comments->get_result();
    $row_comments = $result_comments->fetch_assoc();
    $total_comments = $row_comments['total_comments'];

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        $sql = "SELECT * FROM post WHERE user_id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        $posts = array();

        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    } else {
        // handle error
        die("User not found");
    }

    $stmt->close();
    $mysqli->close();
}

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

    <title>User-Homepage</title>
    <link rel="stylesheet" href="path/to/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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





                <div class="col">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card text-white bg-dark mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-heart-fill text-danger pe-3" style="font-size: 24px;"></i>
                                    <div>
                                        <h5 class="card-title">Total Likes Received</h5>
                                        <p class="card-text"><?php echo $total_likes; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-dark mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-chat-dots-fill text-primary pe-3" style="font-size: 24px;"></i>
                                    <div>
                                        <h5 class="card-title">Total Comments Received </h5>
                                        <p class="card-text"><?php echo $total_comments; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h1> Your Posts </h1>
                    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php for ($i = 0; $i < count($posts); $i++) { ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"
                                aria-current="<?php echo ($i == 0 ? 'true' : 'false'); ?>"
                                aria-label="Slide <?php echo ($i + 1); ?>"></button>
                            <?php } ?>
                        </div>
                        <div class="carousel-inner">
                            <?php foreach ($posts as $index => $post) { ?>
                            <div class="carousel-item <?php echo ($index == 0 ? 'active' : ''); ?>">
                                <div
                                    class="row g-0 border border-2 rounded  overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static postUser">
                                        <strong
                                            class="d-inline-block mb-2 text-primary"><?php echo $user['username'] ?></strong>
                                        <h3 class="mb-0"><?php echo $post['title']; ?></h3>
                                        <div class="mb-1 text-muted"><?php echo $post['date']; ?></div>
                                        <p class="card-text mb-auto">
                                            <?php echo substr($post['content'], 0, 100) . '...'; ?>
                                        </p>
                                        <a href="fullPost.php?id=<?php echo $post['id']; ?>"
                                            class="stretched-link">Continue reading</a>
                                        <div class="mt-3 d-flex align-items-center">
                                            <span class="me-4"><i
                                                    class="bi bi-heart text-danger hover-text-danger"></i></span>
                                            <span class="ms-4"><i
                                                    class="bi bi-chat-dots text-primary hover-text-primary"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-auto d-none d-lg-block mx-auto p-2 text-center">
                                        <img src="<?php echo $post['image']; ?>" alt="Post image" width="300"
                                            height="200">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
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