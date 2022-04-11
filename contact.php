<?php 
include 'template/header.php'; 
//header for setting
$sql_set_view = "SELECT * FROM setting";
$result_set_view = $conn->query($sql_set_view);
?>

<?php 
include "config/db_config.php";


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn,data_filter($_POST['form_name']));
    $email = mysqli_real_escape_string($conn,data_filter($_POST['form_email']));
    $phone = mysqli_real_escape_string($conn,data_filter($_POST['form_phone']));
    $subject = mysqli_real_escape_string($conn,data_filter($_POST['form_subject']));
    $msg = mysqli_real_escape_string($conn,data_filter($_POST['form_message']));
    
    
    // Notice Add Query
    $sql = "INSERT INTO message (name,  email, phone, subject, feedback) VALUES ('$name', '$email', '$phone', '$subject', '$msg')";
    $result = $conn->query($sql);

    if($result === TRUE) {
        echo "<script>alert('send Message Sucessfully');</script>";  
    } else {
        //echo "<script>alert('Sorry ! Could not add the Notice data, Try Again');</script>";  
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

<!-- Home Design Inner Pages -->
<div class="ulockd-inner-home">
    <div class="container text-center">
        <div class="row">
            <div class="ulockd-inner-conraimer-details">
                <div class="col-md-12">
                    <h1 class="text-uppercase">CONTACT US</h1>
                </div>
                <div class="col-md-12">
                    <div class="ulockd-icd-layer">
                        <ul class="list-inline ulockd-icd-sub-menu">
                            <li><a href="index.php"> HOME </a></li>
                            <li><a href="#"> > </a></li>
                            <li> <a href="contact.php"> CONTACT US </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Inner Pages Main Section -->
<section class="ulockd-contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-srvc-title hvr-float-shadow">
                    <h2 class="text-uppercase">Contact Details</h2>
                    <p>Regardless of whether you need to stay in your own house, are searching for help with a more established relative, looking for exhortation on paying for care, we can help you.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                 while($row_set = mysqli_fetch_assoc($result_set_view)){
            ?>
            <div class="col-md-3">
                <div class="ulockd-ohour-info style2 mb305-xsd text-center">
                    <div class="ulockd-icon text-thm2"><span class="fa fa-envelope"></span></div>
                    <div class="ulockd-info">
                        <h3>Mail Us</h3>
                        <p class="ulockd-addrss"><strong>Email:</strong> <?php echo $row_set['email']; ?></p>
                    </div>
                </div>
                <div class="ulockd-ohour-info style2 text-center">
                    <div class="ulockd-icon text-thm2"><span class="fa fa-phone"></span></div>
                    <div class="ulockd-info">
                        <h3>Call Us</h3>
                        <p class="ulockd-addrss"><?php echo $row_set['mobile']; ?></p>
                    </div>
                </div>
                <div class="ulockd-ohour-info style2 text-center">
                    <div class="ulockd-icon text-thm2"><span class="fa fa-map-signs"></span></div>
                    <div class="ulockd-info">
                        <h3>Address</h3>
                        <p><?php echo $row_set['address']; ?>,<?php echo $row_set['city']; ?></p>
                        <p><?php echo $row_set['country']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-9">
                <div class="ulockd-google-map">
                    <iframe class="h400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.6013167060396!2d90.36532741536281!3d23.761592494264665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf564322fc1f%3A0x477f1c4b9ff200a!2z4Kas4Ka-4KaC4Kay4Ka-4Kam4KeH4Ka2IOCmh-CmieCmqOCmv-CmreCmvuCmsOCnjeCmuOCmv-Cmn-Cmvw!5e0!3m2!1sbn!2sbd!4v1625383106490!5m2!1sbn!2sbd" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-12 ulockd-mrgn1260">
                <div class="ulockd-contact-form style2">
                    <form id="contact_form" name="contact_form" class="contact-form" action="" method="post" novalidate="novalidate">
                        <div class="messages"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="form_name" name="form_name" class="form-control ulockd-form-fg required" placeholder="Your name" required="required" data-error="Name is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="form_email" name="form_email" class="form-control ulockd-form-fg required email" placeholder="Your email" required="required" data-error="Email is required." type="email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>  
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="form_phone" name="form_phone" class="form-control ulockd-form-fg required" placeholder="Phone" required="required" data-error="Phone Number is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="form_subject" name="form_subject" class="form-control ulockd-form-fg required" placeholder="Subject" required="required" data-error="Subject is required." type="text">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="form_message" class="form-control ulockd-form-tb required" rows="8" placeholder="Your massage" required="required" data-error="Message is required."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group ulockd-contact-btn">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" value="" type="hidden">
                                    <button  type="submit" name='submit' class="btn btn-default btn-lg ulockd-btn-thm2" data-loading-text="Getting Few Sec...">SUBMIT</button>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>