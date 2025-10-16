<?php
include_once "include/db_connect.php";
include "include/auth_check.php";

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// print_r($_GET);
// echo "</pre>";

// Variable Declaration
$username = $_POST['username'];
$filename = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];
$fileSize = $_FILES['photo']['size'];

// Create Folder
$dir = "uploads"; // Folder Utama
$dir_subfolder = $dir . "/" . $username . "/"; // Sub-Folder

if (!file_exists($dir)) mkdir($dir, 0755, true);
if (!file_exists($dir_subfolder)) mkdir($dir_subfolder, 0755, true);

// Check Extension
$allowedExtension = ["jpg", "jpeg", "png", "gif"];
$allowedMime = ["image/jpeg", "image/png", "image/gif"];

if (!empty($filename)) {
    // Check fileName extension
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Check mime type. Prevent from fake extension
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $tmpName);
    finfo_close($finfo);

    // Validate Extension, Mime and size

    if (
        in_array($ext, $allowedExtension) &&
        in_array($mimeType, $allowedMime) &&
        ($fileSize <= 1000000) // 1MB
    ) {
        $filePath = $dir_subfolder . "PHOTO." . $ext;

        if (move_uploaded_file($tmpName, $filePath)) {
            echo "Success";

            $sql = "UPDATE tblUser set dp= ? WHERE username = ?";
            $stmt = mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt, "ss" , $filePath, $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

        } else {
            echo "Failed";
        }
    } else {
        echo "Invalid Extension or size limit";
    }
}
