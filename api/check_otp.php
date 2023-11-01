<?php
include '../config/config.php';
$number = $_POST['number'];
$otp = $_POST['otp'];
// $otp=rand(11111,99999);

$verified = 1;
$query = "SELECT * FROM `customer` WHERE  `customer_number`='$number' and `verification_code` = '$otp'";
$result = mysqli_query($myConnection,$query);
if (mysqli_num_rows($result)> 0) {
            $update = "update `customer` set `verified`='$verified' where `customer_number`='$number'";
            $data = mysqli_query($myConnection,$update);
            echo "verified";
        }
        else{
            echo "not_match";

            }
?>