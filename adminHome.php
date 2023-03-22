<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
} elseif (isset($_SESSION["admin_id"])) {
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

// Close the database connection
$mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./css/styles.css" />
    <style>
    table {
        padding: 20px;
        margin-bottom: 50px;
    }

    .table {
        border-radius: 10px;
    }

    .table-container {
        margin-top: 50px;
    }

    th {
        font-weight: bold;
    }

    .chart-container {
        position: relative;
        width: 100%;
        height: auto;
        margin-top: 50px;
    }

    #chart_div {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
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
                        <a class="nav-link" href="">Profile Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-outline-secondary btn-sm px-4">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Users</h2>
        <div class="table-responsive table-container">
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
            <div>
                <h2>Posts per day</h2>
            </div>
            <div class="chart-container">
                <div id="chart_div"></div>
            </div>
        </div>


    </div>
    </div>
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

</html>