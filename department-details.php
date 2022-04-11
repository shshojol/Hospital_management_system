<?php include 'template/header.php'; ?>
<?php
if(isset($_GET['dept_id']))
{
    $id = $_GET['dept_id'];
}
//single data for menu department
$sql_single_dept = "SELECT * FROM department WHERE id = {$id}";
$result_single_dept = $conn->query($sql_single_dept);


//side MENU for department
$sql_dept_view = "SELECT * FROM department WHERE status = 1 ORDER BY id DESC";
$result_dept_view = $conn->query($sql_dept_view);

//details for doctor
$sql_doc_view = "SELECT * FROM doctor WHERE stauts = 1 ORDER BY id DESC limit 4";
$result_doc_view = $conn->query($sql_doc_view);

//testmonial side message
$sql_msg = "SELECT * FROM message ORDER BY id DESC limit 3";
$result_msg  = $conn->query($sql_msg );
?>
<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase">DEPARTMENT DETAILS</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> DEPARTMENT DETAILS </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Inner Pages Main Section -->
<section class="ulockd-service-details">
    <div class="container">	
        <div class="col-lg-3 ulockd-pdng0">
            <div class="service-widget">
                <h4>BU Medical Services</h4>
                <div class="list-group">
                    <?php
                        if($result_dept_view->num_rows > 0) {
                            while ($rows_of_dept = $result_dept_view->fetch_assoc()) {
                    ?>
                    <?php
                        if($rows_of_dept['id'] == $id)
                        {
                            $active = "active";
                        }else{
                            $active = "";
                        }
                    ?>
                    <a href="department-details.php?dept_id=<?php echo $rows_of_dept['id']; ?>" class="list-group-item <?php echo $active; ?>"><?php echo $rows_of_dept['dept_name']; ?></a>
                    <?php
                        } } else {
                            echo "No Data Found !";
                        }
                    ?>
                </div>
            </div>
            <h4>BU Medical Testimonial</h4>
            <ul class="testimonial-carousel">
                    <?php
                        if($result_msg->num_rows > 0) {
                            while ($rows_msg = $result_msg->fetch_assoc()) {
                    ?>
                <li>
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $rows_msg['name']; ?></h4>
                            <p class="ulockd-tcompliment"><span class="flaticon-straight-quotes text-thm1"></span><?php echo $rows_msg['feedback']; ?><span class="flaticon-blocks-with-angled-cuts"></span></p>
                        </div>
                    </div>	           			
                </li>
                <?php }} ?>
            </ul> 
        </div>

        <?php
            if($result_single_dept->num_rows > 0) {
                while ($rows_single_dept = $result_single_dept->fetch_assoc()) {
        ?>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-12 ulockd-mrgn1210">
                    <div class="ulockd-project-sm-thumb">
                        <img class="img-responsive img-whp" src="admin/upload/department/<?php echo $rows_single_dept['image']; ?>" alt="1.jpg">
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12 ulockd-mrgn1210 clearfix">
                    <div class="ulockd-pd-content">
                        <h3><?php echo $rows_single_dept['dept_name']; ?></h3>
                        <p class="project-dp-one"><?php echo $rows_single_dept['dept_detail']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
            } } else {
                echo "No Data Found !";
            }
        ?>
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

<!-- Our Expert -->
<section class="ulockd-team-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-team-title ulockd-ipage">
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
                        <img style="height:240px" class="img-responsive img-whp" src="admin/upload/doctor/<?php echo $rows_doc['image']; ?>" alt="">
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