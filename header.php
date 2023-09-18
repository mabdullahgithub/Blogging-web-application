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
    
    <style>
    .navbar-brand img {
      height: 50px; /* Adjust the height of the logo as needed */
    }
    .image{
        background-size: 100% 100%;
        width: 100%;
        height: 150px;
    }
    .posts{
    background: #fff;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    }
    body{
        background: ghostwhite;
        font-family: sans-serif,arial,Helvetica;
    }
    #main-content .post-content{
        font-size: 14px;
    }
    #main-content .post-content .post-information span{
        font-size: 12px;
        color: grey;
    }
    #main-content .post-content a.read-more{
    color: #fff;
    text-decoration: none;
    background-color: grey;
    font-size: 12px;
    text-transform: capitalize;
    padding: 3px 8px;
    border-radius: 2px;
    transition: all 0.3s;
    float: right;
}
#footer{
    color: #fff;
    padding:15px 0;
    text-align:center;
    background-color: #6C757D;
    bottom: 0;
}
#footer #content{
  font-size: 13px;
}
#footer  a{
    color:#fff;
}

#footer  span  a:hover{
    text-decoration: underline;
}
#main-content .post-content a.read-more:hover{
    color: #fff;
    background-color: #333;
}
/* */
  </style>
</head>
<?php
include "config.php";
?>
<body>
    <!-- Header -->
    <header class="bg-secondary py-3">
        <div class="container">
            <?php 
            include "config.php";
                $sql = "SELECT * FROM category  WHERE post > 0";
                $result = mysqli_query($conn , $sql);
                if(mysqli_num_rows($result)){
                  
                  // fetch logo

                  $logo_sql = "SELECT logo FROM setting";
                  $logo_result = mysqli_query($conn, $logo_sql);
                  $logo_row = mysqli_fetch_assoc($logo_result);
                
            ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div>
      <a class="navbar-brand ms-4" href="#"><img src="admin\images\<?php echo $logo_row['logo'] ?>" alt="Logo"></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
      <li class="nav-item cate mx-2">
          <a onmouseover="this.style.color='yellow';" onmouseout="this.style.color='yellow';" class="nav-link " href="<?php echo $hostname ?>">Home</a>
        </li>
        <?php 
            // $cid = $_GET['cid'];
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <li class="nav-item cate mx-2">
          <a onmouseover="this.style.color='yellow';"
            onmouseout="this.style.color='grey';"
           class="nav-link" href='category.php?cid=<?php echo $row['category_id'] ?>'>
          <?php echo $row['category_name'] ?></a></li>
        <?php } ?>
        <li class=" mx-3 nav-item">
          <a style="color: red;" class="nav-link " href="login.php">Login</a>
        </li>
      </ul>
    </div>
</nav>
<?php 
}
?>
</div>
    </header>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
