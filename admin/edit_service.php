<?php include 'template/header.php'; ?>
<?php 
    if(isset($_GET['service_id']))
    {
        $id = $_GET['service_id'];
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
                    $dp = "upload/service/".$img_name;
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
            $title = mysqli_real_escape_string($conn,data_filter($_POST['title']));
            $serv_detail = mysqli_real_escape_string($conn,data_filter($_POST['serv_detail']));
            $status = $_POST['status'];
            $sql1 = "UPDATE service SET title = '{$title}', detail = '{$serv_detail}', image = '{$img_name}', status = '{$status}' WHERE id = '{$id}'";
            if(mysqli_query($conn, $sql1))
            {
               
                echo "<script>alert('Service update Sucessfully');</script>";
            }else{
                echo "<script>alert('Service update not possible');</script>";
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

    //update service
    
    $sql = "SELECT * FROM service WHERE id = {$id}";
    $table = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {   
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Service</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Service</li>
            </ol>
        </div>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Service Title</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" placeholder="Write service title .." >
                    </div>

                    <div class="form-group">
                      <label>Service Detail</label>
                      <textarea class="form-control" rows="8" name="serv_detail"   placeholder="Write service Detail .." ><?php echo $row['detail']; ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Service Image</label>
                      <input type="file" class="form-control border" name="image" >
                      <img  src="upload/service/<?php echo $row['image']; ?>" height="150px">
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
    </div>
</div>
<?php } ?>
<?php include 'template/footer.php'; ?>

