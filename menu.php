

		<!-- header-section - start
		================================================== -->
		<header id="header-section" class="header-section clearfix sticky-header stuck">
			<div class="header-middle bg-gray d-flex align-items-center clearfix">
				<div class="container">
					<div class="row align-items-center">

						<div class="col-lg-3 col-md-12">
							<div class="brand-logo clearfix">
								<a href="index.php" class="brand-link">
									<img src="assets/images/logo/logo.png" alt="logo_not_found">
								</a>

								<div class="btns-group ul-li-right clearfix">
									<ul class="clearfix">
										<li>
											<button type="button" class="mobile-menu-btn">
												<i class="las la-bars"></i>
											</button>
										</li>
										<li>
											<button class="mobile-btn-cart">
												<i class="las la-shopping-bag"></i>
												
												<small  class="cart-counter bg-royal-blue">
													<?php
												

								if(isset($_SESSION['cart']))
								{
									echo $count = count($_SESSION['cart']);
									
								}
								else{
									echo 0;
								}
								
								?></small>
											</button>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-9 col-md-12">
							<div class="btns-group ul-li-right clearfix">
								<ul class="clearfix">
									<li>
										<form action="#">
											<div class="form-item">
												<input type="search" name="search" placeholder="Search your Products">
												<button type="submit"><i class="la la-search"></i></button>
											</div>
										</form>
									</li>
									<li class="dropdown">
										<button type="button" class="btn-user" id="user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="lar la-user"></i>
										</button>
										<div aria-labelledby="user-dropdown" class="user-dropdown dropdown-menu ul-li-block clearfix">
											<div class="profile-info clearfix">
												<a href="#!" class="user-thumbnail">
													<img src="assets/images/meta/img_2.png" alt="thumbnail_not_found">
												</a>
												<div class="user-content">
													<h4 class="user-name"><a href="#!">Rakibul Hassan</a></h4>
													<span class="user-title">Seller</span>
												</div>
											</div>
											<ul class="clearfix">
												<li><a href="#!"><i class="las la-user-circle"></i> Profile</a></li>
												<li><a href="#!"><i class="las la-user-cog"></i> Settings</a></li>
												<li><a href="#!"><i class="las la-sign-out-alt"></i> Logout</a></li>
											</ul>
										</div>
									</li>
									<li class="dropdown">
										<button class="btn-cart" id="cart-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="las la-shopping-bag"></i>
											<small  class="cart-counter bg-royal-blue">
													<?php
								if(isset($_SESSION['cart']))
								{
									echo $count = count($_SESSION['cart']);
									
								}
								else{
									echo 0;
								}
								
								?>
								</small>
										</button>
										<div class="cart-dropdown dropdown-menu" aria-labelledby="cart-dropdown">
											<h3 class="title-text">Cart Items:- 					
												<?php
								if(isset($_SESSION['cart']))
								{
									?>
									<!-- <script>console.log(<?php print_r($_SESSION['cart']);?>);</script> -->
									<?php
									echo $count = count($_SESSION['cart']);
									
								}
								else{
									echo 0;
								}
								
								?></h3>
						<div class="cart-items-list ul-li-block clearfix">
												<ul class="clearfix">
													<?php
												include 'conn.php';
                            if (isset($_SESSION['cart']))
                            {
                        $product_id = array_column($_SESSION['cart'], 'uid');
                        
                        $sql = "SELECT * FROM tests WHERE active = 1 ";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                foreach ($product_id as $id){
                                   // echo $id;
                                    if ($row['uniq'] == $id){
                        ?>

													<li>
														<!-- <div class="item-image">
															<img src="assets/images/cart/img_1.png" alt="image_not_found">
														</div> -->
														<div class="item-content">
															<h4 class="item-title"><?php echo $row['title']; ?></h4>
															<span class="item-price">₹ <?php echo $row['discounted_mrp']; ?></span>
														</div>
														<button type="button" value="<?php echo $row['uniq'];?>" class="remove-btn">
														<i class="las la-times"></i></button>
													</li>

													<?php
                                    }
                                }
                            }
                        }
                            }
                            ?>
												</ul>
											</div>

											<div class="btns-group ul-li clearfix">
												<ul class="clearfix">
													<li><a href="cart.php" class="btn bg-default-black">View Cart</a></li>
													<li><a href="checkout.html" class="btn bg-royal-blue">Checkout</a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						
					</div>
				</div>
			</div>

			<div class="header-bottom d-flex align-items-center clearfix">
				<div class="container">
					<div class="row align-items-center">

						<div class="col-lg-2">
							<div class="all-categories clearfix">
								<button type="button" class="category-btn" data-toggle="collapse" data-target="#categories-collapse" aria-expanded="false" aria-controls="categories-collapse">
									<i class="las la-bars"></i> 
									Categories
								</button>

								<div id="categories-collapse" class="categories-collapse collapse">
									<div class="card card-body ul-li-block">
										<ul class="clearfix">
											<li><a href="#!"><span><i class="las la-microscope"></i></span> Equipment</a></li>
											<li><a href="#!"><span><i class="las la-capsules"></i></span> General Medecine</a></li>
											<li><a href="#!"><span><i class="las la-dna"></i></span> Food Suppliment</a></li>
											<li><a href="#!"><span><i class="las la-first-aid"></i></span> Pharmacy</a></li>
											<li><a href="#!"><span><i class="las la-stethoscope"></i></span> Medical Tools</a></li>
											<li><a href="#!"><span><i class="las la-syringe"></i></span> Surgery Equipment</a></li>
											<li><a href="#!"><span><i class="las la-brain"></i></span> Neurology</a></li>
											<li><a href="#!"><span><i class="las la-x-ray"></i></span> Orthopredic</a></li>
											<li><a href="#!"><span><i class="las la-thermometer"></i></span> Diabetic Medicine</a></li>
											<li><a href="#!"><span><i class="las la-user-nurse"></i></span> ICU Euipment</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-8">
							<nav class="main-menu ul-li-center clearfix">
								<ul class="clearfix">
									<li class="active">
										<a href="index.php">Home</a>
									</li>
									<li><a href="about.html">About</a></li>
									<li class="menu-item-has-child">
										<a href="#!">Tests</a>
										<div class="mega_menu">
											<div class="row">
												<div class="col-lg-3">
													<div class="useful-links ul-li-block clearfix">
														<h3 class="list-title">Popular Tests</h3>
														<ul class="clearfix">
														<?php 
                include 'conn.php';
                $sql = "SELECT * FROM tests WHERE active = 1 ";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
                   ?>
                   <li><a href="test-details.php?tst_id=<?php echo $row['uniq'];?>"><?php echo $row['title'];?></a></li>
                   <?php
    }
} 
else {
  echo "0 results";
}
$conn->close();
?>
															
															
														</ul>
													</div>
												</div>

												<div class="col-lg-3">
													<div class="useful-links ul-li-block clearfix">
														<h3 class="list-title">Life Assessments</h3>
														<ul class="clearfix">
															<li><a href="#!">General Medicine</a></li>
															<li><a href="#!">Diabetes Insulin</a></li>
															<li><a href="#!">Food Suppliment</a></li>
															<li><a href="#!">Kids Medecine</a></li>
															<li><a href="#!">Pregnancy Medicine</a></li>
															<li><a href="#!">Health and Beauty</a></li>
															<li><a href="#!">Orthopedic</a></li>
														</ul>
													</div>
												</div>

												<div class="col-lg-3">
													<div class="useful-links ul-li-block clearfix">
														<h3 class="list-title">Health Packages</h3>
														<ul class="clearfix">
															<li><a href="#!">Accu Chek Active</a></li>
															<li><a href="#!">Glucometer</a></li>
															<li><a href="#!">Plaster Machine</a></li>
															<li><a href="#!">Oximeter</a></li>
															<li><a href="#!">Microscope</a></li>
														</ul>
													</div>
												</div>

												<div class="col-lg-3">
													<div class="promotion-fullimage clearfix">
														<a href="#!" class="item-image">
															<img src="assets/images/promotion/img_8.jpg" alt="image_not_found">
														</a>
														<div class="promotion-content position-top">
															<small class="d-block text-white mb-1">Medical Supplies</small>
															<h3 class="item-title">
																<span class="d-block">Coronavirus Medical</span> <span class="d-block">Supplies</span>
															</h3>
															<a href="#!" class="btn-underline">Shop Now</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
					
									<li class="">
										<a href="#!">Blog</a>
								
									</li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>
						</div>

						<div class="col-lg-2">
							<div class="social-icon ul-li-right clearfix">
								<ul class="clearfix">
									<li><a href="#!"><i class="las la-envelope"></i></a></li>
									<li><a href="#!"><i class="las la-phone"></i></a></li>
									
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</header>

		<!-- sidebar mobile menu - start -->
		<div class="sidebar-menu-wrapper">
			<div id="sidebar-menu" class="sidebar-menu">

				<span class="close-btn">
					<i class="las la-times"></i>
				</span>

				<div class="brand-logo text-center clearfix">
					<a href="index.html" class="brand-link">
						<img src="assets/images/logo/logo_3.png" alt="logo_not_found">
					</a>
				</div>

				<div class="search-wrap">
					<form action="#!">
						<div class="form-item mb-0">
							<input type="search" name="search" placeholder="Search your Products">
							<button type="submit"><i class="la la-search"></i></button>
						</div>
					</form>
				</div>

				<div id="mobile-accordion" class="mobile-accordion">
					<div class="card">
						<div class="card-header" id="heading-one">
							<button data-toggle="collapse" data-target="#collapse-one" aria-expanded="false" aria-controls="collapse-one">
								<i class="las la-shopping-bag"></i> 
								Cart Item
								<small><?php
								if(isset($_SESSION['cart'])){
									echo $count = count($_SESSION['cart']);
								}
								else{
									echo 0;
								}
								
								?></small>
							</button>
						</div>
						<div id="collapse-one" class="collapse" aria-labelledby="heading-one" data-parent="#mobile-accordion">
							<div class="card-body">
								<div class="cart-items-list ul-li-block clearfix">
									<ul class="clearfix">
										<li>
											<div class="item-image">
												<img src="assets/images/cart/img_1.png" alt="image_not_found">
											</div>
											<div class="item-content">
												<h4 class="item-title">Digital Thermometer</h4>
												<span class="item-price">$39.50</span>
											</div>
											<button type="button" class="remove-btn"><i class="las la-times"></i></button>
										</li>

										<li>
											<div class="item-image">
												<img src="assets/images/cart/img_2.png" alt="image_not_found">
											</div>
											<div class="item-content">
												<h4 class="item-title">Digital Infrared Thermometer</h4>
												<span class="item-price">$39.50</span>
											</div>
											<button type="button" class="remove-btn"><i class="las la-times"></i></button>
										</li>

										<li>
											<div class="item-image">
												<img src="assets/images/cart/img_3.png" alt="image_not_found">
											</div>
											<div class="item-content">
												<h4 class="item-title">Digital Blood Pressure Machine</h4>
												<span class="item-price">$39.50</span>
											</div>
											<button type="button" class="remove-btn"><i class="las la-times"></i></button>
										</li>
									</ul>
								</div>

								<div class="btns-group ul-li clearfix">
									<ul class="clearfix">
										<li><a href="cart.php" class="btn bg-default-black">View Cart</a></li>
										<li><a href="checkout.html" class="btn bg-royal-blue">Checkout</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" id="heading-two">
							<button data-toggle="collapse" data-target="#collapse-two" aria-expanded="false" aria-controls="collapse-two">
								<i class="las la-bars"></i> 
								All Categories
							</button>
						</div>
						<div id="collapse-two" class="collapse" aria-labelledby="heading-two" data-parent="#mobile-accordion">
							<div class="card-body all-categories-list ul-li-block clearfix">
								<ul class="clearfix">
									<li><a href="#!"><span><i class="las la-microscope"></i></span> Equipment</a></li>
									<li><a href="#!"><span><i class="las la-capsules"></i></span> General Medecine</a></li>
									<li><a href="#!"><span><i class="las la-dna"></i></span> Food Suppliment</a></li>
									<li><a href="#!"><span><i class="las la-first-aid"></i></span> Pharmacy</a></li>
									<li><a href="#!"><span><i class="las la-stethoscope"></i></span> Medical Tools</a></li>
									<li><a href="#!"><span><i class="las la-syringe"></i></span> Surgery Equipment</a></li>
									<li><a href="#!"><span><i class="las la-brain"></i></span> Neurology</a></li>
									<li><a href="#!"><span><i class="las la-x-ray"></i></span> Orthopredic</a></li>
									<li><a href="#!"><span><i class="las la-thermometer"></i></span> Diabetic Medicine</a></li>
									<li><a href="#!"><span><i class="las la-user-nurse"></i></span> ICU Euipment</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="menu_list ul-li-block clearfix">
					<h3 class="widget-title">Menu List</h3>

					<ul class="clearfix">
						<li class="active dropdown">
							<a href="index.php">Home</a>
							
						</li>
						<li><a href="about.html">About</a></li>
						<li class="dropdown">
							<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
							<ul class="dropdown-menu">
								<li class="dropdown">
									<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Grid</a>
									<ul class="dropdown-menu">
										<li><a href="shop-grid-2-column.html">Grid 2 Column</a></li>
										<li><a href="shop-grid-3-column.html">Grid 3 Column</a></li>
										<li><a href="shop-grid-4-column.html">Grid 4 Column</a></li>
									</ul>
								</li>
								<li><a href="shop-list.html">Shop List</a></li>
								<li class="dropdown">
									<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Details</a>
									<ul class="dropdown-menu">
										<li><a href="shop-details-1.html">Shop Details v1</a></li>
										<li><a href="shop-details-2.html">Shop Details v2</a></li>
										<li><a href="shop-details-3.html">Shop Details v3</a></li>
										<li><a href="shop-details-4.html">Shop Details v4</a></li>
									</ul>
								</li>
								<li><a href="cart.php">Cart Page</a></li>
								<li><a href="checkout.html">Checkout Page</a></li>
								<li><a href="wishlist.html">Wishlist Page</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
							<ul class="dropdown-menu">
								<li><a href="cart.php">Cart Page</a></li>
								<li><a href="checkout.html">Checkout Page</a></li>
								<li><a href="wishlist.html">Wishlist Page</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
							<ul class="dropdown-menu">
								<li><a href="blog-standard.html">Blog Standard</a></li>
								<li><a href="blog-masonry.html">Blog Masonry</a></li>
								<li><a href="blog-details.html">Blog Details</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>

				<div class="user-dropdown ul-li-block clearfix">
					<h3 class="widget-title">User Settings</h3>
					<ul class="clearfix">
						<li><a href="#!"><i class="las la-user-circle"></i> Profile</a></li>
						<li><a href="#!"><i class="las la-user-cog"></i> Settings</a></li>
						<li><a href="#!"><i class="las la-sign-out-alt"></i> Logout</a></li>
					</ul>
				</div>

			</div>
			<div class="overlay"></div>
		</div>
		<!-- sidebar mobile menu - end -->
		<!-- header-section - end
		================================================== -->