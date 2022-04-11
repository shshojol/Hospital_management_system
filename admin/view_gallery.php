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

    $sql_gallery_view = "SELECT * FROM gallery limit {$offset}, {$limit}";
    $result_gallery_view = $conn->query($sql_gallery_view);
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Gallery</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">View Gallery</li>
            </ol>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Gallery Image</th>
                            <th style="width: 25%;">Gallery Title</th>
                            <th style="width: 25%;">Category</th>
                            <th style="width: 15%;">Created Date</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result_gallery_view->num_rows > 0) {
                                while ($rows_of_gallery = $result_gallery_view->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style="width: 20%;"><img style="height: 80px; width: 100px;" src="upload/gallery/<?php echo $rows_of_gallery['image']; ?>" /></td>
                            <td style="width: 25%;"><?php echo $rows_of_gallery['title']; ?></td>
                            <td style="width: 25%;">
                                <?php
                                    if($rows_of_gallery['category'] == 1)
                                    {
                                        echo "Emergencty";
                                    }elseif($rows_of_gallery['category'] == 2){
                                        echo "Dental";
                                    }elseif($rows_of_gallery['category'] == 3){
                                        echo "Surgery";
                                    }elseif($rows_of_gallery['category'] == 4){
                                        echo "Care";
                                    }elseif($rows_of_gallery['category'] == 5){
                                        echo "Test";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            </td>
                            <td style="width: 15%;"><?php echo $rows_of_gallery['created_at']; ?></td>
                            <td style="width: 15%;">
                                <a href="edit_gallery.php?gallery_id=<?php echo $rows_of_gallery['id']; ?>" class="btn btn-md btn-warning"><i class="fa fa-pencil-alt"></i> Edit</a>
                                <a href="delete_gallery.php?gallery_id=<?php echo $rows_of_gallery['id']; ?>" class="btn btn-md btn-danger" onclick="return alert('Are you sure want to delete this item ?');"><i class="fa fa-trash"></i> Delete</a>
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
                                $sql_paging = "SELECT * FROM gallery";
                                $table_paging = mysqli_query($conn, $sql_paging);
                                $total_record = mysqli_num_rows($table_paging);
                                $limit = 5;
                                $total_page = ceil($total_record/$limit);
                                echo "<ul class='pagination'>";
                                if($page > 1)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_gallery.php?page=".($page-1)."'>Prev</a></li>";
                                }
                                
                                for($i=1; $i <= $total_page; $i++)
                                {
                                    if($i == $page)
                                    {
                                        echo "<li class='active paginate_button page-item'><a class='page-link' href='view_gallery.php?page=".$i."'>".$i."</a></li>"; 
                                    }else{
                                        echo "<li class='paginate_button page-item'><a class='page-link' href='view_gallery.php?page=".$i."'>".$i."</a></li>";
                                    }
                                    
                                }
                                if($page < $total_page)
                                {
                                    echo "<li class='paginate_button page-item'><a class='page-link' href='view_gallery.php?page=".($page+1)."'>Next</a></li>";
                                }
                                echo "</ul>";
                            ?>
                        </div>  
                    </div>
                </div>          
</div>
<?php include 'template/footer.php'; ?>



