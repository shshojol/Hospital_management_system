<?php include 'template/header.php'; ?>
<?php
    //data for department
    $sql_dept_view = "SELECT * FROM department WHERE status = 1";
    $result_dept_view = $conn->query($sql_dept_view);

    //data for service
    $sql_serv_view = "SELECT * FROM service WHERE status = 1";
    $result_serv_view = $conn->query($sql_serv_view);

    //data for notice
    $sql_notice = "SELECT * FROM notice WHERE status = 1 ORDER BY id DESC limit 2";
    $result_notice = mysqli_query($conn, $sql_notice);

?>
<!-- Home Design -->
<div class="ulockd-home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ulockd-pmz">
                <div class="ulockd-main-slider">
                    <div class="item">
                        <div class="caption style1 text-left">
                            <div class="ulockd-slider-text1 wow fadeInUp" data-wow-duration="300ms" data-wow-delay=".3s">Welcome To <span class="text-thm1">BU Medical</span></div>
                            <div class="ulockd-slider-text2 wow fadeInUp" data-wow-duration="600ms" data-wow-delay=".6s">Your Health Care <span class="text-thm1"> Center</span></div>
                            <div class="ulockd-slider-text3 wow fadeInUp" data-wow-duration="900ms" data-wow-delay=".9s">
                                <p>BU Medical Health Care System has gladly served Ector County and the encompassing 21 regions of the Permian Basin for more than 35 years</p>
                            </div>
                            <a href="appointment.php" class="btn btn-lg ulockd-btn-thm ulockd-home-btn wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="1.2s"><span> Get An Appointment</span></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="caption style2 text-center">
                            <div class="ulockd-slider-text1 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay=".1.5s">Best Health Care Service</div>
                            <div class="ulockd-slider-text2 wow fadeInUp" data-wow-duration="1800ms" data-wow-delay="1.8s">Your Satisfaction Our<span class="text-thm1"> Goal </span></div>
                            <div class="ulockd-slider-text3 wow fadeInUp" data-wow-duration="2100ms" data-wow-delay="2.1s">
                                <p>Medical Services provides routine and urgent medical care, travel medicine, sexual health services, gynecological and confidential HIV testing</p>
                            </div>
                            <a href="appointment.php" class="btn btn-lg ulockd-btn-thm ulockd-home-btn wow fadeInUp" data-wow-duration="2400ms" data-wow-delay="2.4s"><span> Get An Appointment</span></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="caption style3 text-right">
                            <div class="ulockd-slider-text1 wow fadeInRight" data-wow-duration="2700ms" data-wow-delay="2.7s">Health Care Service</div>
                            <div class="ulockd-slider-text2 wow fadeInRight" data-wow-duration="3000ms" data-wow-delay="3s">Best Service From<span class="text-thm1"> Us</span></div>
                            <div class="ulockd-slider-text3 wow fadeInRight" data-wow-duration="3300ms" data-wow-delay="3.3s">
                                <p>Medical Services provides routine and urgent medical care, travel medicine, sexual health services, gynecological and confidential HIV testing</p>
                            </div>
                            <a href="appointment.php" class="btn btn-lg ulockd-btn-thm ulockd-home-btn wow fadeInRight" data-wow-duration="3600ms" data-wow-delay="3.6s"><span> Get An Appointment</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Services -->
<section class="ulockd-service">
    <div class="container">
        <div class="row text-center">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="ulockd-service-box">
                    <a class="icon" href="#"><span class="flaticon-credit-card"></span></a>
                    <h3 class="title">Online Payment</h3>
                    <p>You can pay with Electronic Fund Transfers System (EFT).</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="ulockd-service-box"> 
                    <a class="icon" href="#"><span class="flaticon-24-hours-phone-assistance-service"></span></a>
                    <h3 class="title">24hour Online Help</h3>
                    <p>You Can Call Our Medical Help Line 24 hours a day, In a Week.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="ulockd-service-box"> 
                    <a class="icon" href="#"><span class="flaticon-transport"></span></a>
                    <h3 class="title">Emergency</h3>
                    <p>Hi and welcome we are ready for emergency vehicle administrations and Medical Services.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our About -->
<section class="ulockd-about-one">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="ulockd-about-thumb">
                    <div class="ulockd-at-slider">
                        <div class="item">
                            <img class="img-responsive img-whp" src="images/about/1.jpg" alt="1.jpg">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-whp" src="images/about/2.jpg" alt="2.jpg">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-whp" src="images/about/3.jpg" alt="3.jpg">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-whp" src="images/about/4.jpg" alt="4.jpg">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-whp" src="images/about/5.jpg" alt="5.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 col-lg-offset-1 ulockd-abtonspc">
                <div class="ulockd-about-detail">
                    <h2>About Our <span class="text-thm1"> BU Medical</span></h2>
                    <p>we additionally paintings very closely with our community healthcare group who provide antenatal, postnatal and nursing services and different specialist provision inclusive of the quitters scheme.</p>
                    <p class="ulockd-abt-ondtls-para">This 24 month benefit covers all ranges of basic upkeep. Notwithstanding every one of the things included on the Full administration we cover things that are frequently suggested for substitution like clockwork.</p>
                    <p>BU Medial, one of the most reputed and leading healthcare chains in eastern Bangladesh today, has built and managed a number of multispecialty and superspecialty healthcare facilities across the region over the past few years.</p>
                    <a href="#" class="btn btn-lg ulockd-btn-thm"><span> Read More</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Service -->
