<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION["admin_id"])) {
    $mysqli = require __DIR__ . '/database.php';
    $sql = "SELECT user.id, user.username, user.email, COUNT(post.id) AS num_posts
          FROM user
          LEFT JOIN post ON user.id = post.user_id
          GROUP BY user.id, user.username, user.email";

    if ($mysqli->error) {
        die("Error: " . $mysqli->error);
    }

    $result = $mysqli->query($sql);
}


$sqldisplaypost = "SELECT post.id, post.title, post.content, post.date, user.username, COUNT(DISTINCT likes.id) AS num_likes, COUNT(DISTINCT comments.id) AS num_comments
FROM post
LEFT JOIN user ON post.user_id = user.id
LEFT JOIN likes ON post.id = likes.post_id
LEFT JOIN comments ON post.id = comments.post_id
GROUP BY post.id, post.title, post.content, post.date, user.username
ORDER BY post.date DESC";

$resultpost = $mysqli->query($sqldisplaypost);


$sql_posts_per_day = "SELECT DATE(date) AS post_date, COUNT(*) AS num_posts 
                      FROM post 
                      GROUP BY DATE(date) 
                      ORDER BY post_date ASC";
$result_posts_per_day = $mysqli->query($sql_posts_per_day);

$dataPoints = array();

if ($result_posts_per_day->num_rows > 0) {
    while ($row = $result_posts_per_day->fetch_assoc()) {
        $date = strtotime($row['post_date']) * 1000;
        $num_posts = intval($row['num_posts']);
        $dataPoints[] = array("x" => $date, "y" => $num_posts);
    }
}

$sql_posts = "SELECT post.id, post.title, COUNT(DISTINCT likes.id) AS num_likes, COUNT(DISTINCT comments.id) AS num_comments
              FROM post
              LEFT JOIN likes ON post.id = likes.post_id
              LEFT JOIN comments ON post.id = comments.post_id
              GROUP BY post.id, post.title";
$result_posts = $mysqli->query($sql_posts);

$dataPoint = array();

if ($result_posts->num_rows > 0) {
    while ($row = $result_posts->fetch_assoc()) {
        $dataPoint[] = array("x" => $row['num_likes'], "y" => $row['num_comments'], "post_id" => $row['id'], "title" => $row['title']);
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .table-responsive th,
        .table-responsive td {
            white-space: nowrap;
        }
    </style>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminProfileSettings.php">Profile Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-outline-secondary btn-sm px-4">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class=" container mt-5  table-container table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                    <th>
                        <h2> Posts </h2>
                    </th>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Likes</th>
                    <th>Comments</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultpost->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $row['title']; ?>
                        </td>
                        <td>
                            <?php echo $row['date']; ?>
                        </td>
                        <td>
                            <?php echo $row['username']; ?>
                        </td>
                        <td>
                            <?php echo $row['num_likes']; ?>
                        </td>
                        <td>
                            <?php echo $row['num_comments']; ?>
                        </td>
                        <td>
                            <form action='delete_post.php' method='POST'
                                onsubmit="return confirm('Are you sure you want to delete this post? All associated comments and likes will be deleted too!')">
                                <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete_post" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="container mt-5">
        <h2>Users</h2>
        <div class="table-responsive table-container">
            <table class="table table-striped table-sm table-bordered ">
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
                    <?php
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $count . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['num_posts'] . "</td>";
                            echo "<td>
  <form action='delete_user.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this user? User posts and comments will be deleted too!\");'>
    <input type='hidden' name='userid' value='" . $row['id'] . "'>
    <button type='submit' class='btn btn-danger'>Delete User</button>
  </form>
</td>";
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <div class="container">
                <h2>Posts per day</h2>
            </div>
            <div class="chart-container">
                <div id="chart_div"></div>
            </div>
            <br>
            <h2> Interactions per Post </h2>
            <div class="container chart-container">
                <canvas id="scatterChart"></canvas>
            </div>
            <script>
                var scatterChart = new Chart(document.getElementById("scatterChart"), {
                    type: 'scatter',
                    data: {
                        datasets: [{
                            label: 'Likes vs Comments',
                            data: <?php echo json_encode($dataPoint); ?>,
                            backgroundColor: 'rgba(0, 119, 204, 0.3)',
                            pointRadius: 3,
                            pointHoverRadius: 6,
                            pointHitRadius: 10,
                            pointBorderWidth: 1,
                            pointStyle: 'rectRounded'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        title: {
                            display: true,
                            text: 'Likes vs Comments Scatterplot'
                        },
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        scales: {
                            xAxes: [{
                                type: 'linear',
                                position: 'bottom',
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Likes'
                                }
                            }],
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Comments'
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                title: function (tooltipItem, data) {
                                    return data.datasets[tooltipItem[0].datasetIndex].data[tooltipItem[0].index]
                                        .title;
                                },
                                label: function (tooltipItem, data) {
                                    return '(' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]
                                        .x + ', ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem
                                            .index].y + ')';
                                }
                            }
                        }
                    }
                });
            </script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Date', 'Posts per day'],
                        <?php
                        foreach ($dataPoints as $point) {
                            echo "['" . date('Y-m-d', $point['x'] / 1000) . "', " . $point['y'] . "],";
                        }
                        ?>
                    ]);
                    var options = {
                        height: 400,

                        title: 'Posts per day',
                        legend: {
                            position: 'none'
                        }

                    };
                    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
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

</html>