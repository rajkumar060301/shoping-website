<?php
include "../config/config.php";

session_start();
$user = $_POST['username'];
$password = $_POST['password'];


$read_query = "SELECT * from `seller` where `seller_email`='".$user."' and `seller_password`='".$password."'";
   $result = $myConnection->query($read_query);
   if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        $_SESSION['sellerID']=$row['seller_id'];

               header("location:../seller_dashboard.php");

            }
            else{

                echo "<script>alert('You entered Wrong email id or Password')</script>";
                echo "<script>location.href='../seller-login.html'</script>";

            }

?>