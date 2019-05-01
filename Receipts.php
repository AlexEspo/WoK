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
?>

<!DOCTYPE html>

<html>
    <head>
        <style>
            .receiptContainer{
                border: 1px dotted black;
                width: 50%;
                margin: 0;
                display:inline-block;
            }
            td{
                float: right;
            }
            
        </style>
    </head>

    <body>


<html>

    <h1>Your Receipts!</h1>
        <p>Input the day you bought a product</p>
        <form action = "" method = "POST" name = "form">
            <input type = "date" name = "date" id = "date">
            <button type = "button" id = "button">Search</button>
            <button type = "button" id = "refresh">Get All Receipts</button>
        </form>
    <br>
        <div id = "searchedTable">
            
        </div>
        <br>
        <div id = "oldTable">
            
        </div>
    </body>
     <script src="ajaxRequestSearchTable.js"></script>
</html>