<!DOCTYPE html>
<html lang="en">
<head>
<title>Home V.2 - Span Diagnostics</title>
<?php
include 'conn.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'header.php';
 ?>
<body class="home-v2">
    <?php include 'menu.php'; ?>

			<!-- slider-section - start
			================================================== -->
			<section id="slider-section" class="slider-section home-two-slider sec-pt-130 clearfix">
				<div id="main-carousel" class="main-carousel arrow-right-left owl-carousel owl-theme">
					<div class="item d-flex align-items-center bg-gray">
						<div class="container">
							<div class="row align-items-center justify-content-lg-start justify-content-md-between">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 order-last">
									<div class="slider-image mask-image">
										<!-- <img src="assets/images/slider/mask_1.png" alt="image_not_found"> -->
									</div>
								</div>

								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="slider-content">
										<!-- <span class="off-price animate-item mb-15">30% off</span> -->
										<h3 class="item-title animate-item mtb-20">
											Protect your health with our tests and packages
										</h3>
										<p class="animate-item">
											Span Diagnostics as always focused on the best treatments with affordable price through the best medical services.
										</p>
										<div class="btns-group ul-li animate-item clearfix">
											<ul class="clearfix">
												<li><a href="#" class="btn bg-light-green">Upload Prescription</a></li>
												<li><a href="#" class="btn bg-default-black">Lab tests</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- slider-section - end
			================================================== -->



            <!-- Tests Covered Section - start
            ==================================================== -->
            <section class="shop-section sec-ptb-50 decoration-wrap clearfix">
				<div class="container">
					<div class="section-title text-center mb-30">
						<h2 class="title-text mb-3">Our Lab Tests</h2>
						<p class="mb-0"></p>
					</div>

					<div class="tabs-nav ul-li-center clearfix">
						<ul class="nav" role="tablist">
							<li>
								<a class="active" href="#popular-items" data-toggle="tab" role="tab">Popular Tests</a>
							</li>
							<li>
								<a href="#toprated-items" data-toggle="tab" role="tab">Top Rated</a>
							</li>
							<li>
								<a href="#trending-items" data-toggle="tab" role="tab">Trending Tests</a>
							</li>
						</ul>
					</div>

					<div class="tab-content">
						<div id="popular-items" class="tab-pane active">
							<div class="row justify-content-center mb-70">
							    <?php
                include 'conn.php';
               //$unq=$_GET['tst_id'];
                $sql = "SELECT * FROM tests WHERE active = 1 ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $testtitle = $row['title'];
                    $preparation = $row['preparation'];
                    $reptime = $row['rep_time'];
                    $tst_category = $row['category'];
                    $mrp = $row['mrp'];
                    $tst_description =  $row['description'];
                    $shrtdesciption = $row['short_description'];
                    $disc = $row['discount'];
                if($disc != '' || $disc != '0' || $disc != null){
                    $newp = $mrp - ($mrp * ($disc/100));
                }
                else{
                    $newp = $mrp;
                }
                $tsts_inc = json_decode($row['tests_icluded']);
                $no = is_array($row['tests_icluded'] )?count(json_decode($row['tests_icluded'])):1;
                $unqid = $row['uniq'];
                ?>
							    
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 crd">
<div class="card bg-light rounded shadow crds" >
<div class="card-body product-grid p-4 cb">
<h5 class="crd-title"><?php echo $testtitle;?></h5>
<div class="mt-1">
   <p class="clr-w">
      <span class="icn"><i class="las la-shopping-basket"></i> <span><?php echo $no;?></span></span> <span>tests included</span>
      <span class="rel-icon">
         <!--<i class="las la-vial"></i> -->
         <img src="assets/images/blood-count-test.png" class="image_icon">
      </span>
   </p>
