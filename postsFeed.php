<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
} else {
    $mysqli = require __DIR__ . '/database.php';

    //     $statement = $mysqli->prepare("SELECT post.id, post.title, post.content, post.image, post.date, user.username FROM post INNER JOIN user ON post.user_id = user.id ORDER BY post.date DESC");

    // get all posts and their authors from post table user user_id which is the foreign key in post table connecting to user table also get number of comments for each post
    $statement = $mysqli->prepare("SELECT post.id, post.title, post.content, post.image, post.date, user.username, COUNT(comments.id) AS num_comments FROM post INNER JOIN user ON post.user_id = user.id LEFT JOIN comments ON post.id = comments.post_id GROUP BY post.id, post.title, post.content, post.image, post.date, user.username ORDER BY post.date DESC");
    $statement->execute();
    $statement->bind_result($id, $title, $content, $image, $date, $username, $num_comments);
    $posts = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User-postsFeed</title>

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
</head>

<body>
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
                            <button type="button" class="btn btn-outline-secondary btn-sm px-4">Sign Out</button>
                        </a>
                    </li>
                    <li class="nav-item dropdown"></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-3">
        <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="display-4 fst-italic">Posts Feed</h1>
                <p class="lead my-3">Discover and read everyone's latest posts here</p>
                <button class="btn btn-primary" onclick="location.href='userHomepage.php'"><i
                        class="bi bi-arrow-left"></i> Go
                    Back Home</button>

            </div>
        </div>
        <div class="row mb-2 align-items-stretch">
            <?php foreach ($posts as $post) : ?>
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static postUser">
                        <strong class="d-inline-block mb-2 text-primary">
                            <?php echo $post["username"];
                                ?>
                        </strong>
                        <h3 class="mb-0"><?php echo $post["title"]; ?></h3>
                        <div class="mb-1 text-muted"><?php echo date("F j, Y", strtotime($post["date"])); ?></div>
                        <?php echo substr($post['content'], 0, 100) . '...'; ?>
                        <a href="fullPost.php?id=<?php echo $post['id']; ?>" class="stretched-link">Continue
                            reading</a>
                        <div class="mt-3 d-flex align-items-center">
                            <span class="me-4"><i class="bi bi-heart text-danger hover-text-danger">
                                    <?php echo "in progress" ?>
                                </i></span>
                            <span class="ms-4"><i class="bi bi-chat-dots text-primary hover-text-primary">
                                    <?php echo  $post["num_comments"];  ?>
                                </i></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex align-items-center p-2">
                        <img src="<?php echo $post["image"]; ?>" alt="User Image" class="img-fluid" />
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

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