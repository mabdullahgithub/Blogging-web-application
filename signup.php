<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<style>
  body{
    background-color: aliceblue;
  }
</style>
</head>

<?php
if(isset($_POST['submit'])){
    include "config.php";

    $fisrtName = mysqli_real_escape_string($conn,$_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,sha1($_POST['password']));
    $confirmpassword = mysqli_real_escape_string($conn,sha1($_POST['confirmpassword']));
    $role = mysqli_real_escape_string($conn,$_POST['role']);

    $sql = "SELECT username FROM user WHERE username = '{$username}'";
    $result = mysqli_query($conn,$sql) or die ("Qeury failed.");

    if(mysqli_num_rows($result)){
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
    }else{
        $sql1 = "INSERT INTO `user`(`first-name`, `last-name`, `username`, `email`, `password`, `role`) 
        VALUES ('$fisrtName','$lastName','$username','$email','$password','$role')";
    if($password === $confirmpassword){
        if(mysqli_query($conn,$sql1)){
             header("location: {$hostname}/login.php");
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Succefull</p>";
        }else{
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Signup.</p>";
        }
    }else{
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Password and confirmed password do not match. Please try again. </p>";
    }
    }
}
?>

<body>
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <div class="text-center mb-3">
            <img class="logo my-2" src="admin/image/1688625737-detective-gf8746a9da_1280.png" height="100px" width="auto"><br>
            <h3 class="heading my-2 ">Registration</h3>
          </div>
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <!-- First and last Name -->
            <div class="input-group mb-3">
              <input name="firstName" placeholder="First name" required type="text" class="form-control">
              <input name="lastName" placeholder="Last name" required type="text" class="form-control">
            </div>

            <!-- Username -->
            <div class="input-group mb-3">
              <input name="username" required type="text" class="form-control" placeholder="Username">
              <div class="input-group-prepend">
                <span style="color: grey;" class="input-group-text" id="basic-addon1">#~~</span>
              </div>
            </div>

            <!-- email -->
            <div class="input-group mb-3">
              <input name="email" required type="email" class="form-control" placeholder="Put your email">
              <div class="input-group-prepend">
                <span style="color: grey;" class="input-group-text" id="basic-addon1">@gmail.com</span>
              </div>
            </div>

            <!-- Password -->
            <div class="input-group mb-5">
              <input name="password" placeholder="Password" required type="password" class="form-control">
              <input name="confirmpassword" placeholder="Confirm password" required type="password" class="form-control">
            </div>

            <!-- Role -->
            <div class="mb-3">
              <input type="hidden" name="role" id="user" value="0" checked>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center">
              <button type="submit" name="submit" class="btn btn-primary" style="width: 50%;">Sign Up</button>
            </div>

            <div class="mt-2 text-center">
              <p class=" text-muted">Already have an account? <a href="login.php">Log in here</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php

?>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