</div>
<div class="mt-1">
<?php if($disc != '0' || $disc != '' || $disc != null ){?>
<div class="col-md-12 p-0">
   <div class="row">
      <div class="col-md-7">
         <span class="crd-prc mb-30">
            MRP : <span class="" id="old" >₹<?php echo $mrp; ?></span>
            <span class="fts-20" id="" >₹<?php echo $newp; ?> </span>
      </div>
      <div class="col-md-1">
      <div class="post-label ul-li-right clearfix">
      <ul class="clearfix">
      <li class="bg-white">-<?php echo $disc;?>%</li>
      <!--<li class="bg-skyblue">off</li> -->
      </ul>
      <ul >
      <li class="off-text">off</li>
      <!--<li class="bg-skyblue">off</li> -->
      </ul>
      </div>
      </div>
      </span>
   </div>
</div>															    
 
             <?php
                }
                else{
                    ?>
             <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="fts-38" >₹  <?php echo $mrp; ?></span></span>
             </div>
             <?php
                }
                ?>
                        </div>
                        
                        <div class="mt-1">
							<input type="hidden" name="uid"  value="<?php echo $unqid; ?>" />
                            <button type="button" name="atc"  value="<?php echo $unqid; ?>" class="btn btn-primary crd-btn">+ Add</button>
                        </div>
                    </div>
                    </div>
              </div>
                        </div>
                    </div>
                    </div>
              </div>
<?php
				}
                } 
                else {
?>
<h2 style="padding-top:30px;">No related Tests</h2>
<?php
                }
                $conn->close();
                ?>
								</div>

							<!--</div>-->
							<div class="btn-wrap text-center clearfix">
								<a href="#" class="btn bg-light-green">VIEW ALL</a>
							</div>
						</div>

						<div id="toprated-items" class="tab-pane fade">
							<div class="row justify-content-center mb-70">
							    <?php
                include 'conn.php';
               //$unq=$_GET['tst_id'];
                $sql = "SELECT * FROM tests WHERE active = 1 ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $testtitle = $row['title'];
                    $preparation = $row['preparation'];
                    $reptime = $row['rep_time'];
                    $tst_category = $row['category'];
                    $mrp = $row['mrp'];
                    $tst_description =  $row['description'];
                    $shrtdesciption = $row['short_description'];
                    $disc = $row['discount'];
               if($disc != '' || $disc != 0 || $disc != null){
                    $newp = $mrp - ($mrp * ($disc/100));
                }
                else{
                    $newp = $mrp;
                }
                $tsts_inc = json_decode($row['tests_icluded']);
             $no = is_array($row['tests_icluded'] )?count(json_decode($row['tests_icluded'])):1;
                $unqid = $row['uniq'];
                ?>
							    
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 crd">
								 <div class="card bg-light rounded shadow crds" >
                    <div class="card-body product-grid p-4 cb">
					
					<div class="post-label ul-li-right clearfix">
										<ul class="clearfix">
											<li class="bg-white">-<?php echo $disc;?>%</li>
											<!-- <li class="bg-skyblue">NEW</li> -->
										</ul>
									</div>
                        <h5 class="crd-title"><span class="rel-icon"><i class="las la-vial"></i></span> <?php echo $testtitle;?></h5>

						<div class="mt-1">
							<p class="clr-w"><span class="icn"><i class="las la-shopping-basket"></i> <?php echo $no;?></span> tests included</p>
						</div>
                        <div class="mt-1">
						<?php if($disc != 0 || $disc != '' || $disc != null ){?>
             <div class="col-md-12 p-0">
                <span class="crd-prc mb-30">MRP : <span class="" id="old" >₹<?php echo $mrp; ?></span><span class="fts-20" id="" >₹<?php echo $newp; ?> </span></span>
             </div>
             <?php
                }
                else{
                    ?>
             <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="fts-38" >₹  <?php echo $mrp; ?></span></span>
             </div>
             <?php
                }
                ?>
                        </div>
                        
                        <div class="mt-1">
							<input type="hidden" name="uid"  value="<?php echo $unqid; ?>" />
                            <button type="button" name="atc"  value="<?php echo $unqid; ?>" class="btn btn-primary crd-btn">Add to Cart</button>
                        </div>
                    </div>
                    </div>
              </div>
