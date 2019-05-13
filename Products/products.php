<?php
  $db = "wingmat_WoK";
  $local = "localhost";
  $dbuser = "wingmat_Matt";
  $dbpass = "Matthewwing98";
  $item_array = array();
  $searchKey = "%{$_POST['search']}%";
  $link = new mysqli($local, $dbuser, $dbpass, $db);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    if($searchKey !== ""){
        $sql = "SELECT * FROM Sneaker_Type WHERE SneakerName LIKE ?";
        $query = $link->prepare($sql);
        $query->bind_param('s', $searchKey);
        $query->execute();
        $result = $query->get_result();
        if(mysqli_num_rows($result) == 0){
            echo "<h3>There are no shoes like that</h3>";
        }else{
            while($row = mysqli_fetch_assoc($result)){
                echo "<form method='post' action='productsPage.php?action=add&id=" .$row['ID'] ."'> 
                <div class='card' style='width: 35rem; margin: 0 auto;'>
                <img class='card-img-top' src= ../pics/" . $row['image_path'] . " alt='Card image cap' style = 'height: 30rem; width: 32rem;'>
                <div class='card-body>
                    <h5 class='card-title'>" . $row['SneakerName'] . "</h5>
                    <p class='card-text'>" . '<span>Price:</span>'. ' ' . '$' .$row['Price'] . "</p>
                    <p class='card-text'>" . '<span>Size:</span>'. ' ' .$row['Size'] . "</p>
                    <p class='card-text'>" . '<span>Quantity:</span>'. ' ' .$row['Quantity'] . "</p>
                    <input type='text' name='quantity' class='form-control'  value='1'/>
                    <input type='hidden' name='hidden_name' value='" .$row['SneakerName'] . "' />
                    <input type='hidden' name='hidden_price' value=" .$row['Price'] ." />
                    <input type='hidden' name='hidden_quantity' value=" .$row['Quantity'] ." />
                    <input type='hidden' name='hidden_image' value=" .$row['image_path'] ." />
                    <input type='submit' name='add_to_cart' class='btn btn-primary' value='Add to cart'/>
                </div>
                </div>
                </form>";
            }    
        }
    }if($searchKey == ""){
        $sql = "SELECT * FROM Sneaker_Type";
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<form method='post' action='productsPage.php?action=add&id=" .$row['ID'] ."'> 
                <div class='card' style='width: 35rem; margin: 0 auto;'>
                <img class='card-img-top' src= ../pics/" . $row['image_path'] . " alt='Card image cap' style = 'height: 30rem; width: 32rem;'>
                <div class='card-body>
                    <h5 class='card-title'>" . $row['SneakerName'] . "</h5>
                    <p class='card-text'>" . '<span>Price:</span>'. ' ' . '$' .$row['Price'] . "</p>
                    <p class='card-text'>" . '<span>Size:</span>'. ' ' .$row['Size'] . "</p>
                    <p class='card-text'>" . '<span>Quantity:</span>'. ' ' .$row['Quantity'] . "</p>
                    <input type='text' name='quantity' class='form-control'  value='1'/>
                    <input type='hidden' name='hidden_name' value='" .$row['SneakerName'] . "' />
                    <input type='hidden' name='hidden_price' value=" .$row['Price'] ." />
                    <input type='hidden' name='hidden_quantity' value=" .$row['Quantity'] ." />
                    <input type='hidden' name='hidden_image' value=" .$row['image_path'] ." />
                    <input type='submit' name='add_to_cart' class='btn btn-primary' value='Add to cart'/>
                </div>
                </div>
                </form>";
            }
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
              "item_image" => $_POST["hidden_image"],
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
              "item_image" => $_POST["hidden_image"],
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
                  echo '<script>window.location="productsPage.php"</script>';  
                }  
        }  
    }  
}  

