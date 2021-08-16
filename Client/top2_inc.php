<?php
  ob_start();
  require('functions_inc.php');
  require('connection_inc.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>ReRent</title>
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">

	<!-- ReRent StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="custom.css">


</head>
<body class="js">

	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
                                                                 <li><img src="logo.jpg" class="img img-fluid" width="80px" alt="logo"></li>
								<li><i class="ti-headphone-alt"></i> +91 1234 567890</li>
								<li><i class="ti-email"></i> support@ReRent.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
                                                       
							<ul class="list-main">
								<li><i class="ti-user"></i> <a href="account.php">My account</a></li>
                                                             
                <?php
                if (isset($_SESSION['username'])) {
                  echo '<li><i class="ti-power-off"></i><a href="logout_inc.php">Logout</a></li>';
                } else {
                  echo '<li><i class="ti-power-off"></i><a href="login.php">Login</a></li>';
                }
                ?>
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.php"><h1>ReRENT</h1></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
              <form action="shop.php" method="post">
							<div class="search-bar">
									<input style="width:535px;" class="category_select" name="search" placeholder="Search Products Here....." type="search">
									<button name="search_btn" type="submit" class="btnn"><i class="ti-search"></i></button>

							</div>
              </form>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i>    <?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } ?></a>
							</div>
              <div class="sinlge-bar shopping">
                <?php
                $total = 0;
                if (isset ($_SESSION['cart'])) {
                  ?>
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo count($_SESSION['cart']) ?></span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?php echo count($_SESSION['cart']) ?> Items</span>
									</div>
									<ul class="shopping-list">
                    <?php
                      foreach ($_SESSION['cart'] as $key => $value):
                      $total = $total + ($value['Item_price'] * $value['quantity']);
                    ?>

										<li>
											<h4><a href="#"><?php echo $value['Item_name'] ?></a></h4>
											<p class="quantity">Quantity: <?php echo $value['quantity'] ?> <span class="amount">Price: <?php echo $value['Item_price'] ?></span></p>
										</li>

                  <?php endforeach; ?>
                  <a href="clearcart_inc.php" class="remove mb-5" title="Clear Cart"><i class="fa fa-remove"></i></a>
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount"><?php echo $total ?></span>
										</div>
										<a href="checkout.php" class="btn animate">Cart</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
          <?php  }  ?>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="index.php">Home</a></li>
                          <li><a href="shop.php">Shop</a></li>
													<li><a href="contact.php">Contact Us</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
