$(document).ready(function() {


    $("#product-id-1").click(function(e){
        e.preventDefault();
        var name = $("#product-name-1").text();
        var desc = $("#desc-1").text();
        // var cost = $("#cost-1").val();
        var cost = $("#cost-1").text();
        $.ajax({
            url : "api/add-product.php",
            type : "POST",
            data : {
                name : name,
                desc : desc,
                cost : cost
            },
            success : function(data){
                alert(data);

            }


        });
    });

    $("#card").click(function(e){
        e.preventDefault();
        // loadData();
        function loadData(){
	                    
            $.ajax({
                url : "api/cart.php",
                type : "POST",
                success: 
                    function(data){
                        $("#content-id").html(data);
                    
                }
               });
        }
        loadData();
    });
});