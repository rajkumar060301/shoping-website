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

    // $("#product-id-1").click(function(){
    //     // var buttonId = $(this).attr("id");
    //     // alert("Button ID: " + buttonId);
    //     // e.preventDefault();

    //     var name = $("#product-name-1").text();
    //     var desc = $("#desc-1").text();
    //     var quantity = $("#quantity-item-1").val();
    //     var cost = $("#cost-1").text();
    //     var images = $("#product_url-1").attr('src');
    //     // alert(images);
    //     $.ajax({
    //         url : "api/add-product.php",
    //         type : "POST",
    //         data : {
    //             name : name,
    //             desc : desc,
    //             quantity : quantity,
    //             cost : cost,
    //             images : images
    //         },
    //         success : function(){
    //             // alert(data);
    //             $("#myform").trigger('reset');

    //         }


    //     });
    // });

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
            // alert(id);
            $.ajax({
            url : "api/add-product.php",
            type : "POST",
            data : {
                pid : id,
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

    $("#card").click(function(){
        // e.preventDefault();
        // loadData();

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