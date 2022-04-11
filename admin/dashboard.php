<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<?php include 'template/header.php'; ?>
<?php
    
    $sql_appoinment_view = "SELECT app.id, app.name, app.email, app.date_of_meet, app.phone, app.massage, app.created_at, doc.name as doctor
    FROM appointment as app
    LEFT JOIN doctor as doc on app.doctor_id = doc.id WHERE DATE_FORMAT(app.date_of_meet, '%Y-%m-%d') = CURDATE() ORDER BY app.date_of_meet";
    $result_appoinment_view = $conn->query($sql_appoinment_view);

    //show notice
    $sql_notice = "SELECT * FROM notice ORDER BY id DESC limit 5";
    $table_notice = mysqli_query($conn, $sql_notice);
    
    //show message
    $sql_msg = "SELECT * FROM message ORDER BY id DESC limit 5";
    $table_msg = mysqli_query($conn, $sql_msg);

    //show job post
    $sql_job_view = "SELECT * FROM job_post ORDER BY id DESC LIMIT 5";
    $result_job_view = $conn->query($sql_job_view);
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>
                            <?php
                                //count doctor
                                $sql_doctor = "SELECT * FROM doctor WHERE stauts = 1";
                                $table_doctor = mysqli_query($conn, $sql_doctor);
                                echo mysqli_num_rows($table_doctor);
                            ?>
                        </h3>
                        <span class="widget-title1">Doctor <i class="fa fa-check" aria-hidden="true" style="margin-top: 5px;"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg2"><i class="fab fa-servicestack"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>
                            <?php
                                //count service
                                $sql_service = "SELECT * FROM service";
                                $table_service = mysqli_query($conn, $sql_service);
                                echo mysqli_num_rows($table_service);
                            ?>
                        </h3>
                        <span class="widget-title2">Service <i class="fa fa-check" aria-hidden="true" style="margin-top: 5px;"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg3"><i class="fas fa-bezier-curve" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>
                            <?php
                                //count department
                                $sql_dept = "SELECT * FROM department";
                                $table_dept  = mysqli_query($conn, $sql_dept );
                                echo mysqli_num_rows($table_dept );
                            ?>
                        </h3>
                        <span class="widget-title3">Department <i class="fa fa-check" aria-hidden="true" style="margin-top: 5px;"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg4"><i class="fas fa-staff" aria-hidden="true" ></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>
                            <?php
                                //count stuff
                                $sql_stuff = "SELECT * FROM stuff";
                                $table_stuff  = mysqli_query($conn, $sql_stuff);
                                echo mysqli_num_rows($table_stuff );
                            ?>
                        </h3>
                        <span class="widget-title4">Stuff <i class="fa fa-check" aria-hidden="true" style="margin-top: 5px;"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg5"><i class="fas fa-newspaper" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>
                            <?php
                                //count notoce
                                $sql_notice_count = "SELECT * FROM notice";
                                $table_notice_count  = mysqli_query($conn, $sql_notice_count );
                                echo mysqli_num_rows($table_notice_count );
                            ?>
                        </h3>
                        <span class="widget-title5">Notice <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg6"><i class="fas fa-blog" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>
                            <?php
                                //count job post
                                $sql_job_post = "SELECT * FROM job_post";
                                $table_job_post  = mysqli_query($conn, $sql_job_post);
                                echo mysqli_num_rows($table_job_post );
                            ?>
                        </h3>
                        <span class="widget-title6">Job Post <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg7"><i class="fas fa-file" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>
                            <?php
                                //count job application
                                $sql_job_application = "SELECT * FROM application";
                                $table_job_application  = mysqli_query($conn, $sql_job_application);
                                echo mysqli_num_rows($table_job_application );
                            ?>
                        </h3>
                        <span class="widget-title7">Job application<i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg8"><i class="fas fa-inbox" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>
                            <?php
                                //count message
                                $sql_msg = "SELECT * FROM message";
                                $table_msg  = mysqli_query($conn, $sql_msg );
                                echo mysqli_num_rows($table_msg );
                            ?>
                        </h3>
                        <span class="widget-title8">Message <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="view_appoinment.php" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="d-none">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Date</th>
                                        <th>Timing</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($result_appoinment_view->num_rows > 0) {
                                            while ($rows_of_appoinment = $result_appoinment_view->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="#">B</a>
                                            <h2><a href="#"><?php echo $rows_of_appoinment['name']; ?></a></h2>
                                        </td>                 
                                        <td>
                                            <h5 class="time-title p-0">Appointment With</h5>
                                            <p><?php echo $rows_of_appoinment['doctor']; ?></p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Date</h5>
                                            <p><?php 
                                                $date = $rows_of_appoinment['date_of_meet'];
                                                $d = strtotime($date);
                                                echo date("d M Y", $d);
                                             ?></p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Timing</h5>
                                            <p><?php 
                                                $time = $rows_of_appoinment['date_of_meet']; 
                                                $t = strtotime($time);
                                                echo date("h:i:sa", $t);
                                            ?></p>
                                        </td>
                                       
                                    </tr>
                                <?php } }else{ echo 'No Appointment Today'; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card member-panel">
                    <div class="card-header bg-white">
                        <h4 class="card-title mb-0">Doctors</h4>
                    </div>
                    <div class="card-body">
                        <ul class="contact-list">
                            <?php
                                $sql1 = "select * from doctor";
                                $table1 = mysqli_query($conn, $sql1);
                                while($row1 = mysqli_fetch_assoc($table1)){
                            ?>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="John Doe"><img src="upload/doctor/<?php echo $row1['image']; ?>" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis"><?php echo $row1['name']; ?></span>
                                        <span class="contact-date"><?php echo $row1['edu_background']; ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php } ?> 
                        </ul>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <a href="view_doctor.php" class="text-muted">View all Doctors</a>
                    </div>
                </div>
            </div>
        </div>

        <!--SHOW NOTICE-->                            
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">New Notice </h4> <a href="view_notice.php" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table mb-0 new-patient-table">
                                <tbody>
                                <?php
                                    if(mysqli_num_rows($table_notice) > 0 ){
                                    while($row_notice = mysqli_fetch_assoc($table_notice)){
                                ?>
                                    <tr>
                                        <td><?php echo substr($row_notice['title'],0,50); ?></td>
                                        <td><?php echo substr($row_notice['detail'], 0,50); ?></td>
                                        <td><?php echo $row_notice['date_of_post']; ?></td>
                                    </tr>
                                <?php }}?>
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--END NOTICE-->  

         
            
        
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">New Message </h4> <a href="view_message.php" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table mb-0 new-patient-table">
                                <tbody>
                                <?php
                                    if(mysqli_num_rows($table_msg) > 0 ){
                                    while($row_msg = mysqli_fetch_assoc($table_msg)){
                                ?>
                                    <tr>
                                        <td><?php echo $row_msg['name']; ?></td>
                                        <td><?php echo $row_msg['email']; ?></td>
                                        <td><?php echo $row_msg['phone']; ?></td>
                                        <td><?php echo substr($row_msg['feedback'],0,50); ?></td>
                                        <td><?php echo $row_msg['created_at']; ?></td>
                                    </tr>
                                <?php }}?>
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">New job post </h4> <a href="view_job.php" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table mb-0 new-patient-table">
                                <tbody>
                                <?php
                                    if(mysqli_num_rows($result_job_view) > 0 ){
                                    while($row_job = mysqli_fetch_assoc($result_job_view)){
                                ?>
                                    <tr>
                                        <td><?php echo $row_job['title']; ?></td>
                                        <td><?php echo $row_job['job_nature']; ?></td>
                                        <td><?php echo $row_job['experience']; ?></td>
                                        <td><?php echo $row_job['application_deadline']; ?></td>
                                    </tr>
                                <?php }}?>
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
  
</div>
<?php include 'template/footer.php'; ?>