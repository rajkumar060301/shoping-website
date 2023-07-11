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
    $gst = $_POST['gst'];
    
    $query = "SELECT * FROM `seller` WHERE `seller_email` = '$email'";
    $result = mysqli_query($myConnection,$query);
    if (mysqli_num_rows($result) > 0) {
                echo 1;
            }

            else{

                $insert = "INSERT INTO `seller`(`seller_name`,`seller_email`,`seller_number`,`seller_password`,`seller_dob`,`seller_address`,`seller_gender` ,`seller_gstnumber`) 
                VALUES('$name','$email','$number','$password','$dob','$address','$gender', '$gst')";
                
                if(mysqli_query($myConnection,$insert)){
                    echo "Data inserted succussfulyy";
                }
                else{
                     echo "Data not inserted succussfulyy";


                }

                }

            }

