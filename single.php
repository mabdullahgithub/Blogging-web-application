<?php include 'header.php'; ?>
<div id="main-content">
        <div class="container p-4 mt-2">
            <div class="row">
                <div class="col-md-8 posts">
                <div class="post-container">
                  <!-- post-container -->
                  <?php 
                    include "config.php";
                    $post_id = $_GET['id'];
                    $sql = "SELECT post.post_id, post.title , post.description, post.date, category.category_name,
                    user.username,user.user_id, post.image, post.category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.post_id = $post_id";

                    $result = mysqli_query($conn, $sql) or die("Query failed");
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_assoc($result)){
                ?>
                        <div class="post-content single-post">
                        <h4 style="color: #1B6B93;"><?php echo $row['title']; ?></h4>
                        <div class="post-information">
                            <span>
                                <i style="color: #1B6B93;" class="fa fa-tags" aria-hidden="true"></i>
                                <a style="color: grey; text-decoration:none;" href="category.php?cid=<?php echo $row['category']; ?>" > <?php echo $row['category_name']; ?></a>
                            </span>
                            <span>
                                <i style="color: #1B6B93;" class="fa fa-user" aria-hidden="true"></i>
                                <a style="color: grey; text-decoration:none;" href="author.php?aid=<?php echo $row['user_id']; ?>" > <?php echo $row['username']; ?></a>
                            </span>
                            <span>
                                <i style="color: #1B6B93;" class="fa fa-calendar" aria-hidden="true"></i>
                                <?php echo $row['date']; ?>
                            </span>
                        </div>
                            <img height="300px" width="auto" class="my-3 single-feature-image" src="admin/image/<?php echo $row['image'] ?>" alt=""/>
                            <p class="description">
                            <?php  echo $row['description'] ?><br>
                            </p>
                        </div>
                        <?php 
                            }
                        }else{
                            echo "no record found";
                        }
                        ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>