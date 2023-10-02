<?php
include "conn.php";

 // Default response 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if($_POST['coupon'] != '' || $_POST['coupon'] != ''){ 
    // Get the submitted form data 
    $coupon = $_POST['coupon']; 
    $coupon_desc = $_POST['coupondesc']; 
    $coupondisc = $_POST['coupondisc']; 
    $unique = uniqid();
   // Upload file 
   $uploadedFile = ''; 

               $sql = "INSERT INTO spancoupons(coupon, description, percentage,active,uniq) VALUES ('$coupon','$coupon_desc','$coupondisc',1,'$unique')";
               if ($conn->query($sql) === TRUE) {
                $uploadStatus = 1;
                $response['status'] = 1;
              $response['message'] = 'The coupon data saved.';
              } 
              else{
                echo "Error: " . $sql . "<br>" . $conn->error;
                $uploadStatus = 0; 
               $response['message'] = 'Sorry, Please try again ..!'; 
              }
              $conn->close();
              }
              else{ 
               $uploadStatus = 0; 
               $response['message'] = 'Sorry, Please fill out all the fields.'; 
              } 

 
// Return response 
echo json_encode($response);