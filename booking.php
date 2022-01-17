<?php

session_start();
require './connection.php';
if(!isset($_SESSION['uid']))
{
    header("location:login.php");
}

if(isset($_POST['bsubmit']))
{
    $date = date("d-m-Y");
    $uid = $_SESSION['uid'];
    $wid= $_GET['wid'];
	$charges = $_GET['wcharge'];
    $bdate = $_POST['bdate'];
    $time = $_POST['time'];
    $pblm = $_POST['pblm'];
    $filepath = $_FILES['photo']['name'];
    $filelocation = $_FILES['photo']['tmp_name'];
     
    
    
    $biq = mysqli_query($con,"insert into tbl_bookingmaster (date,user_id,worker_id,book_date,book_time,book_problemdetails,book_charges,book_photo,status)
     values('{$date}','{$uid}','{$wid}','{$bdate}','{$time}','{$pblm}','{$charges}','{$filepath}','1')") or die("Erro biq".mysqli_error($con));
     
     if($biq)
     {
         move_uploaded_file($filelocation , "bookingimg/".$filepath);    
         echo "<script>alert('Booking Success Shortly Time to Admin Answer !');window.location='jobdashboard.php';</script>";
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
	<title>Login | Handyman </title>
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

			<!-- Header Top Bar / End -->
		<?php 
        require './themeportion/header.php';
        require './themeportion/menu.php'; ?>
					<!-- Navigation / End -->

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
							<h1>Booking</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					<div class="row">
						<div class="col-md-6">
							<div class="box">
								<h3>Booking</h3>
								<form method="POST" role="form" enctype="multipart/form-data">
									<div class="form-group">
										<label>Bookdate <span class="required">*</span></label>
										<input type="date" name="bdate" class="form-control" required>
									</div>
                                    <div class="form-group">
										<label>Time <span class="required">*</span></label>
										<input type="time" name="time" class="form-control" required>
									</div>
                                    <div class="form-group">
										<label>Problemdetails <span class="required">*</span></label>
										<input type="text" name="pblm"  class="form-control" required>
                                        
                                    
									</div>
									<div class="form-group">
										<label>Photo </label>
										<input type="file" name="photo" class="form-control">
									</div>
									<button type="submit" name="bsubmit" class="btn btn-primary btn-inline">Order</button>&nbsp; &nbsp; &nbsp; 
									<button type="submit" onclick="window.location='workerteam.php';" class="btn btn-primary btn-inline">Cancel</button>&nbsp; &nbsp; &nbsp; 

								</form>
							</div>
						</div>
						
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