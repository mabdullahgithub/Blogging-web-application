

<?php 
    include "header.php";
    include "config.php";

if($_SESSION["role"] == '0'){
  header("Location: {$hostname}/admin/post.php");
}
?>
<body>
  <div class="container mt-3">
    <h2 class="text-center mb-2">All Users</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
      <a href="add-user.php"><button class="btn btn-primary">Add User</button></a>
    </div>
    
    <?php 

    $limit = 5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    
    $offset = ($page - 1) * $limit;

    $sql = "SELECT * FROM user ORDER BY role DESC, user_id DESC LIMIT $offset,$limit";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if(mysqli_num_rows($result)){

    ?>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>S.No.</th>
          <th>Full Name</th>
          <th>User Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            while ($row = mysqli_fetch_assoc($result)){ 
        ?>
        <tr>
          <td><?php echo $row['user_id'] ?></td>
          <td><?php echo $row['first-name']. " " . $row['last-name'] ?></td>
          <td><?php echo $row['username'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><?php 
            if($row['role'] == 1){
                echo "<i>Admin</i>";
            }else{
                echo "<i>User</i>";
            }
          ?></td>
          <td><a href="update-user.php?id=<?php echo $row['user_id']; ?>"><button name="edit" class="btn btn-sm btn-primary">Edit</button></a></td>
          <td><a href="delete-user.php?id=<?php echo $row['user_id']; ?>"><button name="delete" class="btn btn-sm btn-danger">Delete</button></a></td>
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
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql) or die("Query Failed!");

        $total_records = mysqli_num_rows($result);
        $limit = 5  ;
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination justify-content-center">';
        if($page > 1){
            echo '<li class="page-item"><a class="page-link" href="user.php?page='.($page - 1).'">Prev</a></li>';
          }
          // echo '<li class="page-item"><a class="page-link" href="user.php?page='.($page - 1).'">Prev</a></li>';
        for($i=1; $i<=$total_page; $i++){
            if($i==$page){
                $active = "active";
            }else{
                $active = "";
            }
            echo '<li class="page-item '.$active.'"><a class="page-link" href="user.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page){
            echo '<li class="page-item"><a class="page-link" href="user.php?page='.($page + 1).'">Next</a></li>';
          }
          // echo '<li class="page-item"><a class="page-link" href="user.php?page='.($page + 1).'">Next</a></li>';
        echo '</ul>';

    ?>
  </div>
<?php include "footer.php"; ?>
