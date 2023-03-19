<?php
session_start();

// connect to the database

$mysqli =  require __DIR__ . '/database.php';

// get current user name from session id

$sql = "SELECT * FROM user WHERE id = " . $_SESSION['user_id'];

$result = $mysqli->query($sql);

$user = $result->fetch_assoc();

$userprofilename = $user['username'];


// check if the 'id' variable is set in URL, and check that it is valid 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // get id value and also the username of the user who created the post from user table

    $result = mysqli_query($mysqli, "SELECT * FROM post INNER JOIN user ON post.user_id = user.id WHERE post.id=$id  ");
    $row = mysqli_fetch_array($result);


    // check that the 'id' matches up with a row in the databse and put the data into variables

    if ($row) {
        $title = $row['title'];
        $content = $row['content'];
        $date = $row['date'];
        $username = $row['username'];
        $image = $row['image'];
    } else {
        // if no match, display result

        echo "No results!";
    }

    // get the comments from the comment table 

    $result = mysqli_query($mysqli, "SELECT * FROM comments INNER JOIN user ON comments.user_id = user.id WHERE comments.post_id=$id  ");
    $comments = array();
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
} else {
    // if the 'id' in the URL isn't valid, or if there is no 'id' value, redirect the user back to the view page

    header("Location: userHomepage.php");
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <button class="btn btn-primary" onclick="history.go(-1)"><i class="bi bi-arrow-left"></i> Go Back
                </button>

            </div>
        </div>

        <div class="container">
            <?php echo "<h1>$title</h1>"; ?>
            <?php echo "<p>$date</p>"; ?>
            <?php echo "<p>$username</p>"; ?>
            <p>Likes:</p>
            <p>Comments:</p>
            <div class="my-2">
                <button class="btn btn-outline-primary me-3"><i class="bi bi-hand-thumbs-up"></i>
                    Like</button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo $image; ?>" class="img-fluid" alt="Post Image" />
                </div>
                <div class="col-md-6">
                    <p><?php echo $content; ?></p>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <h2>Comments</h2>
            <!-- bring comments from db here -->
            <?php foreach ($comments as $comment) : ?>
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $comment['username']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $comment['date']; ?></h6>
                        <p class="card-text"><?php echo $comment['content']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

            <hr>

            <form method="post" class="my-5">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <?php echo "<input type='text' name='username' id='username' class='form-control' value='$userprofilename' readonly />"; ?>
                </div>
                <div class="form-group">
                    <label for="content">Comment</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>

    </main>

    <script>
        // like post
    </script>

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