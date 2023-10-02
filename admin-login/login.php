<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Span Diagno - Admin Login</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
				<div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<div class="text-center">
							<h3 class="title">Sign In</h3>
							<p>Sign in to your account to manage the website</p>
						</div>
						<form method="post" id="lgnfrm" action="#">
							<div class="mb-4">
								<label class="mb-1 text-dark">Email</label>
								<input type="email" name="useremail" class="form-control form-control" placeholder="hello@example.com">
							</div>
							<div class="mb-4 position-relative">
								<label class="mb-1 text-dark">Password</label>
								<input type="password" name="userpass" id="dz-password" class="form-control" placeholder="Your Password">
								<span class="show-pass eye">
								
									<i class="fa fa-eye-slash"></i>
									<i class="fa fa-eye"></i>
								
								</span>
							</div>
							<div class="form-row d-flex justify-content-between mt-4 mb-2">
								<!-- <div class="mb-4">
									<div class="form-check custom-checkbox mb-3">
										<input type="checkbox" class="form-check-input" id="customCheckBox1" required="">
										<label class="form-check-label" for="customCheckBox1">Remember my preference</label>
									</div>
								</div> -->
								<div class="mb-4">
									<a href="page-forgot-password.html" class="btn-link text-primary">Forgot Password?</a>
								</div>
							</div>
							<div class="text-center mb-4">
								<button type="submit" id="signin" class="btn btn-primary btn-block">Sign In</button>
							</div>
							<!-- <h6 class="login-title"><span>Or continue with</span></h6> -->
							
							<!-- <div class="mb-3">
								<ul class="d-flex align-self-center justify-content-center">
									<li><a target="_blank" href="https://www.facebook.com/" class="fab fa-facebook-f btn-facebook"></a></li>
									<li><a target="_blank" href="https://www.google.com/" class="fab fa-google-plus-g btn-google-plus mx-2"></a></li>
									<li><a target="_blank" href="https://www.linkedin.com/" class="fab fa-linkedin-in btn-linkedin me-2"></a></li>
									<li><a target="_blank" href="https://twitter.com/" class="fab fa-twitter btn-twitter"></a></li>
								</ul>
							</div> -->
							<p class="text-center">Not registered?  
								<a class="btn-link text-primary" href="register.php">Register</a>
							</p>
						</form>
					</div>
				</div>
                <div class="col-xl-6 col-lg-6">
					<div class="pages-left h-100">
						<div class="login-content">
							<!-- <a href="index.html"><img src="images/logo-full.png" class="mb-3 logo-dark" alt=""></a>
							<a href="index.html"><img src="images/logi-white.png" class="mb-3 logo-light" alt=""></a>
							
							<p>CRM dashboard uses line charts to visualize customer-related metrics and trends over time.</p> -->
						</div>
						<div class="login-media text-center">
							<img src="images/login.png" alt="">
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
 <script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="js/deznav-init.js"></script>
<script src="js/demo.js"></script>
  <script src="js/custom.js"></script>
<script src="js/styleSwitcher.js"></script>

<script>
 $('#signin').click(function(e) {
            //var uid = $(this).attr("value");
       
	 //alert(uid);
        e.preventDefault();
        var values = $("#lgnfrm").serialize();

$.ajax({
       url: "signin.php",
       type: "post",
       data: values ,
       success: function (response) {
          if(response == 'success'){
            window.location = 'index.php';
          }
       },
       error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
       }
   });
});
</script>
</body>
</html>