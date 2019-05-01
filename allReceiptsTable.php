<?php
                $db = "wingmat_WoK";
                $local = "localhost";
                $dbuser = "wingmat_Matt";
                $dbpass = "Matthewwing98";
                $_SESSION['user'] = "espoAlex";
            
                $link = new mysqli($local, $dbuser, $dbpass, $db);
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }
                
                $sql = $link->prepare("SELECT * FROM Receipts WHERE Username = ?");
                $sql->bind_param('s', $_SESSION['user']);
                $sql->execute();
                $result = $sql->get_result();
                // $result = mysqli_query($link,$sql);
                
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
                        <th>Address</th>
                        <td>" . $arrayOfReceipts['Address'] . "</td>
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
                    </table></div>";
                }
            ?>