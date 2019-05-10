<?php
$db = "wingmat_WoK";
$local = "localhost";
$dbuser = "wingmat_Matt";
$dbpass = "Matthewwing98";

$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
      
$emp = $_POST["dempid"];
$sql = "DELETE FROM EMPLOYEE WHERE EmpID = ?";
$query = $link->prepare($sql);
$query->bind_param('s', $emp);
$sqlDeleteLogin = "DELETE FROM userLogin WHERE Username = ?";
$queryDeleteLogin = $link->prepare($sqlDeleteLogin);
$queryDeleteLogin->bind_param('s', $emp);

if($query->execute() > 0){
    if($queryDeleteLogin->execute() > 0){
        echo "<script type = 'text/javascript'>
                alert('You have successfully deleted a employee');
                window.location.href = 'ademployeeform.php';
        </script>";
    }else{
        echo "<script type = 'text/javascript'>
            alert('Something went wrong');
            window.location.href = 'ademployeeform.php';
        </script>";
    }
}else{
    "<script type = 'text/javascript'>
        alert('Something went wrong');
        window.location.href = 'ademployeeform.php';
    </script>";
}
    // if(mysqli_query($link,$sql)){
    //     if(mysqli_query($link,$sqlDeleteLogin)){
    //         header("Location: ademployeeform.php");
    //         echo "Deletion successful";
    //     }else{
    //         echo "Not successful in deleting the employee from the database.";
    //     }
    // }else{
    //     echo "Not Successful";
    // }


  $link->close();
?>