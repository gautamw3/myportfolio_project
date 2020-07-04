<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title><?php echo SITE_NAME ." || ". $pageTitle; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/vendors/linericon/style.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/vendors/animate-css/animate.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/vendors/flaticon/flaticon.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/css/toaster.min.css">
	<!-- main css -->
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/css/dashboard.css">
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand" href="<?php echo SITE_ROOT; ?>"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-end">
							<li class="nav-item active"><a class="nav-link" href="<?php echo SITE_ROOT; ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo SITE_ROOT; ?>/about-us.php">About</a></li>
							<li class="nav-item submenu dropdown">
								<a class="nav-link" href="#">Portfolio</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="<?php echo SITE_ROOT; ?>/portfolio.php">Portfolio</a></li>
									<li class="nav-item"><a class="nav-link" href="<?php echo SITE_ROOT; ?>/portfolio-details.php">Portrfolio Details</a>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="<?php echo SITE_ROOT; ?>/elements.php">Elements</a>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="<?php echo SITE_ROOT; ?>/blog.php">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="<?php echo SITE_ROOT; ?>/blog-details.php">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="<?php echo SITE_ROOT; ?>/contact.php">Contact</a></li>
							<?php if($_SESSION['USER_ID']) { ?>
								<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i> Hi! <?php echo $_SESSION['FIRST_NAME']; ?></a></li>
								<li class="nav-item"><a class="nav-link" href="<?php echo SITE_ROOT; ?>/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
							<?php } else { ?>
								<li class="nav-item"><a class="nav-link" onclick="$('#portfolioSignupModal').modal()" style="cursor: pointer !important;"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a></li>
								<li class="nav-item"><a class="nav-link" onclick="$('#portfolioSigninModal').modal()" style="cursor: pointer !important;"><i class="fa fa-sign-in" aria-hidden="true"></i> Signin</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->