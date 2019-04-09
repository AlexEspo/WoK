<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Web site login</title>
<style type="text/css">
body {
	background-color: #FFFFFF;
	background-repeat: no-repeat;
	background-image: url(ws_Skateboard_and_Shoes_1366x768.jpg);
	text-align: left;
	font-size: medium;
	color: #000000;
}
</style>
</head>
<body bgcolor="#FFFFFF" marginwidth="100">
	
<p>
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
<!--form with method --></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form method="post">
  <p style="font-style: normal; text-align: center;"> <em><a href="U-registration.php"><strong style="color: #000000">Click Here to Create New Account!!!</strong></a></em> </p>
<table width="371" height="201" border="0" align="center" bordercolor="red">
<tbody>
<tr>
<td width="363" bgcolor="#A6928B"><h1><strong style="font-style: italic; font-size: xx-large; font-weight: bolder;"><u> Welcome to The web site</u></strong></h1>
<h2><strong>Please Login</strong>...</h2>
<table width="338">
<tr>
<td width="80"><strong>Email ID:</strong></td>
<td width="246">
  <span style="color: #DD1C1F"><strong>
<!--textbox for email -->

<input name="email" type="email" placeholder="example@gmail.com"/>
</strong></span></td>
</tr>
<tr>
<td><strong>Password :</strong></td>
<td>
<span style="color: #DD1C1F"><strong>
<!--textbox for password -->

<input name="password" type="password" placeholder="**********"/>
</strong></span></td>
</tr>
<tr>
<td>
<span style="color: #DD1C1F"><strong>
<!--button for login -->
<input type="submit" name="btnLogin" value="LogIn"/>
</strong></span></td>
</tr>
</table>
<span style="color: #836F70">&nbsp;</span></td>
</tr>
</tbody>
</table>
<h4 style="text-align: center">&nbsp;</h4>
<p style="text-align: center">&nbsp;</p>
<p style="text-align: center">&nbsp;</p>
<p style="text-align: center">&nbsp;</p>
<p style="text-align: center">&nbsp;</p>
<p style="text-align: center">&nbsp;</p>
<p style="text-align: center">&nbsp;</p>
<p style="text-align: center">&nbsp;</p>
</form>
<?php
	
if(isset($_POST['btnLogin']))
{
//taking email entered by user
$email=$_POST['email'];
//taking password entered by user
$password=$_POST['password'];
//query to select all records
$sql_query="SELECT firstName , lastName FROM administrators WHERE email='".$email."' and password='".$password."'";
//fetching records
//mysql_query() is used to perform queries it will return result set
$result_set=mysqli_query($conn,$sql_query);
//checking if result set is greater than 0 or not
if(mysqli_num_rows($result_set) > 0)
{
//fetching records row by row
//mysql_fetch_array() will return result row by row
$fetched_row=mysqli_fetch_array($result_set);
//making data variable send to another page	
$data="<h1> Good job ! ".$fetched_row['firstName']." ".$fetched_row['lastName'].", Successfully login!! </h1>";
//using header navigating to another page with $data
header("Location: success.php?success='".$data."'");
}
else
{
//if invalid email and password then
echo "Error : Invalid credential, you must correctly login to view this site.";
}
}
else
{
//if user not loged in then display
echo "<p>You must login to view this site</p>";
}
?>
	
</body>
</html>
</body>
</html>