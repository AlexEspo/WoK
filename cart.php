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

<div class="form-actions">
    <h3 style="text-align: center; margin-top:5%;">View Shopping Cart<h3> 
</div>

<div class="col-25 mx-auto" style="width:50%; margin-top:10%;">
    <div class="container">
      <h4>Cart</h4>
      <hr>
      <p>Total <span class="price" style="color:black"><b></b></span></p>
      <button type="button" class="btn btn-outline-primary" style="margin-top:3%;">Checkout</button>
    </div>
</div>








