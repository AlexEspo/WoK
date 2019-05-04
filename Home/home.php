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
  <p class="lead">Some text</p>
  <hr class="my-4">
  <p>Some text</p>
</div>

<div class="card-deck">

<div class="h-50 card" style="width: auto;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Nike</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Shop Nike</a>
  </div>
</div>

<div class="h-50 card" style="width: auto;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Adidas</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Shop Adidas</a>
  </div>
</div>

<div class="h-50 card" style="width: auto;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Jordan</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Shop Jordan</a>
  </div>
</div>

</div>
