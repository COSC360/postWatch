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

        // get profile picture of the user who created the post

        $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username' ");
        $row = mysqli_fetch_array($result);
        $profilepicture = $row['profile_pic'];
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


// now if the user has filled in the comment form and clicked submit, we need to process the form post data to the comments table

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get user_id from session
    session_start();
    $user_id = $_SESSION['user_id'];

    // get post_id from URL parameter
    $post_id = $_GET['id'];

    // insert comment into database
    $content = $_POST['content'];
    $date = date('Y-m-d H:i:s');
    $stmt = $mysqli->prepare("INSERT INTO comments (user_id, post_id, content, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('iiss', $user_id, $post_id, $content, $date);
    $stmt->execute();

    // reload page to display new comment
    header("Location: fullPost.php?id=$post_id");
}

function add_like($mysqli, $user_id, $post_id)
{
    if (!has_user_liked_post($mysqli, $user_id, $post_id)) {
        $stmt = $mysqli->prepare("INSERT INTO likes (user_id, post_id) VALUES (?, ?)");
        $stmt->bind_param('ii', $user_id, $post_id);
        $stmt->execute();
    }
}



function get_likes_count($mysqli, $post_id)
{
    $result = $mysqli->query("SELECT COUNT(*) as likes_count FROM likes WHERE post_id = $post_id");
    $row = $result->fetch_assoc();
    return $row['likes_count'];
}


function has_user_liked_post($mysqli, $user_id, $post_id)
{
    $result = $mysqli->query("SELECT * FROM likes WHERE user_id = $user_id AND post_id = $post_id");
    return $result->num_rows > 0;
}



if (isset($_GET['like']) && $_GET['like'] == '1') {
    add_like($mysqli, $_SESSION['user_id'], $id);
    header("Location: fullPost.php?id=$id");
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
        <div class="p-4 p-md-5 mb-4 rounded text-center bg-dark text-light">
            <h1 class="display-4 fst-italic">Full Post</h1>
            <p class="lead my-3">Read entire content here, like and comment</p>
            <div>

                <button class="btn btn-primary" onclick="window.location.href='postsFeed.php'"><i
                        class=" bi bi-journal-text"></i>
                    Posts Feed</button> <button class="btn btn-primary me-2"
                    onclick="window.location.href='userHomepage.php'"><i class="bi bi-house"></i> Home</button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <img src="<?php echo $image; ?>" class="img-fluid rounded" alt="Post Image" />
                            </div>
                            <div class="col-md-6">
                                <h1 class="mb-4"><?php echo $title; ?></h1>
                                <div class="d-flex align-items-center mb-3">
                                    <?php
                                if (!isset($profilepicture) || empty($profilepicture)) {
                                    $profilepicture = './img/userProimg.jpg'; // set default profile picture
                                }
                                ?>
                                    <img src="<?php echo $profilepicture; ?>" class="img-fluid rounded-circle me-3"
                                        alt="User Image" style="width: 50px; height: 50px;" />
                                    <div>
                                        <p class="mb-1">By <?php echo $username; ?></p>
                                        <p class="mb-0"><?php echo $date; ?></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                    <p class="me-3 mb-0"><i class="bi bi-hand-thumbs-up"></i>
                                        <?php echo get_likes_count($mysqli, $id); ?></p>
                                    <p class="mb-0"><i class="bi bi-chat-dots"></i> <?php echo count($comments); ?>
                                        Comments</p>
                                </div>
                                <?php if (has_user_liked_post($mysqli, $_SESSION['user_id'], $id)) : ?>
                                <button class="btn btn-primary me-3" disabled><i class="bi bi-hand-thumbs-up"></i>
                                    Liked</button>
                                <?php else : ?>
                                <button class="btn btn-outline-primary me-3" onclick="likePost()"><i
                                        class="bi bi-hand-thumbs-up"></i> Like</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                        <p class="card-text"><?php echo $content; ?></p>
                    </div>
                </div>
            </div>
        </div>



        <div class="container my-5">
            <h2>Comments</h2>
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

            <form method="post" class="my-5" autocomplete="off">
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
    <style>
    img {
        max-height: 400px;
        margin-top: 20px;
        border-radius: 5px;
    }
    </style>
    <script>
    // like post
    function likePost() {
        location.href = 'fullPost.php?id=<?php echo $id; ?>&like=1';
    }
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
                <a href="FAQ.php" class="nav-link px-2 text-muted">FAQs</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">About</a>
            </li>
        </ul>

    </footer>
    <hr class="my-2" />
</div>

</html>