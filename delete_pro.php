<?php 
	include("db.php"); 
	
	if(isset($_GET['delete_pro'])){
	
	$delete_id = $_GET['delete_pro'];
	
	$delete_pro = "DELETE FROM products where product_id ='{$delete_id}'"; 
	
	$run_delete = mysqli_query($con, $delete_pro); 
	
	if($run_delete){
	echo "<script>alert('A product has been deleted!')</script>";
	echo "<script>('index.php')</script>";
	}
	
	}

?>