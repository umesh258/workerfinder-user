<?php

session_start();
require './connection.php';

if(isset($_POST['lsubmit']))
{
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);

	$sq = mysqli_query($con,"select * from tbl_workermaster where worker_email='{$email}' and worker_password='{$pass}'") or die("Error sq".mysqli_error($con));
	$count = mysqli_num_rows($sq);
	$fr = mysqli_fetch_array($sq);

	if($count>0)
	{
		$_SESSION['wid']=$fr['worker_id'];
		$_SESSION['wname']=$fr['worker_name'];
		$_SESSION['wemail']=$email;
		$_SESSION['waddress']=$fr['worker_address'];
		header("location:workerprofile.php");

	}else
	{
		echo "<script>alert('Password Doesnot Match!');</script>"; 
	}
}

if(isset($_POST['wrsubmit']))
{
	$name = mysqli_real_escape_string($con,$_POST['wname']);
    $email = mysqli_real_escape_string($con,$_POST['wemail']);
	$gender = $_POST['gender'];
    $dob = mysqli_real_escape_string($con,$_POST['dob']);
    $address = mysqli_real_escape_string($con,$_POST['waddress']);
	$city = mysqli_real_escape_string($con,$_POST['city']);
    $category = $_POST['category'];
    $filepath = $_FILES['photo']['name'];
    $filelocation = $_FILES['photo']['tmp_name'];
    $exp = mysqli_real_escape_string($con,$_POST['wexp']);
    $abt = mysqli_real_escape_string($con,$_POST['wabt']);
    $time = mysqli_real_escape_string($con,$_POST['wtime']);
    $charges = mysqli_real_escape_string($con,$_POST['wcharges']);
	$pass = mysqli_real_escape_string($con,$_POST['wpass']);
	$cpass = mysqli_real_escape_string($con,$_POST['wcpass']);
	
	if($pass == $cpass)
	{
         $fileprocess = move_uploaded_file($filelocation , "workerimg/".$filepath);
        if($fileprocess)
            {
                $iq = mysqli_query($con,"insert into tbl_workermaster (worker_name,worker_email,worker_password,worker_gender,worker_dob,worker_address,area_id,category_id,worker_photo,worker_exp,worker_aboutme,worker_time,worker_charge)
	        	 values('{$name}','{$email}','{$pass}','{$gender}','{$dob}','{$address}','{$city}','{$category}','{$filepath}','{$exp}','{$abt}','{$time}','{$charges}')")or die("Error in iq".mysqli_error($con));
                        if($iq)
                        {
                            echo "<script>alert('Registration Successfull !');</script>";
                        }
            }else
            {
                echo "<script>alert('Please INsert Image !');</script>";
            }
		
		 
	}else
	{
		echo "<script>alert('Password and confirm password Mustbe Same !');</script>";
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
				<ul class="header-top-nav header-top-nav__tertiary">
					<li><a href="login.php"><i class="fa fa-user-plus"></i> Register</a></li>
					<li><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
			<!-- Header Top Bar / End -->
		<?php require './themeportion/menu.php'; ?>
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
							<h1>Worker Login</h1>
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
								<h3>Login</h3>
								<form method="POST" role="form">
									<div class="form-group">
										<label>Email address <span class="required">*</span></label>
										<input type="text" name="email" class="form-control" required>
									</div>
									<div class="form-group">
										<div class="clearfix">
											<label class="pull-left">
												Password <span class="required">*</span>
											</label>
											<span class="pull-right"><a href="workerforgotpass.php">Lost password?</a></span>
										</div>
										<input type="password" name="pass" class="form-control" required>
									</div>
									<button type="submit" name="lsubmit" class="btn btn-primary btn-inline">Login</button>&nbsp; &nbsp; &nbsp; 
									<label for="remember" class="checkbox-inline">
										<input type="checkbox" name="remember" id="remember"> Remember me
									</label>
								</form>
							</div>
						</div>
						<div class="col-md-6">
							<div class="spacer-lg visible-sm visible-xs"></div>
							<div class="box">
								<h3>Register</h3>
								<form method="POST" enctype="multipart/form-data" role="form">
								<div class="form-group">
										<label>Full Name<span class="required">*</span></label>
										<input type="text" name="wname" class="form-control" required>
									</div>
                                    <div class="form-group">
										<label>Email<span class="required">*</span></label>
										<input type="email" name="wemail" class="form-control" required>
									</div>
                                    
									<div class="form-group">
										<label>Gender<span class="required">*</span></label>
										<input type="radio" name="gender" value="1" required>Male
										<input type="radio" name="gender" value="0" required>Female
									</div>
									
									<div class="form-group">
										<label>DOB <span class="required">*</span></label>
										<input type="date" name="dob" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Address <span class="required">*</span></label>
										<textarea type="text" name="waddress" class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<label>City <span class="required">*</span></label>
										<select name="city" required>
										<?php

											$csq = mysqli_query($con,"select * from tbl_area")or die("Error csq".mysqli_error($con));
											while($cfr = mysqli_fetch_array($csq))
											{
												echo "<option value='{$cfr['area_id']}'>{$cfr['area_name']}</option>";
											}
												

										?>
										</select>
									</div>
                                    <div class="form-group">
										<label>Category <span class="required">*</span></label>
										<select name="category" required>
										<?php

											$catsq = mysqli_query($con,"select * from tbl_category")or die("Error csq".mysqli_error($con));
											while($catfr = mysqli_fetch_array($catsq))
											{
												echo "<option value='{$catfr['category_id']}'>{$catfr['category_name']}</option>";
											}
												

										?>
										</select>
									</div> 

                                    <div class="form-group">
										<label>Photo <span class="required">*</span></label>
										<input type="file" name="photo" class="form-control" >
									</div>
                                    <div class="form-group">
										<label>Experience <span class="required">*</span></label>
										<input type="text" name="wexp" class="form-control" required>
									</div>
                                    <div class="form-group">
										<label>Aboutme <span class="required">*</span></label>
										<textarea type="text" name="wabt" class="form-control" required></textarea>
									</div>
                                    <div class="form-group">
										<label>Time <span class="required">*</span></label>
										<input type="time" name="wtime" class="form-control" required>
									</div>
                                    <div class="form-group">
										<label>Charges <span class="required">*</span></label>
										<textarea type="text" name="wcharges" class="form-control" required></textarea>
									</div>

											
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>
													Password <span class="required">*</span>
												</label>
												<input type="password" name="wpass" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>
													Re-enter Password <span class="required">*</span>
												</label>
												<input type="password" name="wcpass" class="form-control" required>
											</div>
										</div>
									</div>
									<button type="submit" name="wrsubmit" class="btn btn-primary">Register</button>
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