<?php
				}
                } 
                else {
?>
<h2 style="padding-top:30px;">No related Tests</h2>
<?php
                }
                $conn->close();
                ?>
								</div>
							<div class="btn-wrap text-center clearfix">
								<a href="#" class="btn bg-light-green">VIEW ALL</a>
							</div>
						</div>

						<div id="trending-items" class="tab-pane fade">
							<div class="row justify-content-center mb-70">
							    <?php
                include 'conn.php';
               //$unq=$_GET['tst_id'];
                $sql = "SELECT * FROM tests WHERE active = 1 ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $testtitle = $row['title'];
                    $preparation = $row['preparation'];
                    $reptime = $row['rep_time'];
                    $tst_category = $row['category'];
                    $mrp = $row['mrp'];
                    $tst_description =  $row['description'];
                    $shrtdesciption = $row['short_description'];
                    $disc = $row['discount'];
               if($disc != '' || $disc != 0 || $disc != null){
                    $newp = $mrp - ($mrp * ($disc/100));
                }
                else{
                    $newp = $mrp;
                }
                $tsts_inc = json_decode($row['tests_icluded']);
                $no = is_array($row['tests_icluded'] )?count(json_decode($row['tests_icluded'])):1;
                $unqid = $row['uniq'];
                ?>
							    
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 crd">
								 <div class="card bg-light rounded shadow crds" >
                    <div class="card-body product-grid p-4 cb">
					
					<div class="post-label ul-li-right clearfix">
										<ul class="clearfix">
											<li class="bg-white">-<?php echo $disc;?>%</li>
											<!-- <li class="bg-skyblue">NEW</li> -->
										</ul>
									</div>
                        <h5 class="crd-title"><span class="rel-icon"><i class="las la-vial"></i></span> <?php echo $testtitle;?></h5>

						<div class="mt-1">
							<p class="clr-w"><span class="icn"><i class="las la-shopping-basket"></i> <?php echo $no;?></span> tests included</p>
						</div>
                        <div class="mt-1">
						<?php if($disc != 0 || $disc != '' ||$disc != null ){?>
             <div class="col-md-12 p-0">
                <span class="crd-prc mb-30">MRP : <span class="" id="old" >₹<?php echo $mrp; ?></span><span class="fts-20" id="" >₹<?php echo $newp; ?> </span></span>
             </div>
             <?php
                }
                else{
                    ?>
             <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="fts-38" >₹  <?php echo $mrp; ?></span></span>
             </div>
             <?php
                }
                ?>
                        </div>
                        
                        <div class="mt-1">
							<input type="hidden" name="uid"  value="<?php echo $unqid; ?>" />
                            <button type="button" name="atc"  value="<?php echo $unqid; ?>" class="btn btn-primary crd-btn">Add to Cart</button>
                        </div>
                    </div>
                    </div>
              </div>
<?php
				}
                } 
                else {
?>
<h2 style="padding-top:30px;">No related Tests</h2>
<?php
                }
                $conn->close();
                ?>
								</div>
							<div class="btn-wrap text-center clearfix">
								<a href="shop-grid-3-column.html" class="btn bg-light-green">VIEW ALL</a>
							</div>
						</div>
					</div>
				</div>

				<span class="decoration-image pill-image-1">
					<img src="assets/images/decoration/pill_2.png" alt="pill_image_not_found">
				</span>
			</section>

           <!-- ================================================== -->


            <!-- package categories -section - start
			================================================== -->
			<section class="shop-section sec-ptb-50 clearfix">
				<div class="container">

					<div class="section-title text-center mb-70">
						<h2 class="title-text mb-3">Health Packages</h2>
						<p class="mb-0"></p>
					</div>

				<div class="row justify-content-center mb-70">
							    <?php
                include 'conn.php';
               //$unq=$_GET['tst_id'];
                $sql = "SELECT * FROM tests WHERE active = 1 ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $testtitle = $row['title'];
                    $preparation = $row['preparation'];
                    $reptime = $row['rep_time'];
                    $tst_category = $row['category'];
                    $mrp = $row['mrp'];
                    $tst_description =  $row['description'];
                    $shrtdesciption = $row['short_description'];
                    $disc = $row['discount'];
              if($disc != '' || $disc != 0 || $disc != null){
                    $newp = $mrp - ($mrp * ($disc/100));
                }
                else{
                    $newp = $mrp;
                }
                $tsts_inc = json_decode($row['tests_icluded']);
               $no = is_array($row['tests_icluded'] )?count(json_decode($row['tests_icluded'])):1;
                $unqid = $row['uniq'];
                ?>
							    
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 crd">
								 <div class="card bg-light rounded shadow crds" >
                    <div class="card-body product-grid p-4 cb">
					
					<div class="post-label ul-li-right clearfix">
										<ul class="clearfix">
											<li class="bg-white">-<?php echo $disc;?>%</li>
											<!-- <li class="bg-skyblue">NEW</li> -->
										</ul>
									</div>
                        <h5 class="crd-title"><span class="rel-icon"><i class="las la-vial"></i></span> <?php echo $testtitle;?></h5>


                    </div>
                    </div>
              </div>
