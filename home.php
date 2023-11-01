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

// $query = "SELECT * FROM product where `product_id`>9";
$query = "SELECT * FROM product where `product_id`>9";

$data = mysqli_query($myConnection, $query);

if(mysqli_num_rows($data)>0){

     
        
} else {
    echo "Record Not found";
}
if(isset($id)){

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <meta charset="utf-8">
    <title> E-Commerce Website</title>
    <style>
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }
    </style>
</head>
<body id="body-part" style="background-color: whitesmoke;" >
<nav>
        <ul>
            <li  id="home">Home</li>
            <li><a href="#">Products</a></li>
            <li id="card">Cart</li>
            <li><a href="#">Contact</a></li>
            <li style="margin-left: 60%;">Welcome!
            <div class="dropdown">
            <span><?php echo $row_data['customer_name'] ?></span>
            <div class="dropdown-content">
            <p><a href="api/logout.php" >Logout</a></p>
            </div>
            </div>
            </div>
        <i class="bi bi-person-circle"></i></li>
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
<p><h4 id="product-name-1">Apple</h4></p>
    <img id="product_url-1" src="img/apple.webp">
    <h3 style="color: blue;">Price - <span id="product-price-1">115999</span></h3>
    <p id="product-desc-1">128 GB ROM
        15.49 cm (6.1 inch) Super Retina XDR Display
        12MP + 12MP | 12MP Front Camera
        A14 Bionic Chip with Next Generation Neural Engine Processor
        HDR Display, True Tone, Wide Colour (P3).
 
    </p>
    <a href="FirstPage.html">See more</a>
    <br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-1" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-2">Samsung</h4></caption>
    <img id="product_url-2" src="img/samsung.webp">
    <h3 style="color: blue;">Price - <span id="product-price-2"> 22599</span></h3>
    <p id="product-desc-2">6 GB RAM | 128 GB ROM | Expandable Upto 1 TB
         16.26 cm (6.4 inch) HD+ Display 48MP + 8MP + 2MP + 2MP | 13MP Front Camera
         6000 mAh Lithium-ion Batterys MediaTek Helio G80 Processor.1 Year Manufacturer Warranty.
    </p>
    <a href="SecondPage.html">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-2" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button  class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>

</div>


<div class="product-item" >
<caption><h4 id="product-name-3">Black Berry</h4></caption>
    <img id="product_url-3" src="img/black-berry.webp">
    <h3 style="color: blue;">Price -<span id="product-price-3">13950</span></h3>
    <p id="product-desc-3">4 GB RAM | 64 GB ROM | Expandable Upto 256 GB
        15.21 cm (5.99 inch) Full HD+ Display
        13MP + 13MP | 16MP Front Camera
        4000 mAh Battery
        Qualcomm SDM450 with 64 bit Octa-core 1.8GHz Cortex-A53 Processor
    </p>
    <a href="ThirdPage.html">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-3" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-4">Campus</h4></caption>
    <img id="product_url-4" src="img/shose.webp">
    <h3 style="color: blue;">Price -<span id="product-price-4">650</span></h3>
    <p id="product-desc-4">Nexon-03 White Gym,Sports,Casual,Walking,Stylish Walking Shoes For Men (White, Orange)
    A shoe is an item of footwear intended to protect and comfort.
    </p>
    <a href="#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-4" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button  class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-5">T-shirt</h4></caption>
    <img id="product_url-5" src="img/tshirt.webp">
    <h3 style="color: blue;">Price -<span id="product-price-5">950</span></h3>
    <p id="product-desc-5">Men Striped Polo Neck Cotton Blend Blue T-Shirt.A T-shirt (also spelled tee shirt), or tee for short, is a style of fabric shirt named after the T shape of its body and sleeves.
    </p>
    <a href=#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-5" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-6">Kurti</h4></caption>
    <img id="product_url-6" src="img/womem.webp">
    <h3 style="color: blue;">Price -<span id="product-price-6">1050</span></h3>
    <p id="product-desc-6">Kurtis take a top spot in fashionable and adaptable clothing for women with ethnic themes. They are available in a vast range of patterns, designs, themes
    </p>
    <a href="ThirdPage.html">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-6" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button  class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-7">LED</h4></caption>
    <img id="product_url-7" src="img/tv.webp">
    <h3 style="color: blue;">Price -<span id="product-price-7">998</span></h3>
    <p id="product-desc-7">
    With Mic:Yes
    Bluetooth version: 5
    Wireless range: 10 m
    Battery life: 35 Hrs | Charging time: 4.5 Hrs
    Using simple touch controls answer phone calls.
    With Mic:Yes
    Bluetooth version: 5
    Wireless range: 10 m
    </p>
    <a href="#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-7" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button  class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-8">Headphone</h4></caption>
    <img id="product_url-8" src="img/headphone.webp">
    <h3 style="color: blue;">Price -<span id="product-price-8">999</span></h3>
    <p id="product-desc-8">
    With Mic:Yes
    Bluetooth version: 5
    Wireless range: 10 m
    Battery life: 35 Hrs | Charging time: 4.5 Hrs
    Using simple touch controls answer phone calls.
    With Mic:Yes
    Bluetooth version: 5
    Wireless range: 10 m
    </p>
    <a href="#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-8" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button  class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>

<div class="product-item" >
<caption><h4 id="product-name-9">Bluetooth</h4></caption>
    <img id="product_url-9" src="img/bluetooth.webp">
    <h3 style="color: blue;">Price -<span id="product-price-9">1299</span></h3>
    <p id="product-desc-9">
With Mic:Yes
11.2mm Bass Boost Driver | 17hrs Total Playback
Environmental Noise Cancellation | IPX4 Water Resistant
Multi Device Switch | 88ms Low Latency
Quick Charge (120mins playback in 10min charge)
    </p>
    <a href="#">See more</a><br>
    <form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' value='-' class='qtyminus minus' field='quantity' />
        <input id="product-qty-9" type='text' name='quantity' value='1' class='qty' />
        <input type='button' value='+' class='qtyplus plus' field='quantity' />
    </form>
    <button class="cart" style="background-color: orange;border:none;color:white;margin-top:10px"><i class="bi bi-cart3"></i>ADD TO CART</button> <button class="buy" style="background-color: red;color:white;border:none"><i class="bi bi-bag"></i>BUY NOW</button>
</div>



</div>

</body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
    function loadData(){
	                    
        $.ajax({
            url : "api/cart.php",
            type : "POST",
            success: 
                function(data){
                    $("#content-id").html(data);
                
            }
           });
    };

    $("#home").on('click',function(){
        $.ajax({
            url : "home.php",
            type : "POST",
            success : function(data){   
                $("#body-part").html(data);



            }

        });
    })


    $('.cart').each(function(index) {
        var button = $(this);
        button.attr('id',(index + 1)); // Assign ID with 'product-' prefix and index
        button.on('click', function() {
            var id = $(this).attr('id');
            
            var product_name = "product-name-" + id;
            var product_url = "product_url-" + id;
            var product_cost = "product-price-" + id;
            var product_desc = "product-desc-" + id;
            var product_quantity = "product-qty-" + id;

            var name = $("#"+product_name).text();
            var desc = $("#"+product_desc).text();
            var quantity = $("#"+product_quantity).val();
            var cost = $("#"+product_cost).text();
            var images = $("#"+product_url).attr('src');
            
            $.ajax({
            url : "api/add-product.php",
            type : "POST",
            data : {
                pid : id,
                cus_id : <?php echo $id;?>,
                name : name,
                desc : desc,
                quantity : quantity,
                cost : cost,
                images : images
            },
            success : function(data){
                $("#myform").trigger('reset');

            }


        });
        });
    });

    $('.buy').each(function(index) {
        var button = $(this);
        button.attr('id',(index + 1)); // Assign ID with 'product-' prefix and index

        button.on('click', function() {
            var id = $(this).attr('id');

            // var product_name = "product-name-" + id;
            // var product_url = "product_url-" + id;
            // var product_cost = "product-price-" + id;
            // var product_desc = "product-desc-" + id;
            var product_quantity = "product-qty-" + id;

            // var name = $("#"+product_name).text();
            // var desc = $("#"+product_desc).text();
            var quantity = $("#"+product_quantity).val();
            // var cost = $("#"+product_cost).text();
            // var images = $("#"+product_url).attr('src');
            window.location.href='card.php?pid='+id+'&qty='+quantity;

        }); 
    });
    

    $("#card").click(function(){
        loadData();
    });

        // plus quantity
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val( val+1 ).change();
        });
        
        // minus quantity
        $('.quantity').on('click', '.minus', 
            function(e) {
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val >0) {
                $input.val( val-1 ).change();
            } 
        });

        	//Delete data from database
			$(document).on('click','.delbutton',function(){
						var studentId = $(this).data('id');
						$.ajax({
							url : "api/remove-product.php",
							type : "post",
							data : {id : studentId},
							success : function(){
								loadData();
							}
						})

					})
});
</script>



</html>

<?php
}
else{
    echo "ERROR Page";
}
?>