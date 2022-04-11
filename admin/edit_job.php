<?php include 'template/header.php'; ?>
<?php 
if(isset($_GET['job_id']))
{
    $id = $_GET['job_id'];
}

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = mysqli_real_escape_string($conn,data_filter($_POST['title']));
        $detail = mysqli_real_escape_string($conn,data_filter($_POST['detail']));
        $open_post = mysqli_real_escape_string($conn,data_filter($_POST['open_post']));
        $job_nature = mysqli_real_escape_string($conn,data_filter($_POST['job_nature']));
        $education = mysqli_real_escape_string($conn,data_filter($_POST['education']));
        $experience = mysqli_real_escape_string($conn,data_filter($_POST['experience']));
        $location = mysqli_real_escape_string($conn,data_filter($_POST['location']));
        $salary = mysqli_real_escape_string($conn,data_filter($_POST['salary']));
        $deadline = mysqli_real_escape_string($conn,data_filter($_POST['deadline']));
        $status = mysqli_real_escape_string($conn,data_filter($_POST['status']));

        
        
        // Notice Add Query
        $sql = "UPDATE job_post SET title = '{$title}',  
        detail = '{$detail}',
        open_post = '{$open_post}',
        job_nature = '{$job_nature}', 
        educational_background = '{$education}',
        experience = '{$experience}',
        job_location = '{$location}', 
        salary_range = '{$salary}', 
        status = '{$status}',
        application_deadline = '{$deadline}' 
         where id = '{$id}'";
        $result = $conn->query($sql);

        if($result === TRUE) {
            echo "<script>alert('New job post update Sucessfully');</script>";  
        } else {
            echo "<script>alert('Sorry ! Could not update the job data, Try Again');</script>";  
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
<?php
    $sql = "SELECT * FROM job_post WHERE id = {$id}";
    $table = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($table))
    { 
?>
<div class="page-wrapper">
    <div class="content">
        <div>
            <h1 class="mt-4">Job Post</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Job Post</li>
            </ol>
        </div>
        <div style="margin: 15px;" class="row">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Job Title</label>
                      <input type="text" value="<?php echo $row['title']; ?>" class="form-control" name="title" placeholder="Write Job title.." required>
                    </div>

                    <div class="form-group">
                      <label>Job detail</label>
                      <textarea class="form-control" rows="8" name="detail" placeholder="Write detail .."><?php echo $row['detail']; ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Open Post</label>
                      <input type="text" value="<?php echo $row['open_post']; ?>" class="form-control" name="open_post" placeholder="Write Open post..">
                    </div>

                    <div class="form-group">
                      <label>Job Nature</label>
                      <input type="text" value="<?php echo $row['job_nature']; ?>" class="form-control" name="job_nature" placeholder="Write job nature.." required>
                    </div>

                    <div class="form-group">
                      <label>Education</label>
                      <textarea class="form-control"  rows="8" name="education" placeholder="Write Education background .." required><?php echo $row['educational_background']; ?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>    
            </div>

                <div class='col-md-6'>
                    <div class="form-group">
                      <label>Experience</label>
                      <input type="text" value="<?php echo $row['experience']; ?>" class="form-control" name="experience" placeholder="Write experience..">
                    </div>

                    <div class="form-group">
                      <label>Job Location</label>
                      <input type="text" value="<?php echo $row['job_location']; ?>" class="form-control" name="location" placeholder="Write job location..">
                    </div>

                    <div class="form-group">
                      <label>Salary</label>
                      <input type="text" value="<?php echo $row['salary_range']; ?>" class="form-control" name="salary" placeholder="Write salary range..">
                    </div>

                    <div class="form-group">
                      <label>Application Deadline</label>
                      <input type="text" value="<?php echo $row['application_deadline']; ?>" class="form-control" name="deadline" placeholder="Write application deadline..">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name='status' class="form-control">
                            <?php
                                if($row['status'] == "1")
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

