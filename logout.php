<?php

session_start();
//unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['password']);
session_destroy();

header('location:login.php');


?>

