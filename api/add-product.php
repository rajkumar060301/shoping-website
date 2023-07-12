<?php
include '../config/config.php';

// if($_POST["action"] == "insert"){
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $cost = $_POST['cost'];

    // $query = "SELECT * FROM `cart` WHERE `product_id` = '$id'";
    // $result = mysqli_query($myConnection,$query);
    // if (mysqli_num_rows($result) > 0) {
    //             echo 1;
    //         }

    //         else{

                $insert = "INSERT INTO `cart`(`product_name`,`product_description`,`product_cost`) 
                VALUES('$name','$desc','$cost')";
                if(mysqli_query($myConnection,$insert)){
                    echo "Data inserted succussfulyy";
                }
                else{
                     echo "Data not inserted succussfulyy";


                // }

                // }

            }

