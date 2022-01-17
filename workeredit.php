<?php

session_start();
require './connection.php';

if(isset($_GET['wid']))
{
    $wid = $_GET['wid'];
    $wsq = mysqli_query($con,"select * from tbl_workermaster where worker_id='{$wid}'")or die(mysqli_error($con));
    $wfr = mysqli_fetch_array($wsq);
}

if(isset($_POST['wsubmit']))
{
  $id = $_POST['id'];
  $name = mysqli_real_escape_string($con,$_POST['wname']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $pass = mysqli_real_escape_string($con,$_POST['pass']);
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $address = mysqli_real_escape_string($con,$_POST['address']);
  $image = $_FILES['photo']['name'];
  $filelocation = $_FILES['photo']['tmp_name'];
  $area = $_POST['area'];
  $category = $_POST['category'];
  $exp = $_POST['exp'];
  $abt = $_POST['abt'];
  $time = $_POST['time'];
  $charge = $_POST['charge'];

  if($filelocation)
  {
      $imagesq = mysqli_query($con,"select worker_photo from tbl_workermaster where worker_id='{$id}'")or die(mysqli_error($con));
      $imagefr = mysqli_fetch_array($imagesq);
      $filepath = "workerimg/".$imagefr['worker_photo'];
      unlink($filepath);

      move_uploaded_file($filelocation,"workerimg/".$image);

      $uq = mysqli_query($con,"update tbl_workermaster set worker_name='{$name}',worker_email='{$email}',worker_password='{$pass}',worker_gender='{$gender}',worker_dob='{$dob}',worker_address='{$address}',area_id='{$area}',category_id='{$category}',worker_photo='{$image}',worker_exp='{$exp}',worker_aboutme='{$abt}',worker_time='{$time}',worker_charge='{$charge}' where worker_id='{$id}'")or die(mysqli_error($con));

      if($uq)
      {
        echo "<script>alert('Record Updated !'); window.location='workerprofile.php';</script>";
      }
  }else
  {
    $uqq = mysqli_query($con,"update tbl_workermaster set worker_name='{$name}',worker_email='{$email}',worker_password='{$pass}',worker_gender='{$gender}',worker_dob='{$dob}',worker_address='{$address}',area_id='{$area}',category_id='{$category}',worker_exp='{$exp}',worker_aboutme='{$abt}',worker_time='{$time}',worker_charge='{$charge}' where worker_id='{$id}'")or die(mysqli_error($con));

    if($uqq)
      {
        echo "<script>alert('Record Updated without images !'); window.location='workerprofile.php';</script>";
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
	<title>Worker Edit </title>
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
			<!-- Header Top Bar / End -->
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
                                
                                
                            
                        </li>
                        
                        <li><a href="workerprofile.php">My Profile</a></li>	
                        <li><a href="workerlogout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>					<!-- Navigation / End -->

        </div>
    </div>
    
</header>
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
							<h1>Edit Profile</h1>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					<div class="row">
						
						<div class="col-md-12">
							<div class="spacer-lg visible-sm visible-xs"></div>
							<div class="box">
								<h3>Profile</h3>
								<form method = "post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName1"></label>
                    <input type="hidden" name="id" value="<?php echo $wfr['worker_id']  ?>" class="form-control" id="exampleInputName1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="wname" value="<?php echo $wfr['worker_name']  ?>" class="form-control" id="exampleInputName1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input type="email" name="email" value="<?php echo $wfr['worker_email']  ?>" class="form-control" id="exampleInputName1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Password</label>
                    <input type="password" name="pass" value="<?php echo $wfr['worker_password']  ?>" class="form-control" id="exampleInputName1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <input type="radio" name="gender" <?php if($wfr['worker_gender']=="1") { echo "Checked"; } ?> value="1"  id="exampleInputEmail1">Male
                    <input type="radio" name="gender" <?php if($wfr['worker_gender']=="0") { echo "Checked"; } ?> value="0"  id="exampleInputEmail1">Female
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">DOB</label>
                    <input type="date" name="dob" value="<?php echo $wfr['worker_dob']  ?>" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Address</label>
                    <textarea type="text" name="address"  class="form-control" id="exampleInputName1" placeholder="Enter Address"><?php echo $wfr['worker_address'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><img style='width: 50px;' src='workerimg/<?php echo $wfr['worker_photo'] ?>'></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Area</label>
                    <select name="area">
                    
                  <?php
                        $asq = mysqli_query($con,"select * from tbl_area")or die("Error areaselectq".mysqli_error($con));
                        while($afr = mysqli_fetch_array($asq))
                        
                        {
                          $ad = $afr['area_id'] == $wfr['area_id'] ? "selected" : "";
                        echo "<option value='{$afr['area_id']}' $ad>{$afr['area_name']}</option>";
                        }
                  ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="category">
                  
                  <?php
                        $csq = mysqli_query($con,"select * from tbl_category")or die("Error cateselectq".mysqli_error($con));
                        while($cfr = mysqli_fetch_array($csq))
                        {
                          $cd = $cfr['category_id'] == $wfr['category_id'] ? "selected" : "";
                        echo "<option value='{$cfr['category_id']}' $cd>{$cfr['category_name']}</option>";
                        }
                  ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Experiance</label>
                    <input type="text" name="exp" value="<?php echo $wfr['worker_exp']  ?>" class="form-control" id="exampleInputName1" placeholder="Enter Experiance">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Aboutme</label>
                    <input type="text" name="abt" value="<?php echo $wfr['worker_aboutme']  ?>" class="form-control" id="exampleInputName1" placeholder="Enter Aboutme">
                  </div>
                        
                  <div class="form-group">
                    <label for="exampleInputName1">Time</label>
                    <input type="time" name="time" value="<?php echo $wfr['worker_time']  ?>" class="form-control" id="exampleInputName1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Charges</label>
                    <input type="number" name="charge" value="<?php echo $wfr['worker_charge']  ?>" class="form-control" id="exampleInputName1" placeholder="Enter Charges">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="wsubmit" class="btn btn-primary">Submit</button>

                  <button type="submit"   class="btn btn-primary" onclick="window.location='workerprofile.php';">Cancel</button>

                </div>
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