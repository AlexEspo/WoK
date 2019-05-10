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
$streetNum = $_POST['StreetNumber'];
$streetName = $_POST['StreetName'];
$City = $_POST['City'];
$_SESSION['user'] = $_POST['username'];
$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql_username = $link->prepare("SELECT Username FROM Customers WHERE Username = ?");
$sql_username->bind_param('s',$user);
$result = $sql_username->execute();
echo $result['Username'];
if($result['Username'] == $user){
    echo "<script type = 'text/javascript'>
            alert('Username has been taken');
            window.location.href = 'index.php';
        </script>";
}
else{
        $sql_username->close();
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Customers(Username, Name, Email, Password, StreetNumber, StreetName, City) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $link->prepare($sql);
        $query->bind_param("ssssiss", $user, $name, $email, $hashPass, $streetNum, $streetName, $City );
        $sqlRegisterUser = $link->prepare("INSERT INTO userLogin(Username, Password, UserType) VALUES (?, ?, 'C')");
        $sqlRegisterUser->bind_param("ss", $user, $hashPass);
        if($query->execute()){
            if($sqlRegisterUser->execute()){
                header("Location: Login/loginForm.php");
            }else{
                echo "<script type = 'text/javascript'>
                        alert('Something went wrong');
                        window.location.href = 'index.php';
                    </script>";
                    $query->close();
                    $sqlRegisterUser->close();
            }
        }else{
            echo "<script type = 'text/javascript'>
                        alert('Something went wrong');
                        window.location.href = 'index.php';
                    </script>";
        }
}
//Make validation for password 
$sql_username->close();
$link->close();
?>