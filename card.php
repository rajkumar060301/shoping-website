<?php
session_start();
$cus_id = $_SESSION['teamID'];
include "config/config.php";

if(isset($_GET['pid'])){
	$pid = $_GET['pid'];
	$qty = $_GET['qty'];
	$query = 'select * from `product` where  `product_id`="'.$pid.'"';
	$result = $myConnection->query($query);
	if($result->num_rows>0){
		$row = $result->fetch_assoc();
	
	}
	else{
		echo "error";
	}

}

$query = 'select * from `cart` where  `cus_id`="'.$cus_id.'"';
$result = $myConnection->query($query);
if($result->num_rows>0){
	
	while($row_data = $result->fetch_assoc()){
		$price[] = $row_data['product_cost'];
	}

}
else{
	echo "error";
}

$amount =0;
foreach ($price as $cost) {
	
	$amount += $cost;
	
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>fill card</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		input{
			outline: none;
/*			border: none																;*/
		}

		
	</style>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://js.stripe.com/v3/"></script>

</head>
<body>
<?php 
if(isset($_GET['pid'])){
	?>
<div class="product-item" style="border: 2px solid black;position:absolute">
<caption><h4 id="product-name-5"><?php echo $row['product_name']?></h4></caption>
    <img id="product_url-5" src="<?php echo 'api/'.$row['pimage']?>">
    <h3 style="color: blue;">Price -<span id="product-price-5"><?php echo $row['product_cost']?></span></h3>
    <p id="product-desc-5"><?php echo $row['product_desc']?></p> 
   <br>
	<p>Qantity : <?php echo $qty;?></p>
	<h4>Toatal - price : <?php echo $row['product_cost']*$qty?></h4>

</div>
	<?php

}
?>





<div style="margin-left: 40%;margin-top:5%;position:absolute">
	<form action="api/payment.php<?php if(isset($_GET['pid'])) echo '?pid='.$pid.'&qty='.$qty; else echo "";?>" method="post">

	<div class="card" style="width: 22rem;">
  <div class="card-header">
    Card Details
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Card Holder Name<br>
    	<input class="form-control" type="text" name="card_holder_name">
    </li>
    <li class="list-group-item">
		Card Number<br>
		<input class="form-control" type="text" name="card_number" placeholder="1234 1234 1234 1234"><br>
    	Expiry Data
    	<input class="form-control" type="text" placeholder="MM/YYYY" name="expiry"  title="Please enter a valid MM/YYYY format with a future date." required><br>
    	CCV<br>
    	<input class="form-control" type="text" name="ccv" name="ccv">
    </li>
	<span style="text-align: center;"><h4><?php if(!isset($_GET['pid'])) echo $amount; ?> </h4></span>

    
	<li class="list-group-item" style="text-align: center;"><button class="btn btn-primary" type="submit">Pay</button></li>
  </ul>
</div>
</form>
<!--     <form action="charge.php" method="POST">
        <label for="cardNumber">Card Number:</label><br>
        <input type="text" id="cardNumber" name="cardNumber" placeholder="Card Number" required><br>
        
        <label for="expiry">Expiration Date:</label><br>
        <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required><br>
        
        <label for="cvc">CVC:</label><br>
        <input type="text" id="cvc" name="cvc" placeholder="CVC" required><br><br>
        
        <button type="submit">Pay Now</button><br>
    </form> -->
</div>
</body>
</html>