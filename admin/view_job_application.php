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

    $sql_job_view = "SELECT app.id, job.title as title, app.name, app.email, app.phone, app.edu_background, app.resume, app.created_at
    FROM application as app 
    LEFT JOIN job_post as job ON app.job_post_id = job.id limit {$offset}, {$limit}";
    $result_job_view = $conn->query($sql_job_view);
?>

<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">All Job Application</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">View Job Application</li>
            </ol>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Application Title</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Education</th>
                            <th>Resume</th>
                            <th>Date</th>  
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result_job_view->num_rows > 0) {
                                while ($rows_of_job = $result_job_view->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $rows_of_job['title']; ?></td>
                            <td><?php echo $rows_of_job['name']; ?></td>
                            <td><?php echo $rows_of_job['email']; ?></td>
                            <td><?php echo $rows_of_job['phone']; ?></td>
                            <td><?php echo $rows_of_job['edu_background']; ?></td>
                            <td>
                                <?php 
                                    echo "<a href='upload/resume/".$rows_of_job['resume']."'>Download Resume</a>";
                                ?>
                            </td>
                            <td><?php echo $rows_of_job['created_at']; ?></td>
                            <td style="width: 20%;">
                                <a href="delete_job_application.php?job_id=<?php echo $rows_of_job['id']; ?>" class="btn btn-md btn-danger" onclick="return alert('Are you sure want to delete this item ?');"><i class="fa fa-trash"></i> Delete</a>
                                <a href="" class="btn btn-md btn-primary"><i class="fa fa-pencil-alt"></i> Send Email</a>
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
                                $sql_paging = "SELECT * FROM application";
                                $table_paging = mysqli_query($conn, $sql_paging);
                                $total_record = mysqli_num_rows($table_paging);
                                $limit = 5;
                                $total_page = ceil($total_record/$limit);
                                echo "<ul class='pagination'>";
                                if($page > 1)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_job_application.php?page=".($page-1)."'>Prev</a></li>";
                                }
                                
                                for($i=1; $i <= $total_page; $i++)
                                {
                                    if($i == $page)
                                    {
                                        echo "<li class='active paginate_button page-item'><a class='page-link' href='view_job_application.php?page=".$i."'>".$i."</a></li>"; 
                                    }else{
                                        echo "<li class='paginate_button page-item'><a class='page-link' href='view_job_application.php?page=".$i."'>".$i."</a></li>";
                                    }
                                    
                                }
                                if($page < $total_page)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_job_application.php?page=".($page+1)."'>Next</a></li>";
                                }
                                echo "</ul>";
                            ?>
                        </div>  
                    </div>
                </div>          

</div>
<?php include 'template/footer.php'; ?>



