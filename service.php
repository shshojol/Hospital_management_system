<?php include 'template/header.php'; ?>
<?php
        //data for service
        $sql_serv_view = "SELECT * FROM service WHERE status = 1";
        $result_serv_view = $conn->query($sql_serv_view);
?>
<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase">SERVICE</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> SERVICE </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                        <div class="col-xs-12 col-sm-6 col-md-4 hvr-underline-from-center">
                            <div class="ulockd-srvc-column">
                                <div class=" pull-left"><span class=""><img style='hight:1000px; width:60px' src="admin/upload/service/<?php echo $rows_of_serv['image']; ?>"/></span></div>
                                <div class="ulockd-srvc-details">
                                    <h3><?php echo $rows_of_serv['title']; ?></h3>
                                    <p><?php echo substr($rows_of_serv['detail'], 0, 120); ?><a href="service_details.php?service_id=<?php echo $rows_of_serv['id']; ?>">  <b>..more</b></a></p>
                                    
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