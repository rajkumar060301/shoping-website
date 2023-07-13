<?php
session_start();
$id = $_SESSION['teamID'];
include "config/config.php";

$fetch_query = "SELECT * FROM customer where `customer_id`='$id' ";

$data_register = mysqli_query($myConnection, $fetch_query);

if(mysqli_num_rows($data_register)>0){

    $row_data = mysqli_fetch_array($data_register); 
        
} else {
    echo "Record Not found";
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <meta charset="utf-8">
    <title> E-Commerce Website</title>
</head>
<body id="body-part" style="background-color: whitesmoke;" >
<nav>
        <ul>
            <li><a id="home">Home</a></li>
            <li><a href="#">Products</a></li>
            <li ><a id="card" href="#">Cart</a></li>
            <li><a href="#">Contact</a></li>
            <li style="margin-left: 60%;"><a href="#">Welcome! <?php echo $row_data['customer_name'] ?></a><i class="bi bi-person-circle"></i></li>
            <h2 style="color: red;">SHOPING WEBSITE</h2>

        </ul>
    </nav>
<header class="header-second">

        <nav>
            <ul id="top-menu">
                <li><a href="#">Mobile</a></li>
                <li><a href="#">Laptop</a></li>
                <li><a href="#">Cloth</a></li>
                <li><a href="#">Toy</a></li>
                <li class="dropdown">
                    <a href="#">Men</a>
                    <div class="dropdown-content">
                        <a href="#">Shirts</a>
                        <a href="#">Pants</a>
                        <a href="#">Shoes</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#">Women</a>
                    <div class="dropdown-content">
                        <a href="#">Dresses</a>
                        <a href="#">Tops</a>
                        <a href="#">Skirts</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#">Books</a>
                    <div class="dropdown-content">
                        <a href="#">Fiction</a>
                        <a href="#">Non-fiction</a>
                        <a href="#">Biography</a>
                    </div>
                </li>
                <li><a href="#">All</a></li>
            </ul>
        </nav>
    </header>

    <div id="content-id">


<div class="product-item">
<p><h4 id="product-name-1">Apple </h4></p>
    <img id="product-img1" src="img/apple.webp">
    <h3 style="color: blue;">Price - <span id="cost-1">115999</span></h3>
    <p id="desc-1">128 GB ROM
        15.49 cm (6.1 inch) Super Retina XDR Display
        12MP + 12MP | 12MP Front Camera
        A14 Bionic Chip with Next Generation Neural Engine Processor
        HDR Display, True Tone, Wide Colour (P3).
 
    </p>
    <a href="FirstPage.html">See more</a>
    <br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-1" class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-2">Samsung</h4></caption>
    <img src="img/samsung.webp">
    <h3 style="color: blue;">Price - <span> 22599</span></h3>
    <p>6 GB RAM | 128 GB ROM | Expandable Upto 1 TB
         16.26 cm (6.4 inch) HD+ Display 48MP + 8MP + 2MP + 2MP | 13MP Front Camera
         6000 mAh Lithium-ion Batterys MediaTek Helio G80 Processor.1 Year Manufacturer Warranty.
    </p>
    <a href="SecondPage.html">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-2" class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>

</div>


<div class="product-item" >
<caption><h4 id="product-name-3">Black Berry</h4></caption>
    <img src="img/black-berry.webp">
    <h3 style="color: blue;">Price - 13950</h3>
    <p>4 GB RAM | 64 GB ROM | Expandable Upto 256 GB
        15.21 cm (5.99 inch) Full HD+ Display
        13MP + 13MP | 16MP Front Camera
        4000 mAh Battery
        Qualcomm SDM450 with 64 bit Octa-core 1.8GHz Cortex-A53 Processor
    </p>
    <a href="ThirdPage.html">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-3 " class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-4">Campus</h4></caption>
    <img id="img1" src="img/shose.webp">
    <h3 style="color: blue;">Price - 650</h3>
    <p>Nexon-03 White Gym,Sports,Casual,Walking,Stylish Walking Shoes For Men (White, Orange)
    A shoe is an item of footwear intended to protect and comfort.
    </p>
    <a href="#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-4" class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-5">T-shirt</h4></caption>
    <img src="img/tshirt.webp">
    <h3 style="color: blue;">Price - 950</h3>
    <p>Men Striped Polo Neck Cotton Blend Blue T-Shirt.A T-shirt (also spelled tee shirt), or tee for short, is a style of fabric shirt named after the T shape of its body and sleeves.
    </p>
    <a href=#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-5" class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-6">Kurti</h4></caption>
    <img src="img/womem.webp">
    <h3 style="color: blue;">Price - 1,050</h3>
    <p>Kurtis take a top spot in fashionable and adaptable clothing for women with ethnic themes. They are available in a vast range of patterns, designs, themes
    </p>
    <a href="ThirdPage.html">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-6" class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-7">LED</h4></caption>
    <img src="img/tv.webp">
    <h3 style="color: blue;">Price - 22,998</h3>
    <p>Featuring Dolby Audio that offers 20 W high-fidelity sound, this TV is sure to enhance your aural experience. So, no matter what kind of content you're watching, you'll be immersed and entertained by this TV's high-quality sound.
    </p>
    <a href="#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-7" class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-8">Headphone</h4></caption>
    <img src="img/headphone.webp">
    <h3 style="color: blue;">Price - 13950</h3>
    <p>

With Mic:Yes
Bluetooth version: 5
Wireless range: 10 m
Battery life: 35 Hrs | Charging time: 4.5 Hrs
Using simple touch controls answer phone calls.
With Mic:Yes
Bluetooth version: 5
Wireless range: 10 m
Battery life: 35 Hrs | Charging time: 4.5 Hrs

    </p>
    <a href="#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-8" class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-9">Bluetooth</h4></caption>
    <img src="img/bluetooth.webp">
    <h3 style="color: blue;">Price - 13950</h3>
    <p>
With Mic:Yes
11.2mm Bass Boost Driver | 17hrs Total Playback
Environmental Noise Cancellation | IPX4 Water Resistant
Multi Device Switch | 88ms Low Latency
Quick Charge (120mins playback in 10min charge)

    </p>
    <a href="#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="quantity-item-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button id="product-id-9" class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

</div>

</body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</html>