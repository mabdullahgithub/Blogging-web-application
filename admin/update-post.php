  
            <?php include "header.php"; ?>
  <!-- Main Content -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h3 class="text-center mb-4 mt-4">Modify post by - Administrator</h3>
<?php 
include "config.php";

$post_id = $_GET['id'];

$sql = "SELECT post.post_id, post.description, post.title, post.image, post.category, category.category_name,
user.username FROM post
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id
WHERE post_id = {$post_id}";

$result = mysqli_query($conn, $sql) or die("Query Failed.");
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)) {
?>
        <!-- Form Start -->
        <form  action="save-updated-post.php" method="POST"  enctype="multipart/form-data" class="form-container">
        <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']; ?>" placeholder="">
            </div>
          <div class="form-group mt-4">
            <label for="title mb-2">Title<b><span style="color: red;">*</span></b></label>
            <input type="text" value="<?php echo $row['title']; ?>" name="title" class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group mt-3">
            <label for="category">Category<b><span style="color: red;">*</span></b></label>
            <select name="category" class="form-control">
              <option disabled>Select Category</option>
              <?php
                include "config.php";
                $sql1 = "SELECT * FROM category";

                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){
                  while($row1 = mysqli_fetch_assoc($result1)){
                    if($row['category'] == $row1['category_id']){
                      $selected = "selected";
                    }else{
                      $selected = "";
                    }
                    echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                  }
                }
              ?>
            </select>
            <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">
          </div>
          <div class="form-group mt-3">
            <label for="desc">Description<b><span style="color: red;">*</span></b></label>
            <textarea name="desc" class="form-control" rows="5" required><?php echo $row['description']; ?></textarea>
          </div>
          <div style="overflow-x: scroll; background-size:100%;" class="form-group mt-3">
            <label for="image"><b>Post image<span style="color: red;">*</span></b></label><br>
                <input type="file" name="new-image">
                <img  src="image/<?php echo $row['image']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">
            <!-- <input value="" type="file" name="image" required> -->
          </div>
          <input  type="submit" name="submit" class="btn btn-primary mt-3" value="Submit" required />
        </form>

        <?php
          }
        }else{
          echo "Result Not Found.";
        }
        ?>

        <!-- Form End -->
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include "footer.php"; ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>