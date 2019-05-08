<!DOCTYPE>

<?php

include("db.php");

?>

<html>

	<head>

		<title>Inserting Product</title> 

<script>

        tinymce.init({selector:'textarea'});

</script>

	</head>
    
<body bgcolor="black">

	<form action="insert_product.php" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="795" border="2" bgcolor="#187eae">
			
			<tr align="center">
				<td colspan="7"><h2>Insert Product Here</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Title:</b></td>

				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>
		    
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="product_cat" >
					<option>Select a Catagory</option>
					<?php 
		$get_cats = "select * from Sneaker_Type";
	
		$run_cats = mysqli_query($con, $get_cats);
	
		while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
		echo "<option value='$cat_id'>$cat_title</option>";

	}		
					?>
				</select>
				
				
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Brand:</b></td>
				<td>
				<select name="product_brand" >
					<option>Select a Brand</option>
					<?php 
		$get_Sneaker_Type = "select * from Sneaker Type";
	
	$run_brands = mysqli_query($con, $get_brands);
	
	while ($row_brands=mysqli_fetch_array($run_brands)){
	
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	
	echo "<option value='$brand_id'>$brand_title</option>";
	
	
	}
					?>
				</select>
				
				
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>
			
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			</tr>
		
		</table>
	
	
	</form>


</body> 
</html>
<?php 

	if(isset($_POST['insert_post'])){

		//getting the text data from the fields
		$Sneaker_Type_title = $_POST['product_title'];
		$Sneaker_Type_cat= $_POST['product_cat'];
		$Sneaker_Type_brand = $_POST['product_brand'];
		$Sneaker_Type_price = $_POST['product_price'];
		$Sneaker_Type_desc = $_POST['product_desc'];
	
		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		echo $product_image;
		echo "<br>";
		echo $product_image_tmp;
		move_uploaded_file($_FILES['product_image']['tmp_name'],"/Product_Images/");
	
		 $insert_Sneaker_Type = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)values ('$product_cat','$product_brand','$Sneaker_Type_title','$Sneaker_Type_price','$Sneaker_Type_desc','$Sneaker_Type_image','$Sneaker_Type_keywords')";
		 
		 $insert_pro = mysqli_query($con, $insert_Sneaker_Type);
		 
		 if($insert_pro){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>('index.php?insert_product','_self')</script>";
		 
		 }
	}

?>




