<?php
// fetch data of customer
session_start();
$id = $_SESSION['teamID'];
include "../config/config.php";

date_default_timezone_set('Asia/Kolkata');
// Get the current date and time
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');
$total_amount =0;
$product= "";

if(isset($_GET['pid']) && isset($_GET['qty'])){
$pid = $_GET['pid'];
$qty = $_GET['qty'];
$query = 'select * from `product` where  `product_id`="'.$pid.'"';
$result_product = $myConnection->query($query);
if($result_product->num_rows>0){
	$row_result = $result_product->fetch_assoc();
  $amount = $row_result['product_cost']*$qty*100;
  $product = $product.$row_result['product_desc'];
 
}
else{
	echo "";
}

}

$query_cart = 'select * from `cart` where  `cus_id`="'.$id.'"';
$result = $myConnection->query($query_cart);
if($result->num_rows>0){
	
	while($row = $result->fetch_assoc()){
		$product_name[] = $row['product_name'];
		$price[] = $row['product_cost'];
		$quantity[] = $row['product_quantity'];

	}

}

foreach ($product_name as $productName) {
	 $product =$product.$productName.",";
}

foreach ($price as $cost) {
	$total_amount += $cost;
}
$quantt = "";
foreach ($quantity as $quant) {
	$quantt = $quantt.$quant.",";
}
$total_amount = $total_amount*100;
if(isset($amount)){
  $amount_product = $amount;
}
else{
  $amount_product = $total_amount;
}





$fetch_query = "SELECT * FROM customer where `customer_id`='$id' ";

$data_register = mysqli_query($myConnection, $fetch_query);

if(mysqli_num_rows($data_register)>0){

    $row_data = mysqli_fetch_array($data_register); 
        
} else {
    echo "Record Not found";
}

$card_holder_name = $_POST['card_holder_name'];
$card_number = $_POST['card_number'];
$expire = $_POST['expiry'];
$ccv = $_POST['ccv'];

// Split the expire string into month and year using the '/' delimiter
list($month, $year) = explode('/', $expire);

// Convert month and year to integers
$month = intval($month);
$year = intval($year);


$sceret_key = 'sk_test_51NVAkpHnvzdqnkdOUemmucZ50cNLBhiXYBjSlbOdKAKf3gESp7PG1VC6RXCFXcQbTAonrkDmpWrmLzSNkQ1Wc4ci00eI0e88xX';
 
// create totan of card
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.stripe.com/v1/tokens',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'card%5Bnumber%5D='.$card_number.'&card%5Bexp_month%5D='.$month.'&card%5Bexp_year%5D='.$year.'&card%5Bcvc%5D='.$ccv.'',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic cGtfdGVzdF81MU5WQWtwSG52emRxbmtkT1NuVGgxS3hIWU03U1UyVmtqemZvZHNIUUhVNE9LeTI5UGh0QTRjUUthaUVTN202cXVFd2V3YkNaenkzM0tZSndZNkJqWVczMjAwRXQ1SFF4OGE6c2tfdGVzdF81MU5WQWtwSG52emRxbmtkT1VlbW11Y1o1MGNOTEJoaVhZQmpTbGJPZEtBS2YzZ0VTcDdQRzFWQzZSWENGWGNRYlRBb25ya0RtcFdybUx6U05rUTFXYzRjaTAwZUkwZTg4eFg='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$create_tokan =json_decode($response,true);
$tokan_id =$create_tokan['id'];



// create payment method login
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.stripe.com/v1/payment_methods',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'type=card&card%5Bexp_month%5D='.$month.'&card%5Bexp_year%5D='.$year.'&card%5Bnumber%5D='.$card_number.'&card%5Bcvc%5D='.$ccv.'',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic cGtfdGVzdF81MU5WQWtwSG52emRxbmtkT1NuVGgxS3hIWU03U1UyVmtqemZvZHNIUUhVNE9LeTI5UGh0QTRjUUthaUVTN202cXVFd2V3YkNaenkzM0tZSndZNkJqWVczMjAwRXQ1SFF4OGE6c2tfdGVzdF81MU5WQWtwSG52emRxbmtkT1VlbW11Y1o1MGNOTEJoaVhZQmpTbGJPZEtBS2YzZ0VTcDdQRzFWQzZSWENGWGNRYlRBb25ya0RtcFdybUx6U05rUTFXYzRjaTAwZUkwZTg4eFg=',
    'Cookie: __stripe_orig_props=%7B%22referrer%22%3A%22%22%2C%22landing%22%3A%22https%3A%2F%2Fdashboard.stripe.com%2Ftest%2Flogs%2Freq_b5wptxwzT9c2fX%3Ft%3D1691130016%22%7D; cid=64b3e981-69b0-4f2b-b533-8cd90c597bca; machine_identifier=XCUJUUEyQ%2FAQ8Uq6hJJe5%2FCIKZSUv2%2FW21lP%2FaPBZo%2FgjBD6gwRZQUiJrAua%2Fuajptw%3D; private_machine_identifier=743zg4JJMaXEgo9BPC25v23s2wgNFqunfHdvNvu6ay2LZAyrX6vAMVVU5p%2B14FgbUcQ%3D'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$payment_method =json_decode($response,true);
