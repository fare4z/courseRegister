<?php
include_once "include/db_connect.php";
include_once "include/header.php";
include "include/auth_check.php";

$userID = $_GET['id'];

$sql = "SELECT * FROM tblUser where id='$userID'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<h2>Delete User</h2>

<p>Are you sure to delete <strong> <?php echo $user['fullname'];?> </strong>?</p>
<a href="process_delete.php?id=<?=$userID?>" class="btn btn-danger">Yes, Delete</a>
<a href="list.php" class="btn btn-secondary">Cancel</a>