<?php
				
                } 
                }
                else {
?>
<h2 style="padding-top:30px;">No related packages</h2>
<?php
                }
                $conn->close();
                ?>
								</div>

				</div>
			</section>
			<!-- package categories - end
			================================================== -->



            <!-- packages-section - start
			================================================== -->
			<section class="shop-section sec-ptb-50 clearfix">
				<div class="container">

					<div class="section-title text-center mb-70">
						<h2 class="title-text mb-3">Health Packages</h2>
						<p class="mb-0"></p>
					</div>

				<div class="row justify-content-center mb-70">
							    <?php
                include 'conn.php';
               //$unq=$_GET['tst_id'];
                $sql = "SELECT * FROM tests WHERE active = 1 ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $testtitle = $row['title'];
                    $preparation = $row['preparation'];
                    $reptime = $row['rep_time'];
                    $tst_category = $row['category'];
                    $mrp = $row['mrp'];
                    $tst_description =  $row['description'];
                    $shrtdesciption = $row['short_description'];
                    $disc = $row['discount'];
             if($disc != '' || $disc != 0 || $disc != null){
                    $newp = $mrp - ($mrp * ($disc/100));
                }
                else{
                    $newp = $mrp;
                }
                $tsts_inc = json_decode($row['tests_icluded']);
                $no = is_array($row['tests_icluded'] )?count(json_decode($row['tests_icluded'])):1;
                $unqid = $row['uniq'];
                ?>
							    
								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 crd">
								 <div class="card bg-light rounded shadow crds" >
                    <div class="card-body product-grid p-4 cb">
					
					<div class="post-label ul-li-right clearfix">
										<ul class="clearfix">
											<li class="bg-white">-<?php echo $disc;?>%</li>
											<!-- <li class="bg-skyblue">NEW</li> -->
										</ul>
									</div>
                        <h5 class="crd-title"><span class="rel-icon"><i class="las la-vial"></i></span> <?php echo $testtitle;?></h5>

						<div class="mt-1">
							<p class="clr-w"><span class="icn"><i class="las la-shopping-basket"></i> <?php echo $no;?></span> tests included</p>
						</div>
                        <div class="mt-1">
						<?php if($disc != 0 || $disc != '' || $disc != null ){?>
             <div class="col-md-12 p-0">
                <span class="crd-prc mb-30">MRP : <span class="" id="old" >₹<?php echo $mrp; ?></span><span class="fts-20" id="" >₹<?php echo $newp; ?> </span></span>
             </div>
             <?php
                }
                else{
                    ?>
             <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="fts-38" >₹  <?php echo $mrp; ?></span></span>
             </div>
             <?php
                }
                ?>
                        </div>
                        
                        <div class="mt-1">
							<input type="hidden" name="uid"  value="<?php echo $unqid; ?>" />
                            <button type="button" name="atc"  value="<?php echo $unqid; ?>" class="btn btn-primary crd-btn">Add to Cart</button>
                        </div>
                    </div>
                    </div>
              </div>
