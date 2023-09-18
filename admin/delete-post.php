<?php 
include "config.php";

$post_id = $_GET['id'];
$category_id = $_GET['category_id'];

$sql1 = "SELECT image FROM post WHERE post_id = $post_id";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);

unlink("image/".$row['image']);

$sql = "DELETE FROM post WHERE post_id = $post_id;";
$sql .= "UPDATE category SET post = post-1 WHERE category_id = $category_id";
if(mysqli_multi_query($conn, $sql)){
    header("Location: {$hostname}/admin/post.php");
  }else{
    echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the Post.</p>";
  }
  
  mysqli_close($conn);
?>