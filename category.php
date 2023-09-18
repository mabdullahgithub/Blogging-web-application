<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-7 mx-4 posts">
                <div class="post-container">
                <?php
                  include "config.php";
                  if(isset($_GET['cid'])){
                    $cat_id = $_GET['cid'];

                    $sql1 = "SELECT * FROM category WHERE category_id = {$cat_id}";
                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
                    $row1 = mysqli_fetch_assoc($result1);

                  ?>
                  <h4 style=" text-transform: uppercase; font-weight: bold;" class="page-heading"><?php echo $row1['category_name']; ?> News</h4>
                  <div class="mb-3" style="background-color: black; height: 2px; width:100%;"></div>
                <?php 
                  }
                    include "config.php";
                    $cid = $_GET['cid'];

                    $limit = 5;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                    
                    $sql = "SELECT post.post_id, post.title , post.description, post.date, category.category_name,
                    user.username, user.user_id, post.image, post.category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.category = $cid
                     ORDER BY post.post_id DESC LIMIT $offset , $limit";

                    $result = mysqli_query($conn, $sql) or die("Query failed");
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_assoc($result)){
                ?>
                    <div class="post-content">
                        <div class="row">
                                <div class="col-md-4">
                                  <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>">
                                  <img class="image";   src="admin/image/<?php echo $row['image']; ?>" alt="image"/></a>
                                </div>
                                <div class="col-md-8">
                                  <div class="inner-content clearfix">
                                      <h4 style="color: #1B6B93;"><?php echo $row['title']; ?></h4>
                                      <div class="post-information">
                                          <span>
                                              <i style="color: #1B6B93;" class="fa fa-tags" aria-hidden="true"></i>
                                              <?php echo $row['category_name']; ?>
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
                                      <p class="description">
                                      <?php  echo substr($row['description'],0,160) . "..."; ?><br>
                                      </p>
                                      <a class='read-more pull-right' href="single.php?id=<?php echo $row['post_id']; ?>">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4" style="background-color: #1B6B93; height: 1px; width:100%; opacity:50%;"></div>
                    <?php 
                        }
                    }else{
                        echo "<h2>No Record Found.</h2>";
                      }

        $sql1 = "SELECT post FROM category WHERE category_id = $cid";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed!");
        $row =mysqli_fetch_assoc($result1);

        $total_records = $row['post'];
        $limit = 5  ;
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination justify-content-center">';
        if($page > 1){
            echo '<li class="page-item"><a class="page-link" href="category.php?cid='.$cid.'&page='.($page - 1).'">Prev</a></li>';
          }
        for($i=1; $i<=$total_page; $i++){
            if($i==$page){
                $active = "active";
            }else{
                $active = "";
            }
            echo '<li class="page-item '.$active.'"><a class="page-link" href="category.php?cid='.$cid.'&page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page){
            echo '<li class="page-item"><a class="page-link" href="category.php?cid='.$cid.'&page='.($page + 1).'">Next</a></li>';
          }
        echo '</ul>';

                      ?>

                </div>
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
