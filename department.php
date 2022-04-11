<?php include 'template/header.php'; ?>
<?php
    //data for department
    $sql_dept_view = "SELECT * FROM department WHERE status = 1";
    $result_dept_view = $conn->query($sql_dept_view);
?>
            <!-- Home Design Inner Pages -->
            <div class="ulockd-inner-home">
                <div class="container text-center">
                    <div class="row">
                        <div class="ulockd-inner-conraimer-details">
                            <div class="col-md-12">
                                <h1 class="text-uppercase">DEPARTMENT</h1>
                            </div>
                            <div class="col-md-12">
                                <div class="ulockd-icd-layer">
                                    <ul class="list-inline ulockd-icd-sub-menu">
                                        <li><a href="#"> HOME </a></li>
                                        <li><a href="#"> > </a></li>
                                        <li> <a href="#"> DEPARTMENT </a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
            <div class="col-sm-6 col-md-4 col-lg-4">
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

<?php include 'template/footer.php'; ?>