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
	$image_path = $_POST['product_image'];
	$size = $_POST['product_size'];
	$color = $_POST['product_color'];
	$price = $_POST['product_price'];
	$quantity = $_POST['product_quantity'];
	$sqlID = 'SELECT MAX(ID) FROM Sneaker_Type';
	$result = mysqli_query($link, $sqlID);
	$idNum = mysqli_fetch_assoc($result);
	$idNewNum = $idNum['MAX(ID)'] + 1;
// 	if(mysqli_num_rows($result) > 0){
// 	    while($idNum = mysqli_fetch_assoc($result)){
// 	     echo $idNum['MAX(ID)'];   
// 	    }
// 	}

    $sql = "INSERT INTO Sneaker_Type (ID, Price, Color, SneakerName, Brand, Size, Quantity, image_path) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
	$query = $link->prepare($sql);
	$query->bind_param('idsssdis', $idNewNum, $price, $color, $title, $brand, $size, $quantity, $image_path);
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



