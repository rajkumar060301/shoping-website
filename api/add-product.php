<?php
include '../config/config.php';

$id = $_POST['pid'];
$cus_id = $_POST['cus_id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$quantity = $_POST['quantity'];
$cost = $_POST['cost'] *  $quantity;
$images = $_POST['images'];


$query = "SELECT * FROM `cart` WHERE `product_id` = '$id' and `cus_id`='$cus_id'";
$result = mysqli_query($myConnection,$query);
if (mysqli_num_rows($result) > 0) {
    echo 1;
}

else{

    $insert = "INSERT INTO `cart`(`product_id`,`cus_id`,`product_name`,`product_description`,`product_quantity`,`product_cost`,`product_img`) 
    VALUES('$id','$cus_id','$name','$desc',$quantity,'$cost','$images')";
    if(mysqli_query($myConnection,$insert)){
        echo "Card add in card menu";
    }
    else{
            echo "Data not added in card";
    }
    }

    ?>



