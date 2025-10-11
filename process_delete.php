<?php 
include_once "include/db_connect.php";
include "include/auth_check.php";

$id = $_GET['id'];
$sql = "DELETE from tblUser where id='$id'";

if (mysqli_query($conn , $sql)) {
     $_SESSION['_flash'] = ['type' => 'success' , 'msg' => 'User deleted successfully'];
     header("Location: list.php");
} else {
     $_SESSION['_flash'] = ['type' => 'error' , 'msg' => 'Delete Failed : '.mysqli_error($conn)];
     header("location: list.php");
}