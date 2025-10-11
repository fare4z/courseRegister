<?php 
include_once "include/db_connect.php";
include "include/auth_check.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $status = isset($_POST['status']) ? 1 : 0;

    $sql = "UPDATE tblUser set fullname='$fullname' , email ='$email' , dob='$dob' , isActive = '$status' WHERE id='$id'";
    // echo $sql;
    // die;

    if (mysqli_query($conn , $sql)) {
     $_SESSION['_flash'] = ['type' => 'success' , 'msg' => 'User update successfully'];
     header("Location: list.php");
    } else {
     $_SESSION['_flash'] = ['type' => 'error' , 'msg' => 'Update Failed : '.mysqli_error($conn)];
     header("location: update.php?id=$id");
    }

}