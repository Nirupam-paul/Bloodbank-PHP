<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="Jthemes">
		<meta name="description" content="MedService - Medical &amp; Medical Health Landing Page Template">
		<meta name="keywords" content="Responsive, HTML5 Template, Jthemes, One Page, Landing, Medical, Health, Healthcare, Doctor, Clinic, Care, Hospital">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- SITE TITLE -->
		<title>Blood Bank</title>
		<!-- FAVICON AND TOUCH ICONS  -->
		<link rel="shortcut icon" href="favicons/9816-images-favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicons/5557-images-favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="favicons/1714-images-apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="favicons/7311-images-apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="favicons/2968-images-apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="favicons/719-images-apple-touch-icon.png">
		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
		<!-- BOOTSTRAP CSS -->
		<link href="css/css-bootstrap.min.css" rel="stylesheet">
		<!-- FONT ICONS -->
		<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet" crossorigin="anonymous">
		<link href="css/css-flaticon.css" rel="stylesheet">
		<!-- PLUGINS STYLESHEET -->
		<link href="css/css-menu.css" rel="stylesheet">
		<link id="effect" href="css/dropdown-effects-fade-down.css" media="all" rel="stylesheet">
		<link href="css/css-magnific-popup.css" rel="stylesheet">
		<link href="css/css-owl.carousel.min.css" rel="stylesheet">
		<link href="css/css-owl.theme.default.min.css" rel="stylesheet">
		<link href="css/css-animate.css" rel="stylesheet"><link href="css/css-jquery.datetimepicker.min.css" rel="stylesheet">
		<!-- TEMPLATE CSS -->
		<link href="css/css-style.css" rel="stylesheet"><!-- RESPONSIVE CSS -->
    <link href="css/css-responsive.css" rel="stylesheet">
	</head>
	<body>


  <?php
    include('databaseconnect.php');
    include('function.php');
    include('constant.php');
    session_start();
  ?>

<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">


			<!-- HEADER
			============================================= -->
			<header id="header" class="header"><!-- MOBILE HEADER -->
			
        <div class="wsmobileheader clearfix">
              <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
              <span class="smllogo"><img src="images/logo.png" width="180" height="40" alt="mobile-logo"/></span>
              <a href="tel:123456789" class="callusbtn"><i class="fas fa-phone"></i></a>
        </div>

          <!-- HEADER STRIP -->
          <div class="headtoppart bg-blue clearfix">
              <div class="headerwp clearfix">

                <!-- Address -->
                <div class="headertopleft">			     			
                    <div class="address clearfix"><span> </span> <a href="tel:123456789" class="callusbtn"></a>
                      </div>
                </div>

                <!-- Social Links -->
                <div class="headertopright">
                  <a class="googleicon" title="Google" href="#"><i class="fab fa-google"></i> <span class="mobiletext02">Google</span></a>
                    <a class="linkedinicon" title="Linkedin" href="#"><i class="fab fa-linkedin-in"></i> <span class="mobiletext02">Linkedin</span></a>
                    <a class="twittericon" title="Twitter" href="#"><i class="fab fa-twitter"></i> <span class="mobiletext02">Twitter</span></a>
                    <a class="facebookicon" title="Facebook" href="#"><i class="fab fa-facebook-f"></i> <span class="mobiletext02">Facebook</span></a>
                    
                </div>
              </div>
          </div>	<!-- END HEADER STRIP -->


            <!-- NAVIGATION MENU -->
            <div class="wsmainfull menu clearfix">
              <div class="wsmainwp clearfix">

                <!-- LOGO IMAGE -->
                <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80 pixels) -->
                <div class="desktoplogo">
                  <a href="index.php"><img src="images/logo.png" width="180" height="40" alt="header-logo"></a>
                </div>

                <!-- MAIN MENU -->
                  <nav class="wsmenu clearfix">
                      <ul class="wsmenu-list">
                        <li class="nl-simple" aria-haspopup="true"><a href="index.php">Home</a></li>
                        <li class="nl-simple" aria-haspopup="true"><a href="camps.php">Camps</a></li>
                        
                        <li class="nl-simple" aria-haspopup="true"><a href="contact.php">Contact us</a></li>
                        
                        <?php if(isset($_SESSION['username'])){?>

                        <li aria-haspopup="true"><a href="#"><i class="fa fa-user" aria-hidden="true"></i><?php echo strtoupper($_SESSION['username']) ?><span class="wsarrow"></span></a>
                          <ul class="sub-menu">
							                <li aria-haspopup="true"><a href="profile.php">Profile</a></li>
                              <li aria-haspopup="true"><a href="logout.php">Logout</a></li>
                          </ul>
                        </li>
                        <?php  
                        }
                        else{
                        ?>
                        <li class="nl-simple" aria-haspopup="true"><a href="login.php">Login</a></li>
                        <li class="nl-simple" aria-haspopup="true"><a href="register.php">Register</a></li>
                        <?php 
                        }
                        ?>
                        
                        <!-- NAVIGATION MENU BUTTON -->
                        <li class="nl-simple header-btn" aria-haspopup="true"><a href="request.php">Request Here</a></li>
                      </ul>
                  </nav><!-- END MAIN MENU -->
                </div>
            </div>	<!-- END NAVIGATION MENU -->
			</header>

  