<?php

session_start();
if (isset($_POST['uid'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "uid");

        if(in_array($_POST['uid'], $item_array_id)){
            echo "failed";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'uid' => $_POST['uid']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'uid' => $_POST['uid']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
       // print_r($_SESSION['cart']);
    }
}


?>