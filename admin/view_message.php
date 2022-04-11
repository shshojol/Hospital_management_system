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

    $sql_message_view = "SELECT * FROM message limit {$offset}, {$limit}";
    $result_message_view = $conn->query($sql_message_view);
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Message</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">View Message</li>
            </ol>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 10%;">Phone</th>
                            <th style="width: 10%;">Subject</th>
                            <th style="width: 25%;">Message</th>
                            <th style="width: 15%;">Created Date</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result_message_view->num_rows > 0) {
                                while ($rows_of_message = $result_message_view->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style="width: 10%;"><?php echo $rows_of_message['name']; ?></td>
                            <td style="width: 10%;"><?php echo $rows_of_message['email']; ?></td>
                            <td style="width: 10%;"><?php echo $rows_of_message['phone']; ?></td>
                            <td style="width: 10%;"><?php echo $rows_of_message['subject']; ?></td>
                            <td style="width: 25%;"><?php echo substr($rows_of_message['feedback'], 0, 200); ?></td>
                            <td style="width: 15%;"><?php echo $rows_of_message['created_at']; ?></td>
                            <td style="width: 20%;">
                               
                                <a href="delete_message.php?message_id=<?php echo $rows_of_message['id']; ?>" class="btn btn-md btn-danger" onclick="return alert('Are you sure want to delete this item ?');"><i class="fa fa-trash"></i> Delete</a>
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
                                $sql_paging = "SELECT * FROM message";
                                $table_paging = mysqli_query($conn, $sql_paging);
                                $total_record = mysqli_num_rows($table_paging);
                                $limit = 5;
                                $total_page = ceil($total_record/$limit);
                                echo "<ul class='pagination'>";
                                if($page > 1)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_message.php?page=".($page-1)."'>Prev</a></li>";
                                }
                                
                                for($i=1; $i <= $total_page; $i++)
                                {
                                    if($i == $page)
                                    {
                                        echo "<li class='active paginate_button page-item'><a class='page-link' href='view_message.php?page=".$i."'>".$i."</a></li>"; 
                                    }else{
                                        echo "<li class='paginate_button page-item'><a class='page-link' href='view_message.php?page=".$i."'>".$i."</a></li>";
                                    }
                                    
                                }
                                if($page < $total_page)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_message.php?page=".($page+1)."'>Next</a></li>";
                                }
                                echo "</ul>";
                            ?>
                        </div>  
                    </div>
                </div> 
</div>
<?php include 'template/footer.php'; ?>



