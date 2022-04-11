<?php include 'template/header.php'; ?>
<?php 
    if(isset($_GET['notice_id']))
    {
        $id = $_GET['notice_id'];
    }

    if(isset($_POST['submit']))
    {
        $title = mysqli_real_escape_string($conn,data_filter($_POST['title']));
        $detail = mysqli_real_escape_string($conn,data_filter($_POST['notice_detail']));
        $date_post = mysqli_real_escape_string($conn,data_filter($_POST['date_post']));
        $status = mysqli_real_escape_string($conn,data_filter($_POST['status']));

            $sql1 = "UPDATE notice SET title = '{$title}', detail = '{$detail}',
             date_of_post = '{$date_post}', status = '{$status}'  WHERE id = '{$id}'";
            if(mysqli_query($conn, $sql1)){
                echo "<script>alert('notice update Sucessfully');</script>";
            }else{
                echo "<script>alert('notice update not possible');</script>";
               
            }  
    }
      
    
    // Data validation or filter function
    function data_filter($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 
?>
<?php
    $sql = "SELECT * FROM notice WHERE id = {$id}";
    $table = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($table))
    { 
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Notice</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Notice</li>
            </ol>
        </div>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Notice Title</label>
                      <input type="text" value="<?php echo $row['title']; ?>" class="form-control" name="title" placeholder="Write Notice title ..">
                    </div>

                    <div class="form-group">
                      <label>Notice Detail</label>
                      <textarea class="form-control"  rows="8" name="notice_detail" placeholder="Write Notice Detail .."><?php echo $row['detail']; ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Date of post</label>
                      <input type="text" value="<?php echo $row['date_of_post']; ?>" class="form-control" name="date_post" placeholder="Write date of post ..">
                    </div>

                    <div class="form-group">
                      <label>Status</label>
                        <select name='status' class="form-control">
                            <?php
                                if($row['status'] == "1")
                                {
                                    echo "<option value='1' selected>Active</option>";
                                    echo "<option value='0'>Deactive</option>";   
                                }else{
                                    echo "<option value='0' selected>Deactive</option>";
                                    echo "<option value='1' >Active</option>";  
                                } 
                            ?>  
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php include 'template/footer.php'; ?>

