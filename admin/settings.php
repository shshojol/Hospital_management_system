<?php include 'template/header.php'; ?>
<?php
   
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
                    $dp = "upload/logo/".$img_name;
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
            $web_name = mysqli_real_escape_string($conn,data_filter($_POST['web_name']));
            $address = mysqli_real_escape_string($conn,data_filter($_POST['address']));
            $contry = mysqli_real_escape_string($conn,data_filter($_POST['country']));
            $city = mysqli_real_escape_string($conn,data_filter($_POST['city']));
            $email = mysqli_real_escape_string($conn,data_filter($_POST['email']));
            $mobile = mysqli_real_escape_string($conn,data_filter($_POST['mobile']));
           
            $sql1 = "UPDATE setting SET web_name = '$web_name', logo = '$img_name', address = '$address', country = '$contry', city = '$city', email = '$email', mobile = '$mobile' WHERE 1";
            if(mysqli_query($conn, $sql1))
            {
               
                echo "<script>alert('setting update Sucessfully');</script>";
            }else{
                echo "<script>alert('setting update not possible');</script>";
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
            <h1 class="mt-4">Company Setting</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Company Setting</li>
            </ol>
        </div>
        <?php
        $sql = "SELECT * FROM setting";
        $table = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($table))
        { 
        ?>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Company Name</label>
                      <input type="text" class="form-control" value="<?php echo $row['web_name']; ?>" name="web_name" placeholder="Write Department Name ..">
                    </div>
                    
                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" rows="8" name="address" placeholder="Write Department Detail .."><?php echo $row['address']; ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control" value="<?php echo $row['city']; ?>" name="city" placeholder="Write City Name ..">
                    </div>

                    <div class="form-group">
                      <label>Country</label>
                      <input type="text" class="form-control" value="<?php echo $row['country']; ?>" name="country" placeholder="Write Country Name ..">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" placeholder="Write Email Name ..">
                    </div>

                    <div class="form-group">
                      <label>Mobile</label>
                      <input type="text" class="form-control" value="<?php echo $row['mobile']; ?>" name="mobile" placeholder="Write mobile Name ..">
                    </div>

                    <div class="form-group">
                      <label>Logo Image</label>
                      <input type="file" class="form-control border" name="image">
                      <img  src="upload/logo/<?php echo $row['logo']; ?>" height="80px">
                      <input type="hidden"  name="old-image" value="<?php echo $row['logo']; ?>">
                    </div>

                    

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include 'template/footer.php'; ?>