//checkout function
if(isset($_POST['chkout']))
{
  if($_SESSION['access'] === 'E' || $_SESSION['access'] === 'M' || $_SESSION['access'] === 'A')
  {
      console.log("hello");
      foreach($_SESSION['shopping_cart'] as $keys => $values){
            $sqlID = "SELECT MAX(ReceiptID) FROM Receipts";
            $result = mysqli_query($link, $sqlID);
            $idNum = mysqli_fetch_assoc($result);
            $idNewNum = $idNum['MAX(ReceiptID)'] + 1;
            
            $date = date("Y-m-d");
            $sql_emp = "SELECT * FROM EMPLOYEE WHERE EmpID = '{$_SESSION['user']}'";
            $result2 = mysqli_query($link, $sql_emp);
            $row = mysqli_fetch_assoc($result2);
            $empstreetnum =  $row['StreetNumber'];
            $empstreetname = $row['StreetName'];
            $empcity = $row['City'];
            $empname = $row['Name'];
            $sql_empinsert = "INSERT INTO Receipts(CustomerName, StreetNumber, StreetName, City, TotalPrice, SneakerName, NumberOfSneakersBought, DateofPurchase, ReceiptID, Username, image_path) VALUES ('{$empname}','{$empstreetnum}', '{$empstreetname}', '{$empcity}', '{$values['item_price']}', '{$values['item_name']}', '{$values['item_quantity']}', '{$date}', '{$idNewNum}',  '{$empname}', '{$values['item_image']}')";
            if(mysqli_query($link, $sql_empinsert)){
                $getAmountOfSneaker = "SELECT Quantity FROM Sneaker_Type WHERE ID = '{$values['item_id']}'";
                $resultAmount = mysqli_query($link, $getAmountOfSneaker);
                $totalAmount = mysqli_fetch_assoc($resultAmount);
                $totalAmount = $totalAmount['Quantity'] - $values['item_quantity'];
                $sqlDecrementSneaker = "UPDATE Sneaker_Type SET Quantity = '{$totalAmount}' WHERE ID = '{$values['item_id']}'";
                mysqli_query($link, $sqlDecrementSneaker);
                echo "<script type = 'text/javascript'>
                    alert('You have successfully bought something');
                    window.location.href = 'productsPage.php';
                </script>";
            }else{
                echo "<script type = 'text/javascript'>
                    alert('something went wrong shijil');
                    window.location.href = 'productsPage.php';
                </script>";
            }
          
      }
    }
    if($_SESSION['access'] === 'C'){
        foreach($_SESSION['shopping_cart'] as $keys => $values){
            $sqlID = "SELECT MAX(ReceiptID) FROM Receipts";
            $result = mysqli_query($link, $sqlID);
            $idNum = mysqli_fetch_assoc($result);
            $idNewNum = $idNum['MAX(ReceiptID)'] + 1;
            
            $date = date("Y-m-d");
            $sql_Cust = "SELECT * FROM Customers WHERE Username = '{$_SESSION['user']}'";
            $result2 = mysqli_query($link, $sql_Cust);
            $row = mysqli_fetch_assoc($result2);
            $uname = $row['Username'];
            $cname = $row['Name'];
            $cstreetnum = $row['StreetNumber'];
            $cstreetname = $row['StreetName'];
            $ccity = $row['City'];
            $sql_customer = "INSERT INTO Receipts(CustomerName, StreetNumber, StreetName, City, TotalPrice, SneakerName, NumberOfSneakersBought, DateofPurchase, ReceiptID, Username, image_path) VALUES ('{$cname}', '{$cstreetnum}', '{$cstreetname}', '{$ccity}', '{$values['item_price']}', '{$values['item_name']}', '{$values['item_quantity']}', '{$date}', '{$idNewNum}', '{$uname}', '{$values['item_image']}')";
            if(mysqli_query($link, $sql_customer)){
                $getAmountOfSneaker = "SELECT Quantity FROM Sneaker_Type WHERE ID = '{$values['item_id']}'";
                $resultAmount = mysqli_query($link, $getAmountOfSneaker);
                $totalAmount = mysqli_fetch_assoc($resultAmount);
                $totalAmount = $totalAmount['Quantity'] - $values['item_quantity'];
                $sqlDecrementSneaker = "UPDATE Sneaker_Type SET Quantity = '{$totalAmount}' WHERE ID = '{$values['item_id']}'";
                mysqli_query($link, $sqlDecrementSneaker);
                echo "<script type = 'text/javascript'>
                    alert('You have successfully bought something');
                    window.location.href = 'productsPage.php';
                </script>";
                }else{
                    echo "<script type = 'text/javascript'>
                        alert('something went wrong alex');
                        window.location.href = 'productsPage.php';
                    </script>";
                }
          }
    }
}
?>


