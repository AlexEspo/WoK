<?php
    session_start();
    
    $db = "wingmat_WoK";
    $local = "localhost";
    $dbuser = "wingmat_Matt";
    $dbpass = "Matthewwing98";
    $EmpID = $_POST['EmpID'];
    $date = $_POST['date'];
    $startShift = $_POST['startShift'];
    $endShift = $_POST['endShift'];

    $link = new mysqli($local, $dbuser, $dbpass, $db);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $newDate = date("Y-m-d", strtotime($date));
    $startShiftFormatted = date("H:i:s", strtotime($startShift));
    $endShiftFormatted = date("H:i:s", strtotime($endShift));
    $sql = $link->prepare("INSERT INTO EmployeeSchedule(EmpID, Date, startShift, endShift) VALUES(?, ?, ?, ?)");
    $sql->bind_param("ssss", $EmpID, $newDate, $startShiftFormatted, $endShiftFormatted);
    $sql->execute();
    echo "<script type = 'text/javascript'>
                alert('You have successfully inserted hours');
                window.location.href = 'makeEmployeeSchedule.php';
            </script>";
?>