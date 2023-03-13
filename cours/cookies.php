<?php
session_start();

//setcookie("pseudo", "Prof");

//echo $_COOKIE['pseudo'];

//setcookie("pseudo", "");

//setcookie("email", "y.skrzypczyk@gmail.com");
//setcookie("id", "435");
//setcookie("admin", "0");


$_SESSION['login'] = "true";
$_SESSION['scope'] = 1;