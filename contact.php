<?php include 'header.php'; ?>
    <main class="contact-page">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">Contact Us</h1>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0 pr-lg-5 wow fadeInLeft">
                    <div class="embed-responsive embed-responsive-1by1">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10759.495900110083!2d-122.34410726082857!3d47.609140133437705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906ab679235d7d%3A0xae763a82ab1fed6c!2sCentral%20Business%20District%2C%20Seattle%2C%20WA%2C%20USA!5e0!3m2!1sen!2sin!4v1587035152547!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="col-md-6 pl-lg-5 wow fadeInRight">
                    <form action="POST" class="oleez-contact-form">
                        <div class="form-group">
                            <input type="text" class="oleez-input" id="fullName" name="fullName" required>
                            <label for="fullName">*Full name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="oleez-input" id="fullName" name="email" required>
                            <label for="email">*Email</label>
                        </div>
                        <div class="form-group">
                            <label for="message">*Message</label>
                            <textarea name="message" id="message" rows="10" class="oleez-textarea" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit">Send</button>
                    </form>
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
            <input type="search" class="oleez-overlay-search-input" id="search" name="search" placeholder="Search here">
        </form>
    </div>
    <script src="assets/vendors/popper.js/popper.min.js"></script>
    <script src="assets/vendors/wowjs/wow.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendors/slick-carousel/slick.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        new WOW().init();
    </script>