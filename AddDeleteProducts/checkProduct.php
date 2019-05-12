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
$sql = 'SELECT * FROM Sneaker_Type WHERE ID = ?';
$query = $link->prepare($sql);
$query->bind_param('i', $id);
$query->execute();
$result = $query->get_result();
if(mysqli_num_rows($result) == 0){
        echo "<h6>It seems that the product does not exist</h6>";
    }else{
        while($arrayOfSneakers=mysqli_fetch_assoc($result)){
        echo "Sneaker Name : " . $arrayOfSneakers['SneakerName'];
        echo "<br>";
        echo "Sneaker Brand : " . $arrayOfSneakers['Brand'];
        echo "<br>";
        echo "Sneaker Color: " . $arrayOfSneakers['Color'];
    }    
}

?>