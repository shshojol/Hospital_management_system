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
    $sql_doctor_view = "SELECT d.id,  dep.dept_name AS department, d.name, d.designation, d.image, d.profession, d.edu_background, d.experience, d.address, d.phone, d.email, d.detail, d.stauts, d.created_at
    FROM doctor AS d
    LEFT JOIN department AS dep ON d.dept_id = dep.id limit {$offset}, {$limit}";
    $result_doctor_view = $conn->query($sql_doctor_view);
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Doctor</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">View Doctor</li>
            </ol>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="">doctor Image</th>
                            <th style="">doctor Name</th>
                            <th style="">Designation</th>
                            <th style="">Profession</th>
                            <th style="">Education</th>
                            <th style="">Experience</th>
                            <th style="">Address</th>
                            <th style="">Phone</th>
                            <th style="">Email</th>
                            <th style="">Status</th>
                            <th style="">Department</th>
                            <th style="">Created Date</th>
                            <th style="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result_doctor_view->num_rows > 0) {
                                while ($rows_of_doctor = $result_doctor_view->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style=""><img style="height: 80px; width: 100px;" src="upload/doctor/<?php echo $rows_of_doctor['image']; ?>" /></td>
                            <td style=""><?php echo $rows_of_doctor['name']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['designation']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['profession']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['edu_background']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['experience']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['address']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['phone']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['email']; ?></td>
                            
                            <td style="">
                                <?php
                                    if($rows_of_doctor['stauts'] == "0")
                                    {
                                        echo "Deactive";
                                    }else{
                                        echo "Active";
                                    }
                                ?>
                            </td>
                            <td style=""><?php echo $rows_of_doctor['department']; ?></td>
                            <td style=""><?php echo $rows_of_doctor['created_at']; ?></td>
                            <td style="width:20px;">
                                <a href="edit_doctor.php?doctor_id=<?php echo $rows_of_doctor['id']; ?>" class="btn btn-md btn-warning"><i class="fa fa-pencil-alt"></i> Edit</a>
                                <a href="delete_doctor.php?doctor_id=<?php echo $rows_of_doctor['id']; ?>" class="btn btn-md btn-danger" onclick="return alert('Are you sure want to delete this item ?');"><i class="fa fa-trash"></i> Delete</a>
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
                                $sql_paging = "SELECT * FROM doctor";
                                $table_paging = mysqli_query($conn, $sql_paging);
                                $total_record = mysqli_num_rows($table_paging);
                                $limit = 5;
                                $total_page = ceil($total_record/$limit);
                                echo "<ul class='pagination'>";
                                if($page > 1)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_doctor.php?page=".($page-1)."'>Prev</a></li>";
                                }
                                
                                for($i=1; $i <= $total_page; $i++)
                                {
                                    if($i == $page)
                                    {
                                        echo "<li class='active paginate_button page-item'><a class='page-link' href='view_doctor.php?page=".$i."'>".$i."</a></li>"; 
                                    }else{
                                        echo "<li class='paginate_button page-item'><a class='page-link' href='view_doctor.php?page=".$i."'>".$i."</a></li>";
                                    }
                                    
                                }
                                if($page < $total_page)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_doctor.php?page=".($page+1)."'>Next</a></li>";
                                }
                                echo "</ul>";
                            ?>
                        </div>  
                    </div>
                </div>  
</div>
<?php include 'template/footer.php'; ?>



