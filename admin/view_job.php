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
    $sql_job_view = "SELECT * FROM job_post limit {$offset}, {$limit}";
    $result_job_view = $conn->query($sql_job_view);
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">All Job Post</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">View Job POst</li>
            </ol>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Title</th>
                            <th style="width: 10%;">Detail</th>
                            <th style="width: 10%;">Open Post</th>
                            <th style="width: 10%;">Job nature</th>
                            <th style="width: 25%;">Education</th>
                            <th style="width: 15%;">Experience</th>
                            <th style="width: 15%;">Job location</th>
                            <th style="width: 15%;">Salary Range</th>
                            <th style="width: 15%;">Deadline</th>
                            <th style="width: 15%;">status</th>
                            <th style="width: 15%;">Created Date</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result_job_view->num_rows > 0) {
                                while ($rows_of_job = $result_job_view->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style="width: 10%;"><?php echo $rows_of_job['title']; ?></td>
                            <td style="width: 10%;"><?php echo $rows_of_job['detail']; ?></td>
                            <td style="width: 10%;"><?php echo $rows_of_job['open_post']; ?></td>
                            <td style="width: 10%;"><?php echo $rows_of_job['job_nature']; ?></td>
                            <td style="width: 25%;"><?php echo $rows_of_job['educational_background']; ?></td>
                            <td style="width: 15%;"><?php echo $rows_of_job['experience']; ?></td>
                            <td style="width: 15%;"><?php echo $rows_of_job['job_location']; ?></td>
                            <td style="width: 15%;"><?php echo $rows_of_job['salary_range']; ?></td>
                            <td style="width: 15%;"><?php echo $rows_of_job['application_deadline']; ?></td>
                            <td style="">
                                <?php
                                    if($rows_of_job['status'] == "0")
                                    {
                                        echo "Deactive";
                                    }else{
                                        echo "Active";
                                    }
                                ?>
                            </td>
                            <td style="width: 15%;"><?php echo $rows_of_job['created_at']; ?></td>
                            <td style="width: 20%;">
                               
                            <a href="edit_job.php?job_id=<?php echo $rows_of_job['id']; ?>" class="btn btn-md btn-warning"><i class="fa fa-pencil-alt"></i> Edit</a>
                                <a href="delete_job.php?job_id=<?php echo $rows_of_job['id']; ?>" class="btn btn-md btn-danger" onclick="return alert('Are you sure want to delete this item ?');"><i class="fa fa-trash"></i> Delete</a>
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
    <div class="row">
                    <div class="col-sm-12 col-md-10">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="dataTables_paginate paging_simple_numbers " id="DataTables_Table_0_paginate"> 
                            <?php
                                $sql_paging = "SELECT * FROM job_post";
                                $table_paging = mysqli_query($conn, $sql_paging);
                                $total_record = mysqli_num_rows($table_paging);
                                $limit = 5;
                                $total_page = ceil($total_record/$limit);
                                echo "<ul class='pagination'>";
                                if($page > 1)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_job.php?page=".($page-1)."'>Prev</a></li>";
                                }
                                
                                for($i=1; $i <= $total_page; $i++)
                                {
                                    if($i == $page)
                                    {
                                        echo "<li class='active paginate_button page-item'><a class='page-link' href='view_job.php?page=".$i."'>".$i."</a></li>"; 
                                    }else{
                                        echo "<li class='paginate_button page-item'><a class='page-link' href='view_job.php?page=".$i."'>".$i."</a></li>";
                                    }
                                    
                                }
                                if($page < $total_page)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_job.php?page=".($page+1)."'>Next</a></li>";
                                }
                                echo "</ul>";
                            ?>
                        </div>  
                    </div>
                </div>          
</div>
<?php include 'template/footer.php'; ?>



