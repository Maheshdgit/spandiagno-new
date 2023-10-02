<!DOCTYPE html>
<html lang="en">
<head>
<title>Span Diagnostics - <?php echo $testtitle ; ?></title>
<?php include 'header.php'; ?>
<body class="home-v2">
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'menu.php'; 
include 'conn.php';
$unq=$_GET['tst_id'];
$sql = "SELECT * FROM tests WHERE uniq = '$unq'";
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
if($disc != '' || $disc != null){
                    $newp = $mrp - ($mrp * ($disc/100));
                }
                else{
                    $newp = $mrp;
                }
// if($row['tests_icluded'] != 0 || $row['tests_icluded'] != null){
// $tsts_inc = json_decode($row['tests_icluded']);
// $no = count($tsts_inc);
// }
// else{
//   $no = 1;
// }

$no = is_array($row['tests_icluded'] )?count(json_decode($row['tests_icluded'])):1;

}
} 
else {
echo "0 results";
}
$conn->close();
?>

			<!-- details-section - start
			================================================== -->
	<section class="details-section sec-pt-150 pb-0 clearfix">
		
    <div class="container">
    <div class="row mb-75 justify-content-lg-between justify-content-md-between justify-content-sm-center">
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 crd-shd">
       <div class="details-content pl-20">
          <h2 class="title mb-15"><?php echo $testtitle; ?></h2>
          <h4 class="">
             <?php echo $shrtdesciption; ?>
          </h4>
          <div class="rating-star ul-li clearfix">
             <div class="col-md-12">
                <div class="plc clearfix">
                   <div class="item-icn clr-rd">
                      <i class="las la-info-circle"></i>
                   </div>
                   <div class="item-content">
                      <h6 class="item-title mtt"> Preparation Required: <?php echo $preparation;?></h6>
                   </div>
                </div>
             </div>
          </div>
          <div class="rating-star ul-li mb-30 clearfix">
             <div class="col-md-12">
                <div class="plc clearfix" style="margin:0px !important;">
                   <div class="item-icn clr-ylw">
                      <i class="las la-clock"></i>
                   </div>
                   <div class="item-content">
                      <h3 class="item-title mtt">Get Reports Within <?php echo $reptime; ?></h3>
                   </div>
                </div>
             </div>
          </div>
          <div class="row">
             <?php if($disc == 0 || $disc == '' || $disc == null){?>
               <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="fts-38" >₹ <?php echo $mrp; ?></span></span>
             </div>
             <?php
                }
                else{
                    ?>
                    <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="old" >₹<?php echo $mrp; ?></span><span class="" id="fts-38" >₹<?php echo $newp; ?> </span> <span class="flag-discount"><?php echo $disc;?> % Off</span></span>
             </div>
             
             <?php
                }
                ?>
          </div>
          <div class="btns-group ul-li mb-30">
             <ul class="clearfix">
                <li>  <button type="button" name="atc"  value="<?php echo $unq; ?>" class="btn btn-primary crd-btn">Add to Cart</button></li>
             </ul>
          </div>
          <div class="info-list ul-li-block">
             <ul class="clearfix">
                <li><strong class="list-title mb-15">Category:</strong> <a href="#!"><?php echo $tst_category;?></a></li>
             </ul>
          </div>
       </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
       <div class="details-content pl-20">
          <div class="container">
             <button type="button" class="btn btn-primary band" data-toggle="collapse" data-target="#demo">
                <h1 class="band-title"><?php echo $testtitle;?></h1>
                <br/>
                <h5 class="clr-w"><?php echo $no;?> tests included</h5>
             </button>
             <div id="demo" class="collapse">
                <div class="info-list ul-li-block">
                   <ul class="clearfix list-group">
                      <?php
                         foreach($tsts_inc as $value) {
                             ?>
                      <li class="list-group-item itdec "><?php echo $value;?></li>
                      <?php
                         }
                         
                         ?>
                   </ul>
                </div>
             </div>
             <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                   <h3 class="pt-30">Test Description</h3>
                   <p><?php echo $tst_description; ?></p>
                </div>
             </div>
             <div class="row mt--40 row justify-content-lg-between justify-content-md-center justify-content-sm-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                   <div class="policy-default clearfix">
                      <a href="#freq-section">
                         <div class="item-icon">
                            <i class="las la-medkit"></i>
                         </div>
                         <div class="item-content">
                            <h6 class="item-title mtt">Frequently Tested Togather</h6>
                         </div>
                      </a>
                   </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                   <div class="policy-default clearfix">
                      <a href="#rel-section">
                         <div class="item-icon"><i class="las la-prescription"></i></div>
                         <div class="item-content">
                            <h6 class="item-title mtt">Related Tests</h6>
                         </div>
                      </a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    </div>
    </div>
</section>

