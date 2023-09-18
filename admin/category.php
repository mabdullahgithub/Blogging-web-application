

<?php 
    include "header.php";
    include "config.php";

    if($_SESSION["role"] == '0'){
      header("Location: {$hostname}/admin/post.php");
    }

    $limit = 5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    
    $offset = ($page - 1) * $limit;

    $sql = "SELECT * FROM category ORDER BY category_id ASC LIMIT $offset,$limit";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if(mysqli_num_rows($result)){
?>
<body>
  <div class="container mt-3">
    <h2 class="text-center mb-2">All Categories</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
      <a href="add-cate.php"><button class="btn btn-primary">Add Category</button></a>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>S.No.</th>
          <th>name</th>
          <th>post</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($result)){ 
        ?>
        <tr>
          <td><?php echo $row['category_id'] ?></td>
          <td><?php echo $row['category_name'] ?></td>
          <td><?php echo $row['post'] ?></td>
          <td><a href="update-category.php?id=<?php echo $row['category_id']; ?>"><button name="edit" class="btn btn-sm btn-primary">Edit</button></a></td>
          <td><a href="delete-category.php?id=<?php echo $row['category_id']; ?>"><button name="delete" class="btn btn-sm btn-danger">Delete</button></a></td>
        </tr>
        <?php  } ?>
      </tbody>
    </table>
            <!-- pagination -->
        
          <!-- <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li> -->
        
    <?php 
    }
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn, $sql) or die("Query Failed!");

        $total_records = mysqli_num_rows($result);
        $limit = 5  ;
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination justify-content-center">';
        if($page > 1){
            echo '<li class="page-item"><a class="page-link" href="category.php?page='.($page - 1).'">Prev</a></li>';
          }
          // echo '<li class="page-item"><a class="page-link" href="user.php?page='.($page - 1).'">Prev</a></li>';
        for($i=1; $i<=$total_page; $i++){
            if($i==$page){
                $active = "active";
            }else{
                $active = "";
            }
            echo '<li class="page-item '.$active.'"><a class="page-link" href="category.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page){
            echo '<li class="page-item"><a class="page-link" href="category.php?page='.($page + 1).'">Next</a></li>';
          }
          // echo '<li class="page-item"><a class="page-link" href="user.php?page='.($page + 1).'">Next</a></li>';
        echo '</ul>';

    ?>
  </div>
<?php include "footer.php"; ?>
