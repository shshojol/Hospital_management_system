<?php include 'template/header.php'; ?>
<?php 
    $name = "";
    $designation = "";
    $profession = "";
    $education = "";
    $address = "";
    $experience = "";
    $phone = "";
    $email = "";
    $detail = "";
    $status = "";
    $department = "";

    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn,data_filter($_POST['name']));
        $designation = mysqli_real_escape_string($conn,data_filter($_POST['designation']));
        $profession = mysqli_real_escape_string($conn,data_filter($_POST['profession']));
        $education = mysqli_real_escape_string($conn,data_filter($_POST['education']));
        $address = mysqli_real_escape_string($conn,data_filter($_POST['address']));
        $phone = mysqli_real_escape_string($conn,data_filter($_POST['phone']));
        $experience = mysqli_real_escape_string($conn,data_filter($_POST['experience']));
        $department = mysqli_real_escape_string($conn,data_filter($_POST['department']));
        $email = mysqli_real_escape_string($conn,data_filter($_POST['email']));
        $detail = mysqli_real_escape_string($conn,data_filter($_POST['detail']));
        $status = mysqli_real_escape_string($conn,data_filter($_POST['status']));
        
        
        $image = $_FILES['image']['name'];
        $target_dr_name = "upload/doctor/";
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
                
                // Deprtment Add Query
                $sql_serv_insert = "INSERT INTO doctor (dept_id, name, designation, image, profession, edu_background, experience, address, phone, email, detail, stauts)
                 VALUES ($department, '$name', '$designation', '$image', '$profession', '$education', '$experience', '$address', '$phone', '$email', '$detail', $status)";
                $sql_serv_result = $conn->query($sql_serv_insert);

                if($sql_serv_result === TRUE) {
                  echo "<script>alert('New doctor Added Sucessfully');</script>";  
                } else {
                  echo "<script>alert('Sorry ! Could not add the doctor, Try Again');</script>"; 
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
            <h1 class="mt-4">Doctor</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Doctor</li>
            </ol>
        </div>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Doctor Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Write doctor name.." required>
                    </div>

                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" class="form-control" name="designation" placeholder="Write designation.." required>
                    </div>

                    <div class="form-group">
                      <label>doctor Image</label>
                      <input type="file" class="form-control border" name="image" required>
                    </div>

                    <div class="form-group">
                      <label>Profession</label>
                      <input type="text" class="form-control" name="profession" placeholder="Write doctor profession.." required>
                    </div>

                    <div class="form-group">
                      <label>Education Background</label>
                      <input type="text" class="form-control" name="education" placeholder="Write education background.." required>
                    </div>

                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" rows="8" name="address" placeholder="Write address .." required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>    
            </div>

                <div class='col-md-6'>
                    <div class="form-group">
                      <label>Experience</label>
                      <input type="text" class="form-control" name="experience" placeholder="Write experience..">
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <select name='department' class="form-control">
                          <option value='0'>Select department</option>
                          <?php
                              $sql = "select * from department";
                              $table = mysqli_query($conn, $sql);
                              while($row = mysqli_fetch_assoc($table))
                              {
                                echo "<option value='".$row['id']."'>{$row['dept_name']}</option>";
                              }
                          ?>   
                        </select>
                    </div>

                    

                    <div class="form-group">
                      <label>phone</label>
                      <input type="text" class="form-control" name="phone" placeholder="Write phone number..">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" placeholder="Write email..">
                    </div>

                    <div class="form-group">
                      <label>Detail</label>
                      <textarea class="form-control" rows="8" name="detail" placeholder="Write detail .."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name='status' class="form-control">
                            <option value='1'>Active</option>
                            <option value='0'>DeActive</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>

