<?php
//table for recent notice
$sql_notice_rec = "SELECT * FROM notice WHERE status = 1 ORDER BY id DESC limit 2";
$result_notice_rec = mysqli_query($conn, $sql_notice_rec);

//image for footer galary
$sql_gallery_view = "SELECT * FROM gallery ORDER BY id DESC limit 9";
$result_gallery_view = $conn->query($sql_gallery_view);
?>
<!-- Our Footer -->
<section class="ulockd-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="ulockd-footer-widget">
                    <img alt="" src="images/header-logo.png" class="img-responsive ulockd-footer-log">
                    <p class="ulockd-ftr-text">BU Medical is the Rockies is a 710-bed local medicinal focus in Loveland, Colo. with a full range of administrations and spend significant time in heart and injury mind.</p>
                </div>
                <div class="ulockd-footer-newsletter">
                    <h4 class="title text-uppercase">News Letter</h4>
                    <form class="ulockd-mailchimp">
                        <div class="input-group">
                            <input type="email" class="form-control input-md" placeholder="Your email" name="EMAIL" value="">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-md"><i class="icon flaticon-right-arrow"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="ulockd-footer-lnews">
                    <h3 class="text-uppercase">Latest Ne<span class="text-thm1">ws</span></h3>
                    <div class="ulockd-media-box">
                        <?php
                            if($result_notice_rec->num_rows > 0) {
                                while ($rows_notice_rec = $result_notice_rec->fetch_assoc()) {
                        ?> 
                        <div class="media">                          
                            <div class="media-body">
                                <a href="#" class="post-date"><?php echo $rows_notice_rec['date_of_post']; ?></a>
                                <h4 class="media-heading"><?php echo substr($rows_notice_rec['title'], 0, 20); ?></h4>
                                <p><?php echo substr($rows_notice_rec['detail'], 0, 80); ?><a href="single_notice.php?notice_id=<?php echo $rows_notice_rec['id']; ?>"> ...Read More</a></p>
                                
                            </div>
                        </div>
                        <?php }} ?>                
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                <div class="ulockd-footer-qlink">
                    <h3 class="text-uppercase">NAVIGATI<span class="text-thm1">ON</span></h3>
                    <ul class="list-unstyled">
                        <li> <span class="flaticon-checked-mark text-thm1"></span> <a href="about.php"> About Us</a></li>
                        <li> <span class="flaticon-checked-mark text-thm1"></span> <a href="appoinment.php"> Appointment</a></li>
                        <li> <span class="flaticon-checked-mark text-thm1"></span> <a href="department.php"> Department</a></li>
                        <li> <span class="flaticon-checked-mark text-thm1"></span> <a href="service.php"> Our Services</a></li>
                        <li> <span class="flaticon-checked-mark text-thm1"></span> <a href="career.php"> Career</a></li>
                        <li> <span class="flaticon-checked-mark text-thm1"></span> <a href="team.php"> Team Details</a></li>
                        <li> <span class="flaticon-checked-mark text-thm1"></span> <a href="contact.php"> Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
                <div class="flickr-widget">
                    <h3 class="text-uppercase">Flickr Fe<span class="text-thm1">ed</span></h3>
                    <ul class="list-inline">
                        <?php
                            while($row_gallery = mysqli_fetch_assoc($result_gallery_view)){
                        ?>
                        <li>
                            <div class="thumb">
                                <img alt="" class="img-responsive" style="width:80px; height:50px" src="admin/upload/gallery/<?php echo $row_gallery['image']; ?>">
                                <div class="overlay">
                                    <span class="flaticon-add"></span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>				
            </div>
        </div>
    </div>
</section>

<!-- Our CopyRight Section -->
<section class="ulockd-copy-right">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright © BU Medical, All right reserved.</p>
            </div>
        </div>
    </div>
</section>

<a class="scrollToHome" href="#"><i class="fa fa-home"></i></a>
</div>
<!-- Wrapper End -->
<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootsnav.js"></script>
<script type="text/javascript" src="js/parallax.js"></script>
<script type="text/javascript" src="js/scrollto.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="js/jquery.counterup.js"></script>
<script type="text/javascript" src="js/gallery.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/video-player.js"></script>
<script type="text/javascript" src="js/jquery.barfiller.js"></script>
<script type="text/javascript" src="js/timepicker.js"></script>
<script type="text/javascript" src="js/tweetie.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="vendor/s-customizer/js/color-switcher.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script>
    $('.nav-tabs-dropdown').each(function (i, elm) {
        $(elm).text($(elm).next('ul').find('li.active a').text());
    });
    $('.nav-tabs-dropdown').on('click', function (e) {
        e.preventDefault();
        $(e.target).toggleClass('close').next('ul').slideToggle();
    });
</script>
        
</body>
</html>