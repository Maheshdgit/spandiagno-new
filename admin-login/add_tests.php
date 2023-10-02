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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
.multiselect-dropdown{
    width:100% !important;
}
    </style>
    <?php include 'header.php'; ?>

    <body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">
        <?php 
        include 'conn.php'; 
        include 'menu.php'; ?>
    
        <div class="content-body">
			
            <div class="container-fluid">
                <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Test Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id = "addtst">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Test Title</label>
                                                <input type="text" name="tst-ttle" class="form-control input-rounded" placeholder="Test title">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Test Category</label>
                                                <select type="text" name="tst-cat" class="form-control input-rounded" >
                                                    <option>-- Select Test Category --</option>
                                                    <?php 
                include 'conn.php';
                $sql = "SELECT category FROM category WHERE active = 1 ";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
                   ?>
                   <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                   <?php
    }
} 
else {
  echo "0 results";
}
$conn->close();
?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label class="form-label">Test Cost</label>
                                                <input type="text" name="tst-cost" id="mrp" class="form-control input-rounded" placeholder="Test Cost">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Test short Description</label>
                                                <input type="text" name="tst-shrtdesc" class="form-control input-rounded" placeholder="Test Short Description">
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="row">
                                        <div class="mb-3 col-md-6">
                                                <label class="form-label">Test Preparation </label>
                                                <input type="text" name="tst-prep" class="form-control input-rounded" placeholder="Test Preparation">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Test Reports Time</label>
                                                <input type="text" name="tst-rep" class="form-control input-rounded" placeholder="Test Reports Time">
                                            </div>
                                            
                                           
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                               <div class="form-check form-switch">
                                                 <input class="form-check-input" type="checkbox" name="ps" role="switch" id="dscnt" value="1">
                                                 <label class="form-check-label" for="package"> Enable Discount </label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row" id="discountfields" style="display:none;">
                                        <div class="mb-3 col-md-6">
                                                <label class="form-label">Discount %</label>
                                                <input type="number" name="tst-dcnt" id="discnt" class="form-control input-rounded" placeholder="Please enter the values">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">MRP after Discount (for your reference) </label>
                                                <input type="text" name="discounted_mrp" id="tstdisc" class="form-control input-rounded" placeholder="Test cost after discount" disabled>
                                            </div>
</div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                               <div class="form-check form-switch">
                                                 <input class="form-check-input" type="checkbox" name="ps" role="switch" id="package" value="1">
                                                 <label class="form-check-label" for="package"> Create Test Package  </label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row" id="mult" style="display:none;" >
                                            <div class="mb-3 col-md-8">
                                                <label class="form-label">Tests Included</label>
                                                <select  name="tstsinc[]" id="field2"  multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" onchange="console.log(this.selectedOptions)">   
                                                
                                                    <?php 
                include 'conn.php';
                $sql = "SELECT title FROM tests WHERE active = 1 ";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
                   ?>
                   <option value="<?php echo $row['title'];?>"><?php echo $row['title'];?></option>
                   <?php
    }
} 
else {
  echo "0 results";
}
$conn->close();
?>
                                                    <?php 

                                                    ?>
                                                </select>
                                            </div>
                                           
                                        </div>
                                        <div class="row" >
                                        
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Test Description</label>
                                                <textarea class="form-txtarea form-control" name="tst-desc" rows="8" id="comment"></textarea>
                                            </div>
                                        </div>
   
                                       
                                      
                                        <button type="submit"  class="btn btn-primary submitBtn">Add Test</button>
                                    </form>
                                </div>
                                <div class="row pt-2">
                                    <div class="statusMsg"></div>
</div>
                            </div>
                        </div>
					</div>
</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/multi-select.js" ></script>

    <?php include 'footer.php' ; ?>

    <div class="modal fade" id="myModal"  aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Are you creating a package ?</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="text-danger "><b>Note : </b>To create package please toggle this button, Don't toggle this for individual tests.</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">Continue</button>
                                                    <!-- <button type="button" class="btn btn-primary">Continue</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>


<script>
    $(document).ready(function(e){
    $("#addtst").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'insert_tests.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#addtst').css("opacity",".5");
            },
            success: function(response){
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#addtst')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                    window.location.reload();
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#addtst').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });


//  mrp discnt tstdisc 

$('#discnt').on('input', function() {
    var mrp = $('#mrp').val();
    var disc = $('#discnt').val();
    var mrpaftdsc = mrp - (mrp * (disc/100));
    $('#tstdisc').val(mrpaftdsc);
});



$('#package').change(function() {
    if(this.checked) {
        $("#myModal").modal("show");
        $("#mult").css("display","block");
    }  
    else{
        $("#mult").css("display","none");
        $("#myModal").modal("hide");
    }    
});

$('.btn-close').click(function() {
$('#package').prop('checked', false); 
$("#mult").css("display","none");
});

$('#dscnt').change(function() {
    if(this.checked) {
       
        $("#discountfields").css("display","block");
    }  
    else{
        $("#discountfields").css("display","none");
    }    
});
});
</script>






</body>
</html>