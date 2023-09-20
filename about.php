
<?php include 'header.php'; ?>
    <main class="about-page">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">About Us</h1>
            <p class="oleez-page-header-content wow fadeInUp">A design and development agency based in London. We create digital products that make people’s lives easier.</p>
            <img src="assets/images/about@2x.jpg" alt="about" class="w-100 wow fadeInUp">
            <section class="oleez-about-features">
                <div class="row">
                    <div class="col-md-4 mb-5 mb-md-0 feature-card wow fadeInUp">
                        <h5 class="feature-card-title">Story</h4>
                        <p class="feature-card-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, </p>
                    </div>
                    <div class="col-md-4 mb-5 mb-md-0 feature-card wow fadeInUp">
                        <h5 class="feature-card-title">Mission</h4>
                        <p class="feature-card-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, </p>
                    </div>
                    <div class="col-md-4 mb-5 mb-md-0 feature-card wow fadeInUp">
                        <h5 class="feature-card-title">Value</h4>
                        <p class="feature-card-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, </p>
                    </div>
                </div>
            </section>
            <section class="oleez-what-we-do">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h2 class="section-title wow fadeInUp">What we do</h2>
                        <h4 class="section-subtitle wow fadeInUp">We design thoughtful digital experiences & beautiful brand aesthetics.</h4>
                        <div class="row">
                            <div class="col-md-4 mb-5 mb-md-0 wow fadeInUp">
                                <h5 class="what-we-do-list-title">Market Research</h5>
                                <ul class="what-we-do-list">
                                    <li>Websites</li>
                                    <li>Mobile Applications</li>
                                    <li>Prototyping</li>
                                    <li>Server Administration</li>
                                    <li>Network Solutions</li>
                                    <li>Databases</li>
                                </ul>
                            </div>
                            <div class="col-md-4 mb-5 mb-md-0 wow fadeInUp">
                                <h5 class="what-we-do-list-title">Design & Creative</h5>
                                <ul class="what-we-do-list">
                                    <li>Web Design</li>
                                    <li>Motion Production</li>
                                    <li>User Experience</li>
                                    <li>Illustration</li>
                                    <li>Content Management</li>
                                </ul>
                            </div>
                            <div class="col-md-4 mb-5 mb-md-0 wow fadeInUp">
                                <h5 class="what-we-do-list-title">WordPress</h5>
                                <ul class="what-we-do-list">
                                    <li>Websites</li>
                                    <li>Mobile Applications</li>
                                    <li>Prototyping</li>
                                    <li>Server Administration</li>
                                    <li>Network Solutions</li>
                                    <li>Databases</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="oleez-about-work-with-us wow fadeInUp">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h2 class="section-title">We design thoughtful digital experiences & beautiful brand aesthetics.</h2>
                        <p class="section-subtitle">Would you like us to <a href="#!">work</a>  on your brand identity? We would be happy to <a href="#!">help</a>.</p>
                        <a href="#!" class="btn work-with-us-btn">Work with us</a>
                    </div>
                </div>
            </section>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>

    <!-- Full screen search box -->
    <div id="searchModal" class="search-modal">
        <button type="button" class="close" aria-label="Close" data-dismiss="searchModal">
            <span aria-hidden="true">&times;</span>
        </button>
        <form action="index.html" method="get" class="oleez-overlay-search-form">
            <label for="search" class="sr-only">Search</label>
            <input type="search" class="oleez-overlay-search-input" id="search" name="search" placeholder="Search here">
        </form>
    </div>
</body>
<script src="assets/vendors/popper.js/popper.min.js"></script>
<script src="assets/vendors/wowjs/wow.min.js"></script>
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/vendors/slick-carousel/slick.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    new WOW().init();
</script>