$card_brand = $tokan_id;

// for create customer logic
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.stripe.com/v1/customers',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  // CURLOPT_POSTFIELDS => 'address%5Bcity%5D=Katihar&address%5Bcountry%5D=India&address%5Bline1%5D=Manihari&address%5Bpostal_code%5D=854108&address%5Bstate%5D=Bihar&balance=18000&email='.$row_data['customer_email'].'&name='.$row_data["customer_name"].'&phone='.$row_data['customer_number'].'',

  CURLOPT_POSTFIELDS => 'address%5Bcity%5D=Katihar&address%5Bcountry%5D=India&address%5Bline1%5D=Manihari&address%5Bpostal_code%5D=854108&address%5Bstate%5D=Bihar&balance=18000&email='.$row_data['customer_email'].'&name='.$row_data["customer_name"].'&phone='.$row_data['customer_number'].'',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    ': ',
    'Authorization: Bearer '.$sceret_key,
    'Cookie: __stripe_orig_props=%7B%22referrer%22%3A%22%22%2C%22landing%22%3A%22https%3A%2F%2Fdashboard.stripe.com%2Ftest%2Flogs%2Freq_b5wptxwzT9c2fX%3Ft%3D1691130016%22%7D; cid=64b3e981-69b0-4f2b-b533-8cd90c597bca; machine_identifier=XCUJUUEyQ%2FAQ8Uq6hJJe5%2FCIKZSUv2%2FW21lP%2FaPBZo%2FgjBD6gwRZQUiJrAua%2Fuajptw%3D; private_machine_identifier=743zg4JJMaXEgo9BPC25v23s2wgNFqunfHdvNvu6ay2LZAyrX6vAMVVU5p%2B14FgbUcQ%3D'
  ),
));
echo "<pre>";
$response = curl_exec($curl);
curl_close($curl);
$array = json_decode($response,true);

// customer data
$customer_id = $array['id'];
$array['name']=$row_data['customer_name'];
$array['phone']=$row_data['customer_number'];
$array['email']=$row_data['customer_email'];
$array['address']['city']=$row_data['customer_address'];

//create card details

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.stripe.com/v1/customers/'.$customer_id.'/sources',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'source='.$card_brand,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Bearer '.$sceret_key
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$create_card = json_decode($response,true);
$card_id = $create_card['id'];

// payment intent
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.stripe.com//v1/payment_intents',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'amount='.$amount_product.'&currency=inr&customer='.$customer_id.'&description='.$product.' ',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Bearer '.$sceret_key,
    'Cookie: __stripe_orig_props=%7B%22referrer%22%3A%22%22%2C%22landing%22%3A%22https%3A%2F%2Fdashboard.stripe.com%2Ftest%2Flogs%2Freq_b5wptxwzT9c2fX%3Ft%3D1691130016%22%7D; cid=64b3e981-69b0-4f2b-b533-8cd90c597bca; machine_identifier=XCUJUUEyQ%2FAQ8Uq6hJJe5%2FCIKZSUv2%2FW21lP%2FaPBZo%2FgjBD6gwRZQUiJrAua%2Fuajptw%3D; private_machine_identifier=743zg4JJMaXEgo9BPC25v23s2wgNFqunfHdvNvu6ay2LZAyrX6vAMVVU5p%2B14FgbUcQ%3D'
  ),
));

$response_intent = curl_exec($curl);
curl_close($curl);
$payment_intent = json_decode($response_intent,true);
// echo "<pre>";
// print_r($payment_intent);

