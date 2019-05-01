<?php
    session_start();
    $db = "wingmat_WoK";
    $local = "localhost";
    $dbuser = "wingmat_Matt";
    $dbpass = "Matthewwing98";
    $user = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION['user'] = $user;

    $link = new mysqli($local, $dbuser, $dbpass, $db);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $sql = $link->prepare("SELECT * FROM userLogin WHERE Username = ?");
    $sql->bind_param('s', $user);
    $sql->execute();
    $result = $sql->get_result();
    // $result = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    $auth = password_verify($password, $row['Password']);
    if($auth){
        header("Location: home.php");
    }else{
        echo "Could not verify";
    }
    mysqli_close($link);
    
    

?>