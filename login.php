<?php

session_start();
require './connection.php';

if(isset($_POST['lsubmit']))
{
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);

	$sq = mysqli_query($con,"select * from tbl_usermaster where user_email='{$email}' and user_password='{$pass}'") or die("Error sq".mysqli_error($con));
	$count = mysqli_num_rows($sq);
	$fr = mysqli_fetch_array($sq);

	if($count>0)
	{
		$_SESSION['uid']=$fr['user_id'];
		$_SESSION['uname']=$fr['user_name'];
		$_SESSION['email']=$email;
		$_SESSION['umobile']=$fr['user_mobile'];
		$_SESSION['uaddress']=$fr['user_address'];
		header("location:home.php");

	}else
	{
		echo "<script>alert('Password Doesnot Match!');</script>"; 
	}
}

if(isset($_POST['rsubmit']))
{
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$gender = $_POST['gender'];
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$mb = mysqli_real_escape_string($con,$_POST['mb']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$city = mysqli_real_escape_string($con,$_POST['city']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);
	$cpass = mysqli_real_escape_string($con,$_POST['cpass']);
	
	if($pass == $cpass)
	{
		$iq = mysqli_query($con,"insert into tbl_usermaster (user_name,user_gender,user_email,user_mobile,user_address,user_password,area_id)
		 values('{$name}','{$gender}','{$email}','{$mb}','{$address}','{$pass}','{$city}')")or die("Error in iq".mysqli_error($con));

		 if($iq)
		 {
			echo "<script>alert('Registration Successfull !');</script>";
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
							<h1>Login</h1>
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
											<span class="pull-right"><a href="forgotpass.php">Lost password?</a></span>
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
								<form method="POST" role="form">
								<div class="form-group">
										<label>Full Name<span class="required">*</span></label>
										<input type="text" name="name" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Gender<span class="required">*</span></label>
										<input type="radio" name="gender" value="1" required>Male
										<input type="radio" name="gender" value="0" required>Female
									</div>
									<div class="form-group">
										<label>Email address <span class="required">*</span></label>
										<input type="text" name="email" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Mobile NO <span class="required">*</span></label>
										<input type="number" name="mb" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Address <span class="required">*</span></label>
										<textarea type="text" name="address" class="form-control" required></textarea>
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


											
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>
													Password <span class="required">*</span>
												</label>
												<input type="password" name="pass" class="form-control" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>
													Re-enter Password <span class="required">*</span>
												</label>
												<input type="password" name="cpass" class="form-control" required>
											</div>
										</div>
									</div>
									<button type="submit" name="rsubmit" class="btn btn-primary">Register</button>
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