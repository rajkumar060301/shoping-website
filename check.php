<?php
session_start();
$id = $_SESSION['teamID'];
echo $id;
echo "hello world";
// include "config/config.php";

// $fetch_query = "SELECT * FROM customer where id=".$id;

// $data_register = mysqli_query($myConnection, $fetch_query);

// if(mysqli_num_rows($data_register)>0){

//     $row_data = mysqli_fetch_array($data_register); 
        
// } else {
//     echo "Record Not found";
// }

?>