<?php
include "conn.php";

// File upload folder 
$uploadDir = '../assets/cat-icons/'; 
// Allowed file types 
$allowTypes = array('jpg', 'png', 'jpeg'); 
 
// Default response 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if(isset($_POST['tst-cat']) || isset($_POST['cat-img'])){ 
    // Get the submitted form data 
    $tstcat = $_POST['tst-cat']; 
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

               $sql = "INSERT INTO category(category,icon,active) VALUES ('$tstcat','$fileName',1)";
               if ($conn->query($sql) === TRUE) {
                $uploadStatus = 1;
                $response['status']=1;
              $response['message'] = 'The file uploaded successfully and the data saved.';
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              
              $conn->close();
              
           }
           else{ 
               $uploadStatus = 0; 
               $response['message'] = 'Sorry, there was an error uploading your file.'; 
           } 
       }
       else{ 
           $uploadStatus = 0; 
           $response['message'] = 'Sorry, only '.implode('/', $allowTypes).' files are allowed to upload.'; 
       } 
        
    }
   
} 
 
// Return response 
echo json_encode($response);