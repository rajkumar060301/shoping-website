<html>
<head>
<style>
a{text-decoration:none; color:white}
a:hover{text-decoration:none; color:white}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="styleseet" type="text/css" href="./css/css/bootstrap.min.css"> 




<script>
$(document).ready(function () {
    $('#example').DataTable();
});

</script>

</head>
<body>
  
<table id="example" class="display" style="width:100%;text-align:center">
    <thead>
        <tr>
            <th style="width: 10%;">Product Image</th>
            <th style="width: 10%;">Product ID</th>
            <th  style="width: 10%;">Product Name</th>
            <th  style="width: 40%;">Product Description</th>
            <th  style="width: 10%;">Product quantity</th>
            <th  style="width: 10%;">Product Cost</th>
            <th  style="width: 10%;">Delete Product</th>
        </tr>
        
    </thead>
    <tbody>

        <?php
        include '../config/config.php';

        $query = "select * from cart";
        $sum = 0;
        $result = mysqli_query($myConnection,$query);
                if(mysqli_num_rows($result)>0){

                    while($row = mysqli_fetch_assoc($result)){

                        ?>

                <tr>
                <td><img src="<?php echo $row["product_img"];?>" style="height:100px;width:100px"></td>
                    <td><?php echo $row["product_id"];?></td>
                    <td><?php echo $row["product_name"];?></td>
                    <td><?php echo $row["product_description"];?></td>
                    <td><?php echo $row["product_quantity"];?></td>
                    <td><?php echo $row["product_cost"];?></td>
                    <?php $sum += $row["product_cost"];?>
                    <td><button  data-id="<?php echo $row['product_id']; ?>" class="btn btn-danger delbutton">Remove</button></td>
            </tr>
 
            <?php

                    }
                    //  echo $sum;
            echo "</tbody>";
            echo "<tr><td colspan='5' style='color: red;background-color:yellow;'>Total Amount</td><td class='btn btn-success' style='color: red;'> $sum</td></tr>";

        echo "</table>";

                }
                ?>

  </div>
</div>
</body>
<script type="text/javascript" src="js/script.js"></script>

</html>