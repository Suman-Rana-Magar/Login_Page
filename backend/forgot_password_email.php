<?php
include "db_connect.php";
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $token = random_int(100000, 999999);
        $sql = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
        mysqli_query($conn, $sql);
        header("location: ../frontend/views/forgot_password_token.php?email=$email&token=$token");
        exit();
    } else {
        $_SESSION['error'] = "Email is not registered";
        $_SESSION['oldData'] = $email;
        header("location: ../frontend/views/forgot_password_email.php");
    }
}
