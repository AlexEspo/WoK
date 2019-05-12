<?php 
session_start();
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
if(isset($_POST['insert_post'])){

	//getting the text data from the fields
	$title = $_POST['product_title'];
	$brand = $_POST['product_Brand'];
	if(isset($_FILES['image'])){
	    $errors = array();
    	$file = $_FILES['image']['name'];
    	$fileTmpName = $_FILES['image']['tmp_name'];
    	$fileType = $_FILES['image']['type'];
    	$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    	$extensions = array("jpeg", "jpg", "png");
    	if(in_array($file_ext, $extensions) === false){
    	    $errors[] = "extension not allowed";
    	}
    	if(empty($errors) == true){
    	    move_uploaded_file($fileTmpName, '../pics/'.$file);
    	}else{
    	    print_r($errors);
    	}
	}else{
	    echo 'image not set';
	}
	
	
	$size = $_POST['product_size'];
	$color = $_POST['product_color'];
	$price = $_POST['product_price'];
	$quantity = $_POST['product_quantity'];
	$sqlID = 'SELECT MAX(ID) FROM Sneaker_Type';
	$result = mysqli_query($link, $sqlID);
	$idNum = mysqli_fetch_assoc($result);
	$idNewNum = $idNum['MAX(ID)'] + 1;
    
    $sql = "INSERT INTO Sneaker_Type (ID, Price, Color, SneakerName, Brand, Size, Quantity, image_path) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
	$query = $link->prepare($sql);
	$query->bind_param('idsssdis', $idNewNum, $price, $color, $title, $brand, $size, $quantity, basename($_FILES['image']['name']));
	if($query->execute() > 0){
	    echo "<script type = 'text/javascript'>
	        alert('You have successfully inserted a new product');
	        window.location.href = 'insert_productForm.php';
	    </script>";
	}else{
	    echo "<script type = 'text/javascript'>
	        alert('Something went wrong');
	        window.location.href = 'insert_productForm.php';
	    </script>";
	}
}

?>



