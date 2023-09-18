
<?php include "header.php";
   if(isset($_POST['update'])){
    include "config.php";

    if($_SESSION['role'] == '0'){
      header("Location: {$hostname}/admin/post.php");
    }
  
    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $fisrtName = mysqli_real_escape_string($conn,$_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $role = mysqli_real_escape_string($conn,$_POST['role']);
  
    // $sql = "UPDATE user SET first-name = '{$fisrtName}', last-name = '{$lastName}', username = '{$username}', role = '{$role}' WHERE user_id = {$user_id}";
    $sql = "UPDATE `user` SET `first-name`=' $fisrtName',`last-name`='$lastName',`username`='$username',`email`='$email',`role`='$role' WHERE `user_id` = $user_id";
    // $result = mysqli_query($conn,$sql) or die("Query failed");
      if(mysqli_query($conn,$sql)){
        header("Location: {$hostname}/admin/user.php");
      }else{
        echo "can't update!!!";
      }
  }
?>
<!-- Main Content -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="admin-heading text-center mb-4">Modify User Data by Administrator</h2>

            <!-- Form Start -->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <?php
                include "config.php";

                $user_id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE user_id = {$user_id}";
                $result = mysqli_query($conn, $sql) or die("Query failed");

                if (mysqli_num_rows($result)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>" class="form-control">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" name="firstName" value="<?php echo $row['first-name'] ?>"
                                   class="form-control" id="firstName" placeholder="First Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" name="lastName" value="<?php echo $row['last-name'] ?>"
                                   class="form-control" id="lastName" placeholder="Last Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" name="username" value="<?php echo $row['username'] ?>"
                                   class="form-control" id="username" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?php echo $row['email'] ?>" id="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">User Role</label>
                            <select class="form-select" name="role" id="role">
                                <?php
                                if ($row['role'] == 1) {
                                    echo "<option value='0'>Normal User</option>
                                         <option value='1' selected>Admin</option>";
                                } else {
                                    echo "<option value='0' selected>Normal User</option>
                                        <option value='1'>Admin</option>";
                                }
                                ?>
                            </select>
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
