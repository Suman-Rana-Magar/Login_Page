<?php
include "db_connect.php";
session_start();
if (isset($_GET['submit'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];
    $actual_token = $_GET['actual_token'];
    $sql = "SELECT * FROM users WHERE email = '$email' AND reset_token = '$token'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE users SET reset_token = NULL WHERE email = '$email'";
        mysqli_query($conn, $sql);
        header("location: ../frontend/views/reset_password.php?email=$email");
        exit();
    } else {
        $_SESSION['token_error'] = "Invalid token";
        $_SESSION['old_token'] = $token;
        header("location: ../frontend/views/forgot_password_token.php?email=$email&actual_token=$actual_token");
    }
}
