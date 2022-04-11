<?php include 'template/header.php'; ?>
<?php 
  if(isset($_GET['doctor_id']))
  {
      $id = $_GET['doctor_id'];
  }

  if(isset($_POST['submit']))
    {
        $er = 0;
        if(empty($_FILES['image']['name']))
        {
            $img_name = $_POST['old-image'];
        }else{
            $img_name = $_FILES['image']['name'];
            $ext = explode('.' , $img_name);
            if(is_array($ext) && count($ext) > 1)
            {
                $ext = end($ext);
                $ext = strtolower($ext);
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif')
                {
                    $sp = $_FILES['image']['tmp_name'];
                    $dp = "upload/doctor/".$img_name;
                    move_uploaded_file($sp, $dp);

                }else{
                    $er++;
                    echo "<script>alert('Invalid format.Only jpg,jpeg,png and gif format allowed');</script>";
                }
                
            }else{
                $er++;
                echo "<script>alert('Invalid format');</script>";
              
            }   
        }

        
        if($er == 0)
        {
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

            $sql1 = "UPDATE doctor SET name = '{$name}', designation = '{$designation}', image = '{$img_name}', profession = '{$profession}',
            edu_background = '{$education}', address='{$address}', phone = '$phone', experience = '$experience', dept_id = '$department',
            email = '$email', detail = '$detail', stauts = '$status'  WHERE id = '{$id}'";
            if(mysqli_query($conn, $sql1))
            {
               
                echo "<script>alert('doctor update Sucessfully');</script>";
            }else{
                echo "<script>alert('doctor update not possible');</script>";
            }
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
    $sql = "SELECT * FROM doctor WHERE id = {$id}";
    $table = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($table))
    { 
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Doctor</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Doctor</li>
            </ol>
        </div>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Doctor Name</label>
                      <input type="text" value="<?php echo $row['name']; ?>" class="form-control" name="name" placeholder="Write doctor name.." required>
                    </div>

                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" value="<?php echo $row['designation']; ?>" class="form-control" name="designation" placeholder="Write designation.." required>
                    </div>

                    <div class="form-group">
                      <label>doctor Image</label>
                      <input type="file" class="form-control border" name="image" >
                      <img  src="upload/doctor/<?php echo $row['image']; ?>" height="150px">
                      <input type="hidden"  name="old-image" value="<?php echo $row['image']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Profession</label>
                      <input type="text" value="<?php echo $row['profession']; ?>" class="form-control" name="profession" placeholder="Write doctor profession.." required>
                    </div>

                    <div class="form-group">
                      <label>Education Background</label>
                      <input type="text" value="<?php echo $row['edu_background']; ?>" class="form-control" name="education" placeholder="Write education background.." required>
                    </div>

                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" rows="8" name="address" placeholder="Write address .." required><?php echo $row['address']; ?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>    
            </div>

                <div class='col-md-6'>
                    <div class="form-group">
                      <label>Experience</label>
                      <input type="text" value="<?php echo $row['experience']; ?>" class="form-control" name="experience" placeholder="Write experience..">
                    </div>

                    <div class="form-group">
                        <label>Department</label>
                        <select name='department' class="form-control">
                          <option value='0'>Select department</option>
                          <?php
                              $sql_dept = "select * from department";
                              $table_dept = mysqli_query($conn, $sql_dept);
                              while($row_dept = mysqli_fetch_assoc($table_dept))
                              {
                                  if($row['dept_id'] == $row_dept['id']){
                                    echo "<option value='".$row_dept['id']."' selected>{$row_dept['dept_name']}</option>";
                                  }else{
                                    echo "<option value='".$row_dept['id']."'>{$row_dept['dept_name']}</option>";
                                  } 
                              }
                          ?>   
                        </select>
                    </div>

                    

                    <div class="form-group">
                      <label>phone</label>
                      <input type="text" value="<?php echo $row['phone']; ?>" class="form-control" name="phone" placeholder="Write phone number..">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" value="<?php echo $row['email']; ?>" class="form-control" name="email" placeholder="Write email..">
                    </div>

                    <div class="form-group">
                      <label>Detail</label>
                      <textarea class="form-control"  rows="8" name="detail" placeholder="Write detail .."><?php echo $row['detail']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name='status' class="form-control">
                              <?php
                                if($row['stauts'] == "1")
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
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<?php include 'template/footer.php'; ?>

