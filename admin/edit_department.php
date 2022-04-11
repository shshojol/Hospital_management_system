<?php include 'template/header.php'; ?>
<?php
    if(isset($_GET['dept_id']))
    {
        $id = $_GET['dept_id'];
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
                    $dp = "upload/department/".$img_name;
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
            $dept_name = mysqli_real_escape_string($conn,data_filter($_POST['dept_name']));
            $dept_detail = mysqli_real_escape_string($conn,data_filter($_POST['dept_detail']));
            $status = $_POST['status'];
            $sql1 = "UPDATE department SET dept_name = '{$dept_name}', dept_detail = '{$dept_detail}', image = '{$img_name}', status = '{$status}' WHERE id = '{$id}'";
            if(mysqli_query($conn, $sql1))
            {
               
                echo "<script>alert('department update Sucessfully');</script>";
            }else{
                echo "<script>alert('department update not possible');</script>";
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
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Department</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Department</li>
            </ol>
        </div>
        <?php
        $sql = "SELECT * FROM department WHERE id = {$id}";
        $table = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($table))
        { 
        ?>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Department Name</label>
                      <input type="text" class="form-control" value="<?php echo $row['dept_name']; ?>" name="dept_name" placeholder="Write Department Name ..">
                    </div>
                    
                    <div class="form-group">
                      <label>Department Detail</label>
                      <textarea class="form-control" rows="8" name="dept_detail" placeholder="Write Department Detail .."><?php echo $row['dept_detail']; ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Banner Image</label>
                      <input type="file" class="form-control border" name="image">
                      <img  src="upload/department/<?php echo $row['image']; ?>" height="150px">
                      <input type="hidden"  name="old-image" value="<?php echo $row['image']; ?>">
                    </div>

                    <div class="form-group">
                      <label>Status</label><br>
                      <select name='status'>
                          <?php
                            if($row['status'] == 1)
                            {
                                echo "<option value='1' selected>Active</option>";
                                echo "<option value='0'>DeActive</option>";
                            }else{
                                echo "<option value='0' selected>DeActive</option>";
                                echo "<option value='1'>Active</option>";
                            }
                          ?>
                      </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include 'template/footer.php'; ?>


