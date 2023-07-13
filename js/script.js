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

    $("#product-id-1").click(function(){
        // e.preventDefault();

        var name = $("#product-name-1").text();
        var desc = $("#desc-1").text();
        var quantity = $("#quantity-item-1").val();
        var cost = $("#cost-1").text();
        var images = $("#product-img1").attr('src');
        // alert(images);
        $.ajax({
            url : "api/add-product.php",
            type : "POST",
            data : {
                name : name,
                desc : desc,
                quantity : quantity,
                cost : cost,
                images : images
            },
            success : function(){
                // alert(data);
                $("#myform").trigger('reset');

            }


        });
    });

    $("#card").click(function(){
        // e.preventDefault();
        // loadData();

        loadData();
    });

        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val( val+1 ).change();
        });
 
        $('.quantity').on('click', '.minus', 
            function(e) {
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 0) {
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