<?php
include_once "include/db_connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
    $username = strip_tags($_POST['username']);
    $fullname = strip_tags($_POST['fullname']);
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $isActive = 1;

    // Check if username already exists. If exists, redirect back to register page with error message. Else, proceed to insert data.

    $checkUser = mysqli_query($conn, "SELECT username from tblUser where username='$username'");

    if (mysqli_num_rows($checkUser) > 0) {
        $_SESSION['_flash'] = ['type' => 'error', 'msg' => 'Username already exists'];

        header("Location: register.php");
        die;
    }

    // Insert data ke dalam database
    $sql = "INSERT INTO tblUser (username, fullname, password, dob, isActive, email)  VALUES ('$username' , '$fullname' , '$password', '$dob' , '$isActive' , '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Success Insert data";
        $_SESSION['_flash'] = ['type' => 'success', 'msg' => 'User Added Successfully'];

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'email@gmail.com'; //alamat email gmail
            $mail->Password   = 'secret';    // app password yang telah dibuat
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('email@gmail.com', 'Admin Sistem'); // alamat email gmail 

            $mail->addAddress($email, $fullname); //("to email", "to name")

            //Content
            $mail->isHTML(true);

            $mail->Subject = 'Account Created Successfully';
            $mail->Body    = "Dear $fullname,<br>Your account has been created successfully.<br>Username: $username<br>Please keep this information safe.";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Fail insert data";
        $_SESSION['_flash'] = ['type' => 'error', 'msg' => 'Insert Failed : ' . mysqli_error($conn)];
    }

    header("Location: index.php");
}
