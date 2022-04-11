<?php include 'template/header.php'; ?>
<?php
    if(isset($_GET['doc_id']))
    {
        $doc_id = $_GET['doc_id']; 
    }else{
        $doc_id = 0;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = mysqli_real_escape_string($conn,data_filter($_POST['form_name']));
        $email = mysqli_real_escape_string($conn,data_filter($_POST['form_email']));
        $date = mysqli_real_escape_string($conn,data_filter($_POST['form_date']));
        $phone = mysqli_real_escape_string($conn,data_filter($_POST['form_phone']));
        $msg = mysqli_real_escape_string($conn,data_filter($_POST['form_message']));
        
        
        // Notice Add Query
        $sql = "INSERT INTO appointment (name,  email, date_of_meet, phone, massage, doctor_id) VALUES ('$name', '$email', '$date', '$phone', '$msg', $doc_id)";
        $result = $conn->query($sql);
    
        if($result === TRUE) {
            echo "<script>alert('send appoinment Sucessfully');</script>";  
        } else {
            //echo "<script>alert('Sorry ! Could not add the Notice data, Try Again');</script>";  
            echo $sql;
            die();
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
                    <h1 class="text-uppercase">Appointment</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="#"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="#"> Appointment </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our About -->
<section class="ulockd-about-one inner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <!-- Appointment Form Starts -->
                <form class="appointment_form text-center"  method="post" action="">
                    <div class="messages"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Appointment with Expert</h2>
                            <p>Let's Appointment With our Exparts Who Try to Solved Your Problem.</p>
                            <div class="form-group text-left">
                                <label for="form_name"><i class="fa fa-user-o"></i> Name <small>*</small></label>
                                <input name="form_name" class="form-control" placeholder="enter a name"  type="text">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <label for="form_email"><i class="fa fa-envelope-open-o"></i> Email <small>*</small></label>
                                <input  name="form_email" class="form-control required email" placeholder="enter an email"  type="email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label for="form_date"><i class="fa fa-calendar-check-o"></i> Date <small>*</small></label>
                                <input name="form_date" class="form-control required datepicker" placeholder="enter a date"  type="text">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group text-left">
                                <label for="form_phone"><i class="fa fa-phone"></i> Phone <small>*</small></label>
                                <input  name="form_phone" class="form-control required" placeholder="enter a phone"  type="text">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>  
                    </div>
                    <div class="form-group text-left">
                        <label for="form_name"><i class="fa fa-file-text-o"></i> Message</label>
                        <textarea  name="form_message" class="form-control required" rows="5" placeholder="type in a message" ></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name='submit' class="btn btn-lg ulockd-btn-thm">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>