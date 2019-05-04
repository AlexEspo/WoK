<?php
session_start();
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
$_SESSION['user'] = $_POST['username'];
$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql_username = ("SELECT * FROM Customers WHERE Username = '{$user}'");
$result_username = mysqli_query($link, $sql_username);
if(mysqli_num_rows($result_username) > 0){
    echo "<script type = 'text/javascript'>
            alert('Username has been taken');
            window.location.href = 'index.php';
        </script>";
}
else{
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $newDate = date("Y-m-d", strtotime($dob));
        $sql = $link->prepare("INSERT INTO Customers(Username, Name, Email, Address, BirthDate, Password) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->bind_param('ssssss', $user, $name, $email, $address, $newDate, $hashPass);
        $sqlRegisterUser = $link->prepare("INSERT INTO userLogin(Username, Password, UserType) VALUES (?, ?, 'A')");
        $sqlRegisterUser->bind_param("ss", $user, $hashPass);
        
        if($sql->execute() > 0){
            if($sqlRegisterUser->execute() > 0){
                header("Location: Login/loginForm.php");
            }else{
                echo "<script type = 'text/javascript'>
                        alert('Something went wrong');
                        window.location.href = 'index.php';
                    </script>";
            }
        }else{
            echo "<script type = 'text/javascript'>
                        alert('Something went wrong');
                        window.location.href = 'index.php';
                    </script>";
        }
}
//Make validation for password 
$link->close();
?>