<?php

session_start();

require './connection.php';

$fsq = mysqli_query($con,"select * from tbl_feedback where worker_id='{$_SESSION['wid']}'") or die(mysqli_error($con));



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
            <nav class="nav-main">
						<div class="nav-main-inner">
							<ul data-breakpoint="992" class="flexnav">
								<li class=><a href="workerchangepassword.php">Changepassword</a></li>
								
								
									
										
										
										<li><a href="viewbook.php">Booking</a></li>
										<li><a href="workerfeedback.php">Reviews</a></li>
										
										
										
									
								
								
								<li><a href="workerprofile.php">My Profile</a></li>	
								<li><a href="workerlogout.php">Logout</a></li>
							</ul>
						</div>
					</nav>					<!-- Navigation / End -->

				</div>
			</div>

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
							<h1>Review</h1>
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
									
							<!-- Additional Info Tabs -->
							<div class="tabs">
								<!-- Nav tabs -->
								
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab1-1">
										<!-- Comments -->
										<div class="comments-wrapper">
											<h3>Reviews</h3>
											<ol class="commentlist">
                                                <?php  
                                                   while($ffr = mysqli_fetch_array($fsq))
                                                   {

                                                   $usq = mysqli_query($con,"select user_name from tbl_usermaster where user_id='{$ffr['user_id']}'")or die(mysqli_error($con));
                                                   $ufr = mysqli_fetch_array($usq);


                                                    
                                               ?>
												<li class="comment">
													<div class="comment-wrapper">
														<div class="comment-author vcard">
															<img src="images/samples/user2-sm.jpg" alt="" class="gravatar">
															<h5><?php echo $ufr['user_name']  ?></h5>
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