<?php
include "db.php";

if (isset($_POST['category'])) {
	
	$query 	= "SELECT * FROM categories";
	$run	= mysqli_query($con, $query);
	echo "
		<a class=\"list-group-item active\"><h5 class=\"text-white\">Category</h5></a>
	";

	if (mysqli_num_rows($run) > 0) {
		while ($row  = mysqli_fetch_array($run)) {
			$id = $row['id'];
			$title = $row['title'];
			echo "
				<a cid=$id class=\"list-group-item list-group-item-action category\" href=\"\">$title</a>
			";
		}
	}
}

if (isset($_POST['brand'])) {
	
	$query 	= "SELECT * FROM brands";
	$run	= mysqli_query($con, $query);
	echo "
		<a class=\"list-group-item active\"><h5 class=\"text-white\">Brand</h5></a>
	";

	if (mysqli_num_rows($run) > 0) {
		while ($row  = mysqli_fetch_array($run)) {
			$id = $row['id'];
			$title = $row['title'];
			echo "
				<a bid=$id class=\"list-group-item list-group-item-action brand\" href=\"\">$title</a>
			";
		}
	}
}

if (isset($_POST['product'])) {
	
	$query 	= "SELECT * FROM products";
	$run	= mysqli_query($con, $query);
	if (mysqli_num_rows($run) > 0) {
		while ($row  = mysqli_fetch_array($run)) {
			$id = $row['id'];
			$category_id = $row['category_id'];
			$brand_id = $row['brand_id'];
			$title = $row['title'];
			$price = $row['price'];
			$desc = $row['desc'];
			$image = $row['image'];
			$keyword = $row['keyword'];

			echo "
				<div class=\"col-4 mb-3\">
					<div class=\"card text-white\">
						<div class=\"card-header py-2 bg-dark\">
							$title
						</div>
						  <div class=\"card-body\">
						  	<img src=\"$image\" class=\"card-img-top\" alt=\"...\">
						  </div>
						  
						  <div class=\"card-footer py-2 bg-dark\">
						  	$price
						  	<a href=\"\" class=\"btn btn-danger float-right btn-sm\">addToCart</a>
						  </div>
						</div>
				</div>
			";

		}
	}
}

if (isset($_POST['getCategory'])) {
	$cid 	= $_POST['cat_id'];

	$query 	= "SELECT * FROM products WHERE category_id = $cid";
	$run	= mysqli_query($con, $query);
	if (mysqli_num_rows($run) > 0) {
		while ($row  = mysqli_fetch_array($run)) {
			$id = $row['id'];
			$category_id = $row['category_id'];
			$brand_id = $row['brand_id'];
			$title = $row['title'];
			$price = $row['price'];
			$desc = $row['desc'];
			$image = $row['image'];
			$keyword = $row['keyword'];

			echo "
				<div class=\"col-4 mb-3\">
					<div class=\"card text-white\">
						<div class=\"card-header py-2 bg-dark\">
							$title
						</div>
						  <div class=\"card-body\">
						  	<img src=\"$image\" class=\"card-img-top\" alt=\"...\">
						  </div>
						  
						  <div class=\"card-footer py-2 bg-dark\">
						  	$price
						  	<a href=\"\" class=\"btn btn-danger float-right btn-sm\">addToCart</a>
						  </div>
						</div>
				</div>
			";

		}
	}
}


if (isset($_POST['getBrand'])) {
	$bid 	= $_POST['brand_id'];

	$query 	= "SELECT * FROM products WHERE brand_id = $bid";
	$run	= mysqli_query($con, $query);
	if (mysqli_num_rows($run) > 0) {
		while ($row  = mysqli_fetch_array($run)) {
			$id = $row['id'];
			$category_id = $row['category_id'];
			$brand_id = $row['brand_id'];
			$title = $row['title'];
			$price = $row['price'];
			$desc = $row['desc'];
			$image = $row['image'];
			$keyword = $row['keyword'];

			echo "
				<div class=\"col-4 mb-3\">
					<div class=\"card text-white\">
						<div class=\"card-header py-2 bg-dark\">
							$title
						</div>
						  <div class=\"card-body\">
						  	<img src=\"$image\" class=\"card-img-top\" alt=\"...\">
						  </div>
						  
						  <div class=\"card-footer py-2 bg-dark\">
						  	$price
						  	<a href=\"\" class=\"btn btn-danger float-right btn-sm\">addToCart</a>
						  </div>
						</div>
				</div>
			";

		}
	}
}

?>

