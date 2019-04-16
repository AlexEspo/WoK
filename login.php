<?php
    $db = "wingmat_WoK";
    $local = "localhost";
    $dbuser = "wingmat_Matt";
    $dbpass = "Matthewwing98";
    $user = $_POST["username"];
    $password = $_POST["password"];

    $link = new mysqli($local, $dbuser, $dbpass, $db);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $sql = "SELECT Username, Password FROM Customers";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    echo $row["username"];
    echo $row["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if($row["Username"] == $user && $row["Password"] == $password){
        header("Location: https://montclair.instructure.com/login/canvas", true, 301);
        exit();
        echo "Login Successful";
    }
    mysqli_close($link);
    
    

?>