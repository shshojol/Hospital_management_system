<?php 
    include 'config/db_config.php';
?>
<?php
//data for service
$sql_serv_view = "SELECT * FROM service where status = 1";
$result_serv_view = $conn->query($sql_serv_view);

//menu for department
$sql_dept_view = "SELECT * FROM department where status = 1";
$result_dept_view = $conn->query($sql_dept_view);

//header for setting
$sql_set_view = "SELECT * FROM setting";
$result_set_view = $conn->query($sql_set_view);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="ambulance, business, clinic, corporate, creative, dental, doctor, gynecology, health, health care, hospital, medical, medical template, medical theme, retail">
        <meta name="unlockdesign" content="SaniulHassan">
        <!-- css file -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/all-plugins.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/theme-color.css">
        <!-- Responsive stylesheet -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- Title -->
        <title>BU Medical - Home</title>
        <!-- Favicon -->
        <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
        <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />
        
        <style>
            .ulockd-mrgn630 {
                margin-bottom: 30px;
            }
            .dropbtn-tab {
                background-color: transparent;
                color: #454545;
                font-size: 13px;
                border: none;
                cursor: pointer;
            }
            .dropdown-tab {
                position: relative;
            }
            .dropdown-tab-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                padding: 6px 0;
                z-index: 1;
            }
            .dropdown-tab-content a {
                color: #fff;
                display: block;
                font-weight: 600;
                margin: 1px 0 !important;
                padding: 10px 0px;
                text-decoration: none;
                width: 160px;
            }
            .dropdown-tab-content a:hover {
                background-color: #555555;
            }
            .dropdown-tab:hover .dropdown-tab-content {
                display: block;
            }
        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            <div id="preloader" class="preloader">
                <div id="pre" class="preloader_container"><div class="preloader_disabler btn btn-default">Disable Preloader</div></div>
            </div>
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="social-linked">
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <?php
                            while($row_set = mysqli_fetch_assoc($result_set_view)){
                        ?>
                        <div class="col-md-4">
                            <div class="welcm-ht text-center">
                                <p class="ulockd-welcntxt">Welcome To Our<span class="text-thm1"> <?php echo $row_set['web_name']; ?></span></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="welcm-ht text-right">
                                <p class="ulockd-welcntxt">Phone<span class="text-thm1"> <?php echo $row_set['mobile']; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="ulockd-contact-info text-right">
                                <div class="ulockd-icon pull-right"><span class="flaticon-map-marker"></span></div>
                                <div class="ulockd-info">
                                    <h3>Location</h3>
                                    <p class="ulockd-cell">your location here</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="ulockd-welcm-hmddl text-center">
                                <a href="index.php" class="ulockd-main-logo"><img src="admin/upload/logo/<?php echo $row_set['logo']; ?>" alt=""></a>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="ulockd-ohour-info">
                                <div class="ulockd-icon pull-left"><span class="flaticon-clock-1"></span></div>
                                <div class="ulockd-info">
                                    <h3>Openig Hour</h3>
                                    <p class="ulockd-addrss">Sat-Thi 9:00-20:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Styles -->
            <header class="header-nav">
                <div class="main-header-nav navbar-scrolltofixed">
                    <div class="container">
                        <nav class="navbar navbar-default bootsnav menu-style1 light-blue">
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbar-menu">
                                <ul class="nav navbar-nav navbar-left" data-in="fadeIn">
                                    <li class="dropdown">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="about.php">About</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="service.php" class="dropdown-toggle">Services</a>
                                        <ul class="dropdown-menu">
                                            <?php
                                                if($result_serv_view->num_rows > 0) {
                                                    while ($rows_of_serv = $result_serv_view->fetch_assoc()) {
                                            ?>
                                            <li><a href="service_details.php?service_id=<?php echo $rows_of_serv['id']; ?>"><?php echo $rows_of_serv['title']; ?></a></li>
                                            <?php
                                                } } else {
                                                    echo "";
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="department.php" class="dropdown-toggle">Department</a>
                                        <ul class="dropdown-menu">
                                        <?php
                                            if($result_dept_view->num_rows > 0) {
                                                while ($rows_of_dept = $result_dept_view->fetch_assoc()) {
                                        ?>
                                            <li><a href="department-details.php?dept_id=<?php echo $rows_of_dept['id']; ?>"><?php echo $rows_of_dept['dept_name']; ?></a></li>
                                        <?php  }} ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="team.php" class="dropdown-toggle">Stuff</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="team-details.php">Doctors</a></li>
                                            <li><a href="stuff_details.php">General Stuff</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="notice.php">Notice</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="carrer.php">Career</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="gallery.php">Gallery</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="contact.php">Contact</a>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                    </div>			        
                    </nav>
                </div>
            </header>