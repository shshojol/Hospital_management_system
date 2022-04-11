<?php include 'template/header.php'; ?>
<?php
    if(isset($_GET['notice_id']))
    {
        $id = $_GET['notice_id'];
    }
    $sql_notice_view = "SELECT * FROM notice WHERE id = {$id}";
    $result_notice_view = $conn->query($sql_notice_view);

    //table for recent notice
    $sql_notice_rec = "SELECT * FROM notice ORDER BY id DESC limit 3";
    $result_notice_rec = mysqli_query($conn, $sql_notice_rec);
?>
<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase">NEWS</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> NEWS POST </a> </li>
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
            <h3 class="ulockd-bb-dashed"><span class="flaticon-calendar text-thm1"></span> Latest Post</h3>
            <div class="ulockd-lp">
                <?php
                    if($result_notice_rec->num_rows > 0) {
                        while ($rows_notice_rec = $result_notice_rec->fetch_assoc()) {
                ?>  

                <div class="ulockd-latest-post ulockd-bb-dashed">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $rows_notice_rec['title']; ?></h4>
                            <?php echo substr($rows_notice_rec['detail'], 0, 200); ?>
                            <b><a href="single_notice.php?notice_id=<?php echo $rows_notice_rec['id']; ?>">..more...</a></b><br>
                            <strong><a href="single_notice.php?notice_id=<?php echo $rows_notice_rec['id']; ?>">Date: <?php echo $rows_notice_rec['date_of_post']; ?> </a></strong>
                        </div>
                    </div>
                </div>

                <?php  } } ?>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <?php
                    if($result_notice_view->num_rows > 0) {
                        while ($rows_of_notice = $result_notice_view->fetch_assoc()) {
                ?>
                <div class="col-md-12 ulockd-mrgn1210">
                    <article class="ulockd-pd-content">
                        <h3><?php echo $rows_of_notice['title']; ?></h3>
                        <ul class="list-inline">
                            <li><b>Notice Date: <?php echo $rows_of_notice['date_of_post']; ?></b></li>
                        </ul><br>
                        <p class="project-dp-one"><?php echo $rows_of_notice['detail']; ?></p>
                    </article>
                </div>
                <?php
                    } } else {
                         echo "No Data Found !";
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>