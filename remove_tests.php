<?php 
session_start();
if (isset($_POST['uid'])){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["uid"] == $_POST['uid']){
                unset($_SESSION['cart'][$key]);
             echo "success";
            }
        }
    }
  
?>