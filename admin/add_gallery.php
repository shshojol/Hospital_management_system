<?php include 'template/header.php'; ?>
<?php 
    $title = "";
    $category = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = mysqli_real_escape_string($conn,data_filter($_POST['title']));
        $category = mysqli_real_escape_string($conn,data_filter($_POST['category']));
        
        
        $image = $_FILES['image']['name'];
        $target_dr_name = "upload/Gallery/";
        $target_file_dr_image = $target_dr_name . basename($_FILES['image']['name']);
        
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file_dr_image, PATHINFO_EXTENSION));
        
        // valid file extansion
        $extentsions_arr = array("jpg","jepg","png","gif");
        
        // Check extention is valid or not
        if(in_array($imageFileType, $extentsions_arr)) {
            
            // Upload file
            $is_upload_dr_image = move_uploaded_file($_FILES['image']['tmp_name'], $target_dr_name.$image);
            
            if($is_upload_dr_image) {
                
                // gallery Add Query
                $sql = "INSERT INTO gallery (title,  category, image) VALUES ('$title', '$category', '$image')";
                $result = $conn->query($sql);

                if($result === TRUE) {
                  echo "<script>alert('New Gallery Added Sucessfully');</script>";  
                } else {
                  echo "<script>alert('Sorry ! Could not add the Gallery data, Try Again');</script>";  
                }
            } else {
                echo "<script>alert('Sorry ! Could not upload image, Try Again');</script>";  
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
            <h1 class="mt-4">Gallery</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Gallery</li>
            </ol>
        </div>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    

                    <div class="form-group">
                      <label>Category</label>
                      <select name='category'>
                        <option value="0">select one</option>
                        <option value="1">emergency</option>
                        <option value="2">dental</option>
                        <option value="3">Sergery</option>
                        <option value="4">care</option>
                        <option value="5">test</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Gallery Title</label>
                      <input type="text" class="form-control" name="title" placeholder="Write Gallery title ..">
                    </div>

                    <div class="form-group">
                      <label>Gallery Image</label>
                      <input type="file" class="form-control border" name="image">
                    </div>
                    

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>

