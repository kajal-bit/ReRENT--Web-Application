<?php
  require('top2_inc.php');

  $category_id='';

  $category_sql = "SELECT * FROM categories WHERE status=1";
  $category_res=mysqli_query($con, $category_sql);
  $category_arr=array();
  while($row=mysqli_fetch_assoc($category_res)){
    $category_arr[]=$row;
  }

  if (isset($_GET['id']) && $_GET['id'] != '') {
    $category_id = get_value($con, $_GET['id']);
    $get_category_product = get_category_product($con, 10, $category_id);
  } else {
    $get_product = get_product($con, 10);
  }

  if (isset ($_POST['search_btn'])) {
    $search_keyword = get_value($con, $_POST['search']);
      $searchSql = "SELECT * FROM products WHERE product_name LIKE '%".$search_keyword."%'";
      $res = mysqli_query($con, $searchSql);
    }


 ?>
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="shop.php?id=">Shop</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
                    <?php foreach ($category_arr as $list): ?>
                      <li><a href="shop.php?id=<?php echo $list['id'] ?>"> <?php echo $list['category'] ?> </a></li>
                    <?php endforeach; ?>
									</ul>
								</div>
								<!--/ End Single Widget -->

						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
							</div>
						</div>
						<div class="row">
              <?php
              if (isset ($_GET['id']) && $_GET['id']!='') {
                foreach ($get_category_product as $list) {
               ?>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="product.php?id=<?php echo $list['id']; ?>">
											<img class="default-img" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
											<img class="hover-img" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
										</a>
										<div class="button-head">
											<div class="product-action">

											</div>
											<div class="product-action-2">
												<a title="Add to cart" href="managecart_inc.php?in=<?php echo $list['product_name'] ?>&id=<?php echo $list['id'] ?>&pr=<?php echo $list['price'] ?>">Add to cart</a>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="product.php?id=<?php echo $list['id']; ?>"><?php echo $list['product_name'] ?></a></h3>
										<div class="product-price">
											<span><?php echo $list['price'] ?></span>
										</div>
									</div>
								</div>
							</div>
              <?php
              }
            } elseif (isset ($_POST['search_btn'])) {
              if ($row = mysqli_num_rows($res)>0) {
              while($row = mysqli_fetch_assoc($res)) {
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                  <div class="single-product">
                    <div class="product-img">
                      <a href="product.php?id=<?php echo $list['id']; ?>">
                        <img class="default-img" src="<?php echo '../media/products/'.$row['image'] ?>" alt="#">
                        <img class="hover-img" src="<?php echo '../media/products/'.$row['image'] ?>" alt="#">
                      </a>
                      <div class="button-head">
                        <div class="product-action">

                        </div>
                        <div class="product-action-2">
                          <a title="Add to cart" href="managecart_inc.php?in=<?php echo $list['product_name'] ?>&id=<?php echo $list['id'] ?>&pr=<?php echo $list['price'] ?>">Add to cart</a>
                        </div>
                      </div>
                    </div>
                    <div class="product-content">
                      <h3><a href="product.php?id=<?php echo $row['id']; ?>"><?php echo $row['product_name'] ?></a></h3>
                      <div class="product-price">
                        <span><?php echo $row['price'] ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
            } else {
              echo"<script>
                alert('Result Not Found!');
                window.location.href='shop.php';
              </script>";
            }
            } else {
                      foreach ($get_product as $list) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-12">
                      <div class="single-product">
                        <div class="product-img">
                          <a href="product.php?id=<?php echo $list['id']; ?>">
                            <img class="default-img" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
                            <img class="hover-img" src="<?php echo '../media/products/'.$list['image'] ?>" alt="#">
                          </a>
                          <div class="button-head">
                            <div class="product-action">

                            </div>
                            <div class="product-action-2">
                              <a title="Add to cart" href="managecart_inc.php?in=<?php echo $list['product_name'] ?>&id=<?php echo $list['id'] ?>&pr=<?php echo $list['price'] ?>">Add to cart</a>
                            </div>
                          </div>
                        </div>
                        <div class="product-content">
                          <h3><a href="product.php?id=<?php echo $list['id']; ?>"><?php echo $list['product_name'] ?></a></h3>
                          <div class="product-price">
                            <span><?php echo $list['price'] ?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                    }
                  }
                ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->

		<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<!-- Product Slider -->
										<div class="product-gallery">
											<div class="quickview-slider-active">
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
											</div>
										</div>
									<!-- End Product slider -->
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="quickview-content">
										<h2>Flared Shift Dress</h2>
										<div class="quickview-ratting-review">
											<div class="quickview-ratting-wrap">
												<div class="quickview-ratting">
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<a href="#"> (1 customer review)</a>
											</div>
											<div class="quickview-stock">
												<span><i class="fa fa-check-circle-o"></i> in stock</span>
											</div>
										</div>
										<h3>$29.00</h3>
										<div class="quickview-peragraph">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
										</div>
										<div class="size">
											<div class="row">
												<div class="col-lg-6 col-12">
													<h5 class="title">Size</h5>
													<select>
														<option selected="selected">s</option>
														<option>m</option>
														<option>l</option>
														<option>xl</option>
													</select>
												</div>
												<div class="col-lg-6 col-12">
													<h5 class="title">Color</h5>
													<select>
														<option selected="selected">orange</option>
														<option>purple</option>
														<option>black</option>
														<option>pink</option>
													</select>
												</div>
											</div>
										</div>
										<div class="quantity">
											<!-- Input Order -->
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<!--/ End Input Order -->
										</div>
										<div class="add-to-cart">
											<a href="#" class="btn">Add to cart</a>
											<a href="#" class="btn min"><i class="ti-heart"></i></a>
											<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
										</div>
										<div class="default-social">
											<h4 class="share-now">Share:</h4>
											<ul>
												<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal end -->
	<?php require('footer_inc.php') ?>
