<?php 
session_start();
$db = "wingmat_WoK";
$local = "localhost";
$dbuser = "wingmat_Matt";
$dbpass = "Matthewwing98";
$_SESSION['user'] = $_POST['username'];
$id = $_POST['product_ID'];
$link = new mysqli($local, $dbuser, $dbpass, $db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST['insert_post'])){

	//getting the text data from the fields
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
$title = $_POST['product_title'];
$brand = $_POST['product_Brand'];
$color = $_POST['product_color'];
$price = $_POST['product_price'];
$quantity = $_POST['product_quantity'];
$sql = "UPDATE Sneaker_Type SET Price = ?, Color = ?, SneakerName = ?, Brand = ?, Size = ?, Quantity = ?, image_path = ? WHERE ID = '{$id}'";
$query = $link->prepare($sql);
$query->bind_param('dsssdis', $price, $color, $title, $brand, $size, $quantity, basename($_FILES['image']['name']));
if($query->execute() > 0){
    echo "<script type = 'text/javascript'>
            alert('You have successfully updated a sneaker');
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