<?php
session_start();

if($_SESSION['access'] == 'C'){
  require 'header.php';
}
else if($_SESSION['access'] == 'E'){
  require 'employeeheader.php';
}
else if($_SESSION['access'] == 'M'){
  require 'managerheader.php';
}
else if($_SESSION['access'] == 'A'){
  require 'adminheader.php';
}

$connect = mysqli_connect("localhost", "alexespo", "password", "wok");




?>



<div style="clear: both"></div><br><br>
        <h3 class="title2">Shopping Cart</h3><br>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["SneakerName"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
            <button type="button" class="btn btn-outline-primary" style="margin-top:3%;">Checkout</button>
        </div>

    </div>







