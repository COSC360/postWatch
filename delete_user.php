<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
} elseif (isset($_SESSION["admin_id"])) {
    $mysqli = require __DIR__ . '/database.php';
    if (isset($_POST['userid'])) {
        $userid = $_POST['userid'];
        $sql_delete_comments = "DELETE comments.* FROM comments INNER JOIN post ON comments.post_id = post.id WHERE post.user_id = ?";
        $stmt = $mysqli->prepare($sql_delete_comments);
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $stmt->close();
        $sql_delete_posts = "DELETE FROM post WHERE user_id = ?";
        $stmt = $mysqli->prepare($sql_delete_posts);
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $stmt->close();
        $sql_delete_user = "DELETE FROM user WHERE id = ?";
        $stmt = $mysqli->prepare($sql_delete_user);
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $stmt->close();
        header("Location: adminHome.php");
        exit;
    }
    $sql = "SELECT user.id, user.username, user.email, COUNT(post.id) AS num_posts
            FROM user
            LEFT JOIN post ON user.id = post.user_id
            GROUP BY user.id, user.username, user.email";
    if ($mysqli->error) {
        die("Error: " . $mysqli->error);
    }
    $result = $mysqli->query($sql);
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
    $mysqli->close();
}
?>