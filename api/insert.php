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
    $verified = 1;
    // $retrive = "SELECT * FROM `customer` WHERE `customer_number` = '$number'";
    // $result_data = mysqli_query($myConnection,$retrive);
    // if (mysqli_num_rows($result_data) > 0) {
    //             $row = mysqli_fetch_array($result_data);
    //         }
    //         else{
    //         }
    
    
    $query = "SELECT * FROM `customer` WHERE `customer_email` = '$email'";
    $result = mysqli_query($myConnection,$query);
    if (mysqli_num_rows($result) > 0) {
                echo 1;
            }
            else{
                $insert = "UPDATE `customer` set
                `customer_name`='$name',
                `customer_email`='$email',
                `customer_password`='$password',
                `customer_dob`='$dob',
                `customer_address`='$address',
                `customer_gender`='$gender',
                `customer_type`='$job' where `customer_number`='$number' and `verified`='$verified'";
                
                if(mysqli_query($myConnection,$insert)){
                    echo "customer registration successfully";
                }
                else{
                     echo "Number verification is required";


                }

                }

            }

