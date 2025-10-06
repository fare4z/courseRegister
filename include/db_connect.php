<?php

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "dfp50193";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
   // echo "Success connect to database";
}

?>
