<?php 
include 'template/header.php'; 

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
                    <h1 class="text-uppercase">DOCTOR DETAILS</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> DOCTOR DETAILS </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ulockd-team-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-team-title hvr-float-shadow">
                    <div class="ulockd-title-icon"><span class="flaticon-steering-wheel-1"></span></div>
                    <h2 class="text-uppercase">OUR EXPERT DOCTOR</span></h2>
                    <p>Medicinal Service Company puts stock in conveying the most elevated quality administration with quality and sympathy every day.</p>
                </div>
            </div>
        </div>
       

<?php
    $sql_doctor_view = "SELECT d.id,  dep.dept_name AS department, d.name, d.designation, d.image, d.profession, d.edu_background, d.experience, d.address, d.phone, d.email, d.detail
    FROM doctor AS d
    LEFT JOIN department AS dep ON d.dept_id = dep.id WHERE stauts = 1";
    $result_doctor_view = $conn->query($sql_doctor_view);
?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" style="width: 95%; margin-left: 50px ">
                    <thead>
                        <tr>
                            <th style="">Image</th>
                            <th style="">Name</th>
                            <th style="">Profession</th>
                            <th style="">Education</th>
                            <th style="">Experience</th>
                            <th style="">Phone</th>
                           
                            <th style="">Department</th>
                            <th style="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result_doctor_view->num_rows > 0) {
                                while ($rows_of_doctor = $result_doctor_view->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style=""><img style="height: 80px; width: 100px;" src="admin/upload/doctor/<?php echo $rows_of_doctor['image']; ?>" /></td>
                            <td style=""><?php echo $rows_of_doctor['name']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['profession']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['edu_background']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['experience']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['phone']; ?></td>
                           
                            <td style=""><?php echo $rows_of_doctor['department']; ?></td>
                            <td style="width:20px;">
                                <a href="appointment.php?doc_id=<?php echo $rows_of_doctor['id']; ?>" class="btn btn-md btn-warning"><i class="fa fa-pencil-alt"></i>Appointment </a>
                                
                            </td>
                        </tr>
                        <?php
                            } } else {
                                echo "No Data Found !";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


        <div class="row ulockd-mrgn1260">
            <div class="col-lg-4">
                <h3>Video Testimonial</h3>
                <ul class="list-unstyled">
                    <li>
                        <iframe width="100%" height="195px" src="https://www.youtube.com/embed/bMI418j3a-8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h3>BU Medical Testimonial</h3>
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
            <div class="col-lg-4">
                <h3>Video Testimonial</h3>
                <ul class="list-unstyled">
                    <li>
                        <iframe width="100%" height="195px" src="https://www.youtube.com/embed/_qmNCJxpsr0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>