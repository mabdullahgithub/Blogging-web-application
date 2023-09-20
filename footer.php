<footer class="oleez-footer">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-md-6">
                        <img style="height: 150px; margin-top: -90px;" src="assets/images/logo_1.svg" alt="oleez" class="footer-logo">
                        <p class="footer-intro-text">Don't be shy, get in touch with us and create the world again!</p>
                        <nav class="footer-social-links">
                            <a href="#!">Facebook</a>
                            <a href="#!">Twitter</a>
                            <a href="#!">LinkedIn</a>
                            <a href="#!">Instagram</a>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">PHONE</h6>
                                <p class="widget-content">+92 311 5904288</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">ENQUIRUES</h6>
                                <p class="widget-content">iprimetimes@gmail.com</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">ADDRESS</h6>
                                <p class="widget-content">New Garden Town tipu-block 33 <br> Lahore, Pakitan</p>
                            </div>
                            <div class="col-md-6 footer-widget-text">
                                <h6 class="widget-title">WORK HOURS</h6>
                                <p class="widget-content">saturday: 09:00 - 18:00 <br> Sunday: 11:00 - 17:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                    include "config.php";
                    $sql = "SELECT footerdesc FROM setting";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
            <div class="footer-text">
                <?php echo $row['footerdesc']; ?>
            </div>
        </div>
    </footer>
</body>
</html>
