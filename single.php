<?php include 'header.php'; ?>
<main class="blog-standard">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">Blog Standard</h1>
            <div class="row">
            <div class="col-md-8">
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
                        <article class="blog-post wow fadeInUp">
                            <img src="admin/image/<?php echo $row['image']; ?>" alt="blog post" class="post-thumbnail">
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
                            <h4 class="post-title"><?php echo $row['title']; ?></h4>
                            <p class="post-excerpt"><?php  echo $row['description'] ?><br></p>
                        </article>

<!-- pagination -->
                        <nav class="oleez-pagination wow fadeInUp">
<?php 
                        }
                    }else{
                        echo "<h2>No Record Found.</h2>";
                      }
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
        <form action="search.php" method="GET" class="oleez-overlay-search-form">
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
