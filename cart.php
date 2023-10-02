<!DOCTYPE html>
<html lang="en">
<head>
<title>Span Diagnostics - Cart Page</title>
<?php include 'header.php'; ?>

<body class="home-v2">
    <?php include 'menu.php'; ?>

		<!-- main body - start
		================================================== -->
		<main>

		<section id="breadcrumb-section" class="breadcrumb-section d-flex align-items-center decoration-wrap clearfix" data-background="assets/images/background/bg_1.jpg" style="background-image: url('assets/images/background/bg_1.jpg');margin-top: 140px;">
				<div class="container text-center">
					<h1 class="page-title mb-3">My Cart</h1>
					<div class="breadcrumb-nav ul-li-center clearfix">
						<ul class="clearfix">
							<li><a href="index.php">Home</a></li>
							<li class="active">Cart</li>
						</ul>
					</div>
				</div>

				<span class="decoration-image pill-image-1">
					<img src="assets/images/decoration/pill_1.png" alt="pill_image_not_found">
				</span>
			</section>

			<!-- cart-section - start
			================================================== -->
			<section id="cart-section" class="cart-section sec-pt-20 clearfix">
				<div class="container">

					<div class="table-wrap">
						<table class="table">
							<thead>
								<tr>
									<th>Test Name</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
<?php
include 'conn.php';
$total = 0;
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
								<tr>
									<td>
										<div class="product-info ul-li">
											<ul class="clearfix">
												<li>
													<button type="button" value ="<?php echo $row['uniq'];?>" class="remove-btn"><i class="las la-times"></i></button>
												</li>
												<li>
													<h4 class="item-title"><?php echo $row['title']; ?></h4>
												</li>
											</ul>
										</div>
									</td>
									<td><span class="item-price">₹<?php echo $row['discounted_mrp']; ?></span></td>
								</tr>

                            <?php
							 $total = $total + (int)$row['discounted_mrp'];
                                    }
                                }
                            }
                        }
                            }
                            ?>
							</tbody>


						</table>
					</div>

					<div class="cuponcode-form mb-70">
						<div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
							<div class="col-lg-4 col-md-7 col-sm-10 col-xs-12">
								<form id="cpn-frm" method="POST" action="#">
									<div class="form-item mb-0">
										<input type="text" id="cpn" name="cupon" placeholder="cupon code">
										<button type="submit" id="apply" class="btn bg-royal-blue">Apply now</button>
									</div>
								</form>
							</div>

							<div class="col-lg-7 col-md-7 col-sm-10 col-xs-12">
								<div class="btns-group ul-li-right">
									<ul class="clearfix">
										<li><a href="#" class="btn bg-default-black">Continue Shopping</a></li>
										<!-- <li><a href="#!" class="btn bg-royal-blue">Update Cart</a></li> -->
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="row justify-content-lg-end justify-content-md-center justify-content-sm-center">
						<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
							<div class="total-cost-bar mb-30 clearfix">
								<h3 class="title-text mb-0">Total Cost</h3>
								<div class="cost-info ul-li-block clearfix">
									<ul class="clearfix">
										<input type="hidden" id="sbttl" value="<?php echo $total;?>" />
										<li><strong>Subtotal</strong> <span >₹ <?php echo $total;?></span></li>
										<li><strong id="cm"></strong><span id="rmbs"></span><span id="cd"></span></li>
										<!-- <li>
											<strong>Shipping Cost</strong> <span>$5.00</span>
											<p class="mb-0 text-right">Shipping to DHL</p>
										</li> -->
									</ul>
								</div>
								<div class="total-cost clearfix">
									<strong>Total</strong>
									<span id="ttl">₹ <?php echo $total;?></span>
								</div>
							</div>
							<div class="btn-wrap text-right">
								<a href="checkout.html" class="btn bg-royal-blue">Proceed to Checkout</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- cart-section - end
			================================================== -->
		</main>
		<!-- main body - end
		================================================== -->

</main>
<?php include 'footer.php'; ?>
<script>
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

  $('#rmbs').click(function(e) {
	alert("coupon code removed");
window.location.reload();

  });
  
 $('#apply').click(function(e) {
            var cpn = $('#cpn').val();
       
	 //alert(uid);
        e.preventDefault();
		$.ajax({
        type: 'POST',
        url: 'admin-login/coupon_select.php',
        data: "cpn="+ cpn ,
		success: function(result){
			var data = jQuery.parseJSON(result)
                if(data.state == 1){
                $("#apply").html('Applied');
               $("#apply").prop("disabled", true);
				$("#cm").html("Applied Coupon: " + cpn);
				$("#cd").html('- '+ data.disc +'%');
				$('#rmbs').html('<span id="rmbtn">X</span>');
				var subttl = $('#sbttl').val();
				var ttl = Math.ceil(subttl - (subttl*(data.disc/100))); 
				$('#ttl').html(ttl);
                }
				else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+data.message+'</p>');
					alert("Invalid Coupon Code");
					console.log(data);
                }
				
            }
    });

	$('#cpn').on('input',function(e){
		$("#apply").html('Apply');
               $("#apply").prop("disabled", false);
});
  });



</script>

</script>


</body>
</html>