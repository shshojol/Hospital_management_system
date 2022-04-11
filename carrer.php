<?php include 'template/header.php'; ?>
<?php 
    if(isset($_POST['submit']))
    {
            $er = 0;
        
            $file_name = $_FILES['fileToUpload']['name'];
            $ext = explode('.' , $file_name);
            if(is_array($ext) && count($ext) > 1)
            {
                $ext = end($ext);
                $ext = strtolower($ext);
                if($ext == 'doc' || $ext == 'docx' || $ext == 'pdf')
                {
                    $sp = $_FILES['fileToUpload']['tmp_name'];
                    $dp = "admin/upload/resume/".$file_name;
                    move_uploaded_file($sp, $dp);

                }else{
                    $er++;
                    echo "<script>alert('Invalid format.Only pdf,docx and doc format allowed');</script>";
                }
                
            }else{
                $er++;
                echo "<script>alert('Invalid format');</script>";
              
            }   
        

        
        if($er == 0)
        {
            $name = mysqli_real_escape_string($conn,data_filter($_POST['name']));
            $email = mysqli_real_escape_string($conn,data_filter($_POST['email']));
            $phone = mysqli_real_escape_string($conn,data_filter($_POST['phone']));
            $education = mysqli_real_escape_string($conn,data_filter($_POST['education']));
            $id = $_POST['id'];

            $app_sql = "INSERT INTO application ( job_post_id, name, email, phone, edu_background, resume) VALUES ($id, '$name', '$email', '$phone', '$education', '$file_name')";

            if(mysqli_query($conn, $app_sql))
            {
                echo "<script>alert('Application send Sucessfully');</script>";
            }else{
                echo "<script>alert('Application send not possible');</script>";
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
<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase">CAREER</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> CAREER </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Our Career -->
<section class="ulockd-career">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2>Build Your Career With Us.</h2>
                <p>Regardless of whether you need to stay in your own house, are searching for help with a more established relative, looking for exhortation on paying for care, we can help you..</p>
            </div>
        </div>
        <div class="row ulockd-mrgn1260">
            <?php
                include "config/db_config.php";
                $sql = "SELECT * FROM job_post where status=1 ORDER BY id DESC";
                $table = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($table))
                {
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        
                        <h3><?php echo $row['title']; ?></h3>
                        <h5><?php echo $row['job_location']; ?></h5>
                        <p><?php echo $row['job_nature']; ?>,<?php echo $row['educational_background']; ?></p>
                        <p><a href=""   class="btn btn-default ulockd-btn-thm2" role="button" data-toggle="modal" data-target="#myModal_<?php echo $row['id']; ?>"> Job Details & Apply</a></p>
                        <p>Working Experience: <?php echo $row['experience']; ?></p>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal_<?php echo $row['id']; ?>">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="ulockd-welcm-hmddl text-center">
                                <a href="index.php" class="ulockd-main-logo"><img src="images/header-logo.png" alt=""></a>
                            </div>
                        </div>
                        <h4 class="modal-title"><?php echo $row['title']; ?></h4>
                        <p>Job Publish : <?php echo $row['created_at']; ?></p>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <h5>Postion: <?php echo $row['job_nature']; ?></h5>
                            <p>Details: <?php echo $row['detail']; ?></p>
                            <p>Education: <?php echo $row['educational_background']; ?></p>
                            <p>Working Experience: <?php echo $row['experience']; ?></p>
                            <p>Salary: <?php echo $row['salary_range']; ?></p>
                            <p>Location: <?php echo $row['job_location']; ?></p>
                            <p>Deadline: <?php echo $row['application_deadline']; ?></p>
                        </div>
                        <hr/>
                        <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Application Form</h2>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">      
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Enter phone" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="education" class="form-control" placeholder="Enter education background" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <b>Upload Resume:</b>
                                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                                    </div>
                                    
                                    <button style="margin-bottom:10px" type="submit" name="submit" class="btn btn-primary">Apply</button><br>
                                </form> 
                            </div>
                        </div>
                        </div>
                       
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>   

            <?php } ?>
        </div>
    </div>
</section>

                       
                             
              

           
<?php include 'template/footer.php'; ?>