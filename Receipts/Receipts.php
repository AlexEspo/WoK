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
else{
  require '../header/adminheader.php';
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
 
</nav>
    <h1>Your Receipts!</h1>
        <p>Input the day you bought a product</p>
            <input type = "date" name = "date" id = "date">
            <button type = "button" id = "button">Search</button>
            <button type = "button" id = "refresh">Get All Receipts</button>
    <br>
        <div id = "searchedTable">
            
        </div>
        <br>
        <div id = "oldTable">
            
        </div>
    </body>
     <script src="../ajaxRequests/ajaxRequestSearchTable.js"></script>
</html>