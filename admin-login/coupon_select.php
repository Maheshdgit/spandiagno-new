<?php
include "conn.php";
$response = array( 
    'state' => 0, 
    'disc' => 0
); 
$cpn = $_POST['cpn'];
$sql = "SELECT * FROM spancoupons WHERE coupon='$cpn' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$cpndisc = $row['percentage'];
$response['state'] = 1;
$response['disc'] = $cpndisc;
}
else{
    $response['state']=0;
    $response['disc'] = 0;
}

echo json_encode($response);
