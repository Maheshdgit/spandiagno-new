<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="description" content="Span Diagno Website Manager">
	<meta property="og:title" content="Span Diagno Website Manager">
	<meta property="og:description" content="Span Diagno Website Manager">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">
    	<!-- PAGE TITLE HERE -->
	<title>Coupon Creation - Website Management Portal</title>

    <?php include 'header.php'; ?>

    <body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">
        <?php include 'menu.php'; ?>
    
        <div class="content-body">
			
            <div class="container-fluid">
                <div class="row">
            <div class="col-xl-12 col-lg-12">
                <?php
                
                if(isset($_GET['uniq'])){
                    include 'conn.php';
                    $uq = $_GET['uniq'];
                    $sql = "SELECT * FROM spancoupons WHERE uniq = '$uq'";
                    $res = mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                    ?>
                                            <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Coupons</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id = "updcat" method="POST" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Coupon Name</label>
                                                <input type="text" name="coupon" class="form-control input-rounded" placeholder="Coupon name" value="<?php echo $row['coupon'];?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Coupon Description</label>
                                                <input type="text" name="coupondesc" class="form-control input-rounded" placeholder="Coupon Description" value="<?php echo $row['description'];?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Coupon Discount</label>
                                                <input type="number" name="coupondisc" class="form-control input-rounded" placeholder="Discount Percentage" value="<?php echo $row['percentage'];?>">
                                            </div>
                                        </div>
                                       <input type="hidden" name="upd" value="1" />
                                       <input type="hidden" name="uniq" value="<?php echo $uq; ?>" />
                                        <button type="submit" id="updBtn" class="btn btn-primary updBtn">Update Coupon</button>
                                    </form>
                                </div>
                                <div class="row pt-2">
                                    <div class="statusMsg"></div>
</div>
                        
<?php
}
else
{
?>
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Coupons</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id = "addcat" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Coupon Name</label>
                                                <input type="text" name="coupon" class="form-control input-rounded" placeholder="Coupon name">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Coupon Description</label>
                                                <input type="text" name="coupondesc" class="form-control input-rounded" placeholder="Coupon Description">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Coupon Discount</label>
                                                <input type="number" name="coupondisc" class="form-control input-rounded" placeholder="Discount Percentage">
                                            </div>
                                          
                                        </div>
                                       
                                      
                                        <button type="submit" class="btn btn-primary submitBtn">Add Coupons</button>
                                    </form>
                                </div>
                                <div class="row pt-2">
                                    <div class="statusMsg"></div>
</div>
<?php
}
?>
                            </div>
                        </div>
					</div>
</div>

</div>


<?php include 'footer.php' ; ?>
<script>
    $(document).ready(function(e){
    // Submit form data via Ajax
    $("#addcat").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'insert_coupon.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#addcat').css("opacity",".5");
            },
            success: function(response){
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#addcat')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                    window.location.reload();
                }
                else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#addcat').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });

    $("#updcat").on('submit', function(e){
        //alert('hi');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'coupons_update.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.updBtn').attr("disabled","disabled");
                $('.updBtn').css("opacity",".5");
            },
            success: function(response){
                $('.statusMsg').html('');
                if(response.status == 1){
                    // $('.updBtn')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                window.location.reload();
                }
                else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('.updBtn').css("opacity","");
                $(".updBtn").removeAttr("disabled");
            }
        });
    });
});
</script>

</body>
</html>