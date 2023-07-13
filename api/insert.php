<?php
include '../config/config.php';

if($_POST["action"] == "insert"){
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $job = $_POST['job'];
    
    $query = "SELECT * FROM `customer` WHERE `customer_email` = '$email'";
    $result = mysqli_query($myConnection,$query);
    if (mysqli_num_rows($result) > 0) {
                echo 1;
            }

            else{

                $insert = "INSERT INTO `customer`(`customer_name`,`customer_email`,`customer_number`,`customer_password`,`customer_dob`,`customer_address`,`customer_gender` ,`customer_type`) 
                VALUES('$name','$email','$number','$password','$dob','$address','$gender', '$job')";
                
                if(mysqli_query($myConnection,$insert)){
                    echo "Card add in card menu";
                }
                else{
                     echo "Data not added in card";


                }

                }

            }

