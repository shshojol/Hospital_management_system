<?php include 'template/header.php'; ?>
<?php 
    if(isset($_GET['gallery_id']))
    {
        $id = $_GET['gallery_id'];
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
                    $dp = "upload/gallery/".$img_name;
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
        $category = mysqli_real_escape_string($conn,data_filter($_POST['category']));
        

            $sql1 = "UPDATE gallery SET title = '{$title}', category = '{$category}', image = '{$img_name}' WHERE id = '{$id}'";
            if(mysqli_query($conn, $sql1))
            {
               
                echo "<script>alert('gallery update Sucessfully');</script>";
            }else{
                echo "<script>alert('gallery update not possible');</script>";
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
        $sql = "SELECT * FROM gallery WHERE id = {$id}";
        $table = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($table))
        { 
    ?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Gallery</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Update Gallery</li>
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
                        <option value="4">Care</option>
                        <option value="5">test</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Gallery Title</label>
                      <input type="text" value="<?php echo $row['title']; ?>" class="form-control" name="title" placeholder="Write Gallery title ..">
                    </div>

                    <div class="form-group">
                      <label>Gallery Image</label>
                      <input type="file" class="form-control border" name="image">
                      <img  src="upload/gallery/<?php echo $row['image']; ?>" height="150px">
                      <input type="hidden"  name="old-image" value="<?php echo $row['image']; ?>">
                    </div>
                    

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php include 'template/footer.php'; ?>

