<?php 
include "include/db_connect.php";

// session_destroy();

unset($_SESSION['isLoggedin']);

$_SESSION['_flash'] = ['type' => 'success' , 'msg' => 'You have been logout'];

header("Location: index.php");

?>