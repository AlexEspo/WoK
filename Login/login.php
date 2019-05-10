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
    $row=mysqli_fetch_assoc($result);
    $_SESSION['access'] = $row['UserType'];
    $auth = password_verify($password, $row['Password']);
    if($auth){
        // header("Location: ../Home/home.php");
        echo "<script type = 'text/javascript'>window.location.href = '../Home/home.php'</script>";
    }else{
        echo "<p>Check Credentials</p>";
    }
    mysqli_close($link);
    
    
?>