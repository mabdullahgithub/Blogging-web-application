  
            <?php 
                include "header.php";
                include "config.php";

                if($_SESSION['role'] == '0'){
                  header("Location: {$hostname}/admin/post.php");
                }
                
                if(isset($_POST['add'])){
                    $fisrtName = mysqli_real_escape_string($conn,$_POST['firstName']);
                    $lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
                    $username = mysqli_real_escape_string($conn,$_POST['username']);
                    $email = mysqli_real_escape_string($conn,$_POST['email']);
                    $password = mysqli_real_escape_string($conn,sha1($_POST['password']));
                    $role = mysqli_real_escape_string($conn,$_POST['role']);

                    $sql = "SELECT username FROM user WHERE username='{$username}'";
                    $result = mysqli_query($conn, $sql) or die("Query failed");

                    if(mysqli_num_rows($result)){
                        echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
                    }else{
                        $sql1 = "INSERT INTO `user`(`first-name`, `last-name`, `username`, `email`, `password`, `role`) 
                        VALUES ('$fisrtName','$lastName','$username','$email','$password','$role')";

                        if(mysqli_query($conn,$sql1)){
                            header("location: {$hostname}/admin/user.php");
                            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Succefull</p>";
                        }else{
                           echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Signup.</p>";
                        }
                    }
                }

            ?>
<!-- Main Content -->
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <div class="text-center mb-3">
            <img class="logo my-2" src="image/1688625737-detective-gf8746a9da_1280.png" height="100px" width="auto"><br>
            <h3 class="heading my-2 mb-2 ">Add New User</h3>

            <!-- Form Start -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

             <!-- First and last Name -->
             <div class="input-group my-3">
              <input name="firstName" placeholder="First name" required type="text" class="form-control">
              <input name="lastName" placeholder="Last name" required type="text" class="form-control">
            </div>

             <!-- Username -->
             <div class="input-group mb-3">
              <input name="username" required type="text" class="form-control" placeholder="Username">
              <div class="input-group-prepend">
                <span style="color: grey;" class="input-group-text px-4" id="basic-addon1">#~~</span>
              </div>
            </div>

            <!-- email -->
            <div class="input-group mb-3">
              <input name="email" required type="email" class="form-control" placeholder="Put your email">
              <div class="input-group-prepend">
                <span style="color: grey;" class="input-group-text px-3" id="basic-addon1">@gmail.com</span>
              </div>
            </div>

            <!-- Password -->
            <div class="input-group mb-3">
              <input name="password" placeholder="Password" required type="password" class="form-control">
            <div class="input-group-prepend">
                <span style="color: grey;" class="input-group-text px-4" id="basic-addon1">*****</span>
            </div>
            </div>
                <div class="mb-3">
                    <label for="role" class="form-label"><b>User Role<span style="color:red;">*</span></b></label>
                    <select class="form-select" name="role" id="role">
                        <option value="0">Normal User</option>
                        <option value="1">Admin</option>
                    </select>
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
