<?php
include "db_connect.php";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Login Successfully !')</script>";
        echo "<script>window.open('../frontend/views/index.php','_SELF')</script>";
    } else {
        echo "<script>alert('Invalid email or password')</script>";
        echo "<script>window.open('../frontend/views/login.php','_SELF')</script>";
    }
    mysqli_close($conn);
}
