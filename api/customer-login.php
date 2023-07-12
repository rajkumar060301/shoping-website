<?php
include "../config/config.php";
session_start();
$user = $_POST['username'];
$password = $_POST['password'];
$read_query = "SELECT * from `customer` where `customer_email`='".$user."' and `customer_password`='".$password."'";
   $result = $myConnection->query($read_query);
   if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
        $_SESSION['teamID']=$row['customer_id'];
               header("location:../home.php");
            }
            else{
                echo "<script>alert('You entered Wrong email id or Password')</script>";
                echo "<script>location.href='../customer-login.html'</script>";

            }

?>