<?php
				}
                } 
                else {
?>
<h2 style="padding-top:30px;">No related packages</h2>
<?php
                }
                $conn->close();
                ?>
								</div>

				</div>
			</section>
			<!-- shop-section - end
			================================================== -->

			
            <!-- offer-section - start
			================================================== -->

			<section id="newsletter-section" class="newsletter-section clearfix">
				<div class="container">
					<div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

						<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
							<div class="newsletter-boxed small-content bg-gray border-0 clearfix">

								<div class="section-title text-center mb-30">
									<h2 class="title-text">Newsletter and offer update</h2>
									<p class="mb-0">Get up to <strong class="text-royal-blue">30%</strong> off your first purchase by joining Newsletter, and receive weekly amazing Offer!</p>
								</div>

								<div class="form-item">
									<input type="email" name="email" placeholder="Enter your email">
									<button type="submit" class="btn bg-royal-blue">SUBSCRIBE</button>
								</div>

								<div class="checkbox-btn">
									<input id="agree-btn" type="checkbox">
									<label for="agree-btn">I have read and agreed the Terms, and Privacy Policy</label>
								</div>

							</div>
						</div>

						<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
							<div class="promotion-fullimage clearfix">
								<a href="#!" class="item-image">
									<img src="assets/images/promotion/img_7.jpg" alt="image_not_found">
								</a>
								<div class="promotion-content size-increase position-vertical-center">
									<h3 class="item-title">
										<strong class="text-royal-blue d-block mb-2">50% OFF</strong> <span class="d-block mb-1">Digital Electronic</span> <span class="d-block">Thermometer</span>
									</h3>
									<a href="shop-grid-3-column.html" class="btn-underline">Visit Store</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>

			
            <!-- offer-section - end
			================================================== -->

			
            <!-- Testimonials -section - start
			================================================== -->

			<section id="blog-section" class="blog-section sec-ptb-50 clearfix">
				<div class="container">

					<div class="section-title text-center mb-40">
						<h2 class="title-text mb-3">Testimonials</h2>
						<p class="mb-0">Checkout our all latest article from the blog pages about helth. checup, medicine</p>
					</div>

					<div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<div class="blog-boxed" data-background="assets/images/blog/img_1.jpg" style="background-image: url(&quot;assets/images/blog/img_1.jpg&quot;);">
								<div class="post-admin clearfix">
									<div class="admin-image">
										<img src="assets/images/meta/img_1.png" alt="image_not_found">
									</div>
									<div class="admin-content">
										<h4 class="admin-name">Wiliam Milan</h4>
										<span class="post-date">21 January 2020</span>
									</div>
								</div>
								<h3 class="item-title mb-3">
									<a href="blog-details.html">Whenever a doctor cannot do good, he must be kept from doing harm.</a>
								</h3>
								<p>
									There is no way to get back Lorem ipsum dolor irure dolor in reprehenderit in voluptate velit esite amet, consectetur adipisicing.
								</p>
								<a href="blog-details.html" class="btn-underline">Read More</a>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<div class="blog-boxed" data-background="assets/images/blog/img_1.jpg" style="background-image: url(&quot;assets/images/blog/img_1.jpg&quot;);">
								<div class="post-admin clearfix">
									<div class="admin-image">
										<img src="assets/images/meta/img_2.png" alt="image_not_found">
									</div>
									<div class="admin-content">
										<h4 class="admin-name">Johny Jonson</h4>
										<span class="post-date">21 January 2020</span>
									</div>
								</div>
								<h3 class="item-title mb-3">
									<a href="blog-details.html">Let food be thy medicine and medicine be thy food.</a>
								</h3>
								<p>
									There is no way to get back Lorem ipsum dolor irure dolor in reprehenderit in voluptate velit esite amet, consectetur adipisicing.
								</p>
								<a href="blog-details.html" class="btn-underline">Read More</a>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
							<div class="blog-boxed" data-background="assets/images/blog/img_1.jpg" style="background-image: url(&quot;assets/images/blog/img_1.jpg&quot;);">
								<div class="post-admin clearfix">
									<div class="admin-image">
										<img src="assets/images/meta/img_3.png" alt="image_not_found">
									</div>
									<div class="admin-content">
										<h4 class="admin-name">Anna Perry</h4>
										<span class="post-date">21 January 2020</span>
									</div>
								</div>
								<h3 class="item-title mb-3">
									<a href="blog-details.html">Try to always laugh when you can, it is cheap medicine.</a>
								</h3>
								<p>
									There is no way to get back Lorem ipsum dolor irure dolor in reprehenderit in voluptate velit esite amet, consectetur adipisicing.
								</p>
								<a href="blog-details.html" class="btn-underline">Read More</a>
							</div>
						</div>
					</div>

				</div>
			</section>

			
            <!-- Testimonials -section - end
			================================================== -->


