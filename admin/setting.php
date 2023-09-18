<?php 
    include "header.php";
    include "config.php";
    if($_SESSION['role'] == '0'){
        header("Location: {$hostname}/index.php");
      }
?>
  <!-- Main Content -->
  <div class="container my-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h4 class="text-center mb-4"  style="color: #1B6B93;">Website Setting - by Administrator</h4>
<?php 
include "config.php";

$sql = "SELECT * FROM setting";

$result = mysqli_query($conn, $sql) or die("Query Failed.");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)) {
?>
        <!-- Form Start -->
        <form  action="save-setting.php" method="POST"  enctype="multipart/form-data" class="form-container">
          <div class="form-group mt-3">
            <label for="websitename mb-2"><b>websitename<span style="color: red;">*</span></b></label>
            <input type="text" value="<?php echo $row['websitename']; ?>" name="websitename" class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group mt-3">
            <label for="image"><b>logo<span style="color: red;">*</span></b></label><br>
                <input type="file" name="new-image">
                <img  src="images/<?php echo $row['logo']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['logo']; ?>">
            <!-- <input value="" type="file" name="image" required> -->
          </div>
          <div class="form-group mt-3">
            <label for="desc"><b>Footer Description<span style="color: red;">*</span></b></label>
            <textarea name="desc" class="form-control" rows="5" required><?php echo $row['footerdesc']; ?></textarea>
          </div>
          <input  type="submit" name="submit" class="btn btn-primary mt-3" value="Submit" required />
        </form>

        <?php
          }
        }
        ?>

        <!-- Form End -->
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include "footer.php"; ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>