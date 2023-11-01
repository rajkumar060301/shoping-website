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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="styleseet" type="text/css" href="./css/css/bootstrap.min.css"> 




<script>
$(document).ready(function () {
    $('#example1').DataTable();
});

</script>

</head>
<body>
  
<table id="example1" class="display" style="width:100%;text-align:center;border:2px solid black;border-collapse:collapse">
    <thead>
        <tr>
            <th style="width: 10%;">Cus.ID</th>
            <th style="width: 10%;">P.ID</th>
            <th  style="width: 10%;">Name</th>
            <th  style="width: 40%;">Mobile No.</th>
            <th  style="width: 10%;">Email</th>
            <th  style="width: 10%;">Address</th>
            <th  style="width: 10%;">Product name</th>
            <th style="width: 10%;">Product description</th>
            <th style="width: 10%;">Product price</th>
            <th  style="width: 10%;">Quantity</th>
            <th  style="width: 40%;">Order date</th>
            <th  style="width: 10%;">Order time</th></th>
            <th  style="width: 10%;">payment mehtod</th>
            <th  style="width: 10%;">Transcations_id</th>
            <th  style="width: 10%;">Payment Status</th>
        </tr>
        
    </thead>
    <tbody>

        <?php
        include '../config/config.php';
        $query = "select * from `transactions`";
        $result = mysqli_query($myConnection,$query);
        $varible_encode = array();
                if(mysqli_num_rows($result)>0){
                    

                    while($row = mysqli_fetch_assoc($result)){
                        $varible_encode[] = $row;
                        ?>

                <tr>
                    <td><?php echo $row["customer_id"];?></td>
                    <td><?php echo $row["product_id"];?></td>
                    <td><?php echo $row["customer_name"];?></td>
                    <td><?php echo $row["customer_phone"];?></td>
                    <td><?php echo $row["customer_email"];?></td>
                    <td><?php echo $row["customer_address"];?></td>
                    <td><?php echo $row["product_name"];?></td>
                    <td><?php echo $row["product_description"];?></td>
                    <td><?php echo $row["product_price"];?></td>
                    <td><?php echo $row["quanity"];?></td>
                    <td><?php echo $row["order_date"];?></td>
                    <td><?php echo $row["order_time"];?></td>
                    <td><?php echo $row["payment_mehod"];?></td>
                    <td><?php echo $row["transactions_id"];?></td>
                    <td><?php echo $row["payment_status"];?></td>
                    

            </tr>
 
            <?php


                    }
                    echo "<pre>";
                    // print_r($jsonData);
                    print_r($varible_encode);




            echo "</tbody>";

        echo "</table>";

                }

                ?>

  </div>
</div>
</body>
<script type="text/javascript" src="js/script.js"></script>

</html>