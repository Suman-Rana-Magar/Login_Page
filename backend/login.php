<?php
session_start();
$errors = [];
$oldData = [];
$success = [];
include "db_connect.php";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $success['login'] = $email;
        $_SESSION["email"] = $email;
        $_SESSION["success"] = $success;
        header("location: ../index.php");
        exit();
    } else {
        $oldData['email'] = $email;
        $oldData['password'] = $password;
        $errors['email'] = "Invalid email or password";
        $_SESSION['errors'] = $errors;
        $_SESSION['oldData'] = $oldData;
        header("location: ../frontend/views/login.php");
    }
    mysqli_close($conn);
}
