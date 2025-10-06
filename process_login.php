<?php
include_once "include/db_connect.php";

if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check user
    $sql = "SELECT * from tblUser where username='$username' and password='$password' and isActive=1";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['username']) {
          $_SESSION['_flash'] = ['type' => 'success' , 'msg' => 'Login Successfully'];

          $_SESSION['isLoggedin'] = 1;
          $_SESSION['ss_fullname'] = $row['fullname'];
          $_SESSION['ss_id'] = $row['id'];

          header("Location: list.php");
    } else {
        $_SESSION['_flash'] = ['type' => 'error' , 'msg' => 'Login Fail, Please try again'];
        header("Location: index.php");
    }




}


?>