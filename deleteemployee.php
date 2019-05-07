<?php
//error_reporting (E_ALL ^ E_NOTICE);
$db = "wok";
$local = "localhost";
$dbuser = "alexespo";
$dbpass = "password";

$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
      
$emp = $_POST["dempid"];

$sql = "DELETE FROM employee WHERE EmpID = $emp";
$sqlDeleteLogin = "DELETE FROM userLogin WHERE Username = $emp";
    if(mysqli_query($link,$sql)){
        if(mysqli_query($link,$sqlDeleteLogin)){
            header("Location: ademployeeform.php");
            echo "Deletion successful";
        }else{
            echo "Not successful in deleting the employee from the database.";
        }
    }else{
        echo "Not Successful";
    }
    if(mysqli_query($link,$sqlDeleteLogin)){
    header("Location: ademployeeform.php");
    echo "Deletion successful";
    }else{
    echo "Not successful in deleting the employee from the database.";
    }


  $link->close();
?>