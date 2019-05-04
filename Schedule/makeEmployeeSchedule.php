<?php
    session_start();
    if($_SESSION['access'] == 'E'){
      require '../header/employeeheader.php';
    }
    else if($_SESSION['access'] == 'M'){
      require '../header/managerheader.php';
    }
    else if($_SESSION['access'] == 'A'){
      require '../header/adminheader.php';
    }
    else{
        require '../header/header.php';
    }
?>

<html>
    <head>
        
    </head>
    
    <body>
    <form action = "insertHoursEmployees.php" method = "POST">
        <input type = "number" placeholder = "Employee SSN" id = "empSSN" name ="SSN">
        <input type = "date" id = "date" name = "date">
        <input type = "time" id = "startShift" placeholder = "Start Shift Time" name = "startShift">
        <input type = "time" id = "endShift" placeholder = "End Shift Time" name = "endShift">
        <button id = "empHoursSubmit" type = "submit">Submit</button>
    </form>
    </body>
</html>