<?php include 'header.php'; ?>
<main class="blog-standard">
        <div class="container">
        <?php
                  include "config.php";
                  if(isset($_GET['aid'])){
                    $a_id = $_GET['aid'];

                    $sql2 = "SELECT * FROM user WHERE user_id = {$a_id}";
                    $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
                    $row1 = mysqli_fetch_assoc($result2);

        ?>

            <h1 class="oleez-page-title wow fadeInUp">Blog by - <?php echo $row1['username']; ?></h1>
            <div class="row">
            <div class="col-md-8">
            <?php 
                  }
                    include "config.php";

                    $limit = 5;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                    
                    $sql = "SELECT post.post_id, post.title , post.description, post.date, category.category_name,
                    user.username, post.image, post.category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE user.user_id = $a_id
                     ORDER BY post.post_id DESC LIMIT $offset , $limit";

                    $result = mysqli_query($conn, $sql) or die("Query failed");
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_assoc($result)){
                ?>
                        <article class="blog-post wow fadeInUp">
                            <img src="admin/image/<?php echo $row['image']; ?>" alt="blog post" class="post-thumbnail">
                            <span>
                                <i style="color: #1B6B93;" class="fa fa-tags" aria-hidden="true"></i>
                                <?php echo $row['category_name']; ?>
                            </span>
                            <span>
                                <i style="color: #1B6B93;" class="fa fa-user" aria-hidden="true"></i>
                                <?php echo $row['username']; ?>
                            </span>
                            <span>
                                <i style="color: #1B6B93;" class="fa fa-calendar" aria-hidden="true"></i>
                                <?php echo $row['date']; ?>
                            </span>
                            <h4 class="post-title"><?php echo $row['title']; ?></h4>
                            <p class="post-excerpt"><?php  echo substr($row['description'],0,100) . "..."; ?></p>
                            <a href="single.php?id=<?php echo $row['post_id']; ?>" class="post-permalink">READ MORE</a>
                        </article>

<!-- pagination -->
                        <nav class="oleez-pagination wow fadeInUp">
<?php 
                        }
                    }else{
                        echo "<h2>No Record Found.</h2>";
                      }
        $sql1 = "SELECT * FROM post";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed!");

        $total_records = mysqli_num_rows($result1);
        $limit = 4  ;
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination justify-content-center">';
        if($page > 1){
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page - 1).'">P</a></li>';
          }
        for($i=1; $i<=$total_page; $i++){
            if($i==$page){
                $active = "active";
            }else{
                $active = "";
            }
            echo '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page){
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page + 1).'">N</a></li>';
          }
        echo '</ul>';

?>
</nav>
                        
                    </div>
                    <?php include 'sidebar.php'; ?>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>

    <!-- Modals -->
    <!-- Full screen search box -->
    <div id="searchModal" class="search-modal">
        <button type="button" class="close" aria-label="Close" data-dismiss="searchModal">
            <span aria-hidden="true">&times;</span>
        </button>
        <form action="index.html" method="get" class="oleez-overlay-search-form">
            <label for="search" class="sr-only">Search</label>
            <input type="search" class="oleez-overlay-search-input" id="search" name="search" placeholder="Add words and hit enter to search">
        </form>
    </div>
    <script src="assets/vendors/popper.js/popper.min.js"></script>
    <script src="assets/vendors/wowjs/wow.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendors/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        new WOW().init();
    </script>
