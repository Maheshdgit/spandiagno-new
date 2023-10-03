<?php 
include "conn.php";
// Default response 

if(isset($_POST['upd'])){
    $response = array( 
        'status' => 0, 
        'message' => 'Form submission failed, please try again.' 
    ); 
    // File upload folder 
$uploadDir = '../assets/cat-icons/'; 
// Allowed file types 
$allowTypes = array('jpg', 'png', 'jpeg'); 
$catid = $_POST['caid'];
$tstcat = $_POST['cat']; 
// Upload file 
$uploadedFile = ''; 
if(!empty($_FILES["cat-img"]["name"])){ 
    // File path config 
    $fileName = basename($_FILES["cat-img"]["name"]); 
    $targetFilePath = $uploadDir . $fileName; 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
     
    // Allow certain file formats to upload 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to the server 
        if(move_uploaded_file($_FILES["cat-img"]["tmp_name"], $targetFilePath)){ 
            $uploadedFile = $fileName; 

$sql = "UPDATE category SET category = '$tstcat',icon = '$uploadedFile' WHERE id = '$catid' ";
$res = mysqli_query($conn,$sql);
if($res){
$response = array( 
    'status' => 1, 
    'message' => 'Category Updated Successfully.' 
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
        }
else{
    $response = array( 
        'status' => 0, 
        'message' => 'File Upload Failed ..' 
    ); 
}
    }
    else{
        $response = array( 
            'status' => 0, 
            'message' => 'File format not allowed ..' 
        ); 
    }
}

echo json_encode($response);
}
else
{
    if(isset($_POST['catid'])){
    $uniq = $_POST['catid'];
    $sql = "DELETE FROM category WHERE id = '$uniq' ";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "Category Deleted Successfully ..!";
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