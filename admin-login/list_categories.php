<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:title" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">
    	<!-- PAGE TITLE HERE -->
	<title>Website Management Portal</title>

    <?php include 'header.php'; ?>

    <body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">
    <?php include 'menu.php'; ?>
    
    <div class="content-body">
   <div class="container-fluid">
      <div class="table-responsive">
         <table class="table table-responsive-md">
            <thead>
               <tr>
                  <th><strong>Id</strong></th>
                  <th><strong>Category Name</strong></th>
                  <th><strong></strong></th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  include 'conn.php';
                  $sql = "SELECT * FROM category WHERE active = 1";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result) > 0){
                    while( $row = mysqli_fetch_assoc($result)){
                  ?>
               <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><img src="../assets/cat-icons/<?php echo $row['icon'];?>" class="rounded-lg me-2" width="24" alt="">
						<span class="w-space-no"><?php echo $row['category'];?></span></td>
                  <!-- <td><?php echo $row['percentage'];?></td> -->
                  <td><a href="add_category.php?catid=<?php echo $row['id'];?>"><button class="btn btn-primary cmn edt" value=""><i class="fa fa-pencil"></i></button></a>
                  <button class="btn btn-danger cmn del" value="<?php echo $row['id'];?>"><i class="fa fa-trash"></i></button></td>
               </tr>
               <?php
                  }
                  }
                      ?>
            </tbody>
         </table>
      </div>
   </div>
</div>


    <?php include 'footer.php' ; ?>

<script>
    $(".del").on('click', function(e){
        //alert('hi');
        e.preventDefault();
        var uid = $(this).val();
        //alert(uid);
    $.ajax({
      type: "POST",
      url: "categories_update.php",
      data: "catid="+ uid,
      success: function (result) {
           alert(result);
           window.location.reload();
      }
 });
    });

</script>

</body>
</html>