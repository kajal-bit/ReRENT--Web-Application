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
    $id = get_value($con, $_GET['id']);
    $sql = "SELECT * FROM products WHERE id=$id AND status=1";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
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
								<li class="active"><a href="shop.php?id=">Shop<i class="ti-arrow-right"></i></a></li>
                <li class="active"><a href="product.php?id=<?php echo $row['id'] ?>"><?php echo $row['product_name'] ?></a></li>
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
    					<!-- Shop By Price -->
        				<div class="single-widget range">
        					<h3 class="title">Shop by Price</h3>
        					<div class="price-filter">
        						<div class="price-filter-inner">
        							<div id="slider-range"></div>
        								<div class="price_slider_amount">
        									<div class="label-input">
    											<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
        								</div>
        							</div>
        						</div>
        					</div>
        					<ul class="check-box-list">
        						<li>
        							<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
        						</li>
        						<li>
        							<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
        						</li>
        						<li>
        							<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
        						</li>
        					</ul>
        				</div>
        				<!--/ End Shop By Price -->
    				</div>
    			</div>

          <div class="col-lg-9 col-md-8 col-12 product-detail-panel">
            <div class="row">
              <div class="col-md-5">
                <img class="product-image" src="<?php echo '../media/products/'.$row['image'] ?>" alt="">
              </div>
              <div class="col-md-7 product-details">
                <form action="managecart_inc.php" method="post">
                <div class="detail-section">
                  <h4><?php echo $row['product_name'] ?></h4>
                  <input type="hidden" name="prod_name" value="<?php echo $row['product_name'] ?>">
                  <em>Web-Id : <?php echo $row['id'] ?></em><br><br>
                </div>
                  <div class="detail-section">
                    <h2>Price : <?php echo $row['price'] ?> ₹</h4> &nbsp &nbsp &nbsp &nbsp <h6>Quantity : <input style="width:50px" type="number" name="quantity" value="1" min="1" max="10"></h6><br><br>
                    <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                    <h6><em><strike><?php echo $row['mrp'] ?></strike></em></h6>
                  </div>
                  <div class="detail-section">
                    <br>
                    <button class="btn" type="submit" name="addToCart">Add to Cart</button><br><br>
                    Avalability : In Stock
                  </div>
                </form>
              </div>
              <div class="col-md-12">
                <br>
                <h4>Description : </h4><br>
                <p><?php echo $row['description'] ?></p>
              </div>
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
