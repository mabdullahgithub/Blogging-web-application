<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    include "config.php";
                    $sql = "SELECT footerdesc FROM setting";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <div id="content">
                    <?php echo $row['footerdesc']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>