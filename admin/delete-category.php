<?php 
include "config.php";

$category = $_GET['id'];

$sql = "DELETE FROM `category` WHERE category_id = $category";
if(mysqli_query($conn, $sql)){
    header("Location: {$hostname}/admin/category.php");
  }else{
    echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the category.</p>";
  }
  
  mysqli_close($conn);
?>