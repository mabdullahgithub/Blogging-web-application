<?php 
include "config.php";

$user_id = $_GET['id'];

$sql = "DELETE FROM `user` WHERE user_id=$user_id";
if(mysqli_query($conn, $sql)){
    header("Location: {$hostname}/admin/user.php");
  }else{
    echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the User Record.</p>";
  }
  
  mysqli_close($conn);
?>