<section class="ulockd-service-two parallax" data-stellar-background-ratio="0.3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 text-center">
                            <div class="ulockd-srvc-title hvr-float-shadow">
                                <h2 class="text-uppercase">Awesome <span class="text-thm1">Services</span></h2>
                                <p>Medicinal Service Company puts stock in conveying the most elevated quality administration with quality and sympathy every day.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            if($result_serv_view->num_rows > 0) {
                                while ($rows_of_serv = $result_serv_view->fetch_assoc()) {
                        ?>
                        <a href="service_details.php?service_id=<?php echo $rows_of_serv['id']; ?>"> 
                            <div class="col-xs-12 col-sm-6 col-md-4 hvr-underline-from-center">
                                <div class="ulockd-srvc-column">
                                    <div class=" pull-left"><span class=""><img style='hight:1000px; width:60px' src="admin/upload/service/<?php echo $rows_of_serv['image']; ?>"/></span></div>
                                    <div class="ulockd-srvc-details">
                                        <h3><?php echo $rows_of_serv['title']; ?></h3>
                                        <p><?php echo substr($rows_of_serv['detail'], 0, 120); ?> <b>..more</b></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                            } } else {
                                echo "No Data Found !";
                            }
                        ?>
                    </div>
                </div>
</section>

<!-- Our First Divider -->
<section class="ulockd-frst-divider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="ulockd-dvidr-mttl">We Offer Quality Full and Affordable Service For You.</h2>
                <div class="ulockd-dvidr-btn text-uppercase"><a class="btn btn-default ulockd-btn-white hvr-overline-from-center" href="appointment.php">Get An Appointment</a></div>
            </div>
        </div>
    </div>
</section>

<!-- Our Department -->
<section class="ulockd-department">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-dtitle hvr-float-shadow">
                    <h2 class="text-uppercase">Our Spcial <span class="text-thm1">Department</span></h2>
                    <p>BU Medical Department is responsible for Medical and Health Care that can helpful threir pataint, and all of humanbing.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
                 if($result_dept_view->num_rows > 0) {
                    while ($rows_of_dept = $result_dept_view->fetch_assoc()) {
            ?>
            <a href="department-details.php?dept_id=<?php echo $rows_of_dept['id']; ?>">
                <div class="col-sm-6 col-md-4 col-l4">
                    <div class="ulockd-department-box hvr-grow-shadow">
                        <div class="db-thumb">
                            <img class="img-responsive img-whp" src="admin/upload/department/<?php echo $rows_of_dept['image']; ?>" alt="3.jpg">
                            <div class="db-overlayer"><span title="Department Icon" class="flaticon-people-9"></span></div>
                        </div>
                        <div class="db-details">
                            <h4><?php echo $rows_of_dept['dept_name']; ?></h4>
                            <p><?php echo substr($rows_of_dept['dept_detail'], 0, 80); ?><a class="text-thm1" href="page-department-details-2.html"></a></p>
                        </div>
                    </div>
                </div>
            </a>
            <?php
                } } else {
                     echo "No Data Found !";
                }
            ?>
        </div>
    </div>
</section>

<!-- Notice -->
<section class="ulockd-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-blog-title hvr-float-shadow">
                    <span class="ulockd-blog-hdr-icon flaticon-factory"></span>
                    <h2 class="text-uppercase">LATEST <span class="text-thm1">NEWS</span></h2>
                    <p>Medicinal Service Company puts stock in conveying the most elevated quality administration with quality and sympathy every day.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                while($row_notice = mysqli_fetch_assoc($result_notice)){
            ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-lg-offset-1">
                <article class="ulockd-blog-post style1 hvr-float-shadow">
                   
                    <div class="ulockd-bp-details">
                        <div class="ulockd-bp-title"><h3><?php echo substr($row_notice['title'], 0, 50); ?></h3></div>
                        <ul class="list-inline">
                            <li>Date: <?php echo $row_notice['date_of_post']; ?></li>
                        </ul>
                        <div class="ulockd-bpost">
                            <p><?php echo substr($row_notice['detail'], 0, 200); ?><a class="ulockd-bp-btn" href="single_notice.php?notice_id=<?php echo $row_notice['id']; ?>">  .....Read More...</a></p>
                        </div>
                    </div>
                </article>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>