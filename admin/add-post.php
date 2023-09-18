  
            <?php 
                include "header.php";
            ?>
  <!-- Main Content -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h3 class="text-center mb-4 mt-4">Add New Post</h3>

        <!-- Form Start -->
        <form action="save-post.php" method="POST"  enctype="multipart/form-data" class="form-container my-4">
          <div class="form-group mt-4">
            <label for="title mb-2">Title<b><span style="color: red;">*</span></b></label>
            <input type="text" name="title" class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group mt-3">
            <label for="category">Category<b><span style="color: red;">*</span></b></label>
            <select name="category" class="form-control">
              <option disabled selected>Select Category</option>
              <?php
                include "config.php";
                $sql = "SELECT * FROM category";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                  }
                }
              ?>
            </select>
          </div>
          <div class="form-group mt-3">
            <label for="desc">Description<b><span style="color: red;">*</span></b></label>
            <textarea name="desc" class="form-control" rows="5" required></textarea>
          </div>
          <div class="form-group mt-3">
            <label for="image">Post image<b><span style="color: red;">*</span></b></label>
            <input type="file" name="image" required>
          </div>
          <div class="d-flex justify-content-end">
          <input style="width: 150px;" type="submit" name="submit" class="btn btn-primary mt-3" value="Submit" required />
        </div>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include "footer.php"; ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>