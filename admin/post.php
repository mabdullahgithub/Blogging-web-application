
<?php 
    include "header.php";
?>
<body>
  <div class="container mt-3">
    <h2 class="text-center mb-2">All Posts</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
      <a href="add-post.php"><button class="btn btn-primary">Add Post</button></a>
    </div>

    <?php 
      include "config.php";

      $limit = 5;
      if(isset($_GET['page'])){
          $page = $_GET['page'];
      }else{
          $page = 1;
      }
      
      $offset = ($page - 1) * $limit;
  
      if($_SESSION["role"] == '1'){
        $sql = "SELECT post.post_id, post.title , post.description, post.date, category.category_name,
        user.username, post.category FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN user ON post.author = user.user_id
        ORDER BY post.post_id DESC LIMIT $offset , $limit";
      }elseif($_SESSION['role'] == '0'){
        $sql = "SELECT post.post_id, post.title , post.description, post.date, category.category_name,
        user.username, post.category FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN user ON post.author = user.user_id
        WHERE post.author = {$_SESSION['user_id']}
        ORDER BY post.post_id DESC LIMIT $offset , $limit";
      }
  
      $result = mysqli_query($conn, $sql) or die("Query failed");
      if(mysqli_num_rows($result)){
    ?>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>S.No.</th>
          <th>Author</th>
          <th>title</th>
          <th>Date</th>
          <th>Category</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($result)){ 
        ?>
        <tr>
          <td><?php echo $row['post_id'] ?></td>
          <td><?php echo $row['username'] ?></td>
          <td><?php echo $row['title'] ?></td>
          <td><?php echo $row['date'] ?></td>
          <td><?php echo $row['category_name'] ?></td>
          <td><a href="update-post.php?id=<?php echo $row['post_id']; ?>"><button name="edit" class="btn btn-sm btn-primary">Edit</button></a></td>
          <td><a href="delete-post.php?id=<?php echo $row['post_id']; ?>&category_id=<?php echo $row['category']; ?>"><button name="delete" class="btn btn-sm btn-danger">Delete</button></a></td>
        </tr>
        <?php  } ?>
      </tbody>
    </table>

    <?php 
    }
    
    if($_SESSION["role"] == '1'){
      /* select query of post table for admin user */
      $sql1 = "SELECT * FROM post";
    }elseif($_SESSION["role"] == '0'){
      /* select query of post table for normal user */
      $sql1 = "SELECT * FROM post
      WHERE author = {$_SESSION['user_id']}";
    }
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed!");

        $total_records = mysqli_num_rows($result1);
        $limit = 5  ;
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination justify-content-center">';
        if($page > 1){
            echo '<li class="page-item"><a class="page-link" href="post.php?page='.($page - 1).'">Prev</a></li>';
          }
          // echo '<li class="page-item"><a class="page-link" href="user.php?page='.($page - 1).'">Prev</a></li>';
        for($i=1; $i<=$total_page; $i++){
            if($i==$page){
                $active = "active";
            }else{
                $active = "";
            }
            echo '<li class="page-item '.$active.'"><a class="page-link" href="post.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page){
            echo '<li class="page-item"><a class="page-link" href="post.php?page='.($page + 1).'">Next</a></li>';
          }
          // echo '<li class="page-item"><a class="page-link" href="user.php?page='.($page + 1).'">Next</a></li>';
        echo '</ul>';

    ?>
  </div>
<?php include "footer.php"; ?>
