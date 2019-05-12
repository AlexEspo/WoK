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

  $db = "wok";
  $local = "localhost";
  $dbuser = "alexespo";
  $dbpass = "password";



  $link = new mysqli($local, $dbuser, $dbpass, $db);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM Sneaker_type";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<form method='post' action='products.php?action=add&id=" .$row['id'] ."'> 
            <div class='card' style='width: 35rem; margin: 0 auto;'>
            <img class='card-img-top' src= pics/" . $row['image_path'] . " alt='Card image cap' style = 'height: 30rem; width: 32rem;'>
            <div class='card-body>
                <h5 class='card-title'>" . $row['SneakerName'] . "</h5>
                <p class='card-text'>" . '<span>Price:</span>'. ' ' . '$' .$row['Price'] . "</p>
                <p class='card-text'>" . '<span>Size:</span>'. ' ' .$row['Size'] . "</p>
                <p class='card-text'>" . '<span>Quantity:</span>'. ' ' .$row['Quantity'] . "</p>
                <input type='text' name='quantity' class='form-control'  value='1'/>
                <input type='hidden' name='hidden_name' value='" .$row['SneakerName'] . "' />
                <input type='hidden' name='hidden_price' value=" .$row['Price'] ." />
                <input type='hidden' name='hidden_quantity' value=" .$row['Quantity'] ." />
                <input type='submit' name='add_to_cart' class='btn btn-primary' value='Add to cart'/>
            </div>
            </div>
            </form>";
        }
    }


    $item_array = array();
     
 //add to cart function
if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION["shopping_cart"])){ 
      $item_array_id =  array_column($_SESSION["shopping_cart"], "item_id"); 
      if(!in_array($_GET["id"], $item_array_id)){
        $count = count($_SESSION["shopping_cart"]);  
        $item_array = array(  
              "item_id" => $_GET["id"],  
              "item_name"  => $_POST["hidden_name"],  
              "item_price" => $_POST["hidden_price"],  
              "item_q" => $_POST["hidden_quantity"], 
              "item_quantity" => $_POST["quantity"]  
        ); 
        $_SESSION["shopping_cart"][$count] = $item_array; 
        echo '<script>alert("Item added to cart!")</script>';   
        }
    else{
      echo '<script>alert("Item already in cart. To add more of the same sneaker, remove from cart and update quantity.")</script>';
    }
}
    else{
    $item_array = array(
          "item_id" => $_GET["id"],  
          "item_name"  => $_POST["hidden_name"],  
          "item_price" => $_POST["hidden_price"],  
          "item_q" => $_POST["hidden_quantity"], 
          "item_quantity" => $_POST["quantity"]  
    );
    $_SESSION["shopping_cart"][0] = $item_array;

    }
}

//Remove from cart function
if(isset($_GET["action"]))  
{  
if($_GET["action"] == "delete")  
{  
    foreach($_SESSION["shopping_cart"] as $keys => $values)  
    {  
        if($values["item_id"] == $_GET["id"])  
        {  
              unset($_SESSION["shopping_cart"][$keys]);  
              echo '<script>alert("Item removed from cart!")</script>';  
              echo '<script>window.location="products.php"</script>';  
        }  
    }  
}  
}  




foreach($item_array as $items){
  echo implode($item_array["item_name"]);
}






//checkout function
if(isset($_POST['chkout']))
{
  if($_SESSION['access'] == 'E' || 'M' || 'A')
  {
    $sql_emp = "SELECT * FROM employee WHERE EmpID = '{$_SESSION["user"]}'";
    $result = mysqli_query($link, $sql_emp);
    $row = mysqli_fetch_assoc($result);
    $empstreetnum =  $row['Street Number'];
    $empstreetname = $row['Street Name'];
    $empcity = $row['City'];
    $empname = $row['Name'];
    $sql_empinsert = "INSERT INTO receipts(CustomerName, StreetNumber, StreetName, City, TotalPrice, SneakerName, NumberOfSneakersBought, DateofPurchase, ReceiptID, Username, image) VALUES ('{$empname}','{$empstreetnum}', '{$empstreetname}', '{$empcity}', '{$_SESSION['total']}', '{$empname}',)";
    
    //if($_SESSION['access'] == 'C')
  //{
    // $uname = $row['Username'];
    // $cname = $row['Name'];
    // $cstreetnum = $row['StreetNumber'];
    // $cstreetname = $row['StreetName'];
    // $ccity = ['City'];
    // $chkout_customer = "SELECT * FROM customers WHERE Username = '{$cname}'";
    // $sql_customer = "INSERT INTO receipts(CustomerName, StreetNumber, StreetName, City, TotalPrice, SneakerName, NumberOfSneakersBought, DateofPurchase, ReceiptID, Username, image) VALUES ('{$cname}', '{$cstreetnum}', '{$cstreetname}', '{$ccity}', ?, ?, ?, ?, ?, '{$uname}', ?)";
    // echo '<script>alert("Checkout successful, thank you for shopping with WoK!")</script>';
    // echo '<script>window.location="Receipts.php"</script>'; 
  //}
}
}
?>

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
                  <td><a href="products.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>  
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
        <form method = "POST" action = "products.php"> 
        <button type="submit" name = "chkout" class="btn btn-outline-primary">Checkout</button>  
        </form>
  </div>  
</div>  

