<?php 
include 'template/header.php'; 

//details for doctor
$sql_doc_view = "SELECT * FROM doctor WHERE stauts = 1 ORDER BY id DESC";
$result_doc_view = $conn->query($sql_doc_view);

?>

<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase">TEAM</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> TEAM </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Expert -->
<section class="ulockd-team-one">
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
            if($result_doc_view->num_rows > 0) {
                while ($rows_doc = $result_doc_view->fetch_assoc()) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="ulockd-team-two-member">
                    <div class="ulockd-tm-thumb">
                        <img style="height:240px" class="img-responsive img-whp" src="admin/upload/doctor/<?php echo $rows_doc['image']; ?>" alt="8.jpg">
                        <div class="ulockd-team-two-mdetails">
                            <div class="ulockd-tm-name"><?php echo $rows_doc['name']; ?></div>
                            <div class="ulockd-tm-post">- <?php echo $rows_doc['profession']; ?></div>
                            <ul class="list-inline ulockd-tm-sicon ulockd-bgthm">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                            <ul class="list-unstyled ulockd-tm-fpm ulockd-bgthm">
                                <li><?php echo $rows_doc['phone']; ?></li>
                                <li><?php echo $rows_doc['email']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php }} ?>
        </div>
    </div>
</section>




<?php include 'template/footer.php'; ?>