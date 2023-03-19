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
    <title>adminHome</title>
    <link rel="stylesheet" href="./css/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="./css/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <?php
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $count . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['num_posts'] . "</td>";
                            echo "<td><a href='#' class='btn btn-danger delete-btn' data-userid='" . $row['id'] . "'>Delete User</a></td>";
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>No users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> <h2>Posts per Day</h2>
        <div id="chart_div"></div>
    </div>
    <script src="./js/jquery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="./js/scripts.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
      
        function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Day', 'Posts'],
        <?php
            $mysqli =  require __DIR__ . '/database.php';
            $sql = "SELECT DATE(date) AS date, COUNT(*) AS num_posts FROM post GROUP BY DATE(date)";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "['" . $row['date'] . "', " . $row['num_posts'] . "],";
            }
            $mysqli->close();
        ?>
    ]);

    var options = {
        title: 'Posts per Day',
        curveType: 'none',
        legend: { position: 'bottom' },
        colors: ['#4285F4'],
        fontName: 'Arial',
        fontSize: 14,
        chartArea: { width: '80%', height: '70%' },
        hAxis: {
            title: 'Day',
            titleTextStyle: { bold: true, fontSize: 16 },
            format: 'MMM dd' 
        },
        vAxis: {
            title: 'Number of Posts',
            titleTextStyle: { bold: true, fontSize: 16 }
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(data, options);
}
    </script>
        <script>
        $(document).ready(function() {
    $('.delete-btn').click(function() {
        var userId = $(this).data('userid'); 
        $.ajax({
            url: 'delete_user.php',
            method: 'POST',
            data: {
                user_id: userId
            },
            success: function(response) {
                if (response == 'success') {
                    location.reload();
                } else {
                    alert('Failed to delete user.');
                }
            }
        });
    });
});
        </script>
</body>

</html>