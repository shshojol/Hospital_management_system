<?php include 'template/header.php'; ?>

<?php
    //data for service
    $sql_serv_view = "SELECT * FROM service WHERE status = 1";
    $result_serv_view = $conn->query($sql_serv_view);

    //table for doctor
    $sql_doctor_view = "SELECT d.id,  dep.dept_name AS department, d.name, d.designation, d.image, d.profession, d.edu_background, d.experience, d.address, d.phone, d.email, d.detail, d.stauts, d.created_at
    FROM doctor AS d
    LEFT JOIN department AS dep ON d.dept_id = dep.id WHERE stauts = 1 ORDER BY id DESC limit 4";
    $result_doctor_view = $conn->query($sql_doctor_view);
?>
<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase">ABOUT US</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> ABOUT US </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                        <p><?php echo substr($rows_of_serv['detail'], 0, 120); ?>  <b>..more</b></p>
                                        
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
                <div class="ulockd-dvidr-btn text-uppercase"><a class="btn btn-default ulockd-btn-white hvr-overline-from-center" href="appointment.php">Get Appointment</a></div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team -->
<section class="ulockd-team">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-team-title hvr-float-shadow">
                    <h2 class="text-uppercase">OUR <span class="text-thm1">EXPERT</span></h2>
                    <p>The Expert Medical Opinion program gives you access to widely acclaimed specialists who are picked particularly for you. These specialists give an audit and suggestions about your conclusion and treatment arrange.</p>
                </div>
            </div>
        </div>
        <div class="row">
             <?php
                 if($result_doctor_view->num_rows > 0) {
                    while ($rows_of_doctor = $result_doctor_view->fetch_assoc()) {
             ?>               
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="ulockd-team-member">
                    <div class="ulockd-tm-thumb">
                        <img style="height: 300px;" class="img-responsive img-whp" src="admin/upload/doctor/<?php echo $rows_of_doctor['image']; ?>" alt="team1.jpg">
                        <div class="ulockd-tm-overlay"><a href="team.php" title="Team Details"><span class="flaticon-unlink"></span></a></div>
                    </div>
                    <div class="ulockd-tm-details">
                        <div class="ulockd-tm-name"><?php echo $rows_of_doctor['name']; ?></div>
                        <div class="ulockd-tm-post">- <?php echo $rows_of_doctor['department']; ?></div>
                        <p><?php echo $rows_of_doctor['detail']; ?></p>
                        <ul class="list-inline social-linked">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="mailto:name@email.com"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
                } } else {
                    echo "No Data Found !";
                }
            ?>   
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>