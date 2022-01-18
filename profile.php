<?php

session_start();

require './connection.php';

if(isset($_GET['wid']))
{
	$wid = $_GET['wid'];
	$wsq = mysqli_query($con,"select * from tbl_workermaster where worker_id='{$wid}'")or die("Error WSQ".mysqli_error($con));
	$wfr = mysqli_fetch_array($wsq);
	$csq = mysqli_query($con,"select category_name from tbl_category where category_id='{$wfr['category_id']}'")or die("Error CSQ".mysqli_error($con));
	$cfr = mysqli_fetch_array($csq);
    $asq = mysqli_query($con,"select area_name from tbl_area where area_id='{$wfr['area_id']}'")or die("Error ASQ".mysqli_error($con));
	$afr = mysqli_fetch_array($asq);
    
}else
{
	header("location:workerteam.php");
}


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
	<title>Profile | Handyman - Job Board HTML Template</title>
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

		<!-- Header -->
		<header class="header header-menu-fullw">

			<!-- Header Top Bar -->
			<?php  
                                require './themeportion/menu.php';
            ?>

					<!-- Navigation -->
					
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
							<h1>Profile</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">

					<div class="row">
						<div class="content col-md-8">

							<div class="box mb-30">
								<div class="job-profile-info">
									<div class="row">
										<div class="col-md-5">
											<figure class="alignnone">
											<?php echo "<img src='workerimg/{$wfr['worker_photo']}' alt='123'>"; ?>
											</figure>
										</div>
										<div class="col-md-7">
											<h2 class="name"><?php echo $wfr['worker_name'] ?></h2>
											<i class="tagline">Please write a few words about your service</i>
											<ul class="meta">
												
												<li><?php echo $cfr['category_name']  ?></li>
											</ul>
											<ul class="info">
												<li><i class="fa fa-location-arrow"></i> <?php echo $afr['area_name']  ?> </li>
												<li><i class="fa fa-ruppy-o"></i> <?php echo "Service Charge Rs.".$wfr['worker_charge'] ?>  Updated </li>
											</ul>
										</div>
									</div>

									<div class="spacer-lg"></div>
									
									<h4>Description</h4>
									<p><?php echo $wfr['worker_aboutme'] ?></p>

									
									
									
																		<!-- Google Map / End -->
									
								</div>
							</div>

							<!-- Additional Info Tabs -->
							<div class="tabs">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab1-1" data-toggle="tab">Reviews</a></li>
									<li><a href="#tab1-2" data-toggle="tab">Details</a></li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab1-1">
										<!-- Comments -->
										<div class="comments-wrapper">
											<h3>Reviews</h3>
											<ol class="commentlist">
                                                <?php  
                                                    $fsq = mysqli_query($con,"select * from tbl_feedback where worker_id={$wid}")or die("Error FSQ".mysqli_error($con));
                                                    while($ffr = mysqli_fetch_array($fsq))
                                                    {
                                                        $unsq = mysqli_query($con,"select user_name from tbl_usermaster where user_id='{$ffr['user_id']}'")or die("Error UNSQ".mysqli_error($con));
                                                        $unfr = mysqli_fetch_array($unsq);

                                                    
                                                ?>
												<li class="comment">
													<div class="comment-wrapper">
														<div class="comment-author vcard">
															<img src="images/samples/user2-sm.jpg" alt="" class="gravatar">
															<h5><?php echo $unfr['user_name']  ?></h5>
															<span class="says">says:</span>
															<div class="comment-meta">
																<a href="#"><?php echo $ffr['feed_date']  ?></a>
															</div>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
														</div>
														<div class="comment-body">
															<?php  echo $ffr['feed_details'] ?>
														</div>
													</div>
												</li>
												<?php  } ?>
											</ol>
										</div>
										<!-- Comments / End -->

										<!-- Comments Form -->
										
										<!-- Comments Form / End -->
									</div>
									<div class="tab-pane fade" id="tab1-2">
										<div class="row">
											<div class="col-sm-6 col-md-6">
												<h4>Skills</h4>
												<div class="list list__arrow2">
													<ul>
														<li>Paint</li> 
														<li>Drywall/Plaster Repairs</li> 
														<li>Shelves</li>
														<li>Chair Rails</li> 
														<li>Hardware Replacement</li>
													</ul>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<h4>Experience</h4>
												<div class="list list__arrow2">
													<ul>
														<li>Sink/Faucet Replacement</li> 
														<li>Lighting</li> 
														<li>Crown/Base Molding</li>
														<li>Electrical</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Additional Info Tabs / End -->

						</div>

						<!-- Sidebar -->
						
						<aside class="sidebar col-md-4">
							<hr class="visible-sm visible-xs lg">
							<?php if(isset($_SESSION['uid']))
								{

								
							
							?>
							<div class="box box__color-darken mb-30">
								<form method="get" action="booking.php">
									<input type="hidden" name="wid" value="<?php echo $wfr['worker_id'] ?>">
									<input type="hidden" name="wcharge" value="<?php echo $wfr['worker_charge'] ?>">
									<?php echo "<button class='btn btn-primary btn-inline' type='submit'>Book</button>"; ?>
									
													</form>
								<button onclick="window.location='workerlogin.php';" class="btn btn-primary btn-inline" type="submit">Worker Login</button>
							</div>
							<?php  }else
							{ ?>
								<div class="box box__color-darken mb-30">
								<form method="get" action="login.php">
									
									<?php echo "<button class='btn btn-primary btn-inline' type='submit'>Book</button>"; ?>
									
													</form>
								<button onclick="window.location='workerlogin.php';" class="btn btn-primary btn-inline" type="submit">Worker Login</button>
							</div>
						<?php	}  ?>
							
							<div class="box box__color-darken mb-30">
								<h4>Social Profiles</h4>
								<ul class="social-links social-links__dark">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>

							<div class="box box__color-darken mb-30">
								<h4>Contact Timing</h4>
								<div class="table-responsive">
									<table class="table table-striped business-hours">
										<tbody>
											<tr>
												<td><i class="fa fa-clock-o"></i> Sunday</td>
												<td>9:00 - 18:00</td>
											</tr>
											<tr>
												<td><i class="fa fa-clock-o"></i> Monday</td>
												<td>9:00 - 18:00</td>
											</tr>
											<tr>
												<td><i class="fa fa-clock-o"></i> Tuesday</td>
												<td>9:00 - 18:00</td>
											</tr>
											<tr>
												<td><i class="fa fa-clock-o"></i> Wednesday</td>
												<td>9:00 - 18:00</td>
											</tr>
											<tr>
												<td><i class="fa fa-clock-o"></i> Thursday</td>
												<td>9:00 - 18:00</td>
											</tr>
											<tr>
												<td><i class="fa fa-clock-o"></i> Friday</td>
												<td>9:00 - 18:00</td>
											</tr>
											<tr>
												<td><i class="fa fa-clock-o"></i> Saturday</td>
												<td>12:00 - 16:00</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- Table (Bordered) / End -->
							</div>

							
						</aside>
						<!-- Sidebar / End -->

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

	<!-- Google Map -->
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="vendor/jquery.gmap3.min.js"></script>
	
	<!-- Google Map Init-->
	<script type="text/javascript">
		jQuery(function($){
			$('#map_canvas').gmap3({
				marker:{
					address: '40.717599,-74.005136' 
				},
					map:{
					options:{
					zoom: 17,
					scrollwheel: false,
					streetViewControl : true
					}
				}
		    });
		});
	</script>


	
</body>
</html>