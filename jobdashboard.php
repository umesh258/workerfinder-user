<?php

session_start();
require './connection.php';
if(!isset($_SESSION['uid']))
{
	header("location:login.php");
}
?>

<script>
	function ConfirmDelete()
	{
		var x = confirm("Are you sure want to delete");
		if(x)
		{
			return true;
		}else
		{
			return false;
		}
	}
</script>

<?php
if(isset($_GET['did']))
{
	$did = $_GET['did'];

	$bdq = mysqli_query($con,"delete from tbl_bookingmaster where book_id='{$did}'")or die(mysqli_error($con));
	if($bdq)
	{
		echo "<script>alert('Booking Deleted');</script>";
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
	<title>Dashboard | Handyman - Job Board HTML Template</title>
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
			require './themeportion/header.php';
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
							<h1>My Dashboard</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					

					<div id="job-manager-job-dashboard">
						<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
							Your job listings are shown in the table below. Expired listings will be automatically removed after 30 days.
						</div>

						<div class="table-responsive">
							<table class="job-manager-jobs table table-bordered table-striped">
								<thead>
									<tr>
										<th class="job_title">#</th>
										<th class="job_title">Date</th>
										<th class="date">Worker Name</th>
										<th class="date">Book Date</th>
										<th class="date">Time</th>
										<th class="date">Issue</th>
										<th class="date">Amount</th>
										<th class="status">Image</th>
										<th class="expires">Status</th>
										<th class="filled">Action</th>
									</tr>
								</thead>
								<?php 
									$i = 0;
									$grandtotal=array();
									$bsq = mysqli_query($con,"select * from tbl_bookingmaster where user_id='{$_SESSION['uid']}'")or die("Error Bsq".mysqli_error($con));
									$bcount = mysqli_num_rows($bsq);
									echo "$bcount Bookings Found";
									while($bfr = mysqli_fetch_array($bsq))
									{
										$i++;
											$wnsq = mysqli_query($con,"select worker_name from tbl_workermaster where worker_id='{$bfr['worker_id']}'")or die("error WNSQ".mysqli_error($con));
											$wnfr = mysqli_fetch_array($wnsq);
									
								?>
								<tbody>
									<tr>
									<td ><?php echo $i ?></td>
										<td class="job_title">
										<?php echo $bfr['date'] ?>
											
										</td>
										
										<td ><?php echo $wnfr['worker_name'] ?></td>
										<td> <?php echo $bfr['book_date'] ?></td>
										<td> <?php echo $bfr['book_time'] ?></td>
										<td> <?php echo $bfr['book_problemdetails'] ?></td>
										<td> <?php echo $bfr['book_charges'] ?></td>
										<td> <?php echo "<img style='width: 50px;' src='bookingimg/{$bfr['book_photo']}'>";?></td>
										<td> <?php echo $bfr['status'] ?></td>
										<?php echo "<td><a Onclick='return ConfirmDelete();' href='?did={$bfr['book_id']}'> Remove </a> | <a href='workerteam.php'>Add</a></td>"; 

												$grandtotal[]=$bfr['book_charges'];  ?>
											
									</tr>
									
								</tbody>
								<?php } ?>
								<tr>
										<?php $finalsum=array_sum($grandtotal); ?>
										<td colspan="7" align="right"><?php  echo "Total Amount Rs.".$finalsum;  ?></td>
									</tr>
							</table>
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