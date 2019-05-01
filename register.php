<?php
session_start();
$db = "wok";
$local = "localhost";
$dbuser = "alexespo";
$dbpass = "password";
$user = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["Name"];
$email = $_POST["email"];
$address = $_POST["Address"];
$dob = $_POST["dob"];
$_SESSION['user'] = $_POST['username'];

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
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $newDate = date("Y-m-d", strtotime($dob));
        $sql = "INSERT INTO Customers(Username, Name, Email, Address, BirthDate, Password) VALUES ('{$user}', '{$name}', '{$email}', '{$address}', '{$newDate}', '{$hashPass}')";
        $sqlRegisterUser = "INSERT INTO userLogin(Username, Password, UserType) VALUES ('{$user}', '{$hashPass}', 'C')";
            if(mysqli_query($link,$sql)){
                if(mysqli_query($link,$sqlRegisterUser)){
                    header("Location: loginForm.php");
                    echo "Successful";
                }else{
                    echo "Not successful in entering in user into userLogin.";
                }
            }else{
                echo "Not Successful";
            }
}
//Make validation for password 
$link->close();


?>