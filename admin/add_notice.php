<?php include 'template/header.php'; ?>
<?php 
    $title = "";
    $notice_detail = "";
    $date_post = "";
    $status = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = mysqli_real_escape_string($conn,data_filter($_POST['title']));
        $notice_detail = mysqli_real_escape_string($conn,data_filter($_POST['notice_detail']));
        $date_post = mysqli_real_escape_string($conn,data_filter($_POST['date_post']));
        $status = mysqli_real_escape_string($conn,data_filter($_POST['status']));
        
        
        // Notice Add Query
        $sql = "INSERT INTO Notice (title,  detail, date_of_post, status) VALUES ('$title', '$notice_detail', '$date_post', '$status')";
        $result = $conn->query($sql);

        if($result === TRUE) {
            echo "<script>alert('New Notice Added Sucessfully');</script>";  
        } else {
            //echo "<script>alert('Sorry ! Could not add the Notice data, Try Again');</script>";  
            echo $sql;
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
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Notice</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Notice</li>
            </ol>
        </div>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Notice Title</label>
                      <input type="text" class="form-control" name="title" placeholder="Write Notice title ..">
                    </div>

                    <div class="form-group">
                      <label>Notice Detail</label>
                      <textarea class="form-control" rows="8" name="notice_detail" placeholder="Write Notice Detail .."></textarea>
                    </div>

                    <div class="form-group">
                      <label>Date of post</label>
                      <input type="text" class="form-control" name="date_post" placeholder="Write date of post ..">
                    </div>

                    <div class="form-group">
                      <label>Status</label>
                        <select name='status' class="form-control">
                            <option value='1'>Active</option>
                            <option value='0'>DeActive</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>

