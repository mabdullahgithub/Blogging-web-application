
<?php 
include "config.php";
session_start();

if(!isset($_SESSION['username'])){
  header("Location: {$hostname}/index.php");
}
?>
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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <title><?php echo $page_title; ?></title>
  <style>
    /* Custom CSS to adjust the header styling */
    .navbar  {
      background-color: #D8D8D8;; /* Change to your desired primary color */
    }
    .navbar-brand {
      font-size: 1.5rem;
      font-weight: bold;
      color: #fff; /* Change to your desired text color */
    }
    .navoo .nav-link {
      color: #fff; /* Change to your desired link text color */
    }
    .navee .nav-link {
      color: grey; /* Change to your desired link text color */
    }
    .navee .nav-link:hover {
      color: black; /* Change to your desired link text hover color */
    }
    #footer{
    color: grey;
    padding:15px 0;
    text-align:center;
    background-color: lightgrey;
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
  </style>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      /* background: #fff; */
      border: 1px solid #ced4da;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container">

      <?php 
        include "config.php";
        $logo_sql = "SELECT logo FROM setting";
        $logo_result = mysqli_query($conn, $logo_sql);
        $logo_row = mysqli_fetch_assoc($logo_result);
      ?>
        <a class="navbar-brand" href="#">
          <img src="images\<?php echo $logo_row['logo']; ?>" alt="Logo" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav navoo ms-auto">
            <li class="nav-item">
              <h5 style="margin-right: 20px;">
              <a style="cursor:not-allowed; color: #fff;" onmouseover="this.style.color='gold';" onmouseout="this.style.color='#fff';" class="nav-link">Hello, <?php echo $_SESSION['username'] ?></a>
            </h5>
            </li>
            <li class="nav-item">
              <a style="color: grey;" onmouseover="this.style.color='red';" onmouseout="this.style.color='grey';" class="nav-link" href="logout.php">Logout 
              <?php 
              if($_SESSION['role'] == '1'){
                 echo '- Admin';
                 }else{
                    echo "";
              } ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavLower"
          aria-controls="navbarNavLower" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavLower">
        
          <ul class="navbar-nav navee">
            <li class="nav-item">
              <a style="color: red;" class=" nav-link" href="../index.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">Post</a>
            </li>
            
            <?php 
              if($_SESSION['role'] == '1'){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="user.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="category.php">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="setting.php">Settings</a>
            </li>

            <?php 
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script> -->
  <!-- Rest of your page content goes here -->

 


  