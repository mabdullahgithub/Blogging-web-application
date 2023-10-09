<?php include 'header.php'; ?>

<!-- carousel -->
<section style="padding-bottom: 0px; margin-top: -145px;" class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="slider-hero">
							<div class="featured-carousel owl-carousel">
								<div class="item">
									<div class="work">
                                        <div class="img d-flex align-items-center" style="background-image: url(./assets/carousel/images/child-817373.jpg);">
                                            <div class="text col-md-6">
                                                <h3 style="color: whitesmoke;">Have a story to tell?<br> Share Your Inspiring Life Story with iPRIMETIMES!</h3>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="work">
										<div class="img d-flex align-items-center" style="background-image: url(./assets/carousel/images/nature-3046562.jpg);">
											<div class="text  col-md-6">
												<h3 style="color: whitesmoke;">Make a Difference:<br> Share Your Social Impact Initiatives with iPRIMETIMES!</h3>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="work">
										<div class="img d-flex align-items-center" style="background-image: url(./assets/carousel/images/mother.jpg);">
                                        <div class="text  col-md-6">
												<h3 style="color: whitesmoke;">The Art of Relaxation:<br> Spa Days, Massages, and Self-Care</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
                    <?php
                        if(!isset($_SESSION['username'])){
                    ?>                
                            <div class="create-post">
                                <a href="login.php" class="btn btn-primary btn-lg">Create Your Own Post</a>
                            </div>
                    <?php
                        }
                        else{
                    ?>                
                            <div class="create-post">
                                <a href="admin/post.php" class="btn btn-primary btn-lg">Add more Posts</a>
                            </div>
                    <?php
                        }
                    ?>
							<div class="my-5 text-center">
			          <ul class="thumbnail">
			            <li class="active img"><a href="#"><img src="./assets/carousel/images/child-817373.jpg" alt="Image" class="img-fluid"></a></li>
			            <li><a href="#"><img src="./assets/carousel/images/nature-3046562.jpg" alt="Image" class="img-fluid"></a></li>
			            <li><a href="#"><img src="./assets/carousel/images/mother.jpg" alt="Image" class="img-fluid"></a></li>
			          </ul>
			        </div>
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- carousel end -->


<main class="blog-standard">
        <div class="container"> 
            <h1 class="oleez-page-title wow fadeInUp">Blog Standard</h1>
            <div class="row">
            <div class="col-md-8">
        <?php 
                    include "config.php";
                    $limit = 4;
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
                    ORDER BY post.post_id DESC LIMIT $offset , $limit";

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
                            <p class="post-excerpt"><?php  echo substr($row['description'],0,100) . "..."; ?></p>
                            <a href="single.php?id=<?php echo $row['post_id']; ?>" class="post-permalink">READ MORE</a>
                        </article>

<!-- pagination -->

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

<script src="./assets/carousel/js/jquery.min.js"></script>
    <script src="./assets/carousel/js/popper.js"></script>
    <script src="./assets/carousel/js/bootstrap.min.js"></script>
    <script src="./assets/carousel/js/owl.carousel.min.js"></script>
    <script src="./assets/carousel/js/main.js"></script>
