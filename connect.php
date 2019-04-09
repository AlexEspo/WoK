<?php
try{
	$con = PDO ("mysql:host=localhost;dbname=cdh","root","");
	echo"connected";
}
catch(PDOException $e)
{
	echo "error".$e->getMessage();
}
?>
<form method="post">
<input type="text" name="firstName" placeholder="First Name">
<input type="text" name="lastName" placeholder="Last Name">
<input type="text" name="password" placeholder="*************">
<input type="text" name="email" placeholder=" example@gmail.com">
<input type="text" name="name" placeholder="First Name">

</form>