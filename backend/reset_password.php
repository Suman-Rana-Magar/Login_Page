<?php
include "db_connect.php";
session_start();
$oldData = [];
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password != $confirm_password) {
        $_SESSION['error'] = "Passwords and confirm password do not match";
        $oldData['password'] = $password;
        $oldData['confirm_password'] = $confirm_password;
        $_SESSION['old_data'] = $oldData;
        header("location: ../frontend/views/reset_password.php?email=$email");
        exit();
    }
    $sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
    mysqli_query($conn, $sql);
    $_SESSION['success'] = "Password reset successfully";
    header("location: ../frontend/views/login.php");
    exit();
}
