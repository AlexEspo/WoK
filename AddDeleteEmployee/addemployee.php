<?php
$db = "wingmat_WoK";
$local = "localhost";
$dbuser = "wingmat_Matt";
$dbpass = "Matthewwing98";

// if(isset($_POST['empid']) && isset($_POST['password']) && isset($_POST['Name']) && isset($_POST['Address']) && isset($_POST['dob']) && isset($_POST['SSN']) && isset($_POST['Hourly_Pay']) && isset($_POST['sd'])){
    $emp = $_POST["empid"];
    $password = $_POST["password"];
    $name = $_POST["Name"];
    $StreetNum = $_POST['StreetNumber'];
    $StreetName = $_POST['StreetName'];
    $City = $_POST['City'];
    $pay = $_POST["Hourly_Pay"];
    $superid = $_POST['SupervisorID'];
//   }




$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql_emp = $link->prepare("SELECT * FROM EMPLOYEE WHERE EmpID = ?");
$sql_emp->bind_param('s', $emp);
$result = $sql_emp->execute();
$sql_emp->close();
// $result_emp = mysqli_query($link, $sql_emp);
if($result['EmpID'] == $emp){
    echo "<script type = 'text/javascript'>
            alert('Employee already exists, change the EmpID');
            window.location.href = 'ademployeeform.php';
        </script>";
}
else{
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO EMPLOYEE(EmpID, Password, Name, Hourly_Pay, SupervisorID, UserType, StreetNumber, StreetName, City) VALUES (?, ?, ?, ?, ?, 'E', ?, ?, ?)";
        $queryEmployee = $link->prepare($sql);
        echo $link->error;
        $queryEmployee->bind_param('sssdsiss', $emp, $hashPass, $name, $pay, $superid, $StreetNum, $StreetName, $City);
        $sqlRegisterEmp = "INSERT INTO userLogin(Username, Password, UserType) VALUES (?, ?, 'E')";
        $queryuserLogin = $link->prepare($sqlRegisterEmp);
        $queryuserLogin->bind_param('ss', $emp, $hashPass);
        if($queryEmployee->execute() > 0){
            $queryEmployee->close();
            if($queryuserLogin->execute() > 0){
                $queryuserLogin->close();
                header("Location: ademployeeform.php");
            }else{
                echo "<script type = 'text/javascript'>
                        alert('Something went wrong');
                        window.location.href = 'ademployeeform.php';
                    </script>";
            }
        }else{
            echo "<script type = 'text/javascript'>
                        alert('Something went wrong with Alex');
                        window.location.href = 'ademployeeform.php';
                    </script>";
        }
}
//Make validation for password 
$link->close();

?>