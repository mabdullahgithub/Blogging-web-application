
<?php include "header.php";
   if(isset($_POST['update'])){
    include "config.php";

    if($_SESSION['role'] == '0'){
      header("Location: {$hostname}/admin/post.php");
    }
  
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    
    $category = $_GET['id'];

    $sql = "SELECT category.category_name FROM category WHERE category_name='{$name}'";
     $result = mysqli_query($conn, $sql) or die("Query failed");
  
     if(mysqli_num_rows($result)){
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>This category is already Exists.</p>";
    }else{
    $sql = "UPDATE `category` SET `category_name`=' $name' WHERE `category_id` = $category";
    if(mysqli_query($conn,$sql)){
        header("Location: {$hostname}/admin/category.php");
      }else{
        echo "can't update!!!";
      }
    }
  }
?>
<!-- Main Content -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="admin-heading text-center mb-4">Modify category by - Administrator</h2>

            <!-- Form Start -->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                <?php
                $category = $_GET['id'];

                $sql = "SELECT category.category_name FROM category WHERE category_id = {$category}";
                $result = mysqli_query($conn, $sql) or die("Query failed");

                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                         <div class="mb-3">
                         <label for="firstName" class="form-label">Category Name<span style="color: crimson;"><b>*</b></span></label>
                            <input type="text" name="name" value="<?php echo $row['category_name'] ?>"
                                   class="form-control" id="firstName" placeholder="First Name" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    <?php
                    }
                }
                ?>
      </div>
    </div>
  </div>
