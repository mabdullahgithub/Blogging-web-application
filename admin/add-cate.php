  
            <?php 
                include "header.php";
                include "config.php";

                if($_SESSION['role'] == '0'){
                  header("Location: {$hostname}/admin/post.php");
                }
                
                if(isset($_POST['add'])){
                    $name = mysqli_real_escape_string($conn,$_POST['name']);

                    $sql = "SELECT category.category_name FROM category WHERE category_name='{$name}'";
                    $result = mysqli_query($conn, $sql) or die("Query failed");

                    if(mysqli_num_rows($result)){
                        echo "<p style='color:red;text-align:center;margin: 10px 0;'>This category is already Exists.</p>";
                    }else{
                        $sql1 = "INSERT INTO `category`(`category_name`) 
                        VALUES ('$name')";

                        if(mysqli_query($conn,$sql1)){
                            header("location: {$hostname}/admin/category.php");
                            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Succefull</p>";
                        }else{
                           echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't add.</p>";
                        }
                    }
                }

            ?>
<!-- Main Content -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-3">Add New - category</h3>

            <!-- Form Start -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="mb-3">
                    <label for="firstName" class="form-label">Category Name<span style="color: crimson;"><b>*</b></span></label>
                    <input type="text" name="name" class="form-control" id="firstName" placeholder="Put here" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="add" class="btn btn-primary">Save</button>
                </div>
            </form>
            <!-- Form End -->
        </div>
    </div>
</div>

<!-- Footer -->
<?php include "footer.php"; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
