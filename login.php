<?php
    session_start();
    $db = "wok";
    $local = "localhost";
    $dbuser = "alexespo";
    $dbpass = "password";
    $user = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION['user'] = $user;
    $link = new mysqli($local, $dbuser, $dbpass, $db);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $sql = "SELECT * FROM userLogin WHERE Username = '{$user}'";
    $result = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    $hash = password_hash($password, PASSWORD_DEFAULT); 
    $auth = password_verify($row['Password'], $hash);
    if($auth){
        header("Location: home.php");
    }else{
        echo "Could not verify";
    }
    mysqli_close($link);
    
    

?>