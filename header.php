<!DOCTYPE html>
<html lang="en">
<?php 
  include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
  switch($page){
    case "single.php":
      if(isset($_GET['id'])){
        $page_title_sql = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
        $page_title_result = mysqli_query($conn,$page_title_sql);
        $page_title_row = mysqli_fetch_assoc($page_title_result);
        $page_title = $page_title_row['title'];
      }else{
        $page_title = "No post found";
      }
      break;
      case "search.php":
        if(isset($_GET['search'])){
          $page_title = $_GET['search'];
        }else{
          $page_title = "No Search Result Found";
        }
        break;
    case "category.php":
      if(isset($_GET['cid'])){
        $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = $row_title['category_name'] . " News";
      }else{
        $page_title = "No Post Found";
      }
      break;
    case "author.php":
      if(isset($_GET['aid'])){
        $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
        $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
        $row_title = mysqli_fetch_assoc($result_title);
        $page_title = "News By " .$row_title['first-name'] . " " . $row_title['last-name'];
      }else{
        $page_title = "No Post Found";
      }
      break;
    default:
    $sql_title = "SELECT websitename FROM setting";
    $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
    $row_title = mysqli_fetch_assoc($result_title);
    $page_title = $row_title['websitename'];
    break;
  }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./assets/vendors/animate.css/animate.min.css">
    <link rel="stylesheet" href="./assets/vendors/slick-carousel/slick.css">
    <link rel="stylesheet" href="./assets/vendors/slick-carousel/slick-theme.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/js/loader.js"></script>
    
    <style>
    .navbar-brand img {
      height: 150px; 
      /* margin-top: -50px; */
    }
    .navoo{
      margin-top: -40px;
    }
    .image{
        background-size: 100% 100%;
        width: 100%;
        height: 150px;
    }
    
/* */
  </style>
</head>
<?php
include "config.php";
?>
<body>
<header class="oleez-header">
<?php 
            include "config.php";
                  $logo_sql = "SELECT logo FROM setting";
                  $logo_result = mysqli_query($conn, $logo_sql);
                  $logo_row = mysqli_fetch_assoc($logo_result);
                
?>
        <nav class="navbar navoo navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.html"><img src="admin\images\<?php echo $logo_row['logo'] ?>" alt="Logo"></a>
            <ul class="nav nav-actions d-lg-none ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#!" data-toggle="searchModal">
                        <img src="assets/images/search.svg" alt="search">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!" data-toggle="offCanvasMenu">
                        <img src="assets/images/social icon@2x.svg" alt="social-nav-toggle">
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav"
                aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="oleezMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item">
                        <a class="nav-link nav-link-btn" href="#!" data-toggle="searchModal">
                            <img src="assets/images/search.svg" alt="search">
                        </a>
                    </li>
                    <li>
                        <a style="color: red;" class="nav-link " href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Header -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
