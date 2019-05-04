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
$connect = mysqli_connect("localhost", "wingmat_Matt", "Matthewwing98", "wingmat_WoK");
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








