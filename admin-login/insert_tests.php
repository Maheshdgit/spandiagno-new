<?php
include 'conn.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$testtitle = mysqli_real_escape_string($conn,$_POST['tst-ttle']);
$testshrtdesc = mysqli_real_escape_string($conn,$_POST['tst-shrtdesc']);
$testcat = mysqli_real_escape_string($conn,$_POST['tst-cat']);
$testcost = $_POST['tst-cost'];
$testprep = mysqli_real_escape_string($conn,$_POST['tst-prep']);
$testreptime = mysqli_real_escape_string($conn,$_POST['tst-rep']);


// Default response 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 

if(isset($_POST['tstsinc'])){
    // $testsinc = $_POST['tstsinc'];
    $testsinc = json_encode($_POST['tstsinc']);
}

if($_POST['tst-dcnt'] != '' || $_POST['tst-dcnt'] != null )
{
    $testdiscount = $_POST['tst-dcnt'];
    $dicmrp = ($_POST['tst-cost'] - ($_POST['tst-cost']*($testdiscount/100)));
}
else{
    $testdiscount = 0;
     $dicmrp = $testcost;
}

$testdescription = mysqli_real_escape_string($conn,$_POST['tst-desc']);
$unique = uniqid();

if($_POST['tst-dcnt'] != null || $_POST['tst-dcnt'] != ''){
    $sql = "INSERT INTO tests(title, short_description, description, package, tests_icluded, mrp, discount,discounted_mrp, category, active, preparation,rep_time,uniq) 
    VALUES ('$testtitle','$testshrtdesc','$testdescription','1','$testsinc','$testcost','$testdiscount','$dicmrp','$testcat','1','$testprep','$testreptime','$unique')";
}
if($_POST['tst-dcnt'] == null || $_POST['tst-dcnt'] == ''){
    $sql = "INSERT INTO tests(title, short_description, description, mrp, discounted_mrp,category, active, preparation,rep_time,uniq) 
VALUES ('$testtitle','$testshrtdesc','$testdescription','$testcost','$dicmrp','$testcat','1','$testprep','$testreptime','$unique')";
}

if ($conn->query($sql) === TRUE) {
    $response['status']=1;
    $response['message'] = 'The file uploaded successfully and the data saved.';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  $response['status']=0;
              $response['message'] = 'Failed Insertion, Please try again';
}

$conn->close();

echo json_encode($response);