<?php 
    include '../config/db_config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <title>BU Medical - Login</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="main-wrapper account-wrapper">
            <div class="account-page">
                <div class="account-center">
                    <div class="account-box">
                        <form action="" class="form-signin" method='post'>
                            <div class="account-logo">
                                <a href="index.php"><img src="assets/img/header-logo.png" alt="BU Medical"></a>
                            </div>
                            <div class="form-group">
                                <label>Username or Email</label>
                                <input type="text" autofocus="" class="form-control" name='email' required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name='password' required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary account-btn" name='login'>Login</button>
                            </div>
                            <div class="text-center register-link">
                                Wish to get back to site ? <a href="../index.html">Back to Site</a>
                            </div>
                            <br><br><b>Login Id: </b>tomdruhulamin@gmail.com<br>
                            <b>Password: </b>123

                        </form>

                        
                        <?php
                            if(isset($_POST['login']))
                            {
                            
                                $u_name = mysqli_real_escape_string($conn, $_POST['email']);
                                $password = mysqli_real_escape_string($conn, $_POST['password']);
                                $sql = "select * from admin where email = '{$u_name}' AND password = '{$password}'";
                                $table = mysqli_query($conn, $sql) or die('query faild');
                                if(mysqli_num_rows($table) > 0)
                                {  
                                    while($row = mysqli_fetch_assoc($table))
                                    {
                                        session_start();
                                        $_SESSION['id'] = $row['id'];
                                         $_SESSION['name'] = $row['name'];
                                         $_SESSION['email'] = $row['email'];
                                        header('location:dashboard.php');
                                    }
                                } else{
                                    echo "Username password not matched";
                                }
                                
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
</html>