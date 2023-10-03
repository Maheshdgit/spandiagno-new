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
	<title>Website Management Portal</title>

    <?php include 'header.php'; ?>

    <body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">
        <?php include 'menu.php'; ?>
    
        <div class="content-body">
			
            <div class="container-fluid">
                <div class="row">
            <div class="col-xl-12 col-lg-12">
                <?php 
                include 'conn.php';
                if(isset($_GET['catid'])){
                   $cid = $_GET['catid'];
                    $sql = "SELECT * FROM category WHERE id = $cid";
                    $res = mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $cat = $row['category'];
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Test Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id = "updcat" enctype="multipart/form-data">
                                        <input type="hidden" name="caid" value="<?php echo $_GET['catid'];?>" />
                                        <input type="hidden" name="upd" value= 1 />
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Test Category</label>
                                                <input type="text" name="cat" class="form-control input-rounded" value="<?php echo $cat;?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Category Icon</label>
                                                <input type="file" name="cat-img" class="form-control input-rounded" placeholder="Category Icon">
                                            </div>
                                        </div>
                                       
                                      
                                        <button type="submit" class="btn btn-primary updBtn">Update Category</button>
                                    </form>
                                </div>
                                <div class="row pt-2">
                                    <div class="statusMsg"></div>
</div>
<?php
}
else{
?>
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Test Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id = "addcat" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Test Category</label>
                                                <input type="text" name="tst-cat" class="form-control input-rounded" placeholder="Test Category">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Category Icon</label>
                                                <input type="file" name="cat-img" class="form-control input-rounded" placeholder="Category Image">
                                            </div>
                                        </div>
                                       
                                      
                                        <button type="submit" class="btn btn-primary submitBtn">Add Category</button>
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
            url: 'category_insert.php',
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
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#addcat').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });

    $("#updcat").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'categories_update.php',
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
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#addcat').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});
</script>

</body>
</html>