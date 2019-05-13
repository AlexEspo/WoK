<?php
    session_start();

  if($_SESSION['access'] == 'C'){
    require '../header/header.php';
  }
  else if($_SESSION['access'] == 'E'){
    require '../header/employeeheader.php';
  }
  else if($_SESSION['access'] == 'M'){
    require '../header/managerheader.php';
  }
  else if($_SESSION['access'] == 'A'){
    require '../header/adminheader.php';
  }
?>
<html>
    <head>
        
    </head>
    <body>
        <script src = '../ajaxRequests/ajaxRequestSearchProduct.js'></script>
        <span>Search:</span>
        <input type "text" id = "search" name = "search">
        <div id = "Results"><?php require('products.php');?></div>
        <div style="clear:both"></div>  
  <br />  
  <h3>Cart Details</h3>  
  <div class="table-responsive">  
        <table class="table table-bordered">  
            <tr>  
                  <th width="40%">Item Name</th>  
                  <th width="10%">Quantity</th>  
                  <th width="20%">Price</th>  
                  <th width="15%">Total</th>  
                  <th width="5%">Remove</th>  
            </tr>  
            <?php   
            if(!empty($_SESSION["shopping_cart"]))  
            {  
                  $total = 0;  
                  foreach($_SESSION["shopping_cart"] as $keys => $values)  
                  {  
            ?>  
            <tr>  
                  <td><?php echo $values["item_name"]; ?></td>  
                  <td><?php echo $values["item_quantity"]; ?></td>  
                  <td>$ <?php echo $values["item_price"]; ?></td>  
                  <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                  <td><a href="productsPage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>  
            </tr>  
            <?php   
                     $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                     $_SESSION['total'] = $total; 
                  }  
            ?>  
            <tr>  
                  <td colspan="3" align="right">Total</td>  
                  <td>$ <?php echo number_format($total, 2); ?></td>  
                  <td></td>  
            </tr>  
            <?php  
            }  
            ?>  
        </table>
        <form method = "POST" action = "productsPage.php"> 
        <button type="submit" name = "chkout" class="btn btn-outline-primary">Checkout</button>  
        </form>
  </div>  
</div>  
    </body>
</html>
