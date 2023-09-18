<?php 

include "config.php";
  if(isset($_FILES['image'])){
    $errors = array();

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext_parts = explode('.', $file_name);
    $file_ext = end($file_ext_parts);

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 15728640){
      $errors[] = "File size must be 15mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "image/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

                session_start();
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $description = mysqli_real_escape_string($conn, $_POST['desc']);
                $category = mysqli_real_escape_string($conn, $_POST['category']);
                $date = date("d M, Y");
                $author = $_SESSION['user_id'];

                $sql = "INSERT INTO post(title, description,category,date,author,image)
                VALUES('{$title}','{$description}','{$category}','{$date}','{$author}','{$new_name}');";

                $sql .= "UPDATE category SET post = post+1 WHERE category_id = {$category}";

                if(mysqli_multi_query($conn , $sql)){
                    header("location: {$hostname}/admin/post.php");
                }else{
                    echo "<div class='alert alert-danger'>Query Failed.</div>";
                }

?>