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
        <script src = "../ajaxRequests/ajaxRequestEmpSchedule.js"></script>
    </head>
    <body>
        <h1>Emp Schedule</h1>
        <button id = "empSchedule">Click For Your Employee Schedule</button>
        <br>
        <br>
        <table id = "schedule" width = 100%></table>
    </body>
</html>
