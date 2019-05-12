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
        <div id = "Results"><?php require('products.php')?></div>
    </body>
</html>
