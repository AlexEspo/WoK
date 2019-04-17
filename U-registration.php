<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CSIT web site </title>
<style type="text/css">
body {
	background-color: #F0F0F0;
	background-repeat: repeat;
	text-align: center;
	background-image: url(ws_Skateboard_and_Shoes_1366x768.jpg);
}
</style>
</head>
<body>
	
<?php
//configuration to connect to database
$host="localhost"; //server name
$dbuser="root"; //username
$pass=""; //password , default blank
$dbname="cdh"; //database name
//mysql_connect() is used to connect to the function
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
?>
	
<html>
<head>
<title></title>
<h4>&nbsp;</h4>
<h4>&nbsp;</h4>
<h4>&nbsp;</h4>
<h4><em style="font-style: italic; color: #ED0D11;"><a href="Index.php"><strong style="color: #000000"><span style="text-align: center">Click here to Login to the Page!!! </span></strong></a></em></h4>
<form action="U-registration.php" method="post">
<table width="339" height="244" border="0" align="center" bordercolor="red" bgcolor="#ACC3E9">
<tr>
<td height="52" colspan="5" align="center" bgcolor="#9F8C85"> <h2 style="font-style: italic; text-align: center;"><u>Register Your Account Here !!</u><strong>

</h2>
<tr><td bgcolor="#9F8C85" style="font-weight: bolder"><strong>First Name:</strong></td>
<td bgcolor="#9F8C85"><strong>
	
<input name="firstName" type="text" placeholder="First Name">
</strong></td>
</tr>
<tr><td bgcolor="#9F8C85" style="font-weight: bolder"><strong>Last Name:</strong></td>
<td bgcolor="#9F8C85"><strong>
<input name="lastName" type="text" placeholder="Last Name">
</strong></td>
</tr>
<tr><td bgcolor="#9F8C85" style="font-weight: bolder"><strong>Password:</strong></td>
<td bgcolor="#9F8C85"><strong>
<input name="password" type="password" placeholder="***********">
</strong></td>
</tr>
<tr><td bgcolor="#9F8C85" style="font-weight: bolder"><strong>Email Id:</strong></td>
<td bgcolor="#9F8C85"><strong>
<input name="email" type="text" placeholder="example@gmail.com">
</strong></td>
</tr>
<tr><td height="32" colspan="5" align="center" bgcolor="#9F8C85"> <span style="text-align: center; color: #FFFFFF;"><strong>
<input type="submit" name="signup" value="SignUp">
</strong></span></td>
</table>
<h4><em style="font-style: italic; color: #FFFFFF;"><a href="Index.html"><strong style="color: #000000"> Click here to go back to the Index page!!!  </strong></a></em></h4>
</p>
</form>
</body></center>
</html>

<?php
try{
$con = new PDO ("mysql:host=localhost;dbname=cdh","root","");
if(isset($_POST['signup'])){
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$email = $_POST['email'];		
$insert = $con->prepare("INSERT INTO administrators (firstName,lastName,password,email)
values(:firstName,:lastName,:password,:email)");
{
$data="<h1> Good job ! ".$firstName['firstName']." ".$lastName['lastName'].", Successfully Register!! </h1>";	
//using header navigating to another page with $data
header("Location: success.php?success='".$data."'");
}
$insert->bindParam(':firstName',$firstName);
$insert->bindParam(':lastName',$lastName);
$insert->bindParam(':password',$password);
$insert->bindParam(':email',$email);
$insert->execute();
}	
}
catch(PDOException $e)
{
echo "error".$e->getMessage();
}	
?>
