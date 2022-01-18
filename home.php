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
	<title>Handyman - Job Board HTML Template</title>
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
	<link rel="stylesheet" href="vendor/flexslider/flexslider.css" media="screen">
	<link rel="stylesheet" href="vendor/job-manager/frontend.css" media="screen">

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
    
			<!-- Header Top Bar / End -->
			
			<?php  require './themeportion/menu.php'; ?>
				</div>
			</div>
			
		</header>
		<!-- Header / End -->


		<!-- Main -->
		<div class="main" role="main">

			<!-- Slider -->
			<section class="slider-holder">
				<div class="flexslider carousel">
					<ul class="slides">
						<li>
							<img src="images/samples/slide1.jpg" alt="" />
						</li>
						<li>
							<img src="images/samples/slide2.jpg" alt="" />
						</li>
						<li>
							<img src="images/samples/slide3.jpg" alt="" />
						</li>
					</ul>

					<div class="search-box">
						<div class="container">
							<div class="search-box-inner">
								<h1>Search for Professionals</h1>
								<form method="GET" role="form">
								
									<div class="row">
										<div class="col-md-3 col-md-offset-1">
											<div class="form-group">
												<select name="worker" class="form-control">
													<option>All Professional</option>
													
													<?php

															$wsq = mysqli_query($con,"select * from tbl_workermaster")or die("Error WSQ".mysqli_error($con));
															$wcount = mysqli_num_rows($wsq);
															while($wfr = mysqli_fetch_array($wsq))
															{
																echo "<option value='{$wfr['worker_id']}'> {$wfr['worker_name']}</option>";
															}

															

														?>
											</select>
										
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<select name="city" class="form-control">
															<option>Any location</option>
															<?php

																$asq = mysqli_query($con,"select * from tbl_area")or die("Error in ASQ".mysqli_error($con));
																$acount = mysqli_num_rows($asq);
																while($afr = mysqli_fetch_array($asq))
																{
																	echo "<option value='{$afr['area_id']}'>{$afr['area_name']}</option>";
																}


															?>
											</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="select-style">
													<select class="form-control">
														<option>All Services</option>
														<?php
															$csq = mysqli_query($con,"select * from tbl_category")or die("Error CSQ".mysqli_error($con));
															$ccount = mysqli_num_rows($csq);
															while($cfr = mysqli_fetch_array($csq))
															{
																echo "<option value='{$cfr['category_id']}'>{$cfr['category_name']}</option>";
															}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Slider / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">

					<!-- Stats -->
					<div class="section-light section-nomargin">
						<div class="section-inner">
							<div class="row">
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-suitcase"></i>
										<span class="counter-wrap">
											<span class="counter"  data-speed="1500" data-refresh-interval="50"><?php echo $ccount ?></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Jobs</span>
										</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-thumbs-o-up"></i>
										<span class="counter-wrap">
											<span class="counter"  data-speed="1500" data-refresh-interval="50"><?php echo $acount ?></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Area Cover</span>
										</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-user"></i>
										<span class="counter-wrap">
											<span class="counter"  data-speed="1500" data-refresh-interval="50"><?php echo $wcount ?></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Professionals</span>
										</span>
									</div>
								</div>
								<?php 
									$usq = mysqli_query($con,"select * from tbl_usermaster")or die("Error USQ".mysqli_error($con));
									$ucount=mysqli_num_rows($usq);
								?>
								<div class="col-md-3">
									<div class="counter-holder counter-dark">
										<i class="fa fa-3x fa-users"></i>
										<span class="counter-wrap">
											<span class="counter" data-speed="1500" data-refresh-interval="50"><?php echo $ucount ?></span>
										</span>
										<span class="counter-info">
											<span class="counter-info-inner">Members</span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Stats / End -->

					<div class="spacer-xl"></div>

					<!-- Listings -->
					<div class="title-bordered">
						<h2>Our Professionals <small>Latest added</small></h2>
					</div>
					<div class="job_listings">
					<?php
						if(isset($_GET['worker']))
						{
							$worker = $_GET['worker'];
							$wpq = mysqli_query($con,"select * from tbl_workermaster where worker_id='{$worker}'")or die("Erro WPQ".mysqli_error($con));
						}else
						{
							$wpq = mysqli_query($con,"select * from tbl_workermaster")or die("Erro WPQ".mysqli_error($con));
						}
										
										while($wpfr = mysqli_fetch_array($wpq))
										{
											
										

					?>
					<ul class="job_listings">
							<li class="job_listing">
								<?php echo"<a href='profile.php?wid={$wpfr['worker_id']}'>"; ?>
									<div class="job_img">
									
								<?php echo "<img src='workerimg/{$wpfr['worker_photo']}' alt='456' class='company_logo'>"; ?>
										
									</div>
									<div class="position">
										<h3><?php echo $wpfr['worker_name'] ?></h3>
										<div class="company">
											<strong><?php echo $wpfr['worker_aboutme'] ?></strong>
										</div>
									</div>
									<div class="location">
										<i class="fa fa-location-arrow"></i> <?php 
										
											$apsq = mysqli_query($con,"select * from tbl_area where area_id='{$wpfr['area_id']}'")or die("Erro APSQ".mysqli_error($con));
										
										
										while($apfr=mysqli_fetch_array($apsq))
										{
											echo $apfr['area_name'];
										}
										?>
									</div>
									<div class="rating">
										<div class="rating-stars">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</div>
										<div class="reviews-num">12 Reviews</div>
									</div>
									<ul class="meta">
										<li class="job-type">
											<?php  
										  		$csq = mysqli_query($con,"select category_name from tbl_category where category_id='{$wpfr['category_id']}'")or die("Error CSQ".mysqli_error($con));
												  $cfr = mysqli_fetch_array($csq);
												  echo $cfr['category_name'];
											  ?>
										</li>
										<li class="date">
											Posted 1 month ago
										</li>
									</ul>
								</a>
							</li>

										<?php
										}
										?>					
					</div>

					<div class="spacer"></div>

					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<a class="btn btn-default btn-block" href="#">View All Professionals</a>
						</div>
					</div>

					<!-- Listings / End -->

					<div class="spacer-xxl"></div>

					<!-- Promobox -->
					
					<div class="promobox" data-stellar-background-ratio="0.5">
						<div class="row">
						<?php  
							
							$worker = mysqli_query($con,"select * from tbl_workermaster where worker_id between 4 and 6")or die("Error workerq".mysqli_error($con));
							while($workfr = mysqli_fetch_array($worker))
							{

								$category = mysqli_query($con,"select category_name from tbl_category where category_id='{$workfr['category_id']}'")or die("Error categoryq".mysqli_error($con));
								$catfr = mysqli_fetch_array($category);
							
						?>

						<div class="col-md-4 promobox-item">
								<h4><span>For</span> <?php  echo $catfr['category_name']  ?>  </h4>
								<?php echo "<img src='workerimg/{$workfr['worker_photo']}' alt='' class='img-responsive'>"; ?>
								<a href="#" class="btn btn-primary btn-sm"></a>
							</div>
							<?php  }	?>
						</div>
					
					</div>
					<!-- Promobox / End -->

					<div class="spacer-lg"></div>

					<!-- Services -->
					<div class="title-bordered">
						<h2>Our Services <small>services we provided</small></h2>
					</div>
					
					<div class="row">
							<?php

							$category = mysqli_query($con,"select * from tbl_category where category_id between 1 and 3")or die("Error categoryq".mysqli_error($con));
							while($catfr = mysqli_fetch_array($category))
							{
							?>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
							<?php echo "<img style='width: 100px; height:120px;' src='categoryimg/{$catfr['category_photo']}'>"; ?>
							   
								</div>
								<div class="icon-box-body">
									<h5><?php echo $catfr['category_name'] ?></h5>
									<p>We are professional tile installers who can install and repair tile in many areas of your home.</p>
								</div>
								
							</div>

							</div>
						<?php
							}
						?>
					</div>
					
					<div class="row">
						<?php

							$category = mysqli_query($con,"select * from tbl_category where category_id between 4 and 6")or die("Error categoryq".mysqli_error($con));
							while($catfr = mysqli_fetch_array($category))
							{
							?>
						<div class="col-md-4">
							<div class="icon-box">
							<div class="icon">
							<?php echo "<img style='width: 100px; height:120px;' src='categoryimg/{$catfr['category_photo']}'>"; ?>
								</div>
								<div class="icon-box-body">
									<h5><?php echo $catfr['category_name'] ?></h5>
									<p>We are professional tile installers who can install and repair tile in many areas of your home.</p>
								</div>
								
							</div>

						</div>
						<?php } ?>
					</div>
					<div class="row">
						<?php

							$category = mysqli_query($con,"select * from tbl_category where category_id between 7 and 9")or die("Error categoryq".mysqli_error($con));
							while($catfr = mysqli_fetch_array($category))
							{
							?>
						<div class="col-md-4">
							<div class="icon-box">
							<div class="icon">
							<?php echo "<img style='width: 100px; height:120px;' src='categoryimg/{$catfr['category_photo']}'>"; ?>
								</div>
								<div class="icon-box-body">
									<h5><?php echo $catfr['category_name'] ?></h5>
									<p>We are professional tile installers who can install and repair tile in many areas of your home.</p>
								</div>
								
							</div>

						</div>
						<?php } ?>
					</div>

					
					<!-- Services / End -->

					<!-- Clients -->
					
					<!-- Clients / End -->

					
					<!-- Testimonials / End -->

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
	<script src="vendor/flexslider/jquery.flexslider-min.js"></script>
	<script src="vendor/jquery.countTo.js"></script>

	<!-- Newsletter Form -->
	<script src="vendor/jquery.validate.js"></script>
	<script src="js/newsletter.js"></script>

	<script src="js/custom.js"></script>

	<script>
		jQuery(function($){
			$('body').addClass('loading');
		});
		
		$(window).load(function(){
			$('.flexslider').flexslider({
				animation: "fade",
				controlNav: true,
				directionNav: false,
				prevText: "",
				nextText: "",
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	
</body>
</html>