<?php include 'footer.php';?>

<div id="myModals" class="modal fade show" aria-modal="true" role="dialog" style="display: none;">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-body px-2 px-sm-4 pb-3">
            <h4 class="fs-24 font-bold cl-dark-blue text-center py-3">Select Your City</h4>
            <div class="home_modal_city_icon ">
              <div class="container">
                <div class="row justify-content-center gx-2 gx-sm-3">
                  
                  <div class="col-4 col-sm-3 py-2 py-sm-3">
                    <button class="cursor h-100 w-100 br" id="city" data-bs-dismiss = "modal" name="Bangalore" >
                      <img alt="" class="img-fluid" src="assets/images/icons/beng.png">
                      <h6 class="text-break text-center">Bangalore</h6>
                    </button>
                  </div>
                  
                  <div class="col-4 col-sm-3 py-2 py-sm-3">
                    <button class="cursor h-100 w-100 br" id="city" name="Mumbai" >
                      <img alt="" class="img-fluid" src="assets/images/icons/mumb.png">
                      <h6 class="text-break text-center">Mumbai</h6>
                    </button>
                  </div>
                  
                  <div class="col-4 col-sm-3 py-2 py-sm-3">
                    <button class="cursor h-100 w-100 br" id="city" name="Pune" >
                      <img alt="" class="img-fluid" src="assets/images/icons/pun.png">
                      <h6 class="text-break text-center">Pune</h6>
                    </button>
                  </div>
                  
                  <div class="col-4 col-sm-3 py-2 py-sm-3">
                    <button class="cursor h-100 w-100 br" id="city" name="Bhopal"> 
                      <img alt="" class="img-fluid" src="assets/images/icons/bhp.png">
                      <h6 class="text-break text-center">Bhopal</h6>
                    </button>
                  </div>
                  
                  <div class="col-4 col-sm-3 py-2 py-sm-3">
                    <button class="cursor h-100 w-100 br" id="city" name="Nanded" >
                      <img alt="" class="img-fluid" src="assets/images/icons/nand.png">
                      <h6 class="text-break text-center">Nanded</h6>
                    </button>
                  </div>
                  
                  <div class="col-4 col-sm-3 py-2 py-sm-3">
                    <button class="cursor h-100 w-100 br" id="city" name="Nashik" >
                      <img alt="" class="img-fluid" src="assets/images/icons/nash.png">
                      <h6 class="text-break text-center">Nashik</h6>
                    </button>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<script>
    $(document).ready(function(){
//   $('.column-4-carousel').owlCarousel();
$('#myModals').modal('show');

  $('.crd-btn').click(function(e) {
            var uid = $(this).attr("value");
       
	 //alert(uid);
        e.preventDefault();
		$.ajax({
        type: 'POST',
        url: 'cart_add.php',
        data: "uid="+ uid ,
        success: function(response) {
            console.log(response);
			if(response == 'failed'){
				alert('Test is already added to cart');
			}
			else{
				window.location.reload();
			}
        }
    });
  });


  $('.cursor').click(function(e) { 
	$('#myModals').modal('hide');
  });
  
  $('.remove-btn').click(function(e) {
            var uid = $(this).attr("value");
       
	 //alert(uid);
        e.preventDefault();
		$.ajax({
        type: 'POST',
        url: 'remove_tests.php',
        data: "uid="+ uid ,
        success: function(response) {
            console.log(response);
			if(response == 'success'){
				alert('Test removed from cart');
                window.location.reload();
			}
			else{
				//window.location.reload();
			}
        }
    });
  });

});
</script>
</body>
</html>