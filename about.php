<?php

session_start();
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
	<title>About Us | Handyman - Job Board HTML Template</title>
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
							<h1>About Us</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					<div class="row">
						<div class="col-md-5">
							<figure class="alignnone">
								<img style='width: 300px; ' src="sunny.jpg" alt="" class="img-circle">
							</figure>
						</div>
						<div class="col-md-6 col-md-offset-1">
							<h2>Welcome to Our Site!</h2>
							<p>Every home owner has a list of handyman, home repair, or home improvement projects he or she needs done - both interior and exterior. Sometimes that list can get quite long, too! The bathrooms that needs updating. The garbage disposal that's on the fritz. The basement that needs drywall repairs. Call our professionalis and save your money!</p>

							<div class="list">
								<ul>
									<li>Environmental Consulting &amp; Services</li>
									<li>Handiwork</li>
									<li>Lighting Design</li>
									<li>Waste &amp; Junk Removal Services</li>
									<li>Landscape Design</li>
									<li>And much more...</li>
								</ul>
							</div>

							<div class="spacer-sm"></div>
							
							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
					</div>

					
				
					<div class="spacer-xl"></div>

					<div class="row">
						<div class="col-md-6">
							<h2>Our Mission</h2>
							<p>Remodeling your home can be stressful. It’s hard to know where to turn in the case of an emergency repair.</p>

							<p>Commercial work needs to be completed professionally and in a timely manner with extra consideration of codes and regulations. We eliminate the need to flip through the yellow pages, we take away the stress and worry, and most importantly we get the job done right.</p>

							<p>We promise to provide you with outstanding service that you can trust for all of your repair needs.</p>

							<a href="#" class="btn btn-primary">Learn More</a>
						</div>
						<div class="col-md-6">
							<h2>Why People Choose Us?</h2>
							<div class="panel-group panel-group__alt" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-1">
												Quality Service
											</a>
										</h4>
									</div>
									<div id="accordion-1" class="panel-collapse collapse in">
										<div class="panel-body">
											We're here to keep our customers with my low prices and good work (workmanship you can trust) We stand behind my work.
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-2" class="collapsed">
												Trusted Professionals
											</a>
										</h4>
									</div>
									<div id="accordion-2" class="panel-collapse collapse">
										<div class="panel-body">
											We're the largest employer of home repair contractors in the world. Our dedication in hiring and retaining the very best home maintenance and repair technicians is why we are able to deliver a 99% customer satisfaction rating.
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-3" class="collapsed">
												Experience and Skill
											</a>
										</h4>
									</div>
									<div id="accordion-3" class="panel-collapse collapse">
										<div class="panel-body">
											We've consistently hired experienced, reliable employees whose skills are further refined through technical and customer service training.
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-4" class="collapsed">
												Honesty and Integrity
											</a>
										</h4>
									</div>
									<div id="accordion-4" class="panel-collapse collapse">
										<div class="panel-body">
											We are ready to be your long term partner for all of your needs. Contact us to day and see how we can help you!
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<hr class="xlg">

					<h2>Our Clients</h2>
					<div class="row">
						<div class="col-sm-3 col-md-3">
							<div class="text-center">
								<a href="#"><img src="images/samples/client-logo1-light.png" alt="" class="img-responsive"></a>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="text-center">
								<a href="#"><img src="images/samples/client-logo2-light.png" alt="" class="img-responsive"></a>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="text-center">
								<a href="#"><img src="images/samples/client-logo3-light.png" alt="" class="img-responsive"></a>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="text-center">
								<a href="#"><img src="images/samples/client-logo4-light.png" alt="" class="img-responsive"></a>
							</div>
						</div>
					</div>

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