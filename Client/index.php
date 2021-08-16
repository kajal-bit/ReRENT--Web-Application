<?php
	require('top_inc.php')
?>

<!-- Slider Area -->
	<section class="hero-slider">
		<!-- Single Slider -->
		<div class="single-slider">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-9 offset-lg-3 col-12">
						<div class="text-inner">
							<div class="row">
								<div class="col-lg-7 col-12">
									<div class="hero-text">
										<h1>Rent-Return-Reuse</h1>
										<p>The ReRENT is managed and operated with renting products at great price. Enables sales and rent of diverse range of products listed on a platform from time to time.</p>
										<div class="button">
											<a href="shop.php" class="btn">Rent it Now!</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->

	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Items</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mens" role="tab">Mens</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#womens" role="tab">Womens</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Kids</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accessories" role="tab">Accessories</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#books" role="tab">Books</a></li>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="mens" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php
												$get_mens_product=get_mens_product($con, 2);
												foreach ($get_mens_product as $list){
											 ?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img prod-image" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $list['product_name'] ?></a></h3>
														<div class="product-price">
															<span><?php echo $list['price'] ?></span>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="womens" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php
												$get_womens_product=get_womens_product($con, 2);
												foreach ($get_womens_product as $list){
											 ?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $list['product_name'] ?></a></h3>
														<div class="product-price">
															<span><?php echo $list['price'] ?></span>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="kids" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php
												$get_kids_product=get_kids_product($con, 4);
												foreach ($get_kids_product as $list){
											 ?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $list['product_name'] ?></a></h3>
														<div class="product-price">
															<span><?php echo $list['price'] ?></span>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="accessories" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php
												$get_accessories_product=get_accessories_product($con, 4);
												foreach ($get_accessories_product as $list){
											 ?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $list['product_name'] ?></a></h3>
														<div class="product-price">
															<span><?php echo $list['price'] ?></span>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->

								<!-- Start Single Tab -->
								<div class="tab-pane fade" id="books" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php
												$get_books_product=get_books_product($con, 4);
												foreach ($get_books_product as $list){
											 ?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img" style="height:370px;" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html"><?php echo $list['product_name'] ?></a></h3>
														<div class="product-price">
															<span><?php echo $list['price'] ?></span>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->

	<!-- Start Midium Banner  -->
	<section class="midium-banner">
		<div class="container">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img style="width:600px; height:350px;" src="mens.jpg" alt="#">
						<div class="content">
							<p>Men's Collectons</p>
							<h3>Men's items <br><span> </span></h3>
							<a href="#">Rent it Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img style="width:600px; height:350px;" src="womens.jpg" alt="#">
						<div class="content">
							<p>Women's</p>
							<h3>Shoes <br><span></span></h3>
							<a href="#" class="btn">Rent it Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Midium Banner -->




	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over 1000/-</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Normal Return</h4>
						<p>Within 3 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Price</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->



    <?php require('footer_inc.php') ?>
