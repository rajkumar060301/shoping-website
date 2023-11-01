<?php
include '../config/config.php';
$number = $_POST['number'];
$otp=rand(11111,99999);
$html="Your otp verification code is ".$otp;
$query = "SELECT * FROM `customer` WHERE `customer_number` = '$number'";
$result = mysqli_query($myConnection,$query);
if (mysqli_num_rows($result) > 0) {
            $update = "update `customer` set `verification_code`='$otp' where `customer_number`='$number'";
            $data = mysqli_query($myConnection,$update);
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twilio.com/2010-04-01/Accounts/AC8b42acd824142eebf26f5cda0669ece1/Messages.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'To=91'.$number.'&From=17075322804&Body='.$html.'',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic QUM4YjQyYWNkODI0MTQyZWViZjI2ZjVjZGEwNjY5ZWNlMTo5NTQ4ZWVlMzFiNGJiYjE5NjA5MTRiZDM2MDdlZTIwNg=='
            ),
            ));
            $response = curl_exec($curl);

            curl_close($curl);
            
            echo "updated";
        }
        else{
            $insert = "INSERT INTO `customer`(`customer_number`,`verification_code`) 
            VALUES('$number','$otp')";
            if(mysqli_query($myConnection,$insert)){
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.twilio.com/2010-04-01/Accounts/AC8b42acd824142eebf26f5cda0669ece1/Messages.json',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'To=91'.$number.'&From=17075322804&Body='.$html.'',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                    'Authorization: Basic QUM4YjQyYWNkODI0MTQyZWViZjI2ZjVjZGEwNjY5ZWNlMTo5NTQ4ZWVlMzFiNGJiYjE5NjA5MTRiZDM2MDdlZTIwNg=='
                ),
                ));
                $response = curl_exec($curl);
    
                curl_close($curl);
                echo "yes";
            }
            else{
                 echo "Customer not registed";

            }

            }
?>