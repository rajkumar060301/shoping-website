<?php
include '../config/config.php';
$id = $_POST["id"];
$query = "delete from cart where product_id = {$id}";
mysqli_query($myConnection,$query);
echo "Data Deleted Successfully";

?>