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
$name = "/[^0-9][a-z]/";
$number = "/^[0-9]+$/";

