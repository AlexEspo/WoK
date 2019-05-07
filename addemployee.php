<?php
//error_reporting (E_ALL ^ E_NOTICE);
$db = "wok";
$local = "localhost";
$dbuser = "alexespo";
$dbpass = "password";

if(isset($_POST['empid']) && isset($_POST['password']) && isset($_POST['Name']) && isset($_POST['Address']) && isset($_POST['dob']) && isset($_POST['SSN']) && isset($_POST['Hourly_Pay']) && isset($_POST['sd'])){
    $emp = $_POST["empid"];
    $password = $_POST["password"];
    $name = $_POST["Name"];
    $address = $_POST["Address"];
    $dob = $_POST["dob"];
    $ssn = $_POST["SSN"];
    $pay = $_POST["Hourly_Pay"];
    $startdate = $_POST["sd"];
  }




$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql_emp = "SELECT * FROM employee WHERE EmpID = '{$emp}'";

$result_emp = mysqli_query($link, $sql_emp);
if(mysqli_num_rows($result_emp) > 0){
    echo "Sorry Employee ID has been taken";
}
else{
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $newDate = date("Y-m-d", strtotime($dob));
        $sql = "INSERT INTO employee(EmpID, Password, Name, Hourly_Pay, SSN, Address, BirthDate, StartDate, SupervisorID, UserType) VALUES ('{$emp}', '{$hashPass}', '{$name}', '{$pay}', '{$ssn}', '{$address}', '{$newDate}', '{$startdate}', '', 'E')";
        $sqlRegisterEmp = "INSERT INTO userLogin(Username, Password, UserType) VALUES ('{$emp}', '{$hashPass}', 'E')";
            if(mysqli_query($link,$sql)){
                 if(mysqli_query($link,$sqlRegisterEmp)){
                     header("Location: ademployeeform.php");
                     echo "Successful";
                 }else{
                     echo "Not successful in entering the employee into userLogin.";
                 }
             }else{
                 echo "Not Successful";
             }
            if(mysqli_query($link,$sqlRegisterEmp)){
                header("Location: ademployeeform.php");
                echo "Successful";
            }else{
                echo "Not successful in entering the employee into userLogin.";
            }
}
//Make validation for password 
$link->close();

?>