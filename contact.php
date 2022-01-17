<?php

session_start();
require './connection.php';
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
	
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

if(isset($_POST['csubmit']))
	{
		$name = mysqli_real_escape_string($con,$_POST['name']);
		
		$message = mysqli_real_escape_string($con,$_POST['message']);
	
		$ciq = mysqli_query($con,"insert into tbl_contact(con_name,con_message) values('{$name}','{$message}')")or die(mysqli_error($con));
	
		if($ciq)
		{
			//echo "<script>alert('Record Inserted');</script>";
			//Load Composer's autoloader
			require 'vendor/autoload.php';
    
			//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);
			
			try {
				//Server settings
				$mail->SMTPDebug = 0;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'testphp258@gmail.com';                     //SMTP username
				$mail->Password   = 'U123@456';                               //SMTP password
																			//Enable implicit TLS encryption
				$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			
				//Recipients
				$mail->setFrom('testphp258@gmail.com','TS');
				$mail->addAddress('umeshsharma258@gmail.com','US');     //Add a recipient
				
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Contact Form';
				$mail->Body    = "Hey Visitor $name and Message is $message";
				$mail->AltBody = "Hey Visitor $name and Message is $message";
			
				$mail->send();
				echo "<script>alert('email has been sent');</script>";
			} catch (Exception $e) {
				echo "email could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
			
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
	<title>Contacts | Handyman - Job Board HTML Template</title>
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
							<h1>Contacts</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">

				<!-- Google Map -->
								<!-- Google Map / End -->

				<div class="container">

					<div class="row">
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-location-arrow"></i>
								</div>
								<div class="icon-box-body">
									<h6>Address:</h6>
									HandyMan Co., Old Town Avenue, New York, USA 23000
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-phone"></i>
								</div>
								<div class="icon-box-body">
									<h6>Phone:</h6>
									+1700 124-5678<br>
									+1700 124-5678
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="icon-box">
								<div class="icon">
									<i class="fa fa-clock-o"></i>
								</div>
								<div class="icon-box-body">
									<h6>Working Hours:</h6>
									Monday - Friday 9:00 - 21:00<br>
									Saturday - Sunday 10:00 - 16:00
								</div>
							</div>
						</div>
					</div>

					<div class="spacer-lg"></div>
				<table>		
					<form method="post">
						<tr>
							<td>Name<input type="text" name="name">	
						
						Message<textarea type="text" name="message"></textarea>
						<input type="submit" name="csubmit"></td>
						</tr>
				</form>					
			</table>
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

	<script src="js/custom.js"></script>


	<!-- Contact Page specific scripts
	================================================== -->

	<!-- Contact Form -->
	<script src="vendor/jquery.validate.js"></script>
	<script src="js/contact.js"></script>

	<!-- Newsletter Form -->
	<script src="js/newsletter.js"></script>
	
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