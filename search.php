<?php include 'header.php'; ?>
<main class="blog-standard">
        <div class="container">

        <?php
                  include "config.php";
                  if(isset($_GET['search'])){
                    $search_term = mysqli_real_escape_string($conn, $_GET['search']);
        ?>

            <h1 class="oleez-page-title wow fadeInUp">Searched : <?php echo $search_term; ?></h1>
            <div class="row">
            <div class="col-md-8">
        <?php

                /* Calculate Offset Code */
                $limit = 4;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $offset = ($page - 1) * $limit;

                $sql = "SELECT post.post_id, post.title, post.description,post.date,post.author,
                category.category_name,user.username,user.user_id,post.category,post.image FROM post
                LEFT JOIN category ON post.category = category.category_id
                LEFT JOIN user ON post.author = user.user_id
                WHERE post.title LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%'
                ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");    
                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)) {
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
                            <p class="post-excerpt"><?php  echo substr($row['description'],0,100) . "..."; ?></p>
                            <a href="single.php?id=<?php echo $row['post_id']; ?>" class="post-permalink">READ MORE</a>
                        </article>

<!-- pagination -->
            <?php
                      }
                    }else{
                      echo "<h2>No Record Found.</h2>";
                    }

                    // show pagination
                    $sql1 = "SELECT * FROM post
                            WHERE post.title LIKE '%{$search_term}%'";
                     $result1 = mysqli_query($conn, $sql1) or die("Query Failed!");
             
                     $total_records = mysqli_num_rows($result1);
                     $limit = 4  ;
                     $total_page = ceil($total_records/$limit);
             
                     echo '<ul class="pagination justify-content-center">';
                     if($page > 1){
                         echo '<li class="page-item"><a class="page-link" href="search.php?search='.$search_term .'&page='.($page - 1).'">Prev</a></li>';
                       }
                     for($i=1; $i<=$total_page; $i++){
                         if($i==$page){
                             $active = "active";
                         }else{
                             $active = "";
                         }
                         echo '<li class="page-item '.$active.'"><a class="page-link" href="search.php?search='.$search_term .'page='.$i.'">'.$i.'</a></li>';
                     }
                     if($total_page > $page){
                         echo '<li class="page-item"><a class="page-link" href="search.php?search='.$search_term .'page='.($page + 1).'">Next</a></li>';
                       }
                     echo '</ul>';
                }else{
                  echo "<h2>No Record Found.</h2>";
                }
        ?>
                        
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