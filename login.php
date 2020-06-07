<?php
include "db.php";
session_start();

if (isset($_POST["userLogin"])) {

	


	$email = $_POST["email"];
	
	$sql = " SELECT * FROM user_info WHERE email LIKE '%$email%' and password LIKE '%$password%' ";
	$query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($query);
	if ($count == 1) {
		while($row = mysqli_fetch_array($query)){
			$_SESSION["uid"] = $row["id"];
			$_SESSION["name"] = $row["first_name"];
			$password = $row["password"];
			
		}
		if( password_verify( $_POST["password"], $password ) ){
			echo "login";
		}else{
			echo "password salah $password";
		}
	}else{
		echo "$email belum terdaftar";
	}
}


?>