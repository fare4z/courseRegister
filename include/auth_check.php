<?php
// Kalau belum login, redirect ke index.php

if (!isset($_SESSION['isLoggedin'])) {
     $_SESSION['_flash'] = ['type' => 'error', 'msg' => 'Please Login First'];
     header("Location: index.php");
     die;
}
?>

