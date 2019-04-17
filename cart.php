<?php
$connect = mysqli_connect("localhost", "root", "", "wok");
?>


<html>
<head>
 <title>WoK</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="home.php">WoK</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Kicks</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account Options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Register</a>
            <a class="dropdown-item" href="#">Login</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin Options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Modify products</a>
            <a class="dropdown-item" href="#">Add/Remove users</a> 
        </div>
      </li>
    </div>
  </div>

  <div class="cart">
    <a class="navbar-brand float-right" href="cart.php" onclick="Cart()">
    <script>
      function Cart(){
        window.location="cart.php";
      }
    </script>
          <img src="cart.png" height="30" alt="">
        </a>
</div>
</nav>

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








