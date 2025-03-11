<?php
include "db_connect.php";
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $image = $_POST["image"];

    $insert = "INSERT INTO users(name,email,image,password)VALUES('$name','$email','$image','$password')";
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check_user) > 0) {
        echo "<script>alert('Email already exist ! Please use another email and try again !')</script>";
        echo "<script> window.open('../frontend/views/signup.php','_SELF')</script>";
    } else if (mysqli_query($conn, $insert)) {
        echo "<script> alert('Account Created Successfully !')</script>";
        echo "<script> window.open('../frontend/views/login.php','_SELF')</script>";
    } else {
        die("Error Detected !" . mysqli_error($conn));
    }
    mysqli_close($conn);
}
