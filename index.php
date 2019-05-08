<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>('login.php?not_admin=You are not an Admin!','_self')</script>";
}


?>

<html>
	<head>
		<title>This is Admin Panel</title> 
		
	<link rel="stylesheet" href="../../Downloads/ecommerce-2/admin_area copy/styles/style.css" media="all" /> 
	</head>


<body> 

	<div class="main_wrapper">
	  <div id="right">
		<h2 style="text-align:center;"> Admin Manage</h2>
			
			<a href="insert_product.php">Insert New Product</a>
			<a href="view_products.php">View All Products</a>
			<a href="insert_cat.php">Insert New Category</a>
			<a href="view_cats.php">View All Categories</a>
			<a href="insert_brand.php">Insert New Brand</a>
			<a href="view_brands.php">View All Brands</a>
			<a href="view_customers.php">View Customers</a>
			<a href="view_orders.php">View Orders</a>
		
		</div>
		
		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php 
			if(isset($_GET['insert_product'])){

				include("../../Downloads/ecommerce-2/admin_area copy/insert_product.php"); 

			}
			if(isset($_GET['view_products'])){

				include("../../Downloads/ecommerce-2/admin_area copy/view_products.php"); 

			}
			if(isset($_GET['edit_pro'])){

				include("../../Downloads/ecommerce-2/admin_area copy/edit_pro.php"); 

			}
			if(isset($_GET['insert_cat'])){

				include("../../Downloads/ecommerce-2/admin_area copy/insert_cat.php"); 

			}

			if(isset($_GET['view_cats'])){

				include("../../Downloads/ecommerce-2/admin_area copy/view_cats.php"); 

			}

			if(isset($_GET['edit_cat'])){

				include("../../Downloads/ecommerce-2/admin_area copy/edit_cat.php"); 

			}

			if(isset($_GET['insert_brand'])){

				include("../../Downloads/ecommerce-2/admin_area copy/insert_brand.php"); 

			}

			if(isset($_GET['view_brands'])){

				include("../../Downloads/ecommerce-2/admin_area copy/view_brands.php"); 

			}
			if(isset($_GET['edit_brand'])){

				include("../../Downloads/ecommerce-2/admin_area copy/edit_brand.php"); 

			}
			if(isset($_GET['view_customers'])){

				include("../../Downloads/ecommerce-2/admin_area copy/view_customers.php"); 

			}
		
		?>
		</div>
	</div>


</body>
</html>