// payment confirm
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.stripe.com//v1/payment_intents/'.$payment_intent['id'].'/confirm',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'payment_method='.$payment_method['id'].'',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Bearer '.$sceret_key,
    'Cookie: __stripe_orig_props=%7B%22referrer%22%3A%22%22%2C%22landing%22%3A%22https%3A%2F%2Fdashboard.stripe.com%2Ftest%2Flogs%2Freq_b5wptxwzT9c2fX%3Ft%3D1691130016%22%7D; cid=64b3e981-69b0-4f2b-b533-8cd90c597bca; machine_identifier=XCUJUUEyQ%2FAQ8Uq6hJJe5%2FCIKZSUv2%2FW21lP%2FaPBZo%2FgjBD6gwRZQUiJrAua%2Fuajptw%3D; private_machine_identifier=743zg4JJMaXEgo9BPC25v23s2wgNFqunfHdvNvu6ay2LZAyrX6vAMVVU5p%2B14FgbUcQ%3D'
  ),
));


$response = curl_exec($curl);

curl_close($curl);
$payment_confirm = json_decode($response,true);

// create product
if(isset($_GET['pid']) && isset($_GET['qty'])){
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.stripe.com//v1/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'name='.$row_result['product_name'].'&default_price_data%5Bcurrency%5D=inr&default_price_data%5Bunit_amount%5D='.$amount_product.'&description='.$row_result['product_desc'].'',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/x-www-form-urlencoded',
      'Authorization: Bearer '.$sceret_key
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  $create_product = json_decode($response,true);

  
  $insert = 'INSERT INTO `transactions`(`customer_id`,`product_id`,`customer_name`,`customer_phone`,`customer_email`,`customer_address`,`product_description`,`product_name`,`product_price`,`quanity`,`order_date`,`order_time`,`payment_mehod`,`transactions_id`,`payment_status`) 
  VALUES("'.$customer_id.'","'.$create_product['id'].'","'.$array['name'].'","'.$array['phone'].'","'.$array['email'].'","'.$array['address']['city'].'","'.$create_product['description'].'","'.$create_product['name'].'","'.$amount/100 .'","'.$qty.'","'.$currentDate.'","'.$currentTime.'","'.$payment_method['type'].'","'.$payment_method['id'].'","'.$payment_confirm['status'].'")';
  

  if(mysqli_query($myConnection,$insert)){
      echo "<h1 style='text-align:center;color:green'> payment Successful</h1>";
  }
  else{
       echo "Data not inserted succussfulyy";
  
  
  }

}

else{
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.stripe.com//v1/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'name='.$payment_intent['description'].'&default_price_data%5Bcurrency%5D=inr&default_price_data%5Bunit_amount%5D='.$total_amount.'&description='.$payment_intent['description'].'',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/x-www-form-urlencoded',
      'Authorization: Bearer '.$sceret_key
    ),
  ));
  
  $response = curl_exec($curl);
  curl_close($curl);
  $create_product = json_decode($response,true);
  echo "<pre>";
  print_r($create_product);
  $insert = 'INSERT INTO `transactions`(`customer_id`,`product_id`,`customer_name`,`customer_phone`,`customer_email`,`customer_address`,`product_description`,`product_name`,`product_price`,`quanity`,`order_date`,`order_time`,`payment_mehod`,`transactions_id`,`payment_status`) 
  VALUES("'.$customer_id.'","'.$create_product['id'].'","'.$array['name'].'","'.$array['phone'].'","'.$array['email'].'","'.$array['address']['city'].'","'.$create_product['description'].'","'.$create_product['name'].'","'.$total_amount/100 .'","'.$quantt.'","'.$currentDate.'","'.$currentTime.'","'.$payment_method['type'].'","'.$payment_method['id'].'","'.$payment_confirm['status'].'")';
  
  
  
  // $insert = 'INSERT INTO `transactions`(`customer_id`,`customer_name`,`customer_phone`,`customer_email`,`customer_address`,`payment_mehod`,`transactions_id`,`payment_status`) 
  // VALUES("'.$customer_id.'","'.$array['name'].'","'.$array['phone'].'","'.$array['email'].'","'.$array['address']['city'].'","'.$payment_method['type'].'","'.$payment_method['id'].'","'.$payment_confirm['status'].'")';
  
  if(mysqli_query($myConnection,$insert)){
      echo "<h1 style='text-align:center;color:green'> payment Successful</h1>";
  }
  else{
       echo "Data not inserted succussfulyy";
  
  
  }

  $query = "delete from `cart` where `cus_id` = {$id}";
  mysqli_query($myConnection,$query);
  echo "Data Deleted Successfully";


}





?>
