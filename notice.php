<?php include 'template/header.php'; ?>
<?php
    //paging notice
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $limit = 5;
    $offset = ($page - 1) * $limit;
    //table for all notice
    $sql_notice_view = "SELECT * FROM notice WHERE status = 1 ORDER BY id DESC limit {$offset}, {$limit}";
    $result_notice_view = $conn->query($sql_notice_view);

    //table for recent notice
    $sql_notice_rec = "SELECT * FROM notice WHERE status = 1 ORDER BY id DESC limit 3";
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
                            <b><a href="single_notice.php?notice_id=<?php echo $rows_notice_rec['id']; ?>">..more..</a></b><br>
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
                        <p class="project-dp-one"><?php echo substr($rows_of_notice['detail'], 0, 200); ?></p>
                        <a class="btn btn-lg ulockd-btn-thm" href="single_notice.php?notice_id=<?php echo $rows_of_notice['id']; ?>"> Read More</a>
                    </article>
                </div>
                <?php
                    } } else {
                         echo "No Data Found !";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-12 text-center">
                <?php
                    $sql_paging = "SELECT * FROM notice";
                    $table_paging = mysqli_query($conn, $sql_paging);
                    $total_record = mysqli_num_rows($table_paging);
                    $limit = 3;
                    $total_page = ceil($total_record/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page > 1)
                    {
                        echo "<li><a href='notice.php?page=".($page-1)."'>Prev</a></li>";
                    }
                    
                    for($i=1; $i <= $total_page; $i++)
                    {
                        if($i == $page)
                        {
                            echo "<li class='active'><a href='notice.php?page=".$i."'>".$i."</a></li>"; 
                        }else{
                            echo "<li><a href='notice.php?page=".$i."'>".$i."</a></li>";
                        }
                        
                    }
                    if($page < $total_page)
                    {
                        echo "<li><a href='notice.php?page=".($page+1)."'>Next</a></li>";
                    }
                    echo "</ul>";
                ?>
		</div>
    </div>
</section>

<?php include 'template/footer.php'; ?>