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
            echo "<div class='card' style='width: 35rem; margin: 0 auto;'>
            <img class='card-img-top' src= pics/" . $row['image_path'] . " alt='Card image cap' style = 'height: 30rem; width: 32rem;'>
            <div class='card-body>
                <h5 class='card-title'>" . $row['SneakerName'] . "</h5>
                <p class='card-text'>" . '<span>Price:</span>'. ' ' . '$' .$row['Price'] . "</p>
                <p class='card-text'>" . '<span>Quantity:</span>'. ' '. $row['Quantity']. "</p>
                <a href='#' class='btn btn-primary'>Add to Cart</a>
            </div>
            </div>";
        }
    }

?>
