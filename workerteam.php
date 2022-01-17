<?php


session_start();
require './connection.php';


if(!isset($_SESSION['uid']))
{
?>
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

<?php
}else
{
	require './themeportion/header.php';
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
	<title>Team | Handyman - Job Board HTML Template</title>
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
			<?php  
            
            require './themeportion/menu.php';
            ?>
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
							<h1>Team</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
				
					<ul class="team-list row">
					<?php
							$wsq = mysqli_query($con,"select * from tbl_workermaster")or die("error WSQ".mysqli_error($con));
							while($wfr = mysqli_fetch_array($wsq))
							{
								$csq = mysqli_query($con,"select category_name from tbl_category where category_id='{$wfr['category_id']}'")or die("error in CSQ".mysqli_error($con));
								$cfr = mysqli_fetch_array($csq);
							
						?>		
					<li class="team-item col-md-3">
					
							<div class="team-item-inner">
								<figure class="team-thumb">
								<?php echo "<img style='width: 200px; height: 200px;' src='workerimg/{$wfr['worker_photo']}' alt=''>"; ?>
								</figure>
								<div class="team-body">
									<h5 class="team-name"><?php echo $wfr['worker_name'] ?></h5>
									<span class="team-body-info"><?php echo $cfr['category_name'] ?></span>
									<ul class="team-social list-unstyled">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<?php echo "<li><a href='profile.php?wid={$wfr['worker_id']}'>More Details</a></li>"; ?>
									</ul>
								</div>
							</div>
							
						</li>
						<?php } ?>
					</ul>
					
				</div>
			</section>
			<!-- Page Content / End -->

			<!-- Footer -->
			<?php 
            require './themeportion/footer.php';
             ?>
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