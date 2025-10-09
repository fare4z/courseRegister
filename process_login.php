<?php
include_once "include/db_connect.php";

if (isset($_POST['btnLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check user
    // $sql = "SELECT * from tblUser where username='$username' and password='$password' and isActive=1";
    // $sql = "SELECT * from tblUser where username='$username' and password='$password' and isActive=1";

    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);

    // Prepared Statement - Prevent SQL Injection
    $sql = "SELECT * FROM tblUser WHERE username = ? AND password = ? AND isActive = 1";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    mysqli_stmt_close($stmt);


    if ($row['username']) {
        $_SESSION['_flash'] = ['type' => 'success', 'msg' => 'Login Successfully'];

        // Simpan session login

        $_SESSION['isLoggedin'] = 1;
        $_SESSION['ss_fullname'] = $row['fullname'];
        $_SESSION['ss_id'] = $row['id'];
        $_SESSION['isLoggedin'] = 1;
        $_SESSION['ss_fullname'] = $row['fullname'];
        $_SESSION['ss_id'] = $row['id'];

        header("Location: list.php");
        header("Location: list.php");
    } else {
        $_SESSION['_flash'] = ['type' => 'error', 'msg' => 'Login Fail, Please try again'];
        $_SESSION['_flash'] = ['type' => 'error', 'msg' => 'Login Fail, Please try again'];
        header("Location: index.php");
    }
}