<!----------------Related Section Start----->
<section  class="shop-section sec-pb-50 decoration-wrap clearfix">
				<div class="container" id="rel-section">
					<div class="section-title text-center mb-70" >
						<h2 class="title-text mb-3" >Related Tests</h2>
					</div>
                <div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<?php 
                include 'conn.php';
               // $unq=$_GET['tst_id'];
                $sql = "SELECT * FROM tests WHERE category = '$tst_category' AND uniq != '$unq' LIMIT 4";
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
                  echo  $disc = $row['discount'];
					$unqid = $row['uniq'];
              if($disc != '' || $disc != 0){
                    $newp = $mrp - ($mrp * ($disc/100));
                }
                else{
                    $newp = $mrp;
                }
             $no = is_array($row['tests_icluded'] )?count(json_decode($row['tests_icluded'])):1;
                
                ?>

  <div class="col-xl-3 col-lg-3 col-md-3 crd" >
                <div class="card bg-light rounded shadow crds" >
                    <div class="card-body product-grid p-4 cb">
					
					<div class="post-label ul-li-right clearfix">
										<ul class="clearfix">
											<li class="bg-white">-<?php echo $disc;?>%</li>
											<!-- <li class="bg-skyblue">NEW</li> -->
										</ul>
									</div>
                        <h5 class="crd-title"><span class="rel-icon"><i class="las la-vial"></i></span> <?php echo $testtitle;?></h5>

						<div class="mt-3">
							<p class="clr-w"><span class="icn"><i class="las la-shopping-basket"></i> <?php echo $no;?></span> tests included</p>
						</div>
                  <div class="mt-3">
                  <?php if($disc == 0 || $disc == '' || $disc == null){?>
               <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="fts-38" >₹ <?php echo $mrp; ?></span></span>
             </div>
             <?php
                }
                else{
                    ?>
                    <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="old" >₹<?php echo $mrp; ?></span><span class="" id="fts-38" >₹<?php echo $newp; ?> </span> <span class="flag-discount"><?php echo $disc;?> % Off</span></span>
             </div>
             
             <?php
                }
                ?>
                        </div>
                        
						<div class="mt-3">
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
<h2>No related Tests</h2>
<?php
                }
                $conn->close();
                ?>
					</div>
		</div>
		</div>
</section>


 <!-----Related section End -------->

 <section  class="shop-section sec-ptb-50 decoration-wrap clearfix">
				<div class="container" id="freq-section">
					<div class="section-title text-center mb-70" >
						<h2 class="title-text mb-3" >Frequently Tested Togather</h2>
					</div>
                <div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<?php 
                include 'conn.php';
               $unq=$_GET['tst_id'];
                $sql = "SELECT * FROM tests WHERE active = 1 AND category != '$tst_category' AND uniq !='$unq' LIMIT 4";
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
             if($disc != '' || $disc != 0){
                    $newp = $mrp - ($mrp * ($disc/100));
                }
                else{
                    $newp = $mrp;
                }
$no = is_array($row['tests_icluded'] )?count(json_decode($row['tests_icluded'])):1;
                $unqid = $row['uniq'];
                ?>

  <div class="col-xl-3 col-lg-3 col-md-3 crd" id="">
                <div class="card bg-light rounded shadow crds" >
                    <div class="card-body product-grid p-4 cb">
					
					<div class="post-label ul-li-right clearfix">
										<ul class="clearfix">
											<li class="bg-white">-<?php echo $disc;?>%</li>
											<!-- <li class="bg-skyblue">NEW</li> -->
										</ul>
									</div>
                        <h5 class="crd-title"><span class="rel-icon"><i class="las la-vial"></i></span> <?php echo $testtitle;?></h5>

						<div class="mt-3">
							<p class="clr-w"><span class="icn"><i class="las la-shopping-basket"></i> <?php echo $no;?></span> tests included</p>
						</div>
                        <div class="mt-3">
                        <?php if($disc == 0 || $disc == '' || $disc == null){?>
               <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="fts-38" >₹ <?php echo $mrp; ?></span></span>
             </div>
             <?php
                }
                else{
                    ?>
                    <div class="col-md-12">
                <span class="item-price mb-30">MRP : <span class="" id="old" >₹<?php echo $mrp; ?></span><span class="" id="fts-38" >₹<?php echo $newp; ?> </span> <span class="flag-discount"><?php echo $disc;?> % Off</span></span>
             </div>
             <?php
                }
                ?>
                        </div>
                        
                        <div class="mt-3">
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
<h2>No related Tests</h2>
<?php
                }
                $conn->close();
                ?>
					</div>
		




</div>
</div>
</section>


			
			<!-- details-section - end
			================================================== -->

<?php include 'footer.php';?>
<script>

$(document).ready(function(){
  $('.column-4-carousel').owlCarousel();

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



</script>
</body>
</html>