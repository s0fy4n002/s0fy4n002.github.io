<?php

include "db.php";
$f_name = @$_POST["f_name"];
$l_name = @$_POST["l_name"];
$email = @$_POST["email"];
$password = @$_POST["password"];
$repassword = @$_POST["repassword"];
$mobile = @$_POST["mobile"];
$address1 = @$_POST["address1"];
$address2 = @$_POST["address2"];
$emailValidate = filter_var($email, FILTER_VALIDATE_EMAIL);
$name = "/^[a-zA-Z ]*$/";
$number = "/^[0-9]+$/";

if (empty($f_name)) {
    echo "
    
    
    <div class='alert alert-warning'>first name must be fill</div>";




    die();
}else if(empty($l_name) ){
    echo "<div class='alert alert-warning'>last name must be fill</div>";
    die();
}else if(empty($email)){
    echo "<div class='alert alert-warning'>email must be fill</div>";
    die();
}else if(empty($mobile)){
    echo "<div class='alert alert-warning'>Nomor Hp Harus di isi</div>";
    die();
}
else if(empty($password)){
    echo "<div class='alert alert-warning'>password must be fill</div>";
    die();
}else if(empty($repassword)){
    echo "<div class='alert alert-warning'>password confirm must be fill</div>";
    die();
}else if(empty($address1)){
    echo "<div class='alert alert-warning'>address 1 must be fill</div>";
    die();
}

if(!preg_match($name, $f_name)){
    echo "
    <div class=\"alert alert-warning\">
        nama depan tidak boleh menggunakan angka
    </div>
    ";
    die();
}

if(!preg_match($name, $l_name)){
    echo "
    <div class=\"alert alert-warning\">
        Nama Belakang tidak boleh menggunakan angka
    </div>
    ";
    die();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "
    <div class=\"alert alert-warning\">
        Email tidak valid
    </div>
    ";
    die();
  }

if ($password != $repassword) {
    echo "
    <div class=\"alert alert-warning\">
        Password tidak sama
    </div>
    ";
    die();
}



$sql = "SELECT id FROM user_info WHERE email LIKE '%$email%' limit 1";

$query = mysqli_query($con, $sql);
$countEmail = mysqli_num_rows($query);
if ($countEmail > 0) {
    echo "
    <div class=\"alert alert-success\">
        Email sudah terdaftar
    </div>
    ";
    
    exit();
}else{
    $password = password_hash( $password, PASSWORD_DEFAULT );
    $repassword = password_hash($repassword, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user_info (id, first_name, last_name, email, password, mobile, address1 ) 
    VALUES ( null, '$f_name', '$l_name', '$email', '$password', '$mobile', '$address1')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        
        echo "
        <script>
        window.location.href = \"http://localhost/shopping-cart/\";
        </script>";
        

      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
}