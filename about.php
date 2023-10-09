
<?php include 'header.php'; ?>
    <main class="about-page">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">About Us</h1>
            <p class="oleez-page-header-content wow fadeInUp"> A vibrant platform empowering bloggers, fostering content quality, and cultivating a supportive, diverse, and creative community.</p>
            <img src="assets/images/about@2x.jpg" alt="about" class="w-100 wow fadeInUp">
            <section class="oleez-about-features">
                <div class="row">
                    <div class="col-md-4 mb-5 mb-md-0 feature-card wow fadeInUp">
                        <h5 class="feature-card-title">Story</h4>
                        <p class="feature-card-content">The story began with our founder, who embarked on his own blogging journey. He quickly realized the incredible power of connecting with like-minded individuals through the written word.</p>
                        <p class="feature-card-content">Today, we're a global platform serving thousands of bloggers. Through challenges and milestones, our commitment to a vibrant blogging community remains unwavering.</p>
                    </div>
                    <div class="col-md-4 mb-5 mb-md-0 feature-card wow fadeInUp">
                        <h5 class="feature-card-title">Mission</h4>
                        <p class="feature-card-content">At iPrimeTimes.social, our mission is simple yet profound: we aim to empower individuals to share their voices, stories, and ideas with the world. We firmly believe that every person possesses a unique perspective worth sharing, and our platform is designed to provide the perfect stage for creativity and expression to flourish. </p>
                    </div>
                    <div class="col-md-4 mb-5 mb-md-0 feature-card wow fadeInUp">
                        <h5 class="feature-card-title">Value</h4>
                        <p class="feature-card-content">Our core belief is that everyone should have the tools and opportunities to amplify their voices and make a meaningful impact through their writing.</p>
                        <p class="feature-card-content">We're committed to upholding the highest standards of content quality. We encourage bloggers to continuously improve their craft, ensuring that our platform is home to exceptional content.</p>
                    </div>
                </div>
            </section>
            <section class="oleez-what-we-do">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h2 class="section-title wow fadeInUp">What we do</h2>
                        <h4 class="section-subtitle wow fadeInUp">Empowering bloggers, fostering content, and nurturing community.</h4>
                        <div class="row">
                            <div class="col-md-4 mb-5 mb-md-0 wow fadeInUp">
                                <h5 class="what-we-do-list-title">Empowering Bloggers:</h5>
                                <ul class="what-we-do-list">
                                    <li>We empower bloggers of all backgrounds to express themselves freely. Whether you're a seasoned writer or just starting, our platform offers the tools and resources you need to succeed.</li>
                                </ul>
                            </div>
                            <div class="col-md-4 mb-5 mb-md-0 wow fadeInUp">
                                <h5 class="what-we-do-list-title">Innovating for the Future:</h5>
                                <ul class="what-we-do-list">
                                    <li>We're committed to staying at the forefront of blogging technology. Our team is constantly working on innovative features and tools to help you reach new heights in your blogging journey.</li>
                                </ul>
                            </div>
                            <div class="col-md-4 mb-5 mb-md-0 wow fadeInUp">
                                <h5 class="what-we-do-list-title">Providing Resources:</h5>
                                <ul class="what-we-do-list">
                                    <li>We offer a wealth of resources, from writing tips to marketing strategies, to assist bloggers in every aspect of their journey.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-10 mt-5 mb-5 mb-md-0 wow fadeInUp">
                                <h4 style="color: red;" class="what-we-do-list-title">Note:</h4>
                                <ul class="what-we-do-list">
                                    <li>Currently, iPrimeTimes.social is undergoing maintenance and development to enhance your user experience. We appreciate your patience during this time. Our team is working diligently to bring you an even better blogging platform.</li>
                                </ul>
                            </div>
                    </div>
                </div>
            </section>
            <section class="oleez-about-work-with-us wow fadeInUp">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h2 class="section-title">Get in Touch:</h2>
                        <p class="">Have questions, suggestions, or just want to say hello? We'd love to hear from you! Feel free to contact us anytime.</p>
                        <a href="contact.php" class="btn work-with-us-btn">Contact</a>
                        <p class="mt-3 section-subtitle">Thank you for being part of the iprimetimes.social journey!</p>
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
