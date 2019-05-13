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

<div style="background:transparent" class="jumbotron">
  <h1 class="display-4">Welcome to World of Kicks!</h1>
  <p class="lead">We are a online sneaker store with multiple locations in each state. Our purpose is to deliver high quality sneakers in a short amount of delivery time. We only sell the top choice sneakers with a great affordable cost. 
</p>
  <hr class="my-4">
  <p>Founders: Matthew Wing, Alex Esposito, and Shijil Philip</p>
</div>

<div class="card-deck">

<div class="h-50 card" style="width: auto;">
  <img class="card-img-top" src="../pics/nike2.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><a href = "../Products/productsPage.php">Nike</a></h5>
  </div>
</div>

<div class="h-50 card" style="width: auto;">
  <img class="card-img-top" src="../pics/adidas1.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><a href = "../Products/productsPage.php">Adidas</a></h5>
  </div>
</div>

<div class="h-50 card" style="width: auto;">
  <img class="card-img-top" src="../pics/timb1.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><a href = "../Products/productsPage.php">Timberlands</a></h5>
    
  </div>
</div>

</div>
