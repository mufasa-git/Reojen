<?php
session_start();

//print_r($_SESSION); exit;

session_destroy();

unset($_COOKIE['slrememberme']);
setcookie("slrememberme","usersign",time() - 3600);

header('Location:login.php');
?>