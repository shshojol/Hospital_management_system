<?php include 'template/header.php'; ?>
<?php
    $sql_staff_view = "SELECT d.id,  dep.dept_name AS department, d.name, d.designation, d.image, d.profession, d.edu_background, d.joining_date, d.address, d.phone, d.email, d.nid, d.stauts, d.created_at
    FROM stuff AS d
    LEFT JOIN department AS dep ON d.dept_id = dep.id WHERE stauts = 1";
    $result_staff_view = $conn->query($sql_staff_view);

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
                    <h1 class="text-uppercase">STUFF DETAILS</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> STUFF DETAILS </a> </li>
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
                    <h2 class="text-uppercase">OUR EXPERT STUFF</span></h2>
                    <p>Medicinal Service Company puts stock in conveying the most elevated quality administration with quality and sympathy every day.</p>
                </div>
            </div>
        </div>
       


<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" style="width: 95%; margin-left: 50px ">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Profession</th>
                            <th >Education</th>
                            <th >Joining Date</th>
                            <th >Phone</th>
                            <th >Email</th>
                            <th >Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result_staff_view->num_rows > 0) {
                                while ($rows_of_staff = $result_staff_view->fetch_assoc()) {
                        ?>
                         <tr>
                            <td ><img style="height: 80px; width: 100px;" src="admin/upload/staff/<?php echo $rows_of_staff['image']; ?>" /></td>
                            <td ><?php echo $rows_of_staff['name']; ?></td>
                            <td ><?php echo $rows_of_staff['designation']; ?></td>
                            <td ><?php echo $rows_of_staff['profession']; ?></td>
                            <td ><?php echo $rows_of_staff['edu_background']; ?></td>
                            <td ><?php echo $rows_of_staff['joining_date']; ?></td>
                            <td ><?php echo $rows_of_staff['phone']; ?></td>
                            <td ><?php echo $rows_of_staff['email']; ?></td>
                            <td ><?php echo $rows_of_staff['department']; ?></td>
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