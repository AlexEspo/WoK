<?php
$db = "wingmat_WoK";
$local = "localhost";
$dbuser = "wingmat_Matt";
$dbpass = "Matthewwing98";
$user = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["Name"];
$email = $_POST["email"];
$address = $_POST["Address"];
$dob = $_POST["dob"];

$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql_username = "SELECT * FROM Customers WHERE Username = '{$user}'";

$result_username = mysqli_query($link, $sql_username);
if(mysqli_num_rows($result_username) > 0){
    echo "Sorry username has been taken";
}
else{
    $newDate = date("Y-m-d", strtotime($dob));
    echo $newDate;
    $hash = password_hash($password, PASSWORD_DEFAULT); 
    $sql = "INSERT INTO Customers(Username, Name, Email, Address, BirthDate, Password) VALUES ('{$user}', '{$name}', '{$email}', '{$address}', '{$newDate}', '{$hash}')";
    if(mysqli_query($link,$sql)){
        echo "Successful";
    }else{
        echo "Not Successful";
    }
}
//Make validation for password 
$link->close();


?>