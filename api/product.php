<?php
include '../config/config.php';
session_start();
$seller_id = $_SESSION['sellerID'];
    $product_name = $_POST['productName'];
    // $product_img = $_POST['product_img'];
    $product_price = $_POST['productPrice'];
    $product_desc = $_POST['productDescription'];
    date_default_timezone_set('Asia/Kolkata');

    // Get the current date and time
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');

    $files = $_FILES['productImage'];
    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];

    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));

    $fileextstored = array('png','jpg','jpeg');
    if(in_array($filecheck,$fileextstored)){
        $destinationfile='upload/'.$filename;
        move_uploaded_file($filetmp,$destinationfile);
    }
    $insert = "INSERT INTO `product`(`seller_id`,`product_name`,`pimage`,`product_desc`,`upload_date`,`upload_time`,`product_cost`) 
    VALUES('$seller_id','$product_name','$destinationfile','$product_desc','$currentDate','$currentTime','$product_price')";
    if(mysqli_query($myConnection,$insert)){
        header('location:../seller_dashboard.php');

        // echo "<script location.href='../seller_dashboard.php'></script>";
    }
    else{
            echo "Product not inserted";


    }

    
