<?php include 'template/header.php'; ?>
<?php 
    $dept_name = "";
    $dept_detail = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $dept_name = mysqli_real_escape_string($conn, data_filter($_POST['dept_name']));
        $dept_detail = mysqli_real_escape_string($conn, data_filter($_POST['dept_detail']));
        $status = $_POST['status'];
        
        $image = $_FILES['image']['name'];
        $target_dr_name = "upload/department/";
        $target_file_dr_image = $target_dr_name . basename($_FILES['image']['name']);
        
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file_dr_image, PATHINFO_EXTENSION));
        
        // valid file extansion
        $extentsions_arr = array("jpg","jpeg","png","gif");
        
        // Check extention is valid or not
        if(in_array($imageFileType, $extentsions_arr)) {
            
            // Upload file
            $is_upload_dr_image = move_uploaded_file($_FILES['image']['tmp_name'], $target_dr_name.$image);
            
            if($is_upload_dr_image) {
                
                // Deprtment Add Query
                $sql_dept_insert = "INSERT INTO department (dept_name, image, dept_detail, status) VALUES ('$dept_name', '$image', '$dept_detail', '$status')";
                $sql_dept_result = $conn->query($sql_dept_insert);

                if($sql_dept_result === TRUE) {
                  echo "<script>alert('New Department Added Sucessfully');</script>";  
                } else {
                  echo "<script>alert('Sorry ! Could not add the Department data, Try Again');</script>";  
                }
            } else {
                echo "<script>alert('Sorry ! Could not upload department banner, Try Again');</script>";  
            }
        } else {
           echo "<script>alert('Sorry ! Inalid extension detected, Try Again');</script>"; 
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
            <h1 class="mt-4">Department</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Department</li>
            </ol>
        </div>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Department Name</label>
                      <input type="text" class="form-control" name="dept_name" placeholder="Write Department Name ..">
                    </div>
                    <div class="form-group">
                      <label>Banner Image</label>
                      <input type="file" class="form-control border" name="image">
                    </div>
                    <div class="form-group">
                      <label>Department Detail</label>
                      <textarea class="form-control" rows="8" name="dept_detail" placeholder="Write Department Detail .."></textarea>
                    </div>

                    <div class="form-group">
                      <label>Status</label><br>
                      <select name='status'>
                        <option value="1">Active</option>  
                        <option value="0">DeActive</option> 
                      </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>

