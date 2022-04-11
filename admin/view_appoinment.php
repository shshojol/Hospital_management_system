<?php include 'template/header.php'; ?>
<?php
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}else{
    $page = 1;
}
$limit = 5;
$offset = ($page - 1) * $limit;

    $sql_app_view = "SELECT app.id, app.name, app.email, app.date_of_meet, app.phone, app.massage, app.created_at, doc.name as doctor
    FROM appointment as app
    LEFT JOIN doctor as doc on app.doctor_id = doc.id ORDER BY app.date_of_meet limit {$offset}, {$limit}";
    $result_app_view = $conn->query($sql_app_view);
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Appoinment</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">View Appoinment</li>
            </ol>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Patient Phone</th>
                            <th>Patient Message</th>
                            <th>Appoinment Date</th>
                            <th>Appoinment Doctor</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result_app_view->num_rows > 0) {
                                while ($rows_of_app = $result_app_view->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $rows_of_app['name']; ?></td>
                            <td><?php echo $rows_of_app['email']; ?></td>
                            <td><?php echo $rows_of_app['phone']; ?></td>
                            <td><?php echo $rows_of_app['massage']; ?></td>
                            <td>
                                <?php
                                    $date = $rows_of_app['date_of_meet'];
                                    $d=strtotime($date);
                                    echo "<i>Date</i> : " . date("Y-m-d", $d);
                                    echo ", <i>Time</i> : " . date("h:i:sa", $d); 
                                 ?>
                            </td>
                            <td><?php echo $rows_of_app['doctor']; ?></td>
                            <td><?php echo $rows_of_app['created_at']; ?></td>
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
                <div class="row">
                    <div class="col-sm-12 col-md-10">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="dataTables_paginate paging_simple_numbers " id="DataTables_Table_0_paginate"> 
                            <?php
                                $sql_paging = "SELECT * FROM appointment";
                                $table_paging = mysqli_query($conn, $sql_paging);
                                $total_record = mysqli_num_rows($table_paging);
                                $limit = 5;
                                $total_page = ceil($total_record/$limit);
                                echo "<ul class='pagination'>";
                                if($page > 1)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_appoinment.php?page=".($page-1)."'>Prev</a></li>";
                                }
                                
                                for($i=1; $i <= $total_page; $i++)
                                {
                                    if($i == $page)
                                    {
                                        echo "<li class='active paginate_button page-item'><a class='page-link' href='view_appoinment.php?page=".$i."'>".$i."</a></li>"; 
                                    }else{
                                        echo "<li class='paginate_button page-item'><a class='page-link' href='view_appoinment.php?page=".$i."'>".$i."</a></li>";
                                    }
                                    
                                }
                                if($page < $total_page)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_appoinment.php?page=".($page+1)."'>Next</a></li>";
                                }
                                echo "</ul>";
                            ?>
                        </div>  
                    </div>
                </div>  
</div>
<?php include 'template/footer.php'; ?>



