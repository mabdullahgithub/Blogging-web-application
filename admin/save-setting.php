<?php 
    include "config.php";
    
    
if(empty($_FILES['new-image']['name'])){
    $new_name = $_POST['old_image'];
  }else{
    $errors = array();
  
    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $explode = explode('.',$file_name);
    $file_ext = end($explode);
  
    $extensions = array("jpeg","jpg","png");
  
    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }
  
    if($file_size > 6291456){
      $errors[] = "File size must be 6mb or lower.";
    }
  
    $new_name = time(). "-".basename($file_name);
    $target = "images/".$new_name;
    $image_name = $new_name;
    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }
  
  $sql = "UPDATE setting SET websitename='{$_POST["websitename"]}',footerdesc='{$_POST["desc"]}',logo='{$new_name}'";
  
  $result = mysqli_multi_query($conn,$sql);
  
  if($result){
    header("location: {$hostname}/admin/setting.php");
  }else{
    echo "Query Failed";
  }

?>