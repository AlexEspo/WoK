<?php
    session_start();
?>
<html>
    <head>
        <style>
            .receiptContainer{
                border: 1px dotted black;
                width: 50%;
                margin: 0;
                display:inline-block;
            }
            td{
                float: right;
            }
            
        </style>
    <script type = "text/javascript">
        
    </script>

    </head>

    <body>
    
    <?php
            $db = "wingmat_WoK";
            $local = "localhost";
            $dbuser = "wingmat_Matt";
            $dbpass = "Matthewwing98";
            $searchResult = $_POST['date'];
            $link = new mysqli($local, $dbuser, $dbpass, $db);
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            $newDate = date("Y-m-d", strtotime($searchResult));
            $sql = $link->prepare("SELECT * FROM Receipts WHERE DateofPurchase = ? AND Username = ?" );
            $sql->bind_param('ss', $newDate, $_SESSION['user']);
            $sql->execute();
            $result = $sql->get_result();
            if(mysqli_num_rows($result) == 0){
                echo "<h3>It seems that you did not buy anything this day</h3>";
            }else{
                while($arrayOfReceipts=mysqli_fetch_assoc($result)){
                    echo 
                    "<div class = 'receiptContainer'><table width = 100%>
                        <th>SneakerName</th>
                        <td>" . $arrayOfReceipts['SneakerName'] . "</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>" . $arrayOfReceipts['Username'] . "</td>
                    </tr>
                    <tr>
                        <th>Customer Name</th>
                        <td>" . $arrayOfReceipts['CustomerName'] . "</td>
                    </tr>
                    <tr>
                        <th>Number of Sneakers Bought</th>
                        <td>" . $arrayOfReceipts['NumberOfSneakersBought'] ."</td>
                    </tr>
                    <tr>
                        <th>Street Number</th>
                        <td>" . $arrayOfReceipts['StreetNumber'] . "</td>
                    </tr>
                    <tr>
                        <th>Street Name</th>
                        <td>" . $arrayOfReceipts['StreetName'] . "</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>" . $arrayOfReceipts['City'] . "</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>" . $arrayOfReceipts['DateofPurchase'] . "</td>
                    </tr>
                    <tr>
                        <th>Receipt ID</th>
                        <td>" . $arrayOfReceipts['ReceiptID'] . "</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td><strong>" . $arrayOfReceipts['TotalPrice'] . "</strong></td>
                    </tr>
                    <tr>
                        <td><img class='card-img-top' src= ../pics/" . $arrayOfReceipts['image_path'] . " alt='Card image cap' style = 'height: 15rem; width: 17rem;'></td>
                    </tr>
                    </table></div>";
                }
            }
        ?>
 </body>
</html>