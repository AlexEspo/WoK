<?php 
session_start();
$db = "wingmat_WoK";
$local = "localhost";
$dbuser = "wingmat_Matt";
$dbpass = "Matthewwing98";
$_SESSION['user'] = $_POST['username'];
$id = $_POST['productID'];
$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = 'DELETE FROM Sneaker_Type WHERE ID = ?';
$query = $link->prepare($sql);
$query->bind_param('i', $id);
if($query->execute() > 0){
    echo "<script type = 'text/javascript'>
            alert('You have successfully deleted a sneaker');
            window.location.href = 'insert_productform.php';
        </script>";
}else{
    echo "<script type = 'text/javascript'>
            alert('Something went wrong');
            window.location.href = 'insert_productform.php';
        </script>";
}


?>