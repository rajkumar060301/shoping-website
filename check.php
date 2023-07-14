<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check code</title>
    <script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
</head>
<body>

<button class="cart">Button 1</button>

    <button class="cart">Button 2</button>

    <button class="cart">Button 3</button>

    <button class="cart">Button 4</button>

    <button class="cart">Button 5</button>

</body>
<script type="text/javascript">
$(document).ready(function() {
    $('.cart').each(function(index) {
        var button = $(this);
        button.attr('id',(index + 1)); // Assign ID with 'product-' prefix and index

        button.on('click', function() {
            var id = $(this).attr('id');
            var product_name = "product-name-" + id;
            var product_url = "product-img-" + id;
            var product_cost = "product-price-" + id;
            var product_desc = "product-desc-" + id;
            var product_quantity = "product-qty-" + id;

            $.ajax({
            url : "api/add-product.php",
            type : "POST",
            data : {
                name : product_name,
                desc : product_desc,
                quantity : product_quantity,
                cost : product_cost,
                images : product_url
            },
            success : function(){
                // alert(data);
                $("#myform").trigger('reset');

            }


        });
        });
    });
});


</script>


</html>
