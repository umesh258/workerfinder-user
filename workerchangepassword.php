<?php

session_start();
require './connection.php';
if(!isset($_SESSION['wid']))
{
	header("location:workerlogin.php");
}
if($_POST)
{
	$opass = mysqli_real_escape_string($con,$_POST['opass']);
	$npass = mysqli_real_escape_string($con,$_POST['npass']);
    $cpass = mysqli_real_escape_string($con,$_POST['cpass']);

	$sq = mysqli_query($con,"select * from tbl_workermaster where worker_email='{$_SESSION['wemail']}' ") or die("Error sq".mysqli_error($con));
	$count = mysqli_num_rows($sq);
	$fr = mysqli_fetch_array($sq);

	if($fr['worker_password'] == $opass)
    {
        if($npass == $cpass)
        {
            if($opass == $npass)
            {
                echo "<script>alert('Old and NewPassword Mustbe Different !');</script>";
            }else
            {
                $uq = mysqli_query($con,"update tbl_workermaster set worker_password='{$npass}' where worker_email='{$_SESSION['wemail']}'")or die("Error in updateq".mysqli_error($con));
                if($uq)
                {
                    echo "<script>alert('Password Change Successfully !');window.location='workerlogin.php';</script>";
                }
            }
        }else
        {
            echo "<script>alert('New and Confirm password Mustbe same !');</script>";    
        }
    }else
    {
        echo "<script>alert('Old Password Doesnot Match !');</script>";
    }
}


?>


<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Changepassword | Handyman </title>
	<meta name="description" content="Handyman - Job Board HTML Template - 1.0">
	<meta name="author" content="http://themeforest.net/user/dan_fisher">


	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	
	
	
	<!-- CSS
	================================================== -->
	<!-- Base + Vendors CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fonts/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/fonts/entypo/css/entypo.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css" media="screen">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css" media="screen">
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" media="screen">

	<!-- Theme CSS-->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/animate.min.css">

   

  <!-- Head Libs -->
	<script src="vendor/modernizr.js"></script>

	
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="120x120" href="images/favicons/favicon-120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/favicons/favicon-152.png">
	
</head>
<body>

	<div class="site-wrapper">

		<!-- Header -->
		<header class="header header-menu-fullw">

			<!-- Header Top Bar -->
			
		<!-- Header -->
		<header class="header header-menu-fullw">

<!-- Header Top Bar -->
<div class="header-top">
	<div class="container">
		<div class="header-top-left">
			<button class="btn btn-sm btn-default menu-link menu-link__secondary">
				<i class="fa fa-bars"></i>
			</button>
			<div class="menu-container">
				<ul class="header-top-nav header-top-nav__secondary">
					<li><a href="#"><i class="fa fa-twitter"></i> <span class="nav-label">Twitter</span></a></li>
					<li><a href="#"><i class="fa fa-facebook"></i> <span class="nav-label">Facebook</span></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i> <span class="nav-label">Google+</span></a></li>
					<li><a href="#"><i class="fa fa-pinterest"></i> <span class="nav-label">Pinterest</span></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i> <span class="nav-label">Instagram</span></a></li>
					<li><a href="#"><i class="fa fa-rss"></i> <span class="nav-label">RSS Feed</span></a></li>
				</ul>
			</div>
		</div>
		<div class="header-top-right">
			<button class="btn btn-sm btn-default menu-link menu-link__tertiary">
				<i class="fa fa-user"></i>
			</button>
			<div class="menu-container">
				
			</div>
		</div>
	</div>
</div>
			<!-- Header Top Bar / End -->
            <nav class="nav-main">
						<div class="nav-main-inner">
							<ul data-breakpoint="992" class="flexnav">
								<li class="active"><a href="workerchangepassword.php">Changepassword</a></li>
								
								
									
										
										
										<li><a href="viewbook.php">Booking</a></li>
										<li><a href="workerfeedback.php">Reviews</a></li>
										
										
									
											
								<li><a href="workerprofile.php">My Profile</a></li>	
								<li><a href="workerlogout.php">Logout</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			
		</header>
		<!-- Header / End -->


		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1>Worker Changepassword</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					<div class="row">
						<div class="col-md-8">
							<div class="box">
								<h3>Changepassword</h3>
								<form method="POST" role="form">
									<div class="form-group">
										<label>Old Password <span class="required">*</span></label>
										<input type="password" name="opass" class="form-control" required>
									</div>
									<div class="form-group">
										<div class="clearfix">
											<label class="pull-left">
												New Password <span class="required">*</span>
											</label>
											
										</div>
										<input type="password" name="npass" class="form-control" required>
									</div>
									 
									<div class="form-group">
										<label>Confirm Password <span class="required">*</span></label>
										<input type="password" name="cpass" class="form-control" required>
									</div>
                                    <button type="submit" class="btn btn-primary btn-inline">Submit</button>&nbsp; &nbsp; &nbsp;
                                    <button type="submit" onclick="window.location='viewbook.php';" class="btn btn-primary btn-inline">Back</button>&nbsp; &nbsp; &nbsp;
								</form>
							</div>
						</div>
						
			</section>
			<!-- Page Content / End -->

			<!-- Footer -->
			<?php require './themeportion/footer.php'; ?>
			<!-- Footer / End -->
			
		</div>
		<!-- Main / End -->
	</div>
	
	
	
	
	
	<!-- Javascript Files
	================================================== -->
	<script src="vendor/jquery-1.11.0.min.js"></script>
	<script src="vendor/jquery-migrate-1.2.1.min.js"></script>
	<script src="vendor/bootstrap.js"></script>
	<script src="vendor/jquery.flexnav.min.js"></script>
	<script src="vendor/jquery.hoverIntent.minified.js"></script>
	<script src="vendor/jquery.flickrfeed.js"></script>
	<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendor/jquery.fitvids.js"></script>
	<script src="vendor/jquery.appear.js"></script>
	<script src="vendor/jquery.stellar.min.js"></script>
	<script src="vendor/jquery.countTo.js"></script>

	<!-- Newsletter Form -->
	<script src="vendor/jquery.validate.js"></script>
	<script src="js/newsletter.js"></script>

	<script src="js/custom.js"></script>


	
</body>
</html>