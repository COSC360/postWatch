<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("Location: index.php");
  exit;
} elseif (isset($_SESSION["admin_id"])) {
  require_once __DIR__ . '/database.php';

  // Check if post_id is set
  if (isset($_POST['post_id']) && !empty($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

       // Delete likes and comments witch checks before deleting the post itself

       $delete_likes_sql = "DELETE FROM likes WHERE post_id = $post_id";
       if ($mysqli->query($delete_likes_sql)) { 

    $delete_comments_sql = "DELETE FROM comments WHERE post_id = $post_id";
    if ($mysqli->query($delete_comments_sql)) {
   
        $delete_post_sql = "DELETE FROM post WHERE id = $post_id";
        if ($mysqli->query($delete_post_sql)) {
          header("Location: adminHome.php");
          exit;
        } else {
          echo "Error" ;
        }
     

  $mysqli->close();
}
}
}
}  
?>
