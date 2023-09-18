<div class="col-md-4 justify-content-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="search-box-container">
            <h6 style="font-weight:bold;">SEARCH</h6>
            <form class="search-post" action="search.php" method="GET">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="type here">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-danger">Search</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container my-3">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-body">
          <div class="recent-post-container">
            <h6 style="font-weight:bold;">RECENT POSTS</h6>

            <?php 
                    include "config.php";
                    $limit = 3;
                    
                    $sql = "SELECT post.post_id, post.title ,post.image, post.description, post.date, category.category_name,
                     post.image, post.category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    ORDER BY post.post_id DESC LIMIT $limit";

                    $result = mysqli_query($conn, $sql) or die("Query failed");
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_assoc($result)){
                ?>

                      <div class="post-content">
                        <div class="row">
                                <div class="col-md-5">
                                  <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>">
                                  <img class="img-thumbnail" style="height:70px; width:100%;"   src="admin/image/<?php echo $row['image']; ?>" alt="image"/></a>
                                </div>
                                <div class="col-md-7">
                                  <div class="inner-content clearfix">
                                      <h6 style="color: #1B6B93;"><?php echo $row['title']; ?></h6>
                                      <div class="post-information">
                                          <span>
                                              <i style="color: #1B6B93;" class="fa fa-tags" aria-hidden="true"></i>
                                              <a style="color: grey; font-size: 11px; text-decoration:none;" href="category.php?cid=<?php echo $row['category']; ?>" > <?php echo $row['category_name']; ?></a>
                                          </span>
                                          <span>
                                              <i style="color: #1B6B93; " class="fa fa-calendar" aria-hidden="true"></i>
                                              <a style="color: grey; font-size: 11px; text-decoration:none;"><?php echo $row['date']; ?></a>
                                          </span>
                                      </div>
                                      <a style="color:#1B6B93; font-size: 11px; float:left; background-color:white;" class='read-more pull-right text-center' href="single.php?id=<?php echo $row['post_id']; ?>">read more</a>
                                </div>
                            </div>
                        </div>
                    <div class="my-3" style="background-color: lightgrey; height: 1px; width:100%;"></div>
                    </div>

            <?php }} ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
