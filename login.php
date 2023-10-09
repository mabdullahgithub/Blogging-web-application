<?php
  include "config.php";
  session_start();

  if(isset($_SESSION['username'])){
    header("Location: {$hostname}/admin/user.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

  <style>
  body{
    background-color: aliceblue;
  }
</style>
</head>

<?php

if(isset($_POST['login'])){
    include "config.php";

    if(empty($_POST['usernameEmail']) || empty($_POST['password'])){
        echo '<div class="alert alert-danger">All Fields must be entered.</div>';
        die();
    }else{
        $usernameEmail = mysqli_real_escape_string($conn, $_POST['usernameEmail']);
        $password = sha1($_POST['password']);

        $sql = "SELECT user_id, username, email, role, password FROM user WHERE username = '{$usernameEmail}' OR email = '{$usernameEmail}' ";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
            if ($password === $row["password"]) {
                // echo '<div class="alert alert-danger">Login successful!.</div>';

                session_start();

                $_SESSION["username"] = $row['username'];
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["role"] = $row['role'];
          
                header("Location: {$hostname}/admin/post.php");
              
            } else {
                echo "Invalid password!";
            }
        }
      } else {
            echo "User not found!";
        }
      }
        
        $conn->close();
    }
?>

<body>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow">
        <div class="card-body">
          <div class="text-center mb-4">
            <img class="logo" src="admin/image/1688625737-detective-gf8746a9da_1280.png" height="100px" width="auto"><br>
            <h3 class="my-2">Entrance</h3>
          </div>
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <!-- Username/Email -->

            <div class="input-group mb-1">
              <span  style="color: grey;" class="input-group-text px-3" id="basic-addon1">#~~</span>
              <input type="text" name="usernameEmail" class="form-control" placeholder="Username or Email" aria-label="Username">
            </div>

              <!-- password -->
            <div class="input-group mb-3">
              <span style="color: grey;" class="input-group-text" id="basic-addon1">******</span>
              <input type="password" name="password" class="form-control" placeholder="put your password" aria-label="Username">
            </div>


            <!-- Login Button -->
            <div class="text-center d-flex justify-content-center">
              <button style="width: 100%;" type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
            <!-- Forgot Password Link -->
            <!-- <div class="mt-3 text-center text-muted">
              Forgot password? <a href="signup.php">click here</a>
            </div> -->
            <!-- <div class="text-center text-muted">
              or
            </div> -->
            <!-- Signup Link -->
            <div class="mt-3 text-center text-muted">
              Don't have an account? Let's join! <a href="signup.php">Signup here</a>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
