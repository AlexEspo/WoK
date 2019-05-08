<?php 
	include("../../Downloads/ecommerce-2/admin_area copy/includes/db.php"); 
	
	if(isset($_GET['delete_cat'])){
	
	$delete_id = $_GET['delete_cat'];
	
	$delete_cat = "delete from categories where cat_id='$delete_id'"; 
	
	$run_delete = mysqli_query($con, $delete_cat); 
	
	if($run_delete){
	
	echo "<script>alert('A Category has been deleted!')</script>";
	echo "<script>('index.php?view_cats','_self')</script>";
	}
	
	}





?>