<?php 
include "conn.php";
// Default response 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
if(isset($_POST['upd'])){
$catid = $_POST['cid'];
$cpn = $_POST['category'];
$cpndisc = $_POST['coupondisc'];
$cpndesc = $_POST['coupondesc'];

$sql = "UPDATE category SET cocategory = '$cpn',icon = '$cpndesc' WHERE id = '$catid' ";
$res = mysqli_query($conn,$sql);
if($res){
    // Default response 
$response = array( 
    'status' => 1, 
    'message' => 'Coupon Updated Successfully.' 
); 
}
else{
        echo "Error updating record: " . mysqli_error($conn);
      mysqli_close($conn);
    $response = array( 
        'status' => 0, 
        'message' => 'Form submission failed, please try again.' 
    ); 
}
echo json_encode($response);
}
else
{
    if(isset($_POST['unid'])){
    $uniq = $_POST['unid'];
    $sql = "DELETE FROM spancoupons WHERE uniq = '$uniq' ";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "Coupon Deleted Successfully ..!";
        mysqli_close($conn);
    }
    else{
        echo "Error updating record: " . mysqli_error($conn);
      mysqli_close($conn);
    }
}
else{
    echo "Error !!!";
}
}