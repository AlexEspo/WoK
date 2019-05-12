<?php 
session_start();
if($_SESSION['access'] == 'C'){
  require '../header/header.php';
}
else if($_SESSION['access'] == 'E'){
  require '../header/employeeheader.php';
}
else if($_SESSION['access'] == 'M'){
  require '../header/managerheader.php';
}
else if($_SESSION['access'] == 'A'){
  require '../header/adminheader.php';
}
$db = "wingmat_WoK";
$local = "localhost";
$dbuser = "wingmat_Matt";
$dbpass = "Matthewwing98";
$_SESSION['user'] = $_POST['username'];
$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
<html>
	<head>
		<title>Inserting Product</title> 
		
        <script src = "../ajaxRequests/ajaxRequestCheckProduct.js"></script>
	</head>
	
<body bgcolor="">


	<form action="insert_product.php" method="post" enctype = "multipart/form-data"> 
		
		<table align="center" width="795" border="2" bgcolor="#187eae">
			
			<tr align="center">
				<td colspan="7"><h2>Insert Product Here</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Brand:</b></td>
				<td>
				<select name="product_Brand" >
				    <option value = "Nike">Nike</option>
				    <option value = "Puma">Puma</option>
				    <option value = "Vans">Vans</option>
				    <option value = "Adidas">Adidas</option>
				    <option value = "Timberlands">Timberlands</option>
				</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Image_Path:</b></td>
				<td><input type="file" name="image" id = "image" /></td>
			</tr>
			<tr>
				<td align="right"><b>Size:</b></td>
				<td><input type="number" name="product_size" /></td>
			</tr>
			<tr>
				<td align="right"><b>Color:</b></td>
				<td><input type="text" name="product_color" /></td>
			</tr>
			<tr>
				<td align="right"><b>Price:</b></td>
				<td><input type="number" name="product_price" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Quantity:</b></td>
				<td><input type="number" name="product_quantity" /></td>
			</tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			</tr>
		</table>
	</form>
	
	<form action="delete_product.php" method="post">
		<table align="center" width="795" border="2" bgcolor="#187eae">
			<tr align="center">
				<td colspan="7"><h2>Delete Product Here</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Product ID:</b></td>
				<td><input type="number" name="product_ID" id ="product_ID"size="60" required/></td>
				<br>
				<td><button type = "button" id = "check" name = "check">Check</button></td>
			</tr>
			<tr><td id = "checkproduct"></td></tr>
			<tr align="center">
				<td colspan="7"><button type="submit" name="insert_post">Delete Sneaker</button></td>
			</tr>
		</table>
	</form>
	
	<form action="modify_product.php" method="post" enctype = "multipart/form-data">
		<table align="center" width="795" border="2" bgcolor="#187eae">
			<tr align="center">
				<td colspan="7"><h2>Update Product Here</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Product ID:</b></td>
				<td><input type="number" name="product_ID" id ="product_ID2"size="60" required/></td>
				<br>
				<tr>
    				<td align="right"><b>Product Title:</b></td>
    				<td><input type="text" name="product_title" size="60" required/></td>
    			</tr>
    			
    			<tr>
    				<td align="right"><b>Product Brand:</b></td>
    				<td>
    				<select name="product_Brand" >
    				    <option value = "Nike">Nike</option>
    				    <option value = "Puma">Puma</option>
    				    <option value = "Vans">Vans</option>
    				    <option value = "Adidas">Adidas</option>
    				    <option value = "Timberlands">Timberlands</option>
    				</select>
    				</td>
    			</tr>
    			<tr>
    				<td align="right"><b>Image_Path:</b></td>
    				<td><input type="file" name="image" id = "image" /></td>
    			</tr>
    			<tr>
				<tr>
    				<td align="right"><b>Size:</b></td>
    				<td><input type="number" name="product_size" /></td>
    			</tr>
    			<tr>
    				<td align="right"><b>Color:</b></td>
    				<td><input type="text" name="product_color" /></td>
    			</tr>
    			<tr>
    				<td align="right"><b>Price:</b></td>
    				<td><input type="number" name="product_price" required/></td>
    			</tr>
    			<tr>
    				<td align="right"><b>Quantity:</b></td>
    				<td><input type="number" name="product_quantity" /></td>
    			</tr>
			</tr>
			<tr align="center">
				<td colspan="7"><button type="submit" name="insert_post">Update Sneaker</button></td>
			</tr>
		</table>
	</form>
</body> 
</html>




