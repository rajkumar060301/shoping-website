<?php
session_start();
$id = $_SESSION['sellerID'];
include "config/config.php";

$fetch_query = "SELECT * FROM seller where `seller_id`='$id' ";

$data_register = mysqli_query($myConnection, $fetch_query);

if(mysqli_num_rows($data_register)>0){

    $row_data = mysqli_fetch_array($data_register); 
        
} else {
    echo "Record Not found";
}

$query = "SELECT * FROM product";

$data = mysqli_query($myConnection, $query);

if(mysqli_num_rows($data)>0){

     
        
} else {
    echo "Record Not found";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>E-commerce Website</title>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header style="background-color:#ccc">
        <h1>E-commerce Website</h1>

    <nav>
        <ul>
            <li><a href="seller_dashboard.php">Home</a></li>
            <li id="addProductButton">Add-Products</li>
            <li><a href="#">Product-List</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
            <li id="order_list">Order-List</li>
            <li class="dropdown">Welcome!<span ><?php echo $row_data['seller_name'] ?></span><i class="bi bi-person-circle"></i>
            <li><a href="api/seller-logout.php" >Logout</a></li>
            </div>
        </li>
       
        </ul>
    </nav>
    </header>
<div id="content-id" style="background-color: whitesmoke;position:absolute ">

<?php
while($row = mysqli_fetch_array($data)){
    ?>
        <div class="product-item" >
        <caption><h4 id="product-name-9"><?php echo $row['product_name'];?></h4></caption>
        <img id="product_url-9" src="api/<?php echo $row['pimage'];?>">
        <h3 style="color: blue;">Price -<span id="product-price-9"><?php echo $row['product_cost'];?></span></h3>
        <p id="product-desc-9"><?php echo $row['product_desc'];?></p>
        <a href="#">See more</a><br>

    </div>
    <?php
}

?>



</div>

<div id="second-div">
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
           
        }

        .container {
            width: 50%;
            
            margin: auto;
            padding: 20px;
            background-color: whitesmoke;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<div class="container">
        <h2>Product Information</h2>
        <form id="form-submit" action="api/product.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="productName" required>
            </div>

            <div class="form-group">    
                <label for="productDescription">Product Description</label>
                <textarea id="productDescription" name="productDescription" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input type="text" id="productPrice" name="productPrice" required>
            </div>

            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input  type="file" id="productImage" name="productImage" accept="image/*" required>
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>

    </div>
    <div id="content_product_list">
    </div>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function() {
            $("#addProductButton").click(function() {
                $("#content_product_list").hide();
                $("#content-id").hide();
                $("#second-div").show();
            });
            $("#order_list").click(function() {
                $("#second-div").hide();
                $("#content-id").hide();
                $("#content_product_list").show();
                $.ajax({
                    url : "./api/order_list.php",
                    type : "POST",
                    success :function(response){
                        $("#content_product_list").html(response);
                        
                    }
                })


            });
            



        });
    </script>
</body>
